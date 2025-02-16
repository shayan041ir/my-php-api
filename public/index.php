<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';  
require_once __DIR__ . '/../app/functions.php';

header('Content-Type: application/json');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "GET") {
    echo json_encode(getUsers($pdo));
} else if ($requestMethod === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["name"]) && isset($data["email"])) {
        $success = addUser($pdo, $data["name"], $data["email"]);
        echo json_encode(["success" => $success]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}