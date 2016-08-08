<?php
namespace App\DB;

/**
 * Class categoryDAO
 * @package App\DB
 */

class categoryDAO extends DAO
{

    /**
     * categoryDAO constructor.
     */
    public function __construct(){
        parent::__construct();
    }

    //CATEGORY

    /**
     * Function getAll
     * @return array
     */
    public function getAllCategories(){
        return $this->query('SELECT id, name, icon, slug, creation_date, last_update, id_parent FROM docs_categories');
    }

    public function getOneCategory($id){
        $query = 'SELECT id, name, icon, slug, creation_date, last_update, id_parent 
        FROM docs_categories
        WHERE id = :id';
        $datas = array('id' => $id);
        return $this->query($query, $datas);
    }

    public function insertCategory($datas){
        $datas = $this->toArray($datas);
        array_splice($datas, -1, 1);
        $datas['id'] = '';
        //WARNING : SQL needs a array of datas, not objects
        $query = 'INSERT INTO docs_categories (id, name, icon, slug, creation_date, last_update, id_parent)
        VALUES (:id, :name, :icon, :slug, NOW(), NULL, :id_parent)';
        return $this->query($query, $datas);
    }

    public function updateCategory($datas){
        $datas = $this->toArray($datas);
        array_splice($datas, -1, 1);
        //WARNING : SQL needs a array of datas, not objects
        $query = 'UPDATE docs_categories
		SET name = :name, icon = :icon, last_update = NOW(), slug = :slug, id_parent = :id_parent
		WHERE id = :id';
        return $this->query($query, $datas);
    }

    public function deleteCategory($id){
        $query = 'DELETE FROM docs_categories WHERE id = :id';
        $datas = array('id' => $id);
        $this->query($query, $datas);
    }

    public function getAllForMenu(){
        $query = 'SELECT 
        cat.id AS cat_id,
        cat.name AS cat_name,
        cat.icon AS cat_icon,
        cat.slug AS cat_slug,
        GROUP_CONCAT(subcat.id) AS subcat_id,
        GROUP_CONCAT(subcat.name) AS subcat_name,
        GROUP_CONCAT(subcat.slug) AS subcat_slug
        FROM docs_categories AS cat
        LEFT OUTER JOIN docs_categories AS subcat
        ON subcat.id_parent = cat.id
        WHERE cat.id_parent IS NULL
        GROUP BY cat.id
        ORDER BY cat_id';
        return $this->query($query);
    }

    public function toArray($datas) {
        $array = [];
        foreach ($datas as $k => $v){
            if($v === '') $v = NULL;
            $array[$k] = $v;
        }
        return $array;
    }

}