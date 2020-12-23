<?php
include_once '../init.php';
include_once('../includes/Database.php');
include_once('../includes/db-init.php');
include_once('tools.php');
include_once('post-request.php');

// -------------------------------------------------- //
// --- USER UPDATE OWN DETAILS VALIDATION SECTION --- //
if (isset($_POST['update-user']) || isset($_POST['update-admin'])) {
    $errors = array(); // array to hold validation errors
    $data = array(); // array to pass back data
    $sucessMsg = array();

    if (isset($_POST['update-user'])) {
        $username = $_SESSION['Customer'];
        $sql = "SELECT `email`, `phone_number`, `password` FROM `customer` WHERE username=?";
        $db->query($sql, $username);
        // query returned at least 1 row
        if ($db->numRows() > 0) {
            $result = $db->fetchAll();
            foreach ($result as $row) {
                $email = $row['email'];
                $phone_number = $row['phone_number'];
                $password = $row['password'];
            }
        }
    }
    else if (isset($_POST['update-admin'])) {
        $username = $_SESSION['Admin'];
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
    }

    // validate first name and last name for admins too since admins can change those
    if (isset($_POST['update-admin'])) {
        // Validate first name
        if (!empty($_POST["first_name"]) && isset($_POST["first_name"])) {
            $first_name_new = test_input($_POST["first_name"]);
            if ($first_name_new !== $first_name) {
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $first_name_new)) {
                    $errors['name'] = 'Please enter an appropriate name!';
                } else {
                    $first_name_valid = true;
                    $sucessMsg['first_name'] = 'First name updated.';
                }
            }
        }

        // Validate last name
        if (!empty($_POST["last_name"]) && isset($_POST["last_name"])) {
            $last_name_new = test_input($_POST["last_name"]);
            if ($last_name_new !== $last_name) {
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z]+$/", $last_name_new)) {
                    $errors['name'] = 'Please enter an appropriate name!';
                } else {
                    $last_name_valid = true;
                    $sucessMsg['last_name'] = 'Last name updated.';
                }
            }
        }
    }

    // Validate email
    if (!empty($_POST["email"]) && isset($_POST["email"])) {
        $email_new = test_input($_POST["email"]);
        if ($email_new !== $email) {
            // check if e-mail address is well-formed
            if (!is_valid_email($email_new) || !preg_match(EMAIL_FORMAT, $email_new)) {
                $errors['email'] = 'Invalid email format!';
            } else {
                // attempt to get email query result from user to check if email is registered
                $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.email=? OR admin.email=?;";
                // execute query
                $db->query($sql, $email_new, $email_new);
                // query returned at least 1 row
                if ($db->numRows() > 0) {
                    $errors['email'] = 'This email is already registered!';
                } else {
                    $email_valid = true;
                    $sucessMsg['email'] = 'Email updated.';
                }
            }
        }
    }

    // Validate phone number
    if (!empty($_POST["phone"]) && isset($_POST["phone"])) {
        $phone_number_new = test_input($_POST["phone"]);
        if ($phone_number_new !== $phone_number) {
            // not matching regex, format error message
            if (!preg_match(PHONE_NUMBER_FORMAT, $phone_number_new)) {
                $errors['phone'] = 'Invalid phone number!';
            } else {
                $phone_valid = true;
                $sucessMsg['phone'] = 'Phone number updated.';
            }
        }
    }

    // Validate password
    // if 'current password' field has value
    if (!empty($_POST["oldpassword"]) && isset($_POST["oldpassword"])) {
        $currentpassword = test_input($_POST["oldpassword"]);
        if (!password_verify($currentpassword, $password)) {
            $errors['password'] = 'Current password is incorrect!';
        } else {
            $currentpassword_valid = true;
            // 'new password' field has value
            if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
                $newpassword = test_input($_POST["newpassword"]);
                $newpassword_valid = true;
                // field not empty, check if data is not null
                if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
                    $renewpassword = test_input($_POST["renewpassword"]);
                    // 'retype new password' field and 'new password' field are the same
                    if ($renewpassword === $newpassword) {
                        // new password same as old password
                        if ($renewpassword === $currentpassword) {
                            $errors['password'] = 'New password is the same as old password!';
                        }
                        // update password
                        else {
                            $renewpassword_valid = true;
                            $sucessMsg['password'] = 'Password updated.';
                        }
                    }
                    // 'new password' and 'retype new password' fields don't match, store error message
                    else {
                        $errors['password'] = "New password in fields don't match!";
                    }
                }
                // no value in 'retype new password' field, store error message
                else {
                    $errors['password'] = "Please retype your new password!";
                }
            }
            // no value in 'new password' field, store error message
            else {
                $errors['password'] = "New password is required!";
            }
        }
    }
    // only 'new password' field is filled
    else if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
        $errors['password'] = 'Please enter your current password!';
    }
    // only 'retype new password' field is filled
    else if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
        $errors['password'] = 'Please enter your current and new password!';
    }


    // if there are any errors in our errors array, return a success boolean of false
    if (!empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    }
    // no errors, proceed with updating details
    else {
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
                $sql = "UPDATE `customer` SET `password`=? WHERE username=?;";
            else if (isset($_POST['update-admin']))
                $sql = "UPDATE `admin` SET `password`=? WHERE username=?;";

            $db->query($sql, password_hash($renewpassword, PASSWORD_DEFAULT), $username);
        }

        $data['success'] = true;
        // store update successful messages
        $data['sucessMsg'] = $sucessMsg;
    }

    // return all our data to an AJAX call
    echo json_encode($data);
}
// --- END OF USER UPDATE OWN DETAILS VALIDATION SECTION --- //
// --------------------------------------------------------- //


