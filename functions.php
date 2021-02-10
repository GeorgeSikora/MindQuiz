<?php

$mysqli;
$uid;
$managerPassword = 'f17e01e1e79b6bea00ab4941f23e2112';

function db_connect() {
    global $mysqli;

    // Vytvoří připojení k databázi
    $mysqli = new mysqli("localhost", "root", "", "mindquiz");

    // Zkontroluj připojení s DB
    if ($mysqli -> connect_errno) {
    echo "Nepodařilo se připojit k databázi: " . $mysqli -> connect_error;
    exit();
    }
}

function db_close() {
    global $mysqli;
    $mysqli->close();
}

function getUser($redirectHomeIfNull = true) {
    global $mysqli, $uid;

    // načte z coockie user id, jestli je
    if (isset($_COOKIE['uid'])) {
        $uid = $_COOKIE['uid'];
    }

    // vyhledá v db, nebo přesměruje na hlavní stranu
    if (isset($uid)) {
        $sql = "SELECT * FROM users WHERE uid='$uid'";
        $result = $mysqli->query($sql);

        if ($row = $result->fetch_assoc()) {
            return $row;
        }
    }

    if ($redirectHomeIfNull) {
        header('location: /mindquiz/');
    }
}

function getOrCreateUser() {
    global $mysqli;
    $user = getUser(false);

    if ($user) {
        return $user;
    }

    $uid = uniqid();

    setcookie('uid', $uid, time() + (86400 * 365), "/"); // 86400 = 1 day
    
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $sql = "INSERT INTO users (uid, ip) VALUES ('$uid', '$ip')";
    $result = $mysqli->query($sql);

    return getUser();
}


function getWordsCount() {
    global $mysqli;

    $sql = "SELECT COUNT(*) AS count FROM englishwords WHERE removed=0";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc()['count'];
}

function kick() {
    header('location: /mindquiz/');
    die();
}

function managerGate() {
    global $managerPassword;

    if (isset($_COOKIE['managerPassword'])) {
        if ($_COOKIE['managaerPassword'] != $managerPassword) {
            return;
        }
    }

    if (!isset($_GET['managaerPassword'])) {
        kick();
    }
    
    if ($_GET['managaerPassword'] == $managerPassword) {
        echo 'xasdasdasdasd';
        setcookie('managerPassword', $_GET['managaerPassword']);
        return;
    }
    
    kick();
}

// 393cb020522089c8d6741fb730fadae6
function isManager() {
    global $managerPassword;
    
    if (isset($_COOKIE['managerPassword'])) {

        if (isset($_GET['managerPassword'])) setcookie('managerPassword', $_GET['managerPassword'], time() + (86400 * 365));

        return ($_COOKIE['managerPassword'] == $managerPassword);
    }

    if (!isset($_GET['managerPassword'])) return false;
    
    setcookie('managerPassword', $_GET['managerPassword'], time() + (86400 * 365));
    
    return ($_GET['managerPassword'] == $managerPassword);
}




?>