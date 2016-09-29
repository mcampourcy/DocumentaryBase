<?php
namespace Modules\Media\DAO;
use Core\DAO\DAO;
use Modules\Media\Models\MediaModel;

/**
 * Class MediaDAO
 * @package Modules\Media\DAO
 */

class MediaDAO extends DAO
{

    /**
     * MediaDAO constructor.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * @return array|string
     */
    public function getAllMedias(){
        $sql =  $this->query('SELECT id, type, creation_date, last_update FROM docs_medias ORDER BY creation_date DESC');
        try {
            $model = $this->callMediaModel($sql);
            return $model;
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    public function getMediasDocument($id){
        $sql = 'SELECT m.id AS id, m.type AS type, m.title AS title
		FROM docs_documents d
        LEFT JOIN documents_medias dm ON dm.id_document = d.id
        LEFT JOIN docs_medias m ON m.id = dm.id_media
        WHERE d.id = :id';
        $datas = array('id' => $id);
        $query = $this->query($sql, $datas);
        try {
            $model = $this->callMediaModel($query);
            return $model;
        } catch(\InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $datas
     * @return string
     */
    public function uploadMedia($datas){
        //check the datas in the model
        $model = new MediaModel();
        $media = $model->checkUpload($datas);
        return $media;
    }

    /**
     * @param $datas
     * @return array|int|string
     */
    public function insertMedia($datas){
        $sql = 'INSERT INTO docs_medias (id, type, title, creation_date, last_update) VALUES ("", :type, :title, NOW(), NULL)';
        $insert = $this->query($sql, $datas);
        return $insert;
    }

    /**
     * @param $datas
     * @return array|int|string
     */
    public function deleteMedia($id){
        $datas = ['id' => $id];
        $sql = 'DELETE FROM docs_medias WHERE id = :id';
        $this->query($sql, $datas);
    }

    /**
     * @param $datas
     * @return array
     */
    public function callMediaModel($datas){
        $data_array = [];
        if(array_key_exists(0, $datas)) {
            foreach ($datas as $data) {
                $data_array[] = new MediaModel($data);
            }
        } else {
            $data_array[] = new MediaModel($datas);
        }
        return $data_array;
    }

}