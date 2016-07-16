<?php

namespace App\Model;

/**
 * Class menuModel
 * @package App\Model
 */

class menuModel
{

    public $id;
    public $nom;
    public $icon;
    public $rubrique;

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
			if(strlen($icon) < 150) {
				$this->icon = $icon;
			} else {
//				//renvoie une erreur (ici erreur argument invalide)
//				//on peut faire ses propre classes d'erreur-> il suffit qu'elle extend exception
				throw new \InvalidArgumentException("Le nom de l'icône doit être inférieur à 150 caractères");
			}
		} else {
			throw new \InvalidArgumentException("Le nom de l'icône doit etre une chaine de caractères");
		}
	}

	/**
	 * @return mixed
	 */
	public function getRubrique()
	{
		return $this->rubrique;
	}

	/**
	 * @param mixed $icon
	 */
	public function setRubrique($rubrique)
	{
		if(is_array($rubrique)) {
			$this->rubrique = $rubrique;
		} else {
			throw new \InvalidArgumentException("Erreur dans la rubrique");
		}
	}

}