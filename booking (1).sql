-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2017 at 04:02 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `lcd` int(11) NOT NULL,
  `speaker` int(11) NOT NULL,
  `laptop` int(11) NOT NULL,
  `microphone` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `tv` int(11) NOT NULL,
  `extension` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `jawatan` varchar(255) NOT NULL,
  `no_tel` varchar(255) NOT NULL,
  `approval` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `user_id`, `location`, `lcd`, `speaker`, `laptop`, `microphone`, `screen`, `tv`, `extension`, `nama_program`, `jawatan`, `no_tel`, `approval`, `start_date`, `end_date`) VALUES
(8, 23, 'Dewan', 1, 1, 1, 1, 1, 1, 1, 'Meriah', 'Pengerusi', '014-2444421', 1, '2017-01-01 02:00:00', '2017-01-25 16:00:00'),
(9, 23, 'Dewan', 0, 0, 0, 0, 1, 0, 0, 'Share Dewan Ciked', 'Setiausaha', '013-3525444', 1, '2017-02-02 09:00:00', '2017-02-02 12:00:00'),
(10, 23, 'Dewan', 0, 0, 0, 0, 1, 0, 0, 'Testis', 'asd', 'asd', 0, '2017-02-03 08:00:00', '2017-02-03 23:59:59'),
(11, 23, 'Dewan', 0, 0, 0, 0, 0, 0, 0, 'lol', 'asd', 'asd', 1, '2017-02-03 00:00:00', '2017-02-03 14:00:00'),
(12, 23, 'Dewan', 0, 0, 0, 0, 0, 0, 0, 'lel', 'asd', 'asd', 0, '2017-03-02 12:00:00', '2017-03-02 23:00:00'),
(13, 23, 'Dewan', 0, 0, 0, 0, 0, 0, 0, 'Test double layer', 'asd', 'asd', 1, '2017-02-03 17:00:00', '2017-02-03 18:00:00'),
(14, 23, 'Auditorium', 0, 0, 0, 0, 0, 0, 0, 'Konserto ', 'asd', 'asd', 1, '2017-01-25 08:00:00', '2017-01-25 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_matrik` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `ic`, `alamat`, `email`, `no_matrik`, `password`, `user_type`) VALUES
(16, 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', '$2y$10$7nrosxik.fHDMxmznOStkuw0hyrYwH7WFRzQTqftbzlQlOootAt2m', 1),
(23, 'user@user.com', 'user@user.com', 'user@user.com', 'user@user.com', 'user@user.com', '$2y$10$l2iw8yD5/EVEIb6iMOkS2uR2h3X9AU2n2qskc8/tObgvrxsi9HVnC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
