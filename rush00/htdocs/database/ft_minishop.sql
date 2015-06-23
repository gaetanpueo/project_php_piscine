-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2015 at 12:43 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ft_minishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ft_artists`
--

CREATE TABLE IF NOT EXISTS `ft_artists` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `productions` int(11) NOT NULL,
  `records` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ft_artists`
--

INSERT INTO `ft_artists` (`id`, `name`, `productions`, `records`) VALUES
(1, 'Floxytek', 1, 1),
(2, 'BillX', 1, 1),
(3, 'Watmastaz', 1, 1),
(4, 'Riko', 1, 1),
(5, 'TLB', 1, 1),
(6, 'Tom H', 1, 1),
(7, 'Talasemik', 1, 1),
(8, 'Sparks', 1, 1),
(9, 'Sustain Release', 1, 1),
(10, 'Viko', 1, 1),
(11, 'Neurokontrol', 1, 1),
(12, 'Tripis', 1, 1),
(13, 'Paranoiak SLK', 1, 1),
(14, 'Vinsouille', 1, 1),
(15, 'Darktek', 1, 1),
(16, 'Mindtrax', 1, 1),
(17, 'Oktoberone', 1, 1),
(18, 'Pitch', 1, 1),
(19, 'Newlojik', 1, 1),
(20, 'Le Clown Evil', 1, 1),
(21, 'Imprevu', 1, 1),
(22, 'Strez', 1, 1),
(23, 'Taz', 1, 1),
(24, 'Wems', 1, 1),
(25, 'Tao H', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ft_categories`
--

CREATE TABLE IF NOT EXISTS `ft_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `records` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ft_categories`
--

INSERT INTO `ft_categories` (`id`, `name`, `records`) VALUES
(1, 'HARDTEK', 5),
(2, 'TRIBECORE', 5),
(3, 'FRENCHCORE', 5),
(4, 'HARDCORE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ft_labels`
--

CREATE TABLE IF NOT EXISTS `ft_labels` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `production` int(11) NOT NULL,
  `records` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ft_labels`
--

INSERT INTO `ft_labels` (`id`, `name`, `production`, `records`) VALUES
(1, 'Architek', 1, 5),
(2, 'Prostitution Sonore', 2, 5),
(3, 'Astrology', 2, 5),
(4, 'Chien de la Casse', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ft_orders`
--

CREATE TABLE IF NOT EXISTS `ft_orders` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ft_productions`
--

CREATE TABLE IF NOT EXISTS `ft_productions` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `labels` int(11) NOT NULL,
  `records` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ft_productions`
--

INSERT INTO `ft_productions` (`id`, `name`, `labels`, `records`) VALUES
(1, 'Free Style Listen Productions', 1, 5),
(2, 'Astrofonik Productions', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ft_products`
--

CREATE TABLE IF NOT EXISTS `ft_products` (
  `id` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  `label` int(11) NOT NULL,
  `name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `category` int(11) NOT NULL,
  `released` date NOT NULL,
  `added` date NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `track_a_one` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `artist_a_one` int(11) NOT NULL,
  `track_a_two` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `artist_a_two` int(11) NOT NULL,
  `track_b_one` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `artist_b_one` int(11) NOT NULL,
  `track_b_two` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `artist_b_two` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ft_products`
--

INSERT INTO `ft_products` (`id`, `production`, `label`, `name`, `category`, `released`, `added`, `price`, `stock`, `track_a_one`, `artist_a_one`, `track_a_two`, `artist_a_two`, `track_b_one`, `artist_b_one`, `track_b_two`, `artist_b_two`) VALUES
(1, 1, 1, 'Architek 10', 1, '2009-04-11', '2015-06-20', 15, 10, 'Progressive Attack', 1, 'Trancekore', 2, 'Cheese in Crust', 3, 'Breaktime', 4),
(2, 1, 1, 'Architek 11', 1, '2008-10-18', '2015-06-20', 10, 10, 'Lockdown', 5, 'Chekmate', 5, 'Level A', 6, 'Tribapapa', 7),
(3, 1, 1, 'Architek 12', 1, '2008-11-15', '2015-06-20', 10, 10, 'Tentative', 5, 'Funky Touzz', 9, 'Reggae Donuts', 6, 'Alice Tripe', 8),
(4, 1, 1, 'Architek 13', 1, '2009-01-03', '2015-06-20', 15, 10, 'Awanana', 5, 'Jirepas', 5, 'Obsolete', 10, 'Liz Panik', 8),
(5, 1, 1, 'Architek 14', 1, '2009-03-14', '2015-06-20', 15, 10, 'Too Late', 5, 'Menu Frottin', 5, 'Bomberman', 4, 'Naopak', 8),
(6, 2, 2, 'Prostitution Sonore 05', 2, '2010-11-06', '2015-06-20', 10, 10, 'Manu''Ko', 11, 'Valse en 4 Temps', 11, 'Saw', 12, 'Welcome to the Real World', 12),
(7, 2, 2, 'Prostitution Sonore 06', 2, '2012-05-19', '2015-06-20', 10, 10, 'Transformers', 12, 'New Born', 12, 'Bongo Boom', 13, 'Sexy Chao', 14),
(8, 2, 2, 'Prostitution Sonore 07', 2, '2012-10-20', '2015-06-20', 20, 10, 'Resident Evil', 12, 'Scary Monster', 15, 'Scary Silence', 12, 'Sysmik', 15),
(9, 2, 2, 'Prostitution Sonore 08', 2, '2014-07-13', '2015-06-20', 20, 10, 'Raining Blood', 16, 'No, No, No', 18, 'Imperial March', 17, 'American Song', 20),
(10, 2, 2, 'Prostitution Sonore 09', 2, '2015-05-02', '2015-06-20', 10, 10, 'Smash Space', 18, 'Nucleart', 19, 'Hard Symphony', 20, 'Beetlebass', 21),
(11, 2, 3, 'Astrology 15', 3, '2012-08-04', '2015-06-20', 25, 10, 'Voyager', 22, 'Faya', 22, 'Resistance', 22, 'Old School', 23),
(12, 2, 3, 'Astrology 16', 3, '2012-09-22', '2015-06-20', 10, 10, 'Digitalize', 16, 'Demon Spirit', 13, 'Master Choir', 24, 'Je suis le Diable', 25),
(13, 2, 3, 'Astrology 17', 3, '2012-09-22', '2015-06-20', 15, 10, 'WTF', 16, 'Obsenity', 13, 'Shadow', 24, 'Roam Under the Sun', 25),
(14, 2, 3, 'Astrology 18', 3, '2012-11-02', '2015-06-20', 10, 10, 'Astral Travel', 13, 'Epilog', 11, 'Giving up', 22, 'Kicking the Anthill', 22),
(15, 2, 3, 'Astrology 19', 3, '2013-03-09', '2015-06-20', 10, 10, 'Bad Sensations', 13, 'Mystery', 13, 'Overdrive', 13, 'Insanity', 13),
(16, 1, 4, 'Chien de la Casse 05', 4, '2008-11-15', '2015-06-21', 10, 10, '36 72 Frequency', 11, 'Mitsutek', 5, 'P.O.L.O', 16, 'Lobotomie', 3),
(17, 1, 4, 'Chien de la Casse 06', 4, '2009-01-03', '2015-06-21', 10, 10, 'City', 1, 'Sluty Bass', 1, 'The Super Jam', 1, 'Goodfellas', 9),
(18, 1, 4, 'Chien de la Casse 07', 4, '2010-11-06', '2015-06-21', 10, 10, 'Last Opus', 5, 'Rise to Rage', 11, 'Nevermind', 5, 'Good Year', 6),
(19, 1, 4, 'Chien de la Casse 08', 4, '2013-03-09', '2015-06-21', 10, 10, 'Boogie Down', 1, 'Burning Hives', 11, 'Fire the Body', 1, 'Prophetie', 10),
(20, 1, 4, 'Chien de la Casse 09', 4, '2015-01-04', '2015-06-21', 10, 10, 'Kicks Folies', 16, 'Ratissage', 1, 'Y.O.Y.O', 7, 'First Love', 7),
(21, 2, 2, 'Prostitution Sonore 05', 4, '2010-11-06', '2015-06-20', 10, 10, 'Manu''Ko', 11, 'Valse en 4 Temps', 11, 'Saw', 12, 'Welcome to the Real World', 12),
(22, 2, 2, 'Prostitution Sonore 06', 4, '2012-05-19', '2015-06-20', 10, 10, 'Transformers', 12, 'New Born', 12, 'Bongo Boom', 13, 'Sexy Chao', 14),
(23, 2, 2, 'Prostitution Sonore 07', 4, '2012-10-20', '2015-06-20', 20, 10, 'Resident Evil', 12, 'Scary Monster', 15, 'Scary Silence', 12, 'Sysmik', 15),
(24, 2, 2, 'Prostitution Sonore 08', 4, '2014-07-13', '2015-06-20', 20, 10, 'Raining Blood', 16, 'No, No, No', 18, 'Imperial March', 17, 'American Song', 20),
(25, 2, 2, 'Prostitution Sonore 09', 4, '2015-05-02', '2015-06-20', 10, 10, 'Smash Space', 18, 'Nucleart', 19, 'Hard Symphony', 20, 'Beetlebass', 21);

-- --------------------------------------------------------

--
-- Table structure for table `ft_users`
--

CREATE TABLE IF NOT EXISTS `ft_users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `privilege` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ft_users`
--

INSERT INTO `ft_users` (`id`, `name`, `mail`, `password`, `privilege`, `date`) VALUES
(1, 'Metropolitan', 'ransidei@student.42.fr', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2015-06-20'),
(3, 'gaetanpueo', 'gpueo--g@student.42.fr', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ft_artists`
--
ALTER TABLE `ft_artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_categories`
--
ALTER TABLE `ft_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_labels`
--
ALTER TABLE `ft_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_orders`
--
ALTER TABLE `ft_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_productions`
--
ALTER TABLE `ft_productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_products`
--
ALTER TABLE `ft_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_users`
--
ALTER TABLE `ft_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ft_artists`
--
ALTER TABLE `ft_artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ft_categories`
--
ALTER TABLE `ft_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ft_labels`
--
ALTER TABLE `ft_labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ft_orders`
--
ALTER TABLE `ft_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ft_productions`
--
ALTER TABLE `ft_productions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ft_products`
--
ALTER TABLE `ft_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ft_users`
--
ALTER TABLE `ft_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
