<?php
require($_SERVER["DOCUMENT_ROOT"].'/MindQuiz/functions.php');
db_connect();
$user = getUser();
db_close();

if (isset($_COOKIE['uid'])) {
    unset($_COOKIE['uid']); 
    setcookie('uid', null, -1, '/'); 
}

header('location: /mindquiz/');

?>