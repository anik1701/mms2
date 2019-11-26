-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 07:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(0, 'antu', 'ab@gmail.com', '12345'),
(1, 'anik', 'aranik225@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `anotification`
--

CREATE TABLE `anotification` (
  `username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Message` varchar(300) NOT NULL,
  `Seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Message`, `Seen`) VALUES
('asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductName` varchar(200) NOT NULL,
  `CatagoryName` varchar(300) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Price` int(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `ProductStatus` varchar(20) NOT NULL,
  `Quantity` int(200) NOT NULL,
  `StartDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `EndDate` timestamp NULL DEFAULT NULL,
  `Buyer` varchar(100) NOT NULL,
  `Image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductName`, `CatagoryName`, `UserName`, `Price`, `Description`, `ProductStatus`, `Quantity`, `StartDate`, `EndDate`, `Buyer`, `Image`) VALUES
('sord', 'Antique', 'admin', 30000, 'an antique sord used by the king of Bangladesh Shhirajuddola in 1785.', 'no', 1, '0000-00-00 00:00:00', '2020-02-03 18:00:00', '', 'images/sord.jpeg'),
('clock', 'Antique', '', 50000, ' an antique clock', 'No', 1, '2019-11-18 18:00:00', '2019-11-20 18:00:00', 'Null', 'ProductPhoto/original.jpg'),
('phone', 'Other', '', 10000, ' brand new', 'No', 1, '2019-11-17 18:00:00', '2019-11-19 18:00:00', 'Null', 'ProductPhoto/galagys6.jpg'),
('clock', 'Antique', '', 6788, ' nsj', 'No', 1, '2019-11-17 18:00:00', '2019-11-17 18:00:00', 'Null', 'ProductPhoto/apple.jpg'),
('clock', 'Antique', '', 6788, ' nsj', 'No', 1, '2019-11-17 18:00:00', '2019-11-17 18:00:00', 'Null', 'ProductPhoto/apple.jpg'),
('clock', 'Antique', '', 6788, ' nsj', 'No', 1, '2019-11-17 18:00:00', '2019-11-17 18:00:00', 'Null', 'ProductPhoto/apple.jpg'),
('clock', 'Antique', '', 6788, ' nsj', 'No', 1, '2019-11-17 18:00:00', '2019-11-17 18:00:00', 'Null', 'ProductPhoto/apple.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `details` varchar(300) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `salary` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `uname`, `password`, `email`, `phone`, `dob`, `salary`, `gender`, `address`, `image`, `status`) VALUES
(1, 'anik', 'aranik', '12345', 'aranik225@gmail.com', '01703244472', '1998-11-04', 0, 'Male', 'asulia', 'UserPhoto/cc.jpg', 0),
(2, '$name', '$uname', '$Password', '$email', '$phone', '0000-00-00', 0, '$gender', '$address', '$destination', 0),
(3, 'phone', 'aranik', '1', 'alxayeed@gmail.com', '01516154051', '2019-11-15', 0, 'Male', 'z', 'UserPhoto/hondacity.jpg', 0),
(5, '$name', '$uname', '$password', '$email', '$phone', '2019-11-02', 0, 'Male', '$address', 'UserPhoto/2014-corolla-india-2.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
