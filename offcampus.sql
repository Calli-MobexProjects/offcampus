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
  `longitude` decimal(10,6) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
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
INSERT INTO `district` VALUES (1,'ASH','Adansi North',-1.630525,6.284965),(2,'ASH','Adansi South',-1.414843,6.170471),(3,'ASH','Afigya-Kwabre',-1.626065,7.057634),(4,'ASH','Ahafo Ano North',-2.253605,6.983118),(5,'ASH','Ahafo Ano South',-2.021424,6.983970),(6,'ASH','Amansie Central',-1.837585,6.308854),(7,'ASH','Amansie West',-1.897276,6.491605),(8,'ASH','Asante Akim North (New)',-0.998709,6.939105),(9,'ASH','Asante Akim South',-1.060459,6.576737),(10,'ASH','Atwima Kwanwoma',-1.642557,6.653904),(11,'ASH','Atwima Mponua',-2.201137,6.703764),(12,'ASH','Atwima Nwabiagya',0.000000,0.000000),(13,'ASH','Bosome Freho',-1.334600,6.421689),(14,'ASH','Bosomtwe',-1.578989,6.597225),(15,'ASH','Ejura Sekyedumase',-1.358992,7.384721),(16,'ASH','AKwabre East',-1.579002,6.853960),(17,'ASH','Offinso North',-1.793837,7.304920),(18,'ASH','Sekyere Afram Plains (New)',0.000000,0.000000),(19,'ASH','Sekyere Central',-1.387377,7.017951),(20,'ASH','Sekyere East',-1.178288,6.829394),(21,'ASH','Sekyere South',-1.486977,6.934715),(22,'ASH','Kumawu',-1.277061,6.911166),(23,'BA','Asunafo South',-2.503383,6.614193),(24,'BA','Asutifi',-2.424255,6.957973),(25,'BA','Asunafo South',-2.354477,6.931747),(26,'BA','Asutifi',-2.424255,6.957973),(27,'BA','Asutifi South (New)',-2.354477,6.931747),(28,'BA','Banda (New)',0.000000,0.000000),(29,'BA','Dormaa East new',-2.698796,7.307098),(30,'BA','Dormaa West (New)',-2.832908,7.165612),(31,'BA','Jaman North',-2.648520,7.907174),(32,'BA','Jaman South',-2.839043,7.692105),(33,'BA','Kintampo South',-1.710314,7.909089),(34,'BA','Nkoranza North',-1.696591,7.696591),(35,'BA','Nkoranza South',-1.696591,7.696591),(36,'BA','Pru',-1.252816,8.072540),(37,'BA','Sene',-0.441317,7.653688),(38,'BA','Sene West (New)',-0.441317,7.653688),(39,'BA','Sunyani West',-2.314176,7.364541),(40,'BA','Tain',-2.354947,8.078068),(41,'BA','Tano North',-2.179303,7.245653),(42,'BA','Tano South',-2.000397,7.156983),(43,'BA','TTechiman North (New)',-1.942674,7.630524),(44,'CR','Abura/Asebu/Kwamankese',-1.242195,5.294067),(45,'CR','Agona East',-0.792080,5.617562),(46,'CR','Ajumako/Enyan/Essiam',-0.762853,5.355620),(47,'CR','Asikuma/Odoben/Brakwa',-0.963345,5.647896),(48,'CR','Assin South',-1.279648,5.486541),(49,'CR','Awutu Senya East (New)',-0.514491,5.516399),(50,'CR','Awutu Senya ',-0.430177,5.541959),(51,'CR','Ekumfi (New)',-0.892775,5.306226),(52,'CR','Gomoa East',-0.420919,5.476251),(53,'CR','Gomoa West',-0.727796,5.439626),(54,'CR','Twifo/Heman/Lower/Denkyira',-0.566815,5.536888),(55,'CR','Twifo-Ati Mokwa',-0.566815,5.536888),(56,'CR','Upper Denkyira West',-1.709526,5.904945),(57,'ER','Afram Plains South (New)',-0.103529,7.028035),(58,'ER','Akuapim South (New)',-0.329945,5.883430),(59,'ER','Akuapim North',-0.143324,5.996275),(60,'ER','Akyemansa',-0.936967,6.027533),(61,'ER','Asuogyaman',0.047440,6.388742),(62,'ER','Atiwa',-0.625133,6.298977),(63,'ER','Ayensuano (New) ',0.000000,0.000000),(64,'ER','Birim North',-1.058861,6.171471),(65,'ER','Birim South',-1.012536,5.895558),(66,'ER','Fanteakwa',-0.330156,6.444721),(67,'ER','Kwaebibirem',-0.820309,6.149779),(68,'ER','Kwahu East',-0.658436,6.697569),(69,'ER','Kwahu North',-0.658436,6.697569),(70,'ER','Kwahu South',-0.658436,6.697569),(71,'ER','Suhum',-0.453152,6.044334),(72,'ER','Upper Manya Krobo',-0.106966,6.373779),(73,'ER','Denkyembour (New)',0.000000,0.000000),(74,'ER','Upper West Akim (New)',-0.559519,6.181964),(75,'GR','Ada West (New)',-116.217284,43.463877),(76,'GR','Danme East',0.502016,5.838173),(77,'GR','Dangme West',0.188109,5.926217),(78,'GR','Kpone katamanso (New',0.081648,5.730227),(79,'GR','Ningo Prampram',0.105589,5.710823),(80,'NR','Bole',-2.483796,9.033888),(81,'NR',' Bunkprugu-Yunyoo',-0.919829,10.516346),(82,'NR','Central Gonja',-1.034368,9.054945),(83,'NR','Chereponi',0.293138,10.139822),(84,'NR','East Gonja',-0.675246,8.652505),(85,'NR','East Mamprusi',-0.409741,10.407558),(86,'NR','Gushegu',-0.217201,9.921858),(87,'NR','Karaga',-0.433298,9.928467),(88,'NR','Kpandai',-0.011428,8.471027),(89,'NR','Kumbungu (New)',-1.010357,9.704721),(90,'NR','Mamprugu Moadu',0.000000,0.000000),(100,'NR','Mion (New)',0.000000,0.000000),(101,'NR','Nanumba North',-0.061984,8.967130),(102,'NR','Nanumba South',0.116405,8.833457),(103,'NR','North Gonja (New) ',0.000000,0.000000),(104,'NR','Saboba',0.313742,9.708325),(105,'NR','Sagnarigu (New)',-0.866555,9.413654),(106,'NR','Savelugu/Nanton',-0.814648,9.853979),(107,'NR','Sawla-Tuna-Kalba',-2.362453,9.456659),(108,'NR','Tatale Sangule (New)',0.521850,9.352138),(109,'NR','Tolon',-1.004199,9.719695),(110,'NR','West Gonja',-1.668521,9.435630),(111,'NR','West Mamprusi',-0.986529,10.402323),(112,'NR','Zabzugu/Tatale',0.370921,9.297394),(113,'UE','Bawku West',-0.487477,10.773558),(114,'UE',' Binduri (New)',-0.301619,10.965873),(115,'UE','Bongo',-0.807832,10.909612),(116,'UE','Builsa',-1.287142,10.562265),(117,'UE','Builsa South',-1.287142,10.562265),(118,'UE','Garu-Tempane',-0.185077,10.773883),(119,'UE','Kassena Nankana West',-1.101657,10.969444),(120,'UE','Kassena Nankana East',-1.320438,10.869750),(121,'UE','Nabdam (New)',0.000000,0.000000),(122,'UE','Pusiga (New)',-0.156505,11.080350),(123,'UE','Talensi-Nabdam',-0.702753,10.684023),(124,'UW','Daffiama Bussie Issa (new))',-2.554425,10.412885),(125,'UW','Jirapa',-2.702693,10.524292),(126,'UW','Lambussie Karni (New)',-2.561752,10.707190),(127,'UW','Lawra',-2.870501,10.685058),(128,'UW','Nadowli',-2.355233,10.379425),(129,'UW','Nandom (New)',-2.760205,10.853153),(130,'UW','Sissala East',-1.726094,10.753652),(131,'UW','Sissala West',-2.043076,10.576557),(132,'UW','Wa East',-1.882527,10.033305),(133,'UW','Wa West',-2.647148,9.956186),(134,'VR','Adaklu (New)',0.490393,6.488151),(135,'VR','Akatsi South',0.815609,6.165375),(136,'VR','Afadjato',-0.239699,5.565352),(137,'VR','Agortime Ziope',0.695229,6.550049),(138,'VR','Akatsi North',0.798878,6.128851),(139,'VR','Biakoye',0.000000,0.000000),(140,'VR','Jasikan',0.460744,7.409997),(141,'VR','Kadjebi',0.473968,7.530684),(142,'VR','Ketu North',1.031832,6.245713),(143,'VR','Krachi East',0.230298,7.755949),(144,'VR','Krachi Nchumuru ',0.000000,0.000000),(145,'VR','Krachi West',-0.057513,7.794220),(146,'VR','Nkwanta South',0.508601,8.258688),(147,'VR','Nkwanta North',0.522903,8.262844),(148,'VR','North Tongu (New)',0.377923,6.184664),(149,'VR','South Dayi',0.195418,6.646730),(150,'VR','South Tongu',0.659228,6.066076),(151,'WR','Ahanta West',-2.012567,4.898495),(152,'WR','Aowin/Suaman ',-2.847762,5.852170),(153,'WR','Bia',-3.012254,6.674996),(154,'WR','Bia East (New)',-3.012254,6.674996),(155,'WR','Bibiani/Ahwiaso/Bekwai',-2.248116,6.291272),(157,'WR','Bodi (New)',-2.755362,6.222716),(158,'WR','Ellembele',0.000000,0.000000),(159,'WR','Jomoro',-2.652808,5.207203),(160,'WR','Juaboso',0.000000,0.000000),(161,'WR','Mpohor (New)',-1.893911,4.972305),(162,'WR','Mpohor/Wassa East',-1.894492,4.972529),(163,'WR','Prestea-Huni Valley',-2.061202,5.494626),(164,'WR','Sefwi Akontobra',-2.866534,6.046422),(165,'WR','Sefwi-Wiawso ',-2.533771,6.193892),(166,'WR','Shama new',-1.653721,5.057358),(167,'WR','Suaman (New)',0.000000,0.000000),(168,'WR','Wassa Amenfi East',-1.894875,5.826168),(169,'WR','Wassa Amenfi West',-2.360087,5.688063),(170,'WR','Wassa Amenfi Central (New)',-2.054739,5.841271);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer`
--

LOCK TABLES `lecturer` WRITE;
/*!40000 ALTER TABLE `lecturer` DISABLE KEYS */;
INSERT INTO `lecturer` VALUES (31,'Acheampong','Lord','Ashanti','Ahafoano','Afaf',543456897,'offeilord@gmail.com','images/boys.jpg'),(41,'Sameen','Shaw','Greater Accra','Kasoa','Kaso',909090909,'sameen.shaw@imdb.co.uk','images/boys.jpg'),(44,'Bentil','Richmond','Greater Accra','Kasoa','Kaso',903940392,'joe.bentil@gmail.com','images/boys.jpg'),(46,'Nathaniel ','Buabeng','Upper West Region','Jongo','Jong',938495843,'example@.com','images/boys.jpg'),(50,'Natalie','Portman','Upper East Region','Kololo','Kolo',298398493,'example@.com','images/boys.jpg'),(52,'Margot','Robbie','Western  Region','Jodo','Jodo',290394838,'robbiemargot@imdb.co.uk','images/boys.jpg'),(53,'Ryan','Reynolds','Ashanti Region','Kumasi','Kuma',390495847,'ryan.reynolds@imdb.com','images/boys.jpg'),(54,'Blake','Lively','Northern Region','Pru','Pru',293094839,'lively.blake@imdb.com','images/boys.jpg'),(55,'Katherine','Disher','Ashanti Region','Adansi North','Adan',209099009,'example@.com','images/boys.jpg'),(56,'Felicity','Jones','Greater Accra','Adansi North','Adan',902930392,'example@.com','images/boys.jpg');
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
INSERT INTO `privileges` VALUES ('gaza@1234',0,0,0,0,0),('junior@1234',0,0,0,0,1),('liliWhite',0,0,0,0,1),('mark@9090',0,0,0,0,0),('marvin9090',0,0,0,0,1),('moone@1234',0,0,0,0,1),('trupy@8989',0,0,0,0,1),('user@1234',0,0,0,0,1);
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
INSERT INTO `register` VALUES ('214cs01001248','Acheampong','Lord','','Bed In Accounting','N/A','images/boys.jpg','63a9f0ea7bb98050796b649e85481845','0200756783','offeilord@gmail.com','student','2017-06-28 06:05:22','2017-05-30 05:08:12'),('214cs01001353','Henry','Miller','','Education of the spirit','N/A','images/boys.jpg','63a9f0ea7bb98050796b649e85481845','0209099009','henryiller@gmail.com','student','2017-06-27 20:05:08','2017-05-30 05:08:12'),('214cs01001865','Owusu','Nathaniel','B','Bed In Accounting','N/A','images/boys.jpg','e90a3e20701ffd5398dd77adc5678973','0200459869','natty@gmail.com','student','2017-06-28 17:15:01','2017-05-30 05:08:12'),('admin','Admin','','','','','','63a9f0ea7bb98050796b649e85481845','','henryiller@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 08:29:16'),('mark@9090','Mark','Franklin','','unknown','unknown','unknown','ffed94079bd1647b137494e63cfa4904','unknown','mark.franklin@live.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12'),('marvin9090','Marvin','Tisdale','','unknown','unknown','unknown','2e3b623e1a07a6150a744a7b74c18e69','unknown','tisdale.marvin@imdb.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12'),('trupy@8989','Trudy','Plat','','unknown','unknown','unknown','4c9cc02bd81bf4876ff871d85fad4d10','unknown','trudy.plat89@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12'),('user@1234','Kay','Lord','','unknown','unknown','unknown','ffed94079bd1647b137494e63cfa4904','unknown','offeilord@gmail.com','Admin','2017-05-30 05:08:12','2017-05-30 05:08:12');
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
  `longitude` decimal(10,6) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `date_Created` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Stud_id` (`Stud_id`),
  CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`Stud_id`) REFERENCES `register` (`Stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_details`
--

LOCK TABLES `student_details` WRITE;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
INSERT INTO `student_details` VALUES (8,'214cs01001248','Kotie R/C Primary School','Physics','Headmistress','Central Region','Agona East','2017-08-02','2017-08-18',2,-0.792080,5.617562,'2017-06-28 06:14:44'),(9,'214cs01001353','Mankranso M/A Primary','Integrated Science','Headmistress','Eastern Region','Asuogyaman','2017-06-28','2017-06-30',2,0.047440,6.388742,'2017-06-28 06:17:28');
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

-- Dump completed on 2017-07-03 14:19:21
