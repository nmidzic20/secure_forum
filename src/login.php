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
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $result = $pdo->query($sql);
    $user = $result->fetchAll(PDO::FETCH_ASSOC);


    if ($user) {
        $_SESSION['loggedin'] = true;
        $user_json = json_encode($user);
        echo "<script>var user = '$user_json'; console.log(user);</script>";
        echo "<script>window.location.href = '../index.php';</script>";

    } else {
  
        echo "Login failed";
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}