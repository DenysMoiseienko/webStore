-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 08, 2020 at 04:54 PM
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

--
-- Dumping data for table `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `title`) VALUES
(8, 'Price');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
                                     `attr_id` int(10) UNSIGNED NOT NULL,
                                     `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`attr_id`, `product_id`) VALUES
(11, 109),
(11, 110),
(11, 111),
(11, 112),
(11, 113),
(11, 114),
(11, 115),
(11, 116),
(11, 117),
(11, 118),
(11, 119),
(11, 120),
(11, 121),
(11, 122),
(11, 123),
(11, 124),
(11, 127),
(11, 129),
(11, 130),
(11, 131),
(11, 132),
(11, 133),
(11, 134),
(11, 135),
(11, 141),
(11, 142),
(11, 143),
(12, 105),
(12, 106),
(12, 107),
(12, 108),
(12, 128),
(12, 136),
(12, 137),
(12, 138),
(14, 125),
(14, 126),
(17, 139),
(17, 140);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
                                   `id` int(10) UNSIGNED NOT NULL,
                                   `value` varchar(255) NOT NULL,
                                   `attr_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attr_group_id`) VALUES
(9, '0 - 50', 8),
(10, '50 - 100', 8),
(11, '100 - 150', 8),
(12, '150 - 200', 8),
(13, '200 - 250', 8),
(14, '250 - 300', 8),
(15, '300 - 350', 8),
(16, '350 - 400', 8),
(17, '400 - 450', 8);

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
(30, 'Jordan', 'jordan', 24, '', ''),
(31, 'Jordan', 'jordan-31', 25, '', '');

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
(2, 'dollar', 'USD', '$', '', 1.00, '1');

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
(68, 105, '85e27026c7793aae0b10faa99a0592a9.jpg'),
(69, 105, '2fcd9baa2d6801497d18e6c418f0d86f.jpg'),
(70, 105, 'eccc978b0904bb817d6a8812ba688073.jpg'),
(71, 106, '723abf06fe62658920959b4112b5b542.jpg'),
(72, 106, '45e4aa5fb472507bad67e17a8c0dde64.jpg'),
(73, 106, '72aab8061159daa13b82f27566c607da.jpg'),
(74, 107, 'b7f9b58db4f75ff5e925097c9b93a31f.jpg'),
(75, 107, '1aeb6310ab167e11f9ff0f0061c8d9b4.jpg'),
(76, 107, 'a9d253462e5240d216bbb20217c12094.jpg'),
(77, 108, '74cc60330aa6e8cb130fb9d06f551b9d.jpg'),
(78, 108, '83ca355a1910538abb8c4c1269900f72.jpg'),
(79, 108, '523fead260df52eb463ee9176ad37e04.jpg'),
(80, 109, '26481b7ee02d5e5b301b9675ef59e46e.jpg'),
(81, 109, '77873009a2f0777da2fd42004b3aa3bc.jpg'),
(82, 109, 'b57282a4a762721eea702cad18baea46.jpg'),
(83, 110, 'f4d127228fcb52432f60b11f519af855.jpg'),
(84, 110, 'bcb0296d55dd63604ac0faabac92c6aa.jpg'),
(85, 110, 'd258c916b660d4dfcf9dfa180dd138c3.jpg'),
(86, 110, '754a4b44a70fa7845b56723381007d6f.jpg'),
(87, 111, '6270324017117096e2b0b9536181e79c.jpg'),
(88, 111, '7f00dcded5e8c989312312c212f8d6a4.jpg'),
(89, 111, '22b3974b8f8bc189fe1a93e1f00fbfc2.jpg'),
(90, 111, 'e1e82949a18f52f571150f25f8e5ba1f.jpg'),
(91, 112, '78b17b99f78171ba61c497aafb62b4b0.jpg'),
(92, 112, 'dc4ad4d3e63126adb7fec62df5f42fc9.jpg'),
(93, 112, '9a54283152cd188fd2606b72290c1052.jpg'),
(94, 113, 'c7978c33643f08eaf8cb8ee1a45cb379.jpg'),
(95, 113, '11d64b9fc5711dd3b90bdfe04a29b26d.jpg'),
(96, 113, '2748e3b4fcd2db44a762bd64bc81e2a0.jpg'),
(97, 113, '898f0193c08dfab49ee901844ad0fe33.jpg'),
(98, 114, '24953a05a1f1960da6ffdc8d1481f83d.jpg'),
(99, 114, '32dcacdf13bbf23ec54f452b604be530.jpg'),
(100, 114, 'da4b7e6859c20893de7ada7105f6a0a0.jpg'),
(101, 114, 'b97350def122bb7fa1f7d27550e97c45.jpg'),
(102, 115, '8c5dccae5167f01eae5618e337cbceb5.jpg'),
(103, 115, 'dbcce9901c90e9d65e380859c822f5c2.jpg'),
(104, 115, 'd22918dd73082f31bfba13353bcef4c8.jpg'),
(105, 115, '48a3a6223b0a1bda6e3191b9ffc5dce1.jpg'),
(106, 116, '52bc8be94b3389993ceea84990df7388.jpg'),
(107, 116, '143ccac487ccb7effc3763a463210621.jpg'),
(108, 116, 'ba3b677ccfab5b40e6c56babb728449a.jpg'),
(109, 116, 'd2f395469b56c7aaf89d6948bfac71e3.jpg'),
(110, 116, '3a2b005bf098f6f1417f005f10470047.jpg'),
(111, 117, '0128dcff6b9fb6e3e040c45d6ee5a128.jpg'),
(112, 117, '52ea3bdd5c695beaef233bddd3fff057.jpg'),
(113, 117, '50ca8456ab4c6ef0c9bebc01f8044d4d.jpg'),
(114, 117, 'f3f6558aee5a5a969175c288c5465a97.jpg'),
(115, 118, '18f8f5fd88c1a3c44bf2dae1d5338be0.jpg'),
(116, 118, 'cd8d01710196a469c4296353695088c6.jpg'),
(117, 118, 'e14969e94805864ce8ff92b135c73b9a.jpg'),
(118, 118, '323b3f4e0c773dc869caa991304c13a1.jpg'),
(119, 119, '0a59257de8c6f34ac2d317a3849d603b.jpg'),
(120, 119, '6fe59d3bfab00c92c6688e8c40a71871.jpg'),
(121, 119, 'eec53b07b797c5e84497d149bc55fb69.jpg'),
(122, 119, 'c0bf921fa3e83f7806ddbf613a07c84c.jpg'),
(123, 119, 'c084d5963b2b36e466905a2cbd11d5d2.jpg'),
(124, 120, '52efcb2725b35a4552048232931cf028.jpg'),
(125, 120, '7501f7def54d1f34d4f0f69fd010cd06.jpg'),
(126, 120, '2eb0013e390e5e8f215cc51fee375fb4.jpg'),
(127, 120, '2057a548a4d7e23a3c5c646c2a3c871f.jpg'),
(128, 120, '4742a3dab496206b5f0a54acce372015.jpg'),
(129, 121, '72b893485d6e739ac91683625eea50e7.jpg'),
(130, 121, 'afe35dd08a219294034b8fe607ce7307.jpg'),
(131, 121, '30049a78591772637c0c72d2ab8c91d3.jpg'),
(132, 121, 'e420b4244ac0b7d7f9cb6230e3fcd98e.jpg'),
(133, 121, '267f4e77363ac4cc59647f24cf370fda.jpg'),
(134, 122, '2fd06809c7eb2ac3193deba38c2bcbfd.jpg'),
(135, 122, '1e197ef7770e0742668b328cfe68eb3a.jpg'),
(136, 122, '63f5989d96caf7bb1a84cffd2e0ed549.jpg'),
(137, 122, 'b660b2e8876b971ab00268936b83953f.jpg'),
(138, 122, '06ef683b51a1aa74ed060caebe4bf03d.jpg'),
(139, 123, '895531c6a78cac4441919923bcc1586d.jpg'),
(140, 123, '529585db1ca6ff732ace8880f9972353.jpg'),
(141, 123, '7006295090f0f45d1a7f2977b2871dbc.jpg'),
(142, 123, '8788e5ff3b275dc98579a9c0b10aba31.jpg'),
(143, 123, '89c425f1be4da9587d625262a38c436a.jpg'),
(144, 124, 'a2ac5f1b2f62bdbe1023e2c97931f7f4.jpg'),
(145, 124, 'a1a58a85caec419eec0214e1d5fe9b6b.jpg'),
(146, 124, 'a416275087d6eed13dec1b804d034a8b.jpg'),
(147, 124, 'a3d913a9358d22f78dcc92a8f118332d.jpg'),
(148, 124, '2777c15ea8d401829924cbeb59687576.jpg'),
(149, 125, '55790a4f7d5a679471633b16c7468fa7.jpg'),
(150, 125, '90073a37876061bd3cd5ef4cce36fd49.jpg'),
(151, 125, '8f2c6205ca55dc0f1765f3a84a4df330.jpg'),
(152, 125, 'edc3fea9a0282a30302dc90681db10f6.jpg'),
(153, 125, '691ddbd544f1c0448c00f4f65b315a36.jpg'),
(154, 126, 'c447cffe73c59b2f50c4d0a65e496226.jpg'),
(155, 126, '0fe87b7e494dea8d1fab47d9752864df.jpg'),
(156, 126, 'da264fc2c06af64a265521e4ae02d394.jpg'),
(157, 126, '909252bf185e00d7f5605e59640df095.jpg'),
(158, 127, 'a45293ea450dad8cacdfea96bcc24c02.jpg'),
(159, 127, 'a6e7c7de0059c4c319b9863fea32b894.jpg'),
(160, 127, 'b3db15ac38ec1ddec48d23e83169c299.jpg'),
(161, 128, 'fa27ad56831c6e93110c75e2e877d0b7.jpg'),
(162, 128, '76624d8611fdbd760b8e8ae62ea8a9ba.jpg'),
(163, 128, 'aa49d62d7f1615381d5cf2bbf0f3b127.jpg'),
(164, 129, 'b3553ca376991b274aff32969deb5aad.jpg'),
(165, 129, '2e3882f07cc531c25060dcb1807dfdf2.jpg'),
(166, 129, '0fc4647bbec78adb0b66a0aaa8a08494.jpg'),
(167, 130, '37cd7e2ffde8de17e3dbe7b8cb47d760.jpg'),
(168, 130, 'fd3d777d0752dfe042887ecfb4e222dc.jpg'),
(169, 131, '1cf895565fcc702eb2eb8d1a0cff2614.jpg'),
(170, 131, '56ca8710713fda29569318ddcab3163d.jpg'),
(171, 131, '052e1e2074b415f795da0178a132fc83.jpg'),
(172, 131, 'fc0c41973a1bf4df725188d7041325a7.jpg'),
(173, 131, '12b5c76f71e20057636b532ea22678cb.jpg'),
(174, 132, 'b00a1f80300a4cb65a7f22b046956a90.jpg'),
(175, 132, 'ce75865f7fcbbe0564557495b6992f42.jpg'),
(176, 132, 'aa8b1315823b31e155983a32d9faa976.jpg'),
(177, 132, '9da889b367ee456e88be7870d0d1b3e8.jpg'),
(178, 133, '8fca2098509ef44fec37c30a35250570.jpg'),
(179, 133, '347256f27e976df081da3d662905b582.jpg'),
(180, 133, 'e53b006790aacbce49573e1cb912d39c.jpg'),
(181, 133, 'e598c66c9b2d0a91c9329d76062149d4.jpg'),
(182, 134, '991799e5f18b82f6e7238edd11aca9e8.jpg'),
(183, 134, '4ff86ecf8d252b311b79defa0c50fb1e.jpg'),
(184, 134, '183148f1273eefbada02a0b21aeae01e.jpg'),
(185, 134, '4b08cf97d3bcc58401cd59e43f98354a.jpg'),
(186, 134, 'd4644f0ff4c920412f8c8038f073d7f0.jpg'),
(187, 135, '16f4fbb257b2cab56a13100c57c89433.jpg'),
(188, 135, '8e3d9de246020476804ea14aa370d82e.jpg'),
(189, 136, '8f1dcc124b843412cbeacd3f12b27b1d.jpg'),
(190, 136, '62daa9c74f91713b1d7264b6f363ef3a.jpg'),
(191, 136, 'd2b01d21024374987a297d3b8cb53bf8.jpg'),
(192, 136, 'b62d93387ef4b0ff2b0bd65628bb2d4e.jpg'),
(193, 136, '98d590731b25e5971f716bf386a7a46c.jpg'),
(194, 137, '7dc07ae0c3c296c7481d5c5504b07b0c.jpg'),
(195, 137, 'c296287484e118f2cbaa6e12c9fd90e2.jpg'),
(196, 137, '5704abb869277f865e327d4c818a7432.jpg'),
(197, 137, '7530db3db31592a5be7d5541b04beede.jpg'),
(198, 137, '21f98d3f6362838033f5767c68e77b3b.jpg'),
(199, 138, '2e9a599b5f47df9109fb10cd16513aa6.jpg'),
(200, 138, 'eb4b4a943453034e903495b2aece506b.jpg'),
(201, 138, '47c0518072546e2433484537751c6d6a.jpg'),
(202, 138, '65f0f6b6ff1e6c66aac2ef4f9c90e961.jpg'),
(203, 138, '451203ff048ac4ab01c5a16a64a7efd5.jpg'),
(204, 139, '657020e686e7316850fd3c9e59424f36.jpg'),
(205, 139, '9c5c975ffd8ec3e80546795bb3ccaec6.jpg'),
(206, 139, 'ce9f2e6098d69495db9aea567189712f.jpg'),
(207, 139, 'b0811d8e62e8a89dcfc4e0d001f70c5a.jpg'),
(208, 139, 'b876abc97b6eb6e921f6fc34fc0fb35e.jpg'),
(209, 140, '4fe433c70842c8ed81f68dab67aec3de.jpg'),
(210, 140, 'ba93a30902c023b9dc41dcf650df8bbb.jpg'),
(211, 140, '172e91604531f61dac713b8c9eab3975.jpg'),
(212, 140, '955f159a37d36f4af5349847d18ef666.jpg'),
(213, 140, '6870adb226e639f1aace712f9f3b1c91.jpg'),
(214, 141, '41c6ae0863f8dae3d1dc065efdd09fac.jpg'),
(215, 141, '282543261c6d17565c51a26f8fffd283.jpg'),
(216, 141, '0764efc9ebfdc58733b0ff112d9a63d4.jpg'),
(217, 141, '65e6b3b99c64e25bfeed2e25f02acffd.jpg'),
(218, 142, 'f035cffb1e464ba3def8d1d10454c3b5.jpg'),
(219, 142, '8f61095ff8aa88094814b91634913b8a.jpg'),
(220, 142, 'f5cad12ad40748dca1c1f84219f99fe8.jpg'),
(221, 142, '3d52e816be60776f0dd34eefaef752aa.jpg'),
(222, 142, 'c0210a400f36662c4b36d645a3cdee3b.jpg'),
(223, 143, 'cf05138f2547df1e7e022720bd1a21b1.jpg'),
(224, 143, '859efcd8c48245eb36d830919ec4dd6d.jpg'),
(225, 143, 'e60ddacbb69ab7f4ed7babe102d1d26c.jpg'),
(226, 143, 'eacb06db789669c12199aa04aac10e7c.jpg');

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
(28, 18, '0', '2020-10-13 15:25:00', '2020-10-23 17:51:56', 'USD', 400),
(31, 18, '0', '2020-10-16 09:34:57', NULL, 'USD', 60),
(33, 18, '1', '2020-10-16 09:44:33', '2020-11-04 13:53:41', 'USD', 300),
(34, 18, '0', '2020-10-16 09:44:54', NULL, 'USD', 300),
(35, 18, '0', '2020-10-20 12:06:06', NULL, 'USD', 650),
(36, 18, '0', '2020-10-20 14:16:20', NULL, 'USD', 50),
(37, 18, '0', '2020-10-20 14:16:58', NULL, 'USD', 450),
(38, 18, '0', '2020-10-20 14:24:10', NULL, 'USD', 150),
(40, 18, '0', '2020-10-26 11:03:35', NULL, 'USD', 100),
(41, 18, '0', '2020-11-04 12:00:18', NULL, 'USD', 120),
(42, 18, '0', '2020-11-04 12:00:43', NULL, 'USD', 120),
(43, 18, '0', '2020-11-04 12:01:26', NULL, 'USD', 120),
(44, 18, '0', '2020-11-04 12:01:32', NULL, 'USD', 120),
(45, 18, '0', '2020-11-04 12:02:16', NULL, 'USD', 120);

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
(51, 33, 100, 2, 40, 'Jordan Proto Max 720 BQ6623-002', 150),
(52, 34, 100, 2, 40, 'Jordan Proto Max 720 BQ6623-002', 150),
(53, 35, 100, 3, 40, 'Jordan Proto Max 720 BQ6623-002', 150),
(54, 35, 100, 1, 43, 'Jordan Proto Max 720 BQ6623-002', 150),
(55, 35, 74, 1, 35, 'Adidas Continental J EE6484', 50),
(56, 36, 74, 1, 42, 'Adidas Continental J EE6484', 50),
(57, 37, 74, 9, 41, 'Adidas Continental J EE6484', 50),
(58, 38, 100, 1, 40, 'Jordan Proto Max 720 BQ6623-002', 150),
(60, 40, 74, 1, 38, 'Adidas Continental J EE6484', 50),
(61, 40, 74, 1, 37, 'Adidas Continental J EE6484', 50),
(62, 45, 102, 1, 40, 'Nike Air Max 97 GS 921522-010', 120);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
                           `id` int(10) UNSIGNED NOT NULL,
                           `category_id` tinyint(3) UNSIGNED NOT NULL,
                           `title` varchar(255) NOT NULL,
                           `color` varchar(255) NOT NULL,
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

