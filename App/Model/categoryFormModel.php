<?php

namespace App\Model;

/**
 * Class categoryModel
 * @package App\Model
 */

class categoryFormModel
{
    public $id;
    public $name;
    public $icon;
    public $slug;
    public $id_parent;


    public function __construct($params = [])
    {
        $this->id = 0;
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getIdParent()
    {
        return $this->id_parent;
    }

    /**
     * @param mixed $id_parent
     */
    public function setIdParent($id_parent)
    {
        $this->id_parent = $id_parent;
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