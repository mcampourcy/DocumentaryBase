<?php
$cat_id = '';
$cat_name = '';
if(array_key_exists(0, $categoryFormData)){
    $Category = $categoryFormData[0];
    $cat_id = $Category->getCat_Id();
    $cat_name = $Category->getCat_Name();
    $cat_icon = $Category->getCat_Icon();
    $subcat_id = $Category->getSubcat_Id();
    $subcat_name = $Category->getSubcat_Name();
    if(strchr($subcat_id, ',')) $subcat_id = 0;
}
//var_dump($categoryFormData);
$title = ($cat_id != '') ? 'Modifier la catégorie' : 'Créer une catégorie';
$title = (isset($subcat_id) && ($subcat_id > 0)) ? 'Modifier la sous-catégorie' : 'Modifier la catégorie';
?>
<div class="row pad_t_20">
    <div class="col-md-12">
        <h2><?=$title?></h2>
        <div class="separator"></div>
        <form action="<?= FO_URL ?>category/new/post" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="cat_name">Nom</label>
                        <input
                            type="text"
                            class="form-control"
                            id="cat_name"
                            name="cat_name"
                            placeholder="Nom"
                            value="<?= (isset($subcat_id) && $subcat_id > 0) ? $subcat_name : $cat_name ?>"
                            required
                        >
                    </div>
                    <div class="col-md-4" id="form_parent">
                        <?php
                        //if the category is a subcategory OR if cat is new
                        if((isset($subcat_id) && $subcat_id > 0) || ($cat_id == '')) {
                            $cat_list = $categoryFormData['cat_list'];
                            ?>
                            <label for="id_parent">Catégorie parente
                                <small>(si sous-catégorie)</small>
                            </label>
                            <select name="id_parent" id="id_parent" class="form-control" required>
                                <option value=""></option>
                                <?php
                                foreach ($cat_list as $Cat) {
                                    ?>
                                    <option  value="<?=$Cat->getCat_Id()?>"
                                        <?=($Cat->getCat_Id() === $cat_id) ? 'selected="selected"' : ''?>>
                                        <?=$Cat->getCat_Name()?></option>

                                    <?php
                                }//endfor
                                ?>
                            </select>
                            <?php
                        } //endif
                        ?>
                    </div>
                </div>
            </div>
            <?php
            //if the category is not a subcategory
            if((!(isset($subcat_id)) || $subcat_id <= 0)) {
                ?>
                <div class="form-group" id="form_icon">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="cat_icon">Icône
                                <small>(si catégorie)</small>
                            </label><br>
                            <input
                                type="text"
                                class="form-control"
                                id="cat_icon"
                                name="cat_icon"
                                placeholder="Icône"
                                value="<?=(isset($cat_icon)) ? $cat_icon : ''?>"
                                size="255"
                                required
                            >
                        </div>
                    </div>
                </div>
                <?php
            }//endif
            ?>
            <input type="hidden" value="<?=($cat_id > 0) ? $cat_id : 0?>" id="cat_id" name="cat_id">
            <input type="hidden" value="<?=((isset($subcat_id) && $subcat_id > 0)) ? $subcat_id : 0?>" id="subcat_id" name="subcat_id">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="<?=FO_URL?>categories" class="btn btn-default">Annuler</a>
        </form>
    </div>
</div>