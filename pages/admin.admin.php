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

    <title>Admin Management</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">Admin management</h2>
        <div class="row">
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li class="active"><a href="index.php?p=admin&c=admins"> List admins</a></li>
                        <?php
                        // loop through each character in admin flag string to check flag
                        $flags = $_SESSION['flag'];
                        for ($i = 0; $i < strlen($flags); $i++) {
                            // if flag is root or add admins
                            if ($flags[$i] === ROOT_ADMIN || $flags[$i] === ADD_ADMINS) {
                                echo "<li><a href=\"index.php?p=admin&c=admins&o=create\"> Add new admin</a></li>";
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            if (isset($_POST['checkbox'])) {
                // only perform search if at least 1 checkbox is checked
                if (sizeof($_POST['checkbox']) > 0) {
                    $username_valid = $first_name_valid = $last_name_valid = $email_valid = $phone_valid = $flag_valid = true;
                    if (isset($_POST['username'])) {
                        $username = test_input($_POST['username']);
                        if ($username === "") {
                            $username_valid = false;
                        }
                    }
                    if (isset($_POST['first_name'])) {
                        $first_name = test_input($_POST['first_name']);
                        if ($first_name === "") {
                            $first_name_valid = false;
                        }
                    }
                    if (isset($_POST['last_name'])) {
                        $last_name = test_input($_POST['last_name']);
                        if ($last_name === "") {
                            $last_name_valid = false;
                        }
                    }
                    if (isset($_POST['email'])) {
                        $email = test_input($_POST['email']);
                        if ($email === "") {
                            $email_valid = false;
                        }
                    }
                    if (isset($_POST['phone'])) {
                        $phone_number = test_input($_POST['phone']);
                        if ($phone_number === "") {
                            $phone_valid = false;
                        }
                    }
                    if (isset($_POST['flag'])) {
                        $flag = test_input($_POST['flag']);
                        if ($flag === "") {
                            $flag_valid = false;
                        }
                    }

                    // searching for admin
                    if (isset($_POST['search-admin'])) {
                        if ($username_valid || $first_name_valid || $last_name_valid || $email_valid || $phone_valid || $flag_valid) {
                            $sql = "SELECT * FROM admin WHERE";
                        }
                        else {
                            $sql = "SELECT * FROM admin";
                        }
                        if (isset($_POST['checkbox']['username']) && $username_valid) {
                            $sql .= " username LIKE '%$username%' AND";
                        }
                        if (isset($_POST['checkbox']['first_name']) && $first_name_valid) {
                            $sql .= " first_name LIKE '%$first_name%' AND";
                        }
                        if (isset($_POST['checkbox']['last_name']) && $last_name_valid) {
                            $sql .= " last_name LIKE '%$last_name%' AND";
                        }
                        if (isset($_POST['checkbox']['email']) && $email_valid) {
                            $sql .= " email LIKE '%$email%' AND";
                        }
                        if (isset($_POST['checkbox']['phone']) && $phone_valid) {
                            $sql .= " phone_number LIKE '%$phone_number%' AND";
                        }
                        if (isset($_POST['checkbox']['flag']) && $flag_valid) {
                            $sql .= " flag LIKE '%$flag%' AND";
                        }
                        $sql .= ";";
                        $sql = str_replace(" AND;", ";", $sql);
                        $db->query($sql);
                    }
                }
                else {
                    if (stristr($_SESSION['flag'], ROOT_ADMIN) ||  stristr($_SESSION['flag'], LIST_ADMINS)) {
                        $sql = "SELECT * FROM `admin`";
                    }
                    else {
                        $sql = "SELECT `id`, `username`, `flag` FROM `admin`";
                    }
                    $db->query($sql);
                }
            }
            else {
                if (stristr($_SESSION['flag'], ROOT_ADMIN) ||  stristr($_SESSION['flag'], LIST_ADMINS)) {
                    $sql = "SELECT * FROM `admin`";
                }
                else {
                    $sql = "SELECT `id`, `username`, `flag` FROM `admin`";
                }
                $db->query($sql);
            }
            ?>
            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <table class="section-header">
                    <th style="padding: 10px 10px 6px 10px; max-height: 100px;">
                        <h5 class="pull-left" style="color: white; font-weight: bold">Admins (<?php echo $db->numRows(); ?>)</h5>
                    </th>
                </table>
                <p style="padding-top: 5px; color: white; font-size: 15px;">Click on an admin to see more detailed information and actions to perform on them.</p>
                <table class="advanced-search" onclick="toggleSearchSection()">
                    <th>
                        <h5>Advanced search</h5>
                    </th>
                </table>
                <div class="container" style="width: 70%; padding-bottom: 20px;">
                    <form action="index.php?p=admin&c=admins" method="post" class="search-form">
                        <div class="row" style="color: white; padding-top: 10px;">
                            <input class="search-checkbox" type="checkbox" name="checkbox[username]" id="username-checkbox">
                            <div class="col-lg-4 mb-2">Username</div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" name="username" id="username" class="search-input">
                            </div>
                        </div>
                        <?php
                        if (stristr($_SESSION['flag'], ROOT_ADMIN) || stristr($_SESSION['flag'], LIST_ADMINS)) {
                            echo "<div class=\"row\" style=\"color: white;\">";
                            echo "    <input class=\"search-checkbox\" type=\"checkbox\" name=\"checkbox[first_name]\" id=\"first-name-checkbox\">";
                            echo "    <div class=\"col-lg-4 mb-2\">First Name</div>";
                            echo "    <div class=\"col-lg-6 mb-2\">";
                            echo "        <input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"search-input\">";
                            echo "    </div>";
                            echo "</div>";
                            echo "<div class=\"row\" style=\"color: white;\">\n";
                            echo "    <input class=\"search-checkbox\" type=\"checkbox\" name=\"checkbox[last_name]\" id=\"last-name-checkbox\">\n";
                            echo "    <div class=\"col-lg-4 mb-2\">Last Name</div>\n";
                            echo "    <div class=\"col-lg-6 mb-2\">\n";
                            echo "        <input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"search-input\">\n";
                            echo "    </div>\n";
                            echo "</div>\n";
                            echo "<div class=\"row\" style=\"color: white;\">\n";
                            echo "    <input class=\"search-checkbox\" type=\"checkbox\" name=\"checkbox[email]\" id=\"email-checkbox\">\n";
                            echo "    <div class=\"col-lg-4 mb-2\">Email</div>\n";
                            echo "    <div class=\"col-lg-6 mb-2\">\n";
                            echo "        <input type=\"email\" name=\"email\" id=\"email\" class=\"search-input\">\n";
                            echo "    </div>\n";
                            echo "</div>\n";
                            echo "<div class=\"row\" style=\"color: white;\">\n";
                            echo "    <input class=\"search-checkbox\" type=\"checkbox\" name=\"checkbox[phone]\" id=\"phone-checkbox\">\n";
                            echo "    <div class=\"col-lg-4 mb-2\">Phone number</div>\n";
                            echo "    <div class=\"col-lg-6 mb-2\">\n";
                            echo "        <input type=\"phone_number\" name=\"phone\" id=\"phone\" class=\"search-input\">\n";
                            echo "    </div>\n";
                            echo "</div>\n";
                            echo "<div class=\"row\" style=\"color: white;\">\n";
                            echo "    <input class=\"search-checkbox\" type=\"checkbox\" name=\"checkbox[flag]\" id=\"flag-checkbox\">\n";
                            echo "    <div class=\"col-lg-4 mb-2\">Flag</div>\n";
                            echo "    <div class=\"col-lg-6 mb-2\">\n";
                            echo "        <input type=\"text\" name=\"flag\" id=\"flag\" class=\"search-input\">\n";
                            echo "    </div>\n";
                            echo "</div>";
                        }
                        ?>
                        <input type="submit" name="search-admin" class="search-btn" value="SEARCH">
                    </form>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr id="table-headers" class="table-bordered">
                            <th>ID</th>
                            <th>Username</th>
                            <?php
                            if (stristr($_SESSION['flag'], ROOT_ADMIN) ||  stristr($_SESSION['flag'], LIST_ADMINS)) {
                                // show more information
                                echo "<th>Name</th>";
                                echo "<th>Email</th>";
                                echo "<th>Phone number</th>";
                                echo "<th>Flags</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['checkbox']) && sizeof($_POST['checkbox']) > 0) {
                            if ($db->numRows() === 0) {
                                echo "<tr style=\"color: white;\">";
                                    echo "<td> No results found!</td>";
                                echo "</tr>";
                            }
                            else {
                                $result = $db->fetchAll();
                                foreach ($result as $row) {
                                    echo "<tr class=\"info-row\" onclick=\"window.location='index.php?p=admin&c=admins&o=edit&id=" . $row['id'] . "&flag=" . $row['flag'] . "'\">";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    // admin is root admin or has list admin flag
                                    if (stristr($_SESSION['flag'], ROOT_ADMIN) || stristr($_SESSION['flag'], LIST_ADMINS)) {
                                        // show more information
                                        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone_number'] . "</td>";
                                        echo "<td>" . $row['flag'] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        }
                        else {
                            if ($db->numRows() > 0) {
                                $result = $db->fetchAll();
                                foreach ($result as $row) {
                                    echo "<tr class=\"info-row\" onclick=\"window.location='index.php?p=admin&c=admins&o=edit&id=" . $row['id'] . "&flag=" . $row['flag'] . "'\">";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    // admin is root admin or has list admin flag
                                    if (stristr($_SESSION['flag'], ROOT_ADMIN) || stristr($_SESSION['flag'], LIST_ADMINS)) {
                                        // show more information
                                        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone_number'] . "</td>";
                                        echo "<td>" . $row['flag'] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br>
            </div>
            <!-- end of right column content -->
        </div>
    </div>
    <br>
    <br>
</body>

</html>