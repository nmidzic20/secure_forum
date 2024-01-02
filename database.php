<?php
$host = 'localhost';
$db   = 'secure_forum';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    $pdo->exec($sql);

    $sql = "use $db";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS user (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        date_of_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS topic (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        file_path VARCHAR(255)
    )";
    $pdo->exec($sql);

    echo "Database and tables created successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
