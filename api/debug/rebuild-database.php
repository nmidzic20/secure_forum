<?php

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $config = include('../../database/db_config.php');

    $host = $config['host'];
    $db   = $config['db'];
    $user = $config['user'];
    $pass = $config['pass'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt0 = $pdo->query("SET FOREIGN_KEY_CHECKS = 0");
        $stmt1 = $pdo->query("TRUNCATE TABLE user");
        $stmt2 = $pdo->query("TRUNCATE TABLE topic");
        $stmt3 = $pdo->query("TRUNCATE TABLE comment");
        $stmt4 = $pdo->query("INSERT INTO user (username, email, password) VALUES ('admin', 'admin@gmail.com', '123456'), ('user', 'user@gmail.com', '123456'), ('johndoe', 'johndoe@gmail.com', '123456')");
        $stmt5 = $pdo->query("INSERT INTO topic (title, content, file_path, user_id) VALUES ('Android is better with Kotlin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc.', NULL, 1), ('Android is better with Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl.', 'user_uploads/1.png', 2), ('Android is better with Flutter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl.', 'user_uploads/2.exe', 2)");
        $stmt6 = $pdo->query("INSERT INTO comment (content, file_path, topic_id, user_id) VALUES ('Great post, thanks for sharing!', NULL, 1, 2), ('I agree with you!', 'user_uploads/1.png', 1, 3), ('I disagree with you!', 'user_uploads/2.exe', 1, 1), ('I think you are wrong, because you are wrong!', NULL, 2, 1), ('I think you are wrong, because you are wrong!', NULL, 3, 1)");
        $stmt7 = $pdo->query("SET FOREIGN_KEY_CHECKS = 1");

        echo json_encode(['status' => 'success', 'message' => 'Database restored successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error restoring database: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);}