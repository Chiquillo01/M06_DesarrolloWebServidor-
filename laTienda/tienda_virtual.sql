-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 08:25:06
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
-- Base de datos: `tienda_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`) VALUES
(1, 'Cartas_Sueltas', 'assets/img/category_img_01.jpg'),
(2, 'Cajas', 'assets/img/category_img_02.jpg'),
(3, 'Accesorios', 'assets/img/category_img_03.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `perfil` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(80) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `email_user` varchar(80) NOT NULL,
  `proceso` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `id_categoria`) VALUES
(1, '25th Anniversary Rarity Collection', 'Caja de Sobres', 86.49, 32, 'assets/img/carta1.jpg', 2),
(2, 'Legendary Duelists: Soulburning Volcano ', 'Caja de Sobres', 26.48, 6, 'assets/img/carta1.jpg', 2),
(3, 'Legendary Duelists: Synchro Storm', 'Caja de Sobres', 23.40, 2, 'assets/img/carta1.jpg', 2),
(4, 'Ninja Grandmaster Hanzo', '(CO) // (OP20-EN016)', 0.10, 34, 'assets/img/carta1.jpg', 1),
(5, 'Nova Drytron', '(UR) // (GEIM-SP 033/ GEIM-033)', 18.00, 2, 'assets/img/carta2.webp', 1),
(6, 'Fusión del Destino', '(UR) // (MP20-075/PROMO)', 25.00, 7, 'assets/img/carta3.webp', 1),
(7, 'Noche Mecánica', '(UR) // (BLCR-SP 007/BLCR-007)', 10.00, 4, 'assets/img/carta1.jpg', 1),
(8, 'Olla de la Prosperidad', '(PSE) // (MP22-037/PROMO)', 13.00, 5, 'assets/img/carta5.jpg', 1),
(9, 'Ninja Grandmaster Hanzo', '(CO) // (OP20-EN016)', 0.10, 34, 'assets/img/carta1.jpg', 1),
(10, 'Nova Drytron', '(UR) // (GEIM-SP 033/ GEIM-033)', 18.00, 2, 'assets/img/carta1.jpg', 1),
(11, 'Fusión del Destino', '(UR) // (MP20-075/PROMO)', 25.00, 7, 'assets/img/carta1.jpg', 1),
(12, 'Noche Mecánica', '(UR) // (BLCR-SP 007/BLCR-007)', 10.00, 4, 'assets/img/carta1.jpg', 1),
(13, 'Olla de la Prosperidad', '(PSE) // (MP22-037/PROMO)', 13.00, 5, 'assets/img/carta1.jpg', 1),
(14, 'Kashtira Fenrir', '(UR) // (DABL-SP 012/DABL-012)', 14.50, 4, 'assets/img/carta6.jpg', 1),
(15, 'Gobernante Oscuro No Más', '(CO) // (SDAZ-SP 030/SDAZ-030)', 0.15, 24, 'assets/img/carta7.webp', 1),
(16, '¡Pon en Juego tu Alma!', '(UR) // (WISU-SP 023/WISU-023)', 15.99, 1, 'assets/img/carta8.webp', 1),
(17, 'Salamangrande de Fuego', '(UR) // (LD10-SP 001/LD10-001)', 13.00, 7, 'assets/img/carta9.webp', 1),
(18, 'Carpeta I:P Masquerena', '(I:P Masquerena 9-Pocket Duelist Portfolio - Carpetas)', 7.99, 4, 'assets/img/carta1.jpg', 3),
(19, 'Tapete Albaz Espuma', '(Albaz - Ecclesia - Tri-Brigade Playmat - Tapetes)', 9.80, 13, 'assets/img/carta1.jpg', 3),
(20, 'Tapete Black Espuma', '(Ultimate Guard Playmat (Black) - Tapetes)', 10.00, 1, 'assets/img/carta1.jpg', 3),
(21, 'Tapete Inicial Cartón', '(Duel Power Gameboard - Tapetes)', 0.45, 3, 'assets/img/carta1.jpg', 3),
(22, 'Tapete YuseiJack Espuma', '(Yusei & Jack 2-Player Playmat - Tapetes)', 35.00, 1, 'assets/img/carta1.jpg', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
