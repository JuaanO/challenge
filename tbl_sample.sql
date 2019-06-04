-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 10:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `Provincia`(
  `nombre_provincia` varchar(30) NOT NULL,
  `capital_provincia` varchar(30) NOT NULL,
  `descripcion_provincia` text NULL,
  `poblacion_provincia` varchar(10) NOT NULL,
  `superficie_provincia` varchar(10) NOT NULL,
  `latitud_provincia` varchar(10) NOT NULL,
  `longitud_provincia` varchar(10) NOT NULL,
  `id_region` int NOT NULL, 
)ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `Provincia`
(`nombre_provincia`,`capital_provincia`,`descripcion_provincia`,`poblacion_provincia`,`superficie_p
rovincia`,`latitud_provincia`,`longitud_provincia`,`id_region`) VALUES ('Azuay','Cuenca','Es
llamada la Atenas del Ecuador por su arquitectura, su diversidad cultural, su aporte a las
artes, ciencias y letras ecuatorianas y por ser el lugar de nacimiento de muchos
personajes ilustres de la sociedad
ecuatoriana','569.42','122.00','-2.902222','-79.005261','1');

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`) VALUES
(2, 'John', 'Smith'),
(11, 'Moore', 'David'),
(8, 'Peter', 'Parker'),
(14, 'Guadalupe', 'Bolan'),
(15, 'Austin', 'Miller'),
(22, 'Steave', 'Smith');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
