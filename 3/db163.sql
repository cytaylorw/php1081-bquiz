-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-08-30 09:20:51
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db163`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ani`
--

CREATE TABLE `ani` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ani`
--

INSERT INTO `ani` (`id`, `name`, `file`, `sh`, `ord`) VALUES
(1, '', '', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `mv`
--

CREATE TABLE `mv` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `rate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dur` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdate` date NOT NULL,
  `pub` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mv`
--

INSERT INTO `mv` (`id`, `name`, `file`, `sh`, `rate`, `dur`, `sdate`, `pub`, `dir`, `trail`, `post`, `intro`, `ord`) VALUES
(1, '院線片1', '', 1, '0', '120', '2019-01-01', '院線片1', '院線片1', './img/03B01v.avi', './img/03B01.png', '院線片1', 1),
(3, '院線片2', '', 1, '1', '120', '2019-08-28', '院線片2', '院線片2', './img/03B02v.mp4', './img/03B02.png', '院線片2', 3),
(4, '院線片3', '', 1, '1', '120', '2019-08-29', '院線片3', '院線片3', './img/03B03v.mp4', './img/03B03.png', '院線片3', 4),
(5, '院線片4t', '', 1, '3', '120', '2019-08-27', '院線片4', '院線片4', './img/03B04v.mp4', './img/03B04.png', '院線片4', 5),
(6, '院線片5', '', 1, '0', '120', '2019-08-28', '院線片5', '院線片5', './img/03B05v.mp4', './img/03B05.png', '院線片5', 6),
(7, '院線片6', '', 1, '1', '120', '2019-08-29', '院線片6', '院線片6', './img/03B06v.mp4', './img/03B06.png', '院線片6', 7),
(8, '院線片7', '', 1, '3', '120', '2019-08-28', '院線片7', '院線片7', './img/03B07v.mp4', './img/03B07.png', '院線片7', 8);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `odate` date NOT NULL,
  `ses` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `name`, `file`, `sh`, `no`, `odate`, `ses`, `total`, `seat`) VALUES
(8, '院線片2', '', 1, '201908290001', '2019-08-29', '18:00 ~ 20:00', 3, 'a:3:{i:0;s:8:\"2排2號\";i:1;s:8:\"2排3號\";i:2;s:8:\"2排4號\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`id`, `name`, `file`, `sh`, `ord`) VALUES
(3, '預告片1', './img/03A01.jpg', 1, 1),
(4, '預告片2', './img/03A02.jpg', 1, 2),
(5, '預告片3', './img/03A03.jpg', 1, 3),
(6, '預告片4', './img/03A04.jpg', 1, 4),
(7, '預告片5', './img/03A05.jpg', 1, 5),
(8, '預告片6', './img/03A06.jpg', 1, 6),
(9, '預告片7', './img/03A07.jpg', 1, 7),
(10, '預告片8', './img/03A08.jpg', 0, 8);

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ani`
--
ALTER TABLE `ani`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mv`
--
ALTER TABLE `mv`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `ani`
--
ALTER TABLE `ani`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `mv`
--
ALTER TABLE `mv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
