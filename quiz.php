<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');

if (!isset($_GET['category'], $_GET['level'])) die('něco není nastaveno (GET)');

$category = $_GET['category'];
$level = $_GET['level'];

$timeout = 5;
$questionsTotal = 10;

if ($level == 'boss') {
    $timeout = 15;
    $questionsTotal = 100;
    $level = 1;
}

db_connect();

$user = getUser();
$questionsDone = $user['questionsDone'] + 1;

// dosáhl poslední otázky
if ($questionsDone > $questionsTotal) {
    header('location: /mindquiz/final.php'); 
    return;
}

// přičte k počtu otázek uživatele
increaseAnswersCount();

// náhodné slovíčko pro otázku
$word = getRandomWord($level);

// uživateli nastaví aktuální otázku
setCurrentUserQuestion($user['id'], $word['id']);

// získání ostatních, špatných, odpovědí
$answers = getRandomWords($level, $word['id']);
array_push($answers, $word);

// náhodně zamíchá odpovědi
$answers = stirRandomly($answers);

$mysqli->close();

function setCurrentUserQuestion($userId, $questionId) {
    global $mysqli;
    $sql = "UPDATE users SET currentQuestion=$questionId WHERE id=$userId";
    $mysqli->query($sql);
}

function getRandomWord($level) {
    global $mysqli;
    $sql = "SELECT * FROM englishwords WHERE removed=0 AND level=$level ORDER BY RAND() LIMIT 1";
    $result = $mysqli->query($sql);

    if ($row = $result->fetch_assoc()) {
        return $row;
    }
        
    die('Nenašlo se slovo .. getRandomWord()');
}

function getRandomWords($level, $omitId = -1, $size = 3) {
    global $mysqli;
    $sql = "SELECT * FROM englishwords WHERE removed=0 AND level=$level AND id!=$omitId ORDER BY RAND() LIMIT $size";
    $result = $mysqli->query($sql);
    $arr = array();
    
    while ($row = $result -> fetch_assoc()) {
        array_push($arr, $row);
    }

    if (count($arr) == $size) {
        return $arr;
    }
    
    die('Nenašlo se požadovaný počet slov .. getRandomWords()');
}

function stirRandomly($arr) {
    $shiftsCount = rand(0, count($arr) - 1);

    for ($i = 0; $i < $shiftsCount; $i++) {
        array_push($arr, array_shift($arr));    
    }

    return $arr;
}

function increaseAnswersCount() {
    global $user, $mysqli;
    $sql = "UPDATE users SET questionsDone = questionsDone + 1 WHERE id = " . $user['id'];
    $mysqli->query($sql);
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otázky</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
    <?php includeHead() ?>
</head>
<body>

<div class="center">

<div class="heading">
    <p>Otázka <?php echo $questionsDone ?> z <?php echo $questionsTotal ?></p>
</div>

<div class="content">

    <p class="question">
        Překlad slovíčka 
        <span class="highlighted"><span class="red">"</span><?php echo $word['englishWord'] ?><span class="red">"</span></span> je ..</p>
    
    <div class="answers">
        <?php foreach ($answers as $answer) {
            echo '<a href="javascript:void(0)" onclick="sendAnswer('.$answer['id'].')">' . $answer['czechWord'] . '</a>';
        } ?>
    </div>

    <div class="timeout-bar" id="timeout-bar"><div class="line timeout-<?php echo $timeout ?>s"></div></div>

    <!--
     <div style="height: 100vh; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%);">
    <div id="answer-feedback">
        <p class="incorrect">Špatně.</p>
    </div>
    </div>
    -->

</div>

</div>

</body>
</html>

<script>

setTimeout(() => {
    skipAnswer();
}, <?php echo($timeout * 1000)?>);

</script>