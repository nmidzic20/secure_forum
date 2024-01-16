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
        $authToken = bin2hex(random_bytes(16));

        $updateQuery = "UPDATE user SET auth_token = ? WHERE id = ?";
        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute([$authToken, $user[0]['id']]);


        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $user[0]['id'];
        $user_json = json_encode($user);

        echo "<script> var authToken = '$authToken'; localStorage.setItem('authToken', authToken);</script>";
        echo "<script>var user = '$user_json'; console.log(user);</script>";
        echo "<script>window.location.href = '../index.php';</script>";

    } else {
  
        echo "<script>alert('Login failed');</script>";
        echo "<script>window.location.href = '../html/login.php';</script>";
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}