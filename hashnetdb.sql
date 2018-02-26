-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 23, 2018 alle 09:41
-- Versione del server: 10.1.25-MariaDB
-- Versione PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hashnet`
--

CREATE DATABASE hashnet;

-- --------------------------------------------------------

--
-- Struttura della tabella `dictionary`
--

CREATE TABLE `dictionary` (
  `value` varchar(20) NOT NULL,
  `hash` varchar(300) NOT NULL,
  `z` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `v` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `n` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `k` int(11) NOT NULL,
  `h` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`z`,`x`,`c`,`v`,`b`,`n`,`m`,`l`,`k`,`h`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
