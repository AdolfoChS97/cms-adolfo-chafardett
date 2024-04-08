<?php
ini_set('display_errors', 1);
require 'routes/index.php';
require 'utils/fileReader.php';

require_once 'utils/Response.php';
require_once 'utils/Database.php';


// Controllers
require_once 'modules/users/controller/users.controller.php';

// Services
require_once 'modules/users/service/users.service.php';


$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$route = $routes[$method . ' ' . $path];

if(!isset($route)) {
    return Response::send(['error' => 'Not found', 'code' => 1, 'message' => 'Route not found'], 404);
}

list($controller, $action) = explode('@', $route);

fileReader('src/api/.env');

// $db = new Database($_ENV['HOST'], $_ENV['USERNAME'], $_ENV['PASSWORD'], $_ENV['DATABASE']);

$instance = new $controller();
$response = $instance->$action();


