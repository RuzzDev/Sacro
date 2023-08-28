-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2023 a las 05:28:54
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
-- Base de datos: `sacro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_renovacion` date DEFAULT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `plan_contratado` varchar(50) NOT NULL DEFAULT 'SIN ASIGNAR',
  `foto` text NOT NULL,
  `saldo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `matricula`, `nombre`, `fecha_renovacion`, `telefono`, `edad`, `plan_contratado`, `foto`, `saldo`) VALUES
(1, 'PG0001', '000 PUBLICO GENERAL', '2030-12-31', '5512345678', 0, 'VISITA DIARIA', 'hombre.png', NULL),
(2, 'AMX001', 'AVILA MIGUEL XOCHITL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(3, 'BFWE01', 'BARRAGON FLORES WENDOLIN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(4, 'CGSA01', 'CRUZ GASPAR SAYRA', NULL, '', 0, 'SIN ASIGNAR', 'logo.png', NULL),
(5, 'ERFE01', 'ESQUIL RODRIGUEZ FERNANDA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(6, 'GBLE01', 'GUTIERREZ BARRIOS LEONOR', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(7, 'HGJF01', 'HERNANDEZ GODINEZ JESUS FERNANDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(8, 'VCJM01', 'VILLEGAS CONTRERAS JESSICA MONSERRAT', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `stock` int(11) NOT NULL,
  `tipo` varchar(12) NOT NULL DEFAULT 'producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `foto`, `nombre`, `precio_compra`, `precio_venta`, `stock`, `tipo`) VALUES
(1, 'suscripcion.png', 'VISITA DIARIA', 1, 40, 1, 'plan'),
(2, 'suscripcion.png', 'SEMANAL', 1, 120, 1, 'plan'),
(3, 'suscripcion.png', 'MENSUALIDAD', 1, 380, 1, 'plan'),
(4, 'suscripcion.png', 'SEMESTRAL', 1, 2100, 1, 'plan'),
(5, 'suscripcion.png', 'ANUALIDAD', 1, 4000, 0, 'plan'),
(6, 'suscripcion.png', 'MENSUALIDAD ESTUDIANTE', 1, 280, 1, 'plan'),
(7, 'suscripcion.png', 'MENSUALIDAD 2 PERSONAS', 1, 325, 1, 'plan'),
(23, 'carrito.png', 'Gomitas', 1, 8, 1, 'producto'),
(24, 'carrito.png', 'Chicle', 1, 4, 1, 'producto'),
(29, 'carrito.png', 'Proteina Gold', 1, 35, 1, 'producto'),
(32, 'carrito.png', 'Pre-entreno Psychotic Negro', 1, 30, 1, 'producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `clave` text NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ALTA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `matricula`, `clave`, `cargo`, `estado`) VALUES
(1, 'ADMINISTRADOR', 'ADMIN', 'ADMIN', 'ADMINISTRADOR', 'ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `total` float NOT NULL,
  `fecha_venta` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
