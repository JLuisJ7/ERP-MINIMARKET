-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2015 a las 09:43:48
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sismima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admcatalogo`
--

CREATE TABLE IF NOT EXISTS `admcatalogo` (
`ide_elemento` int(10) unsigned NOT NULL,
  `ide_grupo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL,
  `ide_estado` char(1) NOT NULL,
  `des_usu_registra` varchar(250) DEFAULT NULL,
  `fec_registra` datetime DEFAULT NULL,
  `des_usu_modifica` varchar(250) DEFAULT NULL,
  `fec_modifica` datetime DEFAULT NULL,
  `cod_sunat` varchar(10) DEFAULT NULL,
  `des_abrev` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admcatalogo`
--

INSERT INTO `admcatalogo` (`ide_elemento`, `ide_grupo`, `des_nombre`, `ide_estado`, `des_usu_registra`, `fec_registra`, `des_usu_modifica`, `fec_modifica`, `cod_sunat`, `des_abrev`) VALUES
(1, 1, 'ADMINISTRADOR', '1', 'lalipazaga@sismima.com', '2015-04-18 21:46:25', NULL, NULL, NULL, NULL),
(2, 2, 'MODULO DE VENTAS', '1', 'lalipazaga@sismima.com', '2015-04-18 21:54:55', NULL, NULL, NULL, NULL),
(3, 2, 'MODULO DE COMPRAS', '1', 'lalipazaga@sismima.com', '2015-04-18 21:54:57', NULL, NULL, NULL, NULL),
(4, 2, 'CONTROL DE FACTURACION', '1', 'lalipazaga@sismima.com', '2015-04-18 21:54:59', NULL, NULL, NULL, NULL),
(5, 2, 'CONTROL DE ALMACEN', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:00', NULL, NULL, NULL, NULL),
(6, 2, 'MODULO DE PERSONAL', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:02', NULL, NULL, NULL, NULL),
(7, 2, 'MODULO DE COTIZACIONES', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:04', NULL, NULL, NULL, NULL),
(8, 2, 'CONSULTA DE REPORTES', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:05', NULL, NULL, NULL, NULL),
(9, 2, 'SEGURIDAD', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:08', NULL, NULL, NULL, NULL),
(10, 3, 'DOC. NACIONAL DE IDENTIDAD', '1', 'lalipazaga@sismima.com', '2015-04-19 14:00:08', NULL, NULL, '01', 'D.N.I.'),
(11, 3, 'CARNE DE EXTRANJERIA', '1', 'lalipazaga@sismima.com', '2015-04-19 14:00:08', NULL, NULL, '04', 'C.EX.'),
(12, 4, 'PERSONA NATURAL', '1', 'lalipazaga@sismima.com', '2015-04-19 23:53:25', NULL, NULL, NULL, NULL),
(13, 4, 'PERSONA JURIDICA', '1', 'lalipazaga@sismima.com', '2015-04-19 23:54:29', NULL, NULL, NULL, NULL),
(14, 3, 'REG. UNICO DE CONTRIBUYENTES', '1', 'lalipazaga@sismima.com', '2015-04-20 02:13:16', NULL, NULL, '06', 'R.U.C.'),
(15, 3, 'PASAPORTE', '1', 'lalipazaga@sismima.com', '2015-04-20 02:13:28', NULL, NULL, '07', 'PAS.'),
(16, 3, 'PARTIDA DE NACIMIENTO', '1', 'lalipazaga@sismima.com', '2015-04-20 02:14:42', NULL, NULL, '11', 'PART. NAC.'),
(17, 5, 'USUARIO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:11:14', NULL, NULL, NULL, NULL),
(18, 5, 'EMPLEADO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:13:19', NULL, NULL, NULL, NULL),
(19, 5, 'PROVEEDOR', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:11', NULL, NULL, NULL, NULL),
(20, 5, 'CLIENTE', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(21, 6, 'MASCULINO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(22, 6, 'FEMENINO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(23, 7, 'SOLTERO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:18', NULL, NULL, NULL, NULL),
(24, 7, 'CASADO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:32', NULL, NULL, NULL, NULL),
(25, 7, 'VIUDO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:49', NULL, NULL, NULL, NULL),
(26, 7, 'CONVIVIENTE', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:49', NULL, NULL, NULL, NULL),
(27, 7, 'DIVORCIADO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:08:12', NULL, NULL, NULL, NULL),
(28, 7, 'SEPARADO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:08:19', NULL, NULL, NULL, NULL),
(29, 8, 'SECUNDARIA COMPLETA', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(30, 8, 'SUPERIOR TECNICO COMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(31, 8, 'SUPERIOR TECNICO INCOMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(32, 8, 'SUPERIOR UNIVERSITARIO COMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(33, 8, 'SUPERIOR UNIVERSITARIO INCOMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(34, 8, 'PRIMARIA', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(35, 8, 'DIPLOMATURA', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(36, 8, 'MAGISTER', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(37, 8, 'DOCTORADO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(38, 2, 'Reutilizables', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admgrcatalogo`
--

