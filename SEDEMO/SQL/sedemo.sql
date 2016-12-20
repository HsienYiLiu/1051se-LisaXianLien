-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-20 12:49:59
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sedemo`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bom`
--

CREATE TABLE `bom` (
  `bid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `flour` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sugar` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `butter` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bom`
--

INSERT INTO `bom` (`bid`, `flour`, `sugar`, `butter`) VALUES
('吐司', '15g', '5g', '2g'),
('法國麵包', '30g', '15g', '10g'),
('波蘿麵包', '25g', '10g', '5g');

-- --------------------------------------------------------

--
-- 資料表結構 `bread`
--

CREATE TABLE `bread` (
  `bid` int(11) NOT NULL,
  `expire` datetime NOT NULL,
  `bprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bread`
--

INSERT INTO `bread` (`bid`, `expire`, `bprice`) VALUES
(1, '2016-12-13 21:00:00', 30),
(2, '2016-12-22 00:00:00', 20),
(3, '2016-12-14 00:00:00', 25);

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `bid` int(10) DEFAULT NULL,
  `expire` datetime NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `game`
--

INSERT INTO `game` (`id`, `bid`, `expire`, `name`) VALUES
(1, 1, '2016-12-15 11:37:28', 'No 1'),
(2, 1, '2016-12-15 11:37:36', 'No 2');

-- --------------------------------------------------------

--
-- 資料表結構 `machine`
--

CREATE TABLE `machine` (
  `Mid` int(11) NOT NULL,
  `pid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Mprice` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `bid` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `machine`
--

INSERT INTO `machine` (`Mid`, `pid`, `Mprice`, `status`, `bid`) VALUES
(1, '123', 1000, 0, '0');

-- --------------------------------------------------------

--
-- 資料表結構 `material`
--

CREATE TABLE `material` (
  `mid` int(11) NOT NULL,
  `mname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `material`
--

INSERT INTO `material` (`mid`, `mname`, `mprice`) VALUES
(1, '麵粉', 70),
(2, '油', 105),
(3, '雞蛋', 14);

-- --------------------------------------------------------

--
-- 資料表結構 `minventory`
--

CREATE TABLE `minventory` (
  `water` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `minventory`
--

INSERT INTO `minventory` (`water`, `pid`, `mid`, `quantity`) VALUES
(1, 1, 1, 50),
(2, 1, 2, 300),
(3, 1, 3, 400),
(4, 2, 1, 100),
(5, 2, 2, 300),
(6, 2, 3, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `pid` int(10) NOT NULL,
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`pid`, `id`, `pwd`, `name`, `email`, `money`) VALUES
(1, '1', '1', '軟工兒', 's256786@gmail', 9000),
(2, '2', '0', '恩豪兒', '123456@gmail.com', 90000);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`bid`);

--
-- 資料表索引 `bread`
--
ALTER TABLE `bread`
  ADD PRIMARY KEY (`bid`);

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`Mid`);

--
-- 資料表索引 `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mid`);

--
-- 資料表索引 `minventory`
--
ALTER TABLE `minventory`
  ADD PRIMARY KEY (`water`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`pid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `bread`
--
ALTER TABLE `bread`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `material`
--
ALTER TABLE `material`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `minventory`
--
ALTER TABLE `minventory`
  MODIFY `water` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `player`
--
ALTER TABLE `player`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
