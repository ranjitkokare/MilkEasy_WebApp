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
-- Table structure for table `coll_payment`
--

DROP TABLE IF EXISTS `coll_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coll_payment` (
  `srno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `trsnid` varchar(45) NOT NULL,
  `fromdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(200) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coll_payment`
--

LOCK TABLES `coll_payment` WRITE;
/*!40000 ALTER TABLE `coll_payment` DISABLE KEYS */;
INSERT INTO `coll_payment` VALUES (1,'jaspreet bhumra','13245','2023-03-18 00:00:00','2023-03-24 00:00:00','Successful','23/03/25','1000'),(2,'mohamad shami','3245432','2023-03-16 00:00:00','2023-03-22 00:00:00','Successful','23/03/25','5000'),(3,'prashant sangule','7934','2023-03-15 00:00:00','2023-03-24 00:00:00','Successful','23/03/25','10000');
/*!40000 ALTER TABLE `coll_payment` ENABLE KEYS */;
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
-- Table structure for table `coll_payment`
--

DROP TABLE IF EXISTS `coll_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coll_payment` (
  `srno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `trsnid` varchar(45) NOT NULL,
  `fromdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(200) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coll_payment`
--

LOCK TABLES `coll_payment` WRITE;
/*!40000 ALTER TABLE `coll_payment` DISABLE KEYS */;
INSERT INTO `coll_payment` VALUES (1,'jaspreet bhumra','13245','2023-03-18 00:00:00','2023-03-24 00:00:00','Successful','23/03/25','1000'),(2,'mohamad shami','3245432','2023-03-16 00:00:00','2023-03-22 00:00:00','Successful','23/03/25','5000'),(3,'prashant sangule','7934','2023-03-15 00:00:00','2023-03-24 00:00:00','Successful','23/03/25','10000');
/*!40000 ALTER TABLE `coll_payment` ENABLE KEYS */;
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
