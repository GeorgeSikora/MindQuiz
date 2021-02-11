<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');

if (!isset($_POST['id'])) {
    die('id is undefined.');
} else {
    $id = $_POST['id'];
}

db_connect();

if ($user = getUser()) {

    $JoinUserEnglishwords = getJoinUserEnglishwords($user);
    $count = $JoinUserEnglishwords['count'];
    $correctAnswer = $JoinUserEnglishwords['czechWord'];

    if ($count == 0) {
        echo 'Jsi tady špatně!';
        return;
    }

    $answered = getEnglishwordById($id)['czechWord'];

    if ($answered == $correctAnswer) {
        sendResult(true);
        return;
    }
    sendResult(false);
}

db_close();

function getJoinUserEnglishwords($user) {
    global $mysqli;
    $sql = "SELECT COUNT(u.id) as count, ew.czechWord FROM users u
    JOIN englishwords ew ON ew.id = u.currentQuestion 
    WHERE u.id = " . $user['id'];
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function getEnglishwordById($id) {
    global $mysqli;
    $sql = "SELECT * FROM englishwords WHERE id = " . $id;
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function increaseAnswersCount() {
    global $user, $mysqli;
    $sql = "UPDATE users SET questionsDone = questionsDone + 1 WHERE id = " . $user['id'];
    $mysqli->query($sql);
}

function sendResult($success) {
    global $user, $mysqli;

    if ($success) {

        $sql = "UPDATE users SET questionsSuccess = questionsSuccess + 1 WHERE id = " . $user['id'];
        $mysqli->query($sql);

    }

    $result = new \stdClass();
    $result->success = $success;
    echo json_encode($result);
}

?>