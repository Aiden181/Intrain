<?php
$host='localhost';
$username ='root';
$passwd ='';
$dbname ='customer';
$port="3306";
$connect = new mysqli('localhost', $username, $passwd, $dbname);
if(isset($_POST["name"], $_POST["email"],$_POST["password"])) 
{

 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $password = mysqli_real_escape_string($connect, $_POST["password"]);
 
 $query = "INSERT INTO customer_data( name, email, password) VALUES( '$name', '$email', '$password' )";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}

?>