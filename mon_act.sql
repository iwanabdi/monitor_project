-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 12:57 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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
CREATE DATABASE IF NOT EXISTS `mon_act` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mon_act`;

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

DROP TABLE IF EXISTS `alamat`;
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
(1, 'ketintang', 'surabaya', 'jawa timur', 'indonesia', '12312131313', 0, 'roni', '12313', '0000-00-00', 1, '2020-10-05', 7, '0000-00-00', 0, 1, 2),
(2, 'maospati', 'sidoarjo', 'jawa timur', 'indonesia', '-7.123, 114.3543', 2, 'alex', '123', '2020-10-05', 7, '2020-10-05', 7, '0000-00-00', 0, 1, 3),
(4, 'mall', 'malang', 'jawa timur', 'indonesia', '-7', 2, 'bambang', '123', '2020-10-05', 7, '2020-10-06', 7, '0000-00-00', 0, 1, 3),
(5, 'blitar', 'blitar', 'jawa timur', 'indonesia', '-8,413', 2, 'marvel', '8987', '2020-10-06', 7, '0000-00-00', 0, '2020-10-06', 7, 0, 3),
(6, 'mall', 'malang', 'jawa timur', 'indonesia', '-7.12313142,112.1231345', 0, 'ara', '09898', '2020-10-06', 7, '2020-10-06', 7, '2020-10-06', 7, 0, 2),
(8, 'Samsat Kediri Kota Jalan Anggrek', 'Kota Kediri', 'Jawa Timur', 'Indonesia', '-7.123, 114.3543', 2, 'adi', '7655998771', '2020-11-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1, 3),
(9, 'Samsat Jombang Jalan Arjomulyo', 'Kabupaten Jombang', 'Jawa Timur', 'Indonesia', '-7.12313142,112.1314', 2, 'doni', '88754331321', '2020-11-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1, 3),
(10, 'Tunjungan Plaza', 'Kota Surabaya', 'Jawa Timur', 'Indonesia', '', 2, 'bambang', '12356789713', '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1, 4),
(11, 'genteng', 'Kabupaten Garut', 'Jawa Barat', 'Indonesia', '', 2, 'ronald', '82244355566', '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `nama_customer` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `npwp` varchar(20) NOT NULL,
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
(1, 'aaaaaa', '', '1111111', 'surabayaaaa', 'intiland@gmail.comaa', '2147483647', '0000-00-00', 1, '0000-00-00', 0, '2020-10-03', 0, 0),
(2, 'rene', '678', '09888', 'mana yo', 'mana@gmail.com', '9878', '0000-00-00', 1, '2020-10-05', 0, '0000-00-00', 0, 1),
(3, 'dispenda', '031', '031', 'manyar', 'dispenda@dispenda.com', '12314', '2020-10-05', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(4, 'holand', '123476', '2346', 'malang malang lmang blitar malang lmang blitar', 'holan@holan.com', '2147483647', '2020-10-06', 7, '2020-10-06', 0, '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dgi`
--

