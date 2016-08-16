<div class="row column">
	<h2>Créer une nouvelle catégorie</h2>
	<div class="separator"></div>
</div>
<div class="row column">
    <?php
    $document = '';
    if(isset($formDocumentData)){
        foreach ($formDocumentData as $doc){
            $document = $doc;
        }
    }
    ?>
    <form action="<?= FO_URL ?>new/category/post<?= $category ? '/' . $category->getId() : '' ?>"
          method="post">
        <div class="row">
            <div class="medium-4 columns">
                <label for="nom">Nom
                    <input type="text" placeholder="Nom de la catégorie" id="name" name="name"
                           value="<?= $category ? $category->getName() : '' ?>">
                </label>
            </div>
            <div class="medium-4 columns">
                <label for="id_parent">Categorie parent</label>
                <select name="id_parent" id="id_parent">
                    <option value=""></option>
                    <?php
                    foreach ($formCategoryData as $cat_list) {
                        if($cat_list->getSelect_cat() === 0) {
                            ?>
                            <option value="<?= $cat_list->getId() ?>" <?= ($parent_cat == $cat_list->getId()) ? 'selected' : '' ?>><?= $cat_list->getName() ?></option>
                            <?php
                        } else if ($cat_list->select_cat === null) {
                            ?>
                            <option value="<?= $cat_list->getId() ?>"><?= $cat_list->getName() ?></option>
                            <?php
                        }//endif
                    }//endfor
                    ?>
                </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-4 columns">
                <label for="icon">Icône
                    <input type="text" placeholder="Icône" id="icon" name="icon"
                           value="<?= $category ? $category->getIcon() : '' ?>">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 columns">
                <input type="hidden" id="slug" name="slug"
                       value="<?= $category ? $category->getSlug() : '' ?>">
                <p>
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </p>

            </div>
        </div>
    </form>
</div>