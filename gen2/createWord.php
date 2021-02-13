<?php

$language = "slovakia";
$targetLanguage = "english";

$word = "ahoj";
$translation = "hello";

/*
$mysqli = new mysqli("localhost", "root", "", "mindQuiz2");

$sql = "SELECT * FROM languages WHERE englishName=?";
$stmt = $mysqli->prepare($sql);

if ($stmt == null) {
    die('null');
}

$stmt->bind_param('s', $language);
$stmt->execute();

$result = $stmt->get_result(); // get the mysqli result

echo "Počet výsledků: " . $result->num_rows . "<br>"; // number of rows

$district = $result->fetch_assoc();

print_r($district);

$stmt->close();
*/

function SQL($sql, $params = []) {

    $conn = new mysqli("localhost", "root", "", "mindQuiz2");

    $stmt = $conn->stmt_init();
    $stmt->prepare($sql);

    if ($stmt == null) {
        die('null');
    }

    $typeSign = '';

    for ($i = 0; $i < count($params); $i++) {
        
        $param = $params[$i];
        $type = gettype($param);

        switch($type) {
            case 'string':  $typeSign .= 's'; break;
            case 'integer': $typeSign .= 'i'; break;
            case 'double':  $typeSign .= 'd'; break;
            case 'boolean': $typeSign .= 's'; $params[$i] = $param?'true':'false'; break;
            default: die('wrong param .. ' . $type);
        }

        echo 'params[' . $i . ']<br>';
        echo '... param: ' . $param . '<br>';
        echo '... type: ' . $type . '<br>';
    }
    
    echo '... typeSign: ' . $typeSign . '<br>';

    $stmt->bind_param($typeSign, ...$params); // <!!!!!  TAKTO OOO OO O OO
    /*
    $stmt->bind_param("s", "slovakia");
    $stmt->bind_param("s", "slovenština");
    */
    $stmt->execute();

    $result = $stmt->get_result(); // get the mysqli result

    echo "Počet výsledků: " . $result->num_rows . "<br>"; // number of rows

    $district = $result->fetch_assoc();

    print_r($district);

    $stmt->close();
}


SQL("SELECT * FROM languages WHERE englishName= ? AND name= ?", ["slovakia", "slovenština"]);

?>