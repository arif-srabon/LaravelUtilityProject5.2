/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.5-10.1.9-MariaDB : Database - laravel_s
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `access_log` */

insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (1,1,1,'127.0.0.1','2017-01-02 17:07:25',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-02 17:07:25',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (2,1,1,'127.0.0.1','2017-01-03 10:38:05',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 10:38:05',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (3,1,1,'127.0.0.1','2017-01-03 11:50:51',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 11:50:51',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (4,1,1,'127.0.0.1','2017-01-03 12:39:43',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 12:39:43',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (5,1,1,'127.0.0.1','2017-01-03 12:40:19',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 12:40:19',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (6,1,1,'127.0.0.1','2017-01-03 12:48:32',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 12:48:32',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (7,1,1,'127.0.0.1','2017-01-03 12:51:42','2017-01-03 15:40:55','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 12:51:42','2017-01-03 15:40:55');
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (8,1,1,'127.0.0.1','2017-01-03 15:41:15',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 15:41:15',NULL);
insert  into `access_log`(`id`,`department_id`,`user_id`,`login_ip`,`login_datetime`,`logout_datetime`,`browser_info`,`created_at`,`updated_at`) values (9,1,1,'127.0.0.1','2017-01-03 18:10:29',NULL,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0','2017-01-03 18:10:29',NULL);

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

insert  into `activations`(`id`,`user_id`,`code`,`completed`,`completed_at`,`created_at`,`updated_at`) values (1,1,'ifvp6TJvyQtM7rdW4W6SpqxseD463aRa',1,'0000-00-00 00:00:00',NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cc_department` */

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) unsigned NOT NULL,
  `geo_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_division_id_foreign` (`division_id`),
  CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `districts` */

/*Table structure for table `divisions` */

DROP TABLE IF EXISTS `divisions`;

CREATE TABLE `divisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `geo_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `divisions` */

insert  into `divisions`(`id`,`geo_code`,`name`,`name_bn`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (5,'1','Comilla','Comilla [BN]',1,NULL,'2017-01-03 17:01:11',NULL);
insert  into `divisions`(`id`,`geo_code`,`name`,`name_bn`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (6,'2','Chittagong','Chittagong [BN]',1,NULL,'2017-01-03 17:03:11',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_07_02_230147_migration_cartalyst_sentinel',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2016_12_27_172345_create_access_log_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2016_12_27_173420_create_cc_department_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2017_01_02_171303_create_division_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2017_01_02_171348_create_districts_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2017_01_02_171419_create_upazillas_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (9,'2017_01_02_173139_cerate_union_wards_table',3);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `persistences` */

insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (9,1,'1FrTTAxP9SLp9E9LPEUvuUsgwckPfpsF','2017-01-03 15:41:15','2017-01-03 15:41:15');
insert  into `persistences`(`id`,`user_id`,`code`,`created_at`,`updated_at`) values (10,1,'orlk2DPFqtpn28ObBbiZxhvhIws5GHfm','2017-01-03 18:10:28','2017-01-03 18:10:28');

/*Table structure for table `reminders` */

DROP TABLE IF EXISTS `reminders`;

CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reminders` */

/*Table structure for table `role_users` */

DROP TABLE IF EXISTS `role_users`;

CREATE TABLE `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_users` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

/*Table structure for table `thana_upazilla` */

DROP TABLE IF EXISTS `thana_upazilla`;

CREATE TABLE `thana_upazilla` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) unsigned NOT NULL,
  `district_id` bigint(20) unsigned NOT NULL,
  `geo_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thana_upazilla_division_id_foreign` (`division_id`),
  KEY `thana_upazilla_district_id_foreign` (`district_id`),
  CONSTRAINT `thana_upazilla_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  CONSTRAINT `thana_upazilla_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `thana_upazilla` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `throttle` */

insert  into `throttle`(`id`,`user_id`,`type`,`ip`,`created_at`,`updated_at`) values (1,NULL,'global',NULL,'2017-01-02 17:02:02','2017-01-02 17:02:02');
insert  into `throttle`(`id`,`user_id`,`type`,`ip`,`created_at`,`updated_at`) values (2,NULL,'ip','127.0.0.1','2017-01-02 17:02:02','2017-01-02 17:02:02');

/*Table structure for table `union_wards` */

DROP TABLE IF EXISTS `union_wards`;

CREATE TABLE `union_wards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) unsigned NOT NULL,
  `district_id` bigint(20) unsigned NOT NULL,
  `thana_upazila_id` bigint(20) unsigned NOT NULL,
  `city_corp_paurasava_id` bigint(20) unsigned NOT NULL,
  `geo_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `union_wards` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name_bn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_sign` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `official_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `mobile` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_status_id` int(10) unsigned DEFAULT NULL,
  `permanent_house_road` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_village` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_division` int(11) DEFAULT NULL,
  `permanent_district` int(11) DEFAULT NULL,
  `permanent_upzilla` int(11) DEFAULT NULL,
  `permanent_ward` int(11) DEFAULT NULL,
  `permanent_postcode` int(11) DEFAULT NULL,
  `present_house_road` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_village` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_division` int(11) DEFAULT NULL,
  `present_district` int(11) DEFAULT NULL,
  `present_upzilla` int(11) DEFAULT NULL,
  `present_ward` int(11) DEFAULT NULL,
  `present_postcode` int(11) DEFAULT NULL,
  `department_id` int(10) unsigned DEFAULT NULL,
  `designation_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `permissions` mediumtext COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_official_email_unique` (`official_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`full_name_en`,`full_name_bn`,`email`,`password`,`password_confirmation`,`user_photo`,`user_sign`,`father_name`,`mother_name`,`official_email`,`blood_group`,`date_of_birth`,`date_of_joining`,`mobile`,`passport`,`national_id`,`marital_status_id`,`permanent_house_road`,`permanent_village`,`permanent_division`,`permanent_district`,`permanent_upzilla`,`permanent_ward`,`permanent_postcode`,`present_house_road`,`present_village`,`present_division`,`present_district`,`present_upzilla`,`present_ward`,`present_postcode`,`department_id`,`designation_id`,`status`,`permissions`,`last_login`,`created_by`,`updated_by`,`remember_token`,`created_at`,`updated_at`) values (1,'admin@gmail.com','admin@gmail.com','admin@gmail.com','$2y$10$1NkGAcgzwMgRFNqeLn/Nvu9jfMzB8.QVOQJGMhIfIC1plj598LCDK','$2y$10$1NkGAcgzwMgRFNqeLn/Nvu9jfMzB8.QVOQJGMhIfIC1plj598LCDK',NULL,NULL,NULL,NULL,'admin@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1,NULL,'2017-01-03 18:10:28',NULL,NULL,NULL,NULL,'2017-01-03 18:10:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
