-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 08:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--
CREATE DATABASE IF NOT EXISTS `data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `data`;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskendaraan` varchar(10) NOT NULL,
  `jenismobilmotor` varchar(10) NOT NULL,
  `nopolisi` char(10) NOT NULL,
  `pembuatan` date NOT NULL,
  `rangka` char(17) NOT NULL,
  `masapajak` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no`, `nama`, `jeniskendaraan`, `jenismobilmotor`, `nopolisi`, `pembuatan`, `rangka`, `masapajak`) VALUES
(10, 'ren', 'adwa', 'wdad', 'bp 0000 oo', '2024-01-04', 'dawdad423', '2024-01-06'),
(11, 'dawd', 'wda', 'wda', 'bp 9834 gg', '2024-01-23', 'adwadq21', '2024-04-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
