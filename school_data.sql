/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.10-MariaDB : Database - kk_school
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kk_school` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `kk_school`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`admin_name`,`email`,`password`,`created_at`,`updated_at`,`image_name`) values (1,'a','a@gmail.com','0cc175b9c0f1b6a831c399e269772661','2022-11-15 09:38:10','2022-11-15 09:38:10','admin.png');

/*Table structure for table `attendence` */

DROP TABLE IF EXISTS `attendence`;

CREATE TABLE `attendence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `today_attendence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `today_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendence_class_id_foreign` (`class_id`),
  CONSTRAINT `attendence_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attendence` */

insert  into `attendence`(`id`,`today_attendence`,`today_date`,`class_id`,`created_at`,`updated_at`) values (3,'[{\"id\":\"12\",\"student_name\":\"shaheer\",\"today_attendence\":\"present\"}]','2022-11-18',11,'2022-11-18 12:43:58','2022-11-18 12:47:45');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`created_at`,`updated_at`) values (1,'joidqiwj','2023-01-14 08:29:43','2023-01-14 08:29:43');

/*Table structure for table `class_fee` */

DROP TABLE IF EXISTS `class_fee`;

CREATE TABLE `class_fee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_fee_class_id_foreign` (`class_id`),
  CONSTRAINT `class_fee_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `class_fee` */

insert  into `class_fee`(`id`,`class_id`,`fee`,`apply_date`,`created_at`,`updated_at`) values (1,11,'100','2022-11-14','2022-11-14 11:57:05','2022-11-14 11:57:05'),(2,11,'120','2022-11-15','2022-11-14 11:57:32','2022-11-14 11:57:32'),(3,11,'600','2022-11-25','2022-11-25 10:59:30','2022-11-25 10:59:30'),(4,12,'700','2022-11-25','2022-11-25 10:59:48','2022-11-25 10:59:48'),(5,13,'800','2022-11-25','2022-11-25 11:00:06','2022-11-25 11:00:06');

/*Table structure for table `employes` */

DROP TABLE IF EXISTS `employes`;

CREATE TABLE `employes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employe_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(10,2) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employes` */

