-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 11:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `autor`, `price`, `photo`, `description`, `category`, `created_at`) VALUES
(22, 'AURING\'S WARTH', 'JUSTIN DEPAOLI', 33.20, '1597463784-book11.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, eos quam natus ex perspiciatis architecto vitae atque aspernatur rem aperiam laborum facere pariatur dolorem odit rerum suscipit incidunt? Culpa, sed!', 'NEW RELEASE', '2020-08-15 03:56:24'),
(24, 'SHE', 'DENIY BIBER', 44.55, '1597465080-51ciZQ5ECBL._AC_SY400_.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'NEW RELEASE', '2020-08-15 04:18:00'),
(25, 'A PASSAGE TO INDIA', 'E.M.FORSTER', 33.45, '1597465384-51IaTtJ2bfL._SX330_BO1,204,203,200_.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'TOP SELLER', '2020-08-15 04:23:04'),
(26, 'ROBINSON CURSOE', 'DANIEL DEFORE', 23.44, '1597465451-91QrdjEeQyL.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'NEW RELEASE', '2020-08-15 04:24:11'),
(28, 'AYESHA AT LAST', 'JALALUDDIN', 34.56, '1597465635-43124133.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'TOP SELLER', '2020-08-15 04:27:15'),
(29, 'CATCH 22', 'JOSEPH HELLER', 66.54, '1597465709-images.jpeg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'TOP SELLER', '2020-08-15 04:28:29'),
(31, 'GONE WITH THE WIND', 'MARGARET MITCHELL', 99.50, '1597466841-images_(5).jpeg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'COMMING SOON', '2020-08-15 04:47:21'),
(32, 'MIDNIGHT CHILDREN', 'SALMAN RUSHDIE', 7.53, '1597466989-images_(1).jpeg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'COMMING SOON', '2020-08-15 04:49:49'),
(33, 'AYESHA AT LAST', 'H.RIDER.HAGGARD', 45.40, '1597471583-220px-HRiderHaggard_Ayesha.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'TOP SELLER', '2020-08-15 06:06:23'),
(34, 'PHOTOGRAPHY', 'DAVID LWIS', 44.30, '1597480489-book4.jpeg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'NEW RELEASE', '2020-08-15 08:34:49'),
(35, 'AURING WARTHghi8gy8utg', 'JUSTIN DEPAOLI', 44.56, '1597895838-images.jpeg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'TOP SELLER', '2020-08-15 08:36:03'),
(36, 'A PASSAGE TO INDIA', 'E.M.FORSTER', 35.33, '1597480695-51IaTtJ2bfL._SX330_BO1,204,203,200_.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'NEW RELEASE', '2020-08-15 08:38:15'),
(37, 'THE ALCHEMIST', 'PAULO COELHO', 56.54, '1597896862-images_(4).jpeg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'NEW RELEASE', '2020-08-20 04:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`) VALUES
(34, 1, 26),
(35, 1, 36),
(37, 1, 34),
(38, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
