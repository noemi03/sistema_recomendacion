-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2018 a las 19:08:11
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_chone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `descripcionA` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `tarea_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `descripcionA`, `fecha`, `tarea_id`) VALUES
(46, 'aaaaa', '2018-09-13', 22),
(47, 'diss', '2016-09-12', 22),
(48, 'hola', '2017-09-12', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE `avance` (
  `id` int(11) NOT NULL,
  `descripcionAV` varchar(200) NOT NULL,
  `actividad_Id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avance`
--

INSERT INTO `avance` (`id`, `descripcionAV`, `actividad_Id`, `estado_id`) VALUES
(15, 'noemi', 47, 21),
(16, 'maria', 48, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `descripcion`) VALUES
(48, 'talento humano'),
(49, 'D1'),
(50, 'D2'),
(51, 'D3'),
(52, 'D4'),
(53, 'D5'),
(54, 'TECNOLOGIA'),
(55, 'NOEMI LOCA'),
(56, 'MARON PORNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentousers`
--

CREATE TABLE `departamentousers` (
  `id` int(11) NOT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `horarioEntrada` time DEFAULT NULL,
  `horarioSalida` time DEFAULT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentousers`
--

INSERT INTO `departamentousers` (`id`, `estado`, `horarioEntrada`, `horarioSalida`, `iddepartamento`, `idusuario`) VALUES
(18, 'Inactivo', '12:44:00', '05:39:00', 53, 26),
(19, 'Inactivo', '12:44:00', '05:39:00', 52, 26),
(23, 'Inactivo', '12:33:00', '23:45:00', 48, 27),
(24, 'Inactivo', '12:33:00', '23:45:00', 54, 27),
(25, 'Inactivo', '03:04:00', '03:03:00', 50, 27),
(26, 'Inactivo', '03:04:00', '03:03:00', 51, 27),
(27, 'Inactivo', '04:03:00', '05:05:00', 54, 28),
(28, 'Activo', '05:05:00', '05:05:00', 48, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `descripcion`) VALUES
(21, 'inactivo'),
(23, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id` int(11) NOT NULL,
  `fechaAprobacion` date DEFAULT NULL,
  `memorandoSolicitud` varchar(2000) DEFAULT NULL,
  `temaExamen` varchar(2000) DEFAULT NULL,
  `porcentajeCumplido` varchar(2000) DEFAULT NULL,
  `observacion` varchar(2000) DEFAULT NULL,
  `codigoInforme` varchar(45) DEFAULT NULL,
  `archivos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id`, `fechaAprobacion`, `memorandoSolicitud`, `temaExamen`, `porcentajeCumplido`, `observacion`, `codigoInforme`, `archivos`) VALUES
