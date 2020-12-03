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
    // reset login
    if (isset($_POST['reset-login'])) {
        unset($_SESSION['User']);
    }

    // after user presses log in button
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 'login' is in $_POST (after user presses Log In button)
        if (isset($_POST['login'])) {
            // if username and password in $_POST are set then remove 
            // malicious characters and assign those values to the variable
            $username = isset($_POST['username']) ? test_input($_POST['username']) : '';
            $password = isset($_POST['password']) ? test_input($_POST['password']) : '';
            
            // GET username and password from user's inputs
            $sql = "SELECT `username`, `password` FROM `admin` WHERE username='$username' AND password=PASSWORD('$password')";
            
            // run mysql query and store results to $result
            if ($result = mysqli_query($conn, $sql)) {
                // has at least 1 result
                if (mysqli_num_rows($result) > 0) {
                    // add user to session
                    $_SESSION['User']['username'] = $username;

                    // Free result set (free up memory)
                    mysqli_free_result($result);

                    // redirects to index.php upon successful login
                    header("location: index.php");
                    exit;
                }
                // no results returned
                else {
                    $Msg = "<span style='color: red'> Invalid Login Details </span>";
                    echo $Msg;
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
    }
    ?>

    <div class="container-sm fadeInDown" id="login-form">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <button type="button" id="go-back-btn"><a href="./index.php"><i class="fa fa-arrow-left"></i></a></button>
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control fadeIn first" placeholder="Enter username">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control fadeIn second" placeholder="Enter password">
            </div>
            <input type="submit" name="login" class="btn fadeIn third" id="log-in-btn" value="Log In"></input>

            <!-- reset login button for debug -->
            <input type="submit" name="reset-login" value="reset login">
        </form>
    </div>

    <?php include('./includes/javascript.php'); ?>
</body>

</html>