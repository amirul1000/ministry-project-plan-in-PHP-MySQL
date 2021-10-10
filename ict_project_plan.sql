-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 08:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_project_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) NOT NULL,
  `objectives_id` int(10) DEFAULT NULL,
  `activities_name` varchar(64) COLLATE utf8_estonian_ci DEFAULT NULL,
  `description` text COLLATE utf8_estonian_ci DEFAULT NULL,
  `order_no` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `objectives_id`, `activities_name`, `description`, `order_no`, `created_at`, `updated_at`) VALUES
(3, 13, 'Meeting', '', 1, '2021-05-18 07:16:08', NULL),
(4, 13, 'Document Creation', '', 0, '2021-05-18 07:16:30', NULL),
(5, 13, 'Task', '', 0, '2021-05-18 07:16:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', 'uploads/images/company/Untitled.jpg', 'uploads/images/company/logo.png', 'uploads/images/company/Untitled.jpg', 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D\'Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People\'s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `department` varchar(127) COLLATE utf8_estonian_ci DEFAULT NULL,
  `description` text COLLATE utf8_estonian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `description`) VALUES
(1, 'ICT', 'ICT'),
(2, 'Fish', ''),
(3, 'AG', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) NOT NULL,
  `innovation_plan_id` int(10) DEFAULT NULL,
  `document_file_type` enum('picture','video','link','youtube') COLLATE utf8_estonian_ci DEFAULT NULL,
  `file_picture` varchar(256) COLLATE utf8_estonian_ci DEFAULT NULL,
  `description` text COLLATE utf8_estonian_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `innovation_plan_id`, `document_file_type`, `file_picture`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'picture', '', '111', '2021-10-10 08:47:21', '2021-10-10 08:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `innovation_plan`
--

CREATE TABLE `innovation_plan` (
  `id` int(11) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `objectives_id` int(11) DEFAULT NULL,
  `weight_of_objectives` int(11) DEFAULT NULL,
  `activities_id` int(11) DEFAULT NULL,
  `performance_indicators_id` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `wop_indicators` int(11) DEFAULT NULL,
  `1st` int(11) DEFAULT NULL,
  `2nd` int(11) DEFAULT NULL,
  `3rd` int(11) DEFAULT NULL,
  `4th` int(11) DEFAULT NULL,
  `5th` varchar(64) COLLATE utf8_estonian_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `innovation_plan`
--

INSERT INTO `innovation_plan` (`id`, `users_id`, `objectives_id`, `weight_of_objectives`, `activities_id`, `performance_indicators_id`, `unit`, `wop_indicators`, `1st`, `2nd`, `3rd`, `4th`, `5th`, `created_at`, `updated_at`) VALUES
(1, 9, 13, 100, 5, 4, 100, 11, 11, 11, 11, 11, '11', 2021, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `objectives`
--

CREATE TABLE `objectives` (
  `id` int(10) NOT NULL,
  `department_id` int(10) DEFAULT NULL,
  `financial_year` varchar(64) COLLATE utf8_estonian_ci DEFAULT NULL,
  `sl_no` int(10) DEFAULT NULL,
  `objectives_name` varchar(64) COLLATE utf8_estonian_ci DEFAULT NULL,
  `weight_of_objectives` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `objectives`
--

INSERT INTO `objectives` (`id`, `department_id`, `financial_year`, `sl_no`, `objectives_name`, `weight_of_objectives`) VALUES
(11, 2, '2021', 3, 'Project3', '4.00'),
(12, 3, '2021', 2, 'Project2', '2.00'),
(13, 1, '2021', 1, 'Project1', '8.00');

-- --------------------------------------------------------

--
-- Table structure for table `performance_indicators`
--

CREATE TABLE `performance_indicators` (
  `id` int(10) NOT NULL,
  `activities_id` int(10) DEFAULT NULL,
  `unit` enum('date','manpower','percent','taka') COLLATE utf8_estonian_ci DEFAULT NULL,
  `wop_indicators` int(11) DEFAULT NULL,
  `order_no` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `performance_indicators`
--

INSERT INTO `performance_indicators` (`id`, `activities_id`, `unit`, `wop_indicators`, `order_no`, `created_at`, `updated_at`) VALUES
(3, 5, 'date', 8, 0, '2021-05-18 07:19:59', NULL),
(4, 5, 'manpower', 8, 0, '2021-05-18 07:20:09', NULL),
(5, 4, 'taka', 8, 0, '2021-05-18 07:20:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `predefined_activities`
--

CREATE TABLE `predefined_activities` (
  `id` int(10) NOT NULL,
  `activities_name` varchar(64) COLLATE utf8_estonian_ci DEFAULT NULL,
  `description` text COLLATE utf8_estonian_ci DEFAULT NULL,
  `order_no` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `predefined_activities`
--

INSERT INTO `predefined_activities` (`id`, `activities_name`, `description`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'fgfgfdg', 'gfgfg', 1, '2021-05-18 08:47:03', NULL),
(2, '4545456', '565656', 2, '2021-05-18 08:47:12', NULL),
(3, '5454545', '454545', 3, '2021-05-18 08:47:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `predefined_innovation_plan`
--

CREATE TABLE `predefined_innovation_plan` (
  `id` int(11) NOT NULL,
  `objectives_id` int(11) DEFAULT NULL,
  `weight_of_objectives` int(11) DEFAULT NULL,
  `activities_id` int(11) DEFAULT NULL,
  `performance_indicators_id` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `wop_indicators` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `predefined_innovation_plan`
--

INSERT INTO `predefined_innovation_plan` (`id`, `objectives_id`, `weight_of_objectives`, `activities_id`, `performance_indicators_id`, `unit`, `wop_indicators`, `created_at`, `updated_at`) VALUES
(1, 13, 8, 5, 4, 100, 100, 2021, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('super','staff','client','visitor') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `file_picture`, `phone_no`, `dob`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 'xx@xx.com', 'xx', 'Mr.', 'John', 'Smith', NULL, NULL, NULL, '', '', '', '', '', '231', '2011-10-19 00:00:00', '2011-10-19 00:00:00', 'super', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation_plan`
--
ALTER TABLE `innovation_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objectives`
--
ALTER TABLE `objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_indicators`
--
ALTER TABLE `performance_indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_activities`
--
ALTER TABLE `predefined_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_innovation_plan`
--
ALTER TABLE `predefined_innovation_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `innovation_plan`
--
ALTER TABLE `innovation_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `objectives`
--
ALTER TABLE `objectives`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `performance_indicators`
--
ALTER TABLE `performance_indicators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `predefined_activities`
--
ALTER TABLE `predefined_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `predefined_innovation_plan`
--
ALTER TABLE `predefined_innovation_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
