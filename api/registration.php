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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "registration_failed";
        header("Location: ../html/registration.php");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['error'] = "registration_failed_username_exists";
        header("Location: ../html/registration.php");
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
    $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);

    $_SESSION['loggedin'] = true;

    header("Location: ../index.php");

    exit;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}