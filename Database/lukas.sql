-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 05:39 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lukas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `userId` int(11) NOT NULL,
  `nicename` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`userId`, `nicename`, `username`, `email`, `first_name`, `last_name`, `website`, `address`, `zip`, `body`, `image`, `password`, `role`) VALUES
(1, 'Sabbir Sabat', 'sabbir', 'sabbir@hotmail.com', 'Sabbir', 'Sabat', 'https://www.sabbirsabat.com', 'Narayanpur', '1206', '&lt;p&gt;This is sabbir sabat description. he is a good man.&lt;/p&gt;', 'upload/5364b37ef2.jpg', '202cb962ac59075b964b07152d234b70', 0),
(7, '', 'tom', 'tom@hotmail.com', 'tom', 'Bruse', 'https://www.tom.com', 'Manhattan, New York ,City', '88888', '&lt;p&gt;this is tom description. he is a genius&lt;/p&gt;', 'upload/a2dfe84d59.jpg', '202cb962ac59075b964b07152d234b70', 0),
(8, '', 'rahat', 'rahat@gmail.com', 'Rahat', '', 'https://www.rahat.com', '', '', '', '', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `bannerId` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_body` text NOT NULL,
  `banner_type` tinyint(4) NOT NULL DEFAULT '0',
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`bannerId`, `banner_title`, `banner_body`, `banner_type`, `button_text`, `button_link`, `image`) VALUES
(2, 'Latest & Beauty Headlight', '<p>From $85</p>', 0, 'Shop Now', 'http://localhost/lukas/single-product.php?proid=37', 'upload/27e85b336c.jpg'),
(4, 'Exclusive Car Bonnets', '<p>New Design 2018</p>', 0, 'Shop Now', 'http://localhost/lukas/single-product.php?proid=49', 'upload/f10a372760.jpg'),
(5, 'Wheels & Tire Collection', '<p>Latest Design</p>', 0, 'Discover Now', 'http://localhost/lukas/single-product.php?proid=39', 'upload/3783554750.jpg'),
(6, 'Latest Interior Parts', '<p>Use Code: MOMEN for Discount</p>', 1, 'Shop Now', 'http://localhost/lukas/single-product.php?proid=37', 'upload/50c7072cec.jpg'),
(7, 'Latest Exterior Parts', '<p>Use Code: MOMEN for Discount</p>', 1, 'Shop Now', 'http://localhost/lukas/single-product.php?proid=52', 'upload/b438ade1f5.jpg'),
(8, 'ALL CATEGORY OF PRODUCT NEED CAN FIND HERE', '<h2>ALL CATEGORY OF PRODUCT <br /> NEED CAN FIND HERE</h2>', 2, 'Cart Now', 'http://localhost/lukas/shop.php', 'upload/a7137bb9a0.png'),
(9, 'FLASH DEALS', '<h3>HURRY UP AND GET 25% DISCOUNT</h3>', 3, 'Add to Cart', 'http://localhost/lukas/shop.php', 'upload/22a7728a16.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `blogCatId` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `blogCatId`, `comments`, `title`, `body`, `author`, `tags`, `type`, `image`, `date`, `userId`) VALUES
(6, 4, 0, 'Modern technology for making', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'petrol', 2, 'upload/24d8518966.png', '2019-08-30 16:48:43', 1),
(8, 6, 0, 'Technology for BMW', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'BMW, red car', 1, 'upload/40851f4bc5.jpg', '2019-08-30 16:50:22', 1),
(9, 9, 0, 'Audi 532F Relese this december', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'Audi, Audi Car', 0, 'upload/57425522a6.jpg', '2019-08-30 16:52:07', 1),
(10, 5, 0, 'Modern technology for making', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'petrol', 2, 'upload/e501d9f99b.png', '2019-08-30 16:48:43', 1),
(11, 3, 0, 'Technology for BMW', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'BMW, red car', 1, 'upload/40851f4bc5.jpg', '2019-08-30 16:50:22', 1),
(12, 8, 0, 'Audi 532F Relese this december', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'Audi, Audi Car', 0, 'upload/57425522a6.jpg', '2019-08-30 16:52:07', 1),
(13, 4, 0, 'Modern technology for making', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'petrol', 2, 'upload/e501d9f99b.png', '2019-08-30 16:48:43', 1),
(14, 6, 0, 'Technology for BMW', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'BMW, red car', 1, 'upload/40851f4bc5.jpg', '2019-08-30 16:50:22', 1),
(15, 7, 0, 'Audi 532F Relese this december', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'Audi, Audi Car', 0, 'upload/57425522a6.jpg', '2019-08-30 16:52:07', 1),
(16, 4, 0, 'Modern technology for making', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<blockquote class=\"blockquote\">\r\n<p>Dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi, consectetur adipisicing elit. Aliquam aperiam assumenda</p>\r\n</blockquote>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'petrol', 2, 'upload/e501d9f99b.png', '2019-08-30 16:48:43', 1),
(17, 6, 0, 'Technology for BMW', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'BMW, red car', 1, 'upload/40851f4bc5.jpg', '2019-08-30 16:50:22', 1),
(18, 10, 0, 'Audi 532F Relese this december', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi quibusdam quos ratione rem saepe sequi sit unde ut velit vitae. Amet ea error expedita, laboriosam maxime officiis porro ut velit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam assumenda culpa cumque debitis dignissimos, dolor dolores doloribus ducimus fuga iusto magni maiores minus nam numquam officiis provident quasi</p>', 'Sabbir Sabat', 'Audi, Audi Car', 0, 'upload/57425522a6.jpg', '2019-08-30 16:52:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_category`
--

CREATE TABLE `tbl_blog_category` (
  `blogCatId` int(11) NOT NULL,
  `blog_category_name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog_category`
--

INSERT INTO `tbl_blog_category` (`blogCatId`, `blog_category_name`, `body`) VALUES
(3, 'Mobil', '&lt;p&gt;Consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(4, 'Disel', '&lt;p&gt;Extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(5, 'Oil', '&lt;p&gt;Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(6, 'Fuel', '&lt;p&gt;Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(7, 'Gas', '&lt;p&gt;Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(8, 'Petrol', '&lt;p&gt;Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(9, 'Headlight', '&lt;p&gt;Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;'),
(10, 'Seat-Bealt', '&lt;p&gt;Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`, `body`) VALUES
(38, 'Audi', '&lt;p&gt;Audi Desc&lt;/p&gt;'),
(39, 'BMW', ''),
(40, 'Ford', ''),
(41, 'Apache', ''),
(42, 'Toyota', ''),
(43, 'Tata motors', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sale_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`, `body`) VALUES
(14, 'Artificial Car', '<p>Artificial Car desc</p>'),
(15, 'Auto Drive Car', ''),
(16, 'Cars Parts', ''),
(17, 'Wheel', ''),
(18, 'Paddel', ''),
(19, 'Car Cover', ''),
(20, 'Headlight', ''),
(21, 'Disel', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `colorId` int(11) NOT NULL,
  `colorName` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`colorId`, `colorName`, `body`) VALUES
(12, 'Red', ''),
(13, 'Green', ''),
(14, 'Black', ''),
(15, 'White', ''),
(16, 'Megento', ''),
(17, 'Purple', ''),
(18, 'Blue', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sale_price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `toEmail` varchar(50) NOT NULL,
  `fromEmail` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `toEmail`, `fromEmail`, `subject`, `message`, `status`, `date`) VALUES
(3, 'Bob', 'bob@hotmail.com', '', '', 'I want to meet lukas secretery', 'I am a vendor of Lukas car, part and accessories. i start a new section in manhatan.', 0, '2019-09-14 07:15:00'),
(5, 'Tom Bruse', 'tombruse@hotmail.com', '', '', 'Contact for new venture capital', 'This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.\r\n\r\nThis category is for components and parts that make up automobile (car) bodies including accessories.\r\n\r\nOn motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider', 4, '2019-09-15 08:13:31'),
(6, 'keosoki', 'keosoki@gmail.com', '', '', 'Seminer for lukas', 'This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.\r\n\r\nThis category is for components and parts that make up automobile (car) bodies including accessories.\r\n\r\nOn motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider', 2, '2019-09-15 08:22:56'),
(10, 'Robbinson', 'robinson@hotmail.com', '', '', 'I want to meet lukas secretery', 'I am a vendor of Lukas car, part and accessories. i start a new section in manhatan.', 1, '2019-09-14 07:15:00'),
(11, 'lady gaga', 'ladygaga@hotmail.com', '', '', 'Contact for new venture capital', 'This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.\r\n\r\nThis category is for components and parts that make up automobile (car) bodies including accessories.\r\n\r\nOn motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider', 3, '2019-09-15 08:13:31'),
(12, 'Harari', 'harari@gmail.com', '', '', 'Seminer for lukas', 'This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.\r\n\r\nThis category is for components and parts that make up automobile (car) bodies including accessories.\r\n\r\nOn motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider', 4, '2019-09-15 08:22:56'),
(13, 'Tim', 'tim@hotmail.com', '', '', 'I want to meet lukas secretery', 'I am a vendor of Lukas car, part and accessories. i start a new section in manhatan.', 0, '2019-09-14 07:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `id` int(11) NOT NULL,
  `copyright` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `copyright`) VALUES
(1, 'Copyright - <a class=\"yourstore\" href=\"http://www.lionode.com/\"> Created by Lionode Â© 2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cta`
--

CREATE TABLE `tbl_cta` (
  `id` int(11) NOT NULL,
  `ctaTitleOne` varchar(255) NOT NULL,
  `ctaImageOne` varchar(255) NOT NULL,
  `ctaBodyOne` text NOT NULL,
  `ctaTitleTwo` varchar(255) NOT NULL,
  `ctaImageTwo` varchar(255) NOT NULL,
  `ctaBodyTwo` text NOT NULL,
  `ctaTitleThree` varchar(255) NOT NULL,
  `ctaImageThree` varchar(255) NOT NULL,
  `ctaBodyThree` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cta`
--

INSERT INTO `tbl_cta` (`id`, `ctaTitleOne`, `ctaImageOne`, `ctaBodyOne`, `ctaTitleTwo`, `ctaImageTwo`, `ctaBodyTwo`, `ctaTitleThree`, `ctaImageThree`, `ctaBodyThree`) VALUES
(1, 'Free Home Delivery', 'upload/ctaone.png', '<p>Provide free home delivery for all product over $200</p>', 'Quality Products', 'upload/ctatwo.png', '<p>We ensure our product quality all times</p>', 'Online Support', 'upload/ctathree.png', '<p>To satisfy our customer we try to give support online</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `b_first_name` varchar(50) NOT NULL,
  `b_last_name` varchar(50) NOT NULL,
  `b_email` varchar(50) NOT NULL,
  `b_company_name` varchar(50) NOT NULL,
  `b_country` varchar(50) NOT NULL,
  `b_st_address_line_one` varchar(255) NOT NULL,
  `b_st_address_line_two` varchar(255) NOT NULL,
  `b_town_city` varchar(50) NOT NULL,
  `b_state_division` varchar(50) NOT NULL,
  `b_postcode_zip` varchar(50) NOT NULL,
  `b_phone` varchar(30) NOT NULL,
  `s_first_name` varchar(50) NOT NULL,
  `s_last_name` varchar(50) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_company_name` varchar(50) NOT NULL,
  `s_country` varchar(50) NOT NULL,
  `s_st_address_line_one` varchar(255) NOT NULL,
  `s_st_address_line_two` varchar(255) NOT NULL,
  `s_town_city` varchar(50) NOT NULL,
  `s_state_division` varchar(50) NOT NULL,
  `s_postcode_zip` varchar(50) NOT NULL,
  `s_phone` varchar(30) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `first_name`, `last_name`, `username`, `email`, `gender`, `phone`, `password`, `bio`, `image`, `b_first_name`, `b_last_name`, `b_email`, `b_company_name`, `b_country`, `b_st_address_line_one`, `b_st_address_line_two`, `b_town_city`, `b_state_division`, `b_postcode_zip`, `b_phone`, `s_first_name`, `s_last_name`, `s_email`, `s_company_name`, `s_country`, `s_st_address_line_one`, `s_st_address_line_two`, `s_town_city`, `s_state_division`, `s_postcode_zip`, `s_phone`, `note`) VALUES
(14, 'Sabbir', 'Sabat', 'sabbir', 'sabbir@hotmail.com', 'male', '01791672337', '202cb962ac59075b964b07152d234b70', 'This is Sabbir Sabat bio. He is a web developer.', 'admin/upload/611e83464a.jpg', 'Sabbir', 'Sabat', 'sabbirsabat@hotmail.com', 'Gevdevs', 'Bangladesh', 'kolabagan, Dhanmondi', 'Dhanmondi', 'Dhaka', 'Dhaka', '1206', '01795863448', 'Slavo ', 'Zizek', 'slavozizek@protonmail.com', 'Philosopher Inc.', 'Bangladesh', '221 Bk street Sharlok homes', '221 Bk street Sharlok homes', 'Slovania', 'Slovania', '458899', '+51895461285', 'This is special gift from me to slavo zizek. philosopher Inc.  '),
(15, 'Nibir', 'Nilat', 'nibirnilat', 'nibirnilat@gmail.com', 'male', '+87448451245', '202cb962ac59075b964b07152d234b70', '', 'admin/upload/2e89ae9b32.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Sanjana', 'Rahman', 'sanjana', 'sanjana@protonmail.com', 'female', '01856948715', '202cb962ac59075b964b07152d234b70', 'I am Sanjana Rahman. As a Automobile Engineer i like Lukas Car, Parts and Assesories.', 'admin/upload/b254561c40.jpg', 'Sanjana', 'Rahman', 'sanjana@protonmail.com', 'Sanjana Automobile Inc.', 'Afghanistan', 'kolabagan, Dhanmondi ', 'Dhanmondi', 'Dhaka', 'Dhaka', '1206', '01795863448', 'Sporsia', 'Farhan', 'sporsia@gmail.com', 'Home', 'Afghanistan', 'Mirpur DOHS', 'Mirpur Road', 'Dhaka', 'Dhaka', '1105', '01791672336', 'This is gift for Sporsia Farhan.'),
(20, 'Nirjhor', 'Noisobdo', 'nirjhor', 'nirjhor@protonmail.com', 'male', '01794682584', '202cb962ac59075b964b07152d234b70', 'This is Nirjhor Noisobdo bio.This is Nirjhor Noisobdo bio.This is Nirjhor Noisobdo bio.This is Nirjhor Noisobdo bio.', 'admin/upload/deb905a459.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Sanjida', 'Sabat', 'sanjida', 'sanjida@protonmail.com', 'femal', '01791672336', '202cb962ac59075b964b07152d234b70', '', 'admin/upload/f58d4fae9f.png', 'Sanjida', 'Sabat', 'sanjida.sabat@protonmail.com', 'Sanjida Software Inc.', 'London', '', '', '', '', '', '', '', '', '', '', 'London', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE `tbl_media` (
  `id` int(11) NOT NULL,
  `mediaTitle` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `product_name`, `quantity`, `sale_price`, `image`, `date`, `status`, `payment_method`) VALUES
(129, 0, '36', 'Hanging 8K Camera', 1, 36000.00, 'upload/068f336854.png', '2019-09-13 14:51:17', 2, 0),
(131, 19, '36', 'Hanging 8K Camera', 1, 36000.00, 'upload/068f336854.png', '2019-09-14 00:28:39', 0, 0),
(132, 19, '37', 'Auto Clutch & Brake', 1, 28000.00, 'upload/e243d881ad.png', '2019-09-14 00:28:56', 0, 0),
(133, 19, '39', 'Looking Hhub Diagram', 1, 12000.00, 'upload/ca7dcb2d69.png', '2019-09-14 00:29:15', 0, 0),
(135, 14, '39', 'Looking Hhub Diagram', 1, 12000.00, 'upload/ca7dcb2d69.png', '2019-09-16 00:38:19', 0, 0),
(136, 14, '39', 'Looking Hhub Diagram', 1, 12000.00, 'upload/ca7dcb2d69.png', '2019-09-16 00:38:35', 0, 0),
(137, 14, '41', 'Clatch Hub Leather', 4, 160000.00, 'upload/b0a45c7e97.png', '2019-09-16 00:39:17', 1, 0),
(138, 0, '37', 'Auto Clutch & Brake', 1, 28000.00, 'upload/e243d881ad.png', '2019-09-16 00:41:34', 2, 0),
(139, 0, '47', ' View Larger Looking Hhub Diagram', 2, 90000.00, 'upload/f3d517fe15.png', '2019-09-16 17:57:05', 0, 0),
(140, 0, '50', 'Toyota Mordren 500CC', 1, 15000.00, 'upload/2fd3c705a5.png', '2019-09-17 20:42:51', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `pageId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`pageId`, `name`, `body`, `author`, `date`) VALUES
(2, 'Terms & Conditions', '<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>', 'Sabbir Sabat', '2019-08-29 20:33:56'),
(4, 'Privacy & Policy', '<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>', 'Sabbir Sabat', '2019-08-29 21:03:31'),
(5, 'Gift Vouchers', '<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>\r\n<p>This is a list of automotive parts mostly for vehicles using internal combustion engines which are manufactured components of automobiles.</p>\r\n<p>This category is for components and parts that make up automobile (car) bodies including accessories.</p>\r\n<p>On motorbikes their main function is to shield the rider from wind, though not as completely as in a car, whereas on sports and racing motorcycles the main function is reducing drag when the rider</p>', 'Sabbir Sabat', '2019-08-29 21:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `instructions` text NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `bic_swift` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `title`, `description`, `instructions`, `account_name`, `account_number`, `bank_name`, `short_code`, `iban`, `bic_swift`, `payment_type`) VALUES
(1, 'Direct Bank Transfer', 'Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account. ', 'Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.', 'lukas Shop', '7985486897565  ', 'Datch Bangla Bank Ltd.', '87954555', '41254555', 'DBBL', 0),
(2, 'Check Payment', 'Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.', 'Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.', '', '', '', '0', '0', '', 1),
(3, 'Cash On Delivery', 'Pay with cash upon delivery.', 'Pay with cash upon delivery.', '', '', '', '0', '0', '', 2),
(4, 'Paypal', '', '', '', '', '', '0', '0', '', 3),
(5, 'bkash', '', '', '', '', '', '0', '0', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `colorId` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `body` text NOT NULL,
  `sale_price` float(10,2) NOT NULL,
  `regular_price` float(10,2) NOT NULL,
  `tax` float NOT NULL,
  `tag` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `short_body` text NOT NULL,
  `size_guide` text NOT NULL,
  `extra_info` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_gallary` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `upsell` varchar(255) NOT NULL,
  `cross_sells` varchar(255) NOT NULL,
  `product_type` tinyint(4) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `product_name`, `catId`, `brandId`, `colorId`, `sizeId`, `body`, `sale_price`, `regular_price`, `tax`, `tag`, `sku`, `stock`, `short_body`, `size_guide`, `extra_info`, `image`, `product_gallary`, `weight`, `length`, `width`, `height`, `upsell`, `cross_sells`, `product_type`, `date`) VALUES
(36, 'Hanging 8K Camera', 19, 42, 18, 20, '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>\r\n<div class=\"product-config\" style=\"box-sizing: border-box; margin: 40px 0px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>', 36000.00, 42000.00, 22, 'Hanging 4k , camera', '05', '18', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>\r\n<div class=\"product-config\" style=\"box-sizing: border-box; margin: 40px 0px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>', '<table style=\"height: 31px;\" width=\"589\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 111px;\">xxs</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 111px;\">sss</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n<td style=\"width: 111px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>\r\n<div class=\"product-config\" style=\"box-sizing: border-box; margin: 40px 0px; color: #303030; font-family: Poppins, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>', 'upload/068f336854.png', '', '350', '20', '30', '18', '36', '36', 4, '2019-09-03 18:54:36'),
(37, 'Auto Clutch & Brake', 18, 41, 15, 20, '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', 28000.00, 32000.00, 10, 'Auto Clutch & Brake. Car', '05', '20', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', 'upload/e243d881ad.png', '', '500', '200', '150', '90', '36', '34', 1, '2019-09-03 18:58:10'),
(38, '17 inch Rims 8 Lugs', 17, 42, 16, 20, '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 10000.00, 12000.00, 10, 'Rims, Lugs', '555', '10', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/9f054988c5.png', '', '10', '25', '28', '10', '38', '38', 1, '2019-09-06 06:52:17'),
(39, 'Looking Hhub Diagram', 17, 41, 16, 14, '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 12000.00, 14000.00, 15, 'Hub, Diagram', '444', '25', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/ca7dcb2d69.png', '', '15', '55', '55', '30', '39', '39', 1, '2019-09-06 06:54:51'),
(40, 'Leather Steeering Wheel', 17, 40, 0, 0, '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 25000.00, 27000.00, 20, 'Leather, Wheels, Stearing', '', '', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/3281345ec2.png', '', '24', '15', '15', '25', 'Sellect Upsell Product', 'Sellect Cross-sells Product', 1, '2019-09-06 06:58:00'),
(41, 'Clatch Hub Leather', 16, 39, 15, 14, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 40000.00, 45000.00, 30, 'Wheels, Stearing', '11', '25', '<p>ul. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>ul. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>ul. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/b0a45c7e97.png', '', '24', '25', '58', '14', '41', '41', 1, '2019-09-06 07:07:23'),
(43, '32 inch Rims 8 Lugs', 16, 42, 18, 18, '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 46000.00, 55000.00, 45, 'Rims, Lugs', '364', '45', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/520199e034.png', '', '45', '56', '56', '45', '41', '34', 4, '2019-09-06 07:13:20'),
(44, 'Looking Hhub Diagram', 18, 40, 15, 14, '<p>s to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 58000.00, 60000.00, 12, 'Hub, Diagram', 'HG4582', '42', '<p>s to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>s to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>s to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/35c494bdc2.png', '', '54', '42', '55', '55', '44', '44', 4, '2019-09-06 07:19:12'),
(45, 'Brake Auto Clutch', 20, 43, 14, 23, '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', 32000.00, 28000.00, 5, 'Auto Clutch & Brake. Car', 'KJL25849', '50', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', '<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves asionally circles</p>\r\n<p>Pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there m solute nobie est eligendi option</p>', 'upload/00dc7bdc39.png', '', '45', '85', '58', '45', '45', '45', 4, '2019-09-06 07:21:49'),
(46, 'Ford Mordren 66G', 15, 40, 16, 19, '<p>nces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', 3000000.00, 3200000.00, 45, 'Ford Car, Morden Parts', 'JK48', '15', '<p>nces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', '<p>nces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', '<p>nces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', 'upload/85d2c62e7c.png', '', '7500', '12000', '58000', '1446', '46', '46', 3, '2019-09-06 07:24:54'),
(47, ' View Larger Looking Hhub Diagram', 18, 41, 13, 16, '<p>sure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi optionsure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 45000.00, 48000.00, 5, 'Hub, Diagram', 'HGD9842', '80', '<p>sure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>sure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>sure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/f3d517fe15.png', '', '45', '28', '55', '30', '47', '47', 3, '2019-09-06 07:34:21'),
(49, 'Audi Auto Drive Car', 15, 38, 12, 23, '<p>Audi pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some gre</p>', 320000.00, 3500000.00, 10, 'Audi Red, Semi Automated Car', 'HHYF5846', '40', '<p>Audi pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some gre</p>', '<p>Audi pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some gre</p>', '<p>Audi pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some gre</p>', 'upload/04aba9874d.jpg', '', '400', '220', '220', '250', '37', '36', 3, '2019-09-06 07:49:20'),
(50, 'Toyota Mordren 500CC', 17, 42, 14, 16, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', 15000.00, 12000.00, 15, 'Toyota, Toyota Modern', 'SF158', '45', '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circes occur in and pain can procure him some great ple cum soluta nobis est eligendi optio cumque nihil impedit quo minus id qu maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>', 'upload/2fd3c705a5.png', '', '15', '15', '55', '30', '50', '50', 3, '2019-09-06 07:56:00'),
(51, 'Tata Motor Parts', 16, 43, 14, 20, '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', 45000.00, 50000.00, 10, 'Tata, Parts', 'G\\HG45', '458', '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', 'upload/32fda63d3e.png', '', '15', '45', '75', '78', '51', '51', 3, '2019-09-06 08:33:32'),
(52, 'Ford Auto Drive Parts', 16, 40, 15, 21, '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', 6500000.00, 7500000.00, 10, 'Ford Car, Morden Parts', 'HGT54', '458', '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', '<p>Created from either wood or recycled materials, it can be moulded into just about any shape and hardens to provide a hard shell. Additives can make it water resistant and it can be produced in a rainbow of colours. Other materials being looked at include paper clay, paper glue, paper c</p>', 'upload/e649ff2ad1.png', '', '45', '45', '45', '45', '52', '52', 2, '2019-09-06 08:36:47'),
(53, 'HeadLight & CC Camera ', 20, 41, 13, 17, '<p>encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 78000.00, 850000.00, 10, 'CC Cameras', 'HGHH458', '500', '<p>encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/a3863d0eba.png', '', '78', '45', '45', '12', '53', '53', 2, '2019-09-06 08:39:41'),
(54, 'Toyota 3 Lier Tieers', 16, 41, 17, 18, '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 58000.00, 48800.00, 5, 'Toyota, Lier Tieers', 'SSD8745', '40', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/79774c3f12.png', '', '24', '58', '48', '48', '42', '39', 2, '2019-09-06 08:47:10'),
(56, 'Audi GG85 Patrs', 18, 38, 16, 15, '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 8000.00, 10000.00, 5, 'Audi GG85 Patrs', 'HGHG7845', '80', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', '<p>pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circles occur in and pain can procure him some great ple cum solute nobie est eligendi option</p>', 'upload/2d434bd7d7.png', '', '45', '45', '78', '78', '56', '56', 2, '2019-09-06 08:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `sizeId` int(11) NOT NULL,
  `sizeName` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`sizeId`, `sizeName`, `body`) VALUES
(13, 'XXS', ''),
(14, 'XS', ''),
(15, 'S', ''),
(16, 'M', ''),
(17, 'L', ''),
(18, 'XL', ''),
(19, 'XXL', ''),
(20, '82', ''),
(21, '120', ''),
(22, '140', ''),
(23, '260', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_body` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `slider_title`, `slider_body`, `button_text`, `button_link`, `image`) VALUES
(5, 'New Technology & Build', '<p>WHEELS &amp; TIERS COLLECTION</p>', 'Shop Now', 'http://localhost/lukas/single-product.php?proid=38', 'upload/160c4c5dc0.png'),
(6, 'jkk', '<p>eeeeee</p>', 'Cart Now', 'http://localhost/lukas/shop.php', 'upload/f724c8cc27.png'),
(7, '', '', '', '', 'upload/f4ee10b6d7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`id`, `email`, `date`) VALUES
(1, 'sabat@hotmail.com', '2019-09-03 14:51:58'),
(2, 'nibirnilat@gmail.com', '2019-09-03 14:53:10'),
(5, 'harry@den.com', '2019-09-03 15:21:35'),
(6, 'nilat@hotmail.com', '2019-09-03 17:53:41'),
(7, 'mhsabbirshaikh@gmail.com', '2019-09-04 11:49:49'),
(8, 'sanjana@protonmail.com', '2019-09-07 18:14:13'),
(9, 'sanjida@protonmail.com', '2019-09-12 20:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe_meta`
--

CREATE TABLE `tbl_subscribe_meta` (
  `subsId` int(11) NOT NULL,
  `subs_title` varchar(255) NOT NULL,
  `subs_body` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribe_meta`
--

INSERT INTO `tbl_subscribe_meta` (`subsId`, `subs_title`, `subs_body`, `image`) VALUES
(1, 'SPECIAL OFFER FOR SUBSCRIPTION', '<h2>GET INSTANT DISCOUNT FOR MEMBERSHIP</h2>\r\n<p>Subscribe our newsletter and all latest news of our <br />latest product, promotion and offers</p>', 'upload/c17c803a6c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sale_price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `cmrId`, `productId`, `product_name`, `sale_price`, `image`) VALUES
(16, 19, 43, '32 inch Rims 8 Lugs', 46000.00, 'upload/520199e034.png'),
(18, 14, 37, 'Auto Clutch & Brake', 28000.00, 'upload/e243d881ad.png'),
(19, 20, 37, 'Auto Clutch & Brake', 28000.00, 'upload/e243d881ad.png'),
(20, 19, 39, 'Looking Hhub Diagram', 12000.00, 'upload/ca7dcb2d69.png'),
(21, 21, 44, 'Looking Hhub Diagram', 58000.00, 'upload/35c494bdc2.png'),
(22, 19, 38, '17 inch Rims 8 Lugs', 10000.00, 'upload/9f054988c5.png');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Lukas', 'Modern Car, Parts and Assessories', 'upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`bannerId`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  ADD PRIMARY KEY (`blogCatId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`colorId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cta`
--
ALTER TABLE `tbl_cta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`sizeId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe_meta`
--
ALTER TABLE `tbl_subscribe_meta`
  ADD PRIMARY KEY (`subsId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `bannerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `blogCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `colorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
