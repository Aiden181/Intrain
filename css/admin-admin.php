<?php
    header("Content-type: text/css");
?>

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

/* ********************* */
/* * Admin create page * */
/* ********************* */
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
/* **************************** */
/* * End of admin create page * */
/* **************************** */