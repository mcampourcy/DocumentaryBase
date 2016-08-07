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

	public function getAllDocuments($id_univers = null, $id_rubrique = null)
	{
		$dataDocuments = $this->DB->getAllDocuments($id_univers, $id_rubrique);
		try {
			$model = $this->callDocumentModel($dataDocuments);
		} catch(\InvalidArgumentException $e) {
			echo $e->getMessage();
		}
		$this->callView($model, 'documents');
	}

//	public function getRubrique($id_rubrique = null)
//	{
//        if($id_rubrique) {
//            $dataRubrique = $this->DB->getRubrique($id_rubrique);
//        } else {
//            $dataRubrique = [['id' => '', 'nom' => '', 'slug' => '', 'id_univers' => '']];
//        }
//        try {
//            $rubrique = $this->callRubriqueModel($dataRubrique);
//        } catch (\InvalidArgumentException $e) {
//            echo $e->getMessage();
//        }
//        foreach($rubrique as $Rubrique){
//            $dataUnivers = new universController('insertRubrique');
//            $univers = $dataUnivers->getAllUnivers();
//            $Rubrique->univers = $univers;
//        }
//        $datas = ['rubriqueData' => $rubrique];
//        $this->callView($datas['rubriqueData'], 'insertRubrique');
//	}
//
//	public function newRubrique($datas,$id = null)
//	{
//		$datas['slug'] = Functions::slug($datas['nom']);
//        if($id > 0) $datas['id'] = $id;
//		//on appelle le model avec le tableau de datas posté -> les vérifications se font dans l'hydrateur -> setter
//		//renvoie un tableau d'objet
//		try { //essaie de créer le model
//			$model = new rubriqueModel($datas);
//		} catch(\InvalidArgumentException $e) { //si erreur, on l'affiche (cf throw dans model)
//			//ici, il catch l'invalid argument exception -> si erreur autre, le script remonte + haut (+haut parent : exception)
//			echo $e->getMessage();
//			//ici, on peut générer des logs avec les méthodes de $e
//		}
//		$rubrique = $model->toArray();
//		if($id == 0) $id_rubrique = $this->DB->insertRubrique($rubrique);
//		else $id_rubrique = $this->DB->updateRubrique($rubrique);
//		return $id_rubrique;
//	}
//
//	public function delRubrique($id)
//	{
//		$this->DB->deleteRubrique($id);
//	}

    public function callDocumentModel($datas)
    {
        $dataArray = [];
        foreach ($datas as $data){
            $dataArray[] = new documentModel($data);
        }
        return $dataArray;
    }

//	public function callRubriqueModel($datas)
//	{
//		$dataArray = [];
//		foreach ($datas as $data){
//			$dataArray[] = new rubriqueModel($data);
//		}
//		return $dataArray;
//	}
//
//	public function callUniversModel($datas)
//	{
//		$dataArray = [];
//		foreach ($datas as $data){
//			$dataArray[] = new universModel($data);
//		}
//		return $dataArray;
//	}
}