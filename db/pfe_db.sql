-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2021 at 03:05 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login` varchar(24) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `login`, `pass`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `nb_chambres` int(11) NOT NULL,
  `nb_chambres_total` int(11) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `type`, `nb_chambres`, `nb_chambres_total`, `prix`, `photo`, `description`) VALUES
(1, 'Standard', 25, 25, '400', '1.jpg', 'Nous proposons les chambres en categorie standard. Ideales pour les couples ou voyageurs solitaires dans le Gard, elles disposent toute d une salle de douche et WC privatifs. Une chambre est accessible aux personnes a mobilite reduite.'),
(2, 'Superior', 20, 20, '600', '3.jpg', 'Nos  chambres Superioir sont ideales pour les familles . Plus spacieuses, elles sont confortables et fonctionnelles. Certaines d entre elles se trouvent dans une batisse attenante a notre hotel de charme, pres de la piscine!'),
(3, 'Super Deluxe', 10, 10, '800', '4.jpg', 'Cette chambre Super deluxe vous permet de profiter de tout les qualite des autre chambres de notre hotels plus un jacuzzi, SPA et une restauration gratuite.'),
(4, 'Jr.Suite', 5, 5, '500', '5.jpg', 'Cette chambre Jr Suite vous permet de profiter de tout les qualite des autre chambres de notre hotels plus un jacuzzi, SPA et une restauration gratuite.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jours` int(5) NOT NULL,
  `paiement` varchar(10) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `date_rdv` date DEFAULT NULL,
  `addition` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `Nom` varchar(32) NOT NULL,
  `Prenom` varchar(32) NOT NULL,
  `Adresse` varchar(60) DEFAULT NULL,
  `Email` text,
  `Num` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `Nom`, `Prenom`, `Adresse`, `Email`, `Num`) VALUES
(1, NULL, NULL, 'Admin', 'Admin2', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
