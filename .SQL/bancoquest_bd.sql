CREATE DATABASE  IF NOT EXISTS `bancoquest_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bancoquest_bd`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: bancoquest_bd
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluno` (
  `id_aluno` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sobrenome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cpf` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `confirmsenha` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `serie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,'Matheus','Medeiros','matheus@gmail.com','12345678945','12','12','2º ano'),(2,'Antônio','Filho','antonio@gmail.com','12345698712','1234','1234','2º ano'),(3,'Joao','Vitor','Joao@gmail.com','\n927.539.320-69','75965607','75965607','1º ano'),(4,'Carlos','Algusto','Carlos@gmail.com','735.960.230-09','11718494','11718494','1º ano'),(5,'Claudio','Martins','Claudio@gmail.com','206.748.370-61','60748654','60748654','1º ano'),(6,'Pedro','Santos','Pedro@gmail.com','949.696.700-05','86613320','86613320','1º ano'),(7,'Lucas','Sousa','Lucas@gmail.com','353.749.540-40','91837322','91837322','1º ano'),(8,'Guilherme','Silva','Guilherme@gmail.com','562.202.260-62','45550170','45550170','1º ano'),(9,'Theo','Hernadez','Theo@gmail.com','223.612.310-85','53300812','53300812','1º ano'),(10,'Luan','Santos','Luan@gmail.com','049.970.370-79','78732639','78732639','1º ano'),(11,'Gabriel','Gustavo','Gabriel@gmail.com','427.582.760-03','18135790','18135790','1º ano'),(12,'Luana','Santos','Luana@gmail.com','235.736.710-55','67570261','67570261','1º ano'),(13,'Sarah','Nunes','Sarah@gmail.com','882.609.670-81','68401997','68401997','2º ano'),(14,'Julia','Martins','Julia@gmail.com','347.181.950-98','81722732','81722732','2º ano'),(15,'Maria','Eduarda','Maria@gmail.com','216.744.840-62','24227233','24227233','2º ano'),(16,'Lana','Sousa','Lana@gmail.com','296.820.350-90','5977839','5977839','2º ano'),(17,'Antonio','filho','Antonio@gmail.com','042.032.460-75','42152071','42152071','2º ano'),(18,'Caio','Martins','Caio@gmail.com','614.500.010-41','24457199','24457199','2º ano'),(19,'Vitor','Hugo','Vitor@gmail.com','652.921.590-50','25906687','25906687','2º ano'),(20,'Felipe','Leandro','Felipe@gmail.com','056.913.810-83','67098564','67098564','2º ano'),(21,'Jose','Fernando','Jose@gmail.com','256.899.250-63','94916705','94916705','2º ano'),(22,'Lara','Costa','lara@gmail.com','790.679.180-08','18315663','18315663','2º ano'),(23,'Yasmn','Silva','Yasmn@gmail.com','695.641.710-32','7985862','7985862','3º ano'),(24,'Luna','Dantes','Luna@gmail.com','289.345.040-72','1542077','1542077','3º ano'),(25,'Vitoria','Chaves','vitoria@gmail.com','683.101.550-69','25108817','25108817','3º ano'),(26,'Julia','Pedrosa','Julia@gmail.com','345.751.300-79','11235564','11235564','3º ano'),(27,'Fabiana','Lima','Fabiana@gmail.com','645.626.470-78','34229846','34229846','3º ano'),(28,'Rian','Lira','Rian@gmail.com','257.752.190-15','38317061','38317061','3º ano'),(29,'Marcos','Vinicios','Marcos@gmail.com','163.729.360-70','48535501','48535501','3º ano'),(30,'Enzo','Costa','Enzo@gmail.com','237.231.760-11','42781622','42781622','3º ano'),(31,'Jorge','Emanoel','Jorge@gmail.com','332.733.710-13','75986925','75986925','3º ano'),(32,'Emanoel','Suarez','Emanoel@gmail.com','601.006.290-08','47083708','47083708','3º ano'),(33,'Fernanda','Viera','Fernanda@gmail.com','531.416.870-72','6154093','6154093','3º ano');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `id_prof` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sobrenome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cpf` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `confirmsenha` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `materia` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Matheus','Medeiros','medeiros@gmail.com','12345678978','321','321','Biologia'),(2,'Ricardo','Albuquerque','ricardo@gmail.com','627.270.090-38','556721','556721','Matemática'),(3,'Carlos','Elmen','carlos@gmail.com','691.769.530-09','456321','456321','Fisica'),(4,'Lia','Pedrosa','lia@gmail.com','210.139.800-18','988971','988971','Biologia'),(5,'Ney','Sandro','ney@gmail.com','138.843.790-20','991213','991213','Geografia'),(6,'Lucas','Santos','lucas@gmail.com','754.822.090-16','659347','659347','Filosofia'),(8,'Antonio','Filho','antoniodollmichael@gmail.com','12345678988','antonio123','antonio123','Ed.Fisica');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provas`
--

DROP TABLE IF EXISTS `provas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `questões` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`nome`,`questões`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provas`
--

LOCK TABLES `provas` WRITE;
/*!40000 ALTER TABLE `provas` DISABLE KEYS */;
INSERT INTO `provas` VALUES (1,'TEST PROVA','1,2,3'),(3,'Prova Parcial','1,2,3,1'),(7,'Batman','3,1');
/*!40000 ALTER TABLE `provas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questoes`
--

DROP TABLE IF EXISTS `questoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dificuldade` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `serie` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `materia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `itemA` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `itemB` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `itemC` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `itemD` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `itemE` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questoes`
--

LOCK TABLES `questoes` WRITE;
/*!40000 ALTER TABLE `questoes` DISABLE KEYS */;
INSERT INTO `questoes` VALUES (1,'pedroblues281@gmail.com','fácil','1º ano','português','C','AAAAAAAAAAAAAAAA','BBBBBBBBBB','CCCCCCCCCCCCCCCCCCCC','DDDDDDDDDDDDDDDDDD','EEEEEEEEEEEEEEEEEEEEEEEEEEEE'),(2,'Ajfgufrurervbrvenovrnio','fácil','2º ano','matemática','D','SERA?','sera??????????','seraaaaaaaaaaaaaaaaa','seraaaaaaaaaaaaaaaaa???????????????','sera'),(3,'erhethdthht','fácil','2º ano','matemática','E','hrdfhdfhhdffhd','dfdfgnfhd','dfhdfhdfhfhd','fhdfhdahdhdf','dhfadfhahfdhdf'),(4,'   fadsfdasff','Dificuldade:','Série atual: 2º ano','Ed.Fisica','B','fdasf','aaa','aaa','saf','afsds');
/*!40000 ALTER TABLE `questoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bancoquest_bd'
--

--
-- Dumping routines for database 'bancoquest_bd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-21  4:44:29