// ------------------------------------------------------------------ //
// --- ADMIN UPDATE CUSTOMER AND ADMIN DETAILS VALIDATION SECTION --- //
// user/admin update details from user/admin edit details page
else if (isset($_POST['update-customer-details']) || isset($_POST['update-admin-details'])) {
    $errors = array(); // array to hold validation errors
    $data = array(); // array to pass back data
    $sucessMsg = array();
    if (isset($_POST['update-customer-details'])) {
        $id = test_input($_POST['update-customer-details']);
        $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `password` FROM `customer` WHERE id=?";
        $db->query($sql, $id);
        if ($db->numRows() > 0) {
            $result = $db->fetchAll();
            foreach ($result as $row) {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $phone_number = $row['phone_number'];
                $password = $row['password'];
            }
        }
        else {
            $errors['id'] = "Invalid id!";
        }
    }
    else if (isset($_POST['update-admin-details'])) {
        $id = test_input($_POST['update-admin-details']);
        $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `password`, `flag` FROM `admin` WHERE id=?";
        $db->query($sql, $id);
        if ($db->numRows() > 0) {
            $result = $db->fetchAll();
            foreach ($result as $row) {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $phone_number = $row['phone_number'];
                $password = $row['password'];
                $flag_string_old = $row['flag'];
            }
        }
        else {
            $errors['id'] = "Invalid id!";
        }
    }
    
    // Validate first name
    if (!empty($_POST["first_name"]) && isset($_POST["first_name"])) {
        $first_name_new = test_input($_POST["first_name"]);
        if ($first_name_new !== $first_name) {
            // not matching regex, format error message
            if (!preg_match("/^[A-Za-z]+$/", $first_name_new)) {
                $errors['name'] = 'Please enter an appropriate name!';
            } else {
                $first_name_valid = true;
                $sucessMsg['first_name'] = 'First name updated.';
            }
        }
    }

    // Validate last name
    if (!empty($_POST["last_name"]) && isset($_POST["last_name"])) {
        $last_name_new = test_input($_POST["last_name"]);
        if ($last_name_new !== $last_name) {
            // not matching regex, format error message
            if (!preg_match("/^[A-Za-z]+$/", $last_name_new)) {
                $errors['name'] = 'Please enter an appropriate name!';
            } else {
                $last_name_valid = true;
                $sucessMsg['last_name'] = 'Last name updated.';
            }
        }
    }

    // Validate email
    if (!empty($_POST["email"]) && isset($_POST["email"])) {
        $email_new = test_input($_POST["email"]);
        if ($email_new !== $email) {
            // check if e-mail address is well-formed
            if (!is_valid_email($email_new) || !preg_match(EMAIL_FORMAT, $email_new)) {
                $errors['email'] = 'Invalid email format!';
            } else {
                // attempt to get email query result from user to check if email is registered
                $sql = "SELECT customer.id, admin.id FROM `customer`, `admin` WHERE customer.email=? OR admin.email=?;";
                // execute query
                $db->query($sql, $email_new, $email_new);
                // query returned at least 1 row
                if ($db->numRows() > 0) {
                    $errors['email'] = 'This email is already registered!';
                } else {
                    $sucessMsg['email'] = 'Email updated.';
                    $email_valid = true;
                }
            }
        }
    }

    // Validate phone number
    if (!empty($_POST["phone"]) && isset($_POST["phone"])) {
        $phone_number_new = test_input($_POST["phone"]);
        if ($phone_number_new !== $phone_number) {
            // not matching regex, format error message
            if (!preg_match(PHONE_NUMBER_FORMAT, $phone_number_new)) {
                $errors['phone'] = 'Invalid phone number!';
            } else {
                $phone_valid = true;
                $sucessMsg['phone'] = 'Phone number updated.';
            }
        }
    }
    
    // Validate password
    // 'new password' field has value
    if (!empty($_POST["newpassword"]) && isset($_POST["newpassword"])) {
        $newpassword = test_input($_POST["newpassword"]);
        $newpassword_valid = true;
        // field not empty, check if data is not null
        if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
            $renewpassword = test_input($_POST["renewpassword"]);
            // 'retype new password' field and 'new password' field are the same
            if ($renewpassword === $newpassword) {
                // new password same as old password
                if (password_verify($renewpassword, $password)) {
                    $errors['password'] = 'New password is the same as old password!';
                }
                // update password
                else {
                    $renewpassword_valid = true;
                    $sucessMsg['password'] = 'Password updated.';
                }
            }
            // 'new password' and 'retype new password' fields don't match, store error message
            else {
                $errors['password'] = "New password in fields don't match!";
            }
        }
        // no value in 'retype new password' field, store error message
        else {
            $errors['password'] = "Please retype your new password!";
        }
    }
    // only 'new password' field is filled
    else if (!empty($_POST["renewpassword"]) && isset($_POST["renewpassword"])) {
        $errors['password'] = "Please retype the new password!";
    }

    // Validate flag if is admin updating an admin's details
    if (isset($_POST['update-admin-details'])) {
        $flag_string_new = "";
        if (empty($_POST["flag"])) {
            $errors['flag'] = "Flag is required!";
        } else {
            // field not empty, check if data is not null
            if (isset($_POST["flag"])) {
                // remove malicious characters and add each data to flag string
                for ($i = 0; $i < sizeof($_POST["flag"]); $i++) {
                    $flag_string_new .= test_input($_POST["flag"][$i]['value']);
                }
                if ($flag_string_new !== $flag_string_old) {
                    // all flags selected, set flag string to root admin flag
                    if ($flag_string_new === ALL_FLAGS) {
                        $flag_string_new = ROOT_ADMIN;
                        $flag_valid = true;
                        $sucessMsg['flag'] = 'Flag updated.';
                    }
                    // custom set of flags
                    else {
                        // check if each flag is in the flag list
                        for ($i = 0; $i < strlen($flag_string_new); $i++) {
                            if (stristr(ALL_FLAGS, $flag_string_new[$i])) {
                                $flag_valid = true;
                                $sucessMsg['flag'] = 'Flag updated.';
                            } else {
                                $errors['flag'] = "Invalid flag!";
                                break;
                            }
                        }
                    }
                }
            }
        }
    }

    // if there are any errors in our errors array, return a success boolean of false
    if (!empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    }
    // no errors, proceed with updating details
    else {
        if ($first_name_valid) {
            if (isset($_POST['update-customer-details']))
                $sql = "UPDATE `customer` SET `first_name`=? WHERE id=?;";
            else if (isset($_POST['update-admin-details']))
                $sql = "UPDATE `admin` SET `first_name`=? WHERE id=?;";
            
            $db->query($sql, $first_name_new, $id);
        }
        if ($last_name_valid) {
            if (isset($_POST['update-customer-details']))
                $sql = "UPDATE `customer` SET `last_name`=? WHERE id=?;";
            else if (isset($_POST['update-admin-details']))
                $sql = "UPDATE `admin` SET `last_name`=? WHERE id=?;";
            
            $db->query($sql, $last_name_new, $id);
        }
        if ($email_valid) {
            if (isset($_POST['update-customer-details']))
                $sql = "UPDATE `customer` SET `email`=? WHERE id=?;";
            else if (isset($_POST['update-admin-details']))
                $sql = "UPDATE `admin` SET `email`=? WHERE id=?;";
            
            $db->query($sql, $email_new, $id);
        }
        if ($phone_valid) {
            if (isset($_POST['update-customer-details']))
                $sql = "UPDATE `customer` SET `phone_number`=? WHERE id=?";
            else if (isset($_POST['update-admin-details']))
                $sql = "UPDATE `admin` SET `phone_number`=? WHERE id=?";
            
            $db->query($sql, $phone_number_new, $id);
        }
        if ($newpassword_valid && $renewpassword_valid) {
            if (isset($_POST['update-customer-details']))
                $sql = "UPDATE `customer` SET `password`=? WHERE id=?;";
            else if (isset($_POST['update-admin-details']))
                $sql = "UPDATE `admin` SET `password`=? WHERE id=?;";
            
            $db->query($sql, password_hash($renewpassword, PASSWORD_DEFAULT), $id);
        }
        if (isset($_POST['update-admin-details'])) {
            if ($flag_valid) {
                $sql = "UPDATE `admin` SET `flag`=? WHERE id=?;";
                $db->query($sql, $flag_string_new, $id);
            }
        }

        $data['success'] = true;
        // store update successful messages
        $data['sucessMsg'] = $sucessMsg;
    }

    // return all our data to an AJAX call
    echo json_encode($data);
}
// --- END OF ADMIN UPDATE CUSTOMER AND ADMIN DETAILS VALIDATION SECTION --- //
// ------------------------------------------------------------------------- //


