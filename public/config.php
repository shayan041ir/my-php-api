<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "myapi_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully  ";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}