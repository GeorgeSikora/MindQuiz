<?php
require($_SERVER["DOCUMENT_ROOT"].'/MindQuiz/functions.php');
db_connect();

if (isset($_POST['czechWord'], $_POST['englishWord'], $_POST['submit'])) {

    $czech = $_POST['czechWord'];
    $english = $_POST['englishWord'];

    if ($czech == "" || $english == "") { 
        header('location: /mindquiz/manager/dictionary.php');
        die();
    }

    $sql = "INSERT INTO englishwords (czechWord, englishWord) VALUES ('$czech', '$english')";
    $mysqli->query($sql);
}

db_close();

header('location: /mindquiz/manager/dictionary.php');
?>