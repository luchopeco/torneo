/*
SQLyog Ultimate v8.61 
MySQL - 5.6.17-log : Database - liga
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `liga`;

/*Table structure for table `arbitros` */

DROP TABLE IF EXISTS `arbitros`;

CREATE TABLE `arbitros` (
  `idarbitro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idarbitro`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `arbitros` */

insert  into `arbitros`(`idarbitro`,`nombre`,`fecha_baja`,`updated_at`,`created_at`) values (6,'Arbitro',NULL,'2015-04-09 21:59:54','2015-04-09 21:59:54');

/*Table structure for table `equipos` */

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(45) DEFAULT NULL,
  `escudo` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idequipo`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*Data for the table `equipos` */

insert  into `equipos`(`idequipo`,`nombre_equipo`,`escudo`,`foto`,`updated_at`,`created_at`) values (14,'NARICES BLANCAS F.C','naricesblancas.jpg','NARICES BLANCAS FC.jpg','2015-04-11 02:40:57',NULL),(15,'ASTON BIRRA F.C','juventudunida.jpg','JUVENTUD UNIDA.jpg',NULL,NULL),(16,'LOS GUSANOS F.C','losgusanosfc.jpg','LOS GUSANOS FC.jpg',NULL,NULL),(17,'HAWAII','otroequipo.jpg','OTRO EQUIPO.jpg','2015-04-10 22:22:37',NULL),(21,'SUDACA F.C','tirutiru.jpg','TIRU TIRU.jpg',NULL,NULL),(22,'ESQUINE F.C','esquinefc.jpg','ESQUINE FC.jpg',NULL,NULL),(23,'BERRACO F.C','lajauria.jpg','LA JAURIA.jpg',NULL,NULL),(25,'BARRIO PARQUE','velezgarfield.jpg','VELEZ GARFIELD.jpg',NULL,NULL),(26,'LA CORTADA','lacortada.jpg','LA CORTADA.jpg',NULL,NULL),(27,'(LIBRE)',NULL,'noimagenequipo.jpg',NULL,NULL),(28,'DEP. CRUCE ALBERDI','crucealberdi.jpg','DEP. CRUCE ALBERDI.jpg',NULL,NULL),(29,'TINTURAZO','tinturazo.jpg','TINTURAZO.jpg',NULL,NULL),(30,'MEMISTONE','vilazar.jpg','VILAZAR.jpg',NULL,NULL),(32,'DOCK SUD','docksud.jpg','DOCK SUD.jpg',NULL,NULL),(33,'SUC TEAM F.C','sucteamfc.jpg','SUC TEAM FC.jpg',NULL,NULL),(35,'(LIBRE)',NULL,NULL,NULL,NULL),(36,'EL SOGAN',NULL,NULL,NULL,NULL),(38,'GALATASARAY',NULL,NULL,NULL,NULL),(41,'SANJO',NULL,NULL,NULL,NULL),(43,'SIN FIERRO F.C',NULL,NULL,NULL,NULL),(46,'FILIPO Y SUS PICHONES',NULL,NULL,NULL,NULL),(47,'DRINK TEAM',NULL,NULL,NULL,NULL),(48,'MARCELONA',NULL,NULL,NULL,NULL),(49,'SPARTA F.C',NULL,NULL,NULL,NULL),(50,'THE REAL TEAM F.C',NULL,NULL,NULL,NULL),(51,'EL ALMA F.C',NULL,NULL,NULL,NULL),(52,'ARIZONA',NULL,NULL,NULL,NULL),(53,'ANCHA BANDA F.C',NULL,NULL,NULL,NULL),(54,'DEP. FAUSTINO',NULL,NULL,NULL,NULL),(56,'LA POCHI',NULL,NULL,NULL,NULL),(57,'REAL BAÃ‘IL F.C',NULL,NULL,NULL,NULL),(58,'LOS ZARATE F.C',NULL,NULL,NULL,NULL),(59,'TORO F.C',NULL,NULL,NULL,NULL),(60,'POPOVACH',NULL,NULL,NULL,NULL),(63,'Nuevo Equipo',NULL,NULL,'2015-04-10 22:30:15','2015-04-10 22:30:15');

/*Table structure for table `fechas` */

DROP TABLE IF EXISTS `fechas`;

CREATE TABLE `fechas` (
  `idfecha` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `idtorneo` int(11) NOT NULL,
  `numero_fecha` varchar(45) DEFAULT NULL,
  `imagen_equipo_ideal` varchar(200) DEFAULT NULL,
  `imagen_figura_fecha` varchar(200) DEFAULT NULL,
  `imagen_fecha` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `es_play_off` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idfecha`),
  KEY `fk_fecha_torneo1_idx` (`idtorneo`),
  CONSTRAINT `fk_fecha_torneo1` FOREIGN KEY (`idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

/*Data for the table `fechas` */

insert  into `fechas`(`idfecha`,`fecha`,`observaciones`,`idtorneo`,`numero_fecha`,`imagen_equipo_ideal`,`imagen_figura_fecha`,`imagen_fecha`,`created_at`,`updated_at`,`es_play_off`) values (127,'2015-03-14','Obs',6,'1',NULL,NULL,NULL,NULL,NULL,NULL),(128,'2015-03-14','Obs',7,'1',NULL,NULL,NULL,NULL,NULL,NULL),(133,'2015-03-28',' ',6,'2',NULL,NULL,NULL,NULL,NULL,NULL),(134,'2015-04-04',' ',6,'3',NULL,NULL,NULL,NULL,NULL,NULL),(135,'2015-04-11',' ',6,'4',NULL,NULL,NULL,NULL,NULL,NULL),(136,'2015-04-18',' ',6,'5',NULL,NULL,NULL,NULL,NULL,NULL),(137,'2015-04-25',' ',6,'6',NULL,NULL,NULL,NULL,NULL,NULL),(138,'2015-05-02',' ',6,'7',NULL,NULL,NULL,NULL,NULL,NULL),(139,'2015-05-09',' ',6,'8',NULL,NULL,NULL,NULL,NULL,NULL),(140,'2015-05-16',' ',6,'9',NULL,NULL,NULL,NULL,NULL,NULL),(141,'2015-05-23',' ',6,'10',NULL,NULL,NULL,NULL,NULL,NULL),(142,'2015-05-30',' ',6,'11',NULL,NULL,NULL,NULL,NULL,NULL),(143,'2015-06-06',' ',6,'12',NULL,NULL,NULL,NULL,NULL,NULL),(144,'2015-06-13',' ',6,'13',NULL,NULL,NULL,NULL,NULL,NULL),(145,'2015-06-20',' ',6,'14',NULL,NULL,NULL,NULL,NULL,NULL),(146,'2015-06-27',' ',6,'15',NULL,NULL,NULL,NULL,NULL,NULL),(147,'2015-03-28',' ',7,'2',NULL,NULL,NULL,NULL,NULL,NULL),(149,'2015-04-04',' ',7,'3',NULL,NULL,NULL,NULL,NULL,NULL),(150,'2015-04-11',' ',7,'4',NULL,NULL,NULL,NULL,NULL,NULL),(151,'2015-04-18',' ',7,'5',NULL,NULL,NULL,NULL,NULL,NULL),(152,'2015-04-25',' ',7,'6',NULL,NULL,NULL,NULL,NULL,NULL),(153,'2015-05-02',' ',7,'7',NULL,NULL,NULL,NULL,NULL,NULL),(154,'2015-05-09',' ',7,'8',NULL,NULL,NULL,NULL,NULL,NULL),(155,'2015-05-16',' ',7,'9',NULL,NULL,NULL,NULL,NULL,NULL),(156,'2015-05-23',' ',7,'10',NULL,NULL,NULL,NULL,NULL,NULL),(157,'2015-05-30',' ',7,'11',NULL,NULL,NULL,NULL,NULL,NULL),(158,'2015-06-06',' ',7,'12',NULL,NULL,NULL,NULL,NULL,NULL),(159,'2015-06-13',' ',7,'13',NULL,NULL,NULL,NULL,NULL,NULL),(160,'2015-06-20',' ',7,'14',NULL,NULL,NULL,NULL,NULL,NULL),(161,'2015-06-27',' ',7,'15',NULL,NULL,NULL,NULL,NULL,NULL),(162,'0000-00-00','',6,'16',NULL,NULL,NULL,'2015-04-11 02:57:41','2015-04-11 02:57:41',0),(163,'2015-05-02','',13,'1',NULL,NULL,NULL,'2015-04-11 03:00:19','2015-04-24 14:15:48',0),(164,'2015-04-24','obs',13,'12',NULL,NULL,NULL,'2015-04-11 03:00:54','2015-04-24 14:15:25',0),(165,'0000-00-00','asdasd',13,'asd',NULL,NULL,NULL,'2015-04-11 03:03:58','2015-04-11 03:03:58',1),(166,'0000-00-00','',7,'asd',NULL,NULL,NULL,'2015-04-11 03:18:07','2015-04-11 03:18:07',1),(167,'1970-01-01','',7,'12',NULL,NULL,NULL,'2015-04-11 03:20:59','2015-04-11 03:20:59',1),(168,'1970-01-01','asd',7,'ssssssss',NULL,NULL,NULL,'2015-04-11 03:21:51','2015-04-11 03:21:51',1),(169,'1970-01-01','',13,'asd',NULL,NULL,NULL,'2015-04-11 03:23:49','2015-04-11 03:23:49',1),(170,'0000-00-00','asdasd',13,'asd',NULL,NULL,NULL,'2015-04-11 03:26:33','2015-04-11 03:26:33',0),(171,'0000-00-00','',13,'asdasd',NULL,NULL,NULL,'2015-04-11 03:27:09','2015-04-11 03:27:09',1),(172,'0000-00-00','',13,'asd',NULL,NULL,NULL,'2015-04-11 03:27:59','2015-04-11 03:27:59',0),(173,'0000-00-00','',13,'asd',NULL,NULL,NULL,'2015-04-11 03:29:10','2015-04-11 03:29:10',1),(174,'0000-00-00','',13,'asd',NULL,NULL,NULL,'2015-04-11 03:32:44','2015-04-11 03:32:44',1),(175,'2015-09-09','',13,'adasd',NULL,NULL,NULL,'2015-04-11 03:35:33','2015-04-11 03:35:33',0),(176,'2015-09-09','',13,'asdasdasd',NULL,NULL,NULL,'2015-04-11 03:36:42','2015-04-11 03:36:42',0),(177,'2015-04-11','Obs',13,'12',NULL,NULL,NULL,'2015-04-11 04:00:27','2015-04-11 04:26:58',0);

/*Table structure for table `jugadores` */

DROP TABLE IF EXISTS `jugadores`;

CREATE TABLE `jugadores` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_jugador` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `pathfoto` varchar(45) DEFAULT NULL,
  `idequipo` int(11) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idjugador`),
  KEY `FK_jugador` (`idequipo`),
  CONSTRAINT `FK_jugador` FOREIGN KEY (`idequipo`) REFERENCES `equipos` (`idequipo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=811 DEFAULT CHARSET=utf8;

/*Data for the table `jugadores` */

insert  into `jugadores`(`idjugador`,`nombre_jugador`,`dni`,`pathfoto`,`idequipo`,`observaciones`,`created_at`,`updated_at`) values (1,'LUCIANOS','31787301',NULL,14,'Delegado',NULL,'2015-04-11 02:43:16'),(808,'Mariano','DNI:31787300',NULL,14,'CACA','2015-04-11 00:56:02','2015-04-11 00:56:02'),(809,'Pedro','qdasd',NULL,14,'asdasd','2015-04-11 00:56:30','2015-04-11 00:56:30'),(810,'PEPE','a',NULL,14,'','2015-04-11 00:56:49','2015-04-11 01:38:27');

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `texto` text,
  `mostrar_en_home` tinyint(4) NOT NULL DEFAULT '0',
  `mostrar_en_seccion` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `noticias` */

/*Table structure for table `partido_has_jugador` */

DROP TABLE IF EXISTS `partido_has_jugador`;

CREATE TABLE `partido_has_jugador` (
  `idpartido` int(11) NOT NULL,
  `idjugador` int(11) NOT NULL,
  `golesfavor` int(11) DEFAULT '0',
  `golescontra` int(11) DEFAULT '0',
  `cantidad_fechas_sancion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpartido`,`idjugador`),
  KEY `fk_partido_has_jugador_jugador1` (`idjugador`),
  CONSTRAINT `FK_partido_has_jugador` FOREIGN KEY (`idpartido`) REFERENCES `partidos` (`idpartido`),
  CONSTRAINT `fk_partido_has_jugador_partido1` FOREIGN KEY (`idjugador`) REFERENCES `jugadores` (`idjugador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `partido_has_jugador` */

/*Table structure for table `partidos` */

DROP TABLE IF EXISTS `partidos`;

CREATE TABLE `partidos` (
  `idpartido` int(11) NOT NULL AUTO_INCREMENT,
  `idfecha` int(11) NOT NULL,
  `idequipolocal` int(11) NOT NULL,
  `idequipovisitante` int(11) NOT NULL,
  `goleseqlocal` int(11) DEFAULT NULL,
  `goleseqvisitante` int(11) DEFAULT NULL,
  `hora` varchar(200) DEFAULT NULL,
  `ordenpamostrar` varchar(45) DEFAULT NULL,
  `idarbitro` int(11) NOT NULL,
  `idtorneo` int(11) NOT NULL,
  `fuejugado` int(11) DEFAULT '0',
  `puntoslocal` int(11) DEFAULT '0',
  `puntosvisitante` int(11) DEFAULT '0',
  PRIMARY KEY (`idpartido`),
  KEY `fk_partido_fecha1_idx` (`idfecha`),
  KEY `fk_partido_equipo1_idx` (`idequipolocal`),
  KEY `fk_partido_equipo2_idx` (`idequipovisitante`),
  KEY `fk_partido_arbitro1_idx` (`idarbitro`),
  KEY `fk_partido_torneo` (`idtorneo`),
  KEY `fk_partido_equipo1` (`idequipolocal`,`idtorneo`),
  KEY `FK_partidos` (`idtorneo`,`idequipovisitante`),
  CONSTRAINT `FK_partidos` FOREIGN KEY (`idtorneo`, `idequipovisitante`) REFERENCES `torneo_equipo` (`torneo_idtorneo`, `equipo_idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partido_equipo1` FOREIGN KEY (`idequipolocal`, `idtorneo`) REFERENCES `torneo_equipo` (`equipo_idequipo`, `torneo_idtorneo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partido_fecha1` FOREIGN KEY (`idfecha`) REFERENCES `fechas` (`idfecha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partido_torneo` FOREIGN KEY (`idtorneo`) REFERENCES `torneos` (`idtorneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `partidos` */

/*Table structure for table `sanciones` */

DROP TABLE IF EXISTS `sanciones`;

CREATE TABLE `sanciones` (
  `idsancion` int(11) NOT NULL AUTO_INCREMENT,
  `descSancion` text NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `torneo` varchar(200) NOT NULL,
  `mostrado` int(11) NOT NULL,
  PRIMARY KEY (`idsancion`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

/*Data for the table `sanciones` */

insert  into `sanciones`(`idsancion`,`descSancion`,`titulo`,`fecha`,`torneo`,`mostrado`) values (87,'<b>-&nbsp; LLAUD, NICOLÃS (ANCHA BANDA FC):</b> 2 FECHAS (ROJA DIRECTA)<br>Obs: Comportamiento Inapropiado<br><b><br>-SEGURA, GASTÃ“N (LA POCHI FC):</b>&nbsp;3&nbsp;FECHAS<br><div>Obs: Comportamiento Inapropiado</div><div><br><b>- GÃ“MEZ, EMANUEL (HAWAII):</b> 2 FECHAS (ROJA DIRECTA)<br>Obs: Juego Brusco<br></div>','Sancionados Fecha 2','28/03/2015','Segunda Division',1),(86,'<b>- BELÃ‰N, SEBASTIÃN (SUDACA FC):</b> 4 FECHAS (ROJA DIRECTA)<br><div>Obs: Conducta violenta<br></div>','Sancionados Fecha 1','21/03/2015','Segunda Division',1),(85,'<div><b>- VILLAFAÃ‘E, JOAQUÃN (EL ALMA FC):</b> 2 FECHAS (ROJA DIRECTA)</div><div>Obs: Conducta Violenta</div><br>','Sancionados Fecha 1','21/03/2014','Primera Division',0),(88,'- <b>CIARROCHI, GUIDO (BERRACO FC) </b>- 2 FECHAS (ROJA DIRECTA)<br>Obs: Juego Brusco<br><br>- <b>PAPASERGIO, JHONATAN (DEP. FAUSTINO) </b>- EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>GARCÃA, JUAN PABLO (DEP. FAUSTINO) </b>- EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>DE CAPUA, ANDRÃ‰S (DEP. FAUSTINO) </b>-EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>BATILLANA, IGNACIO (DEP. FAUSTINO) </b>- 10 FECHAS<br>Obs: Comportamiento Inapropiado<br><br>- <b>PEPPE, ANDRES (NARICES BLANCAS) </b>-EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>RIMOLO, MAURO (NARICES BLANCAS) </b>- EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>OLLID, LEANDRO DANIEL (NARICES BLANCAS) </b>-EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>TOMÃS, ALEJANDRO (NARICES BLANCAS) </b>- 10 FECHAS<br>Obs: Comportamiento Inapropiado<br>','Sancionados Fecha 2','28/03/2015','Primera Division',1);

/*Table structure for table `slider_home` */

DROP TABLE IF EXISTS `slider_home`;

CREATE TABLE `slider_home` (
  `idslider_home` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `imagen` varchar(200) NOT NULL,
  `mostrar` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idslider_home`),
  UNIQUE KEY `titulo_UNIQUE` (`titulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `slider_home` */

/*Table structure for table `tipos_torneos` */

DROP TABLE IF EXISTS `tipos_torneos`;

CREATE TABLE `tipos_torneos` (
  `idtipo_torneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_torneo` varchar(45) NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_torneo`),
  UNIQUE KEY `nombre_tipo_torneo_UNIQUE` (`nombre_tipo_torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipos_torneos` */

insert  into `tipos_torneos`(`idtipo_torneo`,`nombre_tipo_torneo`,`fecha_baja`,`updated_at`,`created_at`) values (1,'Hombres',NULL,NULL,NULL),(2,'Mujeres',NULL,NULL,NULL);

/*Table structure for table `torneo_equipo` */

DROP TABLE IF EXISTS `torneo_equipo`;

CREATE TABLE `torneo_equipo` (
  `torneo_idtorneo` int(11) NOT NULL,
  `equipo_idequipo` int(11) NOT NULL,
  PRIMARY KEY (`torneo_idtorneo`,`equipo_idequipo`),
  KEY `fk_torneo_has_equipo_equipo1_idx` (`equipo_idequipo`),
  KEY `fk_torneo_has_equipo_torneo1_idx` (`torneo_idtorneo`),
  CONSTRAINT `fk_torneo_has_equipo_equipo1` FOREIGN KEY (`equipo_idequipo`) REFERENCES `equipos` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_torneo_has_equipo_torneo1` FOREIGN KEY (`torneo_idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `torneo_equipo` */

insert  into `torneo_equipo`(`torneo_idtorneo`,`equipo_idequipo`) values (6,15),(6,16),(7,23),(6,25),(7,25),(13,25),(7,27),(13,27),(13,32),(13,35),(7,36),(13,36),(6,46),(7,46),(7,51),(13,53),(7,54),(13,54);

/*Table structure for table `torneos` */

DROP TABLE IF EXISTS `torneos`;

CREATE TABLE `torneos` (
  `idtorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_torneo` varchar(45) DEFAULT NULL,
  `observaciones_torneo` varchar(45) DEFAULT NULL,
  `idtipo_torneo` int(11) NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idtorneo`),
  KEY `idtipo_torneo_fk_idx` (`idtipo_torneo`),
  CONSTRAINT `idtipo_torneo_fk` FOREIGN KEY (`idtipo_torneo`) REFERENCES `tipos_torneos` (`idtipo_torneo`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `torneos` */

insert  into `torneos`(`idtorneo`,`nombre_torneo`,`observaciones_torneo`,`idtipo_torneo`,`fecha_baja`,`updated_at`,`created_at`,`deleted_at`) values (6,'Segunda División','obs',1,NULL,'2015-04-24 21:56:27',NULL,'2015-04-24'),(7,'Primera División','obs',1,NULL,'2015-04-24 22:03:00',NULL,'2015-04-24'),(13,'Primera Division','Mas Observaciones',2,NULL,'2015-04-10 17:44:11','2015-04-10 03:25:30',NULL);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`nombre_usuario`,`password`,`updated_at`,`created_at`) values (2,'liga','ribera2013',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
