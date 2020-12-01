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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/workout-menu-style.css">

    <title>Upper Body</title>
</head>

<body>

    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <a href="./index.php"><img src="./images/Intrain.png" style="width: 140px; height: 140px;" alt="Intrain Logo"></a>
        </div>
    </div>

    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Programs
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="upper-body.php">Upper Body Workout</a>
                        <a class="dropdown-item" href="lower-body.php">Lower Body Workout</a>
                </li>
                <a class="nav-item nav-link active" href="about.php">About</a>
                <a class="nav-item nav-link active" href="nutrition.php">Nutrition Facts</a>

            </div>
            <div class="navbar-nav justify-content-end">
                <a class="nav-item nav-link active" href="login-form.php">
                    <i class="fas fa-user"></i> Login
                </a>
                <a class="nav-item nav-link active" href="sign-up.php">
                    <i class="ml-23 fas fa-check"></i> Sign Up
                </a>
            </div>
        </div>
    </nav>

    <!--Main Menu-->
    <div class="container-sm" id="main-menu">
        <div class="row row-cols-3">
            <section class="col">
                <a href=""><img src="./images/Chest-Workout.jpg" style="width: 450px; height: 300px;" alt=""></a>
                <h3 style="text-align: center;">Chest</h3>
            </section>
            <section class="col">
                <a href=""><img src="./images/Forearm-Workout.jpg" style="width: 450px; height: 300px;" alt=""></a>
                <h3 style="text-align: center;">Forearm</h3>
            </section>
            <section class="col">
                <a href=""><img src="./images/Biceps - Workout.jpg" style="width: 450px; height: 300px;" alt=""></a>
                <h3 style="text-align: center;">Biceps</h3>
            </section>
            <section class="col">
                <a href=""><img src="./images/Triceps - Workout.jpg" style="width: 450px; height: 300px;" alt=""></a>
                <h3 style="text-align: center;">Triceps</h3>
            </section>
            <section class="col">
                <a href=""><img src="./images/Shoulder - Workout.jpg" style="width: 450px; height: 300px;" alt=""></a>
                <h3 style="text-align: center;">Shoulder</h3>
            </section>
            <section class="col">
                <a href=""><img src="./images/Back-Workout.jpg" style="width: 450px; height: 300px;" alt=""></a>
                <h3 style="text-align: center;">Back</h3>
            </section>
        </div>
    </div>

    <!--Footer-->
    <?php include('./includes/footer.php') ?>
</body>

</html>