-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: autoparc
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `park_id` int DEFAULT NULL,
  `model` varchar(50) NOT NULL,
  `year` year NOT NULL,
  `price` float unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `park_id` (`park_id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`park_id`) REFERENCES `parks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,1,'VM Jetta',2012,35),(2,1,'VM T5',2015,47),(3,1,'Skoda Octavia',2019,55),(4,2,'Elantra',2017,40),(5,2,'Kia soul',2019,50),(6,2,'Skoda Octavia',2019,55),(7,3,'Kia soul',2019,50),(8,3,'Mercedes-Benz',2017,60),(9,3,'Mercedes-Benz',2019,65),(10,4,'VM Jetta',2012,35),(11,4,'VM T5',2015,47),(12,5,'Elantra',2017,40),(13,5,'Skoda Octavia',2019,55),(14,5,'Skoda Octavia',2019,65),(16,5,'Mercedes-Benz',2017,60);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'ej1@gmail.com','Ethan','Johnson'),(2,'he2@gmail.com','Harry','Evans'),(3,'hw3@gmail.com','Harry','Wilson'),(4,'ea4@gmail.com','Emily','Adamson'),(5,'lk5@gmail.com','Lily','King');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cars_id` bigint DEFAULT NULL,
  `LICENSE_ID` varchar(16) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `data` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `LICENSE_ID` (`LICENSE_ID`),
  KEY `cars_id` (`cars_id`),
  CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,1,'license#1','Oliver Grant','1997-07-10'),(2,2,'license#2','Harry Martin','1990-11-05'),(3,3,'license#3','Daniel Oscar','2000-03-07'),(4,4,'license#7','Li Martin','2001-03-07'),(5,5,'license#12','Thomas Oscar','2000-11-11');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `driver_id` bigint DEFAULT NULL,
  `first_address` varchar(255) NOT NULL,
  `destination_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,1,'firs_addr 1','second_addr 2'),(2,3,5,'f_a_7','s_a_2'),(3,3,5,'firs_addr 8','second_addr 10'),(4,4,4,'firs_addr 7','second_addr 12'),(5,5,2,'firs_addr 15','second_addr 20'),(8,3,3,'f_a_11','s_a_22'),(9,1,5,'f_a_5','s_a_1');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parks`
--

DROP TABLE IF EXISTS `parks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parks`
--

LOCK TABLES `parks` WRITE;
/*!40000 ALTER TABLE `parks` DISABLE KEYS */;
INSERT INTO `parks` VALUES (1,'#1','addres 1'),(2,'#2','addres 2'),(3,'#3','addres 3'),(4,'#4','addres 4'),(5,'#5','addres 5');
/*!40000 ALTER TABLE `parks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-03  2:09:51
