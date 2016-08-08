<?php
$p = isset($_GET['url']) ? $_GET['url'] : '';
?>
<section class="sidebar">
	<ul class="vertical menu" data-accordion-menu>
		<li class="<?=(empty($p)) ? 'active' : ''?>"><a href="<?=FO_URL?>">Accueil</a></li>
        <?php
		foreach($menu as $category){
			?>
			<li>
				<a href=""><?=icon($category->getCat_Icon()).$category->getCat_Name()?></a>
				<?php
                $subcat_id = explode(',', $category->getSubcat_Id());
                $subcat_name = explode(',', $category->getSubcat_Name());
                $subcat_slug = explode(',', $category->getSubcat_Slug());
                $array = [];
                for($ii = 0; $ii < count($subcat_id); $ii++){
                    $array['subcat_id'] = $subcat_id[$ii];
                    $array['subcat_name'] = $subcat_name[$ii];
                    $array['subcat_slug'] = $subcat_slug[$ii];
                }
                foreach ($array as $a){
                    var_dump($a);
                    ?>
                    <ul class="menu vertical nested">
                        <li>
                            <a href=""></a>
                        </li>
                    </ul>
                    <?php
                }
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