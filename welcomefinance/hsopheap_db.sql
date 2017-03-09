-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2014 at 06:49 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angkor_search_db`
--


-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccode` varchar(15) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `ccode`, `country`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Aland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia'),
(28, 'BA', 'Bosnia and Herzegovina'),
(29, 'BW', 'Botswana'),
(30, 'BV', 'Bouvet Island'),
(31, 'BR', 'Brazil'),
(32, 'IO', 'British Indian Ocean Territory'),
(33, 'BN', 'Brunei Darussalam'),
(34, 'BG', 'Bulgaria'),
(35, 'BF', 'Burkina Faso'),
(36, 'BI', 'Burundi'),
(37, 'KH', 'Cambodia'),
(38, 'CM', 'Cameroon'),
(39, 'CA', 'Canada'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CD', 'Congo, The Democratic Republic of the'),
(52, 'CK', 'Cook Islands'),
(53, 'CR', 'Costa Rica'),
(54, 'CI', 'Côte D''Ivoire'),
(55, 'HR', 'Croatia'),
(56, 'CU', 'Cuba'),
(57, 'CY', 'Cyprus'),
(58, 'CZ', 'Czech Republic'),
(59, 'DK', 'Denmark'),
(60, 'DJ', 'Djibouti'),
(61, 'DM', 'Dominica'),
(62, 'DO', 'Dominican Republic'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'FK', 'Falkland Islands (Malvinas)'),
(71, 'FO', 'Faroe Islands'),
(72, 'FJ', 'Fiji'),
(73, 'FI', 'Finland'),
(74, 'FR', 'France'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GG', 'Guernsey'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard Island and McDonald Islands'),
(96, 'VA', 'Holy See (Vatican City State)'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran, Islamic Republic of'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IM', 'Isle of Man'),
(107, 'IL', 'Israel'),
(108, 'IT', 'Italy'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JE', 'Jersey'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People''s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macao'),
(130, 'MK', 'Macedonia, The Former Yugoslav Republic of'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestinian Territory, Occupied'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'BL', 'Saint Barthélemy'),
(185, 'SH', 'Saint Helena'),
(186, 'KN', 'Saint Kitts and Nevis'),
(187, 'LC', 'Saint Lucia'),
(188, 'MF', 'Saint Martin'),
(189, 'PM', 'Saint Pierre and Miquelon'),
(190, 'VC', 'Saint Vincent and the Grenadines'),
(191, 'WS', 'Samoa'),
(192, 'SM', 'San Marino'),
(193, 'ST', 'Sao Tome and Principe'),
(194, 'SA', 'Saudi Arabia'),
(195, 'SN', 'Senegal'),
(196, 'RS', 'Serbia'),
(197, 'SC', 'Seychelles'),
(198, 'SL', 'Sierra Leone'),
(199, 'SG', 'Singapore'),
(200, 'SK', 'Slovakia'),
(201, 'SI', 'Slovenia'),
(202, 'SB', 'Solomon Islands'),
(203, 'SO', 'Somalia'),
(204, 'ZA', 'South Africa'),
(205, 'GS', 'South Georgia and the South Sandwich Islands'),
(206, 'ES', 'Spain'),
(207, 'LK', 'Sri Lanka'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan, Province Of China'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TL', 'Timor-Leste'),
(220, 'TG', 'Togo'),
(221, 'TK', 'Tokelau'),
(222, 'TO', 'Tonga'),
(223, 'TT', 'Trinidad and Tobago'),
(224, 'TN', 'Tunisia'),
(225, 'TR', 'Turkey'),
(226, 'TM', 'Turkmenistan'),
(227, 'TC', 'Turks and Caicos Islands'),
(228, 'TV', 'Tuvalu'),
(229, 'UG', 'Uganda'),
(230, 'UA', 'Ukraine'),
(231, 'AE', 'United Arab Emirates'),
(232, 'GB', 'United Kingdom'),
(233, 'US', 'United States'),
(234, 'UM', 'United States Minor Outlying Islands'),
(235, 'UY', 'Uruguay'),
(236, 'UZ', 'Uzbekistan'),
(237, 'VU', 'Vanuatu'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Viet Nam'),
(240, 'VG', 'Virgin Islands, British'),
(241, 'VI', 'Virgin Islands, U.S.'),
(242, 'WF', 'Wallis And Futuna'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tblarticle`
--

CREATE TABLE IF NOT EXISTS `tblarticle` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_to_img` varchar(10) NOT NULL,
  `media_type` varchar(30) NOT NULL,
  `media` tinytext NOT NULL,
  `mwidth` int(11) NOT NULL,
  `mheight` int(11) NOT NULL,
  `malign` varchar(20) NOT NULL,
  `thumbnail` varchar(10) NOT NULL,
  `screenshot` tinytext NOT NULL,
  `twidth` int(11) NOT NULL,
  `theight` int(11) NOT NULL,
  `sub_value` tinytext NOT NULL,
  `sub_of` varchar(50) NOT NULL,
  `linkto_type` varchar(30) NOT NULL,
  `link_to` tinytext NOT NULL,
  `display` varchar(10) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `view_type` varchar(30) NOT NULL,
  `booking_button` varchar(10) NOT NULL,
  `visitor_counter` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `front_page` varchar(10) NOT NULL,
  `l_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `num_view` bigint(20) NOT NULL,
  `tag` text NOT NULL,
  `addon` tinytext NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=536 ;

--
-- Dumping data for table `tblarticle`
--

INSERT INTO `tblarticle` (`a_id`, `email_to_img`, `media_type`, `media`, `mwidth`, `mheight`, `malign`, `thumbnail`, `screenshot`, `twidth`, `theight`, `sub_value`, `sub_of`, `linkto_type`, `link_to`, `display`, `recycle`, `view_type`, `booking_button`, `visitor_counter`, `ordering`, `front_page`, `l_id`, `pm_id`, `num_view`, `tag`, `addon`, `add_date`, `edit_date`, `delete_date`) VALUES
(299, 'yes', 'customize', 'logo_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 1, 1, 2, '', '', '2013-03-26 15:03:26', '2014-05-16 02:00:15', '2013-03-26 15:03:58'),
(214, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '?page=front', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 2, 1, 0, '', '', '2012-05-07 13:03:06', '2013-07-20 13:11:37', '2012-05-07 13:04:00'),
(215, 'yes', 'youtube', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 2, 4, 1355, '', '', '2012-05-07 13:04:00', '2013-07-20 16:10:00', '2014-01-03 08:44:10'),
(51, 'no', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Location', '11', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-10 18:01:54', '2014-01-07 07:27:32', '2011-06-10 18:01:54'),
(52, 'no', 'customize', 'address.png', 0, 0, 'left', 'no', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'column', 'no', 'no', 0, 'no', 32, 1, 857, '', '', '2011-06-11 12:29:04', '2013-08-09 11:44:25', '2011-06-11 12:29:04'),
(53, 'no', 'customize', 'fax.png', 0, 0, 'left', 'no', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'column', 'no', 'no', 0, 'no', 32, 1, 837, '', '', '2011-06-11 12:46:33', '2013-06-24 18:44:04', '2011-06-11 12:46:33'),
(54, 'no', 'customize', 'fax.png', 0, 0, 'left', 'no', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'column', 'no', 'no', 0, 'no', 32, 1, 829, '', '', '2011-06-11 12:53:27', '2013-06-24 18:44:17', '2011-06-11 12:53:27'),
(55, 'no', 'customize', 'email.png', 0, 0, 'left', 'no', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'column', 'no', 'no', 0, 'no', 32, 1, 828, '', '', '2011-06-11 12:54:38', '2013-06-24 18:45:50', '2011-06-11 12:54:38'),
(468, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2013-08-21 02:46:59', '2013-08-21 02:47:16', '2014-01-09 02:09:08'),
(63, 'no', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 3, '', '', '2011-06-14 11:31:20', '2013-02-14 14:24:48', '2011-06-14 11:31:20'),
(70, 'no', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-14 12:19:10', '2011-09-25 17:18:07', '2011-06-14 12:19:10'),
(73, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 17:30:46', '2011-08-28 19:12:51', '2011-06-18 17:31:50'),
(74, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 17:34:49', '2011-08-28 19:13:28', '2011-06-18 17:35:16'),
(75, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 17:35:37', '2012-07-04 18:22:15', '2011-06-18 17:36:31'),
(76, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 4, 0, '', '', '2011-06-18 17:36:31', '2012-07-04 18:21:57', '2011-06-18 17:37:43'),
(77, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 4, 0, '', '', '2011-06-18 17:37:43', '2011-08-23 08:08:41', '2011-06-18 17:38:34'),
(78, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 4, 0, '', '', '2011-06-18 17:38:34', '2011-08-28 19:13:58', '2011-06-18 17:39:09'),
(79, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 17:40:13', '2011-08-28 19:15:58', '2011-06-18 17:40:42'),
(80, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 17:40:42', '2013-06-24 19:10:02', '2011-06-18 17:41:12'),
(81, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 17:41:32', '2011-08-28 19:15:18', '2011-06-18 17:41:56'),
(82, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 18:11:52', '2013-06-25 11:05:32', '2011-06-18 18:13:05'),
(83, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 18:16:08', '2013-08-23 09:36:52', '2011-06-18 18:17:18'),
(84, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 18:18:13', '2013-04-09 11:48:05', '2011-06-18 18:19:29'),
(85, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 18:21:05', '2011-09-05 18:16:43', '2011-06-18 18:22:39'),
(86, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-06-18 18:24:22', '2013-06-25 11:07:17', '2011-06-18 18:24:56'),
(218, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 1, 'no', 2, 4, 555, '', '', '2012-05-07 13:05:52', '2014-01-10 10:28:42', '2012-05-07 13:06:18'),
(335, 'yes', 'customize', 'Hong-Sopheap-Development-Layout-2-Final_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '?page=video_play&id=335', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 4, 1, 66, '', '', '2013-05-17 16:49:53', '2014-05-21 06:51:32', '2013-05-17 16:50:11'),
(182, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-08-29 00:08:35', '2011-08-29 00:09:33', '2011-08-29 00:09:33'),
(312, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-04-03 16:51:56', '2013-06-17 11:30:15', '2013-04-03 16:51:56'),
(136, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-08-08 14:19:01', '2011-08-08 14:19:18', '2011-08-08 14:19:18'),
(137, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-08-08 14:30:04', '2011-08-08 14:30:29', '2011-08-08 14:30:29'),
(138, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-08-08 15:26:57', '2011-08-08 15:27:36', '2011-08-08 15:27:36'),
(148, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-08-12 12:17:27', '2012-06-28 12:28:07', '2011-08-12 12:17:51'),
(149, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-08-12 12:18:46', '2013-07-15 18:54:22', '2011-08-12 12:18:57'),
(219, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Location', '70', 'yes', 'no', 'normal', 'no', 'no', 2, 'no', 2, 4, 196, '', '', '2012-05-07 13:06:18', '2014-01-11 02:24:03', '2012-05-07 13:06:56'),
(303, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-03-29 10:33:51', '2014-05-21 09:27:13', '2013-03-29 10:34:26'),
(220, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 3, 'no', 2, 4, 223, '', '', '2012-05-07 13:06:56', '2014-01-03 08:47:32', '2014-05-16 03:19:08'),
(225, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 25, 1, 0, '', '', '2012-05-09 15:16:04', '2013-07-17 16:44:24', '2012-05-09 15:16:39'),
(461, 'yes', 'customize', 'l_news3_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 70, 1, 2, '', '', '2013-08-19 10:32:08', '2014-05-22 02:38:43', '2013-08-19 10:32:58'),
(203, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2011-09-27 12:18:55', '2013-02-06 10:18:58', '2011-09-27 12:19:13'),
(221, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '?page=document&menu1=221&ctype=article&id=221', 'yes', 'no', 'normal', 'no', 'no', 4, 'no', 2, 4, 112, '', '', '2012-05-07 13:07:18', '2014-01-03 08:47:40', '2012-05-07 13:07:57'),
(263, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2012-08-06 15:24:47', '2013-07-19 09:11:11', '2012-08-06 15:25:36'),
(246, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2012-07-03 12:24:28', '2014-01-08 08:16:27', '2012-07-03 12:25:33'),
(250, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 25, 1, 0, '', '', '2012-07-03 17:50:45', '2014-05-21 06:30:22', '2012-07-03 17:52:13'),
(252, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2012-07-03 18:16:12', '2014-05-21 06:25:25', '2012-07-03 18:16:39'),
(253, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2012-07-03 18:17:03', '2013-07-19 09:09:12', '2012-07-03 18:17:26'),
(309, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-04-03 16:15:42', '2013-08-20 07:13:15', '2013-04-03 16:15:42'),
(428, 'yes', 'customize', 'Untitled-1_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 70, 1, 14, '', '', '2013-07-17 16:07:35', '2014-01-11 02:12:04', '2013-07-17 16:07:35'),
(311, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 9, '', '', '2013-04-03 16:48:00', '2013-07-20 11:59:55', '2013-04-03 16:48:00'),
(470, 'yes', 'customize', 'image_gallery_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2013-08-21 02:47:43', '2014-01-09 01:23:20', '2014-01-09 02:09:08'),
(429, 'yes', 'customize', 'l_news2_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 70, 1, 11, '', '', '2013-07-17 16:08:54', '2014-05-22 02:39:36', '2013-07-17 16:08:54'),
(469, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2013-08-21 02:47:20', '2013-08-21 02:47:40', '2014-01-09 02:09:08'),
(325, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2013-04-08 15:28:46', '2013-04-09 12:39:35', '2013-04-08 15:29:15'),
(471, 'yes', 'customize', 'work1.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '221', 'menu', 'Customize', '?page=video&menu2=471', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 65, 1, 0, '', '', '2013-08-21 06:57:36', '2013-08-21 06:58:30', '2013-08-21 08:59:02'),
(329, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2013-04-10 17:55:24', '2013-04-11 16:55:58', '2013-04-10 17:55:50'),
(330, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', '', 'no', 0, 'no', 3, 1, 10, '', '', '2013-04-10 17:56:53', '2014-01-06 08:21:36', '2013-04-10 17:56:53'),
(331, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2013-04-10 17:57:45', '2013-04-11 16:59:32', '2013-04-10 17:57:45'),
(332, 'yes', 'customize', 'work1.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 63, 1, 28, '', '', '2013-05-17 11:33:03', '2013-08-21 06:53:32', '2013-05-17 11:33:36'),
(334, 'yes', 'customize', 'image_slide.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 4, 1, 5, '', '', '2013-05-17 16:47:07', '2014-05-21 06:51:46', '2013-05-17 16:47:47'),
(337, 'yes', 'customize', 'farmcm.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 4, 1, 4, '', '', '2013-05-18 13:42:00', '2014-05-21 07:18:31', '2013-06-18 10:45:54'),
(416, 'yes', 'customize', 'video_screenshot.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-06-24 15:45:53', '2013-07-24 03:50:07', '2013-06-24 15:46:16'),
(465, 'yes', 'customize', 'contact_icon.png', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '?page=contact', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 80, 1, 0, '', '', '2013-08-20 07:30:32', '2013-08-20 07:31:25', '2013-08-20 07:31:25'),
(466, 'yes', 'customize', 'home_icon.png', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '?page=front', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 80, 1, 0, '', '', '2013-08-20 07:31:28', '2013-08-20 07:32:22', '2013-08-20 07:32:22'),
(462, 'yes', 'customize', 'site_map_icon.png', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '?page=sitemap&id=462', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 80, 1, 0, '', '', '2013-08-20 07:28:17', '2013-08-20 07:32:56', '2013-08-20 07:29:15'),
(463, 'yes', 'customize', 'linkedin_icon.png', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 80, 1, 1, '', '', '2013-08-20 07:29:21', '2013-08-20 07:29:44', '2013-08-20 07:29:44'),
(430, 'yes', 'customize', 'l_news1_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 70, 1, 25, '', '', '2013-07-17 16:09:33', '2014-05-22 02:41:02', '2013-07-17 16:09:33'),
(431, 'yes', 'customize', 'l_news4_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 70, 1, 91, '', '', '2013-07-17 16:10:30', '2014-05-22 02:39:09', '2013-07-17 16:10:30'),
(472, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'DSC_0093.JPG', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 78, 1, 0, '', '', '2013-08-21 07:38:38', '2013-10-19 05:06:57', '2013-08-21 07:38:38'),
(422, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'menu', 'Customize', '?page=contact&menu1=422&ctype=article&id=422', 'yes', 'no', 'normal', 'no', 'no', 6, 'no', 2, 1, 0, '', '', '2013-07-17 09:21:22', '2014-01-03 08:48:03', '2013-07-17 09:22:30'),
(464, 'yes', 'customize', 'facebook.png', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'http://', 'www.facebook.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 80, 1, 0, '', '', '2013-08-20 07:29:48', '2013-08-20 07:33:21', '2013-08-20 07:30:28'),
(424, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 1, 'no', 77, 1, 0, '', '', '2013-07-17 12:28:25', '2014-05-16 07:40:06', '2013-07-17 12:33:43'),
(427, 'yes', 'customize', 'image03_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 70, 1, 60, '', '', '2013-07-17 16:06:24', '2014-01-11 02:12:16', '2013-07-17 16:06:49'),
(421, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-06-24 16:57:49', '2013-07-20 15:54:48', '2013-06-24 16:58:13'),
(404, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-06-18 17:27:50', '2013-07-19 09:50:13', '2013-06-18 17:30:34'),
(446, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '218', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 65, 1, 1, '', '', '2013-07-19 12:46:08', '2013-08-20 08:44:43', '2013-08-20 09:08:39'),
(447, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '218', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 65, 1, 1, '', '', '2013-07-19 15:54:46', '2013-08-20 08:44:28', '2013-08-20 09:08:39'),
(449, 'yes', 'customize', 'video_screenshot1.png', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 78, 1, 0, '', '', '2013-07-19 18:13:09', '2013-07-19 18:35:45', '2013-07-19 18:14:15'),
(450, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'DSC_0093.JPG', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 78, 1, 0, '', '', '2013-07-19 18:17:56', '2013-08-21 07:22:02', '2013-07-19 18:17:56'),
(451, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-07-20 09:56:15', '2013-07-20 09:58:03', '2013-07-20 09:58:03'),
(452, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-07-20 10:54:38', '2013-07-20 10:56:22', '2013-07-20 10:56:22'),
(453, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-07-20 11:22:24', '2013-07-20 15:58:07', '2013-07-20 11:23:15'),
(459, 'yes', 'customize', 'work1.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '221', 'menu', 'Customize', '?page=gallery&menu2=459&ctype=article&id=459', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 65, 1, 12, '', '', '2013-08-09 05:00:20', '2013-08-23 09:07:17', '2013-08-20 09:08:39'),
(467, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2013-08-21 02:45:49', '2013-08-21 02:46:55', '2014-01-09 02:09:08'),
(473, 'yes', 'youtube', 'http___www_youtube.com_watch_v_1sIWez9HAbA', 0, 0, 'left', 'yes', 'jquery.php', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2013-09-08 09:25:52', '2013-10-08 07:11:43', '2013-09-08 09:26:06'),
(474, 'yes', 'customize', 'bg_header_03.png', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 81, 1, 0, '', '', '2014-01-02 08:41:08', '2014-01-03 02:16:18', '2014-01-02 08:41:35'),
(475, 'yes', 'customize', 'company_title_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 82, 1, 0, '', '', '2014-01-02 10:31:06', '2014-05-16 02:06:10', '2014-01-02 10:31:22'),
(476, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '?page=paypal_form', 'yes', 'yes', 'normal', 'no', 'no', 5, 'no', 2, 1, 23, '', '', '2014-01-03 08:42:45', '2014-01-14 10:33:17', '2014-05-16 03:19:08'),
(477, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 2, 1, 311, '', '', '2014-01-03 08:49:25', '2014-05-21 07:02:04', '2014-01-03 08:49:43'),
(478, 'yes', 'youtube', 'WC36u2xha5Y', 0, 0, 'left', 'yes', 'Untitled-1_03.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 83, 1, 0, '', '', '2014-01-06 03:02:27', '2014-01-06 04:18:31', '2014-01-06 03:02:52'),
(479, 'yes', 'youtube', 'LTlv360UC5w', 0, 0, 'left', 'yes', 'Back-up_04.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 83, 1, 0, '', '', '2014-01-06 03:10:54', '2014-01-06 04:16:53', '2014-01-06 03:10:54'),
(480, 'yes', 'youtube', 'bTbY9xswWQs', 0, 0, 'left', 'yes', 'screent_04.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 83, 1, 0, '', '', '2014-01-06 03:29:17', '2014-01-06 04:08:56', '2014-01-06 03:30:23'),
(481, 'yes', 'youtube', '5ZRMbbTs_Zs', 0, 0, 'left', 'yes', 'screent_04.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 83, 1, 0, '', '', '2014-01-06 06:29:05', '2014-01-06 07:15:13', '2014-01-06 06:29:05'),
(482, 'yes', 'youtube', 'D_EudrdKqik', 0, 0, 'left', 'yes', 'Untitled-1_03.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 83, 1, 0, '', '', '2014-01-06 07:17:47', '2014-01-06 07:19:27', '2014-01-06 07:17:47'),
(483, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-06 09:17:22', '2014-01-07 03:07:41', '2014-01-06 09:17:54'),
(484, 'yes', 'customize', 'Untitled-1_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 63, 1, 0, '', '', '2014-01-06 10:11:35', '2014-01-06 10:12:20', '2014-01-06 10:11:35'),
(485, 'yes', 'customize', 'work1.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 63, 1, 0, '', '', '2014-01-06 10:11:39', '2014-01-06 10:11:39', '2014-01-06 10:11:47'),
(486, 'yes', 'customize', 'l_news3_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 70, 1, 1, '', '', '2014-01-07 04:00:50', '2014-05-22 02:38:18', '2014-01-07 04:00:50'),
(487, 'yes', 'customize', 'l_news3_03.jpg', 0, 0, 'left', 'yes', '6320141394090019_9745screent_04.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'yes', 70, 1, 63, '', '', '2014-01-07 04:06:39', '2014-05-17 03:09:07', '2014-01-07 04:06:39'),
(488, 'yes', 'customize', 'logo5_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 84, 1, 0, '', '', '2014-01-07 08:12:51', '2014-01-07 09:22:41', '2014-01-07 08:13:14'),
(489, 'yes', 'customize', 'logo4_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 84, 1, 0, '', '', '2014-01-07 08:13:38', '2014-01-07 09:22:29', '2014-01-07 08:13:54'),
(490, 'yes', 'customize', 'logo3_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 84, 1, 0, '', '', '2014-01-07 08:30:49', '2014-01-07 09:22:18', '2014-01-07 08:30:49'),
(491, 'yes', 'customize', 'logo2_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 84, 1, 0, '', '', '2014-01-07 08:38:50', '2014-01-07 09:21:43', '2014-01-07 08:38:50'),
(492, 'yes', 'customize', 'logo1_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 84, 1, 0, '', '', '2014-01-07 08:49:35', '2014-01-07 09:21:31', '2014-01-07 08:50:06'),
(493, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-07 09:36:42', '2014-01-07 09:37:33', '2014-01-07 09:37:33'),
(494, 'yes', 'customize', 'logo1_04.jpg', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 84, 1, 0, '', '', '2014-01-08 01:52:34', '2014-01-08 01:52:58', '2014-01-08 01:52:58'),
(495, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-08 07:45:46', '2014-01-08 07:46:28', '2014-01-08 07:46:28'),
(496, 'yes', 'customize', 'image_gallery_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 01:29:31', '2014-01-09 01:32:59', '2014-01-09 02:09:08'),
(497, 'yes', 'customize', 'image_gallery_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 01:33:27', '2014-01-09 01:33:36', '2014-01-09 02:09:08'),
(498, 'yes', 'customize', 'image_gallery_04.jpg', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 02:09:24', '2014-01-09 02:09:37', '2014-01-09 02:09:37'),
(499, 'yes', 'customize', 'image_gallery_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 02:09:43', '2014-01-09 04:14:31', '2014-01-09 02:09:43'),
(500, 'yes', 'customize', 'image_gallery_04.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 02:55:06', '2014-01-09 02:55:28', '2014-01-09 04:13:53'),
(501, 'yes', 'customize', 'Bayon_Temple.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 03:22:09', '2014-01-20 03:29:46', '2014-01-09 03:22:09'),
(502, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-09 04:20:06', '2014-01-09 04:20:56', '2014-01-09 04:20:56'),
(503, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'yes', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-09 04:36:01', '2014-01-09 04:36:13', '2014-01-09 04:50:25'),
(504, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-09 10:20:54', '2014-01-09 10:25:45', '2014-01-09 10:25:45'),
(505, 'yes', 'customize', 'fb.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'http://', 'www.facebook.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 86, 1, 1, '', '', '2014-01-10 03:44:17', '2014-01-10 03:56:03', '2014-01-10 03:44:54'),
(506, 'yes', 'customize', 'tw.jpg', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'http://', 'www.twiter.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 86, 1, 0, '', '', '2014-01-10 03:58:29', '2014-01-10 03:59:14', '2014-01-10 03:59:14'),
(507, 'yes', 'customize', 'rss.jpg', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'http://', 'www.rss.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 86, 1, 0, '', '', '2014-01-10 04:02:33', '2014-01-10 04:03:42', '2014-01-10 04:03:42'),
(508, 'yes', 'customize', 'youtube.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '0', 'content', 'http://', 'www.youtube.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 86, 1, 0, '', '', '2014-01-10 04:03:47', '2014-01-10 04:04:20', '2014-01-10 04:03:47'),
(509, 'yes', 'customize', 'gpls.jpg', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'http://', 'www.google.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 86, 1, 0, '', '', '2014-01-10 04:04:27', '2014-01-10 04:05:09', '2014-01-10 04:05:09'),
(510, 'yes', 'customize', 'share.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 86, 1, 1, '', '', '2014-01-10 04:05:17', '2014-01-10 04:24:36', '2014-01-10 04:10:39'),
(511, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 01:34:42', '2014-01-13 01:35:51', '2014-01-13 01:35:51'),
(512, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 02:03:20', '2014-01-20 01:20:14', '2014-01-13 02:04:08'),
(513, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:08:48', '2014-01-13 03:38:59', '2014-01-13 03:09:21'),
(514, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:11:29', '2014-01-13 03:12:06', '2014-01-13 03:12:06'),
(515, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:13:11', '2014-01-13 03:13:32', '2014-01-13 03:13:32'),
(516, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:29:14', '2014-01-13 03:31:02', '2014-01-13 03:29:14'),
(517, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:32:19', '2014-01-13 03:34:09', '2014-01-13 03:32:19'),
(518, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:37:16', '2014-01-13 03:38:16', '2014-01-13 03:37:16'),
(519, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:39:55', '2014-01-13 03:40:43', '2014-01-13 03:39:55'),
(520, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-13 03:41:24', '2014-01-13 09:50:34', '2014-01-13 03:41:24'),
(521, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 141, '', '', '2014-01-13 05:05:27', '2014-01-13 07:18:50', '2014-01-13 05:06:16'),
(522, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 25, 1, 0, '', '', '2014-01-14 10:47:37', '2014-01-14 10:48:55', '2014-01-14 10:47:54'),
(523, 'yes', 'customize', '21520141400665667_7488l_nesw5_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 34, 1, 0, '', '', '2014-01-20 03:31:33', '2014-05-21 09:47:47', '2014-01-20 03:31:33'),
(524, 'yes', 'youtube', 'eKFTSSKCzWA', 0, 0, 'left', 'yes', 'screent_04.jpg', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 83, 1, 0, '', '', '2014-02-06 04:25:09', '2014-02-06 04:27:14', '2014-02-06 04:25:09'),
(525, 'yes', 'customize', 'l_news2_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 70, 1, 5, '', '', '2014-03-06 03:26:16', '2014-05-20 06:57:25', '2014-03-06 03:26:56'),
(526, 'yes', 'customize', 'l_nesw5_03.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 70, 1, 11, '', '', '2014-03-06 03:51:21', '2014-05-20 06:59:10', '2014-03-06 03:51:38'),
(527, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 2, 1, 15, '', '', '2014-05-16 03:22:27', '2014-05-21 07:11:59', '2014-05-16 03:22:50'),
(528, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2014-05-20 07:19:28', '2014-05-20 07:20:28', '2014-05-20 07:20:28'),
(529, 'yes', 'customize', 'none', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2014-05-20 09:43:36', '2014-05-20 09:54:16', '2014-05-20 09:44:06'),
(530, 'yes', 'customize', 'fb.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'http://', 'www.facebook.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 87, 1, 0, '', '', '2014-05-21 01:26:15', '2014-05-21 03:36:55', '2014-05-21 01:26:56'),
(531, 'yes', 'customize', 'google.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'http://', 'www.google.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 87, 1, 0, '', '', '2014-05-21 02:11:14', '2014-05-21 03:37:30', '2014-05-21 02:12:51'),
(532, 'yes', 'customize', 'tweeter.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'http://', 'www.twiter.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 87, 1, 0, '', '', '2014-05-21 03:20:24', '2014-05-21 03:33:48', '2014-05-21 03:20:24'),
(533, 'yes', 'customize', 'youtube.jpg', 0, 0, 'left', 'yes', 'none', 0, 0, '', 'content', 'http://', 'www.youtube.com', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 87, 1, 0, '', '', '2014-05-21 03:37:50', '2014-05-21 03:38:32', '2014-05-21 03:37:50'),
(534, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 3, 1, 0, '', '', '2014-05-21 03:48:13', '2014-05-21 03:48:54', '2014-05-21 03:48:54'),
(535, 'yes', 'customize', '', 0, 0, 'left', 'yes', '', 0, 0, '', 'content', 'Customize', '', 'yes', 'no', 'normal', 'no', 'no', 0, 'no', 81, 1, 0, '', '', '2014-05-21 06:43:12', '2014-05-21 06:44:32', '2014-05-21 06:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `cparent` int(11) NOT NULL,
  `_icon` tinytext NOT NULL,
  `display` varchar(10) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `tag` text NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`c_id`, `cparent`, `_icon`, `display`, `recycle`, `ordering`, `tag`, `add_date`, `edit_date`, `delete_date`) VALUES
(3, 0, 'none', 'yes', 'no', 3, '', '2012-07-03 09:22:16', '2013-07-17 18:51:43', '2013-06-24 19:29:12'),
(2, 0, '', 'yes', 'no', 2, '', '2012-07-03 09:18:38', '2012-07-03 09:22:14', '2013-02-05 14:51:07'),
(1, 0, 'none', 'yes', 'no', 1, '', '2012-07-03 09:15:52', '2013-07-17 18:51:00', '2013-02-05 14:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE IF NOT EXISTS `tbldocument` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `print_year` varchar(30) NOT NULL,
  `isbn` varchar(200) NOT NULL,
  `screenshot` tinytext NOT NULL,
  `display` varchar(10) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `front_page` varchar(10) NOT NULL,
  `c_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `num_view` bigint(20) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `addon` tinytext NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`d_id`, `print_year`, `isbn`, `screenshot`, `display`, `recycle`, `ordering`, `front_page`, `c_id`, `pm_id`, `num_view`, `tag`, `addon`, `add_date`, `edit_date`, `delete_date`) VALUES
(1, '', '', 'pdf1.jpg', 'yes', 'yes', 0, 'no', 1, 1, 0, 'yes', '', '2012-07-05 10:32:31', '2013-07-23 13:03:18', '2013-08-20 09:58:34'),
(2, '', '', '23720131374577420_7848pdf1.jpg', 'yes', 'yes', 0, 'no', 1, 1, 0, 'yes', '', '2012-07-06 11:39:44', '2013-07-23 13:03:40', '2013-08-20 09:58:34'),
(3, '', '', '23720131374577438_5469pdf1.jpg', 'yes', 'yes', 0, 'no', 1, 1, 0, 'yes', '', '2012-09-25 11:34:27', '2013-07-23 13:03:58', '2013-08-20 09:58:34'),
(5, '', '', '23720131374577452_7577pdf1.jpg', 'yes', 'yes', 0, 'no', 1, 1, 0, 'yes', '', '2013-02-14 17:11:33', '2013-07-23 13:04:12', '2013-08-20 09:58:34'),
(6, 'wrw', 'wrwr', 'pdf_icon7.png', 'yes', 'no', 0, 'no', 1, 1, 0, 'yes', '', '2013-03-27 15:22:11', '2013-08-20 09:58:17', '2013-03-27 15:22:26'),
(7, '', '', 'pdf_icon6.png', 'yes', 'no', 0, 'no', 1, 1, 0, 'yes', '', '2013-07-18 17:55:23', '2013-08-20 09:58:05', '2013-07-18 17:55:55'),
(8, 'dfhd', 'fhfhf', 'pdf_icon5.png', 'yes', 'no', 0, 'no', 2, 1, 0, 'yes', '', '2013-07-19 16:32:17', '2013-08-20 09:57:54', '2013-07-19 16:32:32'),
(9, 'dfhd', 'fhfhf', 'pdf_icon4.png', 'yes', 'no', 0, 'no', 3, 1, 0, 'yes', '', '2013-07-19 16:58:55', '2013-08-20 09:57:38', '2013-07-19 16:58:55'),
(10, 'dfhd', 'fhfhf', 'l_news4_03.jpg', 'yes', 'no', 0, 'yes', 3, 1, 0, 'yes', '', '2013-07-19 17:00:45', '2014-05-22 03:26:22', '2013-07-19 17:00:45'),
(11, 'dfhd', 'fhfhf', 'pdf_icon.png', 'yes', 'no', 0, 'no', 2, 1, 0, 'yes', '', '2013-07-19 17:03:00', '2014-01-08 08:14:01', '2013-07-19 17:03:00'),
(12, 'dggdgdgdgdgd', '', 'none', 'yes', 'yes', 0, 'no', 4, 1, 0, 'no', '', '2013-09-03 08:05:41', '2014-01-08 08:13:40', '2014-05-22 03:28:29'),
(13, 'dggdgdgdgdgd', '', 'angkor2.jpg', 'yes', 'yes', 0, 'no', 4, 1, 0, 'no', '', '2014-01-08 07:52:32', '2014-01-20 04:01:21', '2014-05-22 03:28:29'),
(14, 'dggdgdgdgdgd', '', 'royal_paplace2.jpg', 'yes', 'yes', 0, 'no', 4, 1, 0, 'yes', '', '2014-01-08 07:52:41', '2014-01-20 04:03:31', '2014-05-22 03:28:29'),
(15, 'dggdgdgdgdgd', '', 'slid5.jpg', 'yes', 'yes', 0, 'no', 4, 1, 0, 'yes', '', '2014-01-08 07:52:44', '2014-01-20 04:03:09', '2014-05-22 03:28:29'),
(16, 'dggdgdgdgdgd', '', '419062_524179534297906_1534855759_n.jpg', 'yes', 'yes', 0, 'no', 4, 1, 0, 'yes', '', '2014-03-06 08:18:43', '2014-03-06 08:25:14', '2014-05-22 03:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE IF NOT EXISTS `tblgallery` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_type` varchar(30) NOT NULL,
  `media` tinytext NOT NULL,
  `mwidth` int(11) NOT NULL,
  `mheight` int(11) NOT NULL,
  `thumbnail` varchar(10) NOT NULL,
  `screenshot` tinytext NOT NULL,
  `twidth` int(11) NOT NULL,
  `theight` int(11) NOT NULL,
  `display` varchar(10) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `num_view` bigint(20) NOT NULL,
  `tag` text NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`g_id`, `media_type`, `media`, `mwidth`, `mheight`, `thumbnail`, `screenshot`, `twidth`, `theight`, `display`, `recycle`, `ordering`, `a_id`, `pm_id`, `num_view`, `tag`, `add_date`, `edit_date`, `delete_date`) VALUES
(14, 'customize', 'l_news2_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 499, 1, 0, '', '2013-07-23 09:34:08', '2014-05-21 10:05:05', '2013-07-23 09:35:54'),
(13, 'customize', 'l_nesw5_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 499, 1, 0, '', '2013-07-19 18:46:27', '2014-05-21 10:06:05', '2013-07-19 18:46:27'),
(15, 'customize', 'l_news3_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 498, 1, 0, '', '2013-08-17 04:32:00', '2014-05-21 10:05:53', '2013-08-17 04:32:20'),
(16, 'customize', '21520141400666734_2314l_news1_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 498, 1, 0, '', '2013-08-17 04:32:00', '2014-05-21 10:05:34', '2013-08-17 04:33:00'),
(17, 'youtube', 'http://www.youtube.com/watch?v=RlxkPhNhPXw', 0, 0, 'yes', 'none', 0, 0, 'yes', 'yes', 0, 450, 1, 0, '', '2013-08-17 04:43:55', '2013-08-21 07:26:18', '2013-08-21 09:03:02'),
(18, 'customize', 'l_news4_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 450, 1, 0, '', '2013-08-21 07:26:22', '2014-05-21 10:05:23', '2013-08-21 07:26:45'),
(19, 'customize', 'l_news1_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 498, 1, 0, '', '2014-01-09 04:36:19', '2014-05-21 10:04:28', '2014-01-09 04:36:47'),
(20, 'customize', 'l_news4_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 498, 1, 0, '', '2014-01-14 03:18:00', '2014-05-21 10:04:09', '2014-01-14 03:18:35'),
(21, 'customize', 'l_news3_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 501, 1, 0, '', '2014-01-20 03:25:53', '2014-05-21 10:03:23', '2014-01-20 03:26:59'),
(22, 'customize', 'l_news4_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 523, 1, 0, '', '2014-01-20 03:32:55', '2014-05-21 10:03:47', '2014-01-20 03:33:25'),
(23, 'customize', 'l_news2_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 523, 1, 0, '', '2014-01-20 06:29:16', '2014-05-21 10:03:04', '2014-01-20 06:29:47'),
(24, 'customize', 'l_nesw5_03.jpg', 0, 0, 'yes', 'none', 0, 0, 'yes', 'no', 0, 523, 1, 0, '', '2014-01-20 07:00:06', '2014-05-21 09:37:52', '2014-01-20 07:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel_setting`
--

CREATE TABLE IF NOT EXISTS `tbllevel_setting` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` int(11) NOT NULL,
  `object_allows` tinytext NOT NULL,
  `ac_add` varchar(10) NOT NULL,
  `ac_edit` varchar(10) NOT NULL,
  `ac_delete` varchar(10) NOT NULL,
  `ac_duplicate` varchar(10) NOT NULL,
  `ac_recyclebin` varchar(10) NOT NULL,
  `ac_restore` varchar(10) NOT NULL,
  `ac_drop` varchar(10) NOT NULL,
  PRIMARY KEY (`ls_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbllevel_setting`
--

INSERT INTO `tbllevel_setting` (`ls_id`, `user_level`, `object_allows`, `ac_add`, `ac_edit`, `ac_delete`, `ac_duplicate`, `ac_recyclebin`, `ac_restore`, `ac_drop`) VALUES
(1, 2, 'article', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE IF NOT EXISTS `tbllocation` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `recycle` varchar(10) NOT NULL,
  `perpage` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `num_view` bigint(20) NOT NULL,
  `relativepost` varchar(10) NOT NULL,
  `relativepostnum` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  `group_radio` varchar(10) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`l_id`, `recycle`, `perpage`, `ordering`, `num_view`, `relativepost`, `relativepostnum`, `add_date`, `edit_date`, `delete_date`, `group_radio`) VALUES
(1, 'no', 0, 0, 0, 'no', 0, '2011-05-21 12:08:47', '2013-04-03 10:54:58', '2011-05-23 12:53:45', ''),
(2, 'no', 0, 0, 0, 'no', 0, '2011-05-29 10:19:57', '2013-02-01 10:59:33', '2011-05-29 10:19:57', ''),
(3, 'no', 0, 0, 0, '', 0, '2011-05-29 10:21:18', '2011-06-14 10:00:24', '2011-05-29 10:21:18', ''),
(4, 'no', 0, 0, 0, 'no', 0, '2011-05-29 10:30:28', '2013-05-17 16:46:46', '2011-05-29 10:30:28', ''),
(25, 'no', 0, 0, 0, 'no', 0, '2011-06-04 09:41:57', '2011-07-23 09:56:44', '2011-06-04 09:41:57', ''),
(32, 'no', 0, 0, 0, 'no', 0, '2011-06-11 12:12:55', '2013-05-22 11:36:40', '2011-06-11 12:12:55', ''),
(34, 'no', 0, 0, 0, 'no', 0, '2011-07-05 09:26:30', '2013-07-18 14:45:41', '2013-03-25 09:31:32', ''),
(63, 'no', 8, 0, 0, 'no', 0, '2013-05-17 11:32:04', '2014-05-16 08:15:14', '2013-05-17 11:32:29', ''),
(65, 'no', 0, 0, 0, 'no', 0, '2013-05-29 10:43:05', '2013-07-17 12:28:16', '2013-05-29 10:43:14', ''),
(70, 'no', 0, 0, 0, 'no', 0, '2013-05-31 16:38:33', '2014-01-07 04:38:17', '2013-05-31 16:39:33', ''),
(77, 'no', 0, 0, 0, 'no', 0, '2013-07-17 12:27:19', '2013-07-17 12:27:47', '2013-07-17 12:27:47', ''),
(78, 'no', 0, 0, 0, 'no', 0, '2013-07-17 18:13:56', '2013-07-17 18:14:12', '2013-07-17 18:14:12', ''),
(80, 'no', 0, 0, 0, 'no', 0, '2013-08-20 07:25:57', '2013-08-20 07:26:13', '2013-08-20 07:26:13', ''),
(81, 'no', 0, 0, 0, 'no', 0, '2014-01-02 08:40:18', '2014-05-21 06:42:44', '2014-01-02 08:40:55', ''),
(82, 'no', 0, 0, 0, 'no', 0, '2014-01-02 10:33:43', '2014-01-02 10:33:52', '2014-01-02 10:33:52', ''),
(83, 'no', 0, 0, 0, 'no', 0, '2014-01-06 03:00:38', '2014-02-06 04:36:34', '2014-01-06 03:00:48', ''),
(84, 'no', 0, 0, 0, 'no', 0, '2014-01-07 08:07:17', '2014-01-07 08:07:28', '2014-01-07 08:07:28', ''),
(85, 'yes', 0, 0, 0, 'no', 0, '2014-01-09 01:13:21', '2014-01-09 01:13:42', '2014-01-09 01:13:58', ''),
(86, 'no', 0, 0, 0, 'no', 0, '2014-01-10 03:30:13', '2014-01-10 03:30:24', '2014-01-10 03:30:24', ''),
(87, 'no', 0, 0, 0, 'no', 0, '2014-05-20 10:23:20', '2014-05-20 10:23:35', '2014-05-20 10:23:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin_report`
--

CREATE TABLE IF NOT EXISTS `tbllogin_report` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `log_date` datetime NOT NULL,
  `login_status` varchar(20) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbllogin_report`
--

INSERT INTO `tbllogin_report` (`login_id`, `userid`, `username`, `from_ip`, `log_date`, `login_status`) VALUES
(1, 1, 'admin', '127.0.0.1', '2011-07-05 09:25:55', 'success'),
(2, 1, 'admin', '127.0.0.1', '2011-07-05 15:16:18', 'success'),
(3, 1, 'admin', '127.0.0.1', '2011-07-06 10:31:11', 'success'),
(4, 1, 'admin', '127.0.0.1', '2011-07-07 13:05:50', 'success'),
(5, 1, 'admin', '127.0.0.1', '2011-07-07 14:50:46', 'success'),
(6, 1, 'admin', '127.0.0.1', '2011-07-08 12:08:13', 'success'),
(7, 1, 'admin', '127.0.0.1', '2011-07-09 10:45:16', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaillinklist`
--

CREATE TABLE IF NOT EXISTS `tblmaillinklist` (
  `ml_id` int(11) NOT NULL AUTO_INCREMENT,
  `sendto` varchar(100) NOT NULL,
  `sendto_type` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `send_date` date NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`ml_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblmaillinklist`
--

INSERT INTO `tblmaillinklist` (`ml_id`, `sendto`, `sendto_type`, `subject`, `message`, `send_date`, `add_date`) VALUES
(1, 'test1@gmail.com', 'm', 'jkl', 'hjklhjlk<br type="_moz" />', '0000-00-00', '2013-01-07 09:17:31'),
(3, 'adadadaa@slfs.com', 'm', 'dgsfg', 'dgssgs<br type="_moz" />', '0000-00-00', '2013-06-25 12:37:01'),
(4, 'adadadaa@slfs.com', 'm', 'dfgds', 'dgsdgs<br type="_moz" />', '0000-00-00', '2013-06-25 13:07:09'),
(5, 'flhflhfhfJ@rlhf.com', 'm', 'dfgds', 'dgsdgs<br type="_moz" />', '0000-00-00', '2013-06-25 13:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE IF NOT EXISTS `tblmember` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `hand_phone` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `company` varchar(300) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `member_status` varchar(15) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `rg_date` date NOT NULL,
  `subscribe` varchar(150) NOT NULL,
  `session_id` varchar(60) NOT NULL,
  `verify_code` varchar(60) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`member_id`, `full_name`, `username`, `email`, `hand_phone`, `country`, `company`, `address`, `password`, `member_status`, `recycle`, `rg_date`, `subscribe`, `session_id`, `verify_code`) VALUES
(12, 'Mr  Samnang  Sor', 'normal', 'sfsjf@sfs.com', 'slafjsf', 'Afghanistan', 'slfsf', 'lsafja', 'fea087517c26fadd409bd4b9dc642555', 'enable', 'no', '2013-04-10', 'yes', 'a2398bdfa4294cfda2cb0cda48121182', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblmember_login`
--

CREATE TABLE IF NOT EXISTS `tblmember_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `sec` tinytext NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tblmember_login`
--

INSERT INTO `tblmember_login` (`id`, `member_id`, `sec`, `log_date`) VALUES
(9, 0, 'cyxnhj98lA==', '2011-08-09 11:41:19'),
(14, 0, '5q2w7hrjlA==', '2011-08-10 12:05:26'),
(16, 0, 'y5wdjn07lA==', '2011-08-10 17:05:44'),
(17, 0, '07jbpnrflA==', '2011-08-10 18:32:04'),
(26, 0, 'hkq4m89clA==', '2011-08-11 21:46:59'),
(19, 0, 'qp09v3xnlA==', '2011-08-11 09:41:52'),
(21, 0, 'px9hkcqnlA==', '2011-08-11 12:03:08'),
(24, 0, 'b9xkj7d6lA==', '2011-08-11 18:30:07'),
(28, 0, 'kgfnjw74lA==', '2011-08-11 23:13:28'),
(37, 0, 'drs2vcwylA==', '2011-08-12 10:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermission`
--

CREATE TABLE IF NOT EXISTS `tblpermission` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(50) NOT NULL,
  `other` varchar(300) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblpermission`
--

INSERT INTO `tblpermission` (`pm_id`, `permission`, `other`) VALUES
(1, 'Public', ''),
(4, 'member', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblpledge`
--

CREATE TABLE IF NOT EXISTS `tblpledge` (
  `pledge_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`pledge_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpledge`
--

INSERT INTO `tblpledge` (`pledge_id`, `user_id`, `user_name`, `user_email`, `add_date`) VALUES
(1, 1, 'Ratanak', 'sereiratanak@gmail.com', '0000-00-00 00:00:00'),
(2, 1, 'Ratanak', 'sereiratanak@gmail.com', '2013-07-04 06:07:34'),
(3, 1, 'Ratanak', 'sereiratanak@gmail.com', '2013-07-04 18:07:05'),
(4, 1, 'Ratanak', 'sereiratanak1@gmail.com', '2013-07-04 18:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_code` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `made` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `c_id` int(11) NOT NULL,
  `display` varchar(5) NOT NULL,
  `front_page` varchar(5) NOT NULL,
  `tag` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `prio_img` tinytext NOT NULL,
  `add_img1` tinytext NOT NULL,
  `add_img2` tinytext NOT NULL,
  `add_img3` tinytext NOT NULL,
  `add_img4` tinytext NOT NULL,
  `pro_slide` varchar(5) NOT NULL,
  `show_price` varchar(5) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  `feture` varchar(5) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`r_id`, `p_code`, `brand`, `model`, `made`, `price`, `discount`, `c_id`, `display`, `front_page`, `tag`, `ordering`, `prio_img`, `add_img1`, `add_img2`, `add_img3`, `add_img4`, `pro_slide`, `show_price`, `recycle`, `add_date`, `edit_date`, `delete_date`, `feture`) VALUES
(8, '', '', '', '', 0, 0, 0, 'yes', 'no', '', 1, '', '', '', '', '', '', '', 'no', '2012-05-11 17:38:41', '2012-05-11 17:38:57', '2012-05-11 17:38:57', ''),
(9, '', '', '', '', 0, 0, 0, 'yes', 'no', '', 2, '', '', '', '', '', '', '', 'no', '2012-05-11 17:39:01', '2012-05-11 17:39:35', '2012-05-11 17:39:35', ''),
(10, '', '', '', '', 0, 0, 0, 'yes', 'no', '', 3, 'none', 'none', 'none', 'none', 'none', '', '', 'no', '2012-05-11 17:39:38', '2012-05-11 17:40:51', '2012-05-11 17:40:22', ''),
(7, '', '', '', '', 0, 0, 0, 'yes', 'no', '', 0, 'none', 'none', 'none', 'none', 'none', '', '', 'yes', '2012-05-11 17:26:33', '2012-05-11 17:34:32', '2012-05-11 17:37:17', ''),
(11, '', '', '', '', 0, 0, 0, 'yes', 'no', '', 4, 'none', 'none', 'none', 'none', 'none', '', '', 'no', '2012-05-11 17:40:31', '2012-05-11 17:40:45', '2012-05-11 17:40:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsite`
--

CREATE TABLE IF NOT EXISTS `tblsite` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_mail` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_des` text NOT NULL,
  `bg_sound` varchar(200) NOT NULL,
  `bgsound_view` varchar(10) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblsite`
--

INSERT INTO `tblsite` (`s_id`, `contact_mail`, `icon`, `meta_key`, `meta_des`, `bg_sound`, `bgsound_view`) VALUES
(1, 's.samnang@servingweb.com', 'logo.png', 'Fishery Environment Wild Animal', 'Fishery Environment Wild Animal', 'bgsound.mp3', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking_report`
--

CREATE TABLE IF NOT EXISTS `tbltracking_report` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `track_ip` varchar(200) NOT NULL,
  `track_on` varchar(200) NOT NULL,
  `object_id` varchar(11) NOT NULL,
  `track_act` varchar(50) NOT NULL,
  `track_date` datetime NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbltracking_report`
--

INSERT INTO `tbltracking_report` (`track_id`, `userid`, `track_ip`, `track_on`, `object_id`, `track_act`, `track_date`) VALUES
(1, '1', '127.0.0.1', 'article', '35', 'edit', '2011-07-04 13:11:47'),
(2, '1', '127.0.0.1', 'article', '35', 'edit', '2011-07-04 13:12:25'),
(3, '1', '127.0.0.1', 'article', '35', 'edit', '2011-07-04 13:13:34'),
(4, '1', '127.0.0.1', 'article', '35', 'edit', '2011-07-04 15:23:48'),
(5, '1', '127.0.0.1', 'article', '35', 'edit', '2011-07-04 16:32:31'),
(6, '1', '127.0.0.1', 'article', '91', 'save', '2011-07-04 16:32:53'),
(7, '1', '127.0.0.1', 'article', '91', 'delete', '2011-07-04 16:33:11'),
(8, '1', '127.0.0.1', 'article', '90', 'delete', '2011-07-04 16:33:11'),
(9, '1', '127.0.0.1', 'article', '89', 'delete', '2011-07-04 16:33:11'),
(10, '1', '127.0.0.1', 'location', '34', 'save', '2011-07-05 09:35:12'),
(11, '1', '127.0.0.1', 'article', '9', 'edit', '2011-07-05 15:16:40'),
(12, '1', '127.0.0.1', 'article', '10', 'edit', '2011-07-05 15:18:01'),
(13, '1', '127.0.0.1', 'article', '10', 'edit', '2011-07-05 15:20:42'),
(14, '1', '127.0.0.1', 'location', '18', 'edit', '2011-07-06 11:12:18'),
(15, '1', '127.0.0.1', 'location', '18', 'edit', '2011-07-06 11:18:30'),
(16, '1', '127.0.0.1', 'location', '21', 'edit', '2011-07-06 11:18:47'),
(17, '1', '127.0.0.1', 'location', '21', 'edit', '2011-07-06 11:31:13'),
(18, '1', '127.0.0.1', 'location', '21', 'edit', '2011-07-06 11:35:12'),
(19, '1', '127.0.0.1', 'location', '21', 'edit', '2011-07-06 11:35:29'),
(20, '1', '127.0.0.1', 'location', '21', 'edit', '2011-07-06 11:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbltranslate`
--

CREATE TABLE IF NOT EXISTS `tbltranslate` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(10) NOT NULL,
  `table_ref` varchar(50) NOT NULL,
  `field_ref` varchar(50) NOT NULL,
  `id_ref` int(11) NOT NULL,
  `translate` blob NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3339 ;

--
-- Dumping data for table `tbltranslate`
--

INSERT INTO `tbltranslate` (`t_id`, `language_code`, `table_ref`, `field_ref`, `id_ref`, `translate`) VALUES
(1, 'en', 'tblsite', 'title', 1, 0x4669736865727920456e7669726f6e6d656e742057696c6420416e696d616c),
(2, 'kh', 'tblsite', 'title', 1, 0x4669736865727920456e7669726f6e6d656e742057696c6420416e696d616c),
(3, 'en', 'tbllocation', 'title', 1, 0x4c6f676f),
(4, 'kh', 'tbllocation', 'title', 1, 0x4c6f676f),
(29, 'en', 'tbllocation', 'title', 4, 0x536c6964652053686f77),
(25, 'en', 'tbllocation', 'title', 2, 0x4d61696e20204d656e75),
(26, 'kh', 'tbllocation', 'title', 2, 0x4d61696e204d656e75),
(27, 'en', 'tbllocation', 'title', 3, 0x4c6f636b2f5472616e736c617465),
(28, 'kh', 'tbllocation', 'title', 3, 0xe19e85e19eb6e19e80e19f8be19e9fe19f842fe19e94e19e80e19e94e19f92e19e9ae19f82),
(30, 'kh', 'tbllocation', 'title', 4, 0x536c6964652053686f77),
(1892, 'en', 'tblarticle', 'description', 299, 0x3c627220747970653d225f6d6f7a22202f3e),
(1891, 'en', 'tblarticle', 'title', 299, 0x6c6f676f),
(1034, 'en', 'tblarticle', 'title', 215, 0x41626f7574205573),
(1033, 'kh', 'tblarticle', 'description', 214, 0x3c627220747970653d225f6d6f7a22202f3e),
(1030, 'en', 'tblarticle', 'title', 214, 0x486f6d65),
(1031, 'en', 'tblarticle', 'description', 214, 0x3c627220747970653d225f6d6f7a22202f3e),
(1032, 'kh', 'tblarticle', 'title', 214, 0xe19e91e19f86e19e96e19f90e19e9ae19e8ae19ebee19e98),
(1035, 'en', 'tblarticle', 'description', 215, 0x556e64657220636f6e737472756374696f6e3c6272202f3e),
(2088, 'en', 'tblmember', 'full_name', 10, ''),
(2089, 'kh', 'tblmember', 'full_name', 9, ''),
(2090, 'en', 'tblmember', 'full_name', 9, ''),
(2091, 'kh', 'tblmember', 'full_name', 11, ''),
(2092, 'en', 'tblmember', 'full_name', 11, ''),
(2093, 'kh', 'tblarticle', 'title', 329, 0x536f727279207468617420656d61696c2061646472657373206973206e6f74207265676973746572656420776974682075732e),
(2094, 'kh', 'tblarticle', 'description', 329, 0x3c627220747970653d225f6d6f7a22202f3e),
(2095, 'en', 'tblarticle', 'title', 329, 0x536f727279207468617420656d61696c2061646472657373206973206e6f74207265676973746572656420776974682075732e),
(2096, 'en', 'tblarticle', 'description', 329, 0x3c627220747970653d225f6d6f7a22202f3e),
(2097, 'kh', 'tblarticle', 'title', 330, 0x5468616e6b732c20796f7572206d65737361676520686173206265656e2073656e642e),
(2098, 'kh', 'tblarticle', 'description', 330, 0x3c627220747970653d225f6d6f7a22202f3e),
(2099, 'en', 'tblarticle', 'title', 330, 0x5468616e6b732c20796f7572206d65737361676520686173206265656e2073656e642e),
(2100, 'en', 'tblarticle', 'description', 330, 0x3c627220747970653d225f6d6f7a22202f3e),
(2101, 'kh', 'tblarticle', 'title', 331, 0x496e76616c696420736563757269747920636f64652e),
(2102, 'kh', 'tblarticle', 'description', 331, 0x3c627220747970653d225f6d6f7a22202f3e),
(2103, 'en', 'tblarticle', 'title', 331, 0x496e76616c696420736563757269747920636f64652e),
(2104, 'en', 'tblarticle', 'description', 331, 0x3c627220747970653d225f6d6f7a22202f3e),
(2105, 'kh', 'tblmember', 'full_name', 12, ''),
(2106, 'en', 'tblmember', 'full_name', 12, ''),
(1036, 'kh', 'tblarticle', 'title', 215, 0xe19ea2e19f86e19e96e19eb8e19e9fe19f92e19e90e19eb6e19e94e19f90e19e93),
(1037, 'kh', 'tblarticle', 'description', 215, 0xe19e80e19f86e19e96e19e84e19f8be19e9ae19f80e19e94e19e85e19f86e19f943c627220747970653d225f6d6f7a22202f3e),
(2952, 'en', 'tblgallery', 'title', 16, 0x67667366736b66687366687366),
(2951, 'kh', 'tblgallery', 'title', 16, 0x7379666973676673616a),
(2950, 'en', 'tblgallery', 'title', 15, 0x67667366736b66687366687366),
(1324, 'kh', 'tblarticle', 'description', 149, 0x3c627220747970653d225f6d6f7a22202f3e),
(1323, 'kh', 'tblarticle', 'title', 149, 0xe19e9fe19f92e19e9ce19f82e19e84e19e9ae19e802e2e2e),
(1325, 'kh', 'tblarticle', 'title', 148, 0xe19e9fe19ebce19e98e19e94e19e89e19f92e19e85e19ebce19e9be19e96e19eb6e19e80e19f92e19e99e19e9fe19f92e19e9ce19f82e19e84e19e9ae19e80),
(1326, 'kh', 'tblarticle', 'description', 148, 0x3c627220747970653d225f6d6f7a22202f3e),
(3000, 'kh', 'tblarticle', 'description', 470, 0x3c627220747970653d225f6d6f7a22202f3e),
(389, 'kh', 'tblarticle', 'title', 63, 0xe19e9fe19f86e19e93e19ebde19e9ae19e85e19e98e19f92e19e9be19ebee19e99),
(390, 'kh', 'tblarticle', 'description', 63, 0x3c627220747970653d225f6d6f7a22202f3e),
(388, 'en', 'tblarticle', 'description', 63, 0x3c627220747970653d225f6d6f7a22202f3e),
(387, 'en', 'tblarticle', 'title', 63, 0x4641515c2773),
(415, 'en', 'tblarticle', 'title', 70, 0x53454e5420555320414e20454d41494c),
(416, 'en', 'tblarticle', 'description', 70, 0x3c627220747970653d225f6d6f7a22202f3e),
(417, 'kh', 'tblarticle', 'title', 70, 0xe19e95e19f92e19e89e19ebee19e9fe19eb6e19e9ae19e98e19e80e19e99e19ebee19e84e19e81e19f92e19e98e19ebbe19f86),
(215, 'en', 'tbllocation', 'title', 25, 0x4e6f6e2d4c6f636174696f6e),
(216, 'kh', 'tbllocation', 'title', 25, 0x4e6f6e2d4c6f636174696f6e),
(313, 'en', 'tblarticle', 'title', 51, 0x436c69636b20746f207669657720616c6c),
(314, 'en', 'tblarticle', 'description', 51, 0x3c627220747970653d225f6d6f7a22202f3e),
(315, 'kh', 'tblarticle', 'title', 51, 0xe19e94e19e84e19f92e19ea0e19eb6e19e89e19e91e19eb6e19f86e19e84e19ea2e19e9fe19f8b),
(316, 'kh', 'tblarticle', 'description', 51, 0x3c627220747970653d225f6d6f7a22202f3e),
(418, 'kh', 'tblarticle', 'description', 70, 0x3c627220747970653d225f6d6f7a22202f3e),
(325, 'en', 'tbllocation', 'title', 32, 0x434f4e5441435420494e464f524d4154494f4e),
(326, 'kh', 'tbllocation', 'title', 32, 0xe19e91e19f86e19e93e19eb6e19e80e19f8be19e91e19f86e19e93e19e84e19e96e19f8ce19e8fe19f90e19e98e19eb6e19e93e2808b),
(327, 'en', 'tblarticle', 'title', 52, 0x41646472657373203a),
(328, 'en', 'tblarticle', 'description', 52, 0x23313842456f2c205374203334382c2053616e676b617420546f756c205376617920507265792049204b68616e204368616d63616d6f726e2c2050686e6f6d2050656e682c204b696e67646f6d206f662043616d626f6469613c6272202f3e),
(329, 'kh', 'tblarticle', 'title', 52, 0xe19ea2e19eb6e19e9fe19f90e19e99e19e8ae19f92e19e8be19eb6e19e93203a),
(330, 'kh', 'tblarticle', 'description', 52, 0x23313842456f2c205374203334382c2053616e676b617420546f756c205376617920507265792049204b68616e204368616d63616d6f726e2c2050686e6f6d2050656e682c204b696e67646f6d206f662043616d626f6469613c627220747970653d225f6d6f7a22202f3e),
(331, 'en', 'tblarticle', 'title', 53, 0x54656c6c203a),
(332, 'en', 'tblarticle', 'description', 53, 0x28383535292d32332d3939362d353139204661783a2028383535292d32332d3939362d3532303c6272202f3e),
(333, 'kh', 'tblarticle', 'title', 53, 0xe19e91e19ebce19e9ae19e9fe19e96e19f92e19e91e19f90203a),
(334, 'kh', 'tblarticle', 'description', 53, 0x28383535292d32332d3939362d353139204661783a2028383535292d32332d3939362d3532303c6272202f3e),
(335, 'en', 'tblarticle', 'title', 54, 0x43656c6c2050686f6e65203a),
(336, 'en', 'tblarticle', 'description', 54, 0x28383535292031322d38332d34392d3838204f522028383535292031302d38332d34392d38383c6272202f3e),
(337, 'kh', 'tblarticle', 'title', 54, 0x43656c6c2050686f6e65203a),
(338, 'kh', 'tblarticle', 'description', 54, 0x28383535292031322d38332d34392d3838204f522028383535292031302d38332d34392d3838),
(339, 'en', 'tblarticle', 'title', 55, 0x456d61696c203a),
(340, 'en', 'tblarticle', 'description', 55, 0x696e666f4061697063616d626f6469612e636f6d3c6272202f3e),
(341, 'kh', 'tblarticle', 'title', 55, 0xe19e9fe19eb6e19e9ae19ea2e19f81e19ea1e19eb7e19e85e19e8fe19f92e19e9ae19ebce19e93e19eb7e19e85203a),
(342, 'kh', 'tblarticle', 'description', 55, 0x696e666f4061697063616d626f6469612e636f6d),
(433, 'en', 'tblarticle', 'title', 73, 0x497320726571756972656d656e74206669656c642e),
(434, 'en', 'tblarticle', 'description', 73, 0x3c627220747970653d225f6d6f7a22202f3e),
(435, 'kh', 'tblarticle', 'title', 73, 0xe19e80e19e93e19f92e19e9be19f82e19e84e19e85e19eb6e19f86e19e94e19eb6e19e85e19f8be19e8fe19f92e19e9ae19ebce19e9ce19e94e19f86e19e96e19f81e19e89),
(436, 'kh', 'tblarticle', 'description', 73, 0x3c627220747970653d225f6d6f7a22202f3e),
(437, 'en', 'tblarticle', 'title', 74, 0x5375626a656374),
(438, 'en', 'tblarticle', 'description', 74, 0x3c627220747970653d225f6d6f7a22202f3e),
(439, 'kh', 'tblarticle', 'title', 74, 0xe19e94e19f92e19e9ae19e92e19eb6e19e93e19e94e19e91),
(440, 'kh', 'tblarticle', 'description', 74, 0x3c627220747970653d225f6d6f7a22202f3e),
(441, 'en', 'tblarticle', 'title', 75, 0x46756c6c204e616d65203a),
(442, 'en', 'tblarticle', 'description', 75, 0x3c627220747970653d225f6d6f7a22202f3e),
(443, 'kh', 'tblarticle', 'title', 75, 0xe19e88e19f92e19e98e19f84e19f87e19e96e19f81e19e89203a),
(444, 'kh', 'tblarticle', 'description', 75, 0x3c627220747970653d225f6d6f7a22202f3e),
(445, 'en', 'tblarticle', 'title', 76, 0x456d61696c203a),
(446, 'en', 'tblarticle', 'description', 76, 0x3c627220747970653d225f6d6f7a22202f3e),
(447, 'kh', 'tblarticle', 'title', 76, 0xe19e9fe19eb6e19e9ae19ea2e19f81e19ea1e19eb7e19e85e19e8fe19f92e19e9ae19ebce19e93e19eb7e19e85203a),
(448, 'kh', 'tblarticle', 'description', 76, 0x3c627220747970653d225f6d6f7a22202f3e),
(449, 'en', 'tblarticle', 'title', 77, 0x50686f6e65),
(450, 'en', 'tblarticle', 'description', 77, 0x3c627220747970653d225f6d6f7a22202f3e),
(451, 'kh', 'tblarticle', 'title', 77, 0xe19e91e19ebce19e9ae19e9fe19e96e19f92e19e91e19f90),
(452, 'kh', 'tblarticle', 'description', 77, 0x3c627220747970653d225f6d6f7a22202f3e),
(453, 'en', 'tblarticle', 'title', 78, 0x41646472657373),
(454, 'en', 'tblarticle', 'description', 78, 0x3c627220747970653d225f6d6f7a22202f3e),
(455, 'kh', 'tblarticle', 'title', 78, 0xe19ea2e19eb6e19e9fe19f90e19e99e19e8ae19f92e19e8be19eb6e19e93),
(456, 'kh', 'tblarticle', 'description', 78, 0x3c627220747970653d225f6d6f7a22202f3e),
(457, 'en', 'tblarticle', 'title', 79, 0x4d657373616765),
(458, 'en', 'tblarticle', 'description', 79, 0x3c627220747970653d225f6d6f7a22202f3e),
(459, 'kh', 'tblarticle', 'title', 79, 0xe19ea2e19e8fe19f92e19e8fe19e93e19f90e19e99e19e9fe19eb6e19e9a),
(460, 'kh', 'tblarticle', 'description', 79, 0x3c627220747970653d225f6d6f7a22202f3e),
(461, 'en', 'tblarticle', 'title', 80, 0x536563757269747920436f6465),
(462, 'en', 'tblarticle', 'description', 80, 0x3c627220747970653d225f6d6f7a22202f3e),
(463, 'kh', 'tblarticle', 'title', 80, 0xe19e9be19f81e19e81e19e80e19ebce19e8ae19e9fe19f86e19e84e19eb6e19e8fe19f8b),
(464, 'kh', 'tblarticle', 'description', 80, 0x3c627220747970653d225f6d6f7a22202f3e),
(465, 'en', 'tblarticle', 'title', 81, 0x53656e64),
(466, 'en', 'tblarticle', 'description', 81, 0x3c627220747970653d225f6d6f7a22202f3e),
(467, 'kh', 'tblarticle', 'title', 81, 0xe19e94e19e89e19f92e19e87e19ebce19e93e19e9fe19eb6e19e9a),
(468, 'kh', 'tblarticle', 'description', 81, 0x3c627220747970653d225f6d6f7a22202f3e),
(469, 'en', 'tblarticle', 'title', 82, 0x506c6561736520656e74657220746865206669656c647320726571756972656d656e7420282a29),
(470, 'en', 'tblarticle', 'description', 82, 0x3c627220747970653d225f6d6f7a22202f3e),
(471, 'kh', 'tblarticle', 'title', 82, 0xe19e9fe19ebce19e98e19e98e19f81e19e8fe19f92e19e8fe19eb6e19e94e19e89e19f92e19e85e19ebce19e9be19e80e19e93e19f92e19e9be19f82e19e84e19e85e19eb6e19f86e19e94e19eb6e19e85e19f8be19e8fe19f92e19e9ae19ebce19e9ce19e94e19f86e19e96e19f81e19e8920282a29),
(472, 'kh', 'tblarticle', 'description', 82, 0x3c627220747970653d225f6d6f7a22202f3e),
(473, 'en', 'tblarticle', 'title', 83, 0x596f7520686176652070726f766964656420616e20696e76616c696420736563757269747920636f64652e),
(474, 'en', 'tblarticle', 'description', 83, 0x3c627220747970653d225f6d6f7a22202f3e),
(475, 'kh', 'tblarticle', 'title', 83, 0xe19ea2e19f92e19e93e19e80e19e94e19e89e19f92e19e85e19ebce19e9be19e9be19f81e19e81e19e9fe19ebbe19e9ce19e8fe19f92e19e90e19eb7e19e97e19eb6e19e96e19e98e19eb7e19e93e19e8fe19f92e19e9ae19eb9e19e98e19e8fe19f92e19e9ae19ebce19e9c),
(476, 'kh', 'tblarticle', 'description', 83, 0x3c627220747970653d225f6d6f7a22202f3e),
(477, 'en', 'tblarticle', 'title', 84, 0x456d61696c2061646472657373207365656d7320696e76616c69642e),
(478, 'en', 'tblarticle', 'description', 84, 0x3c627220747970653d225f6d6f7a22202f3e),
(479, 'kh', 'tblarticle', 'title', 84, 0xe19e9fe19ebce19e98e19ea2e19e97e19f90e19e99e19e91e19f84e19e9f20e19ea2e19f8ae19eb8e19e98e19f89e19f82e19e9be19e98e19eb7e19e93e19e8fe19f92e19e9ae19eb9e19e98e19e8fe19f92e19e9ae19ebce19e9ce19e91e19f812e),
(480, 'kh', 'tblarticle', 'description', 84, 0x3c627220747970653d225f6d6f7a22202f3e),
(481, 'en', 'tblarticle', 'title', 85, 0x596f7572e2808b20696e666f726d6174696f6e20686173206265656e2073656e742e),
(482, 'en', 'tblarticle', 'description', 85, 0x3c627220747970653d225f6d6f7a22202f3e),
(483, 'kh', 'tblarticle', 'title', 85, 0xe19e9fe19eb6e19e9ae19e94e19e9ae19e9fe19f8be19e9be19f84e19e80e19ea2e19f92e19e93e19e80e19e8fe19f92e19e9ae19ebce19e9ce19e94e19eb6e19e93e19e94e19e89e19f92e19e85e19ebce19e93e19e8ae19f84e19e99e19e87e19f84e19e82e19e87e19f90e19e99),
(484, 'kh', 'tblarticle', 'description', 85, 0x3c627220747970653d225f6d6f7a22202f3e),
(485, 'en', 'tblarticle', 'title', 86, 0x506c656173652c2054727920616761696e2e2e2e),
(486, 'en', 'tblarticle', 'description', 86, 0x3c627220747970653d225f6d6f7a22202f3e),
(487, 'kh', 'tblarticle', 'title', 86, 0xe19e9fe19ebce19e98e19e98e19f81e19e8fe19f92e19e8fe19eb6e19e96e19f92e19e99e19eb6e19e99e19eb6e19e98e19e94e19e89e19f92e19e85e19ebce19e9be19e98e19f92e19e8fe19e84e19e91e19f80e19e8f2e2e2e),
(488, 'kh', 'tblarticle', 'description', 86, 0x3c627220747970653d225f6d6f7a22202f3e),
(531, 'en', 'tbllocation', 'title', 34, 0x50686f746f2047616c6c657279),
(532, 'kh', 'tbllocation', 'title', 34, 0xe19e94e19e8ee19f92e19e8fe19ebbe19f86e19e9ae19ebce19e94e19e97e19eb6e19e96),
(2119, 'kh', 'tblarticle', 'title', 334, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e19e9ae19ebce19e94e19e97e19eb6e19e96e19e93e19f83e19e80e19e98e19f92e19e98e19e9ce19eb7e19e92e19eb8e19e9ae19e94e19e9fe19f8b20e19ea2e19e84e19f92e19e82e19e9ae19e9fe19f92e19e9ae19eb6e19e9ce19e87e19f92e19e9ae19eb6e19e9ce19e80e19e98e19f92e19e982e2e2e),
(2118, 'en', 'tblarticle', 'description', 334, 0x3c6272202f3e),
(2117, 'en', 'tblarticle', 'title', 334, 0x736c646533),
(1051, 'en', 'tblarticle', 'description', 219, 0x556e64657220636f6e737472756374696f6e3c6272202f3e),
(2703, 'en', 'tblarticle', 'title', 424, 0x57656c636f6d6520746f),
(2704, 'en', 'tblarticle', 'description', 424, 0x3c623e3c7370616e207374796c653d22666f6e742d73697a653a20323070783b223e3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c3b20636f6c6f723a233030326339333b223e484f4e4720534f504845415020444556454c4f504d454e5420434f2e2c4c54443c2f7370616e3e3c2f7370616e3e3c2f623e3c6272202f3e0d0a3c6272202f3e0d0a57656c636f6d6520746f20636f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e2063436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920636f6e73656374657475722c2066726f6d206120546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f72206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e792074686f736520696e74657265737465642e2053656374696f6e7320616e64266e6273703b204c6f72656d20497073756d20706173736167652e3c6272202f3e0d0a3c6272202f3e0d0a4465617220616c6c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920746865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e636520746873206973266e6273703b2073696d706c792072616e646f6d20746578742e2049742068617320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c20666f72206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d2e3c627220747970653d225f6d6f7a22202f3e),
(2713, 'kh', 'tblarticle', 'title', 427, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8f),
(2714, 'kh', 'tblarticle', 'description', 427, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2715, 'en', 'tblarticle', 'title', 427, 0x536f6d652074657874206f662074686520746974746c6572206e616d65206e657773),
(2716, 'en', 'tblarticle', 'description', 427, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d3c627220747970653d225f6d6f7a22202f3e),
(2717, 'kh', 'tblarticle', 'title', 428, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e84e19e80e19e98e19f92e19e98e19e9ce19eb7e19e92e19eb8e19e9ae19e94e19e9fe19f8be19e96e19f92e19e9ae19ebae19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8f),
(2718, 'kh', 'tblarticle', 'description', 428, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2719, 'en', 'tblarticle', 'title', 428, 0x5469746c652070726f6772616d206f66206e65777320616e64206576656e74),
(2720, 'en', 'tblarticle', 'description', 428, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d3c627220747970653d225f6d6f7a22202f3e),
(2721, 'kh', 'tblarticle', 'title', 429, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e84),
(2722, 'kh', 'tblarticle', 'description', 429, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2723, 'en', 'tblarticle', 'title', 429, 0x5469746c65206f6620736f6d65204576656e74),
(2724, 'en', 'tblarticle', 'description', 429, 0x5469746c65206e65777320616e642065766e7473206f66207468652066656166676f632073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c6564266e6273703b207072696e746572202d2d2d746f6f6b20612067616c6c6579206f66207479706520616e64207420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e74203c6272202f3e),
(2725, 'kh', 'tblarticle', 'title', 430, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e84e19e9ae19e94e19e9fe19f8be19e82e19f86e19e9ae19f84e19e84e19e99e19ebee19e84),
(2729, 'kh', 'tblarticle', 'title', 431, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8f),
(2726, 'kh', 'tblarticle', 'description', 430, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2727, 'en', 'tblarticle', 'title', 430, 0x5469746c652070726f6772616d206f66206e657773206576656e74),
(2728, 'en', 'tblarticle', 'description', 430, 0x5469746c65206e65777320616e642065766e7473206f66207468652066656166676f632073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c6564266e6273703b207072696e74657220746f6f6b20612067616c6c65792d2d2d206f66207479706520616e64207420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e74203c6272202f3e),
(2730, 'kh', 'tblarticle', 'description', 431, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2959, 'en', 'tblarticle', 'title', 461, 0x547469746c65206f6620736f6d652074657874206576656e7420616e64206e657773),
(2960, 'en', 'tblarticle', 'description', 461, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2961, 'kh', 'tblarticle', 'title', 461, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8f),
(2962, 'kh', 'tblarticle', 'description', 461, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(2731, 'en', 'tblarticle', 'title', 431, 0x536f6d652074657874207469746c65206f66206e65777320616e64206576656e74),
(2732, 'en', 'tblarticle', 'description', 431, 0x5469746c65206e65777320616e642065766e7473206f66207468652066656166676f632073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c6564266e6273703b207072696e74657220746f6f6b20612067616c6c6579206f6620747970652d2d2d20616e64207420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e74203c6272202f3e0d0a3c6272202f3e),
(2733, 'kh', 'tbllocation', 'title', 78, 0xe19e9ce19eb8e19e8ae19f81e19ea2e19ebce19e81e19f92e19e9be19eb8e19f97),
(2734, 'en', 'tbllocation', 'title', 78, 0x566964656f73),
(1050, 'en', 'tblarticle', 'title', 219, 0x4e6577732026204576656e7473),
(1049, 'kh', 'tblarticle', 'description', 218, 0xe19e80e19f86e19e96e19ebbe19e84e19e9ae19f80e19e94e19e85e19f86e19f943c627220747970653d225f6d6f7a22202f3e),
(1046, 'en', 'tblarticle', 'title', 218, 0x4f75722050726f6a656374),
(1047, 'en', 'tblarticle', 'description', 218, 0x556e646572636f6e737472756374696f6e3c6272202f3e),
(2885, 'kh', 'tblgallery', 'title', 13, 0x636f7079206f6620566964656f31),
(2886, 'en', 'tblgallery', 'title', 13, 0xe19e9fe19e9be19e90e19e8ae19f92e19e9fe19e90e19e9be19e90),
(2887, 'kh', 'tblarticle', 'title', 451, 0xe19e9fe19f92e19e9ce19f82e19e84e19e9ae19e80e19e8fe19eb6e19e98e19e96e19eb6e19e80e19f92e19e99),
(2888, 'kh', 'tblarticle', 'description', 451, 0x3c627220747970653d225f6d6f7a22202f3e),
(2889, 'en', 'tblarticle', 'title', 451, 0x536561726368206279206b6579776f72642e2e2e),
(2890, 'en', 'tblarticle', 'description', 451, 0x3c627220747970653d225f6d6f7a22202f3e),
(2891, 'kh', 'tblarticle', 'title', 452, 0xe19e94e19e8ee19f92e19e8ee19e9fe19eb6e19e9a),
(2892, 'kh', 'tblarticle', 'description', 452, 0x3c627220747970653d225f6d6f7a22202f3e),
(2893, 'en', 'tblarticle', 'title', 452, 0x4172636869766573),
(2894, 'en', 'tblarticle', 'description', 452, 0x3c627220747970653d225f6d6f7a22202f3e),
(2895, 'kh', 'tblarticle', 'title', 453, 0xe19e98e19eb7e19e93e19e98e19eb6e19e93e19eafe19e80e19e9fe19eb6e19e9a),
(2896, 'kh', 'tblarticle', 'description', 453, 0x3c627220747970653d225f6d6f7a22202f3e),
(2897, 'en', 'tblarticle', 'title', 453, 0x4e6f20446f63756d656e74),
(2898, 'en', 'tblarticle', 'description', 453, 0x3c627220747970653d225f6d6f7a22202f3e),
(1048, 'kh', 'tblarticle', 'title', 218, 0xe19e80e19eb6e19e9ae19e84e19eb6e19e9a20e19e99e19ebee19e84),
(2954, 'en', 'tblgallery', 'title', 17, 0x636f7079206f662067667366736b66687366687366),
(2953, 'kh', 'tblgallery', 'title', 17, 0x636f7079206f66207379666973676673616a),
(947, 'en', 'tblarticle', 'title', 182, 0x5265736574),
(948, 'en', 'tblarticle', 'description', 182, 0x3c627220747970653d225f6d6f7a22202f3e),
(949, 'kh', 'tblarticle', 'title', 182, 0xe19e94e19e89e19f92e19e87e19ebce19e9be19e9fe19eb6e19e87e19eb6e19e90e19f92e19e98e19eb8),
(950, 'kh', 'tblarticle', 'description', 182, 0x3c627220747970653d225f6d6f7a22202f3e),
(715, 'en', 'tblcategory', 'title', 8, 0x4c6177),
(749, 'en', 'tblmember', 'full_name', 3, 0x6b686f6e672068616b),
(750, 'en', 'tblmember', 'full_name', 4, 0x6b686f6e672068616b),
(753, 'en', 'tblmember', 'full_name', 5, 0x6a616d65),
(754, 'en', 'tblmember', 'full_name', 6, 0x6a616d65),
(755, 'en', 'tblmember', 'full_name', 7, 0x6a616d65),
(756, 'en', 'tblmember', 'full_name', 8, 0x7366736466736466),
(759, 'en', 'tblmember', 'full_name', 1, ''),
(1583, 'kh', 'tblarticle', 'title', 263, 0xe19e9fe19ebee19e9ce19eb8e19e8420e19e9ce19f82e19e9420e19e9fe19eb9e19e9be19ebce19e9fe19eb7e19e93),
(1584, 'kh', 'tblarticle', 'description', 263, 0x3c627220747970653d225f6d6f7a22202f3e),
(1581, 'en', 'tblarticle', 'title', 263, 0x53657276696e672057656220536f6c7574696f6e),
(1582, 'en', 'tblarticle', 'description', 263, 0x3c627220747970653d225f6d6f7a22202f3e),
(786, 'en', 'tblarticle', 'title', 148, 0x506c656173652066696c6c20796f7572206b6579776f72642e2e),
(787, 'en', 'tblarticle', 'description', 148, 0x266e6273703b),
(788, 'en', 'tblarticle', 'title', 149, 0x7365617263682e2e2e),
(789, 'en', 'tblarticle', 'description', 149, 0x266e6273703b),
(1054, 'en', 'tblarticle', 'title', 220, 0x4d656964612046454146474f43),
(1053, 'kh', 'tblarticle', 'description', 219, 0xe19e80e19f86e19e96e19e84e19f8be19e9ae19f80e19e94e19e85e19f863c6272202f3e),
(2985, 'en', 'tblarticle', 'title', 467, 0x50686f746f2047616c6c6572792034),
(2986, 'en', 'tblarticle', 'description', 467, 0x3c627220747970653d225f6d6f7a22202f3e),
(2987, 'kh', 'tblarticle', 'title', 467, 0xe19e80e19f86e19e9ae19e84e19e9ae19ebce19e94e19e97e19eb6e19e96e19e91e19eb8e19fa4),
(2765, 'kh', 'tbldocument', 'title', 7, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e8ae19f84e19e93e19e9be19ebce19e8a),
(2766, 'kh', 'tbldocument', 'author', 7, ''),
(2767, 'kh', 'tbldocument', 'publisher', 7, ''),
(2768, 'kh', 'tbldocument', 'description', 7, 0x3c627220747970653d225f6d6f7a22202f3e),
(2769, 'en', 'tbldocument', 'title', 7, 0x446f63756d656e74207469746c6520666f7220646f776e6c6f6164),
(2770, 'en', 'tbldocument', 'author', 7, ''),
(2771, 'en', 'tbldocument', 'publisher', 7, ''),
(2772, 'en', 'tbldocument', 'description', 7, 0x3c627220747970653d225f6d6f7a22202f3e),
(2773, 'kh', 'tbldocument', 'file_name', 7, ''),
(2774, 'en', 'tbldocument', 'file_name', 7, ''),
(2931, 'kh', 'tblgallery', 'title', 14, 0x4e657720766964656f206a6f636b),
(2932, 'en', 'tblgallery', 'title', 14, 0x4e657720766964656f206a6f636b),
(2995, 'kh', 'tblarticle', 'title', 469, 0xe19e80e19f86e19e9ae19e84e19e9ae19ebce19e94e19e97e19eb6e19e96e19e91e19eb8e19fa2),
(2983, 'kh', 'tblarticle', 'title', 466, 0xe19e91e19f86e19e96e19f90e19e9ae19e8ae19ebee19e98),
(2984, 'kh', 'tblarticle', 'description', 466, 0x3c627220747970653d225f6d6f7a22202f3e),
(2990, 'en', 'tblarticle', 'description', 468, 0x3c627220747970653d225f6d6f7a22202f3e),
(2991, 'kh', 'tblarticle', 'title', 468, 0x636f7079206f6620e19e80e19f86e19e9ae19e84e19e9ae19ebce19e94e19e97e19eb6e19e96e19e91e19eb8e19fa3),
(2992, 'kh', 'tblarticle', 'description', 468, 0x3c627220747970653d225f6d6f7a22202f3e),
(2993, 'en', 'tblarticle', 'title', 469, 0x50686f746f2047616c6c6572792032),
(2994, 'en', 'tblarticle', 'description', 469, 0x3c627220747970653d225f6d6f7a22202f3e),
(2821, 'kh', 'tblarticle', 'title', 446, 0xe19e80e19e98e19f92e19e98e19e9ce19eb7e19e92e19eb8e19e9ae19e94e19e9fe19f8be19e80e19f92e19e9ae19e9fe19ebce19e84e19e80e19eb6e19e9a),
(2825, 'kh', 'tblarticle', 'title', 447, 0x636f7079206f6620e19e80e19e98e19f92e19e98e19e9ce19eb7e19e92e19eb8e19e9ae19e94e19e9fe19f8be19e80e19f92e19e9ae19e9fe19ebce19e84e19e80e19eb6e19e9a),
(2822, 'kh', 'tblarticle', 'description', 446, 0xe19e80e19f86e19e96e19e84e19f8be19e9ae19f80e19e94e19e85e19f86e19f94),
(2826, 'kh', 'tblarticle', 'description', 447, 0xe19e80e19f86e19e96e19e84e19f8be19e9ae19f80e19e94e19e85e19f86e19f943c627220747970653d225f6d6f7a22202f3e),
(2823, 'en', 'tblarticle', 'title', 446, 0x636f7079206f6620646764676467),
(2824, 'en', 'tblarticle', 'description', 446, 0x556e64657220636f6e737472756374696f6e207274797274797472792072792072797279727972792072797279722d2d2d3c627220747970653d225f6d6f7a22202f3e),
(2827, 'en', 'tblarticle', 'title', 447, 0x636f7079206f6620636f7079206f6620646764676467),
(2828, 'en', 'tblarticle', 'description', 447, 0x556e64657220636f6e737472756374696f6e3c627220747970653d225f6d6f7a22202f3e),
(2829, 'kh', 'tbldocument', 'title', 8, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e893132),
(2830, 'kh', 'tbldocument', 'author', 8, 0x66686668666866),
(2831, 'kh', 'tbldocument', 'publisher', 8, 0x666866686666),
(2832, 'kh', 'tbldocument', 'description', 8, 0x3c627220747970653d225f6d6f7a22202f3e),
(2833, 'en', 'tbldocument', 'title', 8, 0x5469746c6520666f7220646f776e6c6f616420646f63756d656e742074657374),
(2834, 'en', 'tbldocument', 'author', 8, ''),
(2835, 'en', 'tbldocument', 'publisher', 8, ''),
(2836, 'en', 'tbldocument', 'description', 8, 0x3c627220747970653d225f6d6f7a22202f3e),
(2837, 'kh', 'tbldocument', 'file_name', 8, 0x74657374696e675f706466312e706466),
(2838, 'en', 'tbldocument', 'file_name', 8, ''),
(2839, 'kh', 'tbldocument', 'title', 9, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e893133),
(2840, 'kh', 'tbldocument', 'author', 9, 0x66686668666866),
(2841, 'kh', 'tbldocument', 'publisher', 9, 0x666866686666),
(2842, 'kh', 'tbldocument', 'description', 9, 0x3c627220747970653d225f6d6f7a22202f3e),
(2843, 'en', 'tbldocument', 'title', 9, 0x5469746c6520666f7220646f776e6c6f616420646f63756d656e74207465737432),
(2844, 'en', 'tbldocument', 'author', 9, ''),
(2845, 'en', 'tbldocument', 'publisher', 9, ''),
(2846, 'en', 'tbldocument', 'description', 9, 0x3c627220747970653d225f6d6f7a22202f3e),
(2847, 'kh', 'tbldocument', 'file_name', 9, 0x74657374696e675f706466332e706466),
(2848, 'en', 'tbldocument', 'file_name', 9, ''),
(2849, 'kh', 'tbldocument', 'title', 10, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e893134),
(2850, 'kh', 'tbldocument', 'author', 10, 0x66686668666866),
(2851, 'kh', 'tbldocument', 'publisher', 10, 0x666866686666),
(2852, 'kh', 'tbldocument', 'description', 10, 0x3c627220747970653d225f6d6f7a22202f3e),
(2853, 'en', 'tbldocument', 'title', 10, 0x5469746c6520666f7220646f776e6c6f616420646f63756d656e74207465737433),
(2854, 'en', 'tbldocument', 'author', 10, ''),
(2855, 'en', 'tbldocument', 'publisher', 10, ''),
(2856, 'en', 'tbldocument', 'description', 10, 0x3c627220747970653d225f6d6f7a22202f3e),
(2857, 'kh', 'tbldocument', 'file_name', 10, 0x74657374696e675f706466342e706466),
(2858, 'en', 'tbldocument', 'file_name', 10, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(2859, 'kh', 'tbldocument', 'title', 11, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e893132),
(2860, 'kh', 'tbldocument', 'author', 11, 0x66686668666866),
(2861, 'kh', 'tbldocument', 'publisher', 11, 0x666866686666),
(2862, 'kh', 'tbldocument', 'description', 11, 0x3c627220747970653d225f6d6f7a22202f3e),
(2863, 'en', 'tbldocument', 'title', 11, 0x636f7079206f66205469746c6520666f7220646f776e6c6f616420646f63756d656e742074657374),
(2864, 'en', 'tbldocument', 'author', 11, ''),
(2865, 'en', 'tbldocument', 'publisher', 11, ''),
(2866, 'en', 'tbldocument', 'description', 11, 0x3c627220747970653d225f6d6f7a22202f3e),
(2867, 'kh', 'tbldocument', 'file_name', 11, 0x437572726963756c756d5f56697461652e706466),
(2868, 'en', 'tbldocument', 'file_name', 11, 0x4164642e706466),
(2988, 'kh', 'tblarticle', 'description', 467, 0x3c627220747970653d225f6d6f7a22202f3e),
(2875, 'kh', 'tblarticle', 'title', 449, 0xe19e9ce19eb8e19e8ae19f81e19ea2e19ebce19e81e19f92e19e9be19eb8e19f97e19e90e19f92e19e98e19eb8e19f97),
(2876, 'kh', 'tblarticle', 'description', 449, 0x3c627220747970653d225f6d6f7a22202f3e),
(2877, 'en', 'tblarticle', 'title', 449, 0x4e657720766964656f),
(2878, 'en', 'tblarticle', 'description', 449, 0x3c627220747970653d225f6d6f7a22202f3e),
(2879, 'kh', 'tblarticle', 'title', 450, 0xe19e9ce19eb8e19e8ae19f81e19ea2e19ebce19e81e19f92e19e9be19eb8e19f97e19e90e19f92e19e98e19eb8e19f9732),
(2880, 'kh', 'tblarticle', 'description', 450, 0x3c627220747970653d225f6d6f7a22202f3e),
(2881, 'en', 'tblarticle', 'title', 450, 0x4e657720766964656f32),
(2882, 'en', 'tblarticle', 'description', 450, 0x3c627220747970653d225f6d6f7a22202f3e),
(2989, 'en', 'tblarticle', 'title', 468, 0x50686f746f2047616c6c6572792033),
(1052, 'kh', 'tblarticle', 'title', 219, 0xe19e96e19f8ce19e8fe19e98e19eb6e19e9320e19e93e19eb7e19e84e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8d),
(1209, 'en', 'tblproduct', 'title', 11, 0x5375706572696f72205477696e),
(1193, 'en', 'tblproduct', 'orginal', 8, ''),
(1191, 'en', 'tblproduct', 'title', 8, 0x44656c7578652053696e676c65),
(1192, 'en', 'tblproduct', 'description', 8, 0x3c627220747970653d225f6d6f7a22202f3e),
(1194, 'kh', 'tblproduct', 'title', 8, ''),
(1195, 'kh', 'tblproduct', 'description', 8, 0x3c627220747970653d225f6d6f7a22202f3e),
(1196, 'kh', 'tblproduct', 'orginal', 8, ''),
(1204, 'en', 'tblproduct', 'description', 10, 0x3c627220747970653d225f6d6f7a22202f3e),
(1197, 'en', 'tblproduct', 'title', 9, 0x44656c757865205477696e),
(1198, 'en', 'tblproduct', 'description', 9, 0x3c627220747970653d225f6d6f7a22202f3e),
(1199, 'en', 'tblproduct', 'orginal', 9, ''),
(1200, 'kh', 'tblproduct', 'title', 9, ''),
(1201, 'kh', 'tblproduct', 'description', 9, 0x3c627220747970653d225f6d6f7a22202f3e),
(1202, 'kh', 'tblproduct', 'orginal', 9, ''),
(2544, 'en', 'tblarticle', 'description', 416, 0x3c627220747970653d225f6d6f7a22202f3e),
(1903, 'en', 'tbldocument', 'title', 6, 0x446f63756d656e746a6a207469746c6520666f7220646f776e6c6f6164),
(1904, 'en', 'tbldocument', 'author', 6, 0x727772),
(1905, 'en', 'tbldocument', 'publisher', 6, 0x777277),
(1906, 'en', 'tbldocument', 'description', 6, 0x77727772773c627220747970653d225f6d6f7a22202f3e),
(1907, 'en', 'tbldocument', 'file_name', 6, 0x3237333230313331353232313750686f746f5f536c69646573686f775f616e645f43617074696f6e2e706466),
(1908, 'en', 'tblarticle', 'title', 303, 0x4c4f434154494f4e204d4150),
(1909, 'en', 'tblarticle', 'description', 303, 0x3c696672616d652077696474683d2236333622206865696768743d2234323022206672616d65626f726465723d223022207372633d2268747470733a2f2f6d6170732e676f6f676c652e636f6d2f6d6170732f6d733f6d73613d3026616d703b6d7369643d3231383036303034303732393330333936313737332e30303034643561623762653339363833393639336326616d703b69653d5554463826616d703b743d6d26616d703b6c6c3d31312e3535323536332c3130342e39323835353326616d703b73706e3d302c3026616d703b6f75747075743d656d62656422206d617267696e77696474683d223022206d617267696e6865696768743d223022207363726f6c6c696e673d226e6f223e3c2f696672616d653e3c6272202f3e0d0a3c736d616c6c3e56696577203c61207374796c653d22636f6c6f723a233030303046463b746578742d616c69676e3a6c6566742220687265663d2268747470733a2f2f6d6170732e676f6f676c652e636f6d2f6d6170732f6d733f6d73613d3026616d703b6d7369643d3231383036303034303732393330333936313737332e30303034643561623762653339363833393639336326616d703b69653d5554463826616d703b743d6d26616d703b6c6c3d31312e3535323536332c3130342e39323835353326616d703b73706e3d302c3026616d703b736f757263653d656d626564223e416e676b6f722052657365617263683c2f613e20696e2061206c6172676572206d61703c2f736d616c6c3e),
(1986, 'kh', 'tblarticle', 'title', 309, ''),
(2963, 'en', 'tbllocation', 'title', 80, 0x466f6f746572204c696e6b),
(1987, 'kh', 'tblarticle', 'description', 309, 0x3c627220747970653d225f6d6f7a22202f3e),
(1988, 'en', 'tblarticle', 'title', 309, 0x416c6c20726967687473207265736572766564),
(1989, 'en', 'tblarticle', 'description', 309, 0x3c627220747970653d225f6d6f7a22202f3e),
(2543, 'en', 'tblarticle', 'title', 416, 0x566964656f732073637265656e73686f74),
(2999, 'kh', 'tblarticle', 'title', 470, 0xe19e80e19f86e19e9ae19e84e19e9ae19ebce19e94e19e97e19eb6e19e96e19e91e19eb8e19fa1),
(1203, 'en', 'tblproduct', 'title', 10, 0x5375706572696f722053696e676c65),
(2949, 'kh', 'tblgallery', 'title', 15, 0x7379666973676673616a),
(1002, 'en', 'tblarticle', 'title', 203, 0x53656172636820526573756c74),
(1003, 'en', 'tblarticle', 'description', 203, 0x3c627220747970653d225f6d6f7a22202f3e),
(1208, 'kh', 'tblproduct', 'orginal', 10, ''),
(1206, 'kh', 'tblproduct', 'title', 10, ''),
(1207, 'kh', 'tblproduct', 'description', 10, 0x3c627220747970653d225f6d6f7a22202f3e),
(1205, 'en', 'tblproduct', 'orginal', 10, ''),
(1078, 'en', 'tblarticle', 'title', 225, 0x52656164206d6f7265),
(1079, 'en', 'tblarticle', 'description', 225, 0x3c627220747970653d225f6d6f7a22202f3e),
(1080, 'kh', 'tblarticle', 'title', 225, 0xe19ea2e19eb6e19e93e19e9be19f86e19ea2e19eb7e19e8f),
(1081, 'kh', 'tblarticle', 'description', 225, 0x3c627220747970653d225f6d6f7a22202f3e),
(2967, 'kh', 'tblarticle', 'title', 462, 0xe19e94e19f92e19e9be19e84e19f8be19e82e19f81e19ea0e19e91e19f86e19e96e19f90e19e9a),
(2966, 'en', 'tblarticle', 'description', 462, 0x3c627220747970653d225f6d6f7a22202f3e),
(2965, 'en', 'tblarticle', 'title', 462, 0x536974656d6170),
(1875, 'kh', 'tbldocument', 'title', 5, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e8ae19f84e19e93e19e9be19ebce19e8f),
(2978, 'en', 'tblarticle', 'description', 465, 0x3c627220747970653d225f6d6f7a22202f3e),
(2979, 'kh', 'tblarticle', 'title', 465, 0xe19e91e19f86e19e93e19eb6e19e80e19f8be19e91e19f86e19e93e19e84),
(1876, 'kh', 'tbldocument', 'author', 5, ''),
(1877, 'kh', 'tbldocument', 'publisher', 5, ''),
(1878, 'kh', 'tbldocument', 'description', 5, 0xe19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9a20e19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9ae19f943c627220747970653d225f6d6f7a22202f3e),
(1879, 'en', 'tbldocument', 'file_name', 5, 0x3130315f6d6f652e706466),
(1880, 'kh', 'tbldocument', 'file_name', 5, 0x3130315f6d6f72655f6b682e706466),
(1055, 'en', 'tblarticle', 'description', 220, 0x556e64657220636f6e737472756374696f6e3c6272202f3e),
(2972, 'kh', 'tblarticle', 'description', 463, 0x3c627220747970653d225f6d6f7a22202f3e),
(2973, 'en', 'tblarticle', 'title', 464, 0x46616365426f6f6b),
(2974, 'en', 'tblarticle', 'description', 464, 0x3c627220747970653d225f6d6f7a22202f3e),
(2975, 'kh', 'tblarticle', 'title', 464, 0x46616365426f6f6b),
(2971, 'kh', 'tblarticle', 'title', 463, 0x4c696e6b6564696e),
(2970, 'en', 'tblarticle', 'description', 463, 0x3c627220747970653d225f6d6f7a22202f3e),
(2701, 'kh', 'tblarticle', 'title', 424, 0xe19e9fe19ebce19e98e2808be19e9fe19f92e19e9ce19eb6e19e82e19e98e19e93e19f8de19e80e19eb6e19e9ae19e98e19e80e19e80e19eb6e19e93e19f8b),
(2702, 'kh', 'tblarticle', 'description', 424, 0x3c7370616e207374796c653d22666f6e742d73697a653a20323070783b223e3c7370616e207374796c653d22636f6c6f723a20726762283231392c2032392c203634293b223e3c623e414e474b4f523c2f623e3c2f7370616e3e203c623e3c7370616e207374796c653d22636f6c6f723a207267622833312c2034392c203731293b223e52455345415243483c2f7370616e3e3c2f623e3c2f7370616e3e3c6272202f3e0d0a3c7370616e207374796c653d22636f6c6f723a207267622832382c203131372c20313838293b223e4c6f63616c206b6e6f776c6564652e20496e7465726e6174696f6e616c205374616e64617264733c2f7370616e3e3c6272202f3e0d0a3c6272202f3e0d0a49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c20626520646973747261637465642062792074686520207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f6620207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f6620206c6574746572732c20617320616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e792077656220736974657320207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e732068617665206f70706f73656420746f207573696e672027436f6e74656e742020686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e3c6272202f3e0d0a3c6272202f3e0d0a4d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d2020497073756d2061732074686569722064656661756c74206d6f64656c20746578742c2065766f6c766564206f766572207468652079656172732c20736f6d6574696d657320627920206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220612020736561726368207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d206173207468656972202064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e792077656220207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f76657220746865202079656172732c20736f6d6574696d6573206279206163636964656e742e4469737472616374656420627920746865207265616461626c6520636f6e74656e74206f662061202070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d206973207468617420206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c266e6273703b20666f7220276c6f72656d20697073756d27202077696c6c20646973747269627574696f6e206f66206c6574746572732c206173207573696e673c6272202f3e0d0a4c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c206e6f7720757365204c6f72656d20497073756d206173202074686569722064656661756c74206d6f64656c20746578742c266e6273703b206f70706f73656420746861742061207265616465722077696c6c20626520646973747261637465642062792020746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f662020616e6420746f207573696e672027436f6e74656e7420686572652e202c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b6520207265616461626c6520456e676c6973682e3c6272202f3e0d0a266e6273703b4d616e79206465736b746f70207075626c697368696e67206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e),
(1056, 'kh', 'tblarticle', 'title', 220, 0x4d656964612046454146474f43),
(2997, 'en', 'tblarticle', 'title', 470, 0x50686f746f2047616c6c6572792031),
(1057, 'kh', 'tblarticle', 'description', 220, 0xe19e80e19f86e19e96e19ebbe19e84e19e9ae19f80e19e94e19e85e19f86e19f943c627220747970653d225f6d6f7a22202f3e),
(1058, 'en', 'tblarticle', 'title', 221, 0x446f63756d656e74),
(1059, 'en', 'tblarticle', 'description', 221, 0x556e646572636f6e737472756374696f6e3c6272202f3e),
(2691, 'kh', 'tblarticle', 'title', 422, 0xe19e91e19f86e19e93e19eb6e19e80e19f8be19e91e19f86e19e93e19e84),
(2692, 'kh', 'tblarticle', 'description', 422, 0x3c627220747970653d225f6d6f7a22202f3e),
(2693, 'en', 'tblarticle', 'title', 422, 0x436f6e74616374205573),
(2694, 'en', 'tblarticle', 'description', 422, 0x3c627220747970653d225f6d6f7a22202f3e),
(2968, 'kh', 'tblarticle', 'description', 462, 0x3c627220747970653d225f6d6f7a22202f3e),
(2969, 'en', 'tblarticle', 'title', 463, 0x4c696e6b6564696e),
(1060, 'kh', 'tblarticle', 'title', 221, 0xe19eafe19e80e19e9fe19eb6e19e9a),
(2998, 'en', 'tblarticle', 'description', 470, 0x3c627220747970653d225f6d6f7a22202f3e),
(1061, 'kh', 'tblarticle', 'description', 221, 0xe19e80e19f86e19e96e19e84e19f8be19e9ae19f80e19e94e19e85e19f863c627220747970653d225f6d6f7a22202f3e),
(2996, 'kh', 'tblarticle', 'description', 469, 0x3c627220747970653d225f6d6f7a22202f3e),
(1185, 'en', 'tblproduct', 'title', 7, 0x44656c7578652053696e676c6520526f6f6d),
(1186, 'en', 'tblproduct', 'description', 7, 0x3c627220747970653d225f6d6f7a22202f3e),
(1187, 'en', 'tblproduct', 'orginal', 7, ''),
(1188, 'kh', 'tblproduct', 'title', 7, ''),
(1189, 'kh', 'tblproduct', 'description', 7, 0x3c627220747970653d225f6d6f7a22202f3e),
(1190, 'kh', 'tblproduct', 'orginal', 7, ''),
(1210, 'en', 'tblproduct', 'description', 11, 0x3c627220747970653d225f6d6f7a22202f3e),
(1211, 'en', 'tblproduct', 'orginal', 11, ''),
(1212, 'kh', 'tblproduct', 'title', 11, ''),
(1213, 'kh', 'tblproduct', 'description', 11, 0x3c627220747970653d225f6d6f7a22202f3e),
(1214, 'kh', 'tblproduct', 'orginal', 11, ''),
(2130, 'en', 'tblarticle', 'description', 337, 0x3c6272202f3e),
(2699, 'kh', 'tbllocation', 'title', 77, 0x57656c636f6d652026204f74686572),
(2700, 'en', 'tbllocation', 'title', 77, 0x57656c636f6d652026204f74686572),
(2129, 'en', 'tblarticle', 'title', 337, 0x5469746c65206f662070686f746f20736c69646573686f772066726f6e74),
(1821, 'kh', 'tblarticle', 'title', 203, 0xe19e9be19e91e19f92e19e92e19e95e19e9be19e93e19f83e19e80e19eb6e19e9ae19e9fe19f92e19e9ce19f82e19e84e19e9ae19e80),
(1822, 'kh', 'tblarticle', 'description', 203, 0x3c627220747970653d225f6d6f7a22202f3e),
(2131, 'kh', 'tblarticle', 'title', 337, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e19e9ae19ebce19e94e19e97e19eb6e19e96e19e93e19f83e19e80e19e98e19f92e19e98e19e9ce19eb7e19e92e19eb8e19e9ae19e94e19e9fe19f8b20e19ea2e19e84e19f92e19e82e19e9ae19e9fe19f92e19e9ae19eb6e19e9ce19e87e19f92e19e9ae19eb6e19e9c),
(1423, 'en', 'tblcategory', 'title', 1, 0x496d706f727461696e7420446f63756d656e7473),
(1424, 'kh', 'tblcategory', 'title', 1, 0xe19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e81e19eb6e19e93e19f8be19f97),
(1425, 'en', 'tblcategory', 'title', 2, 0x4d6f6e746820646f63756d656e74),
(1426, 'kh', 'tblcategory', 'title', 2, 0xe19eafe19e80e19e9fe19eb6e19e9ae19e94e19f92e19e9ae19e85e19eb6e19f86e19e81e19f82),
(1427, 'en', 'tblcategory', 'title', 3, 0x5965617220646f63756d656e74),
(1428, 'kh', 'tblcategory', 'title', 3, 0xe19eafe19e80e19e9fe19eb6e19e9ae19e94e19f92e19e9ae19e85e19eb6e19f86e19e86e19f92e19e93e19eb6e19f86),
(1535, 'en', 'tbldocument', 'title', 1, 0x446f63756d656e74e2808b207469746c6520666f7220646f776e6c6f6164),
(1536, 'en', 'tbldocument', 'author', 1, ''),
(1537, 'en', 'tbldocument', 'publisher', 1, ''),
(1538, 'en', 'tbldocument', 'description', 1, 0xe19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9a20e19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9ae19f94),
(1539, 'kh', 'tbldocument', 'title', 1, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89e19e99e19e80e19f8b),
(2977, 'en', 'tblarticle', 'title', 465, 0x436f6e74616374205573),
(1540, 'kh', 'tbldocument', 'author', 1, ''),
(1541, 'kh', 'tbldocument', 'publisher', 1, ''),
(1542, 'kh', 'tbldocument', 'description', 1, 0xe19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9a20e19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9ae19f943c627220747970653d225f6d6f7a22202f3e),
(1543, 'en', 'tbldocument', 'file_name', 1, 0x3130315f6d6f652e706466),
(1544, 'kh', 'tbldocument', 'file_name', 1, 0x3130315f6d6f72655f6b682e706466),
(2132, 'kh', 'tblarticle', 'description', 337, 0x3c6272202f3e),
(1559, 'en', 'tbldocument', 'title', 2, 0x446f63756d656e74207469746c6520666f7220646f776e6c6f6164),
(1560, 'en', 'tbldocument', 'author', 2, ''),
(1561, 'en', 'tbldocument', 'publisher', 2, ''),
(1562, 'en', 'tbldocument', 'description', 2, 0x3c627220747970653d225f6d6f7a22202f3e);
INSERT INTO `tbltranslate` (`t_id`, `language_code`, `table_ref`, `field_ref`, `id_ref`, `translate`) VALUES
(1563, 'kh', 'tbldocument', 'title', 2, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89e19e99),
(1564, 'kh', 'tbldocument', 'author', 2, ''),
(1565, 'kh', 'tbldocument', 'publisher', 2, ''),
(1566, 'kh', 'tbldocument', 'description', 2, 0x3c627220747970653d225f6d6f7a22202f3e),
(1567, 'en', 'tbldocument', 'file_name', 2, 0x3130315f6d6f652e706466),
(1568, 'kh', 'tbldocument', 'file_name', 2, 0x3130315f6d6f72655f6b682e706466),
(1469, 'en', 'tblarticle', 'title', 246, 0x436c69636b),
(1470, 'en', 'tblarticle', 'description', 246, 0x3c627220747970653d225f6d6f7a22202f3e),
(1471, 'kh', 'tblarticle', 'title', 246, 0xe19e85e19ebbe19e85),
(1472, 'kh', 'tblarticle', 'description', 246, 0x3c627220747970653d225f6d6f7a22202f3e),
(1487, 'en', 'tblarticle', 'title', 250, 0x436f707972696768747320323031342c),
(1488, 'en', 'tblarticle', 'description', 250, 0x3c627220747970653d225f6d6f7a22202f3e),
(1489, 'kh', 'tblarticle', 'title', 250, 0xe19fa2e19fa0e19fa1e19fa3e2808b202d20e19e9ae19e80e19f92e19e9fe19eb6e19e9fe19eb7e19e91e19f92e19e92e19eb7e19e82e19f92e19e9ae19e94e19f8be19e99e19f89e19eb6e19e8420e19e8ae19f84e19e99),
(1490, 'kh', 'tblarticle', 'description', 250, 0x3c627220747970653d225f6d6f7a22202f3e),
(1495, 'en', 'tblarticle', 'title', 252, 0x486f6e6720536f706865617020446576656c6f706d656e7420436f2e2c4c7464),
(1496, 'en', 'tblarticle', 'description', 252, 0x3c627220747970653d225f6d6f7a22202f3e),
(1497, 'kh', 'tblarticle', 'title', 252, 0x486f6e6720536f706865617020446576656c6f706d656e7420436f2e2c4c7464),
(1498, 'kh', 'tblarticle', 'description', 252, 0x3c627220747970653d225f6d6f7a22202f3e),
(1499, 'en', 'tblarticle', 'title', 253, 0x44657369676e6564202620486f7374696e67204279),
(1500, 'en', 'tblarticle', 'description', 253, 0x3c627220747970653d225f6d6f7a22202f3e),
(1501, 'kh', 'tblarticle', 'title', 253, 0xe19e9ae19e85e19e93e19eb620e19e93e19eb7e19e84e19e94e19e84e19f92e19ea0e19f84e19f87e19e8ae19f84e19e99),
(1502, 'kh', 'tblarticle', 'description', 253, 0x3c627220747970653d225f6d6f7a22202f3e),
(1874, 'en', 'tbldocument', 'description', 5, 0xe19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9a20e19e96e19f92e19e9ae19f87e2808be19e9ae19eb6e19e87e2808be19e80e19f92e19e9ae19eb7e19e8fe19f92e19e9920e19e8ae19f82e19e9be19e87e19eb6e2808be19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808b20e19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9ae19f94),
(1871, 'en', 'tbldocument', 'title', 5, 0x446f63756d656e74e2808b207469746c6520666f7220646f776e6c6f6164),
(1872, 'en', 'tbldocument', 'author', 5, ''),
(1873, 'en', 'tbldocument', 'publisher', 5, ''),
(1642, 'en', 'tbldocument', 'description', 3, 0x3c627220747970653d225f6d6f7a22202f3e),
(1643, 'kh', 'tbldocument', 'title', 3, 0xe19e9ae19eb6e19e87e2808be19e9ae19e8ae19f92e19e8be19eb6e2808be19e97e19eb7e19e94e19eb6e19e9be2808be19e94e19eb6e19e93e2808be19e9fe19ebbe19f86e2808be19e96e19f92e19e9ae19f87e2808be19e98e19ea0e19eb6e2808be19e80e19f92e19e9fe19e8fe19f92e19e9a),
(2976, 'kh', 'tblarticle', 'description', 464, 0x3c627220747970653d225f6d6f7a22202f3e),
(1644, 'kh', 'tbldocument', 'author', 3, ''),
(1645, 'kh', 'tbldocument', 'publisher', 3, ''),
(1646, 'kh', 'tbldocument', 'description', 3, 0x3c627220747970653d225f6d6f7a22202f3e),
(1647, 'en', 'tbldocument', 'file_name', 3, 0x3130315f6d6f652e706466),
(1648, 'kh', 'tbldocument', 'file_name', 3, 0x3130315f6d6f72655f6b682e706466),
(1640, 'en', 'tbldocument', 'author', 3, ''),
(1641, 'en', 'tbldocument', 'publisher', 3, ''),
(1639, 'en', 'tbldocument', 'title', 3, 0x446f63756d656e74207469746c6520666f7220646f776e6c6f6164),
(2066, 'kh', 'tbldocument', 'title', 6, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89e19e99e19e80e19e85e19f86e19e8ee19e84),
(2067, 'kh', 'tbldocument', 'author', 6, 0x53616d6e616e67),
(2068, 'kh', 'tbldocument', 'publisher', 6, 0x53616d6e616e67),
(2069, 'kh', 'tbldocument', 'description', 6, 0x66736673663c627220747970653d225f6d6f7a22202f3e),
(2070, 'kh', 'tblmember', 'full_name', 1, ''),
(2087, 'kh', 'tblmember', 'full_name', 10, ''),
(1998, 'kh', 'tblarticle', 'title', 312, 0xe19e85e19f82e19e80e19e9ae19f86e19e9be19f82e19e80),
(1995, 'kh', 'tblarticle', 'description', 311, 0xe19fa1e2808b20e19e8fe19ebee19e85e19f86e19e93e19ebce19e9be19e94e19f92e19e9ae19e87e19eb6e19e87e19e93e19e80e19e98e19f92e19e96e19ebbe19e87e19eb620e19e87e19eb6e19e98e19e92e19f92e19e99e19e98e19e94e19eb6e19e93e19e94e19f89e19ebbe19e93e19f92e19e98e19eb6e19e93e19e80e19f92e19e93e19ebbe19e84e19e98e19ebde19e99e19e90e19f92e19e84e19f833f3c6272202f3e0d0ae19e85e19f86e19e9be19ebee19e99203ae19e94e19eb6e19e93e19fa22420e19e80e19f92e19e93e19ebbe19e84e19fa1e19e90e19f92e19e84e19f83e19f953c6272202f3e0d0a3c6272202f3e0d0ae19fa1e2808b20e19e8fe19ebee19e85e19f86e19e93e19ebce19e9be19e94e19f92e19e9ae19e87e19eb6e19e87e19e93e19e80e19e98e19f92e19e96e19ebbe19e87e19eb620e19e87e19eb6e19e98e19e92e19f92e19e99e19e98e19e94e19eb6e19e93e19e94e19f89e19ebbe19e93e19f92e19e98e19eb6e19e93e19e80e19f92e19e93e19ebbe19e84e19e98e19ebde19e99e19e90e19f92e19e84e19f833f3c6272202f3e0d0ae19e85e19f86e19e9be19ebee19e99203ae19e94e19eb6e19e93e19fa22420e19e80e19f92e19e93e19ebbe19e84e19fa1e19e90e19f92e19e84e19f83e19f95),
(1996, 'en', 'tblarticle', 'title', 311, 0x5141),
(1997, 'en', 'tblarticle', 'description', 311, 0x3c627220747970653d225f6d6f7a22202f3e),
(1999, 'kh', 'tblarticle', 'description', 312, 0x3c627220747970653d225f6d6f7a22202f3e),
(2000, 'en', 'tblarticle', 'title', 312, 0x5368617265),
(2001, 'en', 'tblarticle', 'description', 312, 0x3c627220747970653d225f6d6f7a22202f3e),
(2546, 'kh', 'tblarticle', 'description', 416, 0x3c627220747970653d225f6d6f7a22202f3e),
(2545, 'kh', 'tblarticle', 'title', 416, 0x566964656f732073637265656e73686f74),
(3005, 'en', 'tblgallery', 'title', 18, 0x6667686466666864676467),
(3002, 'en', 'tblarticle', 'description', 471, 0x646764676467646720646764206467206467206764206467206467206467206467206467646764676420646720646764206764676467646720646764672d2d2d3c6272202f3e),
(3001, 'en', 'tblarticle', 'title', 471, 0x566964656f),
(1994, 'kh', 'tblarticle', 'title', 311, 0xe19e9fe19f86e19e93e19ebde19e9a2de19e85e19f86e19e9be19ebee19e99),
(2574, 'en', 'tblarticle', 'description', 421, 0x3c627220747970653d225f6d6f7a22202f3e),
(2573, 'en', 'tblarticle', 'title', 421, 0x3c2053656c6563742043617465676f7279203e),
(2122, 'en', 'tblarticle', 'description', 335, 0x5072696d65204d696e69737465722048756e2053656e2061707065616c656420746f2065766572796f6e6520746f207765617220612068656c6d65742065766572792074696d6520796f7520676574206f6e206d6f746f726379636c653b206f6e65206d6174746572207768656e206f7220776865726520796f752061726520676f696e672c207768657468657220796f752d2d2d206172652074686520647269766572206f72207468652070617373656e676572732e3c6272202f3e),
(2121, 'en', 'tblarticle', 'title', 335, 0x5469746c6520736c6964652073686f77),
(2120, 'kh', 'tblarticle', 'description', 334, 0x3c627220747970653d225f6d6f7a22202f3e),
(2074, 'en', 'tblarticle', 'description', 325, 0x3c627220747970653d225f6d6f7a22202f3e),
(2072, 'kh', 'tblarticle', 'description', 325, 0x3c627220747970653d225f6d6f7a22202f3e),
(2073, 'en', 'tblarticle', 'title', 325, 0x506c656173652066696c6c20746865207265717569726520696e666f726d6174696f6e),
(1944, 'kh', 'tblarticle', 'title', 299, 0x636f6d70616e79206c6f676f),
(1945, 'kh', 'tblarticle', 'description', 299, 0x3c627220747970653d225f6d6f7a22202f3e),
(2071, 'kh', 'tblarticle', 'title', 325, 0xe19e9fe19ebce19e98e19e96e19eb7e19e93e19eb7e19e8fe19f92e19e99e19e98e19ebee19e9b20e19e9ae19eb6e19e9be19f8be19e96e19f90e19e8fe19f8ce19e98e19eb6e19e93e19e8ae19f82e19e9be19e8fe19f92e19e9ae19ebce19e9ce19e94e19f86e19e96e19f81e19e89),
(1964, 'kh', 'tblarticle', 'title', 303, 0xe19e91e19eb8e19e8fe19eb6e19f86e19e84e19e93e19f85e19e9be19ebee19e95e19f82e19e93e19e91e19eb8),
(1965, 'kh', 'tblarticle', 'description', 303, 0x3c696672616d652077696474683d2236303222206865696768743d2234323022206672616d65626f726465723d223022207372633d2268747470733a2f2f6d6170732e676f6f676c652e636f6d2f6d6170732f6d733f6d73613d3026616d703b6d7369643d3231383036303034303732393330333936313737332e30303034643561623762653339363833393639336326616d703b69653d5554463826616d703b743d6d26616d703b6c6c3d31312e3535323536332c3130342e39323835353326616d703b73706e3d302c3026616d703b6f75747075743d656d62656422206d617267696e77696474683d223022206d617267696e6865696768743d223022207363726f6c6c696e673d226e6f223e3c2f696672616d653e3c6272202f3e0d0a3c736d616c6c3e56696577203c61207374796c653d22636f6c6f723a233030303046463b746578742d616c69676e3a6c6566742220687265663d2268747470733a2f2f6d6170732e676f6f676c652e636f6d2f6d6170732f6d733f6d73613d3026616d703b6d7369643d3231383036303034303732393330333936313737332e30303034643561623762653339363833393639336326616d703b69653d5554463826616d703b743d6d26616d703b6c6c3d31312e3535323536332c3130342e39323835353326616d703b73706e3d302c3026616d703b736f757263653d656d626564223e416e676b6f722052657365617263683c2f613e20696e2061206c6172676572206d61703c2f736d616c6c3e),
(2107, 'kh', 'tbllocation', 'title', 63, 0xe19e92e19f92e19e9ce19ebee19e80e19eb6e19e9ae19e87e19eb6e19e98e19ebde19e99e19e96e19ebde19e80e19e99e19ebee19e84),
(2108, 'en', 'tbllocation', 'title', 63, 0x4e6577732026204576656e7473),
(2109, 'kh', 'tblarticle', 'title', 332, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19e9ae19e94e19e9fe19f8be19e82e19f86e19e9ae19f84e19e84),
(2110, 'kh', 'tblarticle', 'description', 332, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f7473266e6273703b206865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f7269747920627920696e6a656374656420616d6f756e7473206f662070726f7065727479206265696e67206275696c74206f722077696c6c206275696c642c206f6e6c7920746f2066696e64206974206f666665726564206f6e2074686520706c616e6520646f6573206e6f7420636f72726573706f6e642074686520756c74696d6174652068656c642074686174206974206f66666572656420696e2062726f6368757265732d2d2d3c6272202f3e0d0a3c627220747970653d225f6d6f7a22202f3e),
(2111, 'en', 'tblarticle', 'title', 332, 0x546974746c65206f66207468652070726f6a656374207265666572656e636573),
(2112, 'en', 'tblarticle', 'description', 332, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f7473266e6273703b206865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f7269747920627920696e6a656374656420616d6f756e7473206f662070726f7065727479206265696e67206275696c74206f722077696c6c206275696c642c206f6e6c7920746f2066696e64206974206f666665726564206f6e2074686520706c616e6520646f6573206e6f7420636f72726573706f6e642074686520756c74696d6174652068656c642074686174206974206f66666572656420696e2062726f6368757265732d2d2d2074657374696e673c6272202f3e0d0a3c627220747970653d225f6d6f7a22202f3e),
(2123, 'kh', 'tblarticle', 'title', 335, 0xe19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e19e9ae19ebce19e94e19e97e19eb6e19e96e19e93e19f83e19e80e19e98e19f92e19e98e19e9ce19eb7e19e92e19eb8e19e9ae19e94e19e9fe19f8b20e19ea2e19e84e19f92e19e82e19e9ae19e9fe19f92e19e9ae19eb6e19e9ce19e87e19f92e19e9ae19eb6e19e9c),
(2124, 'kh', 'tblarticle', 'description', 335, 0x3c627220747970653d225f6d6f7a22202f3e),
(2311, 'en', 'tbllocation', 'title', 70, 0x4e65777320616e64204576656e7473),
(2312, 'kh', 'tbllocation', 'title', 70, 0xe19e96e19f90e19e8fe19f8fe19e98e19eb6e19e9320e19e93e19eb7e19e8420e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8fe19e90e19f92e19e98e19eb8e19f97),
(2964, 'kh', 'tbllocation', 'title', 80, 0x466f6f746572204c696e6b),
(2473, 'kh', 'tblarticle', 'title', 404, 0xe19e94e19f92e19e9be19e84e19f8be19e82e19f81e19ea0e19e91e19f86e19e96e19f90e19e9a),
(2474, 'kh', 'tblarticle', 'description', 404, 0x3c627220747970653d225f6d6f7a22202f3e),
(2471, 'en', 'tblarticle', 'title', 404, 0x53697465204d6170),
(2472, 'en', 'tblarticle', 'description', 404, 0x3c627220747970653d225f6d6f7a22202f3e),
(2576, 'kh', 'tblarticle', 'description', 421, 0x3c627220747970653d225f6d6f7a22202f3e),
(2575, 'kh', 'tblarticle', 'title', 421, 0x3c20e19e87e19f92e19e9ae19ebee19e9fe19e9ae19ebee19e9fe19e94e19f92e19e9ae19e97e19f81e19e91e19eafe19e80e19e9fe19eb6e19e9a203e),
(2253, 'en', 'tbllocation', 'title', 65, 0x537562204d656e75),
(2254, 'kh', 'tbllocation', 'title', 65, 0x537562204d656e75),
(3004, 'kh', 'tblarticle', 'description', 471, 0x266e6273703b556e64657220436f6e737472756374696f6e),
(3003, 'kh', 'tblarticle', 'title', 471, 0xe19e9ce19eb8e19e8ae19f81e19ea2e19ebce19e81e19f92e19e9be19eb8e19f97),
(3006, 'kh', 'tblgallery', 'title', 18, 0x6464676467646764),
(3007, 'en', 'tblarticle', 'title', 472, 0x636f7079206f66204e657720766964656f32),
(3008, 'en', 'tblarticle', 'description', 472, 0x3c627220747970653d225f6d6f7a22202f3e),
(3009, 'kh', 'tblarticle', 'title', 472, 0x636f7079206f6620e19e9ce19eb8e19e8ae19f81e19ea2e19ebce19e81e19f92e19e9be19eb8e19f97e19e90e19f92e19e98e19eb8e19f9732),
(3010, 'kh', 'tblarticle', 'description', 472, 0x3c627220747970653d225f6d6f7a22202f3e),
(2981, 'en', 'tblarticle', 'title', 466, 0x486f6d65),
(2980, 'kh', 'tblarticle', 'description', 465, 0x3c627220747970653d225f6d6f7a22202f3e),
(2937, 'kh', 'tblarticle', 'title', 459, 0xe19e9ae19ebce19e94e19e97e19eb6e19e96),
(2938, 'kh', 'tblarticle', 'description', 459, 0x266e6273703b556e64657220436f6e737472756374696f6e),
(2939, 'en', 'tblarticle', 'title', 459, 0x47616c6c657279),
(2940, 'en', 'tblarticle', 'description', 459, 0x646764676467646720646764206467206467206764206467206467206467206467206467646764676420646720646764206764676467646720646764672d2d2d3c6272202f3e),
(2982, 'en', 'tblarticle', 'description', 466, 0x3c627220747970653d225f6d6f7a22202f3e),
(3011, 'en', 'tbldocument', 'title', 12, 0x646667646667),
(3012, 'en', 'tbldocument', 'author', 12, 0x646764676467),
(3013, 'en', 'tbldocument', 'publisher', 12, ''),
(3014, 'en', 'tbldocument', 'description', 12, 0x3c627220747970653d225f6d6f7a22202f3e),
(3015, 'kh', 'tbldocument', 'title', 12, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89),
(3016, 'kh', 'tbldocument', 'author', 12, ''),
(3017, 'kh', 'tbldocument', 'publisher', 12, ''),
(3018, 'kh', 'tbldocument', 'description', 12, 0x3c627220747970653d225f6d6f7a22202f3e),
(3019, 'en', 'tbldocument', 'file_name', 12, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3020, 'kh', 'tbldocument', 'file_name', 12, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3021, 'en', 'tblarticle', 'title', 473, 0x7366),
(3022, 'en', 'tblarticle', 'description', 473, 0x3c627220747970653d225f6d6f7a22202f3e),
(3023, 'kh', 'tblarticle', 'title', 473, ''),
(3024, 'kh', 'tblarticle', 'description', 473, 0x3c627220747970653d225f6d6f7a22202f3e),
(3025, 'en', 'tbllocation', 'title', 81, 0x666f6f7465722041646472657373),
(3026, 'kh', 'tbllocation', 'title', 81, 0x666f6f7465722041646472657373),
(3027, 'en', 'tblarticle', 'title', 474, 0x4261636b67726f756e6420486561646572),
(3028, 'en', 'tblarticle', 'description', 474, 0x3c627220747970653d225f6d6f7a22202f3e),
(3029, 'kh', 'tblarticle', 'title', 474, 0x4261636b67726f756e6420486561646572),
(3030, 'kh', 'tblarticle', 'description', 474, 0x3c627220747970653d225f6d6f7a22202f3e),
(3031, 'en', 'tblarticle', 'title', 475, 0x436f6d70616e79205469746c65),
(3032, 'en', 'tblarticle', 'description', 475, 0x3c627220747970653d225f6d6f7a22202f3e),
(3033, 'kh', 'tblarticle', 'title', 475, 0x436f6d70616e79205469746c65),
(3034, 'kh', 'tblarticle', 'description', 475, 0x3c627220747970653d225f6d6f7a22202f3e),
(3035, 'en', 'tbllocation', 'title', 82, 0x436f6d70616e79205469746c65),
(3036, 'kh', 'tbllocation', 'title', 82, 0x436f6d70616e79205469746c65),
(3037, 'en', 'tblarticle', 'title', 476, 0x446f6e617465),
(3038, 'en', 'tblarticle', 'description', 476, 0x3c627220747970653d225f6d6f7a22202f3e),
(3039, 'kh', 'tblarticle', 'title', 476, 0xe19e9ce19eb7e19e97e19eb6e19e82e19e91e19eb6e19e93),
(3040, 'kh', 'tblarticle', 'description', 476, 0x3c627220747970653d225f6d6f7a22202f3e),
(3041, 'en', 'tblarticle', 'title', 477, 0x41626f7574205573),
(3042, 'en', 'tblarticle', 'description', 477, 0x53657276696e672057656220536f6c7574696f6ee2808b2028535753292077617320666f756e6420627920616e206f76657273656120496e666f726d6174696f6e20546563686e6f6c6f67792065647563617465642077697468207265636f676e697a656420657870657269656e63657320666f756e64657220616e6420697420686173206265656e20696e206d61726b65742073696e6365206c617465203230303620776974682074686520766973696f6e206f662068656c702070726f6d6f74696e6720636c69656e7426727371756f3b7320627573696e657373207573696e67206869676820746563686e6f6c6f6779207769746820726561736f6e61626c6520636f737420616e64207175616c697479206f662073657276696365732e203c6272202f3e0d0a57652061726520726561647920746f2070726f76696465206f75722062657374206566666f727420696e2070726573656e74696e6720796f757220706572736f6e616c206f7220636f6d70616e792c20612076657279206265737420736f6c7574696f6e7320616e64207765206c6f6f6b20666f727761726420746f2068617665206368616e63652064697363757373696f6e206f75722070726f706f73616c207769746820796f7520617420616e79206f6620796f757220636f6e76656e69656e742074696d652e3c6272202f3e0d0a5357532069732065717569707065642077697468206d6f6465726e20495420666163696c697469657320616e64206869676820736b696c6c207374616666732066726f6d207265636f676e697a656420495420656475636174696f6e616c2063656e746572732e204f7572207465616d206d656d626572732061726520667269656e646c792c20636f6f706572617469766520616e642077652061726520636f6d6d697474656420746f2070726f7669646520266c6471756f3b4e6f20436f6d706c61696e656420536572766963657326726471756f3b20746f20636c69656e74732e20576520617373757265206f757220636c69656e74732074686174207468657265206973206e6f20616e7920617474656d707420746f206c6f636b207468656972207075726368617365642070726f6475637473206f7220736572766963657320776974682075732e3c6272202f3e0d0a3c6272202f3e0d0a3c623e4f555220564953494f4e3c2f623e3c6272202f3e0d0a4f7572206d61696e20766973696f6e20697320746f2070726f76696465206120726f6275737420776562206261736564207365727669636520746f20616c6c206b696e64206f6620636f6d70616e6965732c206f7267616e697a6174696f6e732c20676f7665726e6d656e74616c20696e737469747574696f6e732c20616e64206576656e20706572736f6e616c2062656c6f6e676564207374756666732e204d6f72656f7665722c20746865206c6f77657220707269636520616e6420686967686572207365727669636520706572666f726d616e636520616e6420666561747572657320617265207374726f6e676c792070726f766964656420696e2065616368206f66206f757220686f7374696e6720706c616e20616e642073657276696365732e3c6272202f3e0d0a3c6272202f3e0d0a3c623e4f5552204d495353494f4e3c2f623e3c6272202f3e0d0a546f2070726f7669646520616c6c20706f737369626c65207765622d6261736520736f6c7574696f6e2073657276696365207769746820686967686c7920746563686e6f6c6f6779206174206166666f726461626c6520636f737420666f7220616c6c20637573746f6d6572732c20616e6420746f206d61696e7461696e2068696768206c6576656c206f6620736174697366616374696f6e20666f7220616c6c206f66206f7572207374616b65686f6c646572732e3c6272202f3e0d0a3c6272202f3e0d0a3c623e4f555220474f414c533c2f623e3c6272202f3e0d0a546f2070726f7669646520612068696768207175616c697479202873656375726974792c2072656c696162696c6974792c20666c65786962696c6974792c20616e64206163636573736962696c69747929206f66207468652073657276696365207769746820726561736f6e61626c6520707269636520696e2043616d626f64696120636f6d7065746974697665206d61726b65742c20616e642061747461696e20612077656c6c207072616973656420637573746f6d657220736572766963657320666f72206c6f6e67207465726d20737563636573732e3c6272202f3e0d0a3c623e4f555220434f524520434f4d504554454e43593c2f623e3c6272202f3e0d0a535753206973207374726976696e6720746f2061747461696e2074686520666f6c6c6f77696e6720636f6d706574656e6369657320696e206f7264657220746f206d6565742074686520637573746f6d657226727371756f3b73206e65656420616e642077616e742e3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b2052656c696162696c6974793c6272202f3e0d0a266e6273703b266e6273703b266e6273703b2053656375726974793c6272202f3e0d0a266e6273703b266e6273703b266e6273703b20466c65786962696c69747920616e643c6272202f3e0d0a266e6273703b266e6273703b266e6273703b204163636573736962696c6974793c6272202f3e0d0a3c6272202f3e0d0a3c623e4f5552204d454d424552533c2f623e3c6272202f3e0d0a416c6c206d656d62657273206172652073656c6563746564206361726566756c6c7920746f2062652061626c6520746f2068616e646c6520616c6c2061737369676e6564207461736b732e2053657276696e672057656220536f6c7574696f6e2073656c65637473206f6e6c79206365727469666965642049542070726f66657373696f6e616c20736b696c6c656420706572736f6e7320746f20626520696e206f7572207465616d2e204f7572206d656d62657273206172652066726f6d20646966666572656e7420736f75726365732066726f6d20556e697665727369746965732c207072697661746520636f6d70616e69657320616e64206f7468657220686967682070726f66696c6520746563686e6f6c6f6779206f7267616e697a6174696f6e207769746820616465717561746520657870657269656e6365732e3c6272202f3e0d0a3c6272202f3e0d0a3c623e4f555220544543484e4f4c4f47593c2f623e3c6272202f3e0d0a426563617573652074686520496e7465726e657420546563686e6f6c6f67792069732067726f77696e67206661737420646179206279206461792c20536572766572696e672057656220536f6c7574696f6e20697320686572652077697468206869676820657175697070656420746563686e6f6c6f677920746f206f7572207374616666732c206f7572206f7065726174696f6e616c206571756970656d656e7420616e642073657276696365732c2070726f766964656420746f20656e737572652074686520657175616c697479206f6620746563686e6f6c6f677920616e64206164646974696f6e616c6c7920746f20656c656d696e61746520746865206c696d69746174696f6e206f66206469676974616c2064697669646564206265747765656e206c6f772070726f66696c6520746563686e6f6c6f677920636f756e747279206c696b652043414d424f44494120696e746f20636f6d70657469746976652077697468206f74686572206f6e207468652072657374206f662074686520776f726c642e3c6272202f3e0d0a4f75722065787065727469736520696e2074686520646576656c6f706d656e74206361706162696c69747920697320746f20646576656c6f70206e657720637573746f6d697a6564206170706c69636174696f6e2c2075706461746520616e6420656e68616e6365206578697374696e67206170706c69636174696f6e2c20616e6420616c736f20696e746567726174652c20616e64206d69677261746520746865206170706c69636174696f6e20636f6e736f6c69646174696f6e2e3c6272202f3e0d0a3c6272202f3e0d0a3c6272202f3e),
(3043, 'kh', 'tblarticle', 'title', 477, 0xe19ea2e19f86e19e96e19eb8e19e99e19ebee19e84),
(3044, 'kh', 'tblarticle', 'description', 477, 0x53657276696e672057656220536f6c7574696f6ee2808b2028535753292077617320666f756e6420627920616e206f76657273656120496e666f726d6174696f6e20546563686e6f6c6f67792065647563617465642077697468207265636f676e697a656420657870657269656e63657320666f756e64657220616e6420697420686173206265656e20696e206d61726b65742073696e6365206c617465203230303620776974682074686520766973696f6e206f662068656c702070726f6d6f74696e6720636c69656e7426727371756f3b7320627573696e657373207573696e67206869676820746563686e6f6c6f6779207769746820726561736f6e61626c6520636f737420616e64207175616c697479206f662073657276696365732e3c6272202f3e0d0a266e6273703b3c6272202f3e0d0a57652061726520726561647920746f2070726f76696465206f75722062657374206566666f727420696e2070726573656e74696e6720796f757220706572736f6e616c206f7220636f6d70616e792c20612076657279206265737420736f6c7574696f6e7320616e64207765206c6f6f6b20666f727761726420746f2068617665206368616e63652064697363757373696f6e206f75722070726f706f73616c207769746820796f7520617420616e79206f6620796f757220636f6e76656e69656e742074696d652e3c6272202f3e0d0a3c6272202f3e0d0a5357532069732065717569707065642077697468206d6f6465726e20495420666163696c697469657320616e64206869676820736b696c6c207374616666732066726f6d207265636f676e697a656420495420656475636174696f6e616c2063656e746572732e204f7572207465616d206d656d626572732061726520667269656e646c792c20636f6f706572617469766520616e642077652061726520636f6d6d697474656420746f2070726f7669646520266c6471756f3b4e6f20436f6d706c61696e656420536572766963657326726471756f3b20746f20636c69656e74732e20576520617373757265206f757220636c69656e74732074686174207468657265206973206e6f20616e7920617474656d707420746f206c6f636b207468656972207075726368617365642070726f6475637473206f7220736572766963657320776974682075732e3c6272202f3e0d0a3c6272202f3e0d0a4f555220564953494f4e3c6272202f3e0d0a3c6272202f3e0d0a4f7572206d61696e20766973696f6e20697320746f2070726f76696465206120726f6275737420776562206261736564207365727669636520746f20616c6c206b696e64206f6620636f6d70616e6965732c206f7267616e697a6174696f6e732c20676f7665726e6d656e74616c20696e737469747574696f6e732c20616e64206576656e20706572736f6e616c2062656c6f6e676564207374756666732e204d6f72656f7665722c20746865206c6f77657220707269636520616e6420686967686572207365727669636520706572666f726d616e636520616e6420666561747572657320617265207374726f6e676c792070726f766964656420696e2065616368206f66206f757220686f7374696e6720706c616e20616e642073657276696365732e3c6272202f3e0d0a3c6272202f3e0d0a4f5552204d495353494f4e3c6272202f3e0d0a3c6272202f3e0d0a546f2070726f7669646520616c6c20706f737369626c65207765622d6261736520736f6c7574696f6e2073657276696365207769746820686967686c7920746563686e6f6c6f6779206174206166666f726461626c6520636f737420666f7220616c6c20637573746f6d6572732c20616e6420746f206d61696e7461696e2068696768206c6576656c206f6620736174697366616374696f6e20666f7220616c6c206f66206f7572207374616b65686f6c646572732e3c6272202f3e0d0a3c6272202f3e0d0a4f555220474f414c533c6272202f3e0d0a3c6272202f3e0d0a546f2070726f7669646520612068696768207175616c697479202873656375726974792c2072656c696162696c6974792c20666c65786962696c6974792c20616e64206163636573736962696c69747929206f66207468652073657276696365207769746820726561736f6e61626c6520707269636520696e2043616d626f64696120636f6d7065746974697665206d61726b65742c20616e642061747461696e20612077656c6c207072616973656420637573746f6d657220736572766963657320666f72206c6f6e67207465726d20737563636573732e3c6272202f3e0d0a3c6272202f3e0d0a4f555220434f524520434f4d504554454e43593c6272202f3e0d0a3c6272202f3e0d0a535753206973207374726976696e6720746f2061747461696e2074686520666f6c6c6f77696e6720636f6d706574656e6369657320696e206f7264657220746f206d6565742074686520637573746f6d657226727371756f3b73206e65656420616e642077616e742e3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b2052656c696162696c6974793c6272202f3e0d0a266e6273703b266e6273703b266e6273703b2053656375726974793c6272202f3e0d0a266e6273703b266e6273703b266e6273703b20466c65786962696c69747920616e643c6272202f3e0d0a266e6273703b266e6273703b266e6273703b204163636573736962696c6974793c6272202f3e0d0a3c6272202f3e0d0a4f5552204d454d424552533c6272202f3e0d0a3c6272202f3e0d0a416c6c206d656d62657273206172652073656c6563746564206361726566756c6c7920746f2062652061626c6520746f2068616e646c6520616c6c2061737369676e6564207461736b732e2053657276696e672057656220536f6c7574696f6e2073656c65637473206f6e6c79206365727469666965642049542070726f66657373696f6e616c20736b696c6c656420706572736f6e7320746f20626520696e206f7572207465616d2e204f7572206d656d62657273206172652066726f6d20646966666572656e7420736f75726365732066726f6d20556e697665727369746965732c207072697661746520636f6d70616e69657320616e64206f7468657220686967682070726f66696c6520746563686e6f6c6f6779206f7267616e697a6174696f6e207769746820616465717561746520657870657269656e6365732e3c6272202f3e0d0a3c6272202f3e0d0a4f555220544543484e4f4c4f47593c6272202f3e0d0a3c6272202f3e0d0a426563617573652074686520496e7465726e657420546563686e6f6c6f67792069732067726f77696e67206661737420646179206279206461792c20536572766572696e672057656220536f6c7574696f6e20697320686572652077697468206869676820657175697070656420746563686e6f6c6f677920746f206f7572207374616666732c206f7572206f7065726174696f6e616c206571756970656d656e7420616e642073657276696365732c2070726f766964656420746f20656e737572652074686520657175616c697479206f6620746563686e6f6c6f677920616e64206164646974696f6e616c6c7920746f20656c656d696e61746520746865206c696d69746174696f6e206f66206469676974616c2064697669646564206265747765656e206c6f772070726f66696c6520746563686e6f6c6f677920636f756e747279206c696b652043414d424f44494120696e746f20636f6d70657469746976652077697468206f74686572206f6e207468652072657374206f662074686520776f726c642e3c6272202f3e0d0a3c6272202f3e0d0a4f75722065787065727469736520696e2074686520646576656c6f706d656e74206361706162696c69747920697320746f20646576656c6f70206e657720637573746f6d697a6564206170706c69636174696f6e2c2075706461746520616e6420656e68616e6365206578697374696e67206170706c69636174696f6e2c20616e6420616c736f20696e746567726174652c20616e64206d69677261746520746865206170706c69636174696f6e20636f6e736f6c69646174696f6e2e3c6272202f3e0d0a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b204f7572204578706572746973653a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2053575326727371756f3b7320434d532028436f6e74656e74204d616e6167656d656e742053797374656d293c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20576f72642050726573732028637573746f6d697a6174696f6e293c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204a6f6f6d6c613c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2044727570616c3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204d6167656e746f3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b205a656e5f636172743c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204f535f636f6d6d657263653c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b204f757220546563686e6f6c6f677920666f7220576562204170706c69636174696f6e3a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b207068703c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b206d7973716c3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20666c6173683c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20666c65783c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b206a71756572793c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b206d6f6f746f6f6c3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20616a617a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b20546563686e6f6c6f677920666f7220536f667477617265204170706c69636174696f6e3a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204d792053514c205365727665723c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204d732056697375616c2053747564696f3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204d732056697375616c2053747564696f202e4e65743c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b204372797374616c205265706f72743c6272202f3e0d0a3c6272202f3e0d0a3c6272202f3e0d0a4f757220686f7374696e672073657276696365206973206261736564206f6e20746872656520646966666572656e74207365727665727320746563686e6f6c6f677920616e64206576656e206c6f636174656420696e20746872656520646966666572656e7420737461746573206f66205553412e3c6272202f3e0d0a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b2057696e646f7720486f7374696e6720446174612043656e7465723a205465786173202d2044616c6c6173202d20546865706c616e65742e636f6d20496e7465726e657420536572766963657320496e6320616e64204c61796572536f667420446174612043656e7465723c6272202f3e0d0a266e6273703b266e6273703b266e6273703b204c696e757820486f7374696e6720446174612043656e7465722031203a2043616c69666f726e696120266e646173683b2044616e6120506f696e7420266e646173683b204e6574776f726b20446174612043656e74657220486f737420496e633c6272202f3e0d0a266e6273703b266e6273703b266e6273703b204c696e757820486f7374696e6720446174612043656e7465722032203a266e6273703b2054656e6e657373656520266e646173683b20436f6f6b6576696c6c65202d204920506f7765722057656220696e206173736f636961746564207769746820535441524c4f4749433c6272202f3e0d0a266e6273703b266e6273703b266e6273703b20436c6f7564205365727665722043656e746572203a206c6f636174656420696e203320676c6f62616c20696e74657220636f6e74696e656e74733a3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20556e69746564205374617465206f6620416d6572696361203a2038205374617465733c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20556e69746564204b696e67646f6d203a2032206c6f636174696f6e733c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2041736961203a20626173656420696e2053696e6761706f72653c6272202f3e0d0a3c6272202f3e0d0a2d20536565206d6f72652061743a20687474703a2f2f73657276696e677765622e636f6d2f3f706167653d64657461696c26616d703b6d656e75313d3626616d703b63747970653d61727469636c6526616d703b69643d3626616d703b6c673d656e237374686173682e42493751775549432e647075663c627220747970653d225f6d6f7a22202f3e),
(3045, 'en', 'tbllocation', 'title', 83, 0x566564696f20506c61796c697374),
(3046, 'kh', 'tbllocation', 'title', 83, 0x506c61796c697374),
(3047, 'en', 'tblarticle', 'title', 478, 0x506c617931),
(3048, 'en', 'tblarticle', 'description', 478, 0x3c627220747970653d225f6d6f7a22202f3e),
(3049, 'kh', 'tblarticle', 'title', 478, ''),
(3050, 'kh', 'tblarticle', 'description', 478, 0x3c627220747970653d225f6d6f7a22202f3e),
(3051, 'en', 'tblarticle', 'title', 479, 0x506c617932),
(3052, 'en', 'tblarticle', 'description', 479, 0x3c627220747970653d225f6d6f7a22202f3e),
(3053, 'kh', 'tblarticle', 'title', 479, 0x506c617932),
(3054, 'kh', 'tblarticle', 'description', 479, 0x3c627220747970653d225f6d6f7a22202f3e),
(3055, 'en', 'tblarticle', 'title', 480, 0x506c61793331),
(3056, 'en', 'tblarticle', 'description', 480, 0x3c627220747970653d225f6d6f7a22202f3e),
(3057, 'kh', 'tblarticle', 'title', 480, ''),
(3058, 'kh', 'tblarticle', 'description', 480, 0x3c627220747970653d225f6d6f7a22202f3e),
(3059, 'en', 'tblarticle', 'title', 481, 0x506c617934),
(3060, 'en', 'tblarticle', 'description', 481, 0x3c627220747970653d225f6d6f7a22202f3e),
(3061, 'kh', 'tblarticle', 'title', 481, ''),
(3062, 'kh', 'tblarticle', 'description', 481, 0x3c627220747970653d225f6d6f7a22202f3e),
(3063, 'en', 'tblarticle', 'title', 482, 0x506c6179657235),
(3064, 'en', 'tblarticle', 'description', 482, 0x3c627220747970653d225f6d6f7a22202f3e),
(3065, 'kh', 'tblarticle', 'title', 482, 0x506c6179657235),
(3066, 'kh', 'tblarticle', 'description', 482, 0x3c627220747970653d225f6d6f7a22202f3e),
(3067, 'en', 'tblarticle', 'title', 483, 0x4e6577732026204576656e7473),
(3068, 'en', 'tblarticle', 'description', 483, 0x3c627220747970653d225f6d6f7a22202f3e),
(3069, 'kh', 'tblarticle', 'title', 483, 0xe19e96e19f8ce19e8fe19e98e19eb6e19e9320e19e93e19eb7e19e84e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8d),
(3070, 'kh', 'tblarticle', 'description', 483, 0x3c627220747970653d225f6d6f7a22202f3e),
(3071, 'en', 'tblarticle', 'title', 484, 0x546974746c65206f66207468652070726f6a656374207265666572656e6365732074657374),
(3072, 'en', 'tblarticle', 'description', 484, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f7473266e6273703b206865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f7269747920627920696e6a656374656420616d6f756e7473206f662070726f7065727479206265696e67206275696c74206f722077696c6c206275696c642c206f6e6c7920746f2066696e64206974206f666665726564206f6e2074686520706c616e6520646f6573206e6f7420636f72726573706f6e642074686520756c74696d6174652068656c642074686174206974206f66666572656420696e2062726f6368757265732d2d2d2074657374696e673c6272202f3e0d0a3c627220747970653d225f6d6f7a22202f3e),
(3073, 'kh', 'tblarticle', 'title', 484, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19e9ae19e94e19e9fe19f8be19e82e19f86e19e9ae19f84e19e84e2808b20e19e9fe19eb6e19e80e19e9be19f92e19e94e19e84),
(3074, 'kh', 'tblarticle', 'description', 484, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f7473266e6273703b206865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f7269747920627920696e6a656374656420616d6f756e7473206f662070726f7065727479206265696e67206275696c74206f722077696c6c206275696c642c206f6e6c7920746f2066696e64206974206f666665726564206f6e2074686520706c616e6520646f6573206e6f7420636f72726573706f6e642074686520756c74696d6174652068656c642074686174206974206f66666572656420696e2062726f6368757265732d2d2d3c6272202f3e0d0a3c627220747970653d225f6d6f7a22202f3e),
(3075, 'en', 'tblarticle', 'title', 485, 0x636f7079206f6620636f7079206f6620546974746c65206f66207468652070726f6a656374207265666572656e636573),
(3076, 'en', 'tblarticle', 'description', 485, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f7473266e6273703b206865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f7269747920627920696e6a656374656420616d6f756e7473206f662070726f7065727479206265696e67206275696c74206f722077696c6c206275696c642c206f6e6c7920746f2066696e64206974206f666665726564206f6e2074686520706c616e6520646f6573206e6f7420636f72726573706f6e642074686520756c74696d6174652068656c642074686174206974206f66666572656420696e2062726f6368757265732d2d2d2074657374696e673c6272202f3e5c725c6e3c627220747970653d5c225f6d6f7a5c22202f3e),
(3077, 'kh', 'tblarticle', 'title', 485, 0x636f7079206f6620636f7079206f6620e19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19e9ae19e94e19e9fe19f8be19e82e19f86e19e9ae19f84e19e84),
(3078, 'kh', 'tblarticle', 'description', 485, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f7473266e6273703b206865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f7269747920627920696e6a656374656420616d6f756e7473206f662070726f7065727479206265696e67206275696c74206f722077696c6c206275696c642c206f6e6c7920746f2066696e64206974206f666665726564206f6e2074686520706c616e6520646f6573206e6f7420636f72726573706f6e642074686520756c74696d6174652068656c642074686174206974206f66666572656420696e2062726f6368757265732d2d2d3c6272202f3e5c725c6e3c627220747970653d5c225f6d6f7a5c22202f3e),
(3079, 'en', 'tblarticle', 'title', 486, 0x636f7079206f6620547469746c65206f6620736f6d652074657874206576656e7420616e64206e657773),
(3080, 'en', 'tblarticle', 'description', 486, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(3081, 'kh', 'tblarticle', 'title', 486, 0x636f7079206f6620e19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8f),
(3082, 'kh', 'tblarticle', 'description', 486, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(3083, 'en', 'tblarticle', 'title', 487, 0x636f7079206f6620536f6d652074657874206f662074686520746974746c6572206e616d65206e657773),
(3084, 'en', 'tblarticle', 'description', 487, 0x5469746c65206e65777320616e642065766e7473206f66207468652066656166676f632073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c65642d2d2d266e6273703b207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e64207420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e74203c6272202f3e0d0a5469746c65206e65777320616e642065766e7473206f66207468652066656166676f632073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c6564266e6273703b207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e64207420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e74203c6272202f3e0d0a5469746c65206e65777320616e642065766e7473206f66207468652066656166676f632073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c6564266e6273703b207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e64207420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e74203c627220747970653d225f6d6f7a22202f3e),
(3085, 'kh', 'tblarticle', 'title', 487, 0x636f7079206f6620636f7079206f6620e19e85e19f86e19e8ee19e84e19f8be19e87e19ebee19e8420e19ea2e19f86e19e96e19eb8e2808b20e19e96e19f92e19e9ae19eb9e19e8fe19f92e19e8fe19eb7e19e80e19eb6e19e9ae19e8ee19f8f),
(3086, 'kh', 'tblarticle', 'description', 487, 0x436f6e7472617279746f20706f70756c61722062656c6965662c2073696d706c792072616e646f6d20746578742e2049742068617320726f6f74732d2d2d),
(3087, 'en', 'tbllocation', 'title', 84, 0x4f757220506172746e6572),
(3088, 'kh', 'tbllocation', 'title', 84, 0x4f757220506172746e6572),
(3089, 'en', 'tblarticle', 'title', 488, 0x6f757220706172746e657231),
(3090, 'en', 'tblarticle', 'description', 488, 0x3c627220747970653d225f6d6f7a22202f3e),
(3091, 'kh', 'tblarticle', 'title', 488, 0x6f757220706172746e657231),
(3092, 'kh', 'tblarticle', 'description', 488, 0x3c627220747970653d225f6d6f7a22202f3e),
(3093, 'en', 'tblarticle', 'title', 489, 0x4f757220706172746e657232),
(3094, 'en', 'tblarticle', 'description', 489, 0x3c627220747970653d225f6d6f7a22202f3e),
(3095, 'kh', 'tblarticle', 'title', 489, ''),
(3096, 'kh', 'tblarticle', 'description', 489, 0x3c627220747970653d225f6d6f7a22202f3e),
(3097, 'en', 'tblarticle', 'title', 490, 0x4f757220706172746e65723232),
(3098, 'en', 'tblarticle', 'description', 490, 0x3c627220747970653d225f6d6f7a22202f3e),
(3099, 'kh', 'tblarticle', 'title', 490, ''),
(3100, 'kh', 'tblarticle', 'description', 490, 0x3c627220747970653d225f6d6f7a22202f3e),
(3101, 'en', 'tblarticle', 'title', 491, 0x4f757220706172746e657233),
(3102, 'en', 'tblarticle', 'description', 491, 0x3c627220747970653d225f6d6f7a22202f3e),
(3103, 'kh', 'tblarticle', 'title', 491, ''),
(3104, 'kh', 'tblarticle', 'description', 491, 0x3c627220747970653d225f6d6f7a22202f3e),
(3105, 'en', 'tblarticle', 'title', 492, 0x4f757220506172746e657234),
(3106, 'en', 'tblarticle', 'description', 492, 0x3c627220747970653d225f6d6f7a22202f3e),
(3107, 'kh', 'tblarticle', 'title', 492, ''),
(3108, 'kh', 'tblarticle', 'description', 492, 0x3c627220747970653d225f6d6f7a22202f3e),
(3109, 'en', 'tblarticle', 'title', 493, 0x4f555220504152544e4552),
(3110, 'en', 'tblarticle', 'description', 493, 0x3c627220747970653d225f6d6f7a22202f3e),
(3111, 'kh', 'tblarticle', 'title', 493, 0xe19e8ae19f83e19e82e19ebce19e9a),
(3112, 'kh', 'tblarticle', 'description', 493, 0x3c627220747970653d225f6d6f7a22202f3e),
(3113, 'en', 'tblarticle', 'title', 494, 0x4f757220706172746e657236),
(3114, 'en', 'tblarticle', 'description', 494, 0x3c627220747970653d225f6d6f7a22202f3e),
(3115, 'kh', 'tblarticle', 'title', 494, ''),
(3116, 'kh', 'tblarticle', 'description', 494, 0x3c627220747970653d225f6d6f7a22202f3e),
(3117, 'en', 'tblarticle', 'title', 495, 0x446f63756d656e7420446f776e6c6f616473),
(3118, 'en', 'tblarticle', 'description', 495, 0x3c627220747970653d225f6d6f7a22202f3e),
(3119, 'kh', 'tblarticle', 'title', 495, 0xe19e91e19eb6e19e89e19e99e19e80e19eafe19e80e19e9fe19eb6e19e9a),
(3120, 'kh', 'tblarticle', 'description', 495, 0x3c627220747970653d225f6d6f7a22202f3e),
(3121, 'en', 'tbldocument', 'title', 13, 0x636f7079206f6620646667646667),
(3122, 'en', 'tbldocument', 'author', 13, 0x646764676467),
(3123, 'en', 'tbldocument', 'publisher', 13, ''),
(3124, 'en', 'tbldocument', 'description', 13, 0x3c627220747970653d225f6d6f7a22202f3e),
(3125, 'kh', 'tbldocument', 'title', 13, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89),
(3126, 'kh', 'tbldocument', 'author', 13, ''),
(3127, 'kh', 'tbldocument', 'publisher', 13, ''),
(3128, 'kh', 'tbldocument', 'description', 13, 0x3c627220747970653d225f6d6f7a22202f3e),
(3129, 'en', 'tbldocument', 'file_name', 13, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3130, 'kh', 'tbldocument', 'file_name', 13, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3131, 'en', 'tbldocument', 'title', 14, 0x636f7079206f6620636f7079206f6620646667646667),
(3132, 'en', 'tbldocument', 'author', 14, 0x646764676467),
(3133, 'en', 'tbldocument', 'publisher', 14, ''),
(3134, 'en', 'tbldocument', 'description', 14, 0x3c627220747970653d225f6d6f7a22202f3e),
(3135, 'kh', 'tbldocument', 'title', 14, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89),
(3136, 'kh', 'tbldocument', 'author', 14, ''),
(3137, 'kh', 'tbldocument', 'publisher', 14, ''),
(3138, 'kh', 'tbldocument', 'description', 14, 0x3c627220747970653d225f6d6f7a22202f3e),
(3139, 'en', 'tbldocument', 'file_name', 14, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3140, 'kh', 'tbldocument', 'file_name', 14, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3141, 'en', 'tbldocument', 'title', 15, 0x5265706f7274206f6620646667646667),
(3142, 'en', 'tbldocument', 'author', 15, 0x646764676467),
(3143, 'en', 'tbldocument', 'publisher', 15, ''),
(3144, 'en', 'tbldocument', 'description', 15, 0x3c627220747970653d225f6d6f7a22202f3e),
(3145, 'kh', 'tbldocument', 'title', 15, 0xe19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89),
(3146, 'kh', 'tbldocument', 'author', 15, ''),
(3147, 'kh', 'tbldocument', 'publisher', 15, ''),
(3148, 'kh', 'tbldocument', 'description', 15, 0x3c627220747970653d225f6d6f7a22202f3e),
(3149, 'en', 'tbldocument', 'file_name', 15, 0x452d7469636b655f66726f6d5f50505f746f5f4265696a696e672e706466),
(3150, 'kh', 'tbldocument', 'file_name', 15, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3151, 'en', 'tbllocation', 'title', 85, 0x47616c6c657279),
(3152, 'kh', 'tbllocation', 'title', 85, 0x47616c6c657279),
(3153, 'en', 'tblarticle', 'title', 496, 0x50686f746f2067616c6c657279),
(3154, 'en', 'tblarticle', 'description', 496, 0x3c627220747970653d225f6d6f7a22202f3e),
(3155, 'kh', 'tblarticle', 'title', 496, 0x50686f746f2067616c6c657279),
(3156, 'kh', 'tblarticle', 'description', 496, 0x3c627220747970653d225f6d6f7a22202f3e),
(3157, 'en', 'tblarticle', 'title', 497, 0x636f7079206f662050686f746f2067616c6c657279),
(3158, 'en', 'tblarticle', 'description', 497, 0x3c627220747970653d225f6d6f7a22202f3e),
(3159, 'kh', 'tblarticle', 'title', 497, 0x636f7079206f662050686f746f2067616c6c657279),
(3160, 'kh', 'tblarticle', 'description', 497, 0x3c627220747970653d225f6d6f7a22202f3e),
(3161, 'en', 'tblarticle', 'title', 498, 0x70686f746f3031),
(3162, 'en', 'tblarticle', 'description', 498, 0x3c627220747970653d225f6d6f7a22202f3e),
(3163, 'kh', 'tblarticle', 'title', 498, ''),
(3164, 'kh', 'tblarticle', 'description', 498, 0x3c627220747970653d225f6d6f7a22202f3e),
(3165, 'en', 'tblarticle', 'title', 499, 0x70686f746f3032),
(3166, 'en', 'tblarticle', 'description', 499, 0x3c627220747970653d225f6d6f7a22202f3e),
(3167, 'kh', 'tblarticle', 'title', 499, ''),
(3168, 'kh', 'tblarticle', 'description', 499, 0x3c627220747970653d225f6d6f7a22202f3e),
(3169, 'en', 'tblarticle', 'title', 500, 0x686f746f3033),
(3170, 'en', 'tblarticle', 'description', 500, 0x3c627220747970653d225f6d6f7a22202f3e),
(3171, 'kh', 'tblarticle', 'title', 500, ''),
(3172, 'kh', 'tblarticle', 'description', 500, 0x3c627220747970653d225f6d6f7a22202f3e),
(3173, 'en', 'tblarticle', 'title', 501, 0x416c62756d2033),
(3174, 'en', 'tblarticle', 'description', 501, 0x3c627220747970653d225f6d6f7a22202f3e),
(3175, 'kh', 'tblarticle', 'title', 501, ''),
(3176, 'kh', 'tblarticle', 'description', 501, 0x3c627220747970653d225f6d6f7a22202f3e),
(3177, 'en', 'tblarticle', 'title', 502, 0x50686f746f2047616c6c657279),
(3178, 'en', 'tblarticle', 'description', 502, 0x3c627220747970653d225f6d6f7a22202f3e),
(3179, 'kh', 'tblarticle', 'title', 502, 0xe19e94e19e8ee19f92e19e8fe19ebbe19f86e19e9ae19ebce19e94e19e97e19eb6e19e96),
(3180, 'kh', 'tblarticle', 'description', 502, 0x3c627220747970653d225f6d6f7a22202f3e),
(3181, 'en', 'tblarticle', 'title', 503, 0x416c62756d31),
(3182, 'en', 'tblarticle', 'description', 503, 0x3c627220747970653d225f6d6f7a22202f3e),
(3183, 'kh', 'tblarticle', 'title', 503, ''),
(3184, 'kh', 'tblarticle', 'description', 503, 0x3c627220747970653d225f6d6f7a22202f3e);
INSERT INTO `tbltranslate` (`t_id`, `language_code`, `table_ref`, `field_ref`, `id_ref`, `translate`) VALUES
(3185, 'en', 'tblgallery', 'title', 19, 0x67616c6c65727931),
(3186, 'kh', 'tblgallery', 'title', 19, 0x67616c6c65727931),
(3187, 'en', 'tblarticle', 'title', 504, 0x486f6d65),
(3188, 'en', 'tblarticle', 'description', 504, 0x3c627220747970653d225f6d6f7a22202f3e),
(3189, 'kh', 'tblarticle', 'title', 504, 0xe19e91e19f86e19e96e19f90e19e9ae19e8ae19ebee19e98),
(3190, 'kh', 'tblarticle', 'description', 504, 0x3c627220747970653d225f6d6f7a22202f3e),
(3191, 'en', 'tbllocation', 'title', 86, 0x5368617265),
(3192, 'kh', 'tbllocation', 'title', 86, 0x5368617265),
(3193, 'en', 'tblarticle', 'title', 505, 0x66616365626f6f6b),
(3194, 'en', 'tblarticle', 'description', 505, 0x3c627220747970653d225f6d6f7a22202f3e),
(3195, 'kh', 'tblarticle', 'title', 505, 0x66616365626f6f6b),
(3196, 'kh', 'tblarticle', 'description', 505, 0x3c627220747970653d225f6d6f7a22202f3e),
(3197, 'en', 'tblarticle', 'title', 506, 0x747769746572),
(3198, 'en', 'tblarticle', 'description', 506, 0x3c627220747970653d225f6d6f7a22202f3e),
(3199, 'kh', 'tblarticle', 'title', 506, 0x747769746572),
(3200, 'kh', 'tblarticle', 'description', 506, 0x3c627220747970653d225f6d6f7a22202f3e),
(3201, 'en', 'tblarticle', 'title', 507, 0x727373),
(3202, 'en', 'tblarticle', 'description', 507, 0x3c627220747970653d225f6d6f7a22202f3e),
(3203, 'kh', 'tblarticle', 'title', 507, 0x727373),
(3204, 'kh', 'tblarticle', 'description', 507, 0x3c627220747970653d225f6d6f7a22202f3e),
(3205, 'en', 'tblarticle', 'title', 508, 0x796f7574756265),
(3206, 'en', 'tblarticle', 'description', 508, 0x3c627220747970653d225f6d6f7a22202f3e),
(3207, 'kh', 'tblarticle', 'title', 508, 0x636f7079206f6620727373),
(3208, 'kh', 'tblarticle', 'description', 508, 0x3c627220747970653d225f6d6f7a22202f3e),
(3209, 'en', 'tblarticle', 'title', 509, 0x676f6f676c65706c7573),
(3210, 'en', 'tblarticle', 'description', 509, 0x3c627220747970653d225f6d6f7a22202f3e),
(3211, 'kh', 'tblarticle', 'title', 509, ''),
(3212, 'kh', 'tblarticle', 'description', 509, 0x3c627220747970653d225f6d6f7a22202f3e),
(3213, 'en', 'tblarticle', 'title', 510, 0x5368617265),
(3214, 'en', 'tblarticle', 'description', 510, 0x3c627220747970653d225f6d6f7a22202f3e),
(3215, 'kh', 'tblarticle', 'title', 510, ''),
(3216, 'kh', 'tblarticle', 'description', 510, 0x3c627220747970653d225f6d6f7a22202f3e),
(3217, 'en', 'tblarticle', 'title', 511, 0x4d414b45204120444f4e4154494f4e20544f2046454146474f432e),
(3218, 'en', 'tblarticle', 'description', 511, 0x3c627220747970653d225f6d6f7a22202f3e),
(3219, 'kh', 'tblarticle', 'title', 511, 0x4d414b45204120444f4e4154494f4e20544f2046454146474f432e),
(3220, 'kh', 'tblarticle', 'description', 511, 0x3c627220747970653d225f6d6f7a22202f3e),
(3221, 'en', 'tblarticle', 'title', 512, 0x54797065e2808be2808be2808be2808b203a),
(3222, 'en', 'tblarticle', 'description', 512, 0x3c627220747970653d225f6d6f7a22202f3e),
(3223, 'kh', 'tblarticle', 'title', 512, 0xe19e94e19f92e19e9ae19e97e19f81e19e91e19f88),
(3224, 'kh', 'tblarticle', 'description', 512, 0x3c627220747970653d225f6d6f7a22202f3e),
(3225, 'en', 'tblarticle', 'title', 513, 0x5061796d656e74e2808be2808b203a),
(3226, 'en', 'tblarticle', 'description', 513, 0x3c627220747970653d225f6d6f7a22202f3e),
(3227, 'kh', 'tblarticle', 'title', 513, 0xe19e85e19f86e19e8ee19eb6e19e99),
(3228, 'kh', 'tblarticle', 'description', 513, 0x3c627220747970653d225f6d6f7a22202f3e),
(3229, 'en', 'tblarticle', 'title', 514, 0x53706f6e736f7273686970),
(3230, 'en', 'tblarticle', 'description', 514, 0x3c627220747970653d225f6d6f7a22202f3e),
(3231, 'kh', 'tblarticle', 'title', 514, 0xe19e9fe19e98e19eb6e19e87e19eb7e19e80e19ea9e19e94e19e8fe19f92e19e90e19e98),
(3232, 'kh', 'tblarticle', 'description', 514, 0x3c627220747970653d225f6d6f7a22202f3e),
(3233, 'en', 'tblarticle', 'title', 515, 0x506572736f6e616c),
(3234, 'en', 'tblarticle', 'description', 515, 0x3c627220747970653d225f6d6f7a22202f3e),
(3235, 'kh', 'tblarticle', 'title', 515, 0xe19e95e19f92e19e91e19eb6e19e9be19f8be19e81e19f92e19e9be19ebce19e93),
(3236, 'kh', 'tblarticle', 'description', 515, 0x3c627220747970653d225f6d6f7a22202f3e),
(3237, 'en', 'tblarticle', 'title', 516, 0x526567756c6172),
(3238, 'en', 'tblarticle', 'description', 516, 0x3c627220747970653d225f6d6f7a22202f3e),
(3239, 'kh', 'tblarticle', 'title', 516, 0xe19e91e19f80e19e84e19e91e19eb6e19e8fe19f8b),
(3240, 'kh', 'tblarticle', 'description', 516, 0x3c627220747970653d225f6d6f7a22202f3e),
(3241, 'en', 'tblarticle', 'title', 517, 0x4972726567756c6172),
(3242, 'en', 'tblarticle', 'description', 517, 0x3c627220747970653d225f6d6f7a22202f3e),
(3243, 'kh', 'tblarticle', 'title', 517, 0xe19e98e19eb7e19e93e19e91e19f80e19e84e19e91e19eb6e19e8fe19f8b),
(3244, 'kh', 'tblarticle', 'description', 517, 0x3c627220747970653d225f6d6f7a22202f3e),
(3245, 'en', 'tblarticle', 'title', 518, 0x43757272656e6379203a),
(3246, 'en', 'tblarticle', 'description', 518, 0x3c627220747970653d225f6d6f7a22202f3e),
(3247, 'kh', 'tblarticle', 'title', 518, 0xe19e9ae19ebce19e94e19eb7e19e99e19e9ce19e8fe19f92e19e90e19ebb),
(3248, 'kh', 'tblarticle', 'description', 518, 0x3c627220747970653d225f6d6f7a22202f3e),
(3249, 'en', 'tblarticle', 'title', 519, 0x555320446f6c6c6172),
(3250, 'en', 'tblarticle', 'description', 519, 0x3c627220747970653d225f6d6f7a22202f3e),
(3251, 'kh', 'tblarticle', 'title', 519, 0xe19e8ae19ebbe19e9be19f92e19e9be19eb6),
(3252, 'kh', 'tblarticle', 'description', 519, 0x3c627220747970653d225f6d6f7a22202f3e),
(3253, 'en', 'tblarticle', 'title', 520, 0x5545524f),
(3254, 'en', 'tblarticle', 'description', 520, 0x3c627220747970653d225f6d6f7a22202f3e),
(3255, 'kh', 'tblarticle', 'title', 520, 0xe19e99e19ebce19e9ae19f89e19ebc),
(3256, 'kh', 'tblarticle', 'description', 520, 0x3c627220747970653d225f6d6f7a22202f3e),
(3257, 'en', 'tblarticle', 'title', 521, 0x446f6e6574),
(3258, 'en', 'tblarticle', 'description', 521, 0x3c6469763e3c7370616e207374796c653d22666f6e742d73697a653a20313470783b223e3c623e446f6e6174652064656372697074696f6e3c2f623e3c2f7370616e3e3c6272202f3e0d0a506c6564676520746f206f757220646f6e6f72733c6272202f3e0d0a417365616e204469736162696c69747920666f72756d20697320636f6d6d697474656420746f2068656c7020796f7520686176652074686520677265617465737420696d7061637420706f737369626c652e205768656e20796f75206d616b65206120646f6e6174696f6e20746f20417365616e204469736162696c69747920666f72756d2c2077652070726f6d69736520746f3a3c6272202f3e0d0a3c6272202f3e0d0a266e6273703b3c7370616e207374796c653d22636f6c6f723a207267622835312c2035312c20313533293b223e2055736520796f7572206769667420696e20746865206d6f7374206566666563746976652077617920706f737369626c652e3c6272202f3e0d0a266e6273703b20547265617420796f75207265737065637466756c6c792c2061636b6e6f776c656467652074686520696d706f7274616e6365206f6620796f7572206769667420616e64207468652076616c7565206f6620796f757220737570706f72742e2057652077696c6c2070726f6d70746c792061636b6e6f776c6564676520616c6c20646f6e6174696f6e733c6272202f3e0d0a266e6273703b20526573706f6e6420717569636b6c7920616e642070726f66657373696f6e616c6c7920746f20616c6c20726571756573747320666f72207370656369616c2068616e646c696e67206f66206f757220636f6d6d756e69636174696f6e73207769746820796f752e20596f75206d6179206f7074206f7574206f66206f7572206d61696c696e67206c69737420617420616e792074696d652e3c6272202f3e0d0a266e6273703b205075626c69736820612073756d6d617279206f66206f75722066696e616e6369616c2073746174656d656e7420696e206f757220616e6e75616c207265706f72742c20617661696c61626c65206f6e6c696e6520616e64206279206d61696c206f6e20726571756573742e3c6272202f3e0d0a266e6273703b204b65657020796f757220696e666f726d6174696f6e20636f6e666964656e7469616c2c2077652077696c6c206e6f742073656c6c206f7220736861726520796f757220706572736f6e616c20696e666f726d6174696f6e207769746820616e79206f74686572206f7267616e697a6174696f6e2e2057652077696c6c20686f6e6f7220746865207072697661637920706f6c69637920706f73746564206f6e206f757220776562736974652e3c2f7370616e3e3c6272202f3e0d0a266e6273703b266e6273703b266e6273703b266e6273703b2057652077656c636f6d6520796f7572207175657374696f6e7320616e6420636f6d6d656e74732e20466f72206d6f726520696e666f726d6174696f6e206f6e20616e79206f6620746865206974656d732061626f76652c206f7220696620796f752068617665207175657374696f6e732061626f7574206f75722066696e616e636573206f7220796f757220646f6e6174696f6e2c20706c6561736520636f6e746163743c2f6469763e),
(3259, 'kh', 'tblarticle', 'title', 521, ''),
(3260, 'kh', 'tblarticle', 'description', 521, 0x3c627220747970653d225f6d6f7a22202f3e),
(3261, 'en', 'tblgallery', 'title', 20, 0x67616c6c657279312070686f746f31),
(3262, 'kh', 'tblgallery', 'title', 20, 0x67616c6c657279312070686f746f31),
(3263, 'en', 'tblarticle', 'title', 522, 0x416d6f756e74e2808b203a),
(3264, 'en', 'tblarticle', 'description', 522, 0x3c627220747970653d225f6d6f7a22202f3e),
(3265, 'kh', 'tblarticle', 'title', 522, 0xe19e85e19f86e19e93e19ebce19e93203a),
(3266, 'kh', 'tblarticle', 'description', 522, 0x3c627220747970653d225f6d6f7a22202f3e),
(3267, 'en', 'tblgallery', 'title', 21, 0x566973697420303031),
(3268, 'kh', 'tblgallery', 'title', 21, 0x566973697420303031),
(3269, 'en', 'tblarticle', 'title', 523, 0x416c62756d2034),
(3270, 'en', 'tblarticle', 'description', 523, 0x3c627220747970653d225f6d6f7a22202f3e),
(3271, 'kh', 'tblarticle', 'title', 523, ''),
(3272, 'kh', 'tblarticle', 'description', 523, 0x3c627220747970653d225f6d6f7a22202f3e),
(3273, 'en', 'tblgallery', 'title', 22, 0x4b686d6572206e65772079656172),
(3274, 'kh', 'tblgallery', 'title', 22, 0x4b686d6572206e65772079656172),
(3275, 'en', 'tblgallery', 'title', 23, 0x696d61676520766973697420616e676b6f7220776174),
(3276, 'kh', 'tblgallery', 'title', 23, 0x696d61676520766973697420616e676b6f7220776174),
(3277, 'en', 'tblgallery', 'title', 24, 0x496d61676520303035),
(3278, 'kh', 'tblgallery', 'title', 24, 0x496d61676520303035),
(3279, 'en', 'tblarticle', 'title', 524, 0x636f7079206f6620506c6179657235),
(3280, 'en', 'tblarticle', 'description', 524, 0x3c627220747970653d225f6d6f7a22202f3e),
(3281, 'kh', 'tblarticle', 'title', 524, 0x636f7079206f6620506c6179657235),
(3282, 'kh', 'tblarticle', 'description', 524, 0x3c627220747970653d225f6d6f7a22202f3e),
(3283, 'en', 'tblarticle', 'title', 525, 0x5469746c65206c617465737420746865206f75722070726f6a6563742061727469636c6573206f662074686520776562736974652063656e74757269657320616c736f20746865206c617374206576656e74732e),
(3284, 'en', 'tblarticle', 'description', 525, 0x4f75722070726f6a656374206f6620746865266e6273703b2061727469636c6573206f6e6c792074686520666976652063656e7475726965732c206275742074726f6e69632074797065736574696e672c266e6273703b206165737365616e7469616c6c79207269736564266e6273703b207075626c697368696e672e2e2e2d2d2d3c627220747970653d225f6d6f7a22202f3e),
(3285, 'kh', 'tblarticle', 'title', 525, 0x5469746c65206c617465737420746865206f75722070726f6a6563742061727469636c6573206f662074686520776562736974652063656e74757269657320616c736f20746865206c617374206576656e74732e),
(3286, 'kh', 'tblarticle', 'description', 525, 0x3c627220747970653d225f6d6f7a22202f3e),
(3287, 'en', 'tblarticle', 'title', 526, 0x5469746c65206c617465737420746865206f75722070726f6a6563742061727469636c6573206f662074686520776562736974652063656e74757269657320616c736f20746865206c617374206576656e7473312e),
(3288, 'en', 'tblarticle', 'description', 526, 0x4f75722070726f6a656374206f6620746865266e6273703b2061727469636c6573206f6e6c792074686520666976652063656e7475726965732c206275742074726f6e69632074797065736574696e672c266e6273703b206165737365616e7469616c6c79207269736564266e6273703b207075626c697368696e672e2e2e2d2d2d3c627220747970653d225f6d6f7a22202f3e),
(3289, 'kh', 'tblarticle', 'title', 526, 0x5469746c65206c617465737420746865206f75722070726f6a6563742061727469636c6573206f662074686520776562736974652063656e74757269657320616c736f20746865206c617374206576656e74732e),
(3290, 'kh', 'tblarticle', 'description', 526, 0x3c627220747970653d225f6d6f7a22202f3e),
(3291, 'en', 'tbldocument', 'title', 16, 0x636f7079206f66205265706f7274206f6620646667646667),
(3292, 'en', 'tbldocument', 'author', 16, 0x646764676467),
(3293, 'en', 'tbldocument', 'publisher', 16, ''),
(3294, 'en', 'tbldocument', 'description', 16, 0x3c627220747970653d225f6d6f7a22202f3e),
(3295, 'kh', 'tbldocument', 'title', 16, 0x636f7079206f6620e19e85e19f86e19e8ee19e84e19e87e19ebee19e84e19eafe19e80e19e9fe19eb6e19e9ae19e9fe19f86e19e9ae19eb6e19e94e19f8be19e91e19eb6e19e89),
(3296, 'kh', 'tbldocument', 'author', 16, ''),
(3297, 'kh', 'tbldocument', 'publisher', 16, ''),
(3298, 'kh', 'tbldocument', 'description', 16, 0x3c627220747970653d225f6d6f7a22202f3e),
(3299, 'en', 'tbldocument', 'file_name', 16, 0x452d7469636b655f66726f6d5f50505f746f5f4265696a696e672e706466),
(3300, 'kh', 'tbldocument', 'file_name', 16, 0x4572726f7221212046696c65206e6f7420616c6c6f772e),
(3301, 'en', 'tblarticle', 'title', 527, 0x5768617420576520446f),
(3302, 'en', 'tblarticle', 'description', 527, 0x556e646572636f6e737472756374696f6e213c627220747970653d225f6d6f7a22202f3e),
(3303, 'kh', 'tblarticle', 'title', 527, ''),
(3304, 'kh', 'tblarticle', 'description', 527, 0xe19e80e19f86e19e96e19ebbe19e84e19e9fe19f92e19e90e19eb6e19e94e19e93e19eb63c627220747970653d225f6d6f7a22202f3e),
(3305, 'en', 'tblarticle', 'title', 528, 0x5669657720616c6c),
(3306, 'en', 'tblarticle', 'description', 528, 0x3c627220747970653d225f6d6f7a22202f3e),
(3307, 'kh', 'tblarticle', 'title', 528, 0xe19e94e19e84e19f92e19ea0e19eb6e19e89e19e91e19eb6e19f86e19e84e19ea2e19e9fe19f8b),
(3308, 'kh', 'tblarticle', 'description', 528, 0x3c627220747970653d225f6d6f7a22202f3e),
(3309, 'en', 'tblarticle', 'title', 529, 0x4e6574776f726b20536861726573),
(3310, 'en', 'tblarticle', 'description', 529, 0x46696e64207765207573206163637573616d757320657420697573746f206f64696f206469676e697373696d6f7320647563696d75732071756920626c616e646974696973207072616573656e7469756d206163637573616d75732e3c627220747970653d225f6d6f7a22202f3e),
(3311, 'kh', 'tblarticle', 'title', 529, 0x4e6574776f726b20536861726573),
(3312, 'kh', 'tblarticle', 'description', 529, 0x46696e64207765207573206163637573616d757320657420697573746f206f64696f206469676e697373696d6f7320647563696d75732071756920626c616e646974696973207072616573656e7469756d206163637573616d75732e3c627220747970653d225f6d6f7a22202f3e),
(3313, 'en', 'tbllocation', 'title', 87, 0x4e6574776f726b20536861726573204c696e6b),
(3314, 'kh', 'tbllocation', 'title', 87, 0x4e6574776f726b20536861726573204c696e6b),
(3315, 'en', 'tblarticle', 'title', 530, 0x46696e64207573206f6e20466163626f6f6b),
(3316, 'en', 'tblarticle', 'description', 530, 0x3c627220747970653d225f6d6f7a22202f3e),
(3317, 'kh', 'tblarticle', 'title', 530, 0x46696e64207573206f6e20466163626f6f6b),
(3318, 'kh', 'tblarticle', 'description', 530, 0x3c627220747970653d225f6d6f7a22202f3e),
(3319, 'en', 'tblarticle', 'title', 531, 0x46696e64207573206f6e20476f6f676c652b),
(3320, 'en', 'tblarticle', 'description', 531, 0x3c627220747970653d225f6d6f7a22202f3e),
(3321, 'kh', 'tblarticle', 'title', 531, 0x46696e64207573206f6e20476f6f676c652b),
(3322, 'kh', 'tblarticle', 'description', 531, 0x3c627220747970653d225f6d6f7a22202f3e),
(3323, 'en', 'tblarticle', 'title', 532, 0x46696e64207573206f6e2054776974746572),
(3324, 'en', 'tblarticle', 'description', 532, 0x3c627220747970653d225f6d6f7a22202f3e),
(3325, 'kh', 'tblarticle', 'title', 532, 0x46696e64207573206f6e2054776974746572),
(3326, 'kh', 'tblarticle', 'description', 532, 0x3c627220747970653d225f6d6f7a22202f3e),
(3327, 'en', 'tblarticle', 'title', 533, 0x46696e64207573206f6e20596f7554756265),
(3328, 'en', 'tblarticle', 'description', 533, 0x3c627220747970653d225f6d6f7a22202f3e),
(3329, 'kh', 'tblarticle', 'title', 533, 0x46696e64207573206f6e20596f7554756265),
(3330, 'kh', 'tblarticle', 'description', 533, 0x3c627220747970653d225f6d6f7a22202f3e),
(3331, 'en', 'tblarticle', 'title', 534, 0x56697369746f7273204e756d626572),
(3332, 'en', 'tblarticle', 'description', 534, 0x3c627220747970653d225f6d6f7a22202f3e),
(3333, 'kh', 'tblarticle', 'title', 534, 0xe19e85e19f86e19e93e19ebde19e93e19ea2e19f92e19e93e19e80e19e91e19e9fe19f92e19e9fe19e93e19eb6),
(3334, 'kh', 'tblarticle', 'description', 534, 0x3c627220747970653d225f6d6f7a22202f3e),
(3335, 'en', 'tblarticle', 'title', 535, 0x666f6f7465722041646472657373),
(3336, 'en', 'tblarticle', 'description', 535, 0x4164643a204e6f2e3341456f2c20537472656574203233302c2053616e676b6174205068736172646f65756d6b6f722c204b68616e20546f756c204b6f6b2c2050686e6f6d2050656e682c2043414d424f4449412e3c6272202f3e0d0a54656c3a202b3835352d323320383835353130202f204661783a202b3835352d32332038383520363930202f20452d6d61696c3a20696e666f4073657276696e677765622e636f6d202f2073616c65734073657276696e677765622e636f6d3c627220747970653d225f6d6f7a22202f3e),
(3337, 'kh', 'tblarticle', 'title', 535, 0xe19ea2e19eb6e19e9fe19f90e19e99e19e8ae19f92e19e8be19eb6e19e93),
(3338, 'kh', 'tblarticle', 'description', 535, 0x3c627220747970653d225f6d6f7a22202f3e);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` tinytext NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_level` int(11) NOT NULL,
  `permission_allows` text NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `userid`, `username`, `password`, `email`, `user_level`, `permission_allows`, `user_status`, `recycle`, `ip_address`, `add_date`, `edit_date`, `delete_date`) VALUES
(1, '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'n.bunny@servingweb.com', 1, '', 'enable', 'no', '127.0.0.1', '2011-06-06 08:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_level`
--

CREATE TABLE IF NOT EXISTS `tbluser_level` (
  `user_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) NOT NULL,
  `tag` tinytext NOT NULL,
  `description` text NOT NULL,
  `level_status` varchar(10) NOT NULL,
  `recycle` varchar(10) NOT NULL,
  PRIMARY KEY (`user_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbluser_level`
--

INSERT INTO `tbluser_level` (`user_level`, `level`, `tag`, `description`, `level_status`, `recycle`) VALUES
(1, 'Top  Admin', 'tag', 'This user could do every thing', 'enable', ''),
(2, 'Sub Admin', '', '', 'enable', ''),
(3, 'Accountant', '', '', 'enable', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_login`
--

CREATE TABLE IF NOT EXISTS `tbluser_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` tinytext NOT NULL,
  `sec` tinytext NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=549 ;

--
-- Dumping data for table `tbluser_login`
--

INSERT INTO `tbluser_login` (`id`, `userid`, `sec`, `log_date`) VALUES
(1, 'w+zS0ac=', '76pynwr2w+zS0ac=', '2011-05-05 17:34:17'),
(2, 'w+zS0ac=', '1sf6rtv9w+zS0ac=', '2011-05-06 10:24:27'),
(3, 'w+zS0ac=', 'r41xnvbhw+zS0ac=', '2011-05-06 10:28:01'),
(4, 'w+zS0ac=', 'v53z2j8nw+zS0ac=', '2011-05-06 10:28:16'),
(5, 'w+zS0ac=', '50043r1dw+zS0ac=', '2011-05-06 10:29:31'),
(6, 'w+zS0ac=', 'vygxnrj7w+zS0ac=', '2011-05-06 10:29:35'),
(10, '0+zk0pA=', 'xgkvdw0c0+zk0pA=', '2011-05-06 18:52:55'),
(11, '0+zk0pA=', 'g874zkm60+zk0pA=', '2011-05-07 10:44:38'),
(14, '0+zk0pA=', '361ncmhz0+zk0pA=', '2011-05-07 13:10:15'),
(15, '0+zk0pA=', 'kp2mqfcd0+zk0pA=', '2011-05-09 13:09:54'),
(17, '0+zk0pA=', '3f0brks20+zk0pA=', '2011-05-09 18:03:58'),
(18, '0+zk0pA=', 'p48kxtbz0+zk0pA=', '2011-05-09 18:40:44'),
(20, '0+zk0pA=', '1m365pk40+zk0pA=', '2011-05-10 13:04:27'),
(22, '0+zk0pA=', '317mhpsf0+zk0pA=', '2011-05-10 19:02:27'),
(25, '0+zk0pA=', 'zhp1mjv20+zk0pA=', '2011-05-11 13:04:05'),
(28, '0+zk0pA=', 'g4phk0qb0+zk0pA=', '2011-05-11 19:00:52'),
(29, '0+zk0pA=', 'fwdj5r7p0+zk0pA=', '2011-05-12 13:07:22'),
(31, '0+zk0pA=', '7gmw051d0+zk0pA=', '2011-05-12 17:58:57'),
(32, '0+zk0pA=', '36dbqgyc0+zk0pA=', '2011-05-16 10:15:41'),
(34, '0+zk0pA=', 'y0jqhp5z0+zk0pA=', '2011-05-16 18:02:15'),
(41, '0+zk0pA=', '6j4bn28d0+zk0pA=', '2011-05-17 19:05:43'),
(47, '0+zk0pA=', '4tpd3jm60+zk0pA=', '2011-05-18 18:57:11'),
(50, '0+zk0pA=', '9pb640250+zk0pA=', '2011-05-19 18:25:02'),
(53, '0+zk0pA=', '1v3t7djx0+zk0pA=', '2011-05-20 12:16:46'),
(55, '0+zk0pA=', '7yqd81cj0+zk0pA=', '2011-05-20 18:52:50'),
(59, '0+zk0pA=', 'b00xr5430+zk0pA=', '2011-05-21 13:33:38'),
(69, '0+zk0pA=', '38tbzh560+zk0pA=', '2011-05-22 18:25:25'),
(73, '0+zk0pA=', 'n1vbky530+zk0pA=', '2011-05-23 12:54:57'),
(74, '0+zk0pA=', 'b351mcpt0+zk0pA=', '2011-05-23 17:15:32'),
(76, '0+zk0pA=', '67hgxy2p0+zk0pA=', '2011-05-24 19:00:48'),
(77, '0+zk0pA=', 'mzyn0pw30+zk0pA=', '2011-05-25 09:54:01'),
(82, '0+zk0pA=', 'cndq5vm90+zk0pA=', '2011-05-29 12:47:03'),
(86, '0+zk0pA=', 'rysn5fmt0+zk0pA=', '2011-05-29 17:01:46'),
(89, '0+zk0pA=', 'yzp2gv5w0+zk0pA=', '2011-05-29 21:07:54'),
(92, '0+zk0pA=', '8q6w2cxv0+zk0pA=', '2011-05-30 11:55:05'),
(95, '0+zk0pA=', 'h3czwb7g0+zk0pA=', '2011-05-30 18:41:23'),
(97, '0+zk0pA=', 'k5jg3p7m0+zk0pA=', '2011-05-30 21:52:37'),
(99, '0+zk0pA=', 't6qbg8490+zk0pA=', '2011-05-31 13:10:05'),
(100, '0+zk0pA=', 'kyhmp6580+zk0pA=', '2011-05-31 13:23:55'),
(101, '0+zk0pA=', 'rp2v75mh0+zk0pA=', '2011-05-31 19:44:22'),
(103, '0+zk0pA=', 'c82gwbyr0+zk0pA=', '2011-06-01 18:16:58'),
(105, '0+zk0pA=', 'dsncxkm60+zk0pA=', '2011-06-02 18:24:02'),
(106, '0+zk0pA=', '16kbmq0d0+zk0pA=', '2011-06-03 13:02:16'),
(107, '0+zk0pA=', 'f8v4n6w30+zk0pA=', '2011-06-03 19:19:44'),
(134, '0+zk0pA=', 'xf7pscgb0+zk0pA=', '2011-06-04 20:51:22'),
(138, '5+bc5ZA=', '83cs2wz05+bc5ZA=', '2011-06-06 12:55:59'),
(139, '5+bc5ZA=', '4dks65vn5+bc5ZA=', '2011-06-06 18:20:41'),
(141, '5+bc5ZA=', '8skx56pj5+bc5ZA=', '2011-06-07 19:28:26'),
(142, '5+bc5ZA=', 'nc4dk82m5+bc5ZA=', '2011-06-08 11:46:21'),
(143, '5+bc5ZA=', '58hqmsn75+bc5ZA=', '2011-06-08 19:27:08'),
(161, 'pA==', 'th45fpy9pA==', '2011-06-09 22:42:48'),
(163, 'ow==', 'r25gy380ow==', '2011-06-10 18:44:06'),
(164, 'ow==', 'wbpht3n5ow==', '2011-06-10 22:09:37'),
(165, 'ow==', 'kt72bm6pow==', '2011-06-11 13:23:01'),
(166, 'ow==', '7qn8c4wtow==', '2011-06-11 16:18:29'),
(168, 'ow==', 'hqw3v0ctow==', '2011-06-12 12:09:49'),
(169, 'ow==', '6ps1yg48ow==', '2011-06-12 16:29:00'),
(170, 'ow==', 'r4sb3y81ow==', '2011-06-13 18:52:33'),
(171, 'ow==', 'tkxy7wrgow==', '2011-06-13 21:00:45'),
(172, 'ow==', 'v59kygjxow==', '2011-06-13 23:32:23'),
(174, 'ow==', '5qfr86zyow==', '2011-06-14 13:10:07'),
(175, 'ow==', '3vyptdc6ow==', '2011-06-14 18:19:37'),
(176, 'ow==', 'bqv973rxow==', '2011-06-14 20:57:28'),
(179, 'ow==', '9fbmtq31ow==', '2011-06-15 00:34:32'),
(180, 'ow==', '61yczbk3ow==', '2011-06-15 09:42:58'),
(182, 'ow==', 'sy86k0rhow==', '2011-06-15 12:19:57'),
(183, 'ow==', '5n21rmk7ow==', '2011-06-15 15:35:48'),
(184, 'ow==', '1v4fgkypow==', '2011-06-16 11:54:31'),
(185, 'ow==', 'xp3j5yn8ow==', '2011-06-16 15:32:59'),
(186, 'ow==', '1y02h5kvow==', '2011-06-17 19:33:24'),
(187, 'ow==', 'cp60mw24ow==', '2011-06-18 10:19:39'),
(200, 'ow==', 'bf67jwscow==', '2011-06-19 12:09:54'),
(201, 'ow==', 'wd5ykftqow==', '2011-06-20 11:08:27'),
(202, 'ow==', '693h1ktvow==', '2011-06-20 15:38:43'),
(203, 'ow==', '42wdcvjyow==', '2011-06-27 16:38:42'),
(204, 'ow==', 'n7v6mq5xow==', '2011-06-28 17:59:37'),
(205, 'ow==', '2skjvgncow==', '2011-06-29 12:00:31'),
(206, 'ow==', 'h0yt2gn8ow==', '2011-06-29 15:53:41'),
(207, 'ow==', 'pnf9zw02ow==', '2011-07-02 09:45:28'),
(208, 'ow==', 'wrdxpvqhow==', '2011-07-02 13:35:41'),
(209, 'ow==', '5sbfk1djow==', '2011-07-04 10:01:30'),
(210, 'ow==', 'qyjpxdrwow==', '2011-07-04 16:33:11'),
(211, 'ow==', 'bypn824qow==', '2011-07-05 09:38:37'),
(212, 'ow==', 'xwb74dg6ow==', '2011-07-05 17:52:08'),
(213, 'ow==', 't6czkyqhow==', '2011-07-06 12:01:04'),
(214, 'ow==', 'm87xfrc6ow==', '2011-07-07 13:05:53'),
(215, 'ow==', '31gr7vy0ow==', '2011-07-07 15:25:41'),
(216, 'ow==', 'qyg0jpdbow==', '2011-07-08 12:08:45'),
(217, 'ow==', 'rzdgtms9ow==', '2011-07-09 12:14:38'),
(218, 'ow==', 'gv01qm4how==', '2011-07-15 14:08:43'),
(219, 'ow==', '10fdvng8ow==', '2011-07-15 18:04:50'),
(220, 'ow==', 'xj5h0vpyow==', '2011-07-16 10:06:04'),
(221, 'ow==', 'mz7qnb2pow==', '2011-07-16 16:29:46'),
(222, 'ow==', 'b0m317znow==', '2011-07-18 10:15:38'),
(224, 'ow==', 'hr9vy4qjow==', '2011-07-18 17:59:15'),
(225, 'ow==', '7143v6jkow==', '2011-07-19 11:34:47'),
(227, 'ow==', 'h4qg78n0ow==', '2011-07-19 14:26:11'),
(228, 'ow==', 'j98mh425ow==', '2011-07-19 19:50:24'),
(231, 'ow==', 'vjg69shdow==', '2011-07-21 12:30:26'),
(232, 'ow==', 'x62pfc78ow==', '2011-07-21 18:23:39'),
(233, 'ow==', '0mrtw19sow==', '2011-07-22 10:47:11'),
(234, 'ow==', '8763sngzow==', '2011-07-22 11:55:43'),
(235, 'ow==', 'd1fpsyqnow==', '2011-07-22 19:35:43'),
(236, 'ow==', 'b9twdk6sow==', '2011-07-23 11:40:35'),
(238, 'ow==', 'x2t31z5sow==', '2011-07-23 14:59:22'),
(239, 'ow==', 'cjy7gh4pow==', '2011-07-25 10:04:47'),
(240, 'ow==', 'h2f3vst5ow==', '2011-07-25 10:19:46'),
(241, 'ow==', '964y1gfvow==', '2011-07-25 14:12:19'),
(242, 'ow==', 'bn85d7g6ow==', '2011-07-25 15:46:40'),
(244, 'ow==', 'jph76ftsow==', '2011-07-26 12:52:45'),
(245, 'ow==', 'fr0zncj7ow==', '2011-07-26 18:10:40'),
(246, 'ow==', 'mc2jn78fow==', '2011-07-27 18:56:05'),
(247, 'ow==', '5cbd2gn7ow==', '2011-07-28 09:48:22'),
(250, 'ow==', 'd43fj00gow==', '2011-08-01 19:31:45'),
(249, 'ow==', '7tx5dm3fow==', '2011-08-01 12:30:02'),
(253, 'ow==', 'r2bpgzvyow==', '2011-08-02 19:21:19'),
(254, 'ow==', '2j4dtqg3ow==', '2011-08-03 01:31:05'),
(255, 'ow==', 'mz9862skow==', '2011-08-03 17:39:12'),
(257, 'ow==', 'v31jmb7how==', '2011-08-04 19:36:24'),
(258, 'ow==', 'y7zd52n6ow==', '2011-08-05 16:36:55'),
(259, 'ow==', '7pv90bwqow==', '2011-08-06 14:24:57'),
(261, 'ow==', 'f3y9cg4mow==', '2011-08-08 18:18:46'),
(262, 'ow==', 'z8mdp6w7ow==', '2011-08-08 18:14:55'),
(263, 'ow==', 's02nf5prow==', '2011-08-09 12:00:42'),
(268, 'ow==', 'k3ryj268ow==', '2011-08-09 18:55:34'),
(265, 'ow==', '92wdyq6gow==', '2011-08-09 12:59:34'),
(269, 'ow==', 'g2v9zh3yow==', '2011-08-10 12:57:34'),
(270, 'ow==', 'x9pbztq2ow==', '2011-08-10 18:07:47'),
(271, 'ow==', 'xv089mrtow==', '2011-08-10 18:09:06'),
(272, 'ow==', 'nzbdpv27ow==', '2011-08-10 18:11:41'),
(273, 'ow==', '5sxwhrpnow==', '2011-08-10 18:12:10'),
(274, 'ow==', 'y3f2xc6bow==', '2011-08-10 18:27:39'),
(275, 'ow==', 'dbzqxrtsow==', '2011-08-11 00:44:32'),
(277, 'ow==', '4jkcy2mnow==', '2011-08-11 12:38:25'),
(279, 'ow==', 'w86zd0pjow==', '2011-08-11 16:03:42'),
(280, 'ow==', '3cm7jvy9ow==', '2011-08-11 19:02:06'),
(281, 'ow==', 'tyxkr8d5ow==', '2011-08-12 03:27:53'),
(282, 'ow==', 'jrn80q9fow==', '2011-08-12 10:21:01'),
(283, 'ow==', '1y06jbtpow==', '2011-08-12 11:20:36'),
(285, 'ow==', '61k2948gow==', '2011-08-12 16:39:12'),
(286, 'ow==', 'gw01bj2row==', '2011-08-12 18:40:12'),
(287, 'ow==', '175vwzpjow==', '2011-08-12 19:19:08'),
(288, 'ow==', 'gs9n251vow==', '2011-08-15 15:42:58'),
(289, 'ow==', 'czdhptxyow==', '2011-08-15 18:23:12'),
(290, 'ow==', '5sdwry6pow==', '2011-08-16 01:26:04'),
(291, 'ow==', 'w0hdxjrsow==', '2011-08-16 18:40:58'),
(293, 'ow==', 'b6j51nk4ow==', '2011-08-17 14:39:21'),
(294, 'ow==', '2zq8h56sow==', '2011-08-18 02:14:26'),
(295, 'ow==', '83n9sz1tow==', '2011-08-19 02:32:26'),
(296, 'ow==', '1bqgmyfjow==', '2011-08-19 12:00:00'),
(297, 'ow==', 'tcy064q8ow==', '2011-08-19 19:38:34'),
(298, 'ow==', '1d065ys7ow==', '2011-08-20 17:42:28'),
(299, 'ow==', 'm500v4kzow==', '2011-08-21 00:33:09'),
(300, 'ow==', 'k6gdr0ybow==', '2011-08-23 01:12:13'),
(301, 'ow==', '9xr41wk8ow==', '2011-08-23 08:08:41'),
(302, 'ow==', '36m7qyfgow==', '2011-08-26 09:00:58'),
(303, 'ow==', '1rv2pbt5ow==', '2011-08-27 22:43:26'),
(304, 'ow==', 'yk7qmzvhow==', '2011-08-29 00:25:56'),
(305, 'ow==', '87wctp5vow==', '2011-08-29 16:37:31'),
(306, 'ow==', 'pqkbhzy1ow==', '2011-09-05 19:33:05'),
(307, 'ow==', 'bd5frmw7ow==', '2011-09-06 13:33:25'),
(308, 'ow==', 'q1by6hxjow==', '2011-09-15 15:43:55'),
(309, 'ow==', '3x8gqv5kow==', '2011-09-19 17:57:34'),
(311, 'ow==', 'pg6kv74sow==', '2011-09-21 10:35:29'),
(312, 'ow==', 'pq13knm4ow==', '2011-09-21 18:01:43'),
(313, 'ow==', 'v6n71500ow==', '2011-09-22 11:47:36'),
(315, 'ow==', 'v8wc2x4how==', '2011-09-23 18:59:13'),
(316, 'ow==', '9myn0tj7ow==', '2011-09-24 03:11:29'),
(317, 'ow==', 'frnh6vbmow==', '2011-09-29 13:34:37'),
(318, 'ow==', '0ygfd2khow==', '2011-09-25 17:21:09'),
(319, 'ow==', 'nypj2d4bow==', '2011-09-26 14:57:34'),
(320, 'ow==', '9cq05xj1ow==', '2011-09-27 12:23:59'),
(321, 'ow==', 'm075bychow==', '2011-09-29 00:53:22'),
(322, 'ow==', 'd2htqgrwow==', '2011-10-13 10:37:15'),
(323, 'ow==', 'v9k6tzm0ow==', '2011-12-03 15:27:23'),
(325, 'ow==', '2p49g5kjow==', '2011-12-08 17:39:29'),
(326, 'ow==', 'm54k3nywow==', '2011-12-09 12:03:41'),
(327, 'ow==', '62q3zpv0ow==', '2011-12-09 17:37:13'),
(328, 'ow==', 'f1m3py7jow==', '2011-12-12 07:49:34'),
(330, 'ow==', 'rp3v9nf8ow==', '2011-12-12 17:03:05'),
(333, 'ow==', '7gzc2r3fow==', '2011-12-14 17:20:37'),
(334, 'ow==', 'tnf5v3d9ow==', '2011-12-14 17:45:11'),
(335, 'ow==', '83nydqcpow==', '2012-05-07 18:34:25'),
(336, 'ow==', '8xf9n4rvow==', '2012-05-09 18:33:43'),
(337, 'ow==', 'dbq480w9ow==', '2012-05-09 18:36:51'),
(338, 'ow==', 'c4gj5qxvow==', '2012-05-09 18:41:20'),
(339, 'ow==', '7v5ywbsmow==', '2012-05-09 18:45:28'),
(340, 'ow==', 'vjgty87row==', '2012-05-09 18:57:21'),
(341, 'ow==', 'bzq94vgcow==', '2012-05-11 12:58:46'),
(342, 'ow==', 'dx73tpn0ow==', '2012-05-11 18:31:45'),
(344, 'ow==', 'fh7j10q9ow==', '2012-05-22 10:41:06'),
(345, 'ow==', 'vsy6xpf2ow==', '2012-05-26 12:31:48'),
(346, 'ow==', '86409mgrow==', '2012-05-28 08:49:00'),
(347, 'ow==', '12mh6bw4ow==', '2012-06-04 16:03:33'),
(348, 'ow==', '90fr8h4zow==', '2012-06-09 09:36:21'),
(349, 'ow==', '6b2z1kpyow==', '2012-06-12 09:07:05'),
(350, 'ow==', '1qz7x2nwow==', '2012-06-12 09:40:36'),
(351, 'ow==', '1ytrbz7vow==', '2012-06-12 12:27:26'),
(354, 'ow==', '182mnzjhow==', '2012-06-16 11:23:18'),
(355, 'ow==', 'y3kzs6bfow==', '2012-06-21 17:50:06'),
(361, 'ow==', 'm5dqpv6gow==', '2012-07-02 10:17:38'),
(371, 'ow==', '6s174g2yow==', '2012-07-06 16:43:21'),
(372, 'ow==', 'tz54dvjpow==', '2012-07-10 11:46:08'),
(373, 'ow==', 'nryz4bk1ow==', '2012-07-12 12:20:32'),
(374, 'ow==', 'gnhyzk4tow==', '2012-07-12 12:34:16'),
(375, 'ow==', 'cg2vb456ow==', '2012-07-12 12:42:47'),
(376, 'ow==', '9m3jpxw7ow==', '2012-07-13 09:58:56'),
(377, 'ow==', 'qk2mp50sow==', '2012-08-02 17:26:59'),
(379, 'ow==', 'b19q642now==', '2012-08-06 15:47:41'),
(380, 'ow==', 'fhwg1dbrow==', '2012-08-07 08:40:23'),
(382, 'ow==', '2xkwh639ow==', '2012-09-22 12:41:12'),
(384, 'ow==', 'jygxk9w7ow==', '2012-09-25 17:11:37'),
(385, 'ow==', 'qzpyg5r8ow==', '2012-09-22 15:34:32'),
(386, 'ow==', 'sbz68nrfow==', '2012-11-05 09:32:35'),
(387, 'ow==', '4d5zsymjow==', '2012-11-05 09:34:19'),
(388, 'ow==', 'kgpm72b1ow==', '2012-11-07 12:03:04'),
(389, 'ow==', '8mqnvwkcow==', '2013-01-09 15:35:26'),
(390, 'ow==', '8cdmbnwqow==', '2013-02-01 10:05:43'),
(391, 'ow==', '13fqm2svow==', '2013-02-01 10:58:41'),
(392, 'ow==', 'mr8zj30cow==', '2013-02-01 11:13:42'),
(393, 'ow==', 'y23xb6h1ow==', '2013-02-01 14:17:06'),
(394, 'ow==', 'bq8ngj5pow==', '2013-02-01 17:35:53'),
(395, 'ow==', '0xmkjdcgow==', '2013-02-02 10:43:56'),
(396, 'ow==', '3ynwpsk7ow==', '2013-02-05 15:15:26'),
(397, 'ow==', 'g65vbxz0ow==', '2013-02-06 10:18:59'),
(398, 'ow==', 'mnsk2hcwow==', '2013-02-06 15:17:54'),
(399, 'ow==', 'g24yxf7how==', '2013-02-06 15:22:50'),
(400, 'ow==', 'xpkwn1d7ow==', '2013-02-08 11:11:53'),
(401, 'ow==', 'nzvmxf23ow==', '2013-02-14 14:25:02'),
(402, 'ow==', 's2pf3056ow==', '2013-02-14 16:07:31'),
(403, 'ow==', 'djp1x2q3ow==', '2013-02-15 08:19:19'),
(404, 'ow==', '7hv3b12qow==', '2013-02-20 10:40:23'),
(405, 'ow==', '03jrc6hwow==', '2013-03-26 14:03:31'),
(406, 'ow==', 'wj5dnctvow==', '2013-03-27 15:58:11'),
(407, 'ow==', 'jwtmrc4xow==', '2013-03-28 08:00:12'),
(408, 'ow==', 'kzvh20n5ow==', '2013-03-29 10:31:29'),
(409, 'ow==', '7k1g8q6xow==', '2013-03-29 14:36:50'),
(410, 'ow==', 'cjf4krtbow==', '2013-03-30 07:45:27'),
(411, 'ow==', 'jpb30zk7ow==', '2013-04-01 10:55:34'),
(412, 'ow==', 'xvh5kwqmow==', '2013-04-05 18:19:19'),
(414, 'ow==', 'pf28k4v0ow==', '2013-04-08 15:32:06'),
(415, 'ow==', '3fq4tgypow==', '2013-04-10 08:40:29'),
(416, 'ow==', '8qprgv69ow==', '2013-04-11 09:10:01'),
(417, 'ow==', 'c7kjnvr1ow==', '2013-04-12 11:24:28'),
(418, 'ow==', 'fps0b7yxow==', '2013-04-25 17:33:08'),
(419, 'ow==', '7tg0fympow==', '2013-04-29 08:47:47'),
(420, 'ow==', 'gyfh53b8ow==', '2013-04-29 08:53:35'),
(421, 'ow==', '4r7hgdnfow==', '2013-04-29 10:49:16'),
(422, 'ow==', '69rz85g0ow==', '2013-04-29 16:51:42'),
(423, 'ow==', '8sn9p0t7ow==', '2013-05-02 10:06:53'),
(424, 'ow==', '1fx895zbow==', '2013-05-07 09:26:45'),
(425, 'ow==', '3tp6nhqmow==', '2013-05-16 17:22:43'),
(426, 'ow==', '734wjndgow==', '2013-05-18 09:23:09'),
(427, 'ow==', 'n21b493row==', '2013-05-23 11:36:41'),
(428, 'ow==', 'z845hq9gow==', '2013-05-24 17:12:20'),
(429, 'ow==', 'ghzt3y40ow==', '2013-05-24 17:25:39'),
(430, 'ow==', 'gdsp0w28ow==', '2013-05-24 18:12:48'),
(431, 'ow==', '4rdpmfn5ow==', '2013-05-25 10:53:10'),
(432, 'ow==', '31npv8r4ow==', '2013-05-30 16:51:59'),
(433, 'ow==', 'p2vc87hkow==', '2013-05-31 15:40:31'),
(434, 'ow==', '824wjzxkow==', '2013-06-01 13:16:41'),
(435, 'ow==', '8r6stgf7ow==', '2013-06-04 10:00:46'),
(436, 'ow==', 'dpgjcn9mow==', '2013-06-05 11:17:46'),
(437, 'ow==', '03r6gkq1ow==', '2013-06-05 11:41:06'),
(438, 'ow==', 'v4bngjr5ow==', '2013-06-05 13:09:19'),
(439, 'ow==', 'ns8vp201ow==', '2013-06-05 16:07:34'),
(440, 'ow==', '6854hxr3ow==', '2013-06-05 11:24:48'),
(441, 'ow==', 'vw2ch3qpow==', '2013-06-06 06:15:06'),
(442, 'ow==', '9qygwh5dow==', '2013-06-06 04:15:38'),
(443, 'ow==', '9gmv31x0ow==', '2013-06-06 13:03:41'),
(446, 'ow==', 'jzyc1bg6ow==', '2013-06-08 10:14:50'),
(447, 'ow==', 'j47vt9mbow==', '2013-06-08 12:26:12'),
(448, 'ow==', '5ypt374wow==', '2013-06-08 15:26:24'),
(449, 'ow==', '614g2s98ow==', '2013-06-10 10:54:46'),
(450, 'ow==', 'dmxv7tzyow==', '2013-06-20 09:54:16'),
(451, 'ow==', 'w950r8hyow==', '2013-06-20 15:54:08'),
(452, 'ow==', 'dqtrwby3ow==', '2013-06-20 19:14:53'),
(453, 'ow==', 'sxdvwzjcow==', '2013-06-21 09:54:25'),
(454, 'ow==', 'xqyz30khow==', '2013-06-21 17:56:50'),
(455, 'ow==', '3jt9ncrbow==', '2013-06-22 08:45:04'),
(456, 'ow==', 'vp6bcr8wow==', '2013-06-22 11:05:07'),
(457, 'ow==', 'wyfvsc0jow==', '2013-06-24 16:36:47'),
(458, 'ow==', '28b6dmqrow==', '2013-06-24 16:44:00'),
(459, 'ow==', 'ys7qphgcow==', '2013-06-25 11:34:50'),
(460, 'ow==', 'v7b3tzrwow==', '2013-06-25 12:12:38'),
(461, 'ow==', 'qmgz5kc4ow==', '2013-06-25 12:18:19'),
(462, 'ow==', '9xyjkmw7ow==', '2013-06-25 12:27:40'),
(463, 'ow==', '8ct2sqh0ow==', '2013-06-25 12:29:46'),
(464, 'ow==', '2zbr6ymgow==', '2013-06-25 16:36:18'),
(465, 'ow==', '8fmsgj65ow==', '2013-06-26 17:32:50'),
(466, 'ow==', '607t5vqcow==', '2013-06-28 18:02:35'),
(467, 'ow==', '3tdny9w5ow==', '2013-06-30 16:56:43'),
(468, 'ow==', 'vbn4wzkyow==', '2013-07-05 15:28:11'),
(469, 'ow==', '37srmkv2ow==', '2013-07-05 17:38:42'),
(470, 'ow==', 'rvkfnb23ow==', '2013-07-06 09:36:06'),
(471, 'ow==', '1kmq9z02ow==', '2013-07-08 10:49:01'),
(472, 'ow==', '4gxszckfow==', '2013-07-06 11:23:34'),
(473, 'ow==', 'djk1xvs6ow==', '2013-07-06 11:23:33'),
(474, 'ow==', 'yrnd0x41ow==', '2013-07-08 11:43:43'),
(476, 'pQ==', 'q921xs3cpQ==', '2013-07-09 09:42:24'),
(477, 'ow==', 'mk1sdzywow==', '2013-07-09 09:43:00'),
(478, 'ow==', 'bq5xrcdpow==', '2013-07-09 09:50:02'),
(479, 'ow==', 'qj1z36vxow==', '2013-07-18 19:02:29'),
(480, 'ow==', '8htfjm5wow==', '2013-07-20 16:49:08'),
(481, 'ow==', '528tc17qow==', '2013-07-20 11:12:01'),
(482, 'ow==', 'd0jq3yw1ow==', '2013-07-22 09:46:03'),
(483, 'ow==', 'mfc629tvow==', '2013-07-22 10:17:32'),
(484, 'ow==', '4jsq15mbow==', '2013-07-23 09:37:39'),
(485, 'ow==', 'kyxg4bv7ow==', '2013-07-23 11:11:32'),
(486, 'ow==', 'd0t24hbkow==', '2013-07-23 13:06:06'),
(487, 'ow==', 'y3m9q1z6ow==', '2013-07-24 04:01:16'),
(488, 'ow==', '2stnp6jwow==', '2013-08-06 11:30:53'),
(489, 'ow==', 'yjfndw72ow==', '2013-08-07 04:26:59'),
(490, 'ow==', 'k5jhbr10ow==', '2013-08-07 07:02:47'),
(491, 'ow==', 'kdm8n5fxow==', '2013-08-07 07:48:52'),
(492, 'ow==', 'y6nx7s3gow==', '2013-08-09 03:30:42'),
(493, 'ow==', '4qndp2y6ow==', '2013-08-09 05:22:18'),
(494, 'ow==', 'd1prm5jqow==', '2013-08-09 12:10:04'),
(495, 'ow==', '2kx63p7sow==', '2013-08-17 04:53:23'),
(496, 'ow==', '9fy0qb8sow==', '2013-08-22 01:34:38'),
(497, 'ow==', 'bks716p5ow==', '2013-08-22 04:06:34'),
(498, 'ow==', '5cjpdv6yow==', '2013-08-22 04:18:47'),
(499, 'ow==', 'z0vwksgxow==', '2013-08-23 10:26:34'),
(500, 'ow==', 'd3fwcryzow==', '2013-08-28 05:08:01'),
(501, 'ow==', 'w9zbj00xow==', '2013-09-02 08:05:55'),
(502, 'ow==', '26rgqmx0ow==', '2013-09-02 08:15:02'),
(503, 'ow==', '00btx8qzow==', '2013-09-02 08:22:55'),
(504, 'ow==', 'jvy5swfzow==', '2013-09-03 07:33:36'),
(505, 'ow==', '2s7nw13pow==', '2013-09-03 07:38:55'),
(506, 'ow==', 'ykdv845wow==', '2013-09-03 07:45:35'),
(507, 'ow==', '3qmd89xrow==', '2013-09-03 07:52:06'),
(508, 'ow==', 'wzb2c4s6ow==', '2013-09-03 08:07:33'),
(509, 'ow==', '9qr06pz4ow==', '2013-09-03 09:33:24'),
(510, 'ow==', '789m43jgow==', '2013-09-11 02:27:01'),
(511, 'ow==', 'y4wjtm0dow==', '2013-09-14 02:09:58'),
(512, 'ow==', '6dh289frow==', '2013-10-08 07:15:43'),
(513, 'ow==', 'mhzy8cxwow==', '2013-10-19 05:06:58'),
(514, 'ow==', '3pc08yztow==', '2013-10-20 10:00:55'),
(515, 'ow==', 'htp7fr5sow==', '2013-10-23 08:06:58'),
(516, 'ow==', '5qjm93xbow==', '2013-10-28 02:02:45'),
(517, 'ow==', 'q42sfgw8ow==', '2014-01-02 10:34:07'),
(518, 'ow==', 'p36k142xow==', '2014-01-03 10:31:22'),
(519, 'ow==', 'v1nd2y0mow==', '2014-01-04 04:59:27'),
(520, 'ow==', 'qhwys6nrow==', '2014-01-06 10:52:46'),
(521, 'ow==', '3zby6tvgow==', '2014-01-06 08:22:08'),
(522, 'ow==', '71rx23c0ow==', '2014-01-07 09:37:33'),
(523, 'ow==', 'v1mzr2c8ow==', '2014-01-08 01:52:58'),
(524, 'ow==', '7fqgy9v4ow==', '2014-01-08 03:43:27'),
(525, 'ow==', 'qjk0g4hpow==', '2014-01-08 08:16:28'),
(526, 'ow==', '8zqy3gwxow==', '2014-01-09 02:22:15'),
(527, 'ow==', 'pbxw1tcsow==', '2014-01-09 04:50:25'),
(528, 'ow==', 'y036kvpzow==', '2014-01-09 10:25:46'),
(529, 'ow==', 'vxc1bg39ow==', '2014-01-10 04:24:37'),
(530, 'ow==', 'j1dy98g6ow==', '2014-01-10 10:28:42'),
(531, 'ow==', 'jmfp93drow==', '2014-01-11 03:41:54'),
(532, 'ow==', 'yf9vwmgxow==', '2014-01-11 04:36:07'),
(533, 'ow==', '59kjnp8qow==', '2014-01-13 05:06:16'),
(534, 'ow==', 'vq1xwrp8ow==', '2014-01-13 09:50:35'),
(535, 'ow==', '7db3vpytow==', '2014-01-14 03:23:42'),
(536, 'ow==', 'xbct1jv2ow==', '2014-01-14 10:48:55'),
(537, 'ow==', '4cthwsfkow==', '2014-01-15 02:17:49'),
(538, 'ow==', '1d29q435ow==', '2014-01-17 07:47:35'),
(539, 'ow==', '8q6j9wh3ow==', '2014-01-20 07:59:19'),
(540, 'ow==', 'c7zr8600ow==', '2014-02-06 04:36:35'),
(541, 'ow==', 'y1f8nmgjow==', '2014-03-06 04:51:48'),
(542, 'ow==', '21300p7now==', '2014-03-06 08:25:14'),
(543, 'ow==', 'bxd81zhjow==', '2014-04-25 01:35:46'),
(544, 'ow==', '8jmdspygow==', '2014-04-28 07:45:26'),
(545, 'ow==', 'pgz96yfqow==', '2014-04-30 04:24:46'),
(546, 'ow==', 'v7rz8x4tow==', '2014-05-17 04:18:59'),
(547, 'ow==', '23nqh1pcow==', '2014-05-21 09:47:47'),
(548, 'ow==', 'bt8hj02fow==', '2014-05-22 04:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblverify`
--

CREATE TABLE IF NOT EXISTS `tblverify` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `verify_code` varchar(50) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor_counter`
--

CREATE TABLE IF NOT EXISTS `tblvisitor_counter` (
  `vc_id` int(11) NOT NULL AUTO_INCREMENT,
  `today` bigint(20) NOT NULL,
  `yesterday` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `curr_date` date NOT NULL,
  PRIMARY KEY (`vc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblvisitor_counter`
--

INSERT INTO `tblvisitor_counter` (`vc_id`, `today`, `yesterday`, `total`, `curr_date`) VALUES
(1, 1, 1, 534, '2014-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers`
--

CREATE TABLE IF NOT EXISTS `tbl_answers` (
  `answer` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `answer_id` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `recycle` varchar(5) NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `delete_date` datetime NOT NULL,
  `read_answer` varchar(5) NOT NULL,
  PRIMARY KEY (`answer`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_answers`
--

INSERT INTO `tbl_answers` (`answer`, `a_id`, `answer_id`, `fullname`, `email`, `phone`, `description`, `recycle`, `add_date`, `edit_date`, `delete_date`, `read_answer`) VALUES
(21, 407, '413,411,409', 'sfjsla', 'sorsamnang@gmail.com', 'sfaja', 'alfjsasfa', 'yes', '2013-06-21 16:49:33', '0000-00-00 00:00:00', '2013-07-07 10:30:23', 'yes'),
(24, 407, '413,412,411,409', 'dsafa', 'abc@beer.com', 'afa', 'afsa', 'no', '2013-06-21 16:56:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(23, 407, '413,412,411,410,409,408', 'samang', 'sldsa@slfasl.com', 'slajfsaj', 'flasjfalfsa', 'yes', '2013-06-21 16:55:03', '0000-00-00 00:00:00', '2013-07-07 10:30:23', 'yes'),
(25, 407, '409,411', 'sfsfds', 'sfsfsfsf@fslf.com', 'slvjalvja', 'valvjlvjzvxz', 'yes', '2013-07-06 10:14:36', '0000-00-00 00:00:00', '2013-07-09 09:41:11', 'no'),
(26, 446, '409,411,413', 'wewrw', 'lfjsfs@slfs.com', 'wrwrwr', 'wrwrwrwrw', 'yes', '2013-07-06 18:03:11', '0000-00-00 00:00:00', '2013-07-09 09:40:10', 'yes'),
(27, 446, '408,409,410,411,412,413', 'sfsfs', 'sslf@fsl.com', 'fslfjaf', 'falfsjsalfjsaf', 'yes', '2013-07-06 18:03:36', '0000-00-00 00:00:00', '2013-07-07 10:30:31', 'yes'),
(28, 446, '408,409,413', 'ryryry', 'rytryr@sdlf.com', 'slfjalfj', 'sfafa', 'yes', '2013-07-06 18:20:05', '0000-00-00 00:00:00', '2013-07-07 10:30:31', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dialy_visitor`
--

CREATE TABLE IF NOT EXISTS `tbl_dialy_visitor` (
  `v_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `v_date` date NOT NULL,
  `v_count` int(11) NOT NULL,
  `v_online` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_dialy_visitor`
--

INSERT INTO `tbl_dialy_visitor` (`v_id`, `v_date`, `v_count`, `v_online`) VALUES
(10, '2014-01-09', 12, 1),
(6, '2011-07-01', 2, 2),
(7, '2011-07-02', 2, 2),
(8, '2011-07-04', 6, 6),
(9, '2014-01-08', 20, 2),
(11, '2011-08-03', 2, 2),
(12, '2011-08-04', 1, 1),
(13, '2011-08-05', 2, 2),
(14, '2011-08-06', 2, 2),
(15, '2011-08-08', 1, 1),
(16, '2011-08-09', 3, 3),
(17, '2011-08-10', 3, 3),
(18, '2011-08-11', 6, 6),
(19, '2011-08-12', 6, 6),
(20, '2011-08-15', 3, 3),
(21, '2011-08-17', 2, 2),
(22, '2011-08-18', 1, 1),
(23, '2011-08-28', 1, 1),
(24, '2014-01-10', 3, 0),
(25, '2014-01-11', 2, 0),
(26, '2014-01-13', 2, 0),
(27, '2014-01-14', 2, 0),
(28, '2014-01-15', 2, 0),
(29, '2014-01-16', 1, 0),
(30, '2014-01-17', 1, 0),
(31, '2014-01-20', 1, 0),
(32, '2014-02-06', 2, 0),
(33, '2014-03-06', 1, 0),
(34, '2014-04-23', 1, 0),
(35, '2014-04-24', 1, 0),
(36, '2014-04-28', 1, 0),
(37, '2014-04-29', 1, 0),
(38, '2014-05-03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recently_view`
--

CREATE TABLE IF NOT EXISTS `tbl_recently_view` (
  `recently_view_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  `recently_view_type` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`recently_view_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_recently_view`
--

INSERT INTO `tbl_recently_view` (`recently_view_id`, `d_id`, `recently_view_type`, `member_id`, `add_date`) VALUES
(1, 280, 'article', 12, '2013-04-29'),
(2, 280, 'article', 12, '2013-04-29'),
(3, 298, 'article', 12, '2013-04-10'),
(4, 298, 'article', 12, '2013-04-10'),
(8, 322, 'article', 12, '2013-04-10'),
(9, 323, 'article', 12, '2013-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE IF NOT EXISTS `tbl_subscribe` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_email` varchar(60) NOT NULL,
  `sub_status` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`sub_id`, `sub_email`, `sub_status`) VALUES
(1, 'povvichet@yahoo.com', 'enable'),
(11, 'nouch@yahoo.com', 'enable'),
(12, 'pearun@gmail.com', 'enable'),
(13, 'noch@yahoo.com', 'enable'),
(14, 'fsjflsflsjf@sjlfsfl.com', 'enable'),
(15, 'sorsdfs@fslfs.com', 'enable'),
(16, 'sfdsfsl@slfs.com', 'enable'),
(17, 'adadadaa@slfs.com', 'enable'),
(18, 'sorsamnang.khmer@gmail.com', 'enable'),
(19, 'test@gmail.com', 'enable'),
(20, 'dlfgdlgdj@gedlgd.com', 'enable'),
(21, 'skfsfskfshf@slf.com', 'enable'),
(22, 'flhflhfhfJ@rlhf.com', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `v_tblarticle_submenu_kh`
--

CREATE TABLE IF NOT EXISTS `v_tblarticle_submenu_kh` (
  `a_id` int(11) DEFAULT NULL,
  `sub_value` tinytext,
  `linkto_type` varchar(30) DEFAULT NULL,
  `link_to` tinytext,
  `title` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
