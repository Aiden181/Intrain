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

    <title>Add Customer</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">Add new customer</h2>
        <div class="row">
            <!-- left column content -->
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li><a href="index.php?p=admin&c=users"> List customers</a></li>
                        <li class="active"><a href="index.php?p=admin&c=users&o=create"> Add new customer</a></li>
                    </ul>
                </div>
            </div>
            <!-- end of left column content -->
            
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
                <div id="admin-form">
                    <form action="index.php?p=admin&c=users&o=create" method="post" onsubmit="checkSignup(event)" id="customer-signup">
                        <table>
                        <div class="row">
                            <div class="col-lg-4 mb-2">Customer name:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="<?php echo isset($_POST['first_name']) ? test_input($_POST['first_name']) : ''; ?>" pattern="^[A-Za-z]+$" required>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="<?php echo isset($_POST['last_name']) ? test_input($_POST['last_name']) : ''; ?>" pattern="^[A-Za-z]+$" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Customer email:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? test_input($_POST['email']) : ''; ?>" pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Customer phone number:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="phone_number" name="phone" id="phone" class="form-control" placeholder="Phone number" value="<?php echo isset($_POST['phone']) ? test_input($_POST['phone']) : ''; ?>" pattern="^[0-9\-\(\)\/\+\s]*$" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Customer username:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="username" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo isset($_POST['username']) ? test_input($_POST['username']) : ''; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Customer password:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        </table>
                        <br>
                        <input type="submit" name="add-customer" class="btn" id="update-btn" value="Add customer">
                    </form>
                    <?php
                        if (!$first_name_valid || !$last_name_valid)
                            echo "<div style=\"color: red\"> $nameError </div>";
                        if (!$email_valid)
                            echo "<div style=\"color: red\"> $emailError </div>";
                        if (!$phone_valid)
                            echo "<div style=\"color: red\"> $phoneError </div>";
                        if (!$username_valid)
                            echo "<div style=\"color: red\"> $usernameError </div>";
                        if (!$password_valid)
                            echo "<div style=\"color: red\"> $passwordError </div>";
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