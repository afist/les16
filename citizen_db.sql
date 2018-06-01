-- MySQL dump 10.13  Distrib 5.7.21, for osx10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: test_db
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildings` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `street_id` int(5) unsigned NOT NULL,
  `number` varchar(10) NOT NULL DEFAULT '',
  `count_flat` smallint(4) unsigned DEFAULT NULL,
  `count_floor` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_to_street` (`street_id`),
  CONSTRAINT `fk_to_street` FOREIGN KEY (`street_id`) REFERENCES `streets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` VALUES (1,1,'1/a',302,12),(2,1,'2',400,5),(3,2,'22',20,2),(4,2,'12',200,25);
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citizens`
--

DROP TABLE IF EXISTS `citizens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citizens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL DEFAULT '',
  `first_name` varchar(15) NOT NULL DEFAULT '',
  `last_name` varchar(15) NOT NULL DEFAULT '',
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizens`
--

LOCK TABLES `citizens` WRITE;
/*!40000 ALTER TABLE `citizens` DISABLE KEYS */;
INSERT INTO `citizens` VALUES (1,'rest@g.com','Петя','Ласточкин','30935485432'),(2,'dest@g.com','Анастасия','Рудко','80987565345'),(3,'fer@g.com','Вася','Рен','7646744567');
/*!40000 ALTER TABLE `citizens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citizens_flats`
--

DROP TABLE IF EXISTS `citizens_flats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citizens_flats` (
  `flat_id` int(11) unsigned NOT NULL,
  `citizen_id` int(11) unsigned NOT NULL,
  KEY `citizen_id` (`citizen_id`),
  KEY `citizens_flats_ibfk_1` (`flat_id`),
  CONSTRAINT `citizens_flats_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`),
  CONSTRAINT `citizens_flats_ibfk_2` FOREIGN KEY (`citizen_id`) REFERENCES `citizens` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizens_flats`
--

LOCK TABLES `citizens_flats` WRITE;
/*!40000 ALTER TABLE `citizens_flats` DISABLE KEYS */;
INSERT INTO `citizens_flats` VALUES (1,1),(2,1),(3,2);
/*!40000 ALTER TABLE `citizens_flats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `population` int(8) unsigned NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,'Голосеевский',228130,'Голосеевский район города Киева создан из-за изменения административного деления столицы Украины, которое было проведено в сентябре 2001 года в соответствии с решением Киевского городского совета от 31.01.2001 г., на базе Московского района столицы, который, соответственно, в 2001 году праздновал 80-летие. Голосеевский район — юго-западная часть города Киева, граничащая с Шевченковским, Соломенским, Печерским и Дарницким (по акватории Днепра) районами города, Киево-Святошинским, Обуховским и Бориспольским районами Киевской области.'),(2,'Святошинский',326421,'Район включил в себя и древние местности, названия которых легенда связывает с великокняжеским временем на Украине, и многокилометровые массивы вековых лесов, и кварталы новостроек — как промышленных, так и жилых.'),(3,'Соломенский',335563,'В 1960-70-е годы облик Соломенки кардинально изменился. Прежние усадьбы ушли в прошлое (хотя и поныне ещё можно обнаружить остатки прежней застройки), им на смену пришли 9—18-этажные дома. Центральная улица Соломенки — улица Урицкого (сейчас ул. Василия Липковского) — в результате реконструкции расширилась в несколько раз.  В 2002 году появился Соломенский район.'),(4,'Оболонский',311173,'Оболо́нский райо́н - территориальная единица столицы Украины — города Киева. Находится в северной части города на правом берегу Днепра. Как административно-территориальная единица был создан 3 марта 1975 года и назван в честь столицы соседнего государства Белоруссии — Минским. В этот момент в его состав входили Оболонь, Приорка, Куренёвка, Минский массив и Вышгородский массивы. Согласно решению Киевского городского совета от 2001 года, району присвоили название, соответствующее местности — Оболонский и присоединили к его территории Пущу-Водицу.'),(5,'Подольский',185609,'Как административная единица, создан в 1921 году на территории одной из самых древних и самых больших частей Киева — Подоле. В мае 2001 года район отметил 80-летие местного самоуправления.'),(6,'Печерский',133762,'B 1934 год, когда при переводе столицы Украины из Харькова в Киев в Липках размещают государственные органы. Одновременно было уничтожено множество памятников архитектуры. В 1930-х годах построены здания Верховного Совета, огромный дом НКВД (в данный момент — Кабинет Министров), клубы, школы, детские сады, стадион «Динамо» им. В. Лобановского, набережная Днепра.'),(7,'Шевченковский',222804,'Шевченковский район является одним из самых озелененных районов столицы — 13 парков, 79 скверов, 6 бульваров.'),(8,'Дарницкий',301752,NULL),(9,'Днепровский',342945,NULL),(10,'Деснянский',351193,NULL),(13,'Новый Район',123000,NULL),(14,'Новый Район1',123000,NULL);
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flats`
--

DROP TABLE IF EXISTS `flats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varbinary(10) NOT NULL,
  `floor` tinyint(3) NOT NULL,
  `bilding_id` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flats`
--

LOCK TABLES `flats` WRITE;
/*!40000 ALTER TABLE `flats` DISABLE KEYS */;
INSERT INTO `flats` VALUES (1,'12',3,1),(2,'145',7,3),(3,'2',1,3),(4,'23',5,2);
/*!40000 ALTER TABLE `flats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `streets`
--

DROP TABLE IF EXISTS `streets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `streets` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `type` enum('улица','проспект','площадь','переулок','бульвар') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`),
  CONSTRAINT `streets_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `streets`
--

LOCK TABLES `streets` WRITE;
/*!40000 ALTER TABLE `streets` DISABLE KEYS */;
INSERT INTO `streets` VALUES (1,1,'Науки','проспект'),(2,1,'Саперно-слобоцкая','улица'),(3,1,'Демеевская','площадь'),(4,6,'Дружбы Народов','бульвар'),(5,6,'Грушевского','улица'),(6,6,'Европейская','площадь');
/*!40000 ALTER TABLE `streets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-25 21:06:54
