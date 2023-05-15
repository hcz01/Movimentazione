
<div id="table" class="card text-center my-4" style='border: none;'>
    <?php

    $ip = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'mov-hu';

    $connection = new \mysqli($ip, $user, $password, $db);

    $query = 'SELECT * FROM evaluations JOIN users ON evaluations.author=users.id ORDER BY businessName, valid DESC';


    $result = $connection->query($query);

    $json = [];
    $n = 0;
    echo '<table style="border-radius: 10px;">
    <thead>
    <tr class="table-info" ><th>Tutte le valutazioni</th></tr>
    </thead>
    ';
    
    echo '
    <thead>
    <tr style="border: 1px solid black;">
    <th>ID</th><th>Autore</th><th>Ragione sociale</th>
    <th>Data di rilascio</th>
    <th>Costo</th><th>Peso realmente sollevato</th>
    <th>Peso massimo sollevabile</th>
    <th>Indice</th><th>Documento</th>
    <th>Validità</th>
    </tr>
    </thead>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Extract the data from the row
            $id = $row['evaluation_id'];
            $author = $row['username'];
            $businessName = $row['businessName'];
            $date = $row['date'];
            $cost = $row['cost'];
            $realWeight = $row['realWeight'];
            $maximumWeight = $row['maximumWeight'];
            $IR = $row['IR'];
            $valid = $row['valid'];

            // Check the validity status
            if ($valid == 1) {
                $post = '<td style="color: green;">Valida</td>';
            } else {
                $post = '<td style="color: red;">Scaduta</td>';
            }

            // Display the row with an edit button
            echo "<tr style='border: 1px solid black;'>
                <td>$id</td>
                <td>$author</td>
                <td>$businessName</td>
                <td>$date</td>
                <td>$cost €</td>
                <td>$realWeight kg</td>
                <td>$maximumWeight kg</td>
                <td>$IR</td>
                <td><a style='color: black; text-decoration: underline;' href='printPdf.php?id=$id'>PDF</a></td>
                $post
                <td><a id=$id onclick='modify($id)''><img src='./matita.png' alt='Image' style='width: 20px;'></a></td>
                <td><a id=$id onclick='delect($id)''><img src='./cestino.png' alt='Image' style='width: 20px;'></a></td> 
            </tr>";
        }
    }

    if (isset($_GET['result'])) {
        if ($_GET['result'] == 'success') {
            echo "<script> alert('Valutazione inserita con successo');</script>";
        }
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'data') {
            echo "<script> alert('Controlla che i dati inseriti rispettino i seguenti criteri: Di aver inserito tutti i campi Carichi di peso superiore a 3 kg Carichi di peso inferiori a 30 kg');</script>";
        }
    }
    ?>
</div>






