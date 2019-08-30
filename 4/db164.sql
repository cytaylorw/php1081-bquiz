-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-08-30 16:22:25
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
-- 資料庫： `db164`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perm` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `name`, `file`, `sh`, `ord`, `rdate`, `acc`, `pw`, `perm`) VALUES
(1, '', '', 1, 0, '0000-00-00', 'admin', '1234', 'a:6:{i:0;s:1:\"0\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"4\";i:5;s:1:\"5\";}'),
(2, '', '', 1, 0, '0000-00-00', 'root', '1234', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `bot`
--

CREATE TABLE `bot` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bot`
--

INSERT INTO `bot` (`id`, `name`, `file`, `sh`, `ord`, `rdate`) VALUES
(1, '2019頁尾版權1', '', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- 資料表結構 `cat`
--

CREATE TABLE `cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cat`
--

INSERT INTO `cat` (`id`, `name`, `file`, `sh`, `ord`, `rdate`) VALUES
(3, '流行皮件', '', 1, 0, '0000-00-00'),
(4, '流行鞋區', '', 1, 0, '0000-00-00'),
(5, '流行飾品', '', 1, 0, '0000-00-00'),
(6, '背包', '', 1, 0, '0000-00-00'),
(7, '背包', '', 1, 6, '0000-00-00'),
(9, '男用皮件', '', 1, 3, '0000-00-00'),
(10, '女用皮件', '', 1, 3, '0000-00-00'),
(11, '少女鞋區', '', 1, 4, '0000-00-00'),
(12, '紳士流行鞋區', '', 1, 4, '0000-00-00'),
(13, '時尚手錶', '', 1, 5, '0000-00-00'),
(14, '時尚珠寶', '', 1, 5, '0000-00-00');

-- --------------------------------------------------------

--
-- 資料表結構 `mem`
--

CREATE TABLE `mem` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mem`
--

INSERT INTO `mem` (`id`, `name`, `file`, `sh`, `ord`, `rdate`, `acc`, `pw`, `tel`, `addr`, `email`) VALUES
(1, '123', '', 1, 0, '2019-08-30', '123', '123', '123', '123', '123'),
(2, '4567', '', 1, 0, '2019-08-30', '456', '456', '4567', '4567', '4567');

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gsum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `name`, `file`, `sh`, `ord`, `rdate`, `acc`, `email`, `addr`, `tel`, `cart`, `gsum`, `no`) VALUES
(4, '123', '', 1, 0, '2019-08-30', '123', '123', '123', '123', 'a:1:{i:1;a:5:{s:2:\"no\";s:6:\"030901\";s:4:\"name\";s:18:\"手工訂製長夾\";s:3:\"num\";s:1:\"1\";s:5:\"price\";s:4:\"1200\";s:4:\"gsum\";s:4:\"1200\";}}', '1200', '20190830000001'),
(5, '123', '', 1, 0, '2019-08-30', '123', '123', '123', '123', 'a:2:{i:1;a:5:{s:2:\"no\";s:6:\"030901\";s:4:\"name\";s:18:\"手工訂製長夾\";s:3:\"num\";s:1:\"1\";s:5:\"price\";s:4:\"1200\";s:4:\"gsum\";s:4:\"1200\";}i:3;a:5:{s:2:\"no\";s:6:\"030903\";s:4:\"name\";s:30:\"超薄設計男士長款真皮\";s:3:\"num\";s:1:\"1\";s:5:\"price\";s:3:\"800\";s:4:\"gsum\";s:3:\"800\";}}', '2000', '20190830000005');

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `test`
--

INSERT INTO `test` (`id`, `name`, `file`, `sh`, `ord`, `rdate`) VALUES
(2, '123', '123', 1, 0, '0000-00-00'),
(4, '123', '123', 1, 0, '0000-00-00'),
(5, '123', '123', 1, 0, '0000-00-00'),
(6, '123', '123', 1, 0, '0000-00-00'),
(7, '123', '123', 1, 0, '0000-00-00'),
(8, '123', '123', 1, 0, '0000-00-00'),
(9, '123', '123', 1, 0, '0000-00-00'),
(10, '123', '123', 1, 0, '0000-00-00'),
(11, '123', '123', 1, 0, '0000-00-00'),
(12, '123', '123', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- 資料表結構 `th`
--

CREATE TABLE `th` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT '1',
  `ord` int(10) NOT NULL,
  `rdate` date NOT NULL,
  `cat1` int(10) NOT NULL,
  `cat2` int(10) NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `th`
--

INSERT INTO `th` (`id`, `name`, `file`, `sh`, `ord`, `rdate`, `cat1`, `cat2`, `no`, `price`, `spec`, `stock`, `intro`) VALUES
(1, '手工訂製長夾', './img/0403.jpg', 1, 0, '0000-00-00', 3, 9, '030901', '1200', '全牛皮', '3', '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色 '),
(2, '兩用式磁扣腰包', './img/0404.jpg', 1, 0, '0000-00-00', 3, 9, '030902', '685', '中型', '18', '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺灣'),
(3, '超薄設計男士長款真皮', './img/0405.jpg', 1, 0, '0000-00-00', 3, 9, '030903', '800', 'L號', '61', '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 \r\n'),
(4, '經典牛皮少女帆船鞋', './img/0406.jpg', 1, 0, '0000-00-00', 4, 11, '041104', '1000', 'S號', '6', '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂'),
(6, '經典優雅時尚流行涼鞋', './img/0407.jpg', 1, 0, '0000-00-00', 4, 12, '041205', '2650', 'LL', '8', '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒'),
(7, '寵愛天然藍寶女戒', './img/0408.jpg', 1, 0, '0000-00-00', 5, 14, '051407', '28000', '1克拉', '1', '◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造'),
(8, '反折式大容量手提肩背包', './img/0409.jpg', 1, 0, '0000-00-00', 6, 7, '060708', '888', 'L號', '15', '特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本\r\n'),
(9, '男單肩包男', './img/0410.jpg', 1, 0, '0000-00-00', 6, 7, '060709', '650', '多功能', '7', '特色:男單肩包/電腦包/公文包/雙肩背包多用途\r\n材質:帆不\r\n顏色:黑色\r\n尺寸:深11cm寬42cm高33cm\r\n產地:香港');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mem`
--
ALTER TABLE `mem`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `th`
--
ALTER TABLE `th`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `bot`
--
ALTER TABLE `bot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `mem`
--
ALTER TABLE `mem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `th`
--
ALTER TABLE `th`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
