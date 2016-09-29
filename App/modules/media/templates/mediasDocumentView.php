<?php
$c = new \Modules\Media\Controllers\MediaController();
$mediasDocumentData = $c->includeMediasDocument();
?>
<div class="container" id="include_media" style="display: none; width: 100%">
    <div class="row">
        <div class="col-md-12">
            <h2>Médiathèque</h2>
            <div class="separator"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">Images</a></li>
                <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="images">
                    <div class="text-doc section-mediatheque">
                        <?php
                        foreach ($mediasDocumentData as $Media){
                            $selected = '';
                            if(!empty($medias_include) && in_array($Media->getId(), $medias_include)) $selected = 'selected';
                            if(in_array($Media->getType(), explode('|', UPLOAD_IMG_EXT))) {
                                ?>
                                <div class="bloc-img">
                                    <img src="<?= UPLOAD_URL.UPLOAD_IMG_DIR.'/'.$Media->getId().'.'.$Media->getType() ?>" alt="" class="img-thumbnail img-responsive <?=$selected?>" id="<?=$Media->getId()?>">
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
                        foreach ($mediasDocumentData as $Media){
                            $selected = '';
                            if(!empty($medias_include) && in_array($Media->getId(), $medias_include)) $selected = 'selected';
                            if(in_array($Media->getType(), explode('|', UPLOAD_DOC_EXT))) {
                                ?>
                                <div class="bloc-img text-center">
                                    <img src="<?=FO_URL.'images/icon-'.$Media->getType().'.png'?>" alt="" id="<?=$Media->getId()?>" class="img-thumbnail img-responsive <?=$selected?>" style="height: auto">
                                </div>
                                <?php
                            }//endif
                        } //endfor
                        ?>
                    </div><!--text-doc-->
                </div><!--tabpanel-->
            </div><!--tab-content-->
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary" id="validation">Choisir</button>
            </div>
        </div>
    </div>
</div>