<?php

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = include('../database/db_config.php');

    $host = $config['host'];
    $db   = $config['db'];
    $user = $config['user'];
    $pass = $config['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $authToken = $_POST['authToken'];
        $new_email = $_POST['email'];

        $stmt = $pdo->prepare("UPDATE user SET email = :email WHERE auth_token = :authToken");
        $stmt->execute(['email' => $new_email, 'authToken' => $authToken]);

        echo json_encode(['status' => 'success', 'message' => 'Email updated successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error updating email: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
