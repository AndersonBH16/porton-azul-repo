-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: porton_azul
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_area` varchar(45) NOT NULL,
  `estado_area` varchar(15) NOT NULL,
  PRIMARY KEY (`id_area`),
  UNIQUE KEY `id_area_UNIQUE` (`id_area`),
  UNIQUE KEY `nombre_area_UNIQUE` (`nombre_area`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'cocina',''),(2,'caja',''),(3,'mesas',''),(4,'bar',''),(5,'administración','');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boleta`
--

DROP TABLE IF EXISTS `boleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boleta` (
  `id_boleta` int(11) NOT NULL AUTO_INCREMENT,
  `numero_correlativo` int(11) NOT NULL,
  `COMPROBANTE_id_comprobante` int(11) NOT NULL,
  PRIMARY KEY (`id_boleta`),
  UNIQUE KEY `idBoleta_UNIQUE` (`id_boleta`),
  KEY `fk_BOLETA_COMPROBANTE_idx` (`COMPROBANTE_id_comprobante`),
  CONSTRAINT `fk_BOLETA_COMPROBANTE` FOREIGN KEY (`COMPROBANTE_id_comprobante`) REFERENCES `comprobante` (`id_comprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boleta`
--

LOCK TABLES `boleta` WRITE;
/*!40000 ALTER TABLE `boleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `boleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_producto`
--

DROP TABLE IF EXISTS `categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_producto` (
  `id_categoria_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria_producto`),
  UNIQUE KEY `id_categoria_producto_UNIQUE` (`id_categoria_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_producto`
--

LOCK TABLES `categoria_producto` WRITE;
/*!40000 ALTER TABLE `categoria_producto` DISABLE KEYS */;
INSERT INTO `categoria_producto` VALUES (1,'Parrillas'),(2,'Entradas'),(3,'Piqueos'),(4,'Platos a la Carta'),(5,'Bebidas');
/*!40000 ALTER TABLE `categoria_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprobante`
--

DROP TABLE IF EXISTS `comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprobante` (
  `id_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `VENTAS_id_ventas` int(11) NOT NULL,
  `CLIENTE_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_comprobante`),
  UNIQUE KEY `id_comprobante_UNIQUE` (`id_comprobante`),
  KEY `fk_COMPROBANTE_VENTAS1_idx` (`VENTAS_id_ventas`),
  KEY `fk_COMPROBANTE_CLIENTE1_idx` (`CLIENTE_id_cliente`),
  CONSTRAINT `fk_COMPROBANTE_CLIENTE1` FOREIGN KEY (`CLIENTE_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMPROBANTE_VENTAS1` FOREIGN KEY (`VENTAS_id_ventas`) REFERENCES `ventas` (`id_ventas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobante`
--

LOCK TABLES `comprobante` WRITE;
/*!40000 ALTER TABLE `comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `id_delivery` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(100) NOT NULL,
  `detalle_delivery` varchar(200) DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  `fecha_delivery` datetime NOT NULL,
  PRIMARY KEY (`id_delivery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_producto`
--

DROP TABLE IF EXISTS `delivery_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_producto` (
  `id_delivery_producto` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `DELIVERY_id_delivery` int(11) NOT NULL,
  `PRODUCTO_id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_delivery_producto`),
  KEY `fk_DELIVERY_PRODUCTO_DELIVERY1_idx` (`DELIVERY_id_delivery`),
  KEY `fk_DELIVERY_PRODUCTO_PRODUCTO1_idx` (`PRODUCTO_id_producto`),
  CONSTRAINT `fk_DELIVERY_PRODUCTO_DELIVERY1` FOREIGN KEY (`DELIVERY_id_delivery`) REFERENCES `delivery` (`id_delivery`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DELIVERY_PRODUCTO_PRODUCTO1` FOREIGN KEY (`PRODUCTO_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_producto`
--

LOCK TABLES `delivery_producto` WRITE;
/*!40000 ALTER TABLE `delivery_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_correlativo` int(11) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `igv` int(11) NOT NULL DEFAULT '18',
  `total` float NOT NULL,
  `COMPROBANTE_id_comprobante` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `id_factura_UNIQUE` (`id_factura`),
  KEY `fk_FACTURA_COMPROBANTE1_idx` (`COMPROBANTE_id_comprobante`),
  CONSTRAINT `fk_FACTURA_COMPROBANTE1` FOREIGN KEY (`COMPROBANTE_id_comprobante`) REFERENCES `comprobante` (`id_comprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa`
--

DROP TABLE IF EXISTS `mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `numero_mesa` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Disponible',
  `imagen_mesa` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  UNIQUE KEY `id_mesa_UNIQUE` (`id_mesa`),
  UNIQUE KEY `numero_mesa_UNIQUE` (`numero_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` VALUES (1,1,'Disponible',NULL),(2,2,'Ocupado',NULL),(3,3,'Disponible',NULL),(4,4,'Disponible',NULL),(5,5,'Disponible',NULL),(6,6,'Disponible',NULL),(7,7,'Disponible',NULL),(8,8,'Disponible',NULL);
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(15) NOT NULL,
  `llevar` bit(1) DEFAULT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  `PERSONAL_PERFIL_id_personal_perfil` int(11) NOT NULL,
  `MESA_id_mesa` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  UNIQUE KEY `id_pedido_UNIQUE` (`id_pedido`),
  KEY `fk_PEDIDO_PERSONAL_PERFIL1_idx` (`PERSONAL_PERFIL_id_personal_perfil`),
  KEY `fk_PEDIDO_MESA1_idx` (`MESA_id_mesa`),
  CONSTRAINT `fk_PEDIDO_MESA1` FOREIGN KEY (`MESA_id_mesa`) REFERENCES `mesa` (`id_mesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_PERSONAL_PERFIL1` FOREIGN KEY (`PERSONAL_PERFIL_id_personal_perfil`) REFERENCES `personal_perfil` (`id_personal_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_producto`
--

DROP TABLE IF EXISTS `pedido_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_producto` (
  `id_pedido_producto` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(15) NOT NULL DEFAULT 'Pedir',
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `PEDIDO_id_pedido` int(11) NOT NULL,
  `PRODUCTO_id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido_producto`),
  UNIQUE KEY `id_pedido_producto_UNIQUE` (`id_pedido_producto`),
  KEY `fk_PEDIDO_PRODUCTO_PEDIDO1_idx` (`PEDIDO_id_pedido`),
  KEY `fk_PEDIDO_PRODUCTO_PRODUCTO1_idx` (`PRODUCTO_id_producto`),
  CONSTRAINT `fk_PEDIDO_PRODUCTO_PEDIDO1` FOREIGN KEY (`PEDIDO_id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_PRODUCTO_PRODUCTO1` FOREIGN KEY (`PRODUCTO_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_producto`
--

LOCK TABLES `pedido_producto` WRITE;
/*!40000 ALTER TABLE `pedido_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(50) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE KEY `id_perfil_UNIQUE` (`id_perfil`),
  UNIQUE KEY `nombre_perfil_UNIQUE` (`nombre_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador',NULL,NULL),(2,'Mozo',NULL,NULL),(3,'Cajero',NULL,NULL),(4,'Cocinero',NULL,NULL);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `dni_personal` varchar(45) NOT NULL,
  `nombre_personal` varchar(80) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(50) DEFAULT 'no especificado',
  `telefono` varchar(15) DEFAULT 'no especificado',
  `foto` varchar(250) DEFAULT 'no especificado',
  `direccion` varchar(200) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  UNIQUE KEY `dni_personal_UNIQUE` (`dni_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'12345678','Edu Villanueva','0000-00-00','eduvic_xd@hotmail.com','998877665','no especificado','José Olaya 1345',NULL,NULL),(2,'87654321','John Rucana','0000-00-00','rucanex_flash@gmail.com','556677889','no especificado','Virú 69',NULL,NULL),(3,'45673211','Edwin Monzón','0000-00-00','cimacoldplay@hotmail.com','96542299','no especificado','laredo 123',NULL,NULL);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_perfil`
--

DROP TABLE IF EXISTS `personal_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_perfil` (
  `id_personal_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `turno_entrada` time DEFAULT NULL,
  `turno_salida` time DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `PERSONAL_id_personal` int(11) NOT NULL,
  `PERFIL_id_perfil` int(11) NOT NULL,
  `AREA_id_area` int(11) NOT NULL,
  PRIMARY KEY (`id_personal_perfil`),
  UNIQUE KEY `id_personal_perfil_UNIQUE` (`id_personal_perfil`),
  KEY `fk_PERSONAL_PERFIL_PERSONAL1_idx` (`PERSONAL_id_personal`),
  KEY `fk_PERSONAL_PERFIL_PERFIL1_idx` (`PERFIL_id_perfil`),
  KEY `fk_PERSONAL_PERFIL_AREA1_idx` (`AREA_id_area`),
  CONSTRAINT `fk_PERSONAL_PERFIL_AREA1` FOREIGN KEY (`AREA_id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PERSONAL_PERFIL_PERFIL1` FOREIGN KEY (`PERFIL_id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PERSONAL_PERFIL_PERSONAL1` FOREIGN KEY (`PERSONAL_id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_perfil`
--

LOCK TABLES `personal_perfil` WRITE;
/*!40000 ALTER TABLE `personal_perfil` DISABLE KEYS */;
INSERT INTO `personal_perfil` VALUES (1,'00:00:08','00:00:05','0000-00-00',1,2,3),(2,'00:00:14','00:00:23','0000-00-00',2,2,3),(3,'00:00:07','00:00:15','0000-00-00',3,3,2);
/*!40000 ALTER TABLE `personal_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` varchar(400) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(200) DEFAULT 'imagen no disponible',
  `estado` varchar(15) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `CATEGORIA_PRODUCTO_id_categoria_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `id_producto_UNIQUE` (`id_producto`),
  KEY `fk_PRODUCTO_CATEGORIA_PRODUCTO1_idx` (`CATEGORIA_PRODUCTO_id_categoria_producto`),
  CONSTRAINT `fk_PRODUCTO_CATEGORIA_PRODUCTO1` FOREIGN KEY (`CATEGORIA_PRODUCTO_id_categoria_producto`) REFERENCES `categoria_producto` (`id_categoria_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Lomo Saltado','trozos de bife de res, papas fritas, ensalada',35,'imagen no disponible','disponible',NULL,NULL,4),(2,'Parrilla Mixta','500 gr de Carne de res + 500gr de Chuleta de Cerdo+papas fritas+ensalada',65.9,'imagen no disponible','disponible',NULL,NULL,1),(3,'Ceviche Mixto','Trozos de Pescado con leche de tigre',35,'imagen no disponible','disponible',NULL,NULL,2),(4,'Pato Tierno','Jugoso Pato con salsa + arroz + ensalada',27.9,'imagen no disponible','disponible',NULL,NULL,3),(5,'Tallarines','Tallarines Rojos + Pollo Guisado + Ensalada y Salsa de Tomate',25,'imagen no disponible','disponible',NULL,NULL,2),(6,'Gaseosa 500ml','Inca Kola - Coca Cola',5,'imagen no disponible','disponible',NULL,NULL,5),(7,'Gaseosa 1L','Coca Cola - Inca Kola',8.5,'imagen no disponible','disponible',NULL,NULL,5),(8,'Cabrito','Jugoso Cabrito + arroz blanco + menestra o papa',29.5,'imagen no disponible','disponible',NULL,NULL,1),(9,'Parihuela','Trozos de Pescado + Salsa Criolla',22,'imagen no disponible','disponible',NULL,NULL,3),(10,'Churrasco','300 mg de Carne de Res + arroz blanco + Papas fritas + ensalada',37,'imagen no disponible','disponible',NULL,NULL,4),(11,'Bisteck a lo pobre','250 mg de Carne de Res + arroz blanco o verde + papas fritas',31.5,'imagen no disponible','disponible',NULL,NULL,3),(12,'Arroz a la Jardinera','Pieza de Pollo Frito + arroz verde + cremas + ensalada',20,'imagen no disponible','disponible',NULL,NULL,2);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_llegada` datetime DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `PEDIDO_PRODUCTO_id_pedido_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_RESERVA_PEDIDO_PRODUCTO1_idx` (`PEDIDO_PRODUCTO_id_pedido_producto`),
  CONSTRAINT `fk_RESERVA_PEDIDO_PRODUCTO1` FOREIGN KEY (`PEDIDO_PRODUCTO_id_pedido_producto`) REFERENCES `pedido_producto` (`id_pedido_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_system`
--

DROP TABLE IF EXISTS `user_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_system` (
  `id_user_system` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `persona` varchar(100) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'activo',
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user_system`),
  UNIQUE KEY `user_name_UNIQUE` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_system`
--

LOCK TABLES `user_system` WRITE;
/*!40000 ALTER TABLE `user_system` DISABLE KEYS */;
INSERT INTO `user_system` VALUES (1,'admin','admin','Anderson Blas Huamán',NULL,'inactivo','administrador'),(2,'caja','caja','Edu Villanueva Calvanapón',NULL,'inactivo','cajero'),(3,'cocina','cocina','John Rucana Salinas',NULL,'inactivo','cocinero'),(4,'mozo','mozo','Edwin Monzón',NULL,'inactivo','mesero'),(5,'lol','lol','lol',NULL,'activo','cajero'),(6,'fernandinio','saby','mozo1',NULL,'activo','mesero');
/*!40000 ALTER TABLE `user_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` datetime NOT NULL,
  `sub_total` float NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `PEDIDO_id_pedido` int(11) NOT NULL,
  `PERSONAL_PERFIL_id_personal_perfil` int(11) NOT NULL,
  `DELIVERY_id_delivery` int(11) NOT NULL,
  PRIMARY KEY (`id_ventas`),
  KEY `fk_VENTAS_PEDIDO1_idx` (`PEDIDO_id_pedido`),
  KEY `fk_VENTAS_PERSONAL_PERFIL1_idx` (`PERSONAL_PERFIL_id_personal_perfil`),
  KEY `fk_VENTAS_DELIVERY1_idx` (`DELIVERY_id_delivery`),
  CONSTRAINT `fk_VENTAS_DELIVERY1` FOREIGN KEY (`DELIVERY_id_delivery`) REFERENCES `delivery` (`id_delivery`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTAS_PEDIDO1` FOREIGN KEY (`PEDIDO_id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTAS_PERSONAL_PERFIL1` FOREIGN KEY (`PERSONAL_PERFIL_id_personal_perfil`) REFERENCES `personal_perfil` (`id_personal_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-12 13:10:47
