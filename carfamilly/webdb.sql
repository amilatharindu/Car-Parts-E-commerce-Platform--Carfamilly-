-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 10:41 AM
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
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comments` text DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `telephone`, `email`, `comments`, `date`, `time`, `status`) VALUES
(1, 'Dilana', 'Ranudaya', '0788008714', 'dranudaya@gmail.com', 'frewtrfwe', '2024-12-04', '10:00:00', 'Pending'),
(2, 'Dilana', 'Ranudaya', '0717339156', 'dranudaya@gmail.com', 'thfdumhjg ', '2024-12-25', '15:00:00', 'Pending'),
(3, 'Dilana', 'Ranudaya', '0717339156', 'dranudaya@gmail.com', 'khguhvb', '2024-12-25', '11:00:00', 'Pending'),
(4, 'Dilana', 'Ranydeklmfc', '0717339156', 'dranudaya@gmail.com', 'asdfgb', '2024-12-26', '09:00:00', 'Pending'),
(5, 'Dilana', 'Ranydekl', '0717339156', 'dranudaya@gmail.com', 'asdfgb ', '2024-12-26', '10:00:00', 'Pending'),
(6, 'sadew', 'anuhas', '0717339156', 'dranudaya@gmail.com', 'asdf', '2024-12-31', '09:00:00', 'Pending'),
(7, 'Dilana', 'sdfsf', '0717339156', 'dilana@gmail.com', 'ggyyyg', '2024-12-26', '12:00:00', 'Pending'),
(8, 'Ravindu', 'Hirushan', '0717339156', 'ravindu@123', 'My Car is broken', '2024-12-25', '09:00:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(15) NOT NULL,
  `brand_name` varchar(20) DEFAULT NULL,
  `brand_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`) VALUES
(1001, 'Toyota', '../uploads/ECCertificateofConformityTOYOTA.png'),
(1002, 'Honda', '../uploads/noimage.svg'),
(1003, 'Nissan', '../uploads/aa7r0erni.webp'),
(1004, 'BMW', '../uploads/BMW.svg.png'),
(1005, 'Audi', '../uploads/images.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `price`, `qty`) VALUES
(2, 35, 'PuGWiwCpxdd95OA11zcn', '7500', '1'),
(3, 35, 'vkSa5KAtg4pCaNnUf7Go', '30000', '1'),
(4, 0, '5454', '2000', '1'),
(5, 35, 'OOgthLhDDOue8F1tNCKK', '20000', '1'),
(6, 35, 's4QXOrGZPBFrZ0SMtjUX', '3000', '1'),
(7, 0, '5454', '2000', '1'),
(9, 8, '5457', '5000', '1'),
(10, 8, '5456', '10000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE `clicks` (
  `id` int(11) NOT NULL,
  `day` varchar(20) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clicks`
--

INSERT INTO `clicks` (`id`, `day`, `count`, `created_at`) VALUES
(1, 'Monday', 50, '2024-11-24 21:37:14'),
(2, 'Tuesday', 60, '2024-11-24 21:37:14'),
(3, 'Wednesday', 70, '2024-11-24 21:37:14'),
(4, 'Thursday', 80, '2024-11-24 21:37:14'),
(5, 'Friday', 90, '2024-11-24 21:37:14'),
(6, 'Saturday', 100, '2024-11-24 21:37:14'),
(7, 'Sunday', 110, '2024-11-24 21:37:14');

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
(7, 'tttfttf', 'hirun@1234', '7675656', 'Temple Rd', '$2y$10$dsT7yaUi5dhXQ2cedZAsFegFASArvbAEudppTB1Erkeh6hrpVxlW2'),
(8, 'Ransilu', 'ransilu@gmail.com', '0769690411', 'Baddegama', '$2y$10$98dW6te/UxchsEHzPhynC.sxIB0uYqHCuOiVgdigXo8BD5Q0QQoIi'),
(9, 'Amila', 'amila@123', '0788008714', 'Batapola', '$2y$10$p9G6NJOYGt0XBx37KdYQGu9mwCLe.z8SYJHUC7BcBRqRdJf99XM/q');

-- --------------------------------------------------------

--
-- Table structure for table `impressions`
--

CREATE TABLE `impressions` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `impressions`
--

