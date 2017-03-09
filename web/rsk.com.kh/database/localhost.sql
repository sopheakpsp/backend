-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2012 at 05:27 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsk`
--
CREATE DATABASE `rsk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rsk`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name_en` varchar(50) CHARACTER SET utf8 NOT NULL,
  `c_home` varchar(150) CHARACTER SET utf8 NOT NULL,
  `c_road` varchar(255) CHARACTER SET utf8 NOT NULL,
  `c_sangkat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `c_khan` varchar(255) CHARACTER SET utf8 NOT NULL,
  `c_city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `c_phone` varchar(50) NOT NULL,
  `duration` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `paid` double NOT NULL,
  `pay_status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day_buy` int(11) NOT NULL,
  `month_buy` int(11) NOT NULL,
  `year_buy` int(11) NOT NULL,
  `day_x` int(11) NOT NULL,
  `month_x` int(11) NOT NULL,
  `year_x` int(11) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name_en`, `c_home`, `c_road`, `c_sangkat`, `c_khan`, `c_city`, `c_phone`, `duration`, `total`, `paid`, `pay_status`, `day_buy`, `month_buy`, `year_buy`, `day_x`, `month_x`, `year_x`, `staff_id`, `active`) VALUES
(43, 'រិន ធីលីណា', '24E0', '208', 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '069878669', '1', 6000, 6000, 'ជំពាក់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(44, 'កង តាក់សាវ', '155E2', '182', 'វាលវង្ស', 'ប្រាំពីរមករា', 'ក្រុងភ្នំពេញ', '069583414', '1', 0, 0, 'ជំពាក់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(45, 'លី ចំរើន', '2E1', '200', 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '093805093', '1', 300000, 100000, 'រួចរាល់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(46, 'ជុំ កុសល', '544', '177', 'ស្ទឺងមានជ័យ', 'មានជ័យ', 'ភ្នំពេញ', '010256769', '1', 400000, 150000, 'ជំពាក់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(47, 'តាំង គន្ធា', 'T-24', '402', 'ទំនប់ទឹក', 'ចំការមន', 'ភ្នំពេញ', '098954646', '1', 150000, 50000, 'រួចរាល់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(48, 'ប៉ុក បញ្ញា', '6 Biss', '514', 'ផ្សារដើមថ្កូវ', 'ចំការមន', 'ភ្នំពេញ', '015924646', '1', 400000, 0, 'រួចរាល់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(49, 'សុខ ចំរើន', '143', '118', 'ទឹកល្អក់ពីរ', 'ទួលគោក', 'ភ្នំពេញ', '098343593', '1', 60000, 0, 'រួចរាល់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(50, 'សុខ ដាវិន', '59GF4', '221', 'ចំការមន', 'ទន្លេបាសាក់', 'ភ្នំពេញ', '092387726', '1', 800000, 0, 'ជំពាក់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(51, 'ភុំ កល្យាណ', '6E0', '19', 'ចតុមុខ', 'ដូនពេញ', 'ភ្នំពេញ', '093343775', '3', 800000, 300000, 'ជំពាក់', 16, 9, 2012, 16, 12, 2012, 2, 1),
(52, 'ថៃ សត្យា', 'N35', '367', 'ច្បារអំពៅ', 'មានជ័យ', 'ភ្នំពេញ', '098999768', '3', 1200000, 400000, 'ជំពាក់', 5, 9, 2012, 5, 12, 2012, 4, 1),
(53, 'កែវ វាសនា', '87', '277', 'ព្រែកលាព', 'ឫស្សីកែវ', 'ភ្នំពេញ', '012221217', '3', 120000, 20000, 'រួចរាល់', 5, 9, 2012, 5, 12, 2012, 4, 1),
(54, 'ហេង ប៊ុនធឿន', '82E0', '226', 'ផ្សារដើមគរ', 'ទួលគោក', 'ភ្នំពេញ', '011313636', '3', 900000, 400000, 'រួចរាល់', 10, 8, 2012, 10, 11, 2012, 15, 1),
(55, 'កែវ ភក្រ្តា', '13z', '178', 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '011261127', '3', 180000, 80000, 'ជំពាក់', 1, 9, 2012, 1, 12, 2012, 2, 1),
(56, 'ធី សំណាង', '12E0', '55', 'វាលវង្ស', 'ប្រាំពីរមករា', 'ភ្នំពេញ', '0978787222', '1', 1500000, 500000, 'ជំពាក់', 16, 9, 2012, 16, 10, 2012, 16, 1),
(57, 'ឆាយ ហុក', '78z', '57', 'ផ្សារដើមគរ', 'ទួលគោក', 'ភ្នំពេញ', '017265521', '3', 1000000, 0, 'ជំពាក់', 3, 7, 2012, 3, 10, 2012, 16, 1),
(58, 'សំណាង វិធាវី', '17D', '171', 'ទំនប់ទឹក', 'ប្រាំពីរមករា', 'ភ្នំពេញ', '081818187', '3', 600000, 0, 'ជំពាក់', 10, 8, 2012, 10, 11, 2012, 4, 1),
(59, 'សម សុក្រិ', '85J', '77', 'ស្ទឹងមានជ័យ', 'មានជ័យ', 'ភ្នំពេញ', '89141525', '3', 400000, 100000, 'ជំពាក់', 15, 9, 2012, 15, 12, 2012, 4, 1),
(60, 'ឯក គង្គា', '54E0', '271', 'ទំនប់ទឹក', 'ចំការមន', 'ភ្នំពេញ', '0877767817', '1', 800000, 0, 'ជំពាក់', 16, 9, 2012, 16, 10, 2012, 2, 1),
(61, 'កន កុសល', '18z', '214', 'ចតុមុខ', 'ទន្លេបាសាក់', 'ភ្នំពេញ', '011111101', '6', 800000, 0, 'រួចរាល់', 16, 9, 2012, 16, 3, 2013, 16, 1),
(62, 'ផល សំណាង', '៧៨', '៣១២', 'ទឹកល្អក់ពីរ', 'ទួលគោក', 'ភ្នំពេញ', '093930315', '6', 1500000, 500000, 'ជំពាក់', 1, 9, 2012, 1, 3, 2013, 4, 1),
(63, 'ម៉ៅ សម្បត្តិ', '5', '77', 'ផ្សារដើមគរ', 'ទួលគោក', 'ភ្នំពេញ', '016616260', '6', 120000, 0, 'រួចរាល់', 2, 7, 2012, 2, 1, 2013, 7, 1),
(64, 'ជ័យ សិរី', '១៧៧', '២៨២', 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '098 98 98 15', '6', 600000, 0, 'រួចរាល់', 5, 8, 2012, 5, 2, 2013, 6, 1),
(66, 'សម ចំរើន', '12E0', '115', 'វាលវង្ស', 'ប្រាំពីរមករា', 'ភ្នំពេញ', '081811172', '12', 1500000, 500000, 'រួចរាល់', 5, 5, 2012, 5, 5, 2013, 6, 1),
(67, 'អង្គការអភិវឌ្ឋនិស្សិត', '169', '72', 'ស្ទឹងមានជ័យ', 'មានជ័យ', 'ភ្នំពេញ', '012745471', '12', 1000000, 0, 'ជំពាក់', 9, 9, 2012, 9, 9, 2013, 6, 1),
(70, 'lllllllllllllllllllllllllllllllllllllllll', '', '', '', '', '', '', '6', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 3, 2013, 2, 0),
(71, 'LLLLLLLLLLLLLLLLLL', '', '', '', '', '', '', '1', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 10, 2012, 2, 0),
(72, 'mmmmmmmmmmmmmm', '', '', '', '', '', '', '3', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 12, 2012, 2, 0),
(73, '9999999999', '', '', '', '', '', '', '1', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 10, 2012, 2, 0),
(74, 'nnnnnnnnnnnnnnnnnn', '', '', '', '', '', '', '1', 5453, 1, 'ជំពាក់', 17, 9, 2012, 17, 10, 2012, 7, 0),
(75, 'bbbbbbbbbbbbbbb', '', '', '', '', '', '', '1', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 10, 2012, 2, 0),
(76, 'VVVVVVVVVVVV', '', '', '', '', '', '', '1', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 10, 2012, 2, 0),
(77, 'CCCCCCCCCCCCCC', '', '', '', '', '', '', '1', 0, 0, 'ជំពាក់', 17, 9, 2012, 17, 10, 2012, 2, 0),
(78, 'panha', '', '', '', '', '', '', '1', 0, 0, 'ជំពាក់', 20, 9, 2012, 20, 10, 2012, 2, 1),
(79, 'sopheak', '', '', '', '', '', '', '1', 0, 0, '', 21, 9, 2012, 21, 10, 2012, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_buy_products`
--

