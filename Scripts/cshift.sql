CREATE DATABASE IF NOT EXISTS `cshift` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cshift`;

DROP TABLE IF EXISTS `cshift`;
CREATE TABLE `cshift` (
  `ID` INT(11) NOT NULL auto_increment,
  `EmployeeID` INT(11),
  `Date` varchar(10) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  CONSTRAINT cshift_pk PRIMARY KEY (ID)
);