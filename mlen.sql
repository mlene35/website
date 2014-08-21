-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mlen
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1-log

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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL,
  `identifier` varchar(45) DEFAULT NULL,
  `theme` varchar(255) DEFAULT 'classic',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ident_UNIQUE` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,'auto','classic'),(2,'comic','classic'),(3,'flyer','classic'),(4,'weitere','classic'),(5,'tier','classic');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_image`
--

DROP TABLE IF EXISTS `gallery_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `src` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_image_TO_gallyer_idx` (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_image`
--

LOCK TABLES `gallery_image` WRITE;
/*!40000 ALTER TABLE `gallery_image` DISABLE KEYS */;
INSERT INTO `gallery_image` VALUES (3,1,'voooo','cool','/media/images/auto/auss-2.jpg'),(4,1,'Das Auto - Auschnitt 3','Auto konnte nicht geladen werden!','/media/images/auto/auss-3.jpg'),(5,2,'uiuiui','miep','./../media/images/uploads/IMAG2254.jpg'),(6,2,'PHP YAY','PHP YAY','/media/images/uploads/Baby-auf-Wiese.jpg'),(8,3,'Fete de la musique - Illustration','Flyer konnte nicht geladen werden!','/media/images/flyer/21k.jpg'),(9,3,'Party','Flyer konnte nicht geladen werden!','/media/images/flyer/24g.jpg'),(10,3,'Party - Illustration','Flyer konnte nicht geladen werden!','/media/images/flyer/24k.jpg'),(11,3,'La Reunion','Flyer konnte nicht geladen werden!','/media/images/flyer/buntgr.jpg'),(12,3,'La Reunion - Illustration','Flyer konnte nicht geladen werden!','/media/images/flyer/buntkl.jpg'),(13,4,'','','/media/images/weitere/rdf-cover-kl.jpg'),(14,4,'Album Cover, Illustration, ganz','Das Bild konnte nicht geladen werden','/media/images/weitere/randlos-holzauge-dunkel-ausschnitt.jpg'),(15,4,'2 Frauen','Das Bild konnte nicht geladen werden','/media/images/weitere/zweifrauen-ganz.jpg'),(16,4,'Küken','Das Küken konnte nicht geladen werden','/media/images/weitere/vogel1-kl.jpg'),(18,5,'Ente - Auschnitt','Ente konnte nicht geladen werden','/media/images/ente-nah.jpg'),(19,5,'Fuchs','Fuchs konnte nicht geladen werden','/media/images/fuchs.jpg'),(20,5,'Fuchs - Auschnitt','Fuchs konnte nicht geladen werden','/media/images/fuchs-nah.jpg'),(21,5,'Fisch','Fisch konnte nicht geladen werden','/media/images/fisch.jpg'),(22,5,'Fisch - Auschnitt','Fisch konnte nicht geladen werden','/media/images/fisch-nah.jpg'),(23,5,'hgf',NULL,'/media/images/uploads/website.jpg'),(24,4,'titelseite',NULL,'/media/images/uploads/website.jpg'),(25,5,'Funktioniert',NULL,'/media/images/uploads/website.jpg'),(27,3,'ghuiop','ghuiop','/media/images/uploads/website.jpg'),(28,5,'Marlenes Illustration',NULL,'/media/images/uploads/website.jpg'),(29,5,'windrad',NULL,'/media/images/uploads/windrad-step-5.jpg'),(30,5,'dddddd','dddddd','/media/images/uploads/14_04_babygirls_de-1397576681.jpg'),(31,5,'fgfdgh',NULL,'/media/images/uploads/windrad.jpg'),(35,4,'kjhg','bnlkjhnkjl','./../media/images/uploads/IMAG2254.jpg'),(36,5,'hu','zu','./../media/images/uploads/IMAG2254.jpg'),(37,1,'Bild','bildddd','/media/images/uploads/IMAG2254.jpg'),(38,1,'Bild','bildddd','./../media/images/uploads/IMAG2254.jpg'),(41,5,'miep','miepmiep','./../media/images/uploads/IMAG2254.jpg');
/*!40000 ALTER TABLE `gallery_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'marlene','098f6bcd4621d373cade4e832627b4f6',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-21 16:16:45
