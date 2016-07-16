<?php

namespace App\Controller;
use App\DB\universDAO;
use App\Model\universModel;

/**
 * Class universController
 * @package App\Controller
 */

class universController extends Controller
{
	private $DB;

	public function __construct($test = null){
		$page = ($test == null) ? __CLASS__ : $test;
		parent::__construct($page);
		$this->DB = new universDAO();
	}

	public function getAllUnivers(){
		$dataUnivers = $this->DB->getUnivers();
		$model = $this->callUniversModel($dataUnivers);
		$this->callView($model);
	}

	public function callUniversModel($datas){
		$dataArray = [];
		foreach ($datas as $data){
			$dataArray[] = new universModel($data);
		}
		return $dataArray;
	}
}