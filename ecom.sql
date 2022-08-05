-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 08:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(4, 'Vegetable', 1),
(5, 'Shari', 1),
(6, 'Baby Toy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Demo', 'demo@gmail.com', '01911387550', 'Hello are you there?', '2021-04-28 11:50:46'),
(2, 'Md Al Mamun Sohag', 'sohagjone@gmail.com', '01911387550', 'Hello How Are you?', '2021-05-05 06:20:05'),
(3, 'Mr Test', 'test@email.com', '15452645', 'Hello How much price in Tomato? I need 50 kg. Please let me know 50 kg available.', '2021-05-05 07:29:36'),
(4, 'Md Al Mamun Sohag', 'sohagjone@gmail.com', '01911387550', 'Hello are you there?', '2021-05-05 11:51:03'),
(5, 'Oredhi', 'oredhi@gmail.com', '01911387550', 'Hello This is test message!', '2021-05-05 11:53:25'),
(6, 'sdgsdfg', 'sgsdfg', 'sdfgsdfg', '', '2021-05-06 03:20:10'),
(7, 'sohag', 'sohagjone@gmail.com', '01911387550', '', '2021-05-06 03:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(1, 'cupon#1', 100, 'Taka', 100, 1),
(2, 'cupon#2', 10, 'Taka', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `mihpayid` varchar(20) NOT NULL,
  `payu_status` varchar(10) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_value` int(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txnid`, `mihpayid`, `payu_status`, `coupon_id`, `coupon_value`, `coupon_code`, `added_on`) VALUES
(1, 1, 'Test', 'test', 0, 'COD', 344960, 'pending', 2, 'e1bcda901388c2c25bc2', '', '', 0, 0, '', '2021-07-14 12:07:00'),
(2, 1, 'Test', 'test', 0, 'payu', 190000, 'pending', 2, '5fdfe75bba50b4b9a87a', '', '', 0, 0, '', '2021-07-14 12:08:35'),
(3, 1, 'Test', 'test', 0, 'payu', 300, 'pending', 2, '14bfc2c247d63c461385', '', '', 0, 0, '', '2021-07-14 12:10:08'),
(4, 1, 'Test', 'test', 0, 'payu', 0, 'pending', 2, 'a085739c0b7d2a6fecf8', '', '', 0, 0, '', '2021-07-14 12:10:35'),
(5, 1, 'Test', 'test', 0, 'COD', 8, 'pending', 2, 'a1fdf2604b4c40725aba', '', '', 0, 0, '', '2021-07-14 12:11:17'),
(6, 1, 'Test', 'test', 0, 'COD', 80, 'pending', 2, 'c30c1a2cd1e6e4516704', '', '', 0, 0, '', '2021-07-14 12:13:52'),
(7, 1, 'Test', 'test', 0, 'COD', 105, 'pending', 2, '95ef431f050e61367c3d', '', '', 0, 0, '', '2021-07-14 12:34:55'),
(8, 1, 'Test', 'test', 0, 'payu', 256, 'pending', 2, '2a1dac2c2e9b6fa5c736', '', '', 0, 0, '', '2021-07-14 07:53:45'),
(9, 1, 'Test', 'test', 0, 'payu', 0, 'pending', 2, 'a931a1a513b270b3ba71', '', '', 0, 0, '', '2021-07-14 07:54:05'),
(10, 1, 'Test', 'test', 0, 'payu', 100, 'pending', 2, '845c893c67928ad07a62', '', '', 0, 0, '', '2021-07-14 07:54:45'),
(11, 1, 'Test', 'test', 0, 'payu', 594, 'pending', 2, '1d440966994c13405fa9', '', '', 0, 0, '', '2021-07-14 07:58:02'),
(12, 7, 'Jessore', 'Jessore', 7401, 'COD', 385, 'pending', 2, '9cc253088dbf6cb8cd10', '', '', 1, 100, 'Cupon#1', '2021-07-30 10:26:10'),
(13, 7, 'Jessore', 'Jessore', 7401, 'COD', 40, 'pending', 2, '8defab6fb7ec01be8db6', '', '', 1, 100, 'Cupon#1', '2021-08-01 11:28:00'),
(14, 7, 'Jessore', 'Jessore', 7401, 'COD', 50, 'pending', 2, 'b480185b8d35a3a3de32', '', '', 0, 0, '', '2021-08-01 11:49:46'),
(15, 7, 'Jessore', 'Jessore', 7401, 'COD', 40, 'pending', 2, '85f8c8fd296f0ef6af04', '', '', 0, 0, '', '2021-08-03 10:13:41'),
(16, 7, 'Dhaka', 'Dhaka', 1236, 'COD', 0, 'pending', 2, '152dac2d4c37456a9cf0', '', '', 0, 0, '', '2021-08-03 10:15:11'),
(17, 7, 'Magura', 'Magura', 7454, 'COD', 42, 'pending', 2, '027dcf65423d37cf6916', '', '', 0, 0, '', '2021-08-03 10:17:16'),
(18, 7, 'Jessore', 'Jessore', 7401, 'COD', 130, 'pending', 2, '42bb83b588f78f22fede', '', '', 2, 10, 'Cupon#2', '2021-08-04 07:31:07'),
(19, 7, 'Monirampur', 'Jessore', 7401, 'COD', 24, 'pending', 2, '30fe7721ccb13aa519c2', '', '', 0, 0, '', '2021-08-04 07:52:26'),
(20, 8, 'test', 'test', 0, 'COD', 72, 'pending', 2, 'a8c6dc056ab0f77bd6b2', '', '', 0, 0, '', '2021-08-04 07:55:11'),
(21, 8, 'Magura', 'Jessore', 7401, 'COD', 150, 'pending', 2, '412eb804211c4a8acb35', '', '', 2, 10, 'Cupon#2', '2021-08-04 07:58:08'),
(22, 8, 'Satkhira', 'Satkhira', 0, 'payu', 300, 'pending', 1, '9cf4092b005817a20ac0', '', '', 1, 100, 'Cupon#1', '2021-08-04 08:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 21, 98, 3520),
(2, 2, 20, 95, 2000),
(3, 3, 17, 50, 6),
(4, 5, 16, 1, 8),
(5, 6, 16, 10, 8),
(6, 7, 15, 15, 7),
(7, 8, 16, 9, 8),
(8, 8, 12, 14, 6),
(9, 8, 10, 10, 10),
(10, 10, 10, 10, 10),
(11, 11, 17, 99, 6),
(12, 12, 11, 20, 6),
(13, 12, 14, 5, 8),
(14, 12, 13, 5, 8),
(15, 12, 10, 5, 10),
(16, 12, 12, 5, 6),
(17, 12, 17, 5, 6),
(18, 12, 15, 5, 7),
(19, 12, 16, 5, 8),
(20, 13, 15, 20, 7),
(21, 14, 10, 5, 10),
(22, 15, 13, 5, 8),
(23, 16, 20, 0, 2000),
(24, 16, 21, 0, 3520),
(25, 17, 12, 7, 6),
(26, 18, 15, 20, 7),
(27, 19, 13, 3, 8),
(28, 20, 17, 12, 6),
(29, 21, 14, 20, 8),
(30, 22, 22, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Complete'),
(3, 'Processing'),
(4, 'Shipped'),
(5, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `meta_keyword`, `meta_title`, `meta_desc`, `status`) VALUES
(6, 0, 0, 'user', 10, 10, 20, '37216elementor.png', 'option', 'option', 0, 'option', 'option', 'option', 1),
(7, 0, 0, 'vsxcvxcv', 10, 10, 20, '64474elementor.png', 'fdasdf', 'asdfads', 0, 'asdfasd', 'asdfasd', 'afd', 1),
(10, 4, 0, 'Tomato', 8, 10, 100, '59058tomato.jpg', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 0, 'tomato', 'tomato', 'tomato', 1),
(11, 4, 0, 'Pepper', 5, 6, 200, '29531pepper.jpg', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 0, 'Pepper', 'pepper', 'Pepper', 1),
(12, 4, 0, 'CuCumber', 5, 6, 50, '62365cumber.jpg', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 1, 'CuCumber', 'CuCumber', 'CuCumber', 1),
(13, 4, 0, 'Brinjal', 5, 8, 20, '91259220px-Aubergine.jpg', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 'In Informatics, dummy data is benign information that does not contain any useful data, but serves to reserve space where real data is nominally present. Dummy data can be used as a placeholder for both testing and operational purposes.', 0, 'brinjal', 'brinjal', 'brinjal', 1),
(14, 4, 0, 'Cauliflower', 10, 8, 80, '25474Cauliflower.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Cauliflower', 1, 'Cauliflower', 'Cauliflower', 'Cauliflower', 1),
(15, 4, 0, 'Potato', 5, 7, 500, '43758potato.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, 'potato', 'potato', 'potato', 1),
(16, 4, 0, 'Kochu', 6, 8, 20, '84854kochu.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 'kochu', 'kochu', 'kochu', 1),
(17, 4, 0, 'borboti', 5, 6, 100, '31398borboti.jpeg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 'borboti', 'borboti', 'borboti', 1),
(20, 5, 4, 'Indian Silk', 2500, 2000, 100, '12801silk.jpg', 'Indian Silk', 'Indian', 1, '', '', '', 1),
(21, 5, 3, 'Indian Katan', 3000, 3520, 600, '888291604564348100_0..jpg', 'Katan Sari Indian', 'Katan Sari Indian', 1, '', '', '', 1),
(22, 4, 5, 'Apple', 100, 100, 1000, '94142apple.jpg', 'Authentic Apple', 'Authentic Apple', 1, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(3, 5, 'Katan', 1),
(4, 5, 'Silk', 1),
(5, 4, 'Fruit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(7, 'sohag', 'bablujone1', 'sohagjone@gmail.com', '01911387550', '2021-07-30 10:25:00'),
(8, 'Alpona', 'bablujone1', 'mamunjone@gmail.com', '01911358452', '2021-08-04 07:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(30, 1, 18, '2021-07-06 06:19:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
