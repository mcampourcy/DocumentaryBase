<div class="row">
    <div class="col-md-9">
        <h2>Toutes les catégories</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=FO_URL?>" class="btn btn-default"><?=icon('home')?></a>
        <a href="<?=FO_URL?>category/new" class="btn btn-success">Ajouter une catégorie</a>
    </div>
    <div class="col-md-12">
        <div class="table-responsive pad_t_10">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="40" class="text-center">#</th>
                        <th>Nom</th>
                        <th>Icon</th>
                        <!--                    <th width="150" class="text-center">Documents liés</th>-->
                        <th width="250">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categoriesData as $Category) {
                    ?>
                    <tr>
                        <td width="40" class="text-center"><?= $Category->getCat_Id() ?></td>
                        <td><?= $Category->getCat_Name() ?></td>
                        <td><?=icon($Category->getCat_Icon())?></td>
                        <td width="250">
                            <a href="<?=FO_URL?>category/new/cat-<?=$Category->getCat_Id()?>" class="btn
                    btn-primary">Modifier</a>&nbsp;&nbsp;
                            <a href="<?=FO_URL?>category/delete/<?=$Category->getCat_Id()?>" class="btn btn-danger
                    delete">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                    if($Category->getSubcat_Id()){
                        $subcat_id = explode(',', $Category->getSubcat_Id());
                        $subcat_name = explode(',', $Category->getSubcat_Name());
                        for($ii = 0; $ii < count($subcat_id); $ii++){
                            ?>
                            <tr>
                                <td width="40" class="text-center"><?= $subcat_id[$ii] ?></td>
                                <td>- <?= $subcat_name[$ii] ?></td>
                                <td></td>
                                <td width="250">
                                    <a href="<?=FO_URL?>category/new/cat-<?=$Category->getCat_Id()?>/subcat-<?=$subcat_id[$ii]?>" class="btn
                    btn-primary">Modifier</a>&nbsp;&nbsp;
                                    <a href="<?=FO_URL?>category/delete/<?=$subcat_id[$ii]?>" class="btn btn-danger
                    delete">Supprimer</a>
                                </td>
                            </tr>
                            <?php
                        }//endfor
                    }//endif
                }//endfor
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>