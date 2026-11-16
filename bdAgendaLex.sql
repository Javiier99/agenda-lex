-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for abogados_bbdd
CREATE DATABASE IF NOT EXISTS `abogados_bbdd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `abogados_bbdd`;

-- Dumping structure for table abogados_bbdd.abogados
CREATE TABLE IF NOT EXISTS `abogados` (
  `id_abogados` int NOT NULL AUTO_INCREMENT,
  `nombre_abogados` varchar(50) DEFAULT NULL,
  `apellidos_abogados` varchar(50) DEFAULT NULL,
  `correo_abogados` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefono_abogados` int DEFAULT NULL,
  `password_abogados` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_abogados`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla donde se encontrarán todos los abogados';

-- Data exporting was unselected.

-- Dumping structure for table abogados_bbdd.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `apellidos_clientes` varchar(50) DEFAULT NULL,
  `correo_clientes` varchar(50) DEFAULT NULL,
  `telefono_clientes` int DEFAULT NULL,
  `empresa_clientes` varchar(50) DEFAULT NULL,
  `dni_nif_clientes` varchar(50) DEFAULT NULL,
  `id_abogado` int DEFAULT NULL,
  PRIMARY KEY (`id_clientes`),
  KEY `abogado-cliente` (`id_abogado`),
  CONSTRAINT `abogado-cliente` FOREIGN KEY (`id_abogado`) REFERENCES `abogados` (`id_abogados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla de todos los clientes';

-- Data exporting was unselected.

-- Dumping structure for table abogados_bbdd.tareas
CREATE TABLE IF NOT EXISTS `tareas` (
  `id_tareas` int NOT NULL AUTO_INCREMENT,
  `titulo_tareas` varchar(50) DEFAULT NULL,
  `descripcion_tareas` varchar(100) DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `fecha_tareas` date DEFAULT NULL,
  PRIMARY KEY (`id_tareas`),
  KEY `tarea-cliente` (`id_cliente`),
  CONSTRAINT `tarea-cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_clientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Todas las tareas de los clientes';

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
