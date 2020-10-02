-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2020 a las 09:06:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

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
  `tipo_vianda` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dirigido_table`
--

INSERT INTO `dirigido_table` (`id_dirigidoA`, `tipo_vianda`) VALUES
(6, 'Celiaca'),
(7, 'Vegana'),
(8, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viandas`
--

CREATE TABLE `viandas` (
  `nombre` varchar(285) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_dirigidoA` int(11) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `id_vianda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viandas`
--

INSERT INTO `viandas` (`nombre`, `precio`, `id_dirigidoA`, `descripcion`, `id_vianda`) VALUES
('Milanesa', 250, 8, 'Te presentamos la \"gran milanesa\", hecha con ingredientes de primera calidad. Este combo\r\nviene con una porcion de papas y una milanesa de carne para una persona, ideal para un buen almuerzo.', 4),
('Ensalada vegana', 130, 7, 'La ensalada vegana es lo nuevo de la casa, tenemos opciones para todos los gustos. Incluye zanahoria, tomate, lechuga y rucula, no te quedes sin la tuya!!!', 5),
('Fideos con salsa', 185, 8, 'Lo ideal para matar este frio es comer unos ricos fideos con salsa y como siempre en Mi viandita! tenemos para ofrecerte lo mejor. Para hacer tu pedido podes encontrarnos en la seccion \"contactos\".', 6),
('Tarta', 230, 8, 'Tarta de jamon y queso', 8),
('Queso', 220, 6, 'Queso para acompañar la comida', 9),
('Empanadas', 380, 8, 'Empanadas de carne', 28),
('Canelones', 180, 7, 'Canelones de verdura', 29);

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
  MODIFY `id_dirigidoA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `viandas`
--
ALTER TABLE `viandas`
  MODIFY `id_vianda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
