-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 09:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `lon` varchar(25) NOT NULL,
  `map` text NOT NULL,
  `jam` time NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_user`, `foto`, `lat`, `lon`, `map`, `jam`, `tgl`, `status`) VALUES
(11, 8, '632c0c09df2b8.jpeg', '-6.1899053', '107.0185858', 'https://www.google.com/maps/search/?api=1&query=-6.1899053,107.0185858', '09:17:29', '2022-09-27', '1'),
(87, 8, 'ProfilePegawai376632da10dc39962022-09-23.png', '-', '-', 'https://www.google.co.id/maps', '00:00:00', '2022-09-25', '2'),
(88, 8, 'ProfilePegawai376632da10dc39962022-09-23.png', '-', '-', 'https://www.google.co.id/maps', '00:00:00', '2022-09-24', '2'),
(95, 9, '632ecbd6a9e6c.jpeg', '-6.1997056', '106.872832', 'https://www.google.com/maps/search/?api=1&query=-6.1997056,106.872832', '16:20:22', '2022-09-26', '1'),
(99, 9, '6334061031961.jpeg', '-6.2193664', '106.9056', 'https://www.google.com/maps/search/?api=1&query=-6.2193664,106.9056', '15:30:08', '2022-09-28', '1'),
(100, 13, 'izin811633408120e3472022-09-28.jpg', '-', '-', 'https://www.google.co.id/maps', '00:00:00', '2022-09-28', '2');

-- --------------------------------------------------------

--
-- Table structure for table `dapur`
--

CREATE TABLE `dapur` (
  `id_dapur` int(11) NOT NULL,
  `nama_dapur` varchar(55) NOT NULL,
  `alamat_dapur` text NOT NULL,
  `is_active_dapur` enum('1','0') NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dapur`
--

INSERT INTO `dapur` (`id_dapur`, `nama_dapur`, `alamat_dapur`, `is_active_dapur`, `tgl_input`, `tgl_update`) VALUES
(2, 'Bekasi', 'asd', '1', '2022-07-07 19:20:54', '0000-00-00 00:00:00'),
(3, 'Dapur Depok', 'asda', '1', '2022-07-28 17:50:05', '0000-00-00 00:00:00'),
(4, 'Jonggol', 'a', '1', '2022-08-16 16:10:53', '0000-00-00 00:00:00'),
(5, 'd', 'd', '1', '2022-09-28 15:36:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status_izin` varchar(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id_izin`, `id_user`, `jenis`, `keterangan`, `bukti`, `tgl_awal`, `tgl_akhir`, `status_izin`, `tgl`) VALUES
(3, 10, 'Sakit', 'Covid', 'ProfilePegawai376632da10dc39962022-09-23.png', '2022-09-23', '2022-09-24', 'Disetujui', '2022-09-23'),
(4, 10, 'Sakit', 'asd', 'izin901632e99f7b81b02022-09-24.jpg', '2022-10-11', '2022-10-13', 'Pending', '2022-09-24'),
(5, 13, 'Cuti', 'd', 'izin811633408120e3472022-09-28.jpg', '2022-09-28', '2022-09-28', 'Disetujui', '2022-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` enum('1','2','3','4') NOT NULL,
  `id_dapur` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama`, `no_hp`, `profile`, `password`, `alamat`, `role_id`, `id_dapur`, `is_active`, `tgl_input`, `tgl_update`) VALUES
(7, 'andreas', 'Andreas', '088888888888', 'default.png', '$2y$10$/035h49xi95epMHN9M9pnux2fWGHYT9VEApTLOUJeKRjwskvrgtdO', 'qwe', '2', 4, '1', '2022-07-28 19:11:15', '0000-00-00 00:00:00'),
(8, 'septi', 'Septiani', '088888888888', 'default.png', '$2y$10$movz4NKubnj6IitDBGU4qOeAWSP.GyAZumdESRaMYVLTPSbxWEHOm', 'qweqwe', '2', 3, '1', '2022-07-06 17:24:57', '0000-00-00 00:00:00'),
(9, 'aldy', 'Aldy', '088888888888', 'default.png', '$2y$10$EO3HJ.AcbThX/cj81gRFy.TYJOq1Txu2aamKzfzvB67T5p0XMVuhy', 'asdasd', '2', 2, '1', '2022-08-18 18:04:37', '0000-00-00 00:00:00'),
(10, 'admin', 'Lidiana', '088888888888', 'default.png', '$2y$10$4Oj7HdqkTgh/7TFP8M5SpeQWoODjfh2LLGff9ZKzJp9Fm6wEEB/MG', 'bekasi', '1', 2, '1', '2022-08-10 14:55:27', '0000-00-00 00:00:00'),
(12, 'admin2', 'Sulfi', '088888888888', 'default.png', '$2y$10$fFVQn2lAEsBl00XQbQQJBuoK6gJdz3EuHvyZwDRLt9ecnwbVR2tgG', 'qqq', '1', 1, '1', '2022-08-16 17:17:59', '0000-00-00 00:00:00'),
(13, 'd', 'd', '2', 'ProfilePegawai818633407c82e65d2022-09-28.png', '$2y$10$Cp8ra3wG9sjStDOEPKjZvOHJRAQJjdSbzwfvLFHMNzZY2bIpb4HSW', 'd', '2', 5, '1', '2022-09-28 15:37:28', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `dapur`
--
ALTER TABLE `dapur`
  ADD PRIMARY KEY (`id_dapur`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `dapur`
--
ALTER TABLE `dapur`
  MODIFY `id_dapur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
