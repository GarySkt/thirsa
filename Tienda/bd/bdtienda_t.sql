-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2014 a las 02:55:46
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdtienda_t`
--
CREATE DATABASE IF NOT EXISTS `bdtienda_t` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdtienda_t`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `codorden` varchar(50) NOT NULL DEFAULT '',
  `codcliente` int(11) NOT NULL DEFAULT '0',
  `codproducto` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`codorden`, `codcliente`, `codproducto`, `cantidad`) VALUES
('1-461951119112', 1, 14, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `codcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categoria` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codcategoria`, `nom_categoria`, `estado`) VALUES
(1, 'Tops', 'A'),
(2, 'Pantalones-Jeans', 'A'),
(3, 'Vestidos', 'A'),
(4, 'Faldas', 'A'),
(5, 'Buzos', 'A'),
(6, 'Ropa Interior', 'A'),
(7, 'Pijamas', 'A'),
(8, 'Casacas', 'A'),
(9, 'Zapatos', 'A'),
(10, 'Carteras y Accesorios', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `codcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(35) DEFAULT NULL,
  `apellidos` varchar(35) DEFAULT NULL,
  `razonsocial` varchar(35) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `direccion` varchar(35) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `fecha_nacim` date DEFAULT '0000-00-00',
  `comentario` text,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codcliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codcliente`, `nombres`, `apellidos`, `razonsocial`, `dni`, `direccion`, `telefono`, `email`, `clave`, `ocupacion`, `edad`, `fecha_nacim`, `comentario`, `estado`) VALUES
(1, 'Maribel', 'Herrera', 'Tacna SAC', 25725457, 'Av Bolognesi 545', '225-7371', 'mherrera@hotmail.com', '123456', 'Ingeniero de Sistemas', 33, '1984-09-17', 'Primer cliente que usará el sistema de carrito de compras.', 'A'),
(2, 'Juan', 'Garcia Ramos', 'Merca', 2565458, 'Pasaje Lima  254', '5632545', 'juanperez@hotmail.com', '123456', 'Gerente Personal', 30, '1970-09-25', 'Segundo cliente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactenos`
--

DROP TABLE IF EXISTS `contactenos`;
CREATE TABLE IF NOT EXISTS `contactenos` (
  `codcontactos` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(35) DEFAULT NULL,
  `apellidos` varchar(35) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `sexo` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `comentario` text,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codcontactos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `contactenos`
--

INSERT INTO `contactenos` (`codcontactos`, `nombres`, `apellidos`, `direccion`, `distrito`, `departamento`, `telefono`, `email`, `sexo`, `edad`, `comentario`, `estado`) VALUES
(1, 'Abel', 'Espinoza Herrera', 'Huarochiri Mz. H Lt. 11', 'La Molina', 'Lima', '2257371', 'abelespinoza@hotmail.com', 'Masculino', 37, 'este es un contacto de prueva', 'A'),
(2, 'Allison', 'Espinoza Torres', 'Huarochiri Mz. H. Lt. 11', 'La Molina', 'Lima', '12312312', 'alison@hotmail,con', 'Femenino', 12, 'esto es una prueba', 'A'),
(3, 'Juan', 'Perez', 'Lima 23 int 34', 'Lima', 'Lima', '23892', 'juan@hotmail.com', 'Masculino', 23, 'esto es una prueba', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `codnoticias` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `sumilla` varchar(250) DEFAULT NULL,
  `cuerpo` text,
  `fecha_ing` date DEFAULT '0000-00-00',
  `fotochica` varchar(50) DEFAULT NULL,
  `fotogrande` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codnoticias`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`codnoticias`, `titulo`, `sumilla`, `cuerpo`, `fecha_ing`, `fotochica`, `fotogrande`, `estado`) VALUES
(1, 'Desfile de Modas Verano 2008', 'Importante Desfile de Modas como inauguración al verano 2008, se viene realizando en nuestra capital.', 'Importante Desfile de Modas como inauguración al verano 2014, se viene realizando en nuestra capital.', '2014-11-10', 'noticia1a.jpg', 'noticia1b.jpg', 'A'),
(3, 'Nuevos Modelos de Ropa', 'Aumenta la creatividad de los diseñadores peruanos', 'Aumenta la creatividad de los diseñadores peruanos y da vida a nuevos modelos de prendas de vestir sobre todo para las mujeres.', '2007-11-04', 'foto3a.jgp', 'foto3b.jpg', 'A'),
(4, 'Ropas de Baños Ligeros', 'la creatividad de los diseñadores peruanos y da vida', 'la creatividad de los diseñadores peruanos y da vida a nuevos modelos de prendas de vestir sobre todo para las mujeres', '2007-11-05', 'foto4a.jpg', 'foto4b.jpg', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodetalle`
--

DROP TABLE IF EXISTS `pedidodetalle`;
CREATE TABLE IF NOT EXISTS `pedidodetalle` (
  `codorden` varchar(50) NOT NULL DEFAULT '',
  `codproducto` int(11) NOT NULL DEFAULT '0',
  `precio` double NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidodetalle`
--

INSERT INTO `pedidodetalle` (`codorden`, `codproducto`, `precio`, `cantidad`) VALUES
('1-391919117111', 5, 60, 1),
('1-391919117111', 10, 130, 2),
('1-391919117111', 24, 19, 3),
('1-4519341171154', 10, 130, 2),
('1-4519341171154', 6, 60, 3),
('1-4519341171154', 5, 60, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `codorden` varchar(50) NOT NULL DEFAULT '',
  `codcliente` int(11) NOT NULL DEFAULT '0',
  `fechapedido` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `observaciones` text NOT NULL,
  `bruto` double NOT NULL DEFAULT '0',
  `igv` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`codorden`, `codcliente`, `fechapedido`, `observaciones`, `bruto`, `igv`, `total`) VALUES
('1-4519341171154', 1, '2007-11-11 07:46:37', 'urgente necesito este pedido', 560, 106.4, 666.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `codproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codcategoria` int(11) DEFAULT NULL,
  `nombreproduc` varchar(250) DEFAULT NULL,
  `descripcion` text,
  `fecha_ing` date DEFAULT '0000-00-00',
  `precio_normal` double DEFAULT NULL,
  `precio_oferta` double DEFAULT NULL,
  `imagen_chica` varchar(50) DEFAULT NULL,
  `imagen_grande` varchar(50) DEFAULT NULL,
  `oferta` char(2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codproducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codproducto`, `codcategoria`, `nombreproduc`, `descripcion`, `fecha_ing`, `precio_normal`, `precio_oferta`, `imagen_chica`, `imagen_grande`, `oferta`, `estado`) VALUES
(1, 1, 'BURBERRY Playeras Originales !!!Super Fashion!!!', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - LUNA ROSSA CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-02-10', 50, NULL, 'top1a.jpg', 'top1b.jpg', 'NO', 'A'),
(2, 1, 'Top de Algodon Amarillo', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - LUNA ROSSA CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 55, NULL, 'top2a.jpg', 'top2b.jpg', 'NO', 'A'),
(3, 1, 'Top Casual para Vestir Diario', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - LUNA ROSSA CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 49, NULL, 'top3a.jpg', 'top3b.jpg', 'NO', 'A'),
(4, 1, 'Top Playero y Casual', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - LUNA ROSSA CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 66, NULL, 'top4a.jpg', 'top4b.jpg', 'NO', 'A'),
(5, 2, 'Jean Casual Otoño e Invierno', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - LUNA ROSSA CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 82, 60, 'pantalon1a.jpg', 'pantalon1b.jpg', 'SI', 'A'),
(6, 2, 'Pantalon Polystel Vestir Negro', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 65, 60, 'pantalon2a.jpg', 'pantalon2b.jpg', 'SI', 'A'),
(7, 2, 'Pantalon Sports Cuadros para Diario', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 69, 59, 'pantalon3a.jpg', 'pantalon3b.jpg', 'SI', 'A'),
(8, 2, 'Pantalon de Nylon de Noche', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 150, NULL, 'pantalon4a.jpg', 'pantalon4a.jpg', 'NO', 'A'),
(9, 3, 'Vestido Azul Transparente Casual', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 65, NULL, 'vestido1a.jpg', 'vestido1b.jpg', 'NO', 'A'),
(10, 3, 'Vestido Blanco con Escote Transparente', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 150, 130, 'vestido2a.jpg', 'vestido2b.jpg', 'SI', 'A'),
(11, 3, 'Vestido Rosado con Vuelo', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 100, NULL, 'vestido3a.jpg', 'vestido3b.jpg', 'NO', 'A'),
(12, 3, 'Vestido Rosado Escotado y Vuelo', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 132, 130, 'vestido4a.jpg', 'vestido4b.jpg', 'SI', 'A'),
(13, 4, 'Minifalda de Vestir en 2 Colores', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.\r\n', '2007-10-02', 56, 50, 'falda1a.jpg', 'falda1b.jpg', 'SI', 'A'),
(14, 4, 'Miniflada Playera en Licra Negro', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 34, NULL, 'falda2a.jpg', 'falda2b.jpg', 'NO', 'A'),
(15, 4, 'Falda de Vestir para Reuniones', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 150, NULL, 'falda3a.jpg', 'falda3b.jpg', 'NO', 'A'),
(16, 4, 'Minifalda Para Niñas con Detalles', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 69, NULL, 'falda4a.jpg', 'falda4b.jpg', 'NO', 'A'),
(17, 5, 'Buzo Deportivo con Rayas Blancas', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 50, NULL, 'buzo1a.jpg', 'buzo1b.jpg', 'NO', 'A'),
(18, 5, 'Buzo Hogareño Gris', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 35, 25, 'buzo2a.jpg', 'buzo2b.jpg', 'SI', 'A'),
(19, 5, 'Buzo Plomo Casual', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 36, NULL, 'buzo3a.jpg', 'buzo3b.jpg', 'NO', 'A'),
(20, 5, 'Buzo Rojo para Salir de Shooping', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 98, NULL, 'buzo4a.jpg', 'buzo4b.jpg', 'NO', 'A'),
(21, 6, 'Bracier Color Lila', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 45, NULL, 'interior1a.jpg', 'interior1b.jpg', 'NO', 'A'),
(22, 6, 'Truza Melon Algodon', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 30, 20, 'interior2a.jpg', 'interior2b.jpg', 'SI', 'A'),
(23, 6, 'Truza Multicolor Licrado', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 25, 20, 'interior3a.jpg', 'interior3b.jpg', 'SI', 'A'),
(24, 6, 'Vikini Negro Algodon', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 19, NULL, 'interior4a.jpg', 'interior4b.jpg', 'NO', 'A'),
(25, 7, 'Bata de Baño Blanco', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2014 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2014-10-02', 80, 75, 'pijama1a.jpg', 'pijama1b.jpg', 'SI', 'A'),
(26, 7, 'Pijama de Dormir Celeste', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 35, 30, 'pijama2a.jpg', 'pijama2b.jpg', 'SI', 'A'),
(27, 7, 'Pijama para Despues del Baño', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 64, 60, 'pijama3a.jpg', 'pijama3b.jpg', 'SI', 'A'),
(28, 7, 'Pijama Para Dormir Rojo', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 64, 45, 'pijama4a.jpg', 'pijama4b.jpg', 'SI', 'A'),
(29, 8, 'Casaca Sport Color Verde', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 85, 84, 'casaca1a.jpg', 'casaca1b.jpg', 'SI', 'A'),
(30, 8, 'Casaca de Cuero Casual', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 165, 150, 'casaca2a.jpg', 'casaca2b.jpg', 'SI', 'A'),
(31, 8, 'Casaca Jean Grafito', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 65, 60, 'casaca3a.jpg', 'casaca3b.jpg', 'SI', 'A'),
(32, 8, 'Casaca de Cuero Negro', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 190, 180, 'casaca4a.jpg', 'casaca4b.jpg', 'SI', 'A'),
(33, 9, 'Sandalinas Playeras de Plastico', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 35, 30, 'zapato1a.jpg', 'zapato1b.jpg', 'SI', 'A'),
(34, 9, 'Zapatos de Vestir en Tiras de Cuero', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 65, 60, 'zapato2a.jpg', 'zapato2b.jpg', 'SI', 'A'),
(35, 9, 'Zapatos de Vestir Color Caramelo', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 65, 60, 'zapato3a.jpg', 'zapato3b.jpg', 'SI', 'A'),
(36, 9, 'Zapato de Vestir Negro', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 96, NULL, 'zapato4a.jpg', 'zapato4b.jpg', 'SI', 'A'),
(37, 10, 'Cartera Multicolro para Jovencitas', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 50, NULL, 'accesorio1a.jpg', 'accesorio1b.jpg', 'NO', 'A'),
(38, 10, 'Bolso de Nylon Verde Playero', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 35, NULL, 'accesorio2a.jpg', 'accesorio2b.jpg', 'SI', 'A'),
(39, 10, 'Bolso Juvenil Sport Verde', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2007 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2007-10-02', 35, 30, 'accesorio3a.jpg', 'accesorio3b.jpg', 'SI', 'A'),
(40, 10, 'Bolso de Accesorios Casual Multicor', 'Ropa Prada para Mujer - Coleccion Primavera/Verano 2014 - ALLISON CHALLENGE\r\nPrada marca la tendencia en el mundo de la moda todas las estaciones presenta su nueva y refinada colección caracterizada por su elegancia minimalista, lineas perfectas y materiales de alta calidad.', '2014-10-02', 34, 31, 'accesorio4a.jpg', 'accesorio4b.jpg', 'SI', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `codusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(20) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codusuario`, `nombres`, `apellidos`, `email`, `clave`, `estado`) VALUES
(1, 'Tito', 'Ale', 'titofale@gmail.com', '123456', 'A'),
(3, 'Thirsa', 'Espinoza', 'thirsa@hotmail.com', '123456', 'A'),
(4, 'Veronica', 'Ale', 'vero@gmail.com', '123456', 'A'),
(5, 'juan', 'conde', 'jconde@gmail.com', '123456', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
