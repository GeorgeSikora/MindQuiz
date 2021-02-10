-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 08. úno 2021, 08:49
-- Verze serveru: 10.4.17-MariaDB
-- Verze PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `quizzes`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `englishwords`
--

CREATE TABLE `englishwords` (
  `id` int(11) NOT NULL,
  `englishWord` varchar(50) NOT NULL,
  `czechWord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `englishwords`
--

INSERT INTO `englishwords` (`id`, `englishWord`, `czechWord`) VALUES
(1, 'english', 'angličtina'),
(2, 'car', 'auto'),
(3, 'tractor', 'traktor'),
(4, 'girl', 'holka'),
(5, 'monkey', 'opice'),
(6, 'cops', 'policisté'),
(7, 'sand', 'písek'),
(8, 'chair', 'židle'),
(9, 'ghost', 'bubák'),
(10, 'table', 'stůl'),
(11, 'aluminium', 'hliník'),
(12, 'dog', 'pes'),
(13, 'computer', 'počítač'),
(14, 'stupid', 'debilní'),
(15, 'shit', 'hovno'),
(16, 'pussy', 'kočka'),
(17, 'boy', 'kluk'),
(18, 'man', 'muž'),
(19, 'window', 'okno'),
(20, 'keyboard', 'klávesnice'),
(21, 'bulb', 'žárovka'),
(22, 'wire', 'drát'),
(23, 'soldering', 'pájení'),
(24, 'traffic lights', 'semafor'),
(25, 'wood', 'dřevo'),
(26, 'wooden', 'dřevěný'),
(27, 'bed', 'postel'),
(28, 'house', 'dům'),
(29, 'person', 'osoba'),
(30, 'quiz', 'kvíz'),
(31, 'brain', 'mozek'),
(32, 'mind', 'mysl'),
(33, 'circle', 'kruh'),
(34, 'wheel', 'kolo'),
(35, 'charger', 'nabíječka'),
(36, 'socket', 'zásuvka'),
(37, 'wall', 'stěna'),
(38, 'color', 'barva'),
(39, 'mouse', 'myš'),
(40, 'church', 'kostel'),
(41, 'school', 'škola'),
(42, 'job', 'práce'),
(43, 'running', 'utíkat'),
(44, 'run', 'běh'),
(45, 'colorful', 'barevný'),
(46, 'song', 'píseň'),
(47, 'sound', 'zvuk'),
(48, 'card', 'karta'),
(49, 'package', 'balík'),
(50, 'unpack', 'rozbalit'),
(51, 'hold', 'držet'),
(52, 'welding', 'svařování'),
(53, 'welder', 'svářečka'),
(54, 'motorcycle', 'motorka'),
(55, 'Fichtl', 'Jawa 50'),
(56, 'Babetta', '210'),
(57, 'doctor', 'doktor'),
(58, 'sister', 'sestra'),
(59, 'brother', 'bratr'),
(60, 'mum', 'máma'),
(61, 'dad', 'táta'),
(62, 'deep', 'hluboko');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `currentQuestion` int(11) NOT NULL DEFAULT 0,
  `questionsDone` int(11) NOT NULL DEFAULT 0,
  `questionsSuccess` int(11) NOT NULL DEFAULT 0,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `password`, `currentQuestion`, `questionsDone`, `questionsSuccess`, `dateCreated`) VALUES
(49, '6020a1f8c3d40', '', '', 26, 10, 10, '2021-02-08 03:29:12'),
(50, '6020a269c6d17', '', '', 0, 0, 0, '2021-02-08 03:31:05'),
(51, '6020a47098db4', '', '', 31, 10, 10, '2021-02-08 03:39:44'),
(52, '6020a48d99c58', '', '', 61, 10, 10, '2021-02-08 03:40:13'),
(53, '6020a4b4bae87', '', '', 0, 0, 0, '2021-02-08 03:40:52');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `englishwords`
--
ALTER TABLE `englishwords`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `englishwords`
--
ALTER TABLE `englishwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
