-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 06:09 PM
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
-- Database: `pabau`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Makes Work Fun'),
(2, 'Team Player'),
(3, 'Culture Champion'),
(4, 'Difference Maker');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `profession`, `img`, `bio`, `email`, `password`) VALUES
(1, 'John Doe', 'Software Developer', 'https://as2.ftcdn.net/v2/jpg/02/24/86/95/1000_F_224869519_aRaeLneqALfPNBzg0xxMZXghtvBXkfIA.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'john@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(2, 'Emma Johnson', 'Human Resources Manager', 'https://as1.ftcdn.net/v2/jpg/01/91/85/06/1000_F_191850653_IkzN9vZTtOtJ8NTKLKOp8PlaY8iCk6Ls.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'emma@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(3, 'Liam Brown', 'Marketing Specialist', 'https://as2.ftcdn.net/v2/jpg/02/14/74/61/1000_F_214746128_31JkeaP6rU0NzzzdFC4khGkmqc8noe6h.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'liam@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(4, 'Sophia Davis', 'Accountant', 'https://as2.ftcdn.net/v2/jpg/03/02/76/57/1000_F_302765753_5vrPxvGXSl4X63p9WeWTxliKRPeVE5Y9.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'sophia@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(5, 'Noah Miller', 'Sales Executive', 'https://as2.ftcdn.net/v2/jpg/03/26/98/51/1000_F_326985142_1aaKcEjMQW6ULp6oI9MYuv8lN9f8sFmj.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'noah@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(6, 'Olivia Wilson', 'Customer Support Representative', 'https://as2.ftcdn.net/v2/jpg/08/68/64/37/1000_F_868643794_cczS2b0ktNJLvIXCceSL563Av2tDMoAC.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'olivia@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(7, 'James Taylor', 'Operations Manager', 'https://as1.ftcdn.net/v2/jpg/03/07/57/54/1000_F_307575473_NaZ8XNxe1BBt5Z0fKgMZWJgb1JIzDuYR.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'james@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(8, 'Ava Anderson', 'Product Manager', 'https://as1.ftcdn.net/v2/jpg/02/23/96/38/1000_F_223963895_ETjuE18yYzwwbn7UN6ErGoo6AhMPvWc0.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'ava@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(9, 'Ethan Martinez', 'Graphic Designer', 'https://as2.ftcdn.net/v2/jpg/02/97/24/51/1000_F_297245133_gBPfK0h10UM3y7vfoEiBC3ZXt559KZar.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'ethan@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe'),
(10, 'Jane Smith', 'IT Support Specialist', 'https://as2.ftcdn.net/v2/jpg/03/30/18/59/1000_F_330185963_XgQLEwslG1Gbd7uvJDidjOWa0nj6CJrZ.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloribus corporis fuga omnis tempore alias corrupti aliquid ut aperiam ipsam.', 'jane@example.com', '$2y$10$ArtRA1rgvQfiMWs1eAM57OXf2HQJOHTJYC1//iFTIuWjWFA6E7MOe');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `voter_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voter_id`, `nominee_id`, `category_id`, `comment`, `created_at`) VALUES
(2, 1, 2, 2, 'tttttttttt', '2024-11-29 02:00:51'),
(3, 1, 7, 3, 'sssssssssssss', '2024-11-29 10:46:05'),
(4, 1, 9, 4, 'uuuuuuuuuuuu', '2024-11-29 10:46:13'),
(5, 2, 1, 1, 'wwww', '2024-11-29 10:47:24'),
(6, 2, 3, 2, 'ggg', '2024-11-29 10:47:29'),
(7, 2, 4, 3, 'rrr', '2024-11-29 10:47:35'),
(8, 2, 5, 4, 'ddd', '2024-11-29 10:47:41'),
(9, 3, 6, 1, 'www', '2024-11-29 10:48:16'),
(10, 3, 7, 2, 'rrr', '2024-11-29 10:48:21'),
(11, 3, 8, 3, 'ffff', '2024-11-29 10:48:28'),
(12, 3, 9, 4, 'uuuu', '2024-11-29 10:48:34'),
(13, 4, 7, 3, 'rrr', '2024-11-29 10:49:25'),
(14, 4, 10, 1, 'www', '2024-11-29 10:49:31'),
(15, 4, 5, 2, 'yyy', '2024-11-29 10:49:45'),
(16, 4, 2, 4, 'wwww', '2024-11-29 10:49:52'),
(17, 5, 8, 1, 'eeee', '2024-11-29 10:50:32'),
(18, 5, 4, 2, 'rrr', '2024-11-29 10:50:38'),
(19, 5, 3, 4, 'www', '2024-11-29 10:50:44'),
(20, 5, 1, 3, 'qqq', '2024-11-29 10:50:52'),
(21, 6, 2, 1, 'qqq', '2024-11-29 10:51:28'),
(22, 6, 4, 2, 'eee', '2024-11-29 10:51:35'),
(23, 6, 8, 3, 'rrr', '2024-11-29 10:51:41'),
(24, 6, 10, 4, 'qqq', '2024-11-29 10:51:46'),
(25, 7, 1, 1, 'qqqq', '2024-11-29 10:52:28'),
(26, 7, 3, 2, 'eee', '2024-11-29 10:52:33'),
(27, 7, 5, 3, 'eee', '2024-11-29 10:52:50'),
(28, 7, 9, 4, 'rrrr', '2024-11-29 10:52:58'),
(29, 8, 9, 1, 'eee', '2024-11-29 10:54:00'),
(30, 8, 5, 2, 'rrr', '2024-11-29 10:54:06'),
(31, 8, 2, 3, 'rrr', '2024-11-29 10:54:13'),
(32, 8, 3, 4, 'www', '2024-11-29 10:54:19'),
(33, 9, 10, 1, 'qqq', '2024-11-29 10:55:04'),
(34, 9, 6, 2, 'yyy', '2024-11-29 10:55:10'),
(35, 9, 3, 3, 'rrrr', '2024-11-29 10:55:17'),
(36, 9, 8, 4, 'ttt', '2024-11-29 10:55:24'),
(37, 10, 7, 1, 'rrr', '2024-11-29 10:56:10'),
(38, 10, 4, 2, 'ttt', '2024-11-29 10:56:15'),
(39, 10, 1, 3, 'yyy', '2024-11-29 10:56:19'),
(40, 10, 6, 4, 'eee', '2024-11-29 10:56:27'),
(41, 1, 3, 1, 'wwwwwwwwww', '2024-11-29 15:58:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`),
  ADD KEY `nominee_id` (`nominee_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`nominee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
