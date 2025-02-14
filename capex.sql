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
/*Table structure for table `approver_details` */

CREATE TABLE `approver_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `approver_name` varchar(255) DEFAULT NULL,
  `emp_code` varchar(255) DEFAULT NULL,
  `seq` int(10) DEFAULT 2 COMMENT 'For approval order',
  `is_dynamic` enum('Y','N') DEFAULT 'N',
  `table_name` varchar(255) DEFAULT NULL,
  `where_col` varchar(255) DEFAULT NULL,
  `where_col_val` varchar(255) DEFAULT NULL,
  `data_col` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approver_for` enum('IT','NONIT','BOTH') DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `approver_details` */

insert  into `approver_details`(`id`,`approver_name`,`emp_code`,`seq`,`is_dynamic`,`table_name`,`where_col`,`where_col_val`,`data_col`,`created_at`,`updated_at`,`approver_for`,`comment`) values (1,'Supervisor',NULL,1,'Y','employees','emp_no','emp_code','manager_code',NULL,'2025-02-03 11:00:19','BOTH',NULL),(2,'IT Reviewer','GEPL8955',2,'N',NULL,NULL,NULL,NULL,NULL,'2025-02-03 11:00:19','IT',NULL),(3,'Budget Owner ',NULL,2,'Y','business_division_master','id','business_division_id','business_head_emp_code',NULL,'2025-02-03 11:00:37','BOTH',NULL),(4,'CEO','GEPL4120',3,'N',NULL,NULL,NULL,NULL,NULL,'2025-02-03 11:00:52','BOTH',NULL),(5,'CFO','GEPL0033',4,'N',NULL,NULL,NULL,NULL,NULL,'2025-02-03 11:01:00','BOTH',NULL),(6,'CMD','GEPL0031',5,'N',NULL,NULL,NULL,NULL,NULL,'2025-02-04 11:00:07','BOTH',NULL);

/*Table structure for table `asset_group_master` */

CREATE TABLE `asset_group_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `asset_group` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asset_group_master` */

insert  into `asset_group_master`(`id`,`asset_group`,`is_active`,`created_at`,`updated_at`) values (1,'IT','N',NULL,NULL),(2,'Non IT','Y',NULL,NULL);

/*Table structure for table `asset_type_master` */

