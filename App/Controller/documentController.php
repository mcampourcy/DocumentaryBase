<?php

namespace App\Controller;
use App\DB\categoryDAO;
use App\DB\documentDAO;
use App\Model\documentModel;

/**
 * Class rubriqueController
 * @package App\Controller
 */

class documentController extends Controller
{

	private $DB;
    private $DB_cat;
	public $id_univers;

	public function __construct($name = null, $slug = null)
	{
        $page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page, $slug);
		$this->DB = new documentDAO();
        $this->DB_cat = new categoryDAO();
	}

	public function getAllDocuments()
	{
		$datas = $this->DB->getAllDocuments();
		try {
			$model = $this->callDocumentModel($datas);
		} catch(\InvalidArgumentException $e) {
			echo $e->getMessage();
		}
		$this->callView($model, 'documents');
	}

	public function formDocument($subcat_id = null, $doc_id = null){
        $datas = [];
        if($doc_id) $datas = $this->DB->getOneDocument($doc_id);
        try {
            $model = $this->callDocumentModel($datas);
        } catch(\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
        $this->callView($model, 'formDocument');
    }

    public function callDocumentModel($datas)
    {
        $dataArray = [];
        foreach ($datas as $data){
            $dataArray[] = new documentModel($data);
        }
        return $dataArray;
    }

}