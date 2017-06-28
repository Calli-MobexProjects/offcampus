-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: offcampus
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `archives`
--

DROP TABLE IF EXISTS `archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archives` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `lect_Name` varchar(20) NOT NULL,
  `created_Date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archives`
--

LOCK TABLES `archives` WRITE;
/*!40000 ALTER TABLE `archives` DISABLE KEYS */;
/*!40000 ALTER TABLE `archives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'EDU233','Education of the spirit'),(2,'EDU253','Education of the soul'),(3,'ACCT1220','Bed In Accounting'),(4,'MGMT520','Bed In Management Studies');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `reg_Abbrv` varchar(4) NOT NULL,
  `district_name` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_Abbrv` (`reg_Abbrv`),
  CONSTRAINT `district_ibfk_1` FOREIGN KEY (`reg_Abbrv`) REFERENCES `region` (`reg_Abbrv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'ASH','Adansi North'),(2,'ASH','Adansi South'),(3,'ASH','Afigya-Kwabre'),(4,'ASH','Ahafo Ano North'),(5,'ASH','Ahafo Ano South'),(6,'ASH','Amansie Central'),(7,'ASH','Amansie West'),(8,'ASH','Asante Akim North (New)'),(9,'ASH','Asante Akim South'),(10,'ASH','Atwima Kwanwoma'),(11,'ASH','Atwima Mponua'),(12,'ASH','Atwima Nwabiagya'),(13,'ASH','Bosome Freho'),(14,'ASH','Bosomtwe'),(15,'ASH','Ejura Sekyedumase'),(16,'ASH','AKwabre East'),(17,'ASH','Offinso North'),(18,'ASH','Sekyere Afram Plains (New)'),(19,'ASH','Sekyere Central'),(20,'ASH','Sekyere East'),(21,'ASH','Sekyere South'),(22,'ASH','Kumawu'),(23,'BA','Asunafo South'),(24,'BA','Asutifi'),(25,'BA','Asunafo South'),(26,'BA','Asutifi'),(27,'BA','Asutifi South (New)'),(28,'BA','Banda (New)'),(29,'BA','Dormaa East new'),(30,'BA','Dormaa West (New)'),(31,'BA','Jaman North'),(32,'BA','Jaman South'),(33,'BA','Kintampo South'),(34,'BA','Nkoranza North'),(35,'BA','Nkoranza South'),(36,'BA','Pru'),(37,'BA','Sene'),(38,'BA','Sene West (New)'),(39,'BA','Sunyani West'),(40,'BA','Tain'),(41,'BA','Tano North'),(42,'BA','Tano South'),(43,'BA','TTechiman North (New)'),(44,'CR','Abura/Asebu/Kwamankese'),(45,'CR','Agona East'),(46,'CR','Ajumako/Enyan/Essiam'),(47,'CR','Asikuma/Odoben/Brakwa'),(48,'CR','Assin South'),(49,'CR','Awutu Senya East (New)'),(50,'CR','Awutu Senya '),(51,'CR','Ekumfi (New)'),(52,'CR','Gomoa East'),(53,'CR','Gomoa West'),(54,'CR','Twifo/Heman/Lower/Denkyira'),(55,'CR','Twifo-Ati Mokwa'),(56,'CR','Upper Denkyira West'),(57,'ER','Afram Plains South (New)'),(58,'ER','Akuapim South (New)'),(59,'ER','Akuapim North'),(60,'ER','Akyemansa'),(61,'ER','Asuogyaman'),(62,'ER','Atiwa'),(63,'ER','Ayensuano (New) '),(64,'ER','Birim North'),(65,'ER','Birim South'),(66,'ER','Fanteakwa'),(67,'ER','Kwaebibirem'),(68,'ER','Kwahu East'),(69,'ER','Kwahu North'),(70,'ER','Kwahu South'),(71,'ER','Suhum'),(72,'ER','Upper Manya Krobo'),(73,'ER','Denkyembour (New)'),(74,'ER','Upper West Akim (New)'),(75,'GR','Ada West (New)'),(76,'GR','Danme East'),(77,'GR','Dangme West'),(78,'GR','Kpone katamanso (New'),(79,'GR','Ningo Prampram'),(80,'NR','Bole'),(81,'NR',' Bunkprugu-Yunyoo'),(82,'NR','Central Gonja'),(83,'NR','Chereponi'),(84,'NR','East Gonja'),(85,'NR','East Mamprusi'),(86,'NR','Gushegu'),(87,'NR','Karaga'),(88,'NR','Kpandai'),(89,'NR','Kumbungu (New)'),(90,'NR','Mamprugu Moadu'),(100,'NR','Mion (New)'),(101,'NR','Nanumba North'),(102,'NR','Nanumba South'),(103,'NR','North Gonja (New) '),(104,'NR','Saboba'),(105,'NR','Sagnarigu (New)'),(106,'NR','Savelugu/Nanton'),(107,'NR','Sawla-Tuna-Kalba'),(108,'NR','Tatale Sangule (New)'),(109,'NR','Tolon'),(110,'NR','West Gonja'),(111,'NR','West Mamprusi'),(112,'NR','Zabzugu/Tatale'),(113,'UE','Bawku West'),(114,'UE',' Binduri (New)'),(115,'UE','Bongo'),(116,'UE','Builsa'),(117,'UE','Builsa South'),(118,'UE','Garu-Tempane'),(119,'UE','Kassena Nankana West'),(120,'UE','Kassena Nankana East'),(121,'UE','Nabdam (New)'),(122,'UE','Pusiga (New)'),(123,'UE','Talensi-Nabdam'),(124,'UW','Daffiama Bussie Issa (new))'),(125,'UW','Jirapa'),(126,'UW','Lambussie Karni (New)'),(127,'UW','Lawra'),(128,'UW','Nadowli'),(129,'UW','Nandom (New)'),(130,'UW','Sissala East'),(131,'UW','Sissala West'),(132,'UW','Wa East'),(133,'UW','Wa West'),(134,'VR','Adaklu (New)'),(135,'VR','Akatsi South'),(136,'VR','Afadjato'),(137,'VR','Agortime Ziope'),(138,'VR','Akatsi North'),(139,'VR','Biakoye'),(140,'VR','asikan'),(141,'VR','Kadjebi'),(142,'VR','Ketu North'),(143,'VR','Krachi East'),(144,'VR','Krachi Nchumuru '),(145,'VR','Krachi West'),(146,'VR','Nkwanta South'),(147,'VR','Nkwanta North'),(148,'VR','North Tongu (New)'),(149,'VR','South Dayi'),(150,'VR','South Tongu'),(151,'WR','Ahanta West'),(152,'WR','Aowin/Suaman '),(153,'WR','Bia'),(154,'WR','Bia East (New)'),(155,'WR','Bibiani/Ahwiaso/Bekwai'),(157,'WR','Bodi (New)'),(158,'WR','Ellembele'),(159,'WR','Jomoro'),(160,'WR','Juaboso'),(161,'WR','Mpohor (New)'),(162,'WR','Mpohor/Wassa East'),(163,'WR','Prestea-Huni Valley'),(164,'WR','Sefwi Akontobra'),(165,'WR','Sefwi-Wiawso '),(166,'WR','Shama new'),(167,'WR','Suaman (New)'),(168,'WR','Wassa Amenfi East'),(169,'WR','Wassa Amenfi West'),(170,'WR','Wassa Amenfi Central (New)');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(300) NOT NULL,
  `color` varchar(8) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (4,'PTA Meeting','2017-06-15','2017-06-16','12:00:00','16:00:00','There will be an item 13 at the PTA meeting','#898984','2017-06-15 20:15:39'),(5,'Conference','2017-06-16','2017-06-23','12:00:00','19:00:00','There is going to be a conference at the Bronx conference hall','#898984','2017-06-15 20:18:51'),(6,'Gskdjf','2017-06-15','2017-06-16','12:00:00','12:35:00','asdfkajkf','#898984','2017-06-15 20:45:36'),(7,'mobex','2017-06-22','2017-06-29','14:00:00','16:00:00','expo','#898984','2017-06-16 20:34:12'),(8,'gjkgjl','2017-08-03','2017-08-04','11:55:00','12:20:00','khhlkhlkh','#898984','2017-06-18 08:28:35');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecturer` (
  `lect_ID` int(30) NOT NULL AUTO_INCREMENT,
  `lect_firstname` varchar(15) NOT NULL,
  `lect_lastname` varchar(15) NOT NULL,
  `region` varchar(30) NOT NULL,
  `lect_district` varchar(30) NOT NULL,
  `lect_indicator` varchar(20) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lect_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lect_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer`
--

LOCK TABLES `lecturer` WRITE;
/*!40000 ALTER TABLE `lecturer` DISABLE KEYS */;
INSERT INTO `lecturer` VALUES (31,'Acheampong','Lord','Ashanti','Ahafoano South','Afaf',543456897,'offeilord@gmail.com','images/boys.jpg'),(41,'Sameen','Shaw','Greater Accra','Kasoa','Kaso',909090909,'sameen.shaw@imdb.co.uk','images/boys.jpg'),(44,'Bentil','Richmond','Greater Accra','Kasoa','Kaso',903940392,'joe.bentil@gmail.com','images/boys.jpg'),(46,'Nathaniel ','Buabeng','Upper West Region','Jongo','Jong',938495843,'example@.com','images/boys.jpg'),(48,'Tatiana','Maslany','Upper East Region','Jachie North','Jach',290938748,'example@.com','images/boys.jpg'),(49,'Timothy','Olyphant','Northern Region','Nandom','Nand',209384985,'example@.com','images/boys.jpg'),(50,'Natalie','Portman','Upper East Region','Kololo','Kolo',298398493,'example@.com','images/boys.jpg'),(52,'Margot','Robbie','Western  Region','Jodo','Jodo',290394838,'robbiemargot@imdb.co.uk','images/boys.jpg'),(53,'Ryan','Reynolds','Ashanti Region','Kumasi','Kuma',390495847,'ryan.reynolds@imdb.com','images/boys.jpg'),(54,'Blake','Lively','Northern Region','Pru','Pru',293094839,'lively.blake@imdb.com','images/boys.jpg');
/*!40000 ALTER TABLE `lecturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lord`
--

DROP TABLE IF EXISTS `lord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newpass` varchar(20) NOT NULL,
  `reppass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lord`
--

LOCK TABLES `lord` WRITE;
/*!40000 ALTER TABLE `lord` DISABLE KEYS */;
INSERT INTO `lord` VALUES (9,'banks','banks'),(10,'skdj','skdj'),(11,'0','mamamia'),(12,'ksjf','ksj'),(13,'ksjf','ksj'),(14,'sdk','sjkfjldsk'),(15,'PTA','Hmmmm');
/*!40000 ALTER TABLE `lord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipal`
--

DROP TABLE IF EXISTS `municipal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipal` (
  `ID` int(11) NOT NULL,
  `reg_Abbrv` varchar(4) NOT NULL,
  `municipal_name` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `reg_Abbrv` (`reg_Abbrv`),
  CONSTRAINT `municipal_ibfk_1` FOREIGN KEY (`reg_Abbrv`) REFERENCES `region` (`reg_Abbrv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipal`
--

LOCK TABLES `municipal` WRITE;
/*!40000 ALTER TABLE `municipal` DISABLE KEYS */;
INSERT INTO `municipal` VALUES (0,'ASH','Asante Akim Central'),(1,'ASH','Asokore Mampong  (New)'),(3,'ASH','Bekwai'),(4,'ASH','Ejisu Juaben'),(5,'ASH','Mampong '),(6,'ASH','Obuasi '),(7,'ASH','Offinso South'),(8,'BA','Asunafo North'),(9,'BA','Atebubu Amantin'),(10,'BA','Berekum '),(11,'BA','Dormaa '),(12,'BA','Kintampo North'),(13,'BA','Sunyani'),(14,'BA','Techiman'),(15,'BA','Wenchi '),(16,'CR','Agona West'),(17,'CR','Assin North '),(18,'CR','Effutu '),(19,'CR','Komenda/Edina/Eguafo/Abire'),(20,'CR','Mfantseman'),(21,'CR','Upper Denkyira East'),(22,'ER','Birim Central '),(23,'ER','East Akim '),(24,'ER','Kwahu West  '),(25,'ER','Lower Manya Krobo'),(26,'ER','New Juaben '),(27,'ER','Nsawam'),(28,'ER','West Akim '),(29,'ER','Yilo Krobo '),(30,'GR','Adenta '),(31,'GR','Ashaiman'),(32,'GR','Ga East '),(33,'GR','Ga West'),(34,'GR','Ga Central (New)'),(35,'GR','Ga South'),(36,'GR','La Dade-Kotopon'),(37,'GR','LA-Nkwantanang-Madina '),(38,'GR','Ledzokuku-Krowor '),(39,'NR','Yendi'),(40,'UE','Bawku'),(41,'UE','Bolgatanga'),(42,'UW','Wa'),(43,'VR','Ho '),(44,'VR','Hohoe '),(45,'VR','Keta'),(46,'VR','Ketu South'),(47,'VR','Kpando'),(48,'WR','Nzema East '),(49,'WR','Tarkwa Nsuaem');
/*!40000 ALTER TABLE `municipal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `id` varchar(15) NOT NULL,
  `add_admin` int(11) NOT NULL,
  `add_lecturer` int(11) NOT NULL,
  `delete_admin` int(11) NOT NULL,
  `delete_lecturer` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES ('gaza@1234',0,0,0,0,1),('junior@1234',0,0,0,0,0),('moone@1234',0,0,0,0,0),('user@1234',0,0,0,0,1);
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `reg_Abbrv` varchar(3) NOT NULL,
  `fullname` char(30) NOT NULL,
  `created_Date` datetime(6) NOT NULL,
  PRIMARY KEY (`reg_Abbrv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES ('ASH','Ashanti Region','2017-05-23 00:00:00.000000'),('BA','Brong-Ahafo Region','2017-05-23 00:00:00.000000'),('CR','Central Region','2017-05-23 00:00:00.000000'),('ER','Eastern Region','2017-05-23 00:00:00.000000'),('GR','Greater Accra','2017-05-23 00:00:00.000000'),('NR','Northern Region','2017-05-23 00:00:00.000000'),('UE','Upper East Region','2017-05-23 00:00:00.000000'),('UW','Upper West Region','2017-05-23 00:00:00.000000'),('VR','Volta Region','2017-05-23 00:00:00.000000'),('WR','Western  Region','2017-05-23 00:00:00.000000');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `Stud_id` varchar(15) NOT NULL,
  `f_Name` char(50) NOT NULL,
  `l_Name` char(50) NOT NULL,
  `other_Name` char(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `department` char(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Profile` varchar(20) NOT NULL,
  `date_Created` datetime NOT NULL,
  `login_time` datetime NOT NULL,
  PRIMARY KEY (`Stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES ('214cs01001353','Henry','Miller','','Education of the spirit','N/A','images/boys.jpg','63a9f0ea7bb98050796b649e85481845','0209099009','henryiller@gmail.com','student','2017-06-27 20:05:08','2017-05-30 05:08:12'),('admin','Admin','','','','','','63a9f0ea7bb98050796b649e85481845','','henryiller@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 08:29:16'),('gaza@1234','Trudy','Platt','','unknown','unknown','unknown','ffed94079bd1647b137494e63cfa4904','unknown','trupy@imdb.co.uk','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12'),('junior@1234','Acheampong','Felix','','unknown','unknown','unknown','ffed94079bd1647b137494e63cfa4904','unknown','felix@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12'),('moone@1234','Moone','Fish','','unknown','unknown','unknown','ffed94079bd1647b137494e63cfa4904','unknown','moone@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12'),('user@1234','Kay','Lord','','unknown','unknown','unknown','ffed94079bd1647b137494e63cfa4904','unknown','offeilord@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Stud_id` varchar(15) NOT NULL,
  `sch_Name` varchar(60) NOT NULL,
  `sch_prog` varchar(30) NOT NULL,
  `directed_To` varchar(15) NOT NULL,
  `region` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL,
  `start_Date` date NOT NULL,
  `end_Date` date NOT NULL,
  `action` int(15) NOT NULL,
  `date_Created` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Stud_id` (`Stud_id`),
  CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`Stud_id`) REFERENCES `register` (`Stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_details`
--

LOCK TABLES `student_details` WRITE;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
INSERT INTO `student_details` VALUES (7,'214cs01001353','Mankranso M/A Primary','English Language','Headmistress','Ashanti Region','Atwima Mponua','2017-06-27','2017-06-30',2,'2017-06-27 20:06:13');
/*!40000 ALTER TABLE `student_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_ID` int(30) NOT NULL AUTO_INCREMENT,
  `user_Name` varchar(50) NOT NULL,
  `time_Login` time(6) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2017-06-28  5:59:19
