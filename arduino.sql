-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 10:03 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arduino`
--

-- --------------------------------------------------------

--
-- Table structure for table `arduino`
--

CREATE TABLE `arduino` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arduino`
--

INSERT INTO `arduino` (`id`, `user_id`, `name`) VALUES
(1005, 1005, 'bt7'),
(1006, 1006, 'bt2');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `bot_id` int(11) NOT NULL,
  `groups` varchar(40) NOT NULL,
  `score` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`bot_id`, `groups`, `score`) VALUES
(1, 'Groep-A', 0),
(3, 'Groep-B', 0),
(5, 'Groep-C', 0),
(6, 'Groep-D', 0),
(8, 'Groep-E', 0),
(9, 'Groep-G', 0),
(10, 'Groep-H', 0),
(11, 'Groep-I', 0),
(12, 'Groep-J', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `btname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `pass`, `btname`) VALUES
(1000, 'INF1A', 'BT19', 'bt19'),
(1002, 'INF1B', 'BT1', 'bt1'),
(1003, 'INF1C', 'BT14', 'bt14'),
(1004, 'INF1D', 'BT3', 'bt3'),
(1005, 'INF1E', 'BT7', 'bt7'),
(1006, 'INF1G', 'BT2', 'bt2'),
(1007, 'INF1H', 'BT16', 'bt16'),
(1008, 'INF1I', 'BT9', 'bt9');

-- --------------------------------------------------------

--
-- Table structure for table `user_cmd`
--

CREATE TABLE `user_cmd` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cmd` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cmd`
--

INSERT INTO `user_cmd` (`id`, `user_id`, `cmd`) VALUES
(1412, 1005, 'F'),
(1413, 1005, '5'),
(1414, 1005, '5'),
(1415, 1005, '2'),
(1416, 1005, 'F'),
(1417, 1005, 'S'),
(1418, 1005, 'F'),
(1419, 1005, 'S'),
(1420, 1005, 'F'),
(1421, 1005, 'S'),
(1422, 1005, 'F'),
(1423, 1005, 'S'),
(1424, 1005, 'F'),
(1425, 1005, 'S'),
(1426, 1005, 'F'),
(1427, 1005, 'S'),
(1428, 1005, 'F'),
(1429, 1005, 'S'),
(1430, 1005, 'F'),
(1431, 1005, 'S'),
(1432, 1005, 'F'),
(1433, 1005, 'S'),
(1434, 1005, 'F'),
(1435, 1005, 'S'),
(1436, 1005, 'F'),
(1437, 1005, 'S'),
(1438, 1005, 'F'),
(1439, 1005, 'S'),
(1440, 1005, 'B'),
(1441, 1005, 'S'),
(1442, 1005, 'L'),
(1443, 1005, 'S'),
(1444, 1005, 'R'),
(1445, 1005, 'S'),
(1446, 1005, 'F'),
(1447, 1005, 'S'),
(1448, 1005, 'F'),
(1449, 1005, 'S'),
(1450, 1005, 'F'),
(1451, 1005, 'S'),
(1452, 1005, 'F'),
(1453, 1005, 'S'),
(1454, 1005, 'F'),
(1455, 1005, 'S'),
(1456, 1005, 'F'),
(1457, 1005, 'S'),
(1458, 1005, 'F'),
(1459, 1005, 'S'),
(1460, 1005, 'B'),
(1461, 1005, 'S'),
(1462, 1005, 'F'),
(1463, 1005, 'S'),
(1464, 1005, 'F'),
(1465, 1005, 'S'),
(1466, 1005, 'F'),
(1467, 1005, 'S'),
(1468, 1005, 'F'),
(1469, 1005, 'S'),
(1470, 1005, 'F'),
(1471, 1005, 'S'),
(1472, 1005, 'F'),
(1473, 1005, 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arduino`
--
ALTER TABLE `arduino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`bot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_cmd`
--
ALTER TABLE `user_cmd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arduino`
--
ALTER TABLE `arduino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `bot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `user_cmd`
--
ALTER TABLE `user_cmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1474;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
