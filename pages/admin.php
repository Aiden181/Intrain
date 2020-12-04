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

    <title>Admin Panel</title>
    <style>
        table {
            border-collapse: collapse;
            color: white;
            background-color: #3e3e3e;
        }
        tr:first-child {
            background-color:#565656;
        }
        th, td {
            max-width: 50px;
        }
        th {
            text-transform: uppercase;
            text-align: center;
            padding: 15px;
            background-color:#565656;
            border-right: solid 10px #3e3e3e;
        }
        th:nth-child(3) {
            border-right: none;
        }
        tr:nth-child(3), tr:nth-child(4) {
            border: none;
            background-color: white;
        }
        td {
            padding-left: 9px;
            padding-top: 5px;
        }
        tr > td {
            padding-bottom: 60px;
        }
    </style>
</head>

<body>
    <?php
    // only allow logged in admins
    if (!isset($_SESSION['Admin'])) {
        die("You should not be here. Only follow links!");
    }
    ?>
    
    <p style="text-align: center; color: red; font-weight: bold">!!!!!!!!!!!!!!! WORK IN PROGRESS !!!!!!!!!!!!!!!</p>
    
    <br>
    <div class="container">
        <table style="width:100%">
            <!-- 1st "table" -->
            <tr>
                <th>Edit account details</th>
                <th>Manage customers</th>
                <th>Manage admins</th>
            </tr>
            <tr>
                <td>Edit account details button here</td>
                <td>Manage customers button here</td>
                <td>Manage admins button here</td>
            </tr>
        </table>
        <p></p>
        <table style="width:100%">
            <!-- 2nd "table" -->
            <tr>
                <th>Account Information</th>
                <th>Admin Information</th>
                <th>Customer Information</th>
            </tr>
            <tr>
                <td>aaaaaaaa</td>
                <td>Total admins: </td>
                <td>Total customer accounts:</td>
            </tr>
        </table>
    </div>

    <br>
</body>
</html>