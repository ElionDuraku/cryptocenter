<?php 
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "crypto";

    try {
        $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        // Handle any connection errors
        die("Connection failed: " . $e->getMessage());
    }
?>