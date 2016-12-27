/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.5-10.1.9-MariaDB : Database - laravel_exercise
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `access_log` */

DROP TABLE IF EXISTS `access_log`;

CREATE TABLE `access_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL,
  `login_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime DEFAULT NULL,
  `browser_info` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `access_log` */

/*Table structure for table `activations` */

DROP TABLE IF EXISTS `activations`;

CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `activations` */

insert  into `activations`(`id`,`user_id`,`code`,`completed`,`completed_at`,`created_at`,`updated_at`) values (1,1,'BbAvY8le6XJLLQDKMt9cRzObtChPHGaH',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','2016-12-27 18:48:27');

/*Table structure for table `cc_department` */

DROP TABLE IF EXISTS `cc_department`;

CREATE TABLE `cc_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `weight` int(10) unsigned NOT NULL,
  `is_default` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cc_department` */

insert  into `cc_department`(`id`,`code`,`name`,`name_bn`,`created_by`,`updated_by`,`weight`,`is_default`,`is_active`,`created_at`,`updated_at`) values (1,'CSE','Computer Science and Engineering','Computer Science and Engineering [BN]',1,1,8,1,1,NULL,NULL);
insert  into `cc_department`(`id`,`code`,`name`,`name_bn`,`created_by`,`updated_by`,`weight`,`is_default`,`is_active`,`created_at`,`updated_at`) values (2,'ACC','Accounting','Accounting [BN]',1,1,7,1,1,NULL,NULL);
insert  into `cc_department`(`id`,`code`,`name`,`name_bn`,`created_by`,`updated_by`,`weight`,`is_default`,`is_active`,`created_at`,`updated_at`) values (3,'FIN','Finance','Finance [BN]',1,1,6,1,1,NULL,NULL);
insert  into `cc_department`(`id`,`code`,`name`,`name_bn`,`created_by`,`updated_by`,`weight`,`is_default`,`is_active`,`created_at`,`updated_at`) values (4,'IST','Islamic Studies','Islamic Studies [BN]',1,1,5,1,1,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2016_12_27_172345_create_access_log_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2016_12_27_173420_create_cc_department_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `persistences` */

DROP TABLE IF EXISTS `persistences`;

CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=1421 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `persistences` */

insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (674,30,'tTkzA9KV2MIfSOvFdAiMXct2rRCJghIr','2016-05-31 15:45:16','2016-05-31 15:45:16');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (721,1,'ZQDUz6g5S5Q6RJr3V0AriyQoySzatZ8d','2016-06-02 12:35:19','2016-06-02 12:35:19');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (722,1,'htutpmeXZRJzcb0QOD1IjrBv6ChxBd5H','2016-06-02 12:56:54','2016-06-02 12:56:54');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (725,1,'JcJ9p9NDBWpqhtWog6dIl6CYqTk7lvZr','2016-06-02 13:16:26','2016-06-02 13:16:26');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (726,1,'pDan0gMypOeZ9fZODhmtjv1JfKjICS22','2016-06-02 13:19:34','2016-06-02 13:19:34');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (811,30,'2NZLZtGATTJb6RBcPDoHpzC3W4lsARRK','2016-06-12 13:29:54','2016-06-12 13:29:54');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (854,17,'5uQdWby3NUQq2ZjBQTk1bMfCY2zNvsSQ','2016-06-18 10:41:25','2016-06-18 10:41:25');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (869,31,'32yBY27mLoKApqUDrkge6fUm99krtvEk','2016-06-18 10:50:03','2016-06-18 10:50:03');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (886,37,'hCCtocJO9nW8gmQKz5kSIZv3f31a461n','2016-06-18 10:54:40','2016-06-18 10:54:40');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (887,38,'HuADXGHaEd2fyKCQRL0oUOQ0leukqXMm','2016-06-18 10:54:59','2016-06-18 10:54:59');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (910,31,'clpO24sbXvjx0z68hYB5Iw2SyRyWnWE5','2016-06-18 12:07:52','2016-06-18 12:07:52');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (973,53,'0PZi2D5CmQfEFFcQrtggTuW7vhnETG1K','2016-06-18 14:33:51','2016-06-18 14:33:51');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (989,27,'aAcBgjRBor3SdccII65aS4a5WrV5cffn','2016-06-18 14:40:25','2016-06-18 14:40:25');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (992,53,'oY4WMw3rUVcYecSVO66UJXnhPq13dKrU','2016-06-18 14:41:44','2016-06-18 14:41:44');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1008,54,'1mQuTC4n3fzqXmSH7EGswnf0WZU4cIEX','2016-06-18 14:48:08','2016-06-18 14:48:08');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1018,61,'fvlQt1vnAFspapDFipZg9Vi95bQC5kaj','2016-06-18 14:51:14','2016-06-18 14:51:14');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1025,24,'0B8V5TrKG6pWqIkgLzAMBiMHXk8JTJW9','2016-06-19 10:08:45','2016-06-19 10:08:45');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1026,37,'JVMAnUa2IcWLu8ZoPlAcZmsbmr7nMxZ5','2016-06-19 10:09:21','2016-06-19 10:09:21');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1027,21,'PzMUQMIAYCq65PepDpgFUNrTKZWtcSf9','2016-06-19 10:09:21','2016-06-19 10:09:21');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1030,39,'qEeWv6lkXHg0CVkAdWy2Nkqtn9m2tBDi','2016-06-19 10:09:45','2016-06-19 10:09:45');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1036,41,'GsCQQsa2ylStLcsuWbS8hMtPqCMQWIOx','2016-06-19 10:10:28','2016-06-19 10:10:28');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1039,40,'stKcuGRcNc8OROFuUX7ovOvnEKvs4XaZ','2016-06-19 10:11:36','2016-06-19 10:11:36');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1040,35,'Cw5ZmWYu0oFzAtMzHlEHL5g11oXz7hi6','2016-06-19 10:12:01','2016-06-19 10:12:01');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1041,62,'iLg7kwEqbAgWhzuwZ6qHhdNdQSUeydOA','2016-06-19 10:12:15','2016-06-19 10:12:15');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1043,26,'DmOEt0a2LkCWXmbezz6u31mkliAvEbfN','2016-06-19 10:13:39','2016-06-19 10:13:39');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1046,27,'YeZFjykzgrlJRg88B4qlgHpBALiubUMh','2016-06-19 10:16:01','2016-06-19 10:16:01');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1048,17,'qjJ8gKzzfpJuyMNZwlbJLx3bZfBzhVM9','2016-06-19 10:33:05','2016-06-19 10:33:05');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1051,34,'Z7legYMywE3tgESa2qew33w3tWAd1nzU','2016-06-19 10:59:04','2016-06-19 10:59:04');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1055,38,'dlzCKQsSYVCSsGzFw1H5uElBwZ6djA5h','2016-06-19 11:29:18','2016-06-19 11:29:18');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1063,33,'bXv7tFkrrdZ5qxDsIvh2K0spKOSepFtQ','2016-06-19 12:18:31','2016-06-19 12:18:31');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1064,23,'Ie8ynFA3FKxuPoyaQ6ZCDHSVs7wjjF9S','2016-06-19 12:18:33','2016-06-19 12:18:33');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1066,18,'lO4xPoTcLA9fmPOZy76ANxhyGVsEbqX4','2016-06-19 12:23:47','2016-06-19 12:23:47');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1068,20,'4dc1GlszvukrPqaTuwHZek2ZpI78O7wC','2016-06-19 13:05:26','2016-06-19 13:05:26');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1099,74,'YJugyddOCCH3TGqQXSkvaGZInD4Ta8Om','2016-06-20 10:13:07','2016-06-20 10:13:07');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1151,63,'mbJLRuFPJHqmqYn76VxngExVdElvqB90','2016-06-20 10:28:45','2016-06-20 10:28:45');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1194,2,'8kmNvdswpQdDLTB5wVDoEvsk8wdg7x6g','2016-06-20 11:41:02','2016-06-20 11:41:02');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1204,79,'A4G4pRYPiY5f71ZeqHS6ag0vJvdvul0x','2016-06-20 13:37:45','2016-06-20 13:37:45');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1207,89,'pnF4a0jzF0nbHKit2IyGpRwAfJUTMr4s','2016-06-20 13:40:08','2016-06-20 13:40:08');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1215,98,'750p4fOXJA5LeqSpfXh07AhagRSCwtis','2016-06-20 13:56:17','2016-06-20 13:56:17');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1224,98,'gdB0fNzBKAUsR7CyYaT4ivxc7amqnevs','2016-06-20 14:04:37','2016-06-20 14:04:37');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1225,95,'KFQIBEy9s4c9Riy5PGG58rj2RDIh5J3n','2016-06-20 14:04:57','2016-06-20 14:04:57');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1235,103,'aU1Rpr1qskdDdtuHPi1ti45uIfynnLjm','2016-06-20 14:12:15','2016-06-20 14:12:15');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1268,92,'VGVORDaqzwiqGGMrSf2Pn3HkOaIgGItx','2016-06-20 14:27:38','2016-06-20 14:27:38');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1280,137,'DNvof5aaGFjA0LmYXctYUlmlyDBzfzMQ','2016-06-20 14:35:09','2016-06-20 14:35:09');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1312,153,'bvFO8ivBOyDTTSZUpSWsHkb8zEfHLFtK','2016-06-20 14:54:12','2016-06-20 14:54:12');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1317,64,'kKEllntSafYPTJ9khH3a5bJIGq2Myi1w','2016-06-20 14:55:27','2016-06-20 14:55:27');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1318,156,'BLDtd9MfG48VzDvcy1hzEZeQJdPUzIr6','2016-06-20 14:55:52','2016-06-20 14:55:52');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1331,142,'E1H30CmG8Fb6JR80jNZUbfoc9Ufeeoaz','2016-06-20 15:02:53','2016-06-20 15:02:53');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1336,161,'bKUv0lEo53dFOdoFIhAVoNouxbwZTJBu','2016-06-20 15:03:55','2016-06-20 15:03:55');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1342,64,'BHVXt97lFYaAJZsvghQwIbLqQhz6cqLy','2016-06-21 10:14:21','2016-06-21 10:14:21');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1343,87,'0Sl4HhWuPJiKUgdNnvaUUGCq1vougvIG','2016-06-21 10:14:42','2016-06-21 10:14:42');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1347,137,'u5Mq0uCGjLGF4E8PiEXFjvv872zeuJBF','2016-06-21 10:15:12','2016-06-21 10:15:12');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1350,95,'HMkXOL5VeEDwMrgwfp4xzLpvRhqRus4I','2016-06-21 10:15:27','2016-06-21 10:15:27');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1353,144,'iXWyQ2EsZ8ySJeuL0TqaDvicxPMw7UYQ','2016-06-21 10:16:13','2016-06-21 10:16:13');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1356,92,'XjvaYaKBHHBNADRUTZkod4ERYiOkDQ3u','2016-06-21 10:16:49','2016-06-21 10:16:49');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1361,81,'XiOb6qpNvwfzc1ZBcWvNAUc8Dmc3VfU3','2016-06-21 10:20:45','2016-06-21 10:20:45');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1364,101,'WJirdglTGIMvp3DtsCalA5u11eXcErqK','2016-06-21 10:22:21','2016-06-21 10:22:21');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1377,102,'hhALljfyNHrxezCM5XI5obglfuHeioy3','2016-06-21 10:57:59','2016-06-21 10:57:59');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1378,78,'5NyjwJqpFv51hZOOtI215qCXXPaH8ckc','2016-06-21 10:59:04','2016-06-21 10:59:04');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1394,90,'toisz4ORXtdkV7gzqbwRk7qXlPY1DegR','2016-06-21 12:10:59','2016-06-21 12:10:59');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1396,5,'ZC2dhhXDclOAh9z7ytH0OZRJ0rmh201A','2016-06-21 12:13:49','2016-06-21 12:13:49');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1401,94,'Jh8ndAuJypd1K4OYlSIJbSUgLfI8TiyY','2016-06-21 12:44:27','2016-06-21 12:44:27');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1414,69,'nTrCDDM6vt3zypRTzcOK1QQPSxZJgK10','2016-06-21 13:55:06','2016-06-21 13:55:06');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1415,66,'t0r0SgEpHqWCzomKQ93AiG9PIT4m3sxz','2016-06-21 14:08:01','2016-06-21 14:08:01');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1416,67,'5bxtjMbVRVoEcFXx8ovzv7m6O8rLAOV7','2016-06-21 14:11:48','2016-06-21 14:11:48');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1417,3,'ZFlakpHA6HU5gyjv6FLT1lu5DeEjBaP4','2016-06-22 10:21:57','2016-06-22 10:21:57');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1418,3,'E8bfLsOzC2Bob8OZHki76lcnFh2C5Xan','2016-06-22 11:32:01','2016-06-22 11:32:01');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1419,3,'WZXvnP2DqPxjdL1WhuOVZ7TapaSnDYaQ','2016-06-22 13:28:34','2016-06-22 13:28:34');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (1420,1,'8VhS6mux1yAxyDjlraNj03QrMUefhp47','2016-12-27 18:50:45','2016-12-27 18:50:45');

/*Table structure for table `throttle` */

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `throttle` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','admin','$2y$10$q0mEi9K7hCw3EhSmVDiubuRuDTKg9YHmcPX/IGMzA/oApinrPZLby',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
