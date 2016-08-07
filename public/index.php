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

//CATEGORY
$app->get('/categories', function (){
    $controller = new Controller\categoryController();
    $controller->getAllCategories();
});

$app->get('/new/category(/:id)', function ($id = null) use ($app){
    $controller = new Controller\categoryController();
    $controller->formCategory($id);
});

$app->post('/new/category/post(/:id)', function ($id = null) use ($app){
    $req = $app->request(); //get the POST datas
    $controller = new Controller\categoryController();
    //$req->post() -> send the datas in an array
    $result = $controller->newCategory($req->post(), $id);
    if($result > 0) $app->redirect(FO_URL.'categories');
});

$app->get('/delete/category/:id', function($id) use($app){
	$controller = new Controller\categoryController();
	$controller->deleteCategory($id);
	$app->redirect(FO_URL.'categories');
});

//$app->post('/new/univers/post(/:id)', function ($id=null) use($app){
//	$req = $app->request(); //récupère les données envoyées en POST
//	//$req->post() renvoie les données sous forme de tableau
//	$controller = new Controller\universController();
//	$result = $controller->newUnivers($req->post(), $id);
//	if($result > 0) $app->redirect(FO_URL.'univers');
//});

////UNIVERS
//$app->get('/univers', function(){
//	$controller = new Controller\universController();
//	$controller->getAllUnivers();
//});
//
//$app->get('/new/univers(/:id)', function($id = null) use($app){
//	$controller = new Controller\universController();
//	$controller->getUnivers($id);
//});
//
//$app->post('/new/univers/post(/:id)', function ($id=null) use($app){
//	$req = $app->request(); //récupère les données envoyées en POST
//	//$req->post() renvoie les données sous forme de tableau
//	$controller = new Controller\universController();
//	$result = $controller->newUnivers($req->post(), $id);
//	if($result > 0) $app->redirect(FO_URL.'univers');
//});
//
//$app->get('/delete/univers/:id', function($id) use($app){
//	$controller = new Controller\universController();
//	$controller->delUnivers($id);
//	$app->redirect(FO_URL.'univers');
//});
//
////RUBRIQUES
//$app->get('/rubriques', function(){
//	$controller = new Controller\rubriqueController();
//	$controller->getAllRubriques();
//});
//
//$app->get('/new/rubrique(/:id)', function($id = null) use($app){
//    $controller = new Controller\rubriqueController();
//    $controller->getRubrique($id);
//});
//
//$app->post('/new/rubrique/post(/:id)', function ($id = null) use($app){
//	$req = $app->request(); //récupère les données envoyées en POST
//	//$req->post() renvoie les données sous forme de tableau
//	$controller = new Controller\rubriqueController();
//	$result = $controller->newRubrique($req->post(), $id);
//	if($result > 0) $app->redirect(FO_URL.'rubriques');
//});
//
//$app->get('/delete/rubrique/:id', function($id) use($app){
//	$controller = new Controller\rubriqueController();
//	$controller->delRubrique($id);
//	$app->redirect(FO_URL.'rubriques');
//});
//
////DOCUMENTS
//$app->get('/univers-:id', function($id) use($app){
//    $controller = new Controller\documentController();
//    $controller->getAllDocuments($id);
//});

$app->run();
