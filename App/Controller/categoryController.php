<?php

namespace App\Controller;
use App\DB\categoryDAO;
include 'functions.php';
use App\Functions;
use App\Model\categoryFormModel;
use App\Model\categoryModel;

/**
 * Class categoryController
 * @package App\Controller
 */

class categoryController extends Controller
{
	private $DB;

    /**
     * categoryController constructor.
     * @param null $name
     */
	public function __construct($name = null, $slug = null){
		$page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page, $slug);
		$this->DB = new categoryDAO();
	}

    /**
     * Function getAllCategories
     * Get all the categories
     */
	public function getAllCategories(){
	    $data_category = $this->DB->getAllCategories();
        $model = $this->callCategoryModel($data_category);
        $this->callView($model);
    }

    /**
     * Function formAddCategory
     * @param null $id
     * Prepare the form to add or update a category
     */
    public function formCategory($id = null)
    {
        $data_categories = $this->DB->getAllCategories();
        $categories = $this->callCategoryModel($data_categories);
        foreach ($categories as $cat){
            if($cat->cat_id === $id){
                $cat->select_cat = 1;
            } else {
                $cat->select_cat = 0;
            }
        }
        $this->callView($categories, 'formCategory');
    }

    public function newCategory($datas, $id = null){
        $datas['slug'] = Functions::slug($datas['name']);
        if($id > 0) $datas['id'] = $id;
        //on appelle le model avec le tableau de datas posté -> les vérifications se font dans l'hydrateur -> setter
        //renvoie un tableau d'objet
        try { //essaie de créer le model
            $model = new categoryFormModel($datas);
        } catch(\InvalidArgumentException $e) { //si erreur, on l'affiche (cf throw dans model)
            //ici, il catch l'invalid argument exception -> si erreur autre, le script remonte + haut (+haut parent : exception)
            echo $e->getMessage();
            //ici, on peut générer des logs avec les méthodes de $e
        }
        if($id == 0) $id_cat = $this->DB->insertCategory($model);
        else $id_cat = $this->DB->updateCategory($model);
        return $id_cat;
    }

    public function deleteCategory($id){
        $this->DB->deleteCategory($id);
    }

    public function callCategoryModel($datas){
        $data_array = [];
        foreach ($datas as $data){
            try { //essaie de créer le model
                $data_array[] = new categoryModel($data);
            } catch(\InvalidArgumentException $e) { //si erreur, on l'affiche (cf throw dans model)
                //ici, il catch l'invalid argument exception -> si erreur autre, le script remonte + haut (+haut parent : exception)
                echo $e->getMessage();
                //ici, on peut générer des logs avec les méthodes de $e
            }
        }
        return $data_array;
    }
}