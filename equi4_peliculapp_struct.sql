CREATE DATABASE  IF NOT EXISTS `equi4_peliculapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `equi4_peliculapp`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: equi4_peliculapp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `actor`
--

DROP TABLE IF EXISTS `actor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actor` (
  `ActorID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `ApePrimero` varchar(60) NOT NULL,
  `ApeSegundo` varchar(60) DEFAULT NULL,
  `PaisesID` int(11) NOT NULL,
  PRIMARY KEY (`ActorID`),
  KEY `PaisesID_act` (`PaisesID`),
  CONSTRAINT `PaisesID_act` FOREIGN KEY (`PaisesID`) REFERENCES `paises` (`PaisesID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `actorpelicula`
--

DROP TABLE IF EXISTS `actorpelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actorpelicula` (
  `ActorID` int(11) NOT NULL,
  `PeliculaID` int(11) NOT NULL,
  PRIMARY KEY (`ActorID`,`PeliculaID`),
  KEY `PeliculaID_act_pel` (`PeliculaID`),
  CONSTRAINT `ActorID_act_pel` FOREIGN KEY (`ActorID`) REFERENCES `actor` (`ActorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `PeliculaID_act_pel` FOREIGN KEY (`PeliculaID`) REFERENCES `pelicula` (`PeliculaID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `director`
--

DROP TABLE IF EXISTS `director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `director` (
  `DirectorID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `ApePrimero` varchar(60) NOT NULL,
  `ApeSegundo` varchar(60) DEFAULT NULL,
  `PaisesID` int(11) NOT NULL,
  PRIMARY KEY (`DirectorID`),
  KEY `PaisesID` (`PaisesID`),
  CONSTRAINT `PaisesID` FOREIGN KEY (`PaisesID`) REFERENCES `paises` (`PaisesID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `directorpelicula`
--

DROP TABLE IF EXISTS `directorpelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directorpelicula` (
  `DirectorID` int(11) NOT NULL,
  `PeliculaID` int(11) NOT NULL,
  PRIMARY KEY (`DirectorID`,`PeliculaID`),
  KEY `PeliculaID_dir_pel` (`PeliculaID`),
  CONSTRAINT `DirectorID_dir_pel` FOREIGN KEY (`DirectorID`) REFERENCES `director` (`DirectorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `PeliculaID_dir_pel` FOREIGN KEY (`PeliculaID`) REFERENCES `pelicula` (`PeliculaID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paises` (
  `PaisesID` int(11) NOT NULL AUTO_INCREMENT,
  `ISO` char(2) DEFAULT NULL,
  `Nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`PaisesID`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelicula` (
  `PeliculaID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `PeliculaGeneroID` int(11) NOT NULL,
  PRIMARY KEY (`PeliculaID`),
  KEY `PeliculaGeneroID` (`PeliculaGeneroID`),
  CONSTRAINT `PeliculaGeneroID` FOREIGN KEY (`PeliculaGeneroID`) REFERENCES `peliculagenero` (`PeliculaGeneroID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `peliculagenero`
--

DROP TABLE IF EXISTS `peliculagenero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peliculagenero` (
  `PeliculaGeneroID` int(11) NOT NULL AUTO_INCREMENT,
  `Genero` varchar(60) NOT NULL,
  PRIMARY KEY (`PeliculaGeneroID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-28 16:56:52
