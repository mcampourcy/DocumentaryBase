<div class="row">
    <div class="medium-9 columns">
        <h2>Tous les univers</h2>
        <div class="separator"></div>
    </div>
    <div class="medium-3 columns">
        <a href="<?=FO_URL?>" class="btn btn-default"><?=icon('home')?></a>
        <a href="<?=FO_URL?>new/univers" class="btn btn-success">Ajouter un univers</a>
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
        foreach ($universData as $univers) {
            ?>
            <tr>
                <td width="40" class="text-center"><?= $univers->getId() ?></td>
                <td><?= $univers->getNom() ?></td>
                <td><?=icon($univers->getIcon())?></td>
                <td width="250">
                    <a href="<?=FO_URL?>univers" class="btn btn-primary">Modifier</a>&nbsp;&nbsp;
                    <a href="" class="btn btn-danger delete">Supprimer</a>
                </td>
            </tr>
            <?php
        }//endfor
        ?>
        </tbody>
    </table>
</div>