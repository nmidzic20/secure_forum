<?php
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

    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO topic (title, content, file_path) VALUES (:title, :content, :file_path)");
    $stmt->execute(['title' => $title, 'content' => $content, 'file_path' => $targetFilePath]);

    header("Location: ../index.php");
    exit;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}