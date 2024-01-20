-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 12:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manifeso`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `parentsno` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `parentsno`, `date`, `message`) VALUES
(12, 'guru190', 8, '2023-11-23 16:07:23', 'this is interesting. i hope they work more. '),
(15, 'sania', 7, '2023-11-23 16:39:33', 'why is this page like this'),
(17, 'purple', 6, '2023-11-23 17:44:42', 'This has been needed for a long time. But wonder why they have stalled it now!'),
(18, 'happy', 6, '2023-12-06 00:46:04', 'the brand bengaluru survey was good. what have they done with the results?'),
(31, 'nagarike ', 9, '2023-12-06 02:27:41', 'This would need a restructuring and improvement of BWSSB first! '),
(32, 'activecitizen45', 16, '2023-12-06 13:54:48', 'This is cool and all...but is it necessary???? I would rather have better public transport than tunnelled roads.'),
(33, 'abc', 16, '2023-12-06 14:24:34', 'I agree'),
(34, 'divya', 6, '2023-12-06 18:41:55', 'helo');

-- --------------------------------------------------------

--
-- Table structure for table `promises`
--

CREATE TABLE `promises` (
  `sno` int(11) NOT NULL,
  `category` varchar(500) NOT NULL,
  `promise` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `details` varchar(5000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promises`
--

INSERT INTO `promises` (`sno`, `category`, `promise`, `status`, `details`, `date`) VALUES
(6, 'Namma Bengaluru', 'To enact a comprehensive legislation exclusively for the management of BBMP bringing all service providers such as Water Supply and sewage, transport, housing, power and development authorities, under a single agency ', 'Stalled', '    Source: https://www.deccanherald.com/india/karnataka/bengaluru/panel-on-bbmp-restructure-now-focuses-on-brand-bengaluru-2711464 \"> ', '2023-11-17'),
(7, 'Namma Bengaluru', 'To create a mega Bengaluru Region with infrastructure and administrative connections with cities like Kolar, Chikkaballapura, Doddaballapura, Tumakuru, Ramanagara, Kanakapur. ', 'Yet to start', '                    ', '2023-11-17'),
(8, 'Namma Bengaluru', 'To construct North South, South-east long elevated flyovers with necessary wings ease the traffic. ', 'In progress', '  Source: \r\n\r\n\"Civic authorities are planning to build two flyovers in southern Bengaluru ? a 2.5-km elevated stretch on Kanakapura Road from MN Krishna Rao Park and a second one from Banashankari Market to Sarakki Junction.\"\r\n\r\nRead more at: https://www.deccanherald.com/india/karnataka/bengaluru/bbmp-mulls-twin-flyovers-in-south-bengaluru-alongside-decongestion-plan-2709830          \"> \"> ', '2023-11-17'),
(9, 'Namma Bengaluru', 'To provide 100% effluent treatment and reuse of water for non-drinking purposes. ', 'In progress', '  Karnataka budget: https://www.thehindu.com/news/cities/bangalore/waste-management-and-sewage-treatment-infrastructure-in-bengaluru-to-get-a-fillip/article67054079.ece\r\n\r\nToshiba contracted for the sewage treatment plants: \r\nhttps://infra.economictimes.indiatimes.com/news/urban-infrastructure/toshiba-receives-contracts-8-sewage-treatment-plants-in-bengaluru/101310236\"> \"> ', '2023-11-17'),
(10, 'Namma Bengaluru', 'To provide special grant for prestigious Bengaluru Karaga Utsava. ', 'Yet to start', '', '2023-11-17'),
(11, 'Namma Bengaluru', 'To extend the Cauvery water supply to cover all parts of the city.', 'Stalled', 'News article from September 2023 (https://www.newindianexpress.com/cities/bengaluru/2023/sep/15/longer-wait-for-cauvery-stage-v-supply-2614973.html): \r\nDelay in Cauvery Stage V water supply to 110 cities in the city\'s outskirts. The deadline of December 2023 is to be crossed as well, estimating completion only by Feb-March 2023. ', '2023-12-06'),
(12, 'Namma Bengaluru', 'To Establish an international standard convention centre near Kempegowda International Airport. ', 'Broken', 'No news on this. ', '2023-12-06'),
(13, 'Namma Bengaluru', 'To establish Mega Bengaluru Planning Committee. ', 'Broken', '  No news on this. \"> \"> ', '2023-12-06'),
(14, 'Congress Guarantees', 'Free travel to all women throughout the state in regular KSRTC/BMTC buses. ', 'Fulfilled', 'Fulfilled but for domicile women only. Non-Karnataka residents not given. ', '2023-12-06'),
(15, 'Namma Bengaluru', 'To ensure financial independence to BBMP to grow into as an international competitive city. ', 'Stalled', 'Unclear promise, no news. ', '2023-12-06'),
(16, 'Namma Bengaluru', 'Construction of tunnel roads in CBD area to decongest traffic on PPP Model', 'In progress', 'Request for tenders and feasibility report ongoing. (Source: https://economictimes.indiatimes.com/news/economy/infrastructure/karnataka-government-proposes-to-build-190-km-tunnel-in-bengaluru-to-ease-traffic-congestion/articleshow/104191839.cms) ', '2023-12-06'),
(17, 'Congress Guarantees', '200 units of free electricity to all the houses', 'Fulfilled', 'Fulfilled', '2023-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `users_db`
--

CREATE TABLE `users_db` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_db`
--

INSERT INTO `users_db` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'sktkv', '123456', 'Sookthi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `promises`
--
ALTER TABLE `promises`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `promises`
--
ALTER TABLE `promises`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_db`
--
ALTER TABLE `users_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
