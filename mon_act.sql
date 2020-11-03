/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - mon_act
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mon_act` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mon_act`;

/*Table structure for table `alamat` */

DROP TABLE IF EXISTS `alamat`;

CREATE TABLE `alamat` (
  `alamat_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `customer_id` int(10) NOT NULL,
  PRIMARY KEY (`alamat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `alamat` */

insert  into `alamat`(`alamat_id`,`jalan`,`kota`,`provinsi`,`negara`,`koordinat`,`type`,`kontak`,`no_telp`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`,`status`,`customer_id`) values 
(1,'ketintang','surabaya','jawa timur','indonesia','12312131313',0,'roni','12313','0000-00-00',1,'2020-10-05',7,'0000-00-00',0,1,2),
(2,'maospati','sidoarjo','jawa timur','indonesia','-7.123, 114.3543',2,'alex','123','2020-10-05',7,'2020-10-05',7,'0000-00-00',0,1,3),
(4,'mall','malang','jawa timur','indonesia','-7',2,'bambang','123','2020-10-05',7,'2020-10-06',7,'0000-00-00',0,1,3),
(5,'blitar','blitar','jawa timur','indonesia','-8,413',2,'marvel','8987','2020-10-06',7,'0000-00-00',0,'2020-10-06',7,0,3),
(6,'mall','malang','jawa timur','indonesia','-7.12313142,112.1231345',0,'ara','09898','2020-10-06',7,'2020-10-06',7,'2020-10-06',7,0,2);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` int(1) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`nama_customer`,`phone`,`fax`,`alamat`,`email`,`npwp`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`,`status`) values 
(1,'aaaaaa','','1111111','surabayaaaa','intiland@gmail.comaa','2147483647','0000-00-00',1,'0000-00-00',0,'2020-10-03',0,0),
(2,'rene','678','09888','mana yo','mana@gmail.com','9878','0000-00-00',1,'2020-10-05',0,'0000-00-00',0,1),
(3,'dispenda','031','031','manyar','dispenda@dispenda.com','12314','2020-10-05',7,'0000-00-00',0,'0000-00-00',0,1),
(4,'holand','123476','2346','malang malang lmang blitar malang lmang blitar','holan@holan.com','2147483647','2020-10-06',7,'2020-10-06',0,'0000-00-00',0,1);

/*Table structure for table `dgi` */

DROP TABLE IF EXISTS `dgi`;

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

/*Data for the table `dgi` */

/*Table structure for table `dmaterial` */

DROP TABLE IF EXISTS `dmaterial`;

CREATE TABLE `dmaterial` (
  `material_id` int(11) NOT NULL,
  `SN` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dmaterial` */

/*Table structure for table `dpo` */

DROP TABLE IF EXISTS `dpo`;

CREATE TABLE `dpo` (
  `po_no` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dpo` */

/*Table structure for table `dreservasi` */

DROP TABLE IF EXISTS `dreservasi`;

CREATE TABLE `dreservasi` (
  `reservasi_no` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_on` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dreservasi` */

/*Table structure for table `dstg` */

DROP TABLE IF EXISTS `dstg`;

CREATE TABLE `dstg` (
  `project_id` varchar(25) NOT NULL,
  `no_stg` varchar(25) NOT NULL,
  `target_date` date NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL,
  KEY `no_stg` (`no_stg`),
  CONSTRAINT `dstg_ibfk_1` FOREIGN KEY (`no_stg`) REFERENCES `hstg` (`no_stg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dstg` */

insert  into `dstg`(`project_id`,`no_stg`,`target_date`,`create_on`,`create_by`,`update_on`,`update_by`) values 
('PA-ACT-2010-0004','','2020-10-28','2020-10-28',4,'0000-00-00',0);

/*Table structure for table `hgi` */

DROP TABLE IF EXISTS `hgi`;

CREATE TABLE `hgi` (
  `gi_no` int(11) NOT NULL,
  `reservasi_no` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hgi` */

/*Table structure for table `hpo` */

DROP TABLE IF EXISTS `hpo`;

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

/*Data for the table `hpo` */

/*Table structure for table `hreservasi` */

DROP TABLE IF EXISTS `hreservasi`;

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

/*Data for the table `hreservasi` */

/*Table structure for table `hstg` */

DROP TABLE IF EXISTS `hstg`;

CREATE TABLE `hstg` (
  `no_stg` varchar(25) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`no_stg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hstg` */

insert  into `hstg`(`no_stg`,`pegawai_id`,`mitra_id`,`create_on`,`create_by`,`update_on`,`update_by`) values 
('',0,1,'2020-10-28',4,'0000-00-00',0);

/*Table structure for table `laporan` */

DROP TABLE IF EXISTS `laporan`;

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

/*Data for the table `laporan` */

/*Table structure for table `material` */

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `material_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` int(1) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `material` */

insert  into `material`(`material_id`,`nama_material`,`brand`,`stok`,`storage_bin`,`create_by`,`create_on`,`update_by`,`update_on`,`delete_by`,`delete_on`,`status`) values 
(1,'mikrotik rb2011','mikrotik',10,'9-1',7,'2020-10-05',7,'2020-10-05',0,'0000-00-00',1),
(2,'drop wire','fiberhome',1000,'9-4',5,'2020-10-05',0,'0000-00-00',0,'0000-00-00',1),
(3,'access point ','unifi',20,'5-6',7,'2020-10-06',0,'0000-00-00',0,'0000-00-00',1);

/*Table structure for table `mitra` */

DROP TABLE IF EXISTS `mitra`;

CREATE TABLE `mitra` (
  `mitra_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` int(1) NOT NULL,
  PRIMARY KEY (`mitra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mitra` */

insert  into `mitra`(`mitra_id`,`nama_mitra`,`alamat`,`kota`,`no_telp`,`fax`,`email`,`password`,`npwp`,`create_by`,`create_on`,`update_by`,`update_on`,`delete_by`,`delete_on`,`status`) values 
(1,'mitra','mitra','surabaya','1231','1231','mitra@test.com','92706ba4fd3022cede6d1610b17a0d2d','345345',4,'0000-00-00',1,'0000-00-00',0,'0000-00-00',1),
(2,'java','kebonsari','surabaya','2345','12313','java@java.com','93f725a07423fe1c889f448b33d21f46','123213',4,'2020-10-06',4,'0000-00-00',4,'2020-10-06',1);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `pegawai_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` int(1) NOT NULL,
  PRIMARY KEY (`pegawai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

insert  into `pegawai`(`pegawai_id`,`nama_pegawai`,`no_telp`,`email`,`password`,`jabatan`,`create_by`,`create_on`,`update_by`,`update_on`,`delete_by`,`delete_on`,`status`) values 
(1,'iwan','082244355566','iwan@gmail.com','01ccce480c60fcdb67b54f4509ffdb56',0,0,'0000-00-00',0,'0000-00-00',4,'2020-10-25',0),
(2,'pm','123','pm@gmail.com','5109d85d95fece7816d9704e6e5b1279',1,1,'0000-00-00',0,'0000-00-00',0,'0000-00-00',1),
(3,'admin','456','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',2,1,'0000-00-00',1,'0000-00-00',0,'0000-00-00',1),
(4,'spv','789','spv@gmail.com','f4984324c6673ce07aafac15600af26e',0,1,'0000-00-00',0,'0000-00-00',0,'0000-00-00',1),
(5,'gudang','87','gudang@gmail.com','202446dd1d6028084426867365b0c7a1',3,4,'0000-00-00',0,'0000-00-00',0,'0000-00-00',1),
(6,'qc','123','qc@gmail.com','9300c96aaec324987ea5ca6e13a02eda',4,1,'0000-00-00',7,'0000-00-00',0,'0000-00-00',1),
(7,'dev','123','dev@test.com','e77989ed21758e78331b20e477fc5582',-1,1,'0000-00-00',0,'0000-00-00',7,'2020-10-06',0),
(8,'hansen','353','rolan@email.com','ee21d5f27a8401788147f6f6184ddb11',0,7,'2020-10-06',7,'0000-00-00',7,'2020-10-06',0),
(9,'iwan abdillah','123','iwan@gmail.com','01ccce480c60fcdb67b54f4509ffdb56',1,4,'2020-10-25',0,'0000-00-00',0,'0000-00-00',1);

/*Table structure for table `pekerjaan` */

DROP TABLE IF EXISTS `pekerjaan`;

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`pekerjaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pekerjaan` */

insert  into `pekerjaan`(`pekerjaan_id`,`nama_pekerjaan`,`satuan`,`price`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`,`status`) values 
(1,'penarikan','m',4000,'0000-00-00',1,'2020-09-29',1,'0000-00-00',0,1),
(2,'joint','core',8000,'0000-00-00',1,'0000-00-00',0,'2020-09-29',1,0);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_product` varchar(200) NOT NULL,
  `bandwith` int(200) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

insert  into `product`(`product_id`,`nama_product`,`bandwith`,`satuan`,`status`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`) values 
(1,'internet',100,'mbps',1,'0000-00-00',1,'2020-10-06',7,'0000-00-00',0),
(2,'metronet',20,'mbps',0,'2020-10-06',7,'0000-00-00',0,'2020-10-06',7),
(3,'internet',10,'mbps',1,'2020-10-06',7,'0000-00-00',0,'0000-00-00',0),
(4,'metronet',2,'mbps',1,'2020-10-06',7,'0000-00-00',0,'0000-00-00',0),
(5,'collocation',1,'rack',1,'2020-10-06',7,'0000-00-00',0,'0000-00-00',0),
(6,'internet',5,'Mbps',1,'2020-10-06',7,'2020-10-24',1,'0000-00-00',0);

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `project_id` varchar(24) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `testcom_id` int(11) DEFAULT NULL,
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
  `keterangan` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `project` */

insert  into `project`(`project_id`,`customer_id`,`pegawai_id`,`survey_id`,`testcom_id`,`alamat_ori`,`alamat_ter`,`product_id`,`laporan_id`,`IO`,`SID`,`status_project`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_by`,`delete_on`,`status`,`keterangan`) values 
('20',2,2,NULL,NULL,0,1,1,NULL,'102020B00006','1000000001',1,'2020-10-23',1,'2020-10-25',4,NULL,NULL,1,''),
('21',2,2,NULL,NULL,0,1,1,NULL,'102020B00005','1000000002',1,'2020-10-24',1,'2020-10-25',4,NULL,NULL,1,''),
('22',2,2,NULL,NULL,0,2,1,NULL,'102020B00003','1000000004',1,'2020-10-24',1,'2020-10-25',4,NULL,NULL,1,''),
('PA-ACT-2010-',3,2,NULL,NULL,0,2,1,NULL,'102020B00002','1000000004',1,'2020-10-24',1,'2020-10-25',4,NULL,NULL,1,''),
('PA-ACT-2010-0004',3,9,NULL,NULL,2,5,4,NULL,'102020B00001','4000000005',1,'2020-10-24',1,'2020-10-25',4,NULL,NULL,1,'aktivasi dispenda');

/*Table structure for table `survey` */

DROP TABLE IF EXISTS `survey`;

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` varchar(100) DEFAULT NULL,
  `file_map` varchar(100) DEFAULT NULL,
  `file_excel` varchar(100) DEFAULT NULL,
  `mitra_id` int(11) DEFAULT NULL,
  `create_on` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_on` date NOT NULL,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `survey` */

insert  into `survey`(`survey_id`,`project_id`,`file_map`,`file_excel`,`mitra_id`,`create_on`,`create_by`,`update_on`,`update_by`) values 
(1,'20',NULL,'Master_Pegawai(imam).xlsx',NULL,'0000-00-00',0,'0000-00-00',0);

/*Table structure for table `testcom` */

DROP TABLE IF EXISTS `testcom`;

CREATE TABLE `testcom` (
  `testcom_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` varchar(100) DEFAULT NULL,
  `file_bai` varchar(100) DEFAULT NULL,
  `file_testcom` varchar(100) DEFAULT NULL,
  `tgl_testcom` date DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `create_on` date NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_on` date NOT NULL,
  PRIMARY KEY (`testcom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `testcom` */

insert  into `testcom`(`testcom_id`,`project_id`,`file_bai`,`file_testcom`,`tgl_testcom`,`create_by`,`create_on`,`delete_by`,`delete_on`) values 
(1,'20','','',NULL,0,'0000-00-00',0,'0000-00-00'),
(2,'21','Lamaran_Dinsos.pdf','Lamaran_Dinsos.pdf',NULL,0,'0000-00-00',0,'0000-00-00');

/*Table structure for table `project_view` */

DROP TABLE IF EXISTS `project_view`;

/*!50001 DROP VIEW IF EXISTS `project_view` */;
/*!50001 DROP TABLE IF EXISTS `project_view` */;

/*!50001 CREATE TABLE  `project_view`(
 `project_id` varchar(24) ,
 `customer_id` int(11) ,
 `pegawai_id` int(11) ,
 `survey_id` int(11) ,
 `testcom_id` int(11) ,
 `alamat_ori` int(11) ,
 `alamat_ter` int(11) ,
 `product_id` int(11) ,
 `laporan_id` int(11) ,
 `IO` varchar(20) ,
 `SID` varchar(20) ,
 `status_project` int(11) ,
 `create_on` date ,
 `create_by` int(11) ,
 `update_on` date ,
 `update_by` int(11) ,
 `delete_by` int(11) ,
 `delete_on` date ,
 `status` int(11) ,
 `keterangan` text ,
 `nama_customer` varchar(200) ,
 `nama_product` varchar(200) ,
 `bandwith` int(200) ,
 `satuan` varchar(100) ,
 `nama_pegawai` varchar(200) ,
 `jalan_ter` varchar(200) ,
 `kota_ter` varchar(200) ,
 `provinsi_ter` varchar(200) ,
 `pic_ter` varchar(200) ,
 `no_telp_ter` varchar(20) ,
 `jalan_ori` varchar(200) ,
 `kota_ori` varchar(200) ,
 `provinsi_ori` varchar(200) ,
 `pic_ori` varchar(200) ,
 `no_telp_ori` varchar(20) ,
 `aging` bigint(10) 
)*/;

/*View structure for view project_view */

/*!50001 DROP TABLE IF EXISTS `project_view` */;
/*!50001 DROP VIEW IF EXISTS `project_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project_view` AS select `p`.`project_id` AS `project_id`,`p`.`customer_id` AS `customer_id`,`p`.`pegawai_id` AS `pegawai_id`,`p`.`survey_id` AS `survey_id`,`p`.`testcom_id` AS `testcom_id`,`p`.`alamat_ori` AS `alamat_ori`,`p`.`alamat_ter` AS `alamat_ter`,`p`.`product_id` AS `product_id`,`p`.`laporan_id` AS `laporan_id`,`p`.`IO` AS `IO`,`p`.`SID` AS `SID`,`p`.`status_project` AS `status_project`,`p`.`create_on` AS `create_on`,`p`.`create_by` AS `create_by`,`p`.`update_on` AS `update_on`,`p`.`update_by` AS `update_by`,`p`.`delete_by` AS `delete_by`,`p`.`delete_on` AS `delete_on`,`p`.`status` AS `status`,`p`.`keterangan` AS `keterangan`,`c`.`nama_customer` AS `nama_customer`,`pr`.`nama_product` AS `nama_product`,`pr`.`bandwith` AS `bandwith`,`pr`.`satuan` AS `satuan`,`pg`.`nama_pegawai` AS `nama_pegawai`,`a`.`jalan` AS `jalan_ter`,`a`.`kota` AS `kota_ter`,`a`.`provinsi` AS `provinsi_ter`,`a`.`kontak` AS `pic_ter`,`a`.`no_telp` AS `no_telp_ter`,`a2`.`jalan` AS `jalan_ori`,`a2`.`kota` AS `kota_ori`,`a2`.`provinsi` AS `provinsi_ori`,`a2`.`kontak` AS `pic_ori`,`a2`.`no_telp` AS `no_telp_ori`,curdate() - `p`.`create_on` AS `aging` from (((((`project` `p` join `customer` `c` on(`p`.`customer_id` = `c`.`customer_id`)) left join `alamat` `a` on(`p`.`alamat_ter` = `a`.`alamat_id`)) left join `alamat` `a2` on(`p`.`alamat_ori` = `a2`.`alamat_id`)) join `product` `pr` on(`p`.`product_id` = `pr`.`product_id`)) left join `pegawai` `pg` on(`p`.`pegawai_id` = `pg`.`pegawai_id`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
