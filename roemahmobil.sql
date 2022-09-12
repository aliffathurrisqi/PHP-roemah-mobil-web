/*
SQLyog Ultimate v8.4 
MySQL - 5.5.5-10.4.18-MariaDB : Database - roemahmobil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`roemahmobil` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `roemahmobil`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `akun` */

insert  into `akun`(`username`,`password`,`nama_lengkap`,`no_hp`,`alamat`) values ('khoirunnisa','5180411095','Khoirun Nisa','083846457389','Setriyan, RT 3/RW 5, Hadiluwih, Kec,Ngadirojo, Kab.Pacitan'),('tiaraanisa','04052021','Tiara Anisa Putri','081987234999','Setriyan, RT 3/RW 5, Hadiluwih, Kec,Ngadirojo, Kab.Pacitan');

/*Table structure for table `booking_kendaraan` */

DROP TABLE IF EXISTS `booking_kendaraan`;

CREATE TABLE `booking_kendaraan` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `batas_akhir` date DEFAULT NULL,
  `status` enum('Belum Konfirmasi','Sudah Konfirmasi') DEFAULT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `booking_kendaraan` */

insert  into `booking_kendaraan`(`id_booking`,`nopol`,`username`,`waktu`,`batas_akhir`,`status`) values (1,'AB 1234 XY','khoirunnisa','2021-04-06','2021-05-03','Sudah Konfirmasi'),(6,'AB 2024 BHG','tiaraanisa','2021-05-04','2021-05-11','Sudah Konfirmasi'),(8,'AB 2024 ANG','khoirunnisa','2021-05-04','2021-05-11','Belum Konfirmasi'),(9,'AB 4040 B','khoirunnisa','2021-05-04','2021-05-11','Belum Konfirmasi');

/*Table structure for table `data_transaksi` */

DROP TABLE IF EXISTS `data_transaksi`;

CREATE TABLE `data_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_transaksi` */

insert  into `data_transaksi`(`id_transaksi`,`id_booking`,`waktu`,`jumlah`) values (1,1,'2021-04-06',325000000);

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `nopol` varchar(11) NOT NULL,
  `merek` varchar(25) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `tahun_pembuatan` int(11) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `status` enum('Baru','Bekas') DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`nopol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kendaraan` */

insert  into `kendaraan`(`nopol`,`merek`,`tipe`,`tahun_pembuatan`,`warna`,`status`,`harga`,`img`) values ('AB 1034 CH','Toyota','Avanza',2016,'Silver','Bekas',129000000,'toyota-avanza.jpg'),('AB 2024 ANG','Honda','Brio Satya S',2020,'Kuning','Baru',325000000,NULL),('AB 3003 J','Hyundai','Elantra',2017,'Merah','Bekas',220000000,'hyundai-elantra.jpg'),('AB 4040 B','Honda','Civic',2018,'Merah','Bekas',364000000,'honda-civic.jpg'),('AB 7254 J','Daihatsu','Terios',2019,'Putih','Bekas',210000000,'daihatsu-terios.jpg'),('AB 8212 HK','Wuling','Almaz',2021,'Hitam','Baru',260000000,'wuling-almaz.jpg');

/*Table structure for table `riwayat_kendaraan` */

DROP TABLE IF EXISTS `riwayat_kendaraan`;

CREATE TABLE `riwayat_kendaraan` (
  `id_riwayat` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(13) DEFAULT NULL,
  `merek` varchar(20) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `tahun_pembuatan` int(11) DEFAULT NULL,
  `status` enum('Baru','Bekas') DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `booking` enum('Booking','Beli') DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_riwayat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `riwayat_kendaraan` */

insert  into `riwayat_kendaraan`(`id_riwayat`,`nopol`,`merek`,`tipe`,`tahun_pembuatan`,`status`,`img`,`harga`,`waktu`,`booking`,`warna`) values (2,'AB 2024 BHG','Isuzu','Panther Grand Royale',1997,'Bekas',NULL,75000000,'2021-05-04 23:23:08','Beli','Hijau'),(3,'AB 2024 ANG','Honda','Brio Satya S',2020,'Baru',NULL,325000000,'2021-05-04 23:45:47','Booking','Kuning'),(4,'AB 4040 B','Honda','Civic',2018,'Bekas','honda-civic.jpg',364000000,'2021-05-04 23:47:14','Booking','Merah');

/* Trigger structure for table `booking_kendaraan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `riwayat_booking` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `riwayat_booking` AFTER INSERT ON `booking_kendaraan` FOR EACH ROW BEGIN
    INSERT INTO riwayat_kendaraan SET
    nopol = new.nopol,
    merek = (SELECT merek FROM kendaraan WHERE nopol = new.nopol),
    tipe = (SELECT tipe FROM kendaraan WHERE nopol = new.nopol),
    tahun_pembuatan = (SELECT tahun_pembuatan FROM kendaraan WHERE nopol = new.nopol),
    STATUS = (SELECT status FROM kendaraan WHERE nopol = new.nopol),
    img = (SELECT img FROM kendaraan WHERE nopol = new.nopol),
    harga = (SELECT harga FROM kendaraan WHERE nopol = new.nopol),
    booking = "Booking",
    warna = (SELECT warna FROM kendaraan WHERE nopol = new.nopol),
    waktu = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `booking_kendaraan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `konfirmasi_booking` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `konfirmasi_booking` AFTER UPDATE ON `booking_kendaraan` FOR EACH ROW BEGIN
    DELETE FROM kendaraan WHERE nopol = NEW.nopol;
END */$$


DELIMITER ;

/* Trigger structure for table `booking_kendaraan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_booking` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_booking` AFTER UPDATE ON `booking_kendaraan` FOR EACH ROW BEGIN
    DELETE FROM riwayat_kendaraan WHERE nopol = NEW.nopol AND booking = "Booking";
END */$$


DELIMITER ;

/* Trigger structure for table `kendaraan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `riwayat_kendaraan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `riwayat_kendaraan` AFTER DELETE ON `kendaraan` FOR EACH ROW BEGIN
    INSERT INTO riwayat_kendaraan SET
    nopol = old.nopol,
    merek = old.merek,
    tipe = old.tipe,
    tahun_pembuatan = old.tahun_pembuatan,
    STATUS = old.status,
    img = old.img,
    harga = old.harga,
    booking = "Beli",
    warna = old.warna,
    waktu = NOW();
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
