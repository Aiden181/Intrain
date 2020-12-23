<?php
if (!defined('IN_INTRAIN')) {
    exit("You're not supposed to be here!");
}

/**
 * Logs out the admin by removing cookies and killing the session
 *
 * @return true.
 */
function logout() {
    unset($_SESSION);
    $_SESSION = array();
    session_destroy();
    return true;
}

/**
* Check if selected email has valid email format
*
* @param string $user_email Email address
* @return boolean
*/
function is_valid_email($user_email) {
    $chars = EMAIL_FORMAT;
    if (strstr($user_email, '@') && strstr($user_email, '.')) {
        return (boolean) preg_match($chars, $user_email);
    }
    return false;
}

/**
* Strip all potentially malicious characters from user input
*
* @param string $data user input
* @return string
*/
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
* For printing array data
*
* @param string $arr array
* @param string $returnAsString if true, return the string
* @return string
*/
function prePrintArray($arr, $returnAsString=false ) {
    $ret  = '<pre>' . print_r($arr, true) . '</pre>';
    if ($returnAsString)
        return $ret;
    else
        echo $ret;
}

function get_youtube_title($id) {
    $API_KEY   = "AIzaSyAugeihvFJPlSusdplkcqbprRm7awCvJMQ";
    $videoList = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id={$id}&key={$API_KEY}"));
    
    return $videoList->items[0]->snippet->title;
}

function get_youtube_thumbnail($id) {
    $API_KEY   = "AIzaSyAugeihvFJPlSusdplkcqbprRm7awCvJMQ";
    $videoList = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id={$id}&key={$API_KEY}"));

    $videoList->items[0]->snippet->thumbnails->default;
}


// debug print outs
// echo '$_FILES array';
// prePrintArray($_FILES);
// echo '$_GET array';
// prePrintArray($_GET);
// echo '$_POST array';
// prePrintArray($_POST);
// echo '$_SESSION array';
// prePrintArray($_SESSION);
?>