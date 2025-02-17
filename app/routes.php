<?php
require_once __DIR__ . '/controllers/UserController.php';

function routeRequest($method, $uri) 
{
    $routes = [
        'GET' => [
            '/users' => 'UserController::index',
            '/users/:id' => 'UserController::show',
        ],
        'POST' => [
            '/users' => 'UserController::store',
        ],
        'PUT' => [
            '/users/:id' => 'UserController::update',
        ],
        'DELETE' => [
            '/users/:id' => 'UserController::destroy',
        ],
    ];

    foreach ($routes[$method]??[] as $route => $handler){
        $pattern = str_replace("{id}", "(\d+)", $route);
        if (preg_match("#^$pattern$#",$uri,$matches)) {
            array_shift($matches);
            call_user_func_array($handler, $matches);
            return;
        }
    }

    echo json_encode(["error"=> "Route not found"]);
}
