-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 05:57 PM
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
  `barcode_id` varchar(255) DEFAULT NULL,
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

INSERT INTO `product` (`id`, `barcode_id`, `product_name`, `price`, `stock`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 'BRG0001', 'Tomat', '1000', 500, '1', '2024-02-20 22:56:49', NULL, NULL, 0, NULL, NULL),
(2, 'BRG0002', 'Wortel', '2000', 1000, '1', '2024-02-20 22:56:59', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_deleted` varchar(1) DEFAULT '0',
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `name`, `address`, `city`, `province`, `created_by`, `created_at`, `updated_at`, `updated_by`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 'adit', 'Pasar Cikereteg, Kp. Ciletuh RT 02 RW 08 sebelah villa bumi arrasy', 'Bogor, Caringin, Ciderum', 'JB', '1', '2024-02-04 08:46:59', '2024-02-04 08:53:34', '1', '0', NULL, NULL),
(2, 'adit', 'Pasar Cikereteg, Kp. Ciletuh RT 02 RW 08 sebelah villa bumi arrasy', 'Bogor, Caringin, Ciderum', 'JB', '1', '2024-02-04 08:48:26', NULL, NULL, '1', '1', '2024-02-04 08:48:49'),
(3, 'Aditya Ridwan Nugraha', 'Pasar Cikereteg, Kp. Ciletuh RT 02 RW 08 sebelah villa bumi arrasy', 'Bogor, Caringin, Ciderum', 'JB', '1', '2024-02-04 08:53:46', NULL, NULL, '0', NULL, NULL),
(4, 'asep', 'asdasd', 'asdasd', 'asdasd', '1', '2024-02-04 08:54:00', NULL, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `ID_Penjualan` int(11) NOT NULL,
  `ID_Transaksi` int(11) NOT NULL,
  `Nama_Barang` varchar(100) NOT NULL,
  `Harga_Barang` int(11) NOT NULL,
  `Jumlah_Barang` int(11) NOT NULL,
  `Jumlah_Transaksi_Barang` int(11) NOT NULL,
  `Created_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Created_By` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`ID_Penjualan`, `ID_Transaksi`, `Nama_Barang`, `Harga_Barang`, `Jumlah_Barang`, `Jumlah_Transaksi_Barang`, `Created_Date`, `Created_By`) VALUES
(14, 1, 'Tomat', 1000, 10, 10000, '2024-02-20 22:57:46', '1'),
(15, 1, 'Wortel', 2000, 20, 40000, '2024-02-20 22:57:49', '1'),
(16, 2, 'Tomat', 1000, 500, 500000, '2024-02-20 22:58:25', '1'),
(19, 3, 'Wortel', 2000, 900, 1800000, '2024-02-20 23:50:35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `Nomor_Invoice` varchar(255) NOT NULL,
  `Is_Paid` int(11) DEFAULT 0,
  `Bill` int(11) NOT NULL DEFAULT 0,
  `Paid` int(11) NOT NULL DEFAULT 0,
  `Paid_Type` varchar(100) DEFAULT NULL,
  `Bukti_Transfer` varchar(255) DEFAULT NULL,
  `Period_Month` varchar(50) DEFAULT NULL,
  `Period_Year` varchar(50) DEFAULT NULL,
  `Created_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Created_By` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`ID_Transaksi`, `Nomor_Invoice`, `Is_Paid`, `Bill`, `Paid`, `Paid_Type`, `Bukti_Transfer`, `Period_Month`, `Period_Year`, `Created_Date`, `Created_By`) VALUES
(1, 'TRINV0001', 1, 50000, 50000, 'Tunai', NULL, 'Januari', '2024', '2024-01-20 22:52:12', '1'),
(2, 'TRINV0002', 1, 500000, 500000, 'Transfer', 'bukti_transfer_1708444745.png', 'Februari', '2024', '2024-02-20 22:58:22', '1'),
(3, 'TRINV0003', 1, 1800000, 1800000, 'Transfer', 'bukti_transfer_1708447853.png', 'Februari', '2024', '2024-02-20 23:49:58', '1');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `phone`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 'Superadmin', 'admin1', 'a', 1, '12345678', NULL, '2024-02-02 00:03:23', NULL, '0000-00-00 00:00:00', 'ACTIVE'),
(8, 'rusman', 'rusmin', '123', 2, '123', '1', '2024-02-04 00:46:14', '1', '2024-02-04 00:47:09', 'ACTIVE'),
(9, 'ramzi', 'ramzi', '123', 2, '123', '1', '2024-02-04 00:46:25', NULL, '0000-00-00 00:00:00', 'ACTIVE');

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
(6, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-03 08:23:40'),
(7, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-03 15:02:05'),
(8, 'admin1', 'logout sukses', 'logout', 'http://localhost', '::1', '', '2024-02-03 15:47:27'),
(9, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-03 15:47:31'),
(10, 'admin1', 'logout sukses', 'logout', 'http://localhost', '::1', '', '2024-02-03 17:25:10'),
(11, 'adit', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-03 17:25:13'),
(12, 'adit', 'logout sukses', 'logout', 'http://localhost', '::1', '', '2024-02-03 17:25:17'),
(13, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-03 17:25:22'),
(14, 'admin', 'login gagal', 'login', 'http://localhost', '::1', '', '2024-02-04 01:29:28'),
(15, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-04 01:29:32'),
(16, 'admin1', 'logout sukses', 'logout', 'http://localhost', '::1', '', '2024-02-04 01:57:37'),
(17, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-04 01:57:42'),
(18, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-14 10:46:57'),
(19, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-17 17:01:44'),
(20, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-18 07:29:23'),
(21, 'admin1', 'login sukses', 'login', 'http://localhost', '::1', '', '2024-02-20 14:34:28');

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
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`ID_Penjualan`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `ID_Penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;