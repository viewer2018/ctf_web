-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 11 月 23 日 23:22
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `newbegin`
--

-- --------------------------------------------------------

--
-- 表的结构 `xi_dian`
--

CREATE TABLE IF NOT EXISTS `xi_dian` (
  `id` int(4) DEFAULT NULL,
  `username` char(16) DEFAULT NULL,
  `password` char(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `xi_dian`
--

INSERT INTO `xi_dian` (`id`, `username`, `password`) VALUES
(1, 'clm136526', '*F4E9FF5065090E14CFA488CCF23D0B4BBB77E1D8'),
(2, 'RhythmMark', NULL),
(3, 'G-Ricky', NULL),
(4, 'zidahong', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
