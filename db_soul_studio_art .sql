-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2024 at 10:16 PM
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
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Marita Putri Nabila', 'halo@gmail.com', 'halohola123', '$2y$10$N6jTcI10lN9nu4x84PmZXOINSiGfCTPwDpcylhoepeE8yn2dyqqS6'),
(5, 'Mencoba Dulu', 'coba@gmail.com', 'cobacoba', '$2y$10$Z7fR./WOspCKmbMjSjE5WOO/fhaIAh626arxmQ599MLfmdoYjTycu'),
(7, 'Marita Putri Nabila', 'marita@gmail.com', 'marita123', '$2y$10$OhUQ.bqEEXoO.fv7xMMr2OXRKUDsMZRhS2kopyXQohetQKYGdM1KC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artist`
--

CREATE TABLE `tb_artist` (
  `id` int NOT NULL,
  `lahir` date NOT NULL,
  `bangsa` varchar(50) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artwork`
--

CREATE TABLE `tb_artwork` (
  `id` int NOT NULL,
  `photo` varchar(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_artwork`
--

INSERT INTO `tb_artwork` (`id`, `photo`, `judul`, `artist`, `kategori`, `deskripsi`) VALUES
(4, '664a037d6356f.jpg', 'Starry Night Over the Rhône', 'Vincent Van Gogh', 'Seni Lukis', 'Lukisan yang berjudul Starry Night Over the Rhône, adalah karya dari Vincent van Gogh, seorang pelukis Belanda yang terkenal dengan gaya Impresionisme dan Post-Impresionisme. '),
(8, '664d1cf0c1391.jpeg', 'The Scream', 'Edvard Munch', 'Seni Lukis', 'Lukisan \"The Scream\" karya Edvard Munch adalah salah satu lukisan paling ikonik dalam sejarah seni. Lukisan ini menggambarkan seorang pria yang sedang menjerit dengan mulut terbuka dan telinga tertutup. Lukisan ini juga menampilkan langit berwarna merah dan dua orang lain di kejauhan.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_exhibition`
--

CREATE TABLE `tb_exhibition` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `artwork` varchar(100) NOT NULL,
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_artist`
--
ALTER TABLE `tb_artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_artwork`
--
ALTER TABLE `tb_artwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_exhibition`
--
ALTER TABLE `tb_exhibition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_artist`
--
ALTER TABLE `tb_artist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_artwork`
--
ALTER TABLE `tb_artwork`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_exhibition`
--
ALTER TABLE `tb_exhibition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
