-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2016 a las 18:48:32
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `id` int(11) NOT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `nro_documento` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`id`, `tipo_documento_id`, `nro_documento`, `apellidos`, `nombres`, `direccion`, `localidad`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '7667', 'persona', 'fgfgfh', 'fgfh', 'h', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_filial`
--

CREATE TABLE `asesor_filial` (
  `asesor_id` int(11) NOT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor_filial`
--

INSERT INTO `asesor_filial` (`asesor_id`, `filial_id`, `created_at`, `updated_at`) VALUES
(1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_mail`
--

CREATE TABLE `asesor_mail` (
  `asesor_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_telefono`
--

CREATE TABLE `asesor_telefono` (
  `asesor_id` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT 'Sin Descripcion',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `duracion`, `descripcion`, `created_at`, `updated_at`) VALUES
('1', 'carrera 1', '2', 'descripcion de la carrera', '2016-10-24 01:56:46', '2016-10-24 01:56:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id` int(11) NOT NULL,
  `grupo_id` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `docente_id` int(11) NOT NULL,
  `dia` int(1) NOT NULL,
  `horario_desde` time NOT NULL,
  `horario_hasta` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `updated_at` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id`, `grupo_id`, `fecha`, `descripcion`, `docente_id`, `dia`, `horario_desde`, `horario_hasta`, `created_at`, `updated_at`) VALUES
(22, '1', '2016-10-01 00:00:00', 'Panaderia 1', 3, 1, '00:00:00', '00:00:00', '2016-10-24 18:37:50', '2016-10-27 16:36:20'),
(23, '2', '2016-10-31 00:00:00', 'Arreglo de auto', 3, 0, '00:00:00', '00:00:00', '2016-10-26 18:33:44', '2016-10-27 16:34:07'),
(24, '1', '2016-10-27 00:00:00', 'Nueva clase', 3, 0, '00:00:00', '00:00:00', '2016-10-27 19:16:02', '2016-10-27 19:16:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_matricula`
--

CREATE TABLE `clase_matricula` (
  `asistio` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 06:00:01',
  `updated_at` timestamp NOT NULL DEFAULT '1970-01-01 06:00:01',
  `matricula_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase_matricula`
--

INSERT INTO `clase_matricula` (`asistio`, `created_at`, `updated_at`, `matricula_id`, `clase_id`, `id`) VALUES
(1, '2016-10-28 19:31:37', '2016-10-28 19:31:37', 1, 22, 49),
(0, '2016-10-28 19:31:37', '2016-10-28 19:31:37', 2, 22, 50),
(1, '2016-10-28 19:36:30', '2016-10-28 19:36:30', 1, 24, 51),
(1, '2016-10-28 19:36:30', '2016-10-28 19:36:30', 2, 24, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT 'Sin Descripcion.',
  `taller` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `duracion`, `descripcion`, `taller`, `created_at`, `updated_at`) VALUES
('1', 'curso 1 ', '2', 'descripcion del curso', 1, '2016-10-24 01:57:12', '2016-10-24 01:57:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `nro_documento` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `tipo_documento_id`, `nro_documento`, `apellidos`, `nombres`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '32424223', 'director 1', 'jo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director_mail`
--

CREATE TABLE `director_mail` (
  `director_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director_telefono`
--

CREATE TABLE `director_telefono` (
  `director_id` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `nro_documento` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `disponibilidad_manana` tinyint(1) DEFAULT NULL,
  `disponibilidad_tarde` tinyint(1) DEFAULT NULL,
  `disponibilidad_noche` tinyint(1) DEFAULT NULL,
  `disponibilidad_sabados` tinyint(1) DEFAULT NULL,
  `filial_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `tipo_documento_id`, `nro_documento`, `apellidos`, `nombres`, `descripcion`, `disponibilidad_manana`, `disponibilidad_tarde`, `disponibilidad_noche`, `disponibilidad_sabados`, `filial_id`, `activo`, `created_at`, `updated_at`) VALUES
(3, 1, '324242', 'rocha', 'lean', NULL, NULL, NULL, NULL, NULL, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `nro_acta` int(11) NOT NULL,
  `recuperatorio_nro_acta` int(11) DEFAULT NULL,
  `matricula_id` int(11) NOT NULL,
  `grupo_id` varchar(50) DEFAULT NULL,
  `nota` int(2) NOT NULL,
  `carrera_id` varchar(50) NOT NULL,
  `materia_id` varchar(50) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_permisos`
--

CREATE TABLE `examen_permisos` (
  `nro_acta` int(11) NOT NULL,
  `matricula_id` int(11) NOT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filial`
--

CREATE TABLE `filial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `director_id` int(11) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `filial`
--

INSERT INTO `filial` (`id`, `nombre`, `direccion`, `localidad`, `codigo_postal`, `director_id`, `mail`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'filial 1', 'guatemala 3213', 'aca', 12312, 1, 'emaildirector', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filial_telefono`
--

CREATE TABLE `filial_telefono` (
  `filial_id` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` varchar(50) NOT NULL,
  `curso_id` varchar(50) DEFAULT NULL,
  `carrera_id` varchar(50) DEFAULT NULL,
  `materia_id` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `docente_id` int(11) NOT NULL,
  `turno_manana` tinyint(1) DEFAULT NULL,
  `turno_tarde` tinyint(1) DEFAULT NULL,
  `turno_noche` tinyint(1) DEFAULT NULL,
  `sabados` tinyint(1) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `filial_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `terminado` tinyint(1) NOT NULL DEFAULT '0',
  `cancelado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `curso_id`, `carrera_id`, `materia_id`, `descripcion`, `docente_id`, `turno_manana`, `turno_tarde`, `turno_noche`, `sabados`, `fecha_inicio`, `fecha_fin`, `filial_id`, `activo`, `terminado`, `cancelado`, `created_at`, `updated_at`) VALUES
('1', '1', '1', '1', 'descripcion del grupo 1', 3, 1, NULL, NULL, NULL, '2010-01-30 00:00:00', '2018-08-08 00:00:00', 1, 1, 0, 0, '2016-10-24 02:07:02', '2016-10-26 18:30:22'),
('2', '1', '1', '1', 'chapa y pintura', 3, 1, 1, 1, 1, '2017-11-09 00:00:00', '2018-06-27 00:00:00', 1, 1, 0, 0, '2016-10-26 18:31:18', '2016-10-26 18:32:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_horario`
--

CREATE TABLE `grupo_horario` (
  `grupo_id` varchar(50) NOT NULL,
  `dia` int(1) NOT NULL,
  `horario_desde` time NOT NULL,
  `horario_hasta` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_matricula`
--

CREATE TABLE `grupo_matricula` (
  `grupo_id` varchar(50) NOT NULL,
  `matricula_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_matricula`
--

INSERT INTO `grupo_matricula` (`grupo_id`, `matricula_id`, `created_at`, `updated_at`) VALUES
('1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` varchar(50) NOT NULL,
  `carrera_id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(300) DEFAULT 'Sin Descripcion',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `carrera_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
('1', '1', 'materia 1', 'descripcion de la materia 1', '2016-10-24 01:57:39', '2016-10-24 01:57:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `curso_id` varchar(50) DEFAULT NULL,
  `carrera_id` varchar(50) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `filial_id` int(11) DEFAULT NULL,
  `asesor_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `terminado` tinyint(1) NOT NULL DEFAULT '0',
  `cancelado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `persona_id`, `curso_id`, `carrera_id`, `fecha_alta`, `filial_id`, `asesor_id`, `activo`, `terminado`, `cancelado`, `created_at`, `updated_at`) VALUES
(1, 1, '1', NULL, NULL, NULL, NULL, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, '1', NULL, NULL, NULL, NULL, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula_permisos`
--

CREATE TABLE `matricula_permisos` (
  `matricula_id` int(11) NOT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `matricula_id` int(11) NOT NULL,
  `nro_pago` int(11) NOT NULL,
  `pago_individual` tinyint(1) DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL,
  `terminado` tinyint(1) NOT NULL DEFAULT '0',
  `vencimiento` datetime DEFAULT NULL,
  `monto_original` float NOT NULL,
  `monto_actual` float DEFAULT NULL,
  `monto_pago` float DEFAULT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `nro_documento` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `genero` char(1) DEFAULT NULL,
  `fecha_nacimiento` datetime DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `nivel_estudios` varchar(50) DEFAULT NULL,
  `estudio_computacion` tinyint(1) DEFAULT NULL,
  `posee_computadora` tinyint(1) DEFAULT NULL,
  `disponibilidad_manana` tinyint(1) DEFAULT NULL,
  `disponibilidad_tarde` tinyint(1) DEFAULT NULL,
  `disponibilidad_noche` tinyint(1) DEFAULT NULL,
  `disponibilidad_sabados` tinyint(1) DEFAULT NULL,
  `aclaraciones` varchar(300) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `filial_id` int(11) NOT NULL,
  `asesor_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `tipo_documento_id`, `nro_documento`, `apellidos`, `nombres`, `genero`, `fecha_nacimiento`, `domicilio`, `localidad`, `estado_civil`, `nivel_estudios`, `estudio_computacion`, `posee_computadora`, `disponibilidad_manana`, `disponibilidad_tarde`, `disponibilidad_noche`, `disponibilidad_sabados`, `aclaraciones`, `fecha_alta`, `filial_id`, `asesor_id`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '2344324', 'rocgha', 'leo', 'f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '543434', 'raimonda', 'juan', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, '8974561', 'Osvaldo', 'ricardo', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_interes`
--

CREATE TABLE `persona_interes` (
  `id` int(11) NOT NULL,
  `preinforme_id` int(11) DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `carrera_id` varchar(50) DEFAULT NULL,
  `curso_id` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_mail`
--

CREATE TABLE `persona_mail` (
  `persona_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_permisos`
--

CREATE TABLE `persona_permisos` (
  `persona_id` int(11) NOT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_telefono`
--

CREATE TABLE `persona_telefono` (
  `persona_id` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preinforme`
--

CREATE TABLE `preinforme` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `asesor_id` int(11) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `medio` varchar(50) DEFAULT NULL,
  `como_encontro` varchar(50) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preinforme_permisos`
--

CREATE TABLE `preinforme_permisos` (
  `preinforme_id` int(11) NOT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id` int(11) NOT NULL,
  `recibo_tipo_id` int(11) NOT NULL,
  `matricula_id` int(11) NOT NULL,
  `nro_pago` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` datetime NOT NULL,
  `recibo_concepto_pago_id` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `filial_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_concepto_pago`
--

CREATE TABLE `recibo_concepto_pago` (
  `id` int(11) NOT NULL,
  `concepto_pago` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_tipo`
--

CREATE TABLE `recibo_tipo` (
  `id` int(11) NOT NULL,
  `recibo_tipo` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo_documento`, `created_at`, `updated_at`) VALUES
(1, 'Dni', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_documento_id` (`tipo_documento_id`,`nro_documento`);

--
-- Indices de la tabla `asesor_filial`
--
ALTER TABLE `asesor_filial`
  ADD PRIMARY KEY (`asesor_id`,`filial_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `asesor_mail`
--
ALTER TABLE `asesor_mail`
  ADD PRIMARY KEY (`asesor_id`,`mail`);

--
-- Indices de la tabla `asesor_telefono`
--
ALTER TABLE `asesor_telefono`
  ADD PRIMARY KEY (`asesor_id`,`telefono`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docente_id` (`docente_id`);

--
-- Indices de la tabla `clase_matricula`
--
ALTER TABLE `clase_matricula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_documento_id` (`tipo_documento_id`,`nro_documento`);

--
-- Indices de la tabla `director_mail`
--
ALTER TABLE `director_mail`
  ADD PRIMARY KEY (`director_id`,`mail`);

--
-- Indices de la tabla `director_telefono`
--
ALTER TABLE `director_telefono`
  ADD PRIMARY KEY (`director_id`,`telefono`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_documento_id` (`tipo_documento_id`,`nro_documento`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`nro_acta`,`matricula_id`),
  ADD KEY `recuperatorio_nro_acta` (`recuperatorio_nro_acta`,`matricula_id`),
  ADD KEY `grupo_id` (`grupo_id`),
  ADD KEY `carrera_id` (`carrera_id`,`materia_id`),
  ADD KEY `docente_id` (`docente_id`);

--
-- Indices de la tabla `examen_permisos`
--
ALTER TABLE `examen_permisos`
  ADD PRIMARY KEY (`nro_acta`,`matricula_id`,`filial_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indices de la tabla `filial_telefono`
--
ALTER TABLE `filial_telefono`
  ADD PRIMARY KEY (`filial_id`,`telefono`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `carrera_id` (`carrera_id`,`materia_id`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `grupo_horario`
--
ALTER TABLE `grupo_horario`
  ADD PRIMARY KEY (`grupo_id`,`dia`,`horario_desde`,`horario_hasta`);

--
-- Indices de la tabla `grupo_matricula`
--
ALTER TABLE `grupo_matricula`
  ADD PRIMARY KEY (`grupo_id`,`matricula_id`),
  ADD KEY `matricula_id` (`matricula_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`,`carrera_id`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `filial_id` (`filial_id`),
  ADD KEY `asesor_id` (`asesor_id`);

--
-- Indices de la tabla `matricula_permisos`
--
ALTER TABLE `matricula_permisos`
  ADD PRIMARY KEY (`matricula_id`,`filial_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`matricula_id`,`nro_pago`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_documento_id` (`tipo_documento_id`,`nro_documento`),
  ADD KEY `filial_id` (`filial_id`),
  ADD KEY `asesor_id` (`asesor_id`);

--
-- Indices de la tabla `persona_interes`
--
ALTER TABLE `persona_interes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `preinforme_id` (`preinforme_id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `persona_mail`
--
ALTER TABLE `persona_mail`
  ADD PRIMARY KEY (`persona_id`,`mail`);

--
-- Indices de la tabla `persona_permisos`
--
ALTER TABLE `persona_permisos`
  ADD PRIMARY KEY (`persona_id`,`filial_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `persona_telefono`
--
ALTER TABLE `persona_telefono`
  ADD PRIMARY KEY (`persona_id`,`telefono`);

--
-- Indices de la tabla `preinforme`
--
ALTER TABLE `preinforme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `asesor_id` (`asesor_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `preinforme_permisos`
--
ALTER TABLE `preinforme_permisos`
  ADD PRIMARY KEY (`preinforme_id`,`filial_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recibo_tipo_id` (`recibo_tipo_id`),
  ADD KEY `matricula_id` (`matricula_id`,`nro_pago`),
  ADD KEY `recibo_concepto_pago_id` (`recibo_concepto_pago_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indices de la tabla `recibo_concepto_pago`
--
ALTER TABLE `recibo_concepto_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recibo_tipo`
--
ALTER TABLE `recibo_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `clase_matricula`
--
ALTER TABLE `clase_matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `nro_acta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `filial`
--
ALTER TABLE `filial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `persona_interes`
--
ALTER TABLE `persona_interes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preinforme`
--
ALTER TABLE `preinforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recibo_concepto_pago`
--
ALTER TABLE `recibo_concepto_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recibo_tipo`
--
ALTER TABLE `recibo_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD CONSTRAINT `asesor_ibfk_1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`);

--
-- Filtros para la tabla `asesor_filial`
--
ALTER TABLE `asesor_filial`
  ADD CONSTRAINT `asesor_filial_ibfk_1` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`id`),
  ADD CONSTRAINT `asesor_filial_ibfk_2` FOREIGN KEY (`filial_id`) REFERENCES `filial` (`id`);

--
-- Filtros para la tabla `asesor_mail`
--
ALTER TABLE `asesor_mail`
  ADD CONSTRAINT `asesor_mail_ibfk_1` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`id`);

--
-- Filtros para la tabla `asesor_telefono`
--
ALTER TABLE `asesor_telefono`
  ADD CONSTRAINT `asesor_telefono_ibfk_1` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
