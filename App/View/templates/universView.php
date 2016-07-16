<div class="row">
    <div class="col-md-9">
        <h2>Tous les univers</h2>
        <div class="separator"></div>
    </div>
    <div class="col-md-3 mar_t_30 text-right">
        <a href="<?=FO_URL?>" class="btn btn-default"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="<?=FO_URL?>insert" class="btn btn-success">Ajouter un univers</a>
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
                foreach ($universData as $univers) {
                    ?>
                    <tr>
                        <td width="40" class="text-center"><?= $univers->getId() ?></td>
                        <td width="40" class="text-center"><?= $univers->getPosition() ?></td>
                        <td><?= $univers->getNom() ?></td>
                        <td><i class="fa <?=$univers->getIcon()?>" aria-hidden="true"></i></td>
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
    </div>
</div>