-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 11:51 PM
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
-- Database: `db_ruangdiskusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_akun` varchar(10) NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nim`, `nama`, `email`, `password`, `status_akun`) VALUES
('2210511128', 'Nabil Ihsan Syakir', '2210511128@dosen.upnvj.ac.id', '$2y$10$qHGJSIfZm0Q2f/ueBQeLjeT38rWf3F/H7LBWWBxMX8AQorb9ScjQe', 'dosen'),
('2210511131', 'Dwikhi Deandra Purnianto', '2210511131@mahasiswa.upnvj.ac.id', '$2y$10$8E7j3RaOvCvqBlcT/BQVLeood5XAT4OXrR/CXSNR4TxH8D4zPmPrS', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `open_time`, `close_time`) VALUES
(1, 'senin', '07:30:00', '19:00:00'),
(2, 'selasa', '07:30:00', '19:00:00'),
(3, 'rabu', '07:30:00', '19:00:00'),
(4, 'kamis', '07:30:00', '19:00:00'),
(5, 'jumat', '07:30:00', '19:30:00'),
(6, 'sabtu', '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nim` varchar(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_slot` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nim`, `id_ruangan`, `id_slot`, `tanggal`, `hari`) VALUES
(1, '2210511131', 1, 49, '2024-06-21', 'Jumat'),
(2, '2210511131', 1, 50, '2024-06-21', 'Jumat'),
(3, '2210511131', 1, 51, '2024-06-21', 'Jumat'),
(4, '2210511131', 1, 52, '2024-06-21', 'Jumat'),
(5, '2210511131', 1, 53, '2024-06-21', 'Jumat'),
(6, '2210511131', 1, 54, '2024-06-21', 'Jumat'),
(7, '2210511131', 1, 55, '2024-06-21', 'Jumat'),
(9, '2210511128', 1, 1, '2024-06-24', 'Senin'),
(10, '2210511131', 1, 1, '2024-06-24', 'Senin'),
(11, '2210511131', 1, 1, '2024-06-24', 'Senin'),
(12, '2210511131', 1, 3, '2024-06-24', 'Senin'),
(14, '2210511131', 1, 1, '2024-06-24', 'Senin'),
(15, '2210511131', 1, 1, '2024-06-24', 'Senin'),
(16, '2210511131', 1, 1, '2024-06-24', 'Senin'),
(17, '2210511131', 1, 6, '2024-06-24', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Ruangan 1'),
(2, 'Ruangan 2'),
(3, 'Ruangan 3'),
(4, 'Ruangan 4'),
(5, 'Ruangan 5');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id_slot` int(11) NOT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `status` enum('tersedia','penuh') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id_slot`, `hari`, `jam_mulai`, `jam_selesai`, `status`) VALUES
(1, 'senin', '07:30:00', '08:30:00', 'penuh'),
(2, 'senin', '08:30:00', '09:30:00', 'tersedia'),
(3, 'senin', '09:30:00', '10:30:00', 'tersedia'),
(4, 'senin', '10:30:00', '11:30:00', 'tersedia'),
(5, 'senin', '11:30:00', '12:30:00', 'tersedia'),
(6, 'senin', '12:30:00', '13:30:00', 'penuh'),
(7, 'senin', '13:30:00', '14:30:00', 'tersedia'),
(8, 'senin', '14:30:00', '15:30:00', 'tersedia'),
(9, 'senin', '15:30:00', '16:30:00', 'tersedia'),
(10, 'senin', '16:30:00', '17:30:00', 'tersedia'),
(11, 'senin', '17:30:00', '18:30:00', 'tersedia'),
(12, 'senin', '18:30:00', '19:00:00', 'tersedia'),
(13, 'selasa', '07:30:00', '08:30:00', 'tersedia'),
(14, 'selasa', '08:30:00', '09:30:00', 'tersedia'),
(15, 'selasa', '09:30:00', '10:30:00', 'tersedia'),
(16, 'selasa', '10:30:00', '11:30:00', 'tersedia'),
(17, 'selasa', '11:30:00', '12:30:00', 'tersedia'),
(18, 'selasa', '12:30:00', '13:30:00', 'tersedia'),
(19, 'selasa', '13:30:00', '14:30:00', 'tersedia'),
(20, 'selasa', '14:30:00', '15:30:00', 'tersedia'),
(21, 'selasa', '15:30:00', '16:30:00', 'tersedia'),
(22, 'selasa', '16:30:00', '17:30:00', 'tersedia'),
(23, 'selasa', '17:30:00', '18:30:00', 'tersedia'),
(24, 'selasa', '18:30:00', '19:00:00', 'tersedia'),
(25, 'rabu', '07:30:00', '08:30:00', 'tersedia'),
(26, 'rabu', '08:30:00', '09:30:00', 'tersedia'),
(27, 'rabu', '09:30:00', '10:30:00', 'tersedia'),
(28, 'rabu', '10:30:00', '11:30:00', 'tersedia'),
(29, 'rabu', '11:30:00', '12:30:00', 'tersedia'),
(30, 'rabu', '12:30:00', '13:30:00', 'tersedia'),
(31, 'rabu', '13:30:00', '14:30:00', 'tersedia'),
(32, 'rabu', '14:30:00', '15:30:00', 'tersedia'),
(33, 'rabu', '15:30:00', '16:30:00', 'tersedia'),
(34, 'rabu', '16:30:00', '17:30:00', 'tersedia'),
(35, 'rabu', '17:30:00', '18:30:00', 'tersedia'),
(36, 'rabu', '18:30:00', '19:00:00', 'tersedia'),
(37, 'kamis', '07:30:00', '08:30:00', 'tersedia'),
(38, 'kamis', '08:30:00', '09:30:00', 'tersedia'),
(39, 'kamis', '09:30:00', '10:30:00', 'tersedia'),
(40, 'kamis', '10:30:00', '11:30:00', 'tersedia'),
(41, 'kamis', '11:30:00', '12:30:00', 'tersedia'),
(42, 'kamis', '12:30:00', '13:30:00', 'tersedia'),
(43, 'kamis', '13:30:00', '14:30:00', 'tersedia'),
(44, 'kamis', '14:30:00', '15:30:00', 'tersedia'),
(45, 'kamis', '15:30:00', '16:30:00', 'tersedia'),
(46, 'kamis', '16:30:00', '17:30:00', 'tersedia'),
(47, 'kamis', '17:30:00', '18:30:00', 'tersedia'),
(48, 'kamis', '18:30:00', '19:00:00', 'tersedia'),
(49, 'jumat', '07:30:00', '08:30:00', 'tersedia'),
(50, 'jumat', '08:30:00', '09:30:00', 'tersedia'),
(51, 'jumat', '09:30:00', '10:30:00', 'tersedia'),
(52, 'jumat', '10:30:00', '11:30:00', 'tersedia'),
(53, 'jumat', '11:30:00', '12:30:00', 'tersedia'),
(54, 'jumat', '12:30:00', '13:30:00', 'tersedia'),
(55, 'jumat', '13:30:00', '14:30:00', 'tersedia'),
(56, 'jumat', '14:30:00', '15:30:00', 'tersedia'),
(57, 'jumat', '15:30:00', '16:30:00', 'tersedia'),
(58, 'jumat', '16:30:00', '17:30:00', 'tersedia'),
(59, 'jumat', '17:30:00', '18:30:00', 'tersedia'),
(60, 'jumat', '18:30:00', '19:30:00', 'tersedia'),
(61, 'sabtu', '08:00:00', '09:00:00', 'tersedia'),
(62, 'sabtu', '09:00:00', '10:00:00', 'tersedia'),
(63, 'sabtu', '10:00:00', '11:00:00', 'tersedia'),
(64, 'sabtu', '11:00:00', '12:00:00', 'tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_slot` (`id_slot`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id_slot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `akun` (`nim`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `reservasi_ibfk_3` FOREIGN KEY (`id_slot`) REFERENCES `slot` (`id_slot`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
