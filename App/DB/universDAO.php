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
        return $this->query('SELECT id, nom, position, icon, slug FROM docs_univers');
    }

	public function addUnivers($nom, $icon = null){
		return $this->query('INSERT INTO docs_univers VALUES "", "'.$nom.'", "", "'.$icon.'", "'.slug($nom).'"');
	}

}