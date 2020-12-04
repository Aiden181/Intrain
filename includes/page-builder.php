<?php
$_GET['p'] = isset($_GET['p']) ? $_GET['p'] : 'default';
$_GET['p'] = trim($_GET['p']);
switch ($_GET['p']) {
    case "login":
        $page = PAGES_PATH . "/login.php";
        break;
    case "logout":
        logout();
        Header("Location: index.php?p=home");
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
    default:
        $page = PAGES_PATH . "/index.php";
        $_GET['p'] = "home";
        break;
}

if (isset($_GET['c'])) {
    // admin management pages
    $_GET['c'] = trim($_GET['c']);
    switch ($_GET['c']) {
        case "admins":
            $page = PAGES_PATH . "/admin.admin.php";
            break;
        case "customers":
            $page = PAGES_PATH . "/admin.customer.php";
            break;
        default:
            $page = PAGES_PATH . "/admin.php";
            $_GET['p'] = "admin";
            break;
    }

    if (isset($_GET['o'])) {
        // admin management pages
        $_GET['o'] = trim($_GET['o']);
        switch ($_GET['o']) {
            case "create":
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.create.php";
                    break;
                }
                else if ($_GET['c'] == 'customers') {
                    $page = PAGES_PATH . "/admin.customer.create.php";
                    break;
                }
            case "update":
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.update.php";
                    break;
                }
                else if ($_GET['c'] == 'customers') {
                    $page = PAGES_PATH . "/admin.customer.update.php";
                    break;
                }
            case "delete":
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.delete.php";
                    break;
                }
                else if ($_GET['c'] == 'customers') {
                    $page = PAGES_PATH . "/admin.customer.delete.php";
                    break;
                }
            default:
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.php";
                    $_GET['c'] = "admins";
                    break;
                }
                else if ($_GET['c'] == 'customers') {
                    $page = PAGES_PATH . "/admin.customer.php";
                    $_GET['c'] = "customers";
                    break;
                }
        }
    }
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
