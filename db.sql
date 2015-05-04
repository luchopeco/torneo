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
  `es_play_off` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idfecha`),
  KEY `fk_fecha_torneo1_idx` (`idtorneo`),
  CONSTRAINT `fk_fecha_torneo1` FOREIGN KEY (`idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;

/*Data for the table `fechas` */

insert  into `fechas`(`idfecha`,`fecha`,`observaciones`,`idtorneo`,`numero_fecha`,`imagen_equipo_ideal`,`imagen_figura_fecha`,`imagen_fecha`,`created_at`,`updated_at`,`es_play_off`) values (128,'2015-03-14','Obs',7,'1',NULL,NULL,NULL,NULL,NULL,0),(147,'2015-03-28',' ',7,'2',NULL,NULL,NULL,NULL,NULL,0),(149,'2015-04-04',' ',7,'3',NULL,NULL,NULL,NULL,NULL,0),(150,'2015-04-11',' ',7,'4',NULL,NULL,NULL,NULL,NULL,0),(151,'2015-04-18',' ',7,'5',NULL,NULL,NULL,NULL,NULL,0),(152,'2015-04-25',' ',7,'6',NULL,NULL,NULL,NULL,NULL,0),(153,'2015-05-02',' ',7,'7',NULL,NULL,NULL,NULL,NULL,0),(154,'2015-05-09',' ',7,'8',NULL,NULL,NULL,NULL,NULL,0),(155,'2015-05-16',' ',7,'9',NULL,NULL,NULL,NULL,NULL,0),(156,'2015-05-23',' ',7,'10',NULL,NULL,NULL,NULL,NULL,0),(157,'2015-05-30',' ',7,'11',NULL,NULL,NULL,NULL,NULL,0),(158,'2015-06-06',' ',7,'12',NULL,NULL,NULL,NULL,NULL,0),(159,'2015-06-13',' ',7,'13',NULL,NULL,NULL,NULL,NULL,0),(160,'2015-06-20',' ',7,'14',NULL,NULL,NULL,NULL,NULL,0),(161,'2015-06-27',' ',7,'15',NULL,NULL,NULL,NULL,NULL,0),(166,'0000-00-00','',7,'asd',NULL,NULL,NULL,'2015-04-11 03:18:07','2015-04-11 03:18:07',1),(167,'1970-01-01','',7,'12',NULL,NULL,NULL,'2015-04-11 03:20:59','2015-04-11 03:20:59',1),(168,'1970-01-01','asd',7,'ssssssss',NULL,NULL,NULL,'2015-04-11 03:21:51','2015-04-11 03:21:51',1),(178,'2015-04-26','',15,'1|',NULL,NULL,NULL,'2015-04-26 21:03:40','2015-04-26 21:03:40',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=815 DEFAULT CHARSET=utf8;

/*Data for the table `jugadores` */

insert  into `jugadores`(`idjugador`,`nombre_jugador`,`dni`,`pathfoto`,`idequipo`,`observaciones`,`created_at`,`updated_at`) values (1,'LUCIANOS','31787301',NULL,14,'Delegado',NULL,'2015-04-11 02:43:16'),(808,'Mariano','DNI:31787300',NULL,14,'CACA','2015-04-11 00:56:02','2015-04-11 00:56:02'),(809,'Pedro','qdasd',NULL,14,'asdasd','2015-04-11 00:56:30','2015-04-11 00:56:30'),(810,'PEPE','a',NULL,14,'','2015-04-11 00:56:49','2015-04-11 01:38:27'),(811,'pepe','',NULL,36,'','2015-05-04 02:08:56','2015-05-04 02:08:56'),(812,'manuel','',NULL,36,'','2015-05-04 02:09:01','2015-05-04 02:09:01'),(813,'eee','',NULL,51,'','2015-05-04 03:25:20','2015-05-04 03:25:20'),(814,'QQQQ','',NULL,25,'','2015-05-04 03:31:05','2015-05-04 03:31:05');

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
  `goles_favor` int(11) DEFAULT '0',
  `goles_contra` int(11) DEFAULT '0',
  `cantidad_fechas_sancion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpartido`,`idjugador`),
  KEY `fk_partido_has_jugador_jugador1` (`idjugador`),
  CONSTRAINT `FK_partido_has_jugador` FOREIGN KEY (`idpartido`) REFERENCES `partidos` (`idpartido`) ON DELETE CASCADE,
  CONSTRAINT `fk_partido_has_jugador_partido1` FOREIGN KEY (`idjugador`) REFERENCES `jugadores` (`idjugador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `partido_has_jugador` */

/*Table structure for table `partidos` */

DROP TABLE IF EXISTS `partidos`;

CREATE TABLE `partidos` (
  `idpartido` int(11) NOT NULL AUTO_INCREMENT,
  `idfecha` int(11) NOT NULL,
  `idequipo_local` int(11) NOT NULL,
  `idequipo_visitante` int(11) NOT NULL,
  `goles_local` int(11) DEFAULT NULL,
  `goles_visitante` int(11) DEFAULT NULL,
  `hora` varchar(200) DEFAULT NULL,
  `orden_mostrar` varchar(45) DEFAULT NULL,
  `idarbitro` int(11) NOT NULL,
  `idtorneo` int(11) NOT NULL,
  `fuejugado` int(11) DEFAULT '0',
  `puntoslocal` int(11) DEFAULT '0',
  `puntosvisitante` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpartido`),
  UNIQUE KEY `NewIndex1` (`idfecha`,`idequipo_local`),
  UNIQUE KEY `NewIndex2` (`idfecha`,`idequipo_visitante`),
  UNIQUE KEY `NewIndex3` (`idfecha`,`idequipo_local`,`idequipo_visitante`),
  KEY `fk_partido_fecha1_idx` (`idfecha`),
  KEY `fk_partido_equipo1_idx` (`idequipo_local`),
  KEY `fk_partido_equipo2_idx` (`idequipo_visitante`),
  KEY `fk_partido_arbitro1_idx` (`idarbitro`),
  KEY `fk_partido_torneo` (`idtorneo`),
  KEY `fk_partido_equipo1` (`idequipo_local`,`idtorneo`),
  KEY `FK_partidos` (`idtorneo`,`idequipo_visitante`),
  CONSTRAINT `FK_partidos` FOREIGN KEY (`idtorneo`, `idequipo_visitante`) REFERENCES `torneo_equipo` (`torneo_idtorneo`, `equipo_idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_partidos_torneo` FOREIGN KEY (`idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE CASCADE,
  CONSTRAINT `fk_partido_equipo1` FOREIGN KEY (`idequipo_local`, `idtorneo`) REFERENCES `torneo_equipo` (`equipo_idequipo`, `torneo_idtorneo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partido_fecha1` FOREIGN KEY (`idfecha`) REFERENCES `fechas` (`idfecha`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `partidos` */

insert  into `partidos`(`idpartido`,`idfecha`,`idequipo_local`,`idequipo_visitante`,`goles_local`,`goles_visitante`,`hora`,`orden_mostrar`,`idarbitro`,`idtorneo`,`fuejugado`,`puntoslocal`,`puntosvisitante`,`created_at`,`updated_at`) values (7,128,27,46,0,0,'14',NULL,6,7,0,0,0,'2015-04-30 23:21:24','2015-05-04 01:54:08');

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
  CONSTRAINT `fk_torneo_has_equipo_torneo1` FOREIGN KEY (`torneo_idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `torneo_equipo` */

insert  into `torneo_equipo`(`torneo_idtorneo`,`equipo_idequipo`) values (7,25),(7,27),(7,36),(7,46),(7,51),(15,53),(7,54);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `torneos` */

insert  into `torneos`(`idtorneo`,`nombre_torneo`,`observaciones_torneo`,`idtipo_torneo`,`fecha_baja`,`updated_at`,`created_at`,`deleted_at`) values (7,'Primera División','obs',1,NULL,'2015-04-26 21:13:58',NULL,NULL),(15,'Nuevo Torneo','',1,NULL,'2015-04-27 01:08:56','2015-04-26 21:03:13','2015-04-27');

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
