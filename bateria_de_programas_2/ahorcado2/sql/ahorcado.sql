--
-- Base de datos: `ahorcado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` tinyint(4) NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `clave`, `cod`) VALUES
(1, 'admin', 'admin', 1),
(2, 'joao', 'joao', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `id` tinyint(4) NOT NULL,
  `id_user` tinyint(4) NOT NULL,
  `palabra_secreta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `letras_usadas` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `intentos` tinyint(4) NOT NULL,
  `fallos` tinyint(4) NOT NULL,
  `estado_palabra` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado_juego` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id`, `id_user`, `palabra_secreta`, `letras_usadas`, `intentos`, `fallos`, `estado_palabra`, `estado_juego`) VALUES
(10, 2, 'lengua', 'e', 1, 1, '_e____', 0),
(11, 2, 'teclado', 'epoctlda', 8, 2, 'teclado', 1),
(12, 2, 'quemado', 'aenst', 5, 4, '__e_a__', 0),
(13, 2, 'mayonesa', 'abentlsmyo', 10, 4, 'mayonesa', 1),
(14, 2, 'quemado', 'olsne', 5, 4, '__e___o', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
