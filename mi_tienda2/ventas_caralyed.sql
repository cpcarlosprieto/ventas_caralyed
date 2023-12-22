-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 08:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ventas_caralyed`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `imagen`, `condicion`) VALUES
(1, 7, '12345', 'Manzanas Frescas', 41, 'productos frescos  frutas, verduras, pan y productos lácteos.', '1697415472.png', 1),
(2, 7, '1234567', 'Lechuga Organica', 45, 'productos frescos  frutas, verduras, pan y productos lácteos.', '1697415516.png', 1),
(3, 7, '123456', 'Pescado Fresco', 15, 'productos frescos  frutas, verduras, pan y productos lácteos.', '1697415558.png', 1),
(4, 7, '12345678', 'Huevos Organicos', 15, 'productos frescos  frutas, verduras, pan y productos lácteos.', '1697415592.png', 1),
(5, 7, '123456789', 'Queso Artesanal', 15, 'productos frescos  frutas, verduras, pan y productos lácteos.', '1697415622.png', 1),
(6, 8, '12345678910', 'Arroz Integral', 79, 'productos enlatados, cereales, pastas, arroces.', '1697415660.png', 1),
(7, 8, '12345678911', 'Pasta de Trigo Integral', 79, 'productos enlatados, cereales, pastas, arroces.', '1697415781.png', 1),
(8, 8, '12345678912', 'Sopa enlatada de Vegetales', 30, 'productos enlatados, cereales, pastas, arroces.', '1697415751.png', 1),
(9, 8, '12345678913', 'Cereal Multigrano', 70, 'productos enlatados, cereales, pastas, arroces.', '1697415816.png', 1),
(10, 9, '12345678914', 'Agua Mineral', 30, 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', '1697415922.png', 1),
(11, 9, '12345678916', 'Coca-Cola', 30, 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', '1697415900.png', 1),
(12, 9, '1234567891415', 'Jugo de Naranja Natural', 20, 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', '1697415996.png', 1),
(13, 9, '1234567891416', 'Agua Saborizada de Limón', 20, 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', '1697415981.png', 1),
(14, 9, '123456789141', 'Té Verde Antioxidante', 20, 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', '1697416035.png', 1),
(15, 9, '1234567891411', 'Café Premium', 20, 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', '1697416062.png', 1),
(16, 12, '1234567891136', 'Detergente para Ropa', 20, 'artículos como detergentes, jabones, papel higiénico, y productos de limpieza del hogar.', '1697416107.png', 1),
(17, 12, '12345678914123', 'Jabón Multiusos', 20, 'artículos como detergentes, jabones, papel higiénico, y productos de limpieza del hogar.', '1697416150.png', 1),
(18, 12, '12345678123', 'Papel Higiénico Suave', 50, 'artículos como detergentes, jabones, papel higiénico, y productos de limpieza del hogar.', '1697416181.png', 1),
(19, 12, '12345678914698', 'Esponjas de Limpieza', 60, 'artículos como detergentes, jabones, papel higiénico, y productos de limpieza del hogar.', '1697416212.png', 1),
(20, 13, '1234567891496855', 'Champú Revitalizante', 20, 'productos de higiene personal como champú, jabón, pasta de dientes, y otros artículos para el cuidado personal.', '1697416249.png', 1),
(21, 13, '11122587444', 'Jabón Corporal Hidratante', 20, 'productos de higiene personal como champú, jabón, pasta de dientes, y otros artículos para el cuidado personal.', '1697416275.png', 1),
(22, 13, '695574122658', 'Pasta Dental Blanqueadora', 60, 'productos de higiene personal como champú, jabón, pasta de dientes, y otros artículos para el cuidado personal.', '1697416297.png', 1),
(23, 13, '85147536999', 'Desodorante Fresco', 25, 'productos de higiene personal como champú, jabón, pasta de dientes, y otros artículos para el cuidado personal.', '1697416326.png', 1),
(24, 14, '11111111111111', 'Filete de Ternera Premium', 15, 'carne fresca, embutidos y productos cárnicos preparados.', '1697416362.png', 1),
(25, 14, '222222222222', 'Salchichas de Pollo Ahumadas', 20, 'carne fresca, embutidos y productos cárnicos preparados.', '1697416386.png', 1),
(26, 14, '33333333333', 'Jamón Serrano de Calidad', 35, 'carne fresca, embutidos y productos cárnicos preparados.', '1697416411.png', 1),
(27, 14, '444444444444', 'Pollo', 20, 'carne fresca, embutidos y productos cárnicos preparados.', '1697416435.png', 1),
(28, 15, '77777777777', 'Galletas de Avena y Pasas', 20, 'variedad de panes frescos, pasteles, galletas y otros productos horneados.', '1697416527.png', 1),
(29, 15, '98665411233655', 'Pastel de Chocolate Casero', 20, 'variedad de panes frescos, pasteles, galletas y otros productos horneados.', '1697416580.png', 1),
(30, 15, '1205874450055565', 'Pan de Centeno Integral', 85, 'variedad de panes frescos, pasteles, galletas y otros productos horneados.', '1697416733.png', 1),
(31, 16, '0025874556669', 'Toallas de Papel Absorbentes', 35, 'productos como toallas de papel, servilletas, bolsas de basura, y otros artículos desechables o de uso doméstico.', '1697416799.png', 1),
(32, 16, '012574548855', 'Bolsas de Basura Resistentes', 35, 'productos como toallas de papel, servilletas, bolsas de basura, y otros artículos desechables o de uso doméstico.', '1697416833.png', 1),
(33, 16, '00001236544', 'Servilletas de Papel', 20, 'productos como toallas de papel, servilletas, bolsas de basura, y otros artículos desechables o de uso doméstico.', '1697416869.png', 1),
(34, 16, '00032698574', 'Cubiertos Desechables', 36, 'productos como toallas de papel, servilletas, bolsas de basura, y otros artículos desechables o de uso doméstico.', '1697416900.png', 1),
(35, 17, '00032269874100', 'Insecticida de Larga Duración', 25, 'insecticidas, detergentes para la ropa, suavizantes, y otros elementos esenciales para el mantenimiento del hogar.', '1697416945.png', 1),
(36, 18, '00012233200', 'Baterías Alcalinas Duraderas', 20, 'baterías, lámparas, cargadores, y otros productos electrónicos.', '1697417004.png', 1),
(37, 18, '00336001450', 'Lámpara LED de Luz Cálida', 36, 'baterías, lámparas, cargadores, y otros productos electrónicos.', '1697417036.png', 1),
(38, 18, '00000003620', 'Cargador USB de Carga Rápida', 15, 'baterías, lámparas, cargadores, y otros productos electrónicos.', '1697417060.png', 1),
(39, 18, '0003600574', 'Auriculares Inalámbricos Deportivos', 25, 'baterías, lámparas, cargadores, y otros productos electrónicos.', '1697417085.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(7, 'Alimentos perecederos', 'productos frescos  frutas, verduras, pan y productos lácteos.', 1),
(8, 'Alimentos no perecederos', 'productos enlatados, cereales, pastas, arroces.', 1),
(9, 'Bebidas', 'variedad de bebidas, como refrescos, aguas, jugos, té y café.', 1),
(12, 'Productos de Limpieza', 'artículos como detergentes, jabones, papel higiénico, y productos de limpieza del hogar.', 1),
(13, 'Artículos de cuidado personal', 'productos de higiene personal como champú, jabón, pasta de dientes, y otros artículos para el cuidado personal.', 1),
(14, 'Carnicos', 'carne fresca, embutidos y productos cárnicos preparados.', 1),
(15, 'Panaderia', 'variedad de panes frescos, pasteles, galletas y otros productos horneados.', 1),
(16, 'Articulos del Hogar', 'productos como toallas de papel, servilletas, bolsas de basura, y otros artículos desechables o de uso doméstico.', 1),
(17, 'Cuidado del Hogar', 'insecticidas, detergentes para la ropa, suavizantes, y otros elementos esenciales para el mantenimiento del hogar.', 1),
(18, 'Electronicos y Productos Varios', 'baterías, lámparas, cargadores, y otros productos electrónicos.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idarticulo`, `cantidad`, `precio_compra`, `precio_venta`) VALUES
(1, 1, 1, 30, 1000.00, 2500.00),
(2, 1, 2, 30, 2000.00, 3200.00),
(3, 2, 6, 50, 2000.00, 3500.00),
(4, 2, 7, 50, 2000.00, 4000.00),
(5, 2, 9, 50, 2000.00, 6000.00),
(6, 2, 30, 50, 2000.00, 3000.00);

