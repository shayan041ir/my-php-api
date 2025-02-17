<?php
//see errors
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../config/config.php';  
require_once __DIR__ . '/../app/routes.php';

header('Content-Type: application/json');

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = $_SERVER["REQUEST_URI"];

routeRequest($requestMethod, $requestUri);