<?php
    include('includes/tools.php');

    // this page clears login session when user wants to log out
        // remove user from session
    if (isset($_SESSION['Customer'])) {
        unset($_SESSION['Customer']);

        // redirects to index.php
        header("Location: ./index.php");
        exit();
    }
    // remove admin from session
    if (isset($_SESSION['Admin'])){
        unset($_SESSION['Admin']);

        // redirects to index.php
        header("Location: ./index.php");
        exit();}
?>