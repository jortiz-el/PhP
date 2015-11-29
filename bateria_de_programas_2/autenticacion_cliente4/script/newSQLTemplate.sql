-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2015 a las 12:58:32
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadros`
--

CREATE TABLE `cuadros` (
  `pintor` varchar(18) NOT NULL,
  `cuadros` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuadros`
--

INSERT INTO `cuadros` (`pintor`, `cuadros`) VALUES
('dali', 'dali1'),
('dali', 'dali2'),
('dali', 'dali3'),
('dali', 'dali4'),
('frida', 'frida1'),
('frida', 'frida2'),
('frida', 'frida3'),
('frida', 'frida4'),
('miro', 'miro1'),
('miro', 'miro2'),
('miro', 'miro3'),
('miro', 'miro4'),
('renoir', 'renoir1'),
('renoir', 'renoir2'),
('renoir', 'renoir3'),
('renoir', 'renoir4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` tinyint(4) NOT NULL,
  `usuario` varchar(18) NOT NULL,
  `clave` varchar(18) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pintor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `clave`, `email`, `pintor`) VALUES
(12, 'pito', 'pito', 'pito@pito.com', 'dali'),
(14, 'pablo', 'pablo', 'pablo@pablo.com', 'frida'),
(17, 'paco', 'paco', 'paco@paco.com', 'renoir'),
(18, 'joao', 'joao', 'joao@joao.com', 'frida'),
(19, 'jorge', 'jorge', 'jorge@jorge.com', 'dali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintor`
--

CREATE TABLE `pintor` (
  `id` int(11) NOT NULL,
  `pintor` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pintor`
--

INSERT INTO `pintor` (`id`, `pintor`) VALUES
(1, 'dali'),
(2, 'frida'),
(5, 'miro'),
(9, 'renoir');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `pintor`
--
ALTER TABLE `pintor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pintor` (`pintor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `pintor`
--
ALTER TABLE `pintor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;