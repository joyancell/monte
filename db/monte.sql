-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 11:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bilangan_acak`
--

CREATE TABLE `bilangan_acak` (
  `id_bilangan_acak` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tahun` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bilangan_acak`
--

INSERT INTO `bilangan_acak` (`id_bilangan_acak`, `nilai`, `tahun`) VALUES
(1, 82, 2022),
(2, 75, 2022),
(3, 77, 2022),
(4, 5, 2022),
(5, 97, 2022),
(6, 85, 2022),
(7, 17, 2022),
(8, 65, 2022),
(9, 37, 2022),
(10, 45, 2022),
(11, 57, 2022),
(12, 25, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `frekuensi` int(11) NOT NULL,
  `dis_probabilitas` float NOT NULL,
  `dis_kumulatif` float NOT NULL,
  `interval_awal` int(11) NOT NULL,
  `interval_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `bulan`, `tahun`, `golongan`, `frekuensi`, `dis_probabilitas`, `dis_kumulatif`, `interval_awal`, `interval_akhir`) VALUES
(1, 'Januari', '2019', 'A', 2403, 0.175005, 0.175005, 0, 17),
(2, 'Februari', '2019', 'A', 1956, 0.142451, 0.317457, 18, 31),
(3, 'Maret', '2019', 'A', 981, 0.0714442, 0.388901, 32, 38),
(4, 'April', '2019', 'A', 678, 0.0493773, 0.438278, 39, 43),
(5, 'Mei', '2019', 'A', 1005, 0.073192, 0.51147, 44, 51),
(6, 'Juni', '2019', 'A', 1242, 0.0904523, 0.601923, 52, 60),
(7, 'Juli', '2019', 'A', 903, 0.0657636, 0.667686, 61, 66),
(8, 'Agustus', '2019', 'A', 1107, 0.0806205, 0.748307, 67, 74),
(9, 'September', '2019', 'A', 882, 0.0642342, 0.812541, 75, 81),
(10, 'Oktober', '2019', 'A', 900, 0.0655451, 0.878086, 82, 87),
(11, 'November', '2019', 'A', 903, 0.0657636, 0.94385, 88, 94),
(12, 'Desember', '2019', 'A', 771, 0.0561503, 1, 95, 100);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `distribusi` varchar(30) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `hasil` int(11) NOT NULL,
  `data_real` int(11) NOT NULL DEFAULT 0,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `frekuensi` int(11) NOT NULL,
  `dis_probabilitas` float NOT NULL,
  `dis_kumulatif` float NOT NULL,
  `interval_awal` int(11) NOT NULL,
  `interval_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `bulan`, `tahun`, `golongan`, `frekuensi`, `dis_probabilitas`, `dis_kumulatif`, `interval_awal`, `interval_akhir`) VALUES
(1, 'Januari', '2018', 'AB', 165, 0.131894, 0.131894, 0, 13),
(2, 'Februari', '2018', 'AB', 81, 0.0647482, 0.196643, 14, 19),
(3, 'Maret', '2018', 'AB', 130, 0.103917, 0.30056, 20, 30),
(4, 'April', '2018', 'AB', 95, 0.0759392, 0.376499, 31, 37),
(5, 'Mei', '2018', 'AB', 72, 0.057554, 0.434053, 38, 43),
(6, 'Juni', '2018', 'AB', 57, 0.0455635, 0.479616, 44, 47),
(7, 'Juli', '2018', 'AB', 106, 0.0847322, 0.564349, 48, 56),
(8, 'Agustus', '2018', 'AB', 91, 0.0727418, 0.63709, 57, 63),
(9, 'September', '2018', 'AB', 154, 0.123102, 0.760192, 64, 76),
(10, 'Oktober', '2018', 'AB', 146, 0.116707, 0.876898, 77, 87),
(11, 'November', '2018', 'AB', 58, 0.0463629, 0.923261, 88, 92),
(12, 'Desember', '2018', 'AB', 96, 0.0767386, 1, 93, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bilangan_acak`
--
ALTER TABLE `bilangan_acak`
  ADD PRIMARY KEY (`id_bilangan_acak`) USING BTREE;

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bilangan_acak`
--
ALTER TABLE `bilangan_acak`
  MODIFY `id_bilangan_acak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
