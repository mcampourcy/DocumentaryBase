<?php

namespace App\Controller;
use App\DB\categoryDAO;
use App\Model\rubriqueModel;
use App\Model\universModel;

/**
 * Class menucontroller
 * @package App\Controller
 */

class menuController extends Controller
{

	private $DB;
	public $page;
	public $filename;

	public function __construct($page = null)
	{
		$this->page = ($page == null) ? __CLASS__ : $page;
		parent::__construct($this->page);
	}

	public function buildMenu()
	{
		$this->DB = new categoryDAO();
		$dataUnivers = $this->DB->getAllUnivers();
		try {
			$univers = $this->menuUniversModel($dataUnivers);
		} catch(\InvalidArgumentException $e) {
			echo $e->getMessage();
		}
		foreach($univers as $Univers){
			$dataRubriques = $this->DB->getAllRubriques($Univers->id);
			try {
				$model = $this->menuRubriqueModel($dataRubriques);
			} catch(\InvalidArgumentException $e) {
				echo $e->getMessage();
			}
			$Univers->rubrique = $model;
		}
		$datas = ['menuData' => $univers];
		return $datas['menuData'];
	}

	public function menuUniversModel($datas){
		$dataArray = [];
		foreach ($datas as $data){
			$dataArray[] = new universModel($data);
		}
		return $dataArray;
	}

	public function menuRubriqueModel($datas){
		$dataArray = [];
		foreach ($datas as $data){
			$dataArray[] = new rubriqueModel($data);
		}
		return $dataArray;
	}

}