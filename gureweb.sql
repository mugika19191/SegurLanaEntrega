-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-10-2022 a las 17:06:46
-- Versión del servidor: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gureweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaile`
--

CREATE TABLE `erabiltzaile` (
  `izena` varchar(15) DEFAULT NULL,
  `abizena` varchar(20) DEFAULT NULL,
  `telefonoa` int(9) DEFAULT NULL,
  `mail` varchar(60) DEFAULT NULL,
  `nan` varchar(9) NOT NULL,
  `jaiotzeData` date NOT NULL,
  `pasahitza` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `erabiltzaile`
--

INSERT INTO `erabiltzaile` (`izena`, `abizena`, `telefonoa`, `mail`, `nan`, `jaiotzeData`, `pasahitza`) VALUES
('Iker', 'Mugica', 688650898, 'mugika1919@gmail.com', '79134291P', '2000-06-07', 'Password.123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `katalogo`
--

CREATE TABLE `katalogo` (
  `id` int(11) NOT NULL,
  `izen` varchar(50) NOT NULL,
  `egile` varchar(50) NOT NULL,
  `mota` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `deskribapen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `katalogo`
--

INSERT INTO `katalogo` (`id`, `izen`, `egile`, `mota`, `data`, `deskribapen`) VALUES
(1, 'Coda', 'Matias Bergara', 'Komiki', '2019-04-02', 'En un mundo fantástico post-apocalíptico donde un evento extraordinario acabó con casi toda la magia, un bardo antisocial de nombre Hum deambula por estas tierras acompañado por su enorme y peligroso unicornio mutante en busca de la salvación del alma de su esposa, y en el camino se cruzará con una serie de problemas que lo catapultarán al epicentro de una lucha por el poder político que intenta traccionar para dominar estos páramos salvajes.'),
(2, 'One piece', 'Eiichiro Oda', 'Manga', '1997-07-22', 'One Piece es la historia de un chico llamado Monkey D. Luffy, quién se inspiró en Shanks, un pirata que le salvó la vida, para convertirse en el Rey de los Piratas. Al comienzo de la serie, veinticuatro años antes de la historia actual, un pirata llamado Gol D. Roger, conocido como el Rey de los Piratas, fue ejecutado, pero antes de su muerte, le dijo a la multitud de su tesoro, el One Piece. Sus palabras desataron lo que sería conocida como «la Gran Era de la Piratería», innumerables piratas se dispusieron a buscar el tesoro causando grandes problemas al Gobierno Mundial. Monkey D. Luffy se convierte en uno de ellos, deseando ser el próximo Rey de los Piratas y se dispone a reunir compañeros de tripulación y comenzar sus aventuras. '),
(3, 'Shin Chan Los adultos contraatacan', 'Shin-Ei Animation', 'Film', '2001-04-21', 'El espectacular \"Parque del Siglo XX\" es el lugar ideal para que los adultos recuperen los momentos más felices de sus vidas. Sus creadores, Ken y Chako, son dos nostálgicos empeñados en reconstruir las formas de vida de hace décadas. Para ello han creado una sustancia que hipnotiza a los adultos y los atrae hacia una ciudad que recrea el siglo pasado. El ejército de Kasukabe, liderado por Shin Chan, emprende una nueva misión: averiguar qué está pasando y traer de vuelta a los adultos. En su aventura les esperan peligros, situaciones delirantes y acción frenética.'),
(4, 'Step by Bloody Step', 'Matias Bergara', 'Komiki', '2022-02-23', 'An armored giant and a helpless child. Together they cross an astonishing world brimming with beasts, bandits, and-deadliest by far-civilizations... If they stop walking, the earth itself forces them onwards. WHY? The child can\'t ask. She and her guardian have no language, no memory, nothing-except each other.\r\nMultiple-Eisner nominees SI SPURRIER (X-Men), MATIAS BERGARA (Coda), and MATHEUS LOPES (Supergirl) present a watershed moment in modern comics: four double-length chapters of a bittersweet fantasy opus, completely text free.\r\nLet\'s take a walk.'),
(5, 'Vagabond', 'Takehiko Inoue', 'Manga', '1998-09-17', 'Año 1600. Honiden Matahachi y Shinmen Takezo, compañeros de armas y amigos desde la infancia, son dos de los pocos supervivientes de la decisiva y sangrienta batalla de Sekigahara. Todo ello a pesar de haber participado del bando perdedor que representaba los derechos de Toyotomi Hideyori en contra de Tokugawa Ieyasu, un importante daimyō que se alzará con la victoria final y que acabará unificando el país y estableciendo el shogunato Tokugawa. Shinmen Takezo, también conocido como Musashi Miyamoto, lleva la violencia en la sangre pero después de regresar a su aldea y conocer al monje Takuan decidirá iniciar una nueva vida en una constante búsqueda de autoconocimiento y superación. Desde ese momento, Shinmen Takezo, vagará por el país enfrentándose a los más grandes expertos en el arte de la espada y de las artes marciales que se crucen en su camino en un periplo destinado a convertirle en toda una leyenda.'),
(6, 'Vinland Saga', 'Makoto Yukimura', 'Manga', '2005-04-13', 'Thorfinn es el hijo de uno de los mejores guerreros vikingos, pero cuando su padre es asesinado en batalla por un líder mercenario llamado Askeladd, éste jura venganza. Thorfinn se une en secreto al grupo de Askeladd en orden de retarle en duelo, pero acaba en medio de la guerra por la corona de Inglaterra.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `user` varchar(50) NOT NULL,
  `item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`user`, `item`) VALUES
('79134291P', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `erabiltzaile`
--
ALTER TABLE `erabiltzaile`
  ADD PRIMARY KEY (`nan`);

--
-- Indices de la tabla `katalogo`
--
ALTER TABLE `katalogo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`user`,`item`),
  ADD KEY `item` (`item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `katalogo`
--
ALTER TABLE `katalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`user`) REFERENCES `erabiltzaile` (`nan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perfil_ibfk_2` FOREIGN KEY (`item`) REFERENCES `katalogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
