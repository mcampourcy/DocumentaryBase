<?php
namespace App\DB;

/**
 * Class rubriqueDAO
 * @package App\DB
 */

class rubriqueDAO extends DAO
{

    public function __construct(){
        parent::__construct();
    }

    public function getRubriques(){
        return $this->query('SELECT id, nom, id_univers FROM docs_rubriques');
    }

}