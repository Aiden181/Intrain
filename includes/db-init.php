<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "intrain";

$temp = new PDO("mysql:host=localhost;port=3306;", $user, $pass);

if (!$stmt = $temp->prepare("CREATE DATABASE IF NOT EXISTS intrain CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
	prePrintArray($temp->errorInfo());
}
if (!$stmt->execute()) {
	echo "\nCREATE DATABASE PDO::errorInfo():\n";
	prePrintArray($stmt->errorInfo());
}

$temp = null;

$db = new Database($host, $user, $pass, $dbname);


// drop table query for testing
// $db->query("DROP TABLE IF EXISTS admin");
// $db->query("DROP TABLE IF EXISTS customer");

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
    `id` int NOT NULL AUTO_INCREMENT,
    `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone_number` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
    `video` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
   ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$db->query($sql);

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
    `id` int NOT NULL AUTO_INCREMENT,
    `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone_number` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
    `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `flag` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
   ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$db->query($sql);


// automatically add root admin
$rootpasswd = password_hash("1ntrainr00t!", PASSWORD_DEFAULT);
$sql = "INSERT INTO `admin`(`id`, `last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) VALUES (1, '', '', '', '','root', ?, 'z') ON DUPLICATE KEY UPDATE username=username;";
$db->query($sql, $rootpasswd);

// add a user for debug
$passwd = password_hash("12345", PASSWORD_DEFAULT);
$sql = "INSERT INTO `customer`(`id`, `last_name`, `first_name`, `email`, `phone_number`, `video`, `username`, `password`) VALUES (1, 'doe', 'john', 'john.doe@ahamail.com', '0901234567', '','user1', ?) ON DUPLICATE KEY UPDATE username=username;";
$db->query($sql, $passwd);

$sql = "ALTER TABLE `customer` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
$db->query($sql);

$sql = "ALTER TABLE `admin` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
$db->query($sql);


// add admins with other flags for debug
$sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) 
VALUES ('last', 'first', 'email@mail.com', '0900000000','admin_db', ?, 'x') ON DUPLICATE KEY UPDATE username=username;";
$passwd = password_hash("12345", PASSWORD_DEFAULT);
$db->query($sql, $passwd);
$sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) 
VALUES ('last', 'first', 'email@mail.com', '0900000000','admin_ccust', ?, 'abcd') ON DUPLICATE KEY UPDATE username=username;";
$passwd = password_hash("12345", PASSWORD_DEFAULT);
$db->query($sql, $passwd);
$sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) 
VALUES ('last', 'first', 'email@mail.com', '0900000000','admin_cadmin', ?, 'efgh') ON DUPLICATE KEY UPDATE username=username;";
$passwd = password_hash("12345", PASSWORD_DEFAULT);
$db->query($sql, $passwd);
$sql = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) 
VALUES ('last', 'first', 'email@mail.com', '0900000000','admin_custom1', ?, 'abcefg') ON DUPLICATE KEY UPDATE username=username;";
$passwd = password_hash("12345", PASSWORD_DEFAULT);
$db->query($sql, $passwd);
?>
