<?php
namespace Modules\Document\DAO;
use Core\DAO\DAO;
use Modules\Document\Models\DocumentModel;

/**
 * Class DocumentDAO
 * @package Modules\Document\DAO
 */
class DocumentDAO extends DAO
{

    /**
     * DocumentDAO constructor
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * @param null $cat_id
     * @param null $subcat_id
     * @return array|string
     */
    public function getAllDocuments($cat_id = null, $subcat_id = null){
        $query = 'SELECT 
            doc.id, doc.title, doc.subtitle, doc.link, doc.text_link, doc.creation_date, doc.last_update,
            cat.id AS cat_id, cat.name AS cat_name, 
            subcat.id AS subcat_id, subcat.name AS subcat_name
            FROM docs_documents AS doc
            LEFT JOIN docs_categories AS cat
            ON cat.id = doc.cat_id
            LEFT JOIN docs_categories AS subcat
            ON subcat.id = doc.subcat_id
        WHERE 1';
        if($cat_id) $query .= ' AND cat_id = :cat_id';
        if($subcat_id) $query .= ' AND subcat_id = :subcat_id';
        $datas = array('cat_id' => $cat_id, 'subcat_id' => $subcat_id);
        $sql = $this->query($query, $datas);
        try {
            $model = $this->callDocumentModel($sql);
            return $model;
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }
    /**
     * @param $param
     * @return array|string
     */
    public function getDocumentHome($param){
        $sql = 'SELECT 
        doc.id, doc.title, doc.subtitle, doc.link, doc.text_link, doc.creation_date, doc.last_update,
        cat.id AS cat_id, cat.name AS cat_name, 
        subcat.id AS subcat_id, subcat.name AS subcat_name
        FROM docs_documents AS doc
        LEFT JOIN docs_categories AS cat
        ON cat.id = doc.cat_id
        LEFT JOIN docs_categories AS subcat
        ON subcat.id = doc.subcat_id
        WHERE 1';
        if($param === 'all_home') $sql .= ' AND flag_home = 1 ORDER BY creation_date DESC LIMIT 5';
        elseif($param === 'last_create') $sql .= ' AND flag_home = 0 ORDER BY creation_date DESC LIMIT 5';
        elseif($param === 'last_update') $sql .= ' AND flag_home = 0 ORDER BY last_update DESC LIMIT 5';
        $datas = $this->query($sql);
        try {
            $model = $this->callDocumentModel($datas);
            return $model;
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param null $id
     * @return array|string
     */
    public function getDocumentById($id = null){
        if($id == null){
            $model = [];
            $model[] = new documentModel();
            return $model;
        } else {
            $query = 'SELECT 
            doc.id, doc.title, doc.subtitle, doc.text1, doc.text2, doc.link, doc.text_link, doc.creation_date, doc.last_update,
            cat.id AS cat_id, cat.name AS cat_name, 
            subcat.id AS subcat_id, subcat.name AS subcat_name
            FROM docs_documents AS doc
            LEFT JOIN docs_categories AS cat
            ON cat.id = doc.cat_id
            LEFT JOIN docs_categories AS subcat
            ON subcat.id = doc.subcat_id
            WHERE doc.id = :id';
            $datas = array('id' => $id);
            $sql = $this->query($query, $datas);
            try {
                $model = $this->callDocumentModel($sql);
                return $model;
            } catch(\InvalidArgumentException $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * @param $datas
     * @return array|int|string
     */
    public function insertDocument($datas){
        $ids_images = ($datas['ids_images'] > 0) ? $datas['ids_images'] : null;
        unset($datas['files'], $datas['ids_images']);
        try {
            $this->callDocumentModel($datas);
            $datas = $this->toArray($datas);
            $datas['id'] = '';
            $query = 'INSERT INTO docs_documents (id, title, subtitle, text1, text2, cat_id, subcat_id, link, text_link, flag_home, creation_date, last_update)
            VALUES (:id, :title, :subtitle, :text1, :text2, :cat_id, :subcat_id, :link, :text_link, :flag_home, NOW(), NULL)';
            $id = $this->query($query, $datas);
            if($ids_images){
                $this->deleteMediaDocumentById($id);
                $this->insertMediaDocument($ids_images, $id);
            }
            return $id;
        } catch(\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * @param $datas
     * @return array|int|string
     */
    public function updateDocument($datas){
        if($datas['ids_images'] > 0) {
            $this->deleteMediaDocumentById($datas['id']);
            $this->insertMediaDocument($datas['ids_images'], $datas['id']);
        }
        unset($datas['files'], $datas['ids_images']);
        try {
            $this->callDocumentModel($datas);
            $datas = $this->toArray($datas);
            //WARNING : SQL needs a array of datas, not objects
            $query = 'UPDATE docs_documents
		SET title = :title, subtitle = :subtitle, text1 = :text1, text2 = :text2, cat_id = :cat_id, 
		subcat_id = :subcat_id, link = :link, text_link = :text_link, flag_home = :flag_home, last_update = NOW()
		WHERE id = :id';
            return $this->query($query, $datas);
        } catch(\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $files
     * @param $doc_id
     */
    public function insertMediaDocument($files, $doc_id){
        $sql = 'INSERT INTO documents_medias (id_document, id_media) VALUES (:id_document, :id_media)';
        $medias = explode(',', $files);
        foreach ($medias as $media){
            $datas = array('id_document' => $doc_id, 'id_media' => $media);
            $this->query($sql, $datas);
        }
    }

    /**
     * @param $id
     */
    public function deleteDocumentById($id){
        $query = 'DELETE FROM docs_documents WHERE id = :id';
        $datas = array('id' => $id);
        $this->query($query, $datas);
    }

    /**
     * @param $id
     */
    public function deleteMediaDocumentById($id){
        $sql = 'DELETE FROM documents_medias WHERE id_document = :id';
        $datas = array('id' => $id);
        return $this->query($sql, $datas);
    }

    /**
     * @param $datas
     * @return array
     */
    public function callDocumentModel($datas)
    {
        $data_array = [];
        if(array_key_exists(0, $datas)) {
            foreach ($datas as $data) {
                $data_array[] = new DocumentModel($data);
            }
        } else {
            $data_array[] = new DocumentModel($datas);
        }
        return $data_array;
    }

}