<?php

$username = $_POST['username'];
$password = $_POST['password'];

$ip = 'localhost';
$user = 'root';
$password = '';
$db = 'mov-hu';

$connection = new \mysqli($ip, $user, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$checkQuery = "SELECT * FROM users WHERE username = '$username'";
$checkResult = $connection->query($checkQuery);

if ($checkResult->num_rows > 0) {
    header('Location: ./Registration.php?result=error');
    exit;
} else {
    $insertQuery = "INSERT INTO users (name_surname, username, password) VALUES ('$username', '$username', '$password')";
    $insertResult = $connection->query($insertQuery);

    if ($insertResult === TRUE) {
        header('Location: ./Registration.php?result=success');
        exit;
    } else {
       
        header('Location: ./Registration.php?result=error');
        exit;
    }
}

$connection->close();

?>