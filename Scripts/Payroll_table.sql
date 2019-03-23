-- create schema for payroll

CREATE DATABASE IF NOT EXISTS `payroll` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `payroll`;

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE `payroll` (
  `ID` INT(11) NOT NULL auto_increment,
  `EmployeeID` INT(11) NOT NULL,
  `Period` varchar(10) NOT NULL,
  `Hours` float NOT NULL,
  `Wages` float NOT NULL,
  `Incentive` float NOT NULL,
  CONSTRAINT payroll_PK PRIMARY KEY (ID)
);

INSERT INTO `payroll` (`EmployeeID`, `Period`, `Hours`, `Wages`, `Incentive`) VALUES
(1, '20190101','3', '8.5','0'),
(2, '20190101','9', '8','0'),
(3, '20190101','15', '7.5','0'),
(4, '20190101', '6', '7.5','0'),
(5, '20190101', '9', '8','0'),
(6, '20190101', '9', '7.5','0'),
(7, '20190101', '9', '7.5','0'),
(1, '20190102', '12', '8.5','0'),
(2, '20190102', '9', '8','0'),
(4, '20190102', '9', '7.5','0'),
(5, '20190102', '6', '7.5','0'),
(6, '20190102', '3', '7.5','0'),
(7, '20190102', '3', '7.5','0');