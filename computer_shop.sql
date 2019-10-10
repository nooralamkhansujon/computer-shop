-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2019 at 07:31 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_shop`
--
CREATE DATABASE IF NOT EXISTS `computer_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `computer_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images\\brand\\default.png',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `date`) VALUES
(1, 'HP', 'Our vision is to create technology that makes life better for everyone, everywhere — every person, every organization, and every community around the globe. This motivates us — inspires us — to do what we do. To make what we make. To invent, and to reinvent. To engineer experiences that amaze. We won’t stop pushing ahead, because you won’t stop pushing ahead. You’re reinventing how you work. How you play. How you live. With our technology, you’ll reinvent your world.', 'images\\brand\\default.png', '2019-07-22 15:23:00'),
(2, 'A4Tech', 'Our vision is to create technology that makes life better for everyone, everywhere — every person, every organization, and every community around the globe. This motivates us — inspires us — to do what we do. To make what we make. To invent, and to reinvent. To engineer experiences that amaze. We won’t stop pushing ahead, because you won’t stop pushing ahead. You’re reinventing how you work. How you play. How you live. With our technology, you’ll reinvent your world.', 'images\\brand\\default.png', '2019-07-22 15:23:00'),
(3, 'DELL', 'Dell traces its origins to 1984, when Michael Dell created Dell Computer Corporation, which at the time did business as PC\'s Limited,[12][13] while a student of the University of Texas at Austin. The dorm-room headquartered company sold IBM PC-compatible computers built from stock components.[14] Dell dropped out of school to focus full-time on his fledgling business, after getting $1,000 in expansion-capital from his family. In 1985, the company produced the first computer of its own design, the Turbo PC, which sold for $795.[15] PC\'s Limited advertised its systems in national computer magazines for sale directly to consumers and custom assembled each ordered unit according to a selection of options. The company grossed more than $73 million in its first year of operation.', 'images\\brand\\default.png', '2019-07-22 15:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'images\\category\\default.jpg',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `date`, `parent_id`) VALUES
(1, 'keyboard', 'images\\category\\default.jpg', '2019-07-22 17:49:00', 0),
(2, 'Laptop', 'images\\category\\default.jpg', '2019-07-22 17:49:00', 0),
(3, 'Mouse', 'images\\category\\default.jpg', '2019-07-22 17:49:00', 16),
(7, 'Ram', 'images\\category\\default.jpg', '2019-07-22 17:49:00', 16),
(13, 'Cashing', 'images/category/15639814837.jpg', '2019-07-24 15:18:03', 16),
(14, 'Pen Drive', 'images/category/15639815948.jpg', '2019-07-24 15:19:54', 16),
(15, 'Monitor', 'images/category/15641210974.jpg', '2019-07-26 06:04:57', 0),
(16, 'Accessories', 'images\\category\\default.jpg', '2019-07-26 09:21:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images\\product\\default.jpg',
  `avater_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `avater_alt`) VALUES
