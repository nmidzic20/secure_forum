<?php

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $config = include('../database/db_config.php');

    $host = $config['host'];
    $db   = $config['db'];
    $user = $config['user'];
    $pass = $config['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM topic WHERE id=:id");
        $stmt->execute(['id' => $id]);

        echo json_encode(['status' => 'success', 'message' => 'Topic deleted successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting topic: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);}