<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\RootController;

$router = new AltoRouter();

// Roads
$router->map('GET', '/home', 'HomeController#index', 'home');
$router->map('GET', '/', 'HomeController#index', 'root');
$router->map('GET', '/article', 'articleController#index', 'article');
$router->map('POST', '/modifie', 'articleController#index2', 'modifie');
$router->map('POST', '/texte', 'articleController#index3', 'texte');
$router->map('GET', '/ecrireArticle', 'articleController#index4', 'ecritArticle');
$router->map('POST', '/enregistreArticle', 'articleController#nouveau', 'enregistreArticle');
$router->map('POST', '/deleteArticle', 'articleController#supprime', 'deleteArticle');
$router->map('POST', '/modifieArticle', 'articleController#modifie', 'modifieArticle');
$router->map('POST', '/message', 'messageController#index', 'messages');
$router->map('POST', '/enregistre', 'messageController#nouveau', 'enregistreMessage');
$router->map('POST', '/deleteMessage', 'messageController#supprime', 'deleteMessage');
$router->map('GET', '/identification', 'administrateurController#index', 'identification');
$router->map('POST', '/controle', 'administrateurController#index2', 'controle');
$router->map('GET', '/erreur', 'administrateurController#index3', 'erreur');
$router->map('GET', '/session', 'administrateurController#index4', 'session');

// Function

$match = $router->match();

if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    $controllerFile = dirname(__FILE__) . "/../Controller/$controller.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controllerClass = "App\\Controller\\$controller";
        $controllerInstance = new $controllerClass();
        call_user_func_array(array($controllerInstance, $action), $match['params']);
    } else {
        $rootController = new RootController();
        $rootController->displayError(404);
    }
} else {
    $rootController = new RootController();
    $rootController->displayError(404);
}
