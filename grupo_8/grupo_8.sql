-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2015 a las 20:49:26
-- Versión del servidor: 10.0.20-MariaDB-1~jessie-log
-- Versión de PHP: 5.6.7-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `grupo_8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
`id` int(11) NOT NULL,
  `numeroDocumento` int(8) unsigned NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaEgreso` date DEFAULT NULL,
  `fechaAlta` date NOT NULL,
  `valido` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `numeroDocumento`, `apellido`, `nombre`, `fechaNacimiento`, `sexo`, `mail`, `direccion`, `latitud`, `longitud`, `fechaIngreso`, `fechaEgreso`, `fechaAlta`, `valido`) VALUES
(1, 123123, 'Mirenda', 'Lautaro', '2015-10-20', 'M', 'asdasd', 'Av. 7 279, La Plata, Buenos Aires, Argentina', -34.90581830092048, -57.96208620071411, '2015-10-07', '2015-10-15', '2015-10-02', 0),
(2, 36734753, 'Mendivil', 'Maximiliano', '1993-01-02', 'M', 'maximendivil22@gmail.com', 'Av. 13 294, La Plata, Buenos Aires, Argentina', -34.911255687582056, -57.96836256980896, '2015-10-03', NULL, '2015-10-03', 0),
(3, 36734819, 'Varela', 'Facundo', '1993-05-14', 'M', 'fvarela@gmail.com', 'Calle 17 393, Tolosa, Buenos Aires, Argentina', -34.90609985728971, -57.98430562019348, '2015-10-04', NULL, '2015-10-04', 1),
(4, 38125764, 'Oreja', 'Facundo', '1999-05-18', 'M', 'foreja@gmail.com', 'Calle 34 980, La Plata, Buenos Aires, Argentina', -34.9094608618959, -57.9743492603302, '2015-10-04', NULL, '2015-10-04', 1),
(5, 32569874, 'Nadal', 'Ivana', '2001-12-25', 'F', 'ivinadal@gmail.com', 'Calle 20 206, La Plata, Buenos Aires, Argentina', -34.91616486327116, -57.977718114852905, '2015-10-04', NULL, '2015-10-04', 1),
(6, 36412857, 'Marzol', 'Noelia', '1997-06-18', 'F', 'noemarzol@gmail.com', 'Calle 46 1168, La Plata, Buenos Aires, Argentina', -34.92299147259468, -57.96469330787659, '2015-10-04', NULL, '2015-10-04', 1),
(7, 40000000, 'Antoniale', 'Loli', '2000-10-02', 'F', 'laniñaloli@gmail.com', 'Calle 56 951, La Plata, Buenos Aires, Argentina', -34.92492674821367, -57.95332074165344, '2015-10-04', NULL, '2015-10-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
`clave` int(11) NOT NULL,
  `valorNumerico` int(11) unsigned NOT NULL,
  `valorTextual` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`clave`, `valorNumerico`, `valorTextual`) VALUES
(1, 1, 'habilitado'),
(2, 5, 'paginacion'),
(3, 404, 'Sitio no disponible!2'),
(4, 0, 'Cooperadora de la Escuela JoaquÃ­n V. GonzÃ¡lez'),
(5, 0, 'anexa@administracion.com'),
(6, 0, '0221-452');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE IF NOT EXISTS `cuota` (
`id` int(11) NOT NULL,
  `anio` int(11) unsigned NOT NULL,
  `mes` int(11) unsigned NOT NULL,
  `monto` float unsigned NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `comisionCobrador` int(11) unsigned NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`id`, `anio`, `mes`, `monto`, `tipo`, `comisionCobrador`, `fechaAlta`) VALUES
