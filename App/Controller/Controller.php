<?php

namespace App\Controller;
use App\View\generateView;

/**
 * Class Controller
 * @package App\Controller
 */
class Controller
{
	public $name;
	public $menu;

	/**
	 * Controller constructor.
	 * Extract the name of the class Controller to show the view that correspond
	 * @param $class
	 */
	public function __construct($page){
		if(class_exists($page)){
			//ReflectionClass -  La classe ReflectionClass rapporte des informations sur une classe.
			//On récupère toutes les infos sur la class donnée en paramètres
			$this->name = new \ReflectionClass($page);
			//ReflectionClass::getShortName -  Récupère le nom court d'une classe, c'est-à-dire, la partie sans l'espace de noms.
			//On récupère le nom de la class, auquel on enlève "Controller"
			$this->name = explode('Controller', $this->name->getShortName());
			//On passe le nom en minuscule, par sécurité
			$this->name = (strtolower($this->name[0]));
		} else {
			$this->name = $page;
		}
		return $this->name;
	}

	public function callView($model, $name = null){
		if($name) $this->name = $name;
		//on instancie la vue
		$view = new generateView($this->name);
		//on envoie les données dans la vue
		$view->render($model);
	}

}