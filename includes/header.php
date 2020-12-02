<?php include('./includes/tools.php'); ?>
<!--Jumbotron-->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <a href="./index.php"><img src="./images/Intrain.png" style="width: 140px; height: 140px;"
                alt="Intrain Logo"></a>
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
                    <a class="dropdown-item" href="./upper-body.php">Upper Body Workout</a>
                    <a class="dropdown-item" href="./lower-body.php">Lower Body Workout</a>
            </li>
            <a class="nav-item nav-link active" href="./about.php">About</a>
            <a class="nav-item nav-link active" href="./nutrition.php">Nutrition Facts</a>

        </div>
        <div class="navbar-nav justify-content-end">
            <a class="nav-item nav-link active" href="./login-form.php">
                <i class="fas fa-user"></i> Login
            </a>
            <a class="nav-item nav-link active" href="./sign-up.php">
                <i class="ml-23 fas fa-check"></i> Sign Up
            </a>
        </div>
    </div>
</nav>
