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
    <link rel="stylesheet" href="./css/admin-admin.php" type="text/css" media="screen">

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
                        <li><a href="index.php?p=admin&c=users&o=create"> Add new customer</a></li>
                    </ul>
                </div>
            </div>
            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <div class="page-header clearfix">
                    <table style="width: 100%; background-color: #565656; border: 2px solid white">
                        <th style="padding: 10px 10px 6px 10px; max-height: 100px;">
                            <h5 class="pull-left" style="color: white; font-weight: bold">Customer details</h2>
                        </th>
                    </table>
                </div>
                <br>
                <?php
                if (!empty($_GET["id"]) && isset($_GET["id"])) {
                    // Get id
                    $id =  test_input($_GET["id"]);
                    $last_name = $first_name = $email = $phone_number = $username = "";
                    $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number`, `username` FROM `customer` WHERE id=?";
                    // execute query and store results in $result
                    if ($stmt = $conn->prepare($sql)) {
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param('i', $id);
                        // execute query
                        $stmt->execute();
                        // store result in $result
                        if ($result = $stmt->get_result()) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
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
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        
                        // Free memory
                        $result->free_result();
                        // Close statement
                        $stmt->close();
                    }
                }
                else {
                    // no id in link, redirect to customer management page
                    Header('Location: index.php?p=admin&c=users');
                    exit();
                }
                ?>
                <div id="signup-form">
                    <form action="index.php?p=admin&c=users&o=edit&id=<?php echo $id?>" method="post" id="admin-update-customer-details">
                        <table>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Customer id:</div>
                                <div class="col-lg-4 mb-2"><?php echo $id ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Customer username:</div>
                                <div class="col-lg-4 mb-2"><?php echo $username ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Customer name:</div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="<?php echo $first_name ?>" pattern="^[A-Za-z]+$" required>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="<?php echo $last_name ?>" pattern="^[A-Za-z]+$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Customer email:</div>
                                <div class="col-lg-4 mb-2">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $email ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Customer phone number:</div>
                                <div class="col-lg-4 mb-2">
                                    <input type="phone_number" name="phone" id="phone" class="form-control" placeholder="Phone number" value="<?php echo $phone_number ?>" pattern="^\+?\d{0,13}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Current password:</div>
                                <div class="col-lg-4 mb-2">
                                    <input type="password" class="form-control" id="password" name="oldpassword" placeholder="Current Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">New password:</div>
                                <div class="col-lg-4 mb-2">
                                    <input type="password" class="form-control" id="password" name="newpassword" placeholder="New Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">Re-type new password:</div>
                                <div class="col-lg-4 mb-2">
                                    <input type="password" class="form-control" id="password" name="renewpassword" placeholder="Re-type new Password" oninput="">
                                </div>
                            </div>
                        </table>
                        <br>
                        <input type="submit" name="admin-update-customer-details" class="btn" id="sign-up-btn" value="Update customer details">
                    </form>
                    <?php
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