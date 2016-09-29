<div class="row pad_t_30">
    <div class="col-md-9">
        <h2>Tous les documents</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=FO_URL?>document/new" class="btn btn-success">Ajouter un document</a>
    </div>
    <?php
    if($documentsData[0]->getId() != null) {
        ?>
        <div class="col-md-12">
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
                        <th width="250"></th>
                    </tr>
                    </thead>
                    <tbody id="pagination-test">
                    <?php
                    foreach ($documentsData as $Document) {
                        ?>
                        <tr>
                            <td width="40" class="text-center"><?= $Document->getId() ?></td>
                            <td>
                                <?= $Document->getTitle() ?><br>
                                <small><?= $Document->getSubtitle() ?></small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=FO_URL?>documents/<<?='cat-'.$Document->getCat_Id().'/subcat-'
                                    .$Document->getSubcat_Id()?>">
                                        <?= $Document->getCat_Name().' > '.$Document->getSubcat_Name() ?>
                                    </a>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <a href="<?=$Document->getLink()?>" target="_blank">
                                        <?=($Document->getLink()) ? icon('external-link').$Document->getText_Link() :
                                            ''?>
                                    </a>
                                </small>
                            </td>
                            <td><small><?= $Document->getCreation_Date() ?></small></td>
                            <td><small><?= $Document->getLast_Update() ?></small></td>
                            <td width="250" class="text-center">
                                <a href="<?=FO_URL?>document/detail/<?='cat-'.$Document->getCat_Id().'/subcat-'
                                .$Document->getSubcat_Id().'/doc-'.$Document->getId()?>" class="btn
                                btn-default">Détail</a>
                                <a href="<?=FO_URL?>document/new/<?='cat-'.$Document->getCat_Id().'/subcat-'
                                .$Document->getSubcat_Id().'/doc-'.$Document->getId()?>" class="btn
                                btn-primary">Modifier</a>&nbsp;&nbsp;
                                <a href="<?=FO_URL?>document/delete/<?='cat-'.$Document->getCat_Id().'/subcat-'
                                .$Document->getSubcat_Id().'/doc-'.$Document->getId()?>" class="btn btn-danger delete">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div><!--end col md 12-->
    <?php } else { ?>
        <div class="col-md-12">
            <h3>Pas de documents</h3>
        </div>
        <?php
    }//endif
    ?>
</div>