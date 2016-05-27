<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=DOCBASE?>"><img src="<?=DOCBASE?>public/images/LOGO-MBLANC.png" alt="Logo Modulo Plus" class="img-responsive"></a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <h1>Espace documentaire</h1>
        <div class="separator"></div>
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- accordion start
                quand menu ouvert : li class active - li + ul class collapse in
                -->
                <li class="<?//=($page == 'home') ? 'active' : ''?>"><a href="<?=DOCBASE?>"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <?php
                foreach($datas as $data){
                    ?>
                    <li><a href=""><i class="fa fa-<?= $data->getIcon()?>" aria-hidden="true"></i><?= $data->getNom()?></a></li>
                    <?php
                }//endfor
                ?>
            </ul>
        </div>
    </div>
</nav>