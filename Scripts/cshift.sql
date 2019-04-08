CREATE DATABASE IF NOT EXISTS `cshift` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cshift`;

DROP TABLE IF EXISTS `cshift`;
CREATE TABLE `cshift` (
  `shift_id` INT(11) NOT NULL auto_increment,
  `employee_id` INT(11),
  `Period` varchar(10) NOT NULL,
  `PDay` varchar(10) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  CONSTRAINT cshift_pk PRIMARY KEY (shift_id)
);

INSERT INTO `Cshift` (`employee_id`, `Period`, `PDay`, `Timing`) VALUES
(2, 20180101, 'Tuesday', 'Morning'),
(2, 20180101, 'Friday', 'Morning'),
(3, 20180101, 'Wednesday', 'Night'),
(3, 20180101, 'Tuesday', 'Night'),
(4, 20180101, 'Tuesday', 'Afternoon'),
(4, 20180101, 'Wednesday', 'Night');
