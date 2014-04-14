-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2014 a las 17:49:01
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `toyocosta_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pirelli_llanta`
--

CREATE TABLE IF NOT EXISTS `pirelli_llanta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `precio` double NOT NULL,
  `medida` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `rin` double NOT NULL,
  `diseno` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `segmento` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `linea` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `pirelli_llanta`
--

INSERT INTO `pirelli_llanta` (`id`, `modelo`, `estado`, `precio`, `medida`, `rin`, `diseno`, `segmento`, `linea`, `imagen`) VALUES
(1, 'P400', 1, 80.37, '175 70 R13', 13, 'P400', 'Automovil', 'Funcional', 'llanta-lightbox.png'),
(2, 'P400', 1, 89.52, '175 65 R14', 14, 'P4 CINT', 'Automovil', 'Funcional', 'llanta-lightbox.png'),
(3, 'P400', 1, 106.82, '185 60 R14', 14, 'P6', 'Automovil', 'Funcional', 'llanta-lightbox.png'),
(4, 'P400', 1, 95.63, '185 65 R14', 14, 'P4 CINT', 'Automovil', 'Funcional', 'llanta-lightbox.png'),
(5, 'P400', 1, 98.09, '185 70 R14', 14, 'P6000', 'Automovil', 'Funcional', 'llanta-lightbox.png'),
(6, 'P6', 1, 157.68, '205-70 R15', 15, 'S ATR', 'Camioneta', 'Todo Terreno', 'llanta-lightbox.png'),
(7, 'P6', 1, 185.4, '205-75 R15', 15, 'S ATR', 'Camioneta', 'Todo Terreno', 'llanta-lightbox.png'),
(8, 'P6', 1, 185.19, '215 75 R15', 15, 'S ATR', 'Camioneta', 'Todo Terreno', 'llanta-lightbox.png'),
(9, 'P6000', 1, 137.72, '205 55 R16', 16, 'P7', 'Suv', 'Deportiva', 'llanta-lightbox.png'),
(10, 'P6000', 1, 190.32, '215 70 R16', 16, 'SV', 'Suv', 'Deportiva', 'llanta-lightbox.png'),
(11, 'SCORPION MUD', 1, 248.1, '6.00 - 9', 9, 'CI 84', 'Industrial', 'N/A', 'llanta-lightbox.png'),
(12, 'P400', 1, 151.05, '215 75 R14', 14, 'S AT', 'Automovil', 'Deportiva', 'llanta-lightbox.png'),
(13, 'P6', 1, 113.92, '185 60 R15', 15, 'P7', 'Automovil', 'Deportiva', 'llanta-lightbox.png'),
(14, 'SCORPION MUD', 1, 383.46, '7.00 - 12', 12, 'CI 84', 'Industrial', 'N/A', 'llanta-lightbox.png'),
(15, 'CINTURATO P4', 1, 265.11, '225 65 R17', 17, 'S ATR', 'Suv', 'Todo Terreno', 'llanta-lightbox.png'),
(16, 'P6', 1, 125.55, '195 55 R15', 15, 'P7', 'Automovil', 'Deportiva', 'llanta-lightbox.png'),
(17, 'P6', 1, 126.15, '195 60 R15', 15, 'P7', 'Automovil', 'Deportiva', 'llanta-lightbox.png'),
(18, 'P6', 1, 134.98, '195 65 R15', 15, 'P7', 'Automovil', 'Deportiva', 'llanta-lightbox.png'),
(19, 'P6', 1, 135.68, '205-60 R15', 15, 'P3000', 'Automovil', 'Funcional', 'llanta-lightbox.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
