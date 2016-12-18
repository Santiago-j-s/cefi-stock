-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2016 at 07:57 PM
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
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(10,0) DEFAULT NULL,
  `FechaUltMovimiento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `ID` int(11) NOT NULL,
  `Proveedor` varchar(45) DEFAULT NULL,
  `NumeroFactura` varchar(45) DEFAULT NULL,
  `Monto` decimal(10,0) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `FechaAlta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
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

DROP TABLE IF EXISTS `linea_venta`;
CREATE TABLE `linea_venta` (
  `ID` int(11) NOT NULL,
  `InventarioID` int(11) NOT NULL,
  `VentaID` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(10,0) DEFAULT NULL,
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

DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `ID` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Monto` decimal(10,0) DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pago_factura`
--

DROP TABLE IF EXISTS `pago_factura`;
CREATE TABLE `pago_factura` (
  `ID` int(11) NOT NULL,
  `FacturaID` int(11) NOT NULL,
  `PagoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `precio_producto`
--

DROP TABLE IF EXISTS `precio_producto`;
CREATE TABLE `precio_producto` (
  `producto_ID` int(11) NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `Precio` decimal(10,0) DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `PrecioVenta` decimal(10,0) DEFAULT NULL,
  `FechaUltModificacion` varchar(45) DEFAULT NULL,
  `CodigoBarra` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registro_producto`
--

DROP TABLE IF EXISTS `registro_producto`;
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

DROP TABLE IF EXISTS `sobre`;
CREATE TABLE `sobre` (
  `ID` int(11) NOT NULL,
  `Monto` varchar(45) DEFAULT NULL,
  `FechaUltMovimiento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
  `ID` int(11) NOT NULL,
  `HoraInicial` datetime DEFAULT NULL,
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
(9, '2016-12-18 19:47:16', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `turno_caja`
--

DROP TABLE IF EXISTS `turno_caja`;
CREATE TABLE `turno_caja` (
  `ID` int(11) NOT NULL,
  `caja_ID` int(11) NOT NULL,
  `turno_ID` int(11) NOT NULL,
  `MontoInicial` decimal(10,0) DEFAULT NULL,
  `MontoFinal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `turno_vendedor`
--

DROP TABLE IF EXISTS `turno_vendedor`;
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

DROP TABLE IF EXISTS `usuario`;
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

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE `vendedor` (
  `ID` int(11) NOT NULL,
  `NombreCompleto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `ID` int(11) NOT NULL,
  `Monto` decimal(10,0) DEFAULT NULL,
  `Factura` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `turno_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sobre`
--
ALTER TABLE `sobre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
