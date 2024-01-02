<?php

session_start();

$users = array(
    array("username" => "user1", "password" => "pass1"),
    array("username" => "user2", "password" => "pass2"),
);

$username = $_POST['username'];
$password = $_POST['password'];

foreach ($users as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
        $_SESSION['loggedin'] = true;

        header("Location: ../index.php");

        exit;
    }
}

echo "Login failed";
