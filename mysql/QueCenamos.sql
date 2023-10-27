/*
Navicat MySQL Data Transfer

Source Server         : dns1.webrecursos.com.ar-QueCenamos
Source Server Version : 50565
Source Host           : www.webrecursos.com.ar:3306
Source Database       : QueCenamos

Target Server Type    : MYSQL
Target Server Version : 50565
File Encoding         : 65001

Date: 2023-07-18 21:34:54
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `calificaciones`
-- ----------------------------
DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE `calificaciones` (
  `idcalificacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) unsigned NOT NULL,
  `idplato` int(10) unsigned NOT NULL,
  `calificacion` tinyint(4) NOT NULL,
  PRIMARY KEY (`idcalificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of calificaciones
-- ----------------------------
INSERT INTO `calificaciones` VALUES ('31', '41', '37', '5');
INSERT INTO `calificaciones` VALUES ('32', '41', '38', '3');
INSERT INTO `calificaciones` VALUES ('39', '6', '45', '3');
INSERT INTO `calificaciones` VALUES ('62', '44', '68', '5');
INSERT INTO `calificaciones` VALUES ('64', '41', '70', '5');

-- ----------------------------
-- Table structure for `platos`
-- ----------------------------
DROP TABLE IF EXISTS `platos`;
CREATE TABLE `platos` (
  `idplato` int(10) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idplato`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of platos
-- ----------------------------
INSERT INTO `platos` VALUES ('37', '41', 'Big Pensilvania Burger', 'Hamburguesa con doble pati, queso chedar, pepinos y salsa', 'fotos/41hamburguesa.jpg', '1600.00', '2023-06-10 23:52:25', 'American Burger<br />Aristobulo del Valle 1609<br />Telefono<br />americanburgerok');
INSERT INTO `platos` VALUES ('38', '41', 'Michigan Burger', 'Hamburguesa con huevo, queso dambo, cebolla morada y morrón salteado', 'fotos/41hamburguesaMichigan.jpg', '1800.00', '2023-06-10 23:55:00', 'American Burger<br />Aristobulo del Valle 1609<br />Telefono<br />americanburgerok');
INSERT INTO `platos` VALUES ('45', '6', 'Nombre', 'Descripcion', 'fotos/6descarga (4).jpg', '0.00', '2023-06-30 23:28:20', 'a1<br />a2<br /><br />');
INSERT INTO `platos` VALUES ('68', '44', 'Flan ', 'Flan con dulce de leche y crema', 'fotos/44flan-con-crema-y-dulce.jpg', '900.00', '2023-07-07 19:01:43', 'barracas<br />california 1780<br />4444-2222<br />Mestura');
INSERT INTO `platos` VALUES ('70', '41', 'Helado', '1 kilo de helado', 'fotos/41heladoGrido.png', '1200.00', '0000-00-00 00:00:00', 'ddddfdff<br />ddfggg<br />fdfdfhghg<br />ffgg');

-- ----------------------------
-- Table structure for `recomendaciones`
-- ----------------------------
DROP TABLE IF EXISTS `recomendaciones`;
CREATE TABLE `recomendaciones` (
  `idrecomendar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) unsigned NOT NULL,
  `idplato` int(10) unsigned NOT NULL,
  `idusuario_a_recomendar` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idrecomendar`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of recomendaciones
-- ----------------------------
INSERT INTO `recomendaciones` VALUES ('7', '6', '45', '30');
INSERT INTO `recomendaciones` VALUES ('8', '41', '45', '6');
INSERT INTO `recomendaciones` VALUES ('11', '6', '45', '41');
INSERT INTO `recomendaciones` VALUES ('12', '44', '68', '41');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `clave` varchar(25) NOT NULL,
  `rol` varchar(25) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('2', 'cmfabregat@gmail.com', '1234', 'admin');
INSERT INTO `usuarios` VALUES ('6', 'cfabregat@webrecursos.com.ar', 'asdf', 'usuario');
INSERT INTO `usuarios` VALUES ('30', 'boschagustina@gmail.com', '1', 'usuario');
INSERT INTO `usuarios` VALUES ('40', 'ifabregat04@gmail.com', 'a', 'usuario');
INSERT INTO `usuarios` VALUES ('41', 'claudiachauque9@gmail.com', '1234', 'usuario');
INSERT INTO `usuarios` VALUES ('44', 'lucasajuarez13@gmail.com', '123456', 'usuario');
