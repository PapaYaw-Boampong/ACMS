-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 12:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafeteriaratings`
--

CREATE TABLE `cafeteriaratings` (
  `ratingID` int(11) NOT NULL,
  `ratingValue` int(11) NOT NULL,
  `cafeteriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafeteriaratings`
--

INSERT INTO `cafeteriaratings` (`ratingID`, `ratingValue`, `cafeteriaID`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cafeteriareviews`
--

CREATE TABLE `cafeteriareviews` (
  `ratingID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `cafeteriaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafeteriareviews`
--

INSERT INTO `cafeteriareviews` (`ratingID`, `rating`, `feedback`, `cafeteriaID`, `userID`, `dateTime`) VALUES
(10, 5, 'good', 1, 2, '2024-07-09 22:38:15'),
(11, 5, 'good', 1, 2, '2024-07-02 22:38:27'),
(12, 3, 'good', 1, 2, '0000-00-00 00:00:00'),
(13, 1, 'good', 2, 2, '0000-00-00 00:00:00'),
(15, 3, 'good', 1, 2, '0000-00-00 00:00:00');

--
-- Triggers `cafeteriareviews`
--
DELIMITER $$
CREATE TRIGGER `updateCafeteriaRatings` AFTER INSERT ON `cafeteriareviews` FOR EACH ROW BEGIN
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
-- Table structure for table `cafeterias`
--

CREATE TABLE `cafeterias` (
  `cafeteriaID` int(11) NOT NULL,
  `cafeteriaName` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `cafeteriaImage` blob NOT NULL,
  `openingTime` time NOT NULL,
  `closingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafeterias`
--

INSERT INTO `cafeterias` (`cafeteriaID`, `cafeteriaName`, `description`, `cafeteriaImage`, `openingTime`, `closingTime`) VALUES
(1, 'Main Cafeteria', 'The main dining hall offering a variety of meals.', '', '00:00:00', '00:00:00'),
(2, 'East Wing Cafeteria', 'Located in the east wing, known for its healthy options.', '', '00:00:00', '00:00:00'),
(3, 'West Wing Cafeteria', 'Located in the west wing, famous for its fast food.', '', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredID`, `name`) VALUES
(1, 'Tomato'),
(2, 'Lettuce'),
(3, 'Cheese');

-- --------------------------------------------------------

--
-- Table structure for table `mealingredients`
--

