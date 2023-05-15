<?php

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'mov-hu';
$id=$_GET['id'];
$connection = new mysqli($ip, $user, $password, $db);
$query = 'SELECT * FROM evaluations  where evaluation_id  = '.$id .'';
$result = $connection->query($query);

$json = [];
$n = 0;

$result = $connection->query($query);
while ($row = $result->fetch_assoc()) {
    $array[$n] = $row;
    $n = $n + 1;
}

echo json_encode($array);

?>