<?php
$host = "localhost";
$port = "3306";
$username = "root";
$db = "intrain";

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
// $conn->query("DROP TABLE IF EXISTS `customer`");
// $conn->query("DROP TABLE IF EXISTS `admin`");

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
$sql = "CREATE TABLE IF NOT EXISTS `customer` (
    `id` INT(11) NOT NULL auto_increment,
    `last_name` VARCHAR(64) NOT NULL,
    `first_name` VARCHAR(64) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `phone_number` VARCHAR(32) NOT NULL,
    `username` VARCHAR(32) NOT NULL UNIQUE,
    `password` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
)";
$conn->query($sql);

// --------------------------------- //
// ----- create admin table -------- //
// --------------------------------- //
// id : admin id
// last_name : admin last name
// first_name : admin first name
// email : admin email
// phone_number : admin phone number
// username : admin username
// password : admin password
// flag: admin flag (e.g. z = root power, a = create, b = read, c = update, etc...)
$sql = "CREATE TABLE IF NOT EXISTS `admin` (
    `id` INT(11) NOT NULL auto_increment,
    `last_name` VARCHAR(64) NOT NULL,
    `first_name` VARCHAR(64) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `phone_number` VARCHAR(32) NOT NULL,
    `username` VARCHAR(32) NOT NULL UNIQUE,
    `password` VARCHAR(128) NOT NULL,
    `flag` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id`)
)";
$conn->query($sql);


// automatically add root admin
$sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`) VALUES ('','', '', '','root', PASSWORD('1ntrainr00t!'))";
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
