-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2024 at 01:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int NOT NULL,
  `nama_paket` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_paket` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga_paket`) VALUES
(1, 'Paket Kering', '12000'),
(2, 'Paket Basah', '10000'),
(3, 'Setrika', '9000');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `total_harga` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pending` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `tgl_proses` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `paket_id` int NOT NULL,
  `berat` int NOT NULL,
  `status` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `total_harga`, `tgl_pending`, `tgl_proses`, `tgl_selesai`, `tgl_diterima`, `paket_id`, `berat`, `status`, `user_id`) VALUES
(2, '70000', '2024-02-02 04:15:59.451229', '2024-02-02', '2024-02-02', '2024-02-02', 1, 3, 'diterima', 0),
(38, '48000', '2024-02-02 04:15:59.451229', '2024-02-02', '2024-02-02', '2024-02-02', 1, 4, NULL, 0),
(39, '48000', '2024-02-02 04:15:59.451229', '2024-02-02', '2024-02-02', '2024-02-02', 1, 4, NULL, NULL),
(44, '84000', '2024-02-02 04:15:59.451229', '2024-02-02', '2024-02-02', '2024-02-02', 1, 7, NULL, NULL),
(49, '12000', '2024-02-02 04:15:59.451229', '2024-02-02', '2024-02-02', '2024-02-02', 1, 1, NULL, 3),
(50, '24000', '2024-02-02 04:15:59.451229', '2024-02-02', '2024-02-02', '2024-02-02', 1, 2, NULL, 7),
(62, '24000', '2024-02-02 04:37:56.705158', NULL, NULL, NULL, 1, 2, 'pending', 9),
(63, '27000', '2024-02-02 04:41:46.590751', NULL, NULL, NULL, 3, 3, 'pending', 2),
(64, '36000', '2024-02-04 14:14:39.790596', NULL, NULL, NULL, 1, 3, 'pending', 8),
(65, '36000', '2024-02-04 14:40:00.595446', NULL, NULL, NULL, 1, 3, 'pending', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', 'c483f6ce851c9ecd9fb835ff7551737c', 'admin'),
(13, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
