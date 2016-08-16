<?php

namespace App\Model;

/**
 * Class categoryModel
 * @package App\Model
 */

class categoryModel
{
    public $cat_id;
    public $cat_name;
    public $cat_icon;
    public $cat_slug;
    public $subcat_id;
    public $subcat_name;
    public $subcat_slug;
    public $select_cat;


    public function __construct($params = [])
    {
        $this->hydrate($params);
    }

    public function hydrate($params = []) {
        foreach ($params as $method => $value){
            $setter = "set" . ucfirst($method);
            if(method_exists($this, $setter)){
                $this->$setter($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCat_Id()
    {
        return $this->cat_id;
    }

    /**
     * @param mixed $cat_id
     */
    public function setCat_Id($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    /**
     * @return mixed
     */
    public function getCat_Name()
    {
        return $this->cat_name;
    }

    /**
     * @param mixed $cat_name
     */
    public function setCat_Name($cat_name)
    {
        $this->cat_name = $cat_name;
    }

    /**
     * @return mixed
     */
    public function getCat_Icon()
    {
        return $this->cat_icon;
    }

    /**
     * @param mixed $cat_icon
     */
    public function setCat_Icon($cat_icon)
    {
        $this->cat_icon = $cat_icon;
    }

    /**
     * @return mixed
     */
    public function getCat_Slug()
    {
        return $this->cat_slug;
    }

    /**
     * @param mixed $cat_slug
     */
    public function setCat_Slug($cat_slug)
    {
        $this->cat_slug = $cat_slug;
    }

    /**
     * @return mixed
     */
    public function getSubcat_Id()
    {
        return $this->subcat_id;
    }

    /**
     * @param mixed $subcat_id
     */
    public function setSubcat_Id($subcat_id)
    {
        $this->subcat_id = $subcat_id;
    }

    /**
     * @return mixed
     */
    public function getSubcat_Name()
    {
        return $this->subcat_name;
    }

    /**
     * @param mixed $subcat_name
     */
    public function setSubcat_Name($subcat_name)
    {
        $this->subcat_name = $subcat_name;
    }

    /**
     * @return mixed
     */
    public function getSubcat_Slug()
    {
        return $this->subcat_slug;
    }

    /**
     * @param mixed $subcat_slug
     */
    public function setSubcat_Slug($subcat_slug)
    {
        $this->subcat_slug = $subcat_slug;
    }

    /**
     * @return mixed
     */
    public function getSelect_Cat()
    {
        return $this->select_cat;
    }

    /**
     * @param mixed $select_cat
     */
    public function setSelect_Cat($select_cat)
    {
        $this->select_cat = $select_cat;
    }



//    /**
//     * @return int
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @param int $id
//     */
//    public function setId($id)
//    {
//        if((is_string($id)) || ($id = null)) {
//            $this->id = $id;
//        } else {
//            throw new \InvalidArgumentException("L'id doit etre un nombre");
//        }
//    }

}