--
-- Triggers `detalle_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockIngreso` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
UPDATE articulo SET stock=stock + NEW.cantidad
WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_venta`, `descuento`) VALUES
(1, 1, 1, 8, 1000000.00, 0.00),
(2, 1, 1, 1, 2500.00, 0.00),
(3, 2, 1, 1, 2500.00, 0.00),
(4, 3, 1, 1, 2500.00, 0.00),
(5, 4, 6, 1, 3000.00, 0.00),
(6, 4, 7, 1, 4500.00, 0.00),
(7, 4, 1, 1, 2500.00, 0.00);

--
-- Triggers `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `tr_udpStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
UPDATE articulo SET stock = stock - NEW.cantidad
WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_compra` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_compra`, `estado`) VALUES
(1, 1, 1, 'Factura', '12345', '1', '2023-10-15 00:00:00', 0.19, 90000.00, 'Aceptado'),
(2, 2, 1, 'Factura', '1122', '12', '2023-10-18 00:00:00', 19.00, 400000.00, 'Aceptado');

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Almacen'),
(3, 'Compras'),
(4, 'Ventas'),
(5, 'Acceso'),
(6, 'Consulta Compras'),
(7, 'Consulta Ventas');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Proveedor', 'Frutas Frescas Express S.A.', 'CEDULA', '123456789', 'Calle de las Frutas', '+57 456 7890', 'info@frutasexpress.com'),
(2, 'Proveedor', 'Distribuidora de Cereales Granos Dorados S.A.', 'CEDULA', '987654-1', 'Carrera de los Cereales', '+57876 543 2109', 'ventas@granosdorados.com'),
(3, 'Proveedor', 'Refrescos del Valle S.A.', 'CEDULA', '123456-3', 'Avenida de los Refrescos', '+57321 654 98', 'info@refrescosdelvalle.com'),
(4, 'Proveedor', 'Limpio y Claro S.A.', 'CEDULA', '345678-5', 'Calle de la Limpieza', '+573 210 9876', 'info@limpioyclaro.com'),
(5, 'Proveedor', 'Suavidad Natural S.A.', 'CEDULA', '234567-9', 'Avenida de la Higiene', '+57098 765 4321', 'info@suavidadnatural.com'),
(6, 'Proveedor', 'Sabor a Carnes S.A.', 'CEDULA', '012345-3', 'Calle de las Carnes', '+57432 109 8765', 'info@saboracarnes.com'),
(7, 'Proveedor', 'Delicias Horneadas S.A.', 'CEDULA', '234567890', 'Plaza del Pan', '+57234 567 8901', 'pedidos@deliciashorneadas.com'),
(8, 'Proveedor', 'Hogar Brillante S.A.', 'CEDULA', '012345-8', 'Plaza del Hogar', '+57876 543 2109', 'ventas@hogarbrillante.com'),
(9, 'Proveedor', 'Pureza Limpia S.A.', 'CEDULA', '890123-7', 'Calle de los Jabones', '+5789 012 3456', 'contacto@purezalimpia.com'),
(10, 'Proveedor', 'EnerTech Solutions S.A.', 'CEDULA', '345678-0', 'Avenida de la Tecnología', '+576 543 2109', 'info@enertechsolutions.com'),
(11, 'Cliente', 'Juanito', 'CEDULA', '12345678', 'Santander 1100', '4886850', 'juanito@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'Carlos Arturo Prieto', 'CEDULA', '1062319904', 'Cra 6 a bis # 8-08', '3126939064', 'prieto.carlos@correounivalle.edu.co', 'Administrador', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1697605781.jpg', 1),
(2, 'Yesid Muñoz', 'CEDULA', '123456789', 'Santander de Quilichao', '3214569855', 'yesid.munoz@correounivalle.edu.co', 'empleado', 'StivenM', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1697252785.png', 1),
(3, 'Alexander Portillo', 'CEDULA', '987654-1', 'Santander 1100', '4886850', 'alexander@gmail.com', 'empleado', 'alexander', 'a567f5e02e2a56099c9ffb8e21926c9637c1159c0e6684338ac3344ba191efcb', '1697602914.png', 1),
(4, 'Pepito Perez', 'CEDULA', '234567-9', 'Santander de Quilichao', '+57876 543 2109', 'pepito@gmail.com', 'Administrador Especi', 'pepito', 'c8cdf720db5562a039be5d81c51a07c5120eaf0bf142b2144f1a1eb7a95678d3', '1697607819.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(106, 2, 1),
(107, 2, 4),
(108, 3, 1),
(109, 3, 4),
(117, 1, 1),
(118, 1, 2),
(119, 1, 3),
(120, 1, 4),
(121, 1, 5),
(122, 1, 6),
(123, 1, 7),
(124, 4, 1),
(125, 4, 2),
(126, 4, 3),
(127, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) DEFAULT NULL,
  `total_venta` decimal(11,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`) VALUES
(1, 11, 1, 'Factura', '12345', '1', '2023-10-15 00:00:00', 0.19, 2500.00, 'Anulado'),
(2, 11, 1, 'Ticket', '66333', '2', '2023-10-15 00:00:00', 0.19, 2500.00, 'Aceptado'),
(3, 11, 1, 'Boleta', '66333', '3', '2023-10-15 00:00:00', 0.19, 2500.00, 'Aceptado'),
(4, 11, 3, 'Factura', '25', '47', '2023-10-17 00:00:00', 19.00, 10000.00, 'Aceptado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indexes for table `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `fk_detalle_ingreso_idx` (`idingreso`),
  ADD KEY `fk_detalle_articulo_idx` (`idarticulo`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_venta_idx` (`idventa`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`);

--
-- Indexes for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_persona_idx` (`idproveedor`),
  ADD KEY `fk_ingreso_usuario_idx` (`idusuario`);

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indexes for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_u_permiso_usuario_idx` (`idusuario`),
  ADD KEY `fk_usuario_permiso_idx` (`idpermiso`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona_idx` (`idcliente`),
  ADD KEY `fk_venta_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `fk_detalle_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ingreso` FOREIGN KEY (`idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_persona` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_u_permiso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
