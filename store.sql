-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 16, 2020 at 10:21 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group`
--

CREATE TABLE `attribute_group` (
                                   `id` int(10) UNSIGNED NOT NULL,
                                   `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
                                     `attr_id` int(10) UNSIGNED NOT NULL,
                                     `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
                                   `id` int(10) UNSIGNED NOT NULL,
                                   `value` varchar(255) NOT NULL,
                                   `attr_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
                            `id` int(10) UNSIGNED NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `alias` varchar(255) NOT NULL,
                            `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
                            `keywords` varchar(255) DEFAULT NULL,
                            `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(24, 'Men', 'men', 0, '', ''),
(25, 'Women', 'women', 0, '', ''),
(26, 'Nike', 'nike-26', 24, '', ''),
(27, 'Nike', 'nike-27', 25, '', ''),
(28, 'Adiddas', 'adiddas-28', 24, '', ''),
(29, 'Adidas', 'adidas-29', 25, '', ''),
(30, 'New Balance', 'new-balance', 25, '', ''),
(31, 'Fila', 'fila', 25, '', ''),
(33, 'Puma', 'puma', 24, '', ''),
(34, 'Puma', 'puma-34', 25, '', ''),
(35, 'Jordan', 'jordan', 24, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
                            `id` int(10) UNSIGNED NOT NULL,
                            `title` varchar(50) NOT NULL,
                            `code` varchar(3) NOT NULL,
                            `symbol_left` varchar(10) NOT NULL,
                            `symbol_right` varchar(10) NOT NULL,
                            `value` float(15,2) NOT NULL,
                            `base` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `base`) VALUES
