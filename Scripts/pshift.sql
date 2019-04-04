CREATE DATABASE IF NOT EXISTS `pshift` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pshift`;

DROP TABLE IF EXISTS `pshift`;
CREATE TABLE `pshift` (
  `ID` INT(11) NOT NULL auto_increment,
  `EmployeeID` INT(11),
  `Period` varchar(10) NOT NULL,
  `PDay` varchar(10) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  CONSTRAINT pshift_pk PRIMARY KEY (ID)
);

INSERT INTO `pshift` (`EmployeeID`, `Period`, `PDay`, `Timing`,`Status`) VALUES
(2, 20190101, 'Tuesday', 'Morning','PENDING'),
(2, 20190101, 'Wednesday', 'Afternoon','PENDING'),
(3, 20190101, 'Wednesday', 'Afternoon','PENDING'),
(3, 20190101, 'Friday', 'Night','PENDING');
