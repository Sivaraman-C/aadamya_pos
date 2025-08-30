-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2025 at 10:58 AM
-- Server version: 8.0.43-0ubuntu0.24.04.1
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aadamya_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `contact`, `address`, `city`, `country`, `creationDate`) VALUES
(1, 'sample1', '3462464562', 'sam', 'sam', 'sam', '2025-07-23 07:19:56'),
(2, 'test1', '8762543654', 'cudd', 'cudd', 'in', '2025-08-12 04:13:28'),
(3, 'robin', '7683756823', 'bth', 'bhr', 'india', '2025-08-14 07:44:30'),
(4, 'chan', '6567523741', 'bth', 'bhr', 'in', '2025-08-15 03:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `customer_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` timestamp NOT NULL,
  `subtotal` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `discount` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tax` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grand_total` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `invoice_number` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_name`, `contact`, `order_date`, `subtotal`, `discount`, `shipping`, `tax`, `grand_total`, `invoice_number`) VALUES
(1, 1, 'sample1', '3462464562', '2025-08-14 05:49:19', '330000', '33000', '25', '16500', '313525', 'INV-20250814-4177'),
(2, 3, 'robin', '7683756823', '2025-08-14 05:52:13', '1320000', '264000', '30', '132000', '1188030', 'INV-20250814-1679'),
(3, 3, 'robin', '7683756823', '2025-08-14 06:19:17', '765000', '0', '0', '76500', '841500', 'INV-20250814-9431'),
(4, 4, 'chan', '6567523741', '2025-08-14 22:28:25', '72000', '7200', '30', '3600', '68430', 'INV-20250815-5201'),
(5, 2, 'test1', '8762543654', '2025-08-29 03:10:41', '180000', '36000', '15', '9000', '153015', 'INV-20250829-2213'),
(6, 3, 'robin', '7683756823', '2025-08-29 03:12:20', '270000', '54000', '0', '40500', '256500', 'INV-20250829-4212'),
(7, 3, 'robin', '7683756823', '2025-08-29 23:25:04', '25000', '2500', '0', '5000', '27500', 'INV-20250830-6607'),
(8, 3, 'robin', '7683756823', '2025-08-29 23:25:22', '25000', '2500', '0', '5000', '27500', 'INV-20250830-9729');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `product_name`, `price`, `quantity`, `total`) VALUES
(1, 7, 1, '', '330000', 5, 1650000.00),
(2, 7, 2, 'Lenovo_IdeaPad', '1320000', 20, 26400000.00),
(3, 4, 3, 'DELL_Inspiron_15', '765000', 17, 13005000.00),
(4, 1, 4, 'Apple_AirPods_Pro', '72000', 3, 216000.00),
(5, 4, 5, 'DELL_Inspiron_15', '180000', 4, 720000.00),
(6, 4, 6, 'DELL_Inspiron_15', '270000', 6, 1620000.00),
(7, 1, 7, 'Apple_AirPods_Pro', '25000', 1, 25000.00),
(8, 1, 8, 'Apple_AirPods_Pro', '25000', 1, 25000.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cost_price` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit_price` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_unit_price` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `discount` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `discount_amount` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `final_price` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category`, `brand`, `quantity`, `cost_price`, `unit_price`, `total_unit_price`, `discount`, `discount_amount`, `final_price`, `image`, `date`) VALUES
(1, 'Apple_AirPods_Pro', 'Headset', 'Apple', '10', '23499', '25000', '288000.00', '10', '2400.00', '21600.00', 'http://localhost/aadamya_pos/modules/gallery/6878a0e3bbd0d_Apple_AirPods_Pro.jpeg', '2025-07-17 14:18:58'),
(2, 'Apple_iPhone_14_Pro', 'Mobile', 'Apple', '20', '60000', '65000', '1300000.00', '12', '7800.00', '57200.00', 'http://localhost/aadamya_pos/modules/gallery/6878a2aeeab92_Apple_iPhone_14_Pro.png', '2025-07-17 14:18:58'),
(3, 'Apple_laptop', 'Laptop', 'Apple', '3', '88000', '98000', '294000.00', '20', '19600.00', '78400.00', 'http://localhost/aadamya_pos/modules/gallery/6878a6e93bee5_Apple_laptop.png', '2025-07-17 14:18:58'),
(4, 'DELL_Inspiron_15', 'Laptop', 'Dell', '40', '40000', '45000', '2250000.00', '5', '2250.00', '42750.00', 'http://localhost/aadamya_pos/modules/gallery/6878a73424639_DELL_Inspiron_15.png', '2025-07-17 14:18:58'),
(5, 'HP_15s_12th Gen', 'Laptop', 'Select', '25', '45000', '52000', '1300000.00', '8', '4160.00', '47840.00', 'http://localhost/aadamya_pos/modules/gallery/6878a7789414d_HP_15s_12th_Gen.jpg', '2025-07-17 14:18:58'),
(6, 'Leaf_Buds_X342', 'Headset', 'Leaf', '50', '999', '1200', '60000.00', '16', '192.00', '1008.00', 'http://localhost/aadamya_pos/modules/gallery/6878a7a84e643_Leaf_Buds_X342.png', '2025-07-17 14:18:58'),
(7, 'Lenovo_IdeaPad', 'Laptop', 'Select', '5', '60000', '66000', '1980000.00', '25', '16500.00', '49500.00', 'http://localhost/aadamya_pos/modules/gallery/6878a7e7990b5_Lenovo_IdeaPad.jpg', '2025-07-17 14:18:58'),
(8, 'oneplus', 'Mobile', 'OnePlus', '50', '33999', '38999', '1949950.00', '10', '3899.90', '35099.10', 'http://localhost/aadamya_pos/modules/gallery/6878a81f4eb51_oneplus.png', '2025-07-17 14:18:58'),
(9, 'Rado', 'Watch', 'Rado', '20', '2999', '3500', '70000.00', '6', '210.00', '3290.00', 'http://localhost/aadamya_pos/modules/gallery/6878a85cacb46_Rado.jpeg', '2025-07-17 14:18:58'),
(10, 'Skullcandy_grey_blue', 'Headset', 'Skullcandy', '15', '2000', '2500', '37500.00', '20', '500.00', '2000.00', 'http://localhost/aadamya_pos/modules/gallery/6878a9880a174_Skullcandy_grey_blue.png', '2025-07-17 14:18:58'),
(11, 'SAMSUNG_Galaxy_Buds', 'Headset', 'Samsung', '10', '', '3499', '34990.00', '12', '419.88', '3079.12', 'http://localhost/aadamya_pos/modules/gallery/6878bdee70b1c_SAMSUNG_Galaxy_Buds.jpg', '2025-07-17 14:18:58'),
(12, 'Samsung_Galaxy S24_Ultra_5G', 'Mobile', 'Samsung', '10', '', '54000', '540000.00', '24', '12960.00', '41040.00', 'http://localhost/aadamya_pos/modules/gallery/6878fd09eb630_Samsung_Galaxy_S24_Ultra_5G.png', '2025-07-17 14:18:58'),
(13, 'Rolex', 'Watch', 'Rolex', '7', '', '4499', '31493.00', '8', '359.92', '4139.08', 'http://localhost/aadamya_pos/modules/gallery/6878ffd133903_Rolex.png', '2025-07-17 14:18:58'),
(15, 'Apple_AirPods', 'Headset', 'Apple', '10', '', '24499', '244990.00', '6', '1469.94', '23029.06', 'http://localhost/aadamya_pos/modules/gallery/689c5551ef265_Apple_AirPods_Pro.jpeg', '2025-08-13 09:05:21'),
(17, 'Skullcandy', 'Headset', 'Skullcandy', '32', '', '1299', '41568.00', '9', '116.91', '1182.09', 'http://localhost/aadamya_pos/modules/gallery/68b175307f431_Skullcandy_Dime.png', '2025-08-29 09:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `register_seller`
--

CREATE TABLE `register_seller` (
  `id` int NOT NULL,
  `login_oauth_uid` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_otp` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `otp_generation_time` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `otp_expiration_time` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_verified_status` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_seller`
--

INSERT INTO `register_seller` (`id`, `login_oauth_uid`, `name`, `email`, `contact_no`, `image`, `password`, `mobile_otp`, `otp_generation_time`, `otp_expiration_time`, `mobile_verified_status`, `email_verified`, `status`, `creationDate`) VALUES
(2, '', '', '', '8754060365', '', '$2y$10$KuNVtv4jsML0o.NInufNXu11B.7G2GbJT973yeQLEvV6OeWlaqqpG', '729586', '30-08-2025 15:29:02', '2025-08-30 15:30:02', 'active', '', '', '2025-08-23 06:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sellname` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sellmail` varchar(630) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(360) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sellname`, `sellmail`, `password`) VALUES
('sam', 'sam@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `sample_data`
--

CREATE TABLE `sample_data` (
  `id` int NOT NULL,
  `name` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `registration_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_data`
--

INSERT INTO `sample_data` (`id`, `name`, `address`, `registration_Date`) VALUES
(1, 'siva', 'chennai', '2025-05-02 10:03:07'),
(2, 'asd', 'asd', '2025-05-02 10:14:28'),
(3, 'asd', 'asd', '2025-05-02 10:31:24'),
(4, 'sa', 'sa', '2025-05-05 10:53:22'),
(5, 'sas', 'sas', '2025-05-05 12:05:38'),
(6, 'sas', 'sas', '2025-05-05 12:07:18'),
(7, 'sa', 'daf', '2025-05-09 11:13:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_seller`
--
ALTER TABLE `register_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register_seller`
--
ALTER TABLE `register_seller`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
