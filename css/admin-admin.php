<?php
    header("Content-type: text/css");
?>

/* footer spacing */
footer {
    margin-top: 300px;
}

.column {
  float: left;
}

.left {
  width: 25%;
}

.right {
  width: 75%;
}

#table-headers th {
    background-color: #565656;
    color: white;
    font-weight: bold;
}

/* Admin Page Menu */

#admin-page-menu {
    font-size: 18px;
    width: 90%;
}
#admin-page-menu ul {
    padding: 0 0px;
    list-style: none;
}
#admin-page-menu ul li {
    text-align: left;
}
#admin-page-menu ul .active {
    font-weight: bold;
}
#admin-page-menu ul li a {
    display: block;
    text-decoration: none;
    background-color: #4f463e;
    color: white;
    padding: 9px 0px 9px 12px;
}
#admin-page-menu ul li a .tab-img {
    vertical-align: baseline;
    border: none;
}
#admin-page-menu ul li a:hover {
    color: white;
    background-color: #3d3631;
    border: 0;
    padding: 9px 0px 9px 12px;
}
#admin-page-menu ul li.active a:hover {
    color: white;
    background-color: #3d3631;
    border: 0;
    padding: 9px 0px 9px 12px;
}
#admin-page-menu ul li.active {}

/* ********************************** */
/* * Admin list admin accounts page * */
/* ********************************** */
.section-header {
    width: 100%;
    background-color: #565656;
    border: 2px solid white;
}

.info-row, .info-row td {
    font-size: 16px;
    color: white;
}
.info-row:hover {
    color:white;
    cursor: pointer;
}

.advanced-search {
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    background-color: rgba(0,0,0,0.4);
    text-align: center;
    cursor: pointer;
}

.advanced-search:hover {
}

.advanced-search th {
    padding: 10px 10px 6px 10px;
    text-align: center;
    color: white;
    font-size: 
    font-weight: bold;
    text-transform: uppercase;
}

.search-checkbox {
    position: relative;
    top: 10px;
}

.search-input {
    float: left;
    font-size: 16px;
    height: 95%;
    width: 130%;
    padding: 5px 10px 5px 10px;
    border: 0px solid;
    border-radius: 5px;
}

.search-btn {
    background-color: green;
    color: white;
    width: 100%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 0px solid;
    border-radius: 5px;
    position: relative;
    right: 10px;
}

.search-form {
    position: relative;
    left: 10px;
    font-size: 18px;
    display: none;
    opacity: 0;
    z-index: 1;
}

/* animated drop down for search form */
.hideform {
    display: none;
    animation-name: hide-form;
    animation-duration: 200ms;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
}

.showform {
    display: block;
    animation-name: show-form;
    animation-duration: 200ms;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
}

@keyframes hide-form {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

@keyframes show-form {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
/* end of animated drop down code */
/* ***************************************** */
/* * End of admin list admin accounts page * */
/* ***************************************** */


/* ***************************** */
/* * Admin create account page * */
/* ***************************** */
#sign-up-btn {
    background-color: green;
    color: white;
    width: 210px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

#signup-form {
    color: white;
    margin-left: 15px;
    align-items: center;
    flex-direction: column;
}

/* Permissions */
.tablerow {
    color: white;
    padding: 6px;
}
.tablerow-root {
    color: white;
    background-color: rgb(255, 75, 75);
    border-color: #3e3e3e;
    border-style: solid;
    border-width: 3px;
    padding: 6px;
}
.tableheader {
    background-color: #736B63;
    border-color: #3e3e3e;
    border-style: solid;
    border-width: 3px;
    padding: 6px;
    color: #fff;
}
/* ************************************ */
/* * End of admin create account page * */
/* ************************************ */


/* *********************************** */
/* * Admin edit account details page * */
/* *********************************** */
#admin-panel-button {
    float: right;
    display: inline;
    position: relative;
    bottom: 29px;
    right: 165px;
    font-size: 18px;
    color: white;
    text-align: center;
    background-color: orangered;
    border: none;
    border-radius: 4px;
    padding-left: 20px;
    padding-right: 20px;
    text-decoration: none;
}

.delete-user-button {
    color: white;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    background-color: rgba(255,25,25);
    border: none;
    border-radius: 4px;
    padding: 10px;
    padding-left: 15px;
    padding-right: 15px;
    text-decoration: none;
}
/* ****************************************** */
/* * End of admin edit account details page * */
/* ****************************************** */


/* *********************************** */
/* * Admin edit account details page * */
/* *********************************** */
.delete-button {
  display: none;
  opacity: 0;
  width: 100%;
  overflow: auto;
  z-index: 1;
}
#dropdown:hover {
  cursor: pointer;
}
.show {
    display: block;
    opacity: 1;
}
/* ****************************************** */
/* * End of admin edit account details page * */
/* ****************************************** */