(2, 'dollar', 'USD', '$', '', 1.00, '1'),
(3, 'euro', 'EUR', '€', '', 0.88, '0');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
                           `id` int(10) UNSIGNED NOT NULL,
                           `product_id` int(10) UNSIGNED NOT NULL,
                           `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `img`) VALUES
(9, 68, 'a9e8d98b94ac5262051405c2b91b1140.jpg'),
(10, 68, 'f974c271703327e74a9bd6d8ba3d369f.jpg'),
(13, 65, '5c04ffcbeb369a13183f6152a1ec8b81.jpg'),
(16, 69, '898fad4f42169d25f460e2b9916731ac.jpg'),
(17, 70, '0909f24329202696f52c839a4f9c09b5.jpg'),
(18, 71, '0989736b6a93db473ffb64c3ad701988.jpg'),
(19, 72, '6682ed66e1abb4d5ba274d74e506a946.jpg'),
(20, 73, '4f5537a5c6101af2eb8e0ad628751af6.jpg'),
(21, 74, '43086ee514943f9b04debe375c41b42b.jpg'),
(22, 75, 'fed157b7592d95cfc40ee01574bca976.jpg'),
(23, 75, '9b7cc1c955c386a628b18c14f52a0754.jpg'),
(26, 89, '8855b2e83fea7e0103fb5b19ef9fabbf.jpg'),
(27, 89, 'c37747c7384d4205bd6a465c8f4eebbe.jpg'),
(28, 90, '6c71d6367d4de35c67134e3973ee3928.jpg'),
(29, 90, '1a117b159b2b08c2396829f213ebcca0.jpg'),
(30, 91, '2bce83fd315ba51f23b6caec3c24c5ba.jpg'),
(31, 91, '8020bea4a0011a2d5cd0782a8dad539c.jpg'),
(32, 92, 'c398e8398fd53293cbc9641568f22731.jpg'),
(33, 92, '75fb9c6549f3062d75fe9430f7f29852.jpg'),
(34, 93, '2c9317fdd50c50807a47e825f2ddaa84.jpg'),
(35, 93, '4691e777a6330ccd5d9b8700de52ebac.jpg'),
(36, 94, '8a0fe8b9e55c41e40da8541b03d89a5b.jpg'),
(37, 94, '5b01c00b5242db608167e400fb06b3be.jpg'),
(38, 95, '76026ece71faa1c7f0d1a98c49a3f801.jpg'),
(39, 95, 'cbe122aa13dac95521848d5b8e4f1ae8.jpg'),
(40, 96, 'a2a26ca16bd3ded356533dafdf5d4978.jpg'),
(41, 96, 'f6eacae5096cdae3a1b9d7c2847b5f4c.jpg'),
(42, 97, 'c7e5a84e06e2201810e556c7863301bd.jpg'),
(43, 97, 'ec4066d621251f840034f4ba7f75266e.jpg'),
(44, 97, '7a3bcf04307a2c766eb9ed72de13d5b9.jpg'),
(45, 98, 'ae497fa7bdef846966556d0197079a08.jpg'),
(46, 98, '95df2f15e367c547a0f0063d865302fb.jpg'),
(47, 99, 'b27461b0612e8e09f6dd489641dfcc02.jpg'),
(48, 99, '3de4ab5d848b3697642d75dc468d31f4.jpg'),
(49, 99, '8576ab63cea26d7996a012d999bbc138.jpg'),
(50, 100, '61933487a0291a450a9e481e3f9ae6df.jpg'),
(51, 100, 'e83574041ee38b9d0c5697cba7cd17eb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `modification`
--

CREATE TABLE `modification` (
                                `id` int(10) UNSIGNED NOT NULL,
                                `product_id` int(10) UNSIGNED NOT NULL,
                                `title` varchar(255) NOT NULL,
                                `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `user_id` int(10) UNSIGNED NOT NULL,
                         `status` varchar(1) NOT NULL DEFAULT '0',
                         `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         `update_at` timestamp NULL DEFAULT NULL,
                         `currency` varchar(10) NOT NULL,
                         `sum` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `currency`, `sum`) VALUES
(1, 18, '1', '2020-10-12 07:30:41', '2020-10-12 19:18:27', 'USD', 170),
(2, 18, '1', '2020-10-12 08:45:01', '2020-10-16 09:11:04', 'USD', 130),
(3, 18, '1', '2020-10-12 08:47:43', '2020-10-16 09:11:09', 'USD', 330),
(4, 18, '1', '2020-10-12 08:52:31', '2020-10-16 09:11:43', 'USD', 570),
(5, 18, '1', '2020-10-12 08:57:03', '2020-10-15 08:04:11', 'USD', 60),
(6, 18, '1', '2020-10-12 09:09:02', '2020-10-16 09:11:16', 'USD', 110),
(7, 18, '1', '2020-10-12 09:14:44', '2020-10-16 09:11:47', 'USD', 50),
(8, 18, '1', '2020-10-12 09:19:15', '2020-10-15 08:03:34', 'USD', 170),
(9, 18, '1', '2020-10-12 09:32:38', '2020-10-15 08:03:41', 'USD', 360),
(10, 18, '1', '2020-10-12 09:51:34', '2020-10-15 08:03:30', 'USD', 410),
(18, 18, '1', '2020-10-12 10:45:59', '2020-10-15 08:04:15', 'USD', 100),
(19, 18, '1', '2020-10-12 10:56:54', '2020-10-15 08:03:52', 'USD', 130),
(20, 18, '1', '2020-10-12 10:58:37', '2020-10-15 08:03:58', 'USD', 100),
(21, 18, '1', '2020-10-12 11:04:43', '2020-10-12 19:17:53', 'UAH', 13158),
(22, 18, '1', '2020-10-12 12:05:25', '2020-10-15 08:03:18', 'USD', 130),
(23, 18, '2', '2020-10-12 13:15:53', '2020-10-12 19:18:03', 'USD', 250),
(25, 18, '1', '2020-10-13 09:58:47', '2020-10-16 09:11:19', 'USD', 700),
(26, 18, '1', '2020-10-13 10:05:24', '2020-10-15 08:03:24', 'USD', 100),
(27, 18, '1', '2020-10-13 10:11:05', '2020-10-15 08:03:47', 'USD', 400),
(28, 18, '1', '2020-10-13 15:25:00', '2020-10-16 09:37:52', 'USD', 400),
(31, 18, '0', '2020-10-16 09:34:57', NULL, 'USD', 60),
(32, 18, '0', '2020-10-16 09:37:09', NULL, 'USD', 600),
(33, 18, '0', '2020-10-16 09:44:33', NULL, 'USD', 300),
(34, 18, '0', '2020-10-16 09:44:54', NULL, 'USD', 300);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
                                 `id` int(10) UNSIGNED NOT NULL,
                                 `order_id` int(10) UNSIGNED NOT NULL,
                                 `product_id` int(10) UNSIGNED NOT NULL,
                                 `qty` int(11) NOT NULL,
                                 `size` int(11) NOT NULL,
                                 `title` varchar(255) NOT NULL,
                                 `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `size`, `title`, `price`) VALUES
