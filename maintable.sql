-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: avd2225
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

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
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `PersonID` mediumint(10) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `NickName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PersonID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'smith','John','Johnny'),(2,'Joy','Smith','Joyous'),(3,'Jane','Doe',NULL),(4,'Parker','Bob','Bobby'),(5,'Namath','Joe','Broadway Joe'),(6,'Namath','Joe','Broadway Joe'),(7,'Namath','Joe','Broadway Joe'),(8,'Namath','Joe','Broadway Joe'),(9,'Namath','Joe','Broadway Joe'),(10,'Namath','Joe','Broadway Joe'),(11,'Namath','Joe','Broadway Joe'),(12,'Namath','Joe','Broadway Joe'),(13,'Namath','Joe','Broadway Joe'),(14,'Namath','Joe','Broadway Joe'),(15,'Namath','Joe','Broadway Joe'),(16,'Namath','Joe','Broadway Joe'),(17,'Namath','Joe','Broadway Joe'),(18,'Namath','Joe','Broadway Joe'),(19,'Namath','Joe','Broadway Joe'),(20,'Namath','Joe','Broadway Joe'),(21,'Namath','Joe','Broadway Joe'),(22,'Namath','Joe','Broadway Joe'),(23,'Namath','Joe','Broadway Joe'),(24,'Namath','Joe','Broadway Joe'),(25,'Namath','Joe','Broadway Joe'),(26,'Namath','Joe','Broadway Joe'),(27,'Namath','Joe','Broadway Joe'),(28,'Namath','Joe','Broadway Joe'),(29,'Namath','Joe','Broadway Joe'),(30,'Namath','Joe','Broadway Joe'),(31,'Namath','Joe','Broadway Joe');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `server_league`
--

DROP TABLE IF EXISTS `server_league`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_league` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_league`
--

LOCK TABLES `server_league` WRITE;
/*!40000 ALTER TABLE `server_league` DISABLE KEYS */;
INSERT INTO `server_league` VALUES (1,'Soccer NY League');
/*!40000 ALTER TABLE `server_league` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_player`
--

DROP TABLE IF EXISTS `server_player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `jerseynumber` varchar(45) NOT NULL,
  `team` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teamFK_idx` (`team`),
  KEY `playPosFK_idx` (`id`),
  CONSTRAINT `teamFK` FOREIGN KEY (`team`) REFERENCES `server_team` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_player`
--

LOCK TABLES `server_player` WRITE;
/*!40000 ALTER TABLE `server_player` DISABLE KEYS */;
INSERT INTO `server_player` VALUES (1,'Tony','Cap','1997-11-12','11',1),(2,'Bob','Parker','1998-09-22','12',1),(3,'Jim','Pappy','1994-04-10','10',1),(4,'Jake','Pep','1999-06-05','4',1),(5,'Tomeo','Rev','1998-07-10','9',1),(6,'Kyle','lyle','1997-01-20','17',1),(7,'Jam','Tono','1997-10-12','19',1),(8,'Africa','Toto','1997-12-12','29',1),(9,'Impala','Hans','1997-03-20','30',1),(10,'Bibi','Khalm','1998-10-12','49',1),(11,'Nguyen','Sony','1996-10-13','47',2),(12,'Jesus','Christ','1998-06-13','10',2),(13,'Wilkes','Lincoln','1996-10-17','20',2),(14,'George','Jefferson','1995-04-04','3',2),(15,'Bobby','Hill','1995-08-13','7',2),(16,'Bart','Simpsons','1996-06-20','13',2),(17,'Kun','King','1999-09-28','30',2),(18,'Locked','Loaded','1996-10-13','2',2),(19,'Shin','Suh','1996-10-11','1',2),(20,'Destiny','Final','1996-10-03','5',2);
/*!40000 ALTER TABLE `server_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_playerpos`
--

DROP TABLE IF EXISTS `server_playerpos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_playerpos` (
  `player` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`player`,`position`),
  KEY `ppPlayerFK_idx` (`player`),
  KEY `posFK_idx` (`position`),
  CONSTRAINT `posFK` FOREIGN KEY (`position`) REFERENCES `server_position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `posPlayerFK` FOREIGN KEY (`player`) REFERENCES `server_player` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_playerpos`
--

LOCK TABLES `server_playerpos` WRITE;
/*!40000 ALTER TABLE `server_playerpos` DISABLE KEYS */;
INSERT INTO `server_playerpos` VALUES (1,1),(2,1),(3,2),(4,2),(5,3),(6,3),(7,4),(8,5),(9,5),(10,5),(11,1),(12,1),(13,2),(14,2),(15,3),(16,3),(17,4),(18,5),(19,5),(20,5);
/*!40000 ALTER TABLE `server_playerpos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_position`
--

DROP TABLE IF EXISTS `server_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_position` (
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_position`
--

