<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/admin-admin.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Edit Customer Details</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">Edit customer details</h2>
        <div class="row">
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li><a href="index.php?p=admin&c=users"> List customers</a></li>
                        <?php
                        // loop through each character in admin flag string to check flag
                        $flags = $_SESSION['flag'];
                        for ($i = 0; $i < strlen($flags); $i++) {
                            // if flag is root or add customers
                            if ($flags[$i] === ROOT_ADMIN || $flags[$i] === ADD_CUSTOMERS) {
                                echo "<li><a href=\"index.php?p=admin&c=users&o=create\"> Add new customer</a></li>";
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            if (!empty($_GET["id"]) && isset($_GET["id"])) {
                // Get id
                $id =  test_input($_GET["id"]);
                $last_name = $first_name = $email = $phone_number = $username = "";
                $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `username` FROM `customer` WHERE id=?";
                // execute query
                $db->query($sql, $id);
                if ($db->numRows() > 0) {
                    $result = $db->fetchAll();
                    foreach ($result as $row) {
                        $last_name = $row["last_name"];
                        $first_name = $row["first_name"];
                        $email = $row["email"];
                        $phone_number = $row["phone_number"];
                        $username = $row["username"];
                    }
                }
                else {
                    // no user with id found, redirect to customer management page
                    Header('Location: index.php?p=admin&c=users');
                    exit();
                }
            }
            else {
                // no id in link, redirect to customer management page
                Header('Location: index.php?p=admin&c=users');
                exit();
            }
            ?>
            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <?php
                // loop through each character in admin flag string to check flag
                $flags = $_SESSION['flag'];
                for ($i = 0; $i < strlen($flags); $i++) {
                    // if flag is root or edit customers
                    if ($flags[$i] === ROOT_ADMIN || $flags[$i] === EDIT_CUSTOMERS) {
                        echo "<div class=\"page-header\">";
                        echo "    <table class=\"section-header\">";
                        echo "        <th style=\"padding: 10px 10px 6px 10px; max-height: 100px;\">";
                        echo "            <h5 class=\"pull-left\" style=\"color: white; font-weight: bold\">Customer details</h2>";
                        echo "        </th>";
                        echo "    </table>";
                        echo "</div>";
                        echo "<br>";
                        echo "<div id=\"signup-form\">";
                        echo "    <form action=\"index.php?p=admin&c=users&o=edit&id=$id\" method=\"post\" id=\"admin-update-customer-details\">";
                        echo "        <table>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">Customer id:</div>";
                        echo "                <div class=\"col-lg-4 mb-2\">$id</div>";
                        echo "            </div>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">Customer username:</div>";
                        echo "                <div class=\"col-lg-4 mb-2\">$username</div>";
                        echo "            </div>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">Customer name:</div>";
                        echo "                    <div class=\"col-lg-4 mb-2\">";
                        echo "                        <input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"form-control\" placeholder=\"First name\" value=\"$first_name\" pattern=\"^[A-Za-z]+$\" required>";
                        echo "                    </div>";
                        echo "                    <div class=\"col-lg-4 mb-2\">";
                        echo "                        <input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"form-control\" placeholder=\"Last name\" value=\"$last_name\" pattern=\"^[A-Za-z]+$\" required>";
                        echo "                    </div>";
                        echo "                </div>";
                        echo "            </div>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">Customer email:</div>";
                        echo "                <div class=\"col-lg-4 mb-2\">";
                        echo "                    <input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\" placeholder=\"Email\" value=\"$email\" pattern=\"^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$\" required>";
                        echo "                </div>";
                        echo "            </div>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">Customer phone number:</div>";
                        echo "                <div class=\"col-lg-4 mb-2\">";
                        echo "                    <input type=\"phone_number\" name=\"phone\" id=\"phone\" class=\"form-control\" placeholder=\"Phone number\" value=\"$phone_number\" pattern=\"^\+?\d{0,13}\" required>";
                        echo "                </div>";
                        echo "            </div>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">New password:</div>";
                        echo "                <div class=\"col-lg-4 mb-2\">";
                        echo "                    <input type=\"password\" class=\"form-control\" id=\"password_new\" name=\"newpassword\" placeholder=\"New Password\">";
                        echo "                </div>";
                        echo "            </div>";
                        echo "            <div class=\"row\">";
                        echo "                <div class=\"col-lg-4 mb-2\">Retype new password:</div>";
                        echo "                <div class=\"col-lg-4 mb-2\">";
                        echo "                    <input type=\"password\" class=\"form-control\" id=\"password_new_retype\" name=\"renewpassword\" placeholder=\"Retype new Password\" oninput=\"\">";
                        echo "                </div>";
                        echo "            </div>";
                        echo "        </table>";
                        echo "        <br>";
                        echo "        <input type=\"submit\" name=\"admin-update-customer-details\" class=\"btn\" id=\"sign-up-btn\" value=\"Update customer details\">";
                        echo "        </form>";
                        
                        if (!$first_name_valid || !$last_name_valid)
                            echo "<div style=\"color: red\"> $nameError </div>";
                        if (!$email_valid)
                            echo "<div style=\"color: red\"> $emailError </div>";
                        if (!$phone_valid)
                            echo "<div style=\"color: red\"> $phoneError </div>";
                        if (!$password_valid)
                            echo "<div style=\"color: red\"> $passwordError </div>";
                        
                        if ($editFirstNameSuccess)
                            echo "<div style=\"color: green\"> $firstNameSuccess </div>";
                        if ($editLastNameSuccess)
                            echo "<div style=\"color: green\"> $lastNameSuccess </div>";
                        if ($editEmailSuccess)
                            echo "<div style=\"color: green\"> $emailSuccess </div>";
                        if ($editPhoneSuccess)
                            echo "<div style=\"color: green\"> $phoneSuccess </div>";
                        if ($editPasswordSuccess)
                            echo "<div style=\"color: green\"> $passwordSuccess </div>";

                        echo "<br>";
                        echo "<br>";
                    }
                    
                    // if flag is root or delete customers
                    if ($flags[$i] === ROOT_ADMIN || $flags[$i] === DELETE_CUSTOMERS) {
                        echo "<div class=\"page-header\" style=\"background: rgba(0,0,0, 0.25)\">";
                        echo "    <table style=\"width: 100%; background-color: rgba(255,25,25); border: 2px solid white\">";
                        echo "        <th id=\"dropdown\" onclick=\"showButton()\" style=\"padding: 10px 10px 6px 10px; max-height: 100px;\">";
                        echo "            <h5 class=\"pull-left\" style=\"color: white; font-weight: bold\">Danger zone</h2>";
                        echo "        </th>";
                        echo "    </table>";
                        echo "    <p class=\"delete-button\"></p>";
                        echo "    <table class=\"delete-button\">";
                        echo "        <th style=\"padding: 0 0 0 10px;\">";
                        echo "            <form action=\"index.php?p=admin&c=users&o=edit&id=$id\" method=\"post\">";
                        echo "                <button type=\"button\" class=\"delete-user-button\" name=\"delete-user\" onclick=\"confirmDeleteUser(event)\" value=\"Delete user\">Delete user</button>";
                        echo "            </form>";
                        echo "        </th>";
                        echo "    </table>";
                        echo "</div>";
                    }
                }
                ?>
                </div>
            </div>
            <!-- end of right column content -->
        </div>
    </div>
    <br>
    <br>
</body>
</html>