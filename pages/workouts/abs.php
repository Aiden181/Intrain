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

    <title>Abs Workout</title>
</head>

<body>
    <div class="container-sm">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Crunches</b></h2>
                <video src="<?php echo VID_LOCATION . '/Crunches.mp4'?>" width="1000px" height="500px" controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Abs-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 500px; left: 350px">
                        <ol id="instruction">
                            <li>Lay straight on your back with your knees bent and your feet entirely touching the
                                ground.</li>
                            <li>Place your hands at the back of your head.</li>
                            <li>Move your belly your spine to engage the muscles, then raise your head and shoulders off
                                the
                                floor.</li>
                            <li>Slowly lower your head and shoulders to the original position.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <h2><b>Laying Leg Raises</b></h2>
                <video src="<?php echo VID_LOCATION . '/Laying Leg Raises.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Abs-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 500px; left: 350px">
                        <ol id="instruction">
                            <li>Lay straight on your back with your arms and hands flat down on both sides.</li>
                            <li>Keep your legs close together and as straight as possible.</li>
                            <li>Steadily raise your legs as hight as you can , pause at your current position, then
                                slowly lower
                                your legs back down.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <h2><b>Knee Raises</b></h2>
                <video src="<?php echo VID_LOCATION . '/Knee Raises.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="last-section">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Abs-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; bottom: 500px; left: 350px">
                        <ol id="instruction">
                            <li>Find two chairs or any objects that you can lift youself up with.</li>
                            <li>Starts by raise your legs foward in order to touch your chest.</li>
                            <li>Move your belly your spine to engage the muscles, then raise your head and shoulders off
                                the
                                floor.</li>
                            <li>Slowly lower your legs to the original position.</li>
                        </ol>
                    </div>
                </div>

            </section>
        </div>
    </div>
</body>

</html>