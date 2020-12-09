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

    <title>Back Workout</title>
</head>

<body>
    <div class="container-sm">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Dumbbell Row</b></h2>
                <video src="<?php echo VID_LOCATION . '/Dumbbell Row.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Back-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 540px; left: 180px;">
                        <ol id="instruction">
                            <li>Place your leg on the bench so that your knee can rest on the bench.</li>
                            <li>Bend your torso foward to the floor and support yourself with your arm by putting your
                                hand against the bench.</li>
                            <li>Hold the weight with your other hand, pull it straight up to the side of your chest.
                                Repeat the motion.</li>
                            <li>Change the supporting leg and arm to work on the other side.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <h2><b>Supermans</b></h2>
                <video src="<?php echo VID_LOCATION . '/Supermans.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Back-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 540px; left: 180px">
                        <ol id="instruction">
                            <li>Lay face down on the floor with your arms and legs straighten out in front of you.</li>
                            <li>Raise your arms, legs and chest off of the floor and hold the position as long as you
                                can.</li>
                            <li>Steadily lower your arms, legs and chest back to the original position. Repeat.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <h2><b>Good Morning</b></h2>
                <video src="<?php echo VID_LOCATION . '/Good Mornings.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Back-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 540px; left: 180px">
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

            <!--Section 4 -->
            <section class="col">
                <h2><b>Elevated Pike Press</b></h2>
                <video src="<?php echo VID_LOCATION . '/Elevated Pike Press.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="last-section">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Back-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 540px; left: 180px">
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