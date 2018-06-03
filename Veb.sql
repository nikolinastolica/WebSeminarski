-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2017 at 06:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Veb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_usera` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `mesto` varchar(75) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `pol` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `datum_registracije` date NOT NULL,
  `newsletter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_usera`, `admin`, `ime`, `prezime`, `adresa`, `mesto`, `username`, `password`, `pol`, `mail`, `datum_registracije`, `newsletter`) VALUES
(1, 0, 'Nikolina', 'Stolica', 'Sumatovacka 124A', 'Beograd', 'niki', 'niki', 0, 'niki@niki', '2017-03-19', 0),
(2, 1, 'Smilja', 'Rakic', 'Vodovodska 85', 'Novi Sad', 'smiki', 'smiki', 0, 'smiki@smiki', '2017-03-01', 0),
(3, 0, 'Ana', 'Anic', 'Takovska', 'Beograd', 'ana', 'ana', 2, 'ana@ana', '0000-00-00', 0),
(4, 0, 'Marija', 'Maric', 'Beograd', 'Beograd', 'marija', 'marija', 1, 'marija@marija', '2017-06-14', 1),
(5, 0, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1, 'asd', '2017-06-14', 0),
(6, 0, 'Nina', 'Nikolic', 'Kralja Petra 128', 'Boegrad', 'nina', 'nina', 2, 'nina@nina', '2017-06-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kupovine`
--

CREATE TABLE `kupovine` (
  `id_kupovine` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `datum_kupovie` date NOT NULL,
  `cena_isporuke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupovine`
--

INSERT INTO `kupovine` (`id_kupovine`, `id_korisnika`, `id_item`, `datum_kupovie`, `cena_isporuke`) VALUES
(14, 2, 3, '2017-06-14', 0),
(15, 2, 7, '2017-06-14', 0),
(16, 2, 3, '2017-06-14', 0),
(17, 2, 3, '2017-06-14', 0),
(18, 2, 3, '2017-06-14', 0),
(19, 2, 9, '2017-06-14', 110),
(20, 2, 9, '2017-06-14', 199),
(21, 4, 9, '2017-06-14', 3),
(22, 2, 5, '2017-06-14', 200);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `meni_number` int(11) NOT NULL,
  `type_it` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `materials` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`meni_number`, `type_it`, `name`, `price`, `materials`) VALUES
(1, 1, 'Capircciosa', 670, 'Pelat, sir, praška šunka, svež paradajz, šampinjoni, masline, origano, susam'),
(2, 4, 'Cezar salata', 370, 'Iceberg salata, piletina, hrskava slanina, parmezan, inćuni.'),
(5, 2, 'Koka kola', 150, ''),
(6, 2, 'Aqua Viva', 130, ''),
(7, 3, 'Palačinke', 300, 'Nutela, eurokrem, plazma, med, orasi, džem, višnje, bela linolada.'),
(8, 3, 'Bombe Glaceè', 100, 'Fenomenalno osvežavajuća ledena čokoladna bomba sa sladoledom od vanile i voćem, servirano sa toplim karamelom.'),
(9, 1, 'El Toro', 150, 'Pelat, sir, goveđi pršut,šampinjoni, dimljene masline, crno vino, parmezan, crveni luk, origano, susam.'),
(10, 1, 'Frutti di Mare', 780, 'Pelat, šampinjoni, morski plodovi, ringlice, limun, maslinovo ulje, masline crne, ruzmarin, beli luk, rukola, svež paradajz origano, susam.\r\n'),
(11, 1, 'Funghi', 610, 'Pelat, sir, šampinjoni, svež paradajz, masline, origano, susam.'),
(12, 1, 'Gorgonzola', 740, 'Pelat, sir, masline crne, gorgonzola, orah, svež paradajz, origano, susam.'),
(13, 1, 'Calcona', 750, 'Pelat,sir, kulen, praška šunka, dimljeni sir, parmezan, origano, susam.'),
(14, 1, 'Margarita', 590, 'Pelat, sir, masline, parmezan, svez paradajz, origano, susam.\r\n'),
(15, 1, 'Quatro Formaggi', 740, 'Pelat, parmezan, mozzarela, pavlaka, gorgonzola, dimljeni sir, masline crne, orah, svež paradajz, origano, susam.'),
(16, 3, 'Bacio Italiano', 250, 'Čokoladna lopta punjena vanilom i oreo keksom, servirano na musu od marakuje i bele čokolade, preliveno toplom čokoladom.'),
(17, 3, 'White Lady', 360, 'Mus od bele čokolade punjen malinama, pistaći, sladoled od šumskog voća.'),
(18, 4, 'Losos & Lignje salata sa susamom', 450, 'Miks zelenih salata, krastavac, celer, đumbir, dresing od limete.'),
(19, 4, 'Pileća Cobb salata', 360, 'Salata sa pečenim pilećim grudima mariniranim sa limunom i senfom, avokado, Slanina, miks zelenih salata, listići badema, ananas.'),
(20, 4, 'Sečuanska Salata', 470, 'Marinirana piletina, miks salata, pečurke, krastavac, kukuruz u klipu, dressing, susam, sweet chili sos.'),
(21, 2, 'Bitter Lemon', 180, ''),
(22, 2, 'Fanta', 180, '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `name` varchar(75) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `name`) VALUES
(1, 'Pizza'),
(2, 'Piće'),
(3, 'Dezert'),
(4, 'Salata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_usera`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kupovine`
--
ALTER TABLE `kupovine`
  ADD PRIMARY KEY (`id_kupovine`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`meni_number`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_usera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kupovine`
--
ALTER TABLE `kupovine`
  MODIFY `id_kupovine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `meni_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
