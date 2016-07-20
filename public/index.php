<?php
use App\Controller;
require "../vendor/autoload.php";
require "../config/config.php";
require "../config/functions.php";

/*on créé une instance de Slim, avec le debug*/
$app = new \Slim\Slim([
	"debug" => true
]);

//on renseigne le dossier des vues pour les templates
$view = $app->view();
$view->setTemplatesDirectory(TEMPLATE_ROOT);

/* on créé une route, avec la méthode get.
 * 1er paramètre : le nom de la route (www.monsite.fr/maroute)
 * 2ème paramètre : la fonction de callback. ici, elle permet d'appeler le controller adéquat
 * */
$app->get('/', function(){
    $controller = new Controller\homeController();
    $controller->getAllHome();
});

$app->get('/univers', function(){
    $controller = new Controller\universController();
    $controller->getAllUnivers();
});

$app->get('/rubriques', function(){
	$controller = new Controller\rubriqueController();
	$controller->getAllRubriques();
});

$app->get('/new/rubrique(/:id)', function($id) use($app){
    $controller = new Controller\rubriqueController();
    $result = $controller->getRubrique($id);
//    var_dump($result);
});

$app->post('/new/rubrique/post', function () use($app){
	$req = $app->request(); //récupère les données envoyées en POST
	//$req->post() renvoie les données sous forme de tableau
	$controller = new Controller\rubriqueController();
	$result = $controller->newRubrique($req->post());
	if($result > 0) $app->redirect(PUBLIC_ROOT.'rubriques');
});

$app->get('/delete/rubrique/:id', function($id) use($app){
	$controller = new Controller\rubriqueController();
	$controller->delRubrique($id);
	$app->redirect(PUBLIC_ROOT.'rubriques');
});

$app->run();
