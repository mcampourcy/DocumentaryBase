<?php
namespace App\View;

use App\Controller\Config;

class generateView
{

    //la vue a un attribut : le nom du template correspondant à la vue. Le nom de ce template est transmis par le controller
    public $template;
	public $filename;
    
    public function __construct($filename)
    {
	    $this->filename = $filename.'Data';
        //on construit l'objet avec l'url complète du template
//        $this->template = TEMPLATE_ROOT.$filename.'View.php';
	    $this->template = TEMPLATE_ROOT.'layout.php';
    }

    //La fonction render permet d'afficher la vue.
    //En paramètre, un tableau de données vide par défaut, mais rempli par le controller avec un tableau d'objets correspondant aux données.
    public function render($dataArray = []){
        //*si le fichier correspondant à la vue existe, on remplit un tableau avec le tableau d'objets (on a donc un tableau dans un tableau)
        /*ex : array (size=1)
              'data' =>
                array (size=2)
                  0 =>
                    object(App\Model)
                      private 'id' => string '1' (length=1)
                      private 'name' => string 'TEST1' (length=5)
        */
        if(file_exists($this->template)){
            $datas = [$this->filename => $dataArray];
            //on extrait les données du tableau, et on les mets en mémoire, pour ne pas les afficher tout de suite
			extract($datas);
	        //extract — Importe les variables dans la table des symboles
	        // paramètre array - Un tableau associatif. Cette fonction crée les variables dont les noms sont les index de ce tableau, et leur affecte la valeur associée
	        ob_start(); //ob_start() démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
            //on appelle le template de la vue
	        require_once $this->template;
            //on affiche ce qu'on a mis en mémoire (dans le template, donc) et on vide la mémoire
            return ob_end_flush(); //ob_end_flush — Envoie les données du tampon de sortie et éteint la temporisation de sortie
        }
    }

}