<div class="row">
    <div class="col-md-12 mar_t_30">
        <div id="form_m"></div>
    </div>
    <hr>
    <div class="col-md-9">
        <h2>Médiathèque</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=FO_URL?>" class="btn btn-default"><?=icon('home')?></a>
        <a href="<?=FO_URL?>media/new" class="btn btn-success">Ajouter un média</a>
    </div>

    <div class="col-md-9">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">Images</a></li>
            <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="images">
                <div class="text-doc section-mediatheque">
                    <?php
                    foreach ($mediasData as $Media){
                        if(in_array($Media->getType(), explode('|', UPLOAD_IMG_EXT))) {
                            ?>
                            <div class="bloc-img">
                                <div class="bloc-info">
                                    <div class="info">
                                        <a href="<?= UPLOAD_URL.UPLOAD_IMG_DIR.'/'. $Media->getId().'.'. $Media->getType() ?>" class="view text-info fancybox" rel="mediatheque" title="<?=$Media->getTitle()?>"><?=icon('eye', 1, 1)
                                            ?></a>
                                        <a href="media/delete/media-<?=$Media->getId()?>" class="delete text-danger"><?=icon('close', 1, 1)
                                            ?></a>
                                    </div>
                                </div>
                                <a href="<?= UPLOAD_URL.UPLOAD_IMG_DIR.'/'. $Media->getId().'.'. $Media->getType() ?>">
                                    <img src="<?= UPLOAD_URL.UPLOAD_IMG_DIR.'/'.$Media->getId().'.'.$Media->getType() ?>" alt="" class="img-thumbnail img-responsive">
                                </a>
                            </div>
                            <?php
                        }//endif
                    } //endfor
                    ?>
                </div>
            </div><!--tabpanel-->
            <div role="tabpanel" class="tab-pane fade" id="documents">
                <div class="text-doc section-mediatheque row">
                    <?php
                    foreach ($mediasData as $Media){
                        if(in_array($Media->getType(), explode('|', UPLOAD_DOC_EXT))) {
                            ?>
                            <div class="bloc-img text-center">
                                <div class="bloc-info">
                                    <div class="info">
                                        <a href="<?= UPLOAD_URL.UPLOAD_DOC_DIR.'/'. $Media->getId().'.'. $Media->getType() ?>" class="view text-info" target="_blank"><?=icon('eye', 1, 1)?></a>
                                        <a href="media/delete/media-<?=$Media->getId()?>" class="delete text-danger"><?=icon('close', 1, 1)
                                            ?></a>
                                    </div>
                                </div>
                                <a href="<?= UPLOAD_URL.UPLOAD_DOC_DIR.'/'.$Media->getId().'.'.$Media->getType() ?>" target="">
                                    <img src="<?=FO_URL.'images/icon-'.$Media->getType().'.png'?>" alt="" class="img-thumbnail img-responsive" style="height: auto">
                                </a>
                            </div>
                            <?php
                        }//endif
                    } //endfor
                    ?>
                </div><!--text-doc-->
            </div><!--tabpanel-->
        </div><!--tab-content-->
    </div>
    <div class="col-md-3">
        <h3>Ajouter un média</h3>
        <form method="post" enctype="multipart/form-data" id="form_mediatheque">
            <label for="file">Fichiers (jpg, png, doc, pdf | max. 100ko) :</label><br />
            <input type="file" name="uploads[]" multiple="multiple" id="files" /><br />
            <button type="submit" class="btn btn-success" id="sbm_btn">Enregistrer</button>
        </form>
    </div>
</div>