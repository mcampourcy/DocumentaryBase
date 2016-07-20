<?php

namespace App\Controller;
use App\DB\categoryDAO;
use App\Model\universModel;

/**
 * Class universController
 * @package App\Controller
 */

class universController extends Controller
{
	private $DB;

	public function __construct($name = null){
		$page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page);
		$this->DB = new categoryDAO();
	}

	public function getAllUnivers(){
		$dataUnivers = $this->DB->getUnivers();
		$model = $this->callUniversModel($dataUnivers);
        if($this->name == 'insertRubrique'){
            return $model;
        } else {
            $this->callView($model);
        }
		
	}

	public function callUniversModel($datas){
		$dataArray = [];
		foreach ($datas as $data){
			$dataArray[] = new universModel($data);
		}
		return $dataArray;
	}
}