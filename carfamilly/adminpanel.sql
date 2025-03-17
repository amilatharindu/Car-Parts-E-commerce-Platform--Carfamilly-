-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 12:22 AM
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
-- Database: `adminpanel`
--

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
(3, 'Dilana', 'Ranudaya', '0717339156', 'dranudaya@gmail.com', 'khguhvb', '2024-12-25', '11:00:00', 'Pending');

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
(1, 'BMW', '../uploads/BMW.svg.png'),
(2, 'Toyota', '../uploads/ECCertificateofConformityTOYOTA.png'),
(3, 'Honda', '../uploads/noimage.svg'),
(4, 'Audi', '../uploads/images.png'),
(5, 'Nissan', '../uploads/aa7r0erni.webp'),
(6, 'Dodge', '../uploads/pngimg.com - dodge_PNG29.png'),
(7, 'Subaru', '../uploads/images.jpg'),
(8, 'Tesla', '../uploads/1024px-Tesla_logo.png'),
(9, 'Ford', '../uploads/Ford-Motor-Company-Logo.png'),
(10, 'Porsche', '../uploads/porsche-logo-transparent-background-sbt.png');

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
('ETHGfJNvurBKyZYNVGfA', 'MU4jHbHQIHX2jZlzgI68', '5454', '2000', '1'),
('eYWptvM1BDNXn9LuPFx4', '35h7qNrf1bznMKvfPjh7', 'OOgthLhDDOue8F1tNCKK', '20000', '1'),
('fEeuCV2SFjzpF4gcG4OV', '35h7qNrf1bznMKvfPjh7', 's4QXOrGZPBFrZ0SMtjUX', '3000', '1');

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
(7, 'tttfttf', 'hirun@1234', '7675656', 'Temple Rd', '$2y$10$dsT7yaUi5dhXQ2cedZAsFegFASArvbAEudppTB1Erkeh6hrpVxlW2');

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
(14, '1', 'BMW M3', 'new-york-skyline-badge-vector-9a0d0e.webp', '1'),
(15, '11', 'BMW', 'png-transparent-box-shipping-box-packing-materials-package-delivery-carton-packaging-and-labeling-rectangle.png', '1');

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
('2vnOoJ8LrcqT3IEizEdJ', 'CcBQ0lIAjcRrWoSxAP6D', 'Hirun', '0719825873', 'hirun@1234', 'Temple Rd, Near The Fort, Colombo, Sri Lanka - 4567', 'home', 'cash on delivery', 'PuGWiwCpxdd95OA11zcn', '7500', '1', '2024-10-24', 'delivered');

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
(4044, 2333, 'ffjjj', 1.00, 1, '');

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
(5454, 'Alternator', '2000', 'image1.jpg');

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4445;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `impressions`
--
ALTER TABLE `impressions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4045;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5455;

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
