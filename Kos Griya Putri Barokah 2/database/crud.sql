-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 07:17 AM
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
-- Table structure for table `data_kos`
--

CREATE TABLE `data_kos` (
  `nama` varchar(100) NOT NULL,
  `nomor_hp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `sewa_bulan` varchar(100) NOT NULL,
  `no_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('0000-00-00', ''),
('0000-00-00', ''),
('0000-00-00', ''),
('0000-00-00', ''),
('2024-05-26', 'Terimakasih Pak'),
('2024-05-26', 'Terimakasih Pak'),
('2024-05-26', 'Terimakasih Pak'),
('2024-05-26', 'Terimakasih Pak'),
('2024-05-26', 'Terimakasih Pak'),
('2024-05-26', 'Terimakasih mas'),
('2024-05-27', 'Halo'),
('2024-05-27', 'Halo'),
('2024-05-27', 'Halo Mas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
