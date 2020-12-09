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

    <title>Calves Workout</title>
</head>

<body>
    <div class="container-sm">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Seated Calf Raise</b></h2>
                <video src="<?php echo VID_LOCATION . '/Seated Calf Raise.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Calves-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; background-color:black; color:white; bottom: 500px; left: 350px">
                        <ol id="instruction">
                            <li>Sitting comfortably on a chair or bench with your core stomach muscles engaged, place
                                your feet touching floor.</li>
                            <li>Place the dumbbell on your legs, above the knees and raise your heels upwards from the
                                floor.</li>
                            <li>Move your belly your spine to engage the muscles, then raise your head and shoulders off
                                the
                                floor.</li>
                            <li>Stop when your heels are fully strecth and then slowly return to the starting position
                                and repeat.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <h2><b>Walking Calf Raises</b></h2>
                <video src="<?php echo VID_LOCATION . '/Walking Calf Raises.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Calves-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; background-color:black; color:white; bottom: 500px; left: 350px">
                        <ol id="instruction">
                            <li>Walk forward and push your toe into the ground.</li>
                            <li>Raise you heel off the ground each step and stretch your calf muscle.</li>
                            <li>Repeat and walk forward steadily and slowly.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!--Section 3 -->
            <section class="col">
                <h2><b>Single Leg Calf Raise</b></h2>
                <video src="<?php echo VID_LOCATION . '/Single Leg Calf Raise.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="last-section">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Calves-Background.jpg' ?>" alt="">
                    <div class="text-block" style="position: relative; background-color:black; color:white; bottom: 500px; left: 350px">
                        <ol id="instruction">
                            <li>Standing straight with a dumbbell in one hand, lift the same foot as the side without
                                the dumbbell off the floor.</li>
                            <li>Raise your heel upwards while keeping your knees stationary.</li>
                            <li>Stop when your heels are fully stretched and then steadily return to the original
                                position and repeat.</li>
                        </ol>
                    </div>
                </div>

            </section>
        </div>
    </div>
</body>

</html>