-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Stř 24. úno 2021, 22:53
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `mindquiz`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `englishwords`
--

CREATE TABLE `englishwords` (
  `id` int(11) NOT NULL,
  `englishWord` varchar(50) NOT NULL,
  `czechWord` varchar(50) NOT NULL,
  `level` int(11) DEFAULT 1,
  `removed` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `englishwords`
--

INSERT INTO `englishwords` (`id`, `englishWord`, `czechWord`, `level`, `removed`) VALUES
(4, 'girl', 'holka', 1, b'1'),
(5, 'monkey', 'opice', 1, b'0'),
(6, 'cops', 'policisté', 1, b'0'),
(7, 'sand', 'písek', 1, b'0'),
(8, 'chair', 'židle', 1, b'0'),
(10, 'table', 'stůl', 1, b'0'),
(11, 'aluminium', 'hliník', 1, b'0'),
(12, 'dog', 'pes', 1, b'0'),
(13, 'computer', 'počítač', 1, b'0'),
(14, 'stupid', 'hloupý', 1, b'0'),
(17, 'boy', 'kluk', 1, b'0'),
(18, 'man', 'muž', 1, b'0'),
(19, 'window', 'okno', 1, b'0'),
(20, 'keyboard', 'klávesnice', 1, b'0'),
(22, 'wire', 'drát', 1, b'0'),
(23, 'soldering', 'pájení', 1, b'0'),
(24, 'traffic lights', 'semafor', 1, b'0'),
(25, 'wood', 'dřevo', 1, b'0'),
(26, 'wooden', 'dřevěný', 1, b'0'),
(27, 'bed', 'postel', 1, b'0'),
(28, 'house', 'dům', 1, b'0'),
(29, 'person', 'osoba', 1, b'0'),
(30, 'quiz', 'kvíz', 1, b'0'),
(31, 'brain', 'mozek', 1, b'0'),
(32, 'mind', 'mysl', 1, b'0'),
(33, 'circle', 'kruh', 1, b'0'),
(34, 'wheel', 'kolo', 1, b'0'),
(35, 'charger', 'nabíječka', 1, b'0'),
(36, 'socket', 'zásuvka', 1, b'0'),
(37, 'wall', 'stěna', 1, b'0'),
(38, 'color', 'barva', 1, b'0'),
(39, 'mouse', 'myš', 1, b'0'),
(40, 'church', 'kostel', 1, b'0'),
(41, 'school', 'škola', 1, b'0'),
(42, 'job', 'práce', 1, b'0'),
(43, 'running', 'utíkat', 1, b'0'),
(44, 'run', 'běh', 1, b'0'),
(45, 'colorful', 'barevný', 1, b'0'),
(46, 'song', 'píseň', 1, b'0'),
(47, 'sound', 'zvuk', 1, b'0'),
(48, 'card', 'karta', 1, b'0'),
(49, 'package', 'balík', 1, b'0'),
(50, 'unpack', 'rozbalit', 1, b'0'),
(51, 'hold', 'držet', 1, b'0'),
(52, 'welding', 'svařování', 1, b'0'),
(54, 'motorcycle', 'motorka', 1, b'0'),
(57, 'doctor', 'doktor', 1, b'0'),
(58, 'sister', 'sestra', 1, b'0'),
(59, 'brother', 'bratr', 1, b'0'),
(60, 'mum', 'máma', 1, b'0'),
(61, 'dad', 'táta', 1, b'0'),
(62, 'deep', 'hluboký', 1, b'0'),
(63, 'hammer', 'kladivo', 1, b'0'),
(67, 'display', 'obrazovka', 1, b'0'),
(69, 'ghost', 'duch', 1, b'0'),
(70, 'light bulb', 'žárovka', 1, b'0'),
(71, 'welding tool', 'svářečka', 1, b'0'),
(72, 'device', 'zařízení', 1, b'0'),
(73, 'road', 'cesta', 1, b'0'),
(74, 'message', 'zpráva', 1, b'0'),
(75, 'midnight', 'půlnoc', 1, b'0'),
(76, 'miner', 'horník', 1, b'0'),
(77, 'motive', 'motiv', 1, b'0'),
(78, 'hřebík', 'nail', 1, b'0'),
(79, 'nature', 'příroda', 1, b'0'),
(80, 'needless', 'zbytečný', 1, b'0'),
(81, 'negative', 'záporný', 1, b'0'),
(82, 'network', 'síť', 1, b'0'),
(83, 'hezký', 'nice', 1, b'0'),
(84, 'nickname', 'přezdívka', 1, b'0'),
(85, 'reportér', 'newsman', 1, b'1'),
(86, 'newspaper', 'noviny', 1, b'0'),
(87, 'neural', 'nervový', 1, b'0'),
(88, 'nosy', 'zvídavý', 1, b'0'),
(89, 'nitrogen', 'dusík', 1, b'0'),
(90, 'noisy', 'hlučný', 1, b'0'),
(91, 'none', 'žádný', 1, b'0'),
(92, 'oak', 'dub', 1, b'0'),
(93, 'numerical', 'číselný', 1, b'0'),
(94, 'nun', 'jeptiška', 1, b'0'),
(95, 'nut', 'ořech', 1, b'0'),
(96, 'object', 'objekt', 1, b'0'),
(97, 'ocean', 'oceán', 1, b'0'),
(98, 'odds', 'šance', 1, b'0'),
(99, 'obtain', 'získat', 1, b'0'),
(100, 'obsess', 'posednout', 1, b'0'),
(101, 'optical', 'optický', 1, b'0'),
(102, 'organize', 'zařídit', 1, b'0'),
(103, 'outdated', 'zastaralý', 1, b'0'),
(104, 'outdoor', 'venkovní', 1, b'0'),
(105, 'outer', 'vnější', 1, b'0'),
(106, 'outline', 'nastínit', 1, b'0'),
(107, 'outlook', 'náhled', 1, b'0'),
(108, 'overly', 'příliš', 1, b'0'),
(109, 'panda', 'panda', 1, b'0'),
(110, 'pair', 'pár', 1, b'0'),
(111, 'passive', 'pasivní', 1, b'0'),
(112, 'picture', 'obrázek', 1, b'0'),
(113, 'Hotdog', 'Teplý pes', 1, b'0'),
(114, 'slave', 'otrok', 1, b'0'),
(115, 'mobile', 'mobil', 1, b'0'),
(116, 'lazy', 'lenivý', 1, b'0'),
(117, 'check', 'kontrola', 1, b'0'),
(118, 'holder', 'držák', 1, b'0'),
(119, 'black', 'černý', 1, b'0'),
(120, 'white', 'bílá', 1, b'0'),
(121, 'spring', 'pružina', 1, b'0'),
(122, 'newsman', 'reportér', 1, b'0'),
(123, 'prison', 'vězení', 1, b'0'),
(124, 'summer', 'léto', 1, b'0'),
(125, 'headache', 'bolest hlavy', 1, b'0'),
(126, 'jawa', 'fichtl', 1, b'1');

-- --------------------------------------------------------

--
-- Struktura tabulky `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
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

INSERT INTO `users` (`id`, `uid`, `ip`, `name`, `password`, `currentQuestion`, `questionsDone`, `questionsSuccess`, `dateCreated`) VALUES
(543, '60265cb4ebb4c', '77.242.92.81', '', '', 90, 10, 9, '2021-02-12 11:47:16'),
(544, '60265ce5b82fd', '77.242.92.81', '', '', 102, 10, 7, '2021-02-12 11:48:05'),
(545, '60265d6065ae9', '185.221.124.136', '', '', 120, 10, 10, '2021-02-12 11:50:08'),
(546, '60265dd95ff70', '77.242.92.81', '', '', 0, 0, 0, '2021-02-12 11:52:09'),
(547, '602673e3a695c', '185.221.124.205', '', '', 38, 10, 10, '2021-02-12 13:26:11'),
(548, '6026741a30895', '185.221.124.205', '', '', 6, 10, 10, '2021-02-12 13:27:06'),
(549, '6026748b0f25a', '185.221.124.205', '', '', 48, 10, 5, '2021-02-12 13:28:59'),
(550, '6026763279a46', '185.221.124.205', '', '', 120, 10, 10, '2021-02-12 13:36:02'),
(551, '602676564c6f1', '185.221.124.205', '', '', 0, 0, 0, '2021-02-12 13:36:38'),
(552, '6026855794480', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:39'),
(553, '60268558ea9aa', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:40'),
(554, '6026855a290d9', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:42'),
(555, '6026855b2d33f', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:43'),
(556, '6026855c6cffb', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:44'),
(557, '6026855e17fef', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:46'),
(558, '6026855f8c120', '192.99.18.136', '', '', 0, 0, 0, '2021-02-12 14:40:47'),
(559, '602695c4a2611', '185.221.124.205', '', '', 26, 10, 2, '2021-02-12 15:50:44'),
(560, '602695ed35b46', '185.221.124.205', '', '', 95, 10, 10, '2021-02-12 15:51:25'),
(561, '6026963d29cef', '185.221.124.205', '', '', 0, 0, 0, '2021-02-12 15:52:45'),
(562, '6026bebf42e5f', '82.202.114.215', '', '', 118, 10, 7, '2021-02-12 18:45:35'),
(563, '6026bf0db0530', '82.202.114.215', '', '', 0, 0, 0, '2021-02-12 18:46:53'),
(564, '6026c3d0d33a4', '173.252.87.5', '', '', 0, 0, 0, '2021-02-12 19:07:12'),
(565, '6026c3d3b5507', '173.252.87.5', '', '', 0, 0, 0, '2021-02-12 19:07:15'),
(566, '6028059f28c47', '::1', '', '', 61, 10, 9, '2021-02-13 18:00:15'),
(567, '602a2ba1b6073', '::1', '', '', 45, 10, 9, '2021-02-15 09:06:57'),
(568, '602a2cae33afe', '::1', '', '', 57, 10, 6, '2021-02-15 09:11:26'),
(569, '602a33499f566', '185.221.125.128', '', '', 0, 0, 0, '2021-02-15 09:39:37'),
(570, '602b814483b6d', '::1', '', '', 48, 10, 8, '2021-02-16 09:24:36'),
(571, '602b882767548', '94.113.183.24', '', '', 0, 0, 0, '2021-02-16 09:53:59'),
(572, '602b8905c30b5', '94.113.183.24', '', '', 72, 10, 9, '2021-02-16 09:57:41'),
(573, '602b8934ee064', '94.113.183.24', '', '', 90, 10, 10, '2021-02-16 09:58:28'),
(574, '602b8959985bf', '94.113.183.24', '', '', 0, 0, 0, '2021-02-16 09:59:05'),
(575, '602b90b04a366', '::1', '', '', 99, 7, 3, '2021-02-16 10:30:24'),
(576, '602b910c2e906', '185.221.124.205', '', '', 116, 10, 4, '2021-02-16 10:31:56'),
(577, '602b911f0c86d', '185.221.125.128', '', '', 0, 0, 0, '2021-02-16 10:32:15'),
(578, '6036b6df60e62', '::1', '', '', 0, 0, 0, '2021-02-24 21:28:15'),
(579, '6036bec5108ac', '185.221.124.205', '', '', 0, 0, 0, '2021-02-24 22:01:57'),
(580, '6036c6fd9c8b8', '185.221.124.205', '', '', 0, 0, 0, '2021-02-24 22:37:01');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `englishwords`
--
ALTER TABLE `englishwords`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `settings`
--
ALTER TABLE `settings`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pro tabulku `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
