-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2019 a las 00:46:04
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problemas`
--

CREATE TABLE `problemas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) COLLATE utf16_spanish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `problemas`
--

INSERT INTO `problemas` (`id`, `titulo`, `date`) VALUES
(109, 'Liga de Pádel', '2018-11-17 01:09:15'),
(117, 'La fiesta aburrida', '2018-11-17 01:09:02'),
(427, 'Yo soy tu... [Navidad 2017]', '2018-11-17 01:15:05'),
(428, 'Tendencia al lado oscuro [Navidad 2017]', '2018-11-17 01:15:25'),
(431, 'Genética Jedi [Navidad 2017]', '2018-11-17 01:15:57'),
(433, 'Racimos de uvas [las 12 UVas 2017]', '2018-11-17 01:16:52'),
(434, 'Romance en el palomar [las 12 UVas 2017]', '2018-11-17 01:17:15'),
(435, 'El pijote [las 12 UVas 2017]', '2018-11-17 01:17:34'),
(436, 'Reto superado [las 12 UVas 2017]', '2018-11-17 01:17:51'),
(437, 'El anuncio más caro del año [las 12 UVas 2017]', '2018-11-17 01:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `alias` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `id_moodle` int(11) NOT NULL,
  `problemas` json NOT NULL,
  `tipo` enum('a','p') COLLATE utf16_spanish_ci NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`alias`, `nombre`, `id`, `id_moodle`, `problemas`, `tipo`) VALUES
('al-gonzarismi', 'Gonzalo', 12955, 18781, '[109, 117, 127, 144, 162, 168, 178, 180, 185, 196, 214, 222, 270, 340, 397, 401, 403, 405, 409, 411, 413, 427, 428, 433, 434, 436, 437, 442, 466, 467, 474, 475, 519]', 'a'),
('alphareticuli', 'Víctor', 64, 2460, '[109, 115, 122, 124, 129, 130, 132, 141, 142, 143, 144, 145, 149, 170, 177, 181, 184, 189, 198, 205, 207, 211, 236, 239, 241, 242, 264, 272, 324, 325, 332, 343, 369, 386, 395, 396, 399, 406, 416, 427, 428, 430, 431, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 474, 480, 481, 482, 483, 484, 485, 486, 488, 508, 516]', 'p'),
('Charlie_1199', 'Charlie', 12886, 18815, '[117, 427]', 'a'),
('Javivi', 'Javier', 12968, 18820, '[117, 180, 185, 188, 265, 340, 403, 405, 407, 411, 413, 427, 428, 433, 434, 442, 455, 456, 458, 460, 461, 466, 474]', 'a'),
('kalandrias', 'Jorge', 13015, 18765, '[100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 111, 112, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 216, 217, 219, 220, 221, 222, 223, 224, 225, 228, 229, 232, 233, 234, 235, 236, 237, 238, 239, 241, 242, 243, 244, 245, 246, 247, 249, 252, 254, 291, 332, 340, 342, 349, 365, 396, 397, 399, 402, 408, 410, 411, 413, 414, 427, 428, 429, 430, 431, 433, 434, 435, 436, 437, 440, 441, 442, 443, 444, 466, 467, 468, 474, 475, 477, 478, 479, 487, 491, 503, 508, 510, 511, 512, 513, 514, 515, 517, 524, 526, 528, 530]', 'a'),
('Notorio', 'Emilio', 535, 18331, '[116, 117, 119, 122, 124, 127, 140, 148, 158, 165, 166, 167, 179, 191, 195, 214, 236, 247]', 'a'),
('Raydol', 'David', 12765, 18772, '[100, 109, 117, 171, 185, 214, 340, 365, 416, 427, 428, 429, 433, 434, 436, 474, 475]', 'a'),
('Wulen5', 'Valentín', 5713, 18338, '[116, 117, 148, 178, 340, 427, 428, 433, 434, 436, 437]', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `problemas`
--
ALTER TABLE `problemas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`alias`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
