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
    public $idUnivers;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getIdUnivers()
    {
        return $this->idUnivers;
    }

    /**
     * @param mixed $id_univers
     */
    public function setIdUnivers($idUnivers)
    {
        $this->idUnivers = $idUnivers;
    }



}