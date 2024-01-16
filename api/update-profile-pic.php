<?php

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        $url = $_POST['pic-url'];
        file_put_contents("../assets/avatar.jpg", file_get_contents($url));

        echo json_encode(['status' => 'success', 'message' => 'Profile picture updated successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error updating Profile picture: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);}