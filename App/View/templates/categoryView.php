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
                <td width="40" class="text-center"><?= $category->getId() ?></td>
                <td><?= $category->getName() ?></td>
                <td><?=icon($category->getIcon())?></td>
                <td width="250">
                    <a href="<?=FO_URL?>new/category/<?=$category->getId()?>" class="btn btn-primary">Modifier</a>&nbsp;&nbsp;
                    <a href="<?=FO_URL?>delete/category/<?=$category->getId()?>" class="btn btn-danger delete">Supprimer</a>
                </td>
            </tr>
            <?php
        }//endfor
        ?>
        </tbody>
    </table>
</div>