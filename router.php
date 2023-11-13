<?php


//Traigo el router 2.0
require 'libs/Router.php';
require 'app/controllers/GamesApiControllers.php';
require 'app\controllers\DesarrolladoresApiController.php';




$router = new Router();

$router->addRoute('games', 'GET', 'GameApiController', 'getGames');
$router->addRoute('games/:ID', 'GET', 'GameApiController', 'getGame');
$router->addRoute('games', 'POST', 'GameApiController', 'addGame');
$router->addRoute('games/:ID', 'PUT', 'GameApiController', 'updateGame');
$router->addRoute('games/:ID', 'DELETE', 'GameApiController', 'deleteGame');

$router->addRoute('desarrolladores', 'GET', 'DesarrolladoresApiController', 'getDesarrolladores');
$router->addRoute('desarrolladores/:ID', 'GET', 'DesarrolladoresApiController', 'getDesarrollador');
$router->addRoute('desarrolladores', 'POST', 'DesarrolladoresApiController', 'addDesarrollador');
$router->addRoute('desarrolladores/:ID', 'PUT', 'DesarrolladoresApiController', 'updateDesarrollador');
$router->addRoute('desarrolladores/:ID', 'DELETE', 'DesarrolladoresApiController', 'deleteDesarrollador');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
