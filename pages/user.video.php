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
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/workout-pages-style.php" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo CSS_LOCATION ?>/admin-admin.php" type="text/css" media="screen">

    <!-- website icon -->
    <link rel="icon" href="./images/Intrain.png">

    <title>Edit account details</title>
</head>

<body>
    <div class="container">
        <p></p>
        <h2 style="position: relative; right: 12px; font-weight: bold;">User management</h2>
        <div class="row" style="color: white;">
            <div class="column left">
                <div id="admin-page-menu">
                    <ul>
                        <li><a href="index.php?p=user">View account info</a></li>
                        <li><a href="index.php?p=user&b=edit">Edit account details</a></li>
                        <li class="active"><a href="index.php?p=user&b=video">View bookmarked videos</a></li>
                    </ul>
                </div>
            </div>
            <!-- right column content -->
            <div class="column right" style="background-color: #3e3e3e; padding: 20px;">
                <?php
                $username = $_SESSION['Customer'];
                $sql = "SELECT `video` FROM `customer` WHERE username=?";
                $db->query($sql, $username);
                if ($db->numRows() > 0) {
                    $result = $db->fetchAll();
                    foreach ($result as $row) {
                        $video_list = $row['video'];
                    }
                }
                if (empty($video_list)) {
                    echo "  <div style=\"padding: 40px; text-align: center;\">";
                    echo "      You haven't bookmarked any videos yet.";
                    echo "  </div>";
                }
                else {
                    $video_list = explode(", ", $video_list);
                    array_pop($video_list);
                    foreach($video_list as $vid) {
                        echo "<div class=\"row\">";
                        echo "  <div class=\"col-lg-12 mb-2 info-row\" id=\"$vid-button\" onclick=\"showBookmarkedVideo(this)\">";
                        echo "      <img class=\"cropped\" src=\"http://img.youtube.com/vi/$vid/sddefault.jpg\" alt=\"Youtube video thumbnail\">";
                        echo "<h4 style=\"display: inline;\">" . get_youtube_title($vid) . "</h4>";
                        echo "  </div>";
                        echo "  <div class=\"hide bookmarked-video-section\" id=\"$vid-content\">";
                        echo "      <iframe class=\"bookmarked-video\" src=\"https://www.youtube.com/embed/$vid\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
                        echo "  </div>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <!-- end of right column content -->
        </div>
    </div>
    <br>
    <br>
</body>
</html>