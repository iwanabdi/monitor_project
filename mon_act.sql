/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.37-MariaDB : Database - mon_act
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mon_act` /*!40100 DEFAULT CHARACTER SET latin1 */;

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
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `customer_id` int(10) NOT NULL,
  PRIMARY KEY (`alamat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `alamat` */

insert  into `alamat`(`alamat_id`,`jalan`,`kota`,`provinsi`,`negara`,`koordinat`,`type`,`kontak`,`no_telp`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`,`status`,`customer_id`) values 
(1,'asdas','asdna','adjkand','ansdamnd','12312',1231,'123123','12313','0000-00-00 00:00:00',1,'0000-00-00 00:00:00',0,'0000-00-00',0,1,0),
(2,'testing','testing','testing','testing','testing',123,'123','123','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',0,0,0);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `npwp` int(20) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`nama_customer`,`phone`,`fax`,`alamat`,`email`,`npwp`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`,`status`) values 
(1,'customer','1238172','12312','adas','asdas@adas',12312,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',0,1);

/*Table structure for table `material` */

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `material_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_material` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `stok` int(20) NOT NULL,
  `storage_bin` varchar(200) NOT NULL,
  `create_by` int(10) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `material` */

insert  into `material`(`material_id`,`nama_material`,`brand`,`stok`,`storage_bin`,`create_by`,`create_on`,`update_by`,`update_on`,`delete_by`,`delete_on`,`status`) values 
(1,'asdas','asdasd1',123,'asda',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',1);

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
  `password` varchar(100) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `create_by` int(10) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`mitra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mitra` */

insert  into `mitra`(`mitra_id`,`nama_mitra`,`alamat`,`kota`,`no_telp`,`fax`,`email`,`password`,`npwp`,`create_by`,`create_on`,`update_by`,`update_on`,`delete_by`,`delete_on`,`status`) values 
(2,'Monica','kenjeran','surabaya','089189231','12480179238','mitra@gmail.com','92706ba4fd3022cede6d1610b17a0d2d','1231231',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',1),
(3,'olan','benowo','surabaya','12345','12345','olan@gmail.com','21232f297a57a5a743894a0e4a801fc3','12345',1,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',0,'0000-00-00',1),
(4,'testing','testing','testing','1234567890','1234567890','testing@gmail.com','fca4f39aeeae7d34b0748deb8330893c','1234567890',1,'2020-09-29 20:02:38',1,'2020-09-29 20:03:16',1,'2020-09-29',0);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `pegawai_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(200) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` int(2) NOT NULL COMMENT '0 spv administrator, 1 pm, 2 admin, 3 gudang, 4 QC',
  `create_by` int(10) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_by` int(10) NOT NULL,
  `delete_on` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`pegawai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

insert  into `pegawai`(`pegawai_id`,`nama_pegawai`,`no_telp`,`email`,`password`,`jabatan`,`create_by`,`create_on`,`update_by`,`update_on`,`delete_by`,`delete_on`,`status`) values 
(1,'Rolan Oktafian','098198312','olan@gmail.com','21232f297a57a5a743894a0e4a801fc3',-1,0,'0000-00-00 00:00:00',1,'2020-09-29 05:28:12',0,'0000-00-00',1),
(7,'PM COK','0812345678','projectmanager@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,0,'0000-00-00 00:00:00',1,'2020-09-29 05:28:44',0,'0000-00-00',1),
(8,'Admin','07138917','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',2,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',1),
(9,'Gudang','0978102371','gudang@gmail.com','21232f297a57a5a743894a0e4a801fc3',3,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',1),
(10,'QC','0981073812','qc@gmail.com','21232f297a57a5a743894a0e4a801fc3',4,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',1),
(11,'asdas','213123','asdasda@adsas','asdas',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',0),
(12,'asdas','12312','asdasda@asdas','asdasd',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',0),
(13,'joqweqwj','123123','asjkdbaskn@asnfakjsnd','fa89d78502e1d1d7e6f28951e68ed80e',2,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',0),
(15,'aku edit','23123','cdjaskdnawkj@fnasjkdnasj','3251838d0c2a1ea1c2f3010848b5debc',4,0,'2020-09-28 22:33:07',1,'2020-09-29 03:36:47',1,'0000-00-00',0),
(17,'testing','0981938221','testing@adandls','b28d532da09d90235234d88ed300678f',4,1,'2020-09-29 03:44:56',0,'2020-09-29 03:49:12',0,'0000-00-00',1),
(18,'testing lagi','102733','dnaojdnwqjk@nadsmdnas','a8f5f167f44f4964e6c998dee827110c',2,1,'2020-09-29 03:46:48',0,'2020-09-29 05:28:50',1,'2020-09-29',0),
(19,'testing terosss','120301237','djasidyuaydh@dnasjdkaskj','3410bc1d078928d9a50f520e47494a63',2,1,'2020-09-29 03:47:56',0,'2020-09-29 04:38:44',1,'0000-00-00',0),
(20,'test tak update','1231231','adsdal@admnas','922ec9531b1f94add983a8ce2ebdc97b',2,1,'2020-09-29 03:49:47',1,'2020-09-29 05:03:59',1,'2020-09-29',0),
(21,'Project Manager','1232131','asd@asdas','89defae676abd3e3a42b41df17c40096',1,1,'2020-09-29 05:39:30',0,NULL,0,NULL,1);

/*Table structure for table `pekerjaan` */

DROP TABLE IF EXISTS `pekerjaan`;

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`pekerjaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pekerjaan` */

insert  into `pekerjaan`(`pekerjaan_id`,`nama_pekerjaan`,`satuan`,`price`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`,`status`) values 
(1,'job','123',8978791,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',0,'0000-00-00',0,1);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_product` varchar(200) NOT NULL,
  `bandwith` int(200) NOT NULL,
  `status` int(1) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(10) NOT NULL,
  `update_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(10) NOT NULL,
  `delete_on` date NOT NULL,
  `delete_by` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

insert  into `product`(`product_id`,`nama_product`,`bandwith`,`status`,`create_on`,`create_by`,`update_on`,`update_by`,`delete_on`,`delete_by`) values 
(1,'testing',0,1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
