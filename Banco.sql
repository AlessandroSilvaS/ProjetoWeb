-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: dbCursos_Alunos
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

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
-- Table structure for table `intervencao_aluno_e_endereco`
--
CREATE DATABASE dbCursos_Alunos;

USE dbCursos_Alunos;

DROP TABLE IF EXISTS `intervencao_aluno_e_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervencao_aluno_e_endereco` (
  `tb_aluno_id_aluno` int NOT NULL,
  `tb_end_id_end` int NOT NULL,
  PRIMARY KEY (`tb_aluno_id_aluno`,`tb_end_id_end`),
  KEY `fk_tb_aluno_has_tb_end_tb_end1_idx` (`tb_end_id_end`),
  KEY `fk_tb_aluno_has_tb_end_tb_aluno1_idx` (`tb_aluno_id_aluno`),
  CONSTRAINT `fk_tb_aluno_has_tb_end_tb_aluno1` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`),
  CONSTRAINT `fk_tb_aluno_has_tb_end_tb_end1` FOREIGN KEY (`tb_end_id_end`) REFERENCES `tb_end` (`id_end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervencao_aluno_e_endereco`
--

LOCK TABLES `intervencao_aluno_e_endereco` WRITE;
/*!40000 ALTER TABLE `intervencao_aluno_e_endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `intervencao_aluno_e_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervencao_caduser_e_endereco`
--

DROP TABLE IF EXISTS `intervencao_caduser_e_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervencao_caduser_e_endereco` (
  `tb_caduser_id_caduser` int NOT NULL,
  `tb_end_id_end` int NOT NULL,
  PRIMARY KEY (`tb_caduser_id_caduser`,`tb_end_id_end`),
  KEY `fk_tb_caduser_has_tb_end_tb_end1_idx` (`tb_end_id_end`),
  KEY `fk_tb_caduser_has_tb_end_tb_caduser_idx` (`tb_caduser_id_caduser`),
  CONSTRAINT `fk_tb_caduser_has_tb_end_tb_caduser` FOREIGN KEY (`tb_caduser_id_caduser`) REFERENCES `tb_caduser` (`id_caduser`),
  CONSTRAINT `fk_tb_caduser_has_tb_end_tb_end1` FOREIGN KEY (`tb_end_id_end`) REFERENCES `tb_end` (`id_end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervencao_caduser_e_endereco`
--

LOCK TABLES `intervencao_caduser_e_endereco` WRITE;
/*!40000 ALTER TABLE `intervencao_caduser_e_endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `intervencao_caduser_e_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervencao_curso_e_aluno`
--

DROP TABLE IF EXISTS `intervencao_curso_e_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervencao_curso_e_aluno` (
  `tb_curso_id_curso` int NOT NULL,
  `tb_aluno_id_aluno` int NOT NULL,
  PRIMARY KEY (`tb_curso_id_curso`,`tb_aluno_id_aluno`),
  KEY `fk_tb_curso_has_tb_aluno_tb_aluno1_idx` (`tb_aluno_id_aluno`),
  KEY `fk_tb_curso_has_tb_aluno_tb_curso1_idx` (`tb_curso_id_curso`),
  CONSTRAINT `fk_tb_curso_has_tb_aluno_tb_aluno1` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`),
  CONSTRAINT `fk_tb_curso_has_tb_aluno_tb_curso1` FOREIGN KEY (`tb_curso_id_curso`) REFERENCES `tb_curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervencao_curso_e_aluno`
--

LOCK TABLES `intervencao_curso_e_aluno` WRITE;
/*!40000 ALTER TABLE `intervencao_curso_e_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `intervencao_curso_e_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervencao_curso_e_caduser`
--

DROP TABLE IF EXISTS `intervencao_curso_e_caduser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervencao_curso_e_caduser` (
  `tb_curso_id_curso` int NOT NULL,
  `tb_caduser_id_caduser` int NOT NULL,
  PRIMARY KEY (`tb_curso_id_curso`,`tb_caduser_id_caduser`),
  KEY `fk_tb_curso_has_tb_caduser_tb_caduser1_idx` (`tb_caduser_id_caduser`),
  KEY `fk_tb_curso_has_tb_caduser_tb_curso1_idx` (`tb_curso_id_curso`),
  CONSTRAINT `fk_tb_curso_has_tb_caduser_tb_caduser1` FOREIGN KEY (`tb_caduser_id_caduser`) REFERENCES `tb_caduser` (`id_caduser`),
  CONSTRAINT `fk_tb_curso_has_tb_caduser_tb_curso1` FOREIGN KEY (`tb_curso_id_curso`) REFERENCES `tb_curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervencao_curso_e_caduser`
--

LOCK TABLES `intervencao_curso_e_caduser` WRITE;
/*!40000 ALTER TABLE `intervencao_curso_e_caduser` DISABLE KEYS */;
/*!40000 ALTER TABLE `intervencao_curso_e_caduser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_aluno`
--



DROP TABLE IF EXISTS `tb_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_aluno` (
  `id_aluno` int NOT NULL AUTO_INCREMENT,
  `aluno_nome` varchar(45) NOT NULL,
  `aluno_nascimento` date NOT NULL,
  `aluno_email` varchar(75) NOT NULL,
  `aluno_senha` varchar(8) NOT NULL,
  `aluno_cpf` varchar(11) NOT NULL,
  `aluno_genero` varchar(20) NOT NULL,
  `aluno_telefone` varchar(45) DEFAULT NULL,
  `curso_status` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `id_aluno_UNIQUE` (`id_aluno`),
  UNIQUE KEY `aluno_cpf_UNIQUE` (`aluno_cpf`),
  UNIQUE KEY `aluno_email_UNIQUE` (`aluno_email`),
  UNIQUE KEY `aluno_telefone_UNIQUE` (`aluno_telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_aluno`
--

LOCK TABLES `tb_aluno` WRITE;
/*!40000 ALTER TABLE `tb_aluno` DISABLE KEYS */;
INSERT INTO `tb_aluno` VALUES (1,'Remerson Felipe','2007-03-07','remersonfelipe123@gmail.com','448790','49520509562','masculino','8599204425','ativo');
/*!40000 ALTER TABLE `tb_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_caduser`
--

DROP TABLE IF EXISTS `tb_caduser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_caduser` (
  `id_caduser` int NOT NULL AUTO_INCREMENT,
  `caduser_name` varchar(45) NOT NULL,
  `caduser_email` varchar(75) NOT NULL,
  `caduser_senha` varchar(75) NOT NULL,
  `caduser_nascimento` date NOT NULL,
  `caduser_telefone` varchar(45) DEFAULT NULL,
  `caduser_identi` varchar(45) NOT NULL,
  PRIMARY KEY (`id_caduser`),
  UNIQUE KEY `caduser_email_UNIQUE` (`caduser_email`),
  UNIQUE KEY `id_caduser_UNIQUE` (`id_caduser`),
  UNIQUE KEY `caduser_telefone_UNIQUE` (`caduser_telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_caduser`
--

LOCK TABLES `tb_caduser` WRITE;
/*!40000 ALTER TABLE `tb_caduser` DISABLE KEYS */;
INSERT INTO `tb_caduser` VALUES (1,'Hiago de Sousa Guerra','hiagodesousa123@gmail.com','887722','2007-06-26','85992404758','Diretor');
/*!40000 ALTER TABLE `tb_caduser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_curso`
--

DROP TABLE IF EXISTS `tb_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_curso` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `curso_nome` varchar(45) NOT NULL,
  `curso_descricao` text NOT NULL,
  `curso_duracao` int NOT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `id_curso_UNIQUE` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_curso`
--

LOCK TABLES `tb_curso` WRITE;
/*!40000 ALTER TABLE `tb_curso` DISABLE KEYS */;
INSERT INTO `tb_curso` VALUES (1,'Informática','Um curso que visa ensinar desde o básico ao avançado',102);
/*!40000 ALTER TABLE `tb_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_end`
--

DROP TABLE IF EXISTS `tb_end`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_end` (
  `id_end` int NOT NULL AUTO_INCREMENT,
  `end_logradouro` varchar(75) NOT NULL,
  `end_numero` int DEFAULT NULL,
  `end_complemento` varchar(40) DEFAULT NULL,
  `end_cidade` varchar(45) NOT NULL,
  `end_estado` varchar(2) NOT NULL,
  `end_bairro` varchar(45) NOT NULL,
  `end_cep` varchar(8) NOT NULL,
  PRIMARY KEY (`id_end`),
  UNIQUE KEY `id_end_UNIQUE` (`id_end`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_end`
--

LOCK TABLES `tb_end` WRITE;
/*!40000 ALTER TABLE `tb_end` DISABLE KEYS */;
INSERT INTO `tb_end` VALUES (1,'Rua de Bragança',7,'casa','Chorozinho','CE','Triângulo','62875000');
/*!40000 ALTER TABLE `tb_end` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-03  8:03:06
