-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bdsiscom
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ bdsiscom;
USE bdsiscom;

--
-- Table structure for table `bdsiscom`.`almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE `almacen` (
  `nAlmId` int(11) NOT NULL AUTO_INCREMENT,
  `cAlmNombre` varchar(200) DEFAULT NULL,
  `nSurId` int(11) NOT NULL,
  `cAlmUbigeo` varchar(8) DEFAULT NULL,
  `cAlmReferencia` varchar(300) DEFAULT NULL,
  `cAlmLinea1` varchar(200) DEFAULT NULL,
  `cAlmLinea2` varchar(200) DEFAULT NULL,
  `cAlmEstado` int(11) NOT NULL,
  PRIMARY KEY (`nAlmId`),
  KEY `fk_almacen_sucursal1_idx` (`nSurId`),
  CONSTRAINT `fk_almacen_sucursal1` FOREIGN KEY (`nSurId`) REFERENCES `sucursal` (`nSurId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`almacen`
--

/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` (`nAlmId`,`cAlmNombre`,`nSurId`,`cAlmUbigeo`,`cAlmReferencia`,`cAlmLinea1`,`cAlmLinea2`,`cAlmEstado`) VALUES 
 (1,'almacen 1',4,'','españa','','',1),
 (2,'almacen 2',5,'','españa 2','','',1),
 (3,'almacen 3',5,'','españa','','',1),
 (4,'almacen 4',4,'','','','',0);
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `nCatId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cCatNombre` varchar(45) DEFAULT NULL,
  `cCatDescripcion` varchar(45) DEFAULT NULL,
  `cCatEstado` smallint(5) unsigned DEFAULT NULL,
  `cCatImagen` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nCatId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`nCatId`,`cCatNombre`,`cCatDescripcion`,`cCatEstado`,`cCatImagen`) VALUES 
 (1,'PLATAFORMAS',NULL,1,NULL),
 (2,'BOTAS',NULL,1,NULL),
 (3,'CHALAS',NULL,1,NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `nEmpId` int(11) NOT NULL AUTO_INCREMENT,
  `cEmpNombre` varchar(50) DEFAULT NULL,
  `cEmpDescripcion` varchar(200) DEFAULT NULL,
  `cEmpDireccionFiscal` varchar(200) DEFAULT NULL,
  `cEmpTelefono` varchar(45) DEFAULT NULL,
  `cEmpCelular` varchar(45) DEFAULT NULL,
  `cEmpEmail` varchar(45) DEFAULT NULL,
  `cEmpRuc` varchar(8) DEFAULT NULL,
  `nIdRubro` int(11) DEFAULT NULL,
  `cEmpLogoChico` varchar(200) DEFAULT NULL,
  `cEmpLogoGrande` varchar(200) DEFAULT NULL,
  `cEmpLogoFondo` varchar(200) DEFAULT NULL,
  `nEmpPropia` int(11) DEFAULT NULL COMMENT '1=si,0=no',
  `cEmpEstado` int(11) DEFAULT NULL COMMENT '1=activo,0=inactivo',
  PRIMARY KEY (`nEmpId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`empresa`
--

