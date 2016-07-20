<?php
namespace App\DB;

/**
 * Class categoryDAO
 * @package App\DB
 */

class categoryDAO extends DAO
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

    public function getRubriques($id_univers){
	    $query = 'SELECT r.id AS id, r.nom AS nom, u.nom AS univers, u.id AS univers_id
		FROM docs_rubriques r
		RIGHT JOIN docs_univers u ON r.id_univers = u.id';
	    if($id_univers) $query .= ' WHERE r.id_univers = '.$id_univers;
        return $this->query($query);
    }

	public function getRubrique($id_rubrique){
		$query = 'SELECT id, nom
		FROM docs_rubriques
		WHERE id = :id_rubrique';
        $datas = array('id_rubrique' => $id_rubrique);
		return $this->query($query, $datas);
	}

	public function insertRubrique($rubrique){
		//ATTENTION : SQL a besoin d'un tableau de données, pas d'objets
		$query = 'INSERT INTO docs_rubriques (nom, id_univers, cree_le, modifie_le, slug)
		VALUES (:nom, :id_univers, NOW() , NULL, :slug)';
		return $this->query($query, $rubrique);
	}

	public function updateRubrique($datas){
		$query = 'UPDATE docs_rubriques
		SET nom = :nom, id_univers = :id_univers, modifie_le = NOW()
		WHERE id = :id';
		return $this->query($query, $datas);
	}

	public function deleteRubrique($id){
		$query = 'DELETE FROM docs_rubriques WHERE id = :id';
		$datas = array('id' => $id);
		$this->query($query, $datas);
	}

}