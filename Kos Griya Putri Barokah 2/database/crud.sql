-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 12:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`username`, `Password`) VALUES
('', ''),
('', ''),
('', ''),
('', ''),
('', 'kang'),
('kanga', '8ugwy'),
('bobby_s', 'griyabar');

-- --------------------------------------------------------

--
-- Table structure for table `data_kamar`
--

CREATE TABLE `data_kamar` (
  `no_kamar` int(5) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kamar`
--

INSERT INTO `data_kamar` (`no_kamar`, `nama`) VALUES
(1, 'Lintang'),
(2, '-'),
(3, 'Purwa'),
(4, '-'),
(5, '-'),
(6, '-'),
(7, '-'),
(8, '-'),
(9, '-'),
(10, '-'),
(11, '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_kos`
--

CREATE TABLE `data_kos` (
  `nama` varchar(100) NOT NULL,
  `nomor_hp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `sewa_bulan` varchar(100) NOT NULL,
  `no_kamar` varchar(100) NOT NULL,
  `total_harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kos`
--

INSERT INTO `data_kos` (`nama`, `nomor_hp`, `alamat`, `fasilitas`, `tanggal`, `sewa_bulan`, `no_kamar`, `total_harga`) VALUES
('fafa', 1298229, 'kcfcfgvhbjn', 'Kipas, Laptop', '2024-05-26', '6', '3', 4200000),
('fafa', 1298229, 'kcfcfgvhbjn', 'Kipas, Laptop', '2024-05-26', '6', '3', 4200000),
('fafafa', 987654456, 'kfty', 'Laptop, Kulkas', '2024-06-03', '6', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `tanggal` date NOT NULL,
  `kritik` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`tanggal`, `kritik`) VALUES
('2024-05-27', 'Helo');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `visit_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_time`) VALUES
(1, '::1', '2024-06-09 08:36:23'),
(2, '::1', '2024-06-09 08:36:27'),
(3, '::1', '2024-06-09 08:36:28'),
(4, '::1', '2024-06-09 08:36:29'),
(5, '::1', '2024-06-09 08:36:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