// ----------------------------------- //
// --- USER BOOKMARK VIDEO SECTION --- //
else if (isset($_POST['vid'])) {
    $vid_valid = false;
    $errors = array(); // array to hold validation errors
    $data = array(); // array to pass back data
    
    // Validate video id
    if (!empty($_POST["vid"]) && isset($_POST["vid"])) {
        $vid = test_input($_POST["vid"]);
        // not matching regex, format error message
        if (!preg_match("/[a-zA-Z0-9_-]{11}/", $vid)) {
            $errors['vid'] = "Invalid Youtube video id!";
        } else {
            $vid_valid = true;
        }
    }

    // if there are any errors in our errors array, return a success boolean of false
    if (!empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    }
    // no errors, proceed with updating details
    else {
        if ($vid_valid) {
            $username = $_SESSION['Customer'];
            $sql = "SELECT `video` FROM `customer` WHERE username=?";
            $db->query($sql, $username);
            if ($db->numRows() > 0) {
                $result = $db->fetchAll();
                foreach ($result as $row) {
                    $video = $row['video'];
                }
            }
            // video id not in table,
            // insert it
            if (!stristr($video, $vid)) {
                $vid = $video . $vid . ", ";
                $sql = "UPDATE `customer` SET `video`=? WHERE username=?";
                $db->query($sql, $vid, $username);
                $data['in'] = true;
            }
            // video id  in table,
            // remove it
            else {
                $vid = $vid . ", ";
                $vid = str_replace($vid, "", $video);
                $sql = "UPDATE `customer` SET `video`=? WHERE username=?";
                $db->query($sql, $vid, $username);
                $data['notin'] = true;
            }
        }
        $data['success'] = true;
    }

    // return all our data to an AJAX call
    echo json_encode($data);
}
// --- END OF USER BOOKMARK VIDEO SECTION --- //
// ------------------------------------------ //