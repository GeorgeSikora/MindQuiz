<?php

if (isset($_POST['name'], $_POST['time'])) {

    $myObj = new \stdClass();
    $myObj->name = "John";
    $myObj->age = 30;
    $myObj->city = "New York";
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;

    /*
    $myArr = array("John", "Mary", "Peter", "Sally");
    $myJSON = json_encode($myArr);
    echo $myJSON;
    */
}

?>