INSERT INTO `impressions` (`id`, `type`, `count`, `created_at`) VALUES
(1, 'Organic', 100, '2024-11-24 21:37:14'),
(2, 'Paid', 50, '2024-11-24 21:37:14'),
(3, 'Social Media', 70, '2024-11-24 21:37:14'),
(4, 'Other', 30, '2024-11-24 21:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(10) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `model_name`, `image`, `status`) VALUES
(17, '1001', 'Supra mark 4', 'supra4.jpg', '1'),
(18, '1001', 'Supra Mk5', 'supramk5.jpeg', '1'),
(19, '1001', 'GR 86', 'gr86.jpg', '1'),
(20, '1001', 'JZX 100', 'JZX100 mark2.jpg', '1'),
(21, '1001', 'Crown', 'crownnew.jpg', '1'),
(22, '1002', 'S 2000', 's2000.jpeg', '1'),
(23, '1002', 'Acura NSX', 'nsx.jpg', '1'),
(24, '1002', 'Type R ', 'civic.jpg', '1'),
(25, '1002', 'Acura RSX', 'rsx.jpeg', '1'),
(26, '1002', 'S 660', 's660.jpg', '1'),
(27, '1002', 'Integra', 'integra.jpg', '1'),
(28, '1003', 'GTR R34', 'r34 new.png', '1'),
(29, '1003', 'GTR R35', 'r35.jpg', '1'),
(30, '1003', 'Fairlady 350z', '350Z.jpg', '1'),
(31, '1004', 'M5', 'M5.jpg', '1'),
(32, '1004', '520 D', '520d.jpg', '1'),
(33, '1004', 'M8 Coupe', 'm8.jpeg', '1'),
(34, '1005', 'S7', 's7.jpg', '1'),
(35, '1005', 'A5', 'a5.jpg', '1'),
(36, '1005', 'RS7', 'rs7.jpg', '1'),
(37, '1006', 'CLA 45', 'cla45.jpg', '1'),
(38, '1006', 'C 200', 'c200.png', '1'),
(39, '1006', 'AMG S63', 's63.jpg', '1'),
(3001, '1001', 'GT 86', 'gt86.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
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
(2, 'CcBQ0lIAjcRrWoSxAP6D', 'Hirun', '0719825873', 'hirun@1234', 'Temple Rd, Near The Fort, Colombo, Sri Lanka - 4567', 'home', 'cash on delivery', 'PuGWiwCpxdd95OA11zcn', '7500', '1', '2024-10-24', 'delivered'),
(3, '8', 'Ransilu', '0769690411', 'ransilu@gmail.com', 'Galle, Baddegama, poddala, Sri lanka - 1234', 'home', 'cash on delivery', '5454', '6000', '3', '2024-12-24', 'canceled'),
(5, '9', 'Dilana Ranudaya kalnsooriya', '1234567897', 'dranudaya@gmail.com', 'Galle, Baddegama, Galle, Sri Lanka - 12344', 'home', 'cash on delivery', '5455', '8000', '1', '2024-12-24', 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(15) NOT NULL,
  `model_id` int(15) DEFAULT NULL,
  `part_name` varchar(20) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `stock_quantity` int(10) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `model_id`, `part_name`, `price`, `stock_quantity`, `image`) VALUES
(4045, 3001, 'Oil Filter', 5000.00, 30, ''),
(4046, 3001, 'Alternator', 8000.00, 65, ''),
(4047, 3001, 'Break Pads', 10000.00, 56, ''),
(4048, 3001, 'Battery', 7000.00, 67, ''),
(4049, 3002, 'Alternator', 5000.00, 64, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(5455, 'Alternator', '8000', 'alternator.jpeg'),
(5456, 'Break Pads', '10000', 'brake pads.png'),
(5457, 'Oil Filter', '5000', 'oil-filter.jpg'),
(5458, 'Battery', '7000', 'battery.jpg'),
(5459, 'Fuel Pump', '6500', 'fuel-pump.jpeg'),
(5460, 'Clutch', '9000', 'clutch.jpeg');

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
(6, 'Xx62sFhvmBVf6wIrR4ZX', 3, 'Nice', 'Amila', 'Tharindu', 'amilatharindu2002@gmail.com', '2024-10-23 17:38:28'),
(17, 's4QXOrGZPBFrZ0SMtjUX', 4, 'Best Service', 'Sunil', 'Fernando', 'sunil@123', '2024-10-24 04:52:31'),
(18, 'Xx62sFhvmBVf6wIrR4ZX', 3, 'ewdwerw', 'erfe', 'erer', 'dranudaya@gmail.com', '2024-11-12 10:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_type`, `count`, `created_at`) VALUES
(1, 'Verified', 150, '2024-11-24 21:37:14'),
(2, 'Unverified', 50, '2024-11-24 21:37:14');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `impressions`
--
ALTER TABLE `impressions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4445;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `impressions`
--
ALTER TABLE `impressions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4050;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5463;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
