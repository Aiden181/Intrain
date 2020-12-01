<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/nutrition-facts-style.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <title>Nutrition</title>
</head>

<body>

    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <a href="./index.php"><img src="./images/Intrain.png" style="width: 140px; height: 140px;"
                    alt="Intrain Logo"></a>
        </div>
    </div>

    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Programs
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="upper-body.php">Upper Body Workout</a>
                        <a class="dropdown-item" href="lower-body.php">Lower Body Workout</a>
                </li>
                <a class="nav-item nav-link active" href="about.php">About</a>
                <a class="nav-item nav-link active" href="nutrition.php">Nutrition Facts</a>

            </div>
            <div class="navbar-nav justify-content-end">
                <a class="nav-item nav-link active" href="login-form.php">
                    <i class="fas fa-user"></i> Login
                </a>
                <a class="nav-item nav-link active" href="sign-up.php">
                    <i class="ml-23 fas fa-check"></i> Sign Up
                </a>
            </div>
        </div>
    </nav>

    <!--Section 2-->
    <section>
        <div class="container-sm" id="left-content">
            <h2>Title</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </section>

    <!--Section 3-->
    <section>
        <div class="container-sm" id="right-content">
            <h2>Title</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </section>

    <!--Section 4-->
    <section>
        <div class="container-sm" id="left-content">
            <h2>Title</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </section>

    <!--Section 5-->
    <section>
        <div class="container-sm" id="right-content">
            <h2>Title</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </section>

    <!--Footer-->
    <?php include('./includes/footer.php')?>

</body>

</html>