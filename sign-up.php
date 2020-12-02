<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/sign-up-style.php" type="text/css" media="screen">
    
    <title>Sign Up</title>
</head>

<body>
    <div class="container-sm" id="signup-form">
        <form method="post" id="customer-signup" action="">
            <h1>Sign Up</h1>
            <button onclick="goBack()" id="go-back-btn"><i class="fa fa-arrow-left" style="font-size:32px"></i></button>
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" pattern="^[A-Za-z]+$" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            </div>
            <button onclick="register()" type="submit" class="btn" id="sign-up-btn">Sign Up</button>
        </form>
    </div>
    <?php include('./includes/javascript.php'); ?>
</body>
</html>