<?php
$page_cat_id = $menuData['cat_id'];
$page_subcat_id = $menuData['subcat_id'];
$page = $menuData['page'];
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=FO_URL?>"><img src="<?=FO_URL?>images/LOGO-MBLANC.png" alt="Logo Modulo Plus" class="img-responsive"></a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <h1>Espace documentaire</h1>
        <div class="separator"></div>
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
				<li class="<?=($page === 'home') ? 'active' : ''?>">
                    <a href="<?=FO_URL?>"><?=icon('home')?>Accueil</a>
                </li>
                <li class="<?=(($page === 'documents') && ($page_cat_id == null)) ? 'active' : ''?>">
                    <a href="<?=FO_URL?>documents"><?=icon('files-o')?>Tous les documents</a>
                </li>
                <?php
                foreach($menuData['menu'] as $Category){
                    ?>
                    <li class="<?=($page_cat_id == $Category->getCat_Id()) ? 'active' : ''?>">
                        <a href="#"><?=icon($Category->getCat_Icon()).$Category->getCat_Name()?></a>
                        <?php
                        if($Category->getSubcat_Id()){
                            $subcat_id = explode(',', $Category->getSubcat_Id());
                            $subcat_name = explode(',', $Category->getSubcat_Name());
                            ?>
                            <ul class="collapse">
                                <?php
                                for($ii = 0; $ii < count($subcat_id); $ii++){
                                    ?>
                                    <li class="<?=($page_subcat_id == $subcat_id[$ii]) ? 'active' : ''?>">
                                        <a href="<?=FO_URL.'documents/cat-'.$Category->getCat_Id().'/subcat-'.$subcat_id[$ii]?>"><?=$subcat_name[$ii]?>
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
                <li class="<?=($page === 'medias') ? 'active' : ''?>">
                    <a href="<?=FO_URL?>mediatheque"><?=icon('picture-o')?>Médiathèque</a>
                </li>
                <li class="<?=(($page === 'categories') || ($page === 'category')) ? 'active' : ''?>">
                    <a href="#"><?=icon('cogs')?>Paramètres</a>
                    <ul class="collapse">
                        <li class="<?=(($page === 'categories') || ($page === 'category')) ? 'active' : ''?>">
                            <a href="<?=FO_URL?>categories">Gérer les catégories</a>
                        </li>
                    </ul>
                </li>
			</ul>
		</div>
	</div>
</nav>