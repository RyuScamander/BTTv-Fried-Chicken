-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 01:17 PM
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
-- Database: `friedchick`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`) VALUES
('chickens'),
('drinks'),
('fries'),
('main meals'),
('sides');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` enum('fries','chickens','sides','main meals','drinks') NOT NULL,
  `quantity` int(11) NOT NULL,
  `combo_meal` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `price`, `image_path`, `category`, `quantity`, `combo_meal`) VALUES
(1, 'BTTv Fried Chicken', 'Our signature crispy fried chicken, cooked to perfection with secret sauce, boneless.', 30000.00, '', 'chickens', 0, 0),
(2, 'Spicy Chicken Wing', 'Wing with spicy sauce.', 25000.00, '', 'chickens', 0, 0),
(3, 'Spicy Chicken Thigh', 'Thigh with spicy sauce.', 35000.00, '', 'chickens', 0, 0),
(4, 'MEDIUM Chicken Popcorn', 'Smaller in piece, but size doesn\'t matter.', 45000.00, '', 'chickens', 0, 0),
(5, 'LARGE Chicken Popcorn', 'Smaller in piece, but bigger in size!', 65000.00, '', 'chickens', 0, 0),
(6, 'BTTv MEDIUM Fries', 'Owner\'s favorite fries, perfectly salted.', 40000.00, '', 'fries', 0, 0),
(7, 'BTTv LARGE Fries', 'Owner\'s favorite fries, perfectly salted with a tremendous amount.', 60000.00, '', 'fries', 0, 0),
(8, 'Salads', 'A healthy choice.', 30000.00, '', 'sides', 0, 0),
(9, 'Mashed Potatoes', 'In case you like potatoes but isn\'t fried?', 30000.00, '', 'sides', 0, 0),
(10, 'Chicken on da rice bowl', 'You\'re Asian and you like rice? We got you.', 50000.00, '', 'main meals', 0, 0),
(11, 'Chicken on da noodle dish', 'Noodle with BTTv Chicken, for your wildest imagination.', 55000.00, '', 'main meals', 0, 0),
(12, 'BBTv Burga', 'A Burger which is made with love.', 37000.00, '', 'main meals', 0, 0),
(13, 'Purple Dragon', 'Chicken with dragonfruit sauce, boneless.', 43000.00, '', 'chickens', 0, 0),
(16, '6-nights', 'When you\'re having a good day.', 69000.00, '', 'drinks', 0, 0),
(18, 'BTTv Grilled Chicken', 'When you don\'t really feel Chicken Fried.', 30000.00, '', 'chickens', 0, 0),
(19, 'Western Chicken Leg Quarter', 'A Chicken from the West (Turkey)', 70000.00, '', 'chickens', 213, 0),
(23, 'sad', 's1asd', 12324.00, './uploads/lazyahhpanda.png', 'chickens', 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meal_combos`
--

CREATE TABLE `meal_combos` (
  `combo_id` int(11) NOT NULL,
  `combo_name` varchar(100) NOT NULL,
  `combo_description` text NOT NULL,
  `combo_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_combo_items`
--

CREATE TABLE `meal_combo_items` (
  `combo_item_id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_total` decimal(10,2) NOT NULL,
  `payment_method` enum('by card','by cash') NOT NULL,
  `order_status` enum('Confirmed','Canceled','Delivered') NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_district` varchar(255) NOT NULL,
  `order_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `order_total`, `payment_method`, `order_status`, `order_address`, `order_district`, `order_city`) VALUES
(1, 1, '0000-00-00 00:00:00', 1000.00, 'by card', 'Canceled', '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_revenue`
--

CREATE TABLE `sales_revenue` (
  `revenue_id` int(11) NOT NULL,
  `revenue_date` date NOT NULL,
  `revenue_amount` decimal(10,2) NOT NULL,
  `year` int(11) NOT NULL,
  `quarter` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(250) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `registered_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `user_address`, `district`, `city`, `password`, `cpassword`, `user_type`, `status`, `registered_at`) VALUES
(1, 'ok', 'ae', 'omg@gmail.com', '123', '123', '', '', '202cb962ac59075b964b07152d234b70', '', 1, '', '0000-00-00'),
(2, 'undefined', '1112', 'assdas@gmail.com', '123412', 'troll', 'Hoang Ma', 'Hanoi', '202cb962ac59075b964b07152d234b70', '', 0, 'inactive', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `meal_combos`
--
ALTER TABLE `meal_combos`
  ADD PRIMARY KEY (`combo_id`);

--
-- Indexes for table `meal_combo_items`
--
ALTER TABLE `meal_combo_items`
  ADD PRIMARY KEY (`combo_item_id`),
  ADD KEY `combo_id` (`combo_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `sales_revenue`
--
ALTER TABLE `sales_revenue`
  ADD PRIMARY KEY (`revenue_id`),
  ADD KEY `year_quarter` (`year`,`quarter`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `meal_combos`
--
ALTER TABLE `meal_combos`
  MODIFY `combo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_combo_items`
--
ALTER TABLE `meal_combo_items`
  MODIFY `combo_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_revenue`
--
ALTER TABLE `sales_revenue`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `meal_combo_items`
--
ALTER TABLE `meal_combo_items`
  ADD CONSTRAINT `meal_combo_items_ibfk_1` FOREIGN KEY (`combo_id`) REFERENCES `meal_combos` (`combo_id`),
  ADD CONSTRAINT `meal_combo_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
