<?php
require($_SERVER["DOCUMENT_ROOT"].'/MindQuiz/functions.php');

if (!isManager()) {
    header('location: /mindquiz/');
    die();
}

if (!isset($_POST['id'])) {
    die();
}

$id = $_POST['id'];

db_connect();

$sql = "UPDATE englishwords SET removed=1 WHERE id=" . $id;
$result = $mysqli->query($sql);

db_close();


?>