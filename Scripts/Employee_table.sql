-- schema for employee
CREATE DATABASE IF NOT EXISTS `employee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `employee`;

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `ID` INT(11) NOT NULL auto_increment,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Phone` INT(8) NOT NULL,
  `Sex` varchar(45) NOT NULL,
  `Nationality` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  CONSTRAINT employee_PK PRIMARY KEY (ID)
);

INSERT INTO `employee` (`Name`, `Address`, `Phone`, `Sex`, `Nationality`,`Email`) VALUES
('Soh Wei Ming', 'Blk 523 Abc Road S987935', 91234562, 'Male', 'Singaporean','sohweiming@tmail.com'),
('Calvin Tan', 'Blk 674 Glen Falls Road S545675', 81234563, 'Male', 'Singaporean','calvintan@tmail.com'),
('Jane Lim', 'Blk 4604 Walnut Hill Drive S785467', 92234562, 'Female', 'Singaporean','janeline@tmail.com'),
('Ng Jun Hong', 'Blk 377 Lords Way S908787', 93234562, 'Male', 'Singaporean','ngjunhong.tmail.com'),
('Lee Cheng Leng', 'Blk 1977 Drummond Street S467873', 94234547, 'Female','Singaporean','leechengleng@tmail.com'),
('Jazreel Tho', 'Blk 234 Clarence Court S908768', 95234557, 'Female','Singaporean','jazreeltho@tmail.com'),
('Hong Seng', 'Blk 613 Stark Hollow Road S102345', 96234517, 'Male','Singaporean','hongseng@tmail.com');