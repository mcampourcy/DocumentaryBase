<?php

namespace App\Controller;
include 'functions.php';
use App\DB\documentDAO;
use App\Functions;
use App\Model\documentModel;
use App\Model\rubriqueModel;
use App\Model\universModel;

/**
 * Class rubriqueController
 * @package App\Controller
 */

class documentController extends Controller
{

	private $DB;
	public $id_univers;
	public $page;

	public function __construct($page = null)
	{
		$this->page = ($page == null) ? __CLASS__ : $page;
		parent::__construct($this->page);
		$this->DB = new documentDAO();
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

    public function callDocumentModel($datas)
    {
        $dataArray = [];
        foreach ($datas as $data){
            $dataArray[] = new documentModel($data);
        }
        return $dataArray;
    }

}