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

    <title>Glutes Workout</title>
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
                    <h2><b>Glute Bridge</b></h2>
                    <?php
                    $vid = "3Uq8cw1Yi3g";
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
                <iframe class="video" src="https://www.youtube.com/embed/3Uq8cw1Yi3g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Glute-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 350px; position: relative; bottom: 350px; left: 30px;">
                        <ol id="instruction">
                            <li>Laying flat on the floor with your knees bent in and feet firmly touching the floor.
                            </li>
                            <li>Push through the legs and keeping the muscles engaged, lift your pelvis off the floor to
                                your stomach, pelvis and thighs make a straight line.
                            </li>
                            <li>Steadily lower to the ground to the original position.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <div>
                    <h2><b>Squats</b></h2>
                    <?php
                    $vid = "J1R81oLQmZA";
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
                <iframe class="video" src="https://www.youtube.com/embed/J1R81oLQmZA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Glute-Background.jpg' ?>);"> </div>
                <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                    <ol id="instruction">
                        <li>Stand up straight with your feet shoulder width apart.</li>
                        <li>Flex your knees and hips and sit back into the squat while lowering your body as low as
                            you can.</li>
                        <li>Return to the original position.
                        </li>
                    </ol>
                </div>
        </div>
        </section>

        <!--Section 3 -->
        <section class="col">
            <div>
                <h2><b>Barbell Hip Thrust</b></h2>
                <?php
                $vid = "av4cQOSzDVw";
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
            <iframe class="video" src="https://www.youtube.com/embed/av4cQOSzDVw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="container" id="content">
                <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Glute-Background.jpg' ?>);"> </div>
                <div class="text-block" style="width: 400px; position: relative; bottom: 500px; left: 50px;">
                    <ol id="instruction">
                        <li>Sit on the floor with a bench or something behind you. Have the dumbbell on top off your
                            legs just above your hips.</li>
                        <li>Lean back against the bench in order to rest your shoulders, extend your arms out to
                            either side using the bench as support.</li>
                        <li>Lift the weight by driving through your feet and moving your hips upwards. Support the
                            weight with your shoulders and feet.</li>
                        <li>Slowly stretch as far as you can, and then slowly return to the original position.</li>
                    </ol>
                </div>
            </div>
        </section>

        <!--Section 4 -->
        <section class="col">
            <div>
                <h2><b>Forward Lunges</b></h2>
                <?php
                $vid = "hikBzRz3akE";
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
            <iframe class="video" src="https://www.youtube.com/embed/hikBzRz3akE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="container" id="content">
                <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Glute-Background.jpg' ?>);"> </div>
                <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                    <ol id="instruction">
                        <li>Move forward with one leg.</li>
                        <li>Lower your body until your other knee nearly touches the ground.</li>
                        <li>Rememeber to remain upright, your front knee also should stay above the front foot.</li>
                        <li>Push off the floor with your front foot until you return to the original position.
                            Switch legs.</li>
                    </ol>
                </div>
            </div>
        </section>

        <!--Section 5 -->
        <section class="col">
            <div>
                <h2><b>Good Morning</b></h2>
                <?php
                $vid = "87AxUw999rU";
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
            <iframe class="video" src="https://www.youtube.com/embed/87AxUw999rU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="container" id="last-section">
                <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Glute-Background.jpg' ?>);"> </div>
                <div class="text-block" style="width: 320px; position: relative; bottom: 400px; left: 80px;">
                    <ol id="instruction">
                        <li>Stand up straight with your feet a little past shoulder a. Place your hands at the
                            center of your chest.</li>
                        <li>Keep your back straight, move foward your hips to bring your shoulder down towards the
                            floor as much as you can.
                        </li>
                    </ol>
                </div>
            </div>
        </section>
    </div>
    </div>
</body>

</html>