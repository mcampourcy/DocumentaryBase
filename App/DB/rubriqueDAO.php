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

    public function getRubriques($id_univers){
	    $query = 'SELECT r.id AS id, r.nom AS nom, u.nom AS univers
		FROM docs_rubriques r
		RIGHT JOIN docs_univers u ON r.id_univers = u.id';
	    if($id_univers) $query .= ' WHERE r.id_univers = '.$id_univers;
        return $this->query($query);
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