-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 03:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mon_act`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `alamat_id` int(10) NOT NULL,
  `jalan` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `negara` varchar(200) NOT NULL,
  `koordinat` varchar(200) NOT NULL,
  `type` int(2) NOT NULL COMMENT '0 ho, 1 ori, 2 termi',
  `kontak` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`alamat_id`, `jalan`, `kota`, `provinsi`, `negara`, `koordinat`, `type`, `kontak`, `no_telp`, `create_on`, `create_by`, `update_on`, `update_by`, `delete_on`, `delete_by`, `status`, `customer_id`) VALUES
(1, 'ketintang', 'surabaya', 'jawa timur', 'indonesia', '12312131313', 2, '123123', '12313', '0000-00-00', 1, '0000-00-00', 0, '0000-00-00', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `nama_customer` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `npwp` int(20) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nama_customer`, `phone`, `fax`, `alamat`, `email`, `npwp`, `create_on`, `create_by`, `update_on`, `update_by`, `delete_on`, `delete_by`, `status`) VALUES
(1, 'aaaaaa', '', '1111111', 'surabayaaaa', 'intiland@gmail.comaa', 2147483647, '0000-00-00', 1, '0000-00-00', 0, '2020-10-03', 0, 0),
(2, 'rene', '678', '09888', 'mana yo', 'mana@gmail.com', 9878, '0000-00-00', 1, '2020-10-05', 0, '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(10) NOT NULL,
  `nama_material` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `stok` int(20) NOT NULL,
  `storage_bin` varchar(200) NOT NULL,
  `create_by` int(10) NOT NULL,
  `create_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `mitra_id` int(10) NOT NULL,
  `nama_mitra` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `create_by` int(10) NOT NULL,
  `create_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`mitra_id`, `nama_mitra`, `alamat`, `kota`, `no_telp`, `fax`, `email`, `password`, `npwp`, `create_by`, `create_on`, `update_by`, `update_on`, `delete_by`, `delete_on`, `status`) VALUES
(1, 'mitra', 'mitra', 'surabaya', '1231', '1231', 'mitra@test.com', '92706ba4fd3022cede6d', '345345', 4, '0000-00-00', 1, '0000-00-00', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(10) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jabatan` int(2) NOT NULL COMMENT '0 spv , 1 pm, 2 admin, 3 gudang, 4 QC, -1 dev',
  `create_by` int(10) NOT NULL,
  `create_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `nama_pegawai`, `no_telp`, `email`, `password`, `jabatan`, `create_by`, `create_on`, `update_by`, `update_on`, `delete_by`, `delete_on`, `status`) VALUES
(1, 'iwan', '082244355566', 'iwan@gmail.com', '01ccce480c60fcdb67b54f4509ffdb56', 0, 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(2, 'pm', '123', 'pm@gmail.com', '5109d85d95fece7816d9704e6e5b1279', 1, 1, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(3, 'admin', '456', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1, '0000-00-00', 1, '0000-00-00', 0, '0000-00-00', 1),
(4, 'spv', '789', 'spv@gmail.com', 'f4984324c6673ce07aafac15600af26e', 0, 1, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(5, 'gudang', '87', 'gudang@gmail.com', '202446dd1d6028084426867365b0c7a1', 3, 4, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(6, 'qc', '123', 'qc@gmai.com', '9300c96aaec324987ea5ca6e13a02eda', 4, 1, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(7, 'dev', '123', 'dev@test.com', 'e77989ed21758e78331b20e477fc5582', -1, 1, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` int(10) NOT NULL,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`pekerjaan_id`, `nama_pekerjaan`, `satuan`, `price`, `create_on`, `create_by`, `update_on`, `update_by`, `delete_on`, `delete_by`, `status`) VALUES
(1, 'penarikan', 'm', 4000, '0000-00-00', 1, '2020-09-29', 1, '0000-00-00', 0, 1),
(2, 'joint', 'core', 8000, '0000-00-00', 1, '0000-00-00', 0, '2020-09-29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `nama_product` varchar(200) NOT NULL,
  `bandwith` int(200) NOT NULL,
  `satuan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `nama_product`, `bandwith`, `satuan`, `status`, `create_on`, `create_by`, `update_on`, `update_by`, `delete_on`, `delete_by`) VALUES
(1, 'as', 1231, 0, 1, '0000-00-00', 1, '0000-00-00', 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`alamat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`mitra_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `alamat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
