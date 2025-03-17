-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 30, 2024 at 05:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(15) NOT NULL,
  `brand_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(1001, 'Toyota'),
(1002, 'Honda'),
(1003, 'Nissan'),
(1004, 'Bmw'),
(1005, 'Audi'),
(1006, 'Benz');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `qty`) VALUES
('Av9zHeuMLxvqZ3sGYtBY', '35h7qNrf1bznMKvfPjh7', 'PuGWiwCpxdd95OA11zcn', '7500', '1'),
('DGbSkiYqJ753qgdHXG1j', '35h7qNrf1bznMKvfPjh7', 'vkSa5KAtg4pCaNnUf7Go', '30000', '1'),
('eYWptvM1BDNXn9LuPFx4', '35h7qNrf1bznMKvfPjh7', 'OOgthLhDDOue8F1tNCKK', '20000', '1'),
('fEeuCV2SFjzpF4gcG4OV', '35h7qNrf1bznMKvfPjh7', 's4QXOrGZPBFrZ0SMtjUX', '3000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `contact_no`, `address`, `password_hash`) VALUES
(6, 'Kamala', 'k@33', '4245346', 'Batapola', '$2y$10$S5V0OgkqS9DMCW91EHOGwe5EdgjpZ1EG2/TNy0Nhiboy4bto1onge'),
(7, 'tttfttf', 'hirun@1234', '7675656', 'Temple Rd', '$2y$10$dsT7yaUi5dhXQ2cedZAsFegFASArvbAEudppTB1Erkeh6hrpVxlW2');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(15) NOT NULL,
  `brand_id` int(15) DEFAULT NULL,
  `model_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `model_name`) VALUES
(3001, 1001, 'Gt 86'),
(3002, 1001, 'Supra mark 4'),
(3003, 1001, 'Supra mark 5'),
(3004, 1001, 'GR 86'),
(3005, 1001, 'JZX 100'),
(3006, 1001, 'Crown'),
(3007, 1002, 'S 2000'),
(3008, 1002, 'Acura NSX'),
(3009, 1002, 'Type R'),
(3010, 1002, 'Acura RSX'),
(3011, 1002, 'S 660'),
(3012, 1002, 'Integra');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address_type` varchar(10) NOT NULL,
  `method` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'in progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`) VALUES
('2vnOoJ8LrcqT3IEizEdJ', 'CcBQ0lIAjcRrWoSxAP6D', 'Hirun', '0719825873', 'hirun@1234', 'Temple Rd, Near The Fort, Colombo, Sri Lanka - 4567', 'home', 'cash on delivery', 'PuGWiwCpxdd95OA11zcn', '7500', '1', '2024-10-24', 'in progress'),
('HnXxQfJiIcpcAonCE2YB', 'CcBQ0lIAjcRrWoSxAP6D', 'Amila', '0788008714', 'amilatharindu2002@gmail.com', 'Dikkela, Dorala, Batapola, Sri Lanka - 3456', 'home', 'cash on delivery', 'W5gPbhBOTRJHBwlrh2RL', '6500', '1', '2024-10-24', 'in progress'),
('IN3sSDbS6rGJP5R4Esky', 'CcBQ0lIAjcRrWoSxAP6D', 'Hirun', '0719825873', 'hirun@1234', 'Temple Rd, Near The Fort, Colombo, Sri Lanka - 4567', 'home', 'cash on delivery', 's4QXOrGZPBFrZ0SMtjUX', '6000', '2', '2024-10-24', 'in progress'),
('VH5yWjlX5inrX2tKPu0f', 'CcBQ0lIAjcRrWoSxAP6D', 'Hirun', '0719825873', 'hirun@1234', 'Temple Rd, Near The Fort, Colombo, Sri Lanka - 4567', 'home', 'cash on delivery', 'OOgthLhDDOue8F1tNCKK', '60000', '3', '2024-10-24', 'in progress'),
('wmgmxoUTPnsPIDKuHh5w', 'CcBQ0lIAjcRrWoSxAP6D', 'Hirun', '0719825873', 'hirun@1234', 'Temple Rd, Near The Fort, Colombo, Sri Lanka - 4567', 'home', 'cash on delivery', '', '73500', '', '2024-10-24', 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(15) NOT NULL,
  `model_id` int(15) DEFAULT NULL,
  `part_name` varchar(20) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `stock_quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `model_id`, `part_name`, `price`, `stock_quantity`) VALUES
(4014, 30025555, 'fdgfg', 33333.00, 6878),
(4021, 3001, 'Oil Filter', 5000.00, 532545),
(4022, 3001, 'Oil Filter', 4000.00, 2222),
(4023, 3001, 'Oil Filter', 5000.00, 43);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
('OOgthLhDDOue8F1tNCKK', 'Alternator', '20000', 'oLEebv2zNQKyz5Ino7au.jpeg'),
('PuGWiwCpxdd95OA11zcn', 'Fuel Pump', '7500', 'iSCWOB5tUetvFme3GC4X.jpeg'),
('s4QXOrGZPBFrZ0SMtjUX', 'Oil Filter', '3000', 'vSDCljm7pLK9z5mNVlPR.jpg'),
('vkSa5KAtg4pCaNnUf7Go', 'Battery', '30000', 'TjETpBKekKBmzYx8Mtea.jpg'),
('W5gPbhBOTRJHBwlrh2RL', 'Clutch Plate', '6500', 'qusmoWlpqtdLPPZdd900.jpeg'),
('Xx62sFhvmBVf6wIrR4ZX', 'Break Pads', '10000', '9WILHhURdvi1Q2KImzGQ.png');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `rating` int(1) NOT NULL CHECK (`rating` between 1 and 5),
  `review` text DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `rating`, `review`, `first_name`, `last_name`, `email`, `created_at`) VALUES
(5, 'vkSa5KAtg4pCaNnUf7Go', 4, 'Good Service', 'Amila', 'Tharindu', 'amilatharindu2002@gmail.com', '2024-10-23 17:36:06'),
(6, 'Xx62sFhvmBVf6wIrR4ZX', 3, 'Nice', 'Amila', 'Tharindu', 'amilatharindu2002@gmail.com', '2024-10-23 17:38:28'),
(17, 's4QXOrGZPBFrZ0SMtjUX', 4, 'Best Service', 'Sunil', 'Fernando', 'sunil@123', '2024-10-24 04:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(20) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comments` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `firstName`, `lastName`, `email`, `phone`, `comments`, `reg_date`) VALUES
(1, 'Ravindu', 'Hirushan', 'ravindu.hirushan@ecyber.com', '0772125228', 'Hi', '2024-10-07 05:55:26'),
(2, 'Amila', 'Tharindu', 'amila2002@gmail.com', '0788008714', 'Hello', '2024-10-07 07:09:42'),
(3, 'sahan', 'sahan', 'amal@gmail.com', '0772125228', 'Hi', '2024-10-10 06:14:59'),
(4, 'Nimal', 'Perera', 'asd@gmail.com', '0112547886', 'Hi', '2024-10-30 03:23:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3013;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4026;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
