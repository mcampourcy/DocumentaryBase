<?php

namespace App\Model;
use App\Functions;

/**
 * Class categoryModel
 * @package App\Model
 */

class categoryModel
{

    public $id;
    public $name;
    public $icon;
    public $slug;
    public $id_parent;
    public $select_cat;


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
        if((is_string($id)) || ($id = null)) {
            $this->id = $id;
        } else {
            throw new \InvalidArgumentException("L'id doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $nom
     */
    public function setName($name)
    {
        if(is_string($name)) {
            if(strlen($name) < 150) {
                $this->name = $name;
            } else {
//				//renvoie une erreur (ici erreur argument invalide)
//				//on peut faire ses propre classes d'erreur-> il suffit qu'elle extend exception
                throw new \InvalidArgumentException("Le titre doit être inférieur à 150 caractères");
            }
        } else {
            throw new \InvalidArgumentException("Le titre doit etre une chaine de caractères");
        }
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
        if((is_string($icon)) || (empty($icon))) {
            $this->icon = $icon;
        } else {
            throw new \InvalidArgumentException("L'icone doit etre un nombre");
        }
    }

	/**
	 * @return int
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param int $id
	 */
	public function setSlug($slug)
	{
		if((is_string($slug)) || (empty($slug))) {
			$this->slug = $slug;
		} else {
			throw new \InvalidArgumentException("Le slug doit etre un nombre");
		}
	}

    /**
     * @return mixed
     */
    public function getId_Parent()
    {
        return $this->id_parent;
    }

    /**
     * @param mixed $id_parent
     */
    public function setId_Parent($id_parent)
    {
        if((is_string($id_parent)) || ($id_parent === null)) {
            $this->id_parent = $id_parent;
        } else {
            throw new \InvalidArgumentException("L'id_parent doit etre un nombre");
        }
        $this->id_parent = $id_parent;
    }

    /**
     * @return mixed
     */
    public function getSelect_cat()
    {
        return $this->select_cat;
    }

    /**
     * @param mixed $select_cat
     */
    public function setSelect_cat($select_cat)
    {
        if((is_string($select_cat))) {
            $this->select_cat = $select_cat;
        } else {
            throw new \InvalidArgumentException("Select_cat doit être un chiffre");
        }
        $this->select_cat = $select_cat;
    }

}