-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2021 a las 07:03:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vuelos24`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `nroVuelo` int(11) NOT NULL,
  `nroBoleto` int(11) NOT NULL,
  `codCliente` int(10) UNSIGNED DEFAULT NULL,
  `apellidoPasajero` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `nombrePasajero` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `documentoPasajero` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `claseBoleto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tarifaBoleto` int(11) NOT NULL,
  `tipoBoleto` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estadoBoleto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`nroVuelo`, `nroBoleto`, `codCliente`, `apellidoPasajero`, `nombrePasajero`, `documentoPasajero`, `claseBoleto`, `tarifaBoleto`, `tipoBoleto`, `estadoBoleto`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 2, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 3, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 4, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 5, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 6, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 7, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 8, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 9, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 10, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 11, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 12, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 13, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 14, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 15, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 16, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 17, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 18, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 19, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 20, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(2, 1, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 2, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 3, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 4, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 5, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 6, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 7, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 8, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 9, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 10, NULL, NULL, NULL, NULL, 'business', 100000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 11, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 12, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 13, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 14, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 15, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 16, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 17, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 18, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 19, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(2, 20, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-09 23:20:36', '2021-11-09 23:20:36'),
(3, 1, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 2, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 3, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 4, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 5, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 6, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 7, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 8, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 9, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 10, NULL, NULL, NULL, NULL, 'primera', 50000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 11, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 12, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 13, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 14, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 15, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 16, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 17, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 18, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 19, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 20, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 21, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 22, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 23, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 24, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 25, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 26, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 27, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 28, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 29, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 30, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 31, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 32, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 33, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 34, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(3, 35, NULL, NULL, NULL, NULL, 'turista', 35000, NULL, 'activo', '2021-11-10 06:44:45', '2021-11-10 06:44:45'),
(4, 1, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 2, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 3, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 4, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 5, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 6, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 7, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 8, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 9, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 10, NULL, NULL, NULL, NULL, 'primera', 180000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 11, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 12, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 13, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 14, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 15, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 16, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 17, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 18, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 19, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 20, NULL, NULL, NULL, NULL, 'business', 200000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 21, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 22, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 23, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 24, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 25, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 26, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 27, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 28, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 29, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 30, NULL, NULL, NULL, NULL, 'turista', 82000, NULL, 'activo', '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(5, 1, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 2, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 3, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 4, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 5, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 6, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 7, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 8, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 9, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 10, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 11, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 12, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 13, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 14, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 15, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 16, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 17, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 18, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 19, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 20, NULL, NULL, NULL, NULL, 'business', 68000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 21, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 22, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 23, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 24, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 25, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 26, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 27, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 28, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 29, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 30, NULL, NULL, NULL, NULL, 'turista', 34000, NULL, 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(6, 1, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 2, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 3, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 4, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 5, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 6, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 7, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 8, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 9, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 10, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 11, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 12, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 13, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 14, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 15, NULL, NULL, NULL, NULL, 'primera', 80000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 16, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 17, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 18, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 19, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 20, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 21, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 22, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 23, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 24, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 25, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 26, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 27, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 28, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 29, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 30, NULL, NULL, NULL, NULL, 'business', 50000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 31, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 32, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 33, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 34, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 35, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 36, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 37, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 38, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 39, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 40, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 41, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 42, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 43, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 44, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 45, NULL, NULL, NULL, NULL, 'turista', 30000, NULL, 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(7, 1, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 2, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 3, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 4, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 5, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 6, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 7, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 8, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 9, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 10, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 11, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 12, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 13, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 14, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 15, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 16, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 17, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 18, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(8, 1, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 2, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 3, NULL, NULL, NULL, NULL, 'primera', 100000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 4, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 5, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 6, NULL, NULL, NULL, NULL, 'business', 80000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 7, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 8, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 9, NULL, NULL, NULL, NULL, 'turista', 50000, NULL, 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(10) UNSIGNED NOT NULL,
  `codigoIATACiudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `codigoIATACiudad`, `nombre`) VALUES