CREATE TABLE IF NOT EXISTS `customer_buy_products` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  PRIMARY KEY (`c_id`,`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_buy_products`
--

INSERT INTO `customer_buy_products` (`c_id`, `p_id`, `qty`, `p_qty`) VALUES
(0, 190, 20, 300),
(0, 191, 20, 300),
(0, 193, 20, 300),
(0, 194, 20, 300),
(23, 192, 0, 300),
(23, 193, 0, 300),
(23, 194, 0, 300),
(24, 194, 20, 300),
(24, 196, 20, 300),
(25, 182, 20, 300),
(25, 183, 20, 300),
(26, 194, 20, 300),
(26, 196, 20, 300),
(28, 192, 20, 300),
(29, 194, 20, 300),
(30, 192, 20, 300),
(31, 192, 20, 300),
(32, 192, 20, 300),
(33, 194, 20, 300),
(34, 192, 20, 300),
(36, 193, 20, 300),
(36, 194, 20, 300),
(37, 193, 20, 300),
(38, 191, 20, 300),
(38, 192, 20, 300),
(39, 194, 20, 300),
(40, 189, 20, 300),
(40, 190, 20, 300),
(43, 182, 20, 300),
(44, 183, 20, 300),
(45, 191, 20, 300),
(46, 183, 20, 300),
(46, 184, 20, 300),
(47, 191, 20, 300),
(48, 187, 20, 300),
(48, 188, 20, 300),
(48, 191, 20, 300),
(49, 182, 20, 300),
(49, 183, 20, 300),
(49, 184, 20, 300),
(49, 185, 20, 300),
(49, 186, 20, 300),
(50, 187, 20, 300),
(50, 188, 20, 300),
(50, 191, 20, 300),
(50, 192, 20, 300),
(51, 191, 20, 300),
(51, 192, 20, 300),
(51, 193, 20, 300),
(51, 194, 20, 300),
(51, 196, 20, 300),
(52, 187, 20, 300),
(52, 188, 20, 300),
(52, 189, 20, 300),
(52, 190, 20, 300),
(52, 191, 20, 300),
(52, 192, 20, 300),
(53, 182, 20, 300),
(54, 182, 20, 300),
(54, 183, 20, 300),
(54, 184, 20, 300),
(54, 185, 20, 300),
(54, 186, 20, 300),
(55, 185, 20, 300),
(55, 187, 20, 300),
(55, 189, 20, 300),
(55, 191, 20, 300),
(55, 193, 20, 300),
(55, 196, 20, 300),
(56, 182, 20, 300),
(56, 183, 20, 300),
(56, 184, 20, 300),
(56, 187, 20, 300),
(56, 188, 20, 300),
(57, 182, 20, 300),
(58, 182, 20, 300),
(58, 183, 20, 300),
(58, 184, 20, 300),
(59, 183, 20, 300),
(59, 184, 20, 300),
(59, 187, 20, 300),
(59, 188, 20, 300),
(60, 182, 20, 300),
(60, 184, 20, 300),
(60, 188, 20, 300),
(60, 191, 20, 300),
(61, 185, 20, 300),
(61, 186, 20, 300),
(61, 190, 20, 300),
(61, 193, 20, 300),
(62, 182, 20, 300),
(63, 187, 20, 300),
(63, 191, 20, 300),
(63, 192, 20, 300),
(64, 182, 20, 300),
(64, 183, 20, 300),
(64, 184, 20, 300),
(64, 185, 20, 300),
(65, 190, 20, 300),
(65, 191, 20, 300),
(65, 192, 20, 300),
(65, 193, 20, 300),
(66, 191, 20, 300),
(66, 192, 20, 300),
(66, 193, 20, 300),
(66, 194, 20, 300),
(66, 196, 20, 300),
(67, 182, 20, 300),
(67, 183, 20, 300),
(67, 187, 20, 300),
(67, 191, 20, 300),
(68, 182, 20, 300),
(68, 183, 20, 300),
(68, 187, 20, 300),
(68, 191, 20, 300),
(69, 182, 0, 300),
(69, 183, 0, 300),
(69, 184, 0, 300),
(70, 182, 0, 300),
(70, 183, 0, 300),
(70, 184, 0, 300),
(71, 182, 0, 300),
(71, 183, 0, 300),
(71, 184, 0, 300),
(72, 182, 13, 300),
(72, 183, 13, 300),
(72, 184, 13, 300),
(72, 185, 13, 300),
(72, 186, 13, 300),
(72, 187, 13, 300),
(72, 188, 13, 300),
(72, 189, 13, 300),
(72, 190, 13, 300),
(72, 191, 13, 300),
(72, 192, 13, 300),
(72, 193, 13, 300),
(72, 194, 13, 300),
(72, 196, 13, 300),
(73, 182, 0, 300),
(73, 183, 0, 300),
(73, 184, 0, 300),
(74, 182, 3, 300),
(74, 183, 3, 300),
(74, 184, 3, 300),
(74, 185, 3, 300),
(75, 182, 3, 300),
(75, 183, 3, 300),
(75, 184, 3, 300),
(75, 185, 3, 300),
(75, 186, 3, 300),
(76, 182, 3, 300),
(76, 183, 3, 300),
(76, 184, 3, 300),
(76, 185, 3, 300),
(77, 182, 0, 300),
(77, 183, 0, 300),
(77, 184, 0, 300),
(77, 185, 0, 300),
(78, 182, 3, 300),
(78, 183, 4, 300);

-- --------------------------------------------------------

--
-- Table structure for table `khan`
--

CREATE TABLE IF NOT EXISTS `khan` (
  `khan_id` varchar(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khan`
--

INSERT INTO `khan` (`khan_id`, `name`) VALUES
('02', 'ចំកាមន'),
('05', 'ដង្កោ'),
('04', 'ដូនពេញ'),
('06', 'ទួលគោគ'),
('09', 'ពោធតិ៏សែនជ័យ'),
('07', 'មានជ័យ'),
('08', 'សែនសុខ'),
('03', 'ឫស្សីកែវ'),
('01', '៧មករា');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pl_from` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pl_to` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`pl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`pl_id`, `pl_name`, `pl_from`, `pl_to`, `other`, `datetime`, `active`) VALUES
(1, 'rgrdgred', 'sdfsd', 'sdfds', 'sdfsdf', '2012-08-22 17:27:46', 0),
(2, 'dsfgd', 'sdfsd', 'sdfsd', 'sdfsd', '2012-08-22 17:33:15', 0),
(3, 'xdffdv', 'sdfgd', 'dfgdf', 'dfgdf', '2012-08-22 17:34:02', 0),
(4, 'dsfsdf', 'sdds', 'sddsf', 'dfsdf', '2012-08-22 17:35:53', 0),
(5, 'schusdiuh', 'kjh', 'kjh', 'kj', '2012-08-22 17:40:55', 0),
(6, 'fghfdgh', 'hgjh', 'fgdfg', 'gjgh', '2012-08-22 17:47:14', 0),
(7, 'jkzkhsa', 'kjhkjh', 'kjhkjhkjh', 'kjhk', '2012-08-22 17:56:37', 0),
(8, 'kuhjkh', 'kjh', 'kjh', 'kjh', '2012-08-22 17:57:30', 0),
(9, 'sdfdsf111111', 'sdfs', 'sdfsd', 'sdf', '2012-08-22 18:07:01', 0),
(10, 'sffdsgd2323433', 'kjhjkh', 'kjhkj', 'h', '2012-08-22 18:07:42', 0),
(11, 'iuy', 'iu', 'iuy', 'y', '2012-08-22 18:17:15', 0),
(12, 'mjh', 'yiuy', 'iuyiu', 'iu', '2012-08-22 18:18:08', 0),
(13, 'kjhjh', 'jkh', 'kjh', 'kjh', '2012-08-22 18:18:12', 0),
(14, 'jhjg', 'jhg', 'jhg', 'jhg', '2012-08-22 18:18:15', 0),
(15, 'uyiuyiu', 'y', 'iu', 'iuy', '2012-08-22 18:18:28', 0),
(16, 'jhj', 'hjk', 'hjk', 'h', '2012-08-22 18:18:32', 0),
(17, 'jhjg', 'jhg', 'jhg', 'jh', '2012-08-22 18:18:36', 0),
(18, 'lkjkjh', 'kj', 'kjh', 'hkj', '2012-08-22 18:18:39', 0),
(19, 'jhj', 'gjh', 'gjh', 'gjh', '2012-08-22 18:18:43', 0),
(20, 'hghjgjhg', 'jh', 'jhg', 'gjh', '2012-08-22 18:18:54', 0),
(21, 'jhg', 'gjh', 'jh', 'gj', '2012-08-22 18:18:57', 0),
(22, 'jhg', 'hjg', 'hjg', 'jh', '2012-08-22 18:18:59', 0),
(23, 'សកដ្ថហសដ', 'ហ្ហង', 'ក្ហក្', '្ហង្ហ', '2012-08-24 05:41:24', 0),
(24, 'ក', 'វត្តភ្នំ', 'ក្បាលថ្នល់', '', '2012-08-24 08:38:20', 0),
(25, 'ខ', 'សកលវិទ្យាល័យភុមិន្ទភ្នំពេញ', 'ក្រុមហ៊ុម', '', '2012-08-24 08:53:01', 0),
(26, '', 'ផ្លូវកម្ពុជាក្រោម', 'ផ្លុវម៉ៅសេងទុង', '', '2012-08-24 08:54:51', 0),
(27, 'គ', 'ស្ពានជ្រោយចង្វារ', 'ផ្លូវព្រះនរោត្តម', '', '2012-08-24 08:57:32', 0),
(28, 'ឃ', 'ផ្លូវសហព័ន្ធរុស្សី', 'ផ្លូវកម្ពុជាក្រោម', '', '2012-08-24 09:06:20', 0),
(29, 'ង', 'ស្ពានជ្រោយចង្វារ', 'ផ្លូវ​៣១៥', '', '2012-08-24 09:07:22', 0),
(30, 'ច', 'ចប់វិថីព្រះស៊ីសុវត្តិ', 'វិថីព្រះស៊ីសុវត្តិ', '', '2012-08-24 09:09:06', 0),
(31, 'ក', 'វត្តភ្នំ', 'ក្បាលថ្នល់', 'បន្ថែមផ្លូវតូចដែលនៅក្បែរ', '2012-08-24 09:18:01', 1),
(32, 'ខ', 'សាលាភូមិន្ទភ្នំពេញ', 'ក្រុមហ៊ុម', 'បន្ថែមផ្លូវតូចដែលនៅក្បែរ', '2012-08-24 09:18:58', 1),
(33, 'គ', 'ស្ពានជ្រោយចង្វារ', 'ផ្លូវព្រះនរោត្តម', 'បន្លែមផ្ទះអតិថិជនដែលនៅផ្លូចតូច', '2012-08-24 09:20:16', 1),
(34, 'ឃ', 'ផ្លូវកម្ពុជាក្រោម', 'ផ្លូវសហព័ន្ធរុស្សី', '', '2012-08-24 09:21:37', 1),
(35, 'ង', 'ស្ពានជ្រោយចង្វារ', 'ផ្លូវ​៣១៥', 'បន្ថែមផ្លូវតូច', '2012-08-24 09:22:39', 1),
(36, 'ច', 'ចប់វិថីព្រះស៊ីសុវត្តិ', 'វិថីព្រះស៊ីសុវត្តិ', 'បន្លែមក្រុមហ៊ុន៥នៅផ្លូវតូច', '2012-08-24 09:23:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(5) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price_one` float NOT NULL,
  `price_three` float NOT NULL,
  `price_six` float NOT NULL,
  `price_year` float NOT NULL,
  `other` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `price_one`, `price_three`, `price_six`, `price_year`, `other`, `datetime`, `active`) VALUES
(182, 'រស្មីកម្ពុជា', 1200, 1160, 1100, 1000, 'អត់ថ្ងៃច័ន្ទ', '2012-09-21 14:13:14', 1),
(183, 'ខាំបូឌៀដេលីអង់គ្លេស', 1800, 1800, 1800, 1800, 'អត់ថ្ងៃអាទិត្យ', '2012-08-24 09:30:52', 1),
(184, 'ខាំបូឌៀដេលីខ្មែរ', 1200, 1200, 1200, 1200, 'អត់ថ្ងៃអាទិត្យ', '2012-08-24 09:31:35', 1),
(185, 'កោះសន្តីភាព', 1500, 1500, 1000, 1000, 'អត់ថ្ងៃអាទិត្យ', '2012-08-25 09:44:29', 1),
(186, 'កម្ពុជាថ្មី', 1000, 1000, 1000, 1000, 'អត់ថ្ងៃច័ន្ទ', '2012-08-24 09:32:38', 1),
(187, 'ភ្នំពេញប៉ុស្តិ័អង់គ្លេស', 4000, 4000, 4000, 4000, 'អត់ថ្ងៃសៅរិ័ និងអាទិត្យ', '2012-08-24 09:33:58', 1),
(188, 'ភ្នំពេញប៉ុស្តិ័ខ្មែរ', 1000, 1000, 1000, 1000, 'អត់ថ្ងៃសៅរិ័ និងអាទិត្យ', '2012-08-24 09:34:39', 1),
(189, 'នគរវត្ត', 1000, 1000, 1000, 1000, 'អត់ថ្ងៃច័ន្ទ', '2012-08-24 09:36:39', 1),
(190, 'មនៈសិការ', 1000, 1000, 1000, 1000, 'អត់ថ្ងៃច័ន្ទ', '2012-08-24 09:36:22', 1),
(191, 'ទស្សនាវដ្តីប្រជាប្រិយ', 5000, 5000, 5000, 5000, 'មួយខែ ៣លេខ', '2012-08-24 09:37:49', 1),
(192, 'ទស្សនាវដ្តីអង្គរធំ', 5000, 5000, 5000, 5000, 'មួយខែ ៤លេខ', '2012-08-24 09:38:50', 1),
(193, 'Cambodia Sin Chew Daily', 2500, 2500, 2500, 2500, 'មួយអាតិទ្យ ៧ថ្ងៃ', '2012-08-24 09:43:01', 1),
(194, 'Jian Hua Daily', 2500, 2500, 2500, 2500, 'មួយអាតិទ្យ ៧ថ្ងៃ', '2012-08-24 09:43:35', 1),
(196, 'The Commercial News', 2500, 2500, 2500, 2500, 'មួយអាតិទ្យ ៧ថ្ងៃ', '2012-08-24 09:46:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_name_kh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day_birth` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_birth` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year_birth` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `b_sangkat` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_khan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_home` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_road` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_pum` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_sangkat` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_khan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_start` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `month_start` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year_start` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_number`, `s_name_kh`, `s_name_en`, `sex`, `day_birth`, `month_birth`, `year_birth`, `s_phone`, `b_sangkat`, `b_khan`, `b_city`, `c_home`, `c_road`, `c_pum`, `c_sangkat`, `c_khan`, `c_city`, `day_start`, `month_start`, `year_start`, `position`, `place`, `datetime`, `photo`, `active`) VALUES
(2, '០១០៩០៩៧៨៧', 'ប៊ុនណា បញ្ញា', 'Bunna Panha', 'ប្រុស', '9', '7', '1988', '012 369 547', 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '24 AE0', '208', NULL, 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '2', '2', '2010', 'អ្នកចែកកាសែត', 'ឃ', '2012-09-22 02:09:20', '', 1),
(3, '០១០១០០១៧៨', 'ទេព រង្សី', 'Tep Rangsey', 'ប្រុស', '7', '6', '1990', '016 369 254', 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '2E1', '២០០', NULL, 'បឹងរាំង', 'ដូនពេញ', 'ភ្នំពេញ', '3', '5', '2010', 'អ្នកប្រមូលលុយ', 'គ', '2012-09-22 02:09:12', '', 1),
(4, '០០៩២៤១៤៧៨', 'សុខ វិសាល', 'Sok Visal', 'ប្រុស', '12', '9', '1989', '012 369 259', 'ភូមិ២', 'កំពុងត្រៀស', 'កំពង់ចាម', '៥៤៤', '១១២', NULL, 'ស្ទឹងមានជ័យ', 'មានជ័យ', 'ភ្នំពេញ', '6', '6', '2007', 'distributor', 'ខ', '2012-09-22 02:09:03', '', 1),
(5, '០១០១៧១៨៣៦', 'តាំង សុគន្ធធារ', 'Taing Sokunthea', 'ស្រី', '10', '8', '1989', '017 658 695', 'វាលវង្ស', '៧មករា', 'ភ្នំពេញ', 'T-24', 'topaz', NULL, 'ទំនប់ទឹក', 'ចំការមន', 'ភ្នំពេញ', '11', '11', '2011', 'អ្នកប្រមូលលុយ', 'ច', '2012-09-22 02:08:55', '', 1),
(6, '០០៩១៧៧០៣០', 'កង តាក់សាវ', 'Korng Taksav', 'ប្រុស', '20', '12', '1989', '013 695 258', 'វាលវង្ស', '៧មករា', 'ភ្មំពេញ', '១៥៥ E2', '១៨២', NULL, 'វាលវង្ស', '៧មករា', 'ភ្មំពេញ', '8', '6', '2006', 'អ្នកប្រមូលលុយ', 'គ', '2012-09-22 02:08:43', '', 1),
(7, '០១០៣៥០៦១៧', 'ជុំ កុសល', 'Jum Kosal', 'ប្រុស', '11', '3', '1990', '016 698 369', 'វាលវង្ស', '៧មករា', 'ភ្នំពេញ', '១៧​ អឺហ្សឺរូ', '១៨១', NULL, 'ទំនប់ទឹក', 'ទួលគោក', 'ភ្នំពេញ', '10', '11', '2007', 'អ្នកចែកកាសែត', 'ច', '2012-09-22 02:08:31', '', 1),
(15, '010 256 368', 'ឡាយ ប៊ុនអេង', 'Lay Buneng', 'ប្រុស', '25', '10', '1989', '012 369 547', 'ទំនប់ទឹក', '៧មករា', 'ភ្នំពេញ', '១១៧', '២៧១', NULL, 'ទួលសង្កែរ', 'មានជ័យ', 'ក្រុងភ្នំពេញ', '1', '10', '2009', 'អ្នកចែកកាសែត', 'ខ', '2012-09-22 02:08:21', '', 1),
(16, '០១០៦៤៦៣០៥', 'សុខ ដារា', 'Sok Dara', 'male', '4', '3', '1988', '០១០៥៧៧៧៥៨', 'បឹងកេងកង១', 'ចំការមន', 'ភ្នំពេញ', '៨ ហ្សិត', '២២៦', NULL, 'ផ្សារដើមគរ', 'ទួលគោក', 'ភ្នំពេញ', '1', '4', '2008', 'distributor', 'rgrdgred', '2012-09-22 02:07:12', '', 0),
(17, '០១០១០៤៥៨៧', 'ឌុច សុខី', 'Duch Kom', 'ប្រុស', '7', '12', '1989', '069536350', 'បឹងកេងកង១', 'ចំការមន', 'ភ្នំពេញ', '១០ E0', '226', NULL, 'ផ្សារដើមគរ', 'ទួលគោក', 'ភ្នំពេញ', '5', '5', '2010', 'អ្នកចែកកាសែត', 'ក', '2012-09-16 15:45:10', '', 1),
(19, '01074657809', 'ដារា', 'Dara', 'ប្រុស', '1', '12', '1970', '011565667', 'ដូនពេញ', 'ដូនពេញ', 'ភ្នំពេញ', '', '', NULL, '', '', '', '', '', '', '0', 'rgrdgred', '2012-09-22 02:07:13', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_number`, `u_name`, `u_phone`, `username`, `password`, `group`, `position`, `active`) VALUES
('', 'សុខ បញ្ញា', '', 'panha', '', 1, 1, 1),
('', 'ភុំ សុភក្រ្ត', '', 'pheak', '????', 1, 1, 1),
('០០៨៧៦៤៦៥', 'ចាន់ សុគា', '?92 239 129', 'chansokkhea', '123', 2, 2, 2),
('០៩២៣៤២៤', 'សុខគា', '09800987', 'sokea', '123', 2, 2, 2),
('3322', 'ឡីសក', '098834', 'leysak', '123', 2, 2, 1),
('0980932', 'វនិត', '234234', 'nith', '123', 2, 2, 1),
('15478356', 'sopheak', '012456876', 'sopheak', '123', 2, 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;