-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2025 a las 23:00:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_chimichurri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergenos`
--

CREATE TABLE `alergenos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chimichurri`
--

CREATE TABLE `chimichurri` (
  `ID` int(11) NOT NULL,
  `gradoPicante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comics`
--

CREATE TABLE `comics` (
  `ID` int(11) NOT NULL,
  `coleccion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comics`
--

INSERT INTO `comics` (`ID`, `coleccion`) VALUES
(10, 'SCOTT PILGRIM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores_juego`
--

CREATE TABLE `directores_juego` (
  `ID` int(11) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `id_directoresJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidores`
--

CREATE TABLE `distribuidores` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerentes`
--

CREATE TABLE `gerentes` (
  `ID` int(11) NOT NULL,
  `anyosGerente` int(11) NOT NULL,
  `id_Distribuidores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `ID` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `id_JuegoMesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `ID` int(11) NOT NULL,
  `minutos` int(11) NOT NULL,
  `n_Participantes` int(11) NOT NULL,
  `nombreUsuario` int(11) NOT NULL,
  `n_Habitacion` int(11) NOT NULL,
  `nombreDirector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_mesa`
--

CREATE TABLE `juegos_mesa` (
  `ID` int(11) NOT NULL,
  `editor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos_mesa`
--

INSERT INTO `juegos_mesa` (`ID`, `editor`) VALUES
(5, 'Yssel Tarifa Torres'),
(9, 'Fantasy Flight Games');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mangas`
--

CREATE TABLE `mangas` (
  `ID` int(11) NOT NULL,
  `traductor` varchar(90) DEFAULT NULL,
  `autor` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mangas`
--

INSERT INTO `mangas` (`ID`, `traductor`, `autor`) VALUES
(1, NULL, 'Hayime Isayama'),
(2, 'Natalia Mintegui Arrieta', 'Mokumokuren'),
(3, 'Gorka Merino Chaparro', 'Akane Torikai'),
(4, 'Verònica Calafell', 'Kamome Shirahama'),
(6, NULL, 'Li Haoling'),
(7, 'Natalia Mintegui Arrieta', 'Mokumokuren'),
(8, 'Marc Bernabé', 'Ryoko Kui'),
(11, 'Gemma Tarrés Guasch', 'Yukinobu Tatsu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

CREATE TABLE `musica` (
  `ID` int(11) NOT NULL,
  `artista` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL,
  `n_Pedido` int(11) NOT NULL,
  `detalles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `precio` double NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `precio`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 23.28, 'ATAQUE A LOS TITANES INTEGRAL 1', NULL, 'img/snk.jpg'),
(2, 9, 'EL VERANO QUE HIKARU MURIÓ, VOL. 1', NULL, 'img/hikaru.jpg'),
(3, 9, 'SATURN RETURN, VOL. 1', NULL, 'img/saturn.jpg'),
(4, 9, 'ATELIER OF WITCH HAT, VOL. 1', NULL, 'img/wha.jpg'),
(5, 21.95, 'HAUSSER CIUDAD DE LAS TORRES (ANIMA BEYOND)', 'Libro complementario', 'img/hausser.jpg'),
(6, 15.15, 'LINK CLICK. LOS AGENTES DEL TIEMPO 03', NULL, 'img/cartel3.jpeg'),
(7, 9, 'EL VERANO QUE HIKARU MURIÓ, VOL. 2', NULL, 'img/hikaru1.jpg'),
(8, 9, 'TRAGONES Y MAZMORRAS, VOL. 1', NULL, 'img/tragones.jpg'),
(9, 54.49, 'ARKHAM HORROR LCG: EL JUEGO DE CARTAS', NULL, 'img/adb.jpg'),
(10, 12.95, 'SCOTT PILGRIM 1. SU VIDA Y SUS COSAS', NULL, 'img/scott.jpg'),
(11, 8.55, 'DAN DA DAN, VOL. 1', NULL, 'img/dandadan.jpg.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizar`
--

CREATE TABLE `realizar` (
  `id_Productos` int(11) NOT NULL,
  `id_Pedidos` int(11) NOT NULL,
  `id_Usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrar`
--

CREATE TABLE `registrar` (
  `id_Informe` int(11) NOT NULL,
  `id_Usuarios` int(11) NOT NULL,
  `id_Habitaciones` int(11) NOT NULL,
  `id_directoresJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservar`
--

CREATE TABLE `reservar` (
  `id_Usuarios` int(11) NOT NULL,
  `id_Habitaciones` int(11) NOT NULL,
  `id_directoresJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tener`
--

CREATE TABLE `tener` (
  `id_Chimichurri` int(11) NOT NULL,
  `id_Ingredientes` int(11) NOT NULL,
  `id_Alergenos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `ID` int(11) NOT NULL,
  `codigoTrab` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `salario` double(10,2) NOT NULL,
  `contrasenya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`ID`, `codigoTrab`, `nombre`, `apellidos`, `salario`, `contrasenya`) VALUES
(7, 1, 'David', 'Campoy', 9.99, '111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nUsuario` varchar(15) NOT NULL,
  `IP` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `ID` int(11) NOT NULL,
  `plataforma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergenos`
--
ALTER TABLE `alergenos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `chimichurri`
--
ALTER TABLE `chimichurri`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `directores_juego`
--
ALTER TABLE `directores_juego`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_directoresJuego` (`id_directoresJuego`);

--
-- Indices de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `gerentes`
--
ALTER TABLE `gerentes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_Distribuidores` (`id_Distribuidores`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_JuegoMesa` (`id_JuegoMesa`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `juegos_mesa`
--
ALTER TABLE `juegos_mesa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `realizar`
--
ALTER TABLE `realizar`
  ADD PRIMARY KEY (`id_Productos`,`id_Pedidos`,`id_Usuarios`),
  ADD KEY `id_Pedidos` (`id_Pedidos`),
  ADD KEY `id_Usuarios` (`id_Usuarios`);

--
-- Indices de la tabla `registrar`
--
ALTER TABLE `registrar`
  ADD PRIMARY KEY (`id_Informe`,`id_Usuarios`,`id_Habitaciones`,`id_directoresJuego`),
  ADD KEY `id_directoresJuego` (`id_directoresJuego`),
  ADD KEY `id_Usuarios` (`id_Usuarios`),
  ADD KEY `id_Habitaciones` (`id_Habitaciones`);

--
-- Indices de la tabla `reservar`
--
ALTER TABLE `reservar`
  ADD PRIMARY KEY (`id_Usuarios`,`id_Habitaciones`,`id_directoresJuego`),
  ADD KEY `id_Habitaciones` (`id_Habitaciones`),
  ADD KEY `id_directoresJuego` (`id_directoresJuego`);

--
-- Indices de la tabla `tener`
--
ALTER TABLE `tener`
  ADD PRIMARY KEY (`id_Chimichurri`,`id_Ingredientes`,`id_Alergenos`),
  ADD KEY `id_Ingredientes` (`id_Ingredientes`),
  ADD KEY `id_Alergenos` (`id_Alergenos`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `codigoTrab` (`codigoTrab`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IP` (`IP`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chimichurri`
--
ALTER TABLE `chimichurri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comics`
--
ALTER TABLE `comics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `directores_juego`
--
ALTER TABLE `directores_juego`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gerentes`
--
ALTER TABLE `gerentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juegos_mesa`
--
ALTER TABLE `juegos_mesa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mangas`
--
ALTER TABLE `mangas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chimichurri`
--
ALTER TABLE `chimichurri`
  ADD CONSTRAINT `chimichurri_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `comics`
--
ALTER TABLE `comics`
  ADD CONSTRAINT `comics_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `gerentes`
--
ALTER TABLE `gerentes`
  ADD CONSTRAINT `gerentes_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `trabajadores` (`ID`),
  ADD CONSTRAINT `gerentes_ibfk_2` FOREIGN KEY (`id_Distribuidores`) REFERENCES `distribuidores` (`ID`);

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`id_JuegoMesa`) REFERENCES `juegos_mesa` (`ID`);

--
-- Filtros para la tabla `juegos_mesa`
--
ALTER TABLE `juegos_mesa`
  ADD CONSTRAINT `juegos_mesa_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `mangas`
--
ALTER TABLE `mangas`
  ADD CONSTRAINT `mangas_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `realizar`
--
ALTER TABLE `realizar`
  ADD CONSTRAINT `realizar_ibfk_1` FOREIGN KEY (`id_Productos`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `realizar_ibfk_2` FOREIGN KEY (`id_Pedidos`) REFERENCES `pedidos` (`ID`),
  ADD CONSTRAINT `realizar_ibfk_3` FOREIGN KEY (`id_Usuarios`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `registrar`
--
ALTER TABLE `registrar`
  ADD CONSTRAINT `registrar_ibfk_1` FOREIGN KEY (`id_Informe`) REFERENCES `informes` (`ID`),
  ADD CONSTRAINT `registrar_ibfk_2` FOREIGN KEY (`id_directoresJuego`) REFERENCES `directores_juego` (`ID`),
  ADD CONSTRAINT `registrar_ibfk_3` FOREIGN KEY (`id_Usuarios`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `registrar_ibfk_4` FOREIGN KEY (`id_Habitaciones`) REFERENCES `habitaciones` (`ID`);

--
-- Filtros para la tabla `reservar`
--
ALTER TABLE `reservar`
  ADD CONSTRAINT `reservar_ibfk_1` FOREIGN KEY (`id_Usuarios`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `reservar_ibfk_2` FOREIGN KEY (`id_Habitaciones`) REFERENCES `habitaciones` (`ID`),
  ADD CONSTRAINT `reservar_ibfk_3` FOREIGN KEY (`id_directoresJuego`) REFERENCES `directores_juego` (`ID`);

--
-- Filtros para la tabla `tener`
--
ALTER TABLE `tener`
  ADD CONSTRAINT `tener_ibfk_1` FOREIGN KEY (`id_Chimichurri`) REFERENCES `chimichurri` (`ID`),
  ADD CONSTRAINT `tener_ibfk_2` FOREIGN KEY (`id_Ingredientes`) REFERENCES `ingredientes` (`ID`),
  ADD CONSTRAINT `tener_ibfk_3` FOREIGN KEY (`id_Alergenos`) REFERENCES `alergenos` (`ID`);

--
-- Filtros para la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `videojuegos_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
