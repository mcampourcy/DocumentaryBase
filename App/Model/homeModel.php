<?php

namespace App\Model;

/**
 * Class homeModel
 * @package App\Model
 */

class homeModel
{

    //on prépare les attributs
    private $id;
    public $titre;
    public $sousTitre;
    public $description;

    //on construit : en paramètre, un tableau vide par défaut, rempli par le controller avec le nom des attributs
    public function __construct($params = [])
    {
        //on donne une valeur par défaut aux attributs
        // /!\ INDISPENSABLE ????
        $this->id = 0;
        $this->titre = '';
        $this->sousTitre = '';
        $this->description = '';
        //on appelle la méthode hydrate, en lui passant le tableau en paramètres
        $this->hydrate($params);
    }

    //par défaut, le tableau est vide, sinon rempli par construct et le controller avec le nom des attributs
    public function hydrate($params = []) {
        //pour chaque ligne du tableau, on associe une méthode (= nom de chaque attribut) en clé à une valeur (= valeur de chaque attribut)
        foreach ($params as $method => $value){
            //on définit le setter à partir du nom de la méthode - ex : setName
            $setter = "set" . ucfirst($method);
            //si le setter existe bien dans la classe, alors, le setter vaut la valeur passée dans le tableau
            if(method_exists($this, $setter)){
                //methode_exists - Vérifie si la méthode existe pour l'objet object fourni ('bool method_exists ( mixed $object , string $method_name )')
                $this->$setter($value);
            }
        }
    }

    //Le getter récupère l'attribut et sa valeur par défaut. Le setter donne une valeur à l'attribut, soit celle par défaut, soit une autre.

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
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
//	    if(is_string($titre)) {
//		    if(strlen($titre) < 10) {
	            $this->titre = $titre;
//		    } else {
//			    throw new \InvalidArgumentException("Le titre doit être inférieur à 10 caractères");
//		    }
//	    }
    }

    /**
     * @return string
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * @param string $sousTitre
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}