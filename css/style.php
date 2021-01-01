<?php
    header("Content-type: text/css");
?>

body {
    font-family: 'Roboto', sans-serif;
    font-size: 22px;
}

.navbar{
    font-size: 26px;
}

.jumbotron {
    background-color:#3e3e3e;
    margin-top: -70px;
}

.jumbotron h1 {
    color: whitesmoke;
}

/*Navigation Bar */
.navbar {
    position: relative;
    margin-top: -100px;
    background-color:#3e3e3e;
}

.nav-item, #navbardrop {
    position: relative;
    text-align: center;
    color: white;
    margin-right: 15px;
}

a:hover {
    color: black;
}

#header-image {
    width: 140px;
    height: 140px;
}

/*Introduction*/
#introduction {
    position: relative;
    top: 100px;
    padding: 50px;
    text-align: center;
    background-color: whitesmoke;
    font-size: 28px;
    height: auto;
}

/*Major Content*/
#middle-text {
    margin-left: auto;
    margin-right: auto;
    min-width: 300px;
    max-width: 700px;
    font-size: 30px;
    text-align: center;
}
.header {
    font-size: 40px;
    font-weight: bold;
}

#left-content-2 {
    position: relative;
    padding-top: 80px;
}

#left-content-2 p, h2{
    width: 560px;
    text-align: justify;
}
#left-content-2 p, #left-content h2 {
    text-align: justify;
}

#left-img{
    position: relative;
    right: 600px;
    bottom: 345px;
}

#right-content{
    position: relative;
    top: 300px;
    padding-left: 590px;
    padding-top: 50px
}

#right-content p, h2{
    width: 480px;
    text-align: justify;
}

#right-img{
    position: relative;
    left: 600px;
    bottom: 370px;
}

/*Footer Section */
footer, footer i {
    background-color: #3e3e3e;
    position: relative;
    text-align: center;
    padding: 10px;
    font-size: 36px;
}
footer div {
    color: white;
    text-align: center;
    font-size: 26px;
}

.fa {
    color: white;
    padding: 10px;
    margin: 5px;
}

.promo {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    opacity: 0;
}

.promo-fadein {
    animation: fadeInPromo 1s ease-out forwards;
    animation-fill-mode: forwards;

    /* Safari and Chrome */
    -webkit-animation: fadeInPromo 1s;
    -webkit-animation-fill-mode: forwards;
}

.promo-fadeout {
    animation: fadeoutPromo 1s ease-out forwards;
    animation-fill-mode: forwards;

    /* Safari and Chrome */
    -webkit-animation: fadeoutPromo 1s;
    -webkit-animation-fill-mode: forwards;
}

@keyframes fadeInPromo {
    from { transform: translateY(-100px); opacity: 0; }
    to { transform: translateY(0px); opacity: 1; }
}

@keyframes fadeoutPromo {
    from { transform: translateY(0px); opacity: 1; }
    to { transform: translateY(-100px); opacity: 0; }
}

.intro {
    opacity: 0;
}

.left-nut, .right-nut {
    opacity: 0;
}


.left-content-anim {
    animation: leftIntroAnim 1s ease-out forwards;
    animation-fill-mode: forwards;

    /* Safari and Chrome */
    -webkit-animation: leftIntroAnim 1s;
    -webkit-animation-fill-mode: forwards;
}

@keyframes leftIntroAnim {
    from { transform: translateX(500px); opacity: 0; }
    to { transform: translateX(0px); opacity: 1; }
}

.right-content-anim {
    animation: rightIntroAnim 1s ease-out forwards;
    animation-fill-mode: forwards;

    /* Safari and Chrome */
    -webkit-animation: rightIntroAnim 1s;
    -webkit-animation-fill-mode: forwards;
}

@keyframes rightIntroAnim {
    from { transform: translateX(-500px); opacity: 0; }
    to { transform: translateX(0px); opacity: 1; }
}

/*Smooth Scrolling*/
html {
    scroll-behavior: smooth;
}
