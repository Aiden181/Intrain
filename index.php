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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Intrain Home</title>
</head>

<body>
    <?php include('./includes/header.php') ?>

    <!--Top Three Reason to choose Intrain-->
    <div class="container-sm" id="promotion-box">
        <div class="row row-cols-3">
            <section class="col">
                <img src="./images/Pic01.jpg" style="width: 300px; height: 300px;" alt="">
                <h4>Workout During LockDown</h4>
                <p></p>
            </section>
            <section class="col">
                <img src="./images/Pic02.jpg" style="width: 300px; height: 300px;" alt="">
                <h4>Anywhere, anytime you want</h4>
                <p></p>
            </section>
            <section class="col">
                <img src="./images/Pic03.jpg" style="width: 300px; height: 300px;" alt="">
                <h4>Huge Lessons Library</h4>
                <p></p>
            </section>
        </div>
    </div>

    <!--Section 2-->
    <section>
        <div class="container-sm" id="left-content">
            <h2 style="text-align: center;">Workout At Home For Free</h2>
            <p>We believe that workout and fitness should be accessible to everyone, everywhere, and every time.
                Therefore, with just some dumbbells on your hand. You can train in the place and the time as you see
                fit.
            </p>
        </div>
        <div>
            <img src="" alt="">
        </div>
    </section>

    <!--Section 3-->
    <section>
        <div class="container-sm" id="right-content">
            <h2>Fun Facts</h2>
            <p>Through many websites that contain serious programs, videos, and deadlines. We can see that many users
                who have started the program can find themselves under pressure and decided to quit after 2 or 3 three
                weeks. Therefore, we have gone out and made some fun facts to keep our users entertained and find some
                joy as well as some information while they are learning as well and somewhat know more about their body.
            </p>
            <img class="img-fluid" src="./images/Pic05.jpg" id="left-img" alt="" style="width: 530px; height: 320px;">
        </div>    
    </section>

    <!--Section 4-->
    <section>
        <div class="container-sm" id="left-content-2">
            <h2>Not sure where to start?
            </h2>
            <p>Many people have asked this question. But before you start your own intense workout routine, burn some
                calories, lose your belly fat, and gain some muscle. You must first know how to exercise your body; if
                you do ten push-ups or 20 crunches wrong, you will end up damaging your body then making it strong and
                healthy. Therefore, our program is to show you first how to exercise correctly, and that is where we
                recommend you start.
            </p>
            <img class="img-fluid" src="./images/Pic06.jpg" style="width: 530px; height: 350px;" alt=""" id="right-img">
        </div>   
    </section>

    <!--Footer-->
    <?php include('./includes/footer.php')?>
</body>

</html>