<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');

db_connect();

if ($user = getUser()) {
    $sql = "SELECT COUNT(u.id) as count, ew.czechWord FROM users u
    JOIN englishwords ew ON ew.id = u.currentQuestion 
    WHERE u.id = " . $user['id'];

    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count == 0) {
        die('Jsi tady špatně!');
    }

    increaseAnswersCount($user);
}

db_close();

function increaseAnswersCount() {
    global $user, $mysqli;
    $sql = "UPDATE users SET questionsDone = questionsDone + 1 WHERE id = " . $user['id'];
    $mysqli->query($sql);
}

?>