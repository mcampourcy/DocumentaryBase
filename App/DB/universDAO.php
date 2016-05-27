<?php
namespace App\DB;

/**
 * Class universDAO
 * @package App\DB
 */

class universDAO extends DAO
{

    public function __construct(){
        parent::__construct();
    }

    public function getUnivers(){
        return $this->query('SELECT id, nom, position, icon FROM docs_univers');
    }

}