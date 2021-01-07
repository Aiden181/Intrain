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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/workout-pages-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Chest Workout</title>
</head>

<body>
    <div class="container-sm">
        <?php
        if (isset($_SESSION['Customer'])) {
            $username = $_SESSION['Customer'];
            $sql = "SELECT `video` FROM `customer` WHERE username=?";
            $db->query($sql, $username);
            if ($db->numRows() > 0) {
                $result = $db->fetchAll();
                foreach ($result as $row) {
                    $video = $row['video'];
                }
            }
        }
        ?>
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <div>
                    <h2><b>Push Up</b></h2>
                    <?php
                    $vid = "BE_JFHgYvds";
                    if (isset($_SESSION['Customer'])) {
                        echo "<form action=\"./scripts/ajax-form.php\" method=\"POST\" class=\"bookmark-form\" id =\"$vid\">";
                        if (stristr($video, $vid)) {
                            echo "<i class=\"fas fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        } else {
                            echo "<i class=\"far fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        }
                        echo "</form>";
                    }
                    ?>
                </div>
                <iframe class="video" src="https://www.youtube.com/embed/BE_JFHgYvds" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Chest-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li>Place your hands firmly on the ground, directly under shoulders.</li>
                            <li>Flatten your back so your entire body is straight, adjust your legs depending on the difficulties.</li>
                            <li>Slowly move your shoulder blades up and down, remember to keep your elbows close to your body.</li>
                            <li>Exhale when you push back to your original position.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <div>
                    <h2><b>Dumbbell Flys</b></h2>
                    <?php
                    $vid = "tRL8IrPTLcc";
                    if (isset($_SESSION['Customer'])) {
                        echo "<form action=\"./scripts/ajax-form.php\" method=\"POST\" class=\"bookmark-form\" id =\"$vid\">";
                        if (stristr($video, $vid)) {
                            echo "<i class=\"fas fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        } else {
                            echo "<i class=\"far fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        }
                        echo "</form>";
                    }
                    ?>
                </div>
                <iframe class="video" src="https://www.youtube.com/embed/tRL8IrPTLcc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Chest-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li>Lay flat on the bench or anywhere that can support your weight and place your feet touching the ground.</li>
                            <li>Start the workout with the dumbbells held slightly above your chest, slightly bend your elbows.</li>
                            <li>Slowly lift the weights as high as you can.</li>
                            <li>Pause for a few seconds then slower lower the weights to the original position.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <div>
                    <h2><b>Incline Push-Up</b></h2>
                    <?php
                    $vid = "1ZKnbqBJ4Ts";
                    if (isset($_SESSION['Customer'])) {
                        echo "<form action=\"./scripts/ajax-form.php\" method=\"POST\" class=\"bookmark-form\" id =\"$vid\">";
                        if (stristr($video, $vid)) {
                            echo "<i class=\"fas fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        } else {
                            echo "<i class=\"far fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        }
                        echo "</form>";
                    }
                    ?>
                </div>
                <iframe class="video" src="https://www.youtube.com/embed/1ZKnbqBJ4Ts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Chest-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li>Stand facing bench or anything that can be sturdy to withstand your weight.</li>
                            <li>Place your hands on edge of bench or the platform, slightly wider than your shoulder.</li>
                            <li>Steadily lower your body until your chest almost touches the platform.</li>
                            <li>Push your body until arms are completely straight.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 4 -->
            <section class="col">
                <div>
                    <h2><b>Dumbbell Bench Press</b></h2>
                    <?php
                    $vid = "UfQtf1KC81I";
                    if (isset($_SESSION['Customer'])) {
                        echo "<form action=\"./scripts/ajax-form.php\" method=\"POST\" class=\"bookmark-form\" id =\"$vid\">";
                        if (stristr($video, $vid)) {
                            echo "<i class=\"fas fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        } else {
                            echo "<i class=\"far fa-bookmark bookmark\" id =\"$vid-icon\"></i>";
                        }
                        echo "</form>";
                    }
                    ?>
                </div>
                <iframe class="video" src="https://www.youtube.com/embed/UfQtf1KC81I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="last-section">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Chest-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li>Use a bench or anything to support your feet off the ground.</li>
                            <li>Lower your head as much as you can by using your elbows.</li>
                            <li>Push hard to tense up your arms and neck to return to original position.</li>
                        </ol>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>