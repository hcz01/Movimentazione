<?php


if (isset($_POST['id'])) {

    switch ($_POST['action']) {
        case 'edit':
            $id = $_POST['id'];
            $ip = '127.0.0.1';
            $user = 'root';
            $password = "";
            $db = 'mov-hu';
    
            $connection = new \mysqli($ip, $user, $password, $db);
    
            $query = "UPDATE evaluations SET valid=0 WHERE evaluation_id='$id'";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            header('Location: home.php?success');
            break;
        case 'PrintPdf':
         
            break;

        case 'remove':
                $id = $_REQUEST['id'];
                $ip = '127.0.0.1';
                $user = 'root';
                $password = '';
                $db = 'mov-hu';
                $connection = new \mysqli($ip, $user, $password, $db);
                $query = "DELETE FROM evaluations WHERE evaluation_id='$id';";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                header('Location: home.php?success');
            
         
                break;

    }
}


?>
