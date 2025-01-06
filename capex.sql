/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.28-MariaDB : Database - capex
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `asset_group` */

CREATE TABLE `asset_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `asset_group` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asset_group` */

insert  into `asset_group`(`id`,`asset_group`,`is_active`,`created_at`,`updated_at`) values (1,'IT','N',NULL,NULL),(2,'Non IT','Y',NULL,NULL);

/*Table structure for table `asset_type` */

CREATE TABLE `asset_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `asset_group_id` int(10) DEFAULT NULL,
  `company_id` int(10) DEFAULT NULL,
  `asset_type` varchar(255) DEFAULT NULL,
  `sap_asset_class` varchar(255) DEFAULT NULL,
  `block_key` varchar(255) DEFAULT NULL,
  `is_procurement_indicator` enum('Y','N') DEFAULT 'N',
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_asset_group` (`asset_group_id`),
  CONSTRAINT `fk_asset_group` FOREIGN KEY (`asset_group_id`) REFERENCES `asset_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asset_type` */

insert  into `asset_type`(`id`,`asset_group_id`,`company_id`,`asset_type`,`sap_asset_class`,`block_key`,`is_procurement_indicator`,`is_active`,`created_at`,`updated_at`) values (1,1,1,'SAP Licenses','8000','07','Y','Y',NULL,NULL);

/*Table structure for table `company_master` */

CREATE TABLE `company_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `company_master` */

insert  into `company_master`(`id`,`company_name`,`is_active`,`created_at`,`updated_at`) values (1,'GEPL','Y',NULL,NULL);

/*Table structure for table `employees` */

CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `emp_no` varchar(255) NOT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `grade` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` varchar(25) DEFAULT NULL,
  `manager_code` varchar(255) DEFAULT NULL,
  `is_online` enum('1','0') NOT NULL DEFAULT '0',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_emp_no_INDEX` (`emp_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`emp_no`,`emp_name`,`email`,`gender`,`location`,`company`,`grade`,`password`,`mobile_no`,`manager_code`,`is_online`,`is_active`,`created_at`,`updated_at`,`role_id`) values (1,'1208','Sourav Das','souravdas@gainwellindia.com','male','Kolkata','1','1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8944961893','2218','1','Y','2024-09-20 12:19:21','2024-12-31 11:51:17',2),(2,'2218','Sudip Bose','sudipbose@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-31 11:51:08',2),(3,'2400','Tanmoy Bose','tanmoybose@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-31 10:08:05',2),(4,'2500','Arijit Das','arijitdas@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-31 10:06:39',2),(5,'2600','Anirban Dey Sarkar','Anirban.DeySarkar@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-28 10:15:57',2),(6,'2700','Biswajit Das','biswajitdas@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-28 10:20:29',2),(7,'2800','Rajib Das','rajibdas@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-28 10:16:50',2),(8,'5000','Shankha Ghosh','shankha@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-31 07:35:44',2),(9,'6000','Suman Dey','suman@gainwellindia.com','Male','Kolkata','1','2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7478699655','8599','0','Y','2024-09-20 13:15:52','2024-12-31 09:58:54',2);

/*Table structure for table `failed_jobs` */

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `log_table` */

CREATE TABLE `log_table` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `row_id` bigint(20) unsigned DEFAULT NULL,
  `table_name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `data_array` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_array`)),
  `user_browser` varchar(255) DEFAULT NULL,
  `user_platform` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=426 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `log_table` */

/*Table structure for table `menu_permissions` */

