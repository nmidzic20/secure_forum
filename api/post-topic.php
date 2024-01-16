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
        $maxFileSize = 3 * 1024 * 1024;

        $targetDir = "../user_uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if ($_FILES['file']['size'] > $maxFileSize) {
            throw new PDOException('File is too large!');
        }

        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

        $relativeDir = "user_uploads/";
        $relativeTargetFilePath = $relativeDir . $fileName;

        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_POST['user_id'];

        $stmt = $pdo->prepare("INSERT INTO topic (title, content, file_path, user_id) VALUES (:title, :content, :file_path, :user_id)");
        $stmt->execute(['title' => $title, 'content' => $content, 'file_path' => $relativeTargetFilePath, 'user_id' => $user_id]);

        echo json_encode(['status' => 'success', 'message' => 'Topic posted successfully']);
    } catch(PDOException $e) {
        if ($e->getMessage() === 'File is too large!') {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error posting topic: ' . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);}