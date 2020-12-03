<?php include('./includes/tools.php'); ?>
<!--Jumbotron-->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <a href="./index.php"><img src="./images/Intrain.png" id="header-image" alt="Intrain Logo"></a>
    </div>
</div>

<!--Navigation Bar-->
<nav class="navbar navbar-expand-sm">
    <div class="container">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="./about.php">About</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Programs
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./upper-body.php">Upper Body Workout</a>
                    <a class="dropdown-item" href="./lower-body.php">Lower Body Workout</a>
                </div>
            </li>
            <a class="nav-item nav-link active" href="./nutrition.php">Nutrition Facts</a>
        </div>
        <div class="navbar-nav justify-content-end">
            <a class="nav-item nav-link active" href="./login.php"><i class="fas fa-user"></i>
            Login
            </a>
            <a class="nav-item nav-link active" href="./signup.php"><i class="ml-23 fas fa-check"></i>
            Sign Up
            </a>
        </div>
    </div>
</nav>
