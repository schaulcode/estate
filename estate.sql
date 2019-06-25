-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 08:20 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(3) NOT NULL,
  `menu_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`) VALUES
(1, 'HOME'),
(2, 'TO BUY'),
(3, 'TO RENT'),
(4, 'SERVICES'),
(5, 'CONTACT US'),
(6, 'ABOUT US');

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`id`, `session`, `time`) VALUES
(0, 'ne5relm819nbpi7a6oeqh0mhp9', 1515957657);

-- --------------------------------------------------------

--
-- Table structure for table `properties_buy`
--

CREATE TABLE `properties_buy` (
  `prop_id` int(11) NOT NULL,
  `prop_advertiser` varchar(255) NOT NULL,
  `prop_title` varchar(255) NOT NULL,
  `prop_location` varchar(255) NOT NULL,
  `prop_image` text NOT NULL,
  `prop_content` text NOT NULL,
  `prop_price` int(10) NOT NULL,
  `prop_sale_price` int(10) NOT NULL,
  `prop_sqm` int(11) NOT NULL,
  `prop_bedrooms` int(3) NOT NULL,
  `prop_bathrooms` int(3) NOT NULL,
  `prop_floor` int(3) NOT NULL,
  `prop_balcony` tinyint(1) NOT NULL,
  `prop_elevator` tinyint(1) NOT NULL,
  `prop_garage` tinyint(1) NOT NULL,
  `prop_garden` tinyint(1) NOT NULL,
  `prop_renovated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties_buy`
--

INSERT INTO `properties_buy` (`prop_id`, `prop_advertiser`, `prop_title`, `prop_location`, `prop_image`, `prop_content`, `prop_price`, `prop_sale_price`, `prop_sqm`, `prop_bedrooms`, `prop_bathrooms`, `prop_floor`, `prop_balcony`, `prop_elevator`, `prop_garage`, `prop_garden`, `prop_renovated`) VALUES
(1, '', 'Five Bedrooms Lodge', 'Leeds', 'lodge.jpg', '150sqm one floor Lodge, 5 bedrooms, 2 bathrooms, garage, spacious, quiete London suburb\"\"\"', 350000, 310000, 150, 5, 2, 4, 0, 0, 0, 0, 0),
(2, '', 'Big luxury Villa', 'Leeds', 'luxury-villa.jpg', '7 bedroom vila in a nice neighborhood, very spacious rooms, big garden', 860000, 830000, 240, 7, 3, 0, 0, 0, 1, 1, 0),
(3, '', 'Two familly house', 'Manchester', 'familly-house.jpg\r\n', 'Each house is 145sqm, has got 4 bedrooms, bathroom toilete seperate, garage', 930000, 900000, 50, 2, 0, 0, 0, 0, 0, 0, 0),
(4, '', 'Luxury holiday house', 'Liverpool', 'luxury-holiday-house.jpg', 'Luxury house in south england, 10 min walk from the beach. 5 bedrooms, big garden with swimingpool\"', 762000, 743000, 176, 5, 2, 0, 0, 0, 0, 1, 0),
(5, '', 'Small Villa', 'Gateshead', 'small-villa.jpg\r\n', '120sqm villa, 4 bedrooms, 1 bathroom, garage, good location', 280000, 270000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '', 'Big luxury Mansion', 'London', 'luxury-mansion.jpg\r\n', '400 sqm mansion, 8 bedrooms, 3 bathroom, big entance hall', 1300000, 1180000, 180, 4, 0, 5, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `properties_rent`
--

CREATE TABLE `properties_rent` (
  `prop_id` int(11) NOT NULL,
  `prop_advertiser` varchar(255) NOT NULL,
  `prop_title` varchar(255) NOT NULL,
  `prop_location` varchar(255) NOT NULL,
  `prop_image` text NOT NULL,
  `prop_content` text NOT NULL,
  `prop_price_monthly` int(10) NOT NULL,
  `prop_sqm` int(5) NOT NULL,
  `prop_bedrooms` int(3) NOT NULL,
  `prop_bathrooms` int(3) NOT NULL,
  `prop_floor` int(3) NOT NULL,
  `prop_balcony` tinyint(1) NOT NULL,
  `prop_elevator` tinyint(1) NOT NULL,
  `prop_garage` tinyint(1) NOT NULL,
  `prop_garden` tinyint(1) NOT NULL,
  `prop_renovated` tinyint(1) NOT NULL,
  `prop_furnished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties_rent`
--

INSERT INTO `properties_rent` (`prop_id`, `prop_advertiser`, `prop_title`, `prop_location`, `prop_image`, `prop_content`, `prop_price_monthly`, `prop_sqm`, `prop_bedrooms`, `prop_bathrooms`, `prop_floor`, `prop_balcony`, `prop_elevator`, `prop_garage`, `prop_garden`, `prop_renovated`, `prop_furnished`) VALUES
(3, '', 'Nice Flat', 'Manchester', 'diningroom.jpg', 'some content\"', 700, 110, 3, 1, 2, 0, 1, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verify` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `user_role`, `company_name`, `token`, `verify`) VALUES
(12, 'estateadmin', '$2y$12$lJm5dYv12.8dQRLi4Ozhp.ZZxG2QIsAjEnNeM1r8zESnUfJV0QaTS', 'Admin', 'Admin', 'contact@estate.com', 'Admin', '', '', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `properties_buy`
--
ALTER TABLE `properties_buy`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `properties_rent`
--
ALTER TABLE `properties_rent`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties_buy`
--
ALTER TABLE `properties_buy`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `properties_rent`
--
ALTER TABLE `properties_rent`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
