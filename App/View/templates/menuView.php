<?php
$p = isset($_GET['url']) ? $_GET['url'] : '';
var_dump($p);
?>
<section class="sidebar">
	<ul class="vertical menu" data-accordion-menu>
		<li class="<?=(empty($p)) ? 'active' : ''?>"><a href="<?=FO_URL?>"><?=icon('home')?>Accueil</a></li>
		<li class="<?=($p == 'documents') ? 'active' : ''?>"><a href="<?=FO_URL?>documents"><?=icon('files-o')?>Tous les documents</a></li>
        <?php
		foreach($menu as $category){
			?>
			<li>
				<a href="#"><?=icon($category->getCat_Icon()).$category->getCat_Name()?></a>
				<?php
                if($category->getSubcat_Id()){
                    $subcat_id = explode(',', $category->getSubcat_Id());
                    $subcat_name = explode(',', $category->getSubcat_Name());
                    $subcat_slug = explode(',', $category->getSubcat_Slug());
                    for($ii = 0; $ii < count($subcat_id); $ii++){
                        ?>
                        <ul class="menu vertical nested">
                            <li>
                            <a href="<?=FO_URL.$category->getCat_Slug().'-'.$category->getCat_Id().'/'.$subcat_slug[$ii].'-'.$subcat_id[$ii]?>"><?=$subcat_name[$ii]?></a>
                            </li>
                        </ul>
                        <?php
                    }//endfor
                }//endif
				?>
			</li>
			<?php
		}//endfor
		?>
		<li>
			<a href=""><i class="fa fa-cogs" aria-hidden="true"></i>Paramètres</a>
			<ul class="menu vertical nested">
				<li>
					<a href="<?=FO_URL?>categories">Gérer les catégories</a>
				</li>
			</ul>
		</li>
	</ul>
</section>
<section class="main-section">