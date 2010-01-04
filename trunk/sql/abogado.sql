-- phpMyAdmin SQL Dump
-- version 3.2.4deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-01-2010 a las 02:39:26
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.2.11-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `abogado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuacion`
--

CREATE TABLE IF NOT EXISTS `actuacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`id`, `name`) VALUES
(4, 'Actuacion 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `html`
--

CREATE TABLE IF NOT EXISTS `html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `html` text,
  `eval` int(11) NOT NULL COMMENT 'para evaluar codigo php',
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `html`
--

INSERT INTO `html` (`id`, `name`, `html`, `eval`, `description`) VALUES
(1, 'Actuaciones', '<table align="left">\r\n    <tr>\r\n        <td><b>Crear Actuación</b></td>\r\n    </tr>\r\n    <tr>\r\n        <td><input type="text" name="actuacion" id="actuacion"></td>\r\n    </tr>\r\n    <tr>\r\n        <td><input type="button" name="saveActuacion" id="saveActuacion" value="Guardar" onclick="xajax_insertActuacion(document.getElementById(''actuacion'').value);"></td>\r\n    </tr>\r\n</table>', 0, 'Formulario para crear las actuaciones'),
(2, 'ListadoActuacion', 'echo ''<table border="0" align="left" style="width:300;table-layout:fixed">\r\n    <tr style="width:350;">\r\n        <td style="width:250;"><b>Actuaci&oacute;n</b></td>\r\n        <td style="width:60;"><b>Editar</b></td>\r\n        <td style="width:40;"><b>Borrar</b></td>\r\n    \r\n    </tr>'';\r\n\r\n$core->db->Execute(''SET NAMES utf8'');\r\n$rs = $core->db->Execute(''SELECT * FROM actuacion ORDER BY name'');\r\n\r\nwhile (!$rs->EOF) {\r\n    echo ''<tr id="trActuacion'' . $rs->fields[''id''] .''">'';\r\n    echo ''<td><div id="textActuacion'' . $rs->fields[''id''] .''">'' . $rs->fields[''name''] . ''</div></td>'';\r\n    echo ''<td><div id="editActuacion'' . $rs->fields[''id''] .''"><input type="button" name="editarActuacion'' . $rs->fields[''id''] .''" id="editarActuacion'' . $rs->fields[''id''] .''" \r\nstyle="width:24;height:24;background: transparent url(./icon/edit.png) no-repeat center;" onclick="xajax_EditFieldActuacion(\\\\''''. $rs->fields[''id''] .''\\\\'')" ></div></td>'';\r\n    echo ''<td><input type="button" name="borrarActuacion'' . $rs->fields[''id''] .''" id="borrarActuacion'' . $rs->fields[''id''] .''" style="width:24;height:24;background: transparent url(./icon/delete.png) no-repeat center;" onclick="xajax_deleteActuacion(\\\\''''. $rs->fields[''id''] .''\\\\'')"></td></tr>'';\r\n	$rs->MoveNext();\r\n}\r\n\r\necho ''</table>'';', 1, 'Listado del las actuaciones ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `parentID` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `form` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='menu de la aplicacion' AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `protected`, `parentID`, `position`, `name`, `form`, `edit`, `delete`, `list`, `description`) VALUES
(1, 1, 0, 0, 'Edicion', 0, 0, 0, 0, NULL),
(3, 0, 1, 1, 'Actuaciones', 1, 0, 0, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `form` varchar(20) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `xpos` int(11) DEFAULT NULL,
  `ypos` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `module`, `title`, `form`, `width`, `height`, `xpos`, `ypos`, `description`) VALUES
(1, 'herramientas', 'Herramientas', '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perm`
--

CREATE TABLE IF NOT EXISTS `perm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `write` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `perm`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='roles de usuarios' AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `name`, `description`) VALUES
(1, 'admin', 'administrador del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tabla de plantillas ' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `template`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `rol` int(11) NOT NULL,
  `firstname` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `picture` varchar(20) CHARACTER SET utf8 DEFAULT '0.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='tabla de usuarios del sistema' AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `rol`, `firstname`, `lastname`, `password`, `phone`, `email`, `picture`) VALUES
(1, 'darcila', 1, 'Diego', 'Arcila', '6c26fc9d4bf493a4b65d531ed1896471', '1234567', 'darcila@gmail.com', '0.jpg');
