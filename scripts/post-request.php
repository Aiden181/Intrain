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
$editFirstNameSuccess = $editLastNameSuccess = true;
$lastNameSuccess = $firstNameSuccess = "";

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
    else if (isset($_POST['login'])) {
        // none of the fields are empty and have value other than NULL
        if ((!empty($_POST['username']) && isset($_POST['username'])) && (!empty($_POST['password']) && isset($_POST['password']))) {
            // remove malicious characters then assign those values to the variable
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            
            // attempt to get a record from user inputted username and password
            // if row returns, continues with the login
            // otherwise, show error message
            // search in admin table first
            $sql = "SELECT `id`, `flag` FROM `admin` WHERE username=? AND password=PASSWORD(?)";
            $db->query($sql, $username, $password);
            if ($db->numRows() > 0) {
                // add admin to session
                $_SESSION['Admin'] = $username;
                // add admin flag(s) to session
                $result = $db->fetchAll();
                foreach ($result as $row) {
                    $_SESSION['flag'] = $row['flag'];
                }

                // redirects to index.php upon successful login
                header("Location: index.php?p=home");
                exit;
            }
            // search in customer table
            $sql = "SELECT `id` FROM `customer` WHERE username=? AND password=PASSWORD(?)";
            $db->query($sql, $username, $password);
            if ($db->numRows() > 0) {
                // add customer to session
                $_SESSION['Customer'] = $username;

                // redirects to index.php upon successful login
                header("Location: index.php?p=home");
                exit;
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
                if (!is_valid_email($email)) {
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
                if (!preg_match("/^\+?\d{0,13}/", $phone_number)) {
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
            $sql = "INSERT INTO `customer`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`) VALUES (?, ?, ?, ?,?, PASSWORD(?))";
            $db->query($sql, $last_name, $first_name, $email, $phone_number, $username, $password);
            
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
                if (!is_valid_email($email)) {
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
                if (!preg_match("/^\+?\d{0,13}/", $phone_number)) {
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

        $flag = array();
        $flag_string = "";
        
        // Validate flag
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
                if ($flag_string == "abcdefgh") {
                    $flag_string = ROOT_ADMIN;
                    $flag_valid = true;
                }
                // custom set of flags
                else {
                    // check if each flag is in the flag list
                    for ($i = 0; $i < sizeof($flag); $i++) {
                        if (stristr(ALL_FLAGS, $flag[$i])) {
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
            $sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) VALUES (?, ?, ?, ?, ?, PASSWORD(?), ?)";
            $db->query($sql, $last_name, $first_name, $email, $phone_number,$username, $password, $flag_string);
            Header("Location: index.php?p=admin&c=admins");
            exit();
        }
    }
    // ------------------------------------------- //
    // --- END OF ADD ADMIN VALIDATION SECTION --- //
    // ------------------------------------------- //

    
    // -------------------------------------------------- //
    // --- USER UPDATE OWN DETAILS VALIDATION SECTION --- //
    // -------------------------------------------------- //
    // user/admin update details from user/admin edit details page
    else if (isset($_POST['update-user']) || isset($_POST['update-admin'])) {
        if (isset($_POST['update-user']))
            $username = $_SESSION['Customer'];
        else if (isset($_POST['update-admin']))
            $username = $_SESSION['Admin'];

        $last_name = $first_name = $email = $phone_number = $password = "";
        if (isset($_POST['update-user']))
            $sql = "SELECT `email`, `phone_number`, `password` FROM `customer` WHERE username=?";
        if (isset($_POST['update-admin']))
            $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `password` FROM `admin` WHERE username=?";
        
        $db->query($sql, $username);
        // query returned at least 1 row
        if ($db->numRows() > 0) {
            $result = $db->fetchAll();
            foreach ($result as $row) {
                $last_name = $row['last_name'];
                $first_name = $row['first_name'];
                $email = $row['email'];
                $phone_number = $row['phone_number'];
                $password = $row['password'];
            }
        }
        
        // validate first name and last name for admins too since admins can change those
        if (isset($_POST['update-admin'])) {
            // Validate first name
            if (!empty($_POST["first_name"]) && isset($_POST["first_name"])) {
                $first_name_new = test_input($_POST["first_name"]);
                if ($first_name_new != $first_name) {
                    // not matching regex, format error message
                    if (!preg_match("/^[A-Za-z]+$/", $first_name_new)) {
                        $nameError = "Please enter an appropriate name!";
                        $editFirstNameSuccess = false;
                    } else {
                        $firstNameSuccess = "First name updated.";
                        $first_name_valid = true;
                    }
                }
            }

            // Validate last name
            if (!empty($_POST["last_name"]) && isset($_POST["last_name"])) {
                $last_name_new = test_input($_POST["last_name"]);
                if ($last_name_new != $last_name) {
                    // not matching regex, format error message
                    if (!preg_match("/^[A-Za-z]+$/", $last_name_new)) {
                        $nameError = "Please enter an appropriate name!";
                        $editLastNameSuccess = false;
                    } else {
                        $lastNameSuccess = "Last name updated.";
                        $last_name_valid = true;
                    }
                }
            }
        }

        // Validate email
        if (!empty($_POST["email"]) && isset($_POST["email"])) {
            $email_new = test_input($_POST["email"]);
            if ($email_new != $email) {
                // check if e-mail address is well-formed
                if (!is_valid_email($email_new)) {
                    $emailError = "Invalid email format!";
                    $editEmailSuccess = false;
                } else {
                    // attempt to get email query result from user to check if email is registered
                    $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.email=? OR admin.email=?;";
                    // execute query
                    $db->query($sql, $email_new, $email_new);
                    // query returned at least 1 row
                    if ($db->numRows() > 0) {
                        $emailError = "This email is already registered!";
                    } else {
                        $emailSuccess = "Email updated.";
                        $email_valid = true;
                    }
                }
            }
        }

        // Validate phone number
        if (!empty($_POST["phone"]) && isset($_POST["phone"])) {
            $phone_number_new = test_input($_POST["phone"]);
            if ($phone_number_new != $phone_number) {
                // not matching regex, format error message
                if (!preg_match("/^\+?\d{0,13}/", $phone_number_new)) {
                    $phoneError = "Invalid phone number";
                    $editPhoneSuccess = false;
                } else {
                    $phoneSuccess = "Phone number updated.";
                    $phone_valid = true;
                }
            }
        }

        // Validate password
        // if 'current password' field has value
        if (!empty($_POST["oldpassword"]) && isset($_POST["oldpassword"])) {
            $currentpassword = test_input($_POST["oldpassword"]);

            // prepare a SELECT sql query to validate 'current password' field
            if (isset($_POST['admin-update-customer-details']))
                $sql = "SELECT `password` FROM `customer` WHERE username=? AND password=PASSWORD(?)";
            if (isset($_POST['admin-update-admin-details']))
                $sql = "SELECT `password` FROM `admin` WHERE username=? AND password=PASSWORD(?)";
            
            // execute query
            $db->query($sql, $username, $currentpassword);
            // no rows returned, password does not match the one in database
            if ($db->numRows() == 0) {
                $passwordError = "Current password is incorrect!";
                $editPasswordSuccess = false;
            }
            // has row returned
            else {
                $currentpassword_valid = true;
                // 'new password' field has value
                if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
                    $newpassword = test_input($_POST["newpassword"]);
                    $newpassword_valid = true;
                    // field not empty, check if data is not null
                    if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
                        $renewpassword = test_input($_POST["renewpassword"]);

                        // 're-type new password' field and 'new password' field are the same
                        if ($renewpassword == $newpassword) {
                            // new password same as old password
                            if ($renewpassword == $currentpassword) {
                                $passwordError = "New password is the same as old password";
                                $editPasswordSuccess = false;
                            }
                            // update password
                            else {
                                $passwordSuccess = "Password updated.";
                                $renewpassword_valid = true;
                            }
                        }
                        // 'new password' and 're-type new password' fields don't match, store error message
                        else {
                            $passwordError = "New password in fields don't match!";
                            $editPasswordSuccess = false;
                        }
                    }
                    // no value in 're-type new password' field, store error message
                    else {
                        $passwordError = "Please re-type your new password!";
                        $editPasswordSuccess = false;
                    }
                }
                // no value in 'new password' field, store error message
                else {
                    $passwordError = "New password is required!";
                    $editPasswordSuccess = false;
                }
            }
        }
        // only 'new password' field is filled
        else if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
            $passwordError = "Please enter your current password!";
            $editPasswordSuccess = false;
        }
        // only 're-type new password' field is filled
        else if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
            $passwordError = "Please enter your current and new password!";
            $editPasswordSuccess = false;
        }
        
        if (isset($_POST['update-admin'])) {
            if ($first_name_valid) {
                $sql = "UPDATE `admin` SET `first_name`=? WHERE username=?;";
                $db->query($sql, $first_name_new, $username);
            }
            if ($last_name_valid) {
                $sql = "UPDATE `admin` SET `last_name`=? WHERE username=?;";
                $db->query($sql, $last_name_new, $username);
            }
        }
        if ($email_valid) {
            if (isset($_POST['update-user']))
                $sql = "UPDATE `customer` SET `email`=? WHERE username=?;";
            else if (isset($_POST['update-admin']))
                $sql = "UPDATE `admin` SET `email`=? WHERE username=?;";
            
            $db->query($sql, $email_new, $username);
        }
        if ($phone_valid) {
            if (isset($_POST['update-user']))
                $sql = "UPDATE `customer` SET `phone_number`=? WHERE username=?";
            else if (isset($_POST['update-admin']))
                $sql = "UPDATE `admin` SET `phone_number`=? WHERE username=?";
            
            $db->query($sql, $phone_number_new, $username);
        }
        if ($currentpassword_valid && $newpassword_valid && $renewpassword_valid) {
            if (isset($_POST['update-user']))
                $sql = "UPDATE `customer` SET `password`=PASSWORD(?) WHERE username=?;";
            else if (isset($_POST['update-admin']))
                $sql = "UPDATE `admin` SET `password`=PASSWORD(?) WHERE username=?;";
            
            $db->query($sql, $renewpassword, $username);
        }
    }
    // --------------------------------------------------------- //
    // --- END OF USER UPDATE OWN DETAILS VALIDATION SECTION --- //
    // --------------------------------------------------------- //

    // ------------------------------------------------------------------ //
    // --- ADMIN UPDATE CUSTOMER AND ADMIN DETAILS VALIDATION SECTION --- //
    // ------------------------------------------------------------------ //
    // user/admin update details from user/admin edit details page
    else if (isset($_POST['admin-update-customer-details']) || isset($_POST['admin-update-admin-details'])) {
        // Get id
        if (!empty($_GET["id"]) && isset($_GET["id"])) {
            $id =  test_input($_GET["id"]);
            $first_name = $last_name = $email = $phone_number = $username = "";
            if (isset($_POST['admin-update-customer-details']))
                $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `username` FROM `customer` WHERE id=?";
            if (isset($_POST['admin-update-admin-details']))
                $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `username` FROM `admin` WHERE id=?";
            
            $db->query($sql, $id);
            if ($db->numRows() > 0) {
                $result = $db->fetchAll();
                foreach ($result as $row) {
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $email = $row['email'];
                    $phone_number = $row['phone_number'];
                }
            }
        }
        
        // Validate first name
        if (!empty($_POST["first_name"]) && isset($_POST["first_name"])) {
            $first_name_new = test_input($_POST["first_name"]);
            if ($first_name_new != $first_name) {
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $first_name_new)) {
                    $nameError = "Please enter an appropriate name!";
                    $editFirstNameSuccess = false;
                } else {
                    $firstNameSuccess = "First name updated.";
                    $first_name_valid = true;
                }
            }
        }

        // Validate last name
        if (!empty($_POST["last_name"]) && isset($_POST["last_name"])) {
            $last_name_new = test_input($_POST["last_name"]);
            if ($last_name_new != $last_name) {
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $last_name_new)) {
                    $nameError = "Please enter an appropriate name!";
                    $editLastNameSuccess = false;
                } else {
                    $lastNameSuccess = "Last name updated.";
                    $last_name_valid = true;
                }
            }
        }

        // Validate email
        if (!empty($_POST["email"]) && isset($_POST["email"])) {
            $email_new = test_input($_POST["email"]);
            if ($email_new != $email) {
                // check if e-mail address is well-formed
                if (!is_valid_email($email_new)) {
                    $emailError = "Invalid email format!";
                    $editEmailSuccess = false;
                } else {
                    // attempt to get email query result from user to check if email is registered
                    $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.email=? OR admin.email=?;";
                    // execute query
                    $db->query($sql, $email_new, $email_new);
                    // query returned at least 1 row
                    if ($db->numRows() > 0) {
                        $emailError = "This email is already registered!";
                    } else {
                        $emailSuccess = "Email updated.";
                        $email_valid = true;
                    }
                }
            }
        }

        // Validate phone number
        if (!empty($_POST["phone"]) && isset($_POST["phone"])) {
            $phone_number_new = test_input($_POST["phone"]);
            if ($phone_number_new != $phone_number) {
                // not matching regex, format error message
                if (!preg_match("/^\+?\d{0,13}/", $phone_number_new)) {
                    $phoneError = "Invalid phone number";
                    $editPhoneSuccess = false;
                } else {
                    $phoneSuccess = "Phone number updated.";
                    $phone_valid = true;
                }
            }
        }
        
        // Validate password
        // if 'current password' field has value
        if (!empty($_POST["oldpassword"]) && isset($_POST["oldpassword"])) {
            $currentpassword = test_input($_POST["oldpassword"]);

            // prepare a SELECT sql query to validate 'current password' field
            if (isset($_POST['admin-update-customer-details']))
                $sql = "SELECT `password` FROM `customer` WHERE id=? AND password=PASSWORD(?)";
            if (isset($_POST['admin-update-admin-details']))
                $sql = "SELECT `password` FROM `admin` WHERE id=? AND password=PASSWORD(?)";
            
            // execute query
            $db->query($sql, $id, $currentpassword);
            // no rows returned, password does not match the one in database
            if ($db->numRows() == 0) {
                $passwordError = "Current password is incorrect!";
                $editPasswordSuccess = false;
            }
            // has row returned
            else {
                $currentpassword_valid = true;
                // 'new password' field has value
                if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
                    $newpassword = test_input($_POST["newpassword"]);
                    $newpassword_valid = true;
                    // field not empty, check if data is not null
                    if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
                        $renewpassword = test_input($_POST["renewpassword"]);

                        // 're-type new password' field and 'new password' field are the same
                        if ($renewpassword == $newpassword) {
                            // new password same as old password
                            if ($renewpassword == $currentpassword) {
                                $passwordError = "New password is the same as old password";
                                $editPasswordSuccess = false;
                            }
                            // update password
                            else {
                                $passwordSuccess = "Password updated.";
                                $renewpassword_valid = true;
                            }
                        }
                        // 'new password' and 're-type new password' fields don't match, store error message
                        else {
                            $passwordError = "New password in fields don't match!";
                            $editPasswordSuccess = false;
                        }
                    }
                    // no value in 're-type new password' field, store error message
                    else {
                        $passwordError = "Please re-type your new password!";
                        $editPasswordSuccess = false;
                    }
                }
                // no value in 'new password' field, store error message
                else {
                    $passwordError = "New password is required!";
                    $editPasswordSuccess = false;
                }
            }
        }
        // only 'new password' field is filled
        else if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
            $passwordError = "Please enter your current password!";
            $editPasswordSuccess = false;
        }
        // only 're-type new password' field is filled
        else if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
            $passwordError = "Please enter your current and new password!";
            $editPasswordSuccess = false;
        }

        if ($first_name_valid) {
            if (isset($_POST['admin-update-customer-details']))
                $sql = "UPDATE `customer` SET `first_name`=? WHERE id=?;";
            else if (isset($_POST['admin-update-admin-details']))
                $sql = "UPDATE `admin` SET `first_name`=? WHERE id=?;";
            
            $db->query($sql, $first_name_new, $id);
        }
        if ($last_name_valid) {
            if (isset($_POST['admin-update-customer-details']))
                $sql = "UPDATE `customer` SET `last_name`=? WHERE id=?;";
            else if (isset($_POST['admin-update-admin-details']))
                $sql = "UPDATE `admin` SET `last_name`=? WHERE id=?;";
            
            $db->query($sql, $last_name_new, $id);
        }
        if ($email_valid) {
            if (isset($_POST['admin-update-customer-details']))
                $sql = "UPDATE `customer` SET `email`=? WHERE id=?;";
            else if (isset($_POST['admin-update-admin-details']))
                $sql = "UPDATE `admin` SET `email`=? WHERE id=?;";
            
            $db->query($sql, $email_new, $id);
        }
        if ($phone_valid) {
            if (isset($_POST['admin-update-customer-details']))
                $sql = "UPDATE `customer` SET `phone_number`=? WHERE id=?";
            else if (isset($_POST['admin-update-admin-details']))
                $sql = "UPDATE `admin` SET `phone_number`=? WHERE id=?";
            
            $db->query($sql, $phone_number_new, $id);
        }
        if ($currentpassword_valid && $newpassword_valid && $renewpassword_valid) {
            if (isset($_POST['admin-update-customer-details']))
                $sql = "UPDATE `customer` SET `password`=PASSWORD(?) WHERE id=?;";
            else if (isset($_POST['admin-update-admin-details']))
                $sql = "UPDATE `admin` SET `password`=PASSWORD(?) WHERE id=?;";
            
            $db->query($sql, $renewpassword, $id);
        }
    }
    // ------------------------------------------------------------------------- //
    // --- END OF ADMIN UPDATE CUSTOMER AND ADMIN DETAILS VALIDATION SECTION --- //
    // ------------------------------------------------------------------------- //

    // --------------------------------- //
    // --- ADMIN DELETE USER SECTION --- //
    // --------------------------------- //
    else if (isset($_POST['delete-user'])) {
        if (!empty($_GET["id"]) && isset($_GET["id"])) {
            $id =  test_input($_GET["id"]);
            if ($_GET["c"] == "admins")
                $sql = "DELETE FROM `admin` WHERE id=?;";
            if ($_GET["c"] == "users")
                $sql = "DELETE FROM `customer` WHERE id=?;";
            
            $db->query($sql, $id);
        }
    }
    // ---------------------------------------- //
    // --- END OF ADMIN DELETE USER SECTION --- //
    // ---------------------------------------- //
}
?>