(1, 1, 93, 1, 0, 'Nike Air Max 95 \"Recycled Canvas\" Pack CK6478-001', 170),
(2, 2, 92, 1, 0, 'Nike Air Max 720 20 CT5229-001', 130),
(3, 3, 69, 1, 0, 'Nike Air Max 97 Gs 921522-011', 100),
(4, 3, 92, 1, 0, 'Nike Air Max 720 20 CT5229-001', 130),
(5, 3, 89, 1, 0, 'Adidas Niteball FX0363', 100),
(6, 4, 99, 1, 0, 'Nike WMNS Zoom X Vista Grind CT8919-200', 150),
(7, 4, 98, 1, 0, 'Jordan Aerospace 720 BV5502-100', 170),
(8, 4, 97, 1, 0, 'Nike W Air Max 2090 CT7698-600', 130),
(9, 4, 96, 1, 0, 'Nike W AF1 Sage Low AR5339-002', 120),
(10, 5, 75, 1, 0, 'Fila Disruptor Straps Wmn 1010859.1FG', 60),
(11, 6, 94, 1, 0, 'Puma Cell Alien Ader Error 37011201', 110),
(12, 7, 72, 1, 0, 'New Balance 547 WL574WNM', 50),
(13, 8, 93, 1, 0, 'Nike Air Max 95 \"Recycled Canvas\" Pack CK6478-001', 170),
(14, 9, 96, 3, 0, 'Nike W AF1 Sage Low AR5339-002', 120),
(15, 10, 96, 3, 0, 'Nike W AF1 Sage Low AR5339-002', 120),
(16, 10, 91, 1, 0, 'New Balance 574 WL574LDG', 50),
(24, 18, 69, 1, 0, 'Nike Air Max 97 Gs 921522-011', 100),
(25, 19, 92, 1, 0, 'Nike Air Max 720 20 CT5229-001', 130),
(26, 20, 91, 2, 0, 'New Balance 574 WL574LDG', 50),
(27, 21, 74, 1, 0, 'Adidas Continental J EE6484', 1290),
(28, 21, 69, 2, 0, 'Nike Air Max 97 Gs 921522-011', 2580),
(29, 21, 73, 1, 0, 'Adidas Ozweego W FV9747', 1806),
(30, 21, 89, 1, 0, 'Adidas Niteball FX0363', 2580),
(31, 21, 70, 1, 0, 'Adidas Nite Jogger EE5884', 2322),
(32, 22, 92, 1, 0, 'Nike Air Max 720 20 CT5229-001', 130),
(33, 23, 91, 5, 0, 'New Balance 574 WL574LDG', 50),
(35, 25, 89, 2, 0, 'Adidas Niteball FX0363 (size: 40)', 100),
(36, 25, 89, 1, 0, 'Adidas Niteball FX0363 (size: 41)', 100),
(37, 25, 69, 3, 0, 'Nike Air Max 97 Gs 921522-011 (size: 43)', 100),
(38, 25, 69, 1, 0, 'Nike Air Max 97 Gs 921522-011 (size: 40)', 100),
(39, 26, 69, 1, 40, 'Nike Air Max 97 Gs 921522-011 (size: 40)', 100),
(40, 27, 89, 1, 40, 'Adidas Niteball FX0363', 100),
(41, 27, 89, 2, 41, 'Adidas Niteball FX0363', 100),
(42, 27, 69, 1, 43, 'Nike Air Max 97 Gs 921522-011', 100),
(43, 28, 69, 1, 40, 'Nike Air Max 97 Gs 921522-011', 100),
(44, 28, 69, 2, 43, 'Nike Air Max 97 Gs 921522-011', 100),
(45, 28, 89, 1, 41, 'Adidas Niteball FX0363', 100),
(49, 31, 75, 1, 38, 'Fila Disruptor Straps Wmn 1010859.1FG', 60),
(50, 32, 89, 6, 40, 'Adidas Niteball FX0363', 100),
(51, 33, 100, 2, 40, 'Jordan Proto Max 720 BQ6623-002', 150),
(52, 34, 100, 2, 40, 'Jordan Proto Max 720 BQ6623-002', 150);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
                           `id` int(10) UNSIGNED NOT NULL,
                           `category_id` tinyint(3) UNSIGNED NOT NULL,
                           `title` varchar(255) NOT NULL,
                           `alias` varchar(255) NOT NULL,
                           `content` text,
                           `price` float NOT NULL DEFAULT '0',
                           `old_price` float NOT NULL DEFAULT '0',
                           `status` varchar(1) NOT NULL DEFAULT '1',
                           `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
                           `hit` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `alias`, `content`, `price`, `old_price`, `status`, `img`, `hit`) VALUES
(69, 26, 'Nike Air Max 97 Gs 921522-011', 'd-69', '<p><b>The Nike Air</b> Max 97 shoes are inspired by the propagating waves caused by a drop of water falling on the surface of a pond. Now, this classic running model returns with a refined, ultra-light and soft look. Repeated \'NIKE\' graphics, combined overlays and a Max Air gas cushion for all-day comfort have been added to the new version.<br></p>', 100, 0, '1', 'f0bd199eeb1a1e6f200fa6d2e3744023.jpg', '1'),
(70, 29, 'Adidas Nite Jogger EE5884', 'd-70', '', 90, 0, '1', '199dd6ff2e2971312783fad788be393c.jpg', '0'),
(71, 28, 'Adidas Nite Jogger EE5549', 'd', '', 85, 0, '1', '3c676b3bebbf95a52ae954e83d84af8f.jpg', '0'),
(72, 30, 'New Balance 547 WL574WNM', 'new-balance-547-wl574wnm', '', 50, 0, '1', 'd07a08c16894f901ac5ea304da9b03ed.jpg', '0'),
(73, 29, 'Adidas Ozweego W FV9747', 'd-73', '', 70, 0, '1', '2a288e6aa8ca4ed213a59bb5bb8e02cf.jpg', '0'),
(74, 29, 'Adidas Continental J EE6484', 'd-74', '', 50, 0, '1', 'd7a86366024bc9a219f2b0cdb917d999.jpg', '0'),
(75, 31, 'Fila Disruptor Straps Wmn 1010859.1FG', 'd-75', '', 60, 0, '1', '54aae6c50a174fc622df9b89bc8df836.jpg', '0'),
(89, 28, 'Adidas Niteball FX0363', 'd-89', '<p>You love basketball. But you know that life is the real game. And out here, the rules are a little different. These adidas Niteball Shoes have super-comfy cushioning borrowed from performance styles. That means you can attack the day with the same fearless attitude as your favourite players racing down the hardwood.</p>', 100, 0, '1', 'df77b362be38eaa28364e296ab7732bd.jpg', '0'),
(90, 33, 'Puma Palace Guard The Hundreds 371382-01', 'puma-palace-guard-the-hundreds-371382-01', '', 90, 0, '1', '579062447059c0586cea271cba6ae4a6.jpg', '0'),
(91, 30, 'New Balance 574 WL574LDG', 'new-balance-574-wl574ldg', '', 50, 0, '1', '0665e07f490ef9e7a06446a967129cff.jpg', '1'),
(92, 26, 'Nike Air Max 720 20 CT5229-001', 'nike-air-max-720-20-ct5229-001', '', 130, 0, '1', '2d61f44566533bdf82b1db1fd7810374.jpg', '1'),
(93, 26, 'Nike Air Max 95 \"Recycled Canvas\" Pack CK6478-001', 'nike-air-max-95-recycled-canvas-pack-ck6478-001', '', 170, 0, '1', '7f4855fcb3b72db38984dcc19ebe39d1.jpg', '1'),
(94, 34, 'Puma Cell Alien Ader Error 37011201', 'puma-cell-alien-ader-error-37011201', '', 110, 0, '1', '8b0c0804d170d0d828e2c0500800f25d.jpg', '0'),
(95, 33, 'Puma Rs-X3 Millenium 373236-01', 'puma-rs-x3-millenium-373236-01', '', 95, 0, '1', '7f219bee50730b6de356dbeaac99fb90.jpg', '1'),
(96, 27, 'Nike W AF1 Sage Low AR5339-002', 'nike-w-af1-sage-low-ar5339-002', '', 120, 0, '1', '5433a4681051ac4389eab0163624a242.jpg', '1'),
(97, 27, 'Nike W Air Max 2090 CT7698-600', 'nike-w-air-max-2090-ct7698-600', '', 130, 0, '1', 'a3750c8d08e8e5df9205662bf6a38c35.jpg', '1'),
(98, 35, 'Jordan Aerospace 720 BV5502-100', 'jordan-aerospace-720-bv5502-100', '', 170, 220, '1', '8d8a484247f4aec385cfd44e25fa20ec.jpg', '1'),
(99, 27, 'Nike WMNS Zoom X Vista Grind CT8919-200', 'd-99', '<p>Rebellious and Refined, that\'s how the <b>Nike</b> & <b>ZOOM X VISTA GRIND</b> are. This ultra-modern looking model was crafted using a synthetic fabric on the upper, and a TPU structure on the heel. Lining and details are in blue and ocher, visible from each angle, while the beige color to dominate the silhouette.On the lower side it comes with a Zoom X midsole, made from recycled foam.</p>', 150, 0, '1', 'a9462df7c880bc4affeff18ae4f0c2fc.jpg', '1'),
(100, 35, 'Jordan Proto Max 720 BQ6623-002', 'jordan-proto-max-720-bq6623-002', '<p>The design of the Air Jordan Proto-Max 720 was inspired by astronaut gear to create a new and totally out of this world lifestyle shoe. It features a number of impressive details, with exterior reinforcement covering the sock-like shoe, a strap on the outside of the heel to ensure fit and stability, and eyelets around the ankle so you can play around with whichever way you want to tie the laces. The black and red Bulls-inspired details give a star quality to the silver shoe. The numbers and written codes show the coordinates of the map leading to Nike\'s (and Jordan brand’s) world headquarters in Beaverton, Oregon.</p><p><br></p><p>Chunky and futuristic style.</p><p>The Air Jordan Proto-Max 720 include unbeatable sports performance features. At critical moments they provide the resistance you need and might have hoped for upon first glance. The Air unit runs through the outer sole to provide reactive and visible cushioning with maximum response.</p>', 150, 220, '1', '75a5a47b8e4a87d1040093836d60ee01.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
                                `size_id` int(11) UNSIGNED NOT NULL,
                                `qty` int(11) UNSIGNED NOT NULL DEFAULT '0',
                                `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `qty`, `product_id`) VALUES
