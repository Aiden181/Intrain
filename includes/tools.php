<?php
session_start();

// Include database file
// require_once "database.php";

/*
** strip all potentially malicious
** characters from user input
*/
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
** for printing array data
*/
function prePrintArray( $arr, $returnAsString=false ) {
    $ret  = '<pre>' . print_r($arr, true) . '</pre>';
    if ($returnAsString)
        return $ret;
    else
        echo $ret; 
}

// when a POST form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

}

// debug print outs
// echo '$_GET array';
// prePrintArray($_GET);
// echo '$_POST array';
// prePrintArray($_POST);
// echo '$_FILES array';
// prePrintArray($_FILES);
// echo '$_SESSION array';
// prePrintArray($_SESSION);

?>