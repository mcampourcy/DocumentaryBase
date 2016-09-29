<?php
namespace Modules\Category\DAO;
use Core\DAO\DAO;
use Modules\Category\Models\CategoryModel;

/**
 * Class CategoryDAO
 * @package Modules\Category\DAO
 */

class CategoryDAO extends DAO
{

    /**
     * CategoryDAO constructor
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * @return array|string
     * method returning all categories filtered by subcat
     */
    public function getAllCategories(){
        $sql = $this->query('SELECT 
        cat.id AS cat_id,
        cat.name AS cat_name,
        cat.icon AS cat_icon,
        GROUP_CONCAT(subcat.id) AS subcat_id,
        GROUP_CONCAT(subcat.name) AS subcat_name
        FROM docs_categories AS cat
        LEFT JOIN docs_categories AS subcat
        ON subcat.id_parent = cat.id
        WHERE cat.id_parent IS NULL
        GROUP BY cat.id
        ORDER BY cat_id');
        try {
            $model = $this->callCategoryModel($sql);
            return $model;
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $cat_id
     * @param null $subcat_id
     * @return array|string
     */
    public function getCategoryById($cat_id, $subcat_id = null){
        $query = 'SELECT cat.id AS cat_id, cat.name AS cat_name, cat.icon AS cat_icon ';

        if($subcat_id > 0) {
            $query .= ', subcat.id AS subcat_id, subcat.name AS subcat_name ';
        } else {
            $query .= ', GROUP_CONCAT(subcat.id) AS subcat_id, GROUP_CONCAT(subcat.name) AS subcat_name ';
        }

        $query .= 'FROM docs_categories AS cat LEFT JOIN docs_categories AS subcat ON subcat.id_parent = cat.id WHERE
         1 ';

        if($subcat_id > 0) {
            $query .= 'AND subcat.id_parent = :cat_id AND subcat.id = :subcat_id ';
            $datas = array('cat_id' => $cat_id, 'subcat_id' => $subcat_id);
        } else {
            $query .= ' AND cat.id_parent IS NULL AND cat.id = :cat_id';
            $datas = array('cat_id' => $cat_id);
        }

        $sql = $this->query($query, $datas);

        try {
            $model = $this->callCategoryModel($sql);
            return $model;
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $datas
     * @return array|int|string
     */
    public function insertCategory($datas){
        //check the datas in the model
        try {
            $model = $this->callCategoryModel($datas);
            //if the model is okay, datas are okay
            if(is_array($model)){
                $query = 'INSERT INTO docs_categories (id, name, icon, creation_date, last_update, id_parent) ';
                if(array_key_exists('cat_icon', $datas)){
                    unset($datas['cat_id']);
                    $query .= 'VALUES ("", :cat_name, :cat_icon, NOW(), NULL, NULL)';
                } else {
                    $query .= 'VALUES ("", :cat_name, NULL, NOW(), NULL, :cat_id)';
                }
            }
            return $this->query($query, $datas);
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $datas
     * @return array|int|string
     */
    public function updateCategory($datas){
        //check the datas in the model
        try {
            $model = $this->callCategoryModel($datas);
            //if the model is okay, datas are okay
            if(is_array($model)){
                $query = 'UPDATE docs_categories ';
                if(array_key_exists('subcat_id', $datas)){
                    $query .= 'SET name = :cat_name, icon = NULL, last_update = NOW(), id_parent = :id_parent
		WHERE id = :subcat_id';
                } else {
                    $query .= 'SET name = :cat_name, icon = :cat_icon, last_update = NOW(), id_parent = NULL
		WHERE id = :cat_id';
                }
            }
            return $this->query($query, $datas);
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     */
    public function deleteCategoryById($id){
        $id = (int) $id;
        if(is_int($id)) {
            $query = 'DELETE FROM docs_categories WHERE id = :id';
            $datas = array('id' => $id);
            $this->query($query, $datas);
        }
    }

    /**
     * @param $datas
     * @return array
     */
    public function callCategoryModel($datas){
        $data_array = [];
        if(array_key_exists(0, $datas)) {
            foreach ($datas as $data) {
                $data_array[] = new CategoryModel($data);
            }
        } else {
            $data_array[] = new CategoryModel($datas);
        }
        return $data_array;
    }

}