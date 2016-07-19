<?php

namespace App\Controller;
use App\DB\rubriqueDAO;
use App\Model\rubriqueModel;

/**
 * Class rubriqueController
 * @package App\Controller
 */

class rubriqueController extends Controller
{

	private $DB;
	public $id_univers;
	public $page;

	public function __construct($page = null)
	{
		$this->page = ($page == null) ? __CLASS__ : $page;
		parent::__construct($this->page);
		$this->DB = new rubriqueDAO();
	}

	public function getAllRubriques($id_univers = null)
	{
		$dataRubriques = $this->DB->getRubriques($id_univers);
		try {
			$model = $this->callRubriqueModel($dataRubriques);
		} catch(\InvalidArgumentException $e) {
			echo $e->getMessage();
		}
		$this->callView($model);
	}

	public function newRubrique($datas,$id = null)
	{
		$datas['slug'] = \Config\slug($datas['nom']);
		//on appelle le model avec le tableau de datas posté -> les vérifications se font dans l'hydrateur -> setter
		//renvoie un tableau d'objet
		try { //essaie de créer le model
			$model = new rubriqueModel($datas);
		} catch(\InvalidArgumentException $e) { //si erreur, on l'affiche (cf throw dans model)
			//ici, il catch l'invalid argument exception -> si erreur autre, le script remonte + haut (+haut parent : exception)
			echo $e->getMessage();
			//ici, on peut générer des logs avec les méthodes de $e
		}
		if($id == null) $this->DB->insertRubrique($model);
		else $this->DB->updateRubrique($model, $id);
	}

	public function delRubrique($id)
	{
		$this->DB->deleteRubrique($id);
	}

	public function callRubriqueModel($datas)
	{
		$dataArray = [];
		foreach ($datas as $data){
			$dataArray[] = new rubriqueModel($data);
		}
		return $dataArray;
	}
}