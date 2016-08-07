<?php

namespace App\Model;

/**
 * Class documentModel
 * @package App\Model
 */

class documentModel
{

    private $id;
    public $titre;
    public $id_univers;
    public $id_rubrique;

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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getIdUnivers()
    {
        return $this->id_univers;
    }

    /**
     * @param mixed $id_univers
     */
    public function setIdUnivers($id_univers)
    {
        $this->id_univers = $id_univers;
    }

    /**
     * @return mixed
     */
    public function getIdRubrique()
    {
        return $this->id_rubrique;
    }

    /**
     * @param mixed $id_rubrique
     */
    public function setIdRubrique($id_rubrique)
    {
        $this->id_rubrique = $id_rubrique;
    }



	public function toArray() {
		return array(
			'id' => $this->id,
			'nom' => $this->nom,
			'id_univers' => $this->id_univers,
			'slug' => $this->slug
		);
	}
}