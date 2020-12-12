
-- add another root admin without id
INSERT INTO `admin`
(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`, `flag`) VALUES 
('lastroot', 'firstroot', 'root@root.com', '0907654321','root2', '12345', 'z');

-- add another custoemr admin without id
INSERT INTO `customer`(`last_name`, `first_name`, `email`, `phone_number`, `username`, `password`) 
VALUES ('john', 'doe', 'john.doe@gmail.com', '0901234567','user2', '12345');
