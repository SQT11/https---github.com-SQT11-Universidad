-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 19:20:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `asig_id` int(11) NOT NULL,
  `asig_nombre` varchar(40) DEFAULT NULL,
  `asig_descripcion` varchar(200) DEFAULT NULL,
  `asig_facultad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asig_id`, `asig_nombre`, `asig_descripcion`, `asig_facultad`) VALUES
(1, 'diseño', 'Realizar diseños de todo tipo', 'artes'),
(2, 'idiomas', 'Entendimiento de los idiomas', 'artes'),
(3, 'literatura', 'Comprension y analisis', 'humanidades'),
(4, 'filosofia', 'El porque del todo', 'humanidades'),
(6, 'teatro', 'actuacion y mas', 'artes y humanidades'),
(9, 'prueba', 'prueba', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `cal_id` int(11) NOT NULL,
  `cal_calificacion` double DEFAULT NULL,
  `cal_porcentaje` double DEFAULT NULL,
  `per_id` int(11) DEFAULT NULL,
  `asig_id` int(11) DEFAULT NULL,
  `mat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`cal_id`, `cal_calificacion`, `cal_porcentaje`, `per_id`, `asig_id`, `mat_id`) VALUES
(1, 5, 100, 1, 4, NULL),
(2, 4, 100, 2, 2, NULL),
(3, 3.5, 100, 3, 3, NULL),
(4, 2, 100, 4, 4, NULL),
(6, 5, 100, 6, 6, NULL),
(7, 3.5, 100, 7, 1, NULL),
(9, 2, 100, 9, 4, NULL),
(11, 2, 100, 11, 6, NULL),
(14, 2, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `mat_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `asig_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `per_id` int(11) NOT NULL,
  `per_nombre` varchar(40) DEFAULT NULL,
  `per_documento` int(11) DEFAULT NULL,
  `per_correo` varchar(40) DEFAULT NULL,
  `per_telefono` int(11) DEFAULT NULL,
  `per_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_id`, `per_nombre`, `per_documento`, `per_correo`, `per_telefono`, `per_tipo`) VALUES
(1, 'Santiago Quintero Torres', 1007232017, 'ensanyquintero@gmail.com', 2147483647, 'Estudiante'),
(2, 'Estefania lopez torres', 123123123, 'estefania@gmail.com', 2147483647, 'Estudiante'),
(3, 'katherine buritica', 121321321, 'kathe@gmail.com', 2147483647, 'Estudiante'),
(4, 'Luz mirian castañeda', 13232323, 'luz@gmail.com', 2147483647, 'Estudiante'),
(5, 'Alvaro javier torres', 156456321, 'alvaro@gmail.com', 2147483647, 'Estudiante'),
(6, 'Salome murcia Torres', 1214567654, 'salo@gmail.com', 2147483647, 'Estudiante'),
(7, 'luisa fernanda torres', 2147483647, 'luisa@gmail.com', 324567890, 'Estudiante'),
(8, 'elver galarga ', 100832156, 'elver@gmail.com', 2147483647, 'Estudiante'),
(9, 'pepitp perez', 1207898978, 'pepito@gmail.com', 2147483647, 'Estudiante'),
(11, 'carmenza toro', 100890675, 'carmenza@gmail.com', 2147483647, 'Estudiante'),
(12, 'luz de sol ', 100078908, 'luzsol@gmail.com', 2147483647, 'Estudiante'),
(13, 'wewe', 2, 'sdf', 2, ''),
(15, 'carlos', 123, 'c@c.com', 987, 'prueba'),
(16, 'aaaaa', 123123, 'aaa@.com', 32131231, 'opcion2'),
(17, 'ddddd', 333333, 'ensantyquintero@gmail.com', 555555, 'prueba'),
(19, 'aaaaaaaaaaaa', 2222222, 'aaaaa@.com', 1233123, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `reg_usuario` varchar(100) DEFAULT NULL,
  `reg_contrasena` varchar(100) DEFAULT NULL,
  `reg_correo` varchar(100) DEFAULT NULL,
  `reg_tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `reg_usuario`, `reg_contrasena`, `reg_correo`, `reg_tipo`) VALUES
(1, 'carlos', '123', 'carlos123@gmail.com', 'Estudiante'),
(2, 'Santiago', '123', 'Santiago123@gmail.com', 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `sal_id` int(11) NOT NULL,
  `sal_nombre` varchar(40) DEFAULT NULL,
  `sal_cantidad` int(11) DEFAULT NULL,
  `asig_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`sal_id`, `sal_nombre`, `sal_cantidad`, `asig_id`) VALUES
(2, 'Teleinformatica', 30, NULL),
(3, 'Cancha Sena', 500, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`asig_id`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`cal_id`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `asig_id` (`asig_id`),
  ADD KEY `mat_id` (`mat_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `asig_id` (`asig_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`sal_id`),
  ADD KEY `asig_id` (`asig_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `asig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`asig_id`) REFERENCES `asignatura` (`asig_id`),
  ADD CONSTRAINT `calificacion_ibfk_3` FOREIGN KEY (`mat_id`) REFERENCES `matricula` (`mat_id`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`asig_id`) REFERENCES `asignatura` (`asig_id`);

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `salon_ibfk_1` FOREIGN KEY (`asig_id`) REFERENCES `asignatura` (`asig_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
