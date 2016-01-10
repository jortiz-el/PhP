-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2016 a las 21:03:12
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contabilidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntes`
--

CREATE TABLE IF NOT EXISTS `apuntes` (
  `tipo` varchar(20) NOT NULL,
  `concepto` varchar(40) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apuntes`
--

INSERT INTO `apuntes` (`tipo`, `concepto`, `cantidad`, `fecha`) VALUES
('ingresos', 'vacaciones', 2000, '2015-01-10'),
('ingresos', 'nominas', 3000, '2015-01-01'),
('gastos', 'comida', 300, '2015-01-25'),
('gastos', 'luz', 200, '2015-01-20'),
('gastos', 'agua', 50, '2015-01-15'),
('ingresos', 'sueldo', 2000, '2015-01-30'),
('gastos', 'productos ', 70, '2015-01-12'),
('gastos', 'colegio niÃ±os ', 500, '2015-01-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`) VALUES
(1, 'joao', 'joao');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