CREATE TABLE IF NOT EXISTS `admgrcatalogo` (
`ide_grupo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admgrcatalogo`
--

INSERT INTO `admgrcatalogo` (`ide_grupo`, `des_nombre`) VALUES
(1, 'TIPO DE USUARIO'),
(2, 'MENU'),
(3, 'TIPO DE DOCUMENTO'),
(4, 'TIPO DE PERSONA'),
(5, 'TIPO CONDICION'),
(6, 'SEXO'),
(7, 'ESTADO CIVIL'),
(8, 'GRADO DE INSTRUCCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admopcion`
--

CREATE TABLE IF NOT EXISTS `admopcion` (
`ide_opcion` int(10) unsigned NOT NULL,
  `ide_modulo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL,
  `des_ruta` varchar(250) DEFAULT NULL,
  `ind_padre` int(10) unsigned NOT NULL,
  `subPadre` varchar(3) DEFAULT NULL,
  `ide_estado` char(1) NOT NULL,
  `des_usu_registra` varchar(250) DEFAULT NULL,
  `fec_registra` datetime DEFAULT NULL,
  `des_usu_modifica` varchar(250) DEFAULT NULL,
  `fec_modifica` datetime DEFAULT NULL,
  `des_icon` varchar(45) DEFAULT NULL,
  `ind_orden` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admopcion`
--

INSERT INTO `admopcion` (`ide_opcion`, `ide_modulo`, `des_nombre`, `des_ruta`, `ind_padre`, `subPadre`, `ide_estado`, `des_usu_registra`, `fec_registra`, `des_usu_modifica`, `fec_modifica`, `des_icon`, `ind_orden`) VALUES
(1, 2, 'MODULO DE VENTAS', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:04:06', NULL, NULL, 'tags', 1),
(2, 2, 'Boletas', 'ventas/boletas', 1, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:07:13', NULL, NULL, '', 0),
(3, 3, 'MODULO DE COMPRAS', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:10:18', NULL, NULL, 'shopping-cart', 2),
(4, 3, 'REGISTRO DE COMPRAS', 'compras/registraCompra', 3, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:10:58', NULL, NULL, '', 0),
(5, 2, 'CLIENTES', 'ventas/listadoClientes', 1, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 05:23:58', NULL, NULL, '', 0),
(6, 3, 'PROVEEDORES', 'compras/listadoProveedores', 3, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:06:58', NULL, NULL, '', 0),
(7, 5, 'CONTROL DE ALMACEN', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:15:58', NULL, NULL, 'tasks', 3),
(8, 5, 'PRODUCTOS', 'almacen/listadoProductos', 7, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(9, 9, 'SEGURIDAD', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 21:11:21', NULL, NULL, 'lock', 10),
(10, 9, 'PARAMETROS GENERALES', 'seguridad/parametrosGenerales', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 21:12:13', NULL, NULL, NULL, 0),
(11, 6, 'MODULO DE PERSONAL', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 22:32:19', NULL, NULL, 'users', 4),
(12, 6, 'EMPLEADOS', 'personal/listadoEmpleados', 11, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 22:34:19', NULL, NULL, NULL, 0),
(13, 9, 'USUARIOS', 'seguridad/listaUsuarios', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 23:41:11', NULL, NULL, NULL, NULL),
(14, 9, 'REGISTRA PERSONAS', 'seguridad/listadoPersonas', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-26 05:30:18', NULL, NULL, NULL, NULL),
(15, 2, 'Generar Factura', 'ventas/registrarFactura', 1, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(16, 2, 'Facturas', 'ventas/facturas', 1, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(17, 5, 'INVENTARIO', 'almacen/Inventario', 7, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(18, 3, 'Ordenes de Compra', 'compras/ordenesCompra', 3, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(19, 38, 'Utlilitarios', '--', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'wrench', 6),
(20, 38, 'PARAMETROS GENERALES', 'utilitarios/parametrosGenerales', 19, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(21, 8, 'REPORTES', '--', 0, '0', '1', 'admin@sismima', '2015-06-07 00:00:00', NULL, NULL, 'bar-chart', 8),
(22, 8, 'Ventas', '--', 21, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 8, 'Compras', '--', 21, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 8, 'Almacen', '--', 21, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 8, 'Clientes', 'reportes/clientes', 22, '22', '1', NULL, NULL, NULL, NULL, 'shopping-cart', NULL),
(26, 8, 'Almacen', 'reportes/almacen', 24, '24', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 8, 'Proveedores', 'reportes/proveedores', 23, '23', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 8, 'facturas', 'reportes/facturas', 22, '22', '1', NULL, NULL, NULL, NULL, 'shopping-cart', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admrol`
--

CREATE TABLE IF NOT EXISTS `admrol` (
`ide_rol` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admrol`
--

INSERT INTO `admrol` (`ide_rol`, `des_nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'GERENTE DE VENTAS'),
(3, 'GERENTE DE COMPRAS'),
(4, 'GERENTE DE ALMACEN'),
(5, 'GERENTE DE RRHH'),
(6, 'VISITANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admrolopcion`
--

CREATE TABLE IF NOT EXISTS `admrolopcion` (
`ide_rolopcion` int(10) unsigned NOT NULL,
  `ide_opcion` int(10) unsigned NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admrolopcion`
--

INSERT INTO `admrolopcion` (`ide_rolopcion`, `ide_opcion`, `ide_rol`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 16, 1),
(4, 5, 1),
(5, 3, 1),
(6, 18, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 17, 1),
(11, 11, 1),
(12, 12, 1),
(13, 19, 1),
(14, 20, 1),
(15, 9, 1),
(16, 13, 1),
(17, 1, 2),
(18, 2, 2),
(19, 16, 2),
(20, 5, 2),
(21, 19, 2),
(22, 20, 2),
(23, 3, 3),
(24, 18, 3),
(25, 6, 3),
(26, 19, 3),
(27, 20, 3),
(28, 7, 4),
(29, 8, 4),
(30, 17, 4),
(31, 11, 5),
(32, 12, 5),
(33, 19, 5),
(34, 20, 5),
(35, 21, 1),
(36, 22, 1),
(37, 23, 1),
(39, 24, 1),
(40, 25, 1),
(41, 26, 1),
(42, 27, 1),
(43, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE IF NOT EXISTS `boleta` (
  `nroSerie` char(3) NOT NULL,
  `nroBol` int(10) unsigned NOT NULL DEFAULT '0',
  `idCliente` int(11) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `fechEmic` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Total` decimal(8,2) NOT NULL,
  `estadoFact` char(1) DEFAULT '1',
  `fechaElim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`nroSerie`, `nroBol`, `idCliente`, `idEmpleado`, `fechEmic`, `Total`, `estadoFact`, `fechaElim`) VALUES
('001', 1, 13, 1, '2015-05-28 03:55:04', '9.00', '1', NULL),
('001', 2, 29, 1, '2015-05-28 04:01:35', '10.50', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`idCategoria` int(11) NOT NULL,
  `nomCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomCategoria`) VALUES
(5, 'Bebidas'),
(3, 'Cereales'),
(7, 'Dulces'),
(9, 'Fideos'),
(8, 'Frutas'),
(2, 'Galletas'),
(1, 'Helados'),
(4, 'Lacteos'),
(6, 'Snacks');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`idCliente` int(11) NOT NULL,
  `RazSoc_Cli` varchar(250) NOT NULL,
  `tipoPersona_Cli` char(1) NOT NULL,
  `ruc_Cli` char(11) NOT NULL,
  `direccion_Cli` varchar(150) NOT NULL,
  `telefono_Cli` char(9) NOT NULL,
  `email_Cli` varchar(50) DEFAULT NULL,
  `fec_reg_Cli` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_Cli` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `RazSoc_Cli`, `tipoPersona_Cli`, `ruc_Cli`, `direccion_Cli`, `telefono_Cli`, `email_Cli`, `fec_reg_Cli`, `estado_Cli`) VALUES
(1, 'ORIHUELA LOZANO JEAN PAUL', '0', '10400409761', 'Av Arequipa 785', '944659233', 'orihuelalozano@gmail.com', '2015-05-07 11:39:03', '1'),
(2, 'Comercial HINOZTROSA', '1', '20321568795', 'Los Olivos #725', '987456259', 'hinoztrosa@hotmail.com', '2015-05-14 06:52:18', '1'),
(3, 'ORIHUELA LOZANO JEAN PAUL', '0', '10400409761', 'Av Arequipa 785', '944659233', 'orihuelalozano@gmail.com', '2015-05-18 20:17:13', '1'),
(4, 'COmercial Huachipa', '0', '20123654872', 'Av arenales 712', '994512454', 'hadsha2@gmail.com', '2015-05-18 20:17:14', '1'),
(5, 'ANA MARCIA LOZANO', '0', '10214578421', 'SALAVERRY 55', '965454214', 'IWDKW@gmail.com', '2015-05-18 20:17:14', '1'),
(6, 'JUAN CARRASCO VALDES', '1', '10421325412', 'ATE VITARTE', '654512587', 'JUAN_54@gmail.com', '2015-05-18 20:17:14', '0'),
(7, 'comercial DOÑA MARIANA', '1', '20441245778', 'Av ZARATE 845', '956412584', 'MARIARIKA@gmail.com', '2015-05-18 20:17:14', '0'),
(8, 'JUAN CARLOS BARBARAN', '1', '10412457894', 'Av SALAVERRY 7', '994512478', 'ELPALETAZO@gmail.com', '2015-05-18 20:17:14', '0'),
(9, 'comercial PALETAZO', '0', '20547856912', 'AV CHIMU 65', '944659233', 'OTROPALETAZO@gmail.com', '2015-05-18 20:17:14', '1'),
(10, 'COMERCIAL MIAKALIFA', '1', '20441245633', 'Av CUBA 785', '993451478', 'RIKA889@gmail.com', '2015-05-18 20:17:14', '0'),
(11, 'JEAN PAUL SANTA MARIA', '1', '10465421561', 'Av parinacochas', '944665413', 'jean@gmail.com', '2015-05-18 20:17:14', '1'),
(12, 'estrada ramirez', '0', '10145409761', 'juan miraflores 785', '944632143', 'loestrada@gmail.com', '2015-05-18 20:17:14', '1'),
(13, 'arrelucea roberto', '0', '10400321451', 'Av miroquesada 785', '932564533', 'robert@gmail.com', '2015-05-18 20:17:14', '0'),
(14, 'COMERCIAL CONTRERAZ', '1', '20475123654', 'Av carlos izaguirre', '954687542', 'COMERCIALCONTRERAZ@gmail.com', '2015-05-18 20:17:14', '1'),
(15, 'COMERCIAL LUPE', '0', '20478409761', 'Av 28 julio', '943214563', 'lupe@gmail.com', '2015-05-18 20:17:14', '0'),
(16, 'obregon salsedo marita', '1', '10778125454', 'Av aviacion', '964578451', 'breon@gmail.com', '2015-05-18 20:17:14', '1'),
(17, 'CHIPANA EBRIO', '0', '10400456471', 'Av carlos izaguirre', '936559233', 'chipanin@gmail.com', '2015-05-18 20:17:14', '0'),
(18, 'carrasco jorge', '0', '10400405421', 'Av Arenales', '946547233', 'jorge@gmail.com', '2015-05-18 20:17:14', '1'),
(19, 'mika rita', '0', '10000464781', 'Av humbolt', '932559233', 'jariin@gmail.com', '2015-05-18 20:17:14', '1'),
(20, 'sacarias paz', '0', '10654784581', 'Av 6 agosto', '932512233', 'sacar@gmail.com', '2015-05-18 20:17:14', '1'),
(21, 'COMERCIAL MARCK', '1', '20470464781', 'Av mariategui', '932211233', 'mardfd@gmail.com', '2015-05-18 20:17:14', '1'),
(22, 'solorzano noel', '0', '10400464781', 'Av cabildo', '554759233', 'solsl@gmail.com', '2015-05-18 20:17:14', '1'),
(23, 'matias fernandes carrasco', '1', '10478464781', 'Av los cabitos', '547859233', 'ahh@gmail.com', '2015-05-18 20:17:14', '0'),
(24, 'COMERCIAL LA LUZ', '0', '20421464781', 'Av carlos valdes', '987559233', 'luser@gmail.com', '2015-05-18 20:17:14', '1'),
(25, 'COMERCIAL VALENCIA', '0', '20403547892', 'la molina', '987159233', 'cdgsl@gmail.com', '2015-05-18 20:17:14', '1'),
(26, 'carrasco asco gabriel', '0', '10745124875', 'Av 3 postes', '994784213', 'carras@gmail.com', '2015-05-18 20:17:14', '0'),
(27, 'COMERCIAL FOTOGRAFO', '1', '20774512367', 'magdalena', '657759213', 'osvita@gmail.com', '2015-05-18 20:17:14', '1'),
(28, 'rondon salazar', '0', '10745464781', 'jesus maria', '554654733', 'rondin@gmail.com', '2015-05-18 20:17:14', '1'),
(29, 'Bebeto romario', '1', '10314574781', 'Av mexico', '992457841', 'bebe@gmail.com', '2015-05-18 20:17:14', '0'),
(30, 'COMERCIAL GUTIERREZ', '0', '20897451235', 'zarate', '654759233', 'amer@gmail.com', '2015-05-18 20:17:14', '1'),
(31, 'jean carlos valdes', '1', '10745464781', 'Av isaan', '995787435', 'jean@gmail.com', '2015-05-18 20:17:15', '0'),
(32, 'COMERCIAL RIQUELME', '0', '20784236541', 'paradero flecha', '995778421', 'ramos@gmail.com', '2015-05-18 20:17:15', '1'),
(33, 'COMERCIAL OYOS', '0', '20754136487', 'manzanilla', '554657845', 'jime@gmail.com', '2015-05-18 20:17:15', '0'),
(34, 'matilde cuba ana', '1', '10784464781', 'feliciano calle 5', '995464512', 'mati@gmail.com', '2015-05-18 20:17:15', '1'),
(35, 'gustavo bueno juan', '0', '10452369875', 'Av elias cuba', '597543457', 'gusty@gmail.com', '2015-05-18 20:17:15', '0'),
(36, 'luana sana rina', '0', '10842136458', 'Av peres tello', '994759233', 'luan@gmail.com', '2015-05-18 20:17:15', '1'),
(37, 'COMERCIAL MALTIN', '0', '20770464781', 'Av poste 4', '997754214', 'mirtin@gmail.com', '2015-05-18 20:17:15', '1'),
(38, 'jony velasques salas', '0', '10657784581', 'cercado lima', '654759233', 'cowa@gmail.com', '2015-05-18 20:17:15', '1'),
(39, 'COMERCIAL PORNASO', '0', '20784247841', 'jr cuzco', '995459233', 'pornin@gmail.com', '2015-05-18 20:17:15', '1'),
(40, 'jordano bravo vasques', '0', '10470464781', 'Av argentina', '999759233', 'redemon@gmail.com', '2015-05-18 20:17:15', '1'),
(41, 'COMERCIAL RIVAS', '1', '20774512478', 'los olivo', '654759233', 'poetasi@gmail.com', '2015-05-18 20:17:15', '1'),
(42, 'marita milagros roque', '0', '10400464781', 'los olivos', '995647233', 'mia@gmail.com', '2015-05-18 20:17:15', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleboleta`
--

CREATE TABLE IF NOT EXISTS `detalleboleta` (
  `nroSerie` char(3) NOT NULL,
  `nroBol` int(10) unsigned NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleboleta`
--

INSERT INTO `detalleboleta` (`nroSerie`, `nroBol`, `idProducto`, `cantidad`, `precio`) VALUES
('001', 1, 3, 3, '3.00'),
('001', 2, 4, 3, '1.50'),
('001', 2, 3, 2, '3.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE IF NOT EXISTS `detallefactura` (
  `nroSerie` char(3) NOT NULL,
  `nroFact` int(10) unsigned NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`nroSerie`, `nroFact`, `idProducto`, `cantidad`, `precio`) VALUES
('001', 1, 1, 20, '2.00'),
('001', 1, 30, 5, '1.50'),
('001', 1, 34, 1, '1.50'),
('001', 2, 2, 10, '5.00'),
('001', 3, 1, 11, '2.00'),
('001', 3, 3, 111, '3.00'),
('001', 5, 2, 5, '5.00'),
('001', 5, 6, 5, '2.00'),
('001', 6, 15, 14, '3.00'),
('001', 6, 4, 7, '1.50'),
('001', 8, 2, 6, '5.00'),
('001', 8, 3, 3, '3.00'),
('001', 10, 1, 1, '2.00'),
('001', 11, 1, 1, '2.00'),
('001', 11, 6, 1, '2.00'),
('001', 11, 7, 1, '2.00'),
('001', 12, 1, 1, '2.00'),
('001', 12, 2, 1, '5.00'),
('001', 12, 4, 1, '1.50'),
('001', 13, 1, 3, '2.00'),
('001', 13, 2, 2, '5.00'),
('001', 14, 1, 3, '2.00'),
('001', 14, 3, 2, '3.00'),
('001', 15, 15, 2, '3.00'),
('001', 15, 16, 2, '5.00'),
('001', 16, 1, 10, '2.00'),
('001', 16, 2, 3, '5.00'),
('001', 17, 1, 4, '2.00'),
('001', 18, 2, 3, '5.00'),
('001', 19, 6, 19, '2.00'),
('001', 19, 13, 5, '3.00'),
('001', 20, 1, 7, '2.00'),
('001', 20, 7, 4, '2.00'),
('001', 21, 2, 6, '5.00'),
('001', 22, 1, 4, '2.00'),
('001', 22, 5, 3, '2.00'),
('001', 23, 39, 10, '3.50'),
('001', 24, 3, 3, '3.00'),
('001', 24, 13, 4, '3.00'),
('001', 24, 4, 3, '1.50'),
('001', 25, 3, 3, '3.00'),
('001', 25, 9, 3, '3.00'),
('001', 26, 7, 4, '2.00'),
('001', 26, 9, 3, '3.00'),
('001', 28, 3, 3, '3.00'),
('001', 29, 1, 4, '2.00'),
('001', 29, 4, 140, '1.50'),
('001', 30, 2, 30, '5.00'),
('001', 31, 8, 44, '5.00'),
('001', 32, 2, 6, '5.00'),
('001', 32, 12, 4, '5.00'),
('001', 33, 1, 16, '2.00'),
('001', 33, 7, 9, '2.00'),
('001', 34, 1, 4, '2.00'),
('001', 34, 6, 5, '2.00'),
('001', 35, 1, 4, '2.00'),
('001', 35, 9, 4, '3.00'),
('001', 36, 12, 8, '5.00'),
('001', 36, 20, 3, '5.00'),
('001', 37, 1, 4, '2.00'),
('001', 37, 11, 3, '2.00'),
('001', 38, 1, 128, '2.00'),
('001', 38, 15, 29, '3.00'),
('001', 38, 24, 30, '5.00'),
('001', 38, 38, 24, '2.10');

--
-- Disparadores `detallefactura`
--
DELIMITER //
CREATE TRIGGER `ActualizarStock` AFTER INSERT ON `detallefactura`
 FOR EACH ROW UPDATE Producto 
     SET stock = stock - NEW.cantidad
   WHERE idProducto = NEW.idProducto
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleordencompra`
--

CREATE TABLE IF NOT EXISTS `detalleordencompra` (
  `nroSerie` char(3) NOT NULL,
  `nroOrden` int(10) unsigned NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleordencompra`
--

INSERT INTO `detalleordencompra` (`nroSerie`, `nroOrden`, `idProducto`, `cantidad`, `precio`) VALUES
('001', 1, 2, 20, '5.00'),
('001', 2, 1, 5, '2.00'),
('001', 2, 2, 6, '5.00'),
('001', 3, 3, 10, '3.00'),
('001', 3, 14, 5, '1.50'),
('001', 4, 1, 100, '2.00'),
('001', 4, 20, 50, '5.00'),
('001', 4, 32, 15, '5.00'),
('001', 5, 2, 5, '5.00'),
('001', 6, 4, 5, '1.50'),
('001', 6, 3, 4, '3.00'),
('001', 7, 8, 10, '5.00'),
('001', 7, 15, 25, '3.00'),
('001', 8, 2, 6, '5.00'),
('001', 8, 12, 6, '5.00'),
('001', 8, 32, 8, '5.00'),
('001', 9, 22, 10, '1.50'),
('001', 9, 20, 5, '5.00'),
('001', 10, 4, 4, '1.50'),
('001', 10, 7, 5, '2.00'),
('001', 10, 29, 5, '3.00'),
('001', 11, 20, 8, '5.00'),
('001', 11, 17, 6, '3.00'),
('001', 12, 4, 10, '1.50'),
('001', 12, 17, 5, '3.00'),
('001', 12, 13, 3, '3.00'),
('001', 13, 17, 10, '3.00'),
('001', 13, 22, 5, '1.50'),
('001', 14, 4, 8, '1.50'),
('001', 14, 7, 10, '2.00'),
('001', 15, 2, 4, '5.00'),
('001', 15, 5, 3, '2.00'),
('001', 16, 4, 4, '1.50'),
('001', 16, 7, 3, '2.00'),
('001', 17, 7, 2, '2.00'),
('001', 19, 33, 4, '3.00'),
('001', 20, 7, 10, '2.00'),
('001', 20, 20, 3, '5.00'),
('001', 21, 33, 6, '3.00'),
('001', 22, 39, 15, '3.50'),
('001', 23, 2, 6, '5.00'),
('001', 24, 16, 4, '5.00'),
('001', 25, 33, 2, '3.00'),
('001', 26, 39, 3, '3.50'),
('001', 27, 33, 4, '3.00'),
('001', 28, 33, 4, '3.00'),
('001', 29, 1, 101, '2.00');

--
-- Disparadores `detalleordencompra`
--
DELIMITER //
CREATE TRIGGER `ActualizarStockCompra` AFTER INSERT ON `detalleordencompra`
 FOR EACH ROW UPDATE Producto 
     SET stock = stock + NEW.cantidad
   WHERE idProducto = NEW.idProducto
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
`idEmpleado` int(10) unsigned NOT NULL,
  `apePat` varchar(50) DEFAULT NULL,
  `apeMat` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fechaReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `apePat`, `apeMat`, `nombres`, `fechaNac`, `DNI`, `telefono`, `sexo`, `fechaReg`, `estado`) VALUES
(1, 'Ayala', 'Benito', 'Jose Luis', '1996-06-07', '71886624', '944659233', 'M', '2015-05-24 13:26:06', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `nroSerie` char(3) NOT NULL,
  `nroFact` int(10) unsigned NOT NULL DEFAULT '0',
  `idCliente` int(11) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `fechEmic` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subTotal` decimal(8,2) NOT NULL,
  `IGV` decimal(8,2) NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `estadoFact` char(1) DEFAULT '1',
  `fechaElim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`nroSerie`, `nroFact`, `idCliente`, `idEmpleado`, `fechEmic`, `subTotal`, `IGV`, `Total`, `estadoFact`, `fechaElim`) VALUES
('001', 1, 2, 1, '2015-05-21 04:12:55', '49.00', '8.82', '57.82', '1', NULL),
('001', 2, 5, 1, '2015-05-21 04:13:40', '50.00', '9.00', '59.00', '1', NULL),
('001', 3, 2, 1, '2015-05-22 09:49:29', '355.00', '63.90', '418.90', '1', NULL),
('001', 4, 26, 1, '2015-05-22 10:33:50', '16.00', '2.88', '18.88', '1', NULL),
('001', 5, 2, 1, '2015-05-22 10:35:13', '35.00', '6.30', '41.30', '1', NULL),
('001', 6, 6, 1, '2015-05-22 11:14:29', '52.50', '9.45', '61.95', '1', NULL),
('001', 7, 13, 1, '2015-05-26 02:52:50', '46.00', '8.28', '54.28', '1', NULL),
('001', 8, 29, 1, '2015-05-26 02:57:00', '39.00', '7.02', '46.02', '1', NULL),
('001', 9, 13, 1, '2015-05-26 02:58:29', '29.00', '5.22', '34.22', '1', NULL),
('001', 10, 5, 1, '2015-05-26 03:00:02', '2.00', '0.36', '2.36', '1', NULL),
('001', 11, 29, 1, '2015-05-26 03:08:08', '6.00', '1.08', '7.08', '1', NULL),
('001', 12, 29, 1, '2015-05-26 03:18:06', '8.50', '1.53', '10.03', '1', NULL),
('001', 13, 5, 1, '2015-05-26 11:58:24', '16.00', '2.88', '18.88', '1', NULL),
('001', 14, 29, 1, '2015-05-26 11:59:55', '12.00', '2.16', '14.16', '1', NULL),
('001', 15, 5, 1, '2015-05-26 12:00:45', '16.00', '2.88', '18.88', '1', NULL),
('001', 16, 2, 1, '2015-05-27 02:55:25', '35.00', '6.30', '41.30', '1', NULL),
('001', 17, 6, 1, '2015-05-27 02:56:17', '8.00', '1.44', '9.44', '1', NULL),
('001', 18, 13, 1, '2015-05-27 03:00:59', '15.00', '2.70', '17.70', '1', NULL),
('001', 19, 30, 1, '2015-05-28 06:34:00', '53.00', '9.54', '62.54', '1', NULL),
('001', 20, 2, 1, '2015-05-28 08:11:51', '22.00', '3.96', '25.96', '1', NULL),
('001', 21, 29, 1, '2015-05-28 08:12:22', '30.00', '5.40', '35.40', '1', NULL),
('001', 22, 29, 1, '2015-05-28 08:16:47', '14.00', '2.52', '16.52', '1', NULL),
('001', 23, 13, 1, '2015-05-28 08:22:31', '35.00', '6.30', '41.30', '1', NULL),
('001', 24, 14, 1, '2015-05-28 08:26:20', '25.50', '4.59', '30.09', '1', NULL),
('001', 25, 29, 1, '2015-05-28 10:54:20', '18.00', '3.24', '21.24', '1', NULL),
('001', 26, 5, 1, '2015-05-28 11:03:04', '17.00', '3.06', '20.06', '1', NULL),
('001', 27, 18, 1, '2015-05-28 11:08:57', '2.00', '0.36', '2.36', '1', NULL),
('001', 28, 13, 1, '2015-05-28 11:09:54', '9.00', '1.62', '10.62', '1', NULL),
('001', 29, 13, 2, '2015-05-29 02:28:09', '218.00', '39.24', '257.24', '1', NULL),
('001', 30, 5, 1, '2015-05-30 03:12:31', '150.00', '27.00', '177.00', '1', NULL),
('001', 31, 5, 1, '2015-05-30 03:14:51', '220.00', '39.60', '259.60', '1', NULL),
('001', 32, 26, 1, '2015-06-09 11:22:42', '50.00', '9.00', '59.00', '1', NULL),
('001', 33, 29, 1, '2015-06-09 11:26:53', '50.00', '9.00', '59.00', '1', NULL),
('001', 34, 27, 1, '2015-06-10 11:06:08', '18.00', '3.24', '21.24', '1', NULL),
('001', 35, 29, 1, '2015-06-11 11:50:55', '20.00', '3.60', '23.60', '1', NULL),
('001', 36, 18, 1, '2015-06-11 12:06:41', '55.00', '9.90', '64.90', '1', NULL),
('001', 37, 5, 1, '2015-06-13 02:07:39', '14.00', '2.52', '16.52', '1', NULL),
('001', 38, 27, 1, '2015-06-17 07:23:13', '543.40', '97.81', '641.21', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
`idMovimiento` int(10) unsigned NOT NULL,
  `tipo_documento` char(1) DEFAULT NULL,
  `serie` char(3) DEFAULT NULL,
  `nro_documento` int(10) unsigned DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` char(1) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(10) unsigned DEFAULT NULL,
  `valor_unitario` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idMovimiento`, `tipo_documento`, `serie`, `nro_documento`, `fecha`, `tipo`, `idproducto`, `cantidad`, `valor_unitario`, `total`) VALUES
(1, '1', '001', 1, '2015-05-21 04:12:55', 'S', 1, 20, '2.00', '40.00'),
(2, '1', '001', 1, '2015-05-21 04:12:56', 'S', 30, 5, '1.50', '7.50'),
(3, '1', '001', 1, '2015-05-21 04:12:56', 'S', 34, 1, '1.50', '1.50'),
(4, '1', '001', 2, '2015-05-21 04:13:40', 'S', 2, 10, '5.00', '50.00'),
(5, '2', '001', 1, '2015-05-21 04:14:36', 'E', 2, 20, '5.00', '100.00'),
(6, '2', '001', 2, '2015-05-22 09:48:50', 'E', 1, 5, '2.00', '10.00'),
(7, '2', '001', 2, '2015-05-22 09:48:50', 'E', 2, 6, '5.00', '30.00'),
(8, '1', '001', 3, '2015-05-22 09:49:30', 'S', 1, 11, '2.00', '22.00'),
(9, '1', '001', 3, '2015-05-22 09:49:30', 'S', 3, 111, '3.00', '333.00'),
(10, '1', '001', 5, '2015-05-22 10:35:13', 'S', 2, 5, '5.00', '25.00'),
(11, '1', '001', 5, '2015-05-22 10:35:13', 'S', 6, 5, '2.00', '10.00'),
(12, '2', '001', 3, '2015-05-22 10:36:13', 'E', 3, 10, '3.00', '30.00'),
(13, '2', '001', 3, '2015-05-22 10:36:13', 'E', 14, 5, '1.50', '7.50'),
(15, '1', '001', 6, '2015-05-22 11:14:29', 'S', 15, 14, '3.00', '42.00'),
(16, '1', '001', 6, '2015-05-22 11:14:29', 'S', 4, 7, '1.50', '10.50'),
(17, '2', '001', 4, '2015-05-25 11:51:08', 'E', 1, 100, '2.00', '200.00'),
(18, '2', '001', 4, '2015-05-25 11:51:08', 'E', 20, 50, '5.00', '250.00'),
(19, '2', '001', 4, '2015-05-25 11:51:08', 'E', 32, 15, '5.00', '75.00'),
(20, '2', '001', 5, '2015-05-25 13:35:04', 'E', 2, 5, '5.00', '25.00'),
(21, '2', '001', 6, '2015-05-25 13:35:25', 'E', 4, 5, '1.50', '7.50'),
(22, '2', '001', 6, '2015-05-25 13:35:25', 'E', 3, 4, '3.00', '12.00'),
(23, '2', '001', 7, '2015-05-25 14:22:00', 'E', 8, 10, '5.00', '50.00'),
(24, '2', '001', 7, '2015-05-25 14:22:00', 'E', 15, 25, '3.00', '75.00'),
(25, '2', '001', 8, '2015-05-26 00:20:29', 'E', 2, 6, '5.00', '30.00'),
(26, '2', '001', 8, '2015-05-26 00:20:31', 'E', 12, 6, '5.00', '30.00'),
(27, '2', '001', 8, '2015-05-26 00:20:31', 'E', 32, 8, '5.00', '40.00'),
(28, '2', '001', 9, '2015-05-26 00:28:43', 'E', 22, 10, '1.50', '15.00'),
(29, '2', '001', 9, '2015-05-26 00:28:43', 'E', 20, 5, '5.00', '25.00'),
(30, '2', '001', 10, '2015-05-26 00:55:01', 'E', 4, 4, '1.50', '6.00'),
(31, '2', '001', 10, '2015-05-26 00:55:01', 'E', 7, 5, '2.00', '10.00'),
(32, '2', '001', 10, '2015-05-26 00:55:02', 'E', 29, 5, '3.00', '15.00'),
(33, '2', '001', 11, '2015-05-26 01:07:11', 'E', 20, 8, '5.00', '40.00'),
(34, '2', '001', 11, '2015-05-26 01:07:11', 'E', 17, 6, '3.00', '18.00'),
(35, '2', '001', 12, '2015-05-26 01:26:36', 'E', 4, 10, '1.50', '15.00'),
(36, '2', '001', 12, '2015-05-26 01:26:36', 'E', 17, 5, '3.00', '15.00'),
(37, '2', '001', 12, '2015-05-26 01:26:36', 'E', 13, 3, '3.00', '9.00'),
(38, '2', '001', 13, '2015-05-26 01:29:34', 'E', 17, 10, '3.00', '30.00'),
(39, '2', '001', 13, '2015-05-26 01:29:34', 'E', 22, 5, '1.50', '7.50'),
(40, '1', '001', 8, '2015-05-26 02:57:01', 'S', 2, 6, '5.00', '30.00'),
(41, '1', '001', 8, '2015-05-26 02:57:01', 'S', 3, 3, '3.00', '9.00'),
(42, '1', '001', 10, '2015-05-26 03:00:02', 'S', 1, 1, '2.00', '2.00'),
(43, '1', '001', 11, '2015-05-26 03:08:08', 'S', 1, 1, '2.00', '2.00'),
(44, '1', '001', 11, '2015-05-26 03:08:09', 'S', 6, 1, '2.00', '2.00'),
(45, '1', '001', 11, '2015-05-26 03:08:09', 'S', 7, 1, '2.00', '2.00'),
(46, '2', '001', 14, '2015-05-26 03:17:48', 'E', 4, 8, '1.50', '12.00'),
(47, '2', '001', 14, '2015-05-26 03:17:48', 'E', 7, 10, '2.00', '20.00'),
(48, '1', '001', 12, '2015-05-26 03:18:07', 'S', 1, 1, '2.00', '2.00'),
(49, '1', '001', 12, '2015-05-26 03:18:07', 'S', 2, 1, '5.00', '5.00'),
(50, '1', '001', 12, '2015-05-26 03:18:07', 'S', 4, 1, '1.50', '1.50'),
(51, '1', '001', 13, '2015-05-26 11:58:25', 'S', 1, 3, '2.00', '6.00'),
(52, '1', '001', 13, '2015-05-26 11:58:26', 'S', 2, 2, '5.00', '10.00'),
(53, '1', '001', 14, '2015-05-26 11:59:55', 'S', 1, 3, '2.00', '6.00'),
(54, '1', '001', 14, '2015-05-26 11:59:55', 'S', 3, 2, '3.00', '6.00'),
(55, '1', '001', 15, '2015-05-26 12:00:45', 'S', 15, 2, '3.00', '6.00'),
(56, '1', '001', 15, '2015-05-26 12:00:45', 'S', 16, 2, '5.00', '10.00'),
(57, '2', '001', 15, '2015-05-26 12:09:09', 'E', 2, 4, '5.00', '20.00'),
(58, '2', '001', 15, '2015-05-26 12:09:09', 'E', 5, 3, '2.00', '6.00'),
(59, '2', '001', 16, '2015-05-26 12:09:56', 'E', 4, 4, '1.50', '6.00'),
(60, '2', '001', 16, '2015-05-26 12:09:56', 'E', 7, 3, '2.00', '6.00'),
(61, '2', '001', 17, '2015-05-26 12:10:38', 'E', 7, 2, '2.00', '4.00'),
(62, '1', '001', 16, '2015-05-27 02:55:25', 'S', 1, 10, '2.00', '20.00'),
(63, '1', '001', 16, '2015-05-27 02:55:26', 'S', 2, 3, '5.00', '15.00'),
(64, '1', '001', 17, '2015-05-27 02:56:17', 'S', 1, 4, '2.00', '8.00'),
(65, '1', '001', 18, '2015-05-27 03:01:00', 'S', 2, 3, '5.00', '15.00'),
(66, '2', '001', 19, '2015-05-27 03:10:36', 'E', 33, 4, '3.00', '12.00'),
(67, '3', '001', 1, '2015-05-28 03:55:04', 'S', 3, 3, '3.00', '9.00'),
(68, '3', '001', 2, '2015-05-28 04:01:35', 'S', 4, 3, '1.50', '4.50'),
(69, '3', '001', 2, '2015-05-28 04:01:35', 'S', 3, 2, '3.00', '6.00'),
(70, '1', '001', 19, '2015-05-28 06:34:00', 'S', 6, 19, '2.00', '38.00'),
(71, '1', '001', 19, '2015-05-28 06:34:00', 'S', 13, 5, '3.00', '15.00'),
(72, '2', '001', 20, '2015-05-28 06:35:01', 'E', 7, 10, '2.00', '20.00'),
(73, '2', '001', 20, '2015-05-28 06:35:01', 'E', 20, 3, '5.00', '15.00'),
(74, '1', '001', 20, '2015-05-28 08:11:51', 'S', 1, 7, '2.00', '14.00'),
(75, '1', '001', 20, '2015-05-28 08:11:51', 'S', 7, 4, '2.00', '8.00'),
(76, '1', '001', 21, '2015-05-28 08:12:22', 'S', 2, 6, '5.00', '30.00'),
(77, '1', '001', 22, '2015-05-28 08:16:47', 'S', 1, 4, '2.00', '8.00'),
(78, '1', '001', 22, '2015-05-28 08:16:47', 'S', 5, 3, '2.00', '6.00'),
(79, '2', '001', 21, '2015-05-28 08:19:56', 'E', 33, 6, '3.00', '18.00'),
(80, '1', '001', 23, '2015-05-28 08:22:31', 'S', 39, 10, '3.50', '35.00'),
(81, '1', '001', 24, '2015-05-28 08:26:20', 'S', 3, 3, '3.00', '9.00'),
(82, '1', '001', 24, '2015-05-28 08:26:20', 'S', 13, 4, '3.00', '12.00'),
(83, '1', '001', 24, '2015-05-28 08:26:20', 'S', 4, 3, '1.50', '4.50'),
(84, '1', '001', 25, '2015-05-28 10:54:20', 'S', 3, 3, '3.00', '9.00'),
(85, '1', '001', 25, '2015-05-28 10:54:20', 'S', 9, 3, '3.00', '9.00'),
(86, '1', '001', 26, '2015-05-28 11:03:04', 'S', 7, 4, '2.00', '8.00'),
(87, '1', '001', 26, '2015-05-28 11:03:04', 'S', 9, 3, '3.00', '9.00'),
(88, '1', '001', 28, '2015-05-28 11:09:54', 'S', 3, 3, '3.00', '9.00'),
(89, '1', '001', 29, '2015-05-29 02:28:10', 'S', 1, 4, '2.00', '8.00'),
(90, '1', '001', 29, '2015-05-29 02:28:10', 'S', 4, 140, '1.50', '210.00'),
(91, '1', '001', 30, '2015-05-30 03:12:31', 'S', 2, 30, '5.00', '150.00'),
(92, '1', '001', 31, '2015-05-30 03:14:52', 'S', 8, 44, '5.00', '220.00'),
(93, '2', '001', 22, '2015-05-30 03:16:43', 'E', 39, 15, '3.50', '52.50'),
(94, '2', '001', 23, '2015-05-30 03:17:52', 'E', 2, 6, '5.00', '30.00'),
(95, '2', '001', 24, '2015-05-30 03:20:25', 'E', 16, 4, '5.00', '20.00'),
(96, '2', '001', 25, '2015-05-30 03:21:33', 'E', 33, 2, '3.00', '6.00'),
(97, '2', '001', 26, '2015-06-09 11:22:14', 'E', 39, 3, '3.50', '10.50'),
(98, '1', '001', 32, '2015-06-09 11:22:42', 'S', 2, 6, '5.00', '30.00'),
(99, '1', '001', 32, '2015-06-09 11:22:42', 'S', 12, 4, '5.00', '20.00'),
(100, '1', '001', 33, '2015-06-09 11:26:53', 'S', 1, 16, '2.00', '32.00'),
(101, '1', '001', 33, '2015-06-09 11:26:53', 'S', 7, 9, '2.00', '18.00'),
(102, '1', '001', 34, '2015-06-10 11:06:08', 'S', 1, 4, '2.00', '8.00'),
(103, '1', '001', 34, '2015-06-10 11:06:08', 'S', 6, 5, '2.00', '10.00'),
(104, '1', '001', 35, '2015-06-11 11:50:56', 'S', 1, 4, '2.00', '8.00'),
(105, '1', '001', 35, '2015-06-11 11:50:56', 'S', 9, 4, '3.00', '12.00'),
(106, '1', '001', 36, '2015-06-11 12:06:42', 'S', 12, 8, '5.00', '40.00'),
(107, '1', '001', 36, '2015-06-11 12:06:42', 'S', 20, 3, '5.00', '15.00'),
(108, '1', '001', 37, '2015-06-13 02:07:39', 'S', 1, 4, '2.00', '8.00'),
(109, '1', '001', 37, '2015-06-13 02:07:39', 'S', 11, 3, '2.00', '6.00'),
(110, '2', '001', 27, '2015-06-13 02:18:07', 'E', 33, 4, '3.00', '12.00'),
(111, '2', '001', 28, '2015-06-14 13:03:06', 'E', 33, 4, '3.00', '12.00'),
(112, '2', '001', 29, '2015-06-14 13:05:14', 'E', 1, 101, '2.00', '202.00'),
(113, '1', '001', 38, '2015-06-17 07:23:14', 'S', 1, 128, '2.00', '256.00'),
(114, '1', '001', 38, '2015-06-17 07:23:14', 'S', 15, 29, '3.00', '87.00'),
(115, '1', '001', 38, '2015-06-17 07:23:14', 'S', 24, 30, '5.00', '150.00'),
(116, '1', '001', 38, '2015-06-17 07:23:14', 'S', 38, 24, '2.10', '50.40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`idMarca` int(11) NOT NULL,
  `nomMarca` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nomMarca`) VALUES
(5, 'Coca Cola'),
(4, 'Donofrio'),
(1, 'Gloria'),
(9, 'Inka Kola'),
(3, 'Karinto'),
(10, 'Lavaghi'),
(2, 'Nestle'),
(6, 'Pura Vida'),
(7, 'San Luis'),
(8, 'Soda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordencompra`
--

CREATE TABLE IF NOT EXISTS `ordencompra` (
  `nroSerie` char(3) NOT NULL,
  `nroOrden` int(10) unsigned NOT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `FechaOrden` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subTotal` decimal(8,2) DEFAULT NULL,
  `IGV` decimal(8,2) DEFAULT NULL,
  `Total` decimal(8,2) DEFAULT NULL,
  `estadoOrden` char(1) DEFAULT '1',
  `fechaElim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordencompra`
--

INSERT INTO `ordencompra` (`nroSerie`, `nroOrden`, `idProveedor`, `idEmpleado`, `FechaOrden`, `subTotal`, `IGV`, `Total`, `estadoOrden`, `fechaElim`) VALUES
('001', 1, 3, 1, '2015-05-21 04:14:35', '100.00', '18.00', '118.00', '1', NULL),
('001', 2, 3, 1, '2015-05-22 09:48:49', '40.00', '7.20', '47.20', '1', NULL),
('001', 3, 3, 1, '2015-05-22 10:36:13', '37.50', '6.75', '44.25', '1', NULL),
('001', 4, 9, 1, '2015-05-25 11:51:08', '525.00', '94.50', '619.50', '1', NULL),
('001', 5, 3, 1, '2015-05-25 13:35:03', '25.00', '4.50', '29.50', '1', NULL),
('001', 6, NULL, 1, '2015-05-25 13:35:25', '19.50', '3.51', '23.01', '1', NULL),
('001', 7, 1, 1, '2015-05-25 14:21:58', '125.00', '22.50', '147.50', '1', NULL),
('001', 8, 1, 1, '2015-05-26 00:20:28', '100.00', '18.00', '118.00', '1', NULL),
('001', 9, 1, 1, '2015-05-26 00:28:43', '40.00', '7.20', '47.20', '1', NULL),
('001', 10, 1, 1, '2015-05-26 00:55:01', '31.00', '5.58', '36.58', '1', NULL),
('001', 11, 5, 1, '2015-05-26 01:06:45', '0.00', '0.00', '0.00', '1', NULL),
('001', 12, 1, 1, '2015-05-26 01:26:36', '39.00', '7.02', '46.02', '1', NULL),
('001', 13, 1, 1, '2015-05-26 01:29:34', '37.50', '6.75', '44.25', '1', NULL),
('001', 14, 1, 1, '2015-05-26 03:17:48', '32.00', '5.76', '37.76', '1', NULL),
('001', 15, 1, 1, '2015-05-26 12:09:09', '26.00', '4.68', '30.68', '1', NULL),
('001', 16, 1, NULL, '2015-05-26 12:09:55', '12.00', '2.16', '14.16', '1', NULL),
('001', 17, 1, 1, '2015-05-26 12:10:37', '4.00', '0.72', '4.72', '1', NULL),
('001', 18, NULL, 1, '2015-05-27 03:03:01', '0.00', '0.00', '0.00', '1', NULL),
('001', 19, 24, 1, '2015-05-27 03:10:36', '12.00', '2.16', '14.16', '1', NULL),
('001', 20, 1, 1, '2015-05-28 06:35:01', '35.00', '6.30', '41.30', '1', NULL),
('001', 21, 24, 1, '2015-05-28 08:19:56', '18.00', '3.24', '21.24', '1', NULL),
('001', 22, 44, 1, '2015-05-30 03:16:43', '52.50', '9.45', '61.95', '1', NULL),
('001', 23, 1, 1, '2015-05-30 03:17:51', '30.00', '5.40', '35.40', '1', NULL),
('001', 24, 25, 1, '2015-05-30 03:20:25', '20.00', '3.60', '23.60', '1', NULL),
('001', 25, 24, 1, '2015-05-30 03:21:33', '6.00', '1.08', '7.08', '1', NULL),
('001', 26, 44, 1, '2015-06-09 11:22:13', '10.50', '1.89', '12.39', '1', NULL),
('001', 27, 24, 1, '2015-06-13 02:18:07', '12.00', '2.16', '14.16', '1', NULL),
('001', 28, 24, 1, '2015-06-14 13:03:06', '12.00', '2.16', '14.16', '1', NULL),
('001', 29, 9, 1, '2015-06-14 13:05:14', '202.00', '36.36', '238.36', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrogeneral`
--

CREATE TABLE IF NOT EXISTS `parametrogeneral` (
`idParametro` int(10) unsigned NOT NULL,
  `desc_Param` varchar(150) NOT NULL,
  `valor_Param` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametrogeneral`
--

INSERT INTO `parametrogeneral` (`idParametro`, `desc_Param`, `valor_Param`) VALUES
(1, 'IGV', '0.18'),
(2, 'Tipo de Cambio', '3.10'),
(3, 'Serie Factura', '001'),
(4, 'Serie Orden de Compra', '001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`idProducto` int(11) NOT NULL,
  `desc_Prod` varchar(100) NOT NULL,
  `presentacion` varchar(20) NOT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `tipoProd` char(1) NOT NULL DEFAULT '1',
  `stock` int(11) NOT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estadoProd` char(1) NOT NULL DEFAULT '1',
  `Precio` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `desc_Prod`, `presentacion`, `idProveedor`, `tipoProd`, `stock`, `idMarca`, `idCategoria`, `fecha_creacion`, `estadoProd`, `Precio`) VALUES
(1, 'Leche Gloria', 'Lata', 9, '0', 7, 1, 4, '2015-05-07 11:34:02', '1', '2.00'),
(2, 'Aceite de Olivo', 'Botella', 1, '1', 0, 3, 5, '2015-05-08 03:25:31', '0', '5.00'),
(3, 'Cereales', 'bolsa', 34, '1', 0, 8, 8, '2015-05-08 03:25:31', '1', '3.00'),
(4, 'Leche Soy Vida', 'lata', 1, '1', 0, 4, 4, '2015-05-08 03:27:31', '1', '1.50'),
(5, 'Leche Gloria', 'Lata', 1, '0', 0, 1, 4, '2015-05-17 09:35:59', '1', '2.00'),
(6, 'te', 'CAJA', 28, '0', 0, 1, 4, '2015-05-17 09:47:16', '1', '2.00'),
(7, 'Leche Gloria', 'Lata', 1, '1', 57, 1, 4, '2015-05-17 09:48:36', '1', '2.00'),
(8, 'Aceite Friol', 'Botella', 1, '1', 0, 3, 5, '2015-05-17 09:48:36', '0', '5.00'),
(9, 'Cereales', 'bolsa', 21, '1', 84, 8, 8, '2015-05-17 09:48:37', '1', '3.00'),
(10, 'Leche Soy Vida', 'lata', 1, '1', 0, 4, 4, '2015-05-17 09:48:37', '1', '1.50'),
(11, 'Leche Gloria', 'Lata', 1, '0', 42, 1, 4, '2015-05-17 09:49:11', '1', '2.00'),
(12, 'Aceite Friol', 'Botella', 1, '1', 30, 9, 5, '2015-05-17 09:49:11', '0', '5.00'),
(13, 'Cereales', 'bolsa', 1, '1', 98, 8, 8, '2015-05-17 09:49:12', '1', '3.00'),
(14, 'Leche Soy Vida', 'lata', 1, '1', 155, 4, 4, '2015-05-17 09:49:12', '1', '1.50'),
(15, 'Inca Kola 1Litro', 'Botella', 1, '0', 24, 9, 5, '2015-05-17 09:49:12', '1', '3.00'),
(16, 'Cerveza Klosterbier Rhönbräu', 'Botella', 25, '1', 38, 3, 5, '2015-05-17 09:49:12', '1', '5.00'),
(17, 'Licor Cloudberry', 'Botella', 1, '1', 115, 8, 8, '2015-05-17 09:49:12', '1', '3.00'),
(18, 'caviar rojo', 'Botella', 14, '1', 142, 4, 5, '2015-05-17 09:49:12', '1', '1.50'),
(19, 'Cerveza Outback', 'Lata', 2, '0', 23, 1, 5, '2015-05-17 09:49:12', '1', '2.00'),
(20, 'Chocolate blanco', 'Botella', 1, '1', 63, 3, 7, '2015-05-17 09:49:12', '1', '5.00'),
(21, 'Empanada de carne', 'bolsa', 1, '1', 82, 8, 6, '2015-05-17 09:49:12', '1', '3.00'),
(22, 'Sublime', 'bolsa', 1, '1', 159, 4, 7, '2015-05-17 09:49:12', '1', '1.50'),
(23, 'Leche condensada', 'Lata', 6, '0', 33, 1, 7, '2015-05-17 09:49:12', '1', '2.00'),
(24, 'oreo', 'bolsa', 1, '1', 0, 3, 2, '2015-05-17 09:49:12', '1', '5.00'),
(25, 'charada', 'bolsa', 16, '1', 94, 8, 2, '2015-05-17 09:49:12', '1', '3.00'),
(26, 'papa lays', 'lata', 1, '1', 144, 4, 6, '2015-05-17 09:49:12', '1', '1.50'),
(27, 'piqueo', 'Lata', 1, '0', 45, 1, 6, '2015-05-17 09:49:12', '1', '2.00'),
(28, 'pezidury', 'Botella', 1, '1', 36, 3, 1, '2015-05-17 09:49:12', '1', '5.00'),
(29, 'sevix', 'bolsa', 1, '1', 109, 8, 3, '2015-05-17 09:49:12', '1', '3.00'),
(30, 'Milo', 'lata', 1, '1', 139, 4, 4, '2015-05-17 09:49:12', '1', '1.50'),
(31, 'don victorio', 'bolsa', 1, '0', 45, 1, 9, '2015-05-17 09:49:12', '1', '2.00'),
(32, 'fideo anita', 'bolsa', 1, '1', 23, 3, 9, '2015-05-17 09:49:12', '1', '5.00'),
(33, 'Cifrut', 'Botella', 24, '1', 104, 8, 5, '2015-05-17 09:49:12', '1', '3.00'),
(34, 'Coca Cola', 'Botella', 45, '1', 139, 4, 5, '2015-05-17 09:49:12', '1', '1.50'),
(35, 'platano', 'Lata', 1, '0', 45, 1, 8, '2015-05-17 09:49:12', '1', '2.00'),
(36, 'pera', 'Botella', 1, '1', 36, 3, 8, '2015-05-17 09:49:12', '1', '5.00'),
(37, 'fresa', 'bolsa', 1, '1', 94, 8, 8, '2015-05-17 09:49:12', '1', '3.00'),
(38, 'Salsa roja', 'bolsa', 1, '1', 76, 10, 9, '2015-05-25 11:44:00', '1', '2.10'),
(39, 'Harina de Pescado', 'sacos', 44, '0', 18, 6, 5, '2015-05-28 08:21:48', '1', '3.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`idProveedor` int(11) NOT NULL,
  `RazSoc_Prov` varchar(250) NOT NULL,
  `tipoPersona_Prov` char(1) NOT NULL,
  `ruc_Prov` char(11) NOT NULL,
  `direccion_Prov` varchar(150) NOT NULL,
  `telefono_Prov` char(9) NOT NULL,
  `email_Prov` varchar(50) DEFAULT NULL,
  `fec_reg_Prov` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_Prov` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `RazSoc_Prov`, `tipoPersona_Prov`, `ruc_Prov`, `direccion_Prov`, `telefono_Prov`, `email_Prov`, `fec_reg_Prov`, `estado_Prov`) VALUES
(1, 'LAVAGUI E.I.R.L.', '1', '10492988627', 'Av Arequipa #790', '956859256', 'aldra@hotmail.com', '2015-05-07 11:40:27', '1'),
(2, 'DONOFRIO E.I.R.L.', '1', '10492988627', 'Av Arequipa #790', '956859256', 'aldra@hotmail.com', '2015-05-17 08:04:03', '1'),
(3, 'D''MATOS SAC S.A.', '1', '20684782668', 'Av Peru #870', '996559856', 'dmastos@hotmail.com', '2015-05-17 08:04:04', '1'),
(4, 'NESTLE S.A.', '1', '20658235263', 'Av SanJuan #960', '958925956', 'transrowi@hotmail.com', '2015-05-17 08:04:04', '1'),
(5, 'ALICORP S.A.', '1', '20278157284', 'Avenida Argentina, 4793', '985674282', 'alicorp@hotmail.com', '2015-05-17 08:04:04', '1'),
(6, 'GRUPO JIMENEZ E.I.R.L.', '1', '10698752469', 'Calle Garcilaso de la Vega, 12', '992687963', 'grupojimenez@hotmail.com', '2015-05-17 08:04:04', '1'),
(7, 'Austral Group S.A', '1', '20202020202', 'Av. Victor Andres Belaunde, San Isidro', '7107000', 'australgroup@hotmail.com', '2015-05-17 08:04:04', '1'),
(8, 'PANTENE S.A', '1', '20521471552', 'Av. 28 de Julio, Lima', '3215468', 'petroperu@hotmail.com', '2015-05-17 08:04:04', '1'),
(9, 'GLORIA S.A', '1', '20874112522', 'Av. Bolivar, Pueblo Libre', '2541022', 'mifarma@hotmail.com', '2015-05-17 08:04:04', '1'),
(10, 'PURINA S.A', '1', '20474555525', 'Av. Antonio de Sucre 693, Pueblo Libre', '5857474', 'movistar@hotmail.com', '2015-05-17 08:04:04', '1'),
(11, 'ANDINA GOURMET S.A', '1', '20412521414', 'Av. Antonio de Sucre 900, San juan', '2020255', 'entel@hotmail.com', '2015-05-17 08:04:04', '1'),
(12, 'ComCenter S.A', '1', '20254014140', 'Av. Arequipa 5280, Miraflores', '6669854', 'comcenter@hotmail.com', '2015-05-17 08:04:04', '1'),
(13, 'Ambev Peru S.A', '1', '20874101410', 'Av. Tarapaca, Lurigancho', '5241410', 'ambevperu@hotmail.com', '2015-05-17 08:04:04', '1'),
(14, 'Cosapi S.A', '1', '20255587401', 'Av. Salaverry, Miraflores', '3555841', 'cosapi@hotmail.com', '2015-05-17 08:04:04', '1'),
(15, 'PANIMAR S.A', '1', '20410002511', 'Av. La marina 2000, San Miguel', '2414000', 'luzdelsur@hotmail.com', '2015-05-17 08:04:04', '1'),
(16, 'IRMITA S.A', '1', '20870411410', 'Av. Arequipa 6980, Miraflores', '2587410', 'electroperu@hotmail.com', '2015-05-17 08:04:04', '1'),
(17, 'D´CARMEN S.A', '1', '20401455251', 'Av. Canada, Lince', '3655005', 'quimicasuiza@hotmail.com', '2015-05-17 08:04:04', '1'),
(18, 'CHIFLES OLA S.A', '1', '20655520011', 'Av. Canada,  San Borja', '5541241', 'clinicainternacional@hotmail.com', '2015-05-17 08:04:04', '1'),
(19, 'MESAJIL S.A', '1', '20414014141', 'Av. Javier Prado, Miraflores ', '2541411', 'credicorp@hotmail.com', '2015-05-17 08:04:04', '1'),
(20, 'ARMIJO E.I.R.L.', '1', '10052410141', 'Av. Arequipa 5698, Miraflores', '1474147', 'mibanco@hotmail.com', '2015-05-17 08:04:04', '1'),
(21, 'LAGUNAS E.I.R.L.', '1', '10700000251', 'Av. Salaverry, Miraflores 5978', '2510141', 'credifast@hotmail.com', '2015-05-17 08:04:04', '1'),
(22, 'DIFESA S.A', '1', '20700255021', 'Av. Javier Prado, Miraflores ', '2651410', 'nacionbank@hotmail.com', '2015-05-17 08:04:04', '1'),
(23, 'Shopping Word S.A', '1', '20700010114', 'Av. Canada, Lince 3658', '2587414', 'shoppingword@hotmail.com', '2015-05-17 08:04:04', '1'),
(24, 'Aceros Arequipa S.A', '1', '20444777741', 'Av. salaverry 8569, Miraflores', '1444772', 'acerosarequipa@hotmail.com', '2015-05-17 08:04:04', '0'),
(25, 'INTERLOON E.I.R.L.', '1', '10477788853', 'Av. La marina 7800, San Miguel', '1444222', 'topytop@hotmail.com', '2015-05-17 08:04:04', '1'),
(26, 'Mi Tienda S.A', '1', '20777444111', 'Av. Canada, Lince 8975, San Miguel', '8887741', 'mitienda@hotmail.com', '2015-05-17 08:04:04', '1'),
(27, 'Baby Happy E.I.R.L.', '1', '10656985411', 'Av. La marina 9423, San Miguel', '4777412', 'babyhappu@hotmail.com', '2015-05-17 08:04:04', '1'),
(28, 'ALPROSA S.A', '1', '20785000251', 'Av. Salaverry, Miraflores 3568', '8741256', 'zapatillasword@hotmail.com', '2015-05-17 08:04:04', '1'),
(29, 'San Fernando S.A', '1', '20100154308', 'Av. Caminos del Inca 1012, Surco', '994193000', 'sanfernando@hotmail.com', '2015-05-17 08:04:04', '1'),
(30, 'Laive S.A', '1', '20100095450', 'Av. Nicolas De Piérola, Ate Vitarte', '996187600', 'laive@hotmail.com', '2015-05-17 08:04:04', '1'),
(31, 'LATINO ANDINA S.A.', '1', '20100041953', 'Av. Paseo de la República 3505, San Isidro', '994111000', 'rimacseguros@hotmail.com', '2015-05-17 08:04:04', '1'),
(32, 'LECHE BONLE S.A', '1', '20100035392', 'Av. Juan de Arona 830, San isidro', '985135000', 'pacificoseguros@hotmail.com', '2015-05-17 08:04:04', '1'),
(33, 'Saga Falabella S.A', '1', '20100128056', 'Av. Arequipa 5280, Miraflores', '982037070', 'sagafalabella@hotmail.com', '2015-05-17 08:04:04', '1'),
(34, 'DISTRIBUIDORA STA.LUCIA E.I.R.L.', '1', '10269985900', 'Av. Antonio de Sucre 693, Pueblo Libre', '995612001', 'eldernor@hotmail.com', '2015-05-17 08:04:04', '1'),
(35, 'LA LEÑA S.A', '1', '20337564373', 'Av. La marina 2000, San Miguel', '995663569', 'riplay@hotmail.com', '2015-05-17 08:04:05', '1'),
(36, 'Wong E.I.R.L.', '1', '10333541541', 'Av. La marina 2000, San Miguel', '982514255', 'wong@hotmail.com', '2015-05-17 08:04:05', '1'),
(37, 'Metro S.a', '1', '20202020202', 'Av. Antonio de Sucre 693, Pueblo Libre', '992121212', 'metro@hotmail.com', '2015-05-17 08:04:05', '1'),
(38, 'The House E.I.R.L.', '1', '10212500201', 'Av. Salaverry, Miraflores', '992425254', 'house@hotmail.com', '2015-05-17 08:04:05', '1'),
(39, 'Taxis Fast S.A', '1', '20212500201', 'Av. Arequipa 5280, Miraflores', '994246465', 'taxifast@hotmail.com', '2015-05-17 08:04:05', '1'),
(40, 'Oechsle S.A', '1', '20788545100', 'Av. Wilson 3250', '981414155', 'oechsle@hotmail.com', '2015-05-17 08:04:05', '1'),
(41, 'PesAtun E.I.R.L.', '1', '10758855558', 'Av. Juan de Arona 920, San Isidro', '995464748', 'pesatun@hotmail.com', '2015-05-17 08:04:05', '1'),
(42, 'ARROS Word S.A', '1', '20544411400', 'Av. Salaverry, Miraflores', '984145888', 'autoword@hotmail.com', '2015-05-17 08:04:05', '1'),
(43, 'GPAE S.A', '1', '20454225525', 'Av. Larco Mar , Mirafloes', '998562025', 'citibank@hotmail.com', '2015-05-17 08:04:05', '1'),
(44, 'ADECCO E.I.R.L.', '1', '10587774410', 'Av. Salaverry, Miraflores', '992323666', 'segurimax@hotmail.com', '2015-05-17 08:04:05', '1'),
(45, 'GRUPO PAES S.A', '1', '20569555550', 'Urb. Santa Catalina, La victoria', '992134000', 'cpeinka@hotmail.com', '2015-05-17 08:04:05', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sispersona`
--

CREATE TABLE IF NOT EXISTS `sispersona` (
`ide_persona` int(10) unsigned NOT NULL,
  `des_nombres` varchar(250) DEFAULT NULL,
  `des_apepat` varchar(250) DEFAULT NULL,
  `des_apemat` varchar(250) DEFAULT NULL,
  `nro_documento` varchar(20) NOT NULL,
  `des_telefono` char(9) DEFAULT NULL,
  `des_correo` varchar(45) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `ide_estcivil` char(1) DEFAULT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `Sueldo` decimal(10,2) NOT NULL,
  `ide_estado` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sispersona`
--

INSERT INTO `sispersona` (`ide_persona`, `des_nombres`, `des_apepat`, `des_apemat`, `nro_documento`, `des_telefono`, `des_correo`, `sexo`, `ide_estcivil`, `fec_nacimiento`, `Sueldo`, `ide_estado`) VALUES
(1, 'Jose Luis', 'Ayala', 'Benito', '71886624', '972620265', 'luisayala@hotmail.com', 'M', '1', '1987-06-03', '1000.00', '0'),
(15, 'Cesar', 'Rojas', 'Perez', '12345689', '944659233', 'cesarrojas@gmail.com', 'M', '1', '1994-05-07', '1000.00', '0'),
(16, 'Cristian', 'Contreras', 'Contreras', '26598745', '222222222', 'cristian@sismima.com', 'M', '2', '1992-10-16', '3000.00', '0'),
(25, 'Carlos', 'More', 'Valle', '45564666', '154646555', 'carlosmore@gmail.com', 'M', '1', '2000-11-10', '1500.00', '0'),
(26, 'Freddy', 'Rengifo', 'Rengifo', '12365789', '123569858', 'freddy@gmail.com', 'M', '1', '1994-05-27', '1000.00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisusuario`
--

CREATE TABLE IF NOT EXISTS `sisusuario` (
`ide_usuario` int(10) unsigned NOT NULL,
  `des_usuario` varchar(50) NOT NULL,
  `des_password` varchar(50) NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL,
  `ide_persona` int(10) unsigned NOT NULL,
  `correo` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sisusuario`
--

INSERT INTO `sisusuario` (`ide_usuario`, `des_usuario`, `des_password`, `ide_rol`, `ide_persona`, `correo`, `estado`) VALUES
(1, 'joseluis', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'luisayala@hotmail.com', '1'),
(2, 'cesarrojas', 'e10adc3949ba59abbe56e057f20f883e', 5, 15, 'cesarrojas@gmail.com', '1'),
(3, 'cristian', 'b08c8c585b6d67164c163767076445d6', 2, 16, 'cristian@sismima.com', '1'),
(4, 'carlosmore', 'e10adc3949ba59abbe56e057f20f883e', 4, 25, 'carlosmore@gmail.com', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admcatalogo`
--
ALTER TABLE `admcatalogo`
 ADD PRIMARY KEY (`ide_elemento`);

--
-- Indices de la tabla `admgrcatalogo`
--
ALTER TABLE `admgrcatalogo`
 ADD PRIMARY KEY (`ide_grupo`);

--
-- Indices de la tabla `admopcion`
--
ALTER TABLE `admopcion`
 ADD PRIMARY KEY (`ide_opcion`);

--
-- Indices de la tabla `admrol`
--
ALTER TABLE `admrol`
 ADD PRIMARY KEY (`ide_rol`);

--
-- Indices de la tabla `admrolopcion`
--
ALTER TABLE `admrolopcion`
 ADD PRIMARY KEY (`ide_rolopcion`);

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
 ADD PRIMARY KEY (`nroSerie`,`nroBol`), ADD KEY `fk_Bol_Cli` (`idCliente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`idCategoria`), ADD UNIQUE KEY `nomCategoria` (`nomCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
 ADD KEY `fk_Bol_detFac` (`nroSerie`,`nroBol`), ADD KEY `fk_DetBol_Prod` (`idProducto`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
 ADD KEY `fk_Fac_detFac` (`nroSerie`,`nroFact`), ADD KEY `fk_DetFac_Prod` (`idProducto`);

--
-- Indices de la tabla `detalleordencompra`
--
ALTER TABLE `detalleordencompra`
 ADD KEY `fk_ord_detord` (`nroSerie`,`nroOrden`), ADD KEY `fk_Detord_Prod` (`idProducto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`nroSerie`,`nroFact`), ADD KEY `fk_Fac_Cli` (`idCliente`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
 ADD PRIMARY KEY (`idMovimiento`), ADD KEY `fk_Inv_Prod` (`idproducto`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
 ADD PRIMARY KEY (`idMarca`), ADD UNIQUE KEY `nomMarca` (`nomMarca`);

--
-- Indices de la tabla `ordencompra`
--
ALTER TABLE `ordencompra`
 ADD PRIMARY KEY (`nroSerie`,`nroOrden`), ADD KEY `fk_ord_Prov` (`idProveedor`);

--
-- Indices de la tabla `parametrogeneral`
--
ALTER TABLE `parametrogeneral`
 ADD PRIMARY KEY (`idParametro`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`idProducto`), ADD KEY `fk_producto_categoria` (`idCategoria`), ADD KEY `fk_producto_marca` (`idMarca`), ADD KEY `fk_prod_prov` (`idProveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `sispersona`
--
ALTER TABLE `sispersona`
 ADD PRIMARY KEY (`ide_persona`);

--
-- Indices de la tabla `sisusuario`
--
ALTER TABLE `sisusuario`
 ADD PRIMARY KEY (`ide_usuario`), ADD KEY `pk_user_rol` (`ide_rol`), ADD KEY `pk_user_persona` (`ide_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admcatalogo`
--
ALTER TABLE `admcatalogo`
MODIFY `ide_elemento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `admgrcatalogo`
--
ALTER TABLE `admgrcatalogo`
MODIFY `ide_grupo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `admopcion`
--
ALTER TABLE `admopcion`
MODIFY `ide_opcion` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `admrol`
--
ALTER TABLE `admrol`
MODIFY `ide_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `admrolopcion`
--
ALTER TABLE `admrolopcion`
MODIFY `ide_rolopcion` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `idEmpleado` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
MODIFY `idMovimiento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `parametrogeneral`
--
ALTER TABLE `parametrogeneral`
MODIFY `idParametro` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `sispersona`
--
ALTER TABLE `sispersona`
MODIFY `ide_persona` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `sisusuario`
--
ALTER TABLE `sisusuario`
MODIFY `ide_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
ADD CONSTRAINT `fk_Bol_Cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
ADD CONSTRAINT `fk_Bol_detFac` FOREIGN KEY (`nroSerie`, `nroBol`) REFERENCES `boleta` (`nroSerie`, `nroBol`),
ADD CONSTRAINT `fk_DetBol_Prod` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
ADD CONSTRAINT `fk_DetFac_Prod` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
ADD CONSTRAINT `fk_Fac_detFac` FOREIGN KEY (`nroSerie`, `nroFact`) REFERENCES `factura` (`nroSerie`, `nroFact`);

--
-- Filtros para la tabla `detalleordencompra`
--
ALTER TABLE `detalleordencompra`
ADD CONSTRAINT `fk_Detord_Prod` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
ADD CONSTRAINT `fk_ord_detord` FOREIGN KEY (`nroSerie`, `nroOrden`) REFERENCES `ordencompra` (`nroSerie`, `nroOrden`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
ADD CONSTRAINT `fk_Fac_Cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
ADD CONSTRAINT `fk_Inv_Prod` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `ordencompra`
--
ALTER TABLE `ordencompra`
ADD CONSTRAINT `fk_ord_Prov` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `fk_prod_prov` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`),
ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
ADD CONSTRAINT `fk_producto_marca` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`);

--
-- Filtros para la tabla `sisusuario`
--
ALTER TABLE `sisusuario`
ADD CONSTRAINT `pk_user_persona` FOREIGN KEY (`ide_persona`) REFERENCES `sispersona` (`ide_persona`),
ADD CONSTRAINT `pk_user_rol` FOREIGN KEY (`ide_rol`) REFERENCES `admrol` (`ide_rol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
