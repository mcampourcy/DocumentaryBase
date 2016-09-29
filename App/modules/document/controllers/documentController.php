<?php

namespace Modules\Document\Controllers;
use Core\Controllers\Controller;
use Modules\Category\DAO\CategoryDAO;
use Modules\Document\DAO\DocumentDAO;
use Modules\Media\DAO\MediaDAO;

/**
 * Class DocumentController
 * @package Modules\Document\Controllers
 */

class DocumentController extends Controller
{

    /**
     * @var DocumentDAO
     */
	private $_DB;
    /**
     * @var CategoryDAO
     */
	private $_DB_cat;
    /**
     * @var MediaDAO
     */
    private $_DB_media;

    /**
     * DocumentController constructor.
     * @param null $name
     */
	public function __construct($cat_id = null, $subcat_id = null, $name = null)
	{
        $page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page, substr($cat_id, 0, 4), substr($subcat_id, 0, 7));
		$this->_DB = new DocumentDAO();
        $this->_DB_cat = new CategoryDAO();
        $this->_DB_media = new MediaDAO();
	}

    /**
     * @param $id
     */
    public function getDocumentById($id)
    {
        $datas = $this->_DB->getDocumentById($id);
        $datas['medias_doc'] = $this->_DB_media->getMediasDocument($id);
        if(is_array($datas)) {
            $this->callView($datas, 'document', 'document');
        } else {
            echo $datas;
        }
    }

    /**
     * @param null $cat_id
     * @param null $subcat_id
     */
	public function getAllDocuments($cat_id = null, $subcat_id = null)
	{
		$datas = $this->_DB->getAllDocuments($cat_id, $subcat_id);
        if(is_array($datas)) {
            $this->callView($datas, 'documents', 'document');
        } else {
            echo $datas;
        }
	}

    /**
     * @param null $id
     * @param null $param
     */
    public function setDocumentForm($id = null, $param = null){
        //call all the categories to list them
        $datas_allcat = $this->_DB_cat->getAllCategories();

        $datas = $this->_DB->getDocumentById($id);
        $datas['duplicate'] = ($param === 'duplicate') ? true : false;
        $datas['cat_list'] = $datas_allcat;

        $datas['medias_doc'] = null;
        if($id != null) $datas['medias_doc'] = $this->_DB_media->getMediasDocument($id);

        $this->callView($datas, 'documentForm', 'document');
    }

    /**
     * @param $datas
     * @param null $id
     * @param null $duplicate
     * @return array|int|string
     */
    public function postDocumentForm($datas, $id = null, $param = null){
        $datas['flag_home'] = isset($datas['flag_home']) ? 1 : 0;
        foreach ($datas as $k => $data){
//            $datas[$k] = htmlspecialchars($data);
        }

        if($id == null || $param === 'duplicate') $id_doc = $this->_DB->insertDocument($datas);
        else $id_doc = $this->_DB->updateDocument($datas);

        return $id_doc;
    }

    public function getDocumentsHome(){
        $doc_home = $this->_DB->getDocumentHome('all_home');
        $last_create = $this->_DB->getDocumentHome('last_create');
        $last_update = $this->_DB->getDocumentHome('last_update');

        $datas = [];
        if(is_array($doc_home)) {
            $datas['home'] = $doc_home;
        } else {
            echo $doc_home;
        }
        if(is_array($doc_home)){
            $datas['last_create'] = $last_create;
        } else {
            echo $last_create;
        }
        if(is_array($doc_home)) {
            $datas['last_update'] = $last_update;
        } else {
            echo $last_update;
        }
        $this->callView($datas, 'home', 'document');
    }

    /**
     * @param $id
     */
    public function deleteDocumentById($id){
        $this->_DB->deleteDocumentById($id);
    }

}