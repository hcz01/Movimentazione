
<?php
session_start();
if ($_SESSION['isLogin']) {
    $username = $_SESSION['username'];
}else{
    echo "<script>alert('You are not logged in.');</script>";
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>home</title>
    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>

<body>
<div id ="header">
    <div id="nav"> <ul>
        <li>Home</li>
        <li><button onclick="openPopup()" style="background-color: transparent; border: none; outline: none;" >Crea Una valutazione</button></li>
    </ul></div>
    <div id="nav-1">
        <ul>
        <li><div> <?php if (session_status() != PHP_SESSION_NONE) { if ($_SESSION['isLogin'] == true ) {echo $username;}}?> </div> </li>
        </ul>
    </div>
</div>

<?php 
include 'showAllValutazione.php'; 
?>



<?php 
include 'valutazione.php'; 
include 'edit.php'; 
?>


</body>
</html>