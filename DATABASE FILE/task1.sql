-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 01:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qnty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_user_id`, `product_id`, `qnty`) VALUES
(6, 1, 1),
(7, 1, 1),
(8, 11, 1),
(8, 3, 1),
(8, 2, 1),
(8, 2, 1),
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` enum('headphones','mobile','laptop','pendrive','smartwatch') NOT NULL,
  `product_description` varchar(600) NOT NULL,
  `product_prize` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_review` int(11) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_prize`, `product_quantity`, `product_review`, `product_image`) VALUES
(1, 'boAt Airdopes 141 True Wireless Earbuds with 42H Playtime', 'headphones', 'Beast Mode(Low Latency Upto 80ms) for Gaming, ENx Tech, ASAP Charge, IWP, IPX4 Water Resistance, Smooth Touch Controls(Bold Black)', 4490, 20, 4, 'headphones_1'),
(2, 'boAt Airdopes 121v2 True Wireless Earbuds.', 'headphones', 'With Upto 14 Hours Playback, Lightweight Earbuds, 8MM Drivers, LED Indicators and Multifunction Controls(Midnight Blue)\r\nboAt Airdopes 121v2 True Wireless Earbuds with Upto 14 Hours Playback, Lightwei', 1299, 20, 4, 'headphones_2'),
(3, 'LG Tone Free HBS-FN7', 'headphones', 'Truly Wireless Bluetooth in Ear Headphone with Mic (Black)', 10990, 15, 4, 'headphones_3'),
(4, 'OnePlus Buds Z2', 'headphones', 'Bluetooth Truly Wireless in Ear Earbuds with mic Pearl White', 4999, 10, 3, 'headphones_4'),
(5, 'Bluetooth Truly Wireless in Ear Earbuds with mic Pearl White', 'mobile', '15.49 cm (6.1\"), 1440 x 720 pixels, 3 GB RAM | 128 GB ROM | iOS 12,Apple A12 Bionic Hexa Core processor, Single Rear Camera | Single Front Camera, 2942 mAh Lithium Ion Battery, Dust Resistant, Water Resistant. ', 42999, 10, 5, 'mobilephone_1'),
(6, 'Samsung Galaxy M12 (White,4GB RAM, 64GB Storage) ', 'mobile', '6000 mAh with 8nm Processor | True 48 MP Quad Camera | 90Hz Refresh Rate', 10499, 5, 3, 'mobilephone_2'),
(7, 'Samsung Galaxy A12 (Blue, 6GB RAM, 128GB Storage)', 'mobile', 'EMI/Additional Exchange Offers\r\nVisit the Samsung Store', 15000, 8, 4, 'mobilephone_3'),
(8, 'Samsung Galaxy M32 5G (Sky Blue, 6GB RAM, 128GB Storage)', 'mobile', '#BeFutureReady with 5G 12 bands support, Dimensity 720 processor, Knox security, 5000mAh long-lasting battery with 15W in-box fast charger\r\n\r\n\r\n\r\n', 23999, 10, 3, 'mobilephone_4'),
(9, 'Lenovo IdeaPad Slim 3 ', 'laptop', '10th Gen Intel Core i3 15.6\"(39.62cm) FHD Thin & Light Laptop (8GB/256GB SSD/UHD Graphics/Windows 11/MS Office 2021/Platinum Grey/1.7Kg), 81WB018EIN', 37990, 12, 4, 'laptop_1'),
(10, 'Lenovo IdeaPad Slim 5', 'laptop', '11th Gen Intel Core i5 15.6\"(39.62cm) FHD IPS Thin & Light Laptop (16GB/512GB SSD/Win...\r\nSponsored \r\nLenovo IdeaPad Slim 5 11th Gen Intel Core i5 15.6\"(39.62cm) FHD IPS Thin & Light Laptop (16GB/512GB SSD/Windows 11/MS Office 2021/Backlit Keyboard/Fingerprint Reader/Graphite Grey/1.66Kg), 82FG01H9IN', 62500, 14, 4, 'laptop_2'),
(11, 'Lenovo IdeaPad 3', 'laptop', 'Intel Celeron N4020 14\'\' HD Thin & Light Laptop (4GB/256GB HDD/Windows 11/MS Office 2021/Platinum Grey/1.5Kg), 81WH007KIN', 35999, 10, 4, 'laptop_3'),
(12, 'Lenovo Ideapad 3', 'laptop', 'AMD Ryzen 5 5500U 15.6\" FHD Thin & Light Laptop (8GB/512GB SSD/Windows 11/Office 2021/Backlit Keyboard/2Yr Warranty/Arctic Grey/1.65Kg), 82KU017KIN', 48000, 12, 4, 'laptop_4'),
(13, 'XENIO External Storage 16 GB USB Pen Drive', 'pendrive', 'Slim Design Flash Drive with Metal Body in Tin Box for Laptop, Computer & Desktop (XP001)', 421, 10, 4, 'pendrive_1'),
(14, 'SanDisk Ultra 128 GB USb', 'pendrive', '3.0 Pen Drive (Black)', 1000, 5, 4, 'pendrive_2'),
(15, 'SanDisk Cruzer Blade ', 'pendrive', 'SDCZ50-016G-135 16GB USB 2.0 Pen Drive', 450, 10, 3, 'pendrive_3'),
(16, 'HP v236w 64GB', 'pendrive', 'USB 2.0 Pen Drive', 500, 10, 4, 'pendrive_4'),
(17, 'Fire-Boltt Ninja 2 Max', 'smartwatch', '1.5 inches Full Touch Display Smartwatch with SpO2, Heart Rate Tracking 20 Sports Mode Sleep Monitor, Gesture, Camera Music Control, IP68 Dust Sweat Resistance (Rose Gold, L)\r\n', 5999, 10, 4, 'smartwatch_1'),
(18, 'Fire-Boltt Ninja Calling ', 'smartwatch', '1.69\" Full Touch Bluetooth Calling Smartwatch with 30 Sports Mode, SpO2, Heart Rate Monitoring & AI Voice Assistant (Silver)', 2999, 15, 4, 'smartwatch_2'),
(19, 'Fire-Boltt Ninja Calling', 'smartwatch', '1.69\" Full Touch Bluetooth Calling Smartwatch with 30 Sports Mode, SpO2, Heart Rate Monitoring & AI Voice Assistant (Black)', 2500, 8, 3, 'smartwatch_3'),
(20, 'TAGG Verve NEO Smartwatch', 'smartwatch', '1.69\'\' Large Display with 10 Days Battery Life || Real SPO2, and Real-Time Heart Rate Tracking, IPX68 Waterproof|| Black, Standard.', 1799, 10, 3, 'smartwatch_4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'first', 'last', 'test@test.com', 'password'),
(5, 'First', 'Last', 'email@gmail.com', 'password'),
(6, 'Gokul', 'k', 'gokul@gmail.com', 'password'),
(7, 'Gokul', 'K', 'gokul@snsce.ac.in', 'password'),
(8, 'Gokul', 'K', 'gokulkumar@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
