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
    <link rel="stylesheet" href="./css/style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Admin Management</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                aaaaaaaaaaaaaaaaaaa
            </div>
            <div class="col-md-12">
                <div class="page-header clearfix">
                <?php
                $sql = "SELECT * FROM `admin`";
                // execute query and store results in $result
                if ($result = mysqli_query($conn, $sql)) {
                ?>
                    <h2 class="pull-left" style="font-weight: bold">Admins (<?php echo mysqli_num_rows($result) ?>)</h2>
                    <a href="index.php?p=admin&c=admins&o=create" class="btn btn-success pull-right" style="background-color:#FF3036; border: none; font-weight: bold">Add an admin</a>
                </div>
                <?php
                    if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class='table table-bordered table-striped'>
                            <thead>
                                <tr style="background-color: #FF3036; color: white; font-weight: bold">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Username</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone_number'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>";
                                echo "<a href='index.php?p=admin&c=read&id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='index.php?p=admin&c=update&id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='index.php?p=admin&c=delete&id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
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
        </div>
    </div>
    <br>
</body>

</html>