CREATE TABLE `mealingredients` (
  `mealID` int(11) NOT NULL,
  `ingredID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mealingredients`
--

INSERT INTO `mealingredients` (`mealID`, `ingredID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mealorder`
--

CREATE TABLE `mealorder` (
  `mealID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mealorder`
--

INSERT INTO `mealorder` (`mealID`, `orderID`, `quantity`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

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
-- Table structure for table `mealratings`
--

CREATE TABLE `mealratings` (
  `ratingID` int(11) NOT NULL,
  `ratingValue` int(11) NOT NULL,
  `mealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mealratings`
--

INSERT INTO `mealratings` (`ratingID`, `ratingValue`, `mealID`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mealreviews`
--

CREATE TABLE `mealreviews` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `mealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mealreviews`
--

INSERT INTO `mealreviews` (`reviewID`, `userID`, `comments`, `rating`, `mealID`) VALUES
(1, 1, 'Great meal!', 5, 1),
(2, 2, 'Good service', 4, 2),
(3, 3, 'Could be better', 3, 1),
(4, 2, 'good', 5, 1),
(5, 1, 'good', 3, 1),
(6, 1, 'good', 3, 1),
(7, 1, 'good', 3, 1),
(8, 1, 'good', 2, 1);

--
-- Triggers `mealreviews`
--
DELIMITER $$
CREATE TRIGGER `updateMealRatings` AFTER INSERT ON `mealreviews` FOR EACH ROW BEGIN
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
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `mealID` int(11) NOT NULL,
  `mealStatus` enum('AVAILABLE','UNAVAILABLE') DEFAULT NULL,
  `timeframe` enum('BREAKFAST','LUNCH','DINNER') DEFAULT NULL,
  `cafeteriaID` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'Food',
  `quantity` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`mealID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `Meals`
INSERT INTO `Meals` (`mealID`, `mealStatus`, `timeframe`, `cafeteriaID`, `price`, `name`, `quantity`) VALUES
(1, 'AVAILABLE', 'BREAKFAST', 1, 5.99, 'Pancakes', 10),
(2, 'AVAILABLE', 'LUNCH', 1, 7.99, 'Chicken Salad', 20),
(3, 'AVAILABLE', 'DINNER', 1, 8.99, 'Spaghetti Bolognese', 15),
(4, 'AVAILABLE', 'BREAKFAST', 2, 6.49, 'Omelette', 5),
(5, 'UNAVAILABLE', 'LUNCH', 2, 7.49, 'Caesar Salad', 0),
(6, 'AVAILABLE', 'DINNER', 2, 9.99, 'Grilled Salmon', 8),
(7, 'UNAVAILABLE', 'BREAKFAST', 3, 6.99, 'French Toast', 0),
(8, 'AVAILABLE', 'LUNCH', 3, 8.49, 'Beef Tacos', 12),
(9, 'UNAVAILABLE', 'DINNER', 3, 10.99, 'Steak', 0),
(10, 'AVAILABLE', 'BREAKFAST', 1, 5.49, 'Bagel with Cream Cheese', 25);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` enum('COMPLETED','CANCELLED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationID`, `userID`, `message`, `status`) VALUES
(1, 1, 'Your order is ready', 'COMPLETED'),
(2, 2, 'Your order is cooking', 'COMPLETED'),
(3, 3, 'Your order was cancelled', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `deliveryStatus` ENUM('delivery', 'pickup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `orderDate`, `deliveryStatus`) VALUES
(1, '2024-08-07 22:01:13', 'delivery'),
(2, '2024-08-07 22:01:13', 'pickup'),
(3, '2024-08-07 22:01:13', 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `orderpayment`
--

CREATE TABLE `orderpayment` (
  `orderID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderpayment`
--

INSERT INTO `orderpayment` (`orderID`, `paymentID`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` enum('COMPLETE','IN_PROGRESS','CANCELLED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `message`, `status`) VALUES
(1, 1, 'Please deliver to room 101', 'COMPLETE'),
(2, 2, 'Extra napkins please', 'IN_PROGRESS'),
(3, 3, 'No onions in the salad', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `method` enum('CASH','MOMO/BANK TRANSFER','MEAL PLAN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `userID`, `amount`, `method`) VALUES
(1, 1, 10, 'CASH'),
(2, 2, 20, 'MOMO/BANK TRANSFER'),
(3, 3, 15, 'MEAL PLAN');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preferencesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dietaryRestrictions` varchar(11) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `culturalRestrictions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`preferencesID`, `userID`, `dietaryRestrictions`, `diet`, `culturalRestrictions`) VALUES
(1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `usernotification`
--

CREATE TABLE `usernotification` (
  `userID` int(11) NOT NULL,
  `notificationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usernotification`
--

INSERT INTO `usernotification` (`userID`, `notificationID`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userreviews`
--

CREATE TABLE `userreviews` (
  `userID` int(11) NOT NULL,
  `reviewID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userreviews`
--

INSERT INTO `userreviews` (`userID`, `reviewID`, `dateTime`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `phoneNo`, `name`, `preferences`, `password`, `roleID`, `userImage`) VALUES
(1, 'user1@example.com', '123-456-7890', 'User One', 'Vegetarian', 'password1', NULL, ''),
(2, 'user2@example.com', '234-567-8901', 'User Two', 'Vegan', 'password2', NULL, ''),
(3, 'user3@example.com', '345-678-9012', 'User Three', 'Gluten-Free', 'password3', NULL, '');

--
-- Indexes for dumped tables
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `deliveryInstruction` text DEFAULT NULL,
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `address` (`userID`, `address`, `deliveryInstruction`) VALUES
(1, '123 Elm Street, Springfield, IL 62701', 'Leave at the front door'),
(2, '456 Oak Avenue, Metropolis, NY 10001', 'Deliver between 9 AM and 5 PM'),
(3, '789 Pine Road, Smalltown, TX 75001', 'Ring the doorbell'),
(4, '101 Maple Lane, Big City, CA 90001', 'Leave package with doorman'),
(5, '202 Birch Street, Townsville, FL 33101', 'No delivery on weekends'),
(6, '303 Cedar Drive, Village, WA 98101', 'Deliver to the back porch'),
(7, '404 Spruce Boulevard, Capital City, CO 80201', 'Call upon arrival'),
(8, '505 Redwood Way, Resort, NV 89001', 'Leave with neighbor if not home');


CREATE TABLE `address` (
  `addressID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `deliveryInstruction` text DEFAULT NULL,
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `address` (`userID`, `address`, `deliveryInstruction`) VALUES
(1, '123 Elm Street, Springfield, IL 62701', 'Leave at the front door'),
(2, '456 Oak Avenue, Metropolis, NY 10001', 'Deliver between 9 AM and 5 PM'),
(3, '789 Pine Road, Smalltown, TX 75001', 'Ring the doorbell'),
(4, '101 Maple Lane, Big City, CA 90001', 'Leave package with doorman'),
(5, '202 Birch Street, Townsville, FL 33101', 'No delivery on weekends'),
(6, '303 Cedar Drive, Village, WA 98101', 'Deliver to the back porch'),
(7, '404 Spruce Boulevard, Capital City, CO 80201', 'Call upon arrival'),
(8, '505 Redwood Way, Resort, NV 89001', 'Leave with neighbor if not home');


--
-- Indexes for table `cafeteriaratings`
--
ALTER TABLE `cafeteriaratings`
  ADD PRIMARY KEY (`ratingID`),
  ADD UNIQUE KEY `cafeteriaID` (`cafeteriaID`),
  ADD KEY `cafetariaID` (`cafeteriaID`);

--
-- Indexes for table `cafeteriareviews`
--
ALTER TABLE `cafeteriareviews`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `caferiaID` (`cafeteriaID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cafeterias`
--
ALTER TABLE `cafeterias`
  ADD PRIMARY KEY (`cafeteriaID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredID`);

--
-- Indexes for table `mealingredients`
--
ALTER TABLE `mealingredients`
  ADD PRIMARY KEY (`mealID`,`ingredID`),
  ADD KEY `ingredID` (`ingredID`);

--
-- Indexes for table `mealorder`
--
ALTER TABLE `mealorder`
  ADD PRIMARY KEY (`mealID`,`orderID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `mealratings`
--
ALTER TABLE `mealratings`
  ADD PRIMARY KEY (`ratingID`),
  ADD UNIQUE KEY `mealID_2` (`mealID`),
  ADD KEY `mealID` (`mealID`);

--
-- Indexes for table `mealreviews`
--
ALTER TABLE `mealreviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `cafeteriaID` (`mealID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`mealID`),
  ADD KEY `meals_ibfk_1` (`cafeteriaID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD PRIMARY KEY (`orderID`,`paymentID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`preferencesID`),
  ADD KEY `preferencesID` (`preferencesID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `usernotification`
--
ALTER TABLE `usernotification`
  ADD PRIMARY KEY (`userID`,`notificationID`),
  ADD KEY `notificationID` (`notificationID`);

--
-- Indexes for table `userreviews`
--
ALTER TABLE `userreviews`
  ADD PRIMARY KEY (`userID`,`reviewID`),
  ADD KEY `reviewID` (`reviewID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafeteriaratings`
--
ALTER TABLE `cafeteriaratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cafeteriareviews`
--
ALTER TABLE `cafeteriareviews`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cafeterias`
--
ALTER TABLE `cafeterias`
  MODIFY `cafeteriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mealratings`
--
ALTER TABLE `mealratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mealreviews`
--
ALTER TABLE `mealreviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `mealID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preferencesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cafeteriaratings`
--
ALTER TABLE `cafeteriaratings`
  ADD CONSTRAINT `cafeteriaratings_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `cafeterias` (`cafeteriaID`);

--
-- Constraints for table `cafeteriareviews`
--
ALTER TABLE `cafeteriareviews`
  ADD CONSTRAINT `cafeteriareviews_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `cafeterias` (`cafeteriaID`),
  ADD CONSTRAINT `cafeteriareviews_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `mealingredients`
--
ALTER TABLE `mealingredients`
  ADD CONSTRAINT `mealingredients_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`),
  ADD CONSTRAINT `mealingredients_ibfk_2` FOREIGN KEY (`ingredID`) REFERENCES `ingredients` (`ingredID`);

--
-- Constraints for table `mealorder`
--
ALTER TABLE `mealorder`
  ADD CONSTRAINT `mealorder_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`),
  ADD CONSTRAINT `mealorder_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `mealratings`
--
ALTER TABLE `mealratings`
  ADD CONSTRAINT `mealratings_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`);

--
-- Constraints for table `mealreviews`
--
ALTER TABLE `mealreviews`
  ADD CONSTRAINT `mealreviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `mealreviews_ibfk_2` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`cafeteriaID`) REFERENCES `cafeterias` (`cafeteriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD CONSTRAINT `orderpayment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderpayment_ibfk_2` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `usernotification`
--
ALTER TABLE `usernotification`
  ADD CONSTRAINT `usernotification_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `usernotification_ibfk_2` FOREIGN KEY (`notificationID`) REFERENCES `notification` (`notificationID`);

--
-- Constraints for table `userreviews`
--
ALTER TABLE `userreviews`
  ADD CONSTRAINT `userreviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `userreviews_ibfk_2` FOREIGN KEY (`reviewID`) REFERENCES `mealreviews` (`reviewID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
