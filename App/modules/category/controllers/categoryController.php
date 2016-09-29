<?php

namespace Modules\Category\Controllers;
use Core\Controllers\Controller;
use Modules\Category\DAO\CategoryDAO;

/**
 * Class CategoryController
 * @package Modules\Category\Controllers
 */

class CategoryController extends Controller
{
    /**
     * @var CategoryDAO
     */
	private $_DB;

    /**
     * CategoryController constructor
     * @param null $name
     */
	public function __construct($name = null){
	    $name = htmlspecialchars(trim($name));
		$page = ($name == null || !(is_string($name))) ? __CLASS__ : $name;
		parent::__construct($page);
		$this->_DB = new CategoryDAO();
	}

    /**
     *
     */
	public function getAllCategories(){
	    $datas = $this->_DB->getAllCategories();
        if(is_array($datas)){
            $this->callView($datas, 'categories', 'category');
        } else {
            echo $datas;
        }
    }

    /**
     * @param null $cat_id
     * @param null $subcat_id
     * Prepare the form's view
     */
    public function setCategoryForm($cat_id = null, $subcat_id = null)
    {
        $datas = [];
        //call all the categories to list them
        $datas_allcat = $this->_DB->getAllCategories();

        if(($cat_id > 0) || ($subcat_id > 0)) {
            $datas = $this->_DB->getCategoryById($cat_id, $subcat_id);
        }

        $datas['cat_list'] = $datas_allcat;
        $this->callView($datas, 'categoryForm', 'category');
    }

    /**
     * @param $datas
     * @return array
     * send post datas to database
     */
    public function postCategoryForm($datas){

        foreach ($datas as $k => $data){
            $datas[$k] = htmlspecialchars(trim($data));
        }

        //if the input id parent or cat icon doesn't exist (cat /subcat), set to null
        if(!(array_key_exists('id_parent', $datas))) $datas['id_parent'] = null;
        if(!(array_key_exists('cat_icon', $datas))) $datas['cat_icon'] = null;

        if($datas['cat_id'] > 0) {
            if($datas['subcat_id'] > 0){
                unset($datas['cat_icon'], $datas['cat_id']);
            } else {
                unset($datas['subcat_id'], $datas['id_parent']);
            }
            $id = $this->_DB->updateCategory($datas);
        } else {
            if($datas['cat_icon'] == null){
                $datas['cat_id'] = $datas['id_parent'];
                unset($datas['cat_icon']);
            }
            unset($datas['subcat_id'], $datas['id_parent']);
            $id = $this->_DB->insertCategory($datas);
        }
        return $id;
    }

    /**
     * @param $id
     */
    public function deleteCategoryById($id){
        $this->_DB->deleteCategoryById($id);
    }

    /**
     * @return array
     */
    public function buildMenu()
    {
        $datas = $this->_DB->getAllCategories();
        return $datas;
    }
}