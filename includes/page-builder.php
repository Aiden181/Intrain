<?php
$_GET['p'] = isset($_GET['p']) ? $_GET['p'] : 'default';
$_GET['p'] = test_input($_GET['p']);
switch ($_GET['p']) {
    case "login":
        $page = PAGES_PATH . '/login.php';
        break;
    case "logout":
        logout();
        Header("Location: index.php?p=home");
        break;
    case "signup":
        $page = PAGES_PATH . '/signup.php';
        break;
    case "nutrition":
        $page = PAGES_PATH . '/nutrition.php';
        break;
    case "about":
        $page = PAGES_PATH . '/about.php';
        break;
    case "upper-body":
        $page = PAGES_PATH . '/upper-body.php';
        break;
    case "lower-body":
        $page = PAGES_PATH . '/lower-body.php';
        break;
    case "admin":
        $page = PAGES_PATH . '/admin.php';
        break;
    case "admineditdetails":
        $page = PAGES_PATH . '/admin.editdetails.php';
        break;
    case "user":
        $page = PAGES_PATH . '/user.php';
        break;
    
    // workout pages
    case "abs":
        $page = WORKOUT_PATH . '/abs.php';
        break;
    case "back":
        $page = WORKOUT_PATH . '/back.php';
        break;
    case "biceps":
        $page = WORKOUT_PATH . '/biceps.php';
        break;
    case "chest":
        $page = WORKOUT_PATH . '/chest.php';
        break;
    case "forearm":
        $page = WORKOUT_PATH . '/forearm.php';
        break;
    case "shoulder":
        $page = WORKOUT_PATH . '/shoulder.php';
        break;
    case "traps":
        $page = WORKOUT_PATH . '/traps.php';
        break;
    case "triceps":
        $page = WORKOUT_PATH . '/triceps.php';
        break;
    case "hamstrings":
        $page = WORKOUT_PATH . '/hamstrings.php';
        break;
    case "calves":
        $page = WORKOUT_PATH . '/calves.php';
        break;
    case "quads":
        $page = WORKOUT_PATH . '/quads.php';
        break;
    case "glutes":
        $page = WORKOUT_PATH . '/glutes.php';
        break;
    default:
        $page = PAGES_PATH . '/index.php';
        $_GET['p'] = "home";
        break;
}

// customer management pages
if(isset($_GET['b'])) {
    // customer management pages
    $_GET['b'] = test_input($_GET['b']);
    switch ($_GET['b']) {
        case "edit":
            $page = PAGES_PATH . '/user.edit.php';
            break;
        case "video":
            $page = PAGES_PATH . '/user.video.php';
            break;
        default:
            $page = PAGES_PATH . '/user.php';
            $_GET['p'] = "user";
            break;
    }
}

// admin management pages
else if (isset($_GET['c'])) {
    $_GET['c'] = test_input($_GET['c']);
    switch ($_GET['c']) {
        case "admins":
            $page = PAGES_PATH . '/admin.admin.php';
            break;
        case "users":
            $page = PAGES_PATH . '/admin.user.php';
            break;
        case "database":
            $page = PAGES_PATH . '/database-test.php';
            break;
        default:
            $page = PAGES_PATH . '/admin.php';
            $_GET['p'] = "admin";
            break;
    }

    if (isset($_GET['o'])) {
        // admin management pages
        $_GET['o'] = test_input($_GET['o']);
        switch ($_GET['o']) {
            case "create":
                if ($_GET['c'] === 'admins') {
                    $page = PAGES_PATH . '/admin.admin.create.php';
                    break;
                }
                else if ($_GET['c'] === 'users') {
                    $page = PAGES_PATH . '/admin.user.create.php';
                    break;
                }
            case "edit":
            case "delete":
                if ($_GET['c'] === 'admins') {
                    $page = PAGES_PATH . '/admin.admin.update.php';
                    break;
                }
                else if ($_GET['c'] === 'users') {
                    $page = PAGES_PATH . '/admin.user.update.php';
                    break;
                }
            default:
                if ($_GET['c'] === 'admins') {
                    $page = PAGES_PATH . '/admin.admin.php';
                    $_GET['c'] = "admins";
                    break;
                }
                else if ($_GET['c'] === 'users') {
                    $page = PAGES_PATH . '/admin.user.php';
                    $_GET['c'] = "users";
                    break;
                }
        }
    }
}

