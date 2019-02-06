-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2019 at 05:02 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'abc@gmail.com', 'abc'),
(2, 'xyz@gmail.com', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(255) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(2, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(255) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Sides'),
(2, 'Rice Vermicelli'),
(3, 'Noodle'),
(4, 'Vegetarian'),
(5, 'Others'),
(6, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(255) NOT NULL,
  `customer_ip` int(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(1, 0, 'Dung Bean', 'anhdung.dau@gmail.com', '1', 'Vietnam', 'Footscray', '420271516', 'bvl.jpg', 'Wefo');

-- --------------------------------------------------------

--
-- Table structure for table `meat`
--

CREATE TABLE `meat` (
  `meat_id` int(255) NOT NULL,
  `meat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat`
--

INSERT INTO `meat` (`meat_id`, `meat_title`) VALUES
(1, 'Pork'),
(2, 'Beef'),
(3, 'Chicken'),
(4, 'Duck'),
(5, 'Prawn/Crab'),
(6, 'Fish'),
(7, 'Vegetarian'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_cat` int(255) NOT NULL,
  `product_meat` int(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_meat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 3, 'Chicken Feet with Thai sauce', 10, '<p>Chicken Feet with Thai sauce</p>', 'chickenFeets1.jpg', 'chicken, feet, foot'),
(2, 2, 1, 'Hanoi style grilled pork', 14, '<p>Hanoi style grilled pork with rice vermicelli.</p>', 'bunCha.jpg', 'grilled pork, bun cha'),
(3, 3, 3, 'Free range chicken noodle soup', 14, '<p>Noodle soup in chicken broth served with Vietnamese free range chicken.</p>', 'chickenNoodle.jpg', 'chicken, noodle, free range chicken'),
(4, 4, 0, 'Veggie Spring Rolls', 12, '<p>Veggie Spring Rolls with rice vermicelli.</p>', 'veggieSpringRolls.jpeg', 'veggie, spring rolls, vegan'),
(5, 5, 1, 'Glutinous rice', 12, '<p>Glutinous rice with egg and pork stew.</p>', 'xoi.jpg', 'xoi, sticky rice, glutinous rice'),
(6, 6, 8, 'Avocado smoothie', 5, '<p>Avocado smoothie.</p>', 'avocado.jpg', 'avocado, smoothie'),
(7, 3, 6, 'Bun Mam', 14, '<p>Thick noodle in fermented fish broth served with roasted pork, pork belly, squid, prawns and fish cuts.</p>', 'bunMam.png', 'bun mam, seafood'),
(8, 5, 1, 'Pork offals congee', 12, '<p>Congee with a selection of pork offals</p>', 'chaoLong.jpg', 'chao long'),
(9, 1, 5, 'Prawn spring rolls', 14, '<p>Prawn spring rolls with rice vermicelli.</p>', 'springRolls.jpg', 'spring rolls, prawn'),
(10, 3, 1, 'Canh Bun', 14, '<p>Canh Bun an voi rau muong</p>', 'canhbun.jpeg', 'canh, canh bun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `meat`
--
ALTER TABLE `meat`
  ADD PRIMARY KEY (`meat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meat`
--
ALTER TABLE `meat`
  MODIFY `meat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