(1, 1, 'images\\product\\default.jpg', 'default-image'),
(2, 2, 'images\\product\\default.jpg', 'default-image'),
(3, 15, 'images\\product\\15638950938.jpg', 'A4TECH-BLOODY-Q80-NEON-Xâ€™GLIDE-GAMING-MOUSE'),
(4, 15, 'images\\product\\15638950937.jpg', 'A4TECH-BLOODY-Q80-NEON-Xâ€™GLIDE-GAMING-MOUSE'),
(5, 15, 'images\\product\\15638950934.jpg', 'A4TECH-BLOODY-Q80-NEON-Xâ€™GLIDE-GAMING-MOUSE'),
(12, 17, 'images/product/15639816768.jpg', 'ADATA-S-102-16GB-Pro-Pen-Drive'),
(13, 18, 'images/product/15639817716.jpg', 'ADATA-UC-330-16GB-android-pendrive'),
(14, 19, 'images/product/15639818605.jpg', 'ADATA-UC-330-32GB-android-pendrive'),
(15, 20, 'images/product/15639819395.jpg', 'ADATA-UC-350-OTG-32GB-Type-C-Pendrive'),
(16, 21, 'images/product/15639820565.jpg', 'ADATA-UV-128-32GB-Pendrive-Black-and-Blue'),
(17, 22, 'images/product/15639821989.jpg', 'Dell-Inspiron-N3467-7th-Gen-Core-i7-2GB-Graphics'),
(18, 23, 'images/product/156398230910.jpg', 'Dell-Inspiron-N3567-7th-Gen-Core-i7-2GB-Graphics'),
(19, 24, 'images/product/15639823607.jpg', 'Dell-Inspiron-N5378-7th-Gen-Core-i3-Touch-Display-360Â°'),
(20, 25, 'images/product/15639824134.jpg', 'Dell-Inspiron-N5570-8th-Gen-Core-i5-2GB-Graphics'),
(21, 27, 'images/product/15639855596.jpg', 'Dell-Inspiron-N5567-7th-Gen-Core-i5-2GB-Graphics'),
(22, 28, 'images/product/15639864888.jpg', 'Dell-Inspiron-N7567-7th-Gen-Core-i5-4GB-Graphics-à§³-88,000.00-Dell-Inspiron-N7567-7th-Gen-Core-i5-4GB-Graphics'),
(23, 29, 'images/product/15639866387.jpg', 'Dell-Laptop-Latitude-3490-7th-Gen-Core-i3'),
(24, 30, 'images/product/15639869277.jpg', 'Dell-Laptop-Latitude-3490-8th-Gen-Core-i5'),
(25, 31, 'images/product/15639870448.jpg', 'A4TECH-3000N-WIRELESS-KEYBOARD-MOUSE-COMBO'),
(26, 31, 'images/product/15639870447.jpg', 'A4TECH-3000N-WIRELESS-KEYBOARD-MOUSE-COMBO'),
(27, 31, 'images/product/156398704410.jpg', 'A4TECH-3000N-WIRELESS-KEYBOARD-MOUSE-COMBO'),
(28, 32, 'images/product/15639871767.jpg', 'A4TECH-KLS-5-MULTIMEDIA-KEYBOARD'),
(29, 32, 'images/product/15639871769.jpg', 'A4TECH-KLS-5-MULTIMEDIA-KEYBOARD'),
(30, 32, 'images/product/156398717610.jpg', 'A4TECH-KLS-5-MULTIMEDIA-KEYBOARD'),
(31, 33, 'images/product/15639873267.jpg', 'A4TECH-BLOODY-B760-FULL-LIGHT-STRIKE-GAMING-KEYBOARD'),
(32, 33, 'images/product/15639873265.jpg', 'A4TECH-BLOODY-B760-FULL-LIGHT-STRIKE-GAMING-KEYBOARD'),
(33, 33, 'images/product/15639873267.jpg', 'A4TECH-BLOODY-B760-FULL-LIGHT-STRIKE-GAMING-KEYBOARD'),
(34, 34, 'images/product/156412129910.jpg', 'Dell-OptiPlex-5060-Tower-8th-Gen-Core-i7'),
(35, 34, 'images/product/15641212995.jpg', 'Dell-OptiPlex-5060-Tower-8th-Gen-Core-i7'),
(36, 34, 'images/product/15641212997.jpg', 'Dell-OptiPlex-5060-Tower-8th-Gen-Core-i7'),
(37, 35, 'images/product/15641214169.jpg', 'Dell-OptiPlex-7050-Tower-7th-Gen-Core-i7'),
(38, 35, 'images/product/15641214165.jpg', 'Dell-OptiPlex-7050-Tower-7th-Gen-Core-i7'),
(39, 35, 'images/product/15641214165.jpg', 'Dell-OptiPlex-7050-Tower-7th-Gen-Core-i7'),
(40, 36, 'images/product/15641214748.jpg', 'Dell-Vostro-3470SFF-8th-Gen-Intel-Core-i3'),
(41, 36, 'images/product/156412147410.jpg', 'Dell-Vostro-3470SFF-8th-Gen-Intel-Core-i3'),
(42, 36, 'images/product/15641214749.jpg', 'Dell-Vostro-3470SFF-8th-Gen-Intel-Core-i3'),
(43, 37, 'images/product/15641216217.jpg', 'Dell-OptiPlex-3060-Tower-8th-Gen-Core-i3'),
(44, 37, 'images/product/15641216215.jpg', 'Dell-OptiPlex-3060-Tower-8th-Gen-Core-i3'),
(45, 37, 'images/product/15641216217.jpg', 'Dell-OptiPlex-3060-Tower-8th-Gen-Core-i3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `tag` text NOT NULL,
  `status` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `tag`, `status`, `price`, `brand_id`, `date`) VALUES
