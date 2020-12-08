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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/sign-up-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Sign Up</title>
</head>

<body>
    <div class="container-sm fadeInDown" id="signup-form">
        <form action="index.php?p=signup" method="post" onsubmit="checkSignup(event)" id="customer-signup">
            <h1>Sign Up</h1>
            <button type="button" id="go-back-btn"><a href="index.php?p=home"><i class="fa fa-arrow-left"></i></a></button>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="first_name" id="first_name" class="form-control fadeIn first" placeholder="Enter your first name" value="<?php echo isset($_POST['first_name']) ? test_input($_POST['first_name']) : ''; ?>" pattern="^[A-Za-z]+$" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="last_name" id="last_name" class="form-control fadeIn first" placeholder="Enter your last name" value="<?php echo isset($_POST['last_name']) ? test_input($_POST['last_name']) : ''; ?>" pattern="^[A-Za-z]+$" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <!-- <label for="firstName">Email</label> -->
                    <input type="email" name="email" id="email" class="form-control fadeIn second" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? test_input($_POST['email']) : ''; ?>" pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$" required>
                </div>
                <div class="col-md-6 mb-3">
                    <!-- <label for="lastName">Phone number</label> -->
                    <input type="phone_number" name="phone" id="phone" class="form-control fadeIn second" placeholder="Enter your phone number" value="<?php echo isset($_POST['phone']) ? test_input($_POST['phone']) : ''; ?>" pattern="^\+?\d{0,13}" required>
                </div>
            </div>

            <div class="form-group">
                <input type="username" name="username" id="username" class="form-control fadeIn second" placeholder="Enter username" value="<?php echo isset($_POST['username']) ? test_input($_POST['username']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control fadeIn third" id="password" name="password" placeholder="Enter password" required>
            </div>

            <input type="submit" name="signup" class="btn fadeIn third" id="sign-up-btn" value="Sign Up">
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
</body>

</html>