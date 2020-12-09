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

    <title>Triceps Workout</title>
</head>

<body>
    <div class="container-sm">
        <div class="row">
            <!--Section 1 -->
            <section class="col" id="first-section">
                <h2><b>Push Up</b></h2>
                <video src="<?php echo VID_LOCATION . '/Push Up.mp4'?>" width="1000px" height="500px" controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Triceps-Background.jpg' ?>" alt="">
                    <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li>Place your hands firmly on the ground, directly under shoulders.</li>
                            <li>Flatten your back so your entire body is straight, adjust your legs depending on the
                                difficulties.</li>
                            <li>Slowly move your shoulder blades up and down, remember to keep your elbows close to your
                                body.</li>
                            <li>Exhale when you push back to your original position.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <!--Section 2 -->
            <section class="col">
                <h2><b>Bench Dips</b></h2>
                <video src="<?php echo VID_LOCATION . '/Bench Dips.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Triceps-Background.jpg' ?>" alt="">
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

            <!--Section 3 -->
            <section class="col">
                <h2><b>Seated Triceps Extensions</b></h2>
                <video src="<?php echo VID_LOCATION . '/Seated Triceps Extensions.mp4'?>" width="1000px" height="500px"
                    controls></video>
                <div class="container" id="content">
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Triceps-Background.jpg' ?>" alt="">
                    <div class="text-block" style="width: 320px; position: relative; bottom: 480px; left: 30px;">
                        <ol id="instruction">
                            <li>Stand facing bench or anything that can be sturdy to withstand your weight.</li>
                            <li>Place your hands on edge of bench or the platform, slightly wider than your shoulder.
                            </li>
                            <li>Steadily lower your body until your chest almost touches the platform.</li>
                            <li>Push your body until arms are completely straight.</li>
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
                    <img id="content-background" src="<?php echo IMG_LOCATION . '/Triceps-Background.jpg' ?>" alt="">
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