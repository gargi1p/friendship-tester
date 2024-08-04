-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: mydatabase
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `answer` varchar(60) DEFAULT NULL,
  `test_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_quesid` (`question_id`),
  KEY `fk_testid` (`test_id`),
  CONSTRAINT `fk_quesid` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  CONSTRAINT `fk_testid` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'2',1,1),(2,'2',1,2),(3,'3',1,3),(4,'3',1,4),(5,'3',1,5),(6,'2',1,6),(7,'2',1,7),(8,'1',1,8),(9,'2',1,9),(10,'2',1,10),(11,'3',1,11),(12,'2',1,20),(13,'2',1,21),(14,'2',1,30),(15,'2',2,1),(16,'3',2,2),(17,'2',2,3),(18,'2',2,4),(19,'3',2,5),(20,'3',2,6),(21,'2',2,7),(22,'3',2,8),(23,'3',2,9),(24,'2',2,10),(25,'2',2,11),(26,'2',2,20),(27,'2',2,21),(28,'2',2,30);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `image` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'ENTERTAINMENT','img/entertainment.jpg'),(2,'FOOD','img/food.webp'),(3,'CHILDHOOD','img/childhood.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL,
  `option1` varchar(60) DEFAULT NULL,
  `option2` varchar(60) DEFAULT NULL,
  `option3` varchar(60) DEFAULT NULL,
  `option4` varchar(60) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoryid` (`category_id`),
  CONSTRAINT `fk_categoryid` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Who is your Favorite actor?','SHAH RUKH KHAN','SALMAN KHAN','VARUN DHAWAN','SIDDHARTH MALHOTRA',1),(2,'Who is your Favorite actress?','ALIA BHATT','DEEPIKA PADUKONE','PRIYANKA CHOPRA','KRITI SANON',1),(3,'Which is your Favorite 90\'s movie?','DILWALE DULHANIA LE JAYENGE','HUM SAATH SAATH HAI','KUCHH KUCHH HOTA HAI','TIRANGAA',1),(4,'Who is your Favorite cartoon character?','CHHOTA BHEEM','NOBITA','OGGY','SIZUKA',1),(5,'Which is your Favorite cartoon?','DOREMON','SHINCHAN','OGGY AND THE COCKROACHES','CHHOTA BHEEM',1),(6,'Which is your Favorite funny movie?','PHIR HERA PHERI','GOLMAAL','DE DANA DAN','CHUPKE CHUPKE',1),(7,'Which is your Favorite TV show?','THE KAPIL SHARMA SHOW','TMKOC (OLD)','GUTUR GU','MR.BEAN',1),(8,'Which is your Favorite serial?','ANUPAMA','IMLIE','MOHABBATEIN','YEH RISHTA KYA KEHLATA HAI',1),(9,'Which is your Favorite show on discovery channel?','DEADLIEST CATCH','MAN VS WILD','DUAL SURVIVAL','GOLD RUSH',1),(10,'Which is your Favorite movie of all time ?','SHIDDAT','YEH JAWAANI HAI DIWANI','TERE NAAM','CHUPKE CHUPKE',1),(11,'Which is your Favorite ice cream flavor?','CHOCOLATE','VANILLA','STRAWBERRY','BLACK CURRENT',2),(12,'Which is your Favorite food of all time?','PIZZA','NOODLES','BURGER','FRENCH FRIES',2),(13,'Which is your Favorite pizza toppings?','MUSHROOM','BLACK OLIVE','JALAPENO','SAUSAGE',2),(14,'Which is your Favorite fruit?','APPLE','BANANA','GRAPES','WATER MELON',2),(15,'Which is your Favorite vegetable?','SPANICH','BOTTLE GAURD','LADY FINGER','PUMPKIN',2),(16,'Which is your Favorite dessert?','RASGULLA','CUP CAKE','PUDDING','TARTS',2),(17,'Which is your Favorite thing to cook?','MAGGIE','SOUP','PASTA','SANDWICH',2),(18,'Which is your Favorite chocolate?','FERRERO ROCHER','KITKAT','BOURNVILLE','HERSHEY\'S',2),(19,'Which is your Favourite chinese food?','MOMOS','SPRING ROLL','MANCHURIAN','CHOWMEIN',2),(20,'Which is your Favorite drink? ','TEA','COFFEE','WATER','COLD DRINK',2),(21,'Which is your childhood Favorite board game?','CHESS','LUDO','CONNECT FOUR','CARROM',3),(22,'Which is your childhood  Favorite kids show?','POKEMON','BEN10','MR. BEAN','DORA THE EXPLORER',3),(23,'Which is your childhood  Favorite nursery rhyme?','TWINKLE TWINKLE','ALOO KACHALO','CHANDA MAMA','HUMPTY DUMPTY',3),(24,'Which is your childhood  Favorite lunchbox snack?','MAGGIE','SANDWICH','PASTA','POHA',3),(25,'Which is your childhood  Favorite game to play outside?','KABADDI','KHO-KHO','CRICKET','BADMINTON',3),(26,'Which is your childhood  Favorite school function?','ANNUAL DAY','REPUBLIC DAY','FOUNDATION DAY','CHILDREN\'S DAY',3),(27,'Which is your Favorite subject in school?','MATHS','SCIENCE','ENGLISH','SOCIAL STUDIES',3),(28,'Your Favorite childhood memory was with whom?','PARENTS','FRIENDS','TEACHERS','OTHERS',3),(29,'Your Favorite childhood memory was in which class?','CLASS 2','CLASS 3','CLASS 4','CLASS 5',3),(30,'Which is your childhood  Favorite thing about school?','CANTEEN','PLAYGROUND','FUNCTIONS','LEAVE ON SCHOOL DAYS',3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` int DEFAULT NULL,
  `participant_name` varchar(60) DEFAULT NULL,
  `test_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_test_id` (`test_id`),
  CONSTRAINT `fk_test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,8,'Shubhi',1),(2,8,'pranjul',2);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(60) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userid` (`user_id`),
  CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,'5d003624081bfe868d4a577253e6ea56',1),(2,'2f8b5901b586e9725416a3faec991862',2);
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gargi'),(2,'shubhi');
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

-- Dump completed on 2024-08-04 23:31:49
