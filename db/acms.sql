-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2024 at 06:20 AM
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
-- Table structure for table `CafeteriaRatings`
--

CREATE TABLE `CafeteriaRatings` (
  `ratingID` int(11) NOT NULL,
  `ratingValue` int(11) NOT NULL,
  `cafeteriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CafeteriaRatings`
--

INSERT INTO `CafeteriaRatings` (`ratingID`, `ratingValue`, `cafeteriaID`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `CafeteriaReviews`
--

CREATE TABLE `CafeteriaReviews` (
  `ratingID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `cafeteriaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CafeteriaReviews`
--

INSERT INTO `CafeteriaReviews` (`ratingID`, `rating`, `feedback`, `cafeteriaID`, `userID`, `dateTime`) VALUES
(10, 5, 'good', 1, 2, '2024-07-09 22:38:15'),
(11, 5, 'good', 1, 2, '2024-07-02 22:38:27'),
(12, 3, 'good', 1, 2, '0000-00-00 00:00:00'),
(13, 1, 'good', 2, 2, '0000-00-00 00:00:00'),
(15, 3, 'good', 1, 2, '0000-00-00 00:00:00');

--
-- Triggers `CafeteriaReviews`
--
DELIMITER $$
CREATE TRIGGER `updateCafeteriaRatings` AFTER INSERT ON `CafeteriaReviews` FOR EACH ROW BEGIN
    DECLARE avg_rating DECIMAL(3, 2);

    -- Calculate the average rating for the cafeteria
    SELECT AVG(rating) INTO avg_rating
    FROM CafeteriaReviews
    WHERE cafeteriaID = NEW.cafeteriaID;

    -- Update or insert the average rating in the CafeteriaRatings table
    INSERT INTO CafeteriaRatings (ratingID, ratingValue, cafeteriaID)
    VALUES (NULL, avg_rating, NEW.cafeteriaID)
    ON DUPLICATE KEY UPDATE ratingValue = avg_rating;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Cafeterias`
--

CREATE TABLE `Cafeterias` (
  `cafeteriaID` int(11) NOT NULL,
  `cafeteriaName` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `cafeteriaImage` blob NOT NULL,
  `openingTime` time NOT NULL,
  `closingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Cafeterias`
--

INSERT INTO `Cafeterias` (`cafeteriaID`, `cafeteriaName`, `description`, `cafeteriaImage`, `openingTime`, `closingTime`) VALUES
(1, 'Main Cafeteria', 'The main dining hall offering a variety of meals.', '', '00:00:00', '00:00:00'),
(2, 'East Wing Cafeteria', 'Located in the east wing, known for its healthy options.', '', '00:00:00', '00:00:00'),
(3, 'West Wing Cafeteria', 'Located in the west wing, famous for its fast food.', '', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Ingredients`
--

CREATE TABLE `Ingredients` (
  `ingredID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ingredients`
--

INSERT INTO `Ingredients` (`ingredID`, `name`) VALUES
(1, 'Tomato'),
(2, 'Lettuce'),
(3, 'Cheese');

-- --------------------------------------------------------

--
-- Table structure for table `MealIngredients`
--

CREATE TABLE `MealIngredients` (
  `mealID` int(11) NOT NULL,
  `ingredID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MealIngredients`
--

INSERT INTO `MealIngredients` (`mealID`, `ingredID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `MealOrder`
--

CREATE TABLE `MealOrder` (
  `mealID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MealOrder`
--

INSERT INTO `MealOrder` (`mealID`, `orderID`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mealplanstatus`
--

CREATE TABLE `mealplanstatus` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mealplanstatus`
--

INSERT INTO `mealplanstatus` (`status_id`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `MealRatings`
--

CREATE TABLE `MealRatings` (
  `ratingID` int(11) NOT NULL,
  `ratingValue` int(11) NOT NULL,
  `mealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MealRatings`
--

INSERT INTO `MealRatings` (`ratingID`, `ratingValue`, `mealID`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `MealReviews`
--

CREATE TABLE `MealReviews` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `mealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MealReviews`
--

INSERT INTO `MealReviews` (`reviewID`, `userID`, `comments`, `rating`, `mealID`) VALUES
(1, 1, 'Great meal!', 5, 1),
(2, 2, 'Good service', 4, 2),
(3, 3, 'Could be better', 3, 1),
(4, 2, 'good', 5, 1),
(5, 1, 'good', 3, 1),
(6, 1, 'good', 3, 1),
(7, 1, 'good', 3, 1),
(8, 1, 'good', 2, 1);

--
-- Triggers `MealReviews`
--
DELIMITER $$
CREATE TRIGGER `updateMealRatings` AFTER INSERT ON `MealReviews` FOR EACH ROW BEGIN
    DECLARE avg_rating DECIMAL(3, 2);

    -- Calculate the average rating for the meal
    SELECT AVG(rating) INTO avg_rating
    FROM MealReviews
    WHERE mealID = NEW.mealID;

    -- Insert or update the average rating in the MealRatings table
    INSERT INTO MealRatings (mealID, ratingValue)
    VALUES (NEW.mealID, avg_rating)
    ON DUPLICATE KEY UPDATE ratingValue = avg_rating;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Meals`
--

CREATE TABLE `Meals` (
  `mealID` int(11) NOT NULL,
  `mealStatus` enum('AVAILABLE','UNAVAILABLE') DEFAULT NULL,
  `timeframe` enum('BREAKFAST','LUNCH','DINNER') DEFAULT NULL,
  `cafeteriaID` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT 'Food'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Meals`
--

INSERT INTO `Meals` (`mealID`, `mealStatus`, `timeframe`, `cafeteriaID`, `price`, `name`) VALUES
(1, 'AVAILABLE', 'BREAKFAST', 1, 0, 'Food'),
(2, 'AVAILABLE', 'LUNCH', 1, 0, 'Food'),
(3, 'AVAILABLE', 'DINNER', 1, 0, 'Food'),
(4, 'AVAILABLE', 'BREAKFAST', 2, 0, 'Food'),
(5, 'UNAVAILABLE', 'LUNCH', 2, 0, 'Food'),
(6, 'AVAILABLE', 'DINNER', 2, 0, 'Food'),
(7, 'UNAVAILABLE', 'BREAKFAST', 3, 0, 'Food'),
(8, 'AVAILABLE', 'LUNCH', 3, 0, 'Food'),
(9, 'UNAVAILABLE', 'DINNER', 3, 0, 'Food'),
(10, 'AVAILABLE', 'BREAKFAST', 1, 0, 'Food');

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

--
-- Dumping data for table `Notification`
--

INSERT INTO `Notification` (`notificationID`, `userID`, `message`, `status`) VALUES
(1, 1, 'Your order is ready', 'READY'),
(2, 2, 'Your order is cooking', 'READY'),
(3, 3, 'Your order was cancelled', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `mealID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderDetails`
--

INSERT INTO `OrderDetails` (`mealID`, `orderID`, `quantity`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `OrderPayment`
--

CREATE TABLE `OrderPayment` (
  `orderID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderPayment`
--

INSERT INTO `OrderPayment` (`orderID`, `paymentID`) VALUES
(1, 1),
(2, 2),
(3, 3);

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

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`orderID`, `userID`, `message`, `status`) VALUES
(1, 1, 'Please deliver to room 101', 'READY'),
(2, 2, 'Extra napkins please', 'COOKING'),
(3, 3, 'No onions in the salad', 'CANCELLED');

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

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`paymentID`, `userID`, `amount`, `method`) VALUES
(1, 1, 10, 'CASH'),
(2, 2, 20, 'MOMO/BANK TRANSFER'),
(3, 3, 15, 'MEAL PLAN');

-- --------------------------------------------------------

--
-- Table structure for table `Preferences`
--

CREATE TABLE `Preferences` (
  `preferencesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dietaryRestrictions` varchar(11) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `culturalRestrictions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Preferences`
--

INSERT INTO `Preferences` (`preferencesID`, `userID`, `dietaryRestrictions`, `diet`, `culturalRestrictions`) VALUES
(1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `roleID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`roleID`, `name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `UserNotification`
--

CREATE TABLE `UserNotification` (
  `userID` int(11) NOT NULL,
  `notificationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserNotification`
--

INSERT INTO `UserNotification` (`userID`, `notificationID`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `UserReviews`
--

CREATE TABLE `UserReviews` (
  `userID` int(11) NOT NULL,
  `reviewID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserReviews`
--

INSERT INTO `UserReviews` (`userID`, `reviewID`, `dateTime`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00');

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
  `roleID` int(11) DEFAULT NULL,
  `userImage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `phoneNo`, `name`, `preferences`, `password`, `roleID`, `userImage`) VALUES
(1, 'user1@example.com', '123-456-7890', 'User One', 'Vegetarian', 'password1', NULL, ''),
(2, 'user2@example.com', '234-567-8901', 'User Two', 'Vegan', 'password2', NULL, ''),
(3, 'user3@example.com', '345-678-9012', 'User Three', 'Gluten-Free', 'password3', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CafeteriaRatings`
--
ALTER TABLE `CafeteriaRatings`
  ADD PRIMARY KEY (`ratingID`),
  ADD UNIQUE KEY `cafeteriaID` (`cafeteriaID`),
  ADD KEY `cafetariaID` (`cafeteriaID`);

--
-- Indexes for table `CafeteriaReviews`
--
ALTER TABLE `CafeteriaReviews`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `caferiaID` (`cafeteriaID`),
  ADD KEY `userID` (`userID`);

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
-- Indexes for table `MealRatings`
--
ALTER TABLE `MealRatings`
  ADD PRIMARY KEY (`ratingID`),
  ADD UNIQUE KEY `mealID_2` (`mealID`),
  ADD KEY `mealID` (`mealID`);

--
-- Indexes for table `MealReviews`
--
ALTER TABLE `MealReviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `cafeteriaID` (`mealID`),
  ADD KEY `userID` (`userID`);

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
-- Indexes for table `Preferences`
--
ALTER TABLE `Preferences`
  ADD PRIMARY KEY (`preferencesID`),
  ADD KEY `preferencesID` (`preferencesID`),
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
-- AUTO_INCREMENT for table `CafeteriaRatings`
--
ALTER TABLE `CafeteriaRatings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `CafeteriaReviews`
--
ALTER TABLE `CafeteriaReviews`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Cafeterias`
--
ALTER TABLE `Cafeterias`
  MODIFY `cafeteriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `MealRatings`
--
ALTER TABLE `MealRatings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `MealReviews`
--
ALTER TABLE `MealReviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Preferences`
--
ALTER TABLE `Preferences`
  MODIFY `preferencesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CafeteriaRatings`
--
ALTER TABLE `CafeteriaRatings`
  ADD CONSTRAINT `cafeteriaratings_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `Cafeterias` (`cafeteriaID`);

--
-- Constraints for table `CafeteriaReviews`
--
ALTER TABLE `CafeteriaReviews`
  ADD CONSTRAINT `cafeteriareviews_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `Cafeterias` (`cafeteriaID`),
  ADD CONSTRAINT `cafeteriareviews_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

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
-- Constraints for table `MealRatings`
--
ALTER TABLE `MealRatings`
  ADD CONSTRAINT `mealratings_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `Meals` (`mealID`);

--
-- Constraints for table `MealReviews`
--
ALTER TABLE `MealReviews`
  ADD CONSTRAINT `mealreviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`),
  ADD CONSTRAINT `mealreviews_ibfk_2` FOREIGN KEY (`mealID`) REFERENCES `Meals` (`mealID`);

--
-- Constraints for table `Meals`
--
ALTER TABLE `Meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `Cafeterias` (`cafeteriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `Preferences`
--
ALTER TABLE `Preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

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
  ADD CONSTRAINT `userreviews_ibfk_2` FOREIGN KEY (`reviewID`) REFERENCES `mealreviews` (`reviewID`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `Roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
