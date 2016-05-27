<div class="row">
    <div class="col-md-9">
        <h2>Toutes les rubriques</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=DOCBASE?>/public/index.php" class="btn btn-default"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="" class="btn btn-success">Ajouter une rubrique</a>
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
                foreach ($datas as $data) {
                    ?>
                    <tr>
                        <td width="40" class="text-center"><?= $data->getId() ?></td>
                        <td><?= $data->getNom() ?></td>
                        <td><?= $data->getIdUnivers() ?></td>
                        <td width="250">
                            <a href="" class="btn btn-primary">Modifier</a>&nbsp;&nbsp;
                            <a href="" class="btn btn-danger delete">Supprimer</a>
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