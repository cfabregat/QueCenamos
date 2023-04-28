-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2023 a las 00:36:39
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
-- Estructura de tabla para la tabla `calificacionplato`
--

CREATE TABLE `calificacionplato` (
  `idcalificacionplato` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idplato` int(10) UNSIGNED NOT NULL,
  `calificacion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacionplato`
--

INSERT INTO `calificacionplato` (`idcalificacionplato`, `idusuario`, `idplato`, `calificacion`) VALUES
(1, 2, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritoplato`
--

CREATE TABLE `favoritoplato` (
  `idfavoritoplato` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idplato` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favoritoplato`
--

INSERT INTO `favoritoplato` (`idfavoritoplato`, `idusuario`, `idplato`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `idplato` int(10) NOT NULL,
  `idrestaurante` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`idplato`, `idrestaurante`, `nombre`, `descripcion`, `foto`, `precio`) VALUES
(1, 1, 'Sunday', 'Cono de Helado', '', 349.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendar`
--

CREATE TABLE `recomendar` (
  `idrecomendar` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idplato` int(10) UNSIGNED NOT NULL,
  `idusuario_a_recomnedar` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recomendar`
--

INSERT INTO `recomendar` (`idrecomendar`, `idusuario`, `idplato`, `idusuario_a_recomnedar`) VALUES
(1, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `idrestaurante` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`idrestaurante`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'McDonald´s', 'Florida 456', '541158695475');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(25) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `idrestautrante` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `email`, `clave`, `rol`, `idrestautrante`) VALUES
(2, 'cmfabregat@gmail.com', '1234', 'admin', NULL),
(3, 'claudiachauque9@gmail.com', '1234', 'admin', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacionplato`
--
ALTER TABLE `calificacionplato`
  ADD PRIMARY KEY (`idcalificacionplato`);

--
-- Indices de la tabla `favoritoplato`
--
ALTER TABLE `favoritoplato`
  ADD PRIMARY KEY (`idfavoritoplato`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`idplato`);

--
-- Indices de la tabla `recomendar`
--
ALTER TABLE `recomendar`
  ADD PRIMARY KEY (`idrecomendar`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`idrestaurante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacionplato`
--
ALTER TABLE `calificacionplato`
  MODIFY `idcalificacionplato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `favoritoplato`
--
ALTER TABLE `favoritoplato`
  MODIFY `idfavoritoplato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idplato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recomendar`
--
ALTER TABLE `recomendar`
  MODIFY `idrecomendar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `idrestaurante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
