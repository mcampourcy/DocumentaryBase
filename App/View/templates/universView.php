<div class="row">
    <div class="col-md-9">
        <h2>Tous les univers</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=DOCBASE?>/public/index.php" class="btn btn-default"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="" class="btn btn-success">Ajouter un univers</a>
    </div>
    <div class="col-md-12">
        <div class="table-responsive pad_t_10">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th width="40" class="text-center">#</th>
                    <th width="40" class="text-center">Position</th>
                    <th>Nom</th>
                    <th>Icon</th>
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
                        <td width="40" class="text-center"><?= $data->getPosition() ?></td>
                        <td><?= $data->getNom() ?></td>
                        <td><i class="fa <?=$data->getIcon()?>" aria-hidden="true"></i></td>
<!--                        <td width="150" class="text-center">-->
<!--                            <a href="--><?//= DOCBASE ?><!--index.php?u=--><?//= $Univers->id ?><!--&p=document_all">-->
<!--                                --><?//= $docs_lies ?><!-- document--><?//=($docs_lies > 0) ? 's' : ''?>
<!--                            </a>-->
<!--                        </td>-->
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