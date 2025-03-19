/*
SQLyog Trial v13.1.8 (64 bit)
MySQL - 10.3.17-MariaDB : Database - garage
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`garage` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `garage`;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(20) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(20) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0,
  `role_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10048 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`emp_id`,`lname`,`fname`,`mname`,`address`,`contact`,`email`,`createdAt`,`createdBy`,`updatedAt`,`updatedBy`,`deletedAt`,`deletedBy`,`is_deleted`,`role_id`) values 
(1,'adsfgj','adshfss','adsdfgj','adsfgj','32463456575',NULL,'2023-11-26 05:12:31',NULL,NULL,NULL,'2023-12-14 06:07:27',NULL,1,3),
(2,'Abogadie','Melvin','Rosales','pulong buhangin','34564574565','astig@gmail.com','2023-12-13 01:41:50',NULL,'2024-05-27 04:58:12',5,NULL,NULL,0,3),
(3,'Dela Cruz','Jermaine','Cancio','Lalakhan','09215762559','delacruzjermainec@gmail.com','2023-12-14 10:01:25',NULL,NULL,NULL,NULL,NULL,0,4),
(4,'rawr','rawr','rawr','rawr','12312344553',NULL,'2023-12-01 13:29:22',NULL,NULL,NULL,NULL,NULL,0,1),
(5,'Fajardo','Ryan','Parulan','Pandi','09123892892','tikoyryan@gmail.com','2023-12-14 13:36:17',NULL,NULL,NULL,NULL,NULL,0,4),
(10023,'Roque','Prince','rawr','Poblacion','09123456789',NULL,'2023-12-14 06:04:28',NULL,NULL,NULL,NULL,NULL,0,1),
(10024,'man','bat','is','Gotham','09215762587','batman@gmail.com','2023-12-15 08:19:58',3,'2023-12-15 02:56:26',3,NULL,NULL,0,2),
(10046,'test','test','test','test','123123123','abogadiemelvin09@gmail.com','2025-03-19 03:04:43',NULL,NULL,NULL,NULL,NULL,0,2),
(10047,'test321','test321','test321','test321','123123123','abogadiemelvin09+test@gmail.com','2025-03-19 03:11:04',NULL,NULL,NULL,NULL,NULL,0,2);

/*Table structure for table `health` */

DROP TABLE IF EXISTS `health`;

