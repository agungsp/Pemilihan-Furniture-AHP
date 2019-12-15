/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - deni
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`deni` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `deni`;

/*Table structure for table `tblinputadmins` */

DROP TABLE IF EXISTS `tblinputadmins`;

CREATE TABLE `tblinputadmins` (
  `IdMUser` int(11) DEFAULT NULL,
  `IdMBrg` int(11) DEFAULT NULL,
  `Field` varchar(5) DEFAULT NULL,
  `Nilai` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblinputadmins` */

insert  into `tblinputadmins`(`IdMUser`,`IdMBrg`,`Field`,`Nilai`,`created_at`,`updated_at`) values 
(1,1,'1_2',3,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'1_3',3,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'1_4',4,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'1_5',7,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'2_3',4,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'2_4',4,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'2_5',6,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'3_4',3,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'3_5',5,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(1,1,'4_5',3,'2019-10-14 11:23:41','2019-10-14 11:23:41');

/*Table structure for table `tblmasterbahands` */

DROP TABLE IF EXISTS `tblmasterbahands`;

CREATE TABLE `tblmasterbahands` (
  `IdMBahanD` int(11) NOT NULL AUTO_INCREMENT,
  `IdMBahan` int(11) DEFAULT NULL,
  `NmMBahan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdMBahanD`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterbahands` */

insert  into `tblmasterbahands`(`IdMBahanD`,`IdMBahan`,`NmMBahan`) values 
(1,1,'Kayu Olahan'),
(5,2,'Jati'),
(6,2,'Pinus'),
(10,3,'Logam'),
(13,4,'Plastik');

/*Table structure for table `tblmasterbahans` */

DROP TABLE IF EXISTS `tblmasterbahans`;

CREATE TABLE `tblmasterbahans` (
  `IdMBahan` int(11) NOT NULL AUTO_INCREMENT,
  `JenisBahan` varchar(25) DEFAULT NULL,
  `Nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdMBahan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterbahans` */

insert  into `tblmasterbahans`(`IdMBahan`,`JenisBahan`,`Nilai`) values 
(1,'Kayu Olahan',4),
(2,'Kayu',3),
(3,'Logam',2),
(4,'Plastik',1);

/*Table structure for table `tblmasterbarangs` */

DROP TABLE IF EXISTS `tblmasterbarangs`;

CREATE TABLE `tblmasterbarangs` (
  `IdMBrg` int(11) NOT NULL AUTO_INCREMENT,
  `KdMBrg` varchar(25) DEFAULT NULL,
  `NmMBrg` varchar(50) DEFAULT NULL,
  `PKecil` decimal(20,2) DEFAULT NULL,
  `LKecil` decimal(20,2) DEFAULT NULL,
  `TKecil` decimal(20,2) DEFAULT NULL,
  `PSedang` decimal(20,2) DEFAULT NULL,
  `LSedang` decimal(20,2) DEFAULT NULL,
  `TSedang` decimal(20,2) DEFAULT NULL,
  `PBesar` decimal(20,2) DEFAULT NULL,
  `LBesar` decimal(20,2) DEFAULT NULL,
  `TBesar` decimal(20,2) DEFAULT NULL,
  `IdMUserCreate` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `IdMUserUpdate` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdMBrg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterbarangs` */

insert  into `tblmasterbarangs`(`IdMBrg`,`KdMBrg`,`NmMBrg`,`PKecil`,`LKecil`,`TKecil`,`PSedang`,`LSedang`,`TSedang`,`PBesar`,`LBesar`,`TBesar`,`IdMUserCreate`,`created_at`,`IdMUserUpdate`,`updated_at`) values 
(1,'KRSI','Kursi Terop',2.00,3.00,4.00,6.00,5.00,7.00,4.00,6.00,7.00,1,'2019-08-25 08:46:37',1,'2019-10-28 14:04:55'),
(6,'MJA','Meja Terop',10.00,10.00,55.00,15.00,15.00,55.00,20.00,20.00,55.00,1,'2019-08-27 11:49:06',1,'2019-10-31 16:41:43'),
(7,'SFA','Sofa Mahal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2019-08-27 11:49:22',1,'2019-08-27 11:52:07');

/*Table structure for table `tblmasterdesigns` */

DROP TABLE IF EXISTS `tblmasterdesigns`;

CREATE TABLE `tblmasterdesigns` (
  `IdMDesign` int(11) NOT NULL AUTO_INCREMENT,
  `JenisDesign` varchar(25) DEFAULT NULL,
  `Nilai` int(11) DEFAULT NULL,
  `Keterangan` text,
  PRIMARY KEY (`IdMDesign`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterdesigns` */

insert  into `tblmasterdesigns`(`IdMDesign`,`JenisDesign`,`Nilai`,`Keterangan`) values 
(1,'Minimalis',3,'Bagian-bagian pada ruangan yg tidak perlu akan dihapus dan hanya meninggalkan barang yang penting saja.'),
(2,'Modern',2,'Lebih ke simple,bersih, fungsional,stylish dan selalu mengikuti perkembangan jaman secara modern.'),
(3,'Tradisional',1,'Mengutamakan bahan alam seperti kayu serta dipolesi ukiran yang rumit dan penataan ruang mengikuti tradisi');

/*Table structure for table `tblmasterhargas` */

DROP TABLE IF EXISTS `tblmasterhargas`;

CREATE TABLE `tblmasterhargas` (
  `IdMHarga` int(11) NOT NULL AUTO_INCREMENT,
  `NmMHarga` varchar(25) DEFAULT NULL,
  `Nilai` int(11) DEFAULT NULL,
  `Keterangan` text,
  PRIMARY KEY (`IdMHarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterhargas` */

/*Table structure for table `tblmasterkriterias` */

DROP TABLE IF EXISTS `tblmasterkriterias`;

CREATE TABLE `tblmasterkriterias` (
  `IdMKriteria` int(11) NOT NULL AUTO_INCREMENT,
  `KdMKriteria` varchar(10) DEFAULT NULL,
  `NmMKriteria` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdMKriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterkriterias` */

insert  into `tblmasterkriterias`(`IdMKriteria`,`KdMKriteria`,`NmMKriteria`) values 
(1,'K01','Harga'),
(2,'K02','Warna'),
(3,'K03','Desain'),
(4,'K04','Bahan');

/*Table structure for table `tblmasterukurans` */

DROP TABLE IF EXISTS `tblmasterukurans`;

CREATE TABLE `tblmasterukurans` (
  `IdMUkuran` int(11) NOT NULL AUTO_INCREMENT,
  `IdMBarang` int(11) DEFAULT NULL,
  `Panjang` double(20,2) DEFAULT NULL,
  `Lebar` double(20,2) DEFAULT NULL,
  `Tinggi` double(20,2) DEFAULT NULL,
  `Nilai` int(11) DEFAULT NULL,
  `IdMUserCreate` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `IdMUserUpdate` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdMUkuran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterukurans` */

insert  into `tblmasterukurans`(`IdMUkuran`,`IdMBarang`,`Panjang`,`Lebar`,`Tinggi`,`Nilai`,`IdMUserCreate`,`created_at`,`IdMUserUpdate`,`updated_at`) values 
(1,1,50.00,50.00,50.00,1,1,'2019-09-17 16:58:06',1,'2019-09-17 16:58:06'),
(2,1,50.00,200.00,105.00,2,1,'2019-09-17 16:58:57',1,'2019-09-17 16:58:57'),
(3,6,250.00,33.00,50.00,1,1,'2019-09-23 14:47:46',1,'2019-09-23 14:47:46'),
(4,6,45.00,50.00,70.00,2,1,'2019-09-23 14:48:04',1,'2019-09-23 14:48:04');

/*Table structure for table `tblmasterusers` */

DROP TABLE IF EXISTS `tblmasterusers`;

CREATE TABLE `tblmasterusers` (
  `IdMUser` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(25) DEFAULT NULL,
  `NmMUser` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdMUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterusers` */

insert  into `tblmasterusers`(`IdMUser`,`Username`,`NmMUser`,`Password`,`created_at`,`updated_at`) values 
(1,'agungsp','Agung Setyo Pribadi','aa26277dcfe9aaf06a589151e5575a51','2019-08-25 00:34:04','2019-08-25 00:34:04');

/*Table structure for table `tblmastervarians` */

DROP TABLE IF EXISTS `tblmastervarians`;

CREATE TABLE `tblmastervarians` (
  `IdMVarian` int(11) NOT NULL AUTO_INCREMENT,
  `IdMBrg` int(11) DEFAULT NULL,
  `KdMVarian` varchar(25) DEFAULT NULL,
  `NmMVarian` varchar(100) DEFAULT NULL,
  `Ukuran` varchar(20) DEFAULT NULL,
  `Panjang` decimal(20,2) DEFAULT NULL,
  `Lebar` decimal(20,2) DEFAULT NULL,
  `Tinggi` decimal(20,2) DEFAULT NULL,
  `TinggiDudukan` decimal(20,2) DEFAULT NULL,
  `Harga` decimal(20,2) DEFAULT NULL,
  `IdMWarnaD` int(11) DEFAULT NULL,
  `IdMDesign` int(11) DEFAULT NULL,
  `IdMBahan` int(11) DEFAULT NULL,
  `Foto` varchar(1000) DEFAULT NULL,
  `FotoTumb` varchar(1000) DEFAULT NULL,
  `IdMUserCreate` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `IdMUserUpdate` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdMVarian`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblmastervarians` */

insert  into `tblmastervarians`(`IdMVarian`,`IdMBrg`,`KdMVarian`,`NmMVarian`,`Ukuran`,`Panjang`,`Lebar`,`Tinggi`,`TinggiDudukan`,`Harga`,`IdMWarnaD`,`IdMDesign`,`IdMBahan`,`Foto`,`FotoTumb`,`IdMUserCreate`,`created_at`,`IdMUserUpdate`,`updated_at`) values 
(1,1,'KRSI-001','Kursi 1','',50.00,200.00,50.00,0.00,5000000.00,19,1,5,'http://localhost/storage/KRSI-001.jpg','http://localhost/storage/KRSI-001_tumb.jpg',1,'2019-09-23 13:47:30',1,'2019-11-11 13:19:00'),
(2,6,'MJA-001','Meja 1','',250.00,33.00,105.00,0.00,10000000.00,14,3,6,'http://localhost/storage/MJA-001.jpg','http://localhost/storage/MJA-001_tumb.jpg',1,'2019-09-23 14:48:52',1,'2019-11-11 13:30:35'),
(3,1,'KRSI-002','Kursi 2 New','',45.00,23.00,44.00,30.00,970000000.00,4,2,10,'http://localhost/storage/KRSI-002.jpg','http://localhost/storage/KRSI-002_tumb.jpg',1,'2019-10-04 15:35:31',1,'2019-11-12 13:16:10');

/*Table structure for table `tblmasterwarnads` */

DROP TABLE IF EXISTS `tblmasterwarnads`;

CREATE TABLE `tblmasterwarnads` (
  `IdMWarnaDs` int(11) NOT NULL AUTO_INCREMENT,
  `IdMWarna` int(11) DEFAULT NULL,
  `NmMWarna` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdMWarnaDs`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterwarnads` */

insert  into `tblmasterwarnads`(`IdMWarnaDs`,`IdMWarna`,`NmMWarna`) values 
(1,1,'Blue'),
(2,1,'Green'),
(3,1,'Cocoa Brown'),
(4,1,'Candy Brown'),
(5,1,'Rotan Pink'),
(6,1,'Rotan Brown'),
(7,1,'Orange'),
(8,1,'Red'),
(9,1,'Rotan Grey'),
(10,1,'Walnus Brown'),
(11,1,'Red Mahony'),
(12,1,'Dark Mahony'),
(13,2,'Tea Brown'),
(14,2,'Coffe Brown'),
(15,2,'Brown KJ'),
(16,2,'Salak Brown'),
(17,2,'Light Brown'),
(18,2,'Dark Brown'),
(19,2,'Black'),
(20,2,'SHP Brown'),
(21,3,'Oak'),
(22,3,'Ramin'),
(23,3,'Sungkai'),
(24,3,'Teak'),
(25,3,'Yellow'),
(26,3,'Candy Yellow'),
(27,3,'Candy Brown');

/*Table structure for table `tblmasterwarnas` */

DROP TABLE IF EXISTS `tblmasterwarnas`;

CREATE TABLE `tblmasterwarnas` (
  `IdMWarna` int(11) NOT NULL AUTO_INCREMENT,
  `JenisWarna` varchar(25) DEFAULT NULL,
  `Nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdMWarna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblmasterwarnas` */

insert  into `tblmasterwarnas`(`IdMWarna`,`JenisWarna`,`Nilai`) values 
(1,'Warna Cerah',3),
(2,'Warna Gelap',2),
(3,'Warna Terang',1);

/*Table structure for table `tblpenilaiankriteriaadmins` */

DROP TABLE IF EXISTS `tblpenilaiankriteriaadmins`;

CREATE TABLE `tblpenilaiankriteriaadmins` (
  `IdMPenilaianKriteria` int(11) NOT NULL AUTO_INCREMENT,
  `IdMUser` int(11) DEFAULT NULL,
  `IdMBrg` int(11) DEFAULT NULL,
  `PosisiMatrix` varchar(5) DEFAULT NULL,
  `Nilai` double(20,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdMPenilaianKriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

/*Data for the table `tblpenilaiankriteriaadmins` */

insert  into `tblpenilaiankriteriaadmins`(`IdMPenilaianKriteria`,`IdMUser`,`IdMBrg`,`PosisiMatrix`,`Nilai`,`created_at`,`updated_at`) values 
(226,1,1,'0_0',1.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(227,1,1,'0_1',3.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(228,1,1,'0_2',3.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(229,1,1,'0_3',4.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(230,1,1,'0_4',7.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(231,1,1,'1_0',0.33,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(232,1,1,'1_1',1.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(233,1,1,'1_2',4.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(234,1,1,'1_3',4.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(235,1,1,'1_4',6.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(236,1,1,'2_0',0.33,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(237,1,1,'2_1',0.25,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(238,1,1,'2_2',1.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(239,1,1,'2_3',3.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(240,1,1,'2_4',5.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(241,1,1,'3_0',0.25,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(242,1,1,'3_1',0.25,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(243,1,1,'3_2',0.33,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(244,1,1,'3_3',1.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(245,1,1,'3_4',3.00,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(246,1,1,'4_0',0.14,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(247,1,1,'4_1',0.17,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(248,1,1,'4_2',0.20,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(249,1,1,'4_3',0.33,'2019-10-14 11:23:41','2019-10-14 11:23:41'),
(250,1,1,'4_4',1.00,'2019-10-14 11:23:41','2019-10-14 11:23:41');

/*Table structure for table `getnomorvarianperbarang` */

DROP TABLE IF EXISTS `getnomorvarianperbarang`;

/*!50001 DROP VIEW IF EXISTS `getnomorvarianperbarang` */;
/*!50001 DROP TABLE IF EXISTS `getnomorvarianperbarang` */;

/*!50001 CREATE TABLE  `getnomorvarianperbarang`(
 `IdMBrg` int(11) ,
 `KdMBrg` varchar(25) ,
 `NmMBrg` varchar(50) ,
 `NomorVarian` bigint(21) 
)*/;

/*Table structure for table `getviewbarang` */

DROP TABLE IF EXISTS `getviewbarang`;

/*!50001 DROP VIEW IF EXISTS `getviewbarang` */;
/*!50001 DROP TABLE IF EXISTS `getviewbarang` */;

/*!50001 CREATE TABLE  `getviewbarang`(
 `IdMBrg` int(11) ,
 `KdMBrg` varchar(25) ,
 `NmMBrg` varchar(50) ,
 `Kecil` decimal(60,6) ,
 `Sedang` decimal(60,6) ,
 `Besar` decimal(60,6) 
)*/;

/*Table structure for table `getviewnilaistandar` */

DROP TABLE IF EXISTS `getviewnilaistandar`;

/*!50001 DROP VIEW IF EXISTS `getviewnilaistandar` */;
/*!50001 DROP TABLE IF EXISTS `getviewnilaistandar` */;

/*!50001 CREATE TABLE  `getviewnilaistandar`(
 `IdMVarian` int(11) ,
 `IdMBrg` int(11) ,
 `KdMVarian` varchar(25) ,
 `NmMVarian` varchar(100) ,
 `Ukuran` varchar(20) ,
 `Panjang` decimal(20,2) ,
 `Lebar` decimal(20,2) ,
 `Tinggi` decimal(20,2) ,
 `TinggiDudukan` decimal(20,2) ,
 `Harga` decimal(20,2) ,
 `IdMWarnaD` int(11) ,
 `IdMDesign` int(11) ,
 `IdMBahan` int(11) ,
 `Foto` varchar(1000) ,
 `FotoTumb` varchar(1000) ,
 `IdMUserCreate` int(11) ,
 `created_at` datetime ,
 `IdMUserUpdate` int(11) ,
 `updated_at` datetime ,
 `KdMBrg` varchar(25) ,
 `NmMBrg` varchar(50) ,
 `n_Harga` int(1) ,
 `n_warna` int(11) ,
 `n_design` int(11) ,
 `n_bahan` int(11) ,
 `n_Ukuran` varchar(6) 
)*/;

/*Table structure for table `getviewukuran` */

DROP TABLE IF EXISTS `getviewukuran`;

/*!50001 DROP VIEW IF EXISTS `getviewukuran` */;
/*!50001 DROP TABLE IF EXISTS `getviewukuran` */;

/*!50001 CREATE TABLE  `getviewukuran`(
 `IdMUkuran` int(11) ,
 `IdMBarang` int(11) ,
 `Panjang` double(20,2) ,
 `Lebar` double(20,2) ,
 `Tinggi` double(20,2) ,
 `Nilai` int(11) ,
 `IdMUserCreate` int(11) ,
 `created_at` datetime ,
 `IdMUserUpdate` int(11) ,
 `updated_at` datetime ,
 `KdMBrg` varchar(25) ,
 `NmMBrg` varchar(50) ,
 `ukuran` varchar(183) 
)*/;

/*Table structure for table `getviewvarian` */

DROP TABLE IF EXISTS `getviewvarian`;

/*!50001 DROP VIEW IF EXISTS `getviewvarian` */;
/*!50001 DROP TABLE IF EXISTS `getviewvarian` */;

/*!50001 CREATE TABLE  `getviewvarian`(
 `IdMVarian` int(11) ,
 `IdMBrg` int(11) ,
 `KdMVarian` varchar(25) ,
 `NmMVarian` varchar(100) ,
 `Ukuran` varchar(20) ,
 `Panjang` decimal(20,2) ,
 `Lebar` decimal(20,2) ,
 `Tinggi` decimal(20,2) ,
 `TinggiDudukan` decimal(20,2) ,
 `Harga` decimal(20,2) ,
 `IdMWarnaD` int(11) ,
 `IdMDesign` int(11) ,
 `IdMBahan` int(11) ,
 `Foto` varchar(1000) ,
 `FotoTumb` varchar(1000) ,
 `IdMUserCreate` int(11) ,
 `created_at` datetime ,
 `IdMUserUpdate` int(11) ,
 `updated_at` datetime ,
 `NmMWarna` varchar(25) ,
 `JenisDesign` varchar(25) ,
 `NmMBahan` varchar(25) ,
 `n_Ukuran` varchar(6) 
)*/;

/*View structure for view getnomorvarianperbarang */

/*!50001 DROP TABLE IF EXISTS `getnomorvarianperbarang` */;
/*!50001 DROP VIEW IF EXISTS `getnomorvarianperbarang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getnomorvarianperbarang` AS select `m`.`IdMBrg` AS `IdMBrg`,`m`.`KdMBrg` AS `KdMBrg`,`m`.`NmMBrg` AS `NmMBrg`,count(`v`.`IdMBrg`) AS `NomorVarian` from (`tblmasterbarangs` `m` left join `tblmastervarians` `v` on((`m`.`IdMBrg` = `v`.`IdMBrg`))) group by `m`.`IdMBrg` */;

/*View structure for view getviewbarang */

/*!50001 DROP TABLE IF EXISTS `getviewbarang` */;
/*!50001 DROP VIEW IF EXISTS `getviewbarang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getviewbarang` AS select `brg`.`IdMBrg` AS `IdMBrg`,`brg`.`KdMBrg` AS `KdMBrg`,`brg`.`NmMBrg` AS `NmMBrg`,((`brg`.`PKecil` * `brg`.`LKecil`) * `brg`.`TKecil`) AS `Kecil`,((`brg`.`PSedang` * `brg`.`LSedang`) * `brg`.`TSedang`) AS `Sedang`,((`brg`.`PBesar` * `brg`.`LBesar`) * `brg`.`TBesar`) AS `Besar` from `tblmasterbarangs` `brg` */;

/*View structure for view getviewnilaistandar */

/*!50001 DROP TABLE IF EXISTS `getviewnilaistandar` */;
/*!50001 DROP VIEW IF EXISTS `getviewnilaistandar` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getviewnilaistandar` AS select `varian`.`IdMVarian` AS `IdMVarian`,`varian`.`IdMBrg` AS `IdMBrg`,`varian`.`KdMVarian` AS `KdMVarian`,`varian`.`NmMVarian` AS `NmMVarian`,`varian`.`Ukuran` AS `Ukuran`,`varian`.`Panjang` AS `Panjang`,`varian`.`Lebar` AS `Lebar`,`varian`.`Tinggi` AS `Tinggi`,`varian`.`TinggiDudukan` AS `TinggiDudukan`,`varian`.`Harga` AS `Harga`,`varian`.`IdMWarnaD` AS `IdMWarnaD`,`varian`.`IdMDesign` AS `IdMDesign`,`varian`.`IdMBahan` AS `IdMBahan`,`varian`.`Foto` AS `Foto`,`varian`.`FotoTumb` AS `FotoTumb`,`varian`.`IdMUserCreate` AS `IdMUserCreate`,`varian`.`created_at` AS `created_at`,`varian`.`IdMUserUpdate` AS `IdMUserUpdate`,`varian`.`updated_at` AS `updated_at`,`brg`.`KdMBrg` AS `KdMBrg`,`brg`.`NmMBrg` AS `NmMBrg`,if((`varian`.`Harga` <= 1000000),5,if(((`varian`.`Harga` > 1000000) and (`varian`.`Harga` <= 5000000)),4,if(((`varian`.`Harga` > 5000000) and (`varian`.`Harga` <= 10000000)),3,if(((`varian`.`Harga` > 10000000) and (`varian`.`Harga` <= 50000000)),2,if((`varian`.`Harga` > 50000000),1,0))))) AS `n_Harga`,`warna`.`Nilai` AS `n_warna`,`design`.`Nilai` AS `n_design`,`bahan`.`Nilai` AS `n_bahan`,if((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) <= `brg`.`Kecil`),'Kecil',if(((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) > `brg`.`Kecil`) and (((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) <= `brg`.`Sedang`)),'Sedang',if(((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) > `brg`.`Sedang`) and (((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) <= `brg`.`Besar`)),'Besar',if((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) > `brg`.`Besar`),'Besar','-')))) AS `n_Ukuran` from ((((((`tblmastervarians` `varian` left join `getviewbarang` `brg` on((`varian`.`IdMBrg` = `brg`.`IdMBrg`))) left join `tblmasterwarnads` `warnad` on((`varian`.`IdMWarnaD` = `warnad`.`IdMWarnaDs`))) left join `tblmasterwarnas` `warna` on((`warnad`.`IdMWarna` = `warna`.`IdMWarna`))) left join `tblmasterdesigns` `design` on((`varian`.`IdMDesign` = `design`.`IdMDesign`))) left join `tblmasterbahands` `bahand` on((`varian`.`IdMBahan` = `bahand`.`IdMBahanD`))) left join `tblmasterbahans` `bahan` on((`bahand`.`IdMBahan` = `bahan`.`IdMBahan`))) */;

/*View structure for view getviewukuran */

/*!50001 DROP TABLE IF EXISTS `getviewukuran` */;
/*!50001 DROP VIEW IF EXISTS `getviewukuran` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getviewukuran` AS select `m`.`IdMUkuran` AS `IdMUkuran`,`m`.`IdMBarang` AS `IdMBarang`,`m`.`Panjang` AS `Panjang`,`m`.`Lebar` AS `Lebar`,`m`.`Tinggi` AS `Tinggi`,`m`.`Nilai` AS `Nilai`,`m`.`IdMUserCreate` AS `IdMUserCreate`,`m`.`created_at` AS `created_at`,`m`.`IdMUserUpdate` AS `IdMUserUpdate`,`m`.`updated_at` AS `updated_at`,`brg`.`KdMBrg` AS `KdMBrg`,`brg`.`NmMBrg` AS `NmMBrg`,concat(format(`m`.`Panjang`,0),' x ',format(`m`.`Lebar`,0),' x ',format(`m`.`Tinggi`,0)) AS `ukuran` from (`tblmasterukurans` `m` left join `tblmasterbarangs` `brg` on((`m`.`IdMBarang` = `brg`.`IdMBrg`))) */;

/*View structure for view getviewvarian */

/*!50001 DROP TABLE IF EXISTS `getviewvarian` */;
/*!50001 DROP VIEW IF EXISTS `getviewvarian` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getviewvarian` AS select `varian`.`IdMVarian` AS `IdMVarian`,`varian`.`IdMBrg` AS `IdMBrg`,`varian`.`KdMVarian` AS `KdMVarian`,`varian`.`NmMVarian` AS `NmMVarian`,`varian`.`Ukuran` AS `Ukuran`,`varian`.`Panjang` AS `Panjang`,`varian`.`Lebar` AS `Lebar`,`varian`.`Tinggi` AS `Tinggi`,`varian`.`TinggiDudukan` AS `TinggiDudukan`,`varian`.`Harga` AS `Harga`,`varian`.`IdMWarnaD` AS `IdMWarnaD`,`varian`.`IdMDesign` AS `IdMDesign`,`varian`.`IdMBahan` AS `IdMBahan`,`varian`.`Foto` AS `Foto`,`varian`.`FotoTumb` AS `FotoTumb`,`varian`.`IdMUserCreate` AS `IdMUserCreate`,`varian`.`created_at` AS `created_at`,`varian`.`IdMUserUpdate` AS `IdMUserUpdate`,`varian`.`updated_at` AS `updated_at`,`warna`.`NmMWarna` AS `NmMWarna`,`design`.`JenisDesign` AS `JenisDesign`,`bahan`.`NmMBahan` AS `NmMBahan`,if((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) <= `brg`.`Kecil`),'Kecil',if(((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) > `brg`.`Kecil`) and (((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) <= `brg`.`Sedang`)),'Sedang',if(((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) > `brg`.`Sedang`) and (((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) <= `brg`.`Besar`)),'Besar',if((((`varian`.`Panjang` * `varian`.`Lebar`) * `varian`.`Tinggi`) > `brg`.`Besar`),'Besar','-')))) AS `n_Ukuran` from ((((`tblmastervarians` `varian` left join `tblmasterwarnads` `warna` on((`varian`.`IdMWarnaD` = `warna`.`IdMWarnaDs`))) left join `tblmasterdesigns` `design` on((`varian`.`IdMDesign` = `design`.`IdMDesign`))) left join `tblmasterbahands` `bahan` on((`varian`.`IdMBahan` = `bahan`.`IdMBahanD`))) left join `getviewbarang` `brg` on((`varian`.`IdMBrg` = `brg`.`IdMBrg`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
