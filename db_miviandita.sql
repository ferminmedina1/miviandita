-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2020 a las 17:53:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vianda` int(11) NOT NULL,
  `comentario` varchar(280) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_user`, `id_vianda`, `comentario`, `calificacion`) VALUES
(145, 2, 8, 'Le falta mas gusto', 3),
(147, 2, 6, 'Buena atención.', 4),
(163, 5, 55, 'Buenas empanadas', 4),
(164, 5, 59, 'Muy buena comida!', 4),
(173, 5, 57, 'Excelente servicio!!!', 5),
(179, 30, 8, 'Esta buena!', 4),
(180, 30, 57, 'Perfecta.', 5),
(181, 30, 60, 'Me la trajeron con tomate pero estaba buena.', 3),
(186, 30, 4, 'Muy rica!', 5),
(189, 32, 59, 'Todo muy rico!', 5);

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
(8, 'clasica'),
(27, 'Vegetariana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `password`, `rol`) VALUES
(2, 'Admin', '$2y$10$pkMdRWaHmCukD9InkkWSGePAq6OMoXjFtpxt4E6AfYbnmiITyNQY.', 'administrador'),
(5, 'Arleo.Agustin', '$2y$10$7PWf5i0glcDGda47Sa0XC.d/g4jVHOwxnTxUQmT2iI.P1/g6ZgdFe', 'cliente'),
(30, 'ferminmedina1', '$2y$10$p.tj3ycZbalpYgNHAfSjpeziOsDz/0MT7cTRa6xHVoQAajT.tNk8i', 'administrador'),
(32, 'pepe', '$2y$10$k1E2wX2uAnmy13wOxCJ9sedLhteaF6hnaz9uH4z0TNVpMgqlvgSCK', 'cliente');

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
('Fideos', 185, 8, 'Lo ideal para matar este frio es comer unos ricos fideos con salsa y como siempre en Mi viandita! tenemos para ofrecerte lo mejor. Para hacer tu pedido podes encontrarnos en la seccion \"contactos\".', 6),
('Tarta', 230, 8, 'Tarta de jamon y queso', 8),
('Empanadas', 550, 8, 'Empanadas de carne', 55),
('Emapandas de verdura', 400, 27, 'Empanadas de verdura', 56),
('Ensalada de lechuga y tomate', 150, 6, 'Ensalada de verduras, apta para personas celiacas', 57),
('Papas fritas', 170, 8, 'Porción de fritas para acompañar', 58),
('Arroz con huevo', 120, 6, 'Bandeja de arroz con huevo triturado', 59),
('Ensalada de zanahoria y cebolla', 100, 27, 'Bandeja mediana de zanahoria rallada y cebolla en rodajas', 60),
('Medallones de pollo', 250, 8, 'Medallones de pollo con queso dentro', 61),
('Tarta de verdura', 130, 27, 'Tarta de acelga, rinde para 4 personas', 62);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `FK_id_vianda` (`id_vianda`),
  ADD KEY `FK_id_user` (`id_user`) USING BTREE;

--
-- Indices de la tabla `dirigido_table`
--
ALTER TABLE `dirigido_table`
  ADD PRIMARY KEY (`id_dirigidoA`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `dirigido_table`
--
ALTER TABLE `dirigido_table`
  MODIFY `id_dirigidoA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `viandas`
--
ALTER TABLE `viandas`
  MODIFY `id_vianda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_vianda`) REFERENCES `viandas` (`id_vianda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viandas`
--
ALTER TABLE `viandas`
  ADD CONSTRAINT `viandas_ibfk_1` FOREIGN KEY (`id_dirigidoA`) REFERENCES `dirigido_table` (`id_dirigidoA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
