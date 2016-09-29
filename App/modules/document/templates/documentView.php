<?php
$Document = $documentData[0];
$cat = $Document->getCat_Id();
$subcat = $Document->getSubcat_Id();
$id = $Document->getId();
?>

<div class="row">
    <div class="col-md-12 mar_t_30 text-right">
        <a href="<?=FO_URL?>documents<?= $cat ? '/cat-'.$cat : '' ?><?= $subcat ? '/subcat-'.$subcat : '' ?>" class="btn btn-default"> <?=icon('angle-left', 0, 2)?>Retour</a>
        <a href="<?=FO_URL?>document/new<?= $cat ? '/cat-'.$cat : '' ?><?= $subcat ? '/subcat-'.$subcat : '' ?><?= $id ? '/doc-'.$id : '' ?>" class="btn btn-info">Modifier</a>
        <a href="<?=FO_URL?>document/new<?= $cat ? '/cat-'.$cat : '' ?><?= $subcat ? '/subcat-'.$subcat : '' ?><?= $id ? '/doc-'.$id : '' ?>/p-duplicate" class="btn btn-primary duplicate">Dupliquer</a>
        <a href="<?=FO_URL?>document/delete<?= $cat ? '/cat-'.$cat : '' ?><?= $subcat ? '/subcat-'.$subcat : '' ?><?= $id ? '/doc-'.$id : '' ?>" class="btn btn-danger delete">Supprimer</a>
    </div>
</div>
<div class="row">
    <hr>

    <div class="col-md-12">
        <h2><?=$Document->getTitle()?></h2>
        <?= $Document->getSubtitle() ? '<h3>'.$Document->getSubtitle().'</h3>' : '' ?>
        <div class="separator"></div>
        <p>
            <small>
                A la Une : <?=$Document->getFlag_Home() ? 'oui' : 'non'?>
                - Créé le <?=$Document->getCreation_Date()?>
                <?= $Document->getLast_Update() ? ' - Modifié le '.$Document->getLast_Update() : '' ?>
            </small>
        </p>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
            <?php
            if($Document->getText2() != ''){
                ?>
                <li role="presentation"><a href="#ameliorations" aria-controls="ameliorations" role="tab" data-toggle="tab">Améliorations</a></li>
                <?php
            } //endif
            ?>
            <?php
            if($documentData['medias_doc']){
                ?>
                <li role="presentation"><a href="#medias" aria-controls="medias" role="tab" data-toggle="tab">Médias</a></li>
                <?php
            } //endif
            ?>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="description">
                <div class="text-doc">
                    <?=$Document->getText1()?>
                </div>
            </div>
            <?php
            if($Document->getText2() != ''){
                ?>
                <div role="tabpanel" class="tab-pane fade" id="ameliorations">
                    <div class="text-doc">
                        <?=$Document->getText2()?>
                    </div>
                </div>
                <?php
            } //endif
            ?>
            <?php
            if($documentData['medias_doc']){
                ?>
                <div role="tabpanel" class="tab-pane fade" id="medias">
                    <div class="text-doc section-mediatheque">

                        <?php
                        $media_id = [];
                        foreach ($documentData['medias_doc'] as $Media){
                            if($Media->getId()) array_push($media_id, $Media->getId());
                            if(in_array($Media->getType(), explode('|', UPLOAD_IMG_EXT))) {
                                ?>
                                <div class="bloc-img">
                                    <a href="<?=UPLOAD_URL . UPLOAD_IMG_DIR . '/' . $Media->getId() . '.' . $Media->getType() ?>" title="<?=$Media->getTitle()?>" class="fancybox">
                                        <img src="<?= UPLOAD_URL.UPLOAD_IMG_DIR.'/'.$Media->getId().'.'.$Media->getType() ?>" alt="" class="img-thumbnail img-responsive img-liee" id="<?=$Media->getId()?>">
                                    </a>
                                </div>
                                <?php
                            }else if(in_array($Media->getType(), explode('|', UPLOAD_DOC_EXT))) {
                                ?>
                                <div class="bloc-img text-center">
                                    <a href="<?=UPLOAD_URL . UPLOAD_DOC_DIR . '/' . $Media->getId() . '.' . $Media->getType() ?>" target="_blank">
                                        <img src="<?=FO_URL.'images/icon-'.$Media->getType().'.png'?>" alt="" class="img-thumbnail img-responsive img-liee" id="<?=$Media->getId()?>" style="height: auto">
                                        <p><strong><?=$Media->getTitle()?></strong></p>
                                    </a>
                                </div>
                                <?php
                            }//endif
                        } //endfor
                        ?>

                    </div>
                </div>
                <?php
            } //endif
            ?>
        </div>

    </div>

</div>