(3, 2015, 1, 35, 'matricula', 20, '2015-11-28 23:42:47'),
(4, 2015, 2, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(5, 2015, 3, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(6, 2015, 4, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(7, 2015, 5, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(8, 2015, 6, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(9, 2015, 7, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(10, 2015, 8, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(11, 2015, 9, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(12, 2015, 10, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(13, 2015, 11, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(14, 2015, 12, 350, 'cuota', 2, '2015-11-28 23:42:47'),
(28, 2015, 0, 500, 'matricula', 5, '2015-11-28 23:42:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idCuota` int(11) NOT NULL,
  `idCobrador` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `becado` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `fechaActualizado` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `idAlumno`, `idCuota`, `idCobrador`, `fecha`, `becado`, `fechaAlta`, `fechaActualizado`) VALUES
(4, 2, 3, 21, '2015-10-04', 0, '2015-10-04', '2015-10-04'),
(5, 1, 3, 21, '2015-10-04', 1, '2015-10-04', '2015-10-04'),
(6, 1, 4, 21, '2015-10-04', 1, '2015-10-04', '2015-10-04'),
(7, 2, 4, 21, '2015-10-04', 0, '2015-10-04', '2015-10-04'),
(8, 2, 5, 21, '2015-10-04', 0, '2015-10-04', '2015-10-04'),
(13, 7, 3, 21, '2015-10-19', 0, '2015-10-19', '2015-10-19'),
(14, 7, 4, 21, '2015-10-19', 0, '2015-10-19', '2015-10-19'),
(15, 7, 5, 21, '2015-10-19', 0, '2015-10-19', '2015-10-19'),
(16, 1, 5, 21, '2015-10-21', 0, '2015-10-21', '2015-10-21'),
(17, 1, 6, 21, '2015-10-21', 0, '2015-10-21', '2015-10-21'),
(18, 1, 7, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(19, 5, 3, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(20, 3, 3, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(21, 3, 4, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(22, 3, 5, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(23, 4, 3, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(24, 4, 4, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(25, 4, 5, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(26, 6, 3, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(27, 6, 4, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(28, 6, 5, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(29, 6, 6, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(30, 6, 7, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(31, 6, 8, 21, '2015-11-08', 1, '2015-11-08', '2015-11-08'),
(32, 7, 6, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(33, 7, 7, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(34, 7, 8, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(35, 1, 28, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(36, 2, 28, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(37, 3, 28, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(38, 4, 28, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08'),
(39, 5, 28, 21, '2015-11-08', 0, '2015-11-08', '2015-11-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
`id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `tipo` varchar(5) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id`, `username`, `tipo`, `apellido`, `nombre`, `fechaNacimiento`, `sexo`, `mail`, `telefono`, `direccion`) VALUES
(11, 'admin2', 'Tutor', 'fsdf', 'sdfsdf', '2015-10-21', 'M', 'wawe@a.com', '23322', 'dfsdfsdf'),
(12, 'maximendivil', 'tutor', 'Mendivil', 'Ruben', '1965-04-08', 'M', 'r_mendivil@hotmail.com', '2215037022', '17 393'),
(13, 'admin', 'padre', 'Moralez', 'Victor Hugo', '1960-02-01', 'M', 'vhmoralez@gmail.com', '02214229673', '17 527 y 528'),
(14, NULL, 'madre', 'QWERTY', 'fdsfds', '1900-05-05', 'F', 'povilauskas@hotmail.com', '423423', 'ewrwer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsablealumno`
--

CREATE TABLE IF NOT EXISTS `responsablealumno` (
  `idAlumno` int(11) NOT NULL,
  `idResponsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsablealumno`
--

INSERT INTO `responsablealumno` (`idAlumno`, `idResponsable`) VALUES
(1, 14),
(2, 12),
(3, 11),
(4, 11),
(4, 12),
(4, 13),
(5, 12),
(6, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `email`, `habilitado`, `rol`) VALUES
(1, 'maximendivil', '123', 'maximendivil22@gmail.com', 1, 'administracion'),
(2, 'admin', '123', 'a@a.com', 1, 'consulta'),
(21, 'admin2', '1', 'a@a', 1, 'gestion'),
(22, 'aa', '123', 'aa@aa.com', 0, 'administracion'),
(23, 'user0', 'userpass0', 'user@usr.com', 1, 'administracion'),
(24, 'zz', '123', 'aa2@aa.com', 1, 'consulta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `numeroDocumento_2` (`numeroDocumento`), ADD UNIQUE KEY `numeroDocumento_3` (`numeroDocumento`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
 ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `anio` (`anio`,`mes`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`id`), ADD KEY `idAlumno` (`idAlumno`,`idCuota`), ADD KEY `idCuota` (`idCuota`), ADD KEY `idCobrador` (`idCobrador`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_2` (`username`), ADD KEY `username` (`username`);

--
-- Indices de la tabla `responsablealumno`
--
ALTER TABLE `responsablealumno`
 ADD KEY `idAlumno` (`idAlumno`,`idResponsable`), ADD KEY `idResponsable` (`idResponsable`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`id`),
ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`idCuota`) REFERENCES `cuota` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`idCobrador`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `responsable`
--
ALTER TABLE `responsable`
ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`);

--
-- Filtros para la tabla `responsablealumno`
--
ALTER TABLE `responsablealumno`
ADD CONSTRAINT `responsablealumno_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`id`),
ADD CONSTRAINT `responsablealumno_ibfk_2` FOREIGN KEY (`idResponsable`) REFERENCES `responsable` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
