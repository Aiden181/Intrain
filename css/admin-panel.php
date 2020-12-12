<?php
    header("Content-type: text/css");
?>

table {
    border-collapse: collapse;
    color: white;
    background-color: #3e3e3e;
}
tr:first-child {
    background-color:#565656;
}
th, td {
    max-width: 50px;
}
th {
    text-transform: uppercase;
    text-align: center;
    padding: 15px;
    background-color:#565656;
    border-right: solid 10px #3e3e3e;
}
th:nth-child(3) {
    border-right: none;
}
tr:nth-child(3), tr:nth-child(4) {
    border: none;
    background-color: white;
}
td {
    padding-left: 9px;
    padding-top: 5px;
}
tr > td {
    padding-bottom: 25px;
}
#pencil-edit-icon {
    display: inline;
    font-size: 30px;
    position: relative;
    top: 15px;
    right: 50px;
}
#account-icon, #customer-icon, #admin-icon {
    font-size: 90px;
    position: relative;
    left: 40px;
}
#customer-icon {
    color: greenyellow;
}
#admin-icon {
    color: cyan;
}

#database-icon {
    font-size: 80px;
    color: white;
}

/* footer spacing */
footer {
    margin-top: 300px;
}
