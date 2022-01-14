-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2022 at 06:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorials`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `image`, `price`, `quantity`, `type`) VALUES
(82, 'shirt', 'x39dyaf', 'images/product_8.jpg', 2972.00, 56, 'shirts_and_tops'),
(83, 'dresses', 'fmpouc7', 'images/product_20.jpg', 503.00, 60, 'dresses'),
(84, 'shorts', 'ba521ok', 'images/product_57.jpeg', 2588.00, 80, 'shorts_and_skirts'),
(85, 'jackets', '3nsyomw', 'images/product_51.jpeg', 1005.00, 88, 'jackets'),
(86, 'sleeveless t-shirt', 'ktz4uqh', 'images/product_44.jpeg', 749.00, 54, 'sleeveless'),
(87, 'trousers', '4m9awlx', 'images/product_1.jpg', 2738.00, 46, 'trousers'),
(88, 'addidas shoes', '9f41t5z', 'images/product_60.jpg', 2862.00, 18, 'addidas'),
(89, 'nike shoes', 'oc71pxn', 'images/product_61.jpeg', 1580.00, 38, 'nike'),
(90, 'jumpsuits', '8ti21ev', 'images/product_57.jpeg', 270.00, 43, 'jumpsuits'),
(91, 'coat', '412q3av', 'images/product_39.jpeg', 2604.00, 51, 'winter_coats'),
(92, 'tops', 'kg6jwz1', 'images/product_30.jpeg', 2970.00, 24, 'shirts_and_tops'),
(93, 'dresses clothes', 'unhv6qf', 'images/product_50.jpeg', 1893.00, 25, 'dresses'),
(94, 'skirts', 'kj87rhd', 'images/product_9.jpeg', 1373.00, 13, 'shorts_and_skirts'),
(95, 'kids jackets', 'ezyd59i', 'images/product_37.jpg', 1232.00, 15, 'jackets'),
(96, 'royal coat', 'm1d6l5c', 'images/product_15.jpeg', 1895.00, 31, 'coats'),
(97, 'cool jeans', 'a7d1fxo', 'images/product_22.jpeg', 1737.00, 72, 'jeans'),
(98, 'sleeveless shirt', '320gpid', 'images/product_89.jpeg', 1154.00, 22, 'sleeveless'),
(99, 'cool trousers', 'ag2qz6l', 'images/product_1.jpg', 1503.00, 81, 'trousers'),
(100, 'winter coats', 'fe2imna', 'images/product_52.jpeg', 1633.00, 83, 'winter_coats'),
(101, 'jumpsuits', '42krwts', 'images/product_16.jpeg', 1074.00, 37, 'jumpsuits'),
(102, 'nike shoes', '4fnbkge', 'images/product_62.jpeg', 429.00, 43, 'nike'),
(103, 'addidas shoes', 'bs4grjf', 'images/product_67.jpeg', 1696.00, 70, 'addidas'),
(104, 'shirts', '0xh13f6', 'images/product_40.jpeg', 2795.00, 65, 'sketchers'),
(105, 'jackets', '53q6nfx', 'images/product_9.jpeg', 2645.00, 31, 'jackets'),
(106, 'shirts', 'w2ampui', 'images/product_41.jpeg', 2493.00, 78, 'Shirts_and_tops'),
(107, 'shirt', 'jeqtfs7', 'images/product_24.jpeg', 2384.00, 16, 'Shirts_and_tops'),
(108, 'dresses', 'ef8gqhr', 'images/product_21.jpeg', 2004.00, 19, 'dresses'),
(109, 'shorts', '7a3d4wj', 'images/product_54.jpeg', 581.00, 99, 'shorts_and_skirts'),
(110, 'jackets', 'str2pjv', 'images/product_56.jpeg', 711.00, 67, 'jackets'),
(111, 'sleeveless t-shirt', 'psybfvr', 'images/product_4.jpg', 2999.00, 98, 'sleeveless'),
(112, 'trousers', 'oyeg63w', 'images/product_16.jpeg', 1681.00, 32, 'trousers'),
(113, 'addidas shoes', 'u0n7qzw', 'images/product_72.jpeg', 1715.00, 45, 'addidas'),
(114, 'nike shoes', 'f8ywscr', 'images/product_74.jpeg', 2270.00, 18, 'nike'),
(115, 'jumpsuits', 'mi20s3n', 'images/product_18.jpeg', 2470.00, 27, 'jumpsuits'),
(116, 'coat', 'l0nv7b5', 'images/product_17.jpeg', 2539.00, 66, 'winter_coats'),
(117, 'tops', 'q0selx2', 'images/product_3.jpg', 1039.00, 94, 'Shirts_and_tops'),
(118, 'dresses clothes', 'pdf79xy', 'images/product_12.jpeg', 883.00, 81, 'dresses'),
(119, 'skirts', '4t8ca5o', 'images/product_9.jpeg', 1641.00, 62, 'shorts_and_skirts'),
(120, 'kids jackets', 'aobfqjx', 'images/product_9.jpeg', 2057.00, 37, 'jackets'),
(121, 'royal coat', 'qjnge4a', 'images/product_42.jpeg', 1989.00, 77, 'coats'),
(122, 'cool jeans', 'm01d6y9', 'images/product_85.jpeg', 2640.00, 46, 'jeans'),
(123, 'sleeveless shirt', 'mis1ypa', 'images/product_7.jpg', 2822.00, 68, 'sleeveless'),
(124, 'cool trousers', 'ju354by', 'images/product_8.jpg', 2694.00, 80, 'trousers'),
(125, 'winter coats', 'udlhvs3', 'images/product_14.jpeg', 1868.00, 91, 'winter_coats'),
(126, 'jumpsuits', 'p4wkung', 'images/product_17.jpeg', 1293.00, 87, 'jumpsuits'),
(127, 'nike shoes', 't4r0ga5', 'images/product_75.jpeg', 2995.00, 73, 'nike'),
(128, 'addidas shoes', '09tlzpm', 'images/product_76.jpeg', 2679.00, 80, 'addidas'),
(129, 'shirts', 'cxj91i0', 'images/product_38.jpeg', 2238.00, 73, 'sketchers'),
(130, 'jackets', '2zveypa', 'images/product_51.jpeg', 1074.00, 50, 'jackets'),
(131, 'shirts', 'gufv1pz', 'images/product_46.jpeg', 1982.00, 37, 'Shirts_and_tops'),
(132, 'shirt', 'rimlf70', 'images/product_100.jpg', 2868.00, 20, 'shirts_and_tops'),
(133, 'dresses', '345bjr7', 'images/product_95.jpg', 1240.00, 54, 'dresses'),
(134, 'shorts', '1uwogp6', 'images/product_102.jpg', 2713.00, 41, 'shorts_and_skirts'),
(135, 'jackets', 'rj6w8k1', 'images/product_104.jpg', 813.00, 22, 'jackets'),
(136, 'sleeveless t-shirt', 'u6wgz31', 'images/product_114.jpg', 469.00, 96, 'sleeveless'),
(137, 'trousers', 'ndt1z6u', 'images/product_103.jpg', 1593.00, 27, 'trousers'),
(138, 'addidas shoes', 'wks4fcm', 'images/product_65.jpeg', 2958.00, 27, 'addidas'),
(139, 'nike shoes', 'wqpf71a', 'images/product_66.jpeg', 807.00, 44, 'nike'),
(140, 'jumpsuits', 'yqp87kr', 'images/product_96.jpg', 1861.00, 67, 'jumpsuits'),
(141, 'coat', '7mk1g80', 'images/product_110.jpg', 1317.00, 57, 'winter_coats'),
(142, 'tops', '2frbpn7', 'images/product_119.jpg', 2037.00, 99, 'shirts_and_tops'),
(143, 'dresses clothes', 'ht5kdvs', 'images/product_108.jpg', 1939.00, 55, 'dresses'),
(144, 'skirts', '5rsgonk', 'images/product_111.jpg', 1200.00, 47, 'shorts_and_skirts'),
(145, 'kids jackets', 'tdrhs04', 'images/product_105.jpg', 1100.00, 47, 'jackets'),
(146, 'royal coat', 'lrf6mgk', 'images/product_94.jpg', 253.00, 11, 'coats'),
(147, 'cool jeans', 'u784dt5', 'images/product_8.jpg', 1517.00, 99, 'jeans'),
(148, 'sleeveless shirt', '64iue5r', 'images/product_89.jpeg', 948.00, 21, 'sleeveless'),
(149, 'cool trousers', 'zxnkapb', 'images/product_113.jpg', 547.00, 81, 'trousers'),
(150, 'winter coats', '5k3bvao', 'images/product_118.jpg', 1521.00, 99, 'winter_coats'),
(151, 'jumpsuits', 'wd28r7l', 'images/product_101.jpg', 2826.00, 36, 'jumpsuits'),
(152, 'nike shoes', '98vd2rq', 'images/product_80.jpeg', 1274.00, 76, 'nike'),
(153, 'addidas shoes', '1w8l4hz', 'images/product_79.jpeg', 1700.00, 77, 'addidas'),
(154, 'shirts', 'jb0s4ed', 'images/product_107.jpg', 400.00, 63, 'sketchers'),
(155, 'jackets', 'mc01abu', 'images/product_112.jpg', 2218.00, 81, 'jackets'),
(156, 'full shirts', 'tc86r0e', 'images/product_116.jpg', 1429.00, 56, 'shirts_and_tops');

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`id`, `email`) VALUES
(1, 'hacker123521@gmail.com'),
(3, 'infinity13521@gmail.com'),
(4, 'abc@gmail.com'),
(5, 'xyz@gmail.com'),
(6, 'xyz@gal.com'),
(7, 'ok@gmi.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verified` int(4) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
(26, 'amit', '34@gmail.com', 0, 'b7258d76bb344b3de1d12c1a0becfc863c6c84cc00a188967f00a3a826d7afe21b51209ccf29564eeee5c88555f90a7b713e', '$2y$10$njLlCPHghJHzfgrcB2MxF.Z18FtqG0P9uoc/pWWBjJBi0gaVWJJhK'),
(27, 'xyz', 'xyz@gmail.com', 0, '6414ec066d03959fccd851bffe1f43236198500149f1e8c4491d1e2dfa5dff5b8833dfdfe67966735140683e973c011de18f', '$2y$10$Qyuo4xSbHZXbz2I.jIunfOHgWhhfxPRNsWUlsdLaw5XqXiw5RH8di'),
(28, 'amit kumar', 'amitsharma8303982959@gmail.com', 0, 'e0c7b9ee96217e9de11322aa9ee55e039b2cc2d93c617cc88632662c1466c16c2d624784f554d27632ee89d7fb363eb9b865', '$2y$10$8wbSFGs0IlDZA8YY3GoDlurd85nd88tkkpeAPcD3XGpGu9IdnFmNO');

