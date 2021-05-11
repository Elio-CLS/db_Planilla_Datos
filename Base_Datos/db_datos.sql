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
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Apellido` varchar(50) NOT NULL DEFAULT '0',
  `DNI` int(8) NOT NULL DEFAULT '0',
  `Direccion` varchar(50) NOT NULL DEFAULT '0',
  `Usuario` varchar(50) NOT NULL DEFAULT '0',
  `Passworld` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DNI` (`DNI`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_datos.tabla1: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tabla1` DISABLE KEYS */;
INSERT INTO `tabla1` (`ID`, `Nombre`, `Apellido`, `DNI`, `Direccion`, `Usuario`, `Passworld`) VALUES
	(0000000001, 'Miguel', 'Rodriguez', 32801001, 'San Benito 639', 'miguel584d', '123456789Tw'),
	(0000000003, 'Cesar', 'Cortaza', 32752265, 'Paraguay 123', 'cesar123', 'sr123456789'),
	(0000000004, 'Jose', 'Garcia', 42802265, 'Paraguay 503', 'jose123', '123A56789'),
	(0000000005, 'Manuel', 'Lopez', 25702265, '25 de Julio 503', 'manue123', '12e456789'),
	(0000000006, 'Maria', 'Gimenez', 34957426, 'Los Altares 678', 'maria45a', '226287361fa1b10b7947671b8bb85ed44b51612e'),
	(0000000007, 'Maria', 'Lopez', 38946258, 'Venus 587', 'maria123L', '50310fc197ee2bf154733e32115e3995d342b0b2'),
	(0000000008, 'Miguel', 'Garcia', 25876954, '28 de Julio 1455', 'garcia1234mige', 'c9b0aab4a9da6aac16796b9cdbfeed2128e3f8cd'),
	(0000000009, 'Jose Maria', 'Benites', 35824967, 'Cholila 1022', 'jose35', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
	(0000000010, 'Julio', 'Altamirano', 36951753, 'Rawson 587', 'julio36alta', '13f17e36c578b8b6bbbb960715973a0eb26ac5b2'),
	(0000000011, 'Hector', 'Tornado', 45631558, 'Pelegrini norte 667', 'eltornadito', '4b4b04529d87b5c318702bc1d7689f70b15ef4fc');
/*!40000 ALTER TABLE `tabla1` ENABLE KEYS */;

-- Volcando estructura para tabla db_datos.tabla2
CREATE TABLE IF NOT EXISTS `tabla2` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `DirN` varchar(50) NOT NULL DEFAULT '0',
  `DirV` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  CONSTRAINT `FK_tabla2_tabla1` FOREIGN KEY (`ID`) REFERENCES `tabla1` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla db_datos.tabla2: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tabla2` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabla2` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
