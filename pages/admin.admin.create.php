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

    <title>Add Admin</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">Add new admin</h2>
        <div class="row">
            <!-- left column content -->
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li><a href="index.php?p=admin&c=admins"> List admins</a></li>
                        <li class="active"><a href="index.php?p=admin&c=admins&o=create"> Add new admin</a></li>
                    </ul>
                </div>
            </div>

            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <div class="page-header clearfix">
                    <table style="width: 100%; background-color: #565656; border: 2px solid white">
                        <th style="padding: 10px 10px 6px 10px; max-height: 100px;">
                            <h5 class="pull-left" style="color: white; font-weight: bold">Admin details</h2>
                        </th>
                    </table>
                </div>
                <br>

                <!-- credentials -->
                <div id="signup-form">
                    <form action="index.php?p=admin&c=admins&o=create" method="post" onsubmit="checkSignup(event)" id="customer-signup">
                        <table>
    
                        <div class="row">
                            <div class="col-lg-4 mb-2">Admin name:</div>
                                <div class="col-lg-4 mb-2">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="<?php echo isset($_POST['first_name']) ? test_input($_POST['first_name']) : ''; ?>" pattern="^[A-Za-z]+$" required>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="<?php echo isset($_POST['last_name']) ? test_input($_POST['last_name']) : ''; ?>" pattern="^[A-Za-z]+$" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Admin email:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? test_input($_POST['email']) : ''; ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Admin phone number:</div>
                            <div class="col-lg-4 mb-2">
                                <input type="phone_number" name="phone" id="phone" class="form-control" placeholder="Phone number" value="<?php echo isset($_POST['phone']) ? test_input($_POST['phone']) : ''; ?>" pattern="^\+?\d{0,13}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Admin username:</div>
                            <div class="col-lg-4 mb-2">
                                    <input type="username" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo isset($_POST['username']) ? test_input($_POST['username']) : ''; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-2">Admin password:</div>
                            <div class="col-lg-4 mb-2">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        </table>
                    <?php
                        if (!$first_name_valid || !$last_name_valid)
                            echo "<div style=\"color: red\"> $nameError </div>";
                        if (!$email_valid)
                            echo "<div style=\"color: red\"> $emailError </div>";
                        if (!$phone_valid)
                            echo "<div style=\"color: red\"> $phoneError </div>";
                        if (!$username_valid)
                            echo "<div style=\"color: red\"> $usernameError </div>";
                        if (!$password_valid)
                            echo "<div style=\"color: red\"> $passwordError </div>";
                        if (!$flag_valid)
                            echo "<div style=\"color: red\"> $flagError </div>";
                    ?>
                </div>
                <br>

                <!-- flags -->
                <div class="page-header clearfix">
                    <table style="width: 100%; background-color: #565656; border: 2px solid white">
                        <th style="padding: 10px 10px 6px 10px; max-height: 100px;">
                            <h5 class="pull-left" style="color: white; font-weight: bold">Admin access</h2>
                        </th>
                    </table>
                </div>
                <div style="background-color: rgba(0,0,0,0.2);"><br></div>
                <div style="background-color: rgba(0,0,0,0.2); padding-bottom: 30px;">
                    <tr>
                        <td>
                            <table width="95%" style="margin-left: auto; margin-right: auto;">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="tablerow-root">Root Admin (Full Admin Access)</td>
                                        <td class="tablerow-root"><input type="checkbox" id="p2" onclick="UpdateCheckBox(2, 3, 14);" value=""></td>
                                    </tr>
                                    <tr class="tableheader">
                                        <td colspan="2" class="tableheader">Manage Customers </td>
                                        <td class="tableheader"><input type="checkbox" id="p3" onclick="UpdateCheckBox(3, 4, 7);" value=""></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">List Customers </td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p4" value="a"></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Add New Customers </td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p5" value="b"></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Edit Customers </td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p6" value="c"></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Delete Customers </td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p7" value="d"></td>
                                    </tr>
                                    <!-- add space between sections -->
                                    <tr><td style="visibility: hidden;">a</td></tr>
                                    <tr>
                                        <td colspan="2" class="tableheader">Manage Admins </td>
                                        <td class="tableheader"><input type="checkbox" id="p8" onclick="UpdateCheckBox(8, 9, 12);" value=""></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">List Admins </td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p9" value="e"></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Add New Admins</td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p10" value="f"></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Edit Admins</td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p11" value="g"></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Delete Admins</td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p12" value="h"></td>
                                    </tr>
                                    <!-- add space between sections -->
                                    <tr><td style="visibility: hidden;">a</td></tr>
                                    <tr>
                                        <td colspan="2" class="tableheader">Database</td>
                                        <td class="tableheader"><input type="checkbox" id="p13" onclick="UpdateCheckBox(13, 14, 14);" value=""></td>
                                    </tr>
                                    <tr class="tablerow">
                                        <td width="15%">&nbsp;</td>
                                        <td class="tablerow">Test database</td>
                                        <td class="tablerow"><input type="checkbox" name="flag[]" id="p14" value="x"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </div>
                <br>
                <br>
                <input type="submit" name="add-admin" class="btn" id="sign-up-btn" value="Add admin">
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
</body>
</html>