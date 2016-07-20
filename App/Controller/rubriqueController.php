<?php

namespace App\Controller;
include 'functions.php';
use App\DB\categoryDAO;
use App\Functions;
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
		$this->DB = new categoryDAO();
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

	public function getRubrique($id_rubrique)
	{
		$dataRubrique = $this->DB->getRubrique($id_rubrique);
		try {
			$rubrique = $this->callRubriqueModel($dataRubrique);
		} catch(\InvalidArgumentException $e) {
			echo $e->getMessage();
		}
        foreach($rubrique as $Rubrique){
            $dataUnivers = $this->DB->getUnivers();
            try {
                $univers = $this->callRubriqueModel($dataUnivers);
            } catch(\InvalidArgumentException $e) {
                echo $e->getMessage();
            }
        }
        $datas = ['rubriqueData' => $univers];
        var_dump($datas);
//        return $datas['menuData'];
	}

	public function newRubrique($datas,$id = null)
	{
		$datas['slug'] = Functions::slug($datas['nom']);
		//on appelle le model avec le tableau de datas posté -> les vérifications se font dans l'hydrateur -> setter
		//renvoie un tableau d'objet
		try { //essaie de créer le model
			$model = new rubriqueModel($datas);
		} catch(\InvalidArgumentException $e) { //si erreur, on l'affiche (cf throw dans model)
			//ici, il catch l'invalid argument exception -> si erreur autre, le script remonte + haut (+haut parent : exception)
			echo $e->getMessage();
			//ici, on peut générer des logs avec les méthodes de $e
		}
		$rubrique = $model->toArray();
		if($id == null) $id_rubrique = $this->DB->insertRubrique($rubrique);
		else $id_rubrique = $this->DB->updateRubrique($rubrique, $id);
		return $id_rubrique;
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