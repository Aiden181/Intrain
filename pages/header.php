<?php
// if (!defined("IN_SB"))
//     die("You should not be here. Only follow links!");
?>

<!--Jumbotron-->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <a href="index.php?p=home"><img src="<?php echo IMG_LOCATION . '/Intrain.png' ?>" id="header-image" alt="Intrain Logo"></a>
    </div>
</div>

<!--Navigation Bar-->
<nav class="navbar navbar-expand-sm">
    <div class="container">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php?p=about">About</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                    Programs
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?p=upper-body">Upper Body Workout</a>
                    <a class="dropdown-item" href="index.php?p=lower-body">Lower Body Workout</a>
                </div>
            </li>
            <a class="nav-item nav-link active" href="index.php?p=nutrition">Nutrition Facts</a>
            <?php
            if (isset($_SESSION['Admin'])) {
                echo "<a class=\"nav-item nav-link active\" href=\"index.php?p=admin\">Admin Panel</a>";
            }
            ?>
        </div>
        <?php
        // if logged in as an admin, show user icon with account name with drop-down list
        // when clicked on and show log out button
        if (isset($_SESSION['Admin'])) {
            echo "<div class=\"navbar-nav justify-content-end\">";
            echo "<li class=\"nav-item dropdown\">";
            // user icon and account name as drop-down list
            echo "<a class=\"nav-item nav-link dropdown-toggle active\" href=\"\" style=\"position: relative; top: 9px; left: 20px;\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"fas fa-user\"></i>";
            echo " " . $_SESSION['Admin'];
            echo "</a>";
            // drop-down menu items
            echo "<div class=\"dropdown-menu\">";
            echo "<a class=\"dropdown-item\" href=\"index.php?p=admin&c=customers\">Manage customers</a>";
            echo "<a class=\"dropdown-item\" href=\"index.php?p=admin&c=admins\">Manage admins</a>";
            echo "</div>";
            echo "</li>";
            // log out button
            echo "<a class=\"nav-item nav-link active\" href=\"index.php?p=logout\"><i class=\"fa fa-sign-out\"></i>Log out</a>";
            echo "</div>";
        }
        // if logged in as an admin, show user icon with account name and show log out button
        else if (isset($_SESSION['Customer'])) {
            echo "<div class=\"navbar-nav justify-content-end\">";
            // show icon with username and log out button instead of Login and Sign up
            // redirects to user management page if is a regular user
            echo "<a class=\"nav-item nav-link active\" href=\"index.php?p=customer\" style=\"position: relative; top: 9px;\"><i class=\"fas fa-user\"></i>";
            echo " " .  $_SESSION['Customer'];
            echo "</a>";
            echo "<a class=\"nav-item nav-link active\" href=\"index.php?p=logout\"><i class=\"fa fa-sign-out\"></i>Log out</a>";
            echo "</div>";
        }
        // not logged in
        else {
            echo "<div class=\"navbar-nav justify-content-end\">";
            echo "<a class=\"nav-item nav-link active\" href=\"index.php?p=login\"><i class=\"fa fa-sign-in\"></i> Login";
            echo "</a>";
            echo "<a class=\"nav-item nav-link active\" href=\"index.php?p=signup\"><i class=\"ml-23 fa fa-user-plus\"></i>Sign Up</a>";
            echo "</div>";
        }
        ?>
    </div>
</nav>