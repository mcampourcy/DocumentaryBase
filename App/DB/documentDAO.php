<?php
namespace App\DB;

/**
 * Class documentDAO
 * @package App\DB
 */
class documentDAO extends DAO
{

    public function __construct(){
        parent::__construct();
    }

    public function getAllDocuments($id_univers = null, $id_rubrique = null){
        $query = 'SELECT d.id AS id, d.titre AS titre, 
        u.nom AS univers, u.id AS univers_id,
        r.nom AS rubrique, r.id AS rubrique_id
		FROM docs_documents d
		RIGHT JOIN docs_univers u ON d.id_univers = u.id
		RIGHT JOIN docs_rubriques r ON d.id_rubrique = r.id';
        return $this->query($query);
    }

//	public function getRubrique($id_rubrique = null){
//		$query = 'SELECT id, nom, slug, id_univers
//		FROM docs_rubriques
//		WHERE id = :id_rubrique';
//        $datas = array('id_rubrique' => $id_rubrique);
//		return $this->query($query, $datas);
//	}
//
//	public function insertRubrique($rubrique){
//		//ATTENTION : SQL a besoin d'un tableau de données, pas d'objets
//		$query = 'INSERT INTO docs_rubriques (id, nom, id_univers, cree_le, modifie_le, slug)
//		VALUES (:id, :nom, :id_univers, NOW() , NULL, :slug)';
//		return $this->query($query, $rubrique);
//	}
//
//	public function updateRubrique($datas){
//		$query = 'UPDATE docs_rubriques
//		SET nom = :nom, id_univers = :id_univers, modifie_le = NOW(), slug = :slug
//		WHERE id = :id';
//		return $this->query($query, $datas);
//	}
//
//	public function deleteRubrique($id){
//		$query = 'DELETE FROM docs_rubriques WHERE id = :id';
//		$datas = array('id' => $id);
//		$this->query($query, $datas);
//	}

}