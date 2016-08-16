<?php
use App\Controller;
require "../vendor/autoload.php";
require "../config/config.php";
require "../config/functions.php";

/*on créé une instance de Slim, avec le debug*/
$app = new \Slim\Slim([
	"debug" => true
]);


/* on créé une route, avec la méthode get.
 * 1er paramètre : le nom de la route (www.monsite.fr/maroute)
 * 2ème paramètre : la fonction de callback. ici, elle permet d'appeler le controller adéquat
 * */
$app->get('/', function(){
    $controller = new Controller\homeController();
    $controller->getAllHome();
});

//CATEGORY
$app->get('/categories', function ($slug = 'categories'){
    $controller = new Controller\categoryController(null, $slug);
    $controller->getAllCategories();
});

$app->get('/new/category(/:id)', function ($id = null, $slug = 'categories'){
    $controller = new Controller\categoryController(null, $slug);
    $controller->formCategory($id);
});

$app->post('/new/category/post(/:id)', function ($id = null, $slug = 'categories') use ($app){
    $req = $app->request(); //get the POST datas
    $controller = new Controller\categoryController(null, $slug);
    //$req->post() -> send the datas in an array
    $result = $controller->newCategory($req->post(), $id);
    if($result > 0) $app->redirect(FO_URL.'categories');
});

$app->get('/delete/category/:id', function($id) use($app){
	$controller = new Controller\categoryController();
	$controller->deleteCategory($id);
	$app->redirect(FO_URL.'categories');
});

//DOCUMENTS
$app->get('/documents', function ($slug = 'documents'){
    $controller = new Controller\documentController(null, $slug);
    $controller->getAllDocuments();
});

$app->get('(/:cat_id)(/:cat_name)(/:subcat_id)(/:subcat_name)/new/document(/doc_id)', function ($cat_id = null, $cat_name = null, $subcat_id = null, $subcat_name = null, $doc_id = null){
    $controller = new Controller\documentController();
    $controller->formDocument($subcat_id, $doc_id);
});

$app->get('(/:cat_id)(/:cat_name)(/:subcat_id)(/:subcat_name)', function ($cat_id = null, $cat_name = null, $subcat_id = null, $subcat_name = null){
    $controller = new Controller\documentController(null, $subcat_name);
    $controller->getAllDocuments();
});

$app->run();