(1, 'A4TECH KR-90 COMFORT KEY KEYBOARD', 1, '                                               A4TECH KR-90 COMFORT KEY KEYBOARD is to create technology that makes life better for everyone, everywhere ï¿½ every person, every organization, and every community around the globe. This motivates us ï¿½ inspires us ï¿½ to do what we do. To make what we make. To invent, and to reinvent. To engineer experiences that amaze. We wonï¿½t stop pushing ahead, because you wonï¿½t stop pushing ahead. Youï¿½re reinventing how you work. How you play. How you live. With our technology, youï¿½ll reinvent your world.                                        ', 0, 50000, '1', '2019-07-22 18:35:37'),
(2, 'A4TECH KR-92 COMFORT KEY KEYBOARD', 1, 'Laser printing keycaps make the letter or character always new even after your long-term use. Simple and basic yet meets the requirements.Ease keystrokes on your fingertips. Providing hours of typing comfort. Ensure you will never loose key identity. Adjustable tilt enable a truly personalized experience.', 0, 4000, '2', '2019-07-22 18:35:37'),
(15, 'A4TECH BLOODY Q80 NEON Xâ€™GLIDE GAMING MOUSE', 3, '                                                                              A4TECH BLOODY Q80 NEON Xâ€™GLIDE GAMING MOUSEA4TECH BLOODY Q80 NEON Xâ€™GLIDE GAMING MOUSEA4TECH BLOODY Q80 NEON Xâ€™GLIDE GAMING MOUSE                                                                                ', 0, 82000, '2', '2019-07-23 15:18:13'),
(17, 'ADATA S 102 16GB Pro Pen Drive', 14, 'ADATA S 102 Pro Pen Drive 16GB, ADATA S 102 Pro Pen Drive 16GB Price in BDADATA S 102 Pro Pen Drive 16GB, ADATA S 102 Pro Pen Drive 16GB Price in BDADATA S 102 Pro Pen Drive 16GB, ADATA S 102 Pro Pen Drive 16GB Price in BDADATA S 102 Pro Pen Drive 16GB, ADATA S 102 Pro Pen Drive 16GB Price in BDADATA S 102 Pro Pen Drive 16GB, ADATA S 102 Pro Pen Drive 16GB Price in BDADATA S 102 Pro Pen Drive 16GB, ADATA S 102 Pro Pen Drive 16GB Price in BD                    ', 1, 82000, '3', '2019-07-24 15:21:16'),
(18, 'ADATA UC 330 16GB android pendrive', 14, ' ADATA UC 330 (android pendrive) 16 GB, ADATA UC 330 (android pendrive) 16 GB Price in BD                    ', 1, 82000, '3', '2019-07-24 15:22:51'),
(19, 'ADATA UC 330 32GB android pendrive', 14, 'ADATA UC 330 32GB android pendriveADATA UC 330 32GB android pendrive                    ', 1, 19000, '3', '2019-07-24 15:24:20'),
(20, 'ADATA UC 350 OTG 32GB Type-C Pendrive', 14, 'ADATA presents the new-generation, dual standard connector UC350 Flash drive, which brings you major steps forward in data convenience and performance. Itâ€™s USB 3.1 for the fastest transmission speeds, and even better, weâ€™ve built it with both a regular USB connector and a reversible USB Type-C plug for instant connections minus the guesswork. The UC350 works with MacBooks, PCs, iOS and Android devices for true universal access.                    ', 1, 19000, '3', '2019-07-24 15:25:39'),
(21, 'ADATA UV 128 32GB Pendrive Black and Blue', 14, 'ADATA UV 128 Black Blue 32 GB, ADATA UV 128 Black Blue 32 GB Price in BDADATA UV 128 Black Blue 32 GB, ADATA UV 128 Black Blue 32 GB Price in BDADATA UV 128 Black Blue 32 GB, ADATA UV 128 Black Blue 32 GB Price in BD                    ', 1, 4000, '3', '2019-07-24 15:27:36'),
(22, 'Dell Inspiron N3467 7th Gen Core i7 2GB Graphics', 2, ' Dell Inspiron N3467 7th Gen Core i7 2GB GraphicsDell Inspiron N3467 7th Gen Core i7 2GB GraphicsDell Inspiron N3467 7th Gen Core i7 2GB GraphicsDell Inspiron N3467 7th Gen Core i7 2GB GraphicsDell Inspiron N3467 7th Gen Core i7 2GB Graphics                   ', 1, 19000, '3', '2019-07-24 15:29:58'),
(23, 'Dell Inspiron N3567 7th Gen Core i7 2GB Graphics', 2, 'Dell Inspiron N3567 7th Gen Core i7 2GB GraphicsDell Inspiron N3567 7th Gen Core i7 2GB GraphicsDell Inspiron N3567 7th Gen Core i7 2GB GraphicsDell Inspiron N3567 7th Gen Core i7 2GB GraphicsDell Inspiron N3567 7th Gen Core i7 2GB Graphics                    ', 1, 570000, '3', '2019-07-24 15:31:49'),
(24, 'Dell Inspiron N5378 7th Gen Core i3 Touch Display 360Â°', 2, '   Dell Inspiron N5378 7th Gen Core i3 Touch Display 360Â°Dell Inspiron N5378 7th Gen Core i3 Touch Display 360Â°Dell Inspiron N5378 7th Gen Core i3 Touch Display 360Â°Dell Inspiron N5378 7th Gen Core i3 Touch Display 360Â°                 ', 1, 600000, '3', '2019-07-24 15:32:40'),
(25, 'Dell Inspiron N5570 8th Gen Core i5 2GB Graphics', 2, 'Dell Inspiron N5570 8th Gen Core i5 2GB GraphicsDell Inspiron N5570 8th Gen Core i5 2GB GraphicsDell Inspiron N5570 8th Gen Core i5 2GB GraphicsDell Inspiron N5570 8th Gen Core i5 2GB GraphicsDell Inspiron N5570 8th Gen Core i5 2GB Graphics                    ', 1, 71000, '3', '2019-07-24 15:33:33'),
(27, 'Dell Inspiron N5567 7th Gen Core i5 2GB Graphics', 2, 'Dell Inspiron N5567 7th Gen Core i5 2GB GraphicsDell Inspiron N5567 7th Gen Core i5 2GB GraphicsDell Inspiron N5567 7th Gen Core i5 2GB GraphicsDell Inspiron N5567 7th Gen Core i5 2GB GraphicsDell Inspiron N5567 7th Gen Core i5 2GB Graphics                    ', 1, 510000, '3', '2019-07-24 16:25:59'),
(28, 'Dell Inspiron N7567 7th Gen Core i5 4GB Graphics Dell Inspiron N7567 7th Gen Core i5 4GB Graphics', 2, 'Dell Inspiron N7567 7th Gen Core i5 4GB Graphics.Dell Inspiron N7567 7th Gen Core i5 4GB GraphicsDell Inspiron N7567 7th Gen Core i5 4GB GraphicsDell Inspiron N7567 7th Gen Core i5 4GB GraphicsDell Inspiron N7567 7th Gen Core i5 4GB GraphicsDell Inspiron N7567 7th Gen Core i5 4GB Graphics                                        ', 0, 570000, '3', '2019-07-24 16:41:28'),
(29, 'Dell Laptop Latitude 3490 7th Gen Core i3', 2, 'Dell Laptop Latitude 3490 7th Gen Core i3. Dell Laptop Latitude 3490 7th Gen Core i3Dell Laptop Latitude 3490 7th Gen Core                     ', 1, 60000, '3', '2019-07-24 16:43:58'),
(30, 'Dell Laptop Latitude 3490 8th Gen Core i5', 2, '8th gen Intel Core i5-8250U (Quad Core, 1.6GHz, 6M cache), RAM 4 GB DDR 4, HDD 1TB, NO DVD, , IntelÂ® HD Graphics, 14.1â€³ HD LED Display, 1.0 MP Webcam, Bluetooth-WiFi, WLAN, Battery, Backpack, Weight: 3.89 lbs (1.76 kg), Free DOS                ', 1, 58999, '3', '2019-07-24 16:48:47'),
(31, 'A4TECH 3000N WIRELESS KEYBOARD MOUSE COMBO', 1, 'A4TECH 3000N WIRELESS KEYBOARD MOUSE COMBOA4TECH 3000N WIRELESS KEYBOARD MOUSE COMBOA4TECH 3000N WIRELESS KEYBOARD MOUSE COMBOA4TECH 3000N WIRELESS KEYBOARD MOUSE COMBOA4TECH 3000N WIRELESS KEYBOARD MOUSE COMBOA4TECH 3000N WIRELESS KEYBOARD MOUSE COMBO                    ', 1, 5000, '2', '2019-07-24 16:50:44'),
(32, 'A4TECH KLS-5 MULTIMEDIA KEYBOARD', 1, 'A4TECH KLS-5 MULTIMEDIA KEYBOARDA4TECH KLS-5 MULTIMEDIA KEYBOARDA4TECH KLS-5 MULTIMEDIA KEYBOARDA4TECH KLS-5 MULTIMEDIA KEYBOARDA4TECH KLS-5 MULTIMEDIA KEYBOARDA4TECH KLS-5 MULTIMEDIA KEYBOARD                    ', 1, 700, '2', '2019-07-24 16:52:56'),
(33, 'A4TECH BLOODY B760 FULL LIGHT STRIKE GAMING KEYBOARD', 1, 'A4TECH BLOODY B760 FULL LIGHT STRIKE GAMING KEYBOARDA4TECH BLOODY B760 FULL LIGHT STRIKE GAMING KEYBOARDA4TECH BLOODY B760 FULL LIGHT STRIKE GAMING KEYBOARDA4TECH BLOODY B760 FULL LIGHT STRIKE GAMING KEYBOARDA4TECH BLOODY B760 FULL LIGHT STRIKE GAMING KEYBOARD                    ', 0, 800, '2', '2019-07-24 16:55:26'),
(34, 'Dell OptiPlex 5060 Tower 8th Gen Core i7', 15, 'Dell OptiPlex 5060 Tower 8th Gen Core i7 Dell OptiPlex 5060 Tower 8th Gen Core i7 Dell OptiPlex 5060 Tower 8th Gen Core i7                    ', 1, 82000, '3', '2019-07-26 06:08:18'),
(35, 'Dell OptiPlex 7050 Tower 7th Gen Core i7', 15, 'Dell OptiPlex 7050 Tower 7th Gen Core i7 Dell OptiPlex 7050 Tower 7th Gen Core i7 Dell OptiPlex 7050 Tower 7th Gen Core i7                    ', 1, 79999, '3', '2019-07-26 06:10:15'),
(36, 'Dell Vostro 3470SFF 8th Gen Intel Core i3', 15, 'Dell Vostro 3470SFF 8th Gen Intel Core i3 Dell Vostro 3470SFF 8th Gen Intel Core i3 Dell Vostro 3470SFF 8th Gen Intel Core i3                    ', 1, 82000, '3', '2019-07-26 06:11:14'),
(37, 'Dell OptiPlex 3060 Tower 8th Gen Core i3', 15, 'Dell OptiPlex 3060 Tower 8th Gen Core i3 Dell OptiPlex 3060 Tower 8th Gen Core i3 Dell OptiPlex 3060 Tower 8th Gen Core i3   Dell OptiPlex 3060 Tower 8th Gen Core i3                  ', 1, 65000, '3', '2019-07-26 06:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `avater` varchar(255) NOT NULL DEFAULT 'images\\user\\default.jpg',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `avater`, `date`) VALUES
(1, 'nooralam khan', 'nooralam@gmail.com', 'testing321', 1, 'images\\user\\15638057254.jpg', '2019-07-22 08:03:39'),
(2, 'atikul', 'atikul@gmail.com', 'testing321', 2, 'images/user/15638063829.png', '2019-07-22 08:03:39'),
(3, 'jakir', 'jakir@gmail.com', 'testing321', 2, 'images\\user\\default.jpg', '2019-07-22 08:03:39'),
(4, 'apu khan', 'apukhan@gmail.com', 'testing321', 2, 'images\\user\\default.jpg', '2019-07-22 08:03:39'),
(5, 'sujat khan', 'sujatkhan@gmail.com', 'testing321', 2, 'images\\user\\default.jpg', '2019-07-24 14:40:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;