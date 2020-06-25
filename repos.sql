/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.1.32-MariaDB : Database - thesis_repos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`thesis_repos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `thesis_repos`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) DEFAULT NULL,
  `programID` int(11) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`categoryID`,`category`,`programID`) values 
(8,'ARDUINO',8),
(9,'WEBPAGES and sites',8);

/*Table structure for table `institutes` */

DROP TABLE IF EXISTS `institutes`;

CREATE TABLE `institutes` (
  `instituteID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteCode` varchar(50) DEFAULT '',
  `instituteDesc` varchar(100) DEFAULT '',
  PRIMARY KEY (`instituteID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `institutes` */

insert  into `institutes`(`instituteID`,`instituteCode`,`instituteDesc`) values 
(1,'ICS','INSTITUTE OF COMPUTER STUDIES'),
(2,'ITE','INSTITUTE OF TEACHERS EDUCATION'),
(3,'ICJE','INSTITUTE OF CRIMINAL JUSTICE EDUCATION');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `positionID` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) DEFAULT '',
  PRIMARY KEY (`positionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `positions` */

/*Table structure for table `programs` */

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `programID` int(11) NOT NULL AUTO_INCREMENT,
  `programCode` varchar(50) DEFAULT '',
  `programDesc` varchar(100) DEFAULT '',
  `instituteID` int(11) DEFAULT NULL,
  PRIMARY KEY (`programID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `programs` */

insert  into `programs`(`programID`,`programCode`,`programDesc`,`instituteID`) values 
(8,'BSCS','BACHELOR OF SCIENCE IN COMPUTER SCIENCE',1),
(9,'BS CRIM','BACHELOR OF SCIENCE IN CRIMINOLOGY',3),
(10,'BSED-MATH','BACHELOR OF SCIENCE IN EDUCATION MAJOR IN MATHEMATICS',2);

/*Table structure for table `repos_file` */

DROP TABLE IF EXISTS `repos_file`;

CREATE TABLE `repos_file` (
  `reposID` int(11) NOT NULL AUTO_INCREMENT,
  `noViews` int(11) DEFAULT NULL,
  `nFile` longblob,
  `title` varchar(45) DEFAULT '',
  `nDesc` varchar(160) DEFAULT '',
  `dateUpload` date DEFAULT NULL,
  `instituteID` int(11) DEFAULT NULL,
  `dateLogs` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reposID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `repos_file` */

insert  into `repos_file`(`reposID`,`noViews`,`nFile`,`title`,`nDesc`,`dateUpload`,`instituteID`,`dateLogs`,`dateUpdate`) values 
(1,68,NULL,'','',NULL,NULL,'2019-08-13 22:00:58','2019-08-13 22:01:50');

/*Table structure for table `thesisfiles` */

DROP TABLE IF EXISTS `thesisfiles`;

CREATE TABLE `thesisfiles` (
  `thesisfileID` int(11) NOT NULL AUTO_INCREMENT,
  `thesistitle` varchar(100) DEFAULT '',
  `thesisdesc` varchar(255) DEFAULT '',
  `author` varchar(100) DEFAULT '',
  `abstractfile` varchar(255) DEFAULT '',
  `abstractfile_path` varchar(255) DEFAULT '',
  `thesisfile` varchar(255) DEFAULT '',
  `thesisfile_path` varchar(255) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `noViews` bigint(20) DEFAULT '0',
  `tagWords` text,
  `categoryID` int(11) DEFAULT NULL,
  PRIMARY KEY (`thesisfileID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `thesisfiles` */

insert  into `thesisfiles`(`thesisfileID`,`thesistitle`,`thesisdesc`,`author`,`abstractfile`,`abstractfile_path`,`thesisfile`,`thesisfile_path`,`created_at`,`updated_at`,`noViews`,`tagWords`,`categoryID`) values 
(1,'THESIS ARCHIVING','THESIS ARCHIVING','SANTARITA','1576381380_abstract.pdf','','1576381380_thesis.pdf','','2020-01-23 21:13:45','2020-01-23 21:13:45',0,'THESIS, REPOSITORY, DATA BANKING, DATA STORAGE',9),
(2,'CLOP GADTC GAMES','CLOP GADTC GAMES','KEITH','1576381522_abstract.pdf','','1576381522_thesis.pdf','','2020-01-23 23:22:47','2020-01-23 23:22:47',7,'PALARO, TABULATION,',9),
(3,'EVOTING','EVOTING','JOAN DOCOY','1576381687_abstract.pdf','','1576381687_thesis.pdf','','2020-01-23 23:23:38','2020-01-23 23:23:38',2,'SMS, VOTES, VOTING, ELECTRONIC VOTING',8),
(4,'MOBILEBASE','A mobile application system on android.','ALAB','1576381732_abstract.pdf','','1576381732_thesis.pdf','','2020-01-23 23:24:21','2020-01-23 23:24:21',8,'MOBILE BASE, MOBILE GAMES,',9),
(5,'REPOSITORY SYSTEM','THIS IS A REPOSITORY SYSTEM WAY PULOS LAME I AMBAK MTULAY','JUMAR','1579841947_abstract.pdf','','1579841947_thesis.pdf','','2020-01-23 22:59:37','2020-01-23 22:59:37',1,'SAMPLE',8);

/*Table structure for table `user_acc` */

DROP TABLE IF EXISTS `user_acc`;

CREATE TABLE `user_acc` (
  `useraccID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT '',
  `pwd` varchar(20) DEFAULT '',
  `lname` varchar(45) DEFAULT '',
  `fname` varchar(45) DEFAULT '',
  `mname` varchar(45) DEFAULT '',
  `positionID` int(11) DEFAULT NULL,
  `instituteID` int(11) DEFAULT NULL,
  `programID` int(11) DEFAULT NULL,
  PRIMARY KEY (`useraccID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_acc` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programID` int(11) DEFAULT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`lname`,`fname`,`mname`,`password`,`remember_token`,`created_at`,`updated_at`,`programID`,`position`) values 
(1,'eamparado','Amparado','Etienne Wayne',NULL,'$2y$10$ok1JXPOU1kZs8fdnJw5QKuQh5c6NiJ8iCDBfWPmWJvh7MHzjdUO/W',NULL,'2019-10-30 04:38:34','2019-12-10 03:33:59',8,'STUDENT'),
(7,'admin','admin','admin',NULL,'$2y$10$7Fwo0K672AjcGdROvsKrL.qyTiAvDBbKWpX4ZIwvuvTPhOJAGmQ/2','','2019-11-16 15:52:01','2019-11-17 00:15:36',8,'ADMINISTRATOR'),
(8,'rpersonnel','alab','marvilowe',NULL,'$2y$10$RBO.wee79DuwPRbFxQ4x7OzrP4506qBydU8GodiYNA/0BaamispE6','','2020-01-23 05:00:30','2020-01-23 05:00:30',8,'RESEARCH PERSONNEL');

/*Table structure for table `viewcounter` */

DROP TABLE IF EXISTS `viewcounter`;

CREATE TABLE `viewcounter` (
  `viewcounterID` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `viewcounter` */

/*Table structure for table `vw_categories` */

DROP TABLE IF EXISTS `vw_categories`;

/*!50001 DROP VIEW IF EXISTS `vw_categories` */;
/*!50001 DROP TABLE IF EXISTS `vw_categories` */;

/*!50001 CREATE TABLE  `vw_categories`(
 `categoryID` int(11) ,
 `category` varchar(30) ,
 `programID` int(11) ,
 `programCode` varchar(50) ,
 `programDesc` varchar(100) ,
 `instituteID` int(11) ,
 `instituteCode` varchar(50) ,
 `instituteDesc` varchar(100) 
)*/;

/*Table structure for table `vw_programs` */

DROP TABLE IF EXISTS `vw_programs`;

/*!50001 DROP VIEW IF EXISTS `vw_programs` */;
/*!50001 DROP TABLE IF EXISTS `vw_programs` */;

/*!50001 CREATE TABLE  `vw_programs`(
 `programID` int(11) ,
 `programCode` varchar(50) ,
 `programDesc` varchar(100) ,
 `instituteID` int(11) ,
 `instituteCode` varchar(50) ,
 `instituteDesc` varchar(100) 
)*/;

/*Table structure for table `vw_users` */

DROP TABLE IF EXISTS `vw_users`;

/*!50001 DROP VIEW IF EXISTS `vw_users` */;
/*!50001 DROP TABLE IF EXISTS `vw_users` */;

/*!50001 CREATE TABLE  `vw_users`(
 `id` bigint(20) unsigned ,
 `username` varchar(255) ,
 `lname` varchar(255) ,
 `fname` varchar(255) ,
 `mname` varchar(255) ,
 `remember_token` varchar(100) ,
 `created_at` timestamp ,
 `updated_at` timestamp ,
 `programID` int(11) ,
 `position` varchar(30) ,
 `programCode` varchar(50) ,
 `programDesc` varchar(100) ,
 `instituteID` int(11) ,
 `instituteCode` varchar(50) ,
 `instituteDesc` varchar(100) 
)*/;

/*View structure for view vw_categories */

/*!50001 DROP TABLE IF EXISTS `vw_categories` */;
/*!50001 DROP VIEW IF EXISTS `vw_categories` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categories` AS (select `a`.`categoryID` AS `categoryID`,`a`.`category` AS `category`,`a`.`programID` AS `programID`,`b`.`programCode` AS `programCode`,`b`.`programDesc` AS `programDesc`,`b`.`instituteID` AS `instituteID`,`c`.`instituteCode` AS `instituteCode`,`c`.`instituteDesc` AS `instituteDesc` from ((`categories` `a` join `programs` `b` on((`a`.`programID` = `b`.`programID`))) join `institutes` `c` on((`b`.`instituteID` = `c`.`instituteID`)))) */;

/*View structure for view vw_programs */

/*!50001 DROP TABLE IF EXISTS `vw_programs` */;
/*!50001 DROP VIEW IF EXISTS `vw_programs` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_programs` AS (select `a`.`programID` AS `programID`,`a`.`programCode` AS `programCode`,`a`.`programDesc` AS `programDesc`,`a`.`instituteID` AS `instituteID`,`b`.`instituteCode` AS `instituteCode`,`b`.`instituteDesc` AS `instituteDesc` from (`programs` `a` join `institutes` `b` on((`a`.`instituteID` = `b`.`instituteID`)))) */;

/*View structure for view vw_users */

/*!50001 DROP TABLE IF EXISTS `vw_users` */;
/*!50001 DROP VIEW IF EXISTS `vw_users` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_users` AS (select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`lname` AS `lname`,`a`.`fname` AS `fname`,`a`.`mname` AS `mname`,`a`.`remember_token` AS `remember_token`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`a`.`programID` AS `programID`,`a`.`position` AS `position`,`b`.`programCode` AS `programCode`,`b`.`programDesc` AS `programDesc`,`b`.`instituteID` AS `instituteID`,`c`.`instituteCode` AS `instituteCode`,`c`.`instituteDesc` AS `instituteDesc` from ((`users` `a` join `programs` `b` on((`a`.`programID` = `b`.`programID`))) join `institutes` `c` on((`b`.`instituteID` = `c`.`instituteID`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