INSERT INTO `product` (`id`, `category_id`, `title`, `color`, `alias`, `content`, `price`, `old_price`, `status`, `img`, `hit`) VALUES
(105, 26, 'Nike Air Max 270', 'AH8050-002', 'nike-air-max-270-ah8050-002', 'The first Nike Air Max lifestyle model, the Nike Air Max 270, is comfortable and has a unique character and style.Inspired by the legends of the Air Max range, it features a fresh color gamut and a large window that shows off Nike\'s greatest innovation.', 170.4, 0, '1', '5054c2111baf2bf130ca4c9bb9db433b.jpg', '1'),
(106, 26, 'Nike Air Max 270', 'AH8050-100', 'nike-air-max-270-ah8050-100', '<p><span style=\"caret-color: rgb(33, 37, 41); color: rgb(33, 37, 41); font-family: Quicksand;\">The first Nike Air Max lifestyle model, the Nike Air Max 270, is comfortable and has a unique character and style.Inspired by the legends of the Air Max range, it features a fresh color gamut and a large window that shows off Nike\'s greatest innovation.</span><br></p>', 170.4, 0, '1', '4797d5eb932fcbf3e3f23102c657a80b.jpg', '0'),
(107, 26, 'Nike Air Max 270', 'AH8050-024', 'nike-air-max-270-ah8050-024', '<p><span style=\"caret-color: rgb(33, 37, 41); color: rgb(33, 37, 41); font-family: Quicksand;\">The first Nike Air Max lifestyle model, the Nike Air Max 270, is comfortable and has a unique character and style.Inspired by the legends of the Air Max range, it features a fresh color gamut and a large window that shows off Nike\'s greatest innovation.</span><br></p>', 142.6, 170.4, '1', 'e94646863cfe005f5d52d387645031db.jpg', '1'),
(108, 26, 'Nike Air Max 270', 'AH8050-005', 'nike-air-max-270-ah8050-005', '<p><span style=\"caret-color: rgb(33, 37, 41); color: rgb(33, 37, 41); font-family: Quicksand;\">The first Nike Air Max lifestyle model, the Nike Air Max 270, is comfortable and has a unique character and style.Inspired by the legends of the Air Max range, it features a fresh color gamut and a large window that shows off Nike\'s greatest innovation.</span><br></p>', 169.1, 0, '1', '5fea9ef08c3ebc67db1d3d339503ce87.jpg', '0'),
(109, 27, 'Nike Air Max 97 SE GS', 'CT9637-400', 'nike-air-max-97-se-gs-ct9637-400', 'With a sleek design inspired by the high-speed Japanese Bullet Train, the Nike Air Max 97 continues to be a favorite among sneakerheads. They\'re constructed with a combination leather and textile upper, full-length visible Max Air unit, reflective lines around the upper, and a rubber outsole.', 120.6, 162.5, '1', '05418cafd1f5b6ec36779a5afe64893e.jpg', '1'),
(110, 27, 'Nike Air Max 97 SE GS', 'CT9637-900', 'nike-air-max-97-se-gs-ct9637-900', 'With a sleek design inspired by the high-speed Japanese Bullet Train, the Nike Air Max 97 continues to be a favorite among sneakerheads. They\'re constructed with a combination leather and textile upper, full-length visible Max Air unit, reflective lines around the upper, and a rubber outsole.', 130, 162.5, '1', '2e01bea168f5d2ee964ded72b08dac9b.jpg', '0'),
(111, 27, 'Nike Air Max 97 GS', '921522-019', 'nike-air-max-97-gs-921522-019', 'The Nike Air Max 97 Shoe features the wavy design of the original Japanese train-inspired design for a dynamic feel.They provide stylish comfort with fresh colors, eye-catching details and a revolutionary full-size Nike Air gas cushion that shook the world of runners.', 125.8, 157.3, '1', 'b59f3f7f4e9b427434632748a11cb03d.jpg', '1'),
(112, 27, 'Nike Air Max 97 GS', '921522-014', 'nike-air-max-97-gs-921522-014', 'The Nike Air Max 97 Shoe features the wavy design of the original Japanese train-inspired design for a dynamic feel.They provide stylish comfort with fresh colors, eye-catching details and a revolutionary full-size Nike Air gas cushion that shook the world of runners.', 123.8, 154.7, '1', '3caa36ac3c1af62d19b4df51bbadb131.jpg', '0'),
(113, 27, 'Nike Air Max 97 GS', '921522-017', 'nike-air-max-97-gs-921522-017', '<p><span style=\"caret-color: rgb(33, 37, 41); color: rgb(33, 37, 41); font-family: Quicksand;\">The Nike Air Max 97 Shoe features the wavy design of the original Japanese train-inspired design for a dynamic feel.They provide stylish comfort with fresh colors, eye-catching details and a revolutionary full-size Nike Air gas cushion that shook the world of runners.</span><br></p>', 133.7, 157.3, '1', 'cde2073ea24f4952e97057dcebe56228.jpg', '0'),
(114, 27, 'Nike Air Max 97 GS', '921522-011', 'nike-air-max-97-gs-921522-011', '<p><span style=\"caret-color: rgb(33, 37, 41); color: rgb(33, 37, 41); font-family: Quicksand;\">The Nike Air Max 97 Shoe features the wavy design of the original Japanese train-inspired design for a dynamic feel.They provide stylish comfort with fresh colors, eye-catching details and a revolutionary full-size Nike Air gas cushion that shook the world of runners.</span><br></p>', 125.8, 157.3, '1', '4dd22adaba298a8838b82788c004d2f6.jpg', '0'),
(115, 27, 'Nike W Air Max 2090', 'CK2612-103', 'nike-w-air-max-2090-ck2612-103', 'The Nike Air Max 2090 Imagines the Future of Air. ... With the Air Max 2090 launch colorways pulling inspiration from the future of travel, the coloring on the front and the back of the shoe are meant to convey headlights and taillights. The Air Max 2090 tread design gets an updated pattern for modern performance.', 127.4, 170.4, '1', 'c022855762d262c7deafcc88037e9335.jpg', '1'),
(116, 27, 'Nike W Air Max 2090', 'CK2612-500', 'nike-w-air-max-2090-ck2612-500', '<p>The Nike Air Max 2090 Imagines the Future of Air. With the Air Max 2090 launch colorways pulling inspiration from the future of travel, the coloring on the front and the back of the shoe are meant to convey headlights and taillights. The Air Max 2090 tread design gets an updated pattern for modern performance.<br></p>', 127.4, 170.4, '1', '6b374782cd9952576be59d7b9b6e9ca7.jpg', '0'),
(117, 27, 'Nike W Air Max 2090', 'CK2612-100', 'nike-w-air-max-2090-ck2612-100', 'The Nike Air Max 2090 Imagines the Future of Air. With the Air Max 2090 launch colorways pulling inspiration from the future of travel, the coloring on the front and the back of the shoe are meant to convey headlights and taillights. The Air Max 2090 tread design gets an updated pattern for modern performance.', 127.4, 170.4, '1', '5bc5663e2735cda1612b7315777d341c.jpg', '0'),
(118, 27, 'Nike W Air Max 2090', 'CT7698-100', 'nike-w-air-max-2090-ct7698-100', 'The Nike Air Max 2090 Imagines the Future of Air. With the Air Max 2090 launch colorways pulling inspiration from the future of travel, the coloring on the front and the back of the shoe are meant to convey headlights and taillights. The Air Max 2090 tread design gets an updated pattern for modern performance.', 136.4, 170.4, '1', '1c83701295597fce24284411ce6a33a7.jpg', '1'),
(119, 27, 'Nike W Air Max 2090', 'CT7698-600', 'nike-w-air-max-2090-ct7698-600', 'The Nike Air Max 2090 Imagines the Future of Air. With the Air Max 2090 launch colorways pulling inspiration from the future of travel, the coloring on the front and the back of the shoe are meant to convey headlights and taillights. The Air Max 2090 tread design gets an updated pattern for modern performance.', 136.4, 170.4, '1', '10dc738372a4b1c7447e674bc741e395.jpg', '0'),
(120, 27, 'Nike W Zoom X Vista Grind', 'CT8919-200', 'nike-w-zoom-x-vista-grind-ct8919-200', 'The Nike Zoom X Vista Grind brings you to a bold new place both rebellious and refined. It\'s comfort you can see and feel in a brand new silhouette. Angular heel offers a big and bold modern look. Originating from aerospace innovation, Zoom X foam is visible through windows in the midsole for comfort you can see.', 149.5, 199.3, '1', '8222d6670779e244333845aa1a09b5c9.jpg', '1'),
(121, 27, 'Nike W Zoom X Vista Grind', 'CT8919-001', 'nike-w-zoom-x-vista-grind-ct8919-001', 'The Nike Zoom X Vista Grind brings you to a bold new place both rebellious and refined. It\'s comfort you can see and feel in a brand new silhouette. Angular heel offers a big and bold modern look. Originating from aerospace innovation, Zoom X foam is visible through windows in the midsole for comfort you can see.', 139.5, 199.3, '1', 'de192089f225ca6830f4ccfe93f85223.jpg', '0'),
(122, 26, 'Nike Air Max 90 Flyease', 'CZ4270-001', 'nike-air-max-90-flyease-cz4270-001', 'The Air Max 90 FlyEase is Nike Sportswear\'s first use of FlyEase technology. Leveraging a new entry system, the Air Max 90 FlyEase offers quick, easy-on and off access through a flexible heel that collapses when wearers step into the shoe. The heel then snaps back into place upon entry to secure the fit.', 118, 157.3, '1', 'b13675457dfc979e6667de196a88e05f.jpg', '1'),
(123, 26, 'Nike Air Max 90 Flyease', ' CZ4270-100', 'nike-air-max-90-flyease--cz4270-100', 'The Air Max 90 FlyEase is Nike Sportswear\'s first use of FlyEase technology. Leveraging a new entry system, the Air Max 90 FlyEase offers quick, easy-on and off access through a flexible heel that collapses when wearers step into the shoe. The heel then snaps back into place upon entry to secure the fit.', 118, 157.3, '1', 'c9a6447005d9cf1b14f288b8203c7485.jpg', '0'),
(124, 26, 'Nike Air Max 90 Flyease', 'CZ4270-002', 'nike-air-max-90-flyease-cz4270-002', 'The Air Max 90 FlyEase is Nike Sportswear\'s first use of FlyEase technology. Leveraging a new entry system, the Air Max 90 FlyEase offers quick, easy-on and off access through a flexible heel that collapses when wearers step into the shoe. The heel then snaps back into place upon entry to secure the fit.', 118, 157.3, '1', 'e1a5f81b5e3da17029d88d67fcd10625.jpg', '0'),
(125, 26, 'Nike Adapt Huarache', 'CT4092-300', 'nike-adapt-huarache-ct4092-300', '<p>The Nike Adapt Huarache is designed to adapt to your every move, featuring an adaptive-fit power-lacing system that provides a locked-in feel. Just like past Adapt footwear, the Adapt Huarache is compatible with the Nike Adapt App.<br></p>', 275.3, 367.1, '1', '23d2d1b024d7111130ef5adfa48522e3.jpg', '1'),
(126, 26, 'Nike Adapt Huarache', 'CT4092-001', 'nike-adapt-huarache-ct4092-001', 'The Nike Adapt Huarache is designed to adapt to your every move, featuring an adaptive-fit power-lacing system that provides a locked-in feel. Just like past Adapt footwear, the Adapt Huarache is compatible with the Nike Adapt App.', 293.7, 367.1, '1', '9003ca3fb6939c9faec832911efdcb9d.jpg', '0'),
(127, 28, 'Adidas Niteball', 'FX0363', 'adidas-niteball-fx0363', 'Adidas Niteball: Unbeatable swagger. These basketball-inspired kicks are an amalgamation of classic Streetball performance and the Adidas Night Jogger\'s modern style. These chunky sneakers feature a huge three stripes on the side while a reflective silver keeps your basketball vibe going from morning until night.', 104.9, 131.1, '1', '8d2c6186cf7eeda1d8d09efd3a973ab3.jpg', '0'),
(128, 28, 'Adidas Torsion X', 'EE4885', 'adidas-torsion-x-ee4885', 'The Adidas Torsion X is equipped with Torsion X, a support system that allows your foot to move naturally. They also have a breathable textile upper, padded collar/tongue, energy-returning Boost cushioning, and a rubber outsoel.', 156, 222.9, '1', 'b68c397b2288a1c394e0074fd5f39248.jpg', '0'),
(129, 28, 'Adidas Torsion X', 'FV4552', 'adidas-torsion-x-fv4552', 'The Adidas Torsion X is equipped with Torsion X, a support system that allows your foot to move naturally. They also have a breathable textile upper, padded collar/tongue, energy-returning Boost cushioning, and a rubber outsoel.', 137.7, 196.7, '1', '30b3111c1cc365f761e1e4a71a69c69b.jpg', '0'),
(130, 28, 'Adidas Nite Jogger', 'EE5884', 'adidas-nite-jogger-ee5884', 'Adidas launched a new sneaker designed for nighttime runners, aptly named the Nite Jogger. Inspired by a sneaker of the same name from 1979, today\'s version features a full-length Boost midsole, a cut-and-sewn upper, and plenty of reflective accents for nighttime visibility.', 101.5, 145, '1', '49d42ad50a07c994b2b71c82d11021a8.jpg', '0'),
(131, 28, 'Adidas Nite Jogger', 'EE5549', 'adidas-nite-jogger-ee5549', 'Adidas launched a new sneaker designed for nighttime runners, aptly named the Nite Jogger. Inspired by a sneaker of the same name from 1979, today\'s version features a full-length Boost midsole, a cut-and-sewn upper, and plenty of reflective accents for nighttime visibility.', 125.4, 179.2, '1', '4fd110323c1114d1af9f06f311b36f3b.jpg', '0'),
(132, 28, 'Adidas Nite Jogger', 'EE5851', 'adidas-nite-jogger-ee5851', 'Adidas launched a new sneaker designed for nighttime runners, aptly named the Nite Jogger. Inspired by a sneaker of the same name from 1979, today\'s version features a full-length Boost midsole, a cut-and-sewn upper, and plenty of reflective accents for nighttime visibility.', 102.8, 158.1, '1', 'f8fd61fe55fa57dea6d76b2078db6dfd.jpg', '0'),
(133, 30, 'Jordan Team Showcase', 'CD4150-600', 'jordan-team-showcase-cd4150-600', '<p>Jordan Team Showcase - because teamwork matters! But if you\'re far from playing basketball, perhaps you\'ll love designer footwear in the style of NBA players? The Jordan Team Showcase model features a red leather and synthetic upper, so you get a durable product that will last for years. No need to buy more pairs! Nike Air\'s cushioning technology knows how to react quickly to changing uneven terrain. A rubber outsole helps him in this, which maintains a high level of stabilization. The model is topped with a white JORDAN inscription and delicate ventilation holes.<br></p>', 137, 171.3, '1', '4b725d55cf80d29712a547a9e12972e9.jpg', '1'),
(134, 30, 'Jordan Team Showcase', 'CD4150-104', 'jordan-team-showcase-cd4150-104', 'Jordan Team Showcase - because teamwork matters! But if you\'re far from playing basketball, perhaps you\'ll love designer footwear in the style of NBA players? The Jordan Team Showcase model features a red leather and synthetic upper, so you get a durable product that will last for years. No need to buy more pairs! Nike Air\'s cushioning technology knows how to react quickly to changing uneven terrain. A rubber outsole helps him in this, which maintains a high level of stabilization. The model is topped with a white JORDAN inscription and delicate ventilation holes.', 137, 171.3, '1', '07f172524cc30643234753e0ddaed810.jpg', '0'),
(135, 30, 'Jordan Team Showcase', 'CD4150-102', 'jordan-team-showcase-cd4150-102', 'Jordan Team Showcase - because teamwork matters! But if you\'re far from playing basketball, perhaps you\'ll love designer footwear in the style of NBA players? The Jordan Team Showcase model features a red leather and synthetic upper, so you get a durable product that will last for years. No need to buy more pairs! Nike Air\'s cushioning technology knows how to react quickly to changing uneven terrain. A rubber outsole helps him in this, which maintains a high level of stabilization. The model is topped with a white JORDAN inscription and delicate ventilation holes.', 137, 171.3, '1', 'cfc8af1d17d7262ead63eb1e3861fda6.jpg', '0'),
(136, 30, 'Jordan Aerospace 720', ' BV5502-002', 'jordan-aerospace-720--bv5502-002', 'Jordan Aerospace 720 is a new generation model. Totally modern, forward-thinking and comfortable you never dreamed of. The resilient upper made of leather and various high-quality materials ensures perfect technical and visual condition for a long time. Pleasant to the touch interior makes every step taken. The largest Air cushion to date absorbs all shocks. Match the model in black, white and beige colors with everyday basic clothes.', 179.2, 224, '1', 'e9cb7b47a39cd457d4ce81c3a14afee7.jpg', '0'),
(137, 30, 'Jordan Aerospace 720', 'BV5502-004', 'jordan-aerospace-720-bv5502-004', 'Jordan Aerospace 720 is a new generation model. Totally modern, forward-thinking and comfortable you never dreamed of. The resilient upper made of leather and various high-quality materials ensures perfect technical and visual condition for a long time. Pleasant to the touch interior makes every step taken. The largest Air cushion to date absorbs all shocks. Match the model in black, white and beige colors with everyday basic clothes.', 179.2, 224, '1', 'd324ea8679070799c5a3cd69e731dbce.jpg', '1'),
(138, 30, 'Jordan Proto Max 720', 'BQ6623-002', 'jordan-proto-max-720-bq6623-002', 'Inspired by outer space flight, the Jordan Proto-Max 720 provides all-day comfort with a future-forward look. An outer shroud covers the sock-like bootie construction, while Nike Air cushions every step. A 720 Air unit runs the length of the outsole for visible, bouncy cushioning.', 168.7, 224, '1', '3dcafb50020dabca47ad86aaab41f8f5.jpg', '0'),
(139, 30, 'Air Jordan 4 Retro', '308497-116', 'air-jordan-4-retro-308497-116', 'Jordan fanatics and purists have been patiently waiting for this highly coveted retro release as this colorway in its state – with the Nike Air on the heel – has never been re-issued since its original release in 1989. An un-touched original is quite a rarity these days, and with the overall popularity of the Air Jordan 4 silhouette still flying high.', 421.6, 0, '1', '2940d7d3f18dacc32a1f87834b56b2a7.jpg', '1'),
(140, 30, 'Air Jordan 4 Retro', '308497-060', 'air-jordan-4-retro-308497-060', 'Jordan fanatics and purists have been patiently waiting for this highly coveted retro release as this colorway in its state – with the Nike Air on the heel – has never been re-issued since its original release in 1989. An un-touched original is quite a rarity these days, and with the overall popularity of the Air Jordan 4 silhouette still flying high.', 421.6, 0, '1', '209a33d6c72b3c9d3bac82ce390823e1.jpg', '0'),
(141, 31, 'Jordan Why Not Zer0.3', 'CD3003-101', 'jordan-why-not-zer0-3-cd3003-101', 'The Jordan \"Why Not?\" Zer0. 3 is tuned for Russ\' on-court chaos, featuring a midfoot strap to secure the fit and a large cushioning unit to help drive him hard and fast toward the basket. Designed specifically for Russ, the large Air Zoom Turbo unit in the front of the shoe is curved to follow the foot\'s natural shape.', 110.7, 158.1, '1', '2638d5d5efd5ff31a0694c0d6beabcae.jpg', '0'),
(142, 30, 'Jordan Delta', 'CD6109-002', 'jordan-delta-cd6109-002', 'The Jordan Delta has a design that\'s expressive and comfortable from the inside out. Made with a mix of materials, this shoe has plush, lightweight foam underfoot. Its meticulously crafted for a look and feel only Jordan brand can deliver. Nike React foam is ultrasoft and lightweight with a responsive feel.', 116, 145, '1', '9d638500688ae25cdd49320876574717.jpg', '0'),
(143, 31, 'Jordan Why Not Zer0.3', 'CD3003-006', 'jordan-why-not-zer0-3-cd3003-006', 'The Jordan \"Why Not?\" Zer0. 3 is tuned for Russ\' on-court chaos, featuring a midfoot strap to secure the fit and a large cushioning unit to help drive him hard and fast toward the basket. Designed specifically for Russ, the large Air Zoom Turbo unit in the front of the shoe is curved to follow the foot\'s natural shape.\r\n', 126.5, 158.1, '1', '07bd05e73335518bf8dcdc3ab1e71d07.jpg', '0');

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
(10, 1, 130),
(12, 3, 130),
(15, 2, 130),
(14, 1, 130),
(10, 3, 131),
(12, 2, 131),
(10, 4, 132),
(10, 4, 128),
(11, 3, 128),
(12, 4, 128),
(14, 2, 128),
(11, 1, 127),
(13, 2, 127),
(12, 3, 132),
(13, 3, 132),
(11, 3, 129),
(13, 1, 129),
(15, 2, 129),
(10, 1, 139),
(11, 1, 139),
(12, 2, 139),
(13, 3, 139),
(13, 2, 140),
(15, 1, 140),
(11, 1, 140),
(10, 2, 136),
(11, 3, 136),
(13, 2, 136),
(15, 2, 136),
(10, 1, 137),
(11, 4, 137),
(13, 3, 137),
(11, 2, 142),
(15, 1, 142),
(12, 3, 138),
(10, 1, 133),
(13, 2, 133),
(11, 3, 133),
(12, 4, 134),
(13, 1, 134),
(15, 2, 134),
(13, 4, 135),
(14, 1, 135),
(10, 2, 135),
(6, 1, 141),
(7, 2, 141),
(8, 3, 141),
(9, 1, 141),
(7, 2, 143),
(9, 1, 143),
(8, 3, 143),
(10, 3, 105),
(11, 2, 105),
(12, 4, 105),
(15, 3, 105),
(12, 2, 126),
(10, 2, 125),
(11, 3, 125);

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
(139, 106),
(139, 115),
(139, 133),
(139, 136),
(139, 138),
(139, 141);

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
(18, 'dns', '$2y$10$UUeVZQu8IFnwuMx4Uz6PHufn23MPILgY6MEdbIQ.qxFmMGxKcY6RK', 'denis_m_@mail.ru', 'Denis Moiseienko', 'Poland  Bydgoszcz 85-011 ul.Sniadeckich b.43 m. 9', 'admin');

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
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

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