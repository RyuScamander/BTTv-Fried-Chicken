-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bttv_fried_chicken
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` enum('fries','chickens','sides','main meals','drinks') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `combo_meal` tinyint NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'BTTv Fried Chicken','Our signature crispy fried chicken, cooked to perfection with secret sauce, boneless.',30000.00,'','chickens',0,0),(2,'Spicy Chicken Wing','Wing with spicy sauce.',25000.00,'','chickens',0,0),(3,'Spicy Chicken Thigh','Thigh with spicy sauce.',35000.00,'','chickens',0,0),(4,'MEDIUM Chicken Popcorn','Smaller in piece, but size doesn\'t matter.',45000.00,'','chickens',0,0),(5,'LARGE Chicken Popcorn','Smaller in piece, but bigger in size!',65000.00,'','chickens',0,0),(6,'BTTv MEDIUM Fries','Owner\'s favorite fries, perfectly salted.',40000.00,'','fries',0,0),(7,'BTTv LARGE Fries','Owner\'s favorite fries, perfectly salted with a tremendous amount.',60000.00,'','fries',0,0),(8,'Salads','A healthy choice.',30000.00,'','sides',0,0),(9,'Mashed Potatoes','In case you like potatoes but isn\'t fried?',30000.00,'','sides',0,0),(10,'Chicken on da rice bowl','You\'re Asian and you like rice? We got you.',50000.00,'','main meals',0,0),(11,'Chicken on da noodle dish','Noodle with BTTv Chicken, for your wildest imagination.',55000.00,'','main meals',0,0),(12,'BBTv Burga','A Burger which is made with love.',37000.00,'','main meals',0,0),(13,'Purple Dragon','Chicken with dragonfruit sauce, boneless.',43000.00,'','chickens',0,0),(14,'Caco','For a refreshing summer.',15000.00,'','drinks',0,0),(15,'Pisep','For an even refreshing summer.',15000.00,'','drinks',0,0),(16,'6-nights','When you\'re having a good day.',69000.00,'','drinks',0,0),(17,'Di-hydro Mono-oxide','Acid Hydroxic',10000.00,'','drinks',0,0),(18,'BTTv Grilled Chicken','When you don\'t really feel Chicken Fried.',30000.00,'','chickens',0,0),(19,'Western Chicken Leg Quarter','A Chicken from the West (Turkey)',70000.00,'','chickens',0,0),(20,'Supa hot Phoenix','A warrior in the journey of reaching the peak of Spiciness',45000.00,'','chickens',0,0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-11 10:17:53
