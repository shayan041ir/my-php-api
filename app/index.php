<?php
header("Content-Type: application/json");
require_once "../app/functions.php";

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "GET") {
    echo json_encode(getUsers());
} else if ($requestMethod === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["name"]) && isset($data["email"])) {
        $success = addUser($data["name"], $data["email"]);
        echo json_encode(["success" => $success]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
