-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para prueba
CREATE DATABASE IF NOT EXISTS `prueba` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `prueba`;

-- Volcando estructura para tabla prueba.bitacora
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(255) NOT NULL DEFAULT '',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla prueba.bitacora: ~2 rows (aproximadamente)
INSERT INTO `bitacora` (`id`, `mensaje`, `fecha`) VALUES
	(1, '0', '2023-09-06 03:51:55'),
	(2, 'Se envio SMS aErick de categoriaDeportes al numero 6221588963: Mensaje de prueba 2023-09-06 05:52:53', '2023-09-06 03:52:53');

-- Volcando estructura para tabla prueba.canales
CREATE TABLE IF NOT EXISTS `canales` (
  `idCanal` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCanal` varchar(50) NOT NULL,
  PRIMARY KEY (`idCanal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla prueba.canales: ~2 rows (aproximadamente)
INSERT INTO `canales` (`idCanal`, `nombreCanal`) VALUES
	(1, 'SMS'),
	(2, 'Email'),
	(3, 'Push');

-- Volcando estructura para tabla prueba.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla prueba.categorias: ~2 rows (aproximadamente)
INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
	(1, 'Deportes'),
	(2, 'Finanzas'),
	(3, 'Peliculas');

-- Volcando estructura para tabla prueba.subscripciones
CREATE TABLE IF NOT EXISTS `subscripciones` (
  `idRegistro` tinyint(4) NOT NULL AUTO_INCREMENT,
  `idUsuario` tinyint(4) NOT NULL,
  `idCanal` tinyint(4) NOT NULL,
  `idCategoria` tinyint(4) NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla prueba.subscripciones: ~5 rows (aproximadamente)
INSERT INTO `subscripciones` (`idRegistro`, `idUsuario`, `idCanal`, `idCategoria`) VALUES
	(1, 1, 2, 1),
	(2, 1, 3, 1),
	(3, 2, 3, 1),
	(4, 2, 3, 3),
	(5, 2, 3, 2);

-- Volcando estructura para tabla prueba.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `correo` varchar(100) NOT NULL DEFAULT '',
  `telefono` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla prueba.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`IdUsuario`, `nombre`, `correo`, `telefono`) VALUES
	(1, 'Blanca', 'blanca@mail.com', '6221185883'),
	(2, 'Erick', 'erick@mail.com', '6221588963'),
	(3, 'Elisa', 'elisa@mail.com', '6225874536');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
