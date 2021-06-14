-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 06, 2021 at 03:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_ticket_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_lists`
--

CREATE TABLE `bus_lists` (
  `id` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `bus_company` varchar(255) NOT NULL,
  `bus_type` varchar(255) NOT NULL,
  `bus_no` int(11) NOT NULL,
  `fare` decimal(4,2) NOT NULL,
  `seats` int(11) NOT NULL,
  `trip_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_lists`
--

INSERT INTO `bus_lists` (`id`, `start`, `end`, `time`, `bus_company`, `bus_type`, `bus_no`, `fare`, `seats`, `trip_no`) VALUES
(1, 'Kuala Lumpur', 'Malacca', '07:30:00', 'KKKL Express', 'AC', 10, '15.90', 40, 1),
(2, 'Putrajaya', 'Kuala Kangsar', '14:15:00', 'LA Holidays', 'Standard', 19, '23.90', 40, 2),
(3, 'Muar', 'Kuantan', '16:30:00', 'Mayang Sari', 'Executive', 4, '33.10', 40, 3),
(4, 'Penang', 'Seremban', '22:05:00', 'Perdana Express', 'Standard', 25, '55.70', 40, 4),
(5, 'Setiu', 'Putrajaya', '16:10:00', 'Transnasional', 'Standard', 63, '63.55', 40, 5),
(6, 'Kota Bharu', 'Kemaman', '06:00:00', '707-Inc', 'Executive', 13, '23.20', 40, 6),
(7, 'Sungai Petani', 'Perlis', '23:15:03', 'Perdana Express', 'Standard', 2, '18.33', 40, 7),
(8, 'Kuala Besut ', 'Teluk Intan', '07:10:00', 'KKKL Express', 'Executive', 5, '47.70', 40, 8),
(9, 'Shah Alam', 'Rantau Panjang', '04:26:00', 'KKKL Express', 'Executive', 55, '78.90', 40, 9),
(10, 'Raub', 'Kuala Lumpur', '12:18:00', 'Mayang Sari', 'Standard', 22, '32.00', 40, 10),
(11, 'Kuala Terengganu', 'Klang', '16:08:00', '707-Inc', 'Standard', 11, '56.90', 40, 11),
(13, 'Nilai', 'Pasir Puteh', '01:20:00', 'Perdana Express', 'Executive', 25, '21.35', 40, 13),
(14, 'Kuala Lumpur', 'Malacca', '10:45:00', 'Transnasional', 'Executive', 56, '21.50', 40, 14);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_lists`
--

CREATE TABLE `passenger_lists` (
  `passenger_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `phone_no` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger_lists`
--

INSERT INTO `passenger_lists` (`passenger_id`, `name`, `phone_no`, `gender`, `email`) VALUES
(1, 'Seh Chia Shin', '0123171337', 'Female', 'chiashin@gmail.com'),
(2, 'John Wick', '0123456789', 'Male', 'john@gmail.com'),
(3, 'John Cena', '0134567894', 'Male', 'wickjohn@gmail.com'),
(4, 'Barack Obama', '0192548238', 'Male', 'obama@gmail.com'),
(5, 'Billy Eilish', '01237628910', 'Female', 'billy@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_lists`
--

CREATE TABLE `reserved_lists` (
  `reserved_id` int(11) NOT NULL,
  `ref_num` int(255) NOT NULL,
  `date` date NOT NULL,
  `seats` varchar(500) NOT NULL,
  `no_seats` int(11) NOT NULL,
  `status` varchar(500) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserved_lists`
--

INSERT INTO `reserved_lists` (`reserved_id`, `ref_num`, `date`, `seats`, `no_seats`, `status`, `passenger_id`, `bus_id`) VALUES
(1, 4272471, '2021-06-22', 'D1, D2', 2, 'PAID', 1, 14),
(2, 7065860, '2021-06-30', 'I3, I4', 2, 'PAID', 2, 7),
(3, 5492346, '2021-07-10', 'F1, H1, F2', 3, 'PAID', 3, 4),
(4, 9918181, '2021-08-05', 'E3, F3, E4, F4', 4, 'PAID', 4, 9),
(5, 3274637, '2021-07-07', 'J1, J2', 2, 'PAID', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `subscribe_id` int(11) NOT NULL,
  `sub_email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`subscribe_id`, `sub_email`) VALUES
(1, 'chia.shin@hotmail.com'),
(2, 'wie190045@siswa.um.edu.my'),
(3, 'shinnnnnn@gmail.com'),
(4, 'sehhhhhh@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_lists`
--
ALTER TABLE `bus_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trip_no` (`trip_no`);

--
-- Indexes for table `passenger_lists`
--
ALTER TABLE `passenger_lists`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `reserved_lists`
--
ALTER TABLE `reserved_lists`
  ADD PRIMARY KEY (`reserved_id`),
  ADD KEY `busidFK` (`bus_id`),
  ADD KEY `passengeridFK` (`passenger_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger_lists`
--
ALTER TABLE `passenger_lists`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reserved_lists`
--
ALTER TABLE `reserved_lists`
  MODIFY `reserved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserved_lists`
--
ALTER TABLE `reserved_lists`
  ADD CONSTRAINT `busidFK` FOREIGN KEY (`bus_id`) REFERENCES `bus_lists` (`id`),
  ADD CONSTRAINT `passengeridFK` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_lists` (`passenger_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
