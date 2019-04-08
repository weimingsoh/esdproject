CREATE DATABASE IF NOT EXISTS `pshift` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pshift`;

DROP TABLE IF EXISTS `pshift`;
CREATE TABLE `pshift` (
  `shift_id` INT(11) NOT NULL auto_increment,
  `employee_id` INT(11),
  `Period` varchar(10) NOT NULL,
  `PDay` varchar(10) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  CONSTRAINT pshift_pk PRIMARY KEY (shift_id)
);

INSERT INTO `pshift` (`employee_id`, `Period`, `PDay`, `Timing`,`Status`) VALUES
(6, 20190101, 'Tuesday', 'Morning','PENDING'),
(6, 20190101, 'Wednesday', 'Afternoon','PENDING'),
(7, 20190101, 'Wednesday', 'Afternoon','PENDING'),
(7, 20190101, 'Friday', 'Night','PENDING');
