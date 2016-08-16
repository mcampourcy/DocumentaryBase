<div class="row column">
	<h2>Créer une nouvelle catégorie</h2>
	<div class="separator"></div>
</div>
<div class="row column">
    <?php
    $category = '';
    if(isset($formCategoryData)){
        foreach($formCategoryData as $cat) {
            $test = ($cat->getSelect_cat()) ? $cat : '';
            if($test != '') $category = $test;
        }
    }
    $id_parent = $category ? $category->getCat_Id() : '';
    ?>
    <form action="<?= FO_URL ?>new/category/post<?= $category ? '/' . $category->getCat_Id() : '' ?>"
          method="post">
        <div class="row">
            <div class="medium-4 columns">
                <label for="nom">Nom
                    <input type="text" placeholder="Nom de la catégorie" id="name" name="name"
                           value="<?= $category ? $category->getCat_Name() : '' ?>">
                </label>
            </div>
            <div class="medium-4 columns">
                <label for="id_parent">Categorie parent</label>
                <select name="id_parent" id="id_parent">
                    <option value=""></option>
                    <?php
                    if(isset($formCategoryData)){
                        foreach ($formCategoryData as $cat_list) {
                            ?>
                            <option value="<?= $cat_list->getCat_Id() ?>" <?=($id_parent === $cat_list->getCat_id()) ?
                                'selected' : ''?>><?= $cat_list->getCat_Name() ?></option>
                            <?php
                        }//endfor
                    }//endif
                    ?>
                </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-4 columns">
                <label for="icon">Icône
                    <input type="text" placeholder="Icône" id="icon" name="icon"
                           value="<?= $category ? $category->getCat_Icon() : '' ?>">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 columns">
                <input type="hidden" id="slug" name="slug"
                       value="<?= $category ? $category->getCat_Slug() : '' ?>">
                <p>
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </p>

            </div>
        </div>
    </form>
</div>