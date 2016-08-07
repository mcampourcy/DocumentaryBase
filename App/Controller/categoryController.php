<?php

namespace App\Controller;
use App\DB\categoryDAO;
include 'functions.php';
use App\Functions;
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
	public function __construct($name = null){
		$page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page);
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
            if($cat->id === $id){
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
            $model = new categoryModel($datas);
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


	public function getAllUnivers(){
		$dataUnivers = $this->DB->getAllUnivers();
		$model = $this->callUniversModel($dataUnivers);
        $this->callView($model);
	}

	public function getUnivers($id_univers = null)
	{
        if($id_univers) {
            $dataUnivers = $this->DB->getUnivers($id_univers);
        } else {
            $dataUnivers = [['id' => '', 'nom' => '', 'slug' => '', 'icon' => '']];
        }
		try {
			$univers = $this->callUniversModel($dataUnivers);
		} catch (\InvalidArgumentException $e) {
			echo $e->getMessage();
		}
//		$datas = ['rubriqueData' => $rubrique];
		$this->callView($univers, 'insertUnivers');
	}

    public function newUnivers($datas,$id = null)
    {
        $datas['slug'] = Functions::slug($datas['nom']);
        if($id > 0) $datas['id'] = $id;
        //on appelle le model avec le tableau de datas posté -> les vérifications se font dans l'hydrateur -> setter
        //renvoie un tableau d'objet
        try { //essaie de créer le model
            $model = new universModel($datas);
        } catch(\InvalidArgumentException $e) { //si erreur, on l'affiche (cf throw dans model)
            //ici, il catch l'invalid argument exception -> si erreur autre, le script remonte + haut (+haut parent : exception)
            echo $e->getMessage();
            //ici, on peut générer des logs avec les méthodes de $e
        }
        $univers = $model->toArray();
        if($id == 0) $id_univers = $this->DB->insertUnivers($univers);
        else $id_univers = $this->DB->updateUnivers($univers);
        return $id_univers;
    }

    public function delUnivers($id)
    {
        $this->DB->deleteUnivers($id);
    }

    //CAT
    public function callCategoryModel($datas){
        $data_array = [];
        foreach ($datas as $data){
            $data_array[] = new categoryModel($data);
        }
        return $data_array;
    }

	public function callUniversModel($datas){
		$dataArray = [];
		foreach ($datas as $data){
			$dataArray[] = new universModel($data);
		}
		return $dataArray;
	}
}