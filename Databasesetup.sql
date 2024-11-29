-- Create the database
CREATE DATABASE IF NOT EXISTS `UofUAthletics` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `UofUAthletics`;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS `Event`;
DROP TABLE IF EXISTS `Team`;
DROP TABLE IF EXISTS `Employee`;
DROP TABLE IF EXISTS `Equipment`;
DROP TABLE IF EXISTS `Rank`;
DROP TABLE IF EXISTS `Athlete`;
DROP TABLE IF EXISTS `Scholarship`;
DROP TABLE IF EXISTS `Income`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `roles`;

-- Create the tables
CREATE TABLE IF NOT EXISTS `Event` (
  `EventId` INT PRIMARY KEY AUTO_INCREMENT,
  `EventName` VARCHAR(100),
  `TeamId` INT,
  `Venue` VARCHAR(100),
  `Date` DATE,
  `Income` DECIMAL(10,2),
  `Expenses` DECIMAL(10,2),
  `Opponent` VARCHAR(100),
  FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);

CREATE TABLE IF NOT EXISTS `Team` (
  `TeamId` INT PRIMARY KEY AUTO_INCREMENT,
  `Type` VARCHAR(50),
  `Email` VARCHAR(100),
  `EstablishedDate` DATE
);

CREATE TABLE IF NOT EXISTS `Employee` (
  `EmployeeId` INT PRIMARY KEY AUTO_INCREMENT,
  `LastName` VARCHAR(50),
  `FirstName` VARCHAR(50),
  `Title` VARCHAR(50),
  `Address` VARCHAR(200),
  `StartDate` DATE,
  `EndDate` DATE,
  `Type` VARCHAR(10), -- 'salary' or 'hourly'
  `Cost` DECIMAL(10,2),
  `TeamId` INT,
  FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);

CREATE TABLE IF NOT EXISTS `Equipment` (
  `EquipmentId` INT PRIMARY KEY AUTO_INCREMENT,
  `TeamId` INT,
  `Type` VARCHAR(50),
  `AnnualCost` DECIMAL(10,2),
  `Year` INT,
  FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);

CREATE TABLE IF NOT EXISTS `Ranks` (
  `RankId` INT PRIMARY KEY AUTO_INCREMENT,
  `TeamId` INT,
  `RankNumber` INT,
  `RankDate` DATE,
  FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);

CREATE TABLE IF NOT EXISTS `Athlete` (
  `AthleteId` INT PRIMARY KEY AUTO_INCREMENT,
  `LastName` VARCHAR(50),
  `FirstName` VARCHAR(50),
  `Position` VARCHAR(50),
  `AcademicLevel` VARCHAR(50),
  `Contact` VARCHAR(20),
  `TeamId` INT,
  FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);

CREATE TABLE IF NOT EXISTS `Scholarship` (
  `ScholarshipId` INT PRIMARY KEY AUTO_INCREMENT,
  `AthleteId` INT,
  `Amount` DECIMAL(10,2),
  `Date` DATE,
  `Donor` VARCHAR(100),
  `Type` VARCHAR(50),
  `TeamId` INT,
  FOREIGN KEY (`AthleteId`) REFERENCES `Athlete`(`AthleteId`),
  FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);

CREATE TABLE IF NOT EXISTS `users` (
    `userId` INT AUTO_INCREMENT PRIMARY KEY,
    `forename` varchar(128) NOT NULL,
    `surname` varchar(128) NOT NULL,
    `username` varchar(128) NOT NULL,
    `password` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE `Income` (
    `IncomeId` INT PRIMARY KEY AUTO_INCREMENT,
    `TeamId` INT,
    `Type` VARCHAR(50),
    `Amount` DECIMAL(10,2),
    `Year` YEAR,
    FOREIGN KEY (`TeamId`) REFERENCES `Team`(`TeamId`)
);
