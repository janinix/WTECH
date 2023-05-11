-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: wtech_app3
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

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
-- Table structure for table `order_infos`
--

DROP TABLE IF EXISTS `order_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_infos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `shopping_card_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_infos`
--

LOCK TABLES `order_infos` WRITE;
/*!40000 ALTER TABLE `order_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `price` int DEFAULT NULL,
  `image1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int DEFAULT NULL,
  `image2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `image3` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `category2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `category3` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category4` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (2,'Gold Standard Whey 100%','Kvalitný proteín od špičkového výrobcu.',25,'../images/product1_1.png',4,'../images/product1_2.png',NULL,'vyziva','GN','protein','whey'),(3,'Gold Standard Whey 100% Sáčok','Kvalitný proteín v šáčku',15,'../images/product2_1.png',4,'2../images/product1_2.png',NULL,'vyziva','GN','protein','whey'),(4,'ISO Whey Zero','Najlepší proteín na trhu',35,'../images/product4_1.png',5,'../images/product4_2.png',NULL,'vyziva','Biotech','protein','whey'),(5,'Enjoy Whey Protein','Kvalitný proteín od špičkového výrobcu v oblasti proteínov.',30,'../images/product5_1.png',4,'../images/product5_2.png',NULL,'vyziva','Gymbeam','protein','whey'),(6,'Just Whey Protein','Kvalitný proteín od špičkového výrobcu v oblasti proteinov.',32,'../images/product6_1.png',4,'../images/product6_2.png',NULL,'vyziva','Gymbeam','protein','whey'),(7,'Beast Yum Yum','Kvalitný proteín od špičkového výrobcu v oblasti proteinov.',26,'../images/product7_1.png',3,'../images/product7_2.png',NULL,'vyziva','Gymbeam','protein','whey'),(8,'GymBeam Tričko Fialové','Športové tričko od spoločnosti GymBeam na všetky typy tréningov.',15,'../images/product8_1.png',5,'../images/product8_2.png',NULL,'oblecenie','Gymbeam','tricko',NULL),(9,'GymBeam Tričko Červené','Športové tričko od spoločnosti GymBeam na všetky typy tréningov.',15,'../images/product9_1.png',5,'../images/product9_2.png',NULL,'oblecenie','GymBeam','tricko',NULL),(10,'GymBeam Mikina Biela','Športová mikina od spoločnosti GymBeam pre chladné počasie.',40,'../images/product10_1.png',5,'../images/product10_2.png',NULL,'oblecenie','GymBeam','mikina',NULL),(11,'GymBeam Mikina Modrá','Športová mikina od spoločnosti GymBeam pre chladné počasie.',40,'../images/product11_1.png',5,'../images/product11_2.png',NULL,'oblecenie','GymBeam','mikina',NULL),(12,'Peanut Butter','Arašidové maslo od spoločnosti GymBeam pre každé jedlo.',5,'../images/product12_1.png',4,'../images/product12_2.png',NULL,'potraviny','GymBeam','butter',NULL),(13,'Liquid Eggs Whites','Vaječné bielka od spoločnosti GymBeam pre zdravé raňajky a varenie.',10,'../images/product13_1.png',4,'../images/product13_2.png',NULL,'potraviny','GymBeam','bielka',NULL),(14,'Zero Syrup','Nula kalorický sirup na dochutenie jedál',10,'../images/product14_1.png',3,'../images/product14_2.png',NULL,'potraviny','GymBeam','syrup',NULL),(15,'Záťažová vesta','Záťažová vesta s hmotnosťou 15kg na zlepšenie tréningu.',80,'../images/product15_1.png',4,'../images/product15_2.png',NULL,'prislusenstvo','GymBeam','vesta',NULL),(16,'Popruhy na cvičenie','Popruhy na zlepšenie tréningu',75,'../images/product16_1.png',3,'../images/product16_2.png',NULL,'prislusenstvo','Gymbeam','popruhy',NULL),(17,'Vsperačsný Opasok GymBeam','Opasok na spevnenie stredu tela počas tréningu.',50,'../images/product17_1.png',4,'../images/product17_2.png',NULL,'prislusenstvo','Gymbeam','opasok',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopping_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart_item`
--

DROP TABLE IF EXISTS `shopping_cart_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopping_cart_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shopping_cart_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart_item`
--

LOCK TABLES `shopping_cart_item` WRITE;
/*!40000 ALTER TABLE `shopping_cart_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_history`
--

DROP TABLE IF EXISTS `shopping_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopping_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `shopping_cart_id` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_history`
--

LOCK TABLES `shopping_history` WRITE;
/*!40000 ALTER TABLE `shopping_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Ján Mareček','jano','$2y$10$z2pID8qsYrRGRAfRr2PXfuoPyJYU8GX1NrOkrXjmzOkfdx9E4D0SG','janomarecek2002@gmail.com','2023-04-07 12:46:29','2023-04-07 12:46:29'),(5,'admin','admin','$2y$10$y2lT3Mj6OtF37lrf8Ii4f.GDFcYSGGr3asVizelWKcbKHu8psZaD2','admin@gmail.com','2023-04-07 15:07:42','2023-04-07 15:07:42'),(8,'Miroslava Mäsiariková','mirus','$2y$10$z94hiMl.FIBHd0v0fmb/2Og9WKXcS9Yu7AzBJ8WRZh.7RCTzdw2oi','miroslava.masiarikova@gmail.com','2023-04-14 18:08:32','2023-04-14 18:08:32'),(13,'adam','melikant','$2y$10$nCbe8VWOV.FMXB3odlrnQuzM57pyYIaqUrmQt5B65BCJ7hVVtHH7S','adam.melikant@gmail.com','2023-05-02 12:07:55','2023-05-02 12:07:55');
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

-- Dump completed on 2023-05-07 14:06:18