(2, '2018-09-06', '34', 'tema', '23', 'no funciona', '23', NULL),
(5, '2018-09-14', 'N3', 'Diagnostico', '75%', 'Informe climático', '2', NULL),
(6, '2018-09-07', '23', 'tema1', '23', 'no funciona', '23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `porcentajeCumplimiento` varchar(200) DEFAULT NULL,
  `subtema_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `tiporecomendaciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recomendacion`
--

INSERT INTO `recomendacion` (`id`, `descripcion`, `porcentajeCumplimiento`, `subtema_id`, `estado_id`, `tiporecomendaciones_id`) VALUES
(6, 'No se realizo bien el informe', '4%', 6, 23, 2),
(7, 'noemi', '34', 6, 23, 4),
(8, 'no funciona', '34', 6, 23, 2),
(9, 'hola', '23', 9, 23, 4),
(10, 'eee', '23', 9, 23, 4),
(11, 'gggg', '23', 9, 23, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacionesdepartamento`
--

CREATE TABLE `recomendacionesdepartamento` (
  `id` int(11) NOT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `departamento_id` int(11) NOT NULL,
  `recomendacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recomendacionesdepartamento`
--

INSERT INTO `recomendacionesdepartamento` (`id`, `estado`, `departamento_id`, `recomendacion_id`) VALUES
(57, 'Realizado', 49, 7),
(58, 'Realizado', 55, 7),
(59, 'Realizado', 56, 7),
(60, 'Realizado', 56, 6),
(61, 'Pendiente', 49, 8),
(62, 'Pendiente', 48, 8),
(63, 'Pendiente', 50, 8),
(64, 'Pendiente', 48, 6),
(65, 'Pendiente', 49, 6),
(66, 'Pendiente', 48, 6),
(67, 'Pendiente', 55, 11),
(68, 'Pendiente', 48, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtema`
--

CREATE TABLE `subtema` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `conclusion` varchar(200) DEFAULT NULL,
  `porcentajeCumplido` varchar(45) DEFAULT NULL,
  `informe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subtema`
--

INSERT INTO `subtema` (`id`, `descripcion`, `conclusion`, `porcentajeCumplido`, `informe_id`) VALUES
(6, 'INFORMACIÓN CLIMÁTICA', 'El clima es tropical o ecuatorial en la Zona 4', '23%', 6),
(9, 'ewea', 'sddd', '23', 5),
(10, 'noemi', 'ffff', '34', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `recomendacionesDepartamentoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `descripcion`, `recomendacionesDepartamentoid`) VALUES
(22, 'realizar informe', 57),
(24, 'noemi', 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporecomendaciones`
--

CREATE TABLE `tiporecomendaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiporecomendaciones`
--

INSERT INTO `tiporecomendaciones` (`id`, `descripcion`) VALUES
(2, 'modelo'),
(4, 'REGISTRO OFICIAL N°. 193');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `descripcion`) VALUES
(11, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoUsuario_id` int(11) NOT NULL,
  `password` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `cedula`, `sexo`, `celular`, `email`, `estado`, `tipoUsuario_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, 'Noemi', 'Solorzano', '1314813898', 'Femenino', '0980034644', 'noemisolorzano17@gmail.com', 'Activo', 11, '$2y$10$ezV/NhQ1GESDxc8MT4aB3e7ho9t2u5eduF/clnw0o2k//PNrsgDga', NULL, NULL, NULL),
(28, 'MANUEL', 'Solorzano', '1314813898', 'Masculino', '0980034644', 'noemisolorzano1991@gmail.com', 'Activo', 11, '$2y$10$kN6I4bxj1bnVDXIGpJMC3.XWKexGuK/rG9GCMVnyTKlldgbFXt2ti', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividad_tarea1_idx` (`tarea_id`);

--
-- Indices de la tabla `avance`
--
ALTER TABLE `avance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avance_actividad1_idx` (`actividad_Id`),
  ADD KEY `fk_avance_estado1_idx` (`estado_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentousers`
--
ALTER TABLE `departamentousers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recomendacion_subtema_idx` (`subtema_id`),
  ADD KEY `fk_recomendacion_estado1_idx` (`estado_id`),
  ADD KEY `fk_recomendacion_tiporecomendaciones1_idx` (`tiporecomendaciones_id`);

--
-- Indices de la tabla `recomendacionesdepartamento`
--
ALTER TABLE `recomendacionesdepartamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkdepartamento_idx` (`departamento_id`),
  ADD KEY `fkreco_idx` (`recomendacion_id`);

--
-- Indices de la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subtema_informe1_idx` (`informe_id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `1_idx` (`recomendacionesDepartamentoid`);

--
-- Indices de la tabla `tiporecomendaciones`
--
ALTER TABLE `tiporecomendaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `avance`
--
ALTER TABLE `avance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `departamentousers`
--
ALTER TABLE `departamentousers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `recomendacionesdepartamento`
--
ALTER TABLE `recomendacionesdepartamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `subtema`
--
ALTER TABLE `subtema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tiporecomendaciones`
--
ALTER TABLE `tiporecomendaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_tarea1` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `fk_avance_actividad1` FOREIGN KEY (`actividad_Id`) REFERENCES `actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avance_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD CONSTRAINT `fk_recomendacion_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recomendacion_subtema` FOREIGN KEY (`subtema_id`) REFERENCES `subtema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recomendacion_tiporecomendaciones1` FOREIGN KEY (`tiporecomendaciones_id`) REFERENCES `tiporecomendaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recomendacionesdepartamento`
--
ALTER TABLE `recomendacionesdepartamento`
  ADD CONSTRAINT `fkdepartamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkreco` FOREIGN KEY (`recomendacion_id`) REFERENCES `recomendacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD CONSTRAINT `fk_subtema_informe1` FOREIGN KEY (`informe_id`) REFERENCES `informe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
