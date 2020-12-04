<?php
$_GET['p'] = isset($_GET['p']) ? $_GET['p'] : 'default';
$_GET['p'] = trim($_GET['p']);
switch ($_GET['p']) {
    case "login":
        $page = PAGES_PATH . "/login.php";
        break;
    case "logout":
        logout();
        Header("Location: index.php");
        break;
    case "signup":
        $page = PAGES_PATH . "/signup.php";
        break;
    case "nutrition":
        $page = PAGES_PATH ."/nutrition.php";
        break;
    case "about":
        $page = PAGES_PATH ."/about.php";
        break;
    case "upper-body":
        $page = PAGES_PATH ."/upper-body.php";
        break;
    case "lower-body":
        $page = PAGES_PATH ."/lower-body.php";
        break;
    case "admin":
        $page = PAGES_PATH . "/admin.php";
        break;
    case "admin-create":
        $page = PAGES_PATH . "/admin.create.php";
        break;
    case "admin-update":
        $page = PAGES_PATH . "/admin.update.php";
        break;
    case "admin-delete":
        $page = PAGES_PATH . "/admin.delete.php";
        break;
    case "admin-error":
        $page = PAGES_PATH . "/admin.error.php";
        break;
    default:
        $page = PAGES_PATH . "/index.php";
        $_GET['p'] = "home";
        break;
}

if (!empty($page)) {
    // login and signup pages don't have header and footer
    if ($page == PAGES_PATH . "/login.php" || $page == PAGES_PATH . "/signup.php")
        include $page;
    else {
        include_once(PAGES_PATH . "/header.php");
        include $page;
        include_once(PAGES_PATH . '/footer.php');
    }
}