LOCK TABLES `server_position` WRITE;
/*!40000 ALTER TABLE `server_position` DISABLE KEYS */;
INSERT INTO `server_position` VALUES ('Forward',1),('Defender',2),('Midfielder',3),('Goalie',4),('Sweeper',5);
/*!40000 ALTER TABLE `server_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_roles`
--

DROP TABLE IF EXISTS `server_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_roles`
--

LOCK TABLES `server_roles` WRITE;
/*!40000 ALTER TABLE `server_roles` DISABLE KEYS */;
INSERT INTO `server_roles` VALUES (1,'Admin'),(2,'League Manager'),(3,'Team Manager'),(4,'Coach'),(5,'Parent');
/*!40000 ALTER TABLE `server_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_schedule`
--

DROP TABLE IF EXISTS `server_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_schedule` (
  `sport` int(11) NOT NULL,
  `league` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `hometeam` int(11) NOT NULL,
  `awayteam` int(11) NOT NULL,
  `homescore` int(11) NOT NULL DEFAULT '0',
  `awayscore` int(11) NOT NULL DEFAULT '0',
  `scheduled` datetime NOT NULL,
  `completed` bit(1) NOT NULL DEFAULT b'0',
  KEY `sportleagueseasonFK_idx` (`sport`,`league`,`season`),
  KEY `hometeamFK_idx` (`hometeam`),
  KEY `awayteamFK_idx` (`awayteam`),
  CONSTRAINT `awayteamFK` FOREIGN KEY (`awayteam`) REFERENCES `server_team` (`id`),
  CONSTRAINT `hometeamFK` FOREIGN KEY (`hometeam`) REFERENCES `server_team` (`id`),
  CONSTRAINT `schslseasonFK` FOREIGN KEY (`sport`, `league`, `season`) REFERENCES `server_slseason` (`sport`, `league`, `season`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_schedule`
--

LOCK TABLES `server_schedule` WRITE;
/*!40000 ALTER TABLE `server_schedule` DISABLE KEYS */;
INSERT INTO `server_schedule` VALUES (1,1,1,1,2,3,6,'2018-09-20 04:00:00',''),(1,1,1,2,1,4,5,'2018-10-01 04:00:00',''),(1,1,1,1,2,2,3,'2018-10-10 04:00:00',''),(1,1,1,2,1,5,6,'2018-10-20 04:00:00',''),(1,1,1,1,2,0,0,'2018-10-25 04:00:00','\0'),(1,1,1,2,1,0,0,'2018-10-30 04:00:00','\0'),(1,1,1,1,2,0,0,'2018-11-05 04:00:00','\0'),(1,1,1,2,1,0,0,'2018-11-10 04:00:00','\0');
/*!40000 ALTER TABLE `server_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_season`
--

DROP TABLE IF EXISTS `server_season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` char(4) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_season`
--

LOCK TABLES `server_season` WRITE;
/*!40000 ALTER TABLE `server_season` DISABLE KEYS */;
INSERT INTO `server_season` VALUES (1,'2018','Season 1 - Soccer'),(4,'2019','Season 2 - Soccer');
/*!40000 ALTER TABLE `server_season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_slseason`
--

DROP TABLE IF EXISTS `server_slseason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_slseason` (
  `sport` int(11) NOT NULL,
  `league` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  PRIMARY KEY (`sport`,`league`,`season`),
  KEY `ssksseasonFK_idx` (`season`),
  KEY `sslsleagueFK_idx` (`league`),
  KEY `sslssportFK_idx` (`sport`),
  CONSTRAINT `sslsleaguetFK` FOREIGN KEY (`league`) REFERENCES `server_league` (`id`),
  CONSTRAINT `sslsseasonFK` FOREIGN KEY (`season`) REFERENCES `server_season` (`id`),
  CONSTRAINT `sslssportFK` FOREIGN KEY (`sport`) REFERENCES `server_sport` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_slseason`
--

LOCK TABLES `server_slseason` WRITE;
/*!40000 ALTER TABLE `server_slseason` DISABLE KEYS */;
INSERT INTO `server_slseason` VALUES (1,1,1);
/*!40000 ALTER TABLE `server_slseason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_sport`
--

DROP TABLE IF EXISTS `server_sport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_sport`
--

LOCK TABLES `server_sport` WRITE;
/*!40000 ALTER TABLE `server_sport` DISABLE KEYS */;
INSERT INTO `server_sport` VALUES (1,'Soccer'),(2,'Football');
/*!40000 ALTER TABLE `server_sport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_team`
--

DROP TABLE IF EXISTS `server_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mascot` varchar(50) DEFAULT NULL,
  `sport` int(11) NOT NULL,
  `league` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `homecolor` varchar(25) NOT NULL DEFAULT 'white',
  `awaycolor` varchar(25) NOT NULL,
  `maxplayers` varchar(45) NOT NULL DEFAULT '15',
  PRIMARY KEY (`id`),
  KEY `sls_idx` (`sport`,`league`,`season`),
  KEY `sls_sport_idx` (`sport`),
  KEY `sls_league_idx` (`league`),
  KEY `sls_season_idx` (`season`),
  CONSTRAINT `slsFK` FOREIGN KEY (`sport`, `league`, `season`) REFERENCES `server_slseason` (`sport`, `league`, `season`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_team`
--

LOCK TABLES `server_team` WRITE;
/*!40000 ALTER TABLE `server_team` DISABLE KEYS */;
INSERT INTO `server_team` VALUES (1,'Rochester Rhinos','Rhino',1,1,1,'rhino.jpg','blue','red','10'),(2,'Albany Alligators','Alligator',1,1,1,'alligator.jpg','green','yellow','10'),(3,'Newark Beavers','Beaver',1,1,1,'beaver.jpg','purple','navy','10'),(4,'Buffalo Bisons','Bison',1,1,1,'bison.jpg','brown','black','10');
/*!40000 ALTER TABLE `server_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_user`
--

DROP TABLE IF EXISTS `server_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_user` (
  `username` varchar(25) NOT NULL,
  `role` int(11) NOT NULL,
  `password` char(64) NOT NULL,
  `team` int(11) DEFAULT NULL,
  `league` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `roleFK_idx` (`role`),
  KEY `teamUserFK_idx` (`team`),
  KEY `leagueUserFK_idx` (`league`),
  CONSTRAINT `leagueUserFK` FOREIGN KEY (`league`) REFERENCES `server_league` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `roleFK` FOREIGN KEY (`role`) REFERENCES `server_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `teamUserFK` FOREIGN KEY (`team`) REFERENCES `server_team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_user`
--

LOCK TABLES `server_user` WRITE;
/*!40000 ALTER TABLE `server_user` DISABLE KEYS */;
INSERT INTO `server_user` VALUES ('adminUser',1,'5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',NULL,NULL),('coachUser',4,'5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',1,1),('leagueUser',2,'5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',NULL,1),('parentUser',5,'5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',1,1),('teamUser2',1,'5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',1,1);
/*!40000 ALTER TABLE `server_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-28 23:18:16
