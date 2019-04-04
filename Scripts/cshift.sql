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

INSERT INTO `Cshift` (`EmployeeID`, `Period`, `PDay`, `Timing`,`Status`) VALUES
(2, 20180101, 'Tuesday', 'Morning','CONFIRMED'),
(2, 20180101, 'Friday', 'Morning','CONFIRMED'),
(3, 20180101, 'Wednesday', 'Night','CONFIRMED'),
(3, 20180101, 'Tuesday', 'Night','CONFIRMED'),
(4, 20180101, 'Tuesday', 'Afternoon','CONFIRMED'),
(4, 20180101, 'Wednesday', 'Night','CONFIRMED');