CREATE TABLE `asset_type_master` (
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
  CONSTRAINT `fk_asset_group` FOREIGN KEY (`asset_group_id`) REFERENCES `asset_group_master` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asset_type_master` */

insert  into `asset_type_master`(`id`,`asset_group_id`,`company_id`,`asset_type`,`sap_asset_class`,`block_key`,`is_procurement_indicator`,`is_active`,`created_at`,`updated_at`) values (1,1,1,'SAP Licenses','8000','07','N','Y',NULL,'2025-02-13 12:27:11'),(2,2,1,'Furniture and Fixtures','2500','06','N','Y','2025-01-10 11:41:56','2025-02-13 12:26:45'),(4,2,1,'Vehicle','4100','07','N','Y','2025-01-10 11:51:07','2025-02-13 12:22:16'),(5,2,1,'Tools and Equipments','3300','08','Y','Y','2025-01-10 11:52:05','2025-02-13 12:20:44'),(14,1,1,'Laptop/Desktop/Printer','4500','09','N','Y','2025-02-13 12:22:02','2025-02-13 12:22:02');

/*Table structure for table `budget_details` */

CREATE TABLE `budget_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `budget_master_id` int(11) DEFAULT NULL,
  `budget_amount` decimal(20,2) DEFAULT NULL,
  `budget_description` varchar(255) DEFAULT NULL,
  `procurement_indicator` enum('Y','N') DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `budget_details` */

insert  into `budget_details`(`id`,`budget_master_id`,`budget_amount`,`budget_description`,`procurement_indicator`,`year`,`created_at`,`updated_at`) values (6,1,'900000.00',NULL,NULL,2025,'2025-01-29 13:25:51','2025-02-13 13:27:30'),(7,2,'750000.00',NULL,NULL,2025,'2025-01-29 13:26:35','2025-02-13 13:29:22'),(8,3,'888888.00',NULL,NULL,2024,'2025-01-29 13:28:45','2025-01-29 13:28:45'),(9,3,'700000.00',NULL,NULL,2025,'2025-01-30 09:10:54','2025-01-30 09:11:02');

/*Table structure for table `budget_master` */

CREATE TABLE `budget_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `budget_entity` varchar(255) DEFAULT NULL,
  `asset_group_id` int(10) DEFAULT NULL COMMENT 'asset_group',
  `asset_type_id` int(10) DEFAULT NULL COMMENT 'asset_type',
  `budget_type_id` int(10) DEFAULT NULL COMMENT 'budget_type',
  `location_id` int(10) DEFAULT NULL COMMENT 'location_master',
  `business_division_id` int(10) DEFAULT NULL COMMENT 'business_division',
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `budget_master` */

insert  into `budget_master`(`id`,`budget_entity`,`asset_group_id`,`asset_type_id`,`budget_type_id`,`location_id`,`business_division_id`,`is_active`,`created_at`,`updated_at`) values (1,'SAP Licenses',1,1,1,1,1,'Y',NULL,'2025-02-13 13:08:56'),(2,'Laptop/Desktop/Printer',1,14,1,1,1,'Y','2025-01-29 10:33:30','2025-02-13 13:09:46'),(3,'Furniture',2,2,1,1,1,'Y','2025-01-29 13:28:32','2025-02-13 13:11:22');

/*Table structure for table `budget_type_master` */

CREATE TABLE `budget_type_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `budget_type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `budget_type_master` */

insert  into `budget_type_master`(`id`,`budget_type`,`created_at`,`updated_at`) values (1,'CAPEX Budgeted',NULL,NULL),(2,'CAPEX Non Budgeted',NULL,NULL),(3,'OPEX',NULL,NULL);

/*Table structure for table `business_division_master` */

CREATE TABLE `business_division_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `business_division_short_code` varchar(255) DEFAULT NULL,
  `business_division` varchar(255) DEFAULT NULL,
  `business_head_emp_code` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `business_division_master` */

insert  into `business_division_master`(`id`,`location_id`,`business_division_short_code`,`business_division`,`business_head_emp_code`,`is_active`,`created_at`,`updated_at`) values (1,1,'RB','RB','GEPL0043','Y',NULL,'2025-02-04 07:17:07'),(2,1,'HW','HW','GEPL7780','Y',NULL,'2025-02-04 07:16:10'),(3,1,'CORP','CORP','GEPL0076','Y',NULL,'2025-02-04 07:16:25'),(4,1,'R&P','R&P','GEPL0046','Y',NULL,'2025-02-13 12:40:41');

/*Table structure for table `capex_approval_path_details` */

CREATE TABLE `capex_approval_path_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `capex_request_id` int(10) DEFAULT NULL,
  `approver_id` int(10) DEFAULT NULL,
  `approver_emp_code` varchar(25) DEFAULT NULL,
  `priority_level` int(10) DEFAULT NULL,
  `is_open` enum('Y','N') DEFAULT 'N',
  `is_approved` enum('N','A','R') DEFAULT 'N',
  `review_date` datetime DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `version` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `capex_approval_path_details` */

insert  into `capex_approval_path_details`(`id`,`capex_request_id`,`approver_id`,`approver_emp_code`,`priority_level`,`is_open`,`is_approved`,`review_date`,`comment`,`version`,`created_at`,`updated_at`) values (53,10,1,'GEPL2745',1,'Y','A','2025-02-13 00:00:00','Approved',1,'2025-02-13 13:13:50','2025-02-13 13:16:09'),(54,10,2,'GEPL8955',2,'Y','A','2025-02-13 00:00:00','Approved',1,'2025-02-13 13:13:50','2025-02-13 13:16:54'),(55,10,3,'GEPL0043',3,'Y','A','2025-02-13 00:00:00','Approved',1,'2025-02-13 13:13:50','2025-02-13 13:24:08'),(56,10,4,'GEPL4120',4,'Y','A','2025-02-13 00:00:00','Approved',1,'2025-02-13 13:13:50','2025-02-13 13:24:54'),(57,10,5,'GEPL0033',5,'Y','A','2025-02-13 00:00:00','approved',1,'2025-02-13 13:13:50','2025-02-13 13:44:02'),(58,10,6,'GEPL0031',6,'Y','A','2025-02-13 00:00:00','approved',1,'2025-02-13 13:13:50','2025-02-13 13:44:44'),(59,11,1,'GEPL2745',1,'Y','N',NULL,NULL,1,'2025-02-13 13:48:10','2025-02-13 13:48:10'),(60,11,3,'GEPL0043',2,'N','N',NULL,NULL,1,'2025-02-13 13:48:10','2025-02-13 13:48:10'),(61,11,4,'GEPL4120',3,'N','N',NULL,NULL,1,'2025-02-13 13:48:10','2025-02-13 13:48:10'),(62,11,5,'GEPL0033',4,'N','N',NULL,NULL,1,'2025-02-13 13:48:10','2025-02-13 13:48:10'),(63,11,6,'GEPL0031',5,'N','N',NULL,NULL,1,'2025-02-13 13:48:10','2025-02-13 13:48:10');

/*Table structure for table `capex_request` */

CREATE TABLE `capex_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(255) DEFAULT NULL,
  `request_no` varchar(255) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `required_by` datetime DEFAULT NULL,
  `asset_group_id` int(110) DEFAULT NULL,
  `asset_type_id` int(10) DEFAULT NULL,
  `budget_type_id` int(10) DEFAULT NULL,
  `is_budget_exist` enum('Y','N') DEFAULT NULL COMMENT 'checked on asset_group,asset_type,budget_type and year',
  `manufacturer` varchar(255) DEFAULT NULL,
  `asset_name` varchar(255) DEFAULT NULL,
  `requirement_description` varchar(255) DEFAULT NULL,
  `justification` varchar(255) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `procurement_cost` decimal(20,2) DEFAULT NULL,
  `asset_quotation_file` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approval_status` enum('P','C','R','A') DEFAULT 'P' COMMENT 'P:In Process,C:Cancled,R:Rejected,A:Approved',
  `approved_on` datetime DEFAULT NULL,
  `approval_path_details_id` int(10) DEFAULT NULL COMMENT 'If Rejected',
  `sanction_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `capex_request` */

insert  into `capex_request`(`id`,`emp_code`,`request_no`,`request_date`,`required_by`,`asset_group_id`,`asset_type_id`,`budget_type_id`,`is_budget_exist`,`manufacturer`,`asset_name`,`requirement_description`,`justification`,`quantity`,`procurement_cost`,`asset_quotation_file`,`created_at`,`updated_at`,`approval_status`,`approved_on`,`approval_path_details_id`,`sanction_number`) values (10,'GEPL0007','CR/00012','2025-02-13 00:00:00','2025-02-13 00:00:00',1,1,1,NULL,'SAP','SAP License','For Accounts','Need for Business',1,'100000.00','[\"CR173945242967adf00d8bdb0.xlsx\",\"CR173945243067adf00e2bdab.png\"]','2025-02-13 13:13:50','2025-02-13 13:44:44','A','2025-02-13 00:00:00',NULL,'SAN/00005'),(11,'GEPL0007','CR/00013','2025-02-13 00:00:00','2025-02-13 00:00:00',2,2,1,NULL,'Godraj','Sofa','test','sd',1,'2000.00','[\"CR173945449067adf81a49646.png\"]','2025-02-13 13:48:10','2025-02-13 13:48:10','P',NULL,NULL,NULL);

/*Table structure for table `capex_request_vendor` */

CREATE TABLE `capex_request_vendor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `capex_request_id` int(10) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `capex_request_vendor` */

insert  into `capex_request_vendor`(`id`,`capex_request_id`,`vendor_name`,`vendor_code`,`created_at`,`updated_at`) values (1,2,'APL Services private limited test','10000017','2025-01-31 07:32:07','2025-01-31 07:32:07'),(2,2,'Sunrise Enterprise private corporat','11000008','2025-01-31 07:32:07','2025-01-31 07:32:07'),(3,8,'APL Services private limited test','10000017','2025-02-11 06:42:22','2025-02-11 06:42:22'),(10,8,'Sunrise Enterprise private corporat','11000008','2025-02-11 06:42:22','2025-02-11 06:42:22'),(11,10,'Acceleron','1000','2025-02-13 13:13:50','2025-02-13 13:13:50'),(12,11,NULL,NULL,'2025-02-13 13:48:10','2025-02-13 13:48:10');

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

/*Table structure for table `emp_temp` */

CREATE TABLE `emp_temp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Employee_ID` varchar(25) DEFAULT NULL,
  `Employee_Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile_No` varchar(15) DEFAULT NULL,
  `Company_Code` varchar(50) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `Grade` varchar(50) DEFAULT NULL,
  `Manager_EMP_ID` varchar(25) DEFAULT NULL,
  `Employee_Address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `emp_temp` */

insert  into `emp_temp`(`id`,`Employee_ID`,`Employee_Name`,`Email`,`Mobile_No`,`Company_Code`,`Department`,`Gender`,`Grade`,`Manager_EMP_ID`,`Employee_Address`) values (1,'GEPL0004','Srikant  Mulka','srikant.mulka@gainwellengineering.com','7045659105','GEPL','Finance & Accounts','Male','G2','GEPL0007',''),(2,'GEPL0006','Tanay Khandelwal','tanay.khandelwal@gainwellengineering.com','8971222236','GEPL','Digital Initiatives','Male','G5','GEPL2745',''),(3,'GEPL0007','Shashi  Agarwal','shashi.agarwal@gainwellengineering.com','9830693972','GEPL','Finance & Accounts','Female','G5','GEPL2745',''),(4,'GEPL0008','Rahul Maji','Rahul.Maji@gainwellengineering.com','8906568370','GEPL','Production','Male','M1','GEPL7867',''),(5,'GEPL0009','Tirtha Dhara','Tirtha.Dhara@gainwellengineering.com','9679682519','GEPL','Production','Male','M1','GEPL6682',''),(6,'GEPL0010','Subrata Moi','Subrata.Moi@gainwellengineering.com','7679825184','GEPL','Production','Male','G1','GEPL8538',''),(7,'GEPL0011','Dipanjan Dasgupta','Dipanjan.Dasgupta@gainwellengineering.com','7001806772','GEPL','Production','Male','G1','GEPL6682',''),(8,'GEPL0013','Aranya Ghosh','Aranya.Ghosh@gainwellengineering.com','6297877253','GEPL','Production','Male','M1','GEPL6682',''),(9,'GEPL0014','Saradindu De','Saradindu.De@gainwellengineering.com','8945964808','GEPL','Production','Male','G1','GEPL5837',''),(10,'GEPL0015','Sombit Das','Sombit.Das@gainwellengineering.com','6290232356','GEPL','Production','Male','G1','GEPL4225',''),(11,'GEPL0016','Shashwat Srivastava','Shashwat.Srivastava@gainwellengineering.com','7355657583','GEPL','Production','Male','G1','GEPL8538',''),(12,'GEPL0017','Medapati Krupa ananda Reddy','Medapati.Reddy@gainwellengineering.com','8978261256','GEPL','Production','Male','G1','GEPL7012',''),(13,'GEPL0018','Ritankar Chowdhury','Ritankar.Chowdhury@gainwellengineering.com','8240192100','GEPL','Production','Male','G1','GEPL5450',''),(14,'GEPL0019','Pallabi Debnath','Pallabi.Debnath@gainwellengineering.com','9863160361','GEPL','Production','Female','G1','GEPL7024',''),(15,'GEPL0020','Madhuja Bhattacharya','Madhuja.Bhattacharya@gainwellengineering.com','9163365553','GEPL','Production','Female','G1','GEPL8702',''),(16,'GEPL0021','Souvik Sarkar','Souvik.Sarkar@gainwellengineering.com','7908872696','GEPL','Production','Male','G1','GEPL6682',''),(17,'GEPL0023','Aniket De','Aniket.De@gainwellengineering.com','7872583191','GEPL','Production','Male','G1','GEPL8702',''),(18,'GEPL0024','Ayan Mohanta','Ayan.Mohanta@gainwellengineering.com','8768651145','GEPL','Production','Male','G1','GEPL8538',''),(19,'GEPL0025','Raj Kamal Chowdhary','Raj.Chowdhary@gainwellengineering.com','8777280650','GEPL','Production','Male','G1','GEPL7012',''),(20,'GEPL0026','Arjun Kumar','Arjun.Kumar@gainwellengineering.com','9555394446','GEPL','Production','Male','G1','GEPL8538',''),(21,'GEPL0027','Kunal Kumar  Bhagat','kunal.bhagat@gainwellengineering.com','9748497335','GEPL','Production','Male','SR.G2','GEPL8995',''),(22,'GEPL0028','Ankita  Chakraborty','Ankita.Chakraborty@gainwellengineering.com','8617012186','GEPL','Production','Female','M2','GEPL5837',''),(23,'GEPL0029','Subarna  Dawn','Subarna.Dawn@gainwellengineering.com','8972401337','GEPL','Production','Female','M2','GEPL5837',''),(24,'GEPL0030','Bidisha  Mondal','Bidisha.Mondal@gainwellengineering.com','7908602736','GEPL','Production','Female','M2','GEPL5837',''),(25,'GEPL0031','Janmejay Samal','Janmejay.Samal@gainwellengineering.com','8497343914','GEPL','Production','Male','SR.G1','GEPL4138',''),(26,'GEPL0032','Poritosh Maji','Poritosh.Maji@gainwellengineering.com','8145579033','GEPL','Production','Male','M2','GEPL7354',''),(27,'GEPL0033','Hemant Nicholas Nag','Hemant.Nag@gainwellengineering.com','9558297394','GEPL','Manufacturing Operations','Male','M2','GEPL8386',''),(28,'GEPL0034','Mintu Kumar','Mintu.Kumar@gainwellengineering.com','9110144681','GEPL','Production','Male','M2','GEPL7867',''),(29,'GEPL0035','Amarjeet  Kumar','Amarjeet.kumar@gainwellengineering.com','8210175408','GEPL','Production','Male','M2','GEPL6682',''),(30,'GEPL0036','Ajay Kumar Bagchi','Ajay.Bagchi@gainwellengineering.com','6290927842','GEPL','Production','Male','G1','GEPL8355',''),(31,'GEPL0038','Simranjeet  Singh','Simranjeet.Singh@gainwellengineering.com','7095376679','GEPL','Production','Male','G2','GEPL8995',''),(32,'GEPL0039','Ravindra  Kumar','Ravindra.Kumar@gainwellengineering.com','7001010921','GEPL','Production','Male','G1','GEPL7354',''),(33,'GEPL0040','Tanmoy  Mondal','Tanmoy.Mondal@gainwellengineering.com','7756854236','GEPL','Production','Male','G2','GEPL8386',''),(34,'GEPL0041','Snigdharup  Mitra','Snigdharup.Mitra@gainwellengineering.com','7980521385','GEPL','Production','Male','SR.G1','GEPL7024',''),(35,'GEPL0042','Amit Goswami','Amit.Goswami@gainwellengineering.com','8926733262','GEPL','Production','Male','M2','GEPL7867',''),(36,'GEPL0043','Kush  Tandon','Kush.Tandon@gainwellengineering.com','9663314125','GEPL','Production','Male','SR.G5','GEPL2745',''),(37,'GEPL0044','Anirban  Mondal','Anirban.Mondal@gainwellengineering.com','9474921305','GEPL','Product Support','Male','G2','GEPL7024',''),(38,'GEPL0045','Anand Soni','Anand.Soni@gainwellengineering.com','6388029262','GEPL','Production','Male','SR.G1','GEPL5837',''),(39,'GEPL0046','Ashish Misra','Ashish.Misra@gainwellengineering.com','9654358578','GEPL','Production','Male','G2','GEPL7024',''),(40,'GEPL0048','Shubham  Patel','Shubham.Patel@gainwellengineering.com','8400790945','GEPL','Production','Male','G1','GEPL8355',''),(41,'GEPL0049','Shubha Brata Bandyopadhyay','Shubha.Bandyopadhyay@gainwellengineering.com','9163541327','GEPL','Production','Male','SR.G1','GEPL8538',''),(42,'GEPL0050','Anand Kumar Pandit','Anand.Pandit@gainwellengineering.com','8509727066','GEPL','Finance & Accounts','Male','G1','GEPL5716',''),(43,'GEPL0051','Sutanu Maulik','Sutanu.Maulik@gainwellengineering.com','9832281818','GEPL','IR & Admin','Male','G3','2876',''),(44,'GEPL0052','Satinath Paul','satinath.paul@gainwellengineering.com','7047543464','GEPL','Product Support','Male','TT','GEPL7867',''),(45,'GEPL0053','Neeraj  Chaudhari','Neeraj.Chaudhari@gainwellengineering.com','7800481379','GEPL','Production','Male','M2','GEPL6682',''),(46,'GEPL0055','Yogesh  .','Yogesh.sharma@gainwellengineering.com','9996503651','GEPL','Production','Male','SR.G2','GEPL8538',''),(47,'GEPL0057','Avik Kumar Datta','Avik.Datta@gainwellengineering.com','9830882607','GEPL','Finance & Accounts','Male','G2','GEPL5716',''),(48,'GEPL0058','Sahid Mufti','Sahid.Mufti@gainwellengineering.com','8910303725','GEPL','Production','Male','G1','GEPL7024',''),(49,'GEPL0059','Arup Dutta','Arup.Dutta@gainwellengineering.com','7980424984','GEPL','Finance & Accounts','Male','G2','GEPL5716',''),(50,'GEPL0060','Arindam Chattopadhyay','Arindam.Chattopadhyay@gainwellengineering.com','9836177887','GEPL','Production','Male','SR.G3','GEPL3423',''),(51,'GEPL0063','Moumita Mitra','moumita.mitra@gainwellengineering.com','9830015853','GEPL','HCM(HR)','Female','SR.G4','6753',''),(52,'GEPL0064','Priyanka Surana','priyanka.surana@gainwellengineering.com','9830869023','GEPL','Legal/Audit','Female','G3','6829',''),(53,'GEPL0065','Soumik Paul','soumik.paul@gainwellengineering.com','7585025450','GEPL','Manufacturing Operations','Male','G1','GEPL7024',''),(54,'GEPL0066','Rakhi Chauhan','rakhi.chauhan@gainwellengineering.com','9798939576','GEPL','Manufacturing Operations','Female','MGTR','GEPL4148',''),(55,'GEPL0067','Surojit Dholey','surojit.dholey@gainwellengineering.com','6295416841','GEPL','Manufacturing Operations','Male','MGTR','GEPL7024',''),(56,'GEPL0068','Bapi Saha','bapi.saha@gainwellengineering.com','6297054756','GEPL','Manufacturing Operations','Male','MGTR','GEPL4225',''),(57,'GEPL0069','Amit Patra','amit.patra@gainwellengineering.com','9933737326','GEPL','Manufacturing Operations','Male','MGTR','GEPL7868',''),(58,'GEPL0070','Mou Kar','mou.kar@gainwellengineering.com','9798939576','GEPL','Manufacturing Operations','Female','TT','GEPL7867',''),(59,'GEPL0071','Hulshi Kumari Pandit','hulshi.pandit@gainwellengineering.com','9798939576','GEPL','Manufacturing Operations','Female','TT','GEPL7867',''),(60,'GEPL0072','Rahul Samaddar','Rahul.Samaddar@gainwellengineering.com','9798939576','GEPL','Manufacturing Operations','Male','TT','GEPL4138',''),(61,'GEPL0073','Soumen Modak','soumen.modak@gainwellengineering.com','8392052077','GEPL','Manufacturing Operations','Male','TT','GEPL0027',''),(62,'GEPL0074','Joy Sutradhar','joy.sutradhar@gainwellengineering.com','9382002193','GEPL','Manufacturing Operations','Male','TT','GEPL0027',''),(63,'GEPL0075','Ujjwal Mondal','ujjwal.mondal@gainwellengineering.com','07908116064','GEPL','Manufacturing Operations','Male','TT','GEPL7867',''),(64,'GEPL0076','Chandra Mohan N','Chandramohan.N@gainwellengineering.com','9840584151','GEPL','Production','Male','VP','GEPL2745',''),(65,'GEPL0077','Pijush Kanti Mondal','Pijush.Mondal@gainwellengineering.com','7980576492','GEPL','Production','Male','G2','GEPL8995',''),(66,'GEPL0078','Subrata Maji','Subrata.Maji@gainwellengineering.com','8536028054','GEPL','Production','Male','M2','GEPL0027',''),(67,'GEPL0079','Ranjit Chakraborty','Ranjit.Chakraborty@gainwellengineering.com','9002352912','GEPL','Production','Male','M2','GEPL0027',''),(68,'GEPL0080','Saheli Saha','Saheli.Saha@gainwellengineering.com','7001986898','GEPL','HCM(HR)','Female','SR.G1','GEPL0063',''),(69,'GEPL0081','Biswarup Chatterjee','biswarup.chatterjee@gainwellengineering.com','8250115791','GEPL','Manufacturing Operations','Male','C','GEPL0027',''),(70,'GEPL0082','Soumya  Sunder  Bose','Soumya.Bose@gainwellengineering.com','9903045994','GEPL','Manufacturing Operations','Male','G2','GEPL7731',''),(71,'GEPL0083','Jayakumar Selvaraj','Jayakumar.Selvaraj@gainwellengineering.com','9176047715','GEPL','Production','Male','G4','GEPL0076',''),(72,'GEPl0084','Bishal Kewra','bishal.kewra@gainwellengineering.com','8348736273','GEPL','Manufacturing Operations','Male','M2','GEPL6682',''),(73,'GEPL0085','Varun Bubna','Varun.Bubna@gainwellengineering.com','9831155106','GEPL','Finance & Accounts','Male','G4','GEPL0007',''),(74,'GEPL0086','Sanjay Kumar','Sanjay.Kumar@gainwellengineering.com','9340264231','GEPL','Manufacturing Operations','Male','M2','GEPL8995',''),(75,'GEPL0460','Pinaki  Bandyopadhyay','Pinaki.Bandyopadhyay@gainwellindia.com','7001784544','GEPL','Product Support','Male','C','GEPL7987',''),(76,'GEPL2417','Abhishek Kumar Singh','abhishek.singh@gainwellengineering.com','9798525637','GEPL','Finance & Accounts','Male','G2','GEPL5716',''),(77,'GEPL2745','Dipankar Banerjee','Dipankar.Banerjee@Gainwellindia.Com','9874131500','GEPL','General Management','Male','SRVP','6262',''),(78,'GEPL3423','Jayanta Bhattacharya','jayanta.bhattacharya@gainwellindia.com','9163303430','GEPL','Product Support','Male','AVP','GEPL2745',''),(79,'GEPL4120','Kartick  Manna','kartick.manna@gainwellengineering.com','9284925159','GEPL','Product Support','Male','SR.G1','GEPL7354',''),(80,'GEPL4138','Saptak  Nath','saptak.nath@gainwellengineering.com','9937259591','GEPL','Product Support','Male','SR.G2','GEPL8995',''),(81,'GEPL4141','Rahul  Raj','rahul.raj@gainwellengineering.com','9670671680','GEPL','Product Support','Male','G1','GEPL8355',''),(82,'GEPL4148','Pravakar Chakraborty','pravakar.chakraborty@gainwellengineering.com','8729884622','GEPL','Product Support','Male','G2','GEPL7731',''),(83,'GEPL4173','Subham Paul','subham.paul@gainwellengineering.com','7980270911','GEPL','Product Support','Male','G2','GEPL7731',''),(84,'GEPL4174','Nilkamal Ghosh','nilkamal.ghosh@gainwellengineering.com','9564988948','GEPL','Product Support','Male','G1','GEPL8538',''),(85,'GEPL4190','Dipawali Prabhakar Gajbhiye','dipawali.gajbhiye@gainwellengineering.com','8856054845','GEPL','Product Support','Female','G1','GEPL7024',''),(86,'GEPL4214','Abhijit Roy','abhijit.roy@gainwellengineering.com','8240005919','GEPL','Production','Male','G1','GEPL8995',''),(87,'GEPL4224','Amit Nag','amit.nag@gainwellengineering.com','9836178523','GEPL','Production','Male','G2','GEPL7012',''),(88,'GEPL4225','Jiban  Biswas','jiban.biswas@gainwellengineering.com','8600206092','GEPL','Production','Male','G3','GEPL7731',''),(89,'GEPL4226','Sanjay Pati','sanjay.pati@gainwellengineering.com','9999015124','GEPL','Production','Male','SR.G2','GEPL8386',''),(90,'GEPL4235','Jyoti  Sinha','jyoti.sinha@gainwellengineering.com','9558297367','GEPL','Production','Female','M2','GEPL4173',''),(91,'GEPL4249','Mohd. Ashrafuddin .','mohd.ashrafuddin@gainwellengineering.com','9093177600','GEPL','HCM(IR&Admin)','Male','G1','2876',''),(92,'GEPL4278','Ankit Kumar Singh','ankit.singh@gainwellengineering.com','8285457759','GEPL','Production','Male','SR.G1','GEPL8386',''),(93,'GEPL5121','Saibal Mitra','Saibal.Mitra@Gainwellindia.Com','9433060128','GEPL','Production','Male','SR.G5','GEPL2745',''),(94,'GEPL5450','Kunal Mukherjee','kunal.mukherjee@gainwellengineering.com','9614345034','GEPL','Product Support','Male','G3','GEPL7731',''),(95,'GEPL5532','Arindam Ghosh','arindam.ghosh@gainwellengineering.com','7797506870','GEPL','Product Support','Male','SR.G1','GEPL8386',''),(96,'GEPL5716','Swarnali Mukherjee','swarnali.mukherjee@gainwellengineering.com','9874466110','GEPL','Finance & Accounts','Female','G4','GEPL0007',''),(97,'GEPL5837','Phalguni Chanda Roy','phalguni.chanda@gainwellengineering.com','9477429798','GEPL','Product Support','Female','G3','GEPL8995',''),(98,'GEPL5994','Mark Christopher Dirksz','mark.dirksz@gainwellengineering.com','8101416704','GEPL','Product Support','Male','SR.G1','GEPL6682',''),(99,'GEPL6682','Ram Singh Chaudhary','ram.chaudhary@gainwellengineering.com','8001878222','GEPL','Product Support','Male','G2','GEPL8995',''),(100,'GEPL6728','Krishanu Bhattacharyea','krishanu.bhattacharyea@gainwellengineering.com','8797394641','GEPL','Product Support','Male','M2','GEPL6682',''),(101,'GEPL7012','Sanjoy  Mitra','sanjoy.mitra@gainwellengineering.com','9830727757','GEPL','Product Support','Male','G4','GEPL0076',''),(102,'GEPL7024','Anindita  Ghosh','anindita.ghosh@gainwellengineering.com','9836424294','GEPL','Product Support','Female','SR.G3','GEPL3423',''),(103,'GEPL7166','Ajeet  Kumar  Upadhayay','ajeet.upadhyay@gainwellengineering.com','8329536022','GEPL','Product Support','Male','G1','GEPL8282',''),(104,'GEPL7284','Shuvankar  Ghosh','shuvankar.ghosh@gainwellengineering.com','8420987468','GEPL','Product Support','Male','G1','GEPL7987',''),(105,'GEPL7354','Sayantan Chaudhuri','sayantan.chaudhuri@gainwellengineering.com','8942837981','GEPL','Product Support','Male','G3','GEPL3423',''),(106,'GEPL7721','Saubhik  Mukherjee','saubhik.mukherjee@gainwellengineering.com','8759698238','GEPL','Product Support','Male','G2','GEPL7024',''),(107,'GEPL7731','Rajeev  Das','rajeev.das@gainwellengineering.com','6296911923','GEPL','Product Support','Male','SR.G4','GEPL3423',''),(108,'GEPL7742','Nitesh  Kumar','nitesh.kumar@gainwellengineering.com','8052296436','GEPL','Product Support','Male','M1','GEPL6682',''),(109,'GEPL7743','Rajan  Kumar','rajan.kumar@gainwellengineering.com','9305710395','GEPL','Product Support','Male','M1','GEPL8282',''),(110,'GEPL7770','Soumallya Saha','soumallya.saha@gainwellengineering.com','7980646895','GEPL','Production','Male','G1','GEPL8702',''),(111,'GEPL7772','Soumyajit Adak','soumyajit.adak@gainwellengineering.com','8777077574','GEPL','Production','Male','G1','GEPL8955',''),(112,'GEPL7776','Nipa Das','nipa.das@gainwellengineering.com','8910316599','GEPL','Production','Female','M2','GEPL5450',''),(113,'GEPL7778','Abhinandan Bhattacharyya','abhinandan.bhattacharyya@gainwellengineering.com','8967845928','GEPL','Production','Male','M2','GEPL6682',''),(114,'GEPL7780','Joy Manna','joy.manna@gainwellengineering.com','7718113866','GEPL','Production','Male','G1','GEPL8538',''),(115,'GEPL7781','Sandip Dey','sandip.dey@gainwellengineering.com','9547555517','GEPL','Production','Male','G1','GEPL7012',''),(116,'GEPL7796','Yarrakula Sriaa','sriaa.yarrakula@gainwellengineering.com','9330804136','GEPL','Production','Female','G1','GEPL8538',''),(117,'GEPL7842','Shashi  Bhushan  Chourasia','shashi.bhushan@gainwellengineering.com','9916586293','GEPL','Product Support','Male','SR.G1','GEPL7012',''),(118,'GEPL7847','Soumen  Mahapatra','soumen.mahapatra@gainwellengineering.com','9933426706','GEPL','Product Support','Male','M2','GEPL8995',''),(119,'GEPL7863','Prithawayan  Sinha','prithawayan.sinha@gainwellengineering.com','8250414233','GEPL','Product Support','Male','G2','GEPL8355',''),(120,'GEPL7867','Santanu  Chakrabarty','santanu.chakrabarty@gainwellengineering.com','9434892229','GEPL','Production','Male','G2','GEPL8995',''),(121,'GEPL7868','Ravi  Singh','ravi.singh@gainwellengineering.com','9477436615','GEPL','Product Support','Male','SR.G2','GEPL8395',''),(122,'GEPL7885','Bivash  Paul','bivash.paul@gainwellengineering.com','8145620419','GEPL','Product Support','Male','M2','GEPL8282',''),(123,'GEPL7897','Parimal  Roy','parimal.roy@gainwellengineering.com','9563841011','GEPL','Product Support','Male','M1','GEPL6682',''),(124,'GEPL7899','Vishnu  Kant','vishnu.kant@gainwellengineering.com','7903017010','GEPL','Product Support','Male','SR.G1','GEPL8538',''),(125,'GEPL7975','Shubham  Bangre','shubham.bangre@gainwellengineering.com','8849738525','GEPL','Product Support','Male','SR.G1','GEPL8538',''),(126,'GEPL7979','Shishupal Kumar','shishupal.kumar@gainwellengineering.com','7362988121','GEPL','Product Support','Male','SR.G1','GEPL7012',''),(127,'GEPL7987','Rajarshi Bhattacharyya','rajarshi.bhattacharyya@gainwellengineering.com','7044731951','GEPL','Product Support','Male','SR.G2','GEPL8386',''),(128,'GEPL7988','Prakash Jyoti Ghosh','prakash.ghosh@gainwellengineering.com','7001640525','GEPL','Product Support','Male','G2','GEPL7012',''),(129,'GEPL8143','Rajesh  Kumar  Chattaraj','Rajesh.Chattaraj@gainwellindia.com','9800869561','GEPL','Finance & Accounts','Male','G3','GEPL5716',''),(130,'GEPL8276','Manikant','manikant.prasad@gainwellengineering.com','8709717309','GEPL','Product Support','Male','SR.G2','GEPL8395',''),(131,'GEPL8282','Biswajit Ghosh','biswajit.ghosh@gainwellengineering.com','8278664221','GEPL','Product Support','Male','G3','GEPL3423',''),(132,'GEPL8327','Rupa Gorai','rupa.gorai@gainwellengineering.com','7908691701','GEPL','Product Support','Female','G1','GEPL8282',''),(133,'GEPL8355','Vishwambhar  Singh','vishwambhar.singh@gainwellengineering.com','7827694489','GEPL','Product Support','Male','G3','GEPL0076',''),(134,'GEPL8386','Manish  Vyas','manish.vyas@gainwellengineering.com','9818799090','GEPL','Product Support','Male','SR.G3','GEPL3423',''),(135,'GEPL8480','Saikat  Banerjee','saikat.banerjee@gainwellengineering.com','9681679213','GEPL','Product Support','Male','G2','GEPL3423',''),(136,'GEPL8538','Subhadip  Kayal','subhadip.kayal@gainwellengineering.com','9874277764','GEPL','Product Support','Male','G4','GEPL0076',''),(137,'GEPL8597','Kumar Raktim Bhattacharyya','raktim.bhattacharya@gainwellengineering.com','9874233073','GEPL','HCM(IR&Admin)','Male','G2','2876',''),(138,'GEPL8702','Sukrit  Sen','sukrit.sen@gainwellengineering.com','9836747615','GEPL','Product Support','Male','G3','GEPL7012',''),(139,'GEPL8736','Santanu  Acharya','santanu.acharya@gainwellengineering.com','7278721423','GEPL','Product Support','Male','G2','GEPL8538',''),(140,'GEPL8858','Saborni  Roy','saborni.roy@gainwellengineering.com','9836639000','GEPL','Personal/Secretorial Support','Female','G2','GEPL2745',''),(141,'GEPL8955','Abhijit  Chakraborty','abhijit.chakraborty@gainwellengineering.com','9831504338','GEPL','Product Support','Male','G3','GEPL7012',''),(142,'GEPL8995','Prabhat  Kumar  Biswas','prabhat.biswas@gainwellengineering.com','7603063734','GEPL','Product Support','Male','SR.G4','GEPL3423','');

/*Table structure for table `employee_grade_master` */

CREATE TABLE `employee_grade_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `employee_grade_master` */

insert  into `employee_grade_master`(`id`,`grade`,`is_active`,`created_at`,`updated_at`) values (1,'AVP','Y',NULL,NULL),(2,'C','Y',NULL,NULL),(3,'G1','Y',NULL,NULL),(4,'G2','Y',NULL,NULL),(5,'G3','Y',NULL,NULL),(6,'G4','Y',NULL,NULL),(7,'G5','Y',NULL,NULL),(8,'M1','Y',NULL,NULL),(9,'M2','Y',NULL,NULL),(10,'MGTR','Y',NULL,NULL),(11,'SR.G1','Y',NULL,NULL),(12,'SR.G2','Y',NULL,NULL),(13,'SR.G3','Y',NULL,NULL),(14,'SR.G4','Y',NULL,NULL),(15,'SR.G5','Y',NULL,NULL),(16,'SRVP','Y',NULL,NULL),(17,'TT','Y',NULL,NULL),(18,'VP','Y',NULL,NULL);

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
  `department` varchar(255) DEFAULT NULL,
  `location_id` int(10) DEFAULT NULL,
  `business_division_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_emp_no_INDEX` (`emp_no`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`emp_no`,`emp_name`,`email`,`gender`,`location`,`company`,`grade`,`password`,`mobile_no`,`manager_code`,`is_online`,`is_active`,`created_at`,`updated_at`,`role_id`,`department`,`location_id`,`business_division_id`) values (10,'GEPL0004','Srikant  Mulka','srikant.mulka@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7045659105','GEPL0007','1','Y','2025-01-16 17:11:37','2025-01-24 12:01:35',2,'Finance & Accounts',1,1),(11,'GEPL0006','Tanay Khandelwal','tanay.khandelwal@gainwellengineering.com','Male','','GEPL','G5','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8971222236','GEPL2745','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Digital Initiatives',1,1),(12,'GEPL0007','Shashi  Agarwal','shashi.agarwal@gainwellengineering.com','Female','','GEPL','G5','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9830693972','GEPL2745','0','Y','2025-01-16 17:11:37','2025-02-13 13:48:21',2,'Finance & Accounts',1,1),(13,'GEPL0008','Rahul Maji','Rahul.Maji@gainwellengineering.com','Male','','GEPL','M1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8906568370','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(14,'GEPL0009','Tirtha Dhara','Tirtha.Dhara@gainwellengineering.com','Male','','GEPL','M1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9679682519','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(15,'GEPL0010','Subrata Moi','Subrata.Moi@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7679825184','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(16,'GEPL0011','Dipanjan Dasgupta','Dipanjan.Dasgupta@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7001806772','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(17,'GEPL0013','Aranya Ghosh','Aranya.Ghosh@gainwellengineering.com','Male','','GEPL','M1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6297877253','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(18,'GEPL0014','Saradindu De','Saradindu.De@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8945964808','GEPL5837','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(19,'GEPL0015','Sombit Das','Sombit.Das@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6290232356','GEPL4225','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(20,'GEPL0016','Shashwat Srivastava','Shashwat.Srivastava@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7355657583','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(21,'GEPL0017','Medapati Krupa ananda Reddy','Medapati.Reddy@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8978261256','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(22,'GEPL0018','Ritankar Chowdhury','Ritankar.Chowdhury@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8240192100','GEPL5450','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(23,'GEPL0019','Pallabi Debnath','Pallabi.Debnath@gainwellengineering.com','Female','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9863160361','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(24,'GEPL0020','Madhuja Bhattacharya','Madhuja.Bhattacharya@gainwellengineering.com','Female','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9163365553','GEPL8702','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(25,'GEPL0021','Souvik Sarkar','Souvik.Sarkar@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7908872696','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(26,'GEPL0023','Aniket De','Aniket.De@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7872583191','GEPL8702','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(27,'GEPL0024','Ayan Mohanta','Ayan.Mohanta@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8768651145','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(28,'GEPL0025','Raj Kamal Chowdhary','Raj.Chowdhary@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8777280650','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(29,'GEPL0026','Arjun Kumar','Arjun.Kumar@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9555394446','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(30,'GEPL0027','Kunal Kumar  Bhagat','kunal.bhagat@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9748497335','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(31,'GEPL0028','Ankita  Chakraborty','Ankita.Chakraborty@gainwellengineering.com','Female','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8617012186','GEPL5837','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(32,'GEPL0029','Subarna  Dawn','Subarna.Dawn@gainwellengineering.com','Female','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8972401337','GEPL5837','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(33,'GEPL0030','Bidisha  Mondal','Bidisha.Mondal@gainwellengineering.com','Female','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7908602736','GEPL5837','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(34,'GEPL0031','Janmejay Samal','Janmejay.Samal@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8497343914','GEPL4138','0','Y','2025-01-16 17:11:37','2025-02-13 13:44:47',2,'Production',1,1),(35,'GEPL0032','Poritosh Maji','Poritosh.Maji@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8145579033','GEPL7354','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(36,'GEPL0033','Hemant Nicholas Nag','Hemant.Nag@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9558297394','GEPL8386','0','Y','2025-01-16 17:11:37','2025-02-13 13:44:06',2,'Manufacturing Operations',1,1),(37,'GEPL0034','Mintu Kumar','Mintu.Kumar@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9110144681','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(38,'GEPL0035','Amarjeet  Kumar','Amarjeet.kumar@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8210175408','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(39,'GEPL0036','Ajay Kumar Bagchi','Ajay.Bagchi@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6290927842','GEPL8355','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(40,'GEPL0038','Simranjeet  Singh','Simranjeet.Singh@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7095376679','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(41,'GEPL0039','Ravindra  Kumar','Ravindra.Kumar@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7001010921','GEPL7354','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(42,'GEPL0040','Tanmoy  Mondal','Tanmoy.Mondal@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7756854236','GEPL8386','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(43,'GEPL0041','Snigdharup  Mitra','Snigdharup.Mitra@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7980521385','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(44,'GEPL0042','Amit Goswami','Amit.Goswami@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8926733262','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(45,'GEPL0043','Kush  Tandon','Kush.Tandon@gainwellengineering.com','Male','','GEPL','SR.G5','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9663314125','GEPL2745','0','Y','2025-01-16 17:11:37','2025-02-13 13:24:29',2,'Production',1,1),(46,'GEPL0044','Anirban  Mondal','Anirban.Mondal@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9474921305','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(47,'GEPL0045','Anand Soni','Anand.Soni@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6388029262','GEPL5837','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(48,'GEPL0046','Ashish Misra','Ashish.Misra@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9654358578','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(49,'GEPL0048','Shubham  Patel','Shubham.Patel@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8400790945','GEPL8355','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(50,'GEPL0049','Shubha Brata Bandyopadhyay','Shubha.Bandyopadhyay@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9163541327','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(51,'GEPL0050','Anand Kumar Pandit','Anand.Pandit@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8509727066','GEPL5716','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(52,'GEPL0051','Sutanu Maulik','Sutanu.Maulik@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9832281818','2876','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'IR & Admin',1,1),(53,'GEPL0052','Satinath Paul','satinath.paul@gainwellengineering.com','Male','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7047543464','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(54,'GEPL0053','Neeraj  Chaudhari','Neeraj.Chaudhari@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7800481379','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(55,'GEPL0055','Yogesh  .','Yogesh.sharma@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9996503651','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(56,'GEPL0057','Avik Kumar Datta','Avik.Datta@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9830882607','GEPL5716','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(57,'GEPL0058','Sahid Mufti','Sahid.Mufti@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8910303725','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(58,'GEPL0059','Arup Dutta','Arup.Dutta@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7980424984','GEPL5716','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(59,'GEPL0060','Arindam Chattopadhyay','Arindam.Chattopadhyay@gainwellengineering.com','Male','','GEPL','SR.G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9836177887','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(60,'GEPL0063','Moumita Mitra','moumita.mitra@gainwellengineering.com','Female','','GEPL','SR.G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9830015853','6753','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'HCM(HR)',1,1),(61,'GEPL0064','Priyanka Surana','priyanka.surana@gainwellengineering.com','Female','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9830869023','6829','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Legal/Audit',1,1),(62,'GEPL0065','Soumik Paul','soumik.paul@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7585025450','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(63,'GEPL0066','Rakhi Chauhan','rakhi.chauhan@gainwellengineering.com','Female','','GEPL','MGTR','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9798939576','GEPL4148','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(64,'GEPL0067','Surojit Dholey','surojit.dholey@gainwellengineering.com','Male','','GEPL','MGTR','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6295416841','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(65,'GEPL0068','Bapi Saha','bapi.saha@gainwellengineering.com','Male','','GEPL','MGTR','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6297054756','GEPL4225','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(66,'GEPL0069','Amit Patra','amit.patra@gainwellengineering.com','Male','','GEPL','MGTR','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9933737326','GEPL7868','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(67,'GEPL0070','Mou Kar','mou.kar@gainwellengineering.com','Female','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9798939576','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(68,'GEPL0071','Hulshi Kumari Pandit','hulshi.pandit@gainwellengineering.com','Female','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9798939576','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(69,'GEPL0072','Rahul Samaddar','Rahul.Samaddar@gainwellengineering.com','Male','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9798939576','GEPL4138','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(70,'GEPL0073','Soumen Modak','soumen.modak@gainwellengineering.com','Male','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8392052077','GEPL0027','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(71,'GEPL0074','Joy Sutradhar','joy.sutradhar@gainwellengineering.com','Male','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9382002193','GEPL0027','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(72,'GEPL0075','Ujjwal Mondal','ujjwal.mondal@gainwellengineering.com','Male','','GEPL','TT','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','07908116064','GEPL7867','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(73,'GEPL0076','Chandra Mohan N','Chandramohan.N@gainwellengineering.com','Male','','GEPL','VP','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9840584151','GEPL2745','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(74,'GEPL0077','Pijush Kanti Mondal','Pijush.Mondal@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7980576492','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(75,'GEPL0078','Subrata Maji','Subrata.Maji@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8536028054','GEPL0027','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(76,'GEPL0079','Ranjit Chakraborty','Ranjit.Chakraborty@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9002352912','GEPL0027','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(77,'GEPL0080','Saheli Saha','Saheli.Saha@gainwellengineering.com','Female','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7001986898','GEPL0063','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'HCM(HR)',1,1),(78,'GEPL0081','Biswarup Chatterjee','biswarup.chatterjee@gainwellengineering.com','Male','','GEPL','C','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8250115791','GEPL0027','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(79,'GEPL0082','Soumya  Sunder  Bose','Soumya.Bose@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9903045994','GEPL7731','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(80,'GEPL0083','Jayakumar Selvaraj','Jayakumar.Selvaraj@gainwellengineering.com','Male','','GEPL','G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9176047715','GEPL0076','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(81,'GEPl0084','Bishal Kewra','bishal.kewra@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8348736273','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(82,'GEPL0085','Varun Bubna','Varun.Bubna@gainwellengineering.com','Male','','GEPL','G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9831155106','GEPL0007','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(83,'GEPL0086','Sanjay Kumar','Sanjay.Kumar@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9340264231','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Manufacturing Operations',1,1),(84,'GEPL0460','Pinaki  Bandyopadhyay','Pinaki.Bandyopadhyay@gainwellindia.com','Male','','GEPL','C','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7001784544','GEPL7987','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(85,'GEPL2417','Abhishek Kumar Singh','abhishek.singh@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9798525637','GEPL5716','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(86,'GEPL2745','Dipankar Banerjee','Dipankar.Banerjee@Gainwellindia.Com','Male','','GEPL','SRVP','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9874131500','6262','0','Y','2025-01-16 17:11:37','2025-02-13 13:16:23',2,'General Management',1,1),(87,'GEPL3423','Jayanta Bhattacharya','jayanta.bhattacharya@gainwellindia.com','Male','','GEPL','AVP','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9163303430','GEPL2745','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(88,'GEPL4120','Kartick  Manna','kartick.manna@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9284925159','GEPL7354','0','Y','2025-01-16 17:11:37','2025-02-13 13:25:00',2,'Product Support',1,1),(89,'GEPL4138','Saptak  Nath','saptak.nath@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9937259591','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(90,'GEPL4141','Rahul  Raj','rahul.raj@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9670671680','GEPL8355','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(91,'GEPL4148','Pravakar Chakraborty','pravakar.chakraborty@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8729884622','GEPL7731','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(92,'GEPL4173','Subham Paul','subham.paul@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7980270911','GEPL7731','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(93,'GEPL4174','Nilkamal Ghosh','nilkamal.ghosh@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9564988948','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(94,'GEPL4190','Dipawali Prabhakar Gajbhiye','dipawali.gajbhiye@gainwellengineering.com','Female','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8856054845','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(95,'GEPL4214','Abhijit Roy','abhijit.roy@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8240005919','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(96,'GEPL4224','Amit Nag','amit.nag@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9836178523','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(97,'GEPL4225','Jiban  Biswas','jiban.biswas@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8600206092','GEPL7731','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(98,'GEPL4226','Sanjay Pati','sanjay.pati@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9999015124','GEPL8386','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(99,'GEPL4235','Jyoti  Sinha','jyoti.sinha@gainwellengineering.com','Female','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9558297367','GEPL4173','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(100,'GEPL4249','Mohd. Ashrafuddin .','mohd.ashrafuddin@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9093177600','2876','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'HCM(IR&Admin)',1,1),(101,'GEPL4278','Ankit Kumar Singh','ankit.singh@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8285457759','GEPL8386','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(102,'GEPL5121','Saibal Mitra','Saibal.Mitra@Gainwellindia.Com','Male','','GEPL','SR.G5','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9433060128','GEPL2745','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(103,'GEPL5450','Kunal Mukherjee','kunal.mukherjee@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9614345034','GEPL7731','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(104,'GEPL5532','Arindam Ghosh','arindam.ghosh@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7797506870','GEPL8386','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(105,'GEPL5716','Swarnali Mukherjee','swarnali.mukherjee@gainwellengineering.com','Female','','GEPL','G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9874466110','GEPL0007','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(106,'GEPL5837','Phalguni Chanda Roy','phalguni.chanda@gainwellengineering.com','Female','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9477429798','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(107,'GEPL5994','Mark Christopher Dirksz','mark.dirksz@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8101416704','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(108,'GEPL6682','Ram Singh Chaudhary','ram.chaudhary@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8001878222','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(109,'GEPL6728','Krishanu Bhattacharyea','krishanu.bhattacharyea@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8797394641','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(110,'GEPL7012','Sanjoy  Mitra','sanjoy.mitra@gainwellengineering.com','Male','','GEPL','G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9830727757','GEPL0076','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(111,'GEPL7024','Anindita  Ghosh','anindita.ghosh@gainwellengineering.com','Female','','GEPL','SR.G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9836424294','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(112,'GEPL7166','Ajeet  Kumar  Upadhayay','ajeet.upadhyay@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8329536022','GEPL8282','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(113,'GEPL7284','Shuvankar  Ghosh','shuvankar.ghosh@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8420987468','GEPL7987','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(114,'GEPL7354','Sayantan Chaudhuri','sayantan.chaudhuri@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8942837981','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(115,'GEPL7721','Saubhik  Mukherjee','saubhik.mukherjee@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8759698238','GEPL7024','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(116,'GEPL7731','Rajeev  Das','rajeev.das@gainwellengineering.com','Male','','GEPL','SR.G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','6296911923','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(117,'GEPL7742','Nitesh  Kumar','nitesh.kumar@gainwellengineering.com','Male','','GEPL','M1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8052296436','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(118,'GEPL7743','Rajan  Kumar','rajan.kumar@gainwellengineering.com','Male','','GEPL','M1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9305710395','GEPL8282','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(119,'GEPL7770','Soumallya Saha','soumallya.saha@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7980646895','GEPL8702','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(120,'GEPL7772','Soumyajit Adak','soumyajit.adak@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8777077574','GEPL8955','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(121,'GEPL7776','Nipa Das','nipa.das@gainwellengineering.com','Female','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8910316599','GEPL5450','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(122,'GEPL7778','Abhinandan Bhattacharyya','abhinandan.bhattacharyya@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8967845928','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(123,'GEPL7780','Joy Manna','joy.manna@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7718113866','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(124,'GEPL7781','Sandip Dey','sandip.dey@gainwellengineering.com','Male','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9547555517','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(125,'GEPL7796','Yarrakula Sriaa','sriaa.yarrakula@gainwellengineering.com','Female','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9330804136','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(126,'GEPL7842','Shashi  Bhushan  Chourasia','shashi.bhushan@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9916586293','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(127,'GEPL7847','Soumen  Mahapatra','soumen.mahapatra@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9933426706','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(128,'GEPL7863','Prithawayan  Sinha','prithawayan.sinha@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8250414233','GEPL8355','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(129,'GEPL7867','Santanu  Chakrabarty','santanu.chakrabarty@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9434892229','GEPL8995','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Production',1,1),(130,'GEPL7868','Ravi  Singh','ravi.singh@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9477436615','GEPL8395','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(131,'GEPL7885','Bivash  Paul','bivash.paul@gainwellengineering.com','Male','','GEPL','M2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8145620419','GEPL8282','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(132,'GEPL7897','Parimal  Roy','parimal.roy@gainwellengineering.com','Male','','GEPL','M1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9563841011','GEPL6682','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(133,'GEPL7899','Vishnu  Kant','vishnu.kant@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7903017010','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(134,'GEPL7975','Shubham  Bangre','shubham.bangre@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8849738525','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(135,'GEPL7979','Shishupal Kumar','shishupal.kumar@gainwellengineering.com','Male','','GEPL','SR.G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7362988121','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(136,'GEPL7987','Rajarshi Bhattacharyya','rajarshi.bhattacharyya@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7044731951','GEPL8386','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(137,'GEPL7988','Prakash Jyoti Ghosh','prakash.ghosh@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7001640525','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(138,'GEPL8143','Rajesh  Kumar  Chattaraj','Rajesh.Chattaraj@gainwellindia.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9800869561','GEPL5716','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Finance & Accounts',1,1),(139,'GEPL8276','Manikant','manikant.prasad@gainwellengineering.com','Male','','GEPL','SR.G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8709717309','GEPL8395','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(140,'GEPL8282','Biswajit Ghosh','biswajit.ghosh@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','8278664221','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(141,'GEPL8327','Rupa Gorai','rupa.gorai@gainwellengineering.com','Female','','GEPL','G1','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7908691701','GEPL8282','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(142,'GEPL8355','Vishwambhar  Singh','vishwambhar.singh@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7827694489','GEPL0076','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(143,'GEPL8386','Manish  Vyas','manish.vyas@gainwellengineering.com','Male','','GEPL','SR.G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9818799090','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(144,'GEPL8480','Saikat  Banerjee','saikat.banerjee@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9681679213','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(145,'GEPL8538','Subhadip  Kayal','subhadip.kayal@gainwellengineering.com','Male','','GEPL','G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9874277764','GEPL0076','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(146,'GEPL8597','Kumar Raktim Bhattacharyya','raktim.bhattacharya@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9874233073','2876','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'HCM(IR&Admin)',1,1),(147,'GEPL8702','Sukrit  Sen','sukrit.sen@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9836747615','GEPL7012','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(148,'GEPL8736','Santanu  Acharya','santanu.acharya@gainwellengineering.com','Male','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7278721423','GEPL8538','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1),(149,'GEPL8858','Saborni  Roy','saborni.roy@gainwellengineering.com','Female','','GEPL','G2','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9836639000','GEPL2745','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Personal/Secretorial Support',1,1),(150,'GEPL8955','Abhijit  Chakraborty','abhijit.chakraborty@gainwellengineering.com','Male','','GEPL','G3','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','9831504338','GEPL7012','0','Y','2025-01-16 17:11:37','2025-02-13 13:19:38',2,'Product Support',1,1),(151,'GEPL8995','Prabhat  Kumar  Biswas','prabhat.biswas@gainwellengineering.com','Male','','GEPL','SR.G4','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW','7603063734','GEPL3423','0','Y','2025-01-16 17:11:37','2025-01-16 17:11:37',2,'Product Support',1,1);

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

/*Table structure for table `location_master` */

CREATE TABLE `location_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `location_master` */

insert  into `location_master`(`id`,`location_name`,`is_active`,`created_at`,`updated_at`) values (1,'Panagarh','Y',NULL,NULL),(2,'Kolkata','Y',NULL,NULL);

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
  `emp_type` enum('SUPERVISOR','APPROVER') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`url`,`route`,`controller`,`method`,`is_parent`,`parent_id`,`menu_srl`,`is_active`,`icon`,`menu_for`,`created_at`,`updated_at`,`emp_type`) values (1,'Dashboard','dashboard','dashboard','DashboardController','index','Y',NULL,1,'Y','<i class=\"fa-solid fa-house\"></i>','Admin','2024-07-11 09:46:30','2024-07-11 09:46:32',NULL),(2,'Dashboard','emp-dashboard','emp-dashboard','DashboardController','index','Y',NULL,1,'Y','<i class=\"fa-solid fa-gears\"></i>','Employee','2024-07-11 09:46:30','2024-07-11 09:46:32','APPROVER'),(3,'Master',NULL,NULL,'MasterController',NULL,'Y',NULL,3,'Y','<i class=\"fa-solid fa-gears\"></i>','Admin','2024-07-11 09:46:30','2024-07-11 09:46:30',NULL),(4,'Test','test','test','MasterController','test','N',3,1,'N','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(5,'Assets Group','assetsgroup','assetsgroup','MasterController','assetsgroup','N',3,1,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(6,'Assets Type','assetstype','assetstype','MasterController','assetstype','N',3,2,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(7,'Employees','employees','employees','MasterController','employees','N',3,5,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(8,'Location','location','location','MasterController','location','N',3,3,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(9,'Business Division','businessdivision','businessdivision','MasterController','businessdivision','N',3,4,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(10,'Approver','approver','approver','MasterController','approver','N',3,6,'Y','<i class=\"fa-solid fa-diamond\"></i>','Admin','2024-09-19 11:34:06','2024-09-19 11:34:08',NULL),(11,'Budget Entity','budget','budget','BudgetController','budget','Y',NULL,2,'N','<i class=\"fa-solid fa-diamond\"></i>','Employee','2024-09-19 11:34:06','2024-09-19 11:34:08','APPROVER'),(12,'Generate Request','capex-request','capex-request','RequestcapexController','capexRequest','Y',NULL,3,'Y','<i class=\"fa-solid fa-diamond\"></i>','Employee','2024-09-19 11:34:06','2024-09-19 11:34:08','APPROVER'),(13,'Request History','request-history','request-history','RequestcapexController','requestHistory','Y',NULL,3,'Y','<i class=\"fa-solid fa-diamond\"></i>','Employee','2024-09-19 11:34:06','2024-09-19 11:34:08','APPROVER'),(14,'Approval Request','request-approval','request-approval','RequestcapexController','requestApproval','Y',NULL,3,'Y','<i class=\"fa-solid fa-diamond\"></i>','Employee','2024-09-19 11:34:06','2024-09-19 11:34:08','APPROVER');

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

insert  into `serialmaster`(`id`,`moduleTag`,`lastnumber`,`module`,`comments`,`created_at`,`updated_at`) values (1,'CR',13,'CAPEX_REQ',NULL,'2024-05-15 18:10:25','2025-02-13 13:48:10'),(4,'SAN',5,'SANCTION_NUMBER',NULL,'2024-05-15 18:10:25','2025-02-13 13:44:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_account_activitys` */

insert  into `user_account_activitys`(`id`,`user_id`,`ip_address`,`user_browser`,`user_platform`,`login_time`,`logout_time`,`created_at`,`updated_at`) values (1,1,'127.0.0.1','Firefox','Windows','2025-01-02 07:48:24','2025-01-02 07:57:20',NULL,NULL),(2,1,'127.0.0.1','Firefox','Windows','2025-01-02 07:57:30',NULL,NULL,NULL),(3,1,'127.0.0.1','Firefox','Windows','2025-01-06 10:04:30','2025-01-06 12:30:51',NULL,NULL),(4,1,'127.0.0.1','Firefox','Windows','2025-01-06 12:30:57',NULL,NULL,NULL),(5,1,'127.0.0.1','Firefox','Windows','2025-01-07 06:39:54',NULL,NULL,NULL),(6,1,'127.0.0.1','Firefox','Windows','2025-01-09 07:25:57',NULL,NULL,NULL),(7,1,'127.0.0.1','Firefox','Windows','2025-01-09 13:20:55',NULL,NULL,NULL),(8,1,'127.0.0.1','Firefox','Windows','2025-01-10 10:14:39',NULL,NULL,NULL),(9,1,'127.0.0.1','Firefox','Windows','2025-01-16 08:01:18',NULL,NULL,NULL),(10,1,'127.0.0.1','Firefox','Windows','2025-01-16 11:53:43',NULL,NULL,NULL),(11,1,'127.0.0.1','Firefox','Windows','2025-01-17 07:12:42',NULL,NULL,NULL),(12,1,'127.0.0.1','Firefox','Windows','2025-01-24 07:51:26','2025-01-24 09:15:15',NULL,NULL),(13,1,'127.0.0.1','Firefox','Windows','2025-01-24 10:50:33','2025-01-24 10:59:14',NULL,NULL),(14,1,'127.0.0.1','Firefox','Windows','2025-01-24 11:04:22','2025-01-24 11:40:06',NULL,NULL),(15,1,'127.0.0.1','Firefox','Windows','2025-01-28 07:29:58','2025-01-28 07:35:12',NULL,NULL),(16,1,'127.0.0.1','Firefox','Windows','2025-01-29 06:55:43','2025-01-29 06:56:03',NULL,NULL),(17,1,'127.0.0.1','Firefox','Windows','2025-01-30 13:18:10','2025-01-30 13:28:47',NULL,NULL),(18,1,'127.0.0.1','Firefox','Windows','2025-02-03 11:00:02','2025-02-03 11:02:42',NULL,NULL),(19,1,'127.0.0.1','Firefox','Windows','2025-02-04 07:15:44',NULL,NULL,NULL),(20,1,'127.0.0.1','Firefox','Windows','2025-02-07 11:15:40','2025-02-07 11:23:02',NULL,NULL),(21,1,'127.0.0.1','Firefox','Windows','2025-02-13 08:27:04','2025-02-13 10:07:17',NULL,NULL),(22,1,'127.0.0.1','Firefox','Windows','2025-02-13 11:09:48','2025-02-13 12:55:29',NULL,NULL);

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

insert  into `users`(`id`,`name`,`username`,`mobile_no`,`email`,`email_verified_at`,`password`,`profile_image`,`address`,`role_id`,`is_active`,`is_online`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin','admin','8910088950','anilk89100@gmail.com','2024-07-11 15:13:00','$2y$12$NlBBsPRcAlJM.HojJWz6COJwDy1VfADHz7rno/O3j9azN7m9UajdW',NULL,NULL,1,'1','0',NULL,'2024-07-11 15:13:11','2025-02-13 12:55:29'),(3,'Admin','dev','8910088950','anilk89105@gmail.com','2024-07-11 15:13:00','$2y$10$W5hmQ3cWloGx0DSlQqOlv.pj1HK9oevwPwLeElLWXzBB7OfNcdZB2',NULL,NULL,1,'1','1',NULL,'2024-07-11 15:13:11','2024-09-19 14:11:35');

/*Table structure for table `vendor_master` */

CREATE TABLE `vendor_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_code` varchar(255) DEFAULT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `country_region_key` varchar(255) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `gstin_no` varchar(255) DEFAULT NULL COMMENT 'Tax_Number',
  `vendor_mobile_number` varchar(255) DEFAULT NULL,
  `vendor_telephone_number` varchar(255) DEFAULT NULL,
  `vendor_email` varchar(255) DEFAULT NULL,
  `vendor_type` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL,
  `vendor_address` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `vendor_master` */

insert  into `vendor_master`(`id`,`vendor_code`,`company_code`,`country_region_key`,`vendor_name`,`city`,`postal_code`,`region`,`gstin_no`,`vendor_mobile_number`,`vendor_telephone_number`,`vendor_email`,`vendor_type`,`currency`,`payment_terms`,`vendor_address`,`is_active`,`created_at`,`updated_at`,`contact_person`) values (7,'10000000','3000','IN','ABC Ltd.','Dankuni','700091','19','19ABCDE1234A1ZE','99000098900','7788990','trxytqfyxqytxy@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(8,'10000002','3000','IN','Fenicia','ganesh guri','781001','18','18AABCU9355J1ZT','','','','Domestic Vendor - Material','INR','ZP08',NULL,'Y',NULL,NULL,NULL),(9,'10000003','3000','IN','ABB INDIA LIMITED','KOLKATA','700025','19','19AAACT4210G3ZM','7473102153','','','Domestic Vendor - Material','INR','NT30',NULL,'Y',NULL,NULL,NULL),(10,'50000002','3000','CZ','E.L.F.E,s.r.o.','Czech republic','794 01','10','','','','','Import Vendor-Materials','AUD','ZP05',NULL,'Y',NULL,NULL,NULL),(11,'11000000','3000','IN','ANOVAA ENGINEERING PRIVATE LIMITED','BANGALORE , Karnataka','560064','29','KAXXXXXXXXX','','','','Domestic Vendor - Service','INR','NT30',NULL,'Y',NULL,NULL,NULL),(12,'11000002','3000','IN','EXCEL DESIGN TECHMOLOGIES PVT LTD','NEW DELHI','110034','7','07AADCE6172F1ZQ','','','','Domestic Vendor - Service','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(15,'12000000','3000','IN','West Bengal Industrial Development','Kolkata','700017','WB','19AWWPD4563E1Z','','','','Domestic Vendor - Capital','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(16,'10000011','3000','IN','WIPRO ENTERPRISES PRIVATE LIMITED','Andhra Pradesh','515211','37','','','','','Domestic Vendor - Material','INR','ZP01',NULL,'Y',NULL,NULL,NULL),(18,'10000014','3000','IN','KPL Commercial','KOLKATA','700072','19','19AFWPL5050Q1ZGIN','3346047701','9874538617','kplcommercial@gmail.com','Domestic Vendor - Material','INR','NT30',NULL,'Y',NULL,NULL,NULL),(19,'10000001','3000','IN','Fenicia','Dankuni','700091','19','19AAACH7409R1ZY','99','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(20,'10000017','3000','IN','APL Services private limited test','Dankuni','700091','18','ERFE34R','','','','Domestic Vendor - Material','INR','ZP01',NULL,'Y',NULL,NULL,NULL),(21,'11000006','3000','IN','EPLAN Software And Services(P) Ltd.','Karnataka','560064','29','JYTRFGH','','','','Domestic Vendor - Service','INR','ZP16',NULL,'Y',NULL,NULL,NULL),(22,'13000001','3000','IN','Insurance Vendor','kolkata','700102','19','19EGKPL9867G','','','','Domestic Vendor - Statutory','INR','ZP16',NULL,'Y',NULL,NULL,NULL),(23,'50000004','3000','GB','WORLD COAL ASSOCIATION','LONDON ROAD,KINGSTON,SURREY','KT2 6QL','KTT','','','','','Import Vendor-Materials','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(24,'10000005','3000','IN','indian oil','ganesh guri','781001','18','18AAACS2809J1ZB','','','','Domestic Vendor - Material','INR','ZP14',NULL,'Y',NULL,NULL,NULL),(25,'13000000','3000','IN','COMMISSIONER OF CUSTOMS','West Vergenia','435067','19','1234567','','','','Domestic Vendor - Statutory','INR','ZP16',NULL,'Y',NULL,NULL,NULL),(26,'11000008','3000','IN','Sunrise Enterprise private corporat','new york','900048','19','35476877987','','','','Domestic Vendor - Service','INR','ZP12',NULL,'Y',NULL,NULL,NULL),(27,'50000001','3000','US','W W Grainger Inc','Z','39986','AL','','','','','Import Vendor-Materials','AUD','ZP12',NULL,'Y',NULL,NULL,NULL),(28,'11000009','3000','IN','AKM Enterprise PVT Ltd.','silchar','340567','18','546578778','','','','Domestic Vendor - Service','INR','ZP16',NULL,'Y',NULL,NULL,NULL),(29,'14000000','3000','IN','Testing OTV 01','kol','700098','19','','','','','Domestic Vendor - One Time','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(30,'10000048','3000','IN','Testing Vendor 1','Kolkata','700150','19','77771-6343-3543','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(31,'50000005','3000','US','Import Vendor','Hico','25854','WV','','','','','Import Vendor-Materials','USD','NT00',NULL,'Y',NULL,NULL,NULL),(32,'10000061','3000','IN','Testing Upload Vendor 3','Kolkata','700002','19','GSTNO.32456494','033-2929394','9908765431','sdfdgd@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(33,'10000063','3000','IN','Testing Upload Vendor 3','Kolkata','700002','19','435676','033-2929394','9908765431','sdfdgd@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(34,'10000064','3000','IN','Testing Upload Vendor 5','howrah','700078','19','98687686','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(35,'10000065','3000','IN','Testing Upload Vendor 6','Kolkata','700002','19','345787','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(36,'10000066','3000','IN','Testing Upload Vendor 7','Howrah','700002','19','3445','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(37,'10000067','3000','IN','Testing Upload Vendor 7','Howrah','700002','19','448484848','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(38,'10000068','3000','IN','Testing Upload Vendor 9','how','700002','19','12356788','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(39,'10000069','3000','IN','Testing Upload Vendor 10','HW','976975','19','111112121','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(40,'10000073','3000','IN','test 1','kol','123456','19','354454756','033-34435435','9988770099','sss@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(41,'10000074','3000','IN','test 1','kol','123456','19','135','033-34435435','9988770099','sss@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(42,'10000075','3000','IN','test 3','kol','324444','19','12345','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(43,'10000109','3000','AU','Cincinnati Mine Australia Pty Ltd','BRENDALE','4500','QLD','57111421526','07 3298 6585','','sales@cincinnatimine.com.au','Domestic Vendor - Material','AUD','ZP08',NULL,'Y',NULL,NULL,NULL),(44,'50000010','3000','US','Cincinnati Mine Machinery Co.','United State of America','0','OH','','','','','Import Vendor-Materials','USD','NT00',NULL,'Y',NULL,NULL,NULL),(45,'51000010','3000','IN','GLOBELINK WW INDIA PVT LTD','Kolkata','700071','19','19AABCG1834G1ZS','033 - 2280 15...','9073684276/98...','sanjay.kol@globelinkww.com','Import Vendor-Services','INR','ZP02',NULL,'Y',NULL,NULL,NULL),(46,'11000060','3000','US','INSURANCE CHARGE - MINING(DUMMY)','West Bengal','0','NY','N/A','','','','Domestic Vendor - Service','INR','NT00',NULL,'Y',NULL,NULL,NULL),(47,'10000015','3000','IN','XYZ CO. LTD.','KOLKATA','700001','19','19AAP87361Z1B','9999999999','','','Domestic Vendor - Material','INR','ZP01',NULL,'Y',NULL,NULL,NULL),(48,'11000070','3000','IN','OECL Shipping & Logistics Pvt. Ltd.','Kolkata','700091','19','19AABCO3217H1ZL','','','','Domestic Vendor - Service','INR','ZP02',NULL,'Y',NULL,NULL,NULL),(49,'11000071','3000','IN','S&IB Services Pvt Ltd','Adyanath Saha Rd, Kolkata','700048','19','19AALCS6434Q1ZF','','','','Domestic Vendor - Service','INR','ZP04',NULL,'Y',NULL,NULL,NULL),(50,'11000072','3000','IN','RUIA CARS PVT. LTD.','Kolkata','700068','19','19AAACO8514A1ZQ','','','','Domestic Vendor - Service','INR','ZP02',NULL,'Y',NULL,NULL,NULL),(51,'11000073','3000','IN','SPS Associates','82, Joshi Road, Delhi','110005','7','07AABFS6687E1ZY','','','','Domestic Vendor - Service','INR','ZP14',NULL,'Y',NULL,NULL,NULL),(52,'11000074','3000','IN','VIDEO PLAZA','DURGAPUR','713216','19','19AAEFV1227A1ZL','','','','Domestic Vendor - Service','INR','ZP26',NULL,'Y',NULL,NULL,NULL),(53,'51000020','3000','US','Intralinks, Inc.','New York','10017','NY','','','','','Import Vendor-Services','INR','ZP15',NULL,'Y',NULL,NULL,NULL),(54,'3050','3000','SG','Gainwell Engineering Global Pte Ltd','Singapore','639535','SG','202130030E','','','','Intercompany as a BP','INR','ZP01',NULL,'Y',NULL,NULL,NULL),(55,'11000075','3000','IN','Mass Associates','Kasturba Gandhi Road, Delhi','110001','7','07ABDFM2446E1JZ','','','','Domestic Vendor - Service','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(56,'11000080','3000','IN','UL Electrodevices Pvt Ltd','PUNE','411046','27','27AAACU2163R1ZV','','','','Domestic Vendor - Service','INR','ZP01',NULL,'Y',NULL,NULL,NULL),(57,'10000114','3000','AU','Custom Fluidpower Ptd Ltd','Carrington','2294','NSW','61090926659','','','sales.newcastle@custom.com.au','Domestic Vendor - Material','AUD','ZP01',NULL,'Y',NULL,NULL,NULL),(58,'10000202','3000','IN','111 Vendor','Dankuni','700091','19','19ABCDE1234A1ZE','7788990','99000098900','test@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(59,'10000203','3000','IN','BBB LTD','Kolkata','700021','19','19ABCDE1434A1ZE','22023030','9837554067','aaa@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(60,'10000200','3000','IN','Test Vendor','Dankuni','700091','19','19ABCDE1234A1ZE','7788990','99000098900','test@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(61,'10000201','3000','IN','AAA LTD','Kolkata','700021','19','19ABCDE1434A1ZE','22023030','9837554067','aaa@gmail.com','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(62,'10000210','3000','IN','xyz','Kolkata','700021','19','19ABCDE1434A2ZE','','','','Domestic Vendor - Material','INR','ZP05',NULL,'Y',NULL,NULL,NULL),(63,'20000030','3000','IN','Gainwell Commosales Private Limited','Jhanjra','713385','19','19AAFCG8736M1ZW','9002055886','','rakesh.singh@gainwellindia.com','Export Customer','INR','ZP02',NULL,'Y',NULL,NULL,NULL),(64,'6000','3000','AU','Gainwell Engineering Pacific Pty. L','New South Wales','2290','NSW','7.4657E+13','','','','Intercompany as a BP','AUD','ZP05',NULL,'Y',NULL,NULL,NULL),(65,'7000','3000','US','Gainwell Engineering INC.','West Virginia','25854','WV','','','','','Intercompany as a BP','USD','ZP05',NULL,'Y',NULL,NULL,NULL),(66,'10000220','3000','IN','SHANTHI GEARS LIMITED','COIMBATORE','641406','33','33AADCS0692L1Z7','','','','Domestic Vendor - Material','INR','ZP02',NULL,'Y',NULL,NULL,NULL),(67,'10000221','3000','IN','SHANTHI GEARS LIMITED 2nd','COIMBATORE','641406','33','33AADCS0692L1Z7','','','','Domestic Vendor - Material','INR','ZP02',NULL,'Y',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
