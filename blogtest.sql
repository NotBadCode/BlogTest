-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: blogtest
-- ------------------------------------------------------
-- Server version	5.5.44-0+deb7u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `textcomment` text NOT NULL,
  `timecomment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (17,'newu',3,'sdfsdfsd','2015-08-17 12:52:53'),(18,'newu',3,'sdfsdfsd','2015-08-17 12:53:26'),(19,'newu',3,'sdfsdfsd','2015-08-17 12:54:06'),(20,'newufds',3,'sdfs','2015-08-17 12:54:10'),(21,'newu',3,'sdfsdf','2015-08-17 12:54:13'),(22,'newu',3,'sdfs','2015-08-17 12:54:17'),(23,'newu',3,'sdfs','2015-08-17 12:55:23'),(24,'newu',5,'12','2015-08-17 12:55:31'),(25,'noname',1,'sdf','2015-08-17 12:55:40'),(26,'noname',1,'dfsdf','2015-08-17 12:56:41'),(27,'noname',1,'sd','2015-08-17 12:56:46'),(28,'noname',1,'sd','2015-08-17 12:57:11');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Posts`
--

DROP TABLE IF EXISTS `Posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_id` int(11) NOT NULL,
  `textpost` text NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_usr` (`usr_id`),
  CONSTRAINT `fk_ps_usr` FOREIGN KEY (`usr_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Posts`
--

LOCK TABLES `Posts` WRITE;
/*!40000 ALTER TABLE `Posts` DISABLE KEYS */;
INSERT INTO `Posts` VALUES (1,11,'Ð¢ÐµÐºÑÑ‚','ÐÐ¾Ð²Ñ‹Ð¹'),(2,11,'ÐÐ¾Ð²Ñ‹Ð¹','ÐžÑ‡ÐµÐ½ÑŒ'),(3,14,'Ñ‚ÐµÑÑ‚','Ñ‚ÐµÑÑ‚'),(4,14,'werjhefhsjfhkjwefkjwehfjkewfjk','Test'),(5,14,'sdfsdf','dfsdf');
/*!40000 ALTER TABLE `Posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (8,'admin','admin','0',''),(9,'superadmin','superadmin@mail.com','z6mjdb2l7460a95coeb0c93gmd3y9iyt',''),(10,'bigadmin','bigadmin@mail.com','awck2tb7kw6rwio4x54nr9qg5o8umah6',''),(11,'User','user@user.com','4t2f545aryd5hff0gqic3zu567j74dkb','c029bd14480e2debf5aa16c2d7c77123'),(12,'userrr','nmnn@mail.ru','nvbwg5a6mkklhl6q9pocado1spxzrhw5','897c8fde25c5cc5270cda61425eed3c8'),(13,'users','38093@6630433mail.vb','2q7iaggfjk3uo5cmggh12wp9mzu388qr','897c8fde25c5cc5270cda61425eed3c8'),(14,'newu','q@m.ma.ru','ykbd7mdhap9grxckuv1hpz7hlc3bng5t','897c8fde25c5cc5270cda61425eed3c8');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-17 16:44:43
