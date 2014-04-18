-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014-04-18 15:42:16
-- 服务器版本: 5.0.96-community-nt
-- PHP 版本: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `a0413103957`
--

-- --------------------------------------------------------

--
-- 表的结构 `money`
--

CREATE TABLE IF NOT EXISTS `money` (
  `id` int(11) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL,
  `fenhong` int(1) NOT NULL default '0',
  `money` float NOT NULL,
  `timer` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `money`
--

INSERT INTO `money` (`id`, `uid`, `fenhong`, `money`, `timer`) VALUES
(1, 123456789, 0, 100, 1234567891),
(2, 123456789, 0, 123, 1397542450),
(3, 123456796, 0, 123, 1397542450),
(4, 123456789, 0, 1, 1397542498),
(5, 123456796, 0, 1, 1397542498),
(6, 123456789, 0, 123, 1397542663),
(7, 123456796, 0, 123, 1397542663),
(8, 123456789, 0, 123, 1397542671),
(9, 123456796, 0, 123, 1397542671),
(10, 123456789, 0, 123, 1397542683),
(11, 123456796, 0, 123, 1397542683),
(12, 123456789, 0, 1, 1397542729),
(13, 123456796, 0, 1, 1397542729),
(14, 123456789, 0, 1, 1397542767),
(15, 123456796, 0, 1, 1397542767),
(16, 123456789, 0, 1.25, 1397542846),
(17, 123456796, 0, 1.25, 1397542846),
(18, 123456789, 0, 240, 1397613946),
(19, 123456796, 0, 240, 1397613946),
(20, 123456797, 0, 240, 1397613946),
(21, 123456798, 0, 240, 1397613946),
(22, 123456789, 0, 240, 1397615320),
(23, 123456796, 0, 240, 1397615320),
(24, 123456797, 0, 240, 1397615320),
(25, 123456798, 0, 240, 1397615320),
(26, 123456789, 0, 60, 1397619852),
(27, 123456789, 0, 60, 1397620195),
(28, 123456789, 0, 60, 1397623814),
(29, 123456797, 0, 60, 1397715702),
(30, 123456789, 0, 60, 1397715717),
(31, 123456797, 0, 60, 1397715807),
(32, 123456797, 0, 60, 1397715838),
(33, 123456789, 0, 60, 1397716476),
(34, 123456797, 0, 40, 1397716476),
(35, 123456797, 0, 60, 1397801135),
(36, 123456797, 0, 60, 1397802158),
(37, 123456797, 0, 60, 1397802282),
(38, 123456789, 0, 40, 1397802283),
(39, 0, 0, 20, 1397802283);

-- --------------------------------------------------------

--
-- 表的结构 `shouru`
--

CREATE TABLE IF NOT EXISTS `shouru` (
  `id` bigint(20) NOT NULL auto_increment,
  `money` float NOT NULL,
  `timer` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `shouru`
--

INSERT INTO `shouru` (`id`, `money`, `timer`) VALUES
(1, 1800, 1397551065),
(2, 600, 1397553785),
(3, 600, 1397553787),
(4, 1200, 1397619563),
(5, 1800, 1397619652),
(6, 1200, 1397619661),
(7, 600, 1397619707),
(8, 600, 1397619762),
(9, 600, 1397619778),
(10, 600, 1397619852),
(11, 600, 1397620195),
(12, 600, 1397623814),
(13, 600, 1397715702),
(14, 600, 1397715717),
(15, 600, 1397715807),
(16, 600, 1397715838),
(17, 600, 1397716476),
(18, 600, 1397801135),
(19, 600, 1397802158),
(20, 600, 1397802282);

-- --------------------------------------------------------

--
-- 表的结构 `tixian`
--

CREATE TABLE IF NOT EXISTS `tixian` (
  `id` bigint(20) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL,
  `tongguo` int(1) NOT NULL default '0',
  `username` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `money` float NOT NULL,
  `timer` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tixian`
--

INSERT INTO `tixian` (`id`, `uid`, `tongguo`, `username`, `card`, `money`, `timer`) VALUES
(1, 0, 1, '总部', '', 100, 1397468004),
(2, 123456789, 1, '总部', '', 100, 1397539978),
(3, 123456789, 1, '总部', '', 123, 1397542487),
(4, 123456789, 1, '总部', '', 373.25, 1397542988),
(5, 123456789, 1, '总部', '', 240, 1397614076);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL,
  `xianshi` bigint(20) NOT NULL,
  `money` decimal(20,2) NOT NULL default '0.00',
  `tiqu` decimal(20,2) NOT NULL default '0.00',
  `dongjie` bigint(20) NOT NULL default '0',
  `card` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `timer` int(20) NOT NULL COMMENT '注册时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户列表' AUTO_INCREMENT=123456800 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `uid`, `xianshi`, `money`, `tiqu`, `dongjie`, `card`, `password`, `phone`, `username`, `timer`) VALUES
(123456789, 0, 1, '10000600.00', '0.00', 0, '', '123456', 18652303899, '总部', 1344091167),
(123456796, 123456789, 1, '2400.00', '0.00', 0, '234234', '123456', 234234, 'sdfsdf', 1397463027),
(123456797, 123456789, 1, '3000.00', '0.00', 0, '234234', '123456', 123123123, 'asdf', 1397546774),
(123456798, 123456789, 1, '4200.00', '0.00', 0, '234234', '123456', 234234, 'sdfsdf', 1397546793),
(123456799, 123456797, 1, '3600.00', '0.00', 0, '123123', '123456', 123321123, 'cc', 1397624135);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
