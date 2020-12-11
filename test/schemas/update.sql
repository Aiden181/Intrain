UPDATE `admin` SET 
`last_name`='lastrootupdate', 
`first_name`='firstrootupdate', 
`email`='root@update.com', 
`phone_number`='0907654369', 
`username`='rootupdate', 
`password`=PASSWORD('1ntrainr00t!update'), 
`flag`='abcdefgh' 
WHERE `id`=2;

UPDATE `customer` SET 
`last_name`='johnupdate', 
`first_name`='doeupdate', 
`email`='john.doe@update.com', 
`phone_number`='0901234569', 
`username`='user1update', 
`password`=PASSWORD('12345update') 
WHERE `id`=2;
