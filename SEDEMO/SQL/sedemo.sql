-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-25 08:50:01
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
  `water` int(100) NOT NULL,
  `bid` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bom`
--

INSERT INTO `bom` (`water`, `bid`, `mid`, `quantity`) VALUES
(1, 1, 1, 15),
(2, 1, 2, 20),
(3, 1, 3, 5),
(4, 2, 1, 15),
(5, 2, 2, 35),
(6, 2, 3, 10),
(7, 3, 1, 20),
(8, 3, 2, 18),
(9, 3, 3, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `bread`
--

CREATE TABLE `bread` (
  `bid` int(11) NOT NULL,
  `expire` datetime NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `bprice` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bread`
--

INSERT INTO `bread` (`bid`, `expire`, `quantity`, `bprice`, `time`) VALUES
(1, '2016-12-13 21:00:00', 446, 30, 3),
(2, '2016-12-22 00:00:00', 458, 20, 10),
(3, '2016-12-14 00:00:00', 472, 25, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `machine`
--

CREATE TABLE `machine` (
  `Mechid` int(11) NOT NULL,
  `pid` int(10) NOT NULL,
  `Mprice` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `bid` int(10) NOT NULL,
  `expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `machine`
--

INSERT INTO `machine` (`Mechid`, `pid`, `Mprice`, `status`, `bid`, `expire`) VALUES
(0, 1, 1000, 1, 1, '2016-12-25 00:37:10'),
(1, 1, 1000, 1, 1, '2016-12-25 00:37:11'),
(2, 1, 1000, 2, 2, '2016-12-25 00:37:41'),
(3, 1, 1000, 3, 3, '2016-12-25 00:37:37');

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
(1, '麵粉', 53),
(2, '油', 143),
(3, '雞蛋', 17);

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
(1, 1, 1, 400),
(2, 1, 2, 125),
(3, 1, 3, 774),
(4, 2, 1, 85),
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
  `money` int(11) NOT NULL,
  `mnuber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`pid`, `id`, `pwd`, `name`, `email`, `money`, `mnuber`) VALUES
(1, '1', '1', '軟工兒', 's256786@gmail', 65609, 4),
(2, '2', '0', '恩豪兒', '123456@gmail.com', 90315, 0),
(3, '3', '3', '23', '33@gmail.com', 0, 0),
(4, '55', '55', '55', '55@gmail.com', 9000, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`water`);

--
-- 資料表索引 `bread`
--
ALTER TABLE `bread`
  ADD PRIMARY KEY (`bid`);

--
-- 資料表索引 `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`Mechid`);

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
-- 使用資料表 AUTO_INCREMENT `bom`
--
ALTER TABLE `bom`
  MODIFY `water` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `bread`
--
ALTER TABLE `bread`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
