<?php
$slug = $menuData['slug'];
?>
<section class="sidebar">
	<ul class="vertical menu" data-accordion-menu>
		<li class="<?=($slug === 'home') ? 'active' : ''?>">
            <a href="<?=FO_URL?>"><?=icon('home')?>Accueil</a>
        </li>
		<li class="<?=($slug === 'documents') ? 'active' : ''?>">
            <a href="<?=FO_URL?>documents"><?=icon('files-o')?>Tous les documents</a>
        </li>
        <?php
		foreach($menuData['menu'] as $category){
			?>
			<li>
				<a href="#"><?=icon($category->getCat_Icon()).$category->getCat_Name()?></a>
				<?php
                if($category->getSubcat_Id()){
                    $subcat_id = explode(',', $category->getSubcat_Id());
                    $subcat_name = explode(',', $category->getSubcat_Name());
                    $subcat_slug = explode(',', $category->getSubcat_Slug());
				    ?>
                    <ul class="menu vertical nested">
                    <?php
                    for($ii = 0; $ii < count($subcat_id); $ii++){
                        ?>
                            <li class="<?=($subcat_slug[$ii] === $slug) ? 'active' : ''?>">
                            <a href="<?=FO_URL.$category->getCat_Id().'/'.$category->getCat_Slug().'/'.$subcat_id[$ii].'/'.$subcat_slug[$ii]?>"><?=$subcat_name[$ii]?>
                            </a>
                            </li>
                        <?php
                    }//endfor
                    ?>
                    </ul>
                    <?php
                }//endif
				?>
			</li>
			<?php
		}//endfor
		?>
		<li>
			<a href="#"><i class="fa fa-cogs" aria-hidden="true"></i>Paramètres</a>
			<ul class="menu vertical nested">
				<li class="<?=($slug === 'categories') ? 'active' : ''?>">
					<a href="<?=FO_URL?>categories">Gérer les catégories</a>
				</li>
			</ul>
		</li>
	</ul>
</section>
<section class="main-section">