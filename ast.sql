-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2021 a las 18:44:41
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ast`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `ID` int(11) NOT NULL,
  `CARGO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`ID`, `CARGO`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `ID_DOMICILIO` int(11) NOT NULL,
  `CALLE` text DEFAULT NULL,
  `N_EXTERIOR` varchar(255) DEFAULT NULL,
  `N_INTERIOR` varchar(255) DEFAULT NULL,
  `DELEGACIÓN` varchar(255) DEFAULT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`ID_DOMICILIO`, `CALLE`, `N_EXTERIOR`, `N_INTERIOR`, `DELEGACIÓN`, `ID_USUARIO`) VALUES
(1, 'CACTUS', '13', '22', 'Tláhuac', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `ID_PAGOS` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `FOLIO` varchar(50) DEFAULT NULL,
  `CONCEPTO` varchar(255) DEFAULT NULL,
  `NUMERO_SERIE` varchar(255) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`ID_PAGOS`, `ID_USUARIO`, `FOLIO`, `CONCEPTO`, `NUMERO_SERIE`, `FECHA`, `HORA`, `IMG`, `tipo`, `ruta`) VALUES
(1, 2, '652162', 'Ejemplo puede borrar', '465498451256', '2021-12-22', '11:31:00', 'Cisnes.png', 'png', '../../archivos/FabiolaSP/Cisnes.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `N_CONTRATO` int(11) DEFAULT NULL,
  `FECHA_CONTRATO` date DEFAULT NULL,
  `ID_DOMICILIO` int(11) DEFAULT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `APP` varchar(255) DEFAULT NULL,
  `APM` varchar(255) DEFAULT NULL,
  `TELEFONO` char(255) DEFAULT NULL,
  `Telefono2` char(255) NOT NULL,
  `Telefono3` char(255) NOT NULL,
  `usuarios` varchar(255) DEFAULT NULL,
  `CORREO` varchar(255) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `N_CONTRATO`, `FECHA_CONTRATO`, `ID_DOMICILIO`, `NOMBRE`, `APP`, `APM`, `TELEFONO`, `Telefono2`, `Telefono3`, `usuarios`, `CORREO`, `pass`, `id_cargo`) VALUES
(1, NULL, NULL, NULL, 'Mauricio', 'Salas', 'Tenorio', '5525946833', '', '', 'Maus', 'mau.sa.te@hotmail.com', '53417ba8112addbd57bee79cf8d2bdb502e84f91', 1),
(2, 1, '2021-12-22', NULL, 'FABIOLA', 'SANCHEZ ', 'PEREGRINA', '5614433046', '', '', 'FabiolaSP', 'cambiar@porfis.com', 'fea975f35f132318b6fc91525ac940cda84ad242', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`ID_DOMICILIO`),
  ADD KEY `id_Usuario` (`ID_USUARIO`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`ID_PAGOS`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_DOMICILIO` (`ID_DOMICILIO`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `ID_DOMICILIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `ID_PAGOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_CARGO`) REFERENCES `cargo` (`ID`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_DOMICILIO`) REFERENCES `domicilio` (`ID_DOMICILIO`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