(11, 10, 74),
(12, 1, 74),
(10, 5, 89),
(7, 7, 74),
(8, 5, 74),
(5, 3, 74),
(10, 5, 100),
(13, 3, 100),
(7, 2, 75),
(9, 2, 75),
(8, 3, 75);

-- --------------------------------------------------------

--
-- Table structure for table `related_product`
--

CREATE TABLE `related_product` (
                                   `product_id` int(10) UNSIGNED NOT NULL,
                                   `related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `related_product`
--

INSERT INTO `related_product` (`product_id`, `related_id`) VALUES
(69, 73),
(74, 69),
(89, 70),
(90, 89),
(91, 72),
(91, 74),
(92, 69),
(92, 71),
(93, 69),
(93, 70),
(95, 73),
(95, 94),
(96, 92),
(97, 69),
(97, 71),
(97, 89),
(97, 92),
(98, 69),
(98, 71),
(99, 69),
(99, 98),
(100, 69),
(100, 89),
(100, 92),
(100, 98);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
                        `id` int(11) NOT NULL,
                        `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `value`) VALUES
(5, 35),
(6, 36),
(7, 37),
(8, 38),
(9, 39),
(10, 40),
(11, 41),
(12, 42),
(13, 43),
(14, 45),
(15, 44);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(10) UNSIGNED NOT NULL,
                        `login` varchar(255) NOT NULL,
                        `password` varchar(255) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `name` varchar(255) NOT NULL,
                        `address` varchar(255) NOT NULL,
                        `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `address`, `role`) VALUES
(5, 'ira', '$2y$10$FamdBWPFWYrjEQnqoHUwBuXQURpyXbXHwQB/eZBChw6bAU8uVkTke', 'irina@mail.com', 'Irina Avilova', 'Ukraina, Dnipro, ul.Bogomaza,17', 'user'),
(18, 'dns', '$2y$10$UUeVZQu8IFnwuMx4Uz6PHufn23MPILgY6MEdbIQ.qxFmMGxKcY6RK', 'denis_m_@mail.ru', 'Denis Moiseienko', 'Poland', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_group`
--
ALTER TABLE `attribute_group`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
    ADD PRIMARY KEY (`attr_id`,`product_id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `value` (`value`),
    ADD KEY `attr_group_id` (`attr_group_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `alias` (`alias`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modification`
--
ALTER TABLE `modification`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
    ADD PRIMARY KEY (`id`),
    ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `alias` (`alias`),
    ADD KEY `category_id` (`category_id`),
    ADD KEY `hit` (`hit`);

--
-- Indexes for table `related_product`
--
ALTER TABLE `related_product`
    ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `login` (`login`),
    ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute_group`
--
ALTER TABLE `attribute_group`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `modification`
--
ALTER TABLE `modification`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
    ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

