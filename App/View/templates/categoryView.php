<div class="row">
    <div class="medium-9 columns">
        <h2>Toutes les catégories</h2>
        <div class="separator"></div>
    </div>
    <div class="medium-3 columns">
        <a href="<?=FO_URL?>" class="btn btn-default"><?=icon('home')?></a>
        <a href="<?=FO_URL?>new/category" class="btn btn-success">Ajouter une catégorie</a>
    </div>
</div>

<div class="column row">
    <table>
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
        foreach ($categoryData as $category) {
            ?>
            <tr>
                <td width="40" class="text-center"><?= $category->getCat_Id() ?></td>
                <td><?= $category->getCat_Name() ?></td>
                <td><?=icon($category->getCat_Icon())?></td>
                <td width="250">
                    <a href="<?=FO_URL?>new/category/<?=$category->getCat_Id()?>" class="btn
                    btn-primary">Modifier</a>&nbsp;&nbsp;
                    <a href="<?=FO_URL?>delete/category/<?=$category->getCat_Id()?>" class="btn btn-danger
                    delete">Supprimer</a>
                </td>
            </tr>
            <?php
            if($category->getSubcat_Id()){
                $subcat_id = explode(',', $category->getSubcat_Id());
                $subcat_name = explode(',', $category->getSubcat_Name());
                for($ii = 0; $ii < count($subcat_id); $ii++){
                    ?>
                    <tr>
                        <td width="40" class="text-center"><?= $subcat_id[$ii] ?></td>
                        <td>- <?= $subcat_name[$ii] ?></td>
                        <td></td>
                        <td width="250">
                            <a href="<?=FO_URL?>new/category/<?=$subcat_id[$ii]?>" class="btn
                    btn-primary">Modifier</a>&nbsp;&nbsp;
                            <a href="<?=FO_URL?>delete/category/<?=$subcat_id[$ii]?>" class="btn btn-danger
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