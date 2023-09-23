-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 06:47 AM
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
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `bid` int(20) NOT NULL,
  `b_title` varchar(100) DEFAULT NULL,
  `b_description` varchar(300) DEFAULT NULL,
  `b_image` varchar(300) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL COMMENT '0-public, 1-onlyme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`bid`, `b_title`, `b_description`, `b_image`, `uname`, `visibility`) VALUES
(1, 'head', '', 'Recommend4.png', 'demo1', 0),
(2, 'Hello WOrld', '<p>headerContent-Type: application/json\');: This line sets the content type of the response to JSON, indicating that you\'re going to send JSON data. echo json_encode($response);: This line encodes the $response array as JSON and echoes it as the response to the AJAX request. The $response array sh</', 'Screenshot_2023-08-02_202746.png', 'demo1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 - enduser , 1- blogger, 2 - editor, 3 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `uname`, `password`, `status`) VALUES
(1, 'Shardul Mishra', 'demo1', 'demodemo', 3),
(2, 'dasdas', 'demo2', 'demodemo', 0),
(3, 'Ashwin', 'demo3', 'demodemo', 2),
(4, 'dasd', 'demo4', 'demodemo', 1),
(5, 'Shardul arshim', 'shardul9090', 'dodododo', 0),
(6, 'nepal nepal', 'nepal123', 'opopop', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `bid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
