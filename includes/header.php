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
        <?php
        if (isset($_SESSION['Admin'])) {
            echo "<div class=\"navbar-nav justify-content-end\">";
            // show icon with username and log out button instead of Login and Sign up
            // redirects to admin page if user is admin
            echo "<a class=\"nav-item nav-link active\" href=\"./admin.php\" style=\"position: relative; top: 9px;\"><i class=\"fas fa-user\"></i>";
            echo " " . $_SESSION['Admin'];
            echo "</a>";
            echo "<a class=\"nav-item nav-link active\" href=\"./logout.php\"><i class=\"fa fa-sign-out\"></i>Log out</a>";
            echo "</div>";
        }
        else if (isset($_SESSION['Customer'])) {
            echo "<div class=\"navbar-nav justify-content-end\">";
            // show icon with username and log out button instead of Login and Sign up
            // redirects to user management page if is a regular user
            echo "<a class=\"nav-item nav-link active\" href=\"./admin.php\" style=\"position: relative; top: 9px;\"><i class=\"fas fa-user\"></i>";
            echo " " .  $_SESSION['Customer'];
            echo "</a>";
            echo "<a class=\"nav-item nav-link active\" href=\"./logout.php\"><i class=\"fa fa-sign-out\"></i>Log out</a>";
            echo "</div>";
        }
        else {
            echo "<div class=\"navbar-nav justify-content-end\">";
            echo "<a class=\"nav-item nav-link active\" href=\"./login.php\"><i class=\"fa fa-sign-in\"></i> Login";
            echo "</a>";
            echo "<a class=\"nav-item nav-link active\" href=\"./signup.php\"><i class=\"ml-23 fa fa-user-plus\"></i>Sign Up</a>";
            echo "</div>";
        }
        ?>
    </div>
</nav>