/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`nEmpId`,`cEmpNombre`,`cEmpDescripcion`,`cEmpDireccionFiscal`,`cEmpTelefono`,`cEmpCelular`,`cEmpEmail`,`cEmpRuc`,`nIdRubro`,`cEmpLogoChico`,`cEmpLogoGrande`,`cEmpLogoFondo`,`nEmpPropia`,`cEmpEstado`) VALUES 
 (1,'D\'luanas','calzados','españa','261811','3333333','xyz@GMAIL.COM','22',9,'vialu1.png','vialu1.png','vialu1.png',49,1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`hueco`
--

DROP TABLE IF EXISTS `hueco`;
CREATE TABLE `hueco` (
  `nHuecoId` int(11) NOT NULL AUTO_INCREMENT,
  `nIdFila` varchar(10) DEFAULT NULL COMMENT 'nX',
  `nIdColumna` varchar(10) DEFAULT NULL COMMENT 'nY',
  `nIdCelda` varchar(10) DEFAULT NULL COMMENT 'nZ',
  `nHueEstado` int(11) DEFAULT NULL,
  `nAlmId` int(11) NOT NULL,
  `nIdRepisa` varchar(10) DEFAULT NULL,
  `cHueNombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nHuecoId`),
  KEY `fk_hueco_almacen1_idx` (`nAlmId`),
  CONSTRAINT `fk_hueco_almacen1` FOREIGN KEY (`nAlmId`) REFERENCES `almacen` (`nAlmId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`hueco`
--

/*!40000 ALTER TABLE `hueco` DISABLE KEYS */;
INSERT INTO `hueco` (`nHuecoId`,`nIdFila`,`nIdColumna`,`nIdCelda`,`nHueEstado`,`nAlmId`,`nIdRepisa`,`cHueNombre`) VALUES 
 (1,'1','1','2',1,1,'1','hueco 1'),
 (2,'5','6','7',1,2,'4','hueco2'),
 (3,'2','3','5',1,3,'1','hueco 3'),
 (4,'2','2','4',1,1,'1',''),
 (5,'1','1','2',1,1,'1',''),
 (7,'1','1','6',0,3,'2','');
/*!40000 ALTER TABLE `hueco` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `nMenId` int(11) NOT NULL AUTO_INCREMENT,
  `nModId` int(11) NOT NULL,
  `cMenMenu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cMenUrl` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cMenOrden` tinyint(4) NOT NULL,
  `cMenActivo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cMenSobreNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nMenId`),
  KEY `nModId` (`nModId`),
  CONSTRAINT `nModId` FOREIGN KEY (`nModId`) REFERENCES `modulo` (`nModId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bdsiscom`.`menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`nMenId`,`nModId`,`cMenMenu`,`cMenUrl`,`cMenOrden`,`cMenActivo`,`cMenSobreNombre`) VALUES 
 (1,1,'Ir a Inicio','principal',1,'1','Ir a Inicio'),
 (3,2,'Insumos','insumo',1,'0',''),
 (4,2,'Despacho','despacho',2,'0',''),
 (5,4,'Personas','persona',2,'1','Personas'),
 (6,4,'Usuarios','usuarios',2,'1','Usuarios'),
 (11,2,'Ingresos','ingreso',4,'0',''),
 (13,3,'Empresa','empresa',1,'0','Empresa'),
 (14,3,'Stands','sucursal',3,'0','Stand'),
 (15,3,'Almacenes','almacen',4,'0','Almacen'),
 (16,3,'Casilleros','hueco',5,'0','Casillero'),
 (17,10,'Ingresar Producto','producto',1,'0','Ingresar Producto'),
 (18,9,'Caracteristicas','caracteristicas',1,'1','Caracteristicas'),
 (19,9,'Modelos','modelo',2,'0','Modelos'),
 (20,10,'Mis Productos Stand','envioproducto',2,'0','Mis Productos Stand'),
 (22,11,'Gestion de Promociones','promocion',1,'0','Gestion de Promociones'),
 (23,10,'Busquedas','producto/panelFndProducto',3,'0','Busquedas'),
 (24,12,'Ingresar Venta','venta',1,'0','IngresarVenta'),
 (25,12,'Mis Ventas','venta/panelMisVentas',2,'0','Mis Ventas');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE `modelo` (
  `nModeloId` int(10) NOT NULL AUTO_INCREMENT,
  `nModCodigo` int(10) NOT NULL,
  `nModEstado` int(10) NOT NULL,
  `cModDescripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`nModeloId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`modelo`
--

/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` (`nModeloId`,`nModCodigo`,`nModEstado`,`cModDescripcion`) VALUES 
 (4,4,1,'desc4'),
 (5,2,1,'desc2'),
 (6,3,1,'desc3'),
 (7,660,1,'660');
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `nModId` int(11) NOT NULL AUTO_INCREMENT,
  `cModModulo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nModOrden` tinyint(4) DEFAULT NULL,
  `cModIcono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cActivo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`nModId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bdsiscom`.`modulo`
--

/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` (`nModId`,`cModModulo`,`nModOrden`,`cModIcono`,`cActivo`) VALUES 
 (1,'Inicio',1,'icomoon-icon-vcard',1),
 (2,'Procesos',11,'icomoon-icon-stats-up',0),
 (3,'Empresa',2,'icomoon-icon-vcard',0),
 (4,'Usuarios',7,'icomoon-icon-user-4',1),
 (9,'Mantenedores',8,'icomoon-icon-bubble-dots-2',1),
 (10,'Productos',3,'icomoon-icon-bubble-dots-2',0),
 (11,'Promociones',4,'icomoon-icon-stats-up',0),
 (12,'Ventas',5,'icomoon-icon-cart',0);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `nMovId` int(11) NOT NULL AUTO_INCREMENT,
  `nTipoMovimiento` int(11) DEFAULT NULL COMMENT 'multitatabla: 1)\n-Ingreso de Almacen\n-Salida de Almacen\n-Venta(Boleta o Factura)\n',
  `dMovfecha` timestamp NULL DEFAULT NULL,
  `nTipoDocumento` int(11) DEFAULT NULL COMMENT 'multitabla\n-\n',
  `cMovNumDocumento` varchar(200) DEFAULT NULL COMMENT 'Numero documento, segun el tipo de documento.\n',
  `cMovEstado` int(11) DEFAULT NULL COMMENT '1=activo,0=inactivo\n',
  `nUsuario` int(11) DEFAULT NULL,
  `nMovSubTotal` decimal(10,2) DEFAULT NULL,
  `nMovIgv` decimal(10,2) DEFAULT NULL,
  `nMovTotal` decimal(10,2) DEFAULT NULL,
  `nPerIdResponsable` int(11) NOT NULL COMMENT 'Responsable',
  `nSurIdOrigen` int(11) NOT NULL,
  `nSurIdDestino` int(11) NOT NULL,
  `cMovDestino` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nMovId`),
  KEY `fk_movimiento_persona1_idx` (`nPerIdResponsable`),
  KEY `fk_movimiento_sucursal1_idx` (`nSurIdOrigen`),
  KEY `fk_movimiento_sucursal2_idx` (`nSurIdDestino`),
  CONSTRAINT `fk_movimiento_persona1` FOREIGN KEY (`nPerIdResponsable`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimiento_sucursal1` FOREIGN KEY (`nSurIdOrigen`) REFERENCES `sucursal` (`nSurId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimiento_sucursal2` FOREIGN KEY (`nSurIdDestino`) REFERENCES `sucursal` (`nSurId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`movimiento`
--

/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
INSERT INTO `movimiento` (`nMovId`,`nTipoMovimiento`,`dMovfecha`,`nTipoDocumento`,`cMovNumDocumento`,`cMovEstado`,`nUsuario`,`nMovSubTotal`,`nMovIgv`,`nMovTotal`,`nPerIdResponsable`,`nSurIdOrigen`,`nSurIdDestino`,`cMovDestino`) VALUES 
 (136,1,'2014-05-25 12:05:59',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (137,1,'2014-05-25 22:50:05',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (139,4,'2014-05-25 23:06:16',0,'',1,10,'0.00','0.00','0.00',16,4,4,'APIAT'),
 (140,4,'2014-05-25 23:15:48',0,'',1,10,'0.00','0.00','0.00',16,4,4,'APIAT'),
 (141,4,'2014-05-25 23:18:35',0,'',1,10,'0.00','0.00','0.00',16,4,4,'MALVINAS'),
 (142,5,'2014-05-25 23:59:30',0,'',1,10,'0.00','0.00','0.00',16,4,4,''),
 (143,5,'2014-05-25 23:59:33',0,'',1,10,'0.00','0.00','0.00',16,4,4,''),
 (144,2,'2014-05-26 00:10:05',0,'',1,10,'0.00','0.00','0.00',16,4,5,NULL),
 (145,2,'2014-05-26 00:11:41',0,'',1,10,'0.00','0.00','0.00',16,4,5,NULL),
 (146,2,'2014-05-26 00:14:08',0,'',1,10,'0.00','0.00','0.00',16,4,5,NULL),
 (147,3,'2014-05-26 01:28:48',0,'',1,16,'0.00','0.00','0.00',8,5,5,NULL),
 (148,1,'2014-06-16 16:55:41',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL);
INSERT INTO `movimiento` (`nMovId`,`nTipoMovimiento`,`dMovfecha`,`nTipoDocumento`,`cMovNumDocumento`,`cMovEstado`,`nUsuario`,`nMovSubTotal`,`nMovIgv`,`nMovTotal`,`nPerIdResponsable`,`nSurIdOrigen`,`nSurIdDestino`,`cMovDestino`) VALUES 
 (149,1,'2014-06-16 17:00:55',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (150,2,'2014-06-16 17:06:40',0,'',1,10,'0.00','0.00','0.00',16,4,5,NULL),
 (151,3,'2014-06-16 17:07:05',0,'',1,16,'0.00','0.00','0.00',8,5,5,NULL),
 (152,1,'2014-06-24 18:29:37',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (153,1,'2014-06-24 18:39:55',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (154,2,'2014-06-25 21:08:00',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (155,3,'2014-06-25 21:26:26',0,'',1,10,'0.00','0.00','0.00',16,4,4,NULL),
 (156,4,'2014-06-25 21:26:50',0,'',1,10,'0.00','0.00','0.00',16,4,4,'APIAT'),
 (158,6,'2014-06-28 12:59:33',0,'',1,10,'0.00','0.00','0.00',16,4,5,''),
 (159,6,'2014-06-28 14:53:29',0,'',1,10,'0.00','0.00','0.00',16,5,4,''),
 (160,6,'2014-06-28 14:53:55',0,'',1,10,'0.00','0.00','0.00',16,4,4,''),
 (161,6,'2014-06-28 14:54:09',0,'',1,10,'0.00','0.00','0.00',16,4,4,'');
INSERT INTO `movimiento` (`nMovId`,`nTipoMovimiento`,`dMovfecha`,`nTipoDocumento`,`cMovNumDocumento`,`cMovEstado`,`nUsuario`,`nMovSubTotal`,`nMovIgv`,`nMovTotal`,`nPerIdResponsable`,`nSurIdOrigen`,`nSurIdDestino`,`cMovDestino`) VALUES 
 (162,5,'2014-07-02 18:30:35',0,'',1,10,'0.00','0.00','0.00',16,4,4,'');
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`movimientodetalle`
--

DROP TABLE IF EXISTS `movimientodetalle`;
CREATE TABLE `movimientodetalle` (
  `nMovDetalleId` int(11) NOT NULL AUTO_INCREMENT,
  `nMovDetalleCantidad` int(11) DEFAULT NULL,
  `nMovDetallePrecio` decimal(10,2) DEFAULT NULL,
  `cMovDetalleEstado` varchar(2) DEFAULT NULL COMMENT 'A: producto Disponible, D: producto Derivado, E: producto Eliminado, V: vendido, P:prestado',
  `nProId` int(11) NOT NULL COMMENT 'nProductoId',
  `nMovId` int(11) NOT NULL COMMENT 'nMovimientoId',
  `nHuecoId` int(11) NOT NULL,
  `nProductoHueco` int(10) NOT NULL,
  PRIMARY KEY (`nMovDetalleId`),
  KEY `fk_movimientoDetalle_producto1_idx` (`nProId`),
  KEY `fk_movimientoDetalle_movimiento1_idx` (`nMovId`),
  KEY `fk_movimientoDetalle_hueco1_idx` (`nHuecoId`),
  KEY `nProductoHueco` (`nProductoHueco`),
  CONSTRAINT `fk_movimientoDetalle_hueco1` FOREIGN KEY (`nHuecoId`) REFERENCES `hueco` (`nHuecoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimientoDetalle_movimiento1` FOREIGN KEY (`nMovId`) REFERENCES `movimiento` (`nMovId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimientoDetalle_producto1` FOREIGN KEY (`nProId`) REFERENCES `producto` (`nProId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `movimientodetalle_ibfk_1` FOREIGN KEY (`nProductoHueco`) REFERENCES `productohueco` (`nProductoHueco`)
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`movimientodetalle`
--

/*!40000 ALTER TABLE `movimientodetalle` DISABLE KEYS */;
INSERT INTO `movimientodetalle` (`nMovDetalleId`,`nMovDetalleCantidad`,`nMovDetallePrecio`,`cMovDetalleEstado`,`nProId`,`nMovId`,`nHuecoId`,`nProductoHueco`) VALUES 
 (325,1,'0.00','A',39,136,1,226),
 (326,1,'0.00','A',39,136,1,227),
 (327,1,'0.00','A',40,137,5,228),
 (328,1,'0.00','A',40,137,5,229),
 (329,1,'0.00','P',40,140,5,229),
 (330,1,'0.00','P',39,141,1,227),
 (331,1,'0.00','A',40,142,5,229),
 (332,1,'0.00','A',39,143,1,227),
 (333,1,'0.00','D',40,146,2,228),
 (334,1,'0.00','A',40,147,2,228),
 (335,1,'0.00','A',41,148,1,230),
 (336,1,'0.00','A',41,148,1,231),
 (337,1,'0.00','A',41,148,1,232),
 (338,1,'0.00','A',41,148,1,233),
 (339,1,'0.00','A',41,148,1,234),
 (340,1,'0.00','A',42,149,1,235),
 (341,1,'0.00','A',42,149,1,236),
 (342,1,'0.00','D',42,150,2,235),
 (343,1,'0.00','A',42,151,2,235),
 (344,1,'0.00','A',43,152,1,237),
 (345,1,'0.00','A',44,153,1,238),
 (346,1,'0.00','D',42,154,1,236),
 (347,1,'0.00','A',42,155,1,236),
 (348,1,'0.00','P',42,156,1,236),
 (350,1,'0.00','A',42,158,2,236),
 (351,1,'0.00','A',42,159,4,236);
INSERT INTO `movimientodetalle` (`nMovDetalleId`,`nMovDetalleCantidad`,`nMovDetallePrecio`,`cMovDetalleEstado`,`nProId`,`nMovId`,`nHuecoId`,`nProductoHueco`) VALUES 
 (352,1,'0.00','A',42,160,1,236),
 (353,1,'0.00','A',42,161,1,236),
 (354,1,'0.00','A',42,162,1,236);
/*!40000 ALTER TABLE `movimientodetalle` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`multitabla`
--

DROP TABLE IF EXISTS `multitabla`;
CREATE TABLE `multitabla` (
  `nMulId` int(11) NOT NULL AUTO_INCREMENT,
  `nMulIdPadre` int(11) NOT NULL,
  `cMulDescripcion` varchar(250) CHARACTER SET utf8 NOT NULL,
  `dMulFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nMulOrden` tinyint(4) NOT NULL,
  `nMulEstado` char(1) CHARACTER SET utf8 NOT NULL,
  `nMulParticularidad` int(10) DEFAULT NULL,
  `cMulPadre` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `bEstado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nMulId`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`multitabla`
--

/*!40000 ALTER TABLE `multitabla` DISABLE KEYS */;
INSERT INTO `multitabla` (`nMulId`,`nMulIdPadre`,`cMulDescripcion`,`dMulFechaRegistro`,`nMulOrden`,`nMulEstado`,`nMulParticularidad`,`cMulPadre`,`bEstado`) VALUES 
 (1,1,'TIPO COMITE','2017-01-26 23:53:24',0,'E',NULL,'',1),
 (2,1,'PRESIDENTA','2017-01-26 23:53:24',1,'E',NULL,'',1),
 (3,1,'SECRETARIA','2017-01-26 23:53:24',1,'E',NULL,'',1),
 (4,4,'Tipos de Usuario','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (5,4,'Administrador','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (6,4,'Vendedor','2017-01-26 23:53:24',2,'A',NULL,'',1),
 (7,4,'Almacenero','2017-01-26 23:53:24',3,'E',NULL,'',1),
 (8,8,'TIPO RUBRO','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (9,8,'COMERCIO','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (10,8,'TRANSPORTES','2017-01-26 23:53:24',2,'A',NULL,'',1),
 (11,8,'PESCA','2017-01-26 23:53:24',3,'A',NULL,'',1),
 (12,12,'TIPO SUCURSAL','2017-01-26 23:53:24',0,'E',NULL,'',1),
 (13,12,'PRINCIPAL','2017-01-26 23:53:24',1,'E',NULL,'',1),
 (14,12,'SECUNDARIA','2017-01-26 23:53:24',2,'I',NULL,'',1),
 (15,15,'COLOR','2017-01-26 23:53:24',0,'A',65,'COLOR',1);
INSERT INTO `multitabla` (`nMulId`,`nMulIdPadre`,`cMulDescripcion`,`dMulFechaRegistro`,`nMulOrden`,`nMulEstado`,`nMulParticularidad`,`cMulPadre`,`bEstado`) VALUES 
 (16,15,'ROJA','2017-01-26 23:53:24',1,'A',65,'COLOR',1),
 (17,15,'GRANATE','2017-01-26 23:53:24',2,'A',65,'COLOR',1),
 (18,15,'VIOLETA','2017-01-26 23:53:24',3,'A',65,'COLOR',1),
 (19,19,'TACO','2017-01-26 23:53:24',0,'A',65,'TACO',1),
 (20,19,'3','2017-01-26 23:53:24',1,'A',65,'TACO',1),
 (21,19,'4','2017-01-26 23:53:24',2,'A',65,'TACO',1),
 (22,19,'5','2017-01-26 23:53:24',3,'A',65,'TACO',1),
 (23,19,'6','2017-01-26 23:53:24',4,'A',65,'TACO',1),
 (24,19,'7','2017-01-26 23:53:24',5,'A',65,'TACO',1),
 (25,19,'8','2017-01-26 23:53:24',6,'A',65,'TACO',1),
 (26,26,'PLATAFORMA','2017-01-26 23:53:24',0,'A',65,'PLATAFORMA',1),
 (27,26,'1','2017-01-26 23:53:24',1,'A',65,'PLATAFORMA',1),
 (28,26,'2','2017-01-26 23:53:24',2,'A',65,'PLATAFORMA',1),
 (29,26,'3','2017-01-26 23:53:24',3,'A',65,'PLATAFORMA',1),
 (30,26,'4','2017-01-26 23:53:24',4,'A',65,'PLATAFORMA',1),
 (31,26,'5','2017-01-26 23:53:24',5,'A',65,'PLATAFORMA',1);
INSERT INTO `multitabla` (`nMulId`,`nMulIdPadre`,`cMulDescripcion`,`dMulFechaRegistro`,`nMulOrden`,`nMulEstado`,`nMulParticularidad`,`cMulPadre`,`bEstado`) VALUES 
 (32,32,'TIPO DE CUERO','2017-02-18 16:02:59',0,'A',65,'TIPO DE CUERO',1),
 (33,32,'CUERO','2017-01-26 23:53:24',1,'A',65,'TIPO DE CUERO',1),
 (34,32,'SEMI-CUERO','2017-01-26 23:53:24',2,'A',65,'TIPO DE CUERO',1),
 (35,35,'TALLA','2017-01-26 23:53:24',0,'A',65,'TALLA',1),
 (36,35,'35','2017-01-27 00:39:55',1,'A',65,'TALLA',0),
 (37,35,'36','2017-01-26 23:53:24',2,'A',65,'TALLA',1),
 (38,35,'37','2017-01-26 23:53:24',3,'A',65,'TALLA',1),
 (39,35,'38','2017-01-26 23:53:24',4,'A',65,'TALLA',1),
 (40,40,'TIPO DE MOVIMIENTO','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (41,40,'INGRESO DE ALMACEN','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (42,40,'SALIDA DE ALMACEN','2017-01-26 23:53:24',2,'A',NULL,'',1),
 (43,40,'VENTA','2017-01-26 23:53:24',3,'A',NULL,'',1),
 (44,44,'TIPO DE DOCUMENTO','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (45,44,'BOLETA','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (46,44,'FACTURA','2017-01-26 23:53:24',2,'A',NULL,'',1);
INSERT INTO `multitabla` (`nMulId`,`nMulIdPadre`,`cMulDescripcion`,`dMulFechaRegistro`,`nMulOrden`,`nMulEstado`,`nMulParticularidad`,`cMulPadre`,`bEstado`) VALUES 
 (47,44,'GUIA DE REMISION','2017-01-26 23:53:24',3,'A',NULL,'',1),
 (48,48,'TIPO DE EMPRESA','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (49,48,'PROPIA','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (50,48,'ALQUILADA','2017-01-26 23:53:24',2,'A',NULL,'',1),
 (51,51,'TIPO SUCURSAL','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (52,51,'PRINCIPAL','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (53,51,'SECUNDARIO','2017-01-26 23:53:24',2,'A',NULL,'',1),
 (55,55,'TIPO SEGURO','2017-01-26 23:53:24',0,'E',NULL,'',1),
 (56,15,'azul','2017-01-26 23:53:24',4,'A',65,'COLOR',1),
 (57,15,'blanco','2017-01-26 23:53:24',5,'I',65,'COLOR',1),
 (58,15,'marron','2017-01-26 23:53:24',4,'I',65,'COLOR',1),
 (59,15,'rosado','2017-01-26 23:53:24',6,'A',65,'COLOR',1),
 (60,15,'coral','2017-01-26 23:53:24',8,'A',65,'COLOR',1),
 (61,15,'amarillo','2017-01-26 23:53:24',9,'I',65,'COLOR',1),
 (62,15,'pardo','2017-01-26 23:53:24',10,'A',65,'COLOR',1);
INSERT INTO `multitabla` (`nMulId`,`nMulIdPadre`,`cMulDescripcion`,`dMulFechaRegistro`,`nMulOrden`,`nMulEstado`,`nMulParticularidad`,`cMulPadre`,`bEstado`) VALUES 
 (63,15,'palo rosa','2017-01-26 23:53:24',11,'A',65,'COLOR',1),
 (64,64,'TIPO PARTICULARIDAD','2017-01-26 23:53:24',0,'A',NULL,'',1),
 (65,64,'CALZADO','2017-01-26 23:53:24',1,'A',NULL,'',1),
 (66,64,'OTROS','2017-01-26 23:53:24',2,'E',NULL,'',1),
 (67,15,'violaceo','2017-01-26 23:53:24',12,'A',NULL,'',1),
 (68,15,'esmeralda','2017-01-26 23:53:24',13,'A',NULL,'',1),
 (69,19,'50','2017-01-26 23:53:24',7,'A',NULL,'',1),
 (70,15,'blanquecino','2017-01-26 23:53:24',14,'A',NULL,'',1),
 (71,15,'cielo','2017-01-26 23:53:24',15,'A',NULL,'',1),
 (72,35,'39','2017-01-26 23:53:24',5,'A',65,'TALLA',1),
 (73,15,'azul amarillento','2017-01-26 23:53:24',16,'A',NULL,'',1),
 (74,15,'azul grizaceo','2017-01-26 23:53:24',17,'A',NULL,'',1),
 (75,15,'azul verduzco','2017-01-26 23:53:24',18,'A',NULL,'',1),
 (76,76,'TACONES','2017-01-26 23:53:24',0,'A',65,'TACONES',1),
 (77,77,'ORIGINAL','2017-01-26 23:53:24',0,'A',65,'ORIGINAL',1);
INSERT INTO `multitabla` (`nMulId`,`nMulIdPadre`,`cMulDescripcion`,`dMulFechaRegistro`,`nMulOrden`,`nMulEstado`,`nMulParticularidad`,`cMulPadre`,`bEstado`) VALUES 
 (78,15,'ESCARLATA','2017-01-26 23:53:24',19,'A',65,'COLOR',1),
 (79,15,'guinda','2017-01-26 23:53:24',20,'A',65,'COLOR',1),
 (80,80,'ADORNOS XTREMOS','2017-01-26 23:53:24',0,'A',65,'ADORNOS XTREMOS',1),
 (81,35,'40','2017-01-26 23:53:24',6,'A',65,'TALLA',1),
 (82,76,'altos','2017-01-27 00:39:37',1,'I',65,'TACO',0),
 (83,15,'turqueza','2017-01-26 23:53:24',21,'A',65,'COLOR',1),
 (84,35,'48','2017-01-26 23:53:24',22,'A',65,'TALLA',1),
 (85,15,'rojo','2017-01-26 23:53:24',22,'A',65,'COLOR',1),
 (86,76,'rojitoS','2017-02-18 17:02:52',2,'A',65,'TACONES',1),
 (87,61,'dorado','2017-02-18 17:02:52',1,'A',65,NULL,1);
/*!40000 ALTER TABLE `multitabla` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `nPermId` int(11) NOT NULL AUTO_INCREMENT,
  `nUsuCodigo` int(11) NOT NULL,
  `nMenId` int(11) NOT NULL,
  `dPermFechaInicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dPermFechaFin` datetime DEFAULT NULL,
  `cPermActivo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nPermId`),
  KEY `nUsuCodigo` (`nUsuCodigo`),
  KEY `nMenId` (`nMenId`),
  CONSTRAINT `nMenId` FOREIGN KEY (`nMenId`) REFERENCES `menu` (`nMenId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nUsuCodigo` FOREIGN KEY (`nUsuCodigo`) REFERENCES `usuario` (`nUsuCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bdsiscom`.`permiso`
--

/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` (`nPermId`,`nUsuCodigo`,`nMenId`,`dPermFechaInicio`,`dPermFechaFin`,`cPermActivo`) VALUES 
 (96,10,1,'2014-02-26 17:01:56',NULL,'1'),
 (97,10,6,'2014-02-26 17:02:42',NULL,'1'),
 (98,10,5,'2014-02-26 17:03:33',NULL,'1'),
 (99,10,13,'2014-02-26 17:03:33','2017-01-22 15:02:48','0'),
 (100,10,14,'2014-02-26 17:03:33','2017-01-22 15:02:48','0'),
 (101,10,15,'2014-02-26 17:03:33','2017-01-22 15:02:48','0'),
 (102,10,16,'2014-02-26 17:03:33','2017-01-22 15:02:48','0'),
 (103,10,17,'2014-02-26 17:03:33','2017-01-22 15:03:22','0'),
 (104,10,18,'2014-02-26 20:53:01','2017-03-01 22:30:30','0'),
 (105,10,13,'2014-03-04 17:53:16','2017-01-22 15:02:48','0'),
 (106,10,14,'2014-03-04 17:53:16','2017-01-22 15:02:48','0'),
 (107,10,15,'2014-03-04 17:53:16','2017-01-22 15:02:48','0'),
 (108,10,16,'2014-03-04 17:53:16','2017-01-22 15:02:48','0'),
 (109,10,17,'2014-03-04 17:53:16','2017-01-22 15:03:22','0'),
 (110,10,19,'2014-03-15 10:07:10','2017-01-22 15:03:22','0'),
 (111,10,20,'2014-03-22 16:04:27','2017-01-22 15:03:22','0'),
 (113,16,5,'2014-03-22 20:34:40',NULL,'1');
INSERT INTO `permiso` (`nPermId`,`nUsuCodigo`,`nMenId`,`dPermFechaInicio`,`dPermFechaFin`,`cPermActivo`) VALUES 
 (114,16,13,'2014-03-22 20:34:40',NULL,'1'),
 (115,16,14,'2014-03-22 20:34:40',NULL,'1'),
 (116,16,15,'2014-03-22 20:34:40',NULL,'1'),
 (117,16,16,'2014-03-22 20:34:40',NULL,'1'),
 (118,16,1,'2014-03-22 20:35:40',NULL,'1'),
 (119,16,6,'2014-03-23 19:45:36',NULL,'1'),
 (120,16,18,'2014-03-23 19:45:36',NULL,'1'),
 (121,16,19,'2014-03-23 19:45:36',NULL,'1'),
 (122,16,17,'2014-03-23 19:45:36','2014-03-31 05:29:06','0'),
 (123,16,20,'2014-03-23 19:45:36',NULL,'1'),
 (125,10,22,'2014-03-24 17:04:34','2017-01-22 15:02:48','0'),
 (126,10,23,'2014-04-09 21:31:12','2017-01-22 15:03:22','0'),
 (127,10,24,'2014-05-27 22:28:09','2017-01-22 15:03:22','0'),
 (128,10,25,'2014-05-27 22:28:09','2017-01-22 15:03:22','0'),
 (129,16,24,'2014-05-27 23:10:22',NULL,'1'),
 (130,16,25,'2014-05-27 23:10:22',NULL,'1'),
 (131,10,18,'2017-03-01 22:30:27',NULL,'1');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `nPerId` int(11) NOT NULL AUTO_INCREMENT,
  `cPerNombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerApellidoPaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerApellidoMaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerDni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `cPerDireccion` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `cPerTelefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cPerCelular` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cPerEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `tPerFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tPerFechaBaja` timestamp NULL DEFAULT NULL,
  `nSurId` int(10) NOT NULL,
  PRIMARY KEY (`nPerId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bdsiscom`.`persona`
--

/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`nPerId`,`cPerNombres`,`cPerApellidoPaterno`,`cPerApellidoMaterno`,`cPerDni`,`cPerDireccion`,`cPerTelefono`,`cPerCelular`,`cPerEstado`,`tPerFechaRegistro`,`tPerFechaBaja`,`nSurId`) VALUES 
 (1,'Juans','Perezs','Rodriguezs','77777777','Las Floress','95629841','244577881','0','2013-04-29 16:36:04',NULL,5),
 (8,'cristian','gonzalez','torres','46088871','Los jazmines 1212','(044) 26-18-11','9483563352','1','2013-05-16 16:24:48',NULL,5),
 (16,'Sara','jimenez ','torres','32523523','pajuiles','','','1','2014-02-02 16:15:00',NULL,4);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `nProId` int(11) NOT NULL AUTO_INCREMENT,
  `cProDescripcion` varchar(250) DEFAULT NULL,
  `nModeloId` int(11) NOT NULL,
  `nProPrecioReferencial` decimal(10,2) DEFAULT NULL,
  `nProEstado` smallint(6) DEFAULT NULL,
  `nCatId` int(11) DEFAULT NULL,
  PRIMARY KEY (`nProId`),
  KEY `fk_modelo_producto_idx` (`nModeloId`) USING BTREE,
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`nModeloId`) REFERENCES `modelo` (`nModeloId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`nProId`,`cProDescripcion`,`nModeloId`,`nProPrecioReferencial`,`nProEstado`,`nCatId`) VALUES 
 (39,'desc1',5,'10.00',1,1),
 (40,'desc1',4,'10.00',1,1),
 (41,'brasileños',4,'60.00',1,1),
 (42,'invierno',4,'40.00',1,2),
 (43,'zapatos de invierno',4,'65.00',1,3),
 (44,'ZAPATOS OTOÑO',4,'50.00',1,2);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`productodetalle`
--

DROP TABLE IF EXISTS `productodetalle`;
CREATE TABLE `productodetalle` (
  `nProdDetalleId` int(11) NOT NULL AUTO_INCREMENT,
  `nMulId` int(11) DEFAULT NULL COMMENT 'id de multitabla,tipo de zapato, color, tacos por plataforma.\njalo el nMulID',
  `nProductoHueco` int(11) NOT NULL,
  `nProdDetalleEstado` int(10) NOT NULL,
  PRIMARY KEY (`nProdDetalleId`),
  KEY `fk_productoDetalle_producto1_idx` (`nProductoHueco`) USING BTREE,
  CONSTRAINT `productodetalle_ibfk_1` FOREIGN KEY (`nProductoHueco`) REFERENCES `productohueco` (`nProductoHueco`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`productodetalle`
--

/*!40000 ALTER TABLE `productodetalle` DISABLE KEYS */;
INSERT INTO `productodetalle` (`nProdDetalleId`,`nMulId`,`nProductoHueco`,`nProdDetalleEstado`) VALUES 
 (20,36,227,1),
 (21,56,226,1),
 (22,36,226,0),
 (23,37,226,1),
 (24,72,226,0),
 (25,33,226,1),
 (26,81,226,0),
 (27,17,227,0),
 (28,36,236,1),
 (29,82,236,1),
 (30,56,235,1),
 (31,39,235,1),
 (32,82,238,1),
 (33,33,236,1),
 (34,20,236,1),
 (35,29,236,1),
 (36,38,237,1),
 (37,73,234,1),
 (38,39,234,1),
 (39,34,233,1),
 (40,30,232,1);
/*!40000 ALTER TABLE `productodetalle` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`productohueco`
--

DROP TABLE IF EXISTS `productohueco`;
CREATE TABLE `productohueco` (
  `nProductoHueco` int(11) NOT NULL AUTO_INCREMENT,
  `nCantidad` int(10) unsigned DEFAULT NULL,
  `idhueco` int(11) NOT NULL,
  `nProId` int(11) NOT NULL,
  `cProHueEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nProductoHueco`),
  KEY `fk_productoHueco_hueco1_idx` (`idhueco`),
  KEY `fk_productoHueco_producto1_idx` (`nProId`),
  CONSTRAINT `fk_productoHueco_hueco1` FOREIGN KEY (`idhueco`) REFERENCES `hueco` (`nHuecoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productoHueco_producto1` FOREIGN KEY (`nProId`) REFERENCES `producto` (`nProId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`productohueco`
--

/*!40000 ALTER TABLE `productohueco` DISABLE KEYS */;
INSERT INTO `productohueco` (`nProductoHueco`,`nCantidad`,`idhueco`,`nProId`,`cProHueEstado`) VALUES 
 (226,1,2,39,'A'),
 (227,1,1,39,'A'),
 (228,1,2,40,'A'),
 (229,1,3,40,'A'),
 (230,1,1,41,'A'),
 (231,1,1,41,'A'),
 (232,1,1,41,'A'),
 (233,1,1,41,'A'),
 (234,1,1,41,'A'),
 (235,1,2,42,'A'),
 (236,1,1,42,'A'),
 (237,1,1,43,'A'),
 (238,1,1,44,'A');
/*!40000 ALTER TABLE `productohueco` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`promocion`
--

DROP TABLE IF EXISTS `promocion`;
CREATE TABLE `promocion` (
  `nPromId` int(11) NOT NULL AUTO_INCREMENT,
  `cProDescripcion` varchar(300) DEFAULT NULL,
  `nPromEstado` int(11) DEFAULT NULL,
  `dFechaInicio` date DEFAULT NULL,
  `dFechaFin` date DEFAULT NULL,
  `nPromPorcentaje` int(11) DEFAULT NULL,
  `nPromCantidadInicial` int(11) DEFAULT NULL,
  `nPromDescuento` decimal(10,2) DEFAULT NULL,
  `cPromFoto` varchar(300) DEFAULT NULL,
  `nPromCantidadFinal` int(11) DEFAULT NULL,
  PRIMARY KEY (`nPromId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`promocion`
--

/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
INSERT INTO `promocion` (`nPromId`,`cProDescripcion`,`nPromEstado`,`dFechaInicio`,`dFechaFin`,`nPromPorcentaje`,`nPromCantidadInicial`,`nPromDescuento`,`cPromFoto`,`nPromCantidadFinal`) VALUES 
 (1,'Sin Promocion',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (15,'campaña escolar',1,'2014-03-04','2014-03-12',NULL,NULL,NULL,NULL,NULL),
 (16,'prom 1',1,'2014-03-03','2014-05-28',10,25,'0.10','',24),
 (26,'prom 3',1,'2014-05-05','2014-05-21',8,20,'0.08','',20),
 (27,'prom 4',1,'2014-05-27','2014-05-29',5,25,'0.05','69e79febdd29b6590558fd8d20afec33.jpg',2),
 (28,'prom 5',1,'2014-05-07','2014-05-13',10,20,'0.10','54ac614a29e51e0bc18643d0a9b14105.jpg',15),
 (29,'feria del calzado',1,'2014-05-06','2014-05-29',20,50,'0.20','f8969805341ee23311fbcc2aa7bafad2.jpg',0);
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`promociondetalle`
--

DROP TABLE IF EXISTS `promociondetalle`;
CREATE TABLE `promociondetalle` (
  `nPromDetalleId` int(11) NOT NULL AUTO_INCREMENT,
  `nProductoHuecoId` int(11) DEFAULT NULL,
  `nPromDetEstado` int(10) DEFAULT NULL,
  `nPromId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`nPromDetalleId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`promociondetalle`
--

/*!40000 ALTER TABLE `promociondetalle` DISABLE KEYS */;
INSERT INTO `promociondetalle` (`nPromDetalleId`,`nProductoHuecoId`,`nPromDetEstado`,`nPromId`) VALUES 
 (7,226,1,29),
 (8,226,1,27),
 (9,229,1,29),
 (10,227,1,27),
 (11,227,1,15),
 (12,229,1,28),
 (13,227,1,16),
 (14,226,1,28),
 (15,228,1,28),
 (16,235,1,28),
 (17,236,0,28),
 (18,236,0,27),
 (19,236,0,28),
 (20,236,0,27),
 (21,236,0,26),
 (22,236,0,26),
 (23,238,1,28);
/*!40000 ALTER TABLE `promociondetalle` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE `sucursal` (
  `nSurId` int(11) NOT NULL AUTO_INCREMENT,
  `cSurNombre` varchar(200) DEFAULT NULL,
  `cSurUbigeo` varchar(8) DEFAULT NULL,
  `cSurReferencia` varchar(500) DEFAULT NULL,
  `cSurLinea1` varchar(200) DEFAULT NULL,
  `cSurLinea2` varchar(200) DEFAULT NULL,
  `nTipoSucursal` int(11) DEFAULT NULL COMMENT 'PRINCIPAL,SECUNDARIA',
  `nEstado` int(11) DEFAULT NULL,
  `nEmpId` int(11) NOT NULL,
  `cSurTelefonos` varchar(100) DEFAULT NULL,
  `cSurDescripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nSurId`),
  KEY `fk_sucursal_empresa1_idx` (`nEmpId`),
  CONSTRAINT `fk_sucursal_empresa1` FOREIGN KEY (`nEmpId`) REFERENCES `empresa` (`nEmpId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdsiscom`.`sucursal`
--

/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` (`nSurId`,`cSurNombre`,`cSurUbigeo`,`cSurReferencia`,`cSurLinea1`,`cSurLinea2`,`nTipoSucursal`,`nEstado`,`nEmpId`,`cSurTelefonos`,`cSurDescripcion`) VALUES 
 (4,'stand1','','ayacucho','l213','l223',52,1,1,'','venta unicos zapatoss'),
 (5,'stand 2','','sinchi roca','l1','l2',53,1,1,'tl2','calzado mujer'),
 (6,'stand 3','','av españa','calzado','',53,1,1,'246121','calzado'),
 (7,'bahia','','jr. grau 665 stand 78','','',53,0,1,'241241','productos plataforma');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;


--
-- Table structure for table `bdsiscom`.`usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `nUsuCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nPerId` int(11) NOT NULL,
  `cUsuUsuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuClave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuTipo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nUsuCodigo`),
  KEY `fk_Usuario_Persona1` (`nPerId`),
  CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bdsiscom`.`usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`nUsuCodigo`,`nPerId`,`cUsuUsuario`,`cUsuClave`,`cUsuEstado`,`cUsuTipo`) VALUES 
 (1,1,'eduardors','865bedd2fba8fe20b828ed07600c64a4','1','6'),
 (10,16,'sara','a5b1969d25da6aa1e385589d949e9bf7','1','5'),
 (16,8,'46088871','a5b1969d25da6aa1e385589d949e9bf7','1','6');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Procedure `bdsiscom`.`splitter`
--

DROP PROCEDURE IF EXISTS `splitter`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `splitter`(x text, delim varchar(20))
begin
set @Valcount=substrCount(x,delim)+1;
SET @v1=0;
drop table if exists splitResults;
create temporary table splitResults
(
split_value varchar(1000)
);
while(@v1<@Valcount) DO
set @val=stringSplit(x,delim,@v1+1);
insert into splitResults (split_value) values (@val);
set @v1=@v1+1;
end while;
-- select split_value from  splitResults;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_D_ALMACEN`
--

DROP PROCEDURE IF EXISTS `USP_ALM_D_ALMACEN`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_D_ALMACEN`(
  p_ncodigo int(10)
)
update almacen set cAlmEstado = CASE WHEN
cAlmEstado='1' then '0' else '1' end
where nAlmId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_I_ALMACEN`
--

DROP PROCEDURE IF EXISTS `USP_ALM_I_ALMACEN`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_I_ALMACEN`(
  IN v_accion int,-- 0

  IN v_txt_cAlmNombre varchar(200), -- 1

	IN v_cbo_nSurId int, -- 2

  IN v_txt_cAlmUbigeo varchar(8), -- 3

  IN v_txt_cAlmReferencia varchar(300), -- 4

  IN v_txt_cAlmLinea1 varchar(200), -- 5

  IN v_txt_cAlmLinea2 varchar(200) -- 6
)
BEGIN
	INSERT INTO almacen(

cAlmNombre,

nSurId,

cAlmUbigeo,

cAlmReferencia,

cAlmLinea1,

cAlmLinea2,

cAlmEstado

)

	VALUES(

  v_txt_cAlmNombre,

  v_cbo_nSurId,

  v_txt_cAlmUbigeo,

  v_txt_cAlmReferencia,

  v_txt_cAlmLinea1,

  v_txt_cAlmLinea2,

  1

  );
  END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_S_ALMACEN`
--

DROP PROCEDURE IF EXISTS `USP_ALM_S_ALMACEN`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_S_ALMACEN`()
select a.*,s.*
 from
almacen a
inner join sucursal s on s.nSurId=a.nSurId
where a.cAlmEstado=1
order by cAlmEstado desc,nAlmId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_S_ALMACEN_DEL`
--

DROP PROCEDURE IF EXISTS `USP_ALM_S_ALMACEN_DEL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_S_ALMACEN_DEL`()
select a.*,s.*
 from
almacen a
inner join sucursal s on s.nSurId=a.nSurId
where a.cAlmEstado=0
order by cAlmEstado desc,nAlmId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_S_ALMACEN_GET`
--

DROP PROCEDURE IF EXISTS `USP_ALM_S_ALMACEN_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_S_ALMACEN_GET`(
IN v_idalmacen int)
begin
select a.*,
       s.*
 from
almacen a
inner join sucursal s on s.nSurId=a.nSurId
where a.nAlmId=v_idalmacen;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_S_ALMACEN_SUCURSAL`
--

DROP PROCEDURE IF EXISTS `USP_ALM_S_ALMACEN_SUCURSAL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_S_ALMACEN_SUCURSAL`(
IN v_idsucursal int)
select
a.nAlmId,a.cAlmNombre
 from
almacen a
inner join sucursal s on s.nSurId=a.nSurId
where a.nSurId=v_idsucursal
and a.cAlmEstado=1 and s.nEstado=1
order by a.nAlmId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_S_PADRE_GET`
--

DROP PROCEDURE IF EXISTS `USP_ALM_S_PADRE_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_S_PADRE_GET`(
IN v_idpadre int)
begin
select m.*
 from
multitabla m
where m.nMulId=v_idpadre;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_ALM_U_ALMACEN`
--

DROP PROCEDURE IF EXISTS `USP_ALM_U_ALMACEN`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ALM_U_ALMACEN`(
  IN v_accion int,-- 0
  IN v_txt_cAlmNombre varchar(200), -- 1
	IN v_cbo_nSurId int, -- 2
  IN v_txt_cAlmUbigeo varchar(8), -- 3
  IN v_txt_cAlmReferencia varchar(300), -- 4
  IN v_txt_cAlmLinea1 varchar(200), -- 5
  IN v_txt_cAlmLinea2 varchar(200), -- 6
  IN v_txt_nAlmId int
)
BEGIN
  update almacen
set
cAlmNombre=v_txt_cAlmNombre,
nSurId=v_cbo_nSurId,
cAlmUbigeo=v_txt_cAlmUbigeo,
cAlmReferencia=v_txt_cAlmReferencia,
cAlmLinea1=v_txt_cAlmLinea1,
cAlmLinea2=v_txt_cAlmLinea2
where nAlmId=v_txt_nAlmId;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_CARAC_S_TIPOCARACTERISTICA`
--

DROP PROCEDURE IF EXISTS `USP_CARAC_S_TIPOCARACTERISTICA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_CARAC_S_TIPOCARACTERISTICA`(
IN v_idPadre int)
SELECT nMulId,nMulIdPadre, upper(cMulDescripcion) cMulDescripcion FROM multitabla where  nMulIdPadre=v_idPadre and bEstado=1 and nMulOrden<>0
order by cMulDescripcion desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_CAT_S_CATEGORIA_ACTIVAS`
--

DROP PROCEDURE IF EXISTS `USP_CAT_S_CATEGORIA_ACTIVAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_CAT_S_CATEGORIA_ACTIVAS`()
select c.*
 from
categoria c
where cCatEstado=1
order by cCatEstado desc,nCatId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_EMP_I_EMPRESA`
--

DROP PROCEDURE IF EXISTS `USP_EMP_I_EMPRESA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_EMP_I_EMPRESA`(
  IN v_accion int,-- 0
  IN v_txt_cPerNombres varchar(50), -- 1
	IN v_txt_cEmpDescripcion varchar(200), -- 2
	IN v_txt_cEmpDireccionFiscal varchar(200),-- 3
  IN v_txt_cEmpTelefono varchar(45), -- 4
  IN v_txt_cEmpCelular varchar(45),-- 5
  IN v_txt_cEmpEmail varchar(45),-- 6
  IN v_txt_cEmpRuc varchar(45),-- 7
  IN v_nTipoRubro int,-- 8
  IN v_logochico varchar(200), -- 9
  IN v_logogrande varchar(200), -- 10
  IN v_logofondo varchar(200), -- 11
  IN v_nTipoEmpresa int -- 12

)
BEGIN
	INSERT INTO empresa(
  cEmpNombre,
  cEmpDescripcion,
  cEmpDireccionFiscal,
  cEmpTelefono,
  cEmpCelular,
  cEmpEmail,
  cEmpRuc,
  nIdRubro,
  cEmpLogoChico,
  cEmpLogoGrande,
  cEmpLogoFondo,
  nEmpPropia,
  cEmpEstado)
	VALUES(
  v_txt_cPerNombres,
  v_txt_cEmpDescripcion,
  v_txt_cEmpDireccionFiscal,
  v_txt_cEmpTelefono,
  v_txt_cEmpCelular,
  v_txt_cEmpEmail,
  v_txt_cEmpRuc,
  v_nTipoRubro,
  v_logochico,
  v_logogrande,
  v_logofondo,
  v_nTipoEmpresa,
  1
  );
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_EMP_S_EMPRESAS`
--

DROP PROCEDURE IF EXISTS `USP_EMP_S_EMPRESAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_EMP_S_EMPRESAS`(IN accion int)
select *
from empresa p
order by 1 desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_EMP_S_EMPRESA_GET`
--

DROP PROCEDURE IF EXISTS `USP_EMP_S_EMPRESA_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_EMP_S_EMPRESA_GET`(
IN v_idempresa int)
begin
select * from empresa where nEmpId=v_idempresa;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_EMP_U_EMPRESA`
--

DROP PROCEDURE IF EXISTS `USP_EMP_U_EMPRESA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_EMP_U_EMPRESA`(
  IN v_accion int,-- 0
  IN v_txt_cPerNombres varchar(50), -- 1
	IN v_txt_cEmpDescripcion varchar(200), -- 2
	IN v_txt_cEmpDireccionFiscal varchar(200),-- 3
  IN v_txt_cEmpTelefono varchar(45), -- 4
  IN v_txt_cEmpCelular varchar(45),-- 5
  IN v_txt_cEmpEmail varchar(45),-- 6
  IN v_txt_cEmpRuc varchar(45),-- 7
  IN v_nTipoRubro int,-- 8
  IN v_logochico varchar(200), -- 9
  IN v_logogrande varchar(200), -- 10
  IN v_logofondo varchar(200), -- 11
  IN v_nTipoEmpresa int, -- 12
  IN v_nEmpId int

)
BEGIN
  update empresa
set
  cEmpNombre=v_txt_cPerNombres,
  cEmpDescripcion=v_txt_cEmpDescripcion,
  cEmpDireccionFiscal=v_txt_cEmpDireccionFiscal,
  cEmpTelefono=v_txt_cEmpTelefono,
  cEmpCelular=v_txt_cEmpCelular,
  cEmpEmail=v_txt_cEmpEmail,
  cEmpRuc=v_txt_cEmpRuc,
  nIdRubro=v_nTipoRubro,
  cEmpLogoChico=v_logochico,
  cEmpLogoGrande=v_logogrande,
  cEmpLogoFondo=v_logofondo,
  nEmpPropia=v_nTipoEmpresa
where nEmpId=v_nEmpId;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_GEN_S_DICCIONARIO_DATOS_P2`
--

DROP PROCEDURE IF EXISTS `USP_GEN_S_DICCIONARIO_DATOS_P2`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_DICCIONARIO_DATOS_P2`(
in $Accion varchar(200),
in $Criterio varchar(100)
)
begin
/*
if $Accion='L-DD-General' then
select * from diccionario_datos where cDidDescripcion like concat('%',$Criterio,'%');
elseif  $Accion='L-DD-Combo' then
select * from diccionario_datos where nDidIDPadre=cast($Criterio as Unsigned) and cDidEstado='H';
end if;
*/
if $Accion='L-DD-General' then
select * from multitabla where cMulDescripcion like concat('%',$Criterio,'%');
elseif  $Accion='L-DD-Combo' then
select * from multitabla where nMulIdPadre=cast($Criterio as Unsigned) and nMulEstado='A'
and nMulOrden<>0;
/*elseif $Accion='L-DD-ComboParticular' then
select * from multitabla where nMulIdPadre=cast($Criterio as Unsigned) and nMulEstado='A'
and nMulOrden=-1;*/
end if;

end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_D_HUECO`
--

DROP PROCEDURE IF EXISTS `USP_HUE_D_HUECO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_D_HUECO`(
  p_ncodigo int(10)
)
update hueco set nHueEstado = CASE WHEN
nHueEstado='1' then '0' else '1' end
where nHuecoId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_I_HUECO`
--

DROP PROCEDURE IF EXISTS `USP_HUE_I_HUECO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_I_HUECO`(
  IN v_accion int,-- 0
  IN v_txt_cHueNombre varchar(100), -- 1
  IN v_txt_nIdRepisa varchar(10), -- 2
  IN v_txt_nIdFila varchar(10), -- 3
  IN v_txt_nIdColumna varchar(10), -- 4
  IN v_txt_nIdCelda varchar(10), -- 5
  IN v_txt_nAlmId int
)
BEGIN
	INSERT INTO hueco(
  cHueNombre,
  nIdRepisa,
  nIdFila,
  nIdColumna,
  nIdCelda,
  nAlmId,
  nHueEstado
)
	VALUES(
  v_txt_cHueNombre,
  v_txt_nIdRepisa,
  v_txt_nIdFila,
  v_txt_nIdColumna,
  v_txt_nIdCelda,
  v_txt_nAlmId,
  1
  );
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_S_HUECOS`
--

DROP PROCEDURE IF EXISTS `USP_HUE_S_HUECOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_S_HUECOS`()
select s.*,a.*,h.*
 from
hueco h
inner join almacen a on h.nAlmId=a.nAlmId
inner join sucursal s on s.nSurId=a.nSurId
where
-- h.nHueEstado=1
-- and
a.cAlmEstado=1 and s.nEstado=1
and h.nHueEstado=1
order by nHueEstado desc,nHuecoId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_S_HUECOS_DEL`
--

DROP PROCEDURE IF EXISTS `USP_HUE_S_HUECOS_DEL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_S_HUECOS_DEL`()
select s.*,a.*,h.*
 from
hueco h
inner join almacen a on h.nAlmId=a.nAlmId
inner join sucursal s on s.nSurId=a.nSurId
where
-- h.nHueEstado=1
-- and
a.cAlmEstado=1 and s.nEstado=1
and h.nHueEstado=0
order by nHueEstado desc,nHuecoId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_S_HUECO_ALMACEN`
--

DROP PROCEDURE IF EXISTS `USP_HUE_S_HUECO_ALMACEN`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_S_HUECO_ALMACEN`(
IN v_idalmacen int)
select h.*,
CONCAT('Repisa:',h.nIdRepisa,' Fila:',h.nIdFila, ' Columna:', h.nIdColumna, ' Celda:', h.nIdCelda) As casillero
from hueco h
where h.nAlmId=v_idalmacen
and h.nHueEstado=1
order by h.nIdRepisa asc,h.nIdFila asc,h.nIdColumna asc, h.nIdCelda%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_S_HUECO_GET`
--

DROP PROCEDURE IF EXISTS `USP_HUE_S_HUECO_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_S_HUECO_GET`(
IN v_idhueco int)
begin
select *
 from
hueco h
where h.nHuecoId=v_idhueco;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_HUE_U_HUECO`
--

DROP PROCEDURE IF EXISTS `USP_HUE_U_HUECO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_HUE_U_HUECO`(
  IN v_accion int,-- 0
  IN v_txt_cHueNombre varchar(100), -- 1
  IN v_txt_nIdRepisa varchar(10), -- 2
  IN v_txt_nIdFila varchar(10), -- 3
  IN v_txt_nIdColumna varchar(10), -- 4
  IN v_txt_nIdCelda varchar(10), -- 5
  IN v_txt_nAlmId int,
  IN v_txt_nHuecoId int
)
BEGIN
  update hueco
set
  cHueNombre=v_txt_cHueNombre,
  nIdRepisa=v_txt_nIdRepisa,
  nIdFila=v_txt_nIdFila,
  nIdColumna=v_txt_nIdColumna,
  nIdCelda=v_txt_nIdCelda,
  nAlmId=v_txt_nAlmId
where nHuecoId=v_txt_nHuecoId;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MOD_D_MODELO`
--

DROP PROCEDURE IF EXISTS `USP_MOD_D_MODELO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MOD_D_MODELO`(
  p_ncodigo int(10)
)
update modelo set nModEstado = CASE WHEN
nModEstado='1' then '0' else '1' end
where nModeloId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MOD_I_MODELO`
--

DROP PROCEDURE IF EXISTS `USP_MOD_I_MODELO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MOD_I_MODELO`(
  IN v_accion int,-- 0
  IN v_txt_nModCodigo int, -- 1
	IN v_txt_cModDescripcion varchar(500)

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nModeloID char(1);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;


if exists(select * from modelo where nModCodigo=v_txt_nModCodigo)then
      set I_nModeloID= "2";
else

  INSERT INTO modelo(
    nModCodigo,
    cModDescripcion,
    nModEstado
  )
	VALUES(
  v_txt_nModCodigo,
  v_txt_cModDescripcion,
  1
  );
  set I_nModeloID= "1";
  END IF ;
  IF insert_error THEN
        select "-1" as nModID;
        ROLLBACK ;
    ELSE
    select I_nModeloID as nModID;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MOD_S_MODELO`
--

DROP PROCEDURE IF EXISTS `USP_MOD_S_MODELO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MOD_S_MODELO`()
select m.*
 from
modelo m

order by nModEstado desc,nModCodigo desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MOD_S_MODELO_ACTIVAS`
--

DROP PROCEDURE IF EXISTS `USP_MOD_S_MODELO_ACTIVAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MOD_S_MODELO_ACTIVAS`()
select m.*
 from
modelo m
where nModEstado=1
order by nModEstado desc,nModCodigo desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MOD_S_MODELO_GET`
--

DROP PROCEDURE IF EXISTS `USP_MOD_S_MODELO_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MOD_S_MODELO_GET`(
IN v_id int)
begin
select m.*
 from
modelo m
where m.nModeloId=v_id;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MOD_U_MODELO`
--

DROP PROCEDURE IF EXISTS `USP_MOD_U_MODELO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MOD_U_MODELO`(
  IN v_accion int,-- 0
  IN v_txt_idModelo int,
  IN v_txt_nModCodigo int, -- 1
	IN v_txt_cModDescripcion varchar(500)

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare U_nModeloID char(1);
declare get_modeloId int;
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;
set get_modeloId=0;
set get_modeloId = (select nModeloId from modelo where nModCodigo= v_txt_nModCodigo limit 0,1);

if not exists(select * from modelo where nModCodigo=v_txt_nModCodigo)then
   update modelo
    set
      nModCodigo      = v_txt_nModCodigo,
      cModDescripcion = v_txt_cModDescripcion
     where
      nModeloId=v_txt_idModelo;
    set U_nModeloID= "1";
else
  if v_txt_idModelo=get_modeloId then
    update modelo
    set
      nModCodigo      = v_txt_nModCodigo,
      cModDescripcion = v_txt_cModDescripcion
     where
      nModeloId=v_txt_idModelo;
    set U_nModeloID= "1";
  else
      set U_nModeloID= "2";
  END IF ;
END IF ;

  IF insert_error THEN
        select "-1" as nModID;
        ROLLBACK ;
    ELSE
    select U_nModeloID as nModID;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_D_HIJOS`
--

DROP PROCEDURE IF EXISTS `USP_MUL_D_HIJOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_D_HIJOS`(
  p_ncodigo int(10)
)
update multitabla set bEstado = CASE WHEN
bEstado=1 then 0 else 1 end
where nMulId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_I_HIJOS`
--

DROP PROCEDURE IF EXISTS `USP_MUL_I_HIJOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_I_HIJOS`(
  IN v_accion int,-- 0
  IN v_txt_nMulIdPadre int,
  IN v_txt_cMulDescripcion varchar(250),
  IN v_txt_cMulOrden int,
  In v_txt_nMulParticularidad int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nMultitablaID char(1);
declare I_nUltimoOrden int;

declare c_cMulPadre varchar(250);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;
/*declare I_nIdMultitabla int;
set I_nIdMultitabla=(select nMulId from multitabla order by 1 desc limit 0,1);
set I_nIdMultitabla=I_nIdMultitabla+1;
*/
set I_nUltimoOrden = (select  max(nMulOrden) from multitabla where nMulIdPadre=v_txt_nMulIdPadre);
set I_nUltimoOrden=I_nUltimoOrden+1;

if exists(select * from multitabla where cMulDescripcion=v_txt_cMulDescripcion and nMulIdPadre=v_txt_nMulIdPadre)then
      set I_nMultitablaID= "2";
else

  set c_cMulPadre= (select cMulDescripcion from multitabla where nMulIdPadre=v_txt_nMulIdPadre and nMulOrden=0 limit 1);
	INSERT INTO multitabla
 (
  nMulIdPadre,
  cMulDescripcion,
  nMulOrden,
  nMulEstado,
  nMulParticularidad,
  cMulPadre
 )
	VALUES(
  v_txt_nMulIdPadre,
  v_txt_cMulDescripcion,
--  v_txt_cMulOrden,
  I_nUltimoOrden,
  'A',
  v_txt_nMulParticularidad,--  65,
  c_cMulPadre
  );
  set I_nMultitablaID= "1";
  END IF ;
  IF insert_error THEN
        select "-1" as nMultiID;
        ROLLBACK ;
    ELSE
    select I_nMultitablaID as nMultiID;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_I_HIJOS2`
--

DROP PROCEDURE IF EXISTS `USP_MUL_I_HIJOS2`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_I_HIJOS2`(
  IN v_accion int,-- 0
  IN v_txt_nMulIdPadre int,
  IN v_txt_cMulDescripcion varchar(250),
  IN v_txt_cMulOrden int,
  In v_txt_nMulParticularidad int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nMultitablaID char(1);
declare I_nUltimoOrden int;

declare c_cMulPadre varchar(250);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;
/*declare I_nIdMultitabla int;
set I_nIdMultitabla=(select nMulId from multitabla order by 1 desc limit 0,1);
set I_nIdMultitabla=I_nIdMultitabla+1;
*/
set I_nUltimoOrden = (select  max(nMulOrden) from multitabla where nMulIdPadre=v_txt_nMulIdPadre);
set I_nUltimoOrden=I_nUltimoOrden+1;

if exists(select * from multitabla where cMulDescripcion=v_txt_cMulDescripcion and nMulIdPadre=v_txt_nMulIdPadre)then
      set I_nMultitablaID= "2";
else

  set c_cMulPadre= (select cMulDescripcion from multitabla where nMulIdPadre=v_txt_nMulIdPadre and nMulOrden=0 limit 1);
	INSERT INTO multitabla
 (
  nMulIdPadre,
  cMulDescripcion,
  nMulOrden,
  nMulEstado,
  nMulParticularidad,
  cMulPadre
 )
	VALUES(
  v_txt_nMulIdPadre,
  v_txt_cMulDescripcion,
--  v_txt_cMulOrden,
  I_nUltimoOrden,
  'A',
  v_txt_nMulParticularidad,--  65,
  c_cMulPadre
  );
  set I_nMultitablaID= "1";
  END IF ;
  IF insert_error THEN
        select "-1" as nMultiID;
        ROLLBACK ;
    ELSE
    select I_nMultitablaID as nMultiID;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_I_PADRES`
--

DROP PROCEDURE IF EXISTS `USP_MUL_I_PADRES`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_I_PADRES`(
  IN v_accion int,-- 0
  IN v_txt_cPerNombres varchar(250)

)
BEGIN
declare I_nIdMultitabla int;
set I_nIdMultitabla=(select nMulId from multitabla order by 1 desc limit 0,1);
set I_nIdMultitabla=I_nIdMultitabla+1;

	INSERT INTO multitabla
 (
  nMulIdPadre,
  cMulDescripcion,
  nMulEstado,
  nMulParticularidad,
  cMulPadre
 )
	VALUES(
  I_nIdMultitabla,
  UPPER(v_txt_cPerNombres),
  'A',
  65,
  UPPER(v_txt_cPerNombres)
  );
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_HIJOS`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_HIJOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_HIJOS`(
  txt_idTipoCaracteristica int,
  txt_caracteristica  varchar(40) ,
  txt_chkEstado int
  )
if txt_idTipoCaracteristica=-1    then
   -- tipo Caracteristica: todos
  if  txt_chkEstado=1 then
   -- estado:todos
   select
    mul1.nMulId
    ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
    , mul1.cMulDescripcion as hijo
    ,mul1.nMulEstado
    ,mul1.bEstado
    from multitabla mul1
    where
     mul1.nMulOrden<>0
     and
    mul1.nMulEstado<>'E'
    and mul1.cMulDescripcion like concat('%',CONVERT(txt_caracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
    and nMulParticularidad=65
    order by mul1.nMulIdPadre desc,mul1.nMulOrden;

  else
     -- solo activos
    select
    mul1.nMulId
    ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
    , mul1.cMulDescripcion as hijo
    ,mul1.nMulEstado
    ,mul1.bEstado
    from multitabla mul1
    where
     mul1.nMulOrden<>0
     and
    mul1.nMulEstado<>'E'
    and mul1.bEstado=1
    and mul1.cMulDescripcion like concat('%',CONVERT(txt_caracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
    and nMulParticularidad=65
    order by mul1.nMulIdPadre desc,mul1.nMulOrden;

  end if;


else
   -- con tipo caracteristica
    if  txt_chkEstado=1 then
   -- estado:todos
     select
   mul1.nMulId
  ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
  , mul1.cMulDescripcion as hijo
  ,mul1.nMulEstado
  ,mul1.bEstado
  from multitabla mul1
  where
   mul1.nMulOrden<>0
     and
    mul1.nMulEstado<>'E'
    and mul1.nMulIdPadre=txt_idTipoCaracteristica
    and mul1.cMulDescripcion like concat('%',CONVERT(txt_caracteristica USING utf8) COLLATE utf8_spanish_ci ,'%')
    and nMulParticularidad=65
    order by mul1.nMulIdPadre desc,mul1.nMulOrden;
   else
   -- estado solo activos
     select
   mul1.nMulId
  ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
  , mul1.cMulDescripcion as hijo
  ,mul1.nMulEstado
  ,mul1.bEstado
  from multitabla mul1
  where
   mul1.nMulOrden<>0
     and
    mul1.nMulEstado<>'E'
    and mul1.nMulIdPadre=txt_idTipoCaracteristica
    and mul1.cMulDescripcion like concat('%',CONVERT(txt_caracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
    and nMulParticularidad=65
    and mul1.bEstado=1
    order by mul1.nMulIdPadre desc,mul1.nMulOrden;
   end if;


end if%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_HIJOS_CALZADO`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_HIJOS_CALZADO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_HIJOS_CALZADO`()
select *
from multitabla p
where nMulOrden=0
and nMulEstado ='A'
and nMulParticularidad=65
order by p.cMulDescripcion desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_HIJOS_x_idPadre`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_HIJOS_x_idPadre`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_HIJOS_x_idPadre`(
  IN v_idpadre int
)
select
mul1.nMulId as idHijo
, mul1.cMulDescripcion as hijo
,mul1.nMulEstado
from multitabla mul1
where
mul1.nMulIdPadre=v_idpadre
and
 mul1.nMulOrden<>0
 and
-- mul1.nMulEstado<>'E'
mul1.nMulEstado='A'
order by hijo asc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_HIJO_GET`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_HIJO_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_HIJO_GET`(IN txt_nMulId int)
select
mul1.*
from
multitabla mul1
where nMulId=txt_nMulId%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_PADRES`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_PADRES`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_PADRES`()
select *
from multitabla p
where nMulOrden=0
and nMulEstado <>'E'
order by p.cMulDescripcion desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_PADRES_ACTIVOS`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_PADRES_ACTIVOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_PADRES_ACTIVOS`()
select *
from multitabla p
where nMulOrden=0
and nMulEstado ='A'
order by p.cMulDescripcion desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_PADRES_CALZADO`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_PADRES_CALZADO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_PADRES_CALZADO`()
select *
from multitabla p
where nMulOrden=0
and nMulEstado <>'E'
and nMulParticularidad=65
order by p.cMulDescripcion desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_PADRES_CALZADO_ACTIVOS`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_PADRES_CALZADO_ACTIVOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_PADRES_CALZADO_ACTIVOS`()
select *
from multitabla p
where nMulOrden=0
and nMulEstado ='A'
and nMulParticularidad=65 
order by p.cMulDescripcion desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_PADRE_GET`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_PADRE_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_PADRE_GET`(
IN v_idpadre int)
begin
select m.*
 from
multitabla m
where m.nMulId=v_idpadre;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_S_SUBCARACTERISTICAS`
--

DROP PROCEDURE IF EXISTS `USP_MUL_S_SUBCARACTERISTICAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_S_SUBCARACTERISTICAS`(
  txt_idTipoCaracteristica int, -- combo padre
  txt_idCaracteristica int,  -- combo hijo
  txt_subcaracteristica  varchar(40) ,
  txt_chkEstado int
  )
begin
-- todos idTipoCaracteristica, todos idCaracteristica
if txt_idTipoCaracteristica=-1 and txt_idCaracteristica=-1 then
     if  txt_chkEstado=1 then
        -- estado:todos
        select
            mul1.nMulId
          ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
          , mul1.cMulDescripcion as hijo
          ,mul1.nMulEstado
          ,mul1.bEstado
          from multitabla mul1
          where
           mul1.nMulOrden<>0
         and
          mul1.nMulEstado<>'E'
         and mul1.cMulDescripcion like concat('%',CONVERT(txt_subcaracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
        and nMulParticularidad=65
        order by mul1.nMulIdPadre desc,mul1.nMulOrden;
     else
       -- solo activos
          select
          mul1.nMulId
          ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
          , mul1.cMulDescripcion as hijo
          ,mul1.nMulEstado
          ,mul1.bEstado
          from multitabla mul1
          where
           mul1.nMulOrden<>0
           and
          mul1.nMulEstado<>'E'
          and mul1.bEstado=1
          and mul1.cMulDescripcion like concat('%',CONVERT(txt_subcaracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
        and nMulParticularidad=65
        order by mul1.nMulIdPadre desc,mul1.nMulOrden;
     end if;
end if;

-- todos idTipoCaracteristica, con idCaracteristica
if txt_idTipoCaracteristica=-1  and txt_idCaracteristica>0  then
  if  txt_chkEstado=1 then
   -- estado:todos
       select
        mul1.nMulId
        ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
        , mul1.cMulDescripcion as hijo
        ,mul1.nMulEstado
        ,mul1.bEstado
        from multitabla mul1
        where
         mul1.nMulOrden<>0
         and
        mul1.nMulEstado<>'E'
        and mul1.nMulIdPadre=  txt_idCaracteristica
        and mul1.cMulDescripcion like concat('%',CONVERT(txt_subcaracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
        and nMulParticularidad=65
        order by mul1.nMulIdPadre desc,mul1.nMulOrden;
  else
     -- solo activos
      select
        mul1.nMulId
      ,(select mul2.cMulDescripcion from multitabla mul2 where mul2.nMulId=mul1.nMulIdPadre and nMulOrden=0) as padre
      , mul1.cMulDescripcion as hijo
      ,mul1.nMulEstado
      ,mul1.bEstado
      from multitabla mul1
      where
       mul1.nMulOrden<>0
       and
        mul1.nMulEstado<>'E'
         and mul1.nMulIdPadre=  txt_idCaracteristica
        and mul1.bEstado=1
        and mul1.cMulDescripcion like concat('%',CONVERT(txt_subcaracteristica USING utf8) COLLATE utf8_spanish_ci,'%')
        and nMulParticularidad=65
        order by mul1.nMulIdPadre desc,mul1.nMulOrden;
  end if;

end if;



end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_U_HIJO`
--

DROP PROCEDURE IF EXISTS `USP_MUL_U_HIJO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_U_HIJO`(
  IN v_accion int,
  IN v_txt_nMulId int,
  IN v_txt_nMulIdPadre int,
  IN v_txt_cMulDescripcion varchar(250),
  IN v_txt_nOrden int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nMultitablaID char(1);

declare c_cMulPadre varchar(250);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

if exists(select * from multitabla where cMulDescripcion=v_txt_cMulDescripcion and nMulIdPadre=v_txt_nMulIdPadre)then
      set I_nMultitablaID= "2";
else

  set c_cMulPadre = (select cMulDescripcion from multitabla where nMulIdPadre=v_txt_nMulIdPadre and nMulOrden=0 limit 1);

  update multitabla
  set
  cMulDescripcion=v_txt_cMulDescripcion,
  nMulIdPadre=v_txt_nMulIdPadre,
  cMulPadre=c_cMulPadre
  where
  nMulId=v_txt_nMulId;

  set I_nMultitablaID= "1";
  END IF ;
  IF insert_error THEN
        select "-1" as nMultiID;
        ROLLBACK ;
    ELSE
    select I_nMultitablaID as nMultiID;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_MUL_U_PADRE`
--

DROP PROCEDURE IF EXISTS `USP_MUL_U_PADRE`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MUL_U_PADRE`(
  IN v_accion int,
  IN v_txt_nMulId int,
  IN v_txt_cMulDescripcion varchar(200)
)
BEGIN
  update multitabla
set
cMulDescripcion = UPPER(v_txt_cMulDescripcion),
cMulPadre = UPPER(v_txt_cMulDescripcion)
where nMulId=v_txt_nMulId;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PER_I`
--

DROP PROCEDURE IF EXISTS `USP_PER_I`;
DELIMITER %%;
CREATE DEFINER=`medconsu`@`localhost` PROCEDURE `USP_PER_I`(
	-- IN nPerId int(11),
	IN v_cPerNombres varchar(50),
	IN v_cPerApellidoPaterno varchar(50),
	IN v_cPerApellidoMaterno varchar(50),
	IN v_cPerDni char(8),
	IN v_cPerDireccion varchar(90),
	IN v_cPerTelefono varchar(20),
	IN v_cPerCelular varchar(11)
	-- IN v_cPerEstado char(1)
	-- IN v_tPerFechaRegistro timestamp
	-- IN tPerFechaBaja timestamp,
)
BEGIN
	INSERT INTO persona(cPerNombres, cPerApellidoPaterno, cPerApellidoMaterno, cPerDni, cPerDireccion, cPerTelefono, cPerCelular)
	VALUES( v_cPerNombres,v_cPerApellidoPaterno,v_cPerApellidoMaterno,v_cPerDni,v_cPerDireccion,v_cPerTelefono,v_cPerCelular);
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PER_S`
--

DROP PROCEDURE IF EXISTS `USP_PER_S`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_S`(IN `p_tipo` VARCHAR(5))
BEGIN
IF p_tipo='LPU' THEN -- Lista Personas Con Usuarios 
    SELECT p.nPerId,u.nUsuCodigo,p.cPerNombres,p.cPerApellidoPaterno,
        p.cPerApellidoMaterno,p.cPerDni
    from persona p 
        INNER JOIN usuario u ON p.nPerId = u.nPerId 
    WHERE p.cPerEstado ='1' and u.cUsuEstado = '1';
ELSE
    SELECT nPerId,cPerNombres,cPerApellidoPaterno,cPerApellidoMaterno,cPerDni,
    cPerDireccion,cPerTelefono,cPerCelular,cPerEstado from persona;
END IF;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PER_S_DNI`
--

DROP PROCEDURE IF EXISTS `USP_PER_S_DNI`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_S_DNI`(IN `v_cPerDni` VARCHAR(8))
BEGIN
    SELECT 
        p.nPerId,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno, p.cPerDni 
    FROM persona p where p.cPerDni =v_cPerDni and nPerId NOT IN (select nPerId from usuario) ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_D_DETALLE_PROMOCION`
--

DROP PROCEDURE IF EXISTS `USP_PROM_D_DETALLE_PROMOCION`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_D_DETALLE_PROMOCION`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nPromDetalleId int
--  IN v_txt_nProductoId int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nPromDetId char(1);
declare v_nPromId int;
declare v_cuentaPromocion int;
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;
/*
if exists(select nPromId from promocion where nPromId=v_txt_nPromId and nPromCantidadFinal=0)then
      set I_nPromDetId= "3";
elseif exists(select nPromDetalleId from promociondetalle where nProductoHuecoId=v_txt_nProductoId and nPromId=v_txt_nPromId and nPromDetEstado=1)then
      set I_nPromDetId= "2";
else

	INSERT INTO promociondetalle(
  nProductoHuecoId,
  nPromId,
  nPromDetEstado
)
	VALUES(
  v_txt_nProductoId,
  v_txt_nPromId,
  v_txt_nPromDetEstado
  );
*/
  set v_nPromId=(select nPromId from promociondetalle where nPromDetalleId=v_txt_nPromDetalleId);
  set v_cuentaPromocion = (select nPromCantidadFinal from promocion where nPromId=v_nPromId );
/*  if v_cuentaPromocion=1 then
    set I_nPromDetId= "-2";-- falta stock promocion
  else*/
    update promociondetalle
    set nPromDetEstado=0
    where
    nPromDetalleId=v_txt_nPromDetalleId;

    update promocion
    set nPromCantidadFinal=nPromCantidadFinal+1
    where nPromId=v_nPromId;

    set I_nPromDetId= "1";
/*  end if;*/

/*  END IF ;*/
  IF insert_error THEN
        select "-1" as nPromDetId;
        ROLLBACK ;
    ELSE
    select I_nPromDetId as nPromDetId;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_I_DETALLE_PROMOCION`
--

DROP PROCEDURE IF EXISTS `USP_PROM_I_DETALLE_PROMOCION`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_I_DETALLE_PROMOCION`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nPromId int,
  IN v_txt_nProductoId int, -- 1
  IN v_txt_nPromDetEstado int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nPromDetId char(1);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

if exists(select nPromId from promocion where nPromId=v_txt_nPromId and nPromCantidadFinal=0)then
      set I_nPromDetId= "3";
elseif exists(select nPromDetalleId from promociondetalle where nProductoHuecoId=v_txt_nProductoId and nPromId=v_txt_nPromId and nPromDetEstado=1)then
      set I_nPromDetId= "2";
else

	INSERT INTO promociondetalle(
  nProductoHuecoId,
  nPromId,
  nPromDetEstado
)
	VALUES(
  v_txt_nProductoId,
  v_txt_nPromId,
  v_txt_nPromDetEstado
  );

  update promocion
  set nPromCantidadFinal=nPromCantidadFinal-1
  where nPromId=v_txt_nPromId;

  set I_nPromDetId= "1";
  END IF ;
  IF insert_error THEN
        select "-1" as nPromDetId;
        ROLLBACK ;
    ELSE
    select I_nPromDetId as nPromDetId;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_I_PROMOCION`
--

DROP PROCEDURE IF EXISTS `USP_PROM_I_PROMOCION`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_I_PROMOCION`(
  IN v_accion int,-- 0
  IN v_txt_cProDescripcion varchar(300), -- 1
	IN v_txt_dFechaInicio varchar(20), -- 2
  IN v_txt_dFechaFin varchar(20), -- 3

  IN v_txt_nPromPorcentaje int, -- 4
  IN v_txt_nPromCantidad int, -- 5
  IN v_txt_nPromDescuento decimal(10,2), -- 6
  IN v_txt_cPromFoto varchar(300) -- 7
)
BEGIN
declare fechaini date;
declare fechafin date;
-- set fechaini=STR_TO_DATE(v_txt_dFechaInicio,'%a %b %H:%i:%s +0000 %Y');
-- set fechafin=STR_TO_DATE(v_txt_dFechaInicio,'%a %b %H:%i:%s +0000 %Y');
-- set fechaini =  STR_TO_DATE(v_txt_dFechaInicio, '%m/%d/%Y');
-- set fechafin =  STR_TO_DATE(v_txt_dFechaFin, '%m/%d/%Y');

	INSERT INTO promocion(
  cProDescripcion,
  dFechaInicio,
  dFechaFin,
  nPromEstado,
  nPromPorcentaje,
  nPromCantidadInicial,
  nPromDescuento,
  cPromFoto,
  nPromCantidadFinal
)
	VALUES(
  v_txt_cProDescripcion,
  STR_TO_DATE(v_txt_dFechaInicio, '%d/%m/%Y'),
  STR_TO_DATE(v_txt_dFechaFin, '%d/%m/%Y'),
  1,
  v_txt_nPromPorcentaje,
  v_txt_nPromCantidad,
  v_txt_nPromDescuento,
  v_txt_cPromFoto,
  v_txt_nPromCantidad
  );
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_S_PRODUCTO_PROMOCION`
--

DROP PROCEDURE IF EXISTS `USP_PROM_S_PRODUCTO_PROMOCION`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_S_PRODUCTO_PROMOCION`(txt_idproductohueco int(10))
select pd.nPromDetalleId, p.*,pd.nPromDetEstado
from productohueco ph
inner join promociondetalle pd on ph.nProductoHueco=pd.nProductoHuecoId
inner join promocion p on p.nPromId=pd.nPromId
where p.nPromEstado=1 and
pd.nProductoHuecoId=txt_idproductohueco
and pd.nPromDetEstado=1
order by pd.nPromDetalleId asc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_S_PROMOCION`
--

DROP PROCEDURE IF EXISTS `USP_PROM_S_PROMOCION`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_S_PROMOCION`()
select p.*,
-- DATE_FORMAT(p.dFechaInicio, '%d/%m/%Y %H:%i:%S') as fechainicio,
DATE_FORMAT(p.dFechaInicio, '%d/%m/%Y') as fechainicio,
DATE_FORMAT(p.dFechaFin, '%d/%m/%Y') as fechafin
 from
promocion p

order by nPromEstado desc,nPromId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_S_PROMOCION_ACTIVAS`
--

DROP PROCEDURE IF EXISTS `USP_PROM_S_PROMOCION_ACTIVAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_S_PROMOCION_ACTIVAS`()
select p.*
 from
promocion p
where nPromEstado=1
order by nPromEstado desc,nPromId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_S_PROMOCION_DETALLE_PROMOCION`
--

DROP PROCEDURE IF EXISTS `USP_PROM_S_PROMOCION_DETALLE_PROMOCION`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_S_PROMOCION_DETALLE_PROMOCION`(txt_idpromocion int(10))
select p.nPromId,p.cProDescripcion as promocion,p.nPromEstado,p.dFechaInicio,p.dFechaFin,pd.*,pu.*,mo.*
from promocion p
inner join promociondetalle pd on p.nPromId=pd.nPromId
inner join producto pu on pu.nProId=pd.nProductoId
inner join modelo mo on mo.nModeloId=pu.nModeloId
where p.nPromId=txt_idpromocion
order by nPromDetEstado  desc , nPromDetalleId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PROM_S_PROMOCION_GET`
--

DROP PROCEDURE IF EXISTS `USP_PROM_S_PROMOCION_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PROM_S_PROMOCION_GET`(IN txt_nproductohueco int)
select
ph.nProductoHueco,
pro.cProDescripcion,
p.cProDescripcion as promocion,
p.nPromPorcentaje as porcentaje,
p.nPromDescuento as descuento,
p.nPromEstado,
pd.nPromDetEstado
from promociondetalle pd
inner join productohueco ph on pd.nProductoHuecoId=ph.nProductoHueco
inner join promocion p on p.nPromId=pd.nPromId
inner join producto pro on pro.nProId=ph.nProId
where ph.nProductoHueco=txt_nproductohueco  and pd.nPromDetEstado=1%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_D_DETALLE_PRODUCTO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_D_DETALLE_PRODUCTO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_D_DETALLE_PRODUCTO`(
  p_ncodigo int(10)
)
update productodetalle set nProdDetalleEstado = CASE WHEN
nProdDetalleEstado ='1' then '0' else '1' end
where nProdDetalleId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_D_PRODUCTO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_D_PRODUCTO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_D_PRODUCTO`(
  p_ncodigo int(10)
)
update productohueco
set cProHueEstado = CASE WHEN
cProHueEstado='A' then 'I' else 'A' end
where nProductoHueco=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_DETALLE_PRODUCTO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_DETALLE_PRODUCTO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_DETALLE_PRODUCTO`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nProdHueId int, -- 1
  IN v_txt_nMulId int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProdDetalleId char(1);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;


if exists(select * from productodetalle where nMulId=v_txt_nMulId and nProductoHueco=v_txt_nProdHueId)then
      set I_nProdDetalleId= "2";
else
INSERT INTO productodetalle(
  nProductoHueco,
  nMulId,
  nProdDetalleEstado
)
	VALUES(
  v_txt_nProdHueId,
  v_txt_nMulId,
  1
);

  set I_nProdDetalleId= "1";
END IF ;
  IF insert_error THEN
        select "-1" as nProdDetalleId;
        ROLLBACK ;
    ELSE
    select I_nProdDetalleId as nProdDetalleId;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO`(
  IN v_accion varchar(40),-- 0
  IN v_txt_cProDescripcion varchar(200), -- 1
  IN v_txt_nModeloId int, -- 2
  IN v_txt_nProPrecioReferencia decimal(10,2) -- 3
)
BEGIN
	INSERT INTO producto(
  cProDescripcion,
  nModeloId,
  nProPrecioReferencial,
  nProEstado
)
	VALUES(
  v_txt_cProDescripcion,
  v_txt_nModeloId,
  v_txt_nProPrecioReferencia,
  1
  );
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO_DERIVA2`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO_DERIVA2`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO_DERIVA2`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nIdHueco int, -- 1 productohueco
  IN v_txt_nProductoHueco varchar(1000), -- 2 productohueco
  IN v_txt_nTipoMovimiento int, -- 3 movimiento
  IN v_txt_dMovfecha timestamp, -- 4 movimiento
  IN v_txt_nTipoDocumento int, -- 5 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 6 movimiento
  IN v_txt_cMovEstado int, -- 7 movimiento
  IN v_txt_nUsuario int, -- 8 movimiento
  IN v_txt_nPerIdResponsable int, -- 9 movimiento
  IN v_txt_nSurIdOrigen int, -- 10 movimiento
  IN v_txt_nSurIdDestino int -- 11 movimiento

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
declare $v1 int DEFAULT 1;
declare $MovID int;
declare $idproducto int;
-- declare $idpromocion int;

declare $Valcuenta int;
declare $val1 int;
declare $valorproductohueco int;

DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

SET $val1=0;
set $valorproductohueco=0;
/* 1 */

call splitter(v_txt_nProductoHueco,',');
update productohueco set idhueco=v_txt_nIdHueco, cProHueEstado='D'
where nProductoHueco in (select split_value from splitResults);


/* 2 */
INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino
   )
  VALUES(
  2,
  now(),
  v_txt_nTipoDocumento,
  v_txt_cMovNumDocumento,
  v_txt_cMovEstado,
  v_txt_nUsuario,
  '',
  '',
  '',
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino
  );
set $MovID= last_insert_id();

/* 4 */
-- set $Valcuenta=(select count(*) from splitResults);
set $Valcuenta=substrCount(v_txt_nProductoHueco,',')+1;
while($val1<$Valcuenta) DO
set $valorproductohueco=stringSplit(v_txt_nProductoHueco,',',$val1+1);
-- select $valorproductohueco;
set $idproducto=(select nProId from movimientodetalle where nProductoHueco=$valorproductohueco order by nMovDetalleId desc limit 1);
-- set $idpromocion=(select nPromId from movimientodetalle where nProductoHueco=$valorproductohueco order by nMovDetalleId desc limit 1);


INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
      'D',
      $idproducto,
      $MovID,
      v_txt_nIdHueco,
--      $idpromocion,
      $valorproductohueco
      );
--
set $val1=$val1+1;
end while;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK ;
    ELSE
    select I_nProducto as nProdIns;
        COMMIT;
  END IF ;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO_DERIVAR`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO_DERIVAR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO_DERIVAR`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nIdHueco int, -- 1 productohueco
  IN v_txt_nProductoHueco varchar(1000), -- 2 productohueco
  IN v_txt_nTipoMovimiento int, -- 3 movimiento
  IN v_txt_dMovfecha timestamp, -- 4 movimiento
  IN v_txt_nTipoDocumento int, -- 5 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 6 movimiento
  IN v_txt_cMovEstado int, -- 7 movimiento
  IN v_txt_nUsuario int, -- 8 movimiento
  IN v_txt_nPerIdResponsable int, -- 9 movimiento
  IN v_txt_nSurIdOrigen int, -- 10 movimiento
  IN v_txt_nSurIdDestino int -- 11 movimiento

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
declare $v1 int DEFAULT 1;
declare $MovID int;
declare $idproducto int;
-- declare $idpromocion int;

declare $Valcuenta int;
declare $val1 int;
declare $valorproductohueco int;

DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

SET $val1=0;
set $valorproductohueco=0;
/* 1 */

call splitter(v_txt_nProductoHueco,',');
update productohueco set idhueco=v_txt_nIdHueco, cProHueEstado='D'
where nProductoHueco in (select split_value from splitResults);


/* 2 */
INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino
   )
  VALUES(
  2,
  now(),
  v_txt_nTipoDocumento,
  v_txt_cMovNumDocumento,
  v_txt_cMovEstado,
  v_txt_nUsuario,
  '',
  '',
  '',
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino
  );
set $MovID= last_insert_id();

/* 4 */
-- set $Valcuenta=(select count(*) from splitResults);
set $Valcuenta=substrCount(v_txt_nProductoHueco,',')+1;
while($val1<$Valcuenta) DO
set $valorproductohueco=stringSplit(v_txt_nProductoHueco,',',$val1+1);
-- select $valorproductohueco;
set $idproducto=(select nProId from movimientodetalle where nProductoHueco=$valorproductohueco order by nMovDetalleId desc limit 1);
-- set $idpromocion=(select nPromId from movimientodetalle where nProductoHueco=$valorproductohueco order by nMovDetalleId desc limit 1);


INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
      'D',
      $idproducto,
      $MovID,
      v_txt_nIdHueco,
--      $idpromocion,
      $valorproductohueco
      );
--
set $val1=$val1+1;
end while;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK ;
    ELSE
    select I_nProducto as nProdIns;
        COMMIT;
  END IF ;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO_HUECO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO_HUECO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO_HUECO`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nProId int, -- 1
  IN v_txt_idHueco int,
  IN v_txt_nCantidad int
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProductoHueco char(1);
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;


if exists(select * from productohueco where idhueco=v_txt_idHueco and nProId=v_txt_nProId)then
      set I_nProductoHueco= "2";
else

	INSERT INTO productohueco(
  nProId,
  idhueco,
  nCantidad,
  nProHueEstado
)
	VALUES(
  v_txt_nProId,
  v_txt_idHueco,
  v_txt_nCantidad,
  1
  );

  set I_nProductoHueco= "1";
  END IF ;
  IF insert_error THEN
        select "-1" as nProductoHueco;
        ROLLBACK ;
    ELSE
    select I_nProductoHueco as nProductoHueco;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO_INGRESO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO_INGRESO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO_INGRESO`(
  IN v_accion varchar(40),-- 0
  IN v_txt_cProDescripcion varchar(200), -- 1 producto
  IN v_txt_nModeloId int, -- 2 producto
  IN v_txt_nProPrecioReferencia decimal(10,2), -- 3 producto
  IN v_txt_nProEstado int, -- 4 producto

  IN v_txt_nCatId int,  -- 5 producto
  IN v_txt_nCantidad int, -- 6 productohueco
  IN v_txt_nProHueEstado int, -- 7 productohueco
  IN v_txt_nTipoMovimiento int, -- 8 movimiento
  IN v_txt_dMovfecha timestamp, -- 9 movimiento
  IN v_txt_nTipoDocumento int, -- 10 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 11 movimiento
  IN v_txt_cMovEstado int, -- 12 movimiento
  IN v_txt_nUsuario int, -- 13 movimiento
  IN v_txt_nMovSubTotal decimal(10,2), -- 14 movimiento
  IN v_txt_nMovIgv decimal(10,2), -- 15 movimiento
  IN v_txt_nMovTotal decimal(10,2), -- 16 movimiento
  IN v_txt_nPerIdResponsable int, -- 17 movimiento
  IN v_txt_nSurIdOrigen int, -- 18 movimiento
  IN v_txt_nSurIdDestino int, -- 19 movimiento
  IN v_txt_nMovDetalleCantidad int, -- 20 movimientodetalle
  IN v_txt_nMovDetallePrecio decimal(10,2), -- 21 movimientodetalle
  IN v_txt_cMovDetalleEstado int, -- 22 movimientodetalle
  IN v_txt_nProId int, -- 23 movimientodetalle
  IN v_txt_nMovId int, -- 24 movimientodetalle
  IN v_txt_nHuecoId int -- 25 movimientodetalle
  --  IN v_txt_nPromId int -- 26 movimientodetalle

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
declare $nProdID int;
declare $nProductoHuecoId int;
declare $v1 int DEFAULT 1;
declare $MovID int;
-- set v1=1;
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

-- set $va=1;
/*USP_UBI_I_CALLE revisar*/
/* 1 */
	INSERT INTO producto(
    cProDescripcion,
    nModeloId,
    nProPrecioReferencial,
    nProEstado,
    nCatId
  )
	VALUES(
    v_txt_cProDescripcion,
    v_txt_nModeloId,
    v_txt_nProPrecioReferencia,
    1,
    v_txt_nCatId
  );
set $nProdID= last_insert_id();
/* 2 */
/*
  WHILE $v1 <= v_txt_nCantidad DO
    INSERT INTO productohueco(
      nCantidad,
      idhueco,
      nProId,
      nProHueEstado
     )
    VALUES(
      1,
      v_txt_nHuecoId,
      $nProdID,
      -- 1
      'P'
    );
    SET $v1 = $v1 +1;
  END WHILE;
*/
/* 3 */
  INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino
   )
  VALUES(
  v_txt_nTipoMovimiento,
  now(),
  v_txt_nTipoDocumento,
  v_txt_cMovNumDocumento,
  v_txt_cMovEstado,
  v_txt_nUsuario,
  v_txt_nMovSubTotal,
  v_txt_nMovIgv,
  v_txt_nMovTotal,
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino
  );
  set $MovID= last_insert_id();
  SET $v1 = 1;
/* 4 */
  WHILE $v1 <= v_txt_nCantidad DO
      INSERT INTO productohueco(
      nCantidad,
      idhueco,
      nProId,
      cProHueEstado
     )
    VALUES(
      1,
      v_txt_nHuecoId,
      $nProdID,
      -- 1
      'A'
    );
--    set $nProductoHuecoId=last_insert_id();

      INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
--      v_txt_cMovDetalleEstado,
      'A',
      $nProdID,
      $MovID,
      v_txt_nHuecoId,
  --    v_txt_nPromId,
      last_insert_id()
      );
    SET $v1 = $v1 +1;
  END WHILE;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= $nProdID;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK ;
    ELSE
--    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED ;
    select I_nProducto as nProdIns;

        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO_INGRESO_PRUEBA1`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO_INGRESO_PRUEBA1`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO_INGRESO_PRUEBA1`(
  IN v_accion varchar(40),-- 0
  IN v_txt_cProDescripcion varchar(200), -- 1 producto
  IN v_txt_nModeloId int, -- 2 producto
  IN v_txt_nProPrecioReferencia decimal(10,2), -- 3 producto
  IN v_txt_nProEstado int, -- 4 producto
  IN v_txt_nCantidad int, -- 5 productohueco
  IN v_txt_nProHueEstado int, -- 6 productohueco
  IN v_txt_nTipoMovimiento int, -- 7 movimiento
  IN v_txt_dMovfecha timestamp, -- 8 movimiento
  IN v_txt_nTipoDocumento int, -- 9 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 10 movimiento
  IN v_txt_cMovEstado int, -- 11 movimiento
  IN v_txt_nUsuario int, -- 12 movimiento
  IN v_txt_nMovSubTotal decimal(10,2), -- 13 movimiento
  IN v_txt_nMovIgv decimal(10,2), -- 14 movimiento
  IN v_txt_nMovTotal decimal(10,2), -- 15 movimiento
  IN v_txt_nPerIdResponsable int, -- 16 movimiento
  IN v_txt_nSurIdOrigen int, -- 17 movimiento
  IN v_txt_nSurIdDestino int, -- 18 movimiento
  IN v_txt_nMovDetalleCantidad int, -- 19 movimientodetalle
  IN v_txt_nMovDetallePrecio decimal(10,2), -- 20 movimientodetalle
  IN v_txt_cMovDetalleEstado int, -- 21 movimientodetalle
  IN v_txt_nProId int, -- 22 movimientodetalle
  IN v_txt_nMovId int, -- 23 movimientodetalle
  IN v_txt_nHuecoId int, -- 24 movimientodetalle
  IN v_txt_nPromId int -- 25 movimientodetalle

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto char(1);
declare $nCalID int;
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

select  v_accion,
        v_txt_cProDescripcion,
        v_txt_nModeloId,
        v_txt_nProPrecioReferencia,
        v_txt_nProEstado,
        v_txt_nCantidad,
        v_txt_nProHueEstado,
        v_txt_nTipoMovimiento,
        v_txt_dMovfecha,
        v_txt_nTipoDocumento,
        v_txt_cMovNumDocumento,
        v_txt_cMovEstado,
        v_txt_nUsuario,
        v_txt_nMovSubTotal,
        v_txt_nMovIgv,
        v_txt_nMovTotal,
        v_txt_nPerIdResponsable,
        v_txt_nSurIdOrigen,
        v_txt_nSurIdDestino,
        v_txt_nMovDetalleCantidad,
        v_txt_nMovDetallePrecio,
        v_txt_cMovDetalleEstado,
        v_txt_nProId,
        v_txt_nMovId,
        Iv_txt_nHuecoId,
        v_txt_nPromId
/*
                    '',
            'desc1',
            '6',
            '10',
            1,
            '5',
            1,
            1,
            '',
            '',
            '',
            1,
            '16',
            '',
            '',
            '',
            '16',
            '4',
            '4',
            '5',
            '',
            1,
            '',
            '',
            '4',
            '1'
*/

/*USP_UBI_I_CALLE revisar*/
/*
	INSERT INTO producto(
  cProDescripcion,
  nModeloId,
  nProPrecioReferencial,
  nProEstado
)
	VALUES(
  v_txt_cProDescripcion,
  v_txt_nModeloId,
  v_txt_nProPrecioReferencia,
  1
  );
set $nCalID= last_insert_id();
*/


/*if exists(select * from productohueco where idhueco=v_txt_idHueco and nProId=v_txt_nProId)then
      set I_nProductoHueco= "2";
else
	INSERT INTO productohueco(
  nProId,
  idhueco,
  nCantidad,
  nProHueEstado
)
	VALUES(
  v_txt_nProId,
  v_txt_idHueco,
  v_txt_nCantidad,
  1
  );
  set I_nProductoHueco= "1";
  END IF ;*/


/*  set I_nProducto = "1";
  IF insert_error THEN
        select "-1" as nProducto;
        ROLLBACK ;
    ELSE
    select I_nProducto as nProducto;
        COMMIT;
  END IF ;
*/
        COMMIT;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_I_PRODUCTO_VENDER`
--

DROP PROCEDURE IF EXISTS `USP_PRO_I_PRODUCTO_VENDER`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_I_PRODUCTO_VENDER`(
  IN v_accion varchar(40),-- 0
  IN v_txt_nMovDetalleCantidad int, -- 1 movimientodetalle
  IN v_txt_nMovDetallePrecio varchar(200), -- 2 movimientodetalle
  IN v_txt_cMovDetalleEstado varchar(2), -- 3 movimientodetalle
  IN v_txt_nProId int, -- 4 movimientodetalle
  IN v_txt_nMovId int, -- 5 movimientodetalle
  IN v_txt_nHuecoId int, -- 6 movimientodetalle
  IN v_txt_nProductoHueco varchar(500) -- 7 movimientodetalle
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
-- declare $v1 int DEFAULT 1;
declare $MovID int;
declare $idproducto int;
declare $idhueco int;
-- declare $idpromocion int;
declare $Valcuenta int;
declare $val1 int;
declare $valorproductohueco int;
declare $valorprecio DECIMAL(10,2);

DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

SET $val1=0;
set $Valcuenta=substrCount(v_txt_nProductoHueco,'-')+1;
while($val1<$Valcuenta) DO
set $valorproductohueco=stringSplit(v_txt_nProductoHueco,'-',$val1+1);
set $valorprecio       =stringSplit(v_txt_nMovDetallePrecio,'-',$val1+1);
set $idproducto=(select nProId from productohueco
                  where nProductoHueco=$valorproductohueco limit 1
                 );
set $idhueco   =(select idhueco from productohueco
                  where nProductoHueco=$valorproductohueco limit 1
                 );
INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      $valorprecio,
      'V',
      $idproducto,
      v_txt_nMovId,
      $idhueco,
      $valorproductohueco
      );
update productohueco set cProHueEstado = 'V'
where nProductoHueco=$valorproductohueco;
--
set $val1=$val1+1;
end while;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK;
    ELSE
    select I_nProducto as nProdIns;
        COMMIT;
  END IF;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_FND_PRODUCTOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_FND_PRODUCTOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_FND_PRODUCTOS`(IN txt_modelo int)
select
-- pd.nProdDetalleEstado,
ph.nProductoHueco as codigogenerado,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
mo.nModCodigo,
mul2.nMulId,
-- mo.*,
-- replace(replace(group_concat(concat(mul2.cMulPadre,': ',mul2.cMulDescripcion,' ', pd.nProdDetalleEstado)), 'TIPO DE ',''),'TIPO','')as detalle,
-- replace(replace(group_concat(concat(mul2.cMulPadre,': ',mul2.cMulDescripcion,' ', pd.nProdDetalleEstado)), 'TIPO DE ',''),'TIPO','')as detalle,
-- QUEDA GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN mul2.cMulDescripcion ELSE '' END) AS detalle,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,

s.cSurNombre as stand,a.cAlmNombre as almacen
-- ,mul2.*
-- ,prom.cProDescripcion
-- from productodetalle pd
from producto p
left join productohueco ph on ph.nProId=p.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
-- left join productohueco ph on ph.nProductoHueco=pd.nProductoHueco
-- left join producto p on ph.nProId=p.nProId
left join modelo mo on mo.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mov on mov.nMovId=mdet.nMovId
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId
where
-- pd.nProdDetalleEstado=1
p.nProEstado=1
and mo.nModeloId=txt_modelo
-- and pd.nProdDetalleEstado=1

 group by ph.nProductoHueco%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_FND_PRODUCTOS2`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_FND_PRODUCTOS2`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_FND_PRODUCTOS2`(IN txt_modelo int)
select
pd.nProdDetalleEstado,
ph.nProductoHueco as codigogenerado,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
mo.nModCodigo,
mul2.nMulId,
-- replace(replace(group_concat(concat(mul2.cMulPadre,': ',mul2.cMulDescripcion,' ', pd.nProdDetalleEstado)), 'TIPO DE ',''),'TIPO','')as detalle,
-- replace(replace(group_concat(concat(mul2.cMulPadre,': ',mul2.cMulDescripcion,' ', pd.nProdDetalleEstado)), 'TIPO DE ',''),'TIPO','')as detalle,
-- QUEDA GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN mul2.cMulDescripcion ELSE '' END) AS detalle,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,

s.cSurNombre as stand,a.cAlmNombre as almacen
,mul2.*
-- ,prom.cProDescripcion
-- from productodetalle pd
from producto p
left join productohueco ph on ph.nProId=p.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
-- left join productohueco ph on ph.nProductoHueco=pd.nProductoHueco
-- left join producto p on ph.nProId=p.nProId
left join modelo mo on mo.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mov on mov.nMovId=mdet.nMovId
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId
where
-- pd.nProdDetalleEstado=1
p.nProEstado=1
-- and pd.nProdDetalleEstado=1

 group by ph.nProductoHueco%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS`()
select
ph.nProductoHueco as codigogenerado,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
ph.cProHueEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mo on mo.nMovId=mdet.nMovId
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

where ph.cProHueEstado<>'I'
 group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS2`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS2`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS2`()
select
ph.nProductoHueco as codigogenerado,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mo on mo.nMovId=mdet.nMovId
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

where ph.cProHueEstado<>'I'
 group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_ACTIVAS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_ACTIVAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_ACTIVAS`()
select p.*,m.*, concat(p.cProDescripcion,' modelo:',m.nModCodigo) as descripcion
from producto p
inner join modelo m on m.nModeloId=p.nModeloId
where p.nProEstado=1
order by p.nProEstado desc,p.nProId desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_ELIMINADOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_ELIMINADOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_ELIMINADOS`()
select
ph.nProductoHueco as codigogenerado,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
ph.cProHueEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mo on mo.nMovId=mdet.nMovId
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

where ph.cProHueEstado='I'
 group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_X_STAND`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_X_STAND`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_X_STAND`(IN txt_stand int)
select
ph.nProductoHueco,
ph.nProductoHueco as codigogenerado,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
p.nProPrecioReferencial,
p.cProDescripcion,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mo on mo.nMovId=mdet.nMovId
-- left join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

where s.nSurId=txt_stand and ph.cProHueEstado='A'
and mo.nSurIdOrigen=txt_stand
-- and mdet.cMovDetalleEstado='A'
group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_X_STAND_ENVIADOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_X_STAND_ENVIADOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_X_STAND_ENVIADOS`(IN txt_stand int)
select
-- p.*,ph.*,h.*,a.*,s.*,m.*
-- ,prom.cProDescripcion as promocion,ph.nProductoHueco as codigogenerado
ph.nProductoHueco as codigogenerado,
ph.nProductoHueco,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
and mdet.nMovDetalleId in (
--      select max(nMovDetalleId),nProductoHueco from movimientodetalle where nProductoHueco in(197,198)
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join movimiento mov on mov.nMovId=mdet.nMovId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId
-- left join modelo m on m.nModeloId=p.nModeloId

where
ph.cProHueEstado='D'
-- and mdet.cMovDetalleEstado='D'
and mov.nSurIdOrigen=txt_stand
-- s.nSurId=txt_stand
group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_X_STAND_PRESTADOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_X_STAND_PRESTADOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_X_STAND_PRESTADOS`(IN txt_stand int)
select
-- h.*,a.*,s.*,m.*,prom.cProDescripcion as promocion,
ph.nProductoHueco as codigogenerado,
ph.nProductoHueco,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen,
mov.cMovDestino as destino,
DATE_FORMAT(mov.dMovFecha, '%d/%m/%Y %H:%i:%S') as fecha
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
and mdet.nMovDetalleId in (
--      select max(nMovDetalleId),nProductoHueco from movimientodetalle where nProductoHueco in(197,198)
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
-- left join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

left join movimiento mov on mov.nMovId=mdet.nMovId
where
ph.cProHueEstado='P'
-- and mdet.cMovDetalleEstado='P'
and mov.nSurIdOrigen=txt_stand
-- s.nSurId=txt_stand
group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_X_STAND_VENDIDOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_X_STAND_VENDIDOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_X_STAND_VENDIDOS`(IN txt_stand int)
select
-- h.*,a.*,s.*,m.*,prom.cProDescripcion as promocion,
ph.nProductoHueco as codigogenerado,
ph.nProductoHueco,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen,
mov.cMovDestino as destino,
mdet.nMovDetallePrecio as precioventaproducto,
DATE_FORMAT(mov.dMovFecha, '%d/%m/%Y %H:%i:%S') as fecha
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
and mdet.nMovDetalleId in (
--      select max(nMovDetalleId),nProductoHueco from movimientodetalle where nProductoHueco in(197,198)
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
-- left join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

left join movimiento mov on mov.nMovId=mdet.nMovId
where
ph.cProHueEstado='V'
-- and mdet.cMovDetalleEstado='P'
and mov.nSurIdOrigen=txt_stand
-- s.nSurId=txt_stand
group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTOS_X_STAND_X_RECIBIR`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTOS_X_STAND_X_RECIBIR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTOS_X_STAND_X_RECIBIR`(IN txt_stand int)
select
-- mdet.*,p.*,ph.*,h.*,a.*,s.*,m.*,
-- prom.cProDescripcion as promocion,
-- ph.nProductoHueco as codigogenerado
ph.nProductoHueco as codigogenerado,
ph.nProductoHueco,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join modelo m on m.nModeloId=p.nModeloId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
-- left join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId

left join movimiento mov on mov.nMovId=mdet.nMovId
where
ph.cProHueEstado='D'
and mdet.cMovDetalleEstado='D'
and mov.nSurIdDestino=txt_stand
 group by ph.nProductoHueco
order by ph.cProHueEstado desc,ph.nProductoHueco desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTO_DETALLE`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTO_DETALLE`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTO_DETALLE`(txt_idproducto int(10))
select pd.*,p.*,ph.*,m.nModCodigo,
(select cMulDescripcion from multitabla m where m.nMulIdPadre=(select nMulIdPadre from multitabla m2 where m2.nMulId=pd.nMulId)
and m.nMulOrden=0) as tipoDetalle,
(select cMulDescripcion from multitabla m where m.nMulId=pd.nMulId)as detalle
 from
productodetalle pd
inner join productohueco ph on ph.nProductoHueco=pd.nProductoHueco
inner join producto p on ph.nProId=p.nProId
inner join modelo m on m.nModeloId=p.nModeloId
where pd.nProductoHueco=txt_idproducto
-- and pd.nProdDetalleEstado=1
-- order by nProdDetalleEstado desc , nProdDetalleId desc
order by nProdDetalleEstado desc , tipoDetalle desc, detalle asc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTO_DETALLE_ACTIVOS`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTO_DETALLE_ACTIVOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTO_DETALLE_ACTIVOS`(txt_idproducto int(10))
select pd.*,p.*,ph.*,m.nModCodigo,
(select cMulDescripcion from multitabla m where m.nMulIdPadre=(select nMulIdPadre from multitabla m2 where m2.nMulId=pd.nMulId)
and m.nMulOrden=0) as tipoDetalle,
(select cMulDescripcion from multitabla m where m.nMulId=pd.nMulId)as detalle
 from
productodetalle pd
inner join productohueco ph on ph.nProductoHueco=pd.nProductoHueco
inner join producto p on ph.nProId=p.nProId
inner join modelo m on m.nModeloId=p.nModeloId
where pd.nProductoHueco=txt_idproducto
 and pd.nProdDetalleEstado=1
-- order by nProdDetalleEstado desc , nProdDetalleId desc
order by nProdDetalleEstado desc , tipoDetalle desc, detalle asc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTO_GET`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTO_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTO_GET`(in txt_idproductohueco int)
select
-- p.*,ph.*,h.*,a.*,s.*,
-- m.nModeloId,
-- prom.cProDescripcion as promocion,ph.nProductoHueco as codigogenerado
p.nProId,
p.cProDescripcion,
p.nProPrecioReferencial,p.nCatId,
a.nAlmId,
h.nHuecoId,

ph.nProductoHueco as codigogenerado,
s.nSurId,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModeloId,
m.nModCodigo,
-- p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
  and mdet.nMovDetalleId in (
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
left join movimiento mo on mo.nMovId=mdet.nMovId
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId
-- left join modelo m on m.nModeloId=p.nModeloId
where ph.nProductoHueco=txt_idproductohueco%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTO_HUECO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTO_HUECO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTO_HUECO`(in txt_nproductoid int)
select ph.*, h.*,p.*
 from
productohueco ph
inner join hueco h on ph.idhueco=h.nHuecoId
inner join producto p on p.nProId=ph.nProId
where ph.nProId=txt_nproductoid
order by nProHueEstado desc , nProductoHueco%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_S_PRODUCTO_INGRESADO`
--

DROP PROCEDURE IF EXISTS `USP_PRO_S_PRODUCTO_INGRESADO`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_S_PRODUCTO_INGRESADO`(in txt_nproductoid int)
select
ph.nProductoHueco as codigogenerado,
ph.nProductoHueco,
h.nIdRepisa,h.nIdFila,h.nIdColumna,h.nIdCelda,s.cSurNombre,a.cAlmNombre,
m.nModCodigo,
p.nProPrecioReferencial,
p.nProEstado,
REPLACE(REPLACE(GROUP_CONCAT( CASE WHEN pd.nProdDetalleEstado = 1 THEN concat(mul2.cMulPadre,': ',mul2.cMulDescripcion) ELSE '' END SEPARATOR ' '),'TIPO DE ',''),'TIPO','') AS detalle,
s.cSurNombre as stand,a.cAlmNombre as almacen
from producto p
left join productohueco ph on p.nProId=ph.nProId
left join productodetalle pd on pd.nProductoHueco=ph.nProductoHueco
left join modelo m on m.nModeloId=p.nModeloId
left join multitabla mul2 on mul2.nMulId=pd.nMulId
left join movimientodetalle mdet on mdet.nProductoHueco=ph.nProductoHueco
and mdet.nMovDetalleId in (
--      select max(nMovDetalleId),nProductoHueco from movimientodetalle where nProductoHueco in(197,198)
      select max(nMovDetalleId) from movimientodetalle
      group by nProductoHueco
      having max(nMovDetalleId)
  )
-- inner join promocion prom on prom.nPromId=mdet.nPromId
left join movimiento mov on mov.nMovId=mdet.nMovId
left join hueco h on h.nHuecoId=ph.idhueco
left join almacen a on a.nAlmId=h.nAlmId
left join sucursal s on a.nSurId=s.nSurId
-- left join modelo m on m.nModeloId=p.nModeloId

where p.nProId=txt_nproductoid%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_U_PRODUCTO_ACTUALIZAR`
--

DROP PROCEDURE IF EXISTS `USP_PRO_U_PRODUCTO_ACTUALIZAR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_U_PRODUCTO_ACTUALIZAR`(
  IN v_accion varchar(40),-- 0
  IN v_txt_cProDescripcion varchar(200), -- 1 producto
  IN v_txt_nModeloId int, -- 2 producto
  IN v_txt_nProPrecioReferencial decimal(10,2), -- 3 producto
  IN v_txt_nProEstado int, -- 4 producto

  IN v_txt_nCatId int,  -- 5 producto
  IN v_txt_nCantidad int, -- 6 productohueco
  IN v_txt_nProHueEstado int, -- 7 productohueco
  IN v_txt_nTipoMovimiento int, -- 8 movimiento
  IN v_txt_dMovfecha timestamp, -- 9 movimiento
  IN v_txt_nTipoDocumento int, -- 10 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 11 movimiento
  IN v_txt_cMovEstado int, -- 12 movimiento
  IN v_txt_nUsuario int, -- 13 movimiento
  IN v_txt_nMovSubTotal decimal(10,2), -- 14 movimiento
  IN v_txt_nMovIgv decimal(10,2), -- 15 movimiento
  IN v_txt_nMovTotal decimal(10,2), -- 16 movimiento
  IN v_txt_nPerIdResponsable int, -- 17 movimiento
  IN v_txt_nSurIdOrigen int, -- 18 movimiento
  IN v_txt_nSurIdDestino int, -- 19 movimiento
  IN v_txt_nMovDetalleCantidad int, -- 20 movimientodetalle
  IN v_txt_nMovDetallePrecio decimal(10,2), -- 21 movimientodetalle
  IN v_txt_cMovDetalleEstado int, -- 22 movimientodetalle
  IN v_txt_nProIdMovDetalle int, -- 23 movimientodetalle
  IN v_txt_nMovId int, -- 24 movimientodetalle
  IN v_txt_nHuecoId int, -- 25 movimientodetalle
  --  IN v_txt_nPromId int --
  IN v_txt_nProId int,-- 26 producto
  IN v_txt_nProductoHueco int-- 27 productohueco

)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare $nProdID int;


declare U_nProducto integer;

declare $nProductoHuecoId int;
declare $v1 int DEFAULT 1;
declare $MovID int;
-- set v1=1;
DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

/* 1 */

update producto
set
cProDescripcion=v_txt_cProDescripcion,
nModeloId=v_txt_nModeloId,
nCatId=v_txt_nCatId,
nProPrecioReferencial=v_txt_nProPrecioReferencial
where nProId=v_txt_nProId;

/*2*/
update productohueco set idhueco = v_txt_nHuecoId
where nProductoHueco=v_txt_nProductoHueco;

/*3*/
INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino,
    cMovDestino
   )
  VALUES(
  6,
  now(),
  0,
  '',
  1,
  v_txt_nUsuario,
  '',
  '',
  '',
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino,
  ''
  );
set $MovID= last_insert_id();

/*4*/
INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
      'A',
      v_txt_nProId,
      $MovID,
      v_txt_nHuecoId,
      v_txt_nProductoHueco
      );

-- set U_nProducto= $nProdID;
set U_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdUpd;
        ROLLBACK ;
    ELSE
--    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED ;
    select U_nProducto as nProdUpd;

        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_U_PRODUCTO_PRESTAR`
--

DROP PROCEDURE IF EXISTS `USP_PRO_U_PRODUCTO_PRESTAR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_U_PRODUCTO_PRESTAR`(
-- CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_U_PRODUCTO_RECIBIR`(
 -- IN v_txt_nProductoHueco int,
 -- IN v_idSucurlsal int
  IN v_accion varchar(40),-- 0
  IN v_txt_nProductoHueco int, -- 1 productohueco
  IN v_txt_nEstadoProdHueco varchar(2),-- 2 productohueco
  IN v_txt_nTipoMovimiento int, -- 3 movimiento
  IN v_txt_dMovfecha timestamp, -- 4 movimiento
  IN v_txt_nTipoDocumento int, -- 5 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 6 movimiento
  IN v_txt_cMovEstado int, -- 7 movimiento
  IN v_txt_nUsuario int, -- 8 movimiento
  IN v_txt_nPerIdResponsable int, -- 12 movimiento
  IN v_txt_nSurIdOrigen int, -- 13 movimiento
  IN v_txt_nSurIdDestino int, -- 14 movimiento
  IN v_txt_cMovDestino varchar(200), -- 15 movimiento
  IN v_txt_nEstadoMovDetalle int -- 18 movimientodetalle
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
declare $v1 int DEFAULT 1;
declare $MovID int;
declare $idproducto int;
-- declare $idpromocion int;
declare $idhueco int;
declare $ultmovimiento int;

declare $Valcuenta int;
declare $val1 int;
declare $valorproductohueco int;

DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

SET $val1=0;
set $valorproductohueco=0;
/* 1 */

/*call splitter(v_txt_nProductoHueco,',');
update productohueco set idhueco=v_txt_nIdHueco, cProHueEstado='D'
where nProductoHueco in (select split_value from splitResults);*/

-- yo ya le habia cambia el hueco en el derivar solamente actualizo el estado

-- Prestado
update productohueco set cProHueEstado = 'P'
where nProductoHueco=v_txt_nProductoHueco;

/* 2 */
INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino,
    cMovDestino
   )
  VALUES(
  4,
  now(),
  'P',
  '',
  1,
  v_txt_nUsuario,
  '',
  '',
  '',
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino,
  UPPER(v_txt_cMovDestino)
  );
set $MovID= last_insert_id();

/* 4 */

-- OJO FALTA EL LIMIT quiero el ultimo estado
set $ultmovimiento=(select nMovDetalleId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco order by nMovDetalleId desc limit 1);
-- set $idproducto=(select nProId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco);
-- set $idpromocion=(select nPromId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco);
set $idproducto=(select nProId from movimientodetalle where nMovDetalleId=$ultmovimiento);
-- set $idpromocion=(select nPromId from movimientodetalle where nMovDetalleId=$ultmovimiento);
set $idhueco=(select nHuecoId from movimientodetalle where nMovDetalleId=$ultmovimiento);

INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
      'P',
      $idproducto,
      $MovID,
      $idhueco,-- ojo
--      $idpromocion,
      v_txt_nProductoHueco
      );
--
-- set $val1=$val1+1;
-- end while;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK ;
    ELSE
    select I_nProducto as nProdIns;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_U_PRODUCTO_RECIBIR`
--

DROP PROCEDURE IF EXISTS `USP_PRO_U_PRODUCTO_RECIBIR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_U_PRODUCTO_RECIBIR`(
 -- IN v_txt_nProductoHueco int,
 -- IN v_idSucurlsal int
  IN v_accion varchar(40),-- 0
  IN v_txt_nProductoHueco int, -- 1 productohueco
  IN v_txt_nEstadoProdHueco varchar(2),-- 2 productohueco
  IN v_txt_nTipoMovimiento int, -- 3 movimiento
  IN v_txt_dMovfecha timestamp, -- 4 movimiento
  IN v_txt_nTipoDocumento int, -- 5 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 6 movimiento
  IN v_txt_cMovEstado int, -- 7 movimiento
  IN v_txt_nUsuario int, -- 8 movimiento
  IN v_txt_nPerIdResponsable int, -- 9 movimiento
  IN v_txt_nSurIdOrigen int, -- 10 movimiento
  IN v_txt_nSurIdDestino int, -- 11 movimiento
  IN v_txt_nEstadoMovDetalle int -- 11 movimientodetalle
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
declare $v1 int DEFAULT 1;
declare $MovID int;
declare $idproducto int;
-- declare $idpromocion int;
declare $idhueco int;
declare $ultmovimiento int;

declare $Valcuenta int;
declare $val1 int;
declare $valorproductohueco int;

DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

SET $val1=0;
set $valorproductohueco=0;
/* 1 */

/*call splitter(v_txt_nProductoHueco,',');
update productohueco set idhueco=v_txt_nIdHueco, cProHueEstado='D'
where nProductoHueco in (select split_value from splitResults);*/

-- yo ya le habia cambia el hueco en el derivar solamente actualizo el estado
update productohueco set cProHueEstado = 'A'
where nProductoHueco=v_txt_nProductoHueco;

/* 2 */
INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino
   )
  VALUES(
  3,
  now(),
  0,
  '',
  1,
  v_txt_nUsuario,
  '',
  '',
  '',
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino
  );
set $MovID= last_insert_id();

/* 4 */
-- set $Valcuenta=(select count(*) from splitResults);
-- set $Valcuenta=substrCount(v_txt_nProductoHueco,',')+1;
-- while($val1<$Valcuenta) DO
-- set $valorproductohueco=stringSplit(v_txt_nProductoHueco,',',$val1+1);
-- select $valorproductohueco;


-- OJO FALTA EL LIMIT quiero el ultimo estado
set $ultmovimiento=(select nMovDetalleId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco order by nMovDetalleId desc limit 1);
-- set $idproducto=(select nProId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco);
-- set $idpromocion=(select nPromId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco);
set $idproducto=(select nProId from movimientodetalle where nMovDetalleId=$ultmovimiento);
-- set $idpromocion=(select nPromId from movimientodetalle where nMovDetalleId=$ultmovimiento);
set $idhueco=(select nHuecoId from movimientodetalle where nMovDetalleId=$ultmovimiento);

INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
      'A',
      $idproducto,
      $MovID,
      $idhueco,-- ojo
--      $idpromocion,
      v_txt_nProductoHueco
      );
--
-- set $val1=$val1+1;
-- end while;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK ;
    ELSE
    select I_nProducto as nProdIns;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_PRO_U_PRODUCTO_RETORNAR`
--

DROP PROCEDURE IF EXISTS `USP_PRO_U_PRODUCTO_RETORNAR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_U_PRODUCTO_RETORNAR`(
-- CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PRO_U_PRODUCTO_RECIBIR`(
 -- IN v_txt_nProductoHueco int,
 -- IN v_idSucurlsal int
  IN v_accion varchar(40),-- 0
  IN v_txt_nProductoHueco int, -- 1 productohueco
  IN v_txt_nEstadoProdHueco varchar(2),-- 2 productohueco
  IN v_txt_nTipoMovimiento int, -- 3 movimiento
  IN v_txt_dMovfecha timestamp, -- 4 movimiento
  IN v_txt_nTipoDocumento int, -- 5 movimiento
  IN v_txt_cMovNumDocumento VARCHAR(200), -- 6 movimiento
  IN v_txt_cMovEstado int, -- 7 movimiento
  IN v_txt_nUsuario int, -- 8 movimiento
  IN v_txt_nPerIdResponsable int, -- 12 movimiento
  IN v_txt_nSurIdOrigen int, -- 13 movimiento
  IN v_txt_nSurIdDestino int, -- 14 movimiento
  IN v_txt_cMovDestino varchar(200), -- 15 movimiento
  IN v_txt_nEstadoMovDetalle int -- 18 movimientodetalle
)
BEGIN

DECLARE insert_error INTEGER DEFAULT 0;
declare I_nProducto integer;
declare $v1 int DEFAULT 1;
declare $MovID int;
declare $idproducto int;
-- declare $idpromocion int;
declare $idhueco int;
declare $ultmovimiento int;

declare $Valcuenta int;
declare $val1 int;
declare $valorproductohueco int;

DECLARE exit handler for  sqlexception BEGIN
    set insert_error = 1;   -- ERROR
END;
START TRANSACTION;

SET $val1=0;
set $valorproductohueco=0;
/* 1 */

/*call splitter(v_txt_nProductoHueco,',');
update productohueco set idhueco=v_txt_nIdHueco, cProHueEstado='D'
where nProductoHueco in (select split_value from splitResults);*/

-- yo ya le habia cambia el hueco en el derivar solamente actualizo el estado

-- Retornar
update productohueco set cProHueEstado = 'A'
where nProductoHueco=v_txt_nProductoHueco;

/* 2 */
INSERT INTO movimiento(
    nTipoMovimiento,
    dMovfecha,
    nTipoDocumento,
    cMovNumDocumento,
    cMovEstado,
    nUsuario,
    nMovSubTotal,
    nMovIgv,
    nMovTotal,
    nPerIdResponsable,
    nSurIdOrigen,
    nSurIdDestino,
    cMovDestino
   )
  VALUES(
  5,
  now(),
  0,
  '',
  1,
  v_txt_nUsuario,
  '',
  '',
  '',
  v_txt_nPerIdResponsable,
  v_txt_nSurIdOrigen,
  v_txt_nSurIdDestino,
  v_txt_cMovDestino
  );
set $MovID= last_insert_id();

/* 4 */

-- OJO FALTA EL LIMIT quiero el ultimo estado
set $ultmovimiento=(select nMovDetalleId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco order by nMovDetalleId desc limit 1);
-- set $idproducto=(select nProId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco);
-- set $idpromocion=(select nPromId from movimientodetalle where nProductoHueco=v_txt_nProductoHueco);
set $idproducto=(select nProId from movimientodetalle where nMovDetalleId=$ultmovimiento);
-- set $idpromocion=(select nPromId from movimientodetalle where nMovDetalleId=$ultmovimiento);
set $idhueco=(select nHuecoId from movimientodetalle where nMovDetalleId=$ultmovimiento);

INSERT INTO movimientodetalle(
      nMovDetalleCantidad,
      nMovDetallePrecio,
      cMovDetalleEstado,
      nProId,
      nMovId,
      nHuecoId,
--      nPromId,
      nProductoHueco
       )
      values(
      1,
      '',
      'A',
      $idproducto,
      $MovID,
      $idhueco,-- ojo
--      $idpromocion,
      v_txt_nProductoHueco
      );
--
-- set $val1=$val1+1;
-- end while;

/*rollback*/
--  set I_nProducto= "1";
set I_nProducto= 1;

  IF insert_error THEN
        select -1 as nProdIns;
        ROLLBACK ;
    ELSE
    select I_nProducto as nProdIns;
        COMMIT;
  END IF ;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SIS_D_PERSONA`
--

DROP PROCEDURE IF EXISTS `USP_SIS_D_PERSONA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SIS_D_PERSONA`(
  p_ncodigo int(10)
)
update persona set cPerEstado = CASE WHEN
cPerEstado='1' then '0' else '1' end
where nPerId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SIS_I_PERSONA`
--

DROP PROCEDURE IF EXISTS `USP_SIS_I_PERSONA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SIS_I_PERSONA`(
	-- IN nPerId int(11),
	IN v_cPerNombres varchar(50),
	IN v_cPerApellidoPaterno varchar(50),
	IN v_cPerApellidoMaterno varchar(50),
	IN v_cPerDni char(8),
	IN v_cPerDireccion varchar(90),
	IN v_cPerTelefono varchar(20),
	IN v_cPerCelular varchar(11),
  IN v_nSurId int
	-- IN v_cPerEstado char(1)
	-- IN v_tPerFechaRegistro timestamp
	-- IN tPerFechaBaja timestamp,
)
BEGIN
	INSERT INTO persona(cPerNombres, cPerApellidoPaterno, cPerApellidoMaterno, cPerDni, cPerDireccion, cPerTelefono, cPerCelular,cPerEstado,nSurId)
	VALUES( v_cPerNombres,v_cPerApellidoPaterno,v_cPerApellidoMaterno,v_cPerDni,v_cPerDireccion,v_cPerTelefono,v_cPerCelular,'1',v_nSurId);
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SIS_S_PERSONAS`
--

DROP PROCEDURE IF EXISTS `USP_SIS_S_PERSONAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SIS_S_PERSONAS`()
select *, concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno) as datospersona,
s.cSurNombre as sucursal
from persona p
inner join sucursal s on s.nSurId=p.nSurId
order by nperid desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SIS_S_PERSONAS_ACTIVAS`
--

DROP PROCEDURE IF EXISTS `USP_SIS_S_PERSONAS_ACTIVAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SIS_S_PERSONAS_ACTIVAS`()
select *, concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno) as datospersona
from persona p
where cPerEstado='1'
order by nperid desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SIS_S_PERSONA_GET`
--

DROP PROCEDURE IF EXISTS `USP_SIS_S_PERSONA_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SIS_S_PERSONA_GET`(
IN v_idpersona int)
begin
select * from persona where nPerId=v_idpersona;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SIS_U_PERSONA`
--

DROP PROCEDURE IF EXISTS `USP_SIS_U_PERSONA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SIS_U_PERSONA`(IN `v_cPerNombres` VARCHAR(50), IN `v_cPerApellidoPaterno` VARCHAR(50), IN `v_cPerApellidoMaterno` VARCHAR(50), IN `v_cPerDni` CHAR(8), IN `v_cPerDireccion` VARCHAR(90), IN `v_cPerTelefono` VARCHAR(20), IN `v_cPerCelular` VARCHAR(11), IN `v_hdnPerId` INT, IN v_nSurId int)
BEGIN
  UPDATE persona
  set cPerNombres=v_cPerNombres,
  cPerApellidoPaterno=v_cPerApellidoPaterno,
  cPerApellidoMaterno=v_cPerApellidoMaterno,
  cPerDni=v_cPerDni,
  cPerDireccion=v_cPerDireccion,
  cPerTelefono=v_cPerTelefono,
  cPerCelular=v_cPerCelular,
  nSurId=v_nSurId
 where nPerId=v_hdnPerId;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_D_SUCURSAL`
--

DROP PROCEDURE IF EXISTS `USP_SUC_D_SUCURSAL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_D_SUCURSAL`(
  p_ncodigo int(10)
)
update sucursal set nEstado = CASE WHEN
nEstado='1' then '0' else '1' end
where nSurId=p_ncodigo%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_I_SUCURSAL`
--

DROP PROCEDURE IF EXISTS `USP_SUC_I_SUCURSAL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_I_SUCURSAL`(
  IN v_accion int,-- 0
  IN v_txt_cSurNombre varchar(200), -- 1
	IN v_txt_cSurDescripcion varchar(200), -- 2
  IN v_txt_cSurUbigeo varchar(8), -- 3
  IN v_txt_cSurReferencia varchar(500), -- 4
  IN v_txt_cSurLinea1 varchar(200), -- 5
  IN v_txt_cSurLinea2 varchar(200), -- 6
  IN v_nTipoSucursal int, -- 7
  IN v_txt_cSurTelefonos varchar(200),-- 8
  IN v_txt_nEmpId int
)
BEGIN
	INSERT INTO sucursal(
cSurNombre,
cSurDescripcion,
cSurUbigeo,
cSurReferencia,
cSurLinea1,
cSurLinea2,
nTipoSucursal,
cSurTelefonos,
nEmpId,
nEstado
)
	VALUES(
  v_txt_cSurNombre,
  v_txt_cSurDescripcion,
  v_txt_cSurUbigeo,
  v_txt_cSurReferencia,
  v_txt_cSurLinea1,
  v_txt_cSurLinea2,
  v_nTipoSucursal,
  v_txt_cSurTelefonos,
  v_txt_nEmpId,
  1
  );
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_S_SUCURSAL`
--

DROP PROCEDURE IF EXISTS `USP_SUC_S_SUCURSAL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_S_SUCURSAL`()
select e.*,s.*,mul1.cMulDescripcion as tipoSucursal,
s.nEstado estadoSucursal
 from
sucursal s
inner join empresa e on s.nEmpId=e.nEmpId
inner join multitabla mul1 on mul1.nMulId=s.nTipoSucursal
where s.nEstado=1
order by s.nEstado desc, s.nTipoSucursal asc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_S_SUCURSAL_ACTIVAS`
--

DROP PROCEDURE IF EXISTS `USP_SUC_S_SUCURSAL_ACTIVAS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_S_SUCURSAL_ACTIVAS`()
select *
 from
sucursal s
where s.nEstado=1
order by 1 desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_S_SUCURSAL_DEL`
--

DROP PROCEDURE IF EXISTS `USP_SUC_S_SUCURSAL_DEL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_S_SUCURSAL_DEL`()
select e.*,s.*,mul1.cMulDescripcion as tipoSucursal,
s.nEstado estadoSucursal
 from
sucursal s
inner join empresa e on s.nEmpId=e.nEmpId
inner join multitabla mul1 on mul1.nMulId=s.nTipoSucursal
where s.nEstado=0
order by s.nEstado desc, s.nTipoSucursal asc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_S_SUCURSAL_GET`
--

DROP PROCEDURE IF EXISTS `USP_SUC_S_SUCURSAL_GET`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_S_SUCURSAL_GET`(
IN v_idsucursal int)
begin
select e.*,s.*,mul1.cMulDescripcion as tipoSucursal,
s.nEstado estadoSucursal
 from
sucursal s
inner join empresa e on s.nEmpId=e.nEmpId
inner join multitabla mul1 on mul1.nMulId=s.nTipoSucursal
where s.nSurId=v_idsucursal;
end%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_S_SUCURSAL_PRINCIPALES`
--

DROP PROCEDURE IF EXISTS `USP_SUC_S_SUCURSAL_PRINCIPALES`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_S_SUCURSAL_PRINCIPALES`()
select *
 from
sucursal s
where s.nEstado=1 and s.nTipoSucursal=52
order by 1 desc%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_SUC_U_SUCURSAL`
--

DROP PROCEDURE IF EXISTS `USP_SUC_U_SUCURSAL`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUC_U_SUCURSAL`(
  IN v_accion int,-- 0
  IN v_txt_cSurNombre varchar(200), -- 1
	IN v_txt_cSurDescripcion varchar(200), -- 2
  IN v_txt_cSurUbigeo varchar(8), -- 3
  IN v_txt_cSurReferencia varchar(500), -- 4
  IN v_txt_cSurLinea1 varchar(200), -- 5
  IN v_txt_cSurLinea2 varchar(200), -- 6
  IN v_nTipoSucursal int, -- 7
  IN v_txt_cSurTelefonos varchar(200),-- 8
  IN v_txt_nEmpId int, -- 9
  in v_txt_nSucId int -- 10
)
BEGIN
  update sucursal
set
cSurNombre=v_txt_cSurNombre,
cSurDescripcion=v_txt_cSurDescripcion,
cSurUbigeo=v_txt_cSurUbigeo,
cSurReferencia=v_txt_cSurReferencia,
cSurLinea1=v_txt_cSurLinea1,
cSurLinea2=v_txt_cSurLinea2,
nTipoSucursal=v_nTipoSucursal,
cSurTelefonos=v_txt_cSurTelefonos,
nEmpId=v_txt_nEmpId
where nSurId=v_txt_nSucId;

END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_S_COMBOS_MULTITABLA`
--

DROP PROCEDURE IF EXISTS `USP_S_COMBOS_MULTITABLA`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_COMBOS_MULTITABLA`(
    IN v_nMulIdPadre int,
    IN v_Tipo VARCHAR(10)
)
BEGIN
    IF v_Tipo = 'LTU' THEN -- Lista Tipos de Usuarios
        select nMulId as codx,cMulDescripcion as dato from multitabla where nMulIdPadre = v_nMulIdPadre
         and nMulOrden <>0 and nMulEstado='A';
    END IF;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_S_MEN`
--

DROP PROCEDURE IF EXISTS `USP_S_MEN`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_MEN`(
IN p_opt VARCHAR(3),
IN p_criterio INT
)
BEGIN
    IF p_opt='LXM' THEN -- Lista Menus de Modulo
        SELECT nMenId,cMenMenu,cMenUrl,cMenOrden FROM menu where nModId = p_criterio AND cMenActivo = 1 ;
    END IF;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_S_MOD`
--

DROP PROCEDURE IF EXISTS `USP_S_MOD`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_MOD`()
BEGIN
    SELECT nModId,cModModulo,nModOrden,cModIcono FROM modulo where cActivo=1 ORDER BY nModOrden DESC;
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_S_PERMISOS`
--

DROP PROCEDURE IF EXISTS `USP_S_PERMISOS`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_PERMISOS`(
IN p_nUsuCodigo INT
)
BEGIN
  select p.nMenId from permiso p
    inner join menu  m on m.nMenId=m.nMenId
    where p.nUsuCodigo=p_nUsuCodigo AND p.cPermActivo=1 and m.cMenActivo='1';
END%%
DELIMITER ;%%

--
-- Procedure `bdsiscom`.`USP_USU_I_REGISTRAR`
--

DROP PROCEDURE IF EXISTS `USP_USU_I_REGISTRAR`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_USU_I_REGISTRAR`(
IN v_nPerId INT,
IN v_cUsuUsuario varchar(100),
IN v_cUsuClave varchar(100),
IN v_cUsuTipo char(1)
)
BEGIN
-- IF v_UsuTipo

INSERT INTO `usuario`
(
`nPerId`,
`cUsuUsuario`,
`cUsuClave`,
`cUsuEstado`,
`cUsuTipo`
)
VALUES
(
v_nPerId,
v_cUsuUsuario,
v_cUsuClave,
'1',
v_cUsuTipo
);


END%%
DELIMITER ;%%

--
-- Function `bdsiscom`.`StringSplit`
--

DROP FUNCTION IF EXISTS `StringSplit`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` FUNCTION `StringSplit`(
x text,
delim varchar(20),
pos text
) RETURNS text CHARSET utf8
return
replace(substring(substring_index(x,delim,pos),
length(substring_index(x,delim,pos-1))+1),delim,'')%%
DELIMITER ;%%

--
-- Function `bdsiscom`.`substrCount`
--

DROP FUNCTION IF EXISTS `substrCount`;
DELIMITER %%;
CREATE DEFINER=`root`@`localhost` FUNCTION `substrCount`(
s text,
ss text
) RETURNS int(10) unsigned
    READS SQL DATA
begin
declare count int
unsigned;
declare offset int unsigned;
declare continue handler for sqlstate '02000' set s=null;
set count=0;
set offset =1;
REPEAT
if not isnull(s) and offset>0
then
set offset =locate(ss,s,offset);
if offset>0 then
set count=count+1;
set offset = offset+1;
end if;
end if;
until isnull(s) OR offset=0
end repeat ;
return count;
end%%
DELIMITER ;%%
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