DROP TABLE IF EXISTS `dgi`;
CREATE TABLE `dgi` (
  `gi_no` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `serial_number` varchar(40) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgi`
--

INSERT INTO `dgi` (`gi_no`, `material_id`, `serial_number`, `qty`, `create_on`, `create_by`, `update_on`, `update_by`) VALUES
(1, 1, '123', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, 3, '123', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, 3, '345', 1, '2020-11-17', 7, '0000-00-00', 0),
(2, 1, '1234', 1, '2020-11-17', 7, '0000-00-00', 0),
(3, 1, '1234', 1, '2020-11-17', 7, '0000-00-00', 0),
(3, 3, '345', 1, '2020-11-17', 7, '0000-00-00', 0),
(3, 3, '789', 1, '2020-11-17', 7, '0000-00-00', 0),
(4, 1, '123', 1, '2020-11-17', 7, '0000-00-00', 0),
(4, 3, '123', 1, '2020-11-17', 7, '0000-00-00', 0),
(6, 1, '12345', 1, '2020-11-17', 7, '0000-00-00', 0),
(10, 1, '12347', 1, '2020-11-17', 7, '0000-00-00', 0),
(10, 3, '78943', 1, '2020-11-17', 7, '0000-00-00', 0),
(12, 1, '12342', 1, '2020-11-17', 7, '0000-00-00', 0),
(12, 1, '143', 1, '2020-11-17', 7, '0000-00-00', 0),
(12, 3, '1265', 1, '2020-11-17', 7, '0000-00-00', 0),
(12, 3, '678342', 1, '2020-11-17', 7, '0000-00-00', 0),
(17, 1, '125', 1, '2020-12-17', 7, '0000-00-00', 0),
(17, 3, '123455567', 1, '2020-12-17', 7, '0000-00-00', 0),
(17, 3, '123565678', 1, '2020-12-17', 7, '0000-00-00', 0),
(17, 3, '5657', 1, '2020-12-17', 7, '0000-00-00', 0),
(17, 6, 'foc245', 1, '2020-12-17', 7, '0000-00-00', 0),
(18, 6, 'foc245', 2000, '2020-12-17', 7, '0000-00-00', 0),
(19, 5, 'sno10', 1, '2020-12-17', 7, '0000-00-00', 0),
(19, 6, 'foc245', 1000, '2020-12-17', 7, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dgr`
--

DROP TABLE IF EXISTS `dgr`;
CREATE TABLE `dgr` (
  `gr_no` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `net_value` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgr`
--

INSERT INTO `dgr` (`gr_no`, `pekerjaan_id`, `qty`, `net_value`, `create_by`, `create_on`) VALUES
(2, 1, 100, 400000, 7, '2020-12-23'),
(2, 3, 4, 12000, 7, '2020-12-23'),
(3, 1, 110, 440000, 7, '2020-12-31'),
(3, 3, 10, 30000, 7, '2020-12-31'),
(4, 4, 1, 800000, 7, '2020-12-31'),
(4, 5, 1, 890000, 7, '2020-12-31'),
(4, 6, 1, 5300000, 7, '2020-12-31'),
(4, 9, 1, 890000, 7, '2020-12-31'),
(4, 10, 1, 810000, 7, '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `dmaterial`
--

DROP TABLE IF EXISTS `dmaterial`;
CREATE TABLE `dmaterial` (
  `material_id` int(11) NOT NULL,
  `SN` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dmaterial`
--

INSERT INTO `dmaterial` (`material_id`, `SN`, `keterangan`, `status`, `create_on`, `create_by`, `update_on`, `update_by`) VALUES
(1, '09876', 'PO nomer 11', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '123', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(1, '1234', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(1, '12342', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(1, '12345', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(1, '123456', 'PO nomer 10', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '12347', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(1, '125', 'PO nomer 10', 0, '2020-11-17', 7, '2020-12-17', 7),
(1, '143', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(1, '154', 'PO nomer 10', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '1654', 'PO nomer 10', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '54321', 'PO nomer 11', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '765432', 'PO nomer 11', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '7673', 'PO nomer 11', 1, '2020-11-17', 7, '0000-00-00', 0),
(1, '87654', 'PO nomer 11', 1, '2020-11-17', 7, '0000-00-00', 0),
(3, '123', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(3, '123455567', 'PO nomer 10', 0, '2020-11-17', 7, '2020-12-17', 7),
(3, '123565678', 'PO nomer 10', 0, '2020-11-17', 7, '2020-12-17', 7),
(3, '1265', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(3, '345', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(3, '5657', 'PO nomer 10', 0, '2020-11-17', 7, '2020-12-17', 7),
(3, '678342', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(3, '785634534', 'PO nomer 10', 1, '2020-11-17', 7, '0000-00-00', 0),
(3, '789', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(3, '78943', 'PO nomer 10', 0, '2020-11-17', 7, '2020-11-17', 7),
(4, 'rib', 'PO gudang nomer 21', 1, '2020-12-17', 7, '0000-00-00', 0),
(5, 'sno10', 'PO gudang nomer 21', 0, '2020-12-17', 7, '2020-12-17', 7),
(6, 'foc245', 'PO gudang nomer 21', 1, '2020-12-17', 7, '2020-12-17', 7);

-- --------------------------------------------------------

--
-- Table structure for table `dpo`
--

DROP TABLE IF EXISTS `dpo`;
CREATE TABLE `dpo` (
  `po_no` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpo`
--

INSERT INTO `dpo` (`po_no`, `pekerjaan_id`, `qty`, `total`, `create_on`, `create_by`) VALUES
(2, 1, 110, 440000, '2020-12-07', 7),
(2, 3, 10, 30000, '2020-12-07', 7),
(3, 1, 5000, 20000000, '2020-12-17', 7),
(4, 1, 100, 400000, '2020-12-07', 7),
(4, 3, 4, 12000, '2020-12-07', 7),
(5, 4, 1, 800000, '2020-12-17', 7),
(5, 5, 1, 890000, '2020-12-17', 7),
(5, 6, 1, 5300000, '2020-12-17', 7),
(5, 9, 1, 890000, '2020-12-17', 7),
(5, 10, 1, 810000, '2020-12-17', 7),
(6, 3, 10, 30000, '2020-12-17', 7),
(6, 5, 1, 890000, '2020-12-17', 7),
(6, 10, 1, 810000, '2020-12-17', 7);

-- --------------------------------------------------------

--
-- Table structure for table `dpr`
--

DROP TABLE IF EXISTS `dpr`;
CREATE TABLE `dpr` (
  `pr_no` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpr`
--

INSERT INTO `dpr` (`pr_no`, `pekerjaan_id`, `qty`, `total`, `create_on`, `create_by`) VALUES
(10, 1, 5, 4000, '2020-12-07', 7),
(11, 1, 5000, 4000, '2020-12-07', 7),
(12, 3, 10, 3000, '2020-12-07', 7),
(13, 1, 8000, 4000, '2020-12-07', 7),
(14, 4, 1, 800000, '2020-12-17', 7),
(14, 5, 1, 890000, '2020-12-17', 7),
(14, 6, 1, 5300000, '2020-12-17', 7),
(14, 10, 1, 810000, '2020-12-17', 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dreser`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `dreser`;
CREATE TABLE `dreser` (
`reservasi_no` int(11)
,`material_id` int(11)
,`qty` int(11)
,`create_on` date
,`create_by` int(11)
,`nama_material` varchar(200)
,`satuan` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `dreservasi`
--

DROP TABLE IF EXISTS `dreservasi`;
CREATE TABLE `dreservasi` (
  `reservasi_no` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dreservasi`
--

INSERT INTO `dreservasi` (`reservasi_no`, `material_id`, `qty`, `create_on`, `create_by`, `update_on`, `update_by`) VALUES
(10, 1, 1, '2020-11-17', 7, '0000-00-00', 0),
(10, 3, 2, '2020-11-17', 7, '0000-00-00', 0),
(11, 1, 1, '2020-11-17', 7, '0000-00-00', 0),
(11, 3, 1, '2020-11-17', 7, '0000-00-00', 0),
(12, 1, 1, '2020-11-17', 7, '0000-00-00', 0),
(12, 3, 1, '2020-11-17', 7, '0000-00-00', 0),
(13, 1, 1, '2020-11-17', 7, '0000-00-00', 0),
(13, 3, 1, '2020-11-17', 7, '0000-00-00', 0),
(14, 1, 2, '2020-11-17', 7, '0000-00-00', 0),
(14, 3, 2, '2020-11-17', 7, '0000-00-00', 0),
(15, 1, 2, '2020-11-24', 7, '0000-00-00', 0),
(15, 3, 2, '2020-11-24', 7, '0000-00-00', 0),
(16, 1, 1, '2020-12-07', 7, '0000-00-00', 0),
(16, 2, 10, '2020-12-07', 7, '0000-00-00', 0),
(16, 3, 3, '2020-12-07', 7, '0000-00-00', 0),
(17, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(17, 3, 3, '2020-12-17', 7, '0000-00-00', 0),
(17, 6, 2000, '2020-12-17', 7, '0000-00-00', 0),
(18, 6, 2000, '2020-12-17', 7, '0000-00-00', 0),
(19, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(20, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(21, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(22, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(23, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(24, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(25, 1, 1, '2020-12-17', 7, '0000-00-00', 0),
(26, 5, 1, '2020-12-17', 7, '0000-00-00', 0),
(26, 6, 1000, '2020-12-17', 7, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dstg`
--

DROP TABLE IF EXISTS `dstg`;
CREATE TABLE `dstg` (
  `id_dstg` int(11) NOT NULL,
  `project_id` varchar(25) NOT NULL,
  `no_stg` varchar(250) NOT NULL,
  `target_date` date NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dstg`
--

INSERT INTO `dstg` (`id_dstg`, `project_id`, `no_stg`, `target_date`, `create_on`, `create_by`, `update_on`, `update_by`, `mitra_id`) VALUES
(4, '20', '1103002/STG/AKV/07/ICON+/2020', '2020-11-03', '2020-11-03', 3, '0000-00-00', 0, 1),
(5, '21', '1103003/STG/AKV/07/ICON+/2020', '2020-11-03', '2020-11-03', 3, '0000-00-00', 0, 2),
(6, 'PA-ACT-2010-', '1103004/STG/AKV/07/ICON+/2020', '2020-11-20', '2020-11-03', 3, '0000-00-00', 0, 1),
(7, 'PA-ACT-2010-0004', '1103004/STG/AKV/07/ICON+/2020', '2020-11-20', '2020-11-03', 3, '0000-00-00', 0, 1),
(8, 'PA-ACT-2011-0001', '1103005/STG/AKV/07/ICON+/2020', '2020-11-03', '2020-11-03', 3, '0000-00-00', 0, 1),
(9, 'PA-ACT-2011-0002', '1117002/STG/AKV/07/ICON+/2020', '2020-11-17', '2020-11-17', 7, '2020-11-17', 7, 2),
(10, 'PA-ACT-2011-0003', '1217003/STG/AKV/07/ICON+/2020', '2020-12-25', '2020-11-17', 7, '2020-12-17', 7, 3),
(11, 'PA-ACT-2012-0001', '1217002/STG/AKV/07/ICON+/2020', '2021-01-01', '2020-12-17', 7, '2020-12-17', 7, 2),
(12, 'PA-ACT-2012-0002', '1217003/STG/AKV/07/ICON+/2020', '2020-12-31', '2020-12-17', 7, '2020-12-17', 7, 4),
(13, 'PA-ACT-2012-0003', '1217003/STG/AKV/07/ICON+/2020', '2021-01-01', '2020-12-17', 7, '2020-12-17', 7, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `gr_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `gr_view`;
CREATE TABLE `gr_view` (
`mitra` varchar(200)
,`mitragr` varchar(200)
,`pm` varchar(200)
,`po_no` int(11)
,`io_number` text
,`pa_id` text
,`mitra_id` int(11)
,`net_price` int(11)
,`devdate_po` date
,`createon_po` date
,`updateon_po` date
,`rev` int(11)
,`statuspo` int(11)
,`gr_no` int(11)
,`statusgr` int(11)
,`createon_gr` date
,`keterangan` text
,`discount` int(11)
,`total_value` int(11)
,`net_value` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `hgi`
--

DROP TABLE IF EXISTS `hgi`;
CREATE TABLE `hgi` (
  `gi_no` int(11) NOT NULL,
  `reservasi_no` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hgi`
--

INSERT INTO `hgi` (`gi_no`, `reservasi_no`, `mitra_id`, `create_by`, `create_on`) VALUES
(1, 10, 2, 7, '2020-11-17'),
(2, 10, 2, 7, '2020-11-17'),
(3, 10, 2, 7, '2020-11-17'),
(4, 11, 2, 7, '2020-11-17'),
(5, 13, 2, 7, '2020-11-17'),
(6, 13, 2, 7, '2020-11-17'),
(7, 12, 2, 7, '2020-11-17'),
(8, 12, 2, 7, '2020-11-17'),
(9, 12, 2, 7, '2020-11-17'),
(10, 12, 2, 7, '2020-11-17'),
(11, 14, 3, 7, '2020-11-17'),
(12, 14, 3, 7, '2020-11-17'),
(13, 17, 2, 7, '2020-12-17'),
(14, 17, 2, 7, '2020-12-17'),
(15, 17, 2, 7, '2020-12-17'),
(16, 17, 2, 7, '2020-12-17'),
(17, 17, 2, 7, '2020-12-17'),
(18, 18, 2, 7, '2020-12-17'),
(19, 26, 4, 7, '2020-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `hgr`
--

DROP TABLE IF EXISTS `hgr`;
CREATE TABLE `hgr` (
  `gr_no` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `total_value` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_value` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `status` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hgr`
--

INSERT INTO `hgr` (`gr_no`, `po_no`, `total_value`, `discount`, `net_value`, `create_by`, `create_on`, `status`, `mitra_id`, `keterangan`) VALUES
(2, 4, 412000, 5, 391400, 7, '2020-12-23', 1, 1, 'PA-ACT-2010-0004 dispenda blitar blitar'),
(3, 2, 470000, 3, 455900, 7, '2020-12-31', 0, 3, 'PA-ACT-2011-0003'),
(4, 5, 8690000, 5, 8255500, 7, '2020-12-31', 0, 2, 'PA-ACT-2012-0001 holand Tunjungan Plaza Kota Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `hpo`
--

DROP TABLE IF EXISTS `hpo`;
CREATE TABLE `hpo` (
  `po_no` int(11) NOT NULL,
  `pr_no` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `io_number` text NOT NULL,
  `delivery_date` date NOT NULL,
  `project_name` text NOT NULL,
  `sub_total` int(11) NOT NULL,
  `net_price` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `rev` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpo`
--

INSERT INTO `hpo` (`po_no`, `pr_no`, `mitra_id`, `io_number`, `delivery_date`, `project_name`, `sub_total`, `net_price`, `create_on`, `create_by`, `update_by`, `update_on`, `rev`, `status`) VALUES
(2, 10, 3, '112020B00003', '0000-00-00', 'PA-ACT-2011-0003', 470000, 470000, '2020-12-07', 7, 7, '2020-12-07', 4, 1),
(3, 11, 2, '112020B00002', '2020-12-25', 'PA-ACT-2011-0002', 20000000, 20000000, '2020-12-07', 7, 7, '2020-12-17', 1, 0),
(4, 13, 1, '102020B00001', '2020-12-31', 'PA-ACT-2010-0004 dispenda blitar blitar', 412000, 412000, '2020-12-07', 7, 7, '2020-12-07', 5, 1),
(5, 14, 2, '122020B00001', '2021-01-01', 'PA-ACT-2012-0001 holand Tunjungan Plaza Kota Surabaya', 8690000, 8690000, '2020-12-17', 7, 7, '2020-12-17', 1, 1),
(6, 12, 1, '112020B00001', '2020-12-25', 'PA-ACT-2011-0001', 1730000, 1730000, '2020-12-17', 7, 0, '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hpr`
--

DROP TABLE IF EXISTS `hpr`;
CREATE TABLE `hpr` (
  `pr_no` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `io_number` text NOT NULL,
  `delivery_date` date NOT NULL,
  `sub_total` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `project_name` text NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpr`
--

INSERT INTO `hpr` (`pr_no`, `mitra_id`, `io_number`, `delivery_date`, `sub_total`, `create_on`, `project_name`, `create_by`) VALUES
(10, 3, '112020B00003', '2020-12-25', 4000, '2020-12-07', 'PA-ACT-2011-0003', 7),
(11, 2, '112020B00002', '2020-12-25', 4000, '2020-12-07', 'PA-ACT-2011-0002', 7),
(12, 1, '112020B00001', '2020-12-25', 3000, '2020-12-07', 'PA-ACT-2011-0001', 7),
(13, 1, '102020B00001', '2020-12-31', 4000, '2020-12-07', 'PA-ACT-2010-0004 dispenda blitar blitar', 7),
(14, 2, '122020B00001', '2021-01-01', 7800000, '2020-12-17', 'PA-ACT-2012-0001 holand Tunjungan Plaza Kota Surabaya', 7);

-- --------------------------------------------------------

--
-- Table structure for table `hreservasi`
--

DROP TABLE IF EXISTS `hreservasi`;
CREATE TABLE `hreservasi` (
  `reservasi_no` int(11) NOT NULL,
  `IO` varchar(20) NOT NULL,
  `no_wo` text NOT NULL,
  `lokasi` text NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hreservasi`
--

INSERT INTO `hreservasi` (`reservasi_no`, `IO`, `no_wo`, `lokasi`, `create_by`, `create_on`, `update_by`, `update_on`, `status`) VALUES
(1, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-14', 0, '0000-00-00', 1),
(2, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(3, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(4, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(5, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(6, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(7, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(8, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(9, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 0, '0000-00-00', 1),
(10, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 7, '2020-11-17', 0),
(11, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 7, '2020-11-17', 0),
(12, '102020B00001', 'PA-ACT-2010-0004 dispenda', 'blitar blitar', 7, '2020-11-17', 7, '2020-11-17', 0),
(13, '112020B00002', 'PA-ACT-2011-0002 dispenda', 'Samsat Kediri Kota Jalan Anggrek Kota Kediri', 7, '2020-11-17', 7, '2020-11-17', 0),
(14, '112020B00003', 'PA-ACT-2011-0003 dispenda', 'Samsat Jombang Jalan Arjomulyo Kabupaten Jombang', 7, '2020-11-17', 7, '2020-11-17', 0),
(15, '112020B00003', 'PA-ACT-2011-0003 dispenda', 'Samsat Jombang Jalan Arjomulyo Kabupaten Jombang', 7, '2020-11-24', 0, '0000-00-00', 1),
(16, '112020B00003', 'PA-ACT-2011-0003 dispenda', 'Samsat Jombang Jalan Arjomulyo Kabupaten Jombang', 7, '2020-12-07', 7, '2020-12-07', 1),
(17, '122020B00001', 'PA-ACT-2012-0001 holand', 'Tunjungan Plaza Kota Surabaya', 7, '2020-12-17', 7, '2020-12-17', 0),
(18, '122020B00001', 'PA-ACT-2012-0001 holand', 'Tunjungan Plaza Kota Surabaya', 7, '2020-12-17', 7, '2020-12-17', 0),
(19, '122020B00001', 'PA-ACT-2012-0001 holand', 'Tunjungan Plaza Kota Surabaya', 7, '2020-12-17', 0, '0000-00-00', 1),
(20, '122020B00001', 'PA-ACT-2012-0001 holand', 'Tunjungan Plaza Kota Surabaya', 7, '2020-12-17', 0, '0000-00-00', 1),
(21, '122020B00001', 'PA-ACT-2012-0001 holand', 'Tunjungan Plaza Kota Surabaya', 7, '2020-12-17', 0, '0000-00-00', 1),
(22, '112020B00003', 'PA-ACT-2011-0003 dispenda', 'Samsat Jombang Jalan Arjomulyo Kabupaten Jombang', 7, '2020-12-17', 0, '0000-00-00', 1),
(23, '112020B00002', 'PA-ACT-2011-0002 dispenda', 'Samsat Kediri Kota Jalan Anggrek Kota Kediri', 7, '2020-12-17', 0, '0000-00-00', 1),
(24, '112020B00002', 'PA-ACT-2011-0002 dispenda', 'Samsat Kediri Kota Jalan Anggrek Kota Kediri', 7, '2020-12-17', 0, '0000-00-00', 1),
(25, '122020B00001', 'PA-ACT-2012-0001 holand', 'Tunjungan Plaza Kota Surabaya', 7, '2020-12-17', 0, '0000-00-00', 1),
(26, '122020B00003', 'PA-ACT-2012-0003 dispenda', 'Samsat Jombang Jalan Arjomulyo Kabupaten Jombang', 7, '2020-12-17', 7, '2020-12-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hstg`
--

DROP TABLE IF EXISTS `hstg`;
CREATE TABLE `hstg` (
  `no_stg` varchar(250) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hstg`
--

INSERT INTO `hstg` (`no_stg`, `pegawai_id`, `mitra_id`, `create_on`, `create_by`, `update_on`, `update_by`) VALUES
('1103002/STG/AKV/07/ICON+/2020', 2, 2, '2020-11-03', 3, '0000-00-00', 0),
('1103003/STG/AKV/07/ICON+/2020', 2, 2, '2020-11-03', 3, '0000-00-00', 0),
('1103004/STG/AKV/07/ICON+/2020', 9, 1, '2020-11-03', 3, '0000-00-00', 0),
('1103005/STG/AKV/07/ICON+/2020', 2, 2, '2020-11-03', 3, '0000-00-00', 0),
('1117002/STG/AKV/07/ICON+/2020', 9, 2, '2020-11-17', 7, '0000-00-00', 0),
('1217002/STG/AKV/07/ICON+/2020', 9, 2, '2020-12-17', 7, '0000-00-00', 0),
('1217003/STG/AKV/07/ICON+/2020', 9, 3, '2020-12-17', 7, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `laporan_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `file_pdf` text NOT NULL,
  `file_gdb` text NOT NULL,
  `file_bom` text NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`laporan_id`, `project_id`, `mitra_id`, `file_pdf`, `file_gdb`, `file_bom`, `create_on`, `create_by`, `update_on`, `update_by`) VALUES
(0, 0, 1, 'PA-ACT-2010-_laporan_pdf.pdf', '0', '0', '0000-00-00', 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `material_id` int(10) NOT NULL,
  `nama_material` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `stok` int(20) NOT NULL,
  `storage_bin` varchar(200) NOT NULL COMMENT '1 unit,2 roll, 3 drum',
  `create_by` int(10) NOT NULL,
  `create_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `nama_material`, `brand`, `stok`, `storage_bin`, `create_by`, `create_on`, `update_by`, `update_on`, `delete_by`, `delete_on`, `status`) VALUES
(1, 'mikrotik rb2011', 'mikrotik', 8, '1', 7, '2020-10-05', 7, '2020-12-17', 0, '0000-00-00', 1),
(2, 'drop wire', 'fiberhome', 1000, '2', 5, '2020-10-05', 0, '0000-00-00', 0, '0000-00-00', 1),
(3, 'access point ', 'unifi', 0, '1', 7, '2020-10-06', 7, '2020-12-17', 0, '0000-00-00', 1),
(4, 'Kabel 6C', 'Voksel', 12000, '3', 7, '2020-12-17', 0, '0000-00-00', 0, '0000-00-00', 1),
(5, 'switch 2960', 'cisco', 9, '1', 7, '2020-12-17', 7, '2020-12-17', 0, '0000-00-00', 1),
(6, 'Kabel 24C', 'fiberhome', 1000, '3', 7, '2020-12-17', 7, '2020-12-17', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
CREATE TABLE `mitra` (
  `mitra_id` int(10) NOT NULL,
  `nama_mitra` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
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
(1, 'mitra', 'mitra', 'surabaya', '1231', '1231', 'mitra@test.com', '92706ba4fd3022cede6d1610b17a0d2d', '345345', 4, '0000-00-00', 1, '0000-00-00', 0, '0000-00-00', 1),
(2, 'java', 'kebonsari', 'surabaya', '2345', '12313', 'java@java.com', '93f725a07423fe1c889f448b33d21f46', '123213', 4, '2020-10-06', 4, '0000-00-00', 4, '2020-10-06', 1),
(3, 'cahaya alam', 'graha aparna', 'surabaya', '6797657998', '6797657997', 'admin@cahayaalam.co.id', 'c464ec5a50c46219854c3079a06b5e04', '092542943407000', 7, '2020-11-17', 7, '0000-00-00', 0, '0000-00-00', 1),
(4, 'simbika', 'pondok chandra b402', 'sidoarjo', '78964587', '78964587', 'admin@simbika.com', '22d25b6c18a01f0b9d2bd12c79b263f0', '715308433624000', 7, '2020-12-17', 0, '0000-00-00', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
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
(1, 'iwan', '082244355566', 'iwan@gmail.com', '01ccce480c60fcdb67b54f4509ffdb56', 0, 0, '0000-00-00', 0, '0000-00-00', 4, '2020-10-25', 0),
(2, 'pm', '123', 'pm@gmail.com', '5109d85d95fece7816d9704e6e5b1279', 1, 1, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(3, 'admin', '456', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1, '0000-00-00', 1, '0000-00-00', 0, '0000-00-00', 1),
(4, 'spv', '789', 'spv@gmail.com', 'f4984324c6673ce07aafac15600af26e', 0, 1, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(5, 'gudang', '87', 'gudang@gmail.com', '202446dd1d6028084426867365b0c7a1', 3, 4, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 1),
(6, 'qc', '123', 'qc@gmail.com', '9300c96aaec324987ea5ca6e13a02eda', 4, 1, '0000-00-00', 7, '0000-00-00', 0, '0000-00-00', 1),
(7, 'dev', '123', 'dev@test.com', 'e77989ed21758e78331b20e477fc5582', -1, 1, '0000-00-00', 0, '0000-00-00', 7, '2020-10-06', 1),
(8, 'hansen', '353', 'rolan@email.com', 'ee21d5f27a8401788147f6f6184ddb11', 0, 7, '2020-10-06', 7, '0000-00-00', 7, '2020-10-06', 0),
(9, 'iwan abdillah', '123', 'iwan@gmail.com', '01ccce480c60fcdb67b54f4509ffdb56', 1, 4, '2020-10-25', 0, '0000-00-00', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

DROP TABLE IF EXISTS `pekerjaan`;
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
(2, 'joint', 'core', 8000, '0000-00-00', 1, '0000-00-00', 0, '2020-09-29', 1, 0),
(3, 'joint', 'u', 3000, '2020-12-06', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(4, 'Survey Jalur Kabel', 'Lot', 800000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(5, 'Instalasi FOT', 'Lot', 890000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(6, 'Penarikan FOC under 1.000 m', 'Lot', 5300000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(7, 'Instalasi Drop Wire', 'Lot', 500000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(8, 'Patch Cord Single Mode 1 pasang 15m', 'U', 200000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(9, 'Joint Box 24 Core', 'U', 890000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(10, 'ODF Rack Mounted 6 Core', 'U', 810000, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `po_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `po_view`;
CREATE TABLE `po_view` (
`pr_no` int(11)
,`mitra_id` int(11)
,`mitrapr` varchar(200)
,`io_number` text
,`sub_total` int(11)
,`project_name` text
,`sub_total_pr` int(11)
,`tgl_pr` date
,`devdate_pr` date
,`pm` varchar(200)
,`po_no` int(11)
,`net_price` int(11)
,`devdate_po` date
,`status` int(11)
,`mitrapo` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `nama_product` varchar(200) NOT NULL,
  `bandwith` int(200) NOT NULL,
  `satuan` varchar(100) NOT NULL,
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
(1, 'internet', 100, 'mbps', 1, '0000-00-00', 1, '2020-10-06', 7, '0000-00-00', 0),
(2, 'metronet', 20, 'mbps', 0, '2020-10-06', 7, '0000-00-00', 0, '2020-10-06', 7),
(3, 'internet', 10, 'mbps', 1, '2020-10-06', 7, '0000-00-00', 0, '0000-00-00', 0),
(4, 'metronet', 2, 'mbps', 1, '2020-10-06', 7, '0000-00-00', 0, '0000-00-00', 0),
(5, 'collocation', 1, 'rack', 1, '2020-10-06', 7, '0000-00-00', 0, '0000-00-00', 0),
(6, 'internet', 5, 'Mbps', 1, '2020-10-06', 7, '2020-10-24', 1, '0000-00-00', 0),
(7, 'vpn', 1, 'Mbps', 1, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0),
(8, 'metronet', 2, 'Mbps', 1, '2020-12-17', 7, '0000-00-00', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` varchar(24) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `testcom_id` int(11) DEFAULT NULL,
  `survey_id` int(11) NOT NULL,
  `alamat_ori` int(11) DEFAULT NULL,
  `alamat_ter` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `laporan_id` int(11) DEFAULT NULL,
  `IO` varchar(20) DEFAULT NULL,
  `SID` varchar(20) DEFAULT NULL,
  `status_project` int(11) DEFAULT NULL COMMENT '1 diposisi, 2 survey, 3 progres, 4, testcom, 5 dokumen, 6 qc ok, 7 baps , 8 close',
  `create_on` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_on` date DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_on` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `customer_id`, `pegawai_id`, `testcom_id`, `survey_id`, `alamat_ori`, `alamat_ter`, `product_id`, `laporan_id`, `IO`, `SID`, `status_project`, `create_on`, `create_by`, `update_on`, `update_by`, `delete_by`, `delete_on`, `status`, `keterangan`) VALUES
('20', 2, 2, NULL, 0, 0, 1, 1, NULL, '102020B00006', '1000000001', 1, '2020-10-23', 1, '2020-10-25', 4, NULL, NULL, 1, ''),
('21', 2, 2, NULL, 0, 0, 1, 1, NULL, '102020B00005', '1000000002', 2, '2020-10-24', 1, '2020-10-25', 4, NULL, NULL, 1, ''),
('22', 2, 2, NULL, 0, 0, 2, 1, NULL, '102020B00003', '1000000004', 3, '2020-10-24', 1, '2020-10-25', 4, NULL, NULL, 1, ''),
('PA-ACT-2010-', 3, 2, NULL, 0, 0, 2, 1, NULL, '102020B00002', '1000000004', 4, '2020-10-24', 1, '2020-10-25', 4, NULL, NULL, 1, ''),
('PA-ACT-2010-0004', 3, 9, NULL, 0, 2, 5, 4, NULL, '102020B00001', '4000000005', 1, '2020-10-24', 1, '2020-10-25', 4, NULL, NULL, 1, 'aktivasi dispenda'),
('PA-ACT-2011-0001', 3, 9, NULL, 0, 2, 1, 4, NULL, '112020B00001', '4000000006', 3, '2020-11-03', 4, '2020-11-17', 7, NULL, NULL, 1, ''),
('PA-ACT-2011-0002', 3, 9, NULL, 0, 8, 8, 3, NULL, '112020B00002', '3000000007', 2, '2020-11-17', 7, '2020-11-17', 7, NULL, NULL, 1, NULL),
('PA-ACT-2011-0003', 3, 9, NULL, 0, 0, 9, 6, NULL, '112020B00003', '6000000008', 2, '2020-11-17', 7, '2020-11-17', 7, NULL, NULL, 1, NULL),
('PA-ACT-2012-0001', 4, 9, NULL, 0, 0, 10, 3, NULL, '122020B00001', '3000000009', 3, '2020-12-17', 7, '2020-12-17', 7, NULL, NULL, 1, NULL),
('PA-ACT-2012-0002', 4, 9, NULL, 0, 0, 11, 7, NULL, '122020B00002', '7000000010', 1, '2020-12-17', 7, '2020-12-17', 7, NULL, NULL, 1, NULL),
('PA-ACT-2012-0003', 3, 9, NULL, 0, 0, 9, 4, NULL, '122020B00003', '4000000011', 3, '2020-12-17', 7, '2020-12-17', 7, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `project_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `project_view`;
CREATE TABLE `project_view` (
`project_id` varchar(24)
,`customer_id` int(11)
,`pegawai_id` int(11)
,`survey_id` int(11)
,`testcom_id` int(11)
,`alamat_ori` int(11)
,`alamat_ter` int(11)
,`product_id` int(11)
,`laporan_id` int(11)
,`IO` varchar(20)
,`SID` varchar(20)
,`status_project` int(11)
,`create_on` date
,`create_by` int(11)
,`update_on` date
,`update_by` int(11)
,`delete_by` int(11)
,`delete_on` date
,`status` int(11)
,`keterangan` text
,`nama_customer` varchar(200)
,`nama_product` varchar(200)
,`bandwith` int(200)
,`satuan` varchar(100)
,`nama_pegawai` varchar(200)
,`jalan_ter` varchar(200)
,`kota_ter` varchar(200)
,`provinsi_ter` varchar(200)
,`pic_ter` varchar(200)
,`no_telp_ter` varchar(20)
,`koordiant_ter` varchar(200)
,`jalan_ori` varchar(200)
,`kota_ori` varchar(200)
,`provinsi_ori` varchar(200)
,`pic_ori` varchar(200)
,`no_telp_ori` varchar(20)
,`koordiant_ori` varchar(200)
,`aging` bigint(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservasi_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `reservasi_view`;
CREATE TABLE `reservasi_view` (
`reservasi_no` int(11)
,`IO` varchar(20)
,`no_wo` text
,`create_on` date
,`status` int(11)
,`lokasi` text
,`nama_pembuat` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stg_belum_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `stg_belum_view`;
CREATE TABLE `stg_belum_view` (
`id_dstg` int(11)
,`no_stg` varchar(250)
,`project_id` varchar(25)
,`target_date` date
,`create_on` date
,`create_by` int(11)
,`nama_mitra` varchar(200)
,`nama_customer` varchar(200)
,`nama_pegawai` varchar(200)
,`mitra_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `project_id` varchar(100) DEFAULT NULL,
  `file_map` varchar(100) DEFAULT NULL,
  `file_excel` text DEFAULT NULL,
  `mitra_id` int(11) DEFAULT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `project_id`, `file_map`, `file_excel`, `mitra_id`, `create_on`, `create_by`, `update_on`, `update_by`) VALUES
(1, '20', NULL, 'Master_Pegawai(imam).xlsx', NULL, '0000-00-00', 0, '0000-00-00', 0),
(3, 'PA-ACT-2012-0001', 'PA-ACT-2012-0001_survey_map.jpeg', 'PA-ACT-2012-0001_survey_excel.xlsx', NULL, '0000-00-00', 2, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testcom`
--

DROP TABLE IF EXISTS `testcom`;
CREATE TABLE `testcom` (
  `testcom_id` int(11) NOT NULL,
  `project_id` varchar(100) DEFAULT NULL,
  `file_bai` text DEFAULT NULL,
  `file_testcom` text DEFAULT NULL,
  `tgl_testcom` date DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testcom`
--

INSERT INTO `testcom` (`testcom_id`, `project_id`, `file_bai`, `file_testcom`, `tgl_testcom`, `create_by`, `create_on`, `delete_by`, `delete_on`) VALUES
(1, '20', '', '', NULL, 0, '0000-00-00', 0, '0000-00-00'),
(2, '21', 'Lamaran_Dinsos.pdf', 'Lamaran_Dinsos.pdf', NULL, 0, '0000-00-00', 0, '0000-00-00'),
(3, 'PA-ACT-2012-0001', 'PA-ACT-2012-0001_bai', 'PA-ACT-2012-0001_testcom', '2020-12-17', 2, '2020-12-17', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure for view `dreser`
--
DROP TABLE IF EXISTS `dreser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dreser`  AS  select `d`.`reservasi_no` AS `reservasi_no`,`d`.`material_id` AS `material_id`,`d`.`qty` AS `qty`,`d`.`create_on` AS `create_on`,`d`.`create_by` AS `create_by`,`m`.`nama_material` AS `nama_material`,`m`.`storage_bin` AS `satuan` from (`dreservasi` `d` join `material` `m` on(`d`.`material_id` = `m`.`material_id`)) where `d`.`create_on` - curdate() > -3 ;

-- --------------------------------------------------------

--
-- Structure for view `gr_view`
--
DROP TABLE IF EXISTS `gr_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gr_view`  AS  select `m`.`nama_mitra` AS `mitra`,`mgr`.`nama_mitra` AS `mitragr`,`p`.`nama_pegawai` AS `pm`,`po`.`po_no` AS `po_no`,`po`.`io_number` AS `io_number`,`po`.`project_name` AS `pa_id`,`po`.`mitra_id` AS `mitra_id`,`po`.`net_price` AS `net_price`,`po`.`delivery_date` AS `devdate_po`,`po`.`create_on` AS `createon_po`,`po`.`update_on` AS `updateon_po`,`po`.`rev` AS `rev`,`po`.`status` AS `statuspo`,`gr`.`gr_no` AS `gr_no`,`gr`.`status` AS `statusgr`,`gr`.`create_on` AS `createon_gr`,`gr`.`keterangan` AS `keterangan`,`gr`.`discount` AS `discount`,`gr`.`total_value` AS `total_value`,`gr`.`net_value` AS `net_value` from ((((`hpo` `po` left join `hgr` `gr` on(`po`.`po_no` = `gr`.`po_no`)) join `pegawai` `p` on(`po`.`create_by` = `p`.`pegawai_id`)) join `mitra` `m` on(`po`.`mitra_id` = `m`.`mitra_id`)) left join `mitra` `mgr` on(`gr`.`mitra_id` = `mgr`.`mitra_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `po_view`
--
DROP TABLE IF EXISTS `po_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `po_view`  AS  select `pr`.`pr_no` AS `pr_no`,`pr`.`mitra_id` AS `mitra_id`,`m`.`nama_mitra` AS `mitrapr`,`pr`.`io_number` AS `io_number`,`pr`.`sub_total` AS `sub_total`,`pr`.`project_name` AS `project_name`,`pr`.`sub_total` AS `sub_total_pr`,`pr`.`create_on` AS `tgl_pr`,`pr`.`delivery_date` AS `devdate_pr`,`p`.`nama_pegawai` AS `pm`,`po`.`po_no` AS `po_no`,`po`.`net_price` AS `net_price`,`po`.`delivery_date` AS `devdate_po`,`po`.`status` AS `status`,`mpo`.`nama_mitra` AS `mitrapo` from ((((`hpr` `pr` left join `hpo` `po` on(`pr`.`pr_no` = `po`.`pr_no`)) join `pegawai` `p` on(`pr`.`create_by` = `p`.`pegawai_id`)) join `mitra` `m` on(`pr`.`mitra_id` = `m`.`mitra_id`)) left join `mitra` `mpo` on(`po`.`mitra_id` = `mpo`.`mitra_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `project_view`
--
DROP TABLE IF EXISTS `project_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project_view`  AS  select `p`.`project_id` AS `project_id`,`p`.`customer_id` AS `customer_id`,`p`.`pegawai_id` AS `pegawai_id`,`p`.`survey_id` AS `survey_id`,`p`.`testcom_id` AS `testcom_id`,`p`.`alamat_ori` AS `alamat_ori`,`p`.`alamat_ter` AS `alamat_ter`,`p`.`product_id` AS `product_id`,`p`.`laporan_id` AS `laporan_id`,`p`.`IO` AS `IO`,`p`.`SID` AS `SID`,`p`.`status_project` AS `status_project`,`p`.`create_on` AS `create_on`,`p`.`create_by` AS `create_by`,`p`.`update_on` AS `update_on`,`p`.`update_by` AS `update_by`,`p`.`delete_by` AS `delete_by`,`p`.`delete_on` AS `delete_on`,`p`.`status` AS `status`,`p`.`keterangan` AS `keterangan`,`c`.`nama_customer` AS `nama_customer`,`pr`.`nama_product` AS `nama_product`,`pr`.`bandwith` AS `bandwith`,`pr`.`satuan` AS `satuan`,`pg`.`nama_pegawai` AS `nama_pegawai`,`a`.`jalan` AS `jalan_ter`,`a`.`kota` AS `kota_ter`,`a`.`provinsi` AS `provinsi_ter`,`a`.`kontak` AS `pic_ter`,`a`.`no_telp` AS `no_telp_ter`,`a`.`koordinat` AS `koordiant_ter`,`a2`.`jalan` AS `jalan_ori`,`a2`.`kota` AS `kota_ori`,`a2`.`provinsi` AS `provinsi_ori`,`a2`.`kontak` AS `pic_ori`,`a2`.`no_telp` AS `no_telp_ori`,`a2`.`koordinat` AS `koordiant_ori`,curdate() - `p`.`create_on` AS `aging` from (((((`project` `p` join `customer` `c` on(`p`.`customer_id` = `c`.`customer_id`)) left join `alamat` `a` on(`p`.`alamat_ter` = `a`.`alamat_id`)) left join `alamat` `a2` on(`p`.`alamat_ori` = `a2`.`alamat_id`)) join `product` `pr` on(`p`.`product_id` = `pr`.`product_id`)) left join `pegawai` `pg` on(`p`.`pegawai_id` = `pg`.`pegawai_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `reservasi_view`
--
DROP TABLE IF EXISTS `reservasi_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservasi_view`  AS  select `h`.`reservasi_no` AS `reservasi_no`,`h`.`IO` AS `IO`,`h`.`no_wo` AS `no_wo`,`h`.`create_on` AS `create_on`,`h`.`status` AS `status`,`h`.`lokasi` AS `lokasi`,`p`.`nama_pegawai` AS `nama_pembuat` from (`hreservasi` `h` join `pegawai` `p` on(`h`.`create_by` = `p`.`pegawai_id`)) where `h`.`create_on` - curdate() > -3 ;

-- --------------------------------------------------------

--
-- Structure for view `stg_belum_view`
--
DROP TABLE IF EXISTS `stg_belum_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stg_belum_view`  AS  select `d`.`id_dstg` AS `id_dstg`,`d`.`no_stg` AS `no_stg`,`d`.`project_id` AS `project_id`,`d`.`target_date` AS `target_date`,`d`.`create_on` AS `create_on`,`d`.`create_by` AS `create_by`,`m`.`nama_mitra` AS `nama_mitra`,`c`.`nama_customer` AS `nama_customer`,`pe`.`nama_pegawai` AS `nama_pegawai`,`d`.`mitra_id` AS `mitra_id` from ((((`dstg` `d` join `project` `p` on(`d`.`project_id` = `p`.`project_id`)) join `pegawai` `pe` on(`p`.`pegawai_id` = `pe`.`pegawai_id`)) join `mitra` `m` on(`d`.`mitra_id` = `m`.`mitra_id`)) join `customer` `c` on(`p`.`customer_id` = `c`.`customer_id`)) ;

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
-- Indexes for table `dgi`
--
ALTER TABLE `dgi`
  ADD PRIMARY KEY (`gi_no`,`material_id`,`serial_number`);

--
-- Indexes for table `dgr`
--
ALTER TABLE `dgr`
  ADD PRIMARY KEY (`gr_no`,`pekerjaan_id`);

--
-- Indexes for table `dmaterial`
--
ALTER TABLE `dmaterial`
  ADD PRIMARY KEY (`material_id`,`SN`);

--
-- Indexes for table `dpo`
--
ALTER TABLE `dpo`
  ADD PRIMARY KEY (`po_no`,`pekerjaan_id`);

--
-- Indexes for table `dpr`
--
ALTER TABLE `dpr`
  ADD PRIMARY KEY (`pr_no`,`pekerjaan_id`);

--
-- Indexes for table `dreservasi`
--
ALTER TABLE `dreservasi`
  ADD PRIMARY KEY (`reservasi_no`,`material_id`);

--
-- Indexes for table `dstg`
--
ALTER TABLE `dstg`
  ADD PRIMARY KEY (`id_dstg`);

--
-- Indexes for table `hgi`
--
ALTER TABLE `hgi`
  ADD PRIMARY KEY (`gi_no`);

--
-- Indexes for table `hgr`
--
ALTER TABLE `hgr`
  ADD PRIMARY KEY (`gr_no`);

--
-- Indexes for table `hpo`
--
ALTER TABLE `hpo`
  ADD PRIMARY KEY (`po_no`);

--
-- Indexes for table `hpr`
--
ALTER TABLE `hpr`
  ADD PRIMARY KEY (`pr_no`);

--
-- Indexes for table `hreservasi`
--
ALTER TABLE `hreservasi`
  ADD PRIMARY KEY (`reservasi_no`);

--
-- Indexes for table `hstg`
--
ALTER TABLE `hstg`
  ADD PRIMARY KEY (`no_stg`);

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
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `testcom`
--
ALTER TABLE `testcom`
  ADD PRIMARY KEY (`testcom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `alamat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dstg`
--
ALTER TABLE `dstg`
  MODIFY `id_dstg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hgi`
--
ALTER TABLE `hgi`
  MODIFY `gi_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hgr`
--
ALTER TABLE `hgr`
  MODIFY `gr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hpo`
--
ALTER TABLE `hpo`
  MODIFY `po_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hpr`
--
ALTER TABLE `hpr`
  MODIFY `pr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hreservasi`
--
ALTER TABLE `hreservasi`
  MODIFY `reservasi_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testcom`
--
ALTER TABLE `testcom`
  MODIFY `testcom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
