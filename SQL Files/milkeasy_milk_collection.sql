<<<<<<< HEAD
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: milkeasy
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `milk_collection`
--

DROP TABLE IF EXISTS `milk_collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `milk_collection` (
  `srno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `shift` varchar(45) NOT NULL,
  `milk_collector_id` varchar(200) NOT NULL,
  `fat` float NOT NULL,
  `litre` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `milk_collection`
--

LOCK TABLES `milk_collection` WRITE;
/*!40000 ALTER TABLE `milk_collection` DISABLE KEYS */;
INSERT INTO `milk_collection` VALUES (2,'vishal sawai','2023-03-25 00:00:00','morning','prashant sangule',6,17,510),(4,'suryakumar yadav','2023-03-25 00:00:00','eveninng','prashant sangule',6,35,1050),(8,'shubham Gill','2023-03-27 00:00:00','morning','prashant sangule',6,23,828),(11,'Jeevan Korde','2023-07-10 00:00:00','morning','sanket jadhav',7,9,441),(12,'ranjit kokre','2023-07-10 00:00:00','eveninng','sanket jadhav',8,13,728),(13,'Nishant Sutar','2023-07-10 00:00:00','morning','sanket jadhav',7,15,735),(14,'Ajay Koronde','2023-07-10 00:00:00','morning','sanket jadhav',8,56,3136),(15,'Nishant Sutar','2023-07-31 00:00:00','morning','sanket jadhav',5,56,1960),(16,'Jeevan Korde','2023-08-01 00:00:00','morning','sanket jadhav',4,12,336);
/*!40000 ALTER TABLE `milk_collection` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-05 21:51:26
=======
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: milkeasy
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `milk_collection`
--

DROP TABLE IF EXISTS `milk_collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `milk_collection` (
  `srno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `shift` varchar(45) NOT NULL,
  `milk_collector_id` varchar(200) NOT NULL,
  `fat` float NOT NULL,
  `litre` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `milk_collection`
--

LOCK TABLES `milk_collection` WRITE;
/*!40000 ALTER TABLE `milk_collection` DISABLE KEYS */;
INSERT INTO `milk_collection` VALUES (2,'vishal sawai','2023-03-25 00:00:00','morning','prashant sangule',6,17,510),(4,'suryakumar yadav','2023-03-25 00:00:00','eveninng','prashant sangule',6,35,1050),(8,'shubham Gill','2023-03-27 00:00:00','morning','prashant sangule',6,23,828),(11,'Jeevan Korde','2023-07-10 00:00:00','morning','sanket jadhav',7,9,441),(12,'ranjit kokre','2023-07-10 00:00:00','eveninng','sanket jadhav',8,13,728),(13,'Nishant Sutar','2023-07-10 00:00:00','morning','sanket jadhav',7,15,735),(14,'Ajay Koronde','2023-07-10 00:00:00','morning','sanket jadhav',8,56,3136),(15,'Nishant Sutar','2023-07-31 00:00:00','morning','sanket jadhav',5,56,1960),(16,'Jeevan Korde','2023-08-01 00:00:00','morning','sanket jadhav',4,12,336);
/*!40000 ALTER TABLE `milk_collection` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-05 21:51:26
>>>>>>> 0e7987e5c53f5363aa561f6f9cef94288438880b
