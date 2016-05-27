<?php
namespace App\DB;

/**
 * Class homeDAO
 * @package App\DB
 */

class homeDAO extends DAO
{

    //les classes enfants de DAO permettent d'avoir les requêtes dans des fichiers différents

    public function __construct()
    {
        parent::__construct();
        //la méthode construct descend de DAO : elle fait la connexion à la base de données
    }

    public function getAll(){
        return $this->query('SELECT * FROM home');
        //on renvoie un tableau avec toutes les données de la table
    }

}