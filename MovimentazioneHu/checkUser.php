<?php
$username = $_POST['username'];
$pass = $_POST['password'];
$ip = 'localhost';
$user = 'root';
$password = '';
$db = 'mov-hu';
session_start();
$connection = new \mysqli($ip, $user, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$checkQuery = "SELECT * FROM users WHERE username = '$username' and password='$pass'";
$checkResult = $connection->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Username already exists
    $_SESSION['isLogin'] = true;
    $_SESSION['username'] = $username;
    header('Location: ./login.php?result=success');
    exit;
}else{
    $_SESSION['isLogin'] = false;

    header('Location: ./login.php?result=error');
    exit;
}





?>