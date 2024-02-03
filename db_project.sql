-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 11:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_role`
--

CREATE TABLE `master_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_role`
--

INSERT INTO `master_role` (`id`, `role_id`, `role_description`) VALUES
(1, 1, 'Admin'),
(2, 2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `stock`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 'Motor Suprax', '5000000', 2, 'Admin', '2024-02-02 00:53:21', NULL, '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 'Anjay', '20000', 20, '', '2024-02-02 20:05:54', NULL, NULL, 0, NULL, NULL),
(4, 'anjayani', '123', 123, '', '2024-02-03 15:36:55', NULL, NULL, 0, NULL, NULL),
(5, 'yeye', '123', 123, 'Superadmin', '2024-02-03 16:02:41', NULL, NULL, 0, NULL, NULL),
(6, 'yeyeye', '123', 12312, 'Superadmin', '2024-02-03 16:03:00', NULL, NULL, 0, NULL, NULL),
(7, 'brorborborbor', '11231', 123, 'Superadmin', '2024-02-03 16:03:12', 'Superadmin', '2024-02-03 16:20:56', 0, NULL, NULL),
(9, 'coba ya', '123', 123, 'Superadmin', '2024-02-03 16:34:55', NULL, NULL, 0, NULL, NULL),
(10, 'asd', '123', 123, 'Superadmin', '2024-02-03 16:36:49', NULL, NULL, 1, 'Superadmin', '2024-02-03 16:45:38'),
(11, 'cuyyyyy nyoba edit yo', '123', 123, 'Superadmin', '2024-02-03 16:36:59', 'Superadmin', '2024-02-03 16:37:41', 1, 'Superadmin', '2024-02-03 16:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` int(11) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `phone`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 'Superadmin', 'admin1', '0cc175b9c0f1b6a831c399e269772661', 1, '12345678', NULL, '2024-02-02 00:03:23', NULL, '0000-00-00 00:00:00', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `from_url` varchar(256) NOT NULL,
  `from_ip` varchar(20) NOT NULL,
  `mac_address` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `username`, `message`, `action`, `from_url`, `from_ip`, `mac_address`, `date`) VALUES
(1, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-01 17:04:11'),
(2, 'admin1', 'logout sukses', 'logout', 'http://localhost', '::1', '', '2024-02-01 17:04:20'),
(3, 'admin', 'login gagal', 'login', 'http://localhost', '::1', '', '2024-02-01 17:13:20'),
(4, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-01 17:13:22'),
(5, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-02 12:26:06'),
(6, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-03 08:23:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_role`
--
ALTER TABLE `master_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_role`
--
ALTER TABLE `master_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
