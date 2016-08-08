<?php
foreach ($homeData as $data){
    ?>
<div class="column row">
	<h2><?=$data->getTitre()?></h2>
	<div class="separator"></div>
	<a href="<?=FO_URL?>" class="btn btn-success">Ajouter un document</a>
	<h3><?=$data->getSousTitre()?></h3>
	<p><?=$data->getDescription()?></p>
</div>
<?php
}
?>