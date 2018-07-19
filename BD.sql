-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-07-2018 a las 10:38:42
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CAI`
--
DROP DATABASE IF EXISTS `CAI`;
CREATE DATABASE IF NOT EXISTS `CAI` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CAI`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre`, `descripcion`) VALUES
(2, 'BOOK', 'fwegwg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` int(7) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `grupo` varchar(7) DEFAULT NULL,
  `carrera` varchar(7) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `apellido`, `grupo`, `carrera`, `img`) VALUES
(123, 'safsaf', 'asf', 'EN-122', 'ITI', ''),
(213, 'asdsf', 'asf', 'EN-143', 'ITI', 'views/media/img/19720186549Captura de pantalla de 2018-07-15 15-15-24.png'),
(12323, 'Francisco Isaac', 'Perales Morales', 'EN-122', 'ITI', ''),
(1234241, 'dasf', 'asfasf', NULL, 'ITI', 'views/media/img/19720186856Captura de pantalla de 2018-07-15 14-56-32.png'),
(2142215, 'Luiz', 'Serra', 'EN-122', 'ISA', ''),
(2412533, 'Miguel', 'Perez', 'EN-122', 'MECA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(7) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time DEFAULT NULL,
  `alumno` int(7) NOT NULL,
  `actividad` int(7) NOT NULL,
  `unidad` int(7) NOT NULL,
  `nivel` int(1) DEFAULT NULL,
  `teacher` varchar(50) DEFAULT NULL,
  `hora_completa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `hora_entrada`, `hora_salida`, `alumno`, `actividad`, `unidad`, `nivel`, `teacher`, `hora_completa`) VALUES
(1, '2018-07-19', '00:00:00', '03:00:00', 12323, 2, 2, 2, 'gfdfgsdg', 1),
(2, '2018-07-19', '00:00:00', '03:00:00', 12323, 2, 2, 2, 'gfdfgsdg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `siglas` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`siglas`, `nombre`) VALUES
('ISA', 'Automotive systems engineering'),
('ITI', ' Engineering in information technology'),
('MECA', 'Automotive systems engineering');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `codigo` varchar(7) NOT NULL,
  `nivel` int(1) NOT NULL,
  `teacher` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`codigo`, `nivel`, `teacher`) VALUES
('EN-111', 6, 13),
('EN-122', 1, 13),
('EN-143', 3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `teacher` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`teacher`) VALUES
(13),
(15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(7) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `nombre`, `fecha_inicio`, `fecha_fin`) VALUES
(2, 'Unidad 1 2018-1', '2018-07-21', '2018-08-21'),
(4, 'Unidad', '2018-08-21', '2018-09-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `num_empleado` int(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`num_empleado`, `nombre`, `username`, `password`, `email`, `tipo`) VALUES
(12, 'Francisco Isaac Perales Morales', 'admin', 'admin', '1530071@upv.edu.mx', 'Administrator'),
(13, 'Angela Carrizales', 'angie', 'angie', 'angie@upv.edu.mx', 'Teacher'),
(15, 'Brian Becerra', 'brian', 'brian', 'Brian@Brian.com', 'Teacher');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `fk_Alumno_grupo1_idx` (`grupo`),
  ADD KEY `fk_Alumno_carrera1_idx` (`carrera`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `fk_asistencia_Alumno1_idx` (`alumno`),
  ADD KEY `fk_asistencia_actividad1_idx` (`actividad`),
  ADD KEY `fk_asistencia_unidad1_idx` (`unidad`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`siglas`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_grupo_teacher1_idx` (`teacher`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher`),
  ADD KEY `fk_teacher_usuario_idx` (`teacher`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`num_empleado`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `num_empleado` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_Alumno_carrera1` FOREIGN KEY (`carrera`) REFERENCES `carrera` (`siglas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumno_grupo1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_Alumno1` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_actividad1` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_unidad1` FOREIGN KEY (`unidad`) REFERENCES `unidad` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_teacher1` FOREIGN KEY (`teacher`) REFERENCES `teacher` (`teacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_usuario` FOREIGN KEY (`teacher`) REFERENCES `usuario` (`num_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;