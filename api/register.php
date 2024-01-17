<?php
session_start();

header("Content-Type: application/json");

$config = include('../database/db_config.php');

$host = $config['host'];
$db   = $config['db'];
$user = $config['user'];
$pass = $config['pass'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "registration_failed";

        echo json_encode(['status' => 'error-password', 'message' => 'Passwords do not match']);

        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['error'] = "registration_failed_username_exists";

        echo json_encode(['status' => 'error-username', 'message' => 'Username already exists']);

        exit;
    }

    $query = makeSqlQueryFromFormData();

    $stmt = $pdo->query($query);

    $_SESSION['loggedin'] = true;

    echo json_encode(['status' => 'success', 'message' => 'Registration successful']);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function makeSqlQueryFromFormData(): string
{
    $sql_insert = "INSERT INTO user (";
    $sql_values = "VALUES(";

    foreach ($_POST as $key => $value) {
        if ($key === "confirm-password") {
            continue;
        }

        $sql_insert .= $key . ", ";
        $sql_values .= "'" . $value . "', ";
    }

    $sql_insert = substr($sql_insert, 0, -2);
    $sql_values = substr($sql_values, 0, -2);

    $sql_insert .= ") ";
    $sql_values .= ");";

    return $sql_insert . $sql_values;
}