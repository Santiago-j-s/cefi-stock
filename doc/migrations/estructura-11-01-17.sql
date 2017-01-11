-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 12:31 AM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

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

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `ID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Unidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `precio_producto`
--

CREATE TABLE `precio_producto` (
  `producto_ID` int(11) NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `Precio` decimal(19,4) DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `PrecioVenta` decimal(19,4) DEFAULT NULL,
  `FechaUltModificacion` varchar(45) DEFAULT NULL,
  `CodigoBarra` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registro_producto`
--

CREATE TABLE `registro_producto` (
  `InventarioID` int(11) NOT NULL,
  `Cantidad` varchar(45) DEFAULT NULL,
  `Unidad` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Proveedor` varchar(45) DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sobre`
--

CREATE TABLE `sobre` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(19,4) DEFAULT NULL,
  `FechaUltMovimiento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `vendedor_ID` int(11) NOT NULL,
  `turno_ID` int(11) NOT NULL,
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
-- Indexes for table `precio_producto`
--
ALTER TABLE `precio_producto`
  ADD PRIMARY KEY (`producto_ID`,`FechaInicio`),
  ADD KEY `fk_precio_producto_turno1_idx` (`turno_ID`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registro_producto`
--
ALTER TABLE `registro_producto`
  ADD PRIMARY KEY (`InventarioID`),
  ADD KEY `fk_registro_producto_turno1_idx` (`turno_ID`);

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
  ADD KEY `fk_turno_vendedor_vendedor1_idx` (`vendedor_ID`),
  ADD KEY `fk_turno_vendedor_turno1_idx` (`turno_ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sobre`
--
ALTER TABLE `sobre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_producto1` FOREIGN KEY (`ProductoID`) REFERENCES `producto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `precio_producto`
--
ALTER TABLE `precio_producto`
  ADD CONSTRAINT `fk_precio_producto_producto1` FOREIGN KEY (`producto_ID`) REFERENCES `producto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_precio_producto_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registro_producto`
--
ALTER TABLE `registro_producto`
  ADD CONSTRAINT `fk_registro_producto_inventario1` FOREIGN KEY (`InventarioID`) REFERENCES `inventario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registro_producto_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_turno_vendedor_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_vendedor_vendedor1` FOREIGN KEY (`vendedor_ID`) REFERENCES `vendedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_turno1` FOREIGN KEY (`turno_ID`) REFERENCES `turno` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
