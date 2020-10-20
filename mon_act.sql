-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 01:08 PM
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
(1, 'ketintang', 'surabaya', 'jawa timur', 'indonesia', '12312131313', 0, 'roni', '12313', '0000-00-00', 1, '2020-10-05', 7, '0000-00-00', 0, 1, 2),
(2, 'maospati', 'sidoarjo', 'jawa timur', 'indonesia', '-7.123, 114.3543', 2, 'alex', '123', '2020-10-05', 7, '2020-10-05', 7, '0000-00-00', 0, 1, 3),
(4, 'mall', 'malang', 'jawa timur', 'indonesia', '-7', 2, 'bambang', '123', '2020-10-05', 7, '2020-10-06', 7, '0000-00-00', 0, 1, 3),
(5, 'blitar', 'blitar', 'jawa timur', 'indonesia', '-8,413', 2, 'marvel', '8987', '2020-10-06', 7, '0000-00-00', 0, '2020-10-06', 7, 0, 3),
(6, 'mall', 'malang', 'jawa timur', 'indonesia', '-7.12313142,112.1231345', 0, 'ara', '09898', '2020-10-06', 7, '2020-10-06', 7, '2020-10-06', 7, 0, 2);

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
(2, 'rene', '678', '09888', 'mana yo', 'mana@gmail.com', 9878, '0000-00-00', 1, '2020-10-05', 0, '0000-00-00', 0, 1),
(3, 'dispenda', '031', '031', 'manyar', 'dispenda@dispenda.com', 12314, '2020-10-05', 7, '0000-00-00', 0, '0000-00-00', 0, 1),
(4, 'holand', '123476', '2346', 'malang malang lmang blitar malang lmang blitar', 'holan@holan.com', 2147483647, '2020-10-06', 7, '2020-10-06', 0, '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dgi`
--

CREATE TABLE `dgi` (
  `gi_no` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `storage_bin` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dmaterial`
--

CREATE TABLE `dmaterial` (
  `material_id` int(11) NOT NULL,
  `SN` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dpo`
--

CREATE TABLE `dpo` (
  `po_no` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dreservasi`
--

CREATE TABLE `dreservasi` (
  `reservasi_no` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dstg`
--

CREATE TABLE `dstg` (
  `project_id` int(11) NOT NULL,
  `no_stg` int(11) NOT NULL,
  `target_date` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hgi`
--

CREATE TABLE `hgi` (
  `gi_no` int(11) NOT NULL,
  `reservasi_no` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hpo`
--

CREATE TABLE `hpo` (
  `po_no` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `io_number` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `net_price` int(11) NOT NULL,
  `create_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hreservasi`
--

CREATE TABLE `hreservasi` (
  `reservasi_no` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `no_wo` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hstg`
--

CREATE TABLE `hstg` (
  `nomer_stg` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `laporan_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `file_pdf` int(11) NOT NULL,
  `file_gdb` int(11) NOT NULL,
  `file_bom` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
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

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `nama_material`, `brand`, `stok`, `storage_bin`, `create_by`, `create_on`, `update_by`, `update_on`, `delete_by`, `delete_on`, `status`) VALUES
(1, 'mikrotik rb2011', 'mikrotik', 10, '9-1', 7, '2020-10-05', 7, '2020-10-05', 0, '0000-00-00', 1),
(2, 'drop wire', 'fiberhome', 1000, '9-4', 5, '2020-10-05', 0, '0000-00-00', 0, '0000-00-00', 1),
(3, 'access point ', 'unifi', 20, '5-6', 7, '2020-10-06', 0, '0000-00-00', 0, '0000-00-00', 1);

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
(2, 'java', 'kebonsari', 'surabaya', '2345', '12313', 'java@java.com', '93f725a07423fe1c889f448b33d21f46', '123213', 4, '2020-10-06', 4, '0000-00-00', 4, '2020-10-06', 0);

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
(6, 'qc', '123', 'qc@gmail.com', '9300c96aaec324987ea5ca6e13a02eda', 4, 1, '0000-00-00', 7, '0000-00-00', 0, '0000-00-00', 1),
(7, 'dev', '123', 'dev@test.com', 'e77989ed21758e78331b20e477fc5582', -1, 1, '0000-00-00', 0, '0000-00-00', 7, '2020-10-06', 0),
(8, 'hansen', '353', 'rolan@email.com', 'ee21d5f27a8401788147f6f6184ddb11', 0, 7, '2020-10-06', 7, '0000-00-00', 7, '2020-10-06', 0);

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
(6, 'internet', -5, 'mbps', 1, '2020-10-06', 7, '0000-00-00', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `testcom_id` int(11) DEFAULT NULL,
  `alamat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `laporan_id` int(11) DEFAULT NULL,
  `IO` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL,
  `status_project` int(11) DEFAULT NULL,
  `create_on` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_on` date DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_on` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `customer_id`, `pegawai_id`, `survey_id`, `testcom_id`, `alamat_id`, `product_id`, `laporan_id`, `IO`, `SID`, `status_project`, `create_on`, `create_by`, `update_on`, `update_by`, `delete_by`, `delete_on`, `status`) VALUES
(1, 3, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, '2020-10-18', 4, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file_survey` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testcom`
--

CREATE TABLE `testcom` (
  `testcom_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file_bai` int(11) NOT NULL,
  `file_testcom` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_on` int(11) NOT NULL
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
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `alamat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
