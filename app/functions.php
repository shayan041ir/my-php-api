<?php
require_once "config.php";

// Get all users
function getUsers($pdo)
{
    $stmt = $pdo->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add a new user
function addUser($pdo, $name, $email)
{
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name , :email)");
    return $stmt->execute(["name" => $name, "email" => $email]);
}