CREATE TABLE `menu_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `menu_id` bigint(20) unsigned NOT NULL,
  `add` int(11) NOT NULL DEFAULT 0,
  `edit` int(11) NOT NULL DEFAULT 0,
  `delete` int(11) NOT NULL DEFAULT 0,
  `print` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `menu_permissions_role_id_foreign` (`role_id`),
  KEY `menu_permissions_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_permissions` */

insert  into `menu_permissions`(`permission_id`,`role_id`,`menu_id`,`add`,`edit`,`delete`,`print`,`created_at`,`updated_at`) values (1,1,1,0,0,0,0,'2024-07-11 09:46:55','2024-07-11 09:46:57'),(2,2,2,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(3,1,3,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(4,1,4,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(5,1,5,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(6,1,6,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(7,1,7,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(8,1,8,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(9,1,9,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(10,1,10,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(11,1,11,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(12,1,12,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(13,1,21,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(14,1,14,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(15,1,15,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(16,1,16,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(17,1,17,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(18,1,44,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07'),(19,1,45,0,0,0,0,'2024-07-11 09:48:05','2024-07-11 09:48:07');

/*Table structure for table `menus` */

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `is_parent` enum('Y','N') NOT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `menu_srl` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `menu_for` enum('Admin','Employee') NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emp_type` enum('INITIATOR','MANAGER','APPROVER') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`url`,`route`,`controller`,`method`,`is_parent`,`parent_id`,`menu_srl`,`is_active`,`icon`,`menu_for`,`created_at`,`updated_at`,`emp_type`) values (1,'Dashboard','dashboard','dashboard','DashboardController','index','Y',NULL,1,'Y','<i class=\"fa-solid fa-house\"></i>','Admin','2024-07-11 09:46:30','2024-07-11 09:46:32',NULL),(2,'Dashboard','emp-dashboard','emp-dashboard','DashboardController','index','Y',NULL,2,'Y','<i class=\"fa-solid fa-gears\"></i>','Employee','2024-07-11 09:46:30','2024-07-11 09:46:32','INITIATOR'),(3,'Master',NULL,NULL,'MasterController',NULL,'Y',NULL,3,'Y','<i class=\"fa-solid fa-gears\"></i>','Admin','2024-07-11 09:46:30','2024-07-11 09:46:30',NULL),(4,'Test','test','test','MasterController','test','N',3,1,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(5,'Assets Group','assetsgroup','assetsgroup','MasterController','assetsgroup','N',3,1,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(6,'Assets Type','assetstype','assetstype','MasterController','assetstype','N',3,1,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL);

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (26,'2014_10_12_100000_create_password_reset_tokens_table',1),(27,'2019_08_19_000000_create_failed_jobs_table',1),(28,'2019_12_14_000001_create_personal_access_tokens_table',1),(29,'2024_01_09_100000_create_roles_table',1),(30,'2024_01_10_000000_create_users_table',1),(31,'2024_01_10_095519_create_menus_table',1),(32,'2024_01_10_095545_create_menu_permissions_table',1),(33,'2024_01_10_131445_create_user_account_activitys_table',1),(36,'2024_07_10_075348_create_employees_table',2);

/*Table structure for table `month_master` */

CREATE TABLE `month_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month_name` varchar(255) NOT NULL,
  `month_code` varchar(255) NOT NULL,
  `disp_srl` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `month_count` int(11) DEFAULT NULL COMMENT 'for divident calculation',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `month_master` */

insert  into `month_master`(`id`,`month_name`,`month_code`,`disp_srl`,`is_active`,`month_count`) values (1,'January','Jan',1,'Y',3),(2,'February','Feb',2,'Y',2),(3,'March','Mar',3,'Y',1),(4,'April','Apr',4,'Y',12),(5,'May','May',5,'Y',11),(6,'June','Jun',6,'Y',10),(7,'July','Jul',7,'Y',9),(8,'August','Aug',8,'Y',8),(9,'September','Sep',9,'Y',7),(10,'October','Oct',10,'Y',6),(11,'November','Nov',11,'Y',5),(12,'December','Dec',12,'Y',4);

/*Table structure for table `password_reset_tokens` */

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `roles` */

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role`,`is_active`) values (1,'Admin','1'),(2,'Employee','1');

/*Table structure for table `serialmaster` */

CREATE TABLE `serialmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleTag` varchar(50) DEFAULT NULL,
  `lastnumber` int(11) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `serialmaster` */

insert  into `serialmaster`(`id`,`moduleTag`,`lastnumber`,`module`,`comments`,`created_at`,`updated_at`) values (1,'PPTC',79,'PPTC_NO',NULL,'2024-05-15 18:10:25','2024-11-20 11:08:51'),(4,'REQM',21,'REQ_MANUAL',NULL,'2024-05-15 18:10:25','2024-11-06 09:49:39');

/*Table structure for table `user_account_activitys` */

CREATE TABLE `user_account_activitys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_browser` varchar(255) NOT NULL,
  `user_platform` varchar(255) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_account_activitys_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_account_activitys` */

insert  into `user_account_activitys`(`id`,`user_id`,`ip_address`,`user_browser`,`user_platform`,`login_time`,`logout_time`,`created_at`,`updated_at`) values (1,1,'127.0.0.1','Firefox','Windows','2025-01-02 07:48:24','2025-01-02 07:57:20',NULL,NULL),(2,1,'127.0.0.1','Firefox','Windows','2025-01-02 07:57:30',NULL,NULL,NULL),(3,1,'127.0.0.1','Firefox','Windows','2025-01-06 10:04:30','2025-01-06 12:30:51',NULL,NULL),(4,1,'127.0.0.1','Firefox','Windows','2025-01-06 12:30:57',NULL,NULL,NULL);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_online` enum('1','0') NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`mobile_no`,`email`,`email_verified_at`,`password`,`profile_image`,`address`,`role_id`,`is_active`,`is_online`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin','admin','8910088950','anilk89100@gmail.com','2024-07-11 15:13:00','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW',NULL,NULL,1,'1','1',NULL,'2024-07-11 15:13:11','2025-01-06 12:30:57'),(3,'Admin','dev','8910088950','anilk89105@gmail.com','2024-07-11 15:13:00','$2y$10$W5hmQ3cWloGx0DSlQqOlv.pj1HK9oevwPwLeElLWXzBB7OfNcdZB2',NULL,NULL,1,'1','1',NULL,'2024-07-11 15:13:11','2024-09-19 14:11:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
