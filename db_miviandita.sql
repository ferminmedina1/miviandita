-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 00:08:55
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_miviandita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigido_table`
--

CREATE TABLE `dirigido_table` (
  `id_dirigidoA` int(11) NOT NULL,
  `nombre-dirigido` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viandas`
--

CREATE TABLE `viandas` (
  `nombre` varchar(285) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_dirigidoA` int(11) NOT NULL,
  `celiacos` tinyint(1) NOT NULL,
  `id_vianda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dirigido_table`
--
ALTER TABLE `dirigido_table`
  ADD PRIMARY KEY (`id_dirigidoA`);

--
-- Indices de la tabla `viandas`
--
ALTER TABLE `viandas`
  ADD PRIMARY KEY (`id_vianda`),
  ADD KEY `id_dirigidoA` (`id_dirigidoA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dirigido_table`
--
ALTER TABLE `dirigido_table`
  MODIFY `id_dirigidoA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `viandas`
--
ALTER TABLE `viandas`
  MODIFY `id_vianda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viandas`
--
ALTER TABLE `viandas`
  ADD CONSTRAINT `viandas_ibfk_1` FOREIGN KEY (`id_dirigidoA`) REFERENCES `dirigido_table` (`id_dirigidoA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
