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

    <title>Shoulder Workout</title>
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
                    <h2><b>Decline Push-Up</b></h2>
                    <?php
                    $vid = "GnNJPJFe3fE";
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
                <iframe class="video" src="https://www.youtube.com/embed/GnNJPJFe3fE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Shoulder-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 350px; position: relative; bottom: 350px; left: 280px;">
                        <ol id="instruction">
                            <li>Use a bench or any item to lift your feet.</li>
                            <li>Place your hands slightly wider than your shoulders.
                            </li>
                            <li>Slowly and steadily lower your body as much as you can.</li>
                            <li>Raise your body back until original position.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <div>
                    <h2><b>Side Lateral Raises</b></h2>
                    <?php
                    $vid = "icos6nUp9Hs";
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
                <iframe class="video" src="https://www.youtube.com/embed/icos6nUp9Hs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Shoulder-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 400px; left: 250px;">
                        <ol id="instruction">
                            <li>Stand with your back straight with dumbbells, palms rotates to your hips.</li>
                            <li>Raise your arms with a little bend by your elbow as high as you can.</li>
                            <li>Slowly relax your arms to reach the original position.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <div>
                    <h2><b>Bench Dips</b></h2>
                    <?php
                    $vid = "9rwMtc9569Q";
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
                <iframe class="video" src="https://www.youtube.com/embed/9rwMtc9569Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Shoulder-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 400px; left: 250px;">
                        <ol id="instruction">
                            <li>Hold the edge of anything that can support your weight with your hands, Keep your feet
                                together and legs straight as you can.</li>
                            <li>Lower your body as much as you can.</li>
                            <li>Steadily push back up to the original straight position.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 4 -->
            <section class="col">
                <div>
                    <h2><b>Seated Dumbbell Shoulder Press</b></h2>
                    <?php
                    $vid = "bgyn8R1sNi4";
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
                <iframe class="video" src="https://www.youtube.com/embed/bgyn8R1sNi4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Shoulder-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 400px; left: 250px;">
                        <ol id="instruction">
                            <li>Grab a dumbbell or two while standing upright.</li>
                            <li>Raise the dumbbell with your arms being fully straight as hight as you can until it eye
                                level.
                            </li>
                            <li>Lower the dumbbell in a slow manner to the original position then repeat.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 5 -->
            <section class="col">
                <div>
                    <h2><b>Front Raises</b></h2>
                    <?php
                    $vid = "aBkm6jQYDkY";
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
                <iframe class="video" src="https://www.youtube.com/embed/aBkm6jQYDkY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="last-section">
                    <div id="content-background" style="background-image: url(<?php echo IMG_LOCATION . '/Shoulder-Background.jpg' ?>);"> </div>
                    <div class="text-block" style="width: 320px; position: relative; bottom: 400px; left: 250px;">
                        <ol id="instruction">
                            <li>Sit on a chair or bench. Raise the dumbbells with your shoulders as high and verticle as
                                you can.</li>
                            <li>Lower the dumbbells back to return to the original position.</li>
                        </ol>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>