<?php
    header("Content-type: text/css");
?>

body {
    background-image: url(../images/Login-Page-Wallpaper.jpg);
    background-repeat: no-repeat;
    background-size: 120%;
}

.container-sm {
    border: solid 1px;
    background: #fff;
    position: relative;
    top: 150px;
}

.container-sm h1 {
    text-align: center;
    padding-bottom: 10px;
}

.container-sm #log-in-btn {
    background-color:black;
    color: white;
    width: 210px;
}

#login-form {
    width: 500px;
    margin: 65px auto;
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 20px;
    border-radius: 10px 10px 10px 10px;
}

#login-form i {
    font-size: 32px;
    position: absolute;
    right: 430px;
    top: 30px;
    color: black;
}

#go-back-btn {
    border: none;
    padding: 0;
    background: none;
}

#error-message {
  margin-top: 10px;
  margin-bottom: 5px;
  text-align: center;
  color: red;
}

/* ---------- */
/* ANIMATIONS */
/* ---------- */
/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.2s;
  -moz-animation-delay: 0.2s;
  animation-delay: 0.2s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}
/* ----------------- */
/* END OF ANIMATIONS */
/* ----------------- */
