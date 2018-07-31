-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2018 a las 09:34:50
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
  `id_actividad` int(7) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre`, `descripcion`) VALUES
(3, 'BOOK', 'read book'),
(4, 'PC', 'Work in computer'),
(5, 'Game', 'Play a game'),
(6, 'Watch Movie', 'See movie in the room');

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
(123, 'Miguel Angel', 'Perez Sanchez', 'EN-122', 'ITI', ''),
(1530061, 'Karla Vanessa', 'Balderrama', 'EN-222', 'PYMES', 'views/media/img/2672018183229avatar-1.jpg'),
(1530123, 'David', 'Tovias Alanis', 'EN-333', 'MECA', 'views/media/img/2672018183046avatar-3.jpg');

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
  `grupo` varchar(7) NOT NULL,
  `hora_completa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `hora_entrada`, `hora_salida`, `alumno`, `actividad`, `unidad`, `nivel`, `teacher`, `grupo`, `hora_completa`) VALUES
(6, '2018-07-10', '14:39:45', '14:41:30', 1530123, 6, 7, 6, 'Angela Carrizales', 'EN-333', 0),
(7, '2018-07-10', '14:40:38', '15:41:13', 1530061, 6, 7, 6, 'Angela Carrizales', 'EN-222', 1),
(8, '2018-07-10', '14:42:09', '15:48:26', 1530123, 5, 7, 6, 'Angela Carrizales', 'EN-333', 1),
(9, '2018-07-26', '15:40:19', '16:25:17', 1530123, 6, 7, 6, 'Angela Carrizales', 'EN-333', 0),
(10, '2018-07-26', '15:40:28', '15:42:52', 1530123, 6, 7, 6, 'Angela Carrizales', 'EN-333', 0),
(11, '2018-07-26', '15:40:28', '15:43:04', 1530123, 6, 7, 6, 'Angela Carrizales', 'EN-333', 0),
(12, '2018-07-26', '15:40:23', '16:27:12', 1530123, 6, 7, 6, 'Angela Carrizales', 'EN-333', 1),
(13, '2018-07-26', '15:42:33', '16:27:47', 1530061, 4, 7, 6, 'Angela Carrizales', 'EN-222', 1),
(14, '2018-07-27', '03:01:28', '16:00:12', 1530061, 4, 7, 6, 'Angela Carrizales', 'EN-222', 1),
(15, '2018-07-26', '16:00:56', '16:01:05', 1530061, 4, 7, 6, 'Angela Carrizales', 'EN-222', 0),
(16, '2018-07-26', '16:02:00', '16:02:08', 1530123, 5, 7, 6, 'Angela Carrizales', 'EN-333', 0),
(17, '2018-07-31', '11:10:53', '11:27:36', 1530061, 5, 7, 4, 'Angela Carrizales', 'EN-222', 0);

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
('MECA', 'Engineering in mechatronics'),
('PYMES', 'Engineering in management PYMES');

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
('EN-111', 3, 17),
('EN-122', 9, 17),
('EN-143', 3, 15),
('EN-222', 4, 16),
('EN-333', 6, 16);

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
(15),
(16),
(17);

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
(5, 'Unit 1 2018-2', '2018-05-01', '2018-05-31'),
(6, 'Unit 2 2018-2', '2018-06-01', '2018-06-30'),
(7, 'Unit 3 2018-2', '2018-07-01', '2018-07-31'),
(8, 'Unit 4 2018-2', '2018-08-01', '2018-08-31');

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
(15, 'Brian Becerra', 'brian', 'brian', 'Brian@Brian.com', 'Teacher'),
(16, 'Angela Carrizales', 'angie', 'angie', 'angel@gmail.com', 'Teacher'),
(17, 'Talia Caballero', 'talia', 'talis', 'talia@gmail.com', 'Teacher'),
(18, 'Mario Rodriguez', 'mario', 'mario', 'mario@gmail.com', 'Administrator');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

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
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `num_empleado` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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