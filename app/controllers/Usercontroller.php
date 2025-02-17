<?php
require_once __DIR__ . '../config/Database.php';

class UserController
{
    public function getAllusers()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function getUserById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public static function creatUser()
    {
        global $pdo;
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data["name"]) || !isset($data["email"])) {
            echo json_encode(array("error" => "name and email are required"));
            return;
        }

        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute([$data["name"]]);
        echo json_encode(["message" => "User created successfully"]);
    }

    public static function updateUser($id)
    {
        global $pdo;
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data["name"]) || !isset($data["email"])) {
            echo json_encode(array("error" => "name and email are required"));
            return;
        }

        $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $stmt->execute([$data["name"], $data["email"], $id]);
        echo json_encode(["message" => "User updated successfully"]);
    }

    public static function deleteUser($id){
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(["message" => "User deleted successfully"]);
    }
}