(1, 'EZE', 'Buenos Aires'),
(2, 'CRD', 'Comodoro Rivadavia'),
(3, 'EQS', 'Esquel'),
(4, 'REL', 'Trelew'),
(5, 'JUJ', 'San Salvador de Jujuy'),
(6, 'MDZ', 'Mendoza'),
(7, 'NQN', 'Neuquén'),
(8, 'TUC', 'S. Miguel de Tucumán'),
(9, 'USH', 'Ushuaia'),
(10, 'FTE', 'El Calafate'),
(11, 'MIA', 'Miami'),
(12, 'MAD', 'Madrid'),
(13, 'CUN', 'Cancun'),
(14, 'RIO', 'Rio de Janeiro'),
(15, 'BCN', 'Barcelona'),
(16, 'LON', 'Londres'),
(17, 'BKK', 'Bangkok'),
(18, 'SCL', 'Santiago de Chile'),
(19, 'BRC', 'San Carlos de Bariloche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codCliente`, `idUsuario`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-10 22:09:13', '2021-11-10 22:09:13'),
(2, 2, '2021-11-10 22:24:22', '2021-11-10 22:24:22'),
(3, 6, '2021-11-12 22:18:24', '2021-11-12 22:18:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `codEmpleado` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`codEmpleado`, `idUsuario`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-11-11 17:38:03', '2021-11-11 17:38:03'),
(2, 4, '2021-11-12 01:20:00', '2021-11-12 01:20:00'),
(3, 10, '2021-11-12 22:38:10', '2021-11-12 22:38:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `descripcion`) VALUES
(1, 'Botanas'),
(2, 'Refrescos en lata'),
(3, 'Chocolate caliente'),
(4, 'Excursión a la cabina del piloto'),
(5, 'Cena'),
(6, 'WIFI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciosvuelo`
--

CREATE TABLE `serviciosvuelo` (
  `nroVuelo` int(10) UNSIGNED NOT NULL,
  `idServicio` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `serviciosvuelo`
--

INSERT INTO `serviciosvuelo` (`nroVuelo`, `idServicio`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 2, '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 3, '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 5, '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(1, 6, '2021-11-09 23:20:02', '2021-11-09 23:20:02'),
(2, 1, '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 2, '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 3, '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 5, '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(2, 6, '2021-11-09 23:20:35', '2021-11-09 23:20:35'),
(3, 1, '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 2, '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 3, '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 4, '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 5, '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(3, 6, '2021-11-10 06:44:44', '2021-11-10 06:44:44'),
(4, 1, '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 2, '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 3, '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 4, '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 5, '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(4, 6, '2021-11-10 19:30:52', '2021-11-10 19:30:52'),
(5, 1, '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 2, '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 3, '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 4, '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 5, '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(5, 6, '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(6, 1, '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 2, '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 3, '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 5, '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(6, 6, '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(7, 1, '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 2, '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 3, '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 4, '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(7, 5, '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(8, 1, '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 2, '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 4, '2021-11-12 22:35:45', '2021-11-12 22:35:45'),
(8, 5, '2021-11-12 22:35:45', '2021-11-12 22:35:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nroDocumento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoUsuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `nroDocumento`, `fechaNacimiento`, `email`, `telefono`, `usuario`, `password`, `tipoUsuario`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Emiliano', 'Diaz Nahuelanca', '40205760', '1994-05-05', 'emilianodiaznahuelanca@gmail.com', '2975445864', 'ediaz', '$2y$10$oMbVCdqgFgd8LeqllVaaw.lcgKx7Nsww/EQyWn7Yrsm0HjLRTampu', 'cliente', '2021-11-10 22:09:13', '2021-11-10 22:09:13', NULL),
(2, 'Veronica', 'Nahuelanca', '22632450', '1972-05-21', 'veronica@gmail.com', '2974787114', 'veroca', '$2y$10$Z98eZtR6pbfF5raJLon8GuHnDEruPV8xRCiHb/B18lXEk4wLJxoD6', 'cliente', '2021-11-10 22:24:22', '2021-11-10 22:24:22', NULL),
(3, 'Aín Lautaro', 'García Nahuelanca', '40205760', '2001-01-23', 'ainlautaro7@gmail.com', '2975445864', 'ainlautaro', '$2y$10$PjzumcIzAVMTG/PPOdtl7OBoD.h9SvuFkBLdQOh1Gx.2UIw8bVTUi', 'empleado', '2021-11-11 17:38:03', '2021-11-11 17:38:03', NULL),
(4, 'Alan', 'Uribe', '42479468', '2000-06-08', 'alanuribe2000@gmail.com', '2975925890', 'alan_uribe', '$2y$10$Zrk87oSOA2bxW3KzKSDhFuBjFXtrFaBDzUynAAIY6pa.FYGqQ40re', 'empleado', '2021-11-12 01:20:00', '2021-11-12 01:20:00', NULL),
(5, 'Andrea', 'Ch', '22632437', '1972-09-13', 'andreach.sistemas@gmail.com', '2974453605', 'andrea', '$2y$10$7R3S.3EV8gxI35St.FdADuYCv.wXfBJH4SuRuv8zJMF/uVLP2NnaO', 'cliente', '2021-11-12 22:18:15', '2021-11-12 22:18:15', NULL),
(6, 'Andrea', 'Ch', '22632437', '1972-09-13', 'andreach.sistemas@gmail.com', '2974453605', 'andrea', '$2y$10$51.baw6e4/8oJYn9AqW07uh4c3XFB1GmfD7lFcqyYTWfvyqqSVVNO', 'cliente', '2021-11-12 22:18:24', '2021-11-12 22:18:24', NULL),
(7, 'andrea', 'ch', '22632450', '1972-09-13', 'andreach.sistemas@gmail.com', '2975925890', 'andrech', '$2y$10$bNi02dkoZ4PVXci3ITF15.OFopsU.TeI1zGuG6nlnya60xW.aDDV2', 'empleado', '2021-11-12 22:37:34', '2021-11-12 22:37:34', NULL),
(8, 'andrea', 'ch', '22632450', '1972-09-13', 'andreach.sistemas@gmail.com', '2975925890', 'andrech', '$2y$10$gLHVgoiv6zpFyVAo1A7ySepaZVGtUdpFL2.kbjrd1vLWCj/PEKA.y', 'empleado', '2021-11-12 22:37:52', '2021-11-12 22:37:52', NULL),
(9, 'andrea', 'ch', '22632450', '1972-09-13', 'andreach.sistemas@gmail.com', '2975925890', 'andrech', '$2y$10$QUFQEnDaELNmR0gDgiftS.FWubuOK74Oj0o83h8c3ZPy.KFCssFtS', 'empleado', '2021-11-12 22:37:59', '2021-11-12 22:37:59', NULL),
(10, 'andrea', 'ch', '22632450', '1972-09-13', 'andreach.sistemas@gmail.com', '2975925890', 'andrech', '$2y$10$dTanMoAuCxWZmNLbgH/10ul3YlMlJS0GvXQM7TUDir7OnVPOGsorC', 'empleado', '2021-11-12 22:38:10', '2021-11-12 22:38:10', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistausuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistausuario` (
`idUsuario` int(10) unsigned
,`cod` int(10) unsigned
,`nombre` varchar(255)
,`apellido` varchar(255)
,`nroDocumento` varchar(255)
,`fechaNacimiento` date
,`email` varchar(255)
,`telefono` varchar(255)
,`usuario` varchar(255)
,`password` mediumtext
,`tipoUsuario` varchar(255)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `nroVuelo` int(10) UNSIGNED NOT NULL,
  `idCiudadOrigen` int(10) UNSIGNED NOT NULL,
  `idCiudadDestino` int(10) UNSIGNED NOT NULL,
  `fechaVuelo` date NOT NULL,
  `horaVuelo` time NOT NULL,
  `planVuelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoVuelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`nroVuelo`, `idCiudadOrigen`, `idCiudadDestino`, `fechaVuelo`, `horaVuelo`, `planVuelo`, `estadoVuelo`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2021-11-30', '21:00:00', 'O3D4F2021-11-30H21-00', 'en vuelo', '2021-11-09 23:20:02', '2021-11-12 01:28:30'),
(2, 2, 1, '2021-11-25', '17:00:00', 'O2D1F2021-11-25H17-00', 'en vuelo', '2021-11-09 23:20:35', '2021-11-09 23:27:53'),
(3, 7, 9, '2021-12-20', '08:30:00', 'O7D9F2021-12-20H08-30', 'realizado', '2021-11-10 06:44:44', '2021-11-12 18:48:01'),
(4, 1, 11, '2022-01-05', '22:30:00', 'O1D11F2021-11-25H17-30', 'en vuelo', '2021-11-10 19:30:52', '2021-11-12 22:26:15'),
(5, 1, 18, '2022-03-14', '15:30:00', 'O1D18F2022-03-14H15-30', 'activo', '2021-11-12 20:29:18', '2021-11-12 20:29:18'),
(6, 2, 19, '2022-01-15', '08:00:00', 'O2D19F2022-01-15H08-00', 'activo', '2021-11-12 20:39:14', '2021-11-12 20:39:14'),
(7, 2, 6, '2021-11-13', '20:30:00', 'O2D6F2021-11-13H20-30', 'activo', '2021-11-12 22:29:23', '2021-11-12 22:29:23'),
(8, 2, 1, '2021-11-20', '18:34:00', 'O2D1F2021-11-20H18-34', 'activo', '2021-11-12 22:35:45', '2021-11-12 22:35:45');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vuelosdisponibles`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vuelosdisponibles` (
`nroVuelo` int(11)
,`origen` varchar(255)
,`OrigenIATA` varchar(255)
,`destino` varchar(255)
,`DestinoIATA` varchar(255)
,`fechaVuelo` date
,`horaVuelo` time
,`planVuelo` varchar(255)
,`estadoVuelo` varchar(255)
,`cantBusinessDisponible` bigint(21)
,`tarifaBusiness` int(11)
,`cantPrimeraDisponible` bigint(21)
,`tarifaPrimera` int(11)
,`cantTuristaDisponible` bigint(21)
,`tarifaTurista` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistausuario`
--
DROP TABLE IF EXISTS `vistausuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistausuario`  AS SELECT `u`.`id` AS `idUsuario`, `e`.`codEmpleado` AS `cod`, `u`.`nombre` AS `nombre`, `u`.`apellido` AS `apellido`, `u`.`nroDocumento` AS `nroDocumento`, `u`.`fechaNacimiento` AS `fechaNacimiento`, `u`.`email` AS `email`, `u`.`telefono` AS `telefono`, `u`.`usuario` AS `usuario`, `u`.`password` AS `password`, `u`.`tipoUsuario` AS `tipoUsuario`, `u`.`created_at` AS `created_at` FROM (`empleado` `e` join `usuario` `u` on(`u`.`id` = `e`.`idUsuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vuelosdisponibles`
--
DROP TABLE IF EXISTS `vuelosdisponibles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuelosdisponibles`  AS SELECT `b`.`nroVuelo` AS `nroVuelo`, `o`.`nombre` AS `origen`, `o`.`codigoIATACiudad` AS `OrigenIATA`, `d`.`nombre` AS `destino`, `d`.`codigoIATACiudad` AS `DestinoIATA`, `v`.`fechaVuelo` AS `fechaVuelo`, `v`.`horaVuelo` AS `horaVuelo`, `v`.`planVuelo` AS `planVuelo`, `v`.`estadoVuelo` AS `estadoVuelo`, (select count(`b2`.`nroBoleto`) from `boleto` `b2` where `b2`.`claseBoleto` = 'business' and `b2`.`estadoBoleto` = 'activo' and `v`.`estadoVuelo` = 'activo' and `b2`.`nroVuelo` = `v`.`nroVuelo` group by `v`.`nroVuelo`,`b2`.`claseBoleto`) AS `cantBusinessDisponible`, (select `b2`.`tarifaBoleto` from `boleto` `b2` where `b2`.`claseBoleto` = 'business' and `b2`.`estadoBoleto` = 'activo' and `v`.`estadoVuelo` = 'activo' and `b2`.`nroVuelo` = `v`.`nroVuelo` group by `v`.`nroVuelo`,`b2`.`claseBoleto`) AS `tarifaBusiness`, (select count(`b2`.`nroBoleto`) from `boleto` `b2` where `b2`.`claseBoleto` = 'primera' and `b2`.`estadoBoleto` = 'activo' and `v`.`estadoVuelo` = 'activo' and `b2`.`nroVuelo` = `v`.`nroVuelo` group by `v`.`nroVuelo`,`b2`.`claseBoleto`) AS `cantPrimeraDisponible`, (select `b2`.`tarifaBoleto` from `boleto` `b2` where `b2`.`claseBoleto` = 'primera' and `b2`.`estadoBoleto` = 'activo' and `v`.`estadoVuelo` = 'activo' and `b2`.`nroVuelo` = `v`.`nroVuelo` group by `v`.`nroVuelo`,`b2`.`claseBoleto`) AS `tarifaPrimera`, (select count(`b2`.`nroBoleto`) from `boleto` `b2` where `b2`.`claseBoleto` = 'turista' and `b2`.`estadoBoleto` = 'activo' and `v`.`estadoVuelo` = 'activo' and `b2`.`nroVuelo` = `v`.`nroVuelo` group by `v`.`nroVuelo`,`b2`.`claseBoleto`) AS `cantTuristaDisponible`, (select `b2`.`tarifaBoleto` from `boleto` `b2` where `b2`.`claseBoleto` = 'turista' and `b2`.`estadoBoleto` = 'activo' and `v`.`estadoVuelo` = 'activo' and `b2`.`nroVuelo` = `v`.`nroVuelo` group by `v`.`nroVuelo`,`b2`.`claseBoleto`) AS `tarifaTurista` FROM (((`boleto` `b` join `vuelo` `v` on(`v`.`nroVuelo` = `b`.`nroVuelo`)) join `ciudad` `o` on(`o`.`idCiudad` = `v`.`idCiudadOrigen`)) join `ciudad` `d` on(`d`.`idCiudad` = `v`.`idCiudadDestino`)) WHERE `b`.`estadoBoleto` = 'activo' AND `v`.`estadoVuelo` = 'activo' GROUP BY `v`.`nroVuelo` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`nroVuelo`,`nroBoleto`),
  ADD UNIQUE KEY `codCliente` (`codCliente`) USING BTREE;

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`),
  ADD KEY `cliente_idUsuario` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`codEmpleado`),
  ADD KEY `empleado_idUsuario` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `serviciosvuelo`
--
ALTER TABLE `serviciosvuelo`
  ADD PRIMARY KEY (`nroVuelo`,`idServicio`),
  ADD KEY `nroVuelo` (`nroVuelo`,`idServicio`),
  ADD KEY `serviciosVuelo` (`idServicio`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`nroVuelo`),
  ADD KEY `vuelo_idCiudadOrigen` (`idCiudadOrigen`) USING BTREE,
  ADD KEY `vuelo_idCiudadDestino` (`idCiudadDestino`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `codEmpleado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `nroVuelo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `serviciosvuelo`
--
ALTER TABLE `serviciosvuelo`
  ADD CONSTRAINT `serviciosvuelo_ibfk_1` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serviciosvuelo_ibfk_2` FOREIGN KEY (`nroVuelo`) REFERENCES `vuelo` (`nroVuelo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_idciudaddestino_foreign` FOREIGN KEY (`idCiudadDestino`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_idciudadorigen_foreign` FOREIGN KEY (`idCiudadOrigen`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
