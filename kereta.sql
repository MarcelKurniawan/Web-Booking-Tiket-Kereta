/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - bookingkereta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bookingkereta` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bookingkereta`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_penumpang` int(11) NOT NULL,
  `id_kereta` varchar(10) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `jam_keberangkatan` time NOT NULL,
  `no_kursi` int(11) NOT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `fk_id_kereta` (`id_kereta`),
  KEY `fk_id_penumpang` (`id_penumpang`),
  CONSTRAINT `fk_id_kereta` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`),
  CONSTRAINT `fk_id_penumpang` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id_penumpang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `booking` */

insert  into `booking`(`id_booking`,`id_penumpang`,`id_kereta`,`tgl_keberangkatan`,`jam_keberangkatan`,`no_kursi`) values 
(2,2,'BDM','2023-01-24','07:27:00',15),
(3,5,'HARN','2023-01-25','19:00:00',15),
(4,5,'HARN','2023-01-24','09:45:00',14);

/*Table structure for table `data_admin` */

DROP TABLE IF EXISTS `data_admin`;

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_admin` */

insert  into `data_admin`(`id_admin`,`nama_admin`,`username`,`password`) values 
(1,'admin','admin','admin');

/*Table structure for table `kereta` */

DROP TABLE IF EXISTS `kereta`;

CREATE TABLE `kereta` (
  `id_kereta` varchar(10) NOT NULL,
  `id_stasiun` varchar(10) NOT NULL,
  `nama_kereta` varchar(25) NOT NULL,
  `asal` varchar(25) NOT NULL,
  `tujuan` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_kereta`),
  KEY `fk_id_stasiun` (`id_stasiun`),
  CONSTRAINT `fk_id_stasiun` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id_stasiun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kereta` */

insert  into `kereta`(`id_kereta`,`id_stasiun`,`nama_kereta`,`asal`,`tujuan`,`kelas`,`harga`) values 
('ARGJ','CRB','Argojaya','Cirebon','Jakarta','Bisnis',120000),
('BDM','CRB','Badam','Bandung','Merak','Eksekutif',400000),
('HARN','BDO','Harina','Bandung','Surabaya','Eksekutif',300000),
('SDK','SBY','Sedong','Surabaya','Jakarta','Bisnis',150000),
('SUS','BDO','Susar','Jakarta','Bandung','Bisnis',300000);

/*Table structure for table `penumpang` */

DROP TABLE IF EXISTS `penumpang`;

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penumpang` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_penumpang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penumpang` */

insert  into `penumpang`(`id_penumpang`,`nama_penumpang`,`jenis_kelamin`,`kota`,`tgl_lahir`,`no_telp`) values 
(2,'Rina Asianti','Perempuan','Bandung','2006-03-01','08625361243'),
(3,'Rinto Zaki','Laki-Laki','Tangerang','1998-08-04','08635241241'),
(4,'Ahmad Ryadi','Laki-Laki','Banten','2000-06-04','08732123217'),
(5,'Ani Martono','Perempuan','Cirebon','1988-08-10','08923712312'),
(6,'Silvia Putri','Perempuan','Jakarta','1999-02-26','08323178217');

/*Table structure for table `stasiun` */

DROP TABLE IF EXISTS `stasiun`;

CREATE TABLE `stasiun` (
  `id_stasiun` varchar(10) NOT NULL,
  `nama_stasiun` varchar(25) NOT NULL,
  `kota_stasiun` varchar(25) NOT NULL,
  PRIMARY KEY (`id_stasiun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `stasiun` */

insert  into `stasiun`(`id_stasiun`,`nama_stasiun`,`kota_stasiun`) values 
('BAN','Stasiun Banten Jaya','Banten Barat'),
('BDO','Stasiun Bandung Api','Bandung'),
('BGR','Stasiun Bogor','Bogor'),
('CRB','Stasiun Kejaksan','Cirebon'),
('JKT','Stasiun Gambir','Jakarta'),
('MLGS','Stasiun Saruan','Malang'),
('MLM','Stasiun Maimun','Maimun'),
('SBY','Stasiun Surabaya','Surabaya');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
