<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.php" type="text/css" media="screen">
    <link rel="icon" href="../images/Intrain.png">
    <title>Error</title>

    <?php
    include('../includes/tools.php');

    if (!isset($_SESSION['Admin'])) {
        die("You should not be here. Only follow links!");
    }
    ?>
</head>
<body>
    <div>Hello, this is an error page, you probably put something wrong in your input fields or went to a place you're not supposed to.</div>
    <div>This is awkward...</div>
    <a href="../admin.php">Click here to go back to the admin panel page</a>
</body>
</html>