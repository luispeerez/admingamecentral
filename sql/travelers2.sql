-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2012 a las 19:43:33
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6-1+lenny10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `travelers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `last_name` varchar(45) default NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone` varchar(15) default NULL,
  `create_date` timestamp NULL default CURRENT_TIMESTAMP,
  `access_date` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `last_name`, `email`, `password`, `phone`, `create_date`, `access_date`) VALUES
(3, 'admin', NULL, 'admin', '098f6bcd4621d373cade4e832627b4f6', NULL, '2012-11-05 00:14:23', '2012-11-05 00:14:23'),
(4, 'Pepe', 'Fernandez', 'jack_d84@hotmail.com', 'bc3e3744a2bad83d2ad972eefc3fed6c', '9841299664', '2012-12-16 20:25:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) NOT NULL auto_increment,
  `domain_name` varchar(300) collate utf8_unicode_ci NOT NULL,
  `package` int(10) default NULL,
  `facebook` varchar(200) collate utf8_unicode_ci default NULL,
  `twitter` varchar(200) collate utf8_unicode_ci default NULL,
  `phone` varchar(20) collate utf8_unicode_ci default NULL,
  `background_color` varchar(10) collate utf8_unicode_ci default NULL,
  `background_img` varchar(10) collate utf8_unicode_ci default NULL,
  `container_color` varchar(10) collate utf8_unicode_ci default NULL,
  `container_img` varchar(10) collate utf8_unicode_ci default NULL,
  `font_color` varchar(10) collate utf8_unicode_ci default NULL,
  `footer_color` varchar(10) collate utf8_unicode_ci default NULL,
  `footer_img` varchar(10) collate utf8_unicode_ci default NULL,
  `box_color` varchar(10) collate utf8_unicode_ci default NULL,
  `date_color` varchar(10) collate utf8_unicode_ci default NULL,
  `logo` varchar(100) collate utf8_unicode_ci default NULL,
  `title` varchar(200) collate utf8_unicode_ci default NULL,
  `meta_description` text collate utf8_unicode_ci,
  `email` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `domains`
--

INSERT INTO `domains` (`id`, `domain_name`, `package`, `facebook`, `twitter`, `phone`, `background_color`, `background_img`, `container_color`, `container_img`, `font_color`, `footer_color`, `footer_img`, `box_color`, `date_color`, `logo`, `title`, `meta_description`, `email`) VALUES
(4, 'www.cancunofertas.com', 4, NULL, NULL, '01800.56.54.33', '000000', '4.png', 'ffffff', '4.png', 'faa72a', '030303', '4.png', '5c91fa', '69a3e0', '4.png', 'Compras.com', 'Esta es la meta description de compras.com', 'erick@spaceshiplabs.com'),
(5, 'dominio.com', 0, 'facebook.com/spaceshiplabs', 'facebook.com/spaceshiplabs', '998843413', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5.jpg', 'El mejor paquete de todos', 'mejor promocion del mundo estratosferico', 'daniel.yanez.g@gmail.com'),
(6, 'dominioprueba.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'ritzcarlton', 5, 'http://www.facebook.com/pepe.fernandez.3386', 'twitter.com/ritz', '9988843413', 'b80909', NULL, '1a1414', NULL, 'ffffff', '854013', NULL, 'e620e6', 'f5f5f5', '7.jpg', 'El paquete mas cachondo on line', 'Es un hotel de lujo con muchisimos amenities para todos.', 'ventas@ritzcarlton.com'),
(8, 'pepediscounts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domain_packages`
--

CREATE TABLE IF NOT EXISTS `domain_packages` (
  `id` int(10) NOT NULL auto_increment,
  `domain` int(10) NOT NULL,
  `package` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Volcar la base de datos para la tabla `domain_packages`
--

INSERT INTO `domain_packages` (`id`, `domain`, `package`) VALUES
(11, 5, 2),
(12, 5, 3),
(13, 5, 4),
(15, 6, 2),
(16, 4, 3),
(20, 4, 4),
(21, 4, 2),
(27, 7, 2),
(28, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(400) collate utf8_unicode_ci NOT NULL,
  `name_display` varchar(400) collate utf8_unicode_ci NOT NULL,
  `description_es` text collate utf8_unicode_ci,
  `description_en` text collate utf8_unicode_ci,
  `video` varchar(350) collate utf8_unicode_ci default NULL,
  `map` text collate utf8_unicode_ci,
  `email` varchar(100) collate utf8_unicode_ci default NULL,
  `phone` varchar(50) collate utf8_unicode_ci default NULL,
  `address` varchar(400) collate utf8_unicode_ci default NULL,
  `web` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `name_display`, `description_es`, `description_en`, `video`, `map`, `email`, `phone`, `address`, `web`) VALUES
(5, 'El dorado Royale', 'El Dorado Royale', 'Maravillosa propiedad', 'Amazing property', '<iframe width="307" height="230" src="http://www.youtube.com/embed/BAkakDG9VTQ" frameborder="0" allowfullscreen></iframe>', '<iframe width="307" height="230" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps?ie=UTF8&q=mapa+Hotel+El+Dorado+Royale+en+la+Riviera+Maya&fb=1&gl=mx&hq=Hotel+El+Dorado+Royale&hnear=0x8f4e4d76264b36e3:0x7db660e55fb2bd60,Riviera+Maya,+Tulum,+QROO&cid=0,0,2685192348210858926&ll=20.723339,-86.978347&spn=0.006295,0.006295&t=m&iwloc=A&output=embed"></iframe>', 'reservaciones@elpatron.com', '98754326', NULL, 'www.elpatron.com'),
(6, 'Aldea Resorts', 'Aldea Resorts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Cerezas Resort', 'El cerezas', 'privacidad absoluta, confort al alcance de su bolsillo', 'absolute privacy, more for your money', 'http://www.youtube.com/watch?v=_xIbwqcxCqg', NULL, 'panchocachondo@cerezas.com', '9876543245', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel_photos`
--

CREATE TABLE IF NOT EXISTS `hotel_photos` (
  `id` int(10) NOT NULL auto_increment,
  `hotel` int(10) NOT NULL,
  `photo` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `hotel_photos`
--

INSERT INTO `hotel_photos` (`id`, `hotel`, `photo`) VALUES
(9, 5, '9.jpg'),
(10, 5, '10.jpg'),
(11, 7, '11.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) NOT NULL auto_increment,
  `title_es` varchar(300) collate utf8_unicode_ci NOT NULL,
  `title_en` varchar(300) collate utf8_unicode_ci NOT NULL,
  `description_es` text collate utf8_unicode_ci,
  `description_en` text collate utf8_unicode_ci,
  `hotel` int(10) NOT NULL,
  `expiration_date` date default NULL,
  `price` varchar(200) collate utf8_unicode_ci NOT NULL,
  `discount` varchar(200) collate utf8_unicode_ci default NULL,
  `featured` varchar(10) collate utf8_unicode_ci default NULL,
  `conditions_es` text collate utf8_unicode_ci,
  `conditions_en` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `packages`
--

INSERT INTO `packages` (`id`, `title_es`, `title_en`, `description_es`, `description_en`, `hotel`, `expiration_date`, `price`, `discount`, `featured`, `conditions_es`, `conditions_en`) VALUES
(2, 'Cancun 4 Noches', 'Cancun 4 Nights', NULL, NULL, 5, '2012-12-28', '300', '50', NULL, NULL, NULL),
(3, 'Puerto morelos', 'puerto morelos', NULL, NULL, 5, '2012-11-28', '500', '10', '3.jpg', NULL, NULL),
(4, '6 Days 5 Nights', '6 dias 5 noches', 'Maravillosas vacaciones en la riviera maya', 'wonderful hollidays at the mayan riviera', 5, '2012-12-17', '3000', '95', '4.jpg', NULL, NULL),
(5, 'cerezas', 'cherries', '5 dias de placer', '5 days of pleasure', 7, '2012-12-18', '500', '45', '5.jpg', 'ser cachondo<span class="Apple-tab-span" style="white-space:pre">	</span>', 'be horny');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `package_photos`
--

CREATE TABLE IF NOT EXISTS `package_photos` (
  `id` int(10) NOT NULL auto_increment,
  `package` int(10) NOT NULL,
  `photo` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `package_photos`
--

INSERT INTO `package_photos` (`id`, `package`, `photo`) VALUES
(7, 4, '7.jpg'),
(8, 4, '8.jpg'),
(9, 4, '9.jpg'),
(10, 4, '10.jpg'),
(11, 3, '11.jpg'),
(12, 3, '12.jpg'),
(13, 3, '13.jpg'),
(14, 5, '14.jpg'),
(15, 5, '15.jpg'),
(16, 5, '16.jpg'),
(17, 5, '17.jpg');
