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
    <link rel="stylesheet" href="./css/login-page-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Login</title>
</head>

<body>
    <?php include('./includes/tools.php') ?>
    
    <?php
    // admin account list (username and password)
    $login = array('admin1' => 'admin1', 'admin2' => 'admin2');

    // reset login
    if (isset($_POST['reset-login'])) {
        unset($_SESSION['User']);
    }

    // after user presses log in button
    if (isset($_POST['login'])) {
        // if username and password in $_POST are set then assign those values to the variable
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // if username is in the admin account list and password matches, add to session and 
        // redirects to index.php
        if (isset($login[$username]) && $login[$username] == $password) {
            // add to session
            $_SESSION['User']['username'] = $username;

            // redirects to index.php upon successful login
            header("location: index.php");
            exit;
        } else { // login failed, show error message
            $Msg = "<span style='color: red'> Invalid Login Details </span>";
            echo $Msg;
        }
    }
    ?>

    <div class="container-sm fadeInDown" id="login-form">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <button onclick="goBack()" id="go-back-btn"><i class="fa fa-arrow-left"></i></button>
            <div class="form-group">
                <!-- <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required> -->
                <input type="text" id="username" name="username" class="form-control fadeIn first" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" class="form-control fadeIn second" name="pswd" placeholder="Enter password" required>
            </div>
            <button type="submit" name="login" class="btn fadeIn third" id="log-in-btn">Log In</button>

            <!-- reset login button for debug -->
            <!-- <input type="submit" name="reset-login" value="reset login"> -->
        </form>
    </div>

    <?php include('./includes/javascript.php'); ?>
</body>

</html>