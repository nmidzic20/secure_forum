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
        if($fileName == null) $relativeTargetFilePath = null;

        $content = $_POST['content'];
        $topic_id = $_POST['topic_id'];
        $user_id = $_POST['user_id'];

        $stmt = $pdo->prepare("INSERT INTO comment (content, file_path, topic_id, user_id) VALUES (:content, :file_path, :topic_id, :user_id)");
        $stmt->execute(['content' => $content, 'file_path' => $relativeTargetFilePath, 'topic_id' => $topic_id, 'user_id' => $user_id]);

        echo json_encode(['status' => 'success', 'message' => 'Comment posted successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error posting comment: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);}