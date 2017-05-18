<?php
$Document = $documentFormData[0];
$duplicate = $documentFormData['duplicate'];
$cat_list = $documentFormData['cat_list'];
$medias_doc = $documentFormData['medias_doc'];
$title = $Document->getId() ? "Éditer le document" : "Créer un document";
?>
<div class="row pad_t_30">
    <h2><?=$title?></h2>
    <div class="separator"></div>

    <form action="<?=FO_URL?>document/new/post<?=$Document->getCat_Id() ? '/cat-'.$Document->getCat_Id() : ''?><?=$Document->getSubcat_Id() ? '/subcat-'.$Document->getSubcat_Id() : ''?><?=$Document->getId() ? '/doc-'.$Document->getId() : ''?><?= $duplicate ? '/p-duplicate' : ''?>" method="post"
          id="form-document"
          role="form">

        <div class="col-md-9">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="flag_home" name="flag_home" <?=$Document->getFlag_Home() == 1 ? 'checked="checked"' : ''?>> A la Une
                </label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group select_cat">
                        <label for="cat_id" class="control-label">Catégorie *</label>
                        <select name="cat_id" id="cat_id" class="form-control" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($cat_list as $Cat){
                                ?>
                                <option
                                    value="<?=$Cat->getCat_Id()?>"
                                    <?= ($Cat->getCat_Id() == $Document->getCat_Id()) ? 'selected' : ''?>>
                                    <?=$Cat->getCat_Name()?>
                                </option>
                                <?php
                            }//endfor
                            ?>
                        </select>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group select_subcat">
                        <label for="subcat_id" class="control-label">Sous-catégorie *</label>
                        <select name="subcat_id" id="subcat_id" class="form-control" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($cat_list as $Cat){
                                $subcat_id = explode(',', $Cat->getSubcat_Id());
                                $subcat_name = explode(',', $Cat->getSubcat_Name());
                                for($ii = 0; $ii < count($subcat_id); $ii++){
                                    ?>
                                    <option
                                        value="<?=$subcat_id[$ii]?>"
                                        data_parent="<?=$Cat->getCat_Id()?>"
                                        <?= ($subcat_id[$ii] == $Document->getSubcat_Id()) ? 'selected' : ''?>>
                                        <?=$subcat_name[$ii]?>
                                    </option>
                                    <?php
                                }//endfor
                            }//endfor
                            ?>
                        </select>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="control-label">Titre *</label>
                <input type="text" class="form-control"placeholder="Titre" id="title" name="title" value="<?=$Document->getTitle()?>" required="required">
            </div>
            <div class="form-group">
                <label for="subtitle">Sous-titre</label>
                <input type="text" class="form-control"placeholder="Sous-titre" id="subtitle" name="subtitle" value="<?=$Document->getSubtitle()?>">
            </div>
            <div class="form-group">
                <label for="text1">Texte 1 *</label>
                <textarea class="form-control summernote" type="text" name="text1" id="text1" rows="10" value="" required><?=$Document->getText1()?></textarea>
            </div>
            <div class="form-group">
                <label for="text2">Texte 2</label>
                <textarea class="form-control summernote" type="text" name="text2" id="text2" rows="10" value=""><?=$Document->getText2()?></textarea>
            </div>
            <div class="form-group">
                <label for="link">Lien externe</label>
                <input type="url" class="form-control"placeholder="Lien externe" id="link" name="link" value="<?=$Document->getLink()?>">
            </div>
            <div class="form-group">
                <label for="text_link">Titre du lien externe</label>
                <input type="text" class="form-control" placeholder="Titre du lien externe" id="text_link" name="text_link" value="<?=$Document->getText_Link()?>">
            </div>
            <div class="text-right">
                <input type="hidden" id="id" name="id" value="<?=$Document->getId()?>">
                <a href="<?=FO_URL?>" class="btn btn-default">Annuler</a>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </div>
        <div class="col-md-3">
            <a href="#include_media" class="btn btn-default various fancybox">Ajouter un média</a>
            <h3>Médias associés</h3>
            <div class="text-doc images_liees section-mediatheque">
                <?php
                if($medias_doc){
                    $medias_include = [];
                    foreach ($medias_doc as $Media){
                        array_push($medias_include, $Media->getId());
                        if(in_array($Media->getType(), explode('|', UPLOAD_IMG_EXT))) {
                            ?>
                            <div class="bloc-img">
                                <a href="<?=UPLOAD_URL.UPLOAD_IMG_DIR .'/'.$Media->getId().'.'. $Media->getType()?>" title="<?=$Media->getTitle()?>" class="fancybox">
                                    <img src="<?= UPLOAD_URL.UPLOAD_IMG_DIR.'/'.$Media->getId().'.'.$Media->getType()?>" alt="" class="img-thumbnail img-responsive img-liee" id="<?=$Media->getId()?>">
                                </a>
                            </div>
                            <?php
                        }else if(in_array($Media->getType(), explode('|', UPLOAD_DOC_EXT))) {
                            ?>
                            <div class="bloc-img text-center">
                                <a href="<?=UPLOAD_URL.UPLOAD_DOC_DIR.'/'.$Media->getId().'.'.$Media->getType() ?>">
                                    <img src="<?=FO_URL.'images/icon-'.$Media->getType().'.png'?>" alt="" class="img-thumbnail img-responsive img-liee" id="<?=$Media->getId()?>" style="height: auto">
                                    <p><strong><?=$Media['m_title']?></strong></p>
                                </a>
                            </div>
                            <?php
                        }//endif
                    } //endfor
                } //endif
                ?>
            </div>
            <input type="hidden" name="ids_images" id="ids_images" value="">
        </div>
    </form>
    <?php include PRIVATE_ROOT.'modules/media/templates/mediasDocumentView.php'; ?>
</div>