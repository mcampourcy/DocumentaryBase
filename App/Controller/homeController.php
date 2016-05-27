<?php

namespace App\Controller;
use App\DB\homeDAO;
use App\Model\homeModel;
use App\View\generateView;

/**
 * Class homeController
 * @package App\Controller
 */

class homeController
{

    public function getAllHome(){
        //on instancie l'accès à la base en créant un nouvel objet de connexion
        $getAll = new homeDAO();
        //on récupère toutes les données
        $dataHome = $getAll->getAll();
        //on appelle la méthode interne pour appeler le modèle, avec les données en paramètres
        $model = $this->callHomeModel($dataHome);
        //on instancie la vue
        $view = new generateView('home');
        //on envoie les données dans la vue
        $view->render($model);
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