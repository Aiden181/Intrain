
-- CREATE DATABASE IF NOT EXISTS `intrain_test`;
-- USE `intrain_test`;

DROP TABLE IF EXISTS `customer`;
DROP TABLE IF EXISTS `admin`;

-- id : customer id
-- last_name : customer last name
-- first_name : customer first name
-- email : customer email
-- phone_number : customer phone number
-- username : customer username
-- password : customer password
CREATE TABLE IF NOT EXISTS `customer` (
    `id` INT(11) NOT NULL,
    `last_name` VARCHAR(64) NOT NULL,
    `first_name` VARCHAR(64) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `phone_number` VARCHAR(32) NOT NULL,
    `username` VARCHAR(32) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

-- id : admin id
-- last_name : admin last name
-- first_name : admin first name
-- email : admin email
-- phone_number : admin phone number
-- username : admin username
-- password : admin password
-- flag: admin flag (e.g. z = root power, a = create, b = read, c = update, etc...)
CREATE TABLE IF NOT EXISTS `admin` (
    `id` INT(11) NOT NULL,
    `last_name` VARCHAR(64) NOT NULL,
    `first_name` VARCHAR(64) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `phone_number` VARCHAR(32) NOT NULL,
    `username` VARCHAR(32) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `flag` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id`)
);

-- add root admin
INSERT INTO `admin`
(`id`, `last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) VALUES 
(1, 'lastroot', 'firstroot', 'root@root.com', '0907654321','root1', '12345', 'z');

-- add customer
INSERT INTO `customer`(`id`, `last_name`, `first_name`, `email`, `phone_number`, `username`, `password`) 
VALUES (1, 'john', 'doe', 'john.doe@gmail.com', '0901234567','user1', '12345');

-- alter table to auto increment
ALTER TABLE `customer` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- alter table to auto increment
ALTER TABLE `admin` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

