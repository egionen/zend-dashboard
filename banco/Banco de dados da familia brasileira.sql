-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dashboard
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nasc` date NOT NULL,
  `avatar` text,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `user_UNIQUE` (`user`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,'isadjoasidhao','2000-12-12','','tica','tica','tica'),(6,'Victor','2000-12-12','','egion','1122448816','executnoob@gmail.com'),(16,'saduashdojdbnoqwud2','2000-12-12',NULL,'1','2','1'),(17,'vipodkaspdo','2000-12-12',NULL,'pdisajdpasdjp','dkpsaodkaspdo','spodaskdpaoskd'),(18,'wpijaspajfpadifjapi','2000-12-12',NULL,'mfioajfdpoifjdsoifj','fspdofjdspfo','dpifjsdpfisdjf'),(19,'dnkasuhdsaudh','2000-12-12',NULL,'dsahfoasidho','dkaspdijsadpi','2aofdihsadoiashdoi'),(20,'sdlaishdosaho','2000-12-12',NULL,'doiuashdosahdoi','djaspdijsadoipj','jsaodiasodias'),(21,'admin','2000-12-12',NULL,'admin','admin','admin'),(23,'tica','2000-12-12',NULL,'dasijdoasidhejln','cmoaimwinc','masociaosicmi'),(24,'daodjasodiun','2000-12-12',NULL,'dlasuidhbaosuchbao','oasidhasoidhasoid','dopaihdnasoidasndoisa'),(25,'dasudhasodi','2016-06-08',NULL,'kpsakdp','asijdsao','dosiadjaodi'),(26,'suidhasodu','2016-06-08',NULL,'saidjasondushdnoau','dpiansdpaisdn','dnasopidnsaodi'),(27,'aoudnasodn','2016-06-08',NULL,'soduandosadn','dpiandpsaidn','dnsapidnasoudnaosdn'),(28,'oudasdihasdo','2016-06-08',NULL,'dsaoudnasdjlsadnoasdhdoasidn','sdoiajsodasdno','dsaodunasiduasbdiau'),(29,'sidjasopdi','2016-06-08',NULL,'daosidaosdi','dosaisaiodaso','onsaidasod'),(30,'asdjaosdi','2016-06-08',NULL,'asoidjasodi','doasdiasdoasid','ndoasidnaodinaod'),(31,'dalsidansodi','2016-06-08',NULL,'dalisdnsaodinboubdoqu','noddpaisndsaoi','dsaopidnoasdnasodi'),(32,'oisdnaosid','2016-06-08',NULL,'victor','123','ferr');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id_download` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `link` text,
  `id_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_download`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `download_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `data` date DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_aluno` (`id_aluno`),
  CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'Prova','prova de penis','2016-06-07',NULL),(5,'noem certo','dosihdoadiahsfoa','2016-06-08',21),(6,'oishdosi','oidhodish','2016-09-11',21),(7,'joweuorehjoirehi','jdpoasijdasopdijoij','2016-06-08',21);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_aluno` (`id_aluno`),
  CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (2,'Biologia',NULL),(4,'Arquitetura de Coputadores',21),(5,'Sexologia',32),(6,'Geografia',32),(7,'Tenseira',21);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-08 10:58:43
