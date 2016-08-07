<div class="row">
    <div class="medium-9 columns">
        <h2>Univers Truc</h2>
        <div class="separator"></div>
    </div>
    <div class="medium-3 columns">
        <a href="<?=FO_URL?>" class="btn btn-default"><?=icon('home')?></a>
        <a href="<?=FO_URL?>new/document" class="btn btn-success">Ajouter un document</a>
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
        foreach ($documentsData as $document) {
            ?>
            <tr>
                <td width="40" class="text-center"><?= $document->getId() ?></td>
                <td><?= $document->getTitre() ?></td>
                <td><?= $document->getIdUnivers() ?></td>
                <td width="250">
                    <a href="<?=FO_URL?>new/document/<?=$document->getId()?>" class="btn btn-primary">Modifier</a>&nbsp;&nbsp;
                    <a href="<?=FO_URL?>delete/document/<?=$document->getId()?>" class="btn btn-danger delete">Supprimer</a>
                </td>
            </tr>
            <?php
        }//endfor
        ?>
        </tbody>
    </table>
</div>