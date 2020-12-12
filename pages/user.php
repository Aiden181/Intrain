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

    <title>User Panel</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">User management</h2>
        <div class="row">
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li class="active"><a href="index.php?p=user">View account info</a></li>
                        <li><a href="index.php?p=user&b=edit">Edit account details</a></li>
                        <li><a href="index.php?p=user&b=video">View videos</a></li>
                    </ul>
                </div>
            </div>
            
            <?php
            $last_name = $first_name = $email = $phone_number = "";
            $username = $_SESSION['Customer'];
            $sql = "SELECT `last_name`, `first_name`, `email`, `phone_number` FROM `customer` WHERE username=?";
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
            ?>

            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <table>
                    <div class="row" style="color: white;">
                        <div class="col-lg-3 mb-2">Name:</div>
                        <div class="col-lg-6 mb-2"><?php echo $first_name . " " . $last_name ?></div>
                    </div>
                    <div class="row" style="color: white;">
                        <div class="col-lg-3 mb-2">Email:</div>
                        <div class="col-lg-6 mb-2"><?php echo $email ?></div>
                    </div>
                    <div class="row" style="color: white;">
                        <div class="col-lg-3 mb-2">Phone number:</div>
                        <div class="col-lg-6 mb-2"><?php echo $phone_number ?></div>
                    </div>
                </table>
                </div>
                <br>
            </div>
            <!-- end of right column content -->
        </div>
    </div>
    <br>
    <br>
</body>

</html>