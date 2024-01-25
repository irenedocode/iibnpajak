-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 02:10 AM
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
-- Database: `data`
--
CREATE DATABASE IF NOT EXISTS `data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `data`;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `nopolisi` char(10) NOT NULL,
  `masapajak` date NOT NULL,
  `bayar` date NOT NULL,
  `ntpn` char(16) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`nopolisi`, `masapajak`, `bayar`, `ntpn`, `status`) VALUES
('bp 0000 oo', '2024-01-02', '2024-02-15', 'kdjask76332', 'belum lunas'),
('bp 1233 dd', '2024-01-11', '2024-01-27', '72163ghsdjakd', 'lunas');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no`, `nama`, `jeniskendaraan`, `jenismobilmotor`, `nopolisi`, `pembuatan`, `rangka`, `masapajak`) VALUES
(2, 'ren', 'motor', 'balap', 'bp 0000 oo', '2020-01-22', 'sdsajbdutw57', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` char(30) NOT NULL,
  `password` char(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `role`) VALUES
('irene@gmail.com', 'irene', 'admin'),
('irene2@gmail.com', 'irene2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`nopolisi`);

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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
