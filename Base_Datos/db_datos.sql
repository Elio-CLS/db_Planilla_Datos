-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_datos
CREATE DATABASE IF NOT EXISTS `db_datos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_datos`;

-- Volcando estructura para tabla db_datos.tabla1
CREATE TABLE IF NOT EXISTS `tabla1` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Fecha` varchar(50) NOT NULL DEFAULT '',
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Apellido` varchar(50) NOT NULL DEFAULT '0',
  `DNI` varchar(50) NOT NULL DEFAULT '0',
  `Direccion` varchar(50) NOT NULL DEFAULT '0',
  `Email` varchar(50) NOT NULL DEFAULT '',
  `Usuario` varchar(50) NOT NULL DEFAULT '0',
  `Passworld` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`Fecha`),
  UNIQUE KEY `DNI` (`DNI`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_datos.tabla1: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tabla1` DISABLE KEYS */;
INSERT INTO `tabla1` (`ID`, `Fecha`, `Nombre`, `Apellido`, `DNI`, `Direccion`, `Email`, `Usuario`, `Passworld`) VALUES
	(0000000001, '2021-05-21', 'Admin', 'Admin', '11222333', 'Admin', 'admin@admin.com', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227'),
	(0000000003, '2013-05-21', 'kuko', 'Fideo', '3', 'Paraguay 584', 'damian@gmail.com', 'dami123', 'ef5434f78334942aff6d44c9c401d04b1becd807'),
	(0000000009, '18/05/2021', 'Fabio', 'Cortaza', '55648951', 'Buenos Aires 554', 'cortacita@gmail.com', 'corta123', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
	(0000000010, '18/05/2021', 'Rita', 'Miguel', '42550687', 'Juilio A Roca 145', 'rita_del_barrio@hotmail.com', 'rita55', '601f1889667efaebb33b8c12572835da3f027f78'),
	(0000000011, '26/05/2021', 'Jose', 'Ramon', '35963741', 'Piedra Buena 678', 'joser@gmial.com', 'jose123', '7c4a8d09ca3762af61e59520943dc26494f8941b');
/*!40000 ALTER TABLE `tabla1` ENABLE KEYS */;

-- Volcando estructura para tabla db_datos.tabla2
CREATE TABLE IF NOT EXISTS `tabla2` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Fecha` varchar(50) NOT NULL DEFAULT '',
  `DirN` varchar(50) NOT NULL DEFAULT '0',
  `DirV` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  CONSTRAINT `ID` FOREIGN KEY (`ID`) REFERENCES `tabla1` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_datos.tabla2: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tabla2` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabla2` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
