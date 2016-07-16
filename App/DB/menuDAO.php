<?php
namespace App\DB;

/**
 * Class menuDAO
 * @package App\DB
 */

class menuDAO extends DAO
{

    public function __construct(){
        parent::__construct();
    }

	public function getUnivers(){
		return $this->query('SELECT id, nom, position, icon FROM docs_univers');
	}

    public function getRubriques($id_univers){
	    $query = 'SELECT r.id AS id, r.nom AS nom
		FROM docs_rubriques r
		RIGHT JOIN docs_univers u ON r.id_univers = u.id';
	    if($id_univers) $query .= ' WHERE r.id_univers = '.$id_univers;
        return $this->query($query);
    }

}