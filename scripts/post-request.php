<?php
// this file contains all POST requests

// login auth variables
$error_message = "";
$invalid_login = false;

// signup error variables
$first_name_valid = $last_name_valid = $email_valid = $phone_valid = $username_valid = $password_valid = false;
$nameError = $emailError = $phoneError = $usernameError = $passwordError = "";

// add admin error variables
$flag_valid = false;
$flagError = "";

// update user error variables
$currentpassword_valid = $newpassword_valid = $renewpassword_valid = false;

// update user success variables
$editEmailSuccess = $editPhoneSuccess = $editPasswordSuccess = true;
$emailSuccess = $phoneSuccess = $passwordSuccess = "";

// admin update accounts error variables
$editFirstNameSuccess = $editLastNameSuccess = $editFlagSuccess = true;
$lastNameSuccess = $firstNameSuccess = $flagSuccess = "";

// database test page message
$testSuccessMsg = "";

// when a POST form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    else if (isset($_POST['login'])) {
        // none of the fields are empty and have value other than NULL
        if ((!empty($_POST['username']) && isset($_POST['username'])) && (!empty($_POST['password']) && isset($_POST['password']))) {
            // remove malicious characters then assign those values to the variable
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            $password_current = $flag = "";
            
            // attempt to get a record from user inputted username and password
            // if row returns, continues with the login
            // otherwise, show error message
            // search in admin table first
            $sql = "SELECT `flag`, `password` FROM `admin` WHERE username=?";
            $db->query($sql, $username);
            if ($db->numRows() > 0) {
                $result = $db->fetchAll();
                foreach ($result as $row) {
                    $password_current = $row['password'];
                    $flag = $row['flag'];
                }
                if (password_verify($password, $password_current)) {
                    // add admin to session
                    $_SESSION['Admin'] = $username;
                    // add admin flag(s) to session
                    $_SESSION['flag'] = $flag;
    
                    // redirects to index.php upon successful login
                    header("Location: index.php?p=home");
                    exit;
                }
            }
            // search in customer table
            $sql = "SELECT `password` FROM `customer` WHERE username=?";
            $db->query($sql, $username);
            if ($db->numRows() > 0) {
                $result = $db->fetchAll();
                foreach ($result as $row) {
                    $password_current = $row['password'];
                }
                if (password_verify($password, $password_current)) {
                    // add customer to session
                    $_SESSION['Customer'] = $username;

                    // redirects to index.php upon successful login
                    header("Location: index.php?p=home");
                    exit;
                }
            }
            
            // nothing found, display error message
            $invalid_login = true;
            $error_message = "<span style='color: red'> Username or password is incorrect! </span>";
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


    // --------------------------------- //
    // --- SIGNUP VALIDATION SECTION --- //
    // --------------------------------- //
    // sign up or add customer from admin management
    else if (isset($_POST['signup']) || isset($_POST['add-customer']) ) {
        // Validate first name
        if (empty($_POST["first_name"])) {
            $nameError = "First Name is required!";
        } else {
            if (isset($_POST["first_name"])) {
                $first_name = test_input($_POST["first_name"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $first_name)) {
                    $nameError = "Please enter an appropriate name!";
                } else {  
                    $first_name_valid = true;
                }
            }
        }

        // Validate last name
        if (empty($_POST["last_name"])) {
            $nameError = "Last Name is required!";
        } else {
            if (isset($_POST["last_name"])) {
                $last_name = test_input($_POST["last_name"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $last_name)) {
                    $nameError = "Please enter an appropriate name!";
                } else {  
                    $last_name_valid = true;
                }
            }
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailError = "Email is required!";
        } else {
            if (isset($_POST["email"])) {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!is_valid_email($email) || !preg_match(EMAIL_FORMAT, $email)) {
                    $emailError = "Invalid email format!";
                } else {
                    // attempt to get email query result from user to check if email is registered
                    $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.email=? OR admin.email=?;";
                    $db->query($sql, $email, $email);
                    // query returned at least 1 row
                    if ($db->numRows() > 0) {
                        $emailError = "This email is already registered!";
                    } else {
                        $email_valid = true;
                    }
                }
            }
        }

        // Validate phone number
        if (empty($_POST["phone"])) {
            $phoneError = "Phone number is required!";
        } else {
        // field not empty, check if data is not null 
        if (isset($_POST["phone"])) {
                $phone_number = test_input($_POST["phone"]);
                // not matching regex, format error message
                if (!preg_match(PHONE_NUMBER_FORMAT, $phone_number)) {
                    $phoneError = "Invalid phone number";
                } else {
                    $phone_valid = true;
                }
            }
        }

        // Validate username
        if (empty($_POST["username"])) {
            $usernameError = "Username is required!";
        } else {
            // field not empty, check if data is not null 
            if (isset($_POST["username"])) {
                $username = test_input($_POST["username"]);
                // attempt to get username query result from user to check if username is registered
                $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.username=? OR admin.username=?;";
                $db->query($sql, $username, $username);
                // query returned at least 1 row
                if ($db->numRows() > 0) {
                    $usernameError = "Username has been taken!";
                } else {
                    $username_valid = true;
                }
            }
        }

        // Validate password
        if (empty($_POST["password"])) {
            $passwordError = "Password is required!";
        } else {
            // field not empty, check if data is not null
            if (isset($_POST["password"])) {
                $password = test_input($_POST["password"]);
                $password_valid = true;
            }
        }

        if ($first_name_valid && $last_name_valid && $email_valid && $phone_valid && $username_valid && $password_valid) {
            $sql = "INSERT INTO `customer`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`) VALUES (?, ?, ?, ?,?, ?)";
            $db->query($sql, $last_name, $first_name, $email, $phone_number, $username, password_hash($password, PASSWORD_DEFAULT));
            
            // if is admin adding a customer, redirect to admin user management page
            if (isset($_POST['add-customer'])) {
                Header("Location: index.php?p=admin&c=users");
                exit();
            }
            // regular signup, redirect to login page
            else {
                Header("Location: index.php?p=login");
                exit();
            }
        }
    }
    // ---------------------------------------- //
    // --- END OF SIGNUP VALIDATION SECTION --- //
    // ---------------------------------------- //

    // ------------------------------------ //
    // --- ADD ADMIN VALIDATION SECTION --- //
    // ------------------------------------ //
    // add admin from admin management
    else if (isset($_POST['add-admin'])) {
        // Validate first name
        if (empty($_POST["first_name"])) {
            $nameError = "First Name is required!";
        } else {
            if (isset($_POST["first_name"])) {
                $first_name = test_input($_POST["first_name"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $first_name)) {
                    $nameError = "Please enter an appropriate name!";
                } else {  
                    $first_name_valid = true;
                }
            }
        }

        // Validate last name
        if (empty($_POST["last_name"])) {
            $nameError = "Last Name is required!";
        } else {
            if (isset($_POST["last_name"])) {
                $last_name = test_input($_POST["last_name"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $last_name)) {
                    $nameError = "Please enter an appropriate name!";
                } else {  
                    $last_name_valid = true;
                }
            }
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailError = "Email is required!";
        } else {
            if (isset($_POST["email"])) {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!is_valid_email($email) || !preg_match(EMAIL_FORMAT, $email)) {
                    $emailError = "Invalid email format!";
                } else {
                    // attempt to get email query result from user to check if email is registered
                    $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.email=? OR admin.email=?;";
                    $db->query($sql, $email, $email);
                    // query returned at least 1 row
                    if ($db->numRows() > 0) {
                        $emailError = "This email is already registered!";
                    } else {
                        $email_valid = true;
                    }
                }
            }
        }

        // Validate phone number
        if (empty($_POST["phone"])) {
            $phoneError = "Phone number is required!";
        } else {
        // field not empty, check if data is not null 
        if (isset($_POST["phone"])) {
                $phone_number = test_input($_POST["phone"]);
                // not matching regex, format error message
                if (!preg_match(PHONE_NUMBER_FORMAT, $phone_number)) {
                    $phoneError = "Invalid phone number";
                } else {
                    $phone_valid = true;
                }
            }
        }

        // Validate username
        if (empty($_POST["username"])) {
            $usernameError = "Username is required!";
        } else {
            // field not empty, check if data is not null 
            if (isset($_POST["username"])) {
                $username = test_input($_POST["username"]);
                // attempt to get username query result from user to check if username is registered
                $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.username=? OR admin.username=?;";
                $db->query($sql, $username, $username);
                // query returned at least 1 row
                if ($db->numRows() > 0) {
                    $usernameError = "Username has been taken!";
                } else {
                    $username_valid = true;
                }
            }
        }

        // Validate password
        if (empty($_POST["password"])) {
            $passwordError = "Password is required!";
        } else {
            // field not empty, check if data is not null
            if (isset($_POST["password"])) {
                $password = test_input($_POST["password"]);
                $password_valid = true;
            }
        }
        
        // Validate flag
        $flag_string = "";
        if (empty($_POST["flag"])) {
            $flagError = "Flag is required!";
        } else {
            // field not empty, check if data is not null
            if (isset($_POST["flag"])) {
                // remove malicious characters and add each data to $flag array
                for ($i = 0; $i < sizeof($_POST["flag"]); $i++) {
                    $flag[$i] = test_input($_POST["flag"][$i]);
                    $flag_string .= $flag[$i];
                }
                // all flags selected, set flag string to root admin flag
                if ($flag_string === ALL_FLAGS) {
                    $flag_string = ROOT_ADMIN;
                    $flag_valid = true;
                }
                // custom set of flags
                else {
                    // check if each flag is in the flag list
                    for ($i = 0; $i < strlen($flag_string); $i++) {
                        if (stristr(ALL_FLAGS, $flag_string[$i])) {
                            $flag_valid = true;
                        } else {
                            $flagError = "Invalid flag!";
                            break;
                        }
                    }
                }
            }
        }

        if ($first_name_valid && $last_name_valid && $email_valid && $phone_valid && $username_valid && $password_valid && $flag_valid) {
            $sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $db->query($sql, $last_name, $first_name, $email, $phone_number,$username, password_hash($password, PASSWORD_DEFAULT), $flag_string);
            Header("Location: index.php?p=admin&c=admins");
            exit();
        }
    }
    // ------------------------------------------- //
    // --- END OF ADD ADMIN VALIDATION SECTION --- //
    // ------------------------------------------- //

    // --------------------------------- //
    // --- ADMIN DELETE USER SECTION --- //
    // --------------------------------- //
    else if (isset($_POST['delete-user'])) {
        if (!empty($_GET["id"]) && isset($_GET["id"])) {
            $id =  test_input($_GET["id"]);
            if ($_GET["c"] === "admins")
                $sql = "DELETE FROM `admin` WHERE id=?;";
            if ($_GET["c"] === "users")
                $sql = "DELETE FROM `customer` WHERE id=?;";
            
            $db->query($sql, $id);
        }
    }
    // ---------------------------------------- //
    // --- END OF ADMIN DELETE USER SECTION --- //
    // ---------------------------------------- //
    
    // -------------------------------- //
    // --- DATABASE TESTING SECTION --- //
    // -------------------------------- //
    else if (isset($_POST['database-test'])) {
        $testdb = new PDO("mysql:host=localhost;port=3306;", $user, $pass);

        if (!$stmt = $testdb->prepare("CREATE DATABASE IF NOT EXISTS intrain_test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
            prePrintArray($testdb->errorInfo());
        }
        if (!$stmt->execute()) {
            echo "\ntable.sql PDO::errorInfo():\n";
            prePrintArray($stmt->errorInfo());
        }

        if (!$stmt = $testdb->prepare("USE intrain_test")) {
            prePrintArray($testdb->errorInfo());
        }
        if (!$stmt->execute()) {
            echo "\ntable.sql PDO::errorInfo():\n";
            prePrintArray($stmt->errorInfo());
        }

        // works not with the following set to 0. You can comment this line as 1 is default
        $testdb->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

        $sql = file_get_contents("./test/schemas/table.sql");
        if (!$stmt = $testdb->prepare($sql)) {
            prePrintArray($testdb->errorInfo());
        }
        if (!$stmt->execute()) {
            echo "\ntable.sql PDO::errorInfo():\n";
            prePrintArray($stmt->errorInfo());
        }

        $sql = file_get_contents("./test/schemas/insert.sql");
        if (!$stmt = $testdb->prepare($sql)) {
            prePrintArray($testdb->errorInfo());
        }
        if (!$stmt->execute()) {
            echo "\ninsert.sql query PDO::errorInfo():\n";
            prePrintArray($stmt->errorInfo());
        }

        $sql = file_get_contents("./test/schemas/update.sql");
        if (!$stmt = $testdb->prepare($sql)) {
            prePrintArray($testdb->errorInfo());
        }
        if (!$stmt->execute()) {
            echo "\nupdate.sql query PDO::errorInfo():\n";
            prePrintArray($stmt->errorInfo());
        }

        $sql = file_get_contents("./test/schemas/delete.sql");
        if (!$stmt = $testdb->prepare($sql)) {
            prePrintArray($testdb->errorInfo());
        }
        if (!$stmt->execute()) {
            echo "\ndelete.sqlPDO::errorInfo():\n";
            prePrintArray($stmt->errorInfo());
        }

        // test finished, close connection
        $testdb=null;

        $testSuccessMsg = "<h1 style='font-weight: bold;'>Tests ran successfully!</h1>";
    }
    // --------------------------------------- //
    // --- END OF DATABASE TESTING SECTION --- //
    // --------------------------------------- //
}
?>