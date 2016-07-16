<div class="row">
    <div class="col-md-9">
        <h2>Toutes les rubriques</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=FO_URL?>" class="btn btn-default"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="<?=FO_URL?>new/rubrique" class="btn btn-success">Ajouter une rubrique</a>
    </div>
    <div class="col-md-12">
        <div class="table-responsive pad_t_10">
            <table class="table table-striped table-bordered table-hover">
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
    </div>
</div>