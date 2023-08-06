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
-- Table structure for table `farmer_registration`
--

DROP TABLE IF EXISTS `farmer_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmer_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `upiid` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmer_registration`
--

LOCK TABLES `farmer_registration` WRITE;
/*!40000 ALTER TABLE `farmer_registration` DISABLE KEYS */;
INSERT INTO `farmer_registration` VALUES (6,'ranjit kokre','8998788756','ranjit@gmail.com','ranjit@ybl','pune','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(7,'sanket jadhav','9092707832','sanket@gmail.com','sanket@ybl','pune','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(8,'Nishant Sutar','9765348786','nishant@gmail.com','nishant12@ybl','Sanbur Patan','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(9,'Jeevan Korde','9887766567','jeevan@gmail.com','jeevan12@ybl','Pune','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(10,'Ajay Koronde','8800678765','ajay@gmail.com','ajay12@ybl','Gondia','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `farmer_registration` ENABLE KEYS */;
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
-- Table structure for table `farmer_registration`
--

DROP TABLE IF EXISTS `farmer_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmer_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `upiid` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmer_registration`
--

LOCK TABLES `farmer_registration` WRITE;
/*!40000 ALTER TABLE `farmer_registration` DISABLE KEYS */;
INSERT INTO `farmer_registration` VALUES (6,'ranjit kokre','8998788756','ranjit@gmail.com','ranjit@ybl','pune','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(7,'sanket jadhav','9092707832','sanket@gmail.com','sanket@ybl','pune','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(8,'Nishant Sutar','9765348786','nishant@gmail.com','nishant12@ybl','Sanbur Patan','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(9,'Jeevan Korde','9887766567','jeevan@gmail.com','jeevan12@ybl','Pune','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e'),(10,'Ajay Koronde','8800678765','ajay@gmail.com','ajay12@ybl','Gondia','Farmer','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `farmer_registration` ENABLE KEYS */;
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
