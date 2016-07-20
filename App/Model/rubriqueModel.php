<?php

namespace App\Model;

/**
 * Class rubriqueModel
 * @package App\Model
 */

class rubriqueModel
{

    private $id;
    public $nom;
    public $id_univers;
    public $univers;
    public $slug;

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
	public function getId_univers()
	{
		return $this->id_univers;
	}

	/**
	 * @param mixed $id_univers
	 */
	public function setId_univers($id_univers)
	{
		if(is_string($id_univers)) {
			if(strlen($id_univers) < 150) {
				$this->id_univers = $id_univers;
			} else {
				throw new \InvalidArgumentException("L'id_univers doit être inférieur à 150 caractères");
			}
		} else {
			throw new \InvalidArgumentException("L'id_univers doit etre une chaine de caractères");
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
		if(is_string($slug)) {
			$this->slug = $slug;
		} else {
			throw new \InvalidArgumentException("L'id doit etre un nombre");
		}
	}

	public function toArray() {
		return array(
			'nom' => $this->nom,
			'id_univers' => $this->id_univers,
			'slug' => $this->slug
		);
	}
}