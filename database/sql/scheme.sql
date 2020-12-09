-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-11-2019 a las 02:29:40
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portalxn_aes_proyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo_pago`
--

CREATE TABLE `acuerdo_pago` (
  `id_acuerdo_pago` int(10) NOT NULL,
  `id_contrato_acuerdo_pago` int(10) NOT NULL,
  `estado_acuerdo_pago` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `acuerdo_pago`
--

INSERT INTO `acuerdo_pago` (`id_acuerdo_pago`, `id_contrato_acuerdo_pago`, `estado_acuerdo_pago`) VALUES
(1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alcance`
--

CREATE TABLE `alcance` (
  `id_alcance` int(11) NOT NULL,
  `nombre_alcance` varchar(50) NOT NULL,
  `estado_alcance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alcance`
--

INSERT INTO `alcance` (`id_alcance`, `nombre_alcance`, `estado_alcance`) VALUES
(1, 'IMPORTACION', 'activo'),
(2, 'EXPORTACION', 'activo'),
(3, 'TRANSPORTE', 'ACTIVO'),
(4, 'AGENTE DE ADUANAS', 'ACTIVO'),
(5, 'PUERTOS', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `id_colaborador` int(11) NOT NULL,
  `nombre_colaborador` varchar(120) NOT NULL,
  `cargo_colaborador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `id_entidad_pago_contrato` int(11) DEFAULT NULL,
  `valor_contrato` decimal(15,0) NOT NULL,
  `fecha_firma_contrato` date NOT NULL,
  `estado_contrato` varchar(50) NOT NULL,
  `idtrabajo_temporal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id_contrato`, `id_entidad_pago_contrato`, `valor_contrato`, `fecha_firma_contrato`, `estado_contrato`, `idtrabajo_temporal`) VALUES
(2, 2, '5000000', '2019-11-15', 'ACTIVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE `cuota` (
  `id_cuota` int(11) NOT NULL,
  `id_acuerdo_pago_cuota` int(11) NOT NULL,
  `numero_cuota` int(11) NOT NULL,
  `monto_cuota` decimal(15,0) NOT NULL,
  `porcentaje_cuota` int(11) NOT NULL,
  `estado_cuota` varchar(15) NOT NULL,
  `observacion_cuota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`id_cuota`, `id_acuerdo_pago_cuota`, `numero_cuota`, `monto_cuota`, `porcentaje_cuota`, `estado_cuota`, `observacion_cuota`) VALUES
(1, 1, 1, '2500000', 50, 'NO PAGADO', ''),
(2, 1, 2, '2500000', 50, 'NO PAGADO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico_proyecto`
--

CREATE TABLE `diagnostico_proyecto` (
  `id_diagnostico_item_proyecto` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_item_grupo_plantilla_alcance` int(11) NOT NULL,
  `comentario_dliagnostico` text NOT NULL,
  `estado_diagnostico` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_entidad` int(11) NOT NULL,
  `id_pais_empresa` int(11) NOT NULL,
  `gru_id_entidad` int(11) DEFAULT NULL,
  `nombre_empresa` varchar(200) NOT NULL,
  `identificacion_empresa` varchar(20) NOT NULL,
  `departamento_empresa` varchar(100) NOT NULL,
  `ciudad_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(150) NOT NULL,
  `naturaleza_empresa` varchar(20) NOT NULL,
  `telefono_empresa` varchar(20) NOT NULL,
  `email_empresa` varchar(100) NOT NULL,
  `nombre_representante_empresa` varchar(100) NOT NULL,
  `identificacion_representante_empresa` varchar(20) NOT NULL,
  `telefono_representante_empresa` varchar(20) NOT NULL,
  `email_representante_empresa` varchar(100) NOT NULL,
  `nombre_contacto_empresa2` varchar(100) NOT NULL,
  `cargo_contacto_empresa2` varchar(20) NOT NULL,
  `telefono_contacto_empresa2` varchar(20) NOT NULL,
  `email_contacto_empresa2` varchar(100) NOT NULL,
  `link_plataforma_facturacion_empresa` varchar(200) DEFAULT NULL,
  `usuario_plataforma_facturacion_empresa` varchar(20) DEFAULT NULL,
  `fecha_registro_empresa` date NOT NULL,
  `idusuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_entidad`, `id_pais_empresa`, `gru_id_entidad`, `nombre_empresa`, `identificacion_empresa`, `departamento_empresa`, `ciudad_empresa`, `direccion_empresa`, `naturaleza_empresa`, `telefono_empresa`, `email_empresa`, `nombre_representante_empresa`, `identificacion_representante_empresa`, `telefono_representante_empresa`, `email_representante_empresa`, `nombre_contacto_empresa2`, `cargo_contacto_empresa2`, `telefono_contacto_empresa2`, `email_contacto_empresa2`, `link_plataforma_facturacion_empresa`, `usuario_plataforma_facturacion_empresa`, `fecha_registro_empresa`, `idusuario`) VALUES
(2, 1, NULL, 'EMPRESA PRUEBA ABC', '1111797500', 'VALLE DEL CAUCA', 'BUENAVENTURA', 'DIAG 7 #29-30', 'PRIVADA', '111254878', 'mac2394q@gmail.com', 'MIGUEL ANGEL CLAROS QUINTERO 1ABC', '111111', '11111', 'mac2394q@gmail.com', 'HERNAN GOMEZ ABC 1', 'CEO', '2222', 'hernan@gmail.com', 'http://', 'admin_test-admin_tes', '2019-11-15', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_proyecto`
--

CREATE TABLE `empresa_proyecto` (
  `id_empresa_proyecto` int(11) NOT NULL,
  `id_entidad_empresa_proyecto` int(11) NOT NULL,
  `id_proyecto_empresa` int(11) NOT NULL,
  `id_contrato_empresa_proyecto` int(11) DEFAULT NULL,
  `estado_empresa_proyecto` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa_proyecto`
--

INSERT INTO `empresa_proyecto` (`id_empresa_proyecto`, `id_entidad_empresa_proyecto`, `id_proyecto_empresa`, `id_contrato_empresa_proyecto`, `estado_empresa_proyecto`) VALUES
(1, 2, 1, 1, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id_entidad` int(11) NOT NULL,
  `tipo_entidad` varchar(10) NOT NULL,
  `estado_entidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `tipo_entidad`, `estado_entidad`) VALUES
(2, 'EMPRESA', 'ACTIVO'),
(7, 'GRUPO', 'ACTIVO'),
(8, 'GRUPO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_empresarial`
--

CREATE TABLE `grupo_empresarial` (
  `id_entidad` int(11) NOT NULL,
  `nombre_grupo_empresarial` varchar(50) NOT NULL,
  `idusuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_empresarial`
--

INSERT INTO `grupo_empresarial` (`id_entidad`, `nombre_grupo_empresarial`, `idusuario`) VALUES
(7, 'GRUPO PRUEBAS ABC', 12),
(8, 'GRUPO CARVAJAL', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_plantilla_alcance`
--

CREATE TABLE `grupo_plantilla_alcance` (
  `id_grupo_plantilla_alcance` int(11) NOT NULL,
  `id_plantilla_alcance` int(11) DEFAULT NULL,
  `etiqueta_grupo_plantilla` varchar(10) NOT NULL,
  `titulo_grupo_plantilla` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_plantilla_alcance`
--

INSERT INTO `grupo_plantilla_alcance` (`id_grupo_plantilla_alcance`, `id_plantilla_alcance`, `etiqueta_grupo_plantilla`, `titulo_grupo_plantilla`) VALUES
(34, 31, '1', 'CAPITULO 1 TEXTO PRUEBA 1'),
(35, 31, '2', 'CAPITULO 2 TEXTO PRUEBA 2'),
(36, 31, '3', 'CAPITULO 3TEXTO PRUEBA 3'),
(37, 31, '4', 'CAPITULO 3 TEXTO PRUEBA 3'),
(38, 32, '1', 'Pasaporte vigente'),
(39, 32, '2', 'La hoja de confirmación del Formulario DS-160'),
(40, 33, '1', 'prueba 11'),
(41, 33, '2', 'prueba 22'),
(42, 34, '1', 'ANÁLISIS Y ADMINISTRACIÓN DEL RIESGO'),
(43, 34, '2', 'ASOCIADOS DE NEGOCIO'),
(44, 34, '3', 'SEGURIDAD DEL CONTENEDOR Y DEMÁS UNIDADES DE CARGA'),
(45, 35, '1', 'ANÁLISIS Y ADMINISTRACIÓN DEL RIESGO'),
(46, 35, '2', 'ASOCIADOS DE NEGOCIO'),
(47, 35, '3', 'SEGURIDAD DEL CONTENEDOR Y DEMÁS UNIDADES DE CARGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implementacion_colaborador`
--

CREATE TABLE `implementacion_colaborador` (
  `id_implementacion_item_proyecto` int(11) NOT NULL,
  `id_colaborador_implementacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implementacion_proyecto`
--

CREATE TABLE `implementacion_proyecto` (
  `id_implementacion_item_proyecto` int(11) NOT NULL,
  `id_item_grupo_plantilla_certificacion` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `comentario_implementacion` text NOT NULL,
  `porcentaje_avance` int(11) NOT NULL,
  `fecha_comentario_implementacion` date NOT NULL,
  `estado_implementacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_grupo_plantilla_alcance`
--

CREATE TABLE `item_grupo_plantilla_alcance` (
  `id_item_grupo_plantilla_certificacion` int(11) NOT NULL,
  `id_grupo_plantilla_certificacion` int(11) DEFAULT NULL,
  `etiqueta_item_plantilla` varchar(50) NOT NULL,
  `descripcion_item_plantilla` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item_grupo_plantilla_alcance`
--

INSERT INTO `item_grupo_plantilla_alcance` (`id_item_grupo_plantilla_certificacion`, `id_grupo_plantilla_certificacion`, `etiqueta_item_plantilla`, `descripcion_item_plantilla`) VALUES
(18, 34, '1.1 NUMERA 1.1', 'DESCRIPCION TEXTO 1 - 1.1'),
(21, 35, '2.1 TNUMERAL 2.1', 'DESCRPICON TEXTO PRUEBA 2'),
(22, 35, '2.2 NUMERAL 2.2', 'DESCRPCION TEXTO PRUEBA 2'),
(24, 34, '1.2 NUMERAL 1.2', 'DESCRIPCION TEXTO 1 - 1.1'),
(25, 34, '1.3 NUMERAL !.3', 'DESCRIPCION TEXTO 1 - 1.1'),
(26, 36, '3.1 NUMERA 3.1', 'Texto descripcion 3.1'),
(27, 36, '3.2 NUMERA 3.2', 'Texto descripcion 3.2'),
(28, 36, '3.3 NUMERA 3.3', 'Texto descripcion 3.3'),
(29, 37, '4.1 NUMERA 4.1', 'Texto descripcion 4.1'),
(30, 37, '4.2 NUMERA 4.2', 'Texto descripcion 4.2'),
(31, 37, '4.3 NUMERA 4.3', 'Texto descripcion 4.3'),
(32, 42, '1.1', 'TENER UNA POLíTICA DE GESTIóN DE LA SEGURIDAD BASADA EN LA EVALUACIóN DEL RIESGO Y ORIENTADA A GARANTIZAR LA SEGURIDAD DE SUS CADENAS DE SUMINISTRO, LA CUAL DEBE TENER ESTABLECIDOS OBJETIVOS, METAS Y PROGRAMAS DE GESTIóN DE LA SEGURIDAD.'),
(33, 42, '1.2', 'TENER UN SISTEMA DE ADMINISTRACIóN DE RIESGOS ENFOCADO EN LA CADENA DE SUMINISTRO INTERNACIONAL, QUE PREVEA ACTIVIDADES ILíCITAS, ENTRE OTRAS LAVADO DE ACTIVOS, NARCOTRáFICO Y FINANCIACIóN DEL TERRORISMO.'),
(34, 42, '1.3', 'TENER PROCEDIMIENTOS DOCUMENTADOS PARA ESTABLECER EL NIVEL DE RIESGO DE SUS ASOCIADOS DE NEGOCIO.'),
(35, 43, '2.1', 'DEBE TENER PROCEDIMIENTOS DOCUMENTADOS PARA LA SELECCIóN, EVALUACIóN Y CONOCIMIENTO DE SUS ASOCIADOS DE NEGOCIO QUE GARANTICEN SU CONFIABILIDAD'),
(36, 43, '2.2', 'DEBE IDENTIFICAR A SUS ASOCIADOS DE NEGOCIO AUTORIZADOS COMO OPERADOR ECONóMICO AUTORIZADO EN COLOMBIA O CERTIFICADOS POR OTRO PROGRAMA DE SEGURIDAD ADMINISTRADO POR UNA ADUANA EXTRANJERA.'),
(37, 44, '3.1', 'DEBE TENER IMPLEMENTADAS MEDIDAS DE SEGURIDAD APROPIADAS PARA MANTENER LA INTEGRIDAD DE LOS CONTENEDORES Y DEMáS UNIDADES DE CARGA EN EL PUNTO DE LLENADO PARA PROTEGERLOS CONTRA LA INTRODUCCIóN DE PERSONAL Y/O MATERIALES NO AUTORIZADOS'),
(38, 44, '3.2', 'DEBE ALMACENAR LOS CONTENEDORES Y DEMáS UNIDADES Dé CARGA, LLENAS Y VACíAS, EN áREAS SEGURAS QUE IMPIDAN EL ACCESO Y/O MANIPULACIóN NO AUTORIZADA. DICHAS áREAS DEBEN SER INSPECCIONADAS PERIóDICAMENTE Y SE DEBE DEJAR REGISTRO DE LA INSPECCIóN Y EL RESPONSABLE'),
(39, 45, '1.1', 'TENER UNA POLíTICA DE GESTIóN DE LA SEGURIDAD BASADA EN LA EVALUACIóN DEL RIESGO DE SUS CADENAS DE SUMINISTRO, LA CUAL DEBE TENER ESTABLECIDOS OBJETIVOS, METAS Y PROGRAMAS DE GESTIóN DE LA SEGURIDAD'),
(40, 45, '1.2', 'TENER UN SISTEMA DE ADMINISTRACIóN DE RIESGOS ENFOCADO EN LA CADENA DE SUMINISTRO INTERNACIONAL, QUE PREVEA ACTIVIDADES ILíCITAS, ENTRE OTRAS LAVADO DE ACTIVOS, CONTRABANDO, TRAFICO DE ESTUPEFACIENTES, TRAFICO PARA EL PROCESAMIENTO NARCOTICOS, TERRORISMO, FINANCIACION DEL TERRORISMO Y TRAFICO DE ARMAS'),
(41, 45, '1.3', 'TENER PROCEDIMIENTOS DOCUMENTADOS PARA ESTABLECER EL NIVEL DE RIESGO DE SUS ASOCIADOS DE NEGOCIO EN LA CADENA DE SUMINISTRO INTERNACIONAL.'),
(42, 45, '1.4', 'DEMOSTRAR MEDIANTE MANIFESTACIóN SUSCRITA POR SUS ASOCIADOS DE NEGOCIO NO AUTORIZADOS COMO OPERADOR ECONóMICO AUTORIZADO EN COLOMBIA NI CERTIFICADOS POR OTRO PROGRAMA DE SEGURIDAD ADMINISTRADO POR UNA ADUANA EXTRANJERA, QUE CUMPLEN LOS REQUISITOS MíNIMOS ORIENTADOS A MITIGAR RIESGOS EN LA CADENA DE SUMINISTRO INTERNACIONAL.'),
(43, 46, '2.1', 'DEBE TENER PROCEDIMIENTOS DOCUMENTADOS PARA LA SELECCIóN, EVALUACIóN Y CONOCIMIENTO DE SUS ASOCIADOS DE NEGOCIO QUE GARANTICEN SU CONFIABILIDAD.'),
(44, 46, '2.2', 'DEBE IDENTIFICAR A SUS ASOCIADOS DE NEGOCIO AUTORIZADOS COMO OPERADOR ECONóMICO AUTORIZADO EN COLOMBIA O CERTIFICADOS POR OTRO PROGRAMA DE SEGURIDAD ADMINISTRADO POR UNA ADUANA EXTRANJERA.'),
(45, 47, '3.1', 'TENER PROCEDIMIENTOS DOCUMENTADOS PARA VERIFICAR, LA INTEGRIDAD FíSICA DE LA ESTRUCTURA DEL CONTENEDOR Y DEMáS UNIDADES DE CARGA CUANDO SE REALICE EL DESADUANAMIENTO EN SUS INSTALACIONES.'),
(46, 47, '3.2', 'TENER PROCEDIMIENTOS DOCUMENTADOS PARA RECONOCER Y REPORTAR A LAS AUTORIDADES COMPETENTES, CUANDO LOS SELLOS, CONTENEDORES Y/O DEMáS UNIDADES DE CARGA HAN SIDO VULNERADOS. '),
(47, 46, '2.3', 'DEBE VERIFICAR QUE EN LOS CASOS EN QUE TRANSFIERA, DELEGUE, TERCERICE O SUBCONTRATE ALGUNO DE SUS PROCESOS CRíTICOS RELACIONADOS CON SUS CADENAS DE SUMINISTRO QUE EL PRESTADOR DEL SERVICIO IMPLMENTA MEDIDAS DE SEGURIDAD ORIENTADAS A MITIGAR RIESGOS EN LA CADENA DE SUMINISTRO INTERNACINAL.'),
(48, 38, '1.1', 'ALGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `acronimo_pais` varchar(10) NOT NULL,
  `nombre_pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `acronimo_pais`, `nombre_pais`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla_alcance`
--

CREATE TABLE `plantilla_alcance` (
  `id_plantilla_alcance` int(11) NOT NULL,
  `id_alcance_plantilla` int(11) NOT NULL,
  `id_pais_plantilla` int(11) NOT NULL,
  `etiqueta_plantilla` varchar(200) NOT NULL,
  `estado_plantilla` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plantilla_alcance`
--

INSERT INTO `plantilla_alcance` (`id_plantilla_alcance`, `id_alcance_plantilla`, `id_pais_plantilla`, `etiqueta_plantilla`, `estado_plantilla`) VALUES
(32, 2, 52, 'RESOL-1782 COMERCIO', 'ACTIVO'),
(34, 2, 52, 'REL. 015 DIAN - EXPORTADORES-HERNAN(S)', 'ACTIVO'),
(35, 1, 52, 'RESOL 067 IMPORTADORES-HERNAN', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preauditoria_proyecto`
--

CREATE TABLE `preauditoria_proyecto` (
  `id_preauditoria_item_proyecto` int(11) NOT NULL,
  `id_item_grupo_plantilla_certificacion` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `comentario_preauditoria` text NOT NULL,
  `estado_preauditoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `id_trabajo_proyecto` int(11) NOT NULL,
  `id_plantilla_alcance_proyecto` int(11) NOT NULL,
  `estado_proyecto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `id_trabajo_proyecto`, `id_plantilla_alcance_proyecto`, `estado_proyecto`) VALUES
(1, 1, 34, 'Fase Diag Iniciado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` int(11) NOT NULL,
  `id_entidad_trabajo` int(11) NOT NULL,
  `id_usuario_diagnostico` int(11) DEFAULT NULL,
  `fecha_fin_diagnostico_trabajo` date DEFAULT NULL,
  `id_usuario_implementacion` int(11) DEFAULT NULL,
  `fehca_fin_implementacion_trabajo` date DEFAULT NULL,
  `id_usuario_preauditoria` int(11) DEFAULT NULL,
  `fecha_fin_preauditoria_trabajo` date DEFAULT NULL,
  `fecha_creacion_trabajo` date NOT NULL,
  `fecha_cierre_trabajo` date DEFAULT NULL,
  `solicitud_acompanamiento_dian_trabajo` varchar(4) DEFAULT NULL,
  `fecha_inscripcion_dian_trabajo` date DEFAULT NULL,
  `fecha_visita_dian_trabajo` date DEFAULT NULL,
  `estado_trabajo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_trabajo`, `id_entidad_trabajo`, `id_usuario_diagnostico`, `fecha_fin_diagnostico_trabajo`, `id_usuario_implementacion`, `fehca_fin_implementacion_trabajo`, `id_usuario_preauditoria`, `fecha_fin_preauditoria_trabajo`, `fecha_creacion_trabajo`, `fecha_cierre_trabajo`, `solicitud_acompanamiento_dian_trabajo`, `fecha_inscripcion_dian_trabajo`, `fecha_visita_dian_trabajo`, `estado_trabajo`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-15', NULL, NULL, NULL, NULL, 'INICIADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_pais_usuario` int(11) NOT NULL,
  `documento_identificacion_usuario` varchar(20) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `rol_usuario` varchar(15) NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `clave_usuario` varchar(20) NOT NULL,
  `telefono_usuario` varchar(15) DEFAULT NULL,
  `direccion_usuario` varchar(100) DEFAULT NULL,
  `correo_usuario` varchar(150) DEFAULT NULL,
  `ciudad_usuario` varchar(50) DEFAULT NULL,
  `fecha_creacion_usuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_pais_usuario`, `documento_identificacion_usuario`, `nombre_usuario`, `rol_usuario`, `login_usuario`, `clave_usuario`, `telefono_usuario`, `direccion_usuario`, `correo_usuario`, `ciudad_usuario`, `fecha_creacion_usuario`) VALUES
(4, 1, '', 'ADMINISTRADOR', 'ADMINISTRACION', 'admin', 'admin', NULL, NULL, NULL, NULL, '2019-11-27'),
(7, 1, '1111797500', 'EMPRESA PRUEBA ABC', 'EMPRESA', '11117975001', '11117975002', '111254878', 'DIAG 7 #29-30', 'mac2394q@gmail.com', 'BUENAVENTURA', '2019-11-15'),
(12, 52, '', 'GRUPO PRUEBAS ABC', 'GRUPO', 'GRUPOPRUEBASABC', 'C(s39!!J0*', '', '', '', '', '2019-11-15'),
(13, 52, '', 'GRUPO CARVAJAL', 'GRUPO', 'GRUPOCARVAJAL', 'x6w4TFdQ9xN', '', '', '', '', '2019-11-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acuerdo_pago`
--
ALTER TABLE `acuerdo_pago`
  ADD PRIMARY KEY (`id_acuerdo_pago`),
  ADD KEY `id_acuerdo_pago` (`id_acuerdo_pago`),
  ADD KEY `id_acuerdo_pago_2` (`id_acuerdo_pago`),
  ADD KEY `id_contrato_acuerdo_pago` (`id_contrato_acuerdo_pago`);

--
-- Indices de la tabla `alcance`
--
ALTER TABLE `alcance`
  ADD PRIMARY KEY (`id_alcance`);

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_colaborador`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `fk_reference_20` (`id_entidad_pago_contrato`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`id_cuota`),
  ADD KEY `id_acuerdo_pago_cuota` (`id_acuerdo_pago_cuota`);

--
-- Indices de la tabla `diagnostico_proyecto`
--
ALTER TABLE `diagnostico_proyecto`
  ADD PRIMARY KEY (`id_diagnostico_item_proyecto`),
  ADD KEY `fk_reference_23` (`id_proyecto`),
  ADD KEY `fk_reference_24` (`id_item_grupo_plantilla_alcance`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_entidad`),
  ADD KEY `fk_relationship_1` (`gru_id_entidad`),
  ADD KEY `fk_relationship_13` (`id_pais_empresa`);

--
-- Indices de la tabla `empresa_proyecto`
--
ALTER TABLE `empresa_proyecto`
  ADD PRIMARY KEY (`id_empresa_proyecto`),
  ADD KEY `fk_empresa_proyecto` (`id_entidad_empresa_proyecto`),
  ADD KEY `fk_empresa_proyecto2` (`id_proyecto_empresa`),
  ADD KEY `fk_reference_18` (`id_contrato_empresa_proyecto`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id_entidad`);

--
-- Indices de la tabla `grupo_empresarial`
--
ALTER TABLE `grupo_empresarial`
  ADD PRIMARY KEY (`id_entidad`);

--
-- Indices de la tabla `grupo_plantilla_alcance`
--
ALTER TABLE `grupo_plantilla_alcance`
  ADD PRIMARY KEY (`id_grupo_plantilla_alcance`),
  ADD KEY `fk_relationship_7` (`id_plantilla_alcance`);

--
-- Indices de la tabla `implementacion_colaborador`
--
ALTER TABLE `implementacion_colaborador`
  ADD PRIMARY KEY (`id_implementacion_item_proyecto`,`id_colaborador_implementacion`),
  ADD KEY `fk_reference_33` (`id_colaborador_implementacion`);

--
-- Indices de la tabla `implementacion_proyecto`
--
ALTER TABLE `implementacion_proyecto`
  ADD PRIMARY KEY (`id_implementacion_item_proyecto`),
  ADD KEY `fk_reference_21` (`id_item_grupo_plantilla_certificacion`),
  ADD KEY `fk_reference_22` (`id_proyecto`);

--
-- Indices de la tabla `item_grupo_plantilla_alcance`
--
ALTER TABLE `item_grupo_plantilla_alcance`
  ADD PRIMARY KEY (`id_item_grupo_plantilla_certificacion`),
  ADD KEY `fk_relationship_11` (`id_grupo_plantilla_certificacion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `plantilla_alcance`
--
ALTER TABLE `plantilla_alcance`
  ADD PRIMARY KEY (`id_plantilla_alcance`),
  ADD KEY `fk_reference_31` (`id_pais_plantilla`),
  ADD KEY `fk_relationship_12` (`id_alcance_plantilla`);

--
-- Indices de la tabla `preauditoria_proyecto`
--
ALTER TABLE `preauditoria_proyecto`
  ADD PRIMARY KEY (`id_preauditoria_item_proyecto`),
  ADD KEY `fk_reference_25` (`id_item_grupo_plantilla_certificacion`),
  ADD KEY `fk_reference_26` (`id_proyecto`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `fk_reference_17` (`id_plantilla_alcance_proyecto`),
  ADD KEY `fk_relationship_3` (`id_trabajo_proyecto`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `fk_reference_27` (`id_usuario_preauditoria`),
  ADD KEY `fk_reference_28` (`id_usuario_diagnostico`),
  ADD KEY `fk_reference_29` (`id_usuario_implementacion`),
  ADD KEY `fk_relationship_4` (`id_entidad_trabajo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_reference_34` (`id_pais_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acuerdo_pago`
--
ALTER TABLE `acuerdo_pago`
  MODIFY `id_acuerdo_pago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alcance`
--
ALTER TABLE `alcance`
  MODIFY `id_alcance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `diagnostico_proyecto`
--
ALTER TABLE `diagnostico_proyecto`
  MODIFY `id_diagnostico_item_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_proyecto`
--
ALTER TABLE `empresa_proyecto`
  MODIFY `id_empresa_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grupo_plantilla_alcance`
--
ALTER TABLE `grupo_plantilla_alcance`
  MODIFY `id_grupo_plantilla_alcance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `implementacion_proyecto`
--
ALTER TABLE `implementacion_proyecto`
  MODIFY `id_implementacion_item_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item_grupo_plantilla_alcance`
--
ALTER TABLE `item_grupo_plantilla_alcance`
  MODIFY `id_item_grupo_plantilla_certificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `plantilla_alcance`
--
ALTER TABLE `plantilla_alcance`
  MODIFY `id_plantilla_alcance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `preauditoria_proyecto`
--
ALTER TABLE `preauditoria_proyecto`
  MODIFY `id_preauditoria_item_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acuerdo_pago`
--
ALTER TABLE `acuerdo_pago`
  ADD CONSTRAINT `acuerdo_pago_ibfk_1` FOREIGN KEY (`id_contrato_acuerdo_pago`) REFERENCES `contrato` (`id_contrato`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_reference_20` FOREIGN KEY (`id_entidad_pago_contrato`) REFERENCES `empresa` (`id_entidad`);

--
-- Filtros para la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD CONSTRAINT `cuota_ibfk_1` FOREIGN KEY (`id_acuerdo_pago_cuota`) REFERENCES `acuerdo_pago` (`id_acuerdo_pago`);

--
-- Filtros para la tabla `diagnostico_proyecto`
--
ALTER TABLE `diagnostico_proyecto`
  ADD CONSTRAINT `fk_reference_23` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `fk_reference_24` FOREIGN KEY (`id_item_grupo_plantilla_alcance`) REFERENCES `item_grupo_plantilla_alcance` (`id_item_grupo_plantilla_certificacion`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_inheritance_2` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`),
  ADD CONSTRAINT `fk_relationship_1` FOREIGN KEY (`gru_id_entidad`) REFERENCES `grupo_empresarial` (`id_entidad`),
  ADD CONSTRAINT `fk_relationship_13` FOREIGN KEY (`id_pais_empresa`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `empresa_proyecto`
--
ALTER TABLE `empresa_proyecto`
  ADD CONSTRAINT `fk_empresa_proyecto` FOREIGN KEY (`id_entidad_empresa_proyecto`) REFERENCES `empresa` (`id_entidad`),
  ADD CONSTRAINT `fk_empresa_proyecto2` FOREIGN KEY (`id_proyecto_empresa`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `fk_reference_18` FOREIGN KEY (`id_contrato_empresa_proyecto`) REFERENCES `contrato` (`id_contrato`);

--
-- Filtros para la tabla `grupo_empresarial`
--
ALTER TABLE `grupo_empresarial`
  ADD CONSTRAINT `fk_inheritance_1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`);

--
-- Filtros para la tabla `grupo_plantilla_alcance`
--
ALTER TABLE `grupo_plantilla_alcance`
  ADD CONSTRAINT `fk_relationship_7` FOREIGN KEY (`id_plantilla_alcance`) REFERENCES `plantilla_alcance` (`id_plantilla_alcance`);

--
-- Filtros para la tabla `implementacion_colaborador`
--
ALTER TABLE `implementacion_colaborador`
  ADD CONSTRAINT `fk_reference_32` FOREIGN KEY (`id_implementacion_item_proyecto`) REFERENCES `implementacion_proyecto` (`id_implementacion_item_proyecto`),
  ADD CONSTRAINT `fk_reference_33` FOREIGN KEY (`id_colaborador_implementacion`) REFERENCES `colaborador` (`id_colaborador`);

--
-- Filtros para la tabla `implementacion_proyecto`
--
ALTER TABLE `implementacion_proyecto`
  ADD CONSTRAINT `fk_reference_21` FOREIGN KEY (`id_item_grupo_plantilla_certificacion`) REFERENCES `item_grupo_plantilla_alcance` (`id_item_grupo_plantilla_certificacion`),
  ADD CONSTRAINT `fk_reference_22` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `item_grupo_plantilla_alcance`
--
ALTER TABLE `item_grupo_plantilla_alcance`
  ADD CONSTRAINT `fk_relationship_11` FOREIGN KEY (`id_grupo_plantilla_certificacion`) REFERENCES `grupo_plantilla_alcance` (`id_grupo_plantilla_alcance`);

--
-- Filtros para la tabla `plantilla_alcance`
--
ALTER TABLE `plantilla_alcance`
  ADD CONSTRAINT `fk_reference_31` FOREIGN KEY (`id_pais_plantilla`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `fk_relationship_12` FOREIGN KEY (`id_alcance_plantilla`) REFERENCES `alcance` (`id_alcance`);

--
-- Filtros para la tabla `preauditoria_proyecto`
--
ALTER TABLE `preauditoria_proyecto`
  ADD CONSTRAINT `fk_reference_25` FOREIGN KEY (`id_item_grupo_plantilla_certificacion`) REFERENCES `item_grupo_plantilla_alcance` (`id_item_grupo_plantilla_certificacion`),
  ADD CONSTRAINT `fk_reference_26` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_reference_17` FOREIGN KEY (`id_plantilla_alcance_proyecto`) REFERENCES `plantilla_alcance` (`id_plantilla_alcance`),
  ADD CONSTRAINT `fk_relationship_3` FOREIGN KEY (`id_trabajo_proyecto`) REFERENCES `trabajo` (`id_trabajo`);

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `fk_reference_27` FOREIGN KEY (`id_usuario_preauditoria`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_reference_28` FOREIGN KEY (`id_usuario_diagnostico`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_reference_29` FOREIGN KEY (`id_usuario_implementacion`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_relationship_4` FOREIGN KEY (`id_entidad_trabajo`) REFERENCES `entidad` (`id_entidad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_reference_34` FOREIGN KEY (`id_pais_usuario`) REFERENCES `pais` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
