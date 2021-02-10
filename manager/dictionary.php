<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');

if (!isManager()) {
    header('location: /mindquiz/');
    die();
}

db_connect();

$sql = "SELECT * FROM englishwords WHERE removed=0";
$result = $mysqli->query($sql);

db_close();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/MindQuiz/functions.js"></script>
    <link rel="stylesheet" href="/MindQuiz/styles.css">
</head>
<body>

<div class="center">

    <div class="heading">
        <p>MindQuiz Manager</p>
    </div>

    <div class="content">

        <p class="question">Správa slovníku</p>
        
        <div class="answers">
            <form action="/mindquiz/manager/addWord.php" method="POST">
            <input type="text" name="czechWord" placeholder="České slovo" required></input>
            <input type="text" name="englishWord" placeholder="Anglické slovo" required></input>
            <button type="submit" name="submit">Přidat</button>  
            </form>
        </div>

        <table class="tableStyle">
            <tr>
                <th>#</th>
                <th>Úroveň</th>
                <th>Česky</th>
                <th>Anglicky</th>
                <th>Akce</th>
            </tr>

        <?php
        $i = 1; 
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
                echo '<td>'. $i .'</td>';
                echo '<td style="text-align: center;">'. $row['level'] .'</td>';
                echo '<td>'. $row['czechWord'] .'</td>';
                echo '<td>'. $row['englishWord'] .'</td>';
                echo '<td style="display: flex;">

                    <button class="button-small" onclick="editConfirm('. $row['id'] .')">
                        Upravit
                    </button>

                    <button class="button-small danger" onclick="removeConfirm('. $row['id'] .')">
                        Smazat
                    </button>
                
                </td>';

            echo '</tr>'; 
            $i++;
        }
        ?>

        </table>

    </div>

</div>

</body>
</html>

<script>

function removeConfirm(id) {
    $.post("removeWord.php", { id: id })
    .done(function( data ) {
        location.reload();
    });
}

</script>