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

    <title>Admin Management</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">Admin management</h2>
        <div class="row">
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li class="active"><a href="index.php?p=admin&c=admins"> List admins</a></li>
                        <?php
                        // loop through each character in admin flag string to check flag
                        $flags = $_SESSION['flag'];
                        for ($i = 0; $i < strlen($flags); $i++) {
                            // if flag is root or add admins
                            if ($flags[$i] === ROOT_ADMIN || $flags[$i] === ADD_ADMINS) {
                                echo "<li><a href=\"index.php?p=admin&c=admins&o=create\"> Add new admin</a></li>";
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <div class="page-header clearfix">
                <?php
                $sql = "SELECT * FROM `admin`";
                // execute query and store results in $result
                if ($result = mysqli_query($conn, $sql)) {
                ?>
                <table style="width: 100%; background-color: #565656; border: 2px solid white">
                    <th style="padding: 10px 10px 6px 10px; max-height: 100px;">
                        <h5 class="pull-left" style="color: white; font-weight: bold">Admins (<?php echo mysqli_num_rows($result) ?>)</h2>
                    </th>
                </table>
                </div>
                <br>
                <?php
                    if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-hover table-striped">
                            <thead>
                                <tr id="table-headers" class="table-bordered">
                                    <th>ID</th>
                                    <th>Username</th>
                                    <?php
                                    // loop through each character in admin flag string to check flag
                                    $flags = $_SESSION['flag'];
                                    for ($i = 0; $i < strlen($flags); $i++) {
                                        // if flag is root or list admins
                                        if ($flags[$i] === ROOT_ADMIN || $flags[$i] === LIST_ADMINS) {
                                            // show more information
                                            echo "<th>Name</th>\n";
                                            echo "<th>Email</th>\n";
                                            echo "<th>Phone number</th>\n";
                                            echo "<th>Flags</th>";
                                        }
                                    }
                                    ?>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                                echo "<tr class=\"info-row\" onclick=\"window.location='index.php?p=admin&c=admins&o=edit&id=" . $row['id'] . "'\">";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                // loop through each character in admin flag string to check flag
                                $flags = $_SESSION['flag'];
                                for ($i = 0; $i < strlen($flags); $i++) {
                                    // if flag is root or list admins
                                    if ($flags[$i] === ROOT_ADMIN || $flags[$i] === LIST_ADMINS) {
                                        // show more information
                                        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone_number'] . "</td>";
                                        echo "<td>" . $row['flag'] . "</td>";
                                    }
                                }
                            echo "</tr>";
                        }
                    echo "</tbody>";
                echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                echo "<br>";
                ?>
            </div>
            <!-- end of right column content -->
        </div>
    </div>
    <br>
    <br>
</body>

</html>