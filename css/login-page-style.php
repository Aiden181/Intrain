<?php
    header("Content-type: text/css");
?>

body{
    background-image: url(../images/Login-Page-Wallpaper.jpg);
    background-repeat: no-repeat;
    background-size: 120%;
    
}

.container-sm{
    border: solid 1px;
    background: #fff;
    position: relative;
    top: 150px;
}

.container-sm h1{
    text-align: center;
    padding-bottom: 10px;
}

.container-sm #log-in-btn{
    background-color:black;
    color: white;
    width: 210px;
}

#go-back-btn{
    border: none;
    padding: 0;
    background: none;
}

#login-form{
    width: 500px;
    height: 280px;
    margin: 65px auto;
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 20px;
    border-radius: 10px 10px 10px 10px;
}

#login-form i{
    position: absolute;
    right: 430px;
    top: 30px;
    color: black;
}