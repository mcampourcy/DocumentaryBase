<div class="row">
    <div class="col-md-12 mar_t_30 text-right">
        <a href="<?= FO_URL ?>document/new" class="btn btn-success">Créer un document</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2>Espace documentaire</h2>
        <div class="separator"></div>
        <h3>Bienvenue chez ModuloPlus</h3>
        <p>Morbi aliquam nunc at lorem viverra tempor. Aenean condimentum porttitor tincidunt. Aliquam tempor diam ut augue cursus, ac euismod risus viverra. Donec porta euismod tristique. Donec elementum massa non diam ultricies rhoncus. Sed a quam in libero convallis maximus et id velit. Sed quam mauris, fringilla a tincidunt ut, consectetur iaculis libero. Suspendisse potenti. Donec maximus euismod felis a sagittis. Nunc euismod sem eu leo egestas condimentum. Mauris vel sodales sem, sed vestibulum magna. Quisque tempus imperdiet augue, at volutpat erat semper quis. Ut quis leo mi.</p>
    </div>
</div>
<div class="row">
    <?php
    if($homeData['home'][0]->getId() != null){
        ?>
        <hr>
        <div class="col-md-12">
            <h3><?= icon('flash') ?>Les documents à la une</h3>
            <div class="table-responsive pad_t_10">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="40">#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Lien externe</th>
                        <th>Créé le</th>
                        <th>Modifié le</th>
                        <th width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($homeData['home'] as $Home){
                        ?>
                        <tr>
                            <td width="40" class="text-center"><?= $Home->getId() ?></td>
                            <td>
                                <?= $Home->getTitle() ?><br>
                                <small><?= $Home->getSubtitle() ?></small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=FO_URL?>documents/<?= 'cat-'.$Home->getCat_Id().'/subcat-'
                                    .$Home->getSubcat_Id()?>">
                                        <?= $Home->getCat_Name().' > '.$Home->getSubcat_Name() ?>
                                    </a>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=$Home->getLink()?>" target="_blank">
                                        <?=($Home->getLink()) ? icon('external-link').$Home->getText_Link() : ''?>
                                    </a>
                                </small>
                            </td>
                            <td><small><?= $Home->getCreation_Date() ?></small></td>
                            <td><small><?= $Home->getLast_Update() ?></small></td>
                            <td width="100" class="text-center">
                                <a href="<?=FO_URL?>document/detail/<?='cat-'.$Home->getCat_Id().'/subcat-'
                                .$Home->getSubcat_Id().'/doc-'.$Home->getId()?>" class="btn btn-default">Détail</a>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <?php
                    }//endfor
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }//endif

    if($homeData['last_create'][0]->getId() != null){
        ?>
        <hr>
        <div class="col-md-12">
            <h3><?= icon('flash')?>Les derniers documents créés</h3>
            <div class="table-responsive pad_t_10">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="40">#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Lien externe</th>
                        <th>Créé le</th>
                        <th>Modifié le</th>
                        <th width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($homeData['last_create'] as $Last_create){
                        ?>
                        <tr>
                            <td width="40" class="text-center"><?= $Last_create->getId() ?></td>
                            <td>
                                <?= $Last_create->getTitle() ?><br>
                                <small><?= $Last_create->getSubtitle() ?></small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=FO_URL?>documents/<?='cat-'.$Last_create->getCat_Id().'/subcat-'
                                    .$Last_create->getSubcat_Id()?>">
                                        <?= $Last_create->getCat_Name().' > '.$Last_create->getSubcat_Name() ?>
                                    </a>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=$Last_create->getLink()?>" target="_blank">
                                        <?=($Last_create->getLink()) ? icon('external-link').$Last_create->getText_Link
                                            () :
                                            ''?>
                                    </a>
                                </small>
                            </td>
                            <td><small><?= $Last_create->getCreation_Date() ?></small></td>
                            <td><small><?= $Last_create->getLast_Update() ?></small></td>
                            <td width="100" class="text-center">
                                <a href="<?=FO_URL?>document/detail/<?='cat-'.$Last_create->getCat_Id().'/subcat-'
                                .$Last_create->getSubcat_Id().'/doc-'.$Last_create->getId()?>" class="btn btn-default">Détail</a>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <?php
                    }//endfor
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }//endif

    if($homeData['last_update'][0]->getId() != null){
        ?>
        <hr>
        <div class="col-md-12">
            <h3><?= icon('flash') ?>Les dernières mises à jour</h3>
            <div class="table-responsive pad_t_10">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="40">#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Lien externe</th>
                        <th>Créé le</th>
                        <th>Modifié le</th>
                        <th width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($homeData['last_update'] as $Last_update){
                        ?>
                        <tr>
                            <td width="40" class="text-center"><?= $Last_update->getId() ?></td>
                            <td>
                                <?= $Last_update->getTitle() ?><br>
                                <small><?= $Last_update->getSubtitle() ?></small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=FO_URL?>documents/<?='cat-'.$Last_update->getCat_Id().'/subcat-'
                                    .$Last_update->getSubcat_Id()?>">
                                        <?= $Last_update->getCat_Name().' > '.$Last_update->getSubcat_Name() ?>
                                    </a>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=$Last_update->getLink()?>" target="_blank">
                                        <?=($Last_update->getLink()) ? icon('external-link').$Last_update->getText_Link() : ''?>
                                    </a>
                                </small>
                            </td>
                            <td><small><?= $Last_update->getCreation_Date() ?></small></td>
                            <td><small><?= $Last_update->getLast_Update() ?></small></td>
                            <td width="100" class="text-center">
                                <a href="<?=FO_URL?>document/detail/<?='cat-'.$Last_update->getCat_Id().'/subcat-'
                                .$Last_update->getSubcat_Id().'/doc-'.$Last_update->getId()?>" class="btn
                                btn-default">Détail</a>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <?php
                    }//endfor
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }//endif
    ?>
</div>