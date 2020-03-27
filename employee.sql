-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 01:09 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `role` int(10) DEFAULT NULL,
  `token` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `pass`, `role`, `token`) VALUES
(1, 'director', '123456', 0, 1234),
(2, 'username', '123456', 0, 1234),
(3, 'admin', '123456', 1, 1234),
(4, 'manager', '123456', 0, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `distristict`
--

CREATE TABLE `distristict` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `distristict`
--

INSERT INTO `distristict` (`id`, `name`, `province_id`) VALUES
(1, 'xuan trung', 1),
(2, 'xuan truong', 1),
(3, 'xuan phuong', 1),
(4, 'tho nghiep', 1),
(5, 'truc ninh', 1),
(6, 'tien hai', 2),
(7, 'dong hung', 2),
(8, 'hung ha', 2),
(9, 'kien xuong', 2),
(10, 'thái thụy', 2),
(11, 'ba dinh', 3),
(12, 'hoan kiem', 3),
(13, 'tay ho', 3),
(14, 'long bien', 3),
(15, 'cau giay ', 3),
(16, 'dong da', 3),
(17, 'mong cai', 4),
(18, 'hon gai', 4),
(19, 'cam pha ', 4),
(20, 'uong bi', 4),
(21, 'do son', 5),
(22, 'kinh duong', 5),
(23, 'hai an', 5),
(24, ' hong bang', 5),
(25, 'lam thao', 6),
(26, 'phu ninh', 6),
(27, ' tan son', 6),
(28, 'thanh ba', 6),
(29, 'Thanh thủy', 6);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `salory` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `distristict_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `birthday`, `province_id`, `address`, `phone`, `email`, `salory`, `account_id`, `url`, `distristict_id`) VALUES
(20, 'Dat', '2019-07-10', 1, 'nam dinh', 975983758, 'tranduydat@gmail.com', 1000000, 3, '', 1),
(21, 'Dat Tran', '2019-07-10', 1, 'nam dinh', 975983758, 'dattran0319@gmail.com', 1000000, 2, '', 3),
(22, 'tran duy dat', '2019-07-03', 3, 'ha noi', 126852149, 'dattran0318@gmail.com', 100000, 4, NULL, 13),
(28, 'Dat', '2019-07-10', 1, 'nam dinh', 1245847569, 'dattran0319@gmail.com', 1000000, 1, NULL, 12),
(29, ' tran duy hien ', '0000-00-00', 1, ' nam dinh ', 1242704621, ' hientran0124@gmail.com ', 100000000, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Nam Dinh'),
(2, 'Thai Binh'),
(3, 'Ha Noi'),
(4, 'Quang ninh'),
(5, 'Hai phong'),
(6, 'Phu Tho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distristict`
--
ALTER TABLE `distristict`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `user_id` (`account_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distristict`
--
ALTER TABLE `distristict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distristict`
--
ALTER TABLE `distristict`
  ADD CONSTRAINT `distristict_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
