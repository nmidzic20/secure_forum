<?php

session_start();

$config = include('../database/db_config.php');

$host = $config['host'];
$db   = $config['db'];
$user = $config['user'];
$pass = $config['pass'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['loggedin'] = true;

        header("Location: ../index.php");

        exit;
    } else {
        echo "Login failed";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}