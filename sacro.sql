-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 21:39:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sacro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `matricula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_renovacion` date DEFAULT NULL,
  `telefono` varchar(16) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `plan_contratado` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'SIN ASIGNAR',
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `saldo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `matricula`, `nombre`, `fecha_renovacion`, `telefono`, `edad`, `plan_contratado`, `foto`, `saldo`) VALUES
(1, 'PG0001', '000 PUBLICO GENERAL', '2030-12-31', '5512345678', 0, 'VISITA DIARIA', 'hombre.png', NULL),
(5, 'AMX001', 'AVILA MIGUEL XOCHITL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(6, 'AALA01', 'AVILA ALONSO ALAEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(7, 'AMDA01', 'ABRAHAM MONTIEL DAVID', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(8, 'ACAL01', 'AVILA SANCHEZ ALINNE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(9, 'ARVA01', 'ARANDA VALERIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(10, 'ALCA01', 'ALMAZAN CATARINO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(11, 'ALDA01', 'ALMAZAN LOPEZ DANIEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(12, 'AVAL01', 'AVILA ALAET', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(13, 'AKGC01', 'ANTENTO KUMPO GARCIA CESAR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(14, 'BFWE01', 'BARRAGON FLORES WENDOLIN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(15, 'BFJI01', 'BELTRAN FUENTES JIMENA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(16, 'BCIS01', 'BRAVO CRUZ INGRID SINAI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(17, 'BODI01', 'BOLAÑOS DIEGO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(18, 'BGGU01', 'BAUTISTA GUTIERREZ GUADALUPE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(19, 'BCJM01', 'BARRERA CERRILLO JOSE MANUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(20, 'BPYO01', 'BASTIDA PEREZ YORAN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(21, 'CRTO01', 'CORDERO R. TOMAS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(22, 'CPDA01', 'CRUZ PARRAS DAVID', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(23, 'CRJT01', 'CORDERO RODRIGUEZ JUAN TOMAS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(24, 'SLBE01', 'SANCHEZ LOPEZ BERAYA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(25, 'CLMA01', 'CRUZ LOPEZ MARCOS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(26, 'CAVI01', 'CRUZ ANAYA VICTOR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(27, 'CMMA01', 'CLEMENTE MENDOZA MIGUEL ANGEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(28, 'CNJO01', 'CERRITOS NAVARRO JOSUE', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(29, 'CRGA01', 'CRUZ GAEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(30, 'CRJD01', 'CERRITOS RAMIREZ JOSE DANIEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(31, 'CGSA01', 'CRUZ GASPAR SAYRA', NULL, '', 0, 'SIN ASIGNAR', 'logo.png', NULL),
(32, 'CGJA01', 'CRUZ GASPAR JASLYN ', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(33, 'CJIV01', 'CERON JUAREZ IVONNE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(34, 'EGDI01', 'ESTRADA GARCIA DIEGO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(35, 'ERFE01', 'ESQUIL RODRIGUEZ FERNANDA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(36, 'ESEM', 'ESTRADA EMMANUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(37, 'ESDI01', 'ESQUIVEL DIEGO ', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(38, 'FBSA01', 'FRANCO BAUTISTA SARA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(39, 'FRDA01', 'FALCON RAMIREZ DAYSI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(40, 'FZJE01', 'FUENTEZ ZEPEDA JESSICA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(41, 'FLEM01', 'FLORES LOPES EMELY', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(42, 'FRNA01', 'FRANCO NANCY', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(43, 'GZYA01', 'GONZALEZ ZEPEDA YADIRA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(44, 'GPGA01', 'GARCIA PEREZ GUSTAVO ALAIN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(45, 'GUAN01', 'GUTIERREZ ANDRIK', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(46, 'GBLE01', 'GUTIERREZ BARRIOS LEONOR', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(47, 'GUNA01', 'GUTIERREZ NAVVEH', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(48, 'GTVA01', 'GOMEZ TORRES VANESA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(49, 'GPJI01', 'GONZALEZ PEREZ JONATHAN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(50, 'GGJO01', 'GARCIA GASPAR JOSUE', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(51, 'GOME01', 'GONZALEZ MELINA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(52, 'GMMA01', 'GALVAN MIGUEL MARISOL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(53, 'GGIV01', 'GONZALEZ GARCIA IVET', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(54, 'GFAL01', 'GARCIA FRANCO ALICIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(55, 'GUES01', 'GUTIERREZ ESTEBAN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(56, 'GGAH01', 'GARCIA GONZALEZ ANTONIO HUGO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(57, 'GGNO01', 'GONZALEZ GARCIA NOEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(58, 'GGNL01', 'GARCIA GONZALEZ NANCY LUZ', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(59, 'GODA01', 'GONZALEZ DANNA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(60, 'GAEM01', 'GARCIA EMANUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(61, 'GHED01', 'GONZALEZ HERNANDEZ EDUARDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(62, 'HCMA01', 'HERNANDEZ CERON MARLENE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(63, 'FLEM01', 'FLORES LOPES EMELY', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(64, 'HFSU01', 'HERNANDEZ FLORES SURI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(65, 'HLAG01', 'HERNANDEZ LOPEZ ANGEL GABRIEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(66, 'HEVI01', 'HERNANDEZ VIRIDIANA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(67, 'HEMA01', 'HERNANDEZ MARTHA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(68, 'HLMI01', 'HERNANDEZ LUIS MIGUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(69, 'HSSI01', 'HERNANDEZ SANCHEZ SINAHI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(70, 'HEJA01', 'HERNANDEZ JAIRO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(71, 'HMF01', 'HERNANDEZ MARTHA FLORES', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(72, 'HEAN01', 'HERNANDEZ ANA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(73, 'HCJA01', 'HERNANDEZ CHAVEZ JAEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(74, 'HCCH01', 'HERNANDEZ CLEMENTE CHRISTIAN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(75, 'HGJF01', 'HERNANDEZ GODINEZ JESUS FERNANDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(76, 'IAMA01', 'ISLAS ALBA MARIO ALEXIS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(77, 'INJE01', 'INAHI JESUS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(78, 'JURI01', 'JUAREZ RICARDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(79, 'JIRO01', 'JIMENEZ ROSARIO', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(80, 'LOAR01', 'LOPEZ ARMANDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(81, 'LEHE01', 'LEON HELEN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(82, 'LAKE01', 'LEON ARENA KENIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(83, 'LORI01', 'LOPEZ PEREZ RICARDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(84, 'MSYE01', 'MEZA SANCHEZ YESENIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(85, 'MTIV01', 'MIGUEL TALONIA IVONNE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(86, 'MGRA01', 'MARTINEZ GARCIA RAFAEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(87, 'MDOR01', 'MARQUEZ FREDY ORLANDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(88, 'MOOS01', 'MORALES OSCAR ', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(89, 'MOMI01', 'MONDRADA MITZUKO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(90, 'MEEM01', 'MENESES EMMANUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(91, 'MVAL01', 'MARTINEZ VILLEGAS ALEJANDRO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(92, 'MNSA01', 'MIGUEL NAVARRO SARAI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(93, 'MTYO01', 'MENDEZ TESILLO YOSELINE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(94, 'MVDC01', 'MOSALVO VAZQUEZ DULIO CESAR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(95, 'MEMI01', 'MENDEZ MIGUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(96, 'MEMI01', 'MEDINA MILDRED', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(97, 'MENPA01', 'MENDOZA PATY', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(98, 'MPAL01', 'MARQUEZ PINEDA ALAN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(99, 'MOOS01', 'MORALES OSCAR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(100, 'MAED01', 'MENDOZA ALAN EDUARDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(101, 'NCVA01', 'NOLASCO CRUZ VANESSA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(102, 'NIMA01', 'NICOLAS MARLEV', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(103, 'NHJA01', 'NICOLAS HERNANDEZ JACQUELINE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(104, 'NNBE01', 'NARANJO NAZARETH BELEN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(105, 'OVDA01', 'ONTIVEROS VALENCIA DAVID', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(106, 'ORYA01', 'OROPEZA YANDERI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(107, 'ORSA01', 'OLGUIN ROMERO SANDRA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(108, 'PMRO01', 'PEREZ MONTES RODRIGO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(109, 'PEKA01', 'PELAEZ KARLA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(110, 'PIXA01', 'PINEDA XAVATH', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(111, 'PJAR01', 'PATIÑO JUAREZ ARTURO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(112, 'PEAR01', 'PEREZ ARELI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(113, 'PMKE01', 'PEREZ MIGUEL KEVIN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(114, 'PEKA02', 'PELAEZ KARLA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(115, 'PGEF01', 'PEREZ GUTIERREZ EFRAIN', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(116, 'PBCE01', 'PERALES BAUTISTA CECILIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(117, 'PSAR01', 'PEREZ SARAY ARELY', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(118, 'PEYA01', 'PERALES YATZIL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(119, 'PMRO01', 'PEREZ MONTES RODRIGO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(120, 'PDLA1', 'PINEDA DANIA LAZEL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(121, 'POAL01', 'PERALES OLVERA ALITZEL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(122, 'PCAL01', 'PAREDES CERVANTO ALIN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(123, 'PMRR01', 'PEREZ MONTES RODGRIGO RODO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(124, 'PEYA01', 'PELAEZ YAREYDU', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(125, 'PNJO01', 'PEREZ NARANJO JOSUE', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(126, 'POER01', 'PERES OLVERA ERIC', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(127, 'PCME01', 'PAREDES CERVANTES MELANIE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(128, 'RPYO01', 'REYES PRIETO YOSHUA', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(129, 'ROSO01', 'ROJAS SOPHIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(130, 'RONA01', 'ROJAS NADIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(131, 'RPAL01', 'RIVERA PEREZ ALEXIS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(132, 'RAAN01', 'RAMIREZ ANAHI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(133, 'RBAV01', 'RODRIGUEZ BRIAN AVILA', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(134, 'RRWE01', 'ROJAS ROMERO WENDY', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(135, 'RANE01', 'RAMIREZ NESTOR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(136, 'REIT01', 'RESENDIZ ITZEL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(137, 'RZYO01', 'RAMIREZ ZAMBIANO YOLTIC', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(138, 'RLCE01', 'RAMIREZ LOPEZ CARLOS EDUARDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(139, 'ROAN01', 'RODRIGUEZ ANGELA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(140, 'RMAN01', 'RODRIGUEZ MORENO ANGELA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(141, 'RSJL01', 'RAMIREZ SOLIS JOSE LUIS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(142, 'RSFE01', 'RODRIGUEZ SAUCESO FERNANDA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(143, 'ROZO01', 'RODRIGUEZ ZOE', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(144, 'REGU01', 'RODRIGUEZ ESPINDOLA GUADALUPE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(145, 'RAMI01', 'RAMIREZ MILLYERELI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(146, 'ROJA01', 'RODRIGUEZ JACQUELIN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(147, 'RJLI01', 'RAMIREZ JOSE LUIS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(148, 'RMYA01', 'RODRIGUEZ MONRROY YAMILET', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(149, 'RRFE01', 'RODRIGUEZ RODRIGUEZ FERNANDO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(150, 'ROMA01', 'RODARTE MARLENE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(151, 'SAAL01', 'SANCHEZ ALINNE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(152, 'SAMA01', 'SANCHEZ MARCO ANTONIO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(153, 'SGAN01', 'SANCHEZ GONZALEZ ANGEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(154, 'SOAX01', 'SOVERANNU AXEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(155, 'SABE01', 'SANCHEZ BERENICE ', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(156, 'SLHR01', 'SOTO LOPEZ HECTOR RODRIGO ', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(157, 'SGAN01', 'SANCHEZ GONZALEZ ANGEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(158, 'SRMO01', 'SANCHEZ ROMANA MONCADA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(159, 'SAMA01', 'SANTILLAN MARISOL', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(160, 'SLBE01', 'SALAS LOPEZ BERAYA', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(161, 'SAOS01', 'SANCHEZ OSMAR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(162, 'SLAN01', 'SANCHEZ LOPEZ ANGEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(163, 'SGAX01', 'SANCHEZ GUTIERREZ AXEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(164, 'SARA01', 'SANCHEZ RANDY', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(165, 'SMKA01', 'SMITH KARLA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(166, 'SGMA01', 'SANCHEZ GONZALEZ MARCO ANTONIO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(167, 'TRLE01', 'TALONIA RAMIREZ LEILANI', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(168, 'TCOS01', 'TORRES CARLOS OSMAR', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(169, 'TAKA01', 'TALONIA KARINA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(170, 'TMIV01', 'TALONIA MIGUEL IVONNE', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(171, 'TVZU01', 'TAPIA VARGAS ZULEMA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(172, 'VAYO01', 'VALENCIA YOSELIN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(173, 'VAAL01', 'VAZQUEZ ALEJANDRA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(174, 'VAJU01', 'VARGAS  JUANA ', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(175, 'VCAN01', 'VILLEGAS CHAVEZ ANTONY', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(176, 'VMGA01', 'VILEGAS MARTINEZ GABRIELA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(177, 'VSAX01', 'VALENCIA SOVERANIS AXEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(178, 'VHRO01', 'VAZQUEZ HERNANDEZ RODRIGO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(179, 'VFJC01', 'VALENCIA FLORES JUAN CARLOS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(180, 'VILE01', 'VILLEDA LEIDA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(181, 'VPGL01', 'VIDAL PEREZ GLORIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(182, 'VPJE01', 'VIDAL PEREZ JESUS', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(183, 'VAMA01', 'VALENCIA MIGUEL ANGEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(184, 'VAYO01', 'VALENCIA YOSELIN', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(185, 'VELA01', 'VELAZQUEZ LAURA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(186, 'VMGA01', 'VILLEGAS MARTINEZ GABRIELA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(187, 'VCJM01', 'VILLEGAS CONTRERAS JESSICA MONSERRAT', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(188, 'VFEM01', 'VAZQUEZ FRANCISCO EMANUEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(189, 'VMBA01', 'VAZQUEZ MARQUEZ BARBORA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(190, 'VIAL01', 'VAZQUEZ IAN ALBERTO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(191, 'VIKE01', 'VILLEGAS KENIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(192, 'VAMA01', 'MARQUEZ MARIA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(193, 'VAAL02', 'VAZQUEZ ALEJANDRO', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(194, 'ZEMO01', 'ZEPEDA MONICA', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(195, 'ZUOS01', 'ZUÑIGA OSIRIS', NULL, '', 0, 'SIN ASIGNAR', 'mujer.png', NULL),
(196, 'ZMAN01', 'ZEPEDA MIGUEL ANGEL', NULL, '', 0, 'SIN ASIGNAR', 'hombre.png', NULL),
(199, 'JAHG01', 'JESUS ALEJANDRO HERNANDEZ GONZALES', '2022-11-18', '', 0, 'SEMANAL', 'hombre.png', NULL),
(202, 'ANHE01', 'ANGEL DAVID HERNANDEZ RUIZ', NULL, '5618453830', 22, 'SIN ASIGNAR', 'hombre.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `stock` int(11) NOT NULL,
  `tipo` varchar(12) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `foto`, `nombre`, `precio_compra`, `precio_venta`, `stock`, `tipo`) VALUES
(1, 'suscripcion.png', 'VISITA DIARIA', 1, 40, 1, 'plan'),
(2, 'suscripcion.png', 'SEMANAL', 1, 120, 1, 'plan'),
(3, 'suscripcion.png', 'MENSUALIDAD', 1, 380, 1, 'plan'),
(4, 'suscripcion.png', 'SEMESTRAL', 1, 2100, 1, 'plan'),
(5, 'suscripcion.png', 'ANUALIDAD', 1, 4000, 0, 'plan'),
(6, 'suscripcion.png', 'MENSUALIDAD ESTUDIANTE', 1, 280, 1, 'plan'),
(7, 'suscripcion.png', 'MENSUALIDAD 2 PERSONAS', 1, 325, 1, 'plan'),
(20, 'carlosV.png', 'Carlos V', 1, 4, 1, 'producto'),
(21, 'carrito.png', 'Creatina sin sabor', 1, 10, 1, 'producto'),
(22, 'carrito.png', 'Creatina con sabor', 1, 10, 1, 'producto'),
(23, 'carrito.png', 'Gomitas', 1, 8, 1, 'producto'),
(24, 'carrito.png', 'Chicle', 1, 4, 1, 'producto'),
(25, 'carrito.png', 'Agua Bonafon', 1, 12, 3, 'producto'),
(26, 'carrito.png', 'Agua Great Value', 1, 10, 0, 'producto'),
(27, 'carrito.png', 'Proteina PSN', 1, 30, 1, 'producto'),
(28, 'carrito.png', 'Proteina BPI', 1, 35, 1, 'producto'),
(29, 'carrito.png', 'Proteina Gold', 1, 35, 1, 'producto'),
(30, 'carrito.png', 'Pre-Entreno Body Burst', 1, 25, 1, 'producto'),
(31, 'carrito.png', 'Pre-Entren Mutan Madness', 1, 30, 1, 'producto'),
(32, 'carrito.png', 'Pre-entreno Psychotic Negro', 1, 30, 1, 'producto'),
(33, 'carrito.png', 'Pre-Entreno Psychotic Dorado', 1, 35, 0, 'producto'),
(34, 'carrito.png', 'Pre-Entreno Psychotic Rojo', 1, 35, 1, 'producto'),
(35, 'carrito.png', 'BCASS Mutant', 1, 10, 1, 'producto'),
(36, 'carrito.png', 'BCASS Body', 1, 10, 1, 'producto'),
(37, 'carrito.png', 'Colageno Body', 1, 15, 1, 'producto'),
(38, 'carrito.png', 'Gat cafeine', 1, 5, 1, 'producto'),
(39, 'carrito.png', 'Gat L-Carnitine', 1, 5, 1, 'producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'ALTA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `matricula`, `clave`, `cargo`, `estado`) VALUES
(1, 'ADMINISTRADOR', 'ADMIN', 'ADMIN', 'ADMINISTRADOR', 'ALTA'),
(2, 'ÁNGEL DAVID HERNÁNDEZ RUIZ', 'ANHE01', '12345', 'RECEPCIONISTA', 'ALTA'),
(3, 'JESÚS ALEJANDRO HERNÁNDEZ GONZÁLEZ', 'JEHE01', '12345', 'RECEPCIONISTA', 'ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `total` float NOT NULL,
  `fecha_venta` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
