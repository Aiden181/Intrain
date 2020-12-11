<?php
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