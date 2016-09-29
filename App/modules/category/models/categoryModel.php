<?php

namespace Modules\Category\Models;
use Core\Models\Model;

/**
 * Class CategoryModel
 * @package Modules\Category\Models
 */
class CategoryModel extends Model
{
    private $_cat_id;
    private $_cat_name;
    private $_cat_icon;
    private $_subcat_id;
    private $_subcat_name;

    /**
     * CategoryModel constructor
     * @param array $params
     */
    public function __construct($params = [])
    {
        parent::__construct($params);
    }

    /**
     * @return mixed
     */
    public function getCat_Id()
    {
        return $this->_cat_id;
    }

    /**
     * @param $cat_id
     */
    public function setCat_Id($cat_id)
    {
        if(is_numeric($cat_id)) {
            $this->_cat_id = $cat_id;
        } else {
            throw new \InvalidArgumentException("L'id de la catégorie doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getCat_Name()
    {
        return $this->_cat_name;
    }

    /**
     * @param $cat_name
     */
    public function setCat_Name($cat_name)
    {
        if(is_string($cat_name) && strlen($cat_name) > 0) {
            $this->_cat_name = $cat_name;
        } else {
            throw new \InvalidArgumentException("Le nom de la catégorie doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getCat_Icon()
    {
        return $this->_cat_icon;
    }

    /**
     * @param $cat_icon
     */
    public function setCat_Icon($cat_icon)
    {
        if(is_string($cat_icon)) {
            $this->_cat_icon = $cat_icon;
        } else {
            throw new \InvalidArgumentException("Le nom de l'icône doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getSubcat_Id()
    {
        return $this->_subcat_id;
    }

    /**
     * @param $subcat_id
     */
    public function setSubcat_Id($subcat_id)
    {
        if(is_string($subcat_id) || $subcat_id == null) {
            $this->_subcat_id = $subcat_id;
        } else {
            throw new \InvalidArgumentException("L'id de la sous-catégorie doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getSubcat_Name()
    {
        return $this->_subcat_name;
    }

    /**
     * @param $subcat_name
     */
    public function setSubcat_Name($subcat_name)
    {
        if(is_string($subcat_name) || $subcat_name == null) {
            $this->_subcat_name = $subcat_name;
        } else {
            throw new \InvalidArgumentException("Le nom de la sous-catégorie doit être du texte");
        }
    }

}