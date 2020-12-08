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

    <title>Upper Body</title>
</head>

<body>
    <!--Main Menu-->
    <div class="container-sm" id="main-menu">
        <div class="row row-cols-3">
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/chest.php' ?>"><img src="<?php echo IMG_LOCATION . '/Chest-Workout.jpg' ?>" alt="ripped chest"></a>
                <h3>Chest</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/forearm.php' ?>"><img src="<?php echo IMG_LOCATION  . '/Forearm-Workout.jpg' ?>" alt="ripped forearm"></a>
                <h3>Forearm</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/biceps.php' ?>"><img src="<?php echo IMG_LOCATION . '/Biceps-Workout.jpg' ?>" alt="riped bicep"></a>
                <h3>Biceps</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/triceps.php' ?>"><img src="<?php echo IMG_LOCATION . '/Triceps-Workout.jpg' ?>" alt="ripped tricep"></a>
                <h3>Triceps</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/shoulder.php' ?>"><img src="<?php echo IMG_LOCATION  . '/Shoulder-Workout.jpg' ?>" alt="ripped shoulder"></a>
                <h3>Shoulder</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/back.php' ?>"><img src="<?php echo IMG_LOCATION . '/Back-Workout.jpg' ?>" alt="ripped back"></a>
                <h3>Back</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/abs.php' ?>"><img src="<?php echo IMG_LOCATION . '/Abs-Workout.jpg' ?>" alt="ripped back"></a>
                <h3>Abs</h3>
            </section>
            <section class="col">
                <a href="<?php echo WORKOUT_PATH . '/traps.php' ?>"><img src="<?php echo IMG_LOCATION . '/Traps-Workout.jpg' ?>" alt="ripped back"></a>
                <h3>Traps</h3>
            </section>
        </div>
    </div>
</body>

</html>