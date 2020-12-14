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

    <title>Forearm Workout</title>
</head>

<body>
    <div class="container-sm" style="margin-bottom: 300px;">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Wrist Curl</b></h2>
                <video src="<?php echo VID_LOCATION . '/Decline Push-Up.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" style="width:1000px; height: 700px;" src="<?php echo IMG_LOCATION . '/Forearm-Background.jpg' ?>" alt="">
                    <div class="text-block" style="width: 350px; position: relative; bottom: 300px; left: 600px;">
                        <ol id="instruction">
                            <li>Hold the dumbbell with your hand facing upwards with your forearm rested against your leg.</li>
                            <li>Steadily curl up your wrist upwards in a semicircular motion.</li>
                            <li>Return to original position and repeat.</li>
                        </ol>
                    </div>
                </div>

            </section>
        </div>
    </div>
</body>

</html>