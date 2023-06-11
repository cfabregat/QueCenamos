-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2023 a las 04:00:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quecenamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idcalificacion` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idplato` int(10) UNSIGNED NOT NULL,
  `calificacion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idcalificacion`, `idusuario`, `idplato`, `calificacion`) VALUES
(1, 2, 1, 5),
(2, 6, 8, 3),
(3, 6, 9, 5),
(4, 6, 10, 3),
(5, 6, 11, 5),
(6, 6, 12, 1),
(7, 6, 13, 1),
(8, 6, 14, 3),
(9, 6, 15, 3),
(10, 6, 16, 0),
(11, 6, 17, 0),
(12, 6, 18, 0),
(13, 6, 19, 0),
(14, 6, 20, 3),
(15, 6, 21, 3),
(16, 6, 22, 3),
(17, 6, 23, 3),
(18, 6, 24, 3),
(19, 6, 25, 3),
(20, 6, 26, 3),
(21, 6, 27, 3),
(22, 6, 28, 3),
(23, 6, 29, 3),
(24, 6, 30, 3),
(25, 6, 31, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `idplato` int(10) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`idplato`, `idusuario`, `nombre`, `descripcion`, `foto`, `precio`, `fecha`, `ubicacion`) VALUES
(14, 6, 'Nombre', 'Descripcion', '', 0.00, '2023-06-10 16:52:00', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(15, 6, 'Nombre', 'Descripcion', '', 0.00, '2023-06-10 16:52:00', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(20, 6, 'Nombre', 'Descripcion', 'C:\\xampp\\tmp\\php3E29.tmp', 0.00, '2023-06-10 16:54:51', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(21, 6, 'Nombre', 'Descripcion', 'C:\\xampp\\tmp\\php6B64.tmp', 0.00, '2023-06-10 16:54:51', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(22, 6, 'Nombre', 'Descripcion', 'C:\\xampp\\tmp\\php990.tmp', 0.00, '2023-06-10 17:01:21', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(23, 6, 'Nombre', 'Descripcion', 'C:\\xampp\\tmp\\php6E94.tmp', 0.00, '2023-06-10 17:01:21', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(24, 6, 'Nombre', 'Descripcion', 'fotos/6sibilia-paula-el-hombre-postorganico.pdf', 0.00, '2023-06-10 17:03:50', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(25, 6, 'Nombre', 'Descripcion', 'fotos/6', 0.00, '2023-06-11 03:44:17', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(26, 6, 'Nombre', 'Descripcion', 'fotos/6app.ts', 0.00, '2023-06-11 03:46:53', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(27, 6, 'Nombre', 'Descripcion', 'fotos/6tca-desconsolidado-cierre-web-WL-PRD-22-31m', 0.00, '2023-06-11 03:47:02', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(28, 6, 'Nombre', 'Descripcion', 'fotos/6Notas Primer Parcial 1er2023.xlsx', 0.00, '2023-06-11 03:48:45', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(29, 6, 'Nombre', 'Descripcion', 'fotos/6RADIANDO 004.pdf', 0.00, '2023-06-11 03:49:18', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(30, 6, 'Nombre', 'Descripcion', 'fotos/6O\'Reilly Git Pocket Guide 2013.pdf', 0.00, '2023-06-11 03:50:46', 'Nombre<br />Direccion<br />Telefono<br />Red Social'),
(31, 6, 'Nombre', 'Descripcion', 'fotos/6O\'Reilly Git Pocket Guide 2013.pdf', 0.00, '2023-06-11 03:51:26', 'Nombre<br />Direccion<br />Telefono<br />Red Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `idrecomendar` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idplato` int(10) UNSIGNED NOT NULL,
  `idusuario_a_recomnedar` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recomendaciones`
--

INSERT INTO `recomendaciones` (`idrecomendar`, `idusuario`, `idplato`, `idusuario_a_recomnedar`) VALUES
(1, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(25) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `email`, `clave`, `rol`) VALUES
(2, 'cmfabregat@gmail.com', '1234', 'admin'),
(3, 'claudiachauque9@gmail.com', '1234', 'admin'),
(6, 'cfabregat@webrecursos.com.ar', 'asdf', 'usuario'),
(30, 'boschagustina@gmail.com', '1', 'usuario'),
(38, 'a', 'a', 'usuario'),
(39, 'v', 'f', 'usuario'),
(40, 'ifabregat04@gmail.com', 'a', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idcalificacion`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idplato`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`idrecomendar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idcalificacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idplato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `idrecomendar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
