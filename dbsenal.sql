-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 09:06 AM
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
-- Database: `dbsenal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_geronggang`
--

CREATE TABLE `tb_geronggang` (
  `id` int(11) NOT NULL,
  `pokmas` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `progres` int(50) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_geronggang`
--

INSERT INTO `tb_geronggang` (`id`, `pokmas`, `kegiatan`, `progres`, `foto1`, `foto2`) VALUES
(1, 'geronggang', 'awd', 2, '659d04b43e661.png', '659d04b43edeb.png'),
(2, 'entahlah', 'a', 2, '659e4463d6fd5.png', '659e4463d741f.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kepayang`
--

CREATE TABLE `tb_kepayang` (
  `id` int(11) NOT NULL,
  `pokmas` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `progres` int(50) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kepayang`
--

INSERT INTO `tb_kepayang` (`id`, `pokmas`, `kegiatan`, `progres`, `foto1`, `foto2`) VALUES
(48, 'a', 'a', 2, '65a3f9b24ee7a.png', '65a4ca9ca188e.png'),
(49, 'e', 'a', 2, '65a4c9e1cd8af.png', '65a4c9e1cdbe4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_medak`
--

CREATE TABLE `tb_medak` (
  `id` int(11) NOT NULL,
  `pokmas` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `progres` int(50) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_muara`
--

CREATE TABLE `tb_muara` (
  `id` int(11) NOT NULL,
  `pokmas` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `progres` int(50) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_putak`
--

CREATE TABLE `tb_putak` (
  `id` int(11) NOT NULL,
  `pokmas` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `progres` int(50) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'romi', 'romi', 'pengawas'),
(5, 'a', 'a', 'pengawas'),
(6, 'ea', 'a', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_geronggang`
--
ALTER TABLE `tb_geronggang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kepayang`
--
ALTER TABLE `tb_kepayang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_medak`
--
ALTER TABLE `tb_medak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_muara`
--
ALTER TABLE `tb_muara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_putak`
--
ALTER TABLE `tb_putak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_geronggang`
--
ALTER TABLE `tb_geronggang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kepayang`
--
ALTER TABLE `tb_kepayang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_medak`
--
ALTER TABLE `tb_medak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_muara`
--
ALTER TABLE `tb_muara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_putak`
--
ALTER TABLE `tb_putak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