-- --------------------------------------------------------

--
-- Table structure for table `xproducts`
--

CREATE TABLE `xproducts` (
  `id_product` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xproducts`
--

INSERT INTO `xproducts` (`id_product`, `name`, `description`, `price`) VALUES
(213, 'product_50', 'Some random description', '65.00'),
(212, 'product_49', 'Some random description', '64.00'),
(211, 'product_48', 'Some random description', '63.00'),
(210, 'product_47', 'Some random description', '62.00'),
(209, 'product_46', 'Some random description', '61.00'),
(208, 'product_45', 'Some random description', '60.00'),
(207, 'product_44', 'Some random description', '59.00'),
(206, 'product_43', 'Some random description', '58.00'),
(205, 'product_42', 'Some random description', '57.00'),
(204, 'product_41', 'Some random description', '56.00'),
(203, 'product_40', 'Some random description', '55.00'),
(202, 'product_39', 'Some random description', '54.00'),
(201, 'product_38', 'Some random description', '53.00'),
(200, 'product_37', 'Some random description', '52.00'),
(199, 'product_36', 'Some random description', '51.00'),
(198, 'product_35', 'Some random description', '50.00'),
(197, 'product_34', 'Some random description', '49.00'),
(196, 'product_33', 'Some random description', '48.00'),
(195, 'product_32', 'Some random description', '47.00'),
(194, 'product_31', 'Some random description', '46.00'),
(193, 'product_30', 'Some random description', '45.00'),
(192, 'product_29', 'Some random description', '44.00'),
(191, 'product_28', 'Some random description', '43.00'),
(190, 'product_27', 'Some random description', '42.00'),
(189, 'product_26', 'Some random description', '41.00'),
(188, 'product_25', 'Some random description', '40.00'),
(187, 'product_24', 'Some random description', '39.00'),
(186, 'product_23', 'Some random description', '38.00'),
(185, 'product_22', 'Some random description', '37.00'),
(184, 'product_21', 'Some random description', '36.00'),
(183, 'product_20', 'Some random description', '35.00'),
(182, 'product_19', 'Some random description', '34.00'),
(181, 'product_18', 'Some random description', '33.00'),
(180, 'product_17', 'Some random description', '32.00'),
(179, 'product_16', 'Some random description', '31.00'),
(178, 'product_15', 'Some random description', '30.00'),
(177, 'product_14', 'Some random description', '29.00'),
(176, 'product_13', 'Some random description', '28.00'),
(175, 'product_12', 'Some random description', '27.00'),
(174, 'product_11', 'Some random description', '26.00'),
(173, 'product_10', 'Some random description', '25.00'),
(172, 'product_9', 'Some random description', '24.00'),
(171, 'product_8', 'Some random description', '23.00'),
(170, 'product_7', 'Some random description', '22.00'),
(169, 'product_6', 'Some random description', '21.00'),
(168, 'product_5', 'Some random description', '20.00'),
(167, 'product_4', 'Some random description', '19.00'),
(166, 'product_3', 'Some random description', '18.00'),
(165, 'product_2', 'Some random description', '17.00'),
(164, 'product_1', 'Some random description', '16.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xproducts`
--
ALTER TABLE `xproducts`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `xproducts`
--
ALTER TABLE `xproducts`
  MODIFY `id_product` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
