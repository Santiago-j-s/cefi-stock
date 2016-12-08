-- MySQL Workbench Synchronization
-- Generated: 2016-12-08 12:35
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: santiago

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER SCHEMA `cefi-stock`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`turno` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Hora Inicial` TIME NULL DEFAULT NULL,
  `Hora Final` TIME NULL DEFAULT NULL,
  `Fecha` DATE NULL DEFAULT NULL,
  `usuario_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_turno_usuario1_idx` (`usuario_ID` ASC),
  CONSTRAINT `fk_turno_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `cefi-stock`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`caja` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Monto` DECIMAL NULL DEFAULT NULL,
  `FechaUltMovimiento` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`movimiento` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Monto` DECIMAL NULL DEFAULT NULL,
  `Tipo` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `CajaID` INT(11) NOT NULL,
  `SobreID` INT(11) NOT NULL,
  `turno_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_movimiento_caja1_idx` (`CajaID` ASC),
  INDEX `fk_movimiento_sobre1_idx` (`SobreID` ASC),
  INDEX `fk_movimiento_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_movimiento_caja1`
    FOREIGN KEY (`CajaID`)
    REFERENCES `cefi-stock`.`caja` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimiento_sobre1`
    FOREIGN KEY (`SobreID`)
    REFERENCES `cefi-stock`.`sobre` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimiento_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`turno_caja` (
  `ID` INT(11) NOT NULL,
  `caja_ID` INT(11) NOT NULL,
  `turno_ID` INT(11) NOT NULL,
  `MontoInicial` DECIMAL NULL DEFAULT NULL,
  `MontoFinal` DECIMAL NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_turno_caja_caja_idx` (`caja_ID` ASC),
  INDEX `fk_turno_caja_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_turno_caja_caja`
    FOREIGN KEY (`caja_ID`)
    REFERENCES `cefi-stock`.`caja` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turno_caja_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`venta` (
  `ID` INT(11) NOT NULL,
  `Monto` DECIMAL NULL DEFAULT NULL,
  `Factura` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `turno_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_venta_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_venta_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`sobre` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Monto` VARCHAR(45) NULL DEFAULT NULL,
  `FechaUltMovimiento` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`producto` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `PrecioVenta` DECIMAL NULL DEFAULT NULL,
  `FechaUltModificacion` VARCHAR(45) NULL DEFAULT NULL,
  `CodigoBarra` VARCHAR(13) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`precio_producto` (
  `producto_ID` INT(11) NOT NULL,
  `FechaInicio` DATETIME NOT NULL,
  `Precio` DECIMAL NULL DEFAULT NULL,
  `FechaFinal` DATETIME NULL DEFAULT NULL,
  `turno_ID` INT(11) NOT NULL,
  PRIMARY KEY (`producto_ID`, `FechaInicio`),
  INDEX `fk_precio_producto_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_precio_producto_producto1`
    FOREIGN KEY (`producto_ID`)
    REFERENCES `cefi-stock`.`producto` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_precio_producto_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`usuario` (
  `ID` INT(11) NOT NULL,
  `NombreUsuario` VARCHAR(45) NULL DEFAULT NULL,
  `Password` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`inventario` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `ProductoID` INT(11) NOT NULL,
  `Cantidad` INT(11) NULL DEFAULT NULL,
  `Unidad` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_inventario_producto1_idx` (`ProductoID` ASC),
  CONSTRAINT `fk_inventario_producto1`
    FOREIGN KEY (`ProductoID`)
    REFERENCES `cefi-stock`.`producto` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`vendedor` (
  `ID` INT(11) NOT NULL,
  `NombreCompleto` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`registro_producto` (
  `InventarioID` INT(11) NOT NULL,
  `Cantidad` VARCHAR(45) NULL DEFAULT NULL,
  `Unidad` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `Proveedor` VARCHAR(45) NULL DEFAULT NULL,
  `turno_ID` INT(11) NOT NULL,
  PRIMARY KEY (`InventarioID`),
  INDEX `fk_registro_producto_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_registro_producto_inventario1`
    FOREIGN KEY (`InventarioID`)
    REFERENCES `cefi-stock`.`inventario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registro_producto_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`turno_vendedor` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `vendedor_ID` INT(11) NOT NULL,
  `turno_ID` INT(11) NOT NULL,
  `HoraInicio` DATETIME NULL DEFAULT NULL,
  `HoraFin` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_turno_vendedor_vendedor1_idx` (`vendedor_ID` ASC),
  INDEX `fk_turno_vendedor_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_turno_vendedor_vendedor1`
    FOREIGN KEY (`vendedor_ID`)
    REFERENCES `cefi-stock`.`vendedor` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turno_vendedor_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`linea_venta` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `InventarioID` INT(11) NOT NULL,
  `VentaID` INT(11) NOT NULL,
  `Cantidad` INT(11) NULL DEFAULT NULL,
  `Subtotal` DECIMAL NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_linea_venta_inventario1_idx` (`InventarioID` ASC),
  INDEX `fk_linea_venta_venta1_idx` (`VentaID` ASC),
  CONSTRAINT `fk_linea_venta_inventario1`
    FOREIGN KEY (`InventarioID`)
    REFERENCES `cefi-stock`.`inventario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_linea_venta_venta1`
    FOREIGN KEY (`VentaID`)
    REFERENCES `cefi-stock`.`venta` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`factura` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Proveedor` VARCHAR(45) NULL DEFAULT NULL,
  `NumeroFactura` VARCHAR(45) NULL DEFAULT NULL,
  `Monto` DECIMAL NULL DEFAULT NULL,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `FechaAlta` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`pago` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `Monto` DECIMAL NULL DEFAULT NULL,
  `turno_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_pago_turno1_idx` (`turno_ID` ASC),
  CONSTRAINT `fk_pago_turno1`
    FOREIGN KEY (`turno_ID`)
    REFERENCES `cefi-stock`.`turno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cefi-stock`.`pago_factura` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FacturaID` INT(11) NOT NULL,
  `PagoID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_pago_factura_factura1_idx` (`FacturaID` ASC),
  INDEX `fk_pago_factura_pago1_idx` (`PagoID` ASC),
  CONSTRAINT `fk_pago_factura_factura1`
    FOREIGN KEY (`FacturaID`)
    REFERENCES `cefi-stock`.`factura` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_factura_pago1`
    FOREIGN KEY (`PagoID`)
    REFERENCES `cefi-stock`.`pago` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
