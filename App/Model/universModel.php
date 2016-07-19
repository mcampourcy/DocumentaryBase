<?php

namespace App\Model;
use App\Functions;

/**
 * Class universModel
 * @package App\Model
 */

class universModel
{

    public $id;
    public $nom;
    public $position;
    public $icon;

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
        if(is_string($id)) {
            $this->id = $id;
        } else {
            throw new \InvalidArgumentException("L'id doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        if(is_string($nom)) {
            if(strlen($nom) < 150) {
                $this->nom = $nom;
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
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
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
        if(is_string($icon)) {
            $this->icon = $icon;
        } else {
            throw new \InvalidArgumentException("L'id doit etre un nombre");
        }
    }

}