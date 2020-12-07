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
    <link rel="stylesheet" href="./css/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="./css/admin-panel.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Admin Panel</title>
</head>

<body>
    <?php
    // Get accout information
    $last_name = $first_name = $email = $phone_number = $username = "";
    $username = $_SESSION['Admin'];
    $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number` FROM `admin` WHERE username='$username'";
    
    // run mysql query and store results to $result
    if ($result = mysqli_query($conn, $sql)) {
        // has at least 1 result
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $last_name = $row['last_name'];
                $first_name = $row['first_name'];
                $email = $row['email'];
                $phone_number = $row['phone_number'];
            }

            // Free result set (free up memory)
            mysqli_free_result($result);
        }
    }

    // get total amount of admins
    // not using count(*) because can't echo $result
    $total_admins = $total_users = 0;
    $sql = "SELECT * FROM `admin`";
    if ($result = mysqli_query($conn, $sql)) {
        // has at least 1 result
        if (mysqli_num_rows($result) > 0) {
            $total_admins = mysqli_num_rows($result);
        }

        // Free result set (free up memory)
        mysqli_free_result($result);
    }
    
    $sql = "SELECT * FROM `customer`";
    if ($result = mysqli_query($conn, $sql)) {
        // has at least 1 result
        if (mysqli_num_rows($result) > 0) {
            $total_users = mysqli_num_rows($result);
        }

        // Free result set (free up memory)
        mysqli_free_result($result);
    }
    ?>
    
    <br>
    <div class="container">
        <table style="width:100%">
            <tr>
                <!-- Table headers -->
                <th>Edit account details</th>
                <th>Manage admins</th>
                <th>Manage customers</th>
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
                
                <!-- Manage admins table cells -->
                <td style="text-align: center;">
                    <a href="index.php?p=admin&c=admins">
                        <i class="fa fa-user-circle-o" id="admin-icon" aria-hidden="true">
                            <i id="pencil-edit-icon" class="fa fa-pencil" aria-hidden="true"></i>
                        </i>
                    </a>
                    <div>Edit Admin accounts</div>
                </td>

                <!-- Manage customers table cells -->
                <td style="text-align: center;">
                    <a href="index.php?p=admin&c=users">
                        <i class="fa fa-user-circle-o" id="customer-icon" aria-hidden="true">
                            <i id="pencil-edit-icon" class="fa fa-pencil" aria-hidden="true"></i>
                        </i>
                    </a>
                    <div>Edit Customer accounts</div>
                </td>
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