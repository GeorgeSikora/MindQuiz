<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');
db_connect();

$user = getOrCreateUser();

//print_r($user);

$wordsCount = getWordsCount();

db_close();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindQuiz</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="center">

    <div class="heading">
        <p>MindQuiz - nauč se pomocí daily questů!</p>
        <br>
        <p class="small">Celkem máme <span class="medium"><?php echo $wordsCount ?></span> slovíček k prozkoušení!</p>
    </div>

    <div class="content">
        
        <?php if (isManager()) include('manager/managerView.php') ?>

        <p class="question">Zvol si téma kvízu</p>
        
        <div class="answers">
            <a href="/mindquiz/quiz.php?category=english">Anglická slova <span class="small">(10 otázek)</span></a>
        </div>

    </div>

</div>

</body>
</html>