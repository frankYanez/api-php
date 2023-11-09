<?php


//Traigo el router 2.0
require 'libs/Router.php';
require 'app/controllers/GamesApiControllers.php';

$router = new Router();

$router->addRoute('games', 'GET', 'GameApiController', 'getGames');
$router->addRoute('games/:ID', 'GET', 'GameApiController', 'getGame');
$router->addRoute('games', 'POST', 'GameApiController', 'addGame');
$router->addRoute('games/:ID', 'PUT', 'GameApiController', 'updateGame');
$router->addRoute('games/:ID', 'DELETE', 'GameApiController', 'deleteGame');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
