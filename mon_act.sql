-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 03:47 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(10) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `no_relp` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jabatan` int(2) NOT NULL COMMENT '0 spv administrator, 1 pm, 2 admin, 3 gudang, 4 QC',
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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `nama_product` varchar(200) NOT NULL,
  `bandwith` int(200) NOT NULL,
  `status` int(1) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `alamat_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
