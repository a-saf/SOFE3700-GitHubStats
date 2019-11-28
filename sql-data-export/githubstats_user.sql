-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: githubstats
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_name` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `repo_url` varchar(100) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `no_of_repos` int(11) DEFAULT NULL,
  `followers` int(11) DEFAULT NULL,
  `followings` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35348872 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (24086,'markstory','Mark','Story','https://api.github.com/users/markstory/repos','@getsentry','Toronto',69,1133,18,'2008-09-11','2019-11-27'),(28321,'chartjes','Chris','Hartjes','https://api.github.com/users/chartjes/repos','','Milton',42,298,1,'2008-10-09','2019-11-14'),(78918,'bbolker','Ben','Bolker','https://api.github.com/users/bbolker/repos','McMaster University','Hamilton',112,388,1,'2009-04-28','2019-11-22'),(80144,'StevenBlack','Steven','Black','https://api.github.com/users/StevenBlack/repos','','Kingston',133,491,156,'2009-05-02','2019-11-27'),(133019,'swankjesse','Jesse','Wilson','https://api.github.com/users/swankjesse/repos','Square, Inc.','Waterloo',21,5129,1,'2009-09-30','2019-10-22'),(176013,'wesbos','Wes','Bos','https://api.github.com/users/wesbos/repos','me','Hamilton',244,17321,32,'2010-01-04','2019-10-18'),(211054,'cmoulton','Christina Moulton, iOS Dev','','https://api.github.com/users/cmoulton/repos','Teak Mobile Inc','Ottawa',40,297,1,'2010-02-26','2019-11-04'),(233022,'Leask','Leask','Wong','https://api.github.com/users/Leask/repos','@Press-One','Ottawa',126,290,95,'2010-03-30','2019-10-27'),(271950,'Redth','Jonathan','Dick','https://api.github.com/users/Redth/repos','Xamarin @ Microsoft','Ontario',175,668,4,'2010-05-09','2019-11-13'),(437196,'Uberi','Anthony','Zhang','https://api.github.com/users/Uberi/repos','Hypotenuse Labs','Waterloo',102,503,64,'2010-10-12','2019-11-18'),(617994,'acabunoc','Abigail Cabunoc Mayes','','https://api.github.com/users/acabunoc/repos','Mozilla Foundation','Toronto',113,377,4,'2011-02-14','2019-11-05'),(672172,'nayuki','Nayuki','','https://api.github.com/users/nayuki/repos','Project Nayuki','Toronto',25,1695,0,'2011-03-16','2019-11-12'),(831718,'bbondy','Brian R. Bondy','','https://api.github.com/users/bbondy/repos','Brave Software','Ontario',84,603,41,'2011-06-06','2019-11-19'),(882133,'reinink','Jonathan','Reinink','https://api.github.com/users/reinink/repos','','Beamsville',19,737,0,'2011-06-28','2019-11-27'),(911566,'gvwilson','Greg','Wilson','https://api.github.com/users/gvwilson/repos','@rstudio ','Toronto',68,361,0,'2011-07-13','2019-11-07'),(1160599,'johnafish','John','Fish','https://api.github.com/users/johnafish/repos','Reimagine.ai','Waterloo',34,1185,27,'2011-10-30','2019-11-28'),(1450090,'pahimar','Pahimar','','https://api.github.com/users/pahimar/repos','','Ontario',4,1204,7,'2012-02-18','2019-11-22'),(1505226,'thestinger','Daniel','Micay','https://api.github.com/users/thestinger/repos','','Toronto',8,670,10,'2012-03-06','2019-06-19'),(1675456,'AlecStrong','Alec','Strong','https://api.github.com/users/AlecStrong/repos','Square, Inc.','Kitchener',20,921,6,'2012-04-24','2019-11-11'),(1752670,'dsokoloski','Darryl','Sokoloski','https://api.github.com/users/dsokoloski/repos','@clearos @eglooca','Ontario',0,381,0,'2012-05-18','2019-10-11'),(1981722,'b3ll','Adam','Bell','https://api.github.com/users/b3ll/repos','diffractive','London',71,811,92,'2012-07-16','2019-11-16'),(2300911,'ebuchman','Ethan','Buchman','https://api.github.com/users/ebuchman/repos','','Guelph',37,290,22,'2012-09-07','2019-11-18'),(2751621,'flar2','Aaron','Segaert','https://api.github.com/users/flar2/repos','EX Solutions Inc.','Southwestern Ontario',63,382,0,'2012-11-08','2019-10-27'),(4323180,'adamwathan','Adam','Wathan','https://api.github.com/users/adamwathan/repos','','Ontario',89,3640,11,'2013-05-02','2019-11-06'),(4762842,'IanDarwin','Ian','Darwin','https://api.github.com/users/IanDarwin/repos','','Ontario',106,292,2,'2013-06-21','2019-11-26'),(9373002,'mhdawson','Michael','Dawson','https://api.github.com/users/mhdawson/repos','','ottawa',114,368,4,'2014-10-23','2019-10-29'),(11962885,'lmcinnes','Leland','McInnes','https://api.github.com/users/lmcinnes/repos','Tutte Institute for Mathematics and Computing','Ottawa',32,553,10,'2015-04-15','2019-11-28'),(15910683,'GeorgeSeif','George','Seif','https://api.github.com/users/GeorgeSeif/repos','','Toronto Ontario',18,322,1,'2015-11-18','2019-10-29'),(19353028,'adambcomer','Adam','Comer','https://api.github.com/users/adambcomer/repos','Knowtworthy','Toronto',4,678,8,'2016-05-13','2019-11-18'),(35348871,'techwithtim','Tech With Tim','','https://api.github.com/users/techwithtim/repos','','Ontario',32,1151,1,'2018-01-11','2019-11-19');
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

-- Dump completed on 2019-11-28 12:44:26
