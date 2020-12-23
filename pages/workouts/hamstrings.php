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

    <title>Hamstrings Workout</title>
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
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Hamstring-Background.jpg' ?>" style="height: 650px;" alt="">
                    <div class="text-block" style="width: 320px; background-color:black; color:white; position: relative; bottom: 480px; left: 30px;">
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

            <!--Section 2 -->
            <section class="col">
                <div>
                    <h2><b>Kickbacks</b></h2>
                    <?php
                    $vid = "F471H7HPsqQ";
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
                <iframe class="video" src="https://www.youtube.com/embed/F471H7HPsqQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Hamstring-Background.jpg' ?>" style="height: 650px;" alt="">
                    <div class="text-block" style="width: 320px; background-color:black; color:white; position: relative; bottom: 550px; left: 30px;">
                        <ol id="instruction">
                            <li>Get down on all fours and position your hands under your shoulders and your knees under
                                your hips.</li>
                            <li>Use one leg to kick back and squeeze your glutes.</li>
                            <li>Steadily return to the original position by bending your knee and lowering your leg then
                                repeat.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <div>
                    <h2><b>Hamstring Curl</b></h2>
                    <?php
                    $vid = "DZNn8keUtTE";
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
                <iframe class="video" src="https://www.youtube.com/embed/DZNn8keUtTE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Hamstring-Background.jpg' ?>" style="height: 650px;" alt="">
                    <div class="text-block" style="width: 320px; background-color:black; color:white; position: relative; bottom: 550px; left: 30px;">
                        <ol id="instruction">
                            <li>Lay down on a bench, extend your leg and use your feet you hold the dumbbell.</li>
                            <li>Lift the weight as high as you, move slowly to max out your muscle.
                            </li>
                            <li>Steadily lower the weight, repeat.</li>
                    </div>
                </div>
            </section>

            <!--Section 4 -->
            <section class="col">
                <div>
                    <h2><b>Single Legged Romanian Deadlifts</b></h2>
                    <?php
                    $vid = "ktps7riSkkU";
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
                <iframe class="video" src="https://www.youtube.com/embed/ktps7riSkkU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container" id="last-section">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Hamstring-Background.jpg' ?>" style="height: 650px;" alt="">
                    <div class="text-block" style="width: 320px; background-color:black; color:white; position: relative; bottom: 550px; left: 30px;">
                        <ol id="instruction">
                            <li>Stand straight with your feet shoulder-width apart and knees slightly bent and raise one leg.</li>
                            <li>Without adjusting the position in your knee, bend your hips, and lower your torso as much as you can.</li>
                            <li>Stress your glutes and then bring yourself back to the original position.</li>
                        </ol>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>