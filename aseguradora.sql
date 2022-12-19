-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 16:22:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aseguradora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `p_id` int(11) NOT NULL,
  `p_usuario` bigint(20) NOT NULL,
  `p_fechanacimiento` date NOT NULL,
  `p_ciudad` varchar(100) NOT NULL,
  `p_direccion` varchar(100) NOT NULL,
  `p_empresa` varchar(100) NOT NULL,
  `p_cargo` varchar(100) NOT NULL,
  `p_celularempresa` varchar(100) NOT NULL,
  `p_ingreso` int(11) NOT NULL,
  `p_egreso` int(11) NOT NULL,
  `p_tiposeguro` varchar(100) NOT NULL,
  `p_estadoseguro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `s_id` bigint(20) NOT NULL,
  `s_usuario` bigint(20) NOT NULL,
  `s_ip` varchar(200) NOT NULL,
  `s_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `u_id` bigint(11) NOT NULL,
  `u_identificacion` bigint(20) NOT NULL,
  `u_nombres` varchar(200) NOT NULL,
  `u_apellidos` varchar(200) NOT NULL,
  `u_celular` bigint(20) NOT NULL,
  `u_correo` varchar(300) NOT NULL,
  `u_contrasena` varchar(20) NOT NULL,
  `u_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`u_id`, `u_identificacion`, `u_nombres`, `u_apellidos`, `u_celular`, `u_correo`, `u_contrasena`, `u_rol`) VALUES
(1, 1234567890, 'EMPRESA ASEGURADORA', 'JJ', 23, 'fe@gmail.com', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `v_id` bigint(20) NOT NULL,
  `v_usuario` bigint(20) NOT NULL,
  `v_uso` varchar(70) NOT NULL,
  `v_placa` varchar(50) NOT NULL,
  `v_matricula` varchar(50) NOT NULL,
  `v_tipovehiculo` varchar(50) NOT NULL,
  `v_marca` varchar(100) NOT NULL,
  `v_modelo` varchar(100) NOT NULL,
  `v_licencia` varchar(100) NOT NULL,
  `v_tiposeguro` varchar(50) NOT NULL,
  `v_estadoseguro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE `vivienda` (
  `vi_id` bigint(20) NOT NULL,
  `vi_usuario` bigint(20) NOT NULL,
  `vi_tipovivienda` varchar(100) NOT NULL,
  `vi_escritura` bigint(20) NOT NULL,
  `vi_zona` varchar(100) NOT NULL,
  `vi_estrato` varchar(10) NOT NULL,
  `vi_departamento` varchar(100) NOT NULL,
  `vi_ciudad` varchar(100) NOT NULL,
  `vi_direccion` varchar(100) NOT NULL,
  `vi_tiposeguro` varchar(100) NOT NULL,
  `vi_estadoseguro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `usuario_fk` (`p_usuario`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_usuariofk` (`s_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`u_id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `v_usuariofk` (`v_usuario`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`vi_id`),
  ADD KEY `vi_usuariofk` (`vi_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `s_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `u_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `v_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `vi_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`p_usuario`) REFERENCES `usuario` (`u_id`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `s_usuariofk` FOREIGN KEY (`s_usuario`) REFERENCES `usuario` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `v_usuariofk` FOREIGN KEY (`v_usuario`) REFERENCES `usuario` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `vi_usuariofk` FOREIGN KEY (`vi_usuario`) REFERENCES `usuario` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
