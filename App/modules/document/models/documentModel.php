<?php

namespace Modules\Document\Models;
use Core\Models\Model;

/**
 * Class DocumentModel
 * @package Modules\Document\Models
 */
class DocumentModel extends Model
{

    private $_id;
    private $_title;
    private $_subtitle;
    private $_text1;
    private $_text2;
    private $_link;
    private $_text_link;
    private $_cat_id;
    private $_cat_name;
    private $_subcat_id;
    private $_subcat_name;
    private $_flag_home = 0;
    private $_creation_date;
    private $_last_update;

    /**
     * DocumentModel constructor.
     * @param array $params
     */
    public function __construct($params = []){
        parent::__construct($params);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        if(is_numeric($id) || $id == null) {
            $this->_id = $id;
        } else {
            throw new \InvalidArgumentException("L'id doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        if(is_string($title) && strlen($title) > 0) {
            $this->_title = $title;
        } else {
            throw new \InvalidArgumentException("Le titre doit etre du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->_subtitle;
    }

    /**
     * @param $subtitle
     */
    public function setSubtitle($subtitle)
    {
        if(is_string($subtitle) || $subtitle == null) {
            $this->_subtitle = $subtitle;
        } else {
            throw new \InvalidArgumentException("Le sous-titre doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getText1()
    {
        return $this->_text1;
    }

    /**
     * @param $text1
     */
    public function setText1($text1)
    {
        if(is_string($text1) && strlen($text1) > 0) {
            $this->_text1 = $text1;
        } else {
            throw new \InvalidArgumentException("Le text1 doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getText2()
    {
        return $this->_text2;
    }

    /**
     * @param $text2
     */
    public function setText2($text2)
    {
        if(is_string($text2) || $text2 == null) {
            $this->_text2 = $text2;
        } else {
            throw new \InvalidArgumentException("Le text2 doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        if(is_string($link) || $link == null) {
            $this->_link = $link;
        } else {
            throw new \InvalidArgumentException("Le lien doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getText_Link()
    {
        return $this->_text_link;
    }

    /**
     * @param $text_link
     */
    public function setText_Link($text_link)
    {
        if(is_string($text_link) || $text_link == null) {
            $this->_text_link = $text_link;
        } else {
            throw new \InvalidArgumentException("Le texte du lien doit être du texte");
        }
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
        if(is_numeric($cat_id) && strlen($cat_id) > 0) {
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
            throw new \InvalidArgumentException("La catégorie doit être du texte");
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
        if(is_numeric($subcat_id) && strlen($subcat_id) > 0) {
            $this->_subcat_id = $subcat_id;
        } else {
            throw new \InvalidArgumentException("L'id de la sous-catégorie doit etre un nombre");
        }
    }

    /**
     * @return string
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
        if(is_string($subcat_name) && strlen($subcat_name) > 0) {
            $this->_subcat_name = $subcat_name;
        } else {
            throw new \InvalidArgumentException("La sous-catégorie doit être du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getFlag_Home()
    {
        return $this->_flag_home;
    }

    /**
     * @param $flag_home
     */
    public function setFlag_Home($flag_home)
    {
        if(is_numeric($flag_home) && strlen($flag_home) > 0) {
            $this->_flag_home = $flag_home;
        } else {
            throw new \InvalidArgumentException("Le flag doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getCreation_Date()
    {
        return $this->_creation_date;
    }

    /**
     * @param $creation_date
     */
    public function setCreation_Date($creation_date)
    {
        if(validateDate($creation_date) && strlen($creation_date) > 0) {
            $this->_creation_date = dateToFrench($creation_date);
        } else {
            throw new \InvalidArgumentException("La date de création doit être une date");
        }
    }

    /**
     * @return mixed
     */
    public function getLast_Update()
    {
        return $this->_last_update;
    }

    /**
     * @param $last_update
     */
    public function setLast_Update($last_update)
    {
        if(validateDate($last_update) && strlen($last_update) > 0) {
            $this->_last_update = dateToFrench($last_update);
        } elseif ($last_update == null){
            $this->_last_update = null;
        } else {
            throw new \InvalidArgumentException("La date de modification doit être une date");
        }
    }
}