-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 04:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `caja`
--

CREATE TABLE `caja` (
  `iIdApertura` int(11) NOT NULL,
  `iIdUsuario` int(11) NOT NULL,
  `dFechaApertura` datetime DEFAULT NULL,
  `fMontoInicial` float DEFAULT NULL,
  `dFechaCierre` datetime DEFAULT NULL,
  `fMontoTotal` float DEFAULT '0',
  `sEstado` varchar(10) DEFAULT 'Abierto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caja`
--

INSERT INTO `caja` (`iIdApertura`, `iIdUsuario`, `dFechaApertura`, `fMontoInicial`, `dFechaCierre`, `fMontoTotal`, `sEstado`) VALUES
(1, 1, '2019-01-21 14:57:22', 557, '2020-11-21 15:06:11', 17821.5, 'Cerrado'),
(2, 1, '2019-02-21 15:06:42', 430, '2020-11-21 15:23:14', 74597.7, 'Cerrado'),
(3, 1, '2019-03-21 15:23:40', 559, '2020-11-21 15:29:55', 4359.62, 'Cerrado'),
(4, 1, '2019-04-21 15:30:49', 550, '2020-11-21 15:40:26', 33830.8, 'Cerrado'),
(5, 1, '2019-05-21 15:43:33', 445, '2020-11-21 15:50:40', 47319.7, 'Cerrado'),
(6, 1, '2019-06-21 15:51:28', 556.43, '2020-11-21 15:59:00', 100515, 'Cerrado'),
(7, 1, '2019-07-21 16:03:42', 550, '2020-11-21 16:10:05', 80710.9, 'Cerrado'),
(8, 1, '2019-08-21 16:10:43', 550, '2020-11-21 16:18:59', 17760.9, 'Cerrado'),
(9, 1, '2019-09-21 16:20:16', 550, '2020-11-21 16:26:05', 67111.3, 'Cerrado'),
(10, 1, '2019-10-21 16:26:28', 556, '2020-11-21 16:31:37', 23490.6, 'Cerrado'),
(11, 1, '2019-11-21 16:32:22', 550, '2020-11-21 16:39:00', 140137, 'Cerrado'),
(12, 1, '2019-12-21 16:40:28', 534, '2020-11-21 16:46:47', 39104.2, 'Cerrado'),
(13, 1, '2020-01-21 20:51:46', 558.98, '2020-11-21 20:56:33', 43063.7, 'Cerrado'),
(14, 1, '2020-02-21 20:56:51', 552.98, '2020-11-21 21:02:46', 53735.3, 'Cerrado'),
(15, 1, '2020-03-21 21:03:05', 551.45, '2020-11-21 21:08:55', 14963.8, 'Cerrado'),
(16, 1, '2020-04-21 21:09:52', 555.99, '2020-11-21 21:18:07', 17346.8, 'Cerrado'),
(17, 1, '2020-05-21 21:18:34', 552.45, '2020-11-21 21:24:10', 220730, 'Cerrado'),
(18, 1, '2020-06-21 21:25:05', 553.99, '2020-11-21 21:32:09', 25142.5, 'Cerrado'),
(19, 1, '2020-07-21 21:35:31', 550, '2020-11-21 21:41:15', 21748.9, 'Cerrado'),
(20, 1, '2020-08-21 21:45:50', 550, '2020-11-21 21:51:50', 51262.8, 'Cerrado'),
(21, 1, '2020-09-21 21:56:22', 559.99, '2020-11-21 22:02:13', 23094.4, 'Cerrado'),
(22, 1, '2020-10-21 22:03:36', 557.99, '2020-11-21 22:11:44', 36691.5, 'Cerrado'),
(23, 1, '2020-11-21 22:13:28', 550.45, '2020-11-21 22:25:28', 148298, 'Cerrado');

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `iIdCarrito` int(11) NOT NULL,
  `iIdUsuario` int(11) NOT NULL,
  `dFecha` datetime DEFAULT NULL,
  `sEstado` varchar(50) DEFAULT NULL,
  `fTotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`iIdCarrito`, `iIdUsuario`, `dFecha`, `sEstado`, `fTotal`) VALUES
(48, 3, '2020-11-18 18:23:24', 'En Curso', '8018.01'),
(70, 2, '2020-11-20 19:24:11', 'En Curso', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `iIdCategoria` int(11) NOT NULL,
  `sNombre` varchar(100) DEFAULT NULL,
  `sDescripcion` varchar(400) DEFAULT NULL,
  `dFechaAlta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`iIdCategoria`, `sNombre`, `sDescripcion`, `dFechaAlta`) VALUES
