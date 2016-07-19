<div class="row">
    <div class="medium-9 columns">
        <h2>Toutes les rubriques</h2>
        <div class="separator"></div>
    </div>
    <div class="medium-3 columns">
        <a href="<?=FO_URL?>" class="btn btn-default"><?=icon('home')?></a>
        <a href="<?=FO_URL?>insert" class="btn btn-success">Ajouter une rubrique</a>
    </div>
</div>

<div class="column row">
    <table>
        <thead>
            <tr>
                <th width="40" class="text-center">#</th>
                <th>Nom</th>
                <th>Univers</th>
<!--                    <th width="150" class="text-center">Documents liés</th>-->
                <th width="250">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rubriqueData as $rubrique) {
            ?>
            <tr>
                <td width="40" class="text-center"><?= $rubrique->getId() ?></td>
                <td><?= $rubrique->getNom() ?></td>
                <td><?= $rubrique->getUnivers() ?></td>
                <td width="250">
                    <a href="" class="btn btn-primary">Modifier</a>&nbsp;&nbsp;
                    <a href="<?=FO_URL?>delete/rubrique/<?=$rubrique->getId()?>" class="btn btn-danger delete">Supprimer</a>
                </td>
            </tr>
            <?php
        }//endfor
        ?>
        </tbody>
    </table>
</div>