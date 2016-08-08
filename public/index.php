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

$app->get('/new/category(-:id)', function ($id = null) use ($app){
    $controller = new Controller\categoryController();
    $controller->formCategory($id);
});

$app->post('/new/category/post(-:id)', function ($id = null) use ($app){
    $req = $app->request(); //get the POST datas
    $controller = new Controller\categoryController();
    //$req->post() -> send the datas in an array
    $result = $controller->newCategory($req->post(), $id);
    if($result > 0) $app->redirect(FO_URL.'categories');
});

$app->get('/delete/category-:id', function($id) use($app){
	$controller = new Controller\categoryController();
	$controller->deleteCategory($id);
	$app->redirect(FO_URL.'categories');
});

//DOCUMENTS
$app->get('/documents', function (){
    $controller = new Controller\documentController();
    $controller->getAllDocuments();
});

$app->get('/:cat_name-:cat_id/:subcat_name-:subcat_id', function ($cat_id, $subcat_id) use($app){
    $controller = new Controller\documentController();
    $controller->getAllDocuments();
});

$app->run();
