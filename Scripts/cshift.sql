CREATE DATABASE IF NOT EXISTS `cshift` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cshift`;

CREATE TABLE `cshift` (
  `shift_id` INT(11) NOT NULL auto_increment,
  `employee_id` INT(11),
  `Period` varchar(10) NOT NULL,
  `PDay` varchar(10) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  CONSTRAINT pshift_pk PRIMARY KEY (shift_id)
);