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
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/admin-panel.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Admin Panel</title>
</head>

<body>
    <?php
    // Get accout information
    $last_name = $first_name = $email = $phone_number = $username = "";
    $username = $_SESSION['Admin'];
    $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number` FROM `admin` WHERE username=?";
    
    $db->query($sql, $username);
    if ($db->numRows() > 0) {
        $result = $db->fetchAll();
        foreach ($result as $row) {
            $last_name = $row['last_name'];
            $first_name = $row['first_name'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];
        }
    }

    // get total amount of admins
    // not using count(*) because can't echo $result
    $total_admins = $total_users = 0;
    $sql = "SELECT `id` FROM `admin`";
    $db->query($sql);
    $total_admins = $db->numRows();

    $sql = "SELECT `id` FROM `customer`";
    $db->query($sql);
    $total_users = $db->numRows();
    ?>
    
    <br>
    <div class="container">
        <table style="width:100%">
            <tr>
                <!-- Table headers -->
                <th>Edit account details</th>
                <?php
                // loop through each character in admin flag string to check flag
                $flags = $_SESSION['flag'];
                $shown_crud_admin = $shown_crud_customers = false;
                for ($i = 0; $i < strlen($flags); $i++) {
                    // if flag is root or in CRUD admins list
                    if (!$shown_crud_admin) {
                        if ($flags[$i] == ROOT_ADMIN || stristr(CRUD_ADMINS, $flags[$i])) {
                            // show manage admins
                            echo "<th>Manage admins</th>";
                            $shown_crud_admin = true;
                        }
                    }
                    if (!$shown_crud_customers) {
                        // if flag is root or in CRUD customers list
                        if ($flags[$i] == ROOT_ADMIN || stristr(CRUD_CUSTOMERS, $flags[$i])) {
                            // show manage customers
                            echo "<th>Manage customers</th>";
                            $shown_crud_customers = true;
                        }
                    }
                }
                ?>
            </tr>
            <tr>
                <!-- Edit account details table cells -->
                <!-- Manage customers table cells -->
                <td style="text-align: center;">
                    <a href="index.php?p=admineditdetails">
                        <i class="fa fa-user-circle-o" id="account-icon" aria-hidden="true">
                            <i id="pencil-edit-icon" class="fa fa-pencil" aria-hidden="true"></i>
                        </i>
                    </a>
                    <div>Edit account details</div>
                </td>
                
                <?php
                if ($_SESSION['flag'] == ROOT_ADMIN || stristr($_SESSION['flag'], CRUD_ADMINS)) {
                    // Manage admin table cells
                    echo "<td style=\"text-align: center;\">\n";
                    echo "    <a href=\"index.php?p=admin&c=admins\">\n";
                    echo "        <i class=\"fa fa-user-circle-o\" id=\"admin-icon\" aria-hidden=\"true\">\n";
                    echo "            <i id=\"pencil-edit-icon\" class=\"fa fa-pencil\" aria-hidden=\"true\"></i>\n";
                    echo "        </i>\n";
                    echo "    </a>\n";
                    echo "    <div>Edit Admin accounts</div>\n";
                    echo "</td>\n";
                    echo "\n";
                }
                if ($_SESSION['flag'] == ROOT_ADMIN || stristr($_SESSION['flag'], CRUD_CUSTOMERS)) {
                    // Manage customers table cells
                    echo "<td style=\"text-align: center;\">\n";
                    echo "    <a href=\"index.php?p=admin&c=users\">\n";
                    echo "        <i class=\"fa fa-user-circle-o\" id=\"customer-icon\" aria-hidden=\"true\">\n";
                    echo "            <i id=\"pencil-edit-icon\" class=\"fa fa-pencil\" aria-hidden=\"true\"></i>\n";
                    echo "        </i>\n";
                    echo "    </a>\n";
                    echo "    <div>Edit Customer accounts</div>\n";
                    echo "</td>";
                }
                ?>

            </tr>
        </table>
        <p></p>
        <table style="width:100%">
            <tr>
                <!-- Table headers -->
                <th>Account Information</th>
                <th>Admin Information</th>
                <th>Customer Information</th>
            </tr>
            <tr>
                <!-- Table cells -->
                <td>
                    <div><?php echo "Name: " . $first_name . " " . $last_name; ?></div>
                    <div><?php echo "Email: " . $email; ?></div>
                    <div><?php echo "Phone number: " . $phone_number; ?></div>
                </td>
                <td>Total admins: <?php echo $total_admins; ?></td>
                <td>Total customer accounts: <?php echo $total_users; ?></td>
            </tr>
        </table>
    </div>

    <br>
</body>
</html>