-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 10:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_soul_studio_art`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artist`
--

CREATE TABLE `tb_artist` (
  `id_artist` varchar(15) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kebangsaan` varchar(100) NOT NULL,
  `biografi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artwork`
--

CREATE TABLE `tb_artwork` (
  `id_artwork` varchar(15) NOT NULL,
  `id_artist` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_exhibition`
--

CREATE TABLE `tb_exhibition` (
  `id_pameran` varchar(15) NOT NULL,
  `id_artist` varchar(15) NOT NULL,
  `id_artwork` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_artist`
--
ALTER TABLE `tb_artist`
  ADD PRIMARY KEY (`id_artist`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_artwork`
--
ALTER TABLE `tb_artwork`
  ADD PRIMARY KEY (`id_artwork`),
  ADD KEY `id_artist` (`id_artist`);

--
-- Indexes for table `tb_exhibition`
--
ALTER TABLE `tb_exhibition`
  ADD PRIMARY KEY (`id_pameran`),
  ADD KEY `id_artist` (`id_artist`),
  ADD KEY `id_artwork` (`id_artwork`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_artist`
--
ALTER TABLE `tb_artist`
  ADD CONSTRAINT `tb_artist_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_artwork`
--
ALTER TABLE `tb_artwork`
  ADD CONSTRAINT `tb_artwork_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `tb_artist` (`id_artist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_exhibition`
--
ALTER TABLE `tb_exhibition`
  ADD CONSTRAINT `tb_exhibition_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `tb_artist` (`id_artist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_exhibition_ibfk_2` FOREIGN KEY (`id_artwork`) REFERENCES `tb_artwork` (`id_artwork`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
