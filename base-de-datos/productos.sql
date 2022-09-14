-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-08-2022 a las 21:10:41
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `cod_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `peso` decimal(8,2) NOT NULL,
  `u_medida` int(11) NOT NULL,
  `cod_tipo` int(11) NOT NULL,
  `stock` decimal(8,2) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `cod_barra` bigint(20) NOT NULL,
  PRIMARY KEY (`cod_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `cod_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`cod_tipo`, `desc_tipo`) VALUES
(1, 'Bebidas'),
(2, 'VerdulerÃ­a'),
(3, 'CarnicerÃ­a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umedida`
--

DROP TABLE IF EXISTS `umedida`;
CREATE TABLE IF NOT EXISTS `umedida` (
  `cod_um` int(11) NOT NULL AUTO_INCREMENT,
  `desc_um` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `abrev_um` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_um`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `umedida`
--

INSERT INTO `umedida` (`cod_um`, `desc_um`, `abrev_um`) VALUES
(1, 'metro', 'm.'),
(7, 'KilÃ³metro', 'Km.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
