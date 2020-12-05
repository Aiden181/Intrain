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
    case "user":
        $page = PAGES_PATH . "/user.php";
        break;
    default:
        $page = PAGES_PATH . "/index.php";
        $_GET['p'] = "home";
        break;
}

// customer management pages
if(isset($_GET['b'])) {
    // customer management pages
    $_GET['b'] = trim($_GET['b']);
    switch ($_GET['b']) {
        case "edit":
            $page = PAGES_PATH . "/user.edit.php";
            break;
        case "video":
            $page = PAGES_PATH . "/user.video.php";
            break;
        default:
            $page = PAGES_PATH . "/user.php";
            $_GET['p'] = "user";
            break;
    }
}

// admin management pages
else if (isset($_GET['c'])) {
    $_GET['c'] = trim($_GET['c']);
    switch ($_GET['c']) {
        case "admins":
            $page = PAGES_PATH . "/admin.admin.php";
            break;
        case "users":
            $page = PAGES_PATH . "/admin.user.php";
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
                else if ($_GET['c'] == 'users') {
                    $page = PAGES_PATH . "/admin.user.create.php";
                    break;
                }
            case "update":
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.update.php";
                    break;
                }
                else if ($_GET['c'] == 'users') {
                    $page = PAGES_PATH . "/admin.user.update.php";
                    break;
                }
            case "delete":
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.delete.php";
                    break;
                }
                else if ($_GET['c'] == 'users') {
                    $page = PAGES_PATH . "/admin.user.delete.php";
                    break;
                }
            default:
                if ($_GET['c'] == 'admins') {
                    $page = PAGES_PATH . "/admin.admin.php";
                    $_GET['c'] = "admins";
                    break;
                }
                else if ($_GET['c'] == 'users') {
                    $page = PAGES_PATH . "/admin.user.php";
                    $_GET['c'] = "users";
                    break;
                }
        }
    }
}

if (!empty($page)) {
    // login and signup pages don't have header and footer
    if ($_GET['p'] == "login" || $_GET['p'] == "signup") {
        include $page;
    }
    else {
        if ($_GET['p'] == "admin") {
            // only allow logged in admins
            if (isset($_SESSION['Customer'])) {
                Header("Location: index.php?p=home");
            }
            else if (!isset($_SESSION['Admin']) && !isset($_SESSION['Customer'])) {
                Header("Location: index.php?p=login");
            }
        }
        else if (isset($_GET['c'])) {
            // only allow logged in admins
            if (isset($_SESSION['Customer'])) {
                Header("Location: index.php?p=home");
            }
            else if (!isset($_SESSION['Admin']) && !isset($_SESSION['Customer'])) {
                Header("Location: index.php?p=login");
            }
        }
        else if ($_GET['p'] == "user") {
            // only allow logged in customers
            if (isset($_SESSION['Admin'])) {
                Header("Location: index.php?p=home");
            }
            else {
                Header("Location: index.php?p=login");
            }
        }
        else if (isset($_GET['b'])) {
            // only allow logged in customers
            if (isset($_SESSION['Admin'])) {
                Header("Location: index.php?p=home");
            }
            else {
                Header("Location: index.php?p=login");
            }
        }

        include_once(PAGES_PATH . "/header.php");
        include $page;
        include_once(PAGES_PATH . '/footer.php');
    }
}
