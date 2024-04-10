-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2024 a las 00:42:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productora_uno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `descripcion`, `img`, `deleted_at`) VALUES
(1, 'LiveStream', 'Hacemos todo tipo de changa\n', 'livestream.jpg', NULL),
(2, 'Circuito Cerrado', NULL, 'circuito-cerrado.jpg', NULL),
(3, 'Falso Vivo', NULL, 'falso-vivo.jpg', NULL),
(4, 'Videos', NULL, 'videos.jpg', NULL),
(5, 'Fotografía', NULL, 'fotografia.jpg', NULL),
(6, 'Edición', NULL, 'edicion.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_categorias`
--

CREATE TABLE `contenidos_categorias` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_videos`
--

INSERT INTO `contenidos_categorias` (`id`, `id_categoria`, `id_contenido`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `contraseña`, `deleted_at`) VALUES
(1, 'lele', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `tipo` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1 = video\r\n2 = imagen',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `descripcion`, `link`, `deleted_at`) VALUES
(1, 'Frusciante', 'Juan manuel frusciante toca la guitarrita, la toca un poco, vos fijate.', '<iframe width=\"1903\" height=\"750\" src=\"https://www.youtube.com/embed/UjwDPxpNuHc?list=RDUjwDPxpNuHc\" title=\"John Frusciante - Heaven\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL),
(2, 'El pasito del delfin', 'Hasta el fin?', '<iframe width=\"1903\" height=\"750\" src=\"https://www.youtube.com/embed/hKDDbs9XB2k\" title=\"EL PASITO DE DELFIN\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_videos`
--
ALTER TABLE `categorias_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias_videos`
--
ALTER TABLE `categorias_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
