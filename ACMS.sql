-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2024 at 02:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ACMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cafeterias`
--

CREATE TABLE `Cafeterias` (
  `cafeteriaID` int(11) NOT NULL,
  `cafeteriaName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ingredients`
--

CREATE TABLE `Ingredients` (
  `ingredID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MealIngredients`
--

CREATE TABLE `MealIngredients` (
  `mealID` int(11) NOT NULL,
  `ingredID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MealOrder`
--

CREATE TABLE `MealOrder` (
  `mealID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Meals`
--

CREATE TABLE `Meals` (
  `mealID` int(11) NOT NULL,
  `mealStatus` enum('AVAILABLE','UNAVAILABLE') DEFAULT NULL,
  `timeframe` enum('BREAKFAST','LUNCH','DINNER') DEFAULT NULL,
  `cafeteriaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `notificationID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` enum('READY','CANCELLED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `mealID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `OrderPayment`
--

CREATE TABLE `OrderPayment` (
  `orderID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` enum('READY','COOKING','CANCELLED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `method` enum('CASH','MOMO/BANK TRANSFER','MEAL PLAN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `roleID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UserNotification`
--

CREATE TABLE `UserNotification` (
  `userID` int(11) NOT NULL,
  `notificationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UserReviews`
--

CREATE TABLE `UserReviews` (
  `userID` int(11) NOT NULL,
  `reviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNo` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `preferences` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cafeterias`
--
ALTER TABLE `Cafeterias`
  ADD PRIMARY KEY (`cafeteriaID`);

--
-- Indexes for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD PRIMARY KEY (`ingredID`);

--
-- Indexes for table `MealIngredients`
--
ALTER TABLE `MealIngredients`
  ADD PRIMARY KEY (`mealID`,`ingredID`),
  ADD KEY `ingredID` (`ingredID`);

--
-- Indexes for table `MealOrder`
--
ALTER TABLE `MealOrder`
  ADD PRIMARY KEY (`mealID`,`orderID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `Meals`
--
ALTER TABLE `Meals`
  ADD PRIMARY KEY (`mealID`),
  ADD KEY `cafeteriaID` (`cafeteriaID`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`mealID`,`orderID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `OrderPayment`
--
ALTER TABLE `OrderPayment`
  ADD PRIMARY KEY (`orderID`,`paymentID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `UserNotification`
--
ALTER TABLE `UserNotification`
  ADD PRIMARY KEY (`userID`,`notificationID`),
  ADD KEY `notificationID` (`notificationID`);

--
-- Indexes for table `UserReviews`
--
ALTER TABLE `UserReviews`
  ADD PRIMARY KEY (`userID`,`reviewID`),
  ADD KEY `reviewID` (`reviewID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cafeterias`
--
ALTER TABLE `Cafeterias`
  MODIFY `cafeteriaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `MealIngredients`
--
ALTER TABLE `MealIngredients`
  ADD CONSTRAINT `mealingredients_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `Meals` (`mealID`),
  ADD CONSTRAINT `mealingredients_ibfk_2` FOREIGN KEY (`ingredID`) REFERENCES `Ingredients` (`ingredID`);

--
-- Constraints for table `MealOrder`
--
ALTER TABLE `MealOrder`
  ADD CONSTRAINT `mealorder_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `Meals` (`mealID`),
  ADD CONSTRAINT `mealorder_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `Orders` (`orderID`);

--
-- Constraints for table `Meals`
--
ALTER TABLE `Meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `Cafeterias` (`cafeteriaID`);

--
-- Constraints for table `Notification`
--
ALTER TABLE `Notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `Meals` (`mealID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `Orders` (`orderID`);

--
-- Constraints for table `OrderPayment`
--
ALTER TABLE `OrderPayment`
  ADD CONSTRAINT `orderpayment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `Orders` (`orderID`),
  ADD CONSTRAINT `orderpayment_ibfk_2` FOREIGN KEY (`paymentID`) REFERENCES `Payment` (`paymentID`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `UserNotification`
--
ALTER TABLE `UserNotification`
  ADD CONSTRAINT `usernotification_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`),
  ADD CONSTRAINT `usernotification_ibfk_2` FOREIGN KEY (`notificationID`) REFERENCES `Notification` (`notificationID`);

--
-- Constraints for table `UserReviews`
--
ALTER TABLE `UserReviews`
  ADD CONSTRAINT `userreviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`),
  ADD CONSTRAINT `userreviews_ibfk_2` FOREIGN KEY (`reviewID`) REFERENCES `Reviews` (`reviewID`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `Roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
