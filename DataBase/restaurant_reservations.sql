-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: restaurant
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guests` int NOT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,'GG','m.gg@gmail.com','0766477418','2024-06-06','18:30:00',5,''),(2,'Ronceray','ronceray.lulu@gmail.com','07564654545','2024-06-06','23:30:00',2,'Merci'),(3,'Ronceray','ronceray.lulu@gmail.com','07564654545','2024-06-06','23:30:00',2,'Merci'),(4,'SELECT email, name FROM reservations WHERE name like ‘GG’ or 1=1 --','dfgdfg@dfgdfg.com','424070707040','2024-06-06','10:30:00',5,'SELECT email, name FROM reservations WHERE name like ‘GG’ or 1=1 --'),(5,'Gg','dfgdfg@dfgdg','dfgdg','2024-06-05','10:30:00',5,'Thx'),(6,'fghfgh','fghgfhfghfgh@±ghfgh','6315841581','2024-06-05','10:30:00',2,'thx'),(7,'Ronceray','mdfgdfg@dfdgfdfg.dfgdfg','40806432084','2024-06-07','18:30:00',8,'thx\r\n'),(8,'gfg','ghfhgfgh@fgfgh','fghfgh','2024-06-14','10:00:00',5,'Thx'),(9,'Ggggggggggggggg','ggggggg.ggggg@gggggg.ggg','7777777777','2024-06-25','10:30:00',10,'Repas de Famille'),(10,'?id=1′ and 1=1','sfsfsfd@sfdsfd','4154151514','2024-06-14','10:30:00',2,''),(11,'?id=1′ and 1=1','sfsfsfd@sfdsfd','4154151514','2024-06-14','10:30:00',2,'?id=1′ and 1=1'),(12,'?id=1′ and 1=1','sfsfsfd@sfdsfd','4154151514','2024-06-14','10:30:00',2,'?id=1′ and 1=1'),(13,'?id=1′ and 1=1','sfsfsfd@sfdsfd','4154151514','2024-06-14','10:30:00',2,'?id=1′ and 1=1'),(14,'?id=1′ and 1=1','sfsfsfd@sfdsfd','4154151514','2024-06-14','10:30:00',2,'?id=1′ and 1=1'),(15,'frdfj00000000000000000','ojdo@sdfsfd','000000000','2024-06-07','18:30:00',1000,'Test');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-07 12:38:16