(3, 'Entrantes', 'CategorÃ­a Ensaladas y Entrantes', '2020-09-12 20:01:41'),
(4, 'Croquetas', 'CategorÃ­a Croquetas', '2020-07-02 21:18:03'),
(5, 'Cuchara', 'CategorÃ­a De Cuchara', '2020-07-02 21:18:18'),
(6, 'Arroces y Pastas', 'CategorÃ­a Arroces y Pastas', '2020-07-02 21:18:27'),
(7, 'Pescados', 'CategorÃ­a Pescados', '2020-07-02 21:17:08'),
(8, 'Carnes', 'CategorÃ­a Carnes', '2020-07-02 21:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `iIdComentario` int(11) NOT NULL,
  `iIdUsuario` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL,
  `sTitulo` varchar(100) DEFAULT NULL,
  `sTexto` varchar(400) DEFAULT NULL,
  `dFecha` datetime DEFAULT NULL,
  `iCalificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`iIdComentario`, `iIdUsuario`, `iIdPlatillo`, `sTitulo`, `sTexto`, `dFecha`, `iCalificacion`) VALUES
(1, 4, 2, 'Regular', 'Deja bastante que desear', '2020-09-28 17:39:43', 2),
(2, 1, 27, 'Bueno', 'Bastante interesante', '2020-09-28 17:44:11', 3),
(3, 4, 27, 'Muy Rico ', 'Muy Rico MenÃº, lo recomiendo', '2020-09-28 17:45:43', 4),
(4, 1, 2, 'Malo', 'No es lo que esperaba ', '2020-09-28 17:50:46', 3),
(5, 4, 1, 'Muy Bueno ', 'Lo recomiendo Mucho', '2020-09-28 18:53:49', 4),
(6, 4, 33, 'Excelente', 'Excelente MenÃº, muy recomendado ', '2020-09-28 19:56:06', 5),
(7, 4, 1, 'Excelente Platillo', 'Excelente Platillo, lo Recomiendo mucho ', '2020-09-28 21:01:06', 5),
(8, 2, 27, 'Muy bueno', 'Muy sabroso el menu', '2020-09-28 21:03:54', 5),
(9, 4, 34, 'Muy Buen Platillo', 'Muy Buen Platillo. lo recomiendo', '2020-09-28 21:04:22', 4),
(10, 2, 28, 'Muy bueno', 'Muy sabroso y ademÃ¡s saludable', '2020-09-28 21:06:06', 4),
(11, 4, 16, ' Bueno ', 'CumpliÃ³ mis expectativas, buen sabor ', '2020-09-28 21:06:09', 3),
(12, 4, 15, 'Regular', 'Deja mucho que desear', '2020-09-28 21:07:39', 2),
(13, 4, 13, 'Malo ', 'No me gustÃ³, podrÃ­a mejorar ', '2020-09-28 21:08:47', 1),
(14, 4, 9, 'Excelente Platillo', 'Excelente Platillo, lo Recomiendo mucho', '2020-09-28 21:10:19', 5),
(15, 4, 10, ' Muy Buen Platillo', 'Muy Buen Platillo. lo recomiendo ', '2020-09-28 21:11:31', 4),
(16, 2, 29, 'Muy sabroso', 'Uno de los mejores menÃºs', '2020-09-28 21:11:40', 5),
(17, 4, 11, 'Bueno ', 'CumpliÃ³ mis expectativas, buen sabor', '2020-09-28 21:12:33', 3),
(18, 2, 30, 'Delicioso', 'Muy bueno ', '2020-09-28 21:13:40', 4),
(19, 3, 1, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:16:38', 2),
(20, 3, 1, 'Muy Malo', 'La comida no es buena demora en la atenciÃ³n, lugar muy pequeÃ±o, demora en el plato, y no hay carta de vinos.', '2020-09-28 21:17:03', 1),
(21, 3, 2, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:17:30', 2),
(22, 3, 2, 'Muy Malo', 'La comida no es buena demora en la atenciÃ³n, lugar muy pequeÃ±o, demora en el plato, y no hay carta de vinos.', '2020-09-28 21:17:44', 1),
(23, 2, 31, 'No tan bueno', 'Esperaba un menÃº mÃ¡s sabroso', '2020-09-28 21:17:52', 3),
(24, 3, 3, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:18:17', 5),
(25, 3, 3, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:18:38', 4),
(26, 3, 4, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:19:51', 4),
(27, 3, 4, 'Buena', 'La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno.', '2020-09-28 21:20:16', 3),
(28, 3, 5, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:20:53', 4),
(29, 3, 5, 'Buena', 'La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno.', '2020-09-28 21:21:37', 3),
(30, 3, 6, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:22:18', 5),
(31, 3, 6, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:22:48', 4),
(32, 3, 7, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:23:19', 5),
(33, 3, 7, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:23:31', 4),
(34, 3, 8, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:24:04', 5),
(35, 3, 8, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:24:16', 5),
(36, 3, 9, 'Buena', 'La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno.', '2020-09-28 21:24:51', 3),
(37, 3, 9, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:25:08', 2),
(38, 3, 10, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:25:36', 5),
(39, 3, 10, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:25:48', 4),
(40, 3, 11, 'Muy Malo', 'La comida no es buena demora en la atenciÃ³n, lugar muy pequeÃ±o, demora en el plato, y no hay carta de vinos.', '2020-09-28 21:26:40', 1),
(41, 3, 11, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:26:56', 2),
(42, 2, 32, 'Muy bueno', 'La verdad que lo recomiendo, muy rico', '2020-09-28 21:27:02', 5),
(43, 3, 12, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:27:40', 2),
(44, 3, 12, 'Muy Buena Comida', 'La comida no es buena demora en la atenciÃ³n, lugar muy pequeÃ±o, demora en el plato, y no hay carta de vinos.', '2020-09-28 21:28:01', 1),
(45, 3, 13, 'Buena', 'La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno.', '2020-09-28 21:28:50', 3),
(46, 3, 13, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:29:10', 2),
(47, 2, 33, 'Exquisito', 'La verdad que lo recomiendo', '2020-09-28 21:29:48', 4),
(48, 3, 15, 'Buena', 'La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno.', '2020-09-28 21:29:54', 3),
(49, 1, 12, 'Excelente Platillo', 'Excelente Platillo, lo Recomiendo mucho ', '2020-09-28 21:30:20', 5),
(50, 3, 15, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:30:56', 2),
(51, 3, 16, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:33:18', 5),
(52, 1, 6, 'Muy Buen Platillo', 'Muy Buen Platillo. lo recomiendo ', '2020-09-28 21:33:35', 4),
(53, 3, 16, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:33:46', 4),
(54, 3, 34, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:34:13', 5),
(55, 3, 34, 'Muy Buena Comida', 'PequeÃ±o restaurante con muy buena comida y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:34:35', 4),
(56, 1, 7, 'Bueno ', 'CumpliÃ³ mis expectativas, buen sabor', '2020-09-28 21:34:40', 3),
(57, 2, 1, 'Sabroso', 'Buen plato ', '2020-09-28 21:36:20', 4),
(58, 1, 4, 'Regular ', 'Deja mucho que desear', '2020-09-28 21:37:44', 2),
(59, 1, 3, 'Malo ', 'No me gustÃ³, podrÃ­a mejorar ', '2020-09-28 21:38:19', 1),
(60, 2, 2, 'Horrible', 'Deja mucho que desear ', '2020-09-28 21:38:35', 1),
(61, 1, 8, 'Excelente Platillo', 'Excelente Platillo, lo Recomiendo mucho ', '2020-09-28 21:39:44', 5),
(62, 2, 3, 'Buen plato', 'Me gustÃ³ pero podrÃ­a mejorar', '2020-09-28 21:40:52', 3),
(63, 1, 28, 'Muy Buen MenÃº', 'Muy Buen Platillo, lo recomiendo mucho', '2020-09-28 21:41:22', 4),
(64, 1, 29, 'Excelente Platillo', 'Excelente Platillo, lo Recomiendo mucho ', '2020-09-28 21:42:00', 5),
(65, 1, 30, 'Muy Buen MenÃº', 'Muy Buen Platillo, lo recomiendo ', '2020-09-28 21:43:16', 4),
(66, 1, 31, 'Malo ', 'No me gustÃ³, podrÃ­a mejorar', '2020-09-28 21:43:50', 1),
(67, 3, 27, 'Muy Bueno', 'PequeÃ±o restaurante con excelente MenÃº y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:44:41', 4),
(68, 3, 27, 'Bueno', 'Estuvimos cenando un dÃ­a de diario y picando unos cuantos dÃ­as en la barra. El servicio un diez, profesional y amable, se agradece encontrar sitios asÃ­. La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno. Un restaurante muy recomendable para ir', '2020-09-28 21:45:13', 3),
(69, 1, 32, 'Bueno ', 'CumpliÃ³ mis expectativas, buen sabor', '2020-09-28 21:45:21', 3),
(70, 3, 28, 'Muy Bueno', 'PequeÃ±o restaurante con excelente MenÃº y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:45:49', 4),
(71, 2, 4, 'Exquisito', 'El postre muy bueno y lo recomiendo', '2020-09-28 21:45:50', 4),
(72, 3, 28, 'Bueno', 'Estuvimos cenando un dÃ­a de diario y picando unos cuantos dÃ­as en la barra. El servicio un diez, profesional y amable, se agradece encontrar sitios asÃ­. La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno. Un restaurante muy recomendable para ir', '2020-09-28 21:46:05', 3),
(73, 3, 29, 'Muy Bueno', 'PequeÃ±o restaurante con excelente MenÃº y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:46:36', 4),
(74, 3, 29, 'Bueno', 'Estuvimos cenando un dÃ­a de diario y picando unos cuantos dÃ­as en la barra. El servicio un diez, profesional y amable, se agradece encontrar sitios asÃ­. La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno. Un restaurante muy recomendable para ir', '2020-09-28 21:46:48', 3),
(75, 1, 33, 'Muy Buen MenÃº', 'Muy Buen MenÃº, lo recomiendo', '2020-09-28 21:46:56', 4),
(76, 2, 5, 'Buen plato', 'Sabroso pero podrÃ­a mejorar', '2020-09-28 21:47:16', 4),
(77, 3, 30, 'Malo', 'La comida buena el lugar es pequeÃ±o y no hay carta de vinos.', '2020-09-28 21:47:20', 2),
(78, 3, 30, 'Bueno', 'Estuvimos cenando un dÃ­a de diario y picando unos cuantos dÃ­as en la barra. El servicio un diez, profesional y amable, se agradece encontrar sitios asÃ­. La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno. Un restaurante muy recomendable para ir', '2020-09-28 21:47:36', 3),
(79, 3, 31, 'Muy Bueno', 'PequeÃ±o restaurante con excelente MenÃº y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:48:02', 4),
(80, 3, 31, 'Bueno', 'Estuvimos cenando un dÃ­a de diario y picando unos cuantos dÃ­as en la barra. El servicio un diez, profesional y amable, se agradece encontrar sitios asÃ­. La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno. Un restaurante muy recomendable para ir', '2020-09-28 21:48:16', 3),
(81, 3, 32, 'Muy Bueno', 'PequeÃ±o restaurante con excelente MenÃº y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:48:55', 4),
(82, 3, 32, 'Bueno', 'Estuvimos cenando un dÃ­a de diario y picando unos cuantos dÃ­as en la barra. El servicio un diez, profesional y amable, se agradece encontrar sitios asÃ­. La comida buena, a destacar la palometa escabechada, los chipirones con puesto verde, platos deliciosos, el resto de platos estÃ¡n ricos tambiÃ©n. El postre muy bueno. Un restaurante muy recomendable para ir', '2020-09-28 21:49:13', 3),
(83, 3, 33, 'Excelente', 'HacÃ­a tiempo que no comÃ­amos algo tan bueno y de tanta calidad. Si es cierto que el sitio se hace un poco pequeÃ±o y dÃ­as de fin de semana seguramente se llene mucho. Pero la comida es excelente, cada plato que pruebas, hace que quieras probar otro que saca a otros comensales. Un sitio muy recomendado.', '2020-09-28 21:49:42', 5),
(84, 3, 33, 'Muy Bueno', 'PequeÃ±o restaurante con excelente MenÃº y mejor trato. Sus Guisos de rabo de toro callos y pollo de corral son espectaculares.', '2020-09-28 21:49:59', 4),
(85, 2, 6, 'Excelente', 'Muy buena la croqueta ademÃ¡s casera y sabrosa', '2020-09-28 21:50:53', 5),
(86, 2, 7, 'Buen plato', 'Saludable y ademÃ¡s sabroso', '2020-09-28 21:53:12', 4),
(87, 2, 9, 'Delicioso', 'Uno de mis platos favoritos, lo recomiendo mucho', '2020-09-28 21:54:49', 5),
(88, 2, 10, 'Plato ideal al estilo de la abuela', 'Lo recomiendo bastante', '2020-09-28 21:56:17', 4),
(89, 2, 11, 'Horrible', 'La verdad que no cumpliÃ³ mis expectativas, me decepcionÃ³', '2020-09-28 21:58:18', 1),
(90, 2, 12, 'Horrible', 'El plato me decepcionÃ³', '2020-09-28 22:01:21', 2),
(91, 2, 13, 'No es tan bueno', 'La verdad no es lo que esperaba', '2020-09-28 22:02:39', 3),
(92, 2, 15, 'Sabroso', 'Lo recomiendo pero podrÃ­a mejorar', '2020-09-28 22:03:33', 4),
(93, 2, 15, 'Sabroso', 'Lo recomiendo pero podrÃ­a mejorar', '2020-09-28 22:03:34', 4),
(94, 2, 34, 'Lo mejor del restaurant ', 'Esta vez se pasaron, una de las mejores pizzas que he probado ', '2020-09-28 22:09:06', 5),
(95, 3, 3, 'Bueno Platillo', 'Estoy muy conforme ', '2020-10-05 14:43:02', 3),
(96, 3, 30, ' Buen MenÃº', 'CumpliÃ³ mis expectativas', '2020-10-05 14:48:56', 3),
(97, 6, 10, 'Una cagada', 'Esto es una cagada', '2020-10-28 17:01:58', 3),
(98, 1, 5, 'My Bueno', 'Buen Platillo', '2020-10-30 16:56:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `iIdCompra` int(11) NOT NULL,
  `iIdProveedor` int(11) NOT NULL,
  `dFecha` datetime DEFAULT NULL,
  `fTotal` decimal(15,2) DEFAULT '0.00',
  `iIdPago` int(11) NOT NULL,
  `iIdApertura` int(11) NOT NULL,
  `iIdTipo_Operacion` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`iIdCompra`, `iIdProveedor`, `dFecha`, `fTotal`, `iIdPago`, `iIdApertura`, `iIdTipo_Operacion`) VALUES
(1, 1, '2019-01-21 15:03:21', '1182.85', 2, 1, 1),
(2, 1, '2019-01-21 15:03:34', '3364.05', 1, 1, 1),
(3, 1, '2019-02-21 15:12:40', '3687.12', 1, 2, 1),
(4, 1, '2019-02-21 15:12:50', '159.92', 1, 2, 1),
(5, 1, '2019-02-21 15:13:00', '159.92', 2, 2, 1),
(6, 1, '2019-02-21 15:13:11', '811.86', 3, 2, 1),
(7, 2, '2019-03-21 15:28:59', '15053.34', 2, 3, 1),
(8, 1, '2019-04-21 15:38:47', '1169.10', 2, 4, 1),
(9, 2, '2019-04-21 15:38:59', '1030.74', 1, 4, 1),
(10, 3, '2019-04-21 15:39:10', '2825.37', 2, 4, 1),
(11, 1, '2019-05-21 15:48:48', '4403.65', 1, 5, 1),
(12, 1, '2019-05-21 15:49:05', '4403.65', 1, 5, 1),
(13, 1, '2019-05-21 15:49:17', '2613.21', 2, 5, 1),
(14, 3, '2019-06-21 15:58:18', '4436.07', 2, 6, 1),
(15, 2, '2019-06-21 15:58:30', '4140.63', 3, 6, 1),
(16, 2, '2019-07-21 16:09:39', '6030.23', 2, 7, 1),
(17, 1, '2019-08-21 16:18:13', '1285.60', 1, 8, 1),
(18, 3, '2019-08-21 16:18:25', '1140.53', 2, 8, 1),
(19, 2, '2019-08-21 16:18:34', '4297.18', 1, 8, 1),
(20, 3, '2019-08-21 16:18:43', '173.94', 1, 8, 1),
(21, 2, '2019-09-21 16:25:17', '6243.21', 2, 9, 1),
(22, 1, '2019-09-21 16:25:28', '3649.32', 2, 9, 1),
(23, 1, '2019-10-21 16:30:38', '13265.10', 2, 10, 1),
(24, 2, '2019-11-21 16:37:34', '4167.34', 1, 11, 1),
(25, 1, '2019-11-21 16:37:44', '2784.90', 1, 11, 1),
(26, 3, '2019-11-21 16:37:58', '6032.90', 2, 11, 1),
(27, 3, '2019-11-21 16:38:10', '6032.90', 1, 11, 1),
(28, 1, '2019-12-21 16:45:36', '1719.32', 1, 12, 1),
(29, 3, '2019-12-21 16:46:01', '10807.87', 1, 12, 1),
(30, 1, '2020-01-21 20:55:36', '321.93', 1, 13, 1),
(31, 1, '2020-02-21 21:01:37', '2040.15', 1, 14, 1),
(32, 3, '2020-02-21 21:01:48', '4083.08', 2, 14, 1),
(33, 2, '2020-02-21 21:01:59', '4903.47', 3, 14, 1),
(34, 3, '2020-03-21 21:07:49', '12753.33', 2, 15, 1),
(35, 1, '2020-03-21 21:08:02', '1559.22', 3, 15, 1),
(36, 2, '2020-04-21 21:16:39', '1558.65', 2, 16, 1),
(37, 2, '2020-04-21 21:17:25', '936.33', 1, 16, 1),
(38, 3, '2020-04-21 21:17:36', '3545.10', 2, 16, 1),
(39, 1, '2020-04-21 21:17:48', '7004.33', 3, 16, 1),
(40, 2, '2020-05-21 21:23:34', '1629.33', 1, 17, 1),
(41, 3, '2020-05-21 21:23:45', '1712.95', 2, 17, 1),
(42, 1, '2020-06-21 21:30:57', '3193.10', 2, 18, 1),
(43, 2, '2020-06-21 21:31:09', '683.94', 3, 18, 1),
(44, 2, '2020-06-21 21:31:21', '683.94', 2, 18, 1),
(45, 3, '2020-06-21 21:31:33', '3063.30', 2, 18, 1),
(46, 2, '2020-07-21 21:39:23', '159.87', 2, 19, 1),
(47, 1, '2020-07-21 21:40:02', '670.50', 2, 19, 1),
(48, 3, '2020-07-21 21:40:14', '2725.17', 1, 19, 1),
(49, 2, '2020-08-21 21:51:16', '469.86', 1, 20, 1),
(50, 3, '2020-08-21 21:51:28', '1472.50', 2, 20, 1),
(51, 2, '2020-09-21 22:00:39', '306.91', 1, 21, 1),
(52, 2, '2020-09-21 22:00:52', '306.91', 2, 21, 1),
(53, 2, '2020-09-21 22:01:05', '217.65', 2, 21, 1),
(54, 2, '2020-09-21 22:01:17', '217.65', 3, 21, 1),
(55, 2, '2020-10-21 22:10:54', '410.97', 2, 22, 1),
(56, 2, '2020-10-21 22:11:07', '386.67', 3, 22, 1),
(57, 2, '2020-10-21 22:11:19', '386.67', 3, 22, 1),
(58, 3, '2020-11-21 22:23:54', '303.93', 2, 23, 1),
(59, 3, '2020-11-21 22:24:12', '1194.57', 2, 23, 1),
(60, 2, '2020-11-21 22:24:27', '8258.19', 2, 23, 1),
(61, 2, '2020-11-21 22:24:49', '912.73', 2, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_carrito`
--

CREATE TABLE `detalle_carrito` (
  `iIdDetalle_Carrito` int(11) NOT NULL,
  `iIdCarrito` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL,
  `iCantidad` int(11) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `fSubtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_carrito`
--

INSERT INTO `detalle_carrito` (`iIdDetalle_Carrito`, `iIdCarrito`, `iIdPlatillo`, `iCantidad`, `fPrecio`, `fSubtotal`) VALUES
(33, 70, 6, 3, '138.99', '416.97'),
(35, 70, 33, 2, '1500.00', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `iIdDetalle_Compra` int(11) NOT NULL,
  `iIdCompra` int(11) NOT NULL,
  `iIdInsumo` int(11) NOT NULL,
  `iCantidad` int(11) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `fSubtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_compra`
--

INSERT INTO `detalle_compra` (`iIdDetalle_Compra`, `iIdCompra`, `iIdInsumo`, `iCantidad`, `fPrecio`, `fSubtotal`) VALUES
(1, 1, 5, 13, '12.99', '168.87'),
(2, 1, 21, 27, '30.99', '836.73'),
(3, 1, 30, 5, '35.45', '177.25'),
(4, 2, 3, 12, '45.99', '551.88'),
(5, 2, 6, 23, '15.99', '367.77'),
(6, 2, 15, 36, '67.90', '2444.40'),
(7, 3, 24, 8, '110.99', '887.92'),
(8, 3, 46, 80, '34.99', '2799.20'),
(9, 4, 2, 8, '19.99', '159.92'),
(10, 5, 2, 8, '19.99', '159.92'),
(11, 6, 6, 7, '15.99', '111.93'),
(12, 6, 35, 7, '99.99', '699.93'),
(13, 7, 1, 87, '29.99', '2609.13'),
(14, 7, 33, 89, '99.99', '8899.11'),
(15, 7, 28, 78, '45.45', '3545.10'),
(16, 8, 44, 90, '12.99', '1169.10'),
(17, 9, 24, 6, '110.99', '665.94'),
(18, 9, 13, 8, '45.60', '364.80'),
(19, 10, 3, 31, '45.99', '1425.69'),
(20, 10, 26, 20, '15.99', '319.80'),
(21, 10, 16, 12, '89.99', '1079.88'),
(22, 11, 18, 40, '69.99', '2799.60'),
(23, 11, 13, 12, '45.60', '547.20'),
(24, 11, 34, 23, '45.95', '1056.85'),
(25, 12, 18, 40, '69.99', '2799.60'),
(26, 12, 13, 12, '45.60', '547.20'),
(27, 12, 34, 23, '45.95', '1056.85'),
(28, 13, 6, 34, '15.99', '543.66'),
(29, 13, 20, 45, '45.99', '2069.55'),
(30, 14, 4, 6, '60.99', '365.94'),
(31, 14, 18, 7, '69.99', '489.93'),
(32, 14, 17, 78, '45.90', '3580.20'),
(33, 15, 18, 6, '69.99', '419.94'),
(34, 15, 19, 8, '145.99', '1167.92'),
(35, 15, 24, 23, '110.99', '2552.77'),
(36, 16, 2, 32, '19.99', '639.68'),
(37, 16, 22, 12, '45.99', '551.88'),
(38, 16, 33, 23, '99.99', '2299.77'),
(39, 16, 11, 42, '60.45', '2538.90'),
(40, 17, 6, 6, '15.99', '95.94'),
(41, 17, 32, 34, '34.99', '1189.66'),
(42, 18, 24, 7, '110.99', '776.93'),
(43, 18, 28, 8, '45.45', '363.60'),
(44, 19, 29, 67, '55.90', '3745.30'),
(45, 19, 20, 12, '45.99', '551.88'),
(46, 20, 4, 2, '60.99', '121.98'),
(47, 20, 5, 4, '12.99', '51.96'),
(48, 21, 18, 45, '69.99', '3149.55'),
(49, 21, 39, 34, '90.99', '3093.66'),
(50, 22, 1, 45, '29.99', '1349.55'),
(51, 22, 33, 23, '99.99', '2299.77'),
(52, 23, 3, 67, '45.99', '3081.33'),
(53, 23, 23, 89, '49.99', '4449.11'),
(54, 23, 28, 23, '45.45', '1045.35'),
(55, 23, 40, 34, '67.99', '2311.66'),
(56, 23, 34, 34, '45.95', '1562.30'),
(57, 23, 30, 23, '35.45', '815.35'),
(58, 24, 2, 34, '19.99', '679.66'),
(59, 24, 42, 32, '108.99', '3487.68'),
(60, 25, 21, 45, '30.99', '1394.55'),
(61, 25, 11, 23, '60.45', '1390.35'),
(62, 26, 2, 56, '19.99', '1119.44'),
(63, 26, 39, 54, '90.99', '4913.46'),
(64, 27, 2, 56, '19.99', '1119.44'),
(65, 27, 39, 54, '90.99', '4913.46'),
(66, 28, 2, 23, '19.99', '459.77'),
(67, 28, 6, 33, '15.99', '527.67'),
(68, 28, 4, 12, '60.99', '731.88'),
(69, 29, 16, 56, '89.99', '5039.44'),
(70, 29, 19, 34, '145.99', '4963.66'),
(71, 29, 32, 23, '34.99', '804.77'),
(72, 30, 3, 7, '45.99', '321.93'),
(73, 31, 10, 67, '30.45', '2040.15'),
(74, 32, 15, 6, '67.90', '407.40'),
(75, 32, 14, 23, '120.88', '2780.24'),
(76, 32, 6, 56, '15.99', '895.44'),
(77, 33, 2, 34, '19.99', '679.66'),
(78, 33, 4, 54, '60.99', '3293.46'),
(79, 33, 12, 23, '40.45', '930.35'),
(80, 34, 3, 78, '45.99', '3587.22'),
(81, 34, 37, 89, '102.99', '9166.11'),
(82, 35, 2, 78, '19.99', '1559.22'),
(83, 36, 4, 23, '60.99', '1402.77'),
(84, 36, 5, 12, '12.99', '155.88'),
(85, 37, 44, 45, '12.99', '584.55'),
(86, 37, 6, 22, '15.99', '351.78'),
(87, 38, 28, 78, '45.45', '3545.10'),
(88, 39, 12, 78, '40.45', '3155.10'),
(89, 39, 23, 77, '49.99', '3849.23'),
(90, 40, 3, 23, '45.99', '1057.77'),
(91, 40, 5, 44, '12.99', '571.56'),
(92, 41, 10, 45, '30.45', '1370.25'),
(93, 41, 25, 23, '14.90', '342.70'),
(94, 42, 2, 56, '19.99', '1119.44'),
(95, 42, 4, 34, '60.99', '2073.66'),
(96, 43, 23, 2, '49.99', '99.98'),
(97, 43, 19, 4, '145.99', '583.96'),
(98, 44, 23, 2, '49.99', '99.98'),
(99, 44, 19, 4, '145.99', '583.96'),
(100, 45, 18, 36, '69.99', '2519.64'),
(101, 45, 6, 34, '15.99', '543.66'),
(102, 46, 5, 3, '12.99', '38.97'),
(103, 46, 11, 2, '60.45', '120.90'),
(104, 47, 25, 45, '14.90', '670.50'),
(105, 48, 30, 12, '35.45', '425.40'),
(106, 48, 33, 23, '99.99', '2299.77'),
(107, 49, 4, 6, '60.99', '365.94'),
(108, 49, 5, 8, '12.99', '103.92'),
(109, 50, 12, 6, '40.45', '242.70'),
(110, 50, 29, 22, '55.90', '1229.80'),
(111, 51, 1, 2, '29.99', '59.98'),
(112, 51, 4, 3, '60.99', '182.97'),
(113, 51, 6, 4, '15.99', '63.96'),
(114, 52, 1, 2, '29.99', '59.98'),
(115, 52, 4, 3, '60.99', '182.97'),
(116, 52, 6, 4, '15.99', '63.96'),
(117, 53, 6, 5, '15.99', '79.95'),
(118, 53, 17, 3, '45.90', '137.70'),
(119, 54, 6, 5, '15.99', '79.95'),
(120, 54, 17, 3, '45.90', '137.70'),
(121, 55, 4, 3, '60.99', '182.97'),
(122, 55, 13, 5, '45.60', '228.00'),
(123, 56, 4, 3, '60.99', '182.97'),
(124, 56, 15, 3, '67.90', '203.70'),
(125, 57, 4, 3, '60.99', '182.97'),
(126, 57, 15, 3, '67.90', '203.70'),
(127, 58, 2, 3, '19.99', '59.97'),
(128, 58, 4, 4, '60.99', '243.96'),
(129, 59, 13, 3, '45.60', '136.80'),
(130, 59, 20, 23, '45.99', '1057.77'),
(131, 60, 45, 23, '90.99', '2092.77'),
(132, 60, 37, 26, '102.99', '2677.74'),
(133, 60, 42, 32, '108.99', '3487.68'),
(134, 61, 23, 4, '49.99', '199.96'),
(135, 61, 21, 23, '30.99', '712.77');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `iIdDetalle_Pedido` int(11) NOT NULL,
  `iIdPedido` int(11) NOT NULL,
  `iIdInsumo` int(11) NOT NULL,
  `iCantidad` int(11) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `fSubtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`iIdDetalle_Pedido`, `iIdPedido`, `iIdInsumo`, `iCantidad`, `fPrecio`, `fSubtotal`) VALUES
(1, 1, 3, 12, '45.99', '551.88'),
(2, 1, 6, 23, '15.99', '367.77'),
(3, 1, 15, 36, '67.90', '2444.40'),
(4, 2, 5, 13, '12.99', '168.87'),
(5, 2, 21, 27, '30.99', '836.73'),
(6, 2, 30, 5, '35.45', '177.25'),
(7, 3, 6, 7, '15.99', '111.93'),
(8, 3, 35, 7, '99.99', '699.93'),
(9, 4, 2, 8, '19.99', '159.92'),
(10, 5, 2, 8, '19.99', '159.92'),
(11, 6, 24, 8, '110.99', '887.92'),
(12, 6, 46, 80, '34.99', '2799.20'),
(13, 7, 1, 87, '29.99', '2609.13'),
(14, 7, 33, 89, '99.99', '8899.11'),
(15, 7, 28, 78, '45.45', '3545.10'),
(16, 8, 3, 31, '45.99', '1425.69'),
(17, 8, 26, 20, '15.99', '319.80'),
(18, 8, 16, 12, '89.99', '1079.88'),
(19, 9, 24, 6, '110.99', '665.94'),
(20, 9, 13, 8, '45.60', '364.80'),
(21, 10, 44, 90, '12.99', '1169.10'),
(22, 11, 18, 40, '69.99', '2799.60'),
(23, 11, 13, 12, '45.60', '547.20'),
(24, 11, 34, 23, '45.95', '1056.85'),
(25, 12, 18, 40, '69.99', '2799.60'),
(26, 12, 13, 12, '45.60', '547.20'),
(27, 12, 34, 23, '45.95', '1056.85'),
(28, 13, 6, 34, '15.99', '543.66'),
(29, 13, 20, 45, '45.99', '2069.55'),
(30, 14, 4, 6, '60.99', '365.94'),
(31, 14, 18, 7, '69.99', '489.93'),
(32, 14, 17, 78, '45.90', '3580.20'),
(33, 15, 18, 6, '69.99', '419.94'),
(34, 15, 19, 8, '145.99', '1167.92'),
(35, 15, 24, 23, '110.99', '2552.77'),
(36, 16, 2, 32, '19.99', '639.68'),
(37, 16, 22, 12, '45.99', '551.88'),
(38, 16, 33, 23, '99.99', '2299.77'),
(39, 16, 11, 42, '60.45', '2538.90'),
(40, 17, 4, 2, '60.99', '121.98'),
(41, 17, 5, 4, '12.99', '51.96'),
(42, 18, 29, 67, '55.90', '3745.30'),
(43, 18, 20, 12, '45.99', '551.88'),
(44, 19, 24, 7, '110.99', '776.93'),
(45, 19, 28, 8, '45.45', '363.60'),
(46, 20, 6, 6, '15.99', '95.94'),
(47, 20, 32, 34, '34.99', '1189.66'),
(48, 21, 1, 45, '29.99', '1349.55'),
(49, 21, 33, 23, '99.99', '2299.77'),
(50, 22, 18, 45, '69.99', '3149.55'),
(51, 22, 39, 34, '90.99', '3093.66'),
(52, 23, 3, 67, '45.99', '3081.33'),
(53, 23, 23, 89, '49.99', '4449.11'),
(54, 23, 28, 23, '45.45', '1045.35'),
(55, 23, 40, 34, '67.99', '2311.66'),
(56, 23, 34, 34, '45.95', '1562.30'),
(57, 23, 30, 23, '35.45', '815.35'),
(58, 24, 2, 34, '19.99', '679.66'),
(59, 24, 42, 32, '108.99', '3487.68'),
(60, 25, 21, 45, '30.99', '1394.55'),
(61, 25, 11, 23, '60.45', '1390.35'),
(62, 26, 2, 56, '19.99', '1119.44'),
(63, 26, 39, 54, '90.99', '4913.46'),
(64, 27, 2, 56, '19.99', '1119.44'),
(65, 27, 39, 54, '90.99', '4913.46'),
(66, 28, 2, 23, '19.99', '459.77'),
(67, 28, 6, 33, '15.99', '527.67'),
(68, 28, 4, 12, '60.99', '731.88'),
(69, 29, 16, 56, '89.99', '5039.44'),
(70, 29, 19, 34, '145.99', '4963.66'),
(71, 29, 32, 23, '34.99', '804.77'),
(72, 30, 3, 7, '45.99', '321.93'),
(73, 31, 2, 34, '19.99', '679.66'),
(74, 31, 4, 54, '60.99', '3293.46'),
(75, 31, 12, 23, '40.45', '930.35'),
(76, 32, 15, 6, '67.90', '407.40'),
(77, 32, 14, 23, '120.88', '2780.24'),
(78, 32, 6, 56, '15.99', '895.44'),
(79, 33, 10, 67, '30.45', '2040.15'),
(80, 34, 3, 78, '45.99', '3587.22'),
(81, 34, 37, 89, '102.99', '9166.11'),
(82, 35, 2, 78, '19.99', '1559.22'),
(83, 36, 4, 23, '60.99', '1402.77'),
(84, 36, 5, 12, '12.99', '155.88'),
(85, 37, 44, 45, '12.99', '584.55'),
(86, 37, 6, 22, '15.99', '351.78'),
(87, 38, 12, 78, '40.45', '3155.10'),
(88, 38, 23, 77, '49.99', '3849.23'),
(89, 39, 28, 78, '45.45', '3545.10'),
(90, 40, 3, 23, '45.99', '1057.77'),
(91, 40, 5, 44, '12.99', '571.56'),
(92, 41, 10, 45, '30.45', '1370.25'),
(93, 41, 25, 23, '14.90', '342.70'),
(94, 42, 2, 56, '19.99', '1119.44'),
(95, 42, 4, 34, '60.99', '2073.66'),
(96, 43, 23, 2, '49.99', '99.98'),
(97, 43, 19, 4, '145.99', '583.96'),
(98, 44, 23, 2, '49.99', '99.98'),
(99, 44, 19, 4, '145.99', '583.96'),
(100, 45, 18, 36, '69.99', '2519.64'),
(101, 45, 6, 34, '15.99', '543.66'),
(102, 46, 5, 3, '12.99', '38.97'),
(103, 46, 11, 2, '60.45', '120.90'),
(104, 47, 30, 12, '35.45', '425.40'),
(105, 47, 33, 23, '99.99', '2299.77'),
(106, 48, 25, 45, '14.90', '670.50'),
(107, 49, 4, 6, '60.99', '365.94'),
(108, 49, 5, 8, '12.99', '103.92'),
(109, 50, 12, 6, '40.45', '242.70'),
(110, 50, 29, 22, '55.90', '1229.80'),
(111, 51, 1, 2, '29.99', '59.98'),
(112, 51, 4, 3, '60.99', '182.97'),
(113, 51, 6, 4, '15.99', '63.96'),
(114, 52, 1, 2, '29.99', '59.98'),
(115, 52, 4, 3, '60.99', '182.97'),
(116, 52, 6, 4, '15.99', '63.96'),
(117, 53, 6, 5, '15.99', '79.95'),
(118, 53, 17, 3, '45.90', '137.70'),
(119, 54, 6, 5, '15.99', '79.95'),
(120, 54, 17, 3, '45.90', '137.70'),
(121, 55, 4, 3, '60.99', '182.97'),
(122, 55, 13, 5, '45.60', '228.00'),
(123, 56, 4, 3, '60.99', '182.97'),
(124, 56, 15, 3, '67.90', '203.70'),
(125, 57, 4, 3, '60.99', '182.97'),
(126, 57, 15, 3, '67.90', '203.70'),
(127, 58, 2, 3, '19.99', '59.97'),
(128, 58, 4, 4, '60.99', '243.96'),
(129, 59, 13, 3, '45.60', '136.80'),
(130, 59, 20, 23, '45.99', '1057.77'),
(131, 60, 45, 23, '90.99', '2092.77'),
(132, 60, 37, 26, '102.99', '2677.74'),
(133, 60, 42, 32, '108.99', '3487.68'),
(134, 61, 23, 4, '49.99', '199.96'),
(135, 61, 21, 23, '30.99', '712.77');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iIdDetalle_Venta` int(11) NOT NULL,
  `iIdVenta` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL,
  `iCantidad` int(11) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `fSubtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`iIdDetalle_Venta`, `iIdVenta`, `iIdPlatillo`, `iCantidad`, `fPrecio`, `fSubtotal`) VALUES
(1, 1, 1, 10, '80.99', '809.90'),
(2, 1, 2, 10, '150.99', '1509.90'),
(3, 1, 3, 20, '140.99', '2819.80'),
(4, 1, 4, 22, '179.99', '3959.78'),
(5, 1, 5, 20, '200.99', '4019.80'),
(6, 1, 6, 15, '138.99', '2084.85'),
(7, 2, 11, 2, '200.99', '401.98'),
(8, 2, 15, 1, '130.99', '130.99'),
(9, 2, 8, 2, '155.99', '311.98'),
(10, 2, 6, 1, '138.99', '138.99'),
(11, 2, 9, 3, '120.45', '361.35'),
(12, 3, 16, 3, '145.99', '437.97'),
(13, 3, 31, 1, '699.99', '699.99'),
(14, 3, 10, 4, '125.99', '503.96'),
(15, 3, 28, 2, '545.99', '1091.98'),
(16, 4, 13, 23, '121.99', '2805.77'),
(17, 4, 9, 1, '120.45', '120.45'),
(18, 4, 32, 2, '550.99', '1101.98'),
(19, 5, 27, 20, '550.00', '11000.00'),
(20, 5, 28, 6, '545.99', '3275.94'),
(21, 6, 4, 10, '179.99', '1799.90'),
(22, 6, 8, 7, '155.99', '1091.93'),
(23, 6, 33, 6, '1500.00', '9000.00'),
(24, 6, 11, 6, '200.99', '1205.94'),
(25, 7, 13, 1, '121.99', '121.99'),
(26, 7, 16, 2, '145.99', '291.98'),
(27, 7, 29, 1, '460.45', '460.45'),
(28, 7, 11, 1, '200.99', '200.99'),
(29, 8, 12, 2, '120.99', '241.98'),
(30, 8, 1, 2, '80.99', '161.98'),
(31, 8, 11, 7, '200.99', '1406.93'),
(32, 8, 10, 5, '125.99', '629.95'),
(33, 9, 10, 18, '125.99', '2267.82'),
(34, 9, 16, 12, '145.99', '1751.88'),
(35, 9, 31, 34, '699.99', '23799.66'),
(36, 9, 34, 19, '186.54', '3544.26'),
(37, 9, 29, 22, '460.45', '10129.90'),
(38, 9, 12, 34, '120.99', '4113.66'),
(39, 10, 1, 1, '80.99', '80.99'),
(40, 10, 6, 5, '138.99', '694.95'),
(41, 10, 28, 1, '545.99', '545.99'),
(42, 10, 15, 3, '130.99', '392.97'),
(43, 10, 11, 5, '200.99', '1004.95'),
(44, 11, 3, 18, '140.99', '2537.82'),
(45, 11, 16, 23, '145.99', '3357.77'),
(46, 11, 8, 26, '155.99', '4055.74'),
(47, 11, 12, 17, '120.99', '2056.83'),
(48, 11, 28, 6, '545.99', '3275.94'),
(49, 11, 2, 31, '150.99', '4680.69'),
(50, 12, 10, 3, '125.99', '377.97'),
(51, 12, 4, 3, '179.99', '539.97'),
(52, 12, 12, 9, '120.99', '1088.91'),
(53, 12, 27, 2, '550.00', '1100.00'),
(54, 12, 31, 1, '699.99', '699.99'),
(55, 12, 28, 3, '545.99', '1637.97'),
(56, 13, 10, 3, '125.99', '377.97'),
(57, 13, 4, 3, '179.99', '539.97'),
(58, 13, 12, 9, '120.99', '1088.91'),
(59, 13, 27, 2, '550.00', '1100.00'),
(60, 13, 31, 1, '699.99', '699.99'),
(61, 13, 28, 3, '545.99', '1637.97'),
(62, 14, 3, 24, '140.99', '3383.76'),
(63, 14, 10, 12, '125.99', '1511.88'),
(64, 14, 12, 32, '120.99', '3871.68'),
(65, 15, 4, 20, '179.99', '3599.80'),
(66, 15, 8, 43, '155.99', '6707.57'),
(67, 15, 28, 34, '545.99', '18563.66'),
(68, 16, 4, 2, '179.99', '359.98'),
(69, 16, 31, 2, '699.99', '1399.98'),
(70, 16, 34, 2, '186.54', '373.08'),
(71, 16, 15, 1, '130.99', '130.99'),
(72, 17, 10, 1, '125.99', '125.99'),
(73, 17, 6, 2, '138.99', '277.98'),
(74, 18, 1, 22, '80.99', '1781.78'),
(75, 18, 16, 34, '145.99', '4963.66'),
(76, 18, 31, 45, '699.99', '31499.55'),
(77, 18, 15, 23, '130.99', '3012.77'),
(78, 18, 13, 55, '121.99', '6709.45'),
(79, 18, 27, 33, '550.00', '18150.00'),
(80, 19, 6, 2, '138.99', '277.98'),
(81, 19, 28, 3, '545.99', '1637.97'),
(82, 19, 15, 1, '130.99', '130.99'),
(83, 19, 32, 3, '550.99', '1652.97'),
(84, 20, 16, 2, '145.99', '291.98'),
(85, 20, 34, 1, '186.54', '186.54'),
(86, 21, 3, 78, '140.99', '10997.22'),
(87, 21, 6, 56, '138.99', '7783.44'),
(88, 21, 11, 78, '200.99', '15677.22'),
(89, 22, 33, 40, '1500.00', '60000.00'),
(90, 22, 16, 34, '145.99', '4963.66'),
(91, 22, 15, 34, '130.99', '4453.66'),
(92, 23, 34, 5, '186.54', '932.70'),
(93, 23, 29, 2, '460.45', '920.90'),
(94, 23, 12, 4, '120.99', '483.96'),
(95, 24, 27, 1, '550.00', '550.00'),
(96, 24, 11, 5, '200.99', '1004.95'),
(97, 25, 5, 4, '200.99', '803.96'),
(98, 25, 12, 3, '120.99', '362.97'),
(99, 26, 4, 45, '179.99', '8099.55'),
(100, 26, 31, 30, '699.99', '20999.70'),
(101, 26, 15, 23, '130.99', '3012.77'),
(102, 26, 1, 23, '80.99', '1862.77'),
(103, 26, 6, 34, '138.99', '4725.66'),
(104, 27, 4, 45, '179.99', '8099.55'),
(105, 27, 31, 30, '699.99', '20999.70'),
(106, 27, 15, 23, '130.99', '3012.77'),
(107, 27, 1, 23, '80.99', '1862.77'),
(108, 27, 6, 34, '138.99', '4725.66'),
(109, 28, 9, 12, '120.45', '1445.40'),
(110, 28, 33, 2, '1500.00', '3000.00'),
(111, 28, 16, 1, '145.99', '145.99'),
(112, 28, 28, 3, '545.99', '1637.97'),
(113, 28, 11, 2, '200.99', '401.98'),
(114, 28, 27, 4, '550.00', '2200.00'),
(115, 28, 34, 3, '186.54', '559.62'),
(116, 29, 1, 23, '80.99', '1862.77'),
(117, 29, 15, 45, '130.99', '5894.55'),
(118, 30, 16, 43, '145.99', '6277.57'),
(119, 30, 13, 34, '121.99', '4147.66'),
(120, 31, 15, 45, '130.99', '5894.55'),
(121, 31, 11, 21, '200.99', '4220.79'),
(122, 32, 10, 1, '125.99', '125.99'),
(123, 32, 32, 2, '550.99', '1101.98'),
(124, 33, 33, 3, '1500.00', '4500.00'),
(125, 33, 9, 1, '120.45', '120.45'),
(126, 34, 7, 1, '120.45', '120.45'),
(127, 34, 29, 4, '460.45', '1841.80'),
(128, 35, 2, 34, '150.99', '5133.66'),
(129, 35, 16, 49, '145.99', '7153.51'),
(130, 35, 15, 27, '130.99', '3536.73'),
(131, 35, 27, 34, '550.00', '18700.00'),
(132, 35, 32, 34, '550.99', '18733.66'),
(133, 35, 28, 33, '545.99', '18017.67'),
(134, 36, 4, 2, '179.99', '359.98'),
(135, 36, 27, 3, '550.00', '1650.00'),
(136, 36, 31, 3, '699.99', '2099.97'),
(137, 36, 9, 5, '120.45', '602.25'),
(138, 36, 1, 1, '80.99', '80.99'),
(139, 36, 12, 6, '120.99', '725.94'),
(140, 37, 2, 34, '150.99', '5133.66'),
(141, 37, 8, 45, '155.99', '7019.55'),
(142, 37, 10, 56, '125.99', '7055.44'),
(143, 37, 6, 34, '138.99', '4725.66'),
(144, 37, 16, 23, '145.99', '3357.77'),
(145, 37, 7, 44, '120.45', '5299.80'),
(146, 38, 13, 2, '121.99', '243.98'),
(147, 38, 31, 3, '699.99', '2099.97'),
(148, 38, 9, 2, '120.45', '240.90'),
(149, 39, 1, 1, '80.99', '80.99'),
(150, 39, 13, 2, '121.99', '243.98'),
(151, 39, 34, 5, '186.54', '932.70'),
(152, 40, 4, 8, '179.99', '1439.92'),
(153, 40, 28, 3, '545.99', '1637.97'),
(154, 40, 31, 2, '699.99', '1399.98'),
(155, 40, 16, 4, '145.99', '583.96'),
(156, 41, 1, 45, '80.99', '3644.55'),
(157, 41, 5, 23, '200.99', '4622.77'),
(158, 41, 33, 45, '1500.00', '67500.00'),
(159, 41, 34, 43, '186.54', '8021.22'),
(160, 42, 15, 2, '130.99', '261.98'),
(161, 42, 12, 4, '120.99', '483.96'),
(162, 43, 30, 87, '700.45', '60939.15'),
(163, 43, 28, 45, '545.99', '24569.55'),
(164, 44, 4, 24, '179.99', '4319.76'),
(165, 44, 16, 43, '145.99', '6277.57'),
(166, 44, 13, 23, '121.99', '2805.77'),
(167, 44, 34, 32, '186.54', '5969.28'),
(168, 44, 6, 35, '138.99', '4864.65'),
(169, 44, 27, 28, '550.00', '15400.00'),
(170, 45, 28, 2, '545.99', '1091.98'),
(171, 45, 33, 5, '1500.00', '7500.00'),
(172, 45, 32, 3, '550.99', '1652.97'),
(173, 45, 29, 2, '460.45', '920.90'),
(174, 45, 6, 3, '138.99', '416.97'),
(175, 45, 13, 1, '121.99', '121.99'),
(176, 46, 1, 20, '80.99', '1619.80'),
(177, 46, 2, 45, '150.99', '6794.55'),
(178, 46, 32, 34, '550.99', '18733.66'),
(179, 47, 9, 34, '120.45', '4095.30'),
(180, 47, 15, 45, '130.99', '5894.55'),
(181, 47, 2, 29, '150.99', '4378.71'),
(182, 48, 34, 2, '186.54', '373.08'),
(183, 48, 27, 2, '550.00', '1100.00'),
(184, 48, 12, 1, '120.99', '120.99'),
(185, 48, 6, 3, '138.99', '416.97'),
(186, 48, 15, 3, '130.99', '392.97'),
(187, 48, 10, 2, '125.99', '251.98'),
(188, 49, 4, 35, '179.99', '6299.65'),
(189, 49, 13, 78, '121.99', '9515.22'),
(190, 49, 1, 43, '80.99', '3482.57'),
(191, 49, 32, 34, '550.99', '18733.66'),
(192, 49, 34, 23, '186.54', '4290.42'),
(193, 49, 30, 33, '700.45', '23114.85'),
(194, 50, 31, 2, '699.99', '1399.98'),
(195, 50, 33, 5, '1500.00', '7500.00'),
(196, 50, 28, 2, '545.99', '1091.98'),
(197, 50, 16, 3, '145.99', '437.97'),
(198, 50, 9, 4, '120.45', '481.80'),
(199, 50, 7, 3, '120.45', '361.35'),
(200, 51, 1, 2, '80.99', '161.98'),
(201, 51, 2, 1, '150.99', '150.99'),
(202, 51, 3, 3, '140.99', '422.97'),
(203, 51, 4, 4, '179.99', '719.96'),
(204, 51, 5, 2, '200.99', '401.98'),
(205, 51, 6, 2, '138.99', '277.98'),
(206, 52, 10, 24, '125.99', '3023.76'),
(207, 52, 11, 23, '200.99', '4622.77'),
(208, 52, 8, 34, '155.99', '5303.66'),
(209, 52, 12, 34, '120.99', '4113.66'),
(210, 52, 13, 44, '121.99', '5367.56'),
(211, 52, 16, 37, '145.99', '5401.63'),
(212, 53, 2, 34, '150.99', '5133.66'),
(213, 53, 5, 23, '200.99', '4622.77'),
(214, 53, 7, 33, '120.45', '3974.85'),
(215, 53, 9, 26, '120.45', '3131.70'),
(216, 53, 15, 34, '130.99', '4453.66'),
(217, 53, 13, 23, '121.99', '2805.77'),
(218, 54, 27, 2, '550.00', '1100.00'),
(219, 54, 7, 4, '120.45', '481.80'),
(220, 54, 28, 1, '545.99', '545.99'),
(221, 54, 34, 2, '186.54', '373.08'),
(222, 54, 31, 2, '699.99', '1399.98'),
(223, 54, 32, 2, '550.99', '1101.98'),
(224, 55, 2, 5, '150.99', '754.95'),
(225, 55, 12, 2, '120.99', '241.98'),
(226, 56, 16, 1, '145.99', '145.99'),
(227, 57, 33, 23, '1500.00', '34500.00'),
(228, 57, 3, 33, '140.99', '4652.67'),
(229, 57, 34, 45, '186.54', '8394.30'),
(230, 57, 12, 28, '120.99', '3387.72'),
(231, 57, 27, 33, '550.00', '18150.00'),
(232, 57, 2, 22, '150.99', '3321.78'),
(233, 58, 33, 23, '1500.00', '34500.00'),
(234, 58, 3, 33, '140.99', '4652.67'),
(235, 58, 34, 45, '186.54', '8394.30'),
(236, 58, 12, 28, '120.99', '3387.72'),
(237, 58, 27, 33, '550.00', '18150.00'),
(238, 58, 2, 22, '150.99', '3321.78'),
(239, 59, 33, 23, '1500.00', '34500.00'),
(240, 59, 3, 33, '140.99', '4652.67'),
(241, 59, 34, 45, '186.54', '8394.30'),
(242, 59, 12, 28, '120.99', '3387.72'),
(243, 59, 27, 33, '550.00', '18150.00'),
(244, 59, 2, 22, '150.99', '3321.78'),
(245, 60, 1, 4, '80.99', '323.96'),
(246, 60, 9, 1, '120.45', '120.45'),
(247, 60, 10, 3, '125.99', '377.97'),
(248, 60, 8, 3, '155.99', '467.97'),
(249, 60, 33, 3, '1500.00', '4500.00'),
(250, 60, 34, 5, '186.54', '932.70'),
(251, 61, 16, 22, '145.99', '3211.78'),
(252, 61, 15, 34, '130.99', '4453.66'),
(253, 61, 13, 42, '121.99', '5123.58'),
(254, 61, 12, 43, '120.99', '5202.57'),
(255, 61, 11, 28, '200.99', '5627.72'),
(256, 61, 10, 31, '125.99', '3905.69'),
(257, 62, 8, 4, '155.99', '623.96'),
(258, 62, 7, 2, '120.45', '240.90'),
(259, 62, 6, 1, '138.99', '138.99'),
(260, 62, 5, 3, '200.99', '602.97'),
(261, 62, 4, 4, '179.99', '719.96'),
(262, 62, 31, 4, '699.99', '2799.96'),
(263, 63, 1, 35, '80.99', '2834.65'),
(264, 63, 4, 33, '179.99', '5939.67'),
(265, 63, 6, 25, '138.99', '3474.75'),
(266, 63, 9, 33, '120.45', '3974.85'),
(267, 63, 8, 28, '155.99', '4367.72'),
(268, 63, 11, 31, '200.99', '6230.69'),
(269, 64, 34, 5, '186.54', '932.70'),
(270, 64, 33, 3, '1500.00', '4500.00'),
(271, 64, 32, 3, '550.99', '1652.97'),
(272, 64, 31, 2, '699.99', '1399.98'),
(273, 65, 30, 2, '700.45', '1400.90'),
(274, 65, 28, 1, '545.99', '545.99'),
(275, 66, 1, 45, '80.99', '3644.55'),
(276, 66, 11, 44, '200.99', '8843.56'),
(277, 66, 4, 28, '179.99', '5039.72'),
(278, 66, 16, 41, '145.99', '5985.59'),
(279, 66, 10, 29, '125.99', '3653.71'),
(280, 66, 27, 32, '550.00', '17600.00'),
(281, 67, 34, 2, '186.54', '373.08'),
(282, 67, 32, 1, '550.99', '550.99'),
(283, 67, 33, 3, '1500.00', '4500.00'),
(284, 68, 6, 1, '138.99', '138.99'),
(285, 68, 28, 3, '545.99', '1637.97'),
(286, 68, 29, 2, '460.45', '920.90'),
(287, 69, 2, 45, '150.99', '6794.55'),
(288, 69, 1, 23, '80.99', '1862.77'),
(289, 69, 8, 43, '155.99', '6707.57'),
(290, 69, 4, 27, '179.99', '4859.73'),
(291, 69, 6, 41, '138.99', '5698.59'),
(292, 69, 7, 33, '120.45', '3974.85'),
(293, 70, 16, 3, '145.99', '437.97'),
(294, 70, 31, 3, '699.99', '2099.97'),
(295, 70, 34, 2, '186.54', '373.08'),
(296, 70, 33, 1, '1500.00', '1500.00'),
(297, 70, 28, 3, '545.99', '1637.97'),
(298, 70, 32, 4, '550.99', '2203.96'),
(299, 71, 4, 32, '179.99', '5759.68'),
(300, 71, 7, 34, '120.45', '4095.30'),
(301, 71, 10, 23, '125.99', '2897.77'),
(302, 71, 9, 43, '120.45', '5179.35'),
(303, 71, 11, 43, '200.99', '8642.57'),
(304, 71, 12, 23, '120.99', '2782.77'),
(305, 72, 16, 1, '145.99', '145.99'),
(306, 72, 28, 3, '545.99', '1637.97'),
(307, 72, 32, 2, '550.99', '1101.98'),
(308, 72, 33, 2, '1500.00', '3000.00'),
(309, 72, 34, 2, '186.54', '373.08'),
(310, 72, 30, 3, '700.45', '2101.35'),
(311, 73, 2, 25, '150.99', '3774.75'),
(312, 73, 11, 23, '200.99', '4622.77'),
(313, 73, 27, 45, '550.00', '24750.00'),
(314, 73, 33, 34, '1500.00', '51000.00'),
(315, 73, 32, 43, '550.99', '23692.57'),
(316, 73, 31, 23, '699.99', '16099.77'),
(317, 74, 2, 2, '150.99', '301.98'),
(318, 74, 6, 1, '138.99', '138.99'),
(319, 74, 8, 2, '155.99', '311.98'),
(320, 75, 28, 2, '545.99', '1091.98'),
(321, 75, 9, 1, '120.45', '120.45'),
(322, 76, 3, 3, '140.99', '422.97'),
(323, 76, 1, 3, '80.99', '242.97'),
(324, 77, 31, 45, '699.99', '31499.55'),
(325, 78, 28, 2, '545.99', '1091.98');

-- --------------------------------------------------------

--
-- Table structure for table `egresos`
--

CREATE TABLE `egresos` (
  `iIdEgreso` int(11) NOT NULL,
  `iIdTipo_Egreso` int(11) NOT NULL,
  `dFecha` datetime DEFAULT NULL,
  `fTotal` decimal(15,2) DEFAULT NULL,
  `iIdApertura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `egresos`
--

INSERT INTO `egresos` (`iIdEgreso`, `iIdTipo_Egreso`, `dFecha`, `fTotal`, `iIdApertura`) VALUES
(1, 1, '2020-11-13 17:44:37', '4000.00', 11),
(2, 5, '2020-11-14 20:01:57', '5000.00', 21),
(3, 2, '2020-11-14 20:04:13', '4000.45', 21),
(4, 6, '2020-11-14 20:16:54', '5000.00', 21),
(5, 3, '2020-11-15 01:36:36', '400.00', 22),
(6, 5, '2020-11-15 01:42:28', '400.00', 23),
(7, 3, '2020-11-15 01:43:46', '400.00', 24),
(8, 3, '2020-11-21 15:04:49', '1500.00', 1),
(9, 5, '2020-11-21 15:07:31', '230.45', 2),
(10, 2, '2020-11-21 15:27:40', '12000.45', 3),
(11, 4, '2020-11-21 15:38:22', '2000.34', 4),
(12, 1, '2020-11-21 15:49:40', '12000.45', 5),
(13, 5, '2020-11-21 15:51:59', '399.34', 6),
(14, 3, '2020-11-21 16:08:19', '600.76', 7),
(15, 2, '2020-11-21 16:17:37', '12000.45', 8),
(16, 3, '2020-11-21 16:20:49', '340.56', 9),
(17, 3, '2020-11-21 16:31:03', '234.67', 10),
(18, 1, '2020-11-21 16:38:40', '12500.45', 11),
(19, 3, '2020-11-21 16:40:46', '244.45', 12),
(20, 4, '2020-11-21 20:56:07', '1345.89', 13),
(21, 1, '2020-11-21 21:02:20', '12500.45', 14),
(22, 4, '2020-11-21 21:08:33', '1243.99', 15),
(23, 3, '2020-11-21 21:10:58', '432.98', 16),
(24, 3, '2020-11-21 21:19:00', '422.45', 17),
(25, 3, '2020-11-21 21:25:44', '438.99', 18),
(26, 1, '2020-11-21 21:40:48', '12500.45', 19),
(27, 3, '2020-11-21 21:46:28', '233.88', 20),
(28, 4, '2020-11-21 22:01:47', '566.99', 21),
(29, 3, '2020-11-21 22:14:49', '345.45', 23);

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `iIdImagen` int(11) NOT NULL,
  `sNombreArchivo` varchar(100) DEFAULT NULL,
  `sTipoExtension` varchar(50) DEFAULT NULL,
  `sPath` varchar(400) DEFAULT NULL,
  `bEliminado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`iIdImagen`, `sNombreArchivo`, `sTipoExtension`, `sPath`, `bEliminado`) VALUES
(1, 'Arroz con Pollo 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(2, 'Arroz con Pollo 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(3, 'Crema 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(4, 'Crema 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(5, 'Macarrones 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(6, 'Macarrones 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(7, 'Flan de Queso 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(8, 'Flan de Queso 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(9, 'LasaÃ±a 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(10, 'LasaÃ±a 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(11, 'Croquetas 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(12, 'Croquetas 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(13, 'Lentejas 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(14, 'Lentejas 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(15, 'Pechuga 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(16, 'Pechuga 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(17, 'Merluza 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(18, 'Merluza 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(19, 'Puchero 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(20, 'Puchero 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(21, 'Alubias 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(22, 'Alubias 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 1),
(23, 'Alubias 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(24, 'Alubias 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(25, 'Judias 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(26, 'Judias 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(27, 'Merluza Marinera 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(28, 'Merluza Marinera 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(29, 'Garbanzos 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(30, 'Garbanzos 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(31, 'Brownie 1.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(32, 'Brownie 2.jpg', 'image/jpeg', 'C:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(45, 'Dieta.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(46, 'ensaladita.png', 'image/png', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(47, 'Principales.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(48, 'Celebraciones.jpeg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(49, 'SINGLEEEEE.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(50, 'pexels-quang-anh-ha-nguyen-884600.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(51, 'pexels-ella-olsson-1640772.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(52, 'Pizza 1.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0),
(53, 'Pizza 2.jpg', 'image/jpeg', 'D:/xampp/htdocs/dbRestaurant/Imagenes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `insumos`
--

CREATE TABLE `insumos` (
  `iIdInsumo` int(11) NOT NULL,
  `sNombre` varchar(100) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `bEliminado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insumos`
--

INSERT INTO `insumos` (`iIdInsumo`, `sNombre`, `fPrecio`, `bEliminado`) VALUES
(1, 'Calabacines', '29.99', 0),
(2, 'Patata', '19.99', 0),
(3, 'Arroz', '45.99', 0),
(4, 'Pollo', '60.99', 0),
(5, 'Zanahoria', '12.99', 0),
(6, 'Cebolla', '15.99', 0),
(7, 'Tomate', '12.99', 0),
(8, 'Ajo', '12.45', 0),
(9, 'Cebolla', '14.45', 0),
(10, 'Puerros', '30.45', 0),
(11, 'Aceite de Oliva', '60.45', 0),
(12, 'Macarrones', '40.45', 0),
(13, 'Salsa BoloÃ±esa', '45.60', 0),
(14, 'Leche', '120.88', 0),
(15, 'Queso Crema', '67.90', 0),
(16, 'AzÃºcar', '89.99', 0),
(17, 'Vainilla', '45.90', 0),
(18, 'Sirope frutos del Bosque', '69.99', 0),
(19, 'Carne de Ternera', '145.99', 0),
(20, 'Pasta', '45.99', 0),
(21, 'Caldo de carne', '30.99', 0),
(22, 'Soja', '45.99', 0),
(23, 'JamÃ³n', '49.99', 0),
(24, 'Harina', '110.99', 0),
(25, 'AlmidÃ³n vegetal', '14.90', 0),
(26, 'FÃ©cula de Patata', '15.99', 0),
(27, 'Lentejas', '56.99', 0),
(28, 'CÃºrcuma', '45.45', 0),
(29, 'Jengibre', '55.90', 0),
(30, 'Mostaza', '35.45', 0),
(31, 'Merluza', '56.99', 0),
(32, 'Pimientos', '34.99', 0),
(33, 'Garbanzos', '99.99', 0),
(34, 'Tocino IbÃ©rico', '45.95', 0),
(35, 'Hueso salado', '99.99', 0),
(36, 'Alubias Blancas', '102.99', 0),
(37, 'Chorizo', '102.99', 0),
(38, 'judÃ­as Verdes', '69.99', 0),
(39, 'Almejas', '90.99', 0),
(40, 'Guisantes', '67.99', 0),
(41, 'AlmidÃ³n de Patatas', '80.99', 0),
(42, 'Vino Blanco', '108.99', 0),
(43, 'Cilantro verde', '56.99', 0),
(44, 'LimÃ³n', '12.99', 0),
(45, 'Chocolate', '90.99', 0),
(46, 'Nueces', '34.99', 0);

-- --------------------------------------------------------

--
-- Table structure for table `insumo_platillo`
--

CREATE TABLE `insumo_platillo` (
  `iIdInsumo_Platillo` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL,
  `iIdInsumo` int(11) NOT NULL,
  `iCantidad` int(11) DEFAULT NULL,
  `bEliminado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insumo_platillo`
--

INSERT INTO `insumo_platillo` (`iIdInsumo_Platillo`, `iIdPlatillo`, `iIdInsumo`, `iCantidad`, `bEliminado`) VALUES
(312, 5, 5, 1, 0),
(313, 5, 6, 1, 0),
(314, 5, 19, 1, 0),
(315, 5, 20, 1, 0),
(316, 5, 21, 2, 0),
(317, 5, 22, 1, 0),
(318, 6, 11, 1, 0),
(319, 6, 14, 1, 0),
(320, 6, 23, 2, 0),
(321, 6, 24, 1, 0),
(322, 6, 25, 1, 0),
(323, 6, 26, 2, 0),
(324, 7, 7, 3, 0),
(325, 7, 8, 1, 0),
(326, 7, 9, 1, 0),
(327, 7, 10, 2, 0),
(328, 7, 27, 1, 0),
(329, 7, 28, 1, 0),
(330, 8, 4, 1, 0),
(331, 8, 6, 1, 0),
(332, 8, 8, 1, 0),
(333, 8, 11, 2, 0),
(334, 8, 29, 1, 0),
(335, 8, 30, 1, 0),
(336, 9, 2, 2, 0),
(337, 9, 6, 1, 0),
(338, 9, 7, 4, 0),
(339, 9, 8, 1, 0),
(340, 9, 11, 2, 0),
(341, 9, 31, 2, 0),
(342, 10, 2, 2, 0),
(343, 10, 4, 1, 0),
(344, 10, 5, 3, 0),
(345, 10, 33, 1, 0),
(346, 10, 34, 1, 0),
(347, 10, 35, 2, 0),
(348, 11, 7, 3, 0),
(349, 11, 9, 1, 0),
(350, 11, 10, 2, 0),
(351, 11, 11, 2, 0),
(352, 11, 36, 1, 0),
(353, 11, 37, 3, 0),
(354, 12, 6, 2, 0),
(355, 12, 7, 5, 0),
(356, 12, 8, 2, 0),
(357, 12, 11, 2, 0),
(358, 12, 38, 2, 0),
(359, 13, 31, 1, 0),
(360, 13, 32, 2, 0),
(361, 13, 39, 3, 0),
(362, 13, 40, 2, 0),
(363, 13, 41, 2, 0),
(364, 13, 42, 1, 0),
(365, 15, 6, 2, 0),
(366, 15, 7, 1, 0),
(367, 15, 8, 3, 0),
(368, 15, 33, 2, 0),
(369, 15, 43, 1, 0),
(370, 15, 44, 1, 0),
(371, 16, 14, 1, 0),
(372, 16, 16, 2, 0),
(373, 16, 45, 1, 0),
(374, 16, 46, 6, 0),
(419, 4, 14, 1, 0),
(420, 4, 15, 1, 0),
(421, 4, 16, 1, 0),
(428, 2, 1, 2, 0),
(429, 2, 2, 3, 0),
(430, 2, 6, 1, 0),
(431, 2, 8, 1, 0),
(432, 2, 11, 1, 0),
(476, 3, 12, 1, 0),
(477, 3, 13, 1, 0),
(510, 1, 3, 3, 0),
(511, 1, 4, 1, 0),
(512, 1, 5, 2, 0),
(513, 1, 6, 1, 0),
(514, 1, 7, 2, 0),
(515, 1, 8, 2, 0),
(516, 34, 7, 1, 0),
(517, 34, 15, 4, 0),
(518, 34, 24, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `iIdMenu` int(11) NOT NULL,
  `sNombre` varchar(100) DEFAULT NULL,
  `sDescripcion` varchar(400) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `dFechaAlta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`iIdMenu`, `sNombre`, `sDescripcion`, `fPrecio`, `dFechaAlta`) VALUES
(2, 'Dieta', 'Este es el MenÃº de Dieta para Personas Seleccionadas.', '550.00', '2020-09-23 19:02:38'),
(3, 'Vegetariano', 'MenÃº para Personas Vegetarianas.', '545.99', '2020-09-23 19:07:04'),
(4, 'Principales', 'Elaborado de los Platos Principales del Restaurant.', '460.45', '2020-09-24 21:33:27'),
(5, 'Celebraciones', 'MenÃº para Celebraciones y Fiestas Familiares.', '700.45', '2020-09-23 18:53:49'),
(6, 'Single', 'MenÃº pensado para tu disfrute y comodidad.', '699.99', '2020-09-23 19:15:34'),
(7, 'Cuchara', 'Si buscas adecuar tu dieta al otoÃ±o e invierno, estos platos son los mÃ¡s recomendables.', '550.99', '2020-09-24 17:40:41'),
(8, 'Regional', 'Comida autÃ³ctona SalteÃ±a.', '1500.00', '2020-09-24 21:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `iIdPago` int(11) NOT NULL,
  `sDescripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`iIdPago`, `sDescripcion`) VALUES
(1, 'Efectivo'),
(2, 'Credito'),
(3, 'Debito');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `iIdPedido` int(11) NOT NULL,
  `iIdProveedor` int(11) NOT NULL,
  `dFecha` datetime DEFAULT NULL,
  `dFecha_Entrega` datetime DEFAULT NULL,
  `fTotal` decimal(15,2) DEFAULT '0.00',
  `bFacturado` varchar(2) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`iIdPedido`, `iIdProveedor`, `dFecha`, `dFecha_Entrega`, `fTotal`, `bFacturado`) VALUES
(1, 1, '2020-11-21 15:02:07', '2020-11-22 15:02:07', '3364.05', 'Si'),
(2, 1, '2020-11-21 15:02:45', '2020-11-22 15:02:45', '1182.85', 'Si'),
(3, 1, '2020-11-21 15:11:24', '2020-11-22 15:11:24', '811.86', 'Si'),
(4, 1, '2020-11-21 15:11:47', '2020-11-22 15:11:47', '159.92', 'Si'),
(5, 1, '2020-11-21 15:11:47', '2020-11-22 15:11:47', '159.92', 'Si'),
(6, 1, '2020-11-21 15:12:07', '2020-11-22 15:12:07', '3687.12', 'Si'),
(7, 2, '2020-11-21 15:28:14', '2020-11-22 15:28:14', '15053.34', 'Si'),
(8, 3, '2020-11-21 15:36:03', '2020-11-22 15:36:03', '2825.37', 'Si'),
(9, 2, '2020-11-21 15:37:06', '2020-11-22 15:37:06', '1030.74', 'Si'),
(10, 1, '2020-11-21 15:37:34', '2020-11-22 15:37:34', '1169.10', 'Si'),
(11, 1, '2020-11-21 15:47:04', '2020-11-22 15:47:04', '4403.65', 'Si'),
(12, 1, '2020-11-21 15:47:04', '2020-11-22 15:47:04', '4403.65', 'Si'),
(13, 1, '2020-11-21 15:47:46', '2020-11-22 15:47:46', '2613.21', 'Si'),
(14, 3, '2020-11-21 15:56:15', '2020-11-22 15:56:15', '4436.07', 'Si'),
(15, 2, '2020-11-21 15:56:56', '2020-11-22 15:56:56', '4140.63', 'Si'),
(16, 2, '2020-11-21 16:08:54', '2020-11-22 16:08:54', '6030.23', 'Si'),
(17, 3, '2020-11-21 16:15:34', '2020-11-22 16:15:34', '173.94', 'Si'),
(18, 2, '2020-11-21 16:15:57', '2020-11-22 16:15:57', '4297.18', 'Si'),
(19, 3, '2020-11-21 16:16:26', '2020-11-22 16:16:26', '1140.53', 'Si'),
(20, 1, '2020-11-21 16:16:52', '2020-11-22 16:16:52', '1285.60', 'Si'),
(21, 1, '2020-11-21 16:24:18', '2020-11-22 16:24:18', '3649.32', 'Si'),
(22, 2, '2020-11-21 16:24:43', '2020-11-22 16:24:43', '6243.21', 'Si'),
(23, 1, '2020-11-21 16:29:26', '2020-11-22 16:29:26', '13265.10', 'Si'),
(24, 2, '2020-11-21 16:36:09', '2020-11-22 16:36:09', '4167.34', 'Si'),
(25, 1, '2020-11-21 16:36:32', '2020-11-22 16:36:32', '2784.90', 'Si'),
(26, 3, '2020-11-21 16:37:01', '2020-11-22 16:37:01', '6032.90', 'Si'),
(27, 3, '2020-11-21 16:37:01', '2020-11-22 16:37:01', '6032.90', 'Si'),
(28, 1, '2020-11-21 16:44:31', '2020-11-22 16:44:31', '1719.32', 'Si'),
(29, 3, '2020-11-21 16:44:55', '2020-11-22 16:44:55', '10807.87', 'Si'),
(30, 1, '2020-11-21 20:55:15', '2020-11-22 20:55:15', '321.93', 'Si'),
(31, 2, '2020-11-21 21:00:13', '2020-11-22 21:00:13', '4903.47', 'Si'),
(32, 3, '2020-11-21 21:00:40', '2020-11-22 21:00:40', '4083.08', 'Si'),
(33, 1, '2020-11-21 21:01:15', '2020-11-22 21:01:15', '2040.15', 'Si'),
(34, 3, '2020-11-21 21:06:25', '2020-11-22 21:06:25', '12753.33', 'Si'),
(35, 1, '2020-11-21 21:07:28', '2020-11-22 21:07:28', '1559.22', 'Si'),
(36, 2, '2020-11-21 21:14:35', '2020-11-22 21:14:35', '1558.65', 'Si'),
(37, 2, '2020-11-21 21:15:00', '2020-11-22 21:15:00', '936.33', 'Si'),
(38, 1, '2020-11-21 21:15:24', '2020-11-22 21:15:24', '7004.33', 'Si'),
(39, 3, '2020-11-21 21:15:59', '2020-11-22 21:15:59', '3545.10', 'Si'),
(40, 2, '2020-11-21 21:22:35', '2020-11-22 21:22:35', '1629.33', 'Si'),
(41, 3, '2020-11-21 21:22:59', '2020-11-22 21:22:59', '1712.95', 'Si'),
(42, 1, '2020-11-21 21:29:21', '2020-11-22 21:29:21', '3193.10', 'Si'),
(43, 2, '2020-11-21 21:29:47', '2020-11-22 21:29:47', '683.94', 'Si'),
(44, 2, '2020-11-21 21:29:47', '2020-11-22 21:29:47', '683.94', 'Si'),
(45, 3, '2020-11-21 21:30:16', '2020-11-22 21:30:16', '3063.30', 'Si'),
(46, 2, '2020-11-21 21:38:15', '2020-11-22 21:38:15', '159.87', 'Si'),
(47, 3, '2020-11-21 21:38:42', '2020-11-22 21:38:42', '2725.17', 'Si'),
(48, 1, '2020-11-21 21:39:31', '2020-11-22 21:39:31', '670.50', 'Si'),
(49, 2, '2020-11-21 21:50:21', '2020-11-22 21:50:21', '469.86', 'Si'),
(50, 3, '2020-11-21 21:50:45', '2020-11-22 21:50:45', '1472.50', 'Si'),
(51, 2, '2020-11-21 21:59:29', '2020-11-22 21:59:29', '306.91', 'Si'),
(52, 2, '2020-11-21 21:59:29', '2020-11-22 21:59:29', '306.91', 'Si'),
(53, 2, '2020-11-21 22:00:03', '2020-11-22 22:00:03', '217.65', 'Si'),
(54, 2, '2020-11-21 22:00:03', '2020-11-22 22:00:03', '217.65', 'Si'),
(55, 2, '2020-11-21 22:09:32', '2020-11-22 22:09:32', '410.97', 'Si'),
(56, 2, '2020-11-21 22:10:19', '2020-11-22 22:10:19', '386.67', 'Si'),
(57, 2, '2020-11-21 22:10:19', '2020-11-22 22:10:19', '386.67', 'Si'),
(58, 3, '2020-11-21 22:21:26', '2020-11-22 22:21:26', '303.93', 'Si'),
(59, 3, '2020-11-21 22:21:52', '2020-11-22 22:21:52', '1194.57', 'Si'),
(60, 2, '2020-11-21 22:22:20', '2020-11-22 22:22:20', '8258.19', 'Si'),
(61, 2, '2020-11-21 22:23:00', '2020-11-22 22:23:00', '912.73', 'Si');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `iIdPermiso` int(11) NOT NULL,
  `sNombre` varchar(100) DEFAULT NULL,
  `sDescripcion` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`iIdPermiso`, `sNombre`, `sDescripcion`) VALUES
(1, 'Gerente', 'Acceso y control de todos los apartados y pantallas del sistema de tu Restaurante '),
(2, 'Cliente', 'Acceso a los platillos y acceso a poder interactuar y comprar'),
(3, 'Jefe de Cocina', 'Acceso a los platillos e insumos. Permiso para modificarlos y para recibir pedidos de clientes '),
(4, 'Empleado', 'Permisos para abrir y cerrar caja e interactuar con la interfaz de manera superficial ');

-- --------------------------------------------------------

--
-- Table structure for table `platillos`
--

CREATE TABLE `platillos` (
  `iIdPlatillo` int(11) NOT NULL,
  `sNombre` varchar(100) DEFAULT NULL,
  `sDescripcion` varchar(400) DEFAULT NULL,
  `fPrecio` decimal(15,2) DEFAULT NULL,
  `iStock` int(11) DEFAULT NULL,
  `iStockMinimo` int(11) DEFAULT NULL,
  `bEliminado` tinyint(1) DEFAULT '0',
  `bMenu` int(11) DEFAULT '0',
  `iCal_Contador` int(11) DEFAULT '0',
  `iCal_Suma` int(11) DEFAULT '0',
  `iCal_Total` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platillos`
--

INSERT INTO `platillos` (`iIdPlatillo`, `sNombre`, `sDescripcion`, `fPrecio`, `iStock`, `iStockMinimo`, `bEliminado`, `bMenu`, `iCal_Contador`, `iCal_Suma`, `iCal_Total`) VALUES
(1, 'Arroz con Pollo', 'Plato tradicional de nuestra cocina con suave toque de especias mediterrÃ¡neas y equilibrados nutricionalmente.', '80.99', 5507, 4, 0, 0, 5, 16, 3),
(2, 'Crema de Calabacines', 'Elaborada con vegetales seleccionadas de proximidad, con aceite de oliva, sin conservantes ni aditivos, sabor suave, rica en vitaminas, minerales y fibra.', '150.99', 5171, 4, 0, 0, 5, 9, 2),
(3, 'Macarrones a la BoloÃ±esa', 'Macarrones con suave salsa boloÃ±esa casera donde la calidad y frescura tanto de sus carnes como de su verduras de proximidad hacen el equilibrio perfecto de su sabor.', '140.99', 5722, 5, 0, 0, 5, 16, 3),
(4, 'Flan de Queso', 'Flan de queso con sirope de frutos del bosque. Dulce cremoso, suave y con la mejor combinaciÃ³n de frutos del bosque.', '179.99', 5653, 5, 0, 0, 4, 13, 3),
(5, 'LasaÃ±a Especial de Carne', 'LasaÃ±a con carne picada por nosotros, cuidamos la calidad, sabor y textura desde principio hasta final de la cocciÃ³n, suave ligera y exquisita.', '200.99', 5800, 4, 0, 0, 4, 13, 3),
(6, 'Croquetas de JamÃ³n', 'Sabrosa y crujiente croqueta casera. 10 unidades.', '138.99', 5580, 6, 0, 0, 4, 18, 5),
(7, 'Lentejas con Verduras', 'Lentejas guisadas con verduras de forma tradicional, a fuego lento y con verduras frescas de proximidad.', '120.45', 5211, 4, 0, 0, 4, 16, 4),
(8, 'Pechuga de Pollo', 'Pechuga de pollo a baja temperatura con salsa de mostaza y miel guarniciÃ³n de patatas fritas. Pollo suave y jugoso con salsa suave de mostaza, jengibre y toque de miel.', '155.99', 5763, 4, 0, 0, 3, 15, 5),
(9, 'Merluza Confitada', 'Exquisita merluza confitada a fuego lento en nuestro tomate casero con sus patatas a lo pobre.', '120.45', 5402, 4, 0, 0, 4, 15, 4),
(10, 'Puchero de Garbanzos', 'Puchero al estilo de la abuela, hecho con garbanzos secos seleccionados ademÃ¡s de carnes y verduras de proximidad.', '125.99', 5752, 5, 0, 0, 5, 20, 4),
(11, 'Alubias con Puerro y Chorizo', 'Plato tradicional de la cocina mediterrÃ¡nea hecho con ingredientes de calidad y a fuego lento.', '200.99', 5281, 5, 0, 0, 4, 7, 2),
(12, 'JudÃ­as verdes entomatadas', 'JudÃ­as verdes salteadas con nuestro delicioso tomate frito casero.', '120.99', 5299, 4, 0, 0, 4, 10, 3),
(13, 'Merluza con Almejas a la Marinera', 'Lomo de merluza al estilo malagueÃ±o.', '121.99', 5406, 5, 0, 0, 4, 9, 2),
(15, 'Garbanzos Especiados con Cilantro', 'Sabor intenso y MediterrÃ¡neo, cocina mozÃ¡rabe. Garbanzos especiados con cilantro verde.', '130.99', 5656, 4, 0, 0, 5, 15, 3),
(16, 'Brownie con Chocolate', 'Junto con nueces, intenso sabor del chocolate y las nueces con su salsa de chocolate.', '145.99', 5619, 3, 0, 0, 3, 12, 4),
(27, 'Dieta', 'Este es el MenÃº de Dieta para Personas Seleccionadas.', '550.00', 5177, NULL, 0, 2, 5, 19, 4),
(28, 'Vegetariano', 'MenÃº para Personas Vegetarianas.', '545.99', 5171, NULL, 0, 3, 4, 15, 4),
(29, 'Principales', 'Elaborado de los Platos Principales del Restaurant.', '460.45', 5477, NULL, 0, 4, 4, 17, 4),
(30, 'Celebraciones', 'MenÃº para Celebraciones y Fiestas Familiares.', '700.45', 5448, NULL, 0, 5, 5, 16, 3),
(31, 'Single', 'MenÃº pensado para tu disfrute y comodidad.', '699.99', 5281, NULL, 0, 6, 4, 11, 3),
(32, 'Cuchara', 'Si buscas adecuar tu dieta al otoÃ±o e invierno, estos platos son los mÃ¡s recomendables.', '550.99', 5215, NULL, 0, 7, 4, 15, 4),
(33, 'Regional', 'Comida autÃ³ctona SalteÃ±a.', '1500.00', 5491, NULL, 0, 8, 5, 22, 4),
(34, 'Pizza Casera', 'Pizza casera con una textura y sabor Ãºnicos. La tÃ­pica elaboraciÃ³n de pizza con queso o mÃ¡s conocida como fugazzeta', '186.54', 5491, 6, 0, 0, 4, 18, 5);

-- --------------------------------------------------------

--
-- Table structure for table `platillo_categoria`
--

CREATE TABLE `platillo_categoria` (
  `iIdPlatillo_Categoria` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL,
  `iIdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platillo_categoria`
--

INSERT INTO `platillo_categoria` (`iIdPlatillo_Categoria`, `iIdPlatillo`, `iIdCategoria`) VALUES
(3, 6, 4),
(9, 1, 6),
(10, 3, 6),
(16, 5, 8),
(17, 8, 8),
(28, 2, 3),
(29, 12, 3),
(30, 7, 5),
(31, 10, 5),
(32, 11, 5),
(33, 12, 5),
(34, 15, 5),
(35, 16, 5),
(36, 8, 7),
(37, 9, 7),
(38, 13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `platillo_imagen`
--

CREATE TABLE `platillo_imagen` (
  `iIdPlatillo_Imagen` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL,
  `iIdImagen` int(11) NOT NULL,
  `iOrden` int(11) DEFAULT NULL,
  `bEliminado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platillo_imagen`
--

INSERT INTO `platillo_imagen` (`iIdPlatillo_Imagen`, `iIdPlatillo`, `iIdImagen`, `iOrden`, `bEliminado`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 2, 2, 0),
(3, 2, 3, 1, 0),
(4, 2, 4, 2, 0),
(5, 3, 5, 1, 0),
(6, 3, 6, 2, 0),
(7, 4, 7, 1, 0),
(8, 4, 8, 2, 0),
(9, 5, 9, 1, 0),
(10, 5, 10, 2, 0),
(11, 6, 11, 1, 0),
(12, 6, 12, 2, 0),
(13, 7, 13, 1, 0),
(14, 7, 14, 2, 0),
(15, 8, 15, 1, 0),
(16, 8, 16, 2, 0),
(17, 9, 17, 1, 0),
(18, 9, 18, 2, 0),
(19, 10, 19, 1, 0),
(20, 10, 20, 2, 0),
(23, 11, 23, 1, 0),
(24, 11, 24, 2, 0),
(25, 12, 25, 1, 0),
(26, 12, 26, 2, 0),
(27, 13, 27, 1, 0),
(28, 13, 28, 2, 0),
(29, 15, 29, 1, 0),
(30, 15, 30, 2, 0),
(31, 16, 31, 1, 0),
(32, 16, 32, 2, 0),
(42, 27, 45, 1, 0),
(43, 28, 46, 1, 0),
(44, 29, 47, 1, 0),
(45, 30, 48, 1, 0),
(46, 31, 49, 1, 0),
(47, 32, 50, 1, 0),
(48, 33, 51, 1, 0),
(49, 34, 52, 1, 0),
(50, 34, 53, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `platillo_menu`
--

CREATE TABLE `platillo_menu` (
  `iIdPlatillo_Menu` int(11) NOT NULL,
  `iIdMenu` int(11) NOT NULL,
  `iIdPlatillo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platillo_menu`
--

INSERT INTO `platillo_menu` (`iIdPlatillo_Menu`, `iIdMenu`, `iIdPlatillo`) VALUES
(1, 2, 2),
(2, 2, 7),
(3, 2, 9),
(4, 3, 2),
(5, 3, 7),
(6, 3, 12),
(7, 4, 3),
(8, 4, 10),
(9, 4, 13),
(10, 5, 5),
(11, 5, 6),
(12, 5, 9),
(13, 6, 11),
(14, 6, 12),
(15, 6, 13),
(16, 7, 1),
(17, 7, 7),
(18, 7, 11),
(19, 8, 34);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `iIdProveedor` int(11) NOT NULL,
  `sNombre` varchar(200) DEFAULT NULL,
  `sApellido` varchar(150) DEFAULT NULL,
  `iDocumento` int(11) DEFAULT NULL,
  `dFecha_Nacimiento` date DEFAULT NULL,
  `iTelefono` int(11) DEFAULT NULL,
  `sEmail` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`iIdProveedor`, `sNombre`, `sApellido`, `iDocumento`, `dFecha_Nacimiento`, `iTelefono`, `sEmail`) VALUES
(1, 'Lucas', 'Lopez', 43123123, '2020-08-20', 2147483647, 'lukas988@gmail.com'),
(2, 'Marcos', 'Suarez', 45123243, '2020-07-30', 2147483647, 'Marcos25@gmail.com'),
(3, 'Carlos', 'Juarez', 45312123, '1996-06-14', 4234312, 'Carlos12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `provxins`
--

CREATE TABLE `provxins` (
  `iIdProveedor` int(11) NOT NULL,
  `iIdInsumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provxins`
--

INSERT INTO `provxins` (`iIdProveedor`, `iIdInsumo`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(3, 22),
(3, 25),
(3, 28),
(3, 30),
(3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_egreso`
--

CREATE TABLE `tipo_egreso` (
  `iIdTipo_Egreso` int(11) NOT NULL,
  `sDescripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_egreso`
--

INSERT INTO `tipo_egreso` (`iIdTipo_Egreso`, `sDescripcion`) VALUES
(1, 'Pago de Sueldo '),
(2, 'Adelanto de un Sueldo '),
(3, 'Servicios'),
(4, 'Prestamo Bancario '),
(5, 'Gastos Familiares'),
(6, 'Extraccion de dinero por sacrilegio a la foca.');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_operacion`
--

CREATE TABLE `tipo_operacion` (
  `iIdTipo_Operacion` int(11) NOT NULL,
  `sDescripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_operacion`
--

INSERT INTO `tipo_operacion` (`iIdTipo_Operacion`, `sDescripcion`) VALUES
(1, 'Compra'),
(2, 'Venta');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `iIdUsuario` int(11) NOT NULL,
  `sLogin` varchar(100) NOT NULL,
  `sClave` varchar(100) NOT NULL,
  `sNombre` varchar(100) NOT NULL,
  `sApellido` varchar(100) NOT NULL,
  `iDocumento` int(11) NOT NULL,
  `sEmail` varchar(150) NOT NULL,
  `iContacto` int(11) NOT NULL,
  `sDireccion` varchar(150) DEFAULT NULL,
  `sPerfil` varchar(200) DEFAULT 'Default.svg',
  `bEliminado` tinyint(1) DEFAULT '0',
  `sGenerado` varchar(10) DEFAULT NULL,
  `iIdPermiso` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`iIdUsuario`, `sLogin`, `sClave`, `sNombre`, `sApellido`, `iDocumento`, `sEmail`, `iContacto`, `sDireccion`, `sPerfil`, `bEliminado`, `sGenerado`, `iIdPermiso`) VALUES
(1, 'Lucas988', '988988', 'Lucas', 'Lopez', 42131062, 'lukaslopez988@gmail.com', 49082303, 'San MartÃ­n 245', '75e33b4aedc2c7aaca994ae3c04575f7--popular-mens-hairstyles-trendy-hairstyles.jpg', 0, '1419cd4b5', 1),
(2, 'Franco987', '987987', 'Franco', 'Monasterio', 42379715, 'monasteriofranco@gmail.com', 4907623, 'fdspag', 'Windows.jpg', 0, NULL, 2),
(3, 'Gimenez_02', 'Josema_02', 'Jose Maria', 'Gimenez', 38887808, 'maxi.soriano.70.23@gmail.com', 48976458, 'J. R. Boedo', 'Josema_02.jpeg', 0, '3a98a71bd', 1),
(4, 'FocaMaestra', 'FIBSH', 'Gonzalo', 'Jovanovich', 38740557, 'gonzalojovanovich@outlook.com', 4586781, 'A mi casa', 'Untitled.png', 0, '4740be7c9', 1),
(5, 'Juan987', '987987', 'Juan', 'Lopez', 42131132, 'Juan987@gmail.com', 4902424, NULL, 'Default.svg', 0, NULL, 2),
(6, 'Leo1Mau1Cano', 'Leo1Mau1Cano1', 'Leonardo Maurico', 'Cando', 42205551, 'leomaucano111@gmail.com', 2147483647, 'La Merced  barrio isla Malvinas ', 'Default.svg', 0, NULL, 2),
(7, 'lorena1K', '12345678lsT', 'Elvira', 'Santos', 234324453, 'lurinasantos@hotmail.com', 2147483647, 'Radio los andes de mendoza , nÂ° 2829', 'Default.svg', 0, NULL, 2),
(8, 'Franco12345', 'Franco123', 'Franco', 'Monasterio', 42379715, 'monasteriofranco@gmail.com', 2147483647, NULL, 'Default.svg', 0, NULL, 2),
(9, 'MartÃ­n12', 'Martin1212', 'MartÃ­n', 'Lopez', 123123524, 'Martin12@gmail.com', 2147483647, NULL, 'Default.svg', 0, NULL, 4),
(12, 'Mica1235', 'Mica1235', 'Mica', 'Fernandez', 434132451, 'Mica1235@gmail.com', 45634523, NULL, 'Default.svg', 0, NULL, 4),
(13, 'Lourdes987', 'Lourdes987', 'Lourdes', 'Morales', 45234432, 'Lourdes987@gmail.com', 4321324, NULL, 'Default.svg', 0, NULL, 4),
(14, 'Hernan445', 'Hernan445', 'Hernan', 'Morales', 45234132, 'Hernan445@gmail.com', 4908978, NULL, 'Default.svg', 0, NULL, 4),
(15, 'Jose4678', 'Jose4678', 'Jose', 'Martinez', 45672123, 'Jose4678@gmail.com', 4563452, NULL, 'Default.svg', 0, NULL, 4),
(16, 'Pedro4548', 'Pedro4548', 'Pedro', 'Gonzalez', 45765132, 'Pedro4548@gmail.com', 4568712, NULL, 'Default.svg', 0, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `iIdVenta` int(11) NOT NULL,
  `iIdUsuario` int(11) NOT NULL,
  `dFecha` datetime DEFAULT NULL,
  `sDireccion` varchar(200) DEFAULT NULL,
  `fTotal` decimal(15,2) DEFAULT NULL,
  `sEstado` varchar(100) DEFAULT 'No Concretado',
  `bEliminado` tinyint(1) DEFAULT '0',
  `iIdApertura` int(11) NOT NULL,
  `iIdTipo_Operacion` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`iIdVenta`, `iIdUsuario`, `dFecha`, `sDireccion`, `fTotal`, `sEstado`, `bEliminado`, `iIdApertura`, `iIdTipo_Operacion`) VALUES
(1, 1, '2019-01-21 14:57:35', 'Sucursal', '15204.03', 'Concretado', 0, 1, 2),
(2, 1, '2019-01-21 14:58:49', 'Sucursal', '1345.29', 'Concretado', 0, 1, 2),
(3, 3, '2019-01-21 14:59:43', 'Sucursal', '2733.90', 'Concretado', 0, 1, 2),
(4, 1, '2019-01-21 15:00:42', 'Sucursal', '4028.20', 'Concretado', 0, 1, 2),
(5, 1, '2019-02-21 15:07:41', 'Sucursal', '14275.94', 'Concretado', 0, 2, 2),
(6, 2, '2019-02-21 15:08:19', 'Sucursal', '13097.77', 'Concretado', 0, 2, 2),
(7, 1, '2019-02-21 15:09:16', 'Sucursal', '1075.41', 'Concretado', 0, 2, 2),
(8, 1, '2019-02-21 15:10:26', 'Sucursal', '2440.84', 'Concretado', 0, 2, 2),
(9, 1, '2019-02-21 15:19:47', 'Sucursal', '45607.18', 'Concretado', 0, 2, 2),
(10, 1, '2019-02-21 15:21:21', 'Sucursal', '2719.85', 'Concretado', 0, 2, 2),
(11, 6, '2019-03-21 15:24:03', 'Sucursal', '19964.79', 'Concretado', 0, 3, 2),
(12, 1, '2019-03-21 15:26:14', 'Sucursal', '5444.81', 'Concretado', 0, 3, 2),
(13, 1, '2019-03-21 15:26:14', 'Sucursal', '5444.81', 'Concretado', 0, 3, 2),
(14, 5, '2019-04-21 15:31:40', 'Sucursal', '8767.32', 'Concretado', 0, 4, 2),
(15, 13, '2019-04-21 15:32:48', 'Sucursal', '28871.03', 'Concretado', 0, 4, 2),
(16, 16, '2019-04-21 15:33:32', 'Sucursal', '2264.03', 'Concretado', 0, 4, 2),
(17, 12, '2019-04-21 15:35:31', 'Sucursal', '403.97', 'Concretado', 0, 4, 2),
(18, 13, '2019-05-21 15:43:51', 'Sucursal', '66117.21', 'Concretado', 0, 5, 2),
(19, 7, '2019-05-21 15:45:13', 'Sucursal', '3699.91', 'Concretado', 0, 5, 2),
(20, 9, '2019-05-21 15:46:04', 'Sucursal', '478.52', 'Concretado', 0, 5, 2),
(21, 9, '2019-06-21 15:52:28', 'Sucursal', '34457.88', 'Concretado', 0, 6, 2),
(22, 1, '2019-06-21 15:53:09', 'Sucursal', '69417.32', 'Concretado', 0, 6, 2),
(23, 1, '2019-06-21 15:54:20', 'Sucursal', '2337.56', 'Concretado', 0, 6, 2),
(24, 1, '2019-06-21 15:55:01', 'Sucursal', '1554.95', 'Concretado', 0, 6, 2),
(25, 8, '2019-06-21 15:55:38', 'Sucursal', '1166.93', 'Concretado', 0, 6, 2),
(26, 15, '2019-07-21 16:05:29', 'Sucursal', '38700.45', 'Concretado', 0, 7, 2),
(27, 15, '2019-07-21 16:05:29', 'Sucursal', '38700.45', 'Concretado', 0, 7, 2),
(28, 14, '2019-07-21 16:06:20', 'Sucursal', '9390.96', 'Concretado', 0, 7, 2),
(29, 3, '2019-08-21 16:11:15', 'Sucursal', '7757.32', 'Concretado', 0, 8, 2),
(30, 1, '2019-08-21 16:11:47', 'Sucursal', '10425.23', 'Concretado', 0, 8, 2),
(31, 1, '2019-08-21 16:12:15', 'Sucursal', '10115.34', 'Concretado', 0, 8, 2),
(32, 1, '2019-08-21 16:13:22', 'Sucursal', '1227.97', 'Concretado', 0, 8, 2),
(33, 8, '2019-08-21 16:14:04', 'Sucursal', '4620.45', 'Concretado', 0, 8, 2),
(34, 14, '2019-08-21 16:14:42', 'Sucursal', '1962.25', 'Concretado', 0, 8, 2),
(35, 5, '2019-09-21 16:21:13', 'Sucursal', '71275.23', 'Concretado', 0, 9, 2),
(36, 7, '2019-09-21 16:23:05', 'Sucursal', '5519.13', 'Concretado', 0, 9, 2),
(37, 7, '2019-10-21 16:26:40', 'Sucursal', '32591.88', 'Concretado', 0, 10, 2),
(38, 6, '2019-10-21 16:27:55', 'Sucursal', '2584.85', 'Concretado', 0, 10, 2),
(39, 8, '2019-10-21 16:28:43', 'Sucursal', '1257.67', 'Concretado', 0, 10, 2),
(40, 1, '2019-11-21 16:32:31', 'Sucursal', '5061.83', 'Concretado', 0, 11, 2),
(41, 1, '2019-11-21 16:33:25', 'Sucursal', '83788.54', 'Concretado', 0, 11, 2),
(42, 6, '2019-11-21 16:34:35', 'Sucursal', '745.94', 'Concretado', 0, 11, 2),
(43, 1, '2019-11-21 16:35:12', 'Sucursal', '85508.70', 'Concretado', 0, 11, 2),
(44, 1, '2019-12-21 16:41:11', 'Sucursal', '39637.03', 'Concretado', 0, 12, 2),
(45, 1, '2019-12-21 16:42:28', 'Sucursal', '11704.81', 'Concretado', 0, 12, 2),
(46, 15, '2020-01-21 20:52:42', 'Sucursal', '27148.01', 'Concretado', 0, 13, 2),
(47, 12, '2020-01-21 20:53:24', 'Sucursal', '14368.56', 'Concretado', 0, 13, 2),
(48, 13, '2020-01-21 20:54:04', 'Sucursal', '2655.99', 'Concretado', 0, 13, 2),
(49, 1, '2020-02-21 20:57:08', 'Sucursal', '65436.37', 'Concretado', 0, 14, 2),
(50, 8, '2020-02-21 20:58:29', 'Sucursal', '11273.08', 'Concretado', 0, 14, 2),
(51, 1, '2020-03-21 21:03:24', 'Sucursal', '2135.86', 'Concretado', 0, 15, 2),
(52, 8, '2020-03-21 21:04:29', 'Sucursal', '27833.04', 'Concretado', 0, 15, 2),
(53, 1, '2020-04-21 21:11:12', 'Sucursal', '24122.41', 'Concretado', 0, 16, 2),
(54, 4, '2020-04-21 21:12:27', 'Sucursal', '5002.83', 'Concretado', 0, 16, 2),
(55, 1, '2020-04-21 21:13:41', 'Sucursal', '996.93', 'Concretado', 0, 16, 2),
(56, 1, '2020-04-21 21:14:06', 'Sucursal', '145.99', 'Concretado', 0, 16, 2),
(57, 5, '2020-05-21 21:19:16', 'Sucursal', '72406.47', 'Concretado', 0, 17, 2),
(58, 5, '2020-05-21 21:19:16', 'Sucursal', '72406.47', 'Concretado', 0, 17, 2),
(59, 5, '2020-05-21 21:19:16', 'Sucursal', '72406.47', 'Concretado', 0, 17, 2),
(60, 6, '2020-05-21 21:20:43', 'Sucursal', '6723.05', 'Concretado', 0, 17, 2),
(61, 1, '2020-06-21 21:25:55', 'Sucursal', '27525.00', 'Concretado', 0, 18, 2),
(62, 4, '2020-06-21 21:27:50', 'Sucursal', '5126.74', 'Concretado', 0, 18, 2),
(63, 12, '2020-07-21 21:35:38', 'Sucursal', '26822.33', 'Concretado', 0, 19, 2),
(64, 1, '2020-07-21 21:36:44', 'Sucursal', '8485.65', 'Concretado', 0, 19, 2),
(65, 6, '2020-07-21 21:37:30', 'Sucursal', '1946.89', 'Concretado', 0, 19, 2),
(66, 3, '2020-08-21 21:46:46', 'Sucursal', '44767.13', 'Concretado', 0, 20, 2),
(67, 1, '2020-08-21 21:48:23', 'Sucursal', '5424.07', 'Concretado', 0, 20, 2),
(68, 1, '2020-08-21 21:49:33', 'Sucursal', '2697.86', 'Concretado', 0, 20, 2),
(69, 6, '2020-09-21 21:56:34', 'Sucursal', '29898.06', 'Concretado', 0, 21, 2),
(70, 13, '2020-09-21 21:58:10', 'Sucursal', '8252.95', 'Concretado', 0, 21, 2),
(71, 7, '2020-10-21 22:03:52', 'Sucursal', '29357.44', 'Concretado', 0, 22, 2),
(72, 8, '2020-10-21 22:06:19', 'Sucursal', '8360.37', 'Concretado', 0, 22, 2),
(73, 13, '2020-11-21 22:15:26', 'Sucursal', '123939.86', 'Concretado', 0, 23, 2),
(74, 1, '2020-11-21 22:17:15', 'Sucursal', '752.95', 'Concretado', 0, 23, 2),
(75, 5, '2020-11-21 22:18:05', 'Sucursal', '1212.43', 'Concretado', 0, 23, 2),
(76, 9, '2020-11-21 22:18:53', 'Sucursal', '665.94', 'Concretado', 0, 23, 2),
(77, 1, '2020-11-21 22:19:54', 'Sucursal', '31499.55', 'Concretado', 0, 23, 2),
(78, 5, '2020-11-21 22:20:17', 'Sucursal', '1091.98', 'Concretado', 0, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE `visitas` (
  `iIdVisita` int(11) NOT NULL,
  `sNombre` varchar(100) DEFAULT NULL,
  `iCantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitas`
--

INSERT INTO `visitas` (`iIdVisita`, `sNombre`, `iCantidad`) VALUES
(1, 'Principal', 333),
(2, 'Platillos', 43),
(3, 'Menus', 83),
(4, 'Registro', 10),
(5, 'Login', 117);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`iIdApertura`),
  ADD KEY `fk_Caja_Usuarios1_idx` (`iIdUsuario`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`iIdCarrito`),
  ADD KEY `fk_Carrito_Usuarios1_idx` (`iIdUsuario`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`iIdCategoria`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`iIdComentario`),
  ADD KEY `fk_Comentarios_Usuarios1_idx` (`iIdUsuario`),
  ADD KEY `fk_Comentarios_Platillos1_idx` (`iIdPlatillo`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`iIdCompra`),
  ADD KEY `fk_Compras_Proveedores1_idx` (`iIdProveedor`),
  ADD KEY `fk_Compras_Pagos1_idx` (`iIdPago`),
  ADD KEY `fk_Compras_Caja1_idx` (`iIdApertura`),
  ADD KEY `fk_Compras_Tipo_Operacion1_idx` (`iIdTipo_Operacion`);

--
-- Indexes for table `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD PRIMARY KEY (`iIdDetalle_Carrito`),
  ADD KEY `fk_Detalle_Carrito_Carrito1_idx` (`iIdCarrito`),
  ADD KEY `fk_Detalle_Carrito_Platillos1_idx` (`iIdPlatillo`);

--
-- Indexes for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`iIdDetalle_Compra`),
  ADD KEY `fk_Detalle_Compra_Insumos1_idx` (`iIdInsumo`),
  ADD KEY `fk_Detalle_Compra_Compras1_idx` (`iIdCompra`);

--
-- Indexes for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`iIdDetalle_Pedido`),
  ADD KEY `fk_Detalle_Pedido_Insumos1_idx` (`iIdInsumo`),
  ADD KEY `fk_Detalle_Pedido_Pedidos1_idx` (`iIdPedido`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iIdDetalle_Venta`),
  ADD KEY `fk_Detalle_Venta_Ventas1_idx` (`iIdVenta`),
  ADD KEY `fk_Detalle_Venta_Platillos1_idx` (`iIdPlatillo`);

--
-- Indexes for table `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`iIdEgreso`),
  ADD KEY `fk_Egresos_Tipo_Egreso1_idx` (`iIdTipo_Egreso`),
  ADD KEY `fk_Egresos_Caja1_idx` (`iIdApertura`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`iIdImagen`);

--
-- Indexes for table `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`iIdInsumo`);

--
-- Indexes for table `insumo_platillo`
--
ALTER TABLE `insumo_platillo`
  ADD PRIMARY KEY (`iIdInsumo_Platillo`),
  ADD KEY `fk_Producto_Plato_Platillos_idx` (`iIdPlatillo`),
  ADD KEY `fk_Insumo_Platillo_Insumos1_idx` (`iIdInsumo`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`iIdMenu`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`iIdPago`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`iIdPedido`),
  ADD KEY `fk_Pedidos_Proveedores1_idx` (`iIdProveedor`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`iIdPermiso`);

--
-- Indexes for table `platillos`
--
ALTER TABLE `platillos`
  ADD PRIMARY KEY (`iIdPlatillo`);

--
-- Indexes for table `platillo_categoria`
--
ALTER TABLE `platillo_categoria`
  ADD PRIMARY KEY (`iIdPlatillo_Categoria`),
  ADD KEY `fk_Platillo_Categoria_Platillos1_idx` (`iIdPlatillo`),
  ADD KEY `fk_Platillo_Categoria_Categorias1_idx` (`iIdCategoria`);

--
-- Indexes for table `platillo_imagen`
--
ALTER TABLE `platillo_imagen`
  ADD PRIMARY KEY (`iIdPlatillo_Imagen`),
  ADD KEY `fk_Producto_Imagen_Platillos1_idx` (`iIdPlatillo`),
  ADD KEY `fk_Producto_Imagen_Imagenes1_idx` (`iIdImagen`);

--
-- Indexes for table `platillo_menu`
--
ALTER TABLE `platillo_menu`
  ADD PRIMARY KEY (`iIdPlatillo_Menu`),
  ADD KEY `fk_Platillo_Menu_Menus1_idx` (`iIdMenu`),
  ADD KEY `fk_Platillo_Menu_Platillos1_idx` (`iIdPlatillo`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`iIdProveedor`);

--
-- Indexes for table `provxins`
--
ALTER TABLE `provxins`
  ADD KEY `fk_ProvxIns_Insumos1_idx` (`iIdInsumo`),
  ADD KEY `fk_ProvxIns_Proveedores1_idx` (`iIdProveedor`);

--
-- Indexes for table `tipo_egreso`
--
ALTER TABLE `tipo_egreso`
  ADD PRIMARY KEY (`iIdTipo_Egreso`);

--
-- Indexes for table `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  ADD PRIMARY KEY (`iIdTipo_Operacion`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iIdUsuario`),
  ADD KEY `fk_Usuarios_Permisos1_idx` (`iIdPermiso`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`iIdVenta`),
  ADD KEY `fk_Ventas_Usuarios1_idx` (`iIdUsuario`),
  ADD KEY `fk_Ventas_Caja1_idx` (`iIdApertura`),
  ADD KEY `fk_Ventas_Tipo_Operacion1_idx` (`iIdTipo_Operacion`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`iIdVisita`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caja`
--
ALTER TABLE `caja`
  MODIFY `iIdApertura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `iIdCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `iIdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `iIdComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `iIdCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  MODIFY `iIdDetalle_Carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `iIdDetalle_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `iIdDetalle_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iIdDetalle_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `egresos`
--
ALTER TABLE `egresos`
  MODIFY `iIdEgreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `iIdImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `insumos`
--
ALTER TABLE `insumos`
  MODIFY `iIdInsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `insumo_platillo`
--
ALTER TABLE `insumo_platillo`
  MODIFY `iIdInsumo_Platillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `iIdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `iIdPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `iIdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `iIdPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `platillos`
--
ALTER TABLE `platillos`
  MODIFY `iIdPlatillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `platillo_categoria`
--
ALTER TABLE `platillo_categoria`
  MODIFY `iIdPlatillo_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `platillo_imagen`
--
ALTER TABLE `platillo_imagen`
  MODIFY `iIdPlatillo_Imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `platillo_menu`
--
ALTER TABLE `platillo_menu`
  MODIFY `iIdPlatillo_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `iIdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_egreso`
--
ALTER TABLE `tipo_egreso`
  MODIFY `iIdTipo_Egreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  MODIFY `iIdTipo_Operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iIdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `iIdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `iIdVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_Caja_Usuarios1` FOREIGN KEY (`iIdUsuario`) REFERENCES `usuarios` (`iIdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_Carrito_Usuarios1` FOREIGN KEY (`iIdUsuario`) REFERENCES `usuarios` (`iIdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_Comentarios_Platillos1` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comentarios_Usuarios1` FOREIGN KEY (`iIdUsuario`) REFERENCES `usuarios` (`iIdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_Compras_Caja1` FOREIGN KEY (`iIdApertura`) REFERENCES `caja` (`iIdApertura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compras_Pagos1` FOREIGN KEY (`iIdPago`) REFERENCES `pagos` (`iIdPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compras_Proveedores1` FOREIGN KEY (`iIdProveedor`) REFERENCES `proveedores` (`iIdProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compras_Tipo_Operacion1` FOREIGN KEY (`iIdTipo_Operacion`) REFERENCES `tipo_operacion` (`iIdTipo_Operacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD CONSTRAINT `fk_Detalle_Carrito_Carrito1` FOREIGN KEY (`iIdCarrito`) REFERENCES `carrito` (`iIdCarrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Carrito_Platillos1` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_Detalle_Compra_Compras1` FOREIGN KEY (`iIdCompra`) REFERENCES `compras` (`iIdCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Compra_Insumos1` FOREIGN KEY (`iIdInsumo`) REFERENCES `insumos` (`iIdInsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_Detalle_Pedido_Insumos1` FOREIGN KEY (`iIdInsumo`) REFERENCES `insumos` (`iIdInsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Pedido_Pedidos1` FOREIGN KEY (`iIdPedido`) REFERENCES `pedidos` (`iIdPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_Detalle_Venta_Platillos1` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Venta_Ventas1` FOREIGN KEY (`iIdVenta`) REFERENCES `ventas` (`iIdVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `fk_Egresos_Caja1` FOREIGN KEY (`iIdApertura`) REFERENCES `caja` (`iIdApertura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Egresos_Tipo_Egreso1` FOREIGN KEY (`iIdTipo_Egreso`) REFERENCES `tipo_egreso` (`iIdTipo_Egreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `insumo_platillo`
--
ALTER TABLE `insumo_platillo`
  ADD CONSTRAINT `fk_Insumo_Platillo_Insumos1` FOREIGN KEY (`iIdInsumo`) REFERENCES `insumos` (`iIdInsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Plato_Platillos` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Proveedores1` FOREIGN KEY (`iIdProveedor`) REFERENCES `proveedores` (`iIdProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `platillo_categoria`
--
ALTER TABLE `platillo_categoria`
  ADD CONSTRAINT `fk_Platillo_Categoria_Categorias1` FOREIGN KEY (`iIdCategoria`) REFERENCES `categorias` (`iIdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Platillo_Categoria_Platillos1` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `platillo_imagen`
--
ALTER TABLE `platillo_imagen`
  ADD CONSTRAINT `fk_Producto_Imagen_Imagenes1` FOREIGN KEY (`iIdImagen`) REFERENCES `imagenes` (`iIdImagen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Imagen_Platillos1` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `platillo_menu`
--
ALTER TABLE `platillo_menu`
  ADD CONSTRAINT `fk_Platillo_Menu_Menus1` FOREIGN KEY (`iIdMenu`) REFERENCES `menus` (`iIdMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Platillo_Menu_Platillos1` FOREIGN KEY (`iIdPlatillo`) REFERENCES `platillos` (`iIdPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `provxins`
--
ALTER TABLE `provxins`
  ADD CONSTRAINT `fk_ProvxIns_Insumos1` FOREIGN KEY (`iIdInsumo`) REFERENCES `insumos` (`iIdInsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ProvxIns_Proveedores1` FOREIGN KEY (`iIdProveedor`) REFERENCES `proveedores` (`iIdProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Permisos1` FOREIGN KEY (`iIdPermiso`) REFERENCES `permisos` (`iIdPermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_Ventas_Caja1` FOREIGN KEY (`iIdApertura`) REFERENCES `caja` (`iIdApertura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ventas_Tipo_Operacion1` FOREIGN KEY (`iIdTipo_Operacion`) REFERENCES `tipo_operacion` (`iIdTipo_Operacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ventas_Usuarios1` FOREIGN KEY (`iIdUsuario`) REFERENCES `usuarios` (`iIdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
