-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 05:58:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `puntaje` int(5) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `contenido`, `puntaje`, `id_serie`, `id_usuario`) VALUES
(27, 'La serie esta espectacular', 5, 16, 1),
(33, 'La serie esta espectacular', 5, 16, 4),
(36, 'Podria estar mejor', 3, 16, 1),
(39, 'Buena', 4, 16, 1),
(41, 'Buena', 4, 18, 14),
(42, 'Me encanto la serie', 5, 16, 14),
(53, 'Buena', 4, 16, 1),
(54, 'La serie esta espectacular', 5, 16, 1),
(57, 'Me encanto la serie', 4, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `nombre_director` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `nombre_director`, `edad`, `nacionalidad`) VALUES
(14, 'Nicolas', 22, 'Argentina'),
(15, 'Florencia', 21, 'Argentina'),
(16, 'MariaEditada', 44, 'Suecia'),
(18, 'Director11', 44, 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `nombre_serie` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id`, `nombre_serie`, `genero`, `imagen`, `id_director`) VALUES
(16, 'La casa de papel', 'Drama', 'laC22FF.tmp', 14),
(18, 'The last dance', 'Deporte', 'the64F0.tmp', 14),
(19, 'Elite', 'Drama', 'eliB572.tmp', 15),
(20, 'Vikings', 'Drama', 'vik44B8.tmp', 16),
(21, 'Apache', 'Deporte', 'apaB62.tmp', 18),
(22, 'Flash', 'Drama', 'flaE973.tmp', 15),
(28, 'NNNNN', 'Cualquiera', 'the1314.tmp', 16),
(29, 'Colony', 'Accion', 'col9F9B.tmp', 14),
(30, 'Chernobyl', 'Drama', 'che514.tmp', 15),
(31, 'b', 'Deporte', 'falCC4A.tmp', 16),
(34, 'Serie editada2', 'Drama', 'theA942.tmp', 16),
(35, 'uuuuuuuuuuuu', 'Cualquiera', 'fee44E8.tmp', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `rol`) VALUES
(1, 'nico@gmail.com', '$2y$10$t/Ql.rjxhA3gpLPeydUS.OeMawr01LOFdXEb7xHzmafwFEt88/Ya2', 'administrador'),
(4, 'usuario@hotmail.com', '$2y$10$yljru2nWDbzy0k3SrxUyzOfz.0ZCap4/8yKybtI9rGhjMZl8YBVW2', 'administrador'),
(10, 'UsuarioNuevo@hotmail.com', '$2y$10$z1YfEcUqZ6jDTCPJV119Fuh/EHRCjE8Z4V6TiFCVe2kuwWbul93A2', ''),
(14, 'pepe@gmail.com', '$2y$10$QJGQaeKICFeiKcx2Tt/LM.w7Vrsb0iGFQEwP2tLwF8UYqW8v./aEW', ''),
(17, 'q@gmail.com', '$2y$10$xkdeCbsyAPhXS9jTcuRGTeYpUHOPKO.L9gFiyVf47.WvxTwOy78SW', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_serie` (`id_serie`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
