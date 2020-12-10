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
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="./css/workout-pages-style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Quads Workout</title>
</head>

<body>
    <div class="container-sm">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Squats</b></h2>
                <video src="<?php echo VID_LOCATION . '/Squats.mp4'?>" width="1000px" height="500px" controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Quads-Background.jpg' ?>"
                        style="height: 650px;" alt="">
                    <div class="text-block"
                        style="width: 320px; background-color:black; color:white; position: relative; bottom: 480px; left: 30px;">
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
                <h2 style="padding-top: 100px;"><b>Forward Lunges</b></h2>
                <video src="<?php echo VID_LOCATION . '/Forward Lunges.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Quads-Background.jpg' ?>"
                        style="height: 650px;" alt="">
                    <div class="text-block"
                        style="width: 320px; background-color:black; color:white; position: relative; bottom: 550px; left: 30px;">
                        <ol id="instruction">
                            <li>Move forward with one leg.</li>
                            <li>Lower your body until your other knee nearly touches the ground.</li>
                            <li>Rememeber to remain upright, your front knee also should stay above the front foot.</li>
                            <li>Push off the floor with your front foot until you return to the original position. Switch legs.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <h2 style="padding-top: 100px;"><b>Bulgarian Split Squat</b></h2>
                <video src="<?php echo VID_LOCATION . '/Bulgarian Split Squat.mp4'?>" width="1000px"
                    height="500px" controls></video>
                <div class="container" id="last-section">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Quads-Background.jpg' ?>"
                        style="height: 650px;" alt="">
                    <div class="text-block"
                        style="width: 320px; background-color:black; color:white; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li> Stand with your back to a bench or anything that can lift your leg and place one of your feet on the bench or the object.</li>
                            <li> Squat down until your front leg touches to the floor..</li>
                            <li>Move back to the original position, switch legs and repeat.</li>
                        </ol>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>