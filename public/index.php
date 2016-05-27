<?php
use App\Controller;
require "../vendor/autoload.php";
require "../config/config.php";
require_once "../App/View/templates/headerView.php";
//require_once "../App/View/templates/menuView.php";

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

$app->get('/univers', function(){
    $controller = new Controller\universController();
    $controller->getAllUnivers();
});

$app->get('/rubriques', function(){
    $controller = new Controller\rubriqueController();
    $controller->getAllRubriques();
});

$app->run();

require_once "../App/View/templates/footerView.php";