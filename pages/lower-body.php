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
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/workout-menu-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Lower Body</title>
</head>

<body>
    <!--Main Menu-->
    <div class="container-sm" id="main-menu">
        <div class="row row-cols-3">
            <section class="col">
                <a href="index.php?p=hamstrings"><img src="<?php echo IMG_LOCATION . '/Hamstring - Workout.jpg' ?>" alt=""></a>
                <h3>Hamstrings</h3>
            </section>
            <section class="col">
                <a href="index.php?p=calves"><img src="<?php echo IMG_LOCATION . '/Calves - Workout.jpg' ?>" alt=""></a>
                <h3>Calves</h3>
            </section>
            <section class="col">
                <a href="index.php?p=quads"><img src="<?php echo IMG_LOCATION . '/Quads - Workout.jpg' ?>" alt=""></a>
                <h3>Quads</h3>
            </section>
            <section class="col">
                <a href="index.php?p=glutes"><img src="<?php echo IMG_LOCATION . '/Glute - Workout.jpg' ?>" alt=""></a>
                <h3>Glute</h3>
            </section>
        </div>
    </div>
</body>

</html>