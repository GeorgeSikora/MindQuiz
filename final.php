<?php
require($_SERVER["DOCUMENT_ROOT"].'/MindQuiz/functions.php');
db_connect();

$user = getUser();

$sql = "SELECT questionsDone, questionsSuccess FROM users WHERE id = " . $user['id'];

$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

$questionsDone = $row['questionsDone'];
$questionsSuccess = $row['questionsSuccess'];

$successPercentage = round(100 / $questionsDone * $questionsSuccess);

/* HODNOCENÍ
 100 - 90 = 1
  89 - 80 = 2
  79 - 50 = 3
  49 - 30 = 4
  29 - 0  = 5
*/

if ($successPercentage >= 90) {
    $mark = 1;
} else if ($successPercentage >= 80) {
    $mark = 2;
} else if ($successPercentage >= 50) {
    $mark = 3;
} else if ($successPercentage >= 30) {
    $mark = 4;
} else {
    $mark = 5;
}

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
    <?php includeHead() ?>
</head>
<body>

<div class="center">

    <div class="heading">
        <p><i class="fas fa-award"></i> Úspěšně jsi dokončil kvíz!</p>
    </div>

    <div class="content">

        <p class="question">Úspěšnost: <span class="highlighted" style='font-family: "Lucida Console", "Courier New", monospace;'><?php echo $successPercentage ?><span class="red">%</span></span></p>

        <p class="question">Známka: <span class="highlighted" style='font-family: "Lucida Console", "Courier New", monospace;'><?php echo $mark ?></span><span style="font-size: 20px; position: fixed; margin-top: 26px; color: #333;">𝑀𝒾𝓃𝒹𝒬𝓊𝒾𝓏</span></p>
        
        <div class="answers">
            <a href="/mindquiz/restart.php">Hlavní nabídka</a>
        </div>

    </div>

</div>

</body>
</html>