CREATE TABLE `health` (
  `health_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `is_sick` smallint(1) DEFAULT 0,
  `ill_id` int(11) DEFAULT NULL,
  `date_declared` date DEFAULT NULL,
  `date_cured` date DEFAULT NULL,
  PRIMARY KEY (`health_id`),
  KEY `illness_id` (`ill_id`),
  KEY `employee_id` (`emp_id`),
  CONSTRAINT `health_ibfk_1` FOREIGN KEY (`ill_id`) REFERENCES `illness` (`ill_id`),
  CONSTRAINT `health_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `health` */

insert  into `health`(`health_id`,`emp_id`,`is_sick`,`ill_id`,`date_declared`,`date_cured`) values 
(1,10023,0,2,'2023-12-17','2023-12-17'),
(2,10024,0,4,'2023-12-17','2024-05-27'),
(3,10024,0,6,'2023-12-17','2023-12-17'),
(4,10023,0,3,'2023-12-17','2024-05-27'),
(5,1,1,1,'2023-12-17',NULL),
(6,10024,0,2,'2023-12-17','2024-05-27');

/*Table structure for table `illness` */

DROP TABLE IF EXISTS `illness`;

CREATE TABLE `illness` (
  `ill_id` int(11) NOT NULL AUTO_INCREMENT,
  `ill_name` varchar(50) NOT NULL,
  `contagious` varchar(3) NOT NULL,
  `danger_level` int(10) NOT NULL,
  PRIMARY KEY (`ill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `illness` */

insert  into `illness`(`ill_id`,`ill_name`,`contagious`,`danger_level`) values 
(1,'Prince catu Roque','sam',999009099),
(2,'Prince catu Roque','No',6),
(3,'Covid-19','Yes',10),
(4,'Migrane','No',1),
(5,'Cancer','No',10),
(6,'Aids','Yes',7);

/*Table structure for table `ismaintenance` */

DROP TABLE IF EXISTS `ismaintenance`;

CREATE TABLE `ismaintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ismaintenance` */

insert  into `ismaintenance`(`id`,`status`) values 
(1,0);

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `members` */

insert  into `members`(`id`,`user_id`,`firstname`,`middlename`,`lastname`,`gender`,`contact`,`address`,`email`,`date_created`) values 
(5,1,'Mike','D','Williams','Male','+14526-5455-44','Sample Address','mwilliams@sample.com','2020-10-21 13:18:19'),
(6,2,'Claire','D','Blake','Female','+18456-5455-55','Sample','cblake@sample.com','2020-10-21 14:57:54'),
(7,3,'Mike','D','Williams','Male','+14526-5455-44','Sample Address','mwilliams@sample.com','2020-10-21 13:18:19'),
(8,4,'Claire','D','Blake','Female','+18456-5455-55','Sample','cblake@sample.com','2020-10-21 14:57:54');

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `Or_id` bigint(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(6) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(6) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order` */

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `package` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `packages` */

insert  into `packages`(`id`,`package`,`description`,`amount`) values 
(2,'Sample Package','Program sample  + trainer',3500);

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `registration_id` int(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=registration, 2= monthly payment',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `payments` */

insert  into `payments`(`id`,`registration_id`,`amount`,`remarks`,`type`,`date_created`) values 
(1,2,4500,'First payment',2,'2020-10-21 14:39:26'),
(2,2,3500,'payment for november',2,'2020-10-21 14:39:52');

/*Table structure for table `plans` */

DROP TABLE IF EXISTS `plans`;

CREATE TABLE `plans` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `plan` int(30) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `plans` */

insert  into `plans`(`id`,`plan`,`amount`) values 
(1,12,1000);

/*Table structure for table `registration_info` */

DROP TABLE IF EXISTS `registration_info`;

CREATE TABLE `registration_info` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `member_id` int(30) NOT NULL,
  `plan_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `trainer_id` tinyint(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `date_created` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `registration_info` */

insert  into `registration_info`(`id`,`member_id`,`plan_id`,`package_id`,`start_date`,`end_date`,`trainer_id`,`status`,`date_created`) values 
(2,5,1,2,'2020-10-21','2021-10-21',0,0,'2020-10-21'),
(3,5,1,2,'2020-10-21','2021-10-21',0,1,'2020-10-21'),
(4,6,1,2,'2019-10-19','2020-10-19',0,0,'2020-10-21'),
(5,6,1,2,'2020-10-21','2021-10-21',0,1,'2020-10-21');

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(20) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(20) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `schedule` */

/*Table structure for table `schedules` */

DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `dow` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `mechanic` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

/*Data for the table `schedules` */

insert  into `schedules`(`id`,`user_id`,`full_name`,`dow`,`date_from`,`date_to`,`time_from`,`time_to`,`status`,`mechanic`,`type`,`model`) values 
(40,10046,'test test','OBD Scanning - ₱500, Computer Box Repair - ₱1500, Electronic Troubleshooting - ₱1200','2025-03-19','2025-03-19','11:09:00','11:09:00',2,'Maria Santos','',''),
(41,10046,'test test','OBD Scanning - ₱500, Computer Box Repair - ₱1500, ECU Remapping - ₱3000','2025-03-26','2025-03-26','03:08:00','03:08:00',1,'Antonio Garcia','',''),
(42,10047,'test321 test321','Computer Box Repair - ₱1500, Electronic Troubleshooting - ₱1200, Injector Testing and Cleaning - ₱1800, Wheel Alignment - ₱800, Wheel Balancing - ₱500, Vulcanizing - ₱300, Oil Change - ₱700, Detailing - ₱2500, Car Wash - ₱400, Ceramic Coating - ₱5000','2025-03-20','2025-03-20','03:12:00','03:12:00',2,'Ernesto Aquino','','');

/*Table structure for table `trainers` */

DROP TABLE IF EXISTS `trainers`;

CREATE TABLE `trainers` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trainers` */

insert  into `trainers`(`id`,`name`,`contact`,`email`,`rate`) values 
(1,'John Smith','+18456-5455-55','jsmith@sample.com',500);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(20) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(20) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0,
  `active` smallint(1) DEFAULT 0,
  `emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10048 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`password`,`lastLogin`,`createdAt`,`createdBy`,`updatedAt`,`updatedBy`,`deletedAt`,`deletedBy`,`is_deleted`,`active`,`emp_id`) values 
(1,'memen','12345',NULL,'2023-12-14 14:25:09',NULL,'2023-12-16 12:27:47',3,NULL,NULL,0,0,3),
(2,'test2','test',NULL,'2023-12-14 14:25:37',NULL,NULL,NULL,NULL,NULL,NULL,1,5),
(3,'admin','admin',NULL,'2023-12-14 14:26:26',NULL,NULL,NULL,NULL,NULL,0,1,3),
(10046,'test123','test123',NULL,'2025-03-19 03:04:43',NULL,NULL,NULL,NULL,NULL,0,1,10046),
(10047,'test321','test321',NULL,'2025-03-19 03:11:04',NULL,NULL,NULL,NULL,NULL,0,1,10047);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`password`,`type`) values 
(1,'Administrator','admin','admin2',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
