-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 09:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(30) NOT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan` text NOT NULL,
  `keterangan_pulang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `id_pegawai`, `tanggal`, `jam_masuk`, `jam_pulang`, `keterangan`, `keterangan_pulang`) VALUES
(5, 'user1', '27-05-2022', '09:12:00', NULL, 'terlambat', ''),
(6, 'user2', '27-05-2022', '10:23:00', '11:07:00', 'terlambat', ''),
(9, 'user3', '27-05-2022', '13:04:00', '13:04:00', 'terlambat', 'pulang cepat');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_kantor` varchar(30) NOT NULL,
  `lokasi_kantor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_kantor`, `lokasi_kantor`) VALUES
(1, 'kantor cabang a', 'jklkl'),
(2, 'kantor cabang c', 'cgkuhlijk;');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `nama_shift` varchar(30) NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `nama_shift`, `jam_datang`, `jam_pulang`) VALUES
(2, 'siang', '09:00:00', '17:00:00'),
(5, 'malam', '17:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `kode_user` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lokasi_kantor` varchar(30) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `kode_user`, `nama`, `jabatan`, `email`, `lokasi_kantor`, `shift`, `password`, `status_user`) VALUES
(1, 'user1', 'FDn5eZ', 'alwi', 'web developer', 'user3@gmail.com', 'kantor cabang a', 'siang', '$2y$10$yQz/oY9hi6NG05taoRZDQO9UEg/QUOvSxmhp0lB0.OJ3FBH9t73y2', 0),
(3, 'user2', 'hqrLVi', 'widi', 'mobile developer', 'netflix@ukiyo.ml', 'kantor cabang c', 'siang', '$2y$10$bQMigRr/9XY.JvNN.Pr1xueKhMGTLKztBGkdsrk/zrOEUVo13pBla', 0),
(4, 'user3', 'j4rAex', 'asri', 'mobile developer', 'netflix@ukiyo.ml', 'kantor cabang c', 'siang', '$2y$10$GtqIvB6RAhYXTPdgmd80x./uYMsqL3JOCgSgGSeIQzS7HeR3YGrJ.', 0),
(5, 'stafadmin', '5dye7V', 'alwi', 'admin', 'admin@gmail.com', 'kantor cabang c', 'siang', '$2y$10$ljOLH3HVyJQGEN6KRCOeF.qj.OMwts6GBeztT.5PPoOq/bOtre7ry', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kantor` (`nama_kantor`),
  ADD KEY `nama_kantor_2` (`nama_kantor`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_shift` (`nama_shift`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `shift` (`shift`),
  ADD KEY `lokasi_kantor` (`lokasi_kantor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`lokasi_kantor`) REFERENCES `lokasi` (`nama_kantor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`shift`) REFERENCES `shift` (`nama_shift`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
