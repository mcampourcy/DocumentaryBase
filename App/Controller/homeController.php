<?php

namespace App\Controller;
use App\DB\homeDAO;
use App\Model\homeModel;

/**
 * Class homeController
 * @package App\Controller
 */

class homeController extends Controller
{

	private $DB;

	public function __construct($page = null){
		$page = ($page == null) ? __CLASS__ : $page;
		parent::__construct($page);
		//on instancie l'accès à la base en créant un nouvel objet de connexion
		$this->DB = new homeDAO();
	}

	public function getAllHome(){
        //on récupère toutes les données
        $dataHome = $this->DB->getAll();
        //on appelle la méthode interne pour appeler le modèle, avec les données en paramètres
        $model = $this->callHomeModel($dataHome);
		//on génère la vue
		$this->callView($model);
    }

    public function callHomeModel($datas){
        //on prépare le tableau de données, vide pour le moment
        $dataArray = [];
        /*on boucle : pour chaque donnée récupérée en paramètre, on instancie le modèle, et on créé un tableau d'objets à partir des données.
            * ex :
            * array (size=1)
            *	  0 =>
            *	    object(App\Model)
            *	      private 'id' => string '1' (length=1)
            *	      private 'name' => string 'TEST1' (length=5)
            *	      private 'description' => string 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' (length=56)
            */
        foreach ($datas as $data){
            $dataArray[] = new homeModel($data);
        }
        //on retourne le tableau de données
        return $dataArray;
    }
    
}