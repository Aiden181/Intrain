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

// login auth variables
$error_message = "";
$invalid_login = false;

// when a POST form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ------------------------------------ //
    // --- LOGIN AUTHENTICATION SECTION --- //
    // ------------------------------------ //
    // reset login or log out button is pressed
    if (isset($_POST['reset-login']) || isset($_POST['logout'])) {
        // remove user from session
        if (isset($_SESSION['Customer'])) { unset($_SESSION['Customer']); }
        // remove admin from session
        if (isset($_SESSION['Admin'])){ unset($_SESSION['Admin']); }
    }

    // 'login' is in $_POST (after user presses Log In button)
    if (isset($_POST['login'])) {
        // none of the fields are empty and have value other than NULL
        if ((!empty($_POST['username']) && isset($_POST['username'])) && (!empty($_POST['password']) && isset($_POST['password']))) {
            // remove malicious characters then assign those values to the variable
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            
            // GET username and password from user's inputs from admin table
            $sql = "SELECT `username`, `password` FROM `admin` WHERE username='$username' AND password=PASSWORD('$password')";
            
            // run mysql query and store results to $result
            if ($result = mysqli_query($conn, $sql)) {
                // has at least 1 result
                if (mysqli_num_rows($result) > 0) {
                    // add admin to session
                    $_SESSION['Admin'] = $username;

                    // Free result set (free up memory)
                    mysqli_free_result($result);

                    // redirects to index.php upon successful login
                    header("Location: ./index.php");
                    exit;
                }
                else {
                    $invalid_login = true;
                    $error_message = "<span style='color: red'> Username or password is incorrect! </span>";
                }
            }
            else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
            
            // GET username and password from user's inputs customer table
            $sql = "SELECT `username`, `password` FROM `customer` WHERE username='$username' AND password=PASSWORD('$password')";
            
            // run mysql query and store results to $result
            if ($result = mysqli_query($conn, $sql)) {
                // has at least 1 result
                if (mysqli_num_rows($result) > 0) {
                    // add customer to session
                    $_SESSION['Customer'] = $username;

                    // Free result set (free up memory)
                    mysqli_free_result($result);

                    // redirects to index.php upon successful login
                    header("Location: ./index.php");
                    exit;
                }
                else {
                    $invalid_login = true;
                    $error_message = "<span style='color: red'> Username or password is incorrect! </span>";
                }
            }
            else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
        // fields empty
        else if (empty($_POST['username']) && empty($_POST['password'])) {
            $invalid_login = true;
            $error_message = "<span style='color: red'> Fields are empty! </span>";
        }
        // username field is empty
        else if (empty($_POST['username'])) {
            $invalid_login = true;
            $error_message = "<span style='color: red'> Please enter the username! </span>";
        }
        // password field is empty
        else if (empty($_POST['password'])) {
            $invalid_login = true;
            $error_message = "<span style='color: red'> Please enter the password! </span>";
        }
    }
    // ------------------------------------------- //
    // --- END OF LOGIN AUTHENTICATION SECTION --- //
    // ------------------------------------------- //

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