insert  into `employes`(`id`,`employe_name`,`father_name`,`phone`,`address`,`salary`,`image_name`,`pay_date`,`created_at`,`updated_at`,`is_active`,`status`) values (1,'Jacquelyn Hirthe Sr.','Art Terry',11,'Isidro Bogisich',0.00,'Monserrate Larkin','1102-12-21','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(2,'Prof. Neha Padberg Jr.','Miss Genevieve Boehm Jr.',3,'Alvis Price',0.00,'Nikita Watsica','0588-07-20','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(3,'Miss Larissa Wiza III','Mr. Houston Feest MD',12,'Victoria Strosin Sr.',0.00,'Julie Kshlerin','1203-03-19','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(4,'Tad Rutherford','Aditya Heidenreich',12,'Josiah Jacobs',0.00,'Keely Towne','0328-04-16','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(5,'Janis Waters','Quinn Hahn',8,'Craig O\'Kon',0.00,'Myrtice Nicolas III','1682-09-03','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(6,'Terrell Cassin','Cameron Armstrong',7,'Regan Tromp',0.00,'Clarissa Orn','0104-07-31','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(7,'Hester Kuhn','Mr. Uriel Cronin',14,'Ms. Zoila Gulgowski V',0.00,'Kristian Schmidt','0352-01-24','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(8,'Dr. Tiana Sanford II','Prof. Raheem Wuckert I',2,'Ms. Cecilia Brown I',0.00,'Flavio Mills','1274-02-09','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(9,'Arvid Walter DDS','Mireille Daugherty',12,'Lamar Zemlak',0.00,'Imani Schultz','1043-09-16','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(10,'Ernest Kutch','Sterling Lockman',18,'Emmitt Haag',0.00,'Reva Goldner','0098-09-02','2022-11-14 10:03:14','2022-11-14 10:03:14',0,''),(11,'Keanu Kihn','Eileen McKenzie',2,'Ms. Johanna Kris',0.00,'Tristian Von','0495-03-01','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(12,'Randy Collins','Alfonso Gaylord',8,'Mr. Wilford Buckridge PhD',0.00,'Myra Gislason','1803-09-19','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(13,'Lawson Block','Ursula Murazik',18,'Krystel Jast I',0.00,'Dr. Margarett Heathcote Jr.','0396-11-13','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(14,'Krista Zulauf Sr.','Vilma Hudson',12,'Prof. Alejandra Oberbrunner Jr.',0.00,'Prof. Newell Bailey','0135-11-09','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(15,'Dr. Jennie Harvey II','Meda Wisozk',9,'Arlene Green',0.00,'Dr. Harmon Considine Sr.','0069-05-10','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(16,'Andreanne Frami','Ms. Janelle Carroll DVM',6,'Ms. Chyna Donnelly IV',0.00,'Aisha Beatty','1105-07-12','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(17,'Ms. Hope Lebsack MD','Glenna Harber',10,'Jackson Little III',0.00,'Ada Beahan','1533-02-22','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(18,'Ryleigh Skiles','Katlynn Gerhold',13,'Cristobal Zieme',0.00,'Letitia Johns','1492-12-14','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(19,'Ransom Friesen','Bret Moen',14,'Verdie Schuster',0.00,'Dimitri Corwin','0920-12-30','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(20,'Claud Raynor','Mr. Keeley Johnston',1,'Mr. Tyree Lubowitz',0.00,'Akeem Veum','1870-07-26','2023-01-14 09:08:28','2023-01-14 09:08:28',0,''),(21,'Ms. Constance Tremblay','Mrs. Kenyatta Cruickshank',4,'Kevon Nicolas DDS',0.00,'Ronaldo Corwin','1583-09-22','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(22,'Mr. Lucius Effertz','Prof. Jonathan Baumbach DVM',16,'Ava Skiles',0.00,'Virgil Rosenbaum','1054-08-01','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(23,'Sophie White','Mrs. Mable McLaughlin',12,'Dr. Christa Becker II',0.00,'Karelle Koch','0152-01-09','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(24,'Jaime Fisher Jr.','Tyrese Mertz',2,'Dr. Raphael McCullough',0.00,'Beverly Jaskolski','1661-01-27','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(25,'Casandra Kuhic','Mittie Farrell',9,'Pierce Casper Sr.',0.00,'Domenico Huels','0021-05-05','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(26,'Wayne Gislason MD','Amani Schamberger',3,'Lupe VonRueden',0.00,'Dr. Lenny Waelchi','1395-03-13','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(27,'Rhett Schaefer','Esteban Ortiz Sr.',8,'Aliyah Swift',0.00,'Laurianne Barrows PhD','1452-04-14','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(28,'Mr. Braulio Hilpert PhD','Dr. Lonny Harber',19,'Mr. Doyle Zboncak',0.00,'Nelda Von','0685-10-17','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(29,'Diana Harber II','Jennings Keeling DDS',3,'Dr. Gerardo Bahringer PhD',0.00,'Macey Halvorson DVM','1557-12-04','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(30,'Ms. Kathryn Weber','Calista Rath',13,'Maia Turcotte',0.00,'Prof. Ariel Kertzmann MD','1666-11-19','2023-01-14 09:23:28','2023-01-14 09:23:28',0,''),(31,'Dr. Dedric Bogan','Ms. Wendy VonRueden',1,'Elizabeth Collins',0.00,'Wellington Cruickshank','0001-08-04','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(32,'Odell Kohler','Dr. Nathanial Weissnat',3,'Yasmine Pfannerstill',0.00,'Vince Hand','1998-06-15','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(33,'Dr. Elnora Koelpin IV','Mr. Louisa Ullrich',18,'Laila Marquardt',0.00,'Charles Lang','1189-09-03','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(34,'Yoshiko Maggio PhD','Wava Jaskolski',8,'Shayne Olson',0.00,'Karine Spinka','1736-07-10','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(35,'Dr. Felipe Pagac','Elza Nader',15,'Tressa Muller',0.00,'Samara Schowalter','1566-03-10','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(36,'Dr. Kiana Mertz','Milton Gleichner',17,'Dean Wisoky',0.00,'Salvatore Trantow','0837-06-03','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(37,'Carlos Murazik','Dr. Emmet Dibbert',11,'Kevon Cummings',0.00,'Joaquin Orn','0242-04-19','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(38,'Mrs. Jazmin Ward','Demetris McGlynn DDS',19,'Prof. Haleigh Prosacco',0.00,'Frankie Abernathy','1651-12-17','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(39,'Prof. Estrella Zulauf V','Tess Cole',4,'Ola Prosacco',0.00,'Johan Lesch','0134-10-19','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(40,'Anastacio Tillman','Miss Yvette Heller',17,'Cade Bins',0.00,'Kendrick Berge','0157-01-25','2023-01-14 09:24:13','2023-01-14 09:24:13',0,''),(41,'Sigurd Bruen IV','Ethyl Kris',9,'Samir Kilback',0.00,'Mustafa Hodkiewicz','1606-07-09','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(42,'Frieda Casper','Ignacio Smitham II',3,'Flavio Price MD',0.00,'Ms. Lydia Larson','2019-08-18','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(43,'Josiane Howe','Camylle Jerde',14,'Prof. Providenci Bergstrom',0.00,'Felton Beer I','0721-06-03','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(44,'Vincent Klein','Ms. Luz Braun I',9,'Prudence Bogan',0.00,'Shanny Casper','1744-02-19','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(45,'Wade Jakubowski','Alba Greenfelder',17,'Prof. Kale Mayer DDS',0.00,'Joana Kris Jr.','1365-03-08','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(46,'Miss Aurelia Luettgen MD','Dena Deckow',3,'Adele Nader',0.00,'Daphnee Collier','1966-09-25','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(47,'Kariane Schowalter','Keyon Lynch',1,'Mr. Hyman Koss PhD',0.00,'Mr. Khalid Kassulke','1694-05-08','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(48,'Dr. Jaylan Stehr','Vivienne Grady',6,'Dr. Sallie Pagac',0.00,'Nicklaus Morar Sr.','1704-05-07','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(49,'Estelle Schumm V','Eli Gerhold',19,'Margarett Gaylord',0.00,'Marjory Durgan','0272-06-12','2023-01-14 09:24:56','2023-01-14 09:24:56',0,''),(50,'Braeden Grant','Mandy Kling',13,'Miss Elena Reynolds III',0.00,'Miss Leonor Strosin','0100-03-21','2023-01-14 09:24:56','2023-01-14 09:24:56',0,'');

/*Table structure for table `exams` */

DROP TABLE IF EXISTS `exams`;

CREATE TABLE `exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `timing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_exams` (`class_id`),
  CONSTRAINT `FK_exams` FOREIGN KEY (`class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `exams` */

insert  into `exams`(`id`,`class_id`,`start_date`,`end_date`,`timing`,`created_at`,`updated_at`) values (1,11,'2022-12-01','2022-12-07','1_hour','2022-12-11 10:18:22','2022-12-11 10:18:22');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `expense_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employe_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `expense_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_category_id_foreign` (`category_id`),
  KEY `expenses_employe_id_foreign` (`employe_id`),
  CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `expenses_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `expenses` */

insert  into `expenses`(`id`,`expense_name`,`expense_detail`,`employe_id`,`category_id`,`expense_amount`,`pay_date`,`created_at`,`updated_at`) values (10,'skldmnqk1','bjkbkj',1,1,'kjbkj','0000-00-00','2023-01-14 08:30:04','2023-01-14 08:30:04');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',2),(3,'2019_08_19_000000_create_failed_jobs_table',3),(4,'2019_12_14_000001_create_personal_access_tokens_table',3),(5,'2022_12_06_091459_create_exams_table',4);

/*Table structure for table `my_classes` */

DROP TABLE IF EXISTS `my_classes`;

CREATE TABLE `my_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `my_classes` */

insert  into `my_classes`(`id`,`class_name`,`created_at`,`updated_at`) values (11,'class one',NULL,NULL),(12,'class two',NULL,NULL),(13,'class three',NULL,NULL),(14,'Ernesto Rempel','2023-01-14 09:08:28','2023-01-14 09:08:28'),(15,'Prof. Van Reynolds','2023-01-14 09:08:28','2023-01-14 09:08:28'),(16,'Brandi Schiller','2023-01-14 09:08:28','2023-01-14 09:08:28'),(17,'Golden King','2023-01-14 09:08:28','2023-01-14 09:08:28'),(18,'Brent Hamill','2023-01-14 09:08:28','2023-01-14 09:08:28'),(19,'Dr. Kaela Russel II','2023-01-14 09:08:28','2023-01-14 09:08:28'),(20,'Dr. Adolph Emmerich III','2023-01-14 09:08:28','2023-01-14 09:08:28'),(21,'Aylin Pfeffer','2023-01-14 09:08:28','2023-01-14 09:08:28'),(22,'Rebekah Goldner','2023-01-14 09:08:28','2023-01-14 09:08:28'),(23,'Jimmie Hettinger MD','2023-01-14 09:08:28','2023-01-14 09:08:28'),(24,'Glenda Heaney','2023-01-14 09:23:28','2023-01-14 09:23:28'),(25,'Mr. Hardy Graham MD','2023-01-14 09:23:28','2023-01-14 09:23:28'),(26,'Prof. Jerry Hickle II','2023-01-14 09:23:28','2023-01-14 09:23:28'),(27,'Kari Weissnat','2023-01-14 09:23:28','2023-01-14 09:23:28'),(28,'Mrs. Yasmin Schmidt II','2023-01-14 09:23:28','2023-01-14 09:23:28'),(29,'Mr. Corbin Hansen III','2023-01-14 09:23:28','2023-01-14 09:23:28'),(30,'Watson Koepp','2023-01-14 09:23:28','2023-01-14 09:23:28'),(31,'Lucinda Weissnat','2023-01-14 09:23:28','2023-01-14 09:23:28'),(32,'Brady Pfeffer','2023-01-14 09:23:28','2023-01-14 09:23:28'),(33,'Freida Nader','2023-01-14 09:23:28','2023-01-14 09:23:28'),(34,'Miss Maggie Herzog IV','2023-01-14 09:24:13','2023-01-14 09:24:13'),(35,'Cora Will','2023-01-14 09:24:13','2023-01-14 09:24:13'),(36,'Miss Jazmyne Lowe','2023-01-14 09:24:13','2023-01-14 09:24:13'),(37,'Alexandra Ledner PhD','2023-01-14 09:24:13','2023-01-14 09:24:13'),(38,'Gino Gusikowski','2023-01-14 09:24:13','2023-01-14 09:24:13'),(39,'Anne Sauer','2023-01-14 09:24:13','2023-01-14 09:24:13'),(40,'Flo Bartoletti','2023-01-14 09:24:13','2023-01-14 09:24:13'),(41,'Mekhi Doyle','2023-01-14 09:24:13','2023-01-14 09:24:13'),(42,'Cecelia Kassulke','2023-01-14 09:24:13','2023-01-14 09:24:13'),(43,'Mrs. Ethelyn Ritchie','2023-01-14 09:24:13','2023-01-14 09:24:13'),(44,'Ms. Jammie Kihn','2023-01-14 09:24:56','2023-01-14 09:24:56'),(45,'Maynard Stracke DDS','2023-01-14 09:24:56','2023-01-14 09:24:56'),(46,'Prof. Anika Homenick II','2023-01-14 09:24:56','2023-01-14 09:24:56'),(47,'Dr. Micah Hartmann DDS','2023-01-14 09:24:56','2023-01-14 09:24:56'),(48,'Alek Gleichner I','2023-01-14 09:24:56','2023-01-14 09:24:56'),(49,'Amari Stark','2023-01-14 09:24:56','2023-01-14 09:24:56'),(50,'Willie Roob','2023-01-14 09:24:56','2023-01-14 09:24:56'),(51,'Dr. Jodie Grady I','2023-01-14 09:24:56','2023-01-14 09:24:56'),(52,'Mariam Kautzer','2023-01-14 09:24:56','2023-01-14 09:24:56'),(53,'Norene Reinger','2023-01-14 09:24:56','2023-01-14 09:24:56');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `student_classes` */

DROP TABLE IF EXISTS `student_classes`;

CREATE TABLE `student_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `student_class_id` int(10) unsigned NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_classes_student_class_id_foreign` (`student_class_id`),
  KEY `student_classes_student_id_foreign` (`student_id`),
  CONSTRAINT `student_classes_student_class_id_foreign` FOREIGN KEY (`student_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_classes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `student_classes` */

insert  into `student_classes`(`id`,`student_id`,`student_class_id`,`fee`,`created_at`,`updated_at`) values (2,12,11,'120','2022-11-16 12:10:45','2022-11-16 12:10:45'),(5,13,11,'800','2023-01-14 08:25:48','2023-01-14 08:25:48');

/*Table structure for table `student_fee_paid` */

DROP TABLE IF EXISTS `student_fee_paid`;

CREATE TABLE `student_fee_paid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_class_fee_data` varchar(525) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_date` date NOT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_fee_class_id_foreign` (`class_id`),
  CONSTRAINT `student_fee_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `student_fee_paid` */

insert  into `student_fee_paid`(`id`,`class_id`,`month`,`year`,`all_class_fee_data`,`submit_date`,`fee`,`created_at`,`updated_at`) values (1,11,'Jan','2023','[{\"id\":\"12\",\"fee\":\"120\",\"student_name\":\"shaheer\",\"is_paid\":\"paid\"},{\"id\":\"13\",\"fee\":\"800\",\"student_name\":\"ahmed\",\"is_paid\":\"paid\"}]','2023-01-14','120','2023-01-14 08:28:56','2023-01-14 08:28:56');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admission_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`roll_no`,`student_name`,`father_name`,`phone`,`address`,`gender`,`image_name`,`created_at`,`updated_at`,`admission_date`) values (12,'2','shaheer','m tayyab','234','hjkh','Select Gender','Screenshot (2).png','2022-11-14 12:00:05','2023-01-14 08:27:15','2022-11-14'),(13,'3','ahmed','Tahir','345',NULL,'male','Screenshot (6).png','2022-11-14 12:00:35','2022-11-14 12:00:35','2022-11-14'),(14,'12','Myron Hickle','Yessenia Leffler','16','Monty Bosco Sr.','male','Ignacio Senger','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(15,'12','Enola Walsh Jr.','Gustave Hauck','4','Helga Streich IV','female','Dr. Shany Gottlieb IV','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(16,'5','Mittie Halvorson DVM','Ronaldo Muller','12','Dorthy Abernathy MD','female','Dr. Irwin Mayert Jr.','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(17,'10','Skyla Kautzer V','Meghan Ebert IV','15','Jairo Bogisich II','male','Herta Hettinger','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(18,'19','Kathleen Braun','Aubrey Orn','7','Mr. Dennis Heidenreich','female','Mr. Cesar Jones','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(19,'20','Beulah Ruecker','Alexandre Boyle','6','Alessandra Dach','male','Maribel Kerluke PhD','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(20,'18','Conner Walsh DDS','Kaitlyn Cormier','11','Heidi Mante V','female','Justen Kreiger','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(21,'16','Damien Kemmer','Terrill Stanton','5','Kasey Fahey','male','Luciano Johnson','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(22,'20','Prof. Garfield Roberts MD','Norval Gutmann','12','Carli Lubowitz','female','Marge Toy','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(23,'5','Madeline Heidenreich','Prof. Damon Bechtelar','9','Vinnie Morar','male','Rebekah Bode','2023-01-14 09:08:28','2023-01-14 09:08:28','0000-00-00'),(24,'3','Lacey Heaney DDS','Gabriel Wilderman','10','Ms. Euna Hintz Sr.','female','Maynard Kuvalis II','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(25,'15','Braxton Kilback','Jadon Greenfelder','11','Mrs. Dena Corwin','male','Miss Lucienne Fadel PhD','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(26,'1','Zion VonRueden','Prof. Clement Mraz DDS','5','Prof. Nellie Pouros','male','Mr. Nickolas Ward II','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(27,'20','Miss Jude Bahringer','Reid Weber PhD','13','Verlie Christiansen','male','Ms. Crystal Fadel','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(28,'11','Miss Amelia Ortiz','Prof. Brady Streich','11','Rosina Hayes','male','Aric Wiegand','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(29,'7','Dr. Remington Leuschke','Sienna Toy','3','Mr. Anthony Kuhn Sr.','female','Hubert Green','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(30,'7','Aidan Orn','Prof. Eddie Runolfsdottir I','19','Delia Hirthe II','female','Eulah Heidenreich','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(31,'2','Carmela Boyer','Leda Nolan','12','Arno Hahn','male','Daisy Ruecker','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(32,'7','Dr. Allison Mante DVM','Miss Rosalinda Wiza','16','Francesco Gorczany','male','Gerry Sauer','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(33,'3','Prof. Stan Leannon','Dr. Greyson Lowe','7','Santiago Bailey','female','Mathilde Auer','2023-01-14 09:23:28','2023-01-14 09:23:28','0000-00-00'),(34,'17','Prof. Ahmad Durgan II','Emilio Dare','1','Justina Moore','female','Antonietta Witting','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(35,'7','Kevin Wintheiser','Shanie Monahan','8','Rosemary Gleason Jr.','female','Elian Beer DVM','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(36,'1','Mr. Bartholome Ondricka','Jean Breitenberg','15','Fanny Goodwin','male','Berneice Moore','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(37,'6','Judy Muller','Edward Olson','19','Joaquin Rempel','male','Aurore Johnston','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(38,'5','Amalia Williamson','Dr. Norbert Leuschke','7','Prof. Howard Hoeger','male','Dr. Weldon Daugherty','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(39,'13','Emilio Gottlieb Jr.','Jacky Hartmann DDS','17','Enos Nicolas','male','Milan Kuhn','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(40,'4','Matt Kilback I','Sam Bradtke','4','Mrs. Sabrina Balistreri Sr.','female','Prof. Jadon Hansen DDS','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(41,'18','Prof. Enrique Wehner','Myrl Steuber','13','Lori Bauch','female','Mrs. Lyla DuBuque I','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(42,'8','Armani Kuhlman','Connor Bartell','2','Joshua Pagac','male','Jadyn Donnelly','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(43,'7','Mr. Martin Shields','Howard Brekke','1','Allison Schroeder','male','Damien Kerluke','2023-01-14 09:24:13','2023-01-14 09:24:13','0000-00-00'),(44,'6','Dr. Donnell Jenkins V','Prof. Karina Hand PhD','5','Mr. Giovanni Halvorson','female','Lacey Nader II','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(45,'16','Mr. Royce Rodriguez DVM','Alvera Wunsch','11','Miss Alyson Stark PhD','female','Cara Denesik','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(46,'17','Amelie Haag','Madeline Lynch','19','Mallory Willms','male','Prof. Kaitlyn Schamberger IV','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(47,'11','Helene Pouros I','Prof. Rick Champlin','6','Elbert Ruecker Jr.','female','Lyla Wiza V','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(48,'10','Kaden Greenfelder','Lucile Wolf','8','Darius Cartwright PhD','male','Alisha Hahn','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(49,'18','Hettie Marvin','Prof. Ladarius Eichmann DDS','16','Claudie Windler','male','Prof. Dana Hilpert Jr.','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(50,'19','Rigoberto Johns DVM','Prof. Charley Jacobs Jr.','10','Mr. Cicero Frami','female','Ken Leffler','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(51,'11','Pedro Torphy','Lexus Barton I','4','Angelina Gorczany','female','Estell Vandervort DDS','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(52,'20','Dr. Anderson VonRueden II','Brock Schneider Sr.','15','Mr. Mack Weimann','female','Letitia Nader','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00'),(53,'4','Kirstin Beier','Yessenia Willms','17','Clement Cummings DDS','male','Lenna Rutherford','2023-01-14 09:24:56','2023-01-14 09:24:56','0000-00-00');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_classes_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_my_classes_id_foreign` (`my_classes_id`),
  CONSTRAINT `subjects_my_classes_id_foreign` FOREIGN KEY (`my_classes_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`subject_name`,`my_classes_id`,`created_at`,`updated_at`) values (2,'math',11,'2022-12-08 11:46:56','2022-12-08 11:46:56'),(3,'science',12,'2022-12-08 11:47:30','2022-12-08 11:47:30'),(4,'english',13,'2022-12-08 11:47:43','2022-12-08 11:47:43');

/*Table structure for table `teacher_salary_paid` */

DROP TABLE IF EXISTS `teacher_salary_paid`;

CREATE TABLE `teacher_salary_paid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salary` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_salary_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `teacher_salary_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teacher_salary_paid` */

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joining_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teachers` */

/*Table structure for table `teachers_salary` */

DROP TABLE IF EXISTS `teachers_salary`;

CREATE TABLE `teachers_salary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_salary_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `teachers_salary_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teachers_salary` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
