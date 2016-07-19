<?php
foreach ($homeData as $data){
    ?>
	<h2><?=$data->getTitre()?></h2>
	<div class="separator"></div>
	<a href="<?=FO_URL?>" class="btn btn-success">Ajouter un document</a>
	<h3><?=$data->getSousTitre()?></h3>
	<p><?=$data->getDescription()?></p>
	<p class="mar_t_30"><a href="<?=FO_URL?>univers">Voir tous les univers</a></p>
	<p class="mar_t_30"><a href="<?=FO_URL?>rubriques">Voir toutes les rubriques</a></p>
<?php
}
?>