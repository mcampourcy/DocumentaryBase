<?php
foreach ($datas as $data){
    ?>
<div class="row">
    <div class="col-md-9">
        <h2><?=$data->getTitre()?></h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=DOCBASE?>index.php?p=document_edit" class="btn btn-success">Ajouter un document</a>
    </div>
    <div class="col-md-12">
        <h3><?=$data->getSousTitre()?></h3>
        <p><?=$data->getDescription()?></p>
        <p class="mar_t_30"><a href="<?=DOCBASE?>/public/index.php/univers">Voir tous les univers</a></p>
        <p class="mar_t_30"><a href="<?=DOCBASE?>/public/index.php/rubriques">Voir toutes les rubriques</a></p>
    </div>
</div>
    <?php
}