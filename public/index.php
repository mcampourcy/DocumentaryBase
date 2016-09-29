<?php
require "../config/config.php";
require "../config/functions.php";

require PRIVATE_ROOT.'lib/Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require PRIVATE_ROOT.'autoload.php';
Autoloader::register();

/*create a new Slim instance, with debug on (for dev ONLY)*/
$app = new \Slim\Slim([
	"debug" => true
]);

/* create a route, with get method
 * first parameter : route name (www.mysite.fr/myroute)
 * seconde parameter : callback function
 * */

//Home
$app->get('/', function(){
    $controller = new \Modules\Document\Controllers\DocumentController();
    $controller->getDocumentsHome();
});

//DOCUMENTS

//Documents - list
$app->get('/documents(/cat-:cat_id)(/subcat-:subcat_id)', function ($cat_id = null, $subcat_id = null){
    $controller = new \Modules\Document\Controllers\DocumentController($cat_id, $subcat_id);
    $controller->getAllDocuments($cat_id, $subcat_id);
});

//Document - detail
$app->get('/document/detail/cat-:cat_id/subcat-:subcat_id/doc-:doc_id', function ($cat_id, $subcat_id, $doc_id){
    $controller = new \Modules\Document\Controllers\DocumentController($cat_id, $subcat_id);
    $controller->getDocumentById($doc_id);
});

//Document - create / update - form
$app->get('/document/new(/cat-:cat_id)(/subcat-:subcat_id)(/doc-:doc_id)(/p-:param)',
    function ($cat_id = null, $subcat_id = null, $doc_id  = null, $param = null){
        $controller = new \Modules\Document\Controllers\DocumentController($cat_id, $subcat_id);
        $controller->setDocumentForm($doc_id, $param);
});

//Document - create / update - post
$app->post('/document/new/post(/cat-:cat_id)(/subcat-:subcat_id)(/doc-:doc_id)(/p-:param)',
    function ($cat_id = null, $subcat_id = null, $doc_id  = null, $param = null) use ($app){
        $req = $app->request(); //get the POST datas
        $controller = new \Modules\Document\Controllers\DocumentController($cat_id, $subcat_id);
        $result = $controller->postDocumentForm($req->post(), $doc_id, $param);
        if($result > 0) $app->redirect(FO_URL.'documents'.($cat_id ? '/cat-'.$cat_id : '').($subcat_id ? '/subcat-'.$subcat_id : ''));
});

//Document - delete
$app->get('/document/delete/cat-:cat_id/subcat-:subcat_id/doc-:doc_id', function($cat_id, $subcat_id, $doc_id) use($app){
    $controller = new \Modules\Document\Controllers\DocumentController();
    $controller->deleteDocumentById($doc_id);
    $app->redirect(FO_URL.'documents/cat-'.$cat_id.'/subcat-'.$subcat_id);
});

//MEDIAS

//Medias - list
$app->get('/mediatheque', function (){
    $controller = new \Modules\Media\Controllers\MediaController();
    $controller->getAllMedias();
});

//Media - create
$app->post('/media/new/post', function () use ($app){
    $controller = new \Modules\Media\Controllers\MediaController();
    $controller->postMediaForm($_FILES['uploads']);
});

//Media - delete
$app->get('/media/delete/media-:media_id', function ($media_id) use($app){
    $controller = new \Modules\Media\Controllers\MediaController();
    $controller->deleteMedia($media_id);
    $app->redirect(FO_URL.'mediatheque');
});

//CATEGORY
$app->get('/categories', function (){
    $controller = new \Modules\Category\Controllers\CategoryController();
    $controller->getAllCategories();
});

$app->get('/category/new(/cat-:cat_id)(/subcat-:subcat_id)', function ($cat_id = null, $subcat_id = null){
    $controller = new \Modules\Category\Controllers\CategoryController();
    $controller->setCategoryForm($cat_id, $subcat_id);
    return "Page de création d\'une catégorie";
});

$app->post('/category/new/post', function () use ($app){
    $req = $app->request(); //get the POST datas
    $controller = new \Modules\Category\Controllers\CategoryController();
    //$req->post() -> send the datas in an array
    $result = $controller->postCategoryForm($req->post());
    if($result > 0) $app->redirect(FO_URL.'categories');
});

$app->get('/category/delete/:id', function($id) use($app){
	$controller = new \Modules\Category\Controllers\CategoryController();
	$controller->deleteCategoryById($id);
	$app->redirect(FO_URL.'categories');
});

$app->run();
