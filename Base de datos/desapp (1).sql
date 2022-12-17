-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2022 a las 18:53:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_de_compra`
--

CREATE TABLE `informacion_de_compra` (
  `compra_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `factura_id` int(11) DEFAULT NULL,
  `informe_detallado` varchar(50) DEFAULT NULL,
  `tipo_producto_id` int(20) DEFAULT NULL,
  `tipo_de_producto` varchar(50) DEFAULT NULL,
  `nombre_producto_id` int(20) DEFAULT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `marca_id` int(20) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `proveedor_id` int(20) DEFAULT NULL,
  `nombre_proveedor` varchar(50) DEFAULT NULL,
  `precio_unitario` float DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `precio_compra` float DEFAULT NULL,
  `precio_venta_unitario` float DEFAULT NULL,
  `unidad` varchar(11) DEFAULT NULL,
  `compra_pagada` float DEFAULT NULL,
  `compra_vencida` float DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `informacion_de_compra`
--

INSERT INTO `informacion_de_compra` (`compra_id`, `date`, `factura_id`, `informe_detallado`, `tipo_producto_id`, `tipo_de_producto`, `nombre_producto_id`, `nombre_producto`, `marca_id`, `marca`, `proveedor_id`, `nombre_proveedor`, `precio_unitario`, `cantidad`, `precio_compra`, `precio_venta_unitario`, `unidad`, `compra_pagada`, `compra_vencida`, `fecha_caducidad`) VALUES
(2, '2022-12-17', NULL, 'Updated Purchase', 5, 'Pikachu V Box', 2, 'holka', 33, 'feo', 3, 'Niantic', 1, 1, 1, 1, '20', 1, 1, '2023-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `marca_id` int(100) NOT NULL,
  `marca` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`marca_id`, `marca`) VALUES
(23, 'ELITE TRAINER BOX FUSION STRIKE (ESP)'),
(24, 'CARTAS POKÉMON FUSION STRIKE BOOSTER ING'),
(25, 'CARTAS POKÉMON: VIVID VOLTAGE BOOSTER (ING)'),
(26, 'CHAMPIONS PATH PIN BOX ELDEGOSS (ESP)'),
(27, 'KLEAVOR VSTAR PREMIUM COLLECTION (ESP)'),
(28, 'Caja 36 Sobres Pokemon Astral Radiance'),
(29, 'Pokemon Pikachu Premium Celebrations/celebraciones (chino)'),
(30, 'Funko Pop!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nombre_producto_id` int(20) NOT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `marca_id` int(20) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `tipo_de_producto_id` int(15) DEFAULT NULL,
  `tipo_de_producto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nombre_producto_id`, `nombre_producto`, `marca_id`, `marca`, `tipo_de_producto_id`, `tipo_de_producto`) VALUES
(2, 'holka', NULL, 'Caja 36 Sobres Pokemon Astral Radiance', NULL, NULL),
(3, 'vivi', NULL, 'Pokemon Pikachu Premium Celebrations/celebraciones', NULL, NULL),
(5, 'Forum', NULL, 'Adidas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ventas`
--

CREATE TABLE `producto_ventas` (
  `ventas_id` int(20) NOT NULL,
  `date` date DEFAULT NULL,
  `invoice` int(20) DEFAULT NULL,
  `informe` varchar(50) DEFAULT NULL,
  `cliente_id` int(20) DEFAULT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `correo_cliente` varchar(30) DEFAULT NULL,
  `tipo_de_producto_id` int(20) DEFAULT NULL,
  `tipo_de_producto` varchar(50) DEFAULT NULL,
  `nombre_producto_id` int(20) DEFAULT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `marca_id` int(20) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `precio_venta_unitario` float DEFAULT NULL,
  `precio_total` float DEFAULT NULL,
  `cantidad_total` float DEFAULT NULL,
  `descuento_total` float DEFAULT NULL,
  `precio_descuento` float DEFAULT NULL,
  `ventas_pagadas` float DEFAULT NULL,
  `ventas_vencidas` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto_ventas`
--

INSERT INTO `producto_ventas` (`ventas_id`, `date`, `invoice`, `informe`, `cliente_id`, `nombre_cliente`, `telefono`, `correo_cliente`, `tipo_de_producto_id`, `tipo_de_producto`, `nombre_producto_id`, `nombre_producto`, `marca_id`, `marca`, `cantidad`, `precio_venta_unitario`, `precio_total`, `cantidad_total`, `descuento_total`, `precio_descuento`, `ventas_pagadas`, `ventas_vencidas`) VALUES
(0, '2022-12-16', 10, 'producto vendido', NULL, NULL, NULL, 'slkjdlsakd@gmail.com', NULL, 'Funko Pop!', 1, 'asdasd', NULL, 'CARTAS POKÉMON FUSION STRIKE BOOSTER ING', 3, 5, 15, 15, 0, 15, 15, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `proveedor_id` int(100) NOT NULL,
  `nombre_proveedor` varchar(250) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `deuda` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`proveedor_id`, `nombre_proveedor`, `telefono`, `direccion`, `deuda`) VALUES
(1, 'Panini', ' +880 2 988 8452  ', 'ZN Tower, Plot# 02  \r\nRoad # 08, Gulshan - 1  \r\nDhaka - 1212.  ', 0),
(2, 'Salo', '(+8802) 8878603', '89 Gulshan Ave, Dhaka 1212', 0),
(3, 'Niantic', '+88-02-8833047-56', '48, Mohakhali C/A Dhaka 1212', 0),
(4, 'Hasbro', '02-58611001', 'Dhaka', 0),
(5, 'Mattel', '7850125690', 'Allace Avenue', 2699),
(6, 'Imex porta', '7410256900', '2610 Courtright Street', 9666),
(7, 'Siuuu', '7890240010', '3667 Jerome Avenue', 990),
(9, 'ABC Drugs', '78956421', 'Sample Address', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `identity`) VALUES
(1, 'staff', '1A1DC91C907325C69271DDF0C944BC72', 'Staff'),
(3, 'jsmith', 'a9f590d0b836cb9cacd52429c7e944a0', 'Staff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_producto`
--

CREATE TABLE `tipo_de_producto` (
  `tipo_producto_id` int(20) NOT NULL,
  `tipo_de_producto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_de_producto`
--

INSERT INTO `tipo_de_producto` (`tipo_producto_id`, `tipo_de_producto`) VALUES
(1, 'Cartas'),
(2, 'Peluche'),
(3, 'Funko Pop!'),
(4, 'Mazos de Combate'),
(5, 'Pikachu V Box');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informacion_de_compra`
--
ALTER TABLE `informacion_de_compra`
  ADD PRIMARY KEY (`compra_id`),
  ADD KEY `FK` (`tipo_producto_id`,`nombre_producto_id`,`marca_id`,`proveedor_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`nombre_producto_id`),
  ADD KEY `FK` (`marca_id`,`tipo_de_producto_id`);

--
-- Indices de la tabla `producto_ventas`
--
ALTER TABLE `producto_ventas`
  ADD PRIMARY KEY (`ventas_id`),
  ADD KEY `FK` (`cliente_id`,`tipo_de_producto_id`,`nombre_producto_id`,`marca_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_de_producto`
--
ALTER TABLE `tipo_de_producto`
  ADD PRIMARY KEY (`tipo_producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `informacion_de_compra`
--
ALTER TABLE `informacion_de_compra`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `marca_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `nombre_producto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `proveedor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_de_producto`
--
ALTER TABLE `tipo_de_producto`
  MODIFY `tipo_producto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
