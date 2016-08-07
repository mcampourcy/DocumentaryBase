<div class="row column">
	<h2>Créer un nouvel univers</h2>
	<div class="separator"></div>
</div>
<div class="row column">
    <?php
    foreach($insertUniversData as $univers) {
        ?>
        <form action="<?= FO_URL ?>new/univers/post<?= ($univers->getId() != '') ? '/' . $univers->getId() : '' ?>" method="post">
            <div class="row">
                <div class="medium-4 columns">
                    <label for="nom">Nom
                        <input type="text" placeholder="Nom de l'univers" id="nom" name="nom"
                               value="<?= ($univers->getNom() != '') ? $univers->getNom() : '' ?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label for="icon">Icône
                        <input type="text" placeholder="Nom de l'icône" id="icon" name="icon"
                               value="<?= ($univers->getIcon() != '') ? $univers->getIcon() : '' ?>">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="medium-8 columns">
                    <input type="hidden" id="slug" name="slug" value="<?= ($univers->getSlug() != '') ? $univers->getSlug() : '' ?>">
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