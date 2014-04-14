-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2014 a las 17:50:49
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
-- Estructura de tabla para la tabla `categoria_vehiculo`
--

CREATE TABLE IF NOT EXISTS `categoria_vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categoria_vehiculo`
--

INSERT INTO `categoria_vehiculo` (`id`, `nombre`, `estado`) VALUES
(1, 'Autos', 1),
(2, 'Camionetas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_especificaciones`
--

CREATE TABLE IF NOT EXISTS `modelo_especificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `vehiculo_modelo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7FE3AC7D8DF6A451` (`vehiculo_modelo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide_principal`
--

CREATE TABLE IF NOT EXISTS `slide_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci,
  `imagen_banner` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide_vehiculos`
--

CREATE TABLE IF NOT EXISTS `slide_vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `menu_posicion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C9B3BD413397707A` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_toyocosta`
--

CREATE TABLE IF NOT EXISTS `user_toyocosta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_58B9400E92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_58B9400EA0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user_toyocosta`
--

INSERT INTO `user_toyocosta` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'yuri', 'yuri', 'yurixy25@gmail.com', 'yurixy25@gmail.com', 1, 's3pxb8r9yyowkwkskok8ow84wwowco', '/aGZchXA5XVHG3zxZnPPTA+fEGd2i0/Tc3q3NEhOZY951AiXCh4YauA3VT1z5zbQRDJl09FOGf3QnK/AQeBU4g==', '2014-04-12 00:30:45', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `precio_neto` double NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `imagen_banner` longtext COLLATE utf8_unicode_ci NOT NULL,
  `imagen_thumb` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C9FA16033397707A` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `nombre`, `precio`, `precio_neto`, `descripcion`, `imagen_banner`, `imagen_thumb`, `estado`, `categoria_id`, `created`, `updated`) VALUES
(1, 'hlux nova', 12, 12, 'erwrewrw', 'bumeran.PNG', 'megabanner.png', 1, 1, '2014-04-12 00:17:02', '2014-04-12 00:27:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_color`
--

CREATE TABLE IF NOT EXISTS `vehiculo_color` (
  `vehiculo_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`vehiculo_id`,`color_id`),
  UNIQUE KEY `UNIQ_F2FFEFF57ADA1FB5` (`color_id`),
  KEY `IDX_F2FFEFF525F7D575` (`vehiculo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_colores`
--

CREATE TABLE IF NOT EXISTS `vehiculo_colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `valor_color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_color` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C921B57525F7D575` (`vehiculo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_especificaciones_detalle`
--

CREATE TABLE IF NOT EXISTS `vehiculo_especificaciones_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `valor` longtext COLLATE utf8_unicode_ci NOT NULL,
  `modelo_especificacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F741EAD02FC73E7C` (`modelo_especificacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_galeria`
--

CREATE TABLE IF NOT EXISTS `vehiculo_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_37D52E3625F7D575` (`vehiculo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_modelos`
--

CREATE TABLE IF NOT EXISTS `vehiculo_modelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `precio_neto` double NOT NULL,
  `archivo_pdf` longtext COLLATE utf8_unicode_ci,
  `imagen_modelo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2A84037D25F7D575` (`vehiculo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modelo_especificaciones`
--
ALTER TABLE `modelo_especificaciones`
  ADD CONSTRAINT `FK_7FE3AC7D8DF6A451` FOREIGN KEY (`vehiculo_modelo_id`) REFERENCES `vehiculo_modelos` (`id`);

--
-- Filtros para la tabla `slide_vehiculos`
--
ALTER TABLE `slide_vehiculos`
  ADD CONSTRAINT `FK_C9B3BD413397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `FK_C9FA16033397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo_color`
--
ALTER TABLE `vehiculo_color`
  ADD CONSTRAINT `FK_F2FFEFF525F7D575` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `FK_F2FFEFF57ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `vehiculo_colores` (`id`);

--
-- Filtros para la tabla `vehiculo_colores`
--
ALTER TABLE `vehiculo_colores`
  ADD CONSTRAINT `FK_C921B57525F7D575` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo_especificaciones_detalle`
--
ALTER TABLE `vehiculo_especificaciones_detalle`
  ADD CONSTRAINT `FK_F741EAD02FC73E7C` FOREIGN KEY (`modelo_especificacion_id`) REFERENCES `modelo_especificaciones` (`id`);

--
-- Filtros para la tabla `vehiculo_galeria`
--
ALTER TABLE `vehiculo_galeria`
  ADD CONSTRAINT `FK_37D52E3625F7D575` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo_modelos`
--
ALTER TABLE `vehiculo_modelos`
  ADD CONSTRAINT `FK_2A84037D25F7D575` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
