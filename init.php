<?php

//Filter all user inputs
//Should be changed to individual filtering
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$_COOKIE = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRING);

// --------------------- //
// ---- Directories ---- //
// --------------------- //
define('ROOT', dirname(__FILE__) . "/");
define('SCRIPT_PATH', ROOT . 'scripts');
define('PAGES_PATH', ROOT . 'pages');
define('WORKOUT_PATH', PAGES_PATH . '/workouts');
define('INCLUDES_PATH', ROOT . 'includes');
define('IMG_LOCATION', 'images');
define('CSS_LOCATION', 'css');
define('VID_LOCATION', 'videos');


// --------------------------- //
// ---- Regex definitions ---- //
// --------------------------- //
define('EMAIL_FORMAT', "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/");
define('URL_FORMAT', "/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}((:[0-9]{1,5})?\/.*)?$/i");


// --------------------- //
// ---- Admin flags ---- //
// --------------------- //
// root admin, have all powers
define('ROOT_ADMIN', "z");
// test database admin
define('TEST_DATABASE', "x");
// CRUD users
define('LIST_CUSTOMERS', "a");
define('ADD_CUSTOMERS', "b");
define('EDIT_CUSTOMERS', "c");
define('DELETE_CUSTOMERS', "d");
define('CRUD_CUSTOMERS', LIST_CUSTOMERS.ADD_CUSTOMERS.EDIT_CUSTOMERS.DELETE_CUSTOMERS);
// CRUD admins
define('LIST_ADMINS', "e");
define('ADD_ADMINS', "f");
define('EDIT_ADMINS', "g");
define('DELETE_ADMINS', "h");
define('CRUD_ADMINS', LIST_ADMINS.ADD_ADMINS.EDIT_ADMINS.DELETE_ADMINS);
// all flags
define('ALL_FLAGS', LIST_CUSTOMERS.ADD_CUSTOMERS.EDIT_CUSTOMERS.DELETE_CUSTOMERS.LIST_ADMINS.ADD_ADMINS.EDIT_ADMINS.DELETE_ADMINS.TEST_DATABASE);


// ----------------- //
// ---- Session ---- //
// ----------------- //
// 60 minutes in seconds
$inactive = 3600;
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 60 minutes

session_start();

if (isset($_SESSION['Admin']) || isset($_SESSION['Customer'])) {
    // last request was more than 60 minutes
    if (isset($_SESSION['session']) && (time() - $_SESSION['session'] > $inactive)) {
        unset($_SESSION);
        $_SESSION = array();
        session_destroy();
        Header('Location: index.php?p=login');
        exit();
    }
    else {
        $_SESSION['session'] = time(); // Update session
    }
}


// ---------------------------------------------------
//  Fix some $_SERVER vars
// ---------------------------------------------------
// Fix for IIS, which doesn't set REQUEST_URI
if (!isset($_SERVER['REQUEST_URI']) || trim($_SERVER['REQUEST_URI']) == '') {
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
    if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
        $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
    }
}
// Fix for Dreamhost and other PHP as CGI hosts
if (strstr($_SERVER['SCRIPT_NAME'], 'php.cgi')) {
    unset($_SERVER['PATH_INFO']);
}

if (trim($_SERVER['PHP_SELF']) == '') {
    $_SERVER['PHP_SELF'] = preg_replace("/(\?.*)?$/", '', $_SERVER["REQUEST_URI"]);
}
?>