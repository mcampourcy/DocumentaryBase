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

    public function getAllDocuments(){
        $query = 'SELECT id, titre FROM docs_documents';
        return $this->query($query);
    }

    public function getOneDocument($id){
        $query = 'SELECT id, titre FROM docs_documents WHERE id = :id';
        $datas = array('id' => $id);
        return $this->query($query, $datas);
    }

}