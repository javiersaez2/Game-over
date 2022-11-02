-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2022 a las 19:28:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `game_over`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `idioma`) VALUES
(1, 'espanol'),
(2, 'euskera'),
(3, 'ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `stock`, `precio`, `foto`, `valoracion`, `id_tipo`) VALUES
(1, 3, 1600, 'Ordenadores/Alienware Aurora R8.png', 4, 1),
(3, 2, 3000, 'Ordenadores/Alienware Aurora R12.png', 4, 1),
(4, 5, 2600, 'Ordenadores/Asus Rog strix gt15.jpg', 4, 1),
(5, 12, 900, 'Ordenadores/MSI trident X.jpg', 4, 1),
(6, 21, 24.99, 'Ratones/Corsair M65 Elite.jpg', 4, 2),
(8, 9, 54.99, 'Ratones/Logitech G403.png', 4, 2),
(9, 14, 69.99, 'Ratones/Razer DeathAdder.jpg', 4, 2),
(10, 45, 349.99, 'Consolas/nintendo switch.jpg', 4, 3),
(12, 3, 649.99, 'Consolas/Sony PS5.jpg', 4, 3),
(13, 10, 649.99, 'Consolas/Xbox Series S.jpg', 4, 3),
(14, 5, 79.99, 'Auriculares/Logitech G432.jpg', 4, 4),
(16, 5, 139.99, 'Auriculares/Razer Nari Ultimate.jpg', 4, 4),
(17, 145, 69.99, 'Juegos/Pokemon leyendas arceus.jpg', 4, 5),
(19, 145, 39.99, 'Juegos/Red dead redeption.png', 4, 5),
(20, 145, 9.99, 'Juegos/Undertale.jpg', 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textos`
--

CREATE TABLE `textos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `idioma` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `textos`
--

INSERT INTO `textos` (`id`, `id_producto`, `idioma`, `titulo`, `descripcion`) VALUES
(2, 1, 1, 'Alienware Aurora R8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(3, 1, 2, 'Alienware Aurora R8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(4, 1, 3, 'Alienware Aurora R8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(5, 3, 1, 'Alienware Aurora R12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(6, 3, 2, 'Alienware Aurora R12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(7, 3, 3, 'Alienware Aurora R12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(8, 4, 1, 'Asus Rog strix gt15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(9, 4, 2, 'Asus Rog strix gt15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(10, 4, 3, 'Asus Rog strix gt15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(11, 5, 1, 'MSI trident X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(12, 5, 2, 'MSI trident X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(13, 5, 3, 'MSI trident X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(14, 6, 1, 'Corsair M65 Elite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(15, 6, 2, 'Corsair M65 Elite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(16, 6, 3, 'Corsair M65 Elite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(17, 8, 1, 'Logitech G403', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(18, 8, 2, 'Logitech G403', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(19, 8, 3, 'Logitech G403', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(20, 9, 1, 'Razer DeathAdder', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(21, 9, 2, 'Razer DeathAdder', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(22, 9, 3, 'Razer DeathAdder', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(23, 10, 1, 'nintendo switch', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(24, 10, 2, 'Nintendo Switch', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(25, 10, 3, 'Nintendo Switch', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(26, 12, 1, 'Sony PS5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(27, 12, 2, 'Sony PS5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(28, 12, 3, 'Sony PS5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(29, 13, 1, 'Xbox series S', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(30, 13, 2, 'Xbox series S', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(31, 13, 3, 'Xbox series S', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(32, 14, 1, 'Logitech G432', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(33, 14, 2, 'Logitech G432', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(34, 14, 3, 'Logitech G432', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(35, 16, 1, '	\r\nRazer Nari Ultimate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(36, 16, 2, '	\r\nRazer Nari Ultimate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(37, 16, 3, '	\r\nRazer Nari Ultimate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(38, 17, 1, 'Pokemon leyendas arceus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(39, 17, 2, 'Pokemon leyendas arceus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(40, 17, 3, 'Pokemon leyendas arceus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(41, 19, 1, 'Red dead redeption', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(42, 19, 2, 'Red dead redeption', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(43, 19, 3, 'Red dead redeption', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(44, 20, 1, 'Undertale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(45, 20, 2, 'Undertale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.'),
(46, 20, 3, 'Undertale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque orci eu commodo ornare. Duis ligula purus, laoreet eu ligula non, gravida pharetra neque. In facilisis tellus hendrerit sodales tempor. Vivamus sodales sem sit amet mauris luctus ultricies. Cras maximus varius finibus. Aenean nec tincidunt felis, ac bibendum nibh.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre`) VALUES
(1, 'ordenador'),
(2, 'raton'),
(3, 'consola'),
(4, 'auricular'),
(5, 'juego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `permisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasena`, `permisos`) VALUES
(1, 'cliente_prueba', 'c893bad68927b457dbed39460e6afd62', 0),
(2, 'trabajador_prueba', 'c893bad68927b457dbed39460e6afd62', 1),
(5, 'administrador_prueba', 'c893bad68927b457dbed39460e6afd62', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `textos`
--
ALTER TABLE `textos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `textos`
--
ALTER TABLE `textos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
