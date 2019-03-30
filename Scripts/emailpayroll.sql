-- create schema for schedule

CREATE DATABASE IF NOT EXISTS `emailpayroll` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `emailpayroll`;

DROP TABLE IF EXISTS `emailpayroll`;
CREATE TABLE `emailpayroll` (
  `ID` INT(11) NOT NULL auto_increment,
  `Name` INT(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `period` varchar(45) NOT NULL,
  CONSTRAINT emailpayroll_ID PRIMARY KEY (ID)
);
