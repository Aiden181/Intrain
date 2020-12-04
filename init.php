<?php

//Filter all user inputs
//Should be changed to individual filtering
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$_COOKIE = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRING);

// ----------------------------------------------- //
// ----------------- Directories ----------------- //
// ----------------------------------------------- //
define('ROOT', dirname(__FILE__) . "/");
define('SCRIPT_PATH', ROOT . 'scripts');
define('PAGES_PATH', ROOT . 'pages');
define('INCLUDES_PATH', ROOT . 'includes');
define('ADMIN_PATH', ROOT . 'admin');
define('IMG_LOCATION', 'images');
define('CSS_LOCATION', ROOT . 'css');

define('IN_SB', true);

require_once(INCLUDES_PATH.'/SessionManager.php');

SessionManager::sessionStart('Intrain');


// --------------------------------------------- //
// ---------------- Definitions ---------------- //
// --------------------------------------------- //
define('EMAIL_FORMAT', "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/");
define('URL_FORMAT', "/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}((:[0-9]{1,5})?\/.*)?$/i");

?>