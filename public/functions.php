<?php
    require_once"config.php";
    
    // Get all users
    function getUsers()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new user
    function addUsers()
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (? , ?)");
        return $stmt->execute([$name, $email]);
    }


