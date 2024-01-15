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

        $targetDir = "../user_uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

        $relativeDir = "user_uploads/";
        $relativeTargetFilePath = $relativeDir . $fileName;

        $title = $_POST['title'];
        $content = $_POST['content'];

        $stmt = $pdo->prepare("INSERT INTO topic (title, content, file_path) VALUES (:title, :content, :file_path)");
        $stmt->execute(['title' => $title, 'content' => $content, 'file_path' => $relativeTargetFilePath]);

        echo json_encode(['status' => 'success', 'message' => 'Topic posted successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error posting topic: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);}