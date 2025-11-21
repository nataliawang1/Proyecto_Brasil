-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 21-11-2025 a las 20:31:00
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667277_brasildata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillo`
--

CREATE TABLE `platillo` (
  `id_platillo` int NOT NULL,
  `nombre_platillo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_cocina` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `platillo`
--

INSERT INTO `platillo` (`id_platillo`, `nombre_platillo`, `tipo_cocina`, `descripcion`, `categoria`) VALUES
(1, 'Pollo Frito', 'Amazonica', 'Pollo Frito', 'Plato'),
(2, 'Pollo Frito', 'Amazonica', 'Pollo Frito', 'Plato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion_platillo`
--

CREATE TABLE `recomendacion_platillo` (
  `id_recomendacion` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_platillo` int NOT NULL,
  `motivo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recomendacion_platillo`
--

INSERT INTO `recomendacion_platillo` (`id_recomendacion`, `id_usuario`, `id_platillo`, `motivo`, `created_at`) VALUES
(1, 1, 1, 'Muy rico', '2025-11-21 02:57:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `created_at`) VALUES
(1, 'Lucas', 'lucas@gmail.com', '$2y$10$8VG3aX0wsRoBjGczqZ0wpeRRHT2krrCcWdf4ApZOrjTeHUOzg61Ba', '2025-11-21 02:52:07'),
(2, 'NATALIA', 'natalia@gmail.com', '$2y$10$ZkuF9hDdmrQTIEIHaGmRSu/YWlv8CfeRm/lEaZQrCcLxwrmCof2hS', '2025-11-21 03:12:10'),
(3, 'Paco Pedro', 'paco@gmail.com', '$2y$10$c5CMwmPGLblUd7i3XkYMd.0amQ7/gZU/kzhP9uYmHYdNXgyhtEi9u', '2025-11-21 16:18:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD PRIMARY KEY (`id_platillo`);

--
-- Indices de la tabla `recomendacion_platillo`
--
ALTER TABLE `recomendacion_platillo`
  ADD PRIMARY KEY (`id_recomendacion`),
  ADD KEY `idx_rec_user` (`id_usuario`),
  ADD KEY `idx_rec_platillo` (`id_platillo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuarios_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `platillo`
--
ALTER TABLE `platillo`
  MODIFY `id_platillo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recomendacion_platillo`
--
ALTER TABLE `recomendacion_platillo`
  MODIFY `id_recomendacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recomendacion_platillo`
--
ALTER TABLE `recomendacion_platillo`
  ADD CONSTRAINT `fk_rec_platillo` FOREIGN KEY (`id_platillo`) REFERENCES `platillo` (`id_platillo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rec_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
