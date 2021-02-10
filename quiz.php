<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');

if (!isset($_GET['category'])) die('Kategorie není definována');
if (!isset($_GET['level'])) die('Level není definován');

$category = $_GET['category'];
$level = $_GET['level'];

db_connect();

$user = getUser();
$questionsDone = $user['questionsDone'] + 1;

if ($questionsDone > 10) {
    header('location: /mindquiz/final.php');
    return;
}

// Získání náhodného slovíčka
$word = getRandomWord($level);
$englishWord = $word['englishWord'];

// Nastaví uživateli aktuální otázku
$currentQuestion = $word['id'];
$userId = $user['id'];
$sql = "UPDATE users SET currentQuestion=$currentQuestion WHERE id=$userId";
$mysqli->query($sql);

$answers = getRandomWords($level, $word['id']);
array_push($answers, $word);

$shiftsCount = rand(0, 3);
for ($i = 0; $i < $shiftsCount; $i++) {
    array_push($answers, array_shift($answers));    
}

$mysqli->close();


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
</head>
<body>

<div class="center">

<div class="heading">
    <p>Otázka <?php echo $questionsDone ?> z 10</p>
</div>

<div class="content">

    <p class="question">Překlad slovíčka <span class="highlighted"><span class="red">"</span><?php echo $englishWord ?><span class="red">"</span></span> je ..</p>
    
    <div class="answers">
        
<?php

foreach ($answers as $answer) {
    echo '<a href="javascript:void(0)" onclick="sendAnswer('.$answer['id'].')">' . $answer['czechWord'] . '</a>';
}

?>
    </div>

</div>

</div>

</body>
</html>