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
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/login-page-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Login</title>
</head>

<body>
    <div class="container-sm fadeInDown" id="login-form">
        <form action="index.php?p=login" method="post" onsubmit="checkLogin(event)">
            <h1>Login</h1>
            <button type="button" id="go-back-btn"><a href="index.php?p=home"><i class="fa fa-arrow-left"></i></a></button>
            <div class="form-group">
                <!-- php code in value='' means echo user's inputted username
                after user tries to log in but with wrong login credentials -->
                <input type="text" id="username" name="username" class="form-control fadeIn first" placeholder="Enter username" value="<?php echo isset($_POST['username']) ? test_input($_POST['username']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control fadeIn second" placeholder="Enter password" required>
            </div>
            <input type="submit" name="login" class="btn fadeIn third" id="log-in-btn" value="Log In">

            <!-- reset login button for debug -->
            <!-- <input type="submit" name="reset-login" value="reset login"> -->
        </form>
        <?php
        if ($invalid_login) { echo "<div class=\"form-group\" id=\"error-message\">$error_message</div>"; }
        ?>
    </div>
</body>

</html>