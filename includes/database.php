<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "";
$db = "InTrain";

// Create connection
$conn = mysqli_connect($host, $username, $password, $db, $port);

// Check connection
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}
// else {
//     echo "<p>Connected successfully</p>";
// }

// drop table query for testing
// $conn->query("DROP TABLE IF EXISTS customer");

// --------------------------------- //
// ----- create customer table ----- //
// --------------------------------- //
// id : customer id
// last_name : customer last name
// first_name : customer first name
// email : customer email
// phone_number : customer phone number
// username : customer username
// password : customer password
$sql = "CREATE TABLE IF NOT EXISTS customer (
    id VARCHAR(20) NOT NULL PRIMARY KEY,
    last_name VARCHAR(128) NOT NULL,
    first_name VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    phone_number VARCHAR(128) NOT NULL,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL
)";
$conn->query($sql);

// if (isset($_POST["name"], $_POST["email"], $_POST["password"])) {

//     $name = mysqli_real_escape_string($connect, $_POST["name"]);
//     $email = mysqli_real_escape_string($connect, $_POST["email"]);
//     $password = mysqli_real_escape_string($connect, $_POST["password"]);

//     $query = "INSERT INTO customer_data(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
//     if (mysqli_query($connect, $query)) {
//         echo 'Data Inserted';
//     }
// }
?>
