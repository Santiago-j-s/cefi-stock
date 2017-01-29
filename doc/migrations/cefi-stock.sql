-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2017 at 07:41 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cefi-stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', 1482554337);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/admin/*', 2, NULL, NULL, NULL, 1482554204, 1482554204),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1482556504, 1482556504),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/default/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/default/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/create', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/update', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/create', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/update', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/assign', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/create', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/delete', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/remove', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/update', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/route/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/assign', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/create', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/remove', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/create', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/update', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/view', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/activate', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/delete', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/login', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/logout', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/signup', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/view', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/cuenta/*', 2, NULL, NULL, NULL, 1484089115, 1484089115),
('/cuenta/update', 2, NULL, NULL, NULL, 1484089115, 1484089115),
('/cuenta/view', 2, NULL, NULL, NULL, 1484089115, 1484089115),
('/debug/*', 2, NULL, NULL, NULL, 1482554217, 1482554217),
('/debug/default/*', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/debug/default/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/debug/default/view', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/*', 2, NULL, NULL, NULL, 1482554221, 1482554221),
('/gii/default/*', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/action', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/diff', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/index', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/preview', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/view', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/*', 2, NULL, NULL, NULL, 1482554228, 1482554228),
('/producto/create', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/delete', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/index', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/nuevo', 2, NULL, NULL, NULL, 1482593635, 1482593635),
('/producto/update', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/view', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/*', 2, NULL, NULL, NULL, 1482554237, 1482554237),
('/site/about', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/captcha', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/contact', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/error', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/index', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/iniciar-turno', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/logout', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('Administrador', 1, 'Acceso total al sistema', NULL, NULL, 1482554275, 1482559153),
('Guest', 1, 'Un usuario que aún no se ha logueado, permisos mínimos.', NULL, NULL, 1482558084, 1482558084);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrador', '/admin/*'),
('Administrador', '/cuenta/*'),
('Administrador', '/cuenta/update'),
('Administrador', '/cuenta/view'),
('Administrador', '/debug/*'),
('Administrador', '/gii/*'),
('Administrador', '/producto/*'),
('Administrador', '/site/about'),
('Administrador', '/site/captcha'),
('Administrador', '/site/contact'),
('Administrador', '/site/error'),
('Administrador', '/site/index'),
('Administrador', '/site/logout'),
('Guest', '/site/about'),
('Guest', '/site/captcha'),
('Guest', '/site/contact'),
('Guest', '/site/error'),
('Guest', '/site/index'),
('Guest', '/site/iniciar-turno');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `caja`
--

CREATE TABLE `caja` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(19,4) NOT NULL,
  `FechaUltMovimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caja`
--

INSERT INTO `caja` (`ID`, `Monto`, `FechaUltMovimiento`) VALUES
(1, '25500.5000', '2017-01-27 13:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `ID` int(11) NOT NULL,
  `Proveedor` varchar(45) DEFAULT NULL,
  `NumeroFactura` varchar(45) DEFAULT NULL,
  `Monto` decimal(19,4) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `FechaAlta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `historico_precios`
--

CREATE TABLE `historico_precios` (
  `ProductoID` int(11) NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `PrecioVenta` decimal(19,4) DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  `TurnoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingreso_producto`
--

CREATE TABLE `ingreso_producto` (
  `InventarioID` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Proveedor` varchar(45) DEFAULT NULL,
  `TurnoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `ID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`ID`, `ProductoID`, `Cantidad`) VALUES
(1, 1, 20),
(2, 2, 24),
(3, 3, 40),
(4, 4, 60);

-- --------------------------------------------------------

--
-- Table structure for table `linea_venta`
--

CREATE TABLE `linea_venta` (
  `ID` int(11) NOT NULL,
  `InventarioID` int(11) NOT NULL,
  `VentaID` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

CREATE TABLE `movimiento` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(19,4) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `CajaID` int(11) NOT NULL,
  `SobreID` int(11) NOT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `ID` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Monto` decimal(19,4) DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pago_factura`
--

CREATE TABLE `pago_factura` (
  `ID` int(11) NOT NULL,
  `FacturaID` int(11) NOT NULL,
  `PagoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `PrecioVenta` decimal(19,4) NOT NULL,
  `FechaUltModificacion` datetime DEFAULT NULL,
  `CodigoBarra` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ID`, `Descripcion`, `PrecioVenta`, `FechaUltModificacion`, `CodigoBarra`) VALUES
(1, 'Alfajor Fantoche', '15.0000', '2016-12-24 08:32:19', ''),
(2, 'Cereal Mix Chocolate', '20.0000', '2016-12-24 13:07:27', ''),
(3, 'Turrón', '5.0000', '2017-01-27 09:43:50', ''),
(4, 'Galletitas Melitas Paquete 170 G', '18.8500', '2017-01-27 12:31:28', '');

-- --------------------------------------------------------

--
-- Table structure for table `sobre`
--

CREATE TABLE `sobre` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(19,4) DEFAULT NULL,
  `FechaUltMovimiento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sobre`
--

INSERT INTO `sobre` (`ID`, `Monto`, `FechaUltMovimiento`) VALUES
(1, '14499.5000', '2017-01-27 13:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `turno`
--

CREATE TABLE `turno` (
  `ID` int(11) NOT NULL,
  `HoraInicial` datetime NOT NULL,
  `HoraFinal` datetime DEFAULT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `turno`
--

INSERT INTO `turno` (`ID`, `HoraInicial`, `HoraFinal`, `UsuarioID`) VALUES
(1, '2016-12-18 19:29:27', NULL, 1),
(2, '2016-12-18 19:32:08', NULL, 1),
(3, '2016-12-18 19:33:38', NULL, 1),
(4, '2016-12-18 19:34:09', NULL, 1),
(5, '2016-12-18 19:39:16', NULL, 1),
(6, '2016-12-18 19:44:23', NULL, 1),
(7, '2016-12-18 19:44:36', NULL, 1),
(8, '2016-12-18 19:46:01', NULL, 1),
(9, '2016-12-18 19:47:16', NULL, 1),
(10, '2016-12-18 22:08:53', NULL, 1),
(11, '2016-12-23 22:36:08', NULL, 1),
(12, '2016-12-24 02:42:54', NULL, 1),
(13, '2016-12-24 02:48:57', NULL, 1),
(14, '2016-12-24 02:53:30', NULL, 1),
(15, '2016-12-24 02:58:10', NULL, 1),
(16, '2016-12-24 07:51:50', NULL, 1),
(17, '2016-12-24 13:09:13', NULL, 1),
(18, '2017-01-25 20:22:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `turno_caja`
--

CREATE TABLE `turno_caja` (
  `ID` int(11) NOT NULL,
  `caja_ID` int(11) NOT NULL,
  `turno_ID` int(11) NOT NULL,
  `MontoInicial` decimal(19,4) DEFAULT NULL,
  `MontoFinal` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `turno_vendedor`
--

CREATE TABLE `turno_vendedor` (
  `ID` int(11) NOT NULL,
  `VendedorID` int(11) NOT NULL,
  `TurnoID` int(11) NOT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `HoraFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NombreUsuario` varchar(45) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `AuthKey` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID`, `NombreUsuario`, `Password`, `AuthKey`) VALUES
(1, 'admin', '$2y$13$i43hG0tcy9h989BL3RTnIuZlSXezBJmijB8dmaPZU0Pfp684VSM06', '7T4TiZZGyDVfQmNkkqK-QtvwvivmeSsP');

-- --------------------------------------------------------

--
-- Table structure for table `vendedor`
--

CREATE TABLE `vendedor` (
  `ID` int(11) NOT NULL,
  `NombreCompleto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(19,4) DEFAULT NULL,
  `Factura` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `historico_precios`
--
ALTER TABLE `historico_precios`
  ADD PRIMARY KEY (`ProductoID`,`FechaInicio`),
  ADD KEY `fk_precio_producto_turno1_idx` (`TurnoID`);

--
-- Indexes for table `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD PRIMARY KEY (`InventarioID`,`Fecha`),
  ADD KEY `fk_registro_producto_turno1_idx` (`TurnoID`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_inventario_producto1_idx` (`ProductoID`);

--
-- Indexes for table `linea_venta`
--
ALTER TABLE `linea_venta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_linea_venta_inventario1_idx` (`InventarioID`),
  ADD KEY `fk_linea_venta_venta1_idx` (`VentaID`);

--
-- Indexes for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_movimiento_caja1_idx` (`CajaID`),
  ADD KEY `fk_movimiento_sobre1_idx` (`SobreID`),
  ADD KEY `fk_movimiento_turno1_idx` (`turno_ID`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_pago_turno1_idx` (`turno_ID`);

--
-- Indexes for table `pago_factura`
--
ALTER TABLE `pago_factura`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_pago_factura_factura1_idx` (`FacturaID`),
  ADD KEY `fk_pago_factura_pago1_idx` (`PagoID`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Descripcion_UNIQUE` (`Descripcion`);

--
-- Indexes for table `sobre`
--
ALTER TABLE `sobre`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_turno_usuario1_idx` (`UsuarioID`);

--
-- Indexes for table `turno_caja`
--
ALTER TABLE `turno_caja`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_turno_caja_caja_idx` (`caja_ID`),
  ADD KEY `fk_turno_caja_turno1_idx` (`turno_ID`);

--
-- Indexes for table `turno_vendedor`
--
ALTER TABLE `turno_vendedor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_turno_vendedor_vendedor1_idx` (`VendedorID`),
  ADD KEY `fk_turno_vendedor_turno1_idx` (`TurnoID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_venta_turno1_idx` (`turno_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caja`
--
ALTER TABLE `caja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `linea_venta`
--
ALTER TABLE `linea_venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pago_factura`
--
ALTER TABLE `pago_factura`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sobre`
--
ALTER TABLE `sobre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `turno_vendedor`
--
ALTER TABLE `turno_vendedor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historico_precios`
--
ALTER TABLE `historico_precios`
  ADD CONSTRAINT `fk_precio_producto_producto1` FOREIGN KEY (`ProductoID`) REFERENCES `producto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_precio_producto_turno1` FOREIGN KEY (`TurnoID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD CONSTRAINT `fk_ingreso_producto_1` FOREIGN KEY (`InventarioID`) REFERENCES `inventario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_producto_2` FOREIGN KEY (`TurnoID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_producto1` FOREIGN KEY (`ProductoID`) REFERENCES `producto` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `linea_venta`
--
ALTER TABLE `linea_venta`
  ADD CONSTRAINT `fk_linea_venta_inventario1` FOREIGN KEY (`InventarioID`) REFERENCES `inventario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_linea_venta_venta1` FOREIGN KEY (`VentaID`) REFERENCES `venta` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_movimiento_caja1` FOREIGN KEY (`CajaID`) REFERENCES `caja` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_sobre1` FOREIGN KEY (`SobreID`) REFERENCES `sobre` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_pago_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pago_factura`
--
ALTER TABLE `pago_factura`
  ADD CONSTRAINT `fk_pago_factura_factura1` FOREIGN KEY (`FacturaID`) REFERENCES `factura` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pago_factura_pago1` FOREIGN KEY (`PagoID`) REFERENCES `pago` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `fk_turno_usuario1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `turno_caja`
--
ALTER TABLE `turno_caja`
  ADD CONSTRAINT `fk_turno_caja_caja` FOREIGN KEY (`caja_ID`) REFERENCES `caja` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_caja_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `turno_vendedor`
--
ALTER TABLE `turno_vendedor`
  ADD CONSTRAINT `fk_turno_vendedor_turno1` FOREIGN KEY (`TurnoID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_vendedor_vendedor1` FOREIGN KEY (`VendedorID`) REFERENCES `vendedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
