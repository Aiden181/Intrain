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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="./css/workout-pages-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Traps Workout</title>
</head>

<body>
    <div class="container-sm">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Seated Dumbbell Shrugs</b></h2>
                <video src="<?php echo VID_LOCATION . '/Seated Dumbell Shrugs.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Traps-Background.jpg' ?>" alt="">
                    <div class="text-block" style="width: 350px; position: relative; bottom: 350px; left: 280px;">
                        <ol id="instruction">
                            <li>Sit on a chair or any thing higher than your back height with dumbbells in both hands,
                                palms facing towards your body, back straight up.</li>
                            <li>Lift your shoulders and hold at the highest point of the motion.
                            </li>
                            <li>Low your shoulders slowly and keep balance back to starting position.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <h2><b>Elevated Pike Press</b></h2>
                <video src="<?php echo VID_LOCATION . '/Elevated Pike Press.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="last-section">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Traps-Background.jpg' ?>" alt="">
                    <div class="text-block" style="width: 320px; position: relative; bottom: 400px; left: 250px;">
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