if (!empty($page)) {
    // logged in as an admin
    if (isset($_SESSION['Admin'])) {
        // redirect to admin panel if they try to go to login or signup page
        if (isset($_GET['p']) && (test_input($_GET['p']) === "login" || test_input($_GET['p']) === "signup")) {
            $page = PAGES_PATH . '/admin.php';
            $_GET['p'] = "admin";
            Header("Location: index.php?p=admin");
            die();
        }
        // redirect to home page if they try to access customer management pages
        else if (isset($_GET['p']) && (test_input($_GET['p']) === "user" || isset($_GET['b']))) {
            Header("Location: index.php?p=home");
            die();
        }
        
        // ----------------------------------------- //
        // ------- ADMIN FLAG AUTHENTICATION ------- //
        // ----------------------------------------- //
        // if flag is not root
        if ($_SESSION['flag'] != ROOT_ADMIN) {
            $is_crud_admin = false;
            $is_crud_customer = false;

            // loop through each character in admin flag string to check flag
            for ($i = 0; $i < strlen($_SESSION['flag']); $i++) {
                // flag is in in CRUD admins
                if (stristr(CRUD_ADMINS, $_SESSION['flag'][$i])) {
                    $is_crud_admin = true;  // set is crud admin to true
                }
                // flag is in CRUD customers
                else if (stristr(CRUD_CUSTOMERS, $_SESSION['flag'][$i])) {
                    $is_crud_customer = true;  // set is crud customer to true
                }
            }
            // deny access to admin management pages if flag is not in CRUD admins
            if (!$is_crud_admin) {
                if (isset($_GET['c'])) {
                    $_GET['c'] = test_input($_GET['c']);
                    if ($_GET['c'] === 'admins') {
                        $page = PAGES_PATH . '/admin.php';
                        $_GET['p'] = "admin";
                        Header("Location: index.php?p=admin");
                        die();
                    }
                }
            }
            // deny access to customer management pages if flag is not in CRUD customers
            if (!$is_crud_customer) {
                if (isset($_GET['c'])) {
                    $_GET['c'] = test_input($_GET['c']);
                    if ($_GET['c'] === 'users') {
                        $page = PAGES_PATH . '/admin.php';
                        $_GET['p'] = "admin";
                        Header("Location: index.php?p=admin");
                        die();
                    }
                }
            }
            
            // deny access to database automation testing page if flag 
            // doesn't have TEST_DATABASE flag
            if (!stristr($_SESSION['flag'], TEST_DATABASE)) {
                if (isset($_GET['c'])) {
                    $_GET['c'] = test_input($_GET['c']);
                    if ($_GET['c'] === 'database') {
                        $page = PAGES_PATH . '/admin.php';
                        $_GET['p'] = "admin";
                        Header("Location: index.php?p=admin");
                        die();
                    }
                }
            }
            
            if (isset($_GET['c']) && isset($_GET['o'])) {
                $_GET['c'] = test_input($_GET['c']);
                $_GET['o'] = test_input($_GET['o']);
                // deny access to customer management pages if flag doesn't 
                // have create customers flag
                if ($_GET['c'] === 'users' && $_GET['o'] === 'create') {
                    if (!stristr($_SESSION['flag'], ADD_CUSTOMERS)) {
                        $page = PAGES_PATH . '/admin.php';
                        $_GET['p'] = "admin";
                        Header("Location: index.php?p=admin");
                        die();
                    }
                }
                // deny access to customer management pages if flag doesn't 
                // have create admins flag
                else if ($_GET['c'] === 'admins' && $_GET['o'] === 'create') {
                    if (!stristr($_SESSION['flag'], ADD_ADMINS)) {
                        $page = PAGES_PATH . '/admin.php';
                        $_GET['p'] = "admin";
                        Header("Location: index.php?p=admin");
                        die();
                    }
                }
            }
        }
        // ------------------------------------------------ //
        // ------- END OF ADMIN FLAG AUTHENTICATION ------- //
        // ------------------------------------------------ //

        // other pages, build page like normal
        include_once(PAGES_PATH . '/header.php');
        include $page;
        include_once(PAGES_PATH . '/footer.php');
    }
    // logged in as a customer
    else if (isset($_SESSION['Customer'])) {
        // redirect to customer management if they try to go to login or signup page
        if (isset($_GET['p']) && (test_input($_GET['p']) === "login" || test_input($_GET['p']) === "signup")) {
            $page = PAGES_PATH . '/user.php';
            $_GET['p'] = "user";
            Header("Location: index.php?p=user");
            die();
        }
        // redirect to home page if they try to access admin management pages
        else if (isset($_GET['p']) && (test_input($_GET['p']) === "admin" || isset($_GET['c']))) {
            Header("Location: index.php?p=home");
            die();
        }
        // other pages, build page like normal
        else {
            include_once(PAGES_PATH . '/header.php');
            include $page;
            include_once(PAGES_PATH . '/footer.php');
        }
    }
    // not logged in
    else {
        // login and signup pages don't have header and footer
        if (isset($_GET['p']) && (test_input($_GET['p']) === "login" || test_input($_GET['p']) === "signup")) {
            include $page;
        }
        // redirect to home page if they try to access customer and admin management pages
        else if (isset($_GET['p']) && (test_input($_GET['p']) === "user")) {
            Header("Location: index.php?p=home");
            die();
        }
        else if (isset($_GET['b'])) {
            Header("Location: index.php?p=home");
            die();
        }
        else if (isset($_GET['p']) && (test_input($_GET['p']) === "admin")) {
            Header("Location: index.php?p=home");
            die();
        }
        else if (isset($_GET['c'])) {
            Header("Location: index.php?p=home");
            die();
        }
        // other pages, build page like normal
        else {
            include_once(PAGES_PATH . '/header.php');
            include $page;
            include_once(PAGES_PATH . '/footer.php');
        }
    }
}
