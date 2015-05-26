-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2015 a las 23:51:46
-- Versión del servidor: 5.6.17-log
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `liga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitros`
--

CREATE TABLE IF NOT EXISTS `arbitros` (
  `idarbitro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idarbitro`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `arbitros`
--

INSERT INTO `arbitros` (`idarbitro`, `nombre`, `fecha_baja`, `updated_at`, `created_at`) VALUES
(6, 'Arbitro', NULL, '2015-04-10 00:59:54', '2015-04-10 00:59:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(45) DEFAULT NULL,
  `escudo` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `es_libre` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idequipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idequipo`, `nombre_equipo`, `escudo`, `foto`, `updated_at`, `created_at`, `es_libre`) VALUES
(14, 'NARICES BLANCAS F.C', 'naricesblancas.jpg', 'NARICES BLANCAS FC.jpg', '2015-04-11 05:40:57', NULL, 0),
(15, 'ASTON BIRRA F.C', 'juventudunida.jpg', 'JUVENTUD UNIDA.jpg', NULL, NULL, 0),
(16, 'LOS GUSANOS F.C', 'losgusanosfc.jpg', 'LOS GUSANOS FC.jpg', NULL, NULL, 0),
(17, 'HAWAII', 'otroequipo.jpg', 'OTRO EQUIPO.jpg', '2015-04-11 01:22:37', NULL, 0),
(21, 'SUDACA F.C', 'tirutiru.jpg', 'TIRU TIRU.jpg', NULL, NULL, 0),
(22, 'ESQUINE F.C', 'esquinefc.jpg', 'ESQUINE FC.jpg', NULL, NULL, 0),
(23, 'BERRACO F.C', 'lajauria.jpg', 'LA JAURIA.jpg', NULL, NULL, 0),
(25, 'BARRIO PARQUE', 'velezgarfield.jpg', 'VELEZ GARFIELD.jpg', NULL, NULL, 0),
(27, '(LIBRE)', NULL, 'foto-equipo27.PNG', '2015-05-15 01:05:18', NULL, 1),
(28, 'DEP. CRUCE ALBERDI', 'crucealberdi.jpg', 'DEP. CRUCE ALBERDI.jpg', NULL, NULL, 0),
(29, 'TINTURAZO', 'tinturazo.jpg', 'TINTURAZO.jpg', NULL, NULL, 0),
(30, 'MEMISTONE', 'vilazar.jpg', 'VILAZAR.jpg', NULL, NULL, 0),
(32, 'DOCK SUD', 'docksud.jpg', 'DOCK SUD.jpg', NULL, NULL, 0),
(33, 'SUC TEAM F.C', 'sucteamfc.jpg', 'SUC TEAM FC.jpg', NULL, NULL, 0),
(36, 'EL SOGAN', NULL, NULL, NULL, NULL, 0),
(38, 'GALATASARAY', NULL, NULL, NULL, NULL, 0),
(41, 'SANJO', NULL, NULL, NULL, NULL, 0),
(43, 'SIN FIERRO F.C', NULL, NULL, NULL, NULL, 0),
(46, 'FILIPO Y SUS PICHONES', NULL, NULL, NULL, NULL, 0),
(47, 'DRINK TEAM', NULL, NULL, NULL, NULL, 0),
(48, 'MARCELONA', NULL, NULL, NULL, NULL, 0),
(49, 'SPARTA F.C', NULL, NULL, NULL, NULL, 0),
(50, 'THE REAL TEAM F.C', NULL, NULL, NULL, NULL, 0),
(51, 'EL ALMA F.C', NULL, NULL, NULL, NULL, 0),
(52, 'ARIZONA', NULL, NULL, NULL, NULL, 0),
(53, 'ANCHA BANDA F.C', NULL, NULL, NULL, NULL, 0),
(54, 'DEP. FAUSTINO', NULL, NULL, NULL, NULL, 0),
(56, 'LA POCHI', NULL, NULL, NULL, NULL, 0),
(57, 'REAL BAÑIL', NULL, NULL, '2015-05-14 01:24:27', NULL, 0),
(58, 'LOS ZARATE F.C', NULL, NULL, NULL, NULL, 0),
(59, 'TORO F.C', NULL, NULL, '2015-05-14 01:19:39', NULL, 0),
(60, 'POPOVACH', NULL, NULL, NULL, NULL, 0),
(63, 'Nuevo Equipo', NULL, NULL, '2015-04-11 01:30:15', '2015-04-11 01:30:15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE IF NOT EXISTS `fechas` (
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
  KEY `fk_fecha_torneo1_idx` (`idtorneo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

--
-- Volcado de datos para la tabla `fechas`
--

INSERT INTO `fechas` (`idfecha`, `fecha`, `observaciones`, `idtorneo`, `numero_fecha`, `imagen_equipo_ideal`, `imagen_figura_fecha`, `imagen_fecha`, `created_at`, `updated_at`, `es_play_off`) VALUES
(128, '2015-03-14', 'Obs', 7, '1', NULL, NULL, 'wiphala1.png', NULL, '2015-05-06 00:31:49', 0),
(147, '2015-03-28', ' ', 7, '2', NULL, NULL, NULL, NULL, NULL, 0),
(149, '2015-04-04', ' ', 7, '3', NULL, NULL, NULL, NULL, NULL, 0),
(150, '2015-04-11', ' ', 7, '4', NULL, NULL, NULL, NULL, NULL, 0),
(151, '2015-04-18', ' ', 7, '5', NULL, NULL, NULL, NULL, NULL, 0),
(152, '2015-04-25', ' ', 7, '6', NULL, NULL, NULL, NULL, NULL, 0),
(153, '2015-05-02', ' ', 7, '7', NULL, NULL, NULL, NULL, NULL, 0),
(154, '2015-05-09', ' ', 7, '8', NULL, NULL, NULL, NULL, NULL, 0),
(155, '2015-05-16', ' ', 7, '9', NULL, NULL, NULL, NULL, NULL, 0),
(156, '2015-05-23', ' ', 7, '10', NULL, NULL, NULL, NULL, NULL, 0),
(157, '2015-05-30', ' ', 7, '11', NULL, NULL, NULL, NULL, NULL, 0),
(158, '2015-06-06', ' ', 7, '12', NULL, NULL, NULL, NULL, NULL, 0),
(159, '2015-06-13', ' ', 7, '13', NULL, NULL, NULL, NULL, NULL, 0),
(160, '2015-06-20', ' ', 7, '14', NULL, NULL, NULL, NULL, NULL, 0),
(161, '2015-06-27', ' ', 7, '15', NULL, NULL, NULL, NULL, NULL, 0),
(166, '0000-00-00', '', 7, 'asd', NULL, NULL, NULL, '2015-04-11 06:18:07', '2015-05-14 00:49:09', 1),
(167, '1970-01-01', '', 7, '12', NULL, NULL, NULL, '2015-04-11 06:20:59', '2015-04-11 06:20:59', 1),
(168, '1970-01-01', 'asd', 7, 'ssssssss', NULL, NULL, NULL, '2015-04-11 06:21:51', '2015-04-11 06:21:51', 1),
(178, '2015-04-26', '', 15, '1|', NULL, NULL, NULL, '2015-04-27 00:03:40', '2015-04-27 00:03:40', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE IF NOT EXISTS `jugadores` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_jugador` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `pathfoto` varchar(45) DEFAULT NULL,
  `idequipo` int(11) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idjugador`),
  KEY `FK_jugador` (`idequipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=819 ;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`idjugador`, `nombre_jugador`, `dni`, `pathfoto`, `idequipo`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'LUCIANOS', '31787301', NULL, 14, 'Delegado', NULL, '2015-04-11 05:43:16'),
(808, 'Mariano', 'DNI:31787300', NULL, 14, 'CACA', '2015-04-11 03:56:02', '2015-04-11 03:56:02'),
(809, 'Pedro', 'qdasd', NULL, 14, 'asdasd', '2015-04-11 03:56:30', '2015-04-11 03:56:30'),
(810, 'PEPE', 'a', NULL, 14, '', '2015-04-11 03:56:49', '2015-04-11 04:38:27'),
(811, 'pepe', '', NULL, 36, '', '2015-05-04 05:08:56', '2015-05-04 05:08:56'),
(812, 'manuel', '', NULL, 36, '', '2015-05-04 05:09:01', '2015-05-04 05:09:01'),
(813, 'eee', '', NULL, 51, '', '2015-05-04 06:25:20', '2015-05-04 06:25:20'),
(814, 'QQQQ', '', NULL, 25, '', '2015-05-04 06:31:05', '2015-05-04 06:31:05'),
(815, 'qqqq', '', NULL, 25, '', '2015-05-14 00:55:30', '2015-05-14 00:55:30'),
(816, 'ffff', '', NULL, 25, '', '2015-05-14 00:55:35', '2015-05-14 00:55:35'),
(817, 'ffff', '', NULL, 54, '', '2015-05-14 00:55:50', '2015-05-14 00:55:50'),
(818, 'asdasd', '', NULL, 54, '', '2015-05-14 00:55:54', '2015-05-14 00:55:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `texto` text,
  `mostrar_en_home` tinyint(4) NOT NULL DEFAULT '0',
  `mostrar_en_seccion` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `titulo`, `fecha`, `texto`, `mostrar_en_home`, `mostrar_en_seccion`, `updated_at`, `created_at`) VALUES
(1, 'Nueva Noticia', NULL, NULL, 0, 0, '2015-05-07 05:47:09', '2015-05-07 05:47:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE IF NOT EXISTS `partidos` (
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
  `fue_jugado` int(11) DEFAULT '0',
  `puntos_local` int(11) DEFAULT '0',
  `puntos_visitante` int(11) DEFAULT '0',
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
  KEY `FK_partidos` (`idtorneo`,`idequipo_visitante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`idpartido`, `idfecha`, `idequipo_local`, `idequipo_visitante`, `goles_local`, `goles_visitante`, `hora`, `orden_mostrar`, `idarbitro`, `idtorneo`, `fue_jugado`, `puntos_local`, `puntos_visitante`, `created_at`, `updated_at`) VALUES
(7, 128, 27, 46, 0, 0, '14', NULL, 6, 7, 0, 0, 0, '2015-05-01 02:21:24', '2015-05-04 04:54:08'),
(8, 166, 25, 54, 2, 1, '', NULL, 6, 7, 1, 3, 0, '2015-05-14 00:42:23', '2015-05-27 00:20:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido_has_jugador`
--

CREATE TABLE IF NOT EXISTS `partido_has_jugador` (
  `idpartido` int(11) NOT NULL,
  `idjugador` int(11) NOT NULL,
  `goles_favor` int(11) DEFAULT '0',
  `goles_contra` int(11) DEFAULT '0',
  `cantidad_fechas_sancion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpartido`,`idjugador`),
  KEY `fk_partido_has_jugador_jugador1` (`idjugador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partido_has_jugador`
--

INSERT INTO `partido_has_jugador` (`idpartido`, `idjugador`, `goles_favor`, `goles_contra`, `cantidad_fechas_sancion`) VALUES
(8, 814, 1, 0, 0),
(8, 815, 1, 0, 1),
(8, 817, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE IF NOT EXISTS `sanciones` (
  `idsancion` int(11) NOT NULL AUTO_INCREMENT,
  `descSancion` text NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `torneo` varchar(200) NOT NULL,
  `mostrado` int(11) NOT NULL,
  PRIMARY KEY (`idsancion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Volcado de datos para la tabla `sanciones`
--

INSERT INTO `sanciones` (`idsancion`, `descSancion`, `titulo`, `fecha`, `torneo`, `mostrado`) VALUES
(87, '<b>-&nbsp; LLAUD, NICOLÃS (ANCHA BANDA FC):</b> 2 FECHAS (ROJA DIRECTA)<br>Obs: Comportamiento Inapropiado<br><b><br>-SEGURA, GASTÃ“N (LA POCHI FC):</b>&nbsp;3&nbsp;FECHAS<br><div>Obs: Comportamiento Inapropiado</div><div><br><b>- GÃ“MEZ, EMANUEL (HAWAII):</b> 2 FECHAS (ROJA DIRECTA)<br>Obs: Juego Brusco<br></div>', 'Sancionados Fecha 2', '28/03/2015', 'Segunda Division', 1),
(86, '<b>- BELÃ‰N, SEBASTIÃN (SUDACA FC):</b> 4 FECHAS (ROJA DIRECTA)<br><div>Obs: Conducta violenta<br></div>', 'Sancionados Fecha 1', '21/03/2015', 'Segunda Division', 1),
(85, '<div><b>- VILLAFAÃ‘E, JOAQUÃN (EL ALMA FC):</b> 2 FECHAS (ROJA DIRECTA)</div><div>Obs: Conducta Violenta</div><br>', 'Sancionados Fecha 1', '21/03/2014', 'Primera Division', 0),
(88, '- <b>CIARROCHI, GUIDO (BERRACO FC) </b>- 2 FECHAS (ROJA DIRECTA)<br>Obs: Juego Brusco<br><br>- <b>PAPASERGIO, JHONATAN (DEP. FAUSTINO) </b>- EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>GARCÃA, JUAN PABLO (DEP. FAUSTINO) </b>- EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>DE CAPUA, ANDRÃ‰S (DEP. FAUSTINO) </b>-EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>BATILLANA, IGNACIO (DEP. FAUSTINO) </b>- 10 FECHAS<br>Obs: Comportamiento Inapropiado<br><br>- <b>PEPPE, ANDRES (NARICES BLANCAS) </b>-EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>RIMOLO, MAURO (NARICES BLANCAS) </b>- EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>OLLID, LEANDRO DANIEL (NARICES BLANCAS) </b>-EXPULSADO DEL TORNEO SIN POSIBILIDAD DE REINSCRIPCIÃ“N NI ACCESO AL PREDIO<br>Obs: Conducta Violenta<br><br>- <b>TOMÃS, ALEJANDRO (NARICES BLANCAS) </b>- 10 FECHAS<br>Obs: Comportamiento Inapropiado<br>', 'Sancionados Fecha 2', '28/03/2015', 'Primera Division', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider_home`
--

CREATE TABLE IF NOT EXISTS `slider_home` (
  `idslider_home` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `imagen` varchar(200) NOT NULL,
  `mostrar` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idslider_home`),
  UNIQUE KEY `titulo_UNIQUE` (`titulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `slider_home`
--

INSERT INTO `slider_home` (`idslider_home`, `titulo`, `imagen`, `mostrar`, `created_at`, `updated_at`) VALUES
(4, 'Nuevo Slider', '', 1, '2015-05-15 02:47:56', '2015-05-15 02:47:56'),
(5, 'Pep ', '', 0, '2015-05-15 02:48:35', '2015-05-15 02:48:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_torneos`
--

CREATE TABLE IF NOT EXISTS `tipos_torneos` (
  `idtipo_torneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_torneo` varchar(45) NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_torneo`),
  UNIQUE KEY `nombre_tipo_torneo_UNIQUE` (`nombre_tipo_torneo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipos_torneos`
--

INSERT INTO `tipos_torneos` (`idtipo_torneo`, `nombre_tipo_torneo`, `fecha_baja`, `updated_at`, `created_at`) VALUES
(1, 'Hombres', NULL, NULL, NULL),
(2, 'Mujeres', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE IF NOT EXISTS `torneos` (
  `idtorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_torneo` varchar(45) DEFAULT NULL,
  `observaciones_torneo` varchar(45) DEFAULT NULL,
  `idtipo_torneo` int(11) NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idtorneo`),
  KEY `idtipo_torneo_fk_idx` (`idtipo_torneo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`idtorneo`, `nombre_torneo`, `observaciones_torneo`, `idtipo_torneo`, `fecha_baja`, `updated_at`, `created_at`, `deleted_at`) VALUES
(7, 'Primera División', 'obs', 1, NULL, '2015-04-27 00:13:58', NULL, NULL),
(15, 'Nuevo Torneo', '', 1, NULL, '2015-04-27 04:08:56', '2015-04-27 00:03:13', '2015-04-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo_equipo`
--

CREATE TABLE IF NOT EXISTS `torneo_equipo` (
  `torneo_idtorneo` int(11) NOT NULL,
  `equipo_idequipo` int(11) NOT NULL,
  PRIMARY KEY (`torneo_idtorneo`,`equipo_idequipo`),
  KEY `fk_torneo_has_equipo_equipo1_idx` (`equipo_idequipo`),
  KEY `fk_torneo_has_equipo_torneo1_idx` (`torneo_idtorneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneo_equipo`
--

INSERT INTO `torneo_equipo` (`torneo_idtorneo`, `equipo_idequipo`) VALUES
(7, 25),
(7, 27),
(7, 36),
(7, 46),
(7, 51),
(15, 53),
(7, 54),
(7, 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', '$2y$10$pJK.iwoiyVqFVVHa/hDXYeeNyFuANdXfAXR1PFlyeC7ogjtB1U4ya', NULL, NULL, '2015-05-07 05:45:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre_usuario`, `password`, `updated_at`, `created_at`) VALUES
(2, 'liga', 'ribera2013', NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD CONSTRAINT `fk_fecha_torneo1` FOREIGN KEY (`idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `FK_jugador` FOREIGN KEY (`idequipo`) REFERENCES `equipos` (`idequipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `FK_partidos` FOREIGN KEY (`idtorneo`, `idequipo_visitante`) REFERENCES `torneo_equipo` (`torneo_idtorneo`, `equipo_idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_partidos_arbitros` FOREIGN KEY (`idarbitro`) REFERENCES `arbitros` (`idarbitro`),
  ADD CONSTRAINT `FK_partidos_torneo` FOREIGN KEY (`idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_partido_equipo1` FOREIGN KEY (`idequipo_local`, `idtorneo`) REFERENCES `torneo_equipo` (`equipo_idequipo`, `torneo_idtorneo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_fecha1` FOREIGN KEY (`idfecha`) REFERENCES `fechas` (`idfecha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `partido_has_jugador`
--
ALTER TABLE `partido_has_jugador`
  ADD CONSTRAINT `FK_partido_has_jugador` FOREIGN KEY (`idpartido`) REFERENCES `partidos` (`idpartido`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_partido_has_jugador_partido1` FOREIGN KEY (`idjugador`) REFERENCES `jugadores` (`idjugador`);

--
-- Filtros para la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD CONSTRAINT `idtipo_torneo_fk` FOREIGN KEY (`idtipo_torneo`) REFERENCES `tipos_torneos` (`idtipo_torneo`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `torneo_equipo`
--
ALTER TABLE `torneo_equipo`
  ADD CONSTRAINT `fk_torneo_has_equipo_equipo1` FOREIGN KEY (`equipo_idequipo`) REFERENCES `equipos` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_torneo_has_equipo_torneo1` FOREIGN KEY (`torneo_idtorneo`) REFERENCES `torneos` (`idtorneo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
