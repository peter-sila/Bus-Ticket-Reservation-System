-- MySQL dump 10.13  Distrib 8.0.37, for Win64 (x86_64)
--
-- Host: localhost    Database: youngcoach
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `scheduleid` int NOT NULL,
  `userid` int NOT NULL,
  `paymentnumber` varchar(100) NOT NULL,
  `numberseats` int NOT NULL,
  `seats` varchar(250) NOT NULL,
  `fare` int NOT NULL,
  `paymentstatus` varchar(100) NOT NULL,
  `bookingcode` varchar(100) NOT NULL,
  `bookingdate` date NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (25,7,12,'',2,'4C, 4D',2600,'Completed','','2024-05-27','2024-06-11 19:00:45.375677'),(26,7,12,'',16,'1C, 1D, 3C, 9A, 9B, 9C, 9D, 10A, 10B, 10C, 10D, 11A, 11B, 11C, 11D, 11E',20800,'Completed','','2024-05-28','2024-06-12 11:57:53.706876'),(27,8,11,'',42,'1A, 1B, 1C, 1D, 2A, 2B, 2C, 2D, 3C, 3D, 4A, 4B, 4C, 4D, 5A, 5B, 5C, 5D, 6A, 6B, 6C, 6D, 7A, 7B, 7C, 7D, 8A, 8B, 8C, 8D, 9A, 9B, 9C, 9D, 10A, 10B, 10C, 10D, 11A, 11B, 11C, 11D',75600,'Completed','','2024-06-05','2024-06-13 09:46:06.135421'),(29,9,11,'',43,'1A, 1B, 1C, 1D, 2A, 2B, 2C, 2D, 3C, 3D, 4A, 4B, 4C, 4D, 5A, 5B, 5C, 5D, 6A, 6B, 6C, 6D, 7A, 7B, 7C, 7D, 8A, 8B, 8C, 8D, 9A, 9B, 9C, 9D, 10A, 10B, 10C, 10D, 11A, 11B, 11C, 11D, 11E',43000,'pedding','','2024-06-05','2024-06-05 09:38:07.534044'),(32,8,12,'254794178635',1,'11E',1800,'pedding','3006691','2024-06-29','2024-06-29 09:28:56.443373'),(33,14,15,'254794178635',5,'3C, 3D, 4D, 5C, 6D',6750,'pedding','14447907','2024-06-29','2024-06-29 09:44:23.200285'),(34,17,16,'254716973110',1,'1A',1900,'pedding','6465460','2024-07-05','2024-07-05 09:36:39.847933');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buses` (
  `bus_id` int NOT NULL AUTO_INCREMENT,
  `busnumber` varchar(100) NOT NULL,
  `capacity` int NOT NULL,
  `status` varchar(100) NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`bus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buses`
--

LOCK TABLES `buses` WRITE;
/*!40000 ALTER TABLE `buses` DISABLE KEYS */;
INSERT INTO `buses` VALUES (1,'KDY736G',47,'inactive','2024-06-14 11:55:02.689492'),(2,'KDH572G',47,'inactive','2024-06-14 09:39:32.954891'),(4,'KDS 764 G',43,'active','2024-06-13 09:01:05.833130'),(5,'KDF 492 G',43,'active','2024-06-29 09:34:27.986792'),(6,'KBD 382 F',43,'active','2024-06-29 09:34:42.643580');
/*!40000 ALTER TABLE `buses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driverallocation`
--

DROP TABLE IF EXISTS `driverallocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `driverallocation` (
  `allocation_id` int NOT NULL AUTO_INCREMENT,
  `driverid` int NOT NULL,
  `busid` int NOT NULL,
  `lastupdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`allocation_id`),
  KEY `driverid` (`driverid`),
  KEY `busid` (`busid`),
  CONSTRAINT `driverallocation_ibfk_1` FOREIGN KEY (`driverid`) REFERENCES `drivers` (`driver_id`),
  CONSTRAINT `driverallocation_ibfk_2` FOREIGN KEY (`busid`) REFERENCES `buses` (`bus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driverallocation`
--

LOCK TABLES `driverallocation` WRITE;
/*!40000 ALTER TABLE `driverallocation` DISABLE KEYS */;
INSERT INTO `driverallocation` VALUES (1,1,1,'2024-06-11 19:24:29.692376'),(3,3,2,'2024-06-11 19:29:17.533990');
/*!40000 ALTER TABLE `driverallocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `driver_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idpassport` varchar(100) NOT NULL,
  `lastupdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,'Joseph ','794178635','petersilakioko@gmail.com','24576564','2024-04-02 09:29:22.595602'),(3,'Mathew','702950062','silayoungp@gmail.com','76839394','2024-04-02 09:30:13.580007'),(4,'Sila Kioko','184849343','silakioko2023@gmail.com','463728','2024-06-12 10:55:02.635265'),(5,'Musau','184849343','musaugift@gmail.com','23456789','2024-06-13 11:20:56.572611');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `location_id` int NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Machakos','Machakos','2024-04-02 09:25:53.839330'),(3,'Mombasa','Mombasa','2024-04-02 09:26:48.222221'),(4,'Nakuru','Nakuru','2024-06-12 11:02:08.922331'),(7,'Eldoret','Eldoret','2024-04-02 09:28:48.231389'),(8,'Nairobi','Nairobi','2024-04-18 09:57:08.283254'),(9,'Kisumu','Kisumu','2024-06-13 09:08:57.735035');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'young K','petersila@gmail.com','Young coach safaries, the pride of kenya.','2024-04-02 10:25:10.860695'),(2,'Sila','petersila2022@gmail.com','Welcome, home','2024-05-21 10:03:44.269600'),(3,'Sila','petersila2022@gmail.com','Welcome','2024-06-05 07:04:25.348072'),(4,'Sila','petersila2002@gmail.com','Welcome, home','2024-06-08 09:56:16.673181'),(5,'sila','silakioko2023@gmail.com','Welcome','2024-06-08 09:58:26.363245'),(6,'sila','silakioko2023@gmail.com','i enjoyed the trip','2024-06-10 12:53:00.704535'),(7,'sila','petersila2002@gmail.com','i enjoyed the trip','2024-06-12 09:19:14.254753');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `amountpaid` int NOT NULL,
  `paymentdate` date NOT NULL,
  `transactionid` varchar(100) NOT NULL,
  `paymentstatus` varchar(100) NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `schedule_id` int NOT NULL AUTO_INCREMENT,
  `sdate` date NOT NULL,
  `bus` varchar(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `departuretime` time(6) NOT NULL,
  `fare` int NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (7,'2024-06-28','KDH572G','Nairobi','Eldoret','16:30:00.000000',1300,'2024-06-12 11:10:27.429281'),(8,'2024-07-01','KDY736G','Mombasa','Nairobi','14:00:00.000000',1800,'2024-06-12 11:11:04.083816'),(9,'2024-06-05','KCY743H','Nakuru','Eldoret','11:12:00.000000',1000,'2024-06-05 08:14:37.455060'),(11,'2024-06-05','KDH572G','Wote','Kitui','08:00:00.000000',600,'2024-06-05 08:18:37.309180'),(12,'2024-06-06','KDY736G','Nairobi','Eldoret','11:00:00.000000',1350,'2024-06-06 09:25:29.574610'),(13,'2024-06-06','KCY743H','Nairobi','Eldoret','13:00:00.000000',1250,'2024-06-06 09:26:19.976691'),(14,'2024-06-30','KDY736G','Nairobi','Eldoret','20:00:00.000000',1350,'2024-06-11 10:18:23.876742'),(15,'2024-06-29','KDY736G','Mombasa','Nairobi','18:00:00.000000',1850,'2024-06-12 11:12:23.886701'),(16,'2024-06-25','KBD 382 F','Kisumu','Nairobi','14:00:00.000000',1700,'2024-06-13 09:11:35.261270'),(17,'2024-07-15','KDS 764 G','Nairobi','Mombasa','14:00:00.000000',1900,'2024-07-02 18:00:59.190132'),(18,'2024-07-30','KBD 382 F','Nairobi','Kisumu','14:00:00.000000',1700,'2024-07-02 18:01:42.572842');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `idpassport` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(70) NOT NULL,
  `verified` tinyint NOT NULL,
  `token` varchar(50) NOT NULL,
  `lastupdated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'sila','peter','kioko','449io98e','0758484934','petersila2002@gmail.com','Male','admin','$2y$10$.Q/ha01GHeZTxCkMwipW1uHTFoD3Lg.BNXm8oWkVitlKjbgK7yF4q',0,'468aa9bc046b06c218b43033281903ace7444b9b','2024-06-29 09:33:25.019709'),(13,'Joseph','Musyoka','Keli','449','758484934','josephmusyo@gmail.com','Male','user','$2y$10$MRC4m6setUCK9c.ZpN0WGOg8VsuYZZ0TN.8FLEM5gpshOkpEXfcpS',0,'6e62f2c12931462dcd7f08ca3cc3cb293203414d','2024-06-13 09:37:23.014010'),(14,'Joseph','Mutuku','Kimunyu','449','753782827','joshkimu@gmail.com','Male','user','$2y$10$NlsR8nA2cFuYlXw5i4ZTaeIIZTyZw60XCDM8Y8ghl.owfIyARRisK',0,'0c9f9d1be4fba5ff17207d96e8e2d101fb2f1669','2024-06-13 09:39:50.990466'),(15,'sila','Sylvester','kioko','23456789','0758484934','petersila2022@gmail.com','Male','user','$2y$10$sktE//zMc785wH4pc/io1.ipxjXiufjf9SIIgTYIDImtzPesXkM0e',0,'f86cfa420a580de4ef92830dd041cdb6217f6c67','2024-07-05 08:23:15.369480'),(16,'Dr','Stanley','Chege','39284991','0794178635','stanley.mwangichege@gmail.com','Male','user','$2y$10$H.ST.4a.HNN3arVpvRZBM.joFp/6X7zHUYXGukSbmCEV3YnIiUcAW',0,'b85cd1286b537148cf4d9527bc8846ad1b65881c','2024-07-05 09:32:44.293446');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-22 11:55:10
