<div class="row column">
	<h2>Créer une nouvelle rubrique</h2>
	<div class="separator"></div>
</div>
<div class="row column">
    <?php
    foreach($insertRubriqueData as $rubrique) {
        ?>
        <form action="<?= FO_URL ?>new/rubrique/post<?= ($rubrique->getId() != null) ? '/' . $rubrique->getId() : '' ?>" method="post">
            <div class="row">
                <div class="medium-4 columns">
                    <label for="nom">Nom
                        <input type="text" placeholder="Nom de la rubrique" id="nom" name="nom"
                               value="<?= ($rubrique->getNom() != null) ? $rubrique->getNom() : '' ?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label for="id_univers">Univers</label>
                    <select name="id_univers" id="id_univers">
                        <option value=""></option>
                        <?php
                        foreach ($rubrique->univers as $univers) {
                            ?>
                            <option value="<?= $univers->getId() ?>" <?= ($rubrique->getId_univers() == $univers->getId()) ? 'selected' : ''?>><?= $univers->getNom() ?></option>
                            <?php
                        }//endfor
                        ?>
                    </select>
                    </label>

                </div>
            </div>
            <div class="row">
                <div class="medium-8 columns">
                    <input type="hidden" id="slug" name="slug" value="<?= ($rubrique->getSlug() != null) ? $rubrique->getSlug() : '' ?>">
                    <p class="text-right">
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </p>

                </div>
            </div>
        </form>
        <?php
    }//endfor
    ?>
</div>