<?php
require($_SERVER["DOCUMENT_ROOT"].'/MindQuiz/functions.php');
db_connect();

$user = getUser();

$sql = "SELECT questionsDone, questionsSuccess FROM users WHERE id = " . $user['id'];

$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

$questionsDone = $row['questionsDone'];
$questionsSuccess = $row['questionsSuccess'];

$successPercentage = 100 / $questionsDone * $questionsSuccess;

db_close();

?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotovo!</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="center">

    <div class="heading">
        <p>Úspěšně jsi dokončil kvíz!</p>
    </div>

    <div class="content">

        <p class="question">Úspěšnost <span class="highlighted"><?php echo $successPercentage ?><span class="red">%</span></span></p>
        
        <div class="answers">
            <a href="/mindquiz/restart.php">Hlavní nabídka</a>
        </div>

    </div>

</div>

</body>
</html>