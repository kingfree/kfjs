-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 07 月 11 日 21:03
-- 服务器版本: 5.1.54
-- PHP 版本: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kfjs`
--

-- --------------------------------------------------------

--
-- 表的结构 `contest`
--

CREATE TABLE IF NOT EXISTS `contest` (
  `contest_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `defunct` char(1) NOT NULL DEFAULT 'N',
  `description` text,
  `private` tinyint(4) NOT NULL DEFAULT '0',
  `langmask` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'bits for LANG to mask',
  PRIMARY KEY (`contest_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1002 ;

--
-- 转存表中的数据 `contest`
--

INSERT INTO `contest` (`contest_id`, `title`, `start_time`, `end_time`, `defunct`, `description`, `private`, `langmask`) VALUES
(1000, 'HAOI 2011', '2011-04-24 12:00:00', '2011-04-24 16:00:00', 'N', NULL, 0, 0),
(1001, 'HAOI', '2011-04-25 13:00:00', '2011-04-25 17:00:00', 'N', NULL, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `contest_problem`
--

CREATE TABLE IF NOT EXISTS `contest_problem` (
  `problem_id` int(11) NOT NULL DEFAULT '0',
  `contest_id` int(11) DEFAULT NULL,
  `title` char(200) NOT NULL DEFAULT '',
  `num` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `contest_problem`
--


-- --------------------------------------------------------

--
-- 表的结构 `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `gid` int(11) NOT NULL,
  `group_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '1',
  `group_user` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `group`
--

INSERT INTO `group` (`gid`, `group_name`, `admin`, `group_user`, `comment`) VALUES
(0, '注册用户', 1, '0,1,2,3,4,5,6,7,8', '该站点的注册用户\r\n'),
(1, '管理员', 1, '0', '该站点的管理员用户\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `loginlog`
--

CREATE TABLE IF NOT EXISTS `loginlog` (
  `user_id` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(40) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `loginlog`
--

INSERT INTO `loginlog` (`user_id`, `password`, `ip`, `time`) VALUES
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-19 21:32:32'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-19 21:33:27'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-20 12:12:57'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-20 13:17:01'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-20 21:12:55'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-20 21:35:02'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-20 21:47:14'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-20 22:03:21'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-21 11:30:44'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-21 12:56:33'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-21 21:29:31'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-21 21:31:00'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '192.168.201.54', '2011-04-21 22:01:35'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '192.168.201.62', '2011-04-21 22:03:47'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-22 12:29:56'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-22 18:10:08'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-22 19:24:40'),
('aaa', '52c69e3a57331081823331c4e69d3f2e', '127.0.0.1', '2011-04-22 22:54:06'),
('Kingfree', '202cb962ac59075b964b07152d234b70', '127.0.0.1', '2011-04-23 15:25:39'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-23 15:25:46'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-23 19:20:21'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-23 20:13:34'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-23 20:33:23'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-24 12:47:54'),
('Test', '52c69e3a57331081823331c4e69d3f2e', '127.0.0.1', '2011-04-24 13:36:46'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-25 13:20:31'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-25 13:37:35'),
('K', 'd41d8cd98f00b204e9800998ecf8427e', '127.0.0.1', '2011-04-26 21:59:52'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-26 22:00:00'),
('fanzeyi', 'e4c80f58873ed6543da4f3001f592e7f', '192.168.201.242', '2011-04-27 17:04:12'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-27 21:29:30'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-04-30 01:33:04'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-03 13:36:03'),
('lidong', '62bc1de1ed50474dbdeb7cb18df666b3', '127.0.0.1', '2011-05-05 11:12:37'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-05 13:27:28'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-05 21:44:06'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-06 11:08:49'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-13 13:43:53'),
('Kingfree', '202cb962ac59075b964b07152d234b70', '127.0.0.1', '2011-05-14 10:39:37'),
('Kingfree', '202cb962ac59075b964b07152d234b70', '127.0.0.1', '2011-05-14 10:40:51'),
('Kingfree', '202cb962ac59075b964b07152d234b70', '127.0.0.1', '2011-05-14 10:41:28'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-14 10:41:56'),
('hello', '670b14728ad9902aecba32e22fa4f6bd', '127.0.0.1', '2011-05-14 11:07:27'),
('hello2', '670b14728ad9902aecba32e22fa4f6bd', '127.0.0.1', '2011-05-14 11:09:37'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-14 11:24:46'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-14 15:39:25'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-14 15:59:59'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-18 19:04:05'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-19 11:21:54'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-19 11:23:00'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-21 22:39:18'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-22 14:06:00'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-22 14:14:00'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-22 14:22:06'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-22 21:09:09'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-22 21:32:31'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-22 21:45:23'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-24 14:04:40'),
('', '', '', '2011-05-24 17:25:20'),
('UserName', '7e20d471144b1bff4e1f5d953e05ed15', '127.0.0.1', '2011-05-24 17:27:30'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-24 21:13:39'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 11:47:48'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 12:50:41'),
('', '', '', '2011-05-25 13:34:21'),
('', '', '', '2011-05-25 13:34:38'),
('Chinese', '3b261136e3c33f35e0a58611b1f344cb', '127.0.0.1', '2011-05-25 13:36:28'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 13:49:01'),
('UserName', '7e20d471144b1bff4e1f5d953e05ed15', '127.0.0.1', '2011-05-25 13:55:04'),
('UserName', '7e20d471144b1bff4e1f5d953e05ed15', '127.0.0.1', '2011-05-25 13:55:10'),
('English', '78463a384a5aa4fad5fa73e2f506ecfc', '127.0.0.1', '2011-05-25 13:55:32'),
('Chromium', '65d5644b4049b4215a6faa532e7e5ad5', '127.0.0.1', '2011-05-25 14:00:17'),
('ABCDEF', '8827a41122a5028b9808c7bf84b9fcf6', '127.0.0.1', '2011-05-25 14:03:05'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 14:06:42'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 14:08:03'),
('Kingfree', 'd41d8cd98f00b204e9800998ecf8427e', '127.0.0.1', '2011-05-25 14:08:14'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 14:15:53'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 15:43:35'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-25 20:50:32'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-26 10:21:18'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '192.168.201.127', '2011-05-26 11:31:51'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-26 11:49:55'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-26 13:24:56'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-26 16:24:58'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-26 19:06:39'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-27 16:52:57'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-27 18:50:43'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-05-27 20:16:22'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-06-22 21:14:21'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-06-28 21:56:36'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-06-29 15:03:44'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-06-30 17:46:21'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-06-30 20:18:55'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-03 09:36:11'),
('Chinese', '3b261136e3c33f35e0a58611b1f344cb', '127.0.0.1', '2011-07-03 13:10:50'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-04 20:03:04'),
('Chinese', '3b261136e3c33f35e0a58611b1f344cb', '127.0.0.1', '2011-07-04 21:28:42'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-05 09:43:09'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-06 19:47:17'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-11 10:35:42'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-11 13:46:41'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-11 16:49:14'),
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-07-11 19:30:19');

-- --------------------------------------------------------

--
-- 表的结构 `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(20) NOT NULL DEFAULT '',
  `from_user` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(200) NOT NULL DEFAULT '',
  `content` text,
  `new_mail` tinyint(1) NOT NULL DEFAULT '1',
  `reply` tinyint(4) DEFAULT '0',
  `in_date` datetime DEFAULT NULL,
  `defunct` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`mail_id`),
  KEY `uid` (`to_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;

--
-- 转存表中的数据 `mail`
--


-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(200) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `importance` tinyint(4) NOT NULL DEFAULT '0',
  `defunct` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1005 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`news_id`, `user_id`, `title`, `content`, `time`, `importance`, `defunct`) VALUES
(1, 'Kingfree', '公告', '<p>王者自由评测系统</p>\r\n<p>正在开发&hellip;&hellip;</p>\r\n<p>评测功能已经可用，正在添加题目中……</p>', '2011-05-22 14:18:00', 0, 'N');

-- --------------------------------------------------------

--
-- 表的结构 `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `ua` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `refer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastmove` int(10) NOT NULL,
  `firsttime` int(10) DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `online`
--


-- --------------------------------------------------------

--
-- 表的结构 `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `user_id` char(20) NOT NULL DEFAULT '',
  `rightstr` char(30) NOT NULL DEFAULT '',
  `defunct` char(1) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `privilege`
--

INSERT INTO `privilege` (`user_id`, `rightstr`, `defunct`) VALUES
('Kingfree', 'administrator', 'N');

-- --------------------------------------------------------

--
-- 表的结构 `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `problem_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` text,
  `input` text,
  `output` text,
  `sample_input` text,
  `sample_output` text,
  `input_template` varchar(100) NOT NULL DEFAULT '0',
  `output_template` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_template` varchar(100) NOT NULL DEFAULT 'file#.ans',
  `hint` text,
  `source` varchar(100) DEFAULT NULL,
  `in_date` datetime DEFAULT NULL,
  `time_limit` int(11) NOT NULL DEFAULT '0',
  `memory_limit` int(11) NOT NULL DEFAULT '0',
  `program_filename` varchar(100) CHARACTER SET ascii DEFAULT 'filename',
  `program_type` int(4) NOT NULL DEFAULT '0',
  `start_num` int(4) NOT NULL DEFAULT '0',
  `end_num` int(4) NOT NULL DEFAULT '9',
  `English` varchar(100) NOT NULL DEFAULT 'English',
  `compare_type` int(4) NOT NULL DEFAULT '0',
  `defunct` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`problem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1073 ;

--
-- 转存表中的数据 `problem`
--

INSERT INTO `problem` (`problem_id`, `title`, `description`, `input`, `output`, `sample_input`, `sample_output`, `input_template`, `output_template`, `answer_template`, `hint`, `source`, `in_date`, `time_limit`, `memory_limit`, `program_filename`, `program_type`, `start_num`, `end_num`, `English`, `compare_type`, `defunct`) VALUES
(0, '你好，世界', '<p>输出“hello, world”</p>\r\n<p></p>', '<p>无</p>\r\n<p></p>', '<p>一行，只有“hello, world”，注意空格。</p>\r\n<p></p>', '', 'hello, world', 'hello#.in', 'hello.out', 'hello#.ans', '', '', '2011-07-11 14:12:51', 1000, 32, 'hello', 0, 0, 0, 'Hello, World', 0, 'N'),
(1, 'A+B 问题', '<p>计算两个整数a,b的和。</p>', '<p>两个整数 a,b (0&lt;=a+b&lt;=32767)。</p>', '<p>输出 &nbsp;a+b 。</p>', '1 2', '3', 'aplusb#.in', 'aplusb.out', 'aplusb#.ans', '<p>很简单。</p>\r\n<h2>这里写评测系统使用方法（未完成）！</h2>', 'POJ', '2011-07-03 10:17:45', 1000, 10, 'aplusb', 0, 0, 9, 'A Plus B', 0, 'N'),
(2, '向量', '<p>给你一对数a,b，你可以任意使用(a,b), (a,-b), (-a,b), (-a,-b), (b,a), (b,-a), (-b,a), (-b,-a)这些向量，问你能不能拼出另一个向量(x,y)。</p>\r\n<p>说明：这里的拼就是使得你选出的向量之和为(x,y)</p>', '<p>第一行数组组数t，(t&lt;=50000)</p>\r\n<p>接下来t行每行四个整数a,b,x,y (-2*109&lt;=a,b,x,y&lt;=2*109)</p>', 't行\r\n每行为Y或者为N，分别表示可以拼出来，不能拼出来', '3\r\n2 1 3 3\r\n1 1 0 1\r\n1 0 -2 3\r\n', 'Y\r\nN\r\nY\r\n', 'vector#.in', 'vector.out', 'vector#.ans', '<p>样例解释：</p>\r\n<p>第一组：(2,1)+(1,2)=(3,3)</p>\r\n<p>第三组：(-1,0)+(-1,0)+(0,1)+(0,1)+(0,1)=(-2,3)</p>', 'HAOI', '2011-07-05 09:51:28', 1000, 256, 'vector', 0, 1, 10, 'Vector', 0, 'N'),
(3, '描边', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8"> <title></title> <meta name="GENERATOR" content="LibreOffice 3.3 (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n</p>\r\n<p style="text-indent:0.85cm;margin-bottom:0cm;"><span style="font-size:small;">小</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>Z</i></span></span><span style="font-size:small;">自幼就酷爱数学。聪明的他特别喜欢研究一些数学小问题。</span></p>\r\n<p style="text-indent:0.85cm;margin-bottom:0cm;"><span style="font-size:small;">有一天，小</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>Z</i></span></span><span style="font-size:small;">在一张纸上选择了</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>n</i></span></span><span style="font-size:small;">个点，并用铅笔将它们两两连接起来，构成</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>n</i></span><span style="font-size:small;">(</span><span style="font-size:small;"><i>n</i></span><span style="font-size:small;">-1)/2</span></span><span style="font-size:small;">条线段。由于铅笔很细，可以认为这些线段的宽度为</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">0</span></span><span style="font-size:small;">。</span></p>\r\n<p style="text-indent:0.85cm;margin-bottom:0cm;"><span style="font-size:small;">望着这些线段，小</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>Z</i></span></span><span style="font-size:small;">陷入了冥想中。他认为这些线段中的一部分比较重要，需要进行强调。因此小</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>Z</i></span></span><span style="font-size:small;">拿出了毛笔，将它们重新进行了描边。毛笔画在纸上，会形成一个</span><u><span style="font-size:small;"><b>半径为</b></span></u><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i><u><b>r</b></u></i></span></span><u><span style="font-size:small;"><b>的圆</b></span></u><span style="font-size:small;">。</span><u><span style="font-size:small;"><b>在对一条线段进行描边时，毛笔的中心</b></span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><b>(</b></span></span></u><u><span style="font-size:small;"><b>即圆心</b></span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><b>)</b></span></span></u><u><span style="font-size:small;"><b>将从线段的一个端点开始，沿着该线段描向另一个端点</b></span></u><span style="font-size:small;">。下图即为在一张</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">4</span></span><span style="font-size:small;">个点的图中，对其中一条线段进行描边强调后的情况。</span></p>\r\n<p style="text-indent:0.85cm;margin-bottom:0cm;"><img alt="OK" width="0" height="0" src="/JudgeOnline/upload/201104/image/1.png" /><span style="font-size:small;">现在，小</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>Z</i></span></span><span style="font-size:small;">非常想知道在描边之后纸面上共有多大</span><u><span style="font-size:small;"><b>面积</b></span></u><span style="font-size:small;">的区域被强调，你能帮助他解答这个问题么？</span></p>\r\n<p></p>\r\n<p></p>', '<p></p>', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8"> <title></title> <meta name="GENERATOR" content="LibreOffice 3.3 (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n</p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">输出文件</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">path*.out</span></span><span style="font-size:small;">仅包含一行，即为描边后被强调区域的总面积</span>。</p>\r\n<p></p>\r\n<p></p>', '2\r\n1 1\r\n1 2\r\n1\r\n1 2\r\n1\r\n0.00001 0.001 0.1 1', '5.1415927', 'path#.in', 'path#.out', 'path#.ans', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8"> <title></title> <meta name="GENERATOR" content="LibreOffice 3.3 (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		H2 { margin-top: 0.46cm; margin-bottom: 0.46cm; line-height: 173%; page-break-inside: avoid }\r\n		H2.western { font-family: "Arial", sans-serif; font-size: 16pt }\r\n		H2.cjk { font-family: "黑体", "SimHei"; font-size: 16pt; font-style: normal }\r\n		H2.ctl { font-family: "Arial", sans-serif; font-size: 16pt }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n</p>\r\n<h2 class="cjk" style="margin-bottom:0cm;font-weight:normal;"><span style="font-size:small;">【样例说明】</span></h2>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">如下图所示。</span></p>\r\n<p align="CENTER" style="text-indent:0.74cm;margin-bottom:0cm;"></p>\r\n<h2 class="cjk" style="margin-bottom:0cm;font-weight:normal;"><span style="font-size:small;">【评分标准】</span></h2>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">每个测试点单独评分。</span></p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">本题设有</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">4</span></span><span style="font-size:small;">个评分参数</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">1,</span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">2,</span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">3,</span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">4 (</span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">1&lt; </span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">2 &lt; </span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">3 &lt; </span><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">4)</span></span><span style="font-size:small;">，已在输入文件中给出。你的得分将按照如下规则给出：</span></p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;">&nbsp;<span style="font-size:small;">若你的答案与标准答案相差不超过</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">1</span></span><span style="font-size:small;">，则该测试点你将得到满分；</span></p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">否则，若你的答案与标准答案相差不超过</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">2</span></span><span style="font-size:small;">，则你将得到该测试点</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">70%</span></span><span style="font-size:small;">的分数；</span></p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">否则，若你的答案与标准答案相差不超过</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">3</span></span><span style="font-size:small;">，则你将得到该测试点</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">40%</span></span><span style="font-size:small;">的分数；</span></p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">否则，若你的答案与标准答案相差不超过</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;"><i>p</i></span><span style="font-size:small;">4</span></span><span style="font-size:small;">，则你将得到该测试点</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">10%</span></span><span style="font-size:small;">的分数；</span></p>\r\n<p style="text-indent:0.77cm;margin-bottom:0cm;"><span style="font-size:small;">否则该测试点你的得分为</span><span style="font-family:''DejaVu Serif Condensed, serif'';"><span style="font-size:small;">0</span></span><span style="font-size:small;">。</span></p>\r\n<p></p>\r\n<p></p>', 'NOI', '2011-07-05 09:57:21', -1, -1, 'path', 1, 0, 0, 'Path', 2, 'N'),
(10, '跳马问题', '有一只中国象棋中的马，在半张棋盘的左上角出发，向右下角跳去。规定只许向右跳（可上，可下，但不允许向左跳）。请编程求从起点 A(1,1) 到终点 B(m,n) 共有多少种不同跳法。', '输入文件只有一行，两个整数m和n，两个数之间有一个空格。', '输出文件只有一个数据，即从 A 到 B 全部的走法', '5 9\r\n', '37\r\n', 'horse#.in', 'horse.out', 'horse#.ans', '搜索', '', '2011-06-28 21:58:28', 1, 128, 'file', 0, 1, 10, 'Horse Problem', 0, 'N'),
(11, 'N皇后问题', '八皇后问题是一个以国际象棋为背景的问题：如何能够在 8×8 的国际象棋棋盘上放置八个皇后，使得任何一个皇后都无法直接吃掉其他的皇后？为了达到此目的，任两个皇后都不能处于同一条横行、纵行或斜线上。八皇后问题可以推广为更一般的n皇后摆放问题：这时棋盘的大小变为n×n，而皇后个数也变成n。当且仅当 n = 1 或 n ≥ 4 时问题有解。', '一个数n，表示棋盘大小为n*n，有n个皇后。', '只有一个数字，为解的个数。当没有解时输出0。', '8\r\n', '92\r\n', 'queen#.in', 'queen.out', 'queen#.ans', '现在还没有已知公式可以对 n 计算 n 皇后问题的解的个数。', '经典', '2011-07-11 16:50:52', 2000, 128, 'queen', 0, 1, 10, 'N Queens Problem', 0, 'N'),
(12, '一元多项式相加', '<p>一元多项式相加的运算规则很简单：两个多项式中所有指数相同的项，对应系数相加，若和不为零，则构成"和多项式"中的一项；所有指数不同的项均复抄到"和多项式"中。</p>', '<p>输入由两行组成：</p>\r\n<p>第一行有一个字符串p（1≤length(p)≤200）表示多项式1</p>\r\n<p>第二行有一个字符串q（1≤length(q)≤200）表示多项式2</p>', '<p>输出有一行，为字符串s（1≤length(q)≤500)，表示和多项式</p>', '2x+3x^2+x^7-5x^90\r\n4x+x^3\r\n', '6x+3x^2+x^3+x^7-5x^90\r\n', 'oneploy#.in', 'oneploy.out', 'oneploy#.ans', '<p>注：表达式中系数与x间的乘号均省略，^表示幂。</p>', '经典', '2011-06-30 17:49:41', 1, 128, 'oneploy', 0, 1, 10, '一元多项式相加', 0, 'N');

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` varchar(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`rid`, `author_id`, `time`, `content`, `topic_id`, `status`, `ip`) VALUES
(1, 'Kingfree', '2011-04-22 19:25:02', '好题！', 1, 0, '127.0.0.1'),
(2, 'Kingfree', '2011-07-11 10:49:50', '啊，打错字了', 2, 0, '127.0.0.1'),
(3, 'Kingfree', '2011-07-11 10:50:40', '啊，打错字了', 3, 0, '127.0.0.1'),
(4, 'Kingfree', '2011-07-11 10:56:27', '草！', 3, 0, '127.0.0.1'),
(5, 'Kingfree', '2011-07-11 10:56:39', '效果不错', 3, 0, '127.0.0.1'),
(6, 'Kingfree', '2011-07-11 10:56:53', '啊', 3, 0, '127.0.0.1'),
(7, 'Kingfree', '2011-07-11 10:57:14', '我要用高级文本框！', 3, 0, '127.0.0.1'),
(8, 'Kingfree', '2011-07-11 11:02:30', '<p>啊啊</p>\r\n<p>&nbsp;</p>\r\n<h1>你好</h1>\r\n<p>&nbsp;</p>\r\n<p><span style="color:#e56600;">知道吗</span></p>', 4, 0, '127.0.0.1'),
(9, 'Kingfree', '2011-07-11 11:06:56', '<span style="font-size:24px;font-family:KaiTi_GB2312;">试试看</span>', 4, 0, '127.0.0.1'),
(10, 'Kingfree', '2011-07-11 11:08:33', '好了，可以用了', 3, 0, '127.0.0.1'),
(11, 'Kingfree', '2011-07-11 11:09:13', '<span style="font-size:32px;font-family:KaiTi_GB2312;">嗯，<span style="color:#e53333;">完全</span><span style="color:#4c33e5;">昂</span>了</span>', 3, 0, '127.0.0.1'),
(12, 'Kingfree', '2011-07-11 11:24:33', '<div style="text-align:center;"><span style="font-size:32px;font-family:FangSong_GB2312;">啊啊啊啊啊</span></div>', 2, 0, '127.0.0.1'),
(13, 'Kingfree', '2011-07-11 13:48:22', '<meta http-equiv="content-type" content="text/html; charset=utf-8"><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;"><h2>关于NOI系列赛编程语言使用限制的规定</h2>\r\n本规定适用于NOI系列的各项全国性竞赛。NOI其它规章、规则中所有与本规定不符之处，均以本规定为准。不遵守本规定所造成的不良后果由选手本人承担。评测环境与竞赛环境相同。<h3>编程通则</h3>\r\n<ol><li>对于每一道试题，选手只应提交一个源程序文件。源程序文件名由试题名称缩写加后缀构成，源程序文件名及后缀一律使用小写。PASCAL、C及C++程序的后缀分别为.pas，.c，或.cpp。当参赛选手对一道试题提交多份使用不同后缀的源程序文件时，测试系统按照.c, .cpp, .pas的顺序选取第一份存在的文件进行编译和评测，并忽略其他文件。</li>\r\n<li>使用C/C++语言者不得使用自己的头文件，使用Pascal语言者不得使用自己的库单元。除另有规定外，每道题参赛程序源文件不得大于100KB，如选手在规定目录下另建其它子目录，这些子目录中的文件均会被评测系统忽略。</li>\r\n<li>选手程序应正常结束并返回Linux系统，主函数的返回值必须为0。</li>\r\n<li>选手程序中只允许通过对指定文件的读写、以及对指定库函数的调用等题目中明确规定的方式与外部环境通信。在程序中严禁下列操作：<ul type="square">试图访问网络 使用fork、exec、system或其它线程/进程生成函数 打开或创建题目规定的输入/输出文件之外的其它文件和目录 运行其它程序 改变文件系统的访问权限 读写文件系统的管理信息 使用除读写规定的输入/输出文件之外的其它系统调用 捕获和处理鼠标和键盘的输入消息 读写计算机的输入/输出端口</ul>\r\n</li>\r\n<li>除题目另有规定外，选手程序中所使用的静态和动态内存空间总和不得超过128MB。</li>\r\n</ol>\r\n<h3>对C程序的限制</h3>\r\n程序禁止使用内嵌汇编和以下划线开头的库函数或宏（自己定义的除外）。 在程序中只能使用下述头文件以及被它们所间接包含：assert.h, ctype.h, errno.h，float.h，limits.h，math.h，stdio.h，stdlib.h，string.h，time.h。 64位整数只能使用long long类型及unsigned long long类型。<h3>对C++程序的限制</h3>\r\n</span><p><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">程序禁止使用内嵌汇编和以下划线开头的库函数或宏（自己定义的除外）。 64位整数只能使用long long类型及unsigned long long类型。</span></p>\r\n<p><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">&nbsp;可以使用STL中的模板。</span></p>\r\n<span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;"><h3>对Pascal程序的限制</h3>\r\n</span><p><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">程序禁止使用内嵌汇编，并禁止使用任何编译开关。</span></p>\r\n<p><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">在程序中禁止使用除system库（自动加载）和math库（须用uses math子句）之外的其他单元。&nbsp;</span></p>\r\n<p><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">凡满足上述规定，并且能在题目规定的命令行下编译通过的程序均为合法的源程序。但即使源程序合法，只要程序执行时有违规行为时，仍被判定为违规。</span></p>\r\n<p><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">本规定自公布之日起生效。&nbsp;</span></p>\r\n<p style="text-align:right;"><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">中国计算机学会</span></p>\r\n<p style="text-align:right;"><span class="Apple-style-span" style="font-family:Ubuntu, ''Microsoft YaHei'', ''Adobe Heiti Std'', SimHei, ''WenQuanYi Micro Hei'';line-height:normal;font-size:medium;">2011年4月14日</span></p>', 5, 0, '127.0.0.1'),
(14, 'Kingfree', '2011-07-11 13:51:40', '<h2>关于NOI系列赛编程语言使用限制的规定</h2>\r\n本规定适用于NOI系列的各项全国性竞赛。NOI其它规章、规则中所有与本规定不符之处，均以本规定为准。不遵守本规定所造成的不良后果由选手本人承担。评测环境与竞赛环境相同。<h3>编程通则</h3>\r\n<ol><li>对于每一道试题，选手只应提交一个源程序文件。源程序文件名由试题名称缩写加后缀构成，源程序文件名及后缀一律使用小写。PASCAL、C及C++程序的后缀分别为.pas，.c，或.cpp。当参赛选手对一道试题提交多份使用不同后缀的源程序文件时，测试系统按照.c, .cpp, .pas的顺序选取第一份存在的文件进行编译和评测，并忽略其他文件。</li>\r\n<li>使用C/C++语言者不得使用自己的头文件，使用Pascal语言者不得使用自己的库单元。除另有规定外，每道题参赛程序源文件不得大于100KB，如选手在规定目录下另建其它子目录，这些子目录中的文件均会被评测系统忽略。</li>\r\n<li>选手程序应正常结束并返回Linux系统，主函数的返回值必须为0。</li>\r\n<li>选手程序中只允许通过对指定文件的读写、以及对指定库函数的调用等题目中明确规定的方式与外部环境通信。在程序中严禁下列操作：<ul type="square">试图访问网络 使用fork、exec、system或其它线程/进程生成函数 打开或创建题目规定的输入/输出文件之外的其它文件和目录 运行其它程序 改变文件系统的访问权限 读写文件系统的管理信息 使用除读写规定的输入/输出文件之外的其它系统调用 捕获和处理鼠标和键盘的输入消息 读写计算机的输入/输出端口</ul>\r\n</li>\r\n<li>除题目另有规定外，选手程序中所使用的静态和动态内存空间总和不得超过128MB。</li>\r\n</ol>', 6, 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `jid` int(11) NOT NULL DEFAULT '0',
  `source` text COLLATE utf8_unicode_ci,
  `lang` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `source`
--

INSERT INTO `source` (`jid`, `source`, `lang`) VALUES
(0, '23535', 0),
(52, 'program aplusb;\nvar a,b:real;\nbegin\n  assign(input,''aplusb.in''); reset(input);\n  assign(output,''aplusb.out''); rewrite(output);\n  read(a, b);\n  writeln(a+b:0:0);\n  close(input); close(output);\nend.\n', 2),
(53, '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n', 1);

-- --------------------------------------------------------

--
-- 表的结构 `submit`
--

CREATE TABLE IF NOT EXISTS `submit` (
  `jid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `uid` varchar(100) NOT NULL,
  `judged` tinyint(1) NOT NULL DEFAULT '0',
  `langtype` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `detail` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `runtime` int(11) DEFAULT NULL,
  `memory` int(11) DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judge_time` timestamp NULL DEFAULT NULL,
  `source` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `submit`
--

INSERT INTO `submit` (`jid`, `pid`, `cid`, `uid`, `judged`, `langtype`, `result`, `detail`, `score`, `runtime`, `memory`, `ip`, `submit_time`, `judge_time`, `source`) VALUES
(4, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 12, 0, '0.0.0.0', '2011-07-03 12:16:17', '2011-06-30 21:11:15', 'eg sb\r\nsdg sd'),
(3, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '0.0.0.0', '2011-06-30 09:06:31', '2011-06-30 21:06:33', ''),
(2, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '0.0.0.0', '2011-06-30 09:03:56', '2011-06-30 21:03:58', ''),
(1, 1, 0, 'Kingfree', 0, 0, 6, 'C', 0, -1, -1, '0.0.0.1', '2011-07-03 09:47:14', '2011-06-30 20:55:10', ''),
(5, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:04:11', '2011-07-03 10:04:15', ''),
(6, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:07:20', '2011-07-03 10:07:22', ''),
(7, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:29:16', '2011-07-03 10:29:18', ''),
(8, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:30:35', '2011-07-03 10:30:38', ''),
(9, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:33:07', '2011-07-03 10:33:10', ''),
(10, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:33:41', '2011-07-03 10:33:44', ''),
(11, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:34:39', '2011-07-03 10:34:42', ''),
(12, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:35:28', '2011-07-03 10:35:30', ''),
(13, 1, 0, 'Kingfree', 0, 0, 1, 'WAAAAAAAAA', 90, 0, 0, '127.0.0.1', '2011-07-03 10:45:58', '2011-07-03 10:46:00', ''),
(14, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:49:08', '2011-07-03 10:49:11', ''),
(15, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:49:28', '2011-07-03 10:49:30', ''),
(16, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:50:33', '2011-07-03 10:50:36', ''),
(17, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 10:53:43', '2011-07-03 10:53:46', ''),
(18, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:00:06', '2011-07-03 11:00:09', ''),
(19, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:01:11', '2011-07-03 11:01:14', ''),
(20, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:01:58', '2011-07-03 11:02:01', ''),
(21, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:02:44', '2011-07-03 11:02:47', ''),
(22, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:03:38', '2011-07-03 11:03:41', ''),
(23, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:05:20', '2011-07-03 11:05:22', ''),
(24, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:06:19', '2011-07-03 11:06:22', ''),
(25, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:16:37', '2011-07-03 11:16:39', ''),
(26, 1, 0, 'Kingfree', 0, 0, 6, 'C', 0, -1, -1, '127.0.0.1', '2011-07-03 11:17:59', '2011-07-03 11:17:59', ''),
(27, 1, 0, 'Kingfree', 0, 0, 6, 'C', 0, -1, -1, '127.0.0.1', '2011-07-03 11:18:40', '2011-07-03 11:18:40', ''),
(28, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:21:46', '2011-07-03 11:21:48', ''),
(29, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:22:49', '2011-07-03 11:22:52', ''),
(30, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:25:10', '2011-07-03 11:25:13', ''),
(31, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:26:58', '2011-07-03 11:27:00', ''),
(32, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:27:37', '2011-07-03 11:27:39', ''),
(33, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:30:25', '2011-07-03 11:30:27', ''),
(34, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '127.0.0.1', '2011-07-03 11:30:40', '2011-07-03 11:30:42', ''),
(35, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 15, 3200, '127.0.0.1', '2011-07-03 11:31:19', '2011-07-03 11:31:21', ''),
(36, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 22, 3200, '127.0.0.1', '2011-07-03 11:35:20', '2011-07-03 11:35:23', ''),
(37, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 24, 320, '127.0.0.1', '2011-07-03 11:36:55', '2011-07-03 11:36:57', ''),
(38, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 18, 299, '127.0.0.1', '2011-07-03 11:37:42', '2011-07-03 11:37:43', ''),
(39, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 8, 299, '127.0.0.1', '2011-07-03 11:38:06', '2011-07-03 11:38:08', ''),
(40, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 11, 269, '127.0.0.1', '2011-07-03 11:38:11', '2011-07-03 11:38:12', ''),
(41, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 10, 299, '127.0.0.1', '2011-07-03 11:38:18', '2011-07-03 11:38:19', ''),
(42, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 10, 299, '127.0.0.1', '2011-07-03 11:38:22', '2011-07-03 11:38:23', ''),
(43, 1, 0, 'Kingfree', 0, 0, 5, 'OOOOOOOOOO', 0, 15, 313, '127.0.0.1', '2011-07-03 11:45:01', '2011-07-03 11:45:02', ''),
(44, 1, 0, 'Kingfree', 0, 0, 5, 'OOOOOOOOOO', 0, 6, 313, '127.0.0.1', '2011-07-03 11:47:59', '2011-07-03 11:48:00', ''),
(45, 1, 0, 'Kingfree', 0, 0, 5, 'OOOOOOOOOO', 0, 6, 300, '127.0.0.1', '2011-07-03 11:49:16', '2011-07-03 11:49:17', ''),
(46, 1, 0, 'Kingfree', 0, 0, 1, 'WWWWWWWWWW', 0, 13, 167, '127.0.0.1', '2011-07-03 11:49:45', '2011-07-03 11:49:46', ''),
(47, 1, 0, 'Kingfree', 0, 0, 4, 'EEEEEEEEEE', 0, 5, 134, '127.0.0.1', '2011-07-03 11:50:15', '2011-07-03 11:50:16', ''),
(48, 1, 0, 'Kingfree', 0, 0, 4, 'EEEEEEEEEE', 0, 8, 167, '127.0.0.1', '2011-07-03 11:51:20', '2011-07-03 11:51:21', ''),
(49, 1, 0, 'Kingfree', 0, 0, 4, 'EEEEEEEEEE', 0, 21, 150, '127.0.0.1', '2011-07-03 11:52:58', '2011-07-03 11:52:59', ''),
(50, 1, 0, 'Kingfree', 0, 0, 4, 'EEEEEEEEEE', 0, 7, 167, '127.0.0.1', '2011-07-03 11:54:04', '2011-07-03 11:54:05', ''),
(51, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 10, 167, '127.0.0.1', '2011-07-03 11:55:38', '2011-07-03 11:55:39', ''),
(52, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 19, 167, '127.0.0.1', '2011-07-03 12:04:52', '2011-07-03 12:04:53', ''),
(53, 0, NULL, '', 0, 1, 0, '', 0, NULL, NULL, '', '2011-07-03 12:14:17', NULL, '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(54, 0, NULL, '', 0, 1, 0, '', 0, NULL, NULL, '', '2011-07-03 12:18:18', NULL, '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(55, 0, NULL, '', 0, 1, 0, '', 0, NULL, NULL, '', '2011-07-03 12:19:34', NULL, '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(56, 0, NULL, '', 0, 1, 0, '', 0, NULL, NULL, '', '2011-07-03 12:19:53', NULL, '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(57, 0, NULL, '', 0, 1, 0, '', 0, NULL, NULL, '', '2011-07-03 12:20:18', NULL, '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(58, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 23, 320, '127.0.0.1', '2011-07-03 12:20:45', '2011-07-03 12:20:45', '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(59, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 21, 320, '127.0.0.1', '2011-07-03 12:21:01', '2011-07-03 12:21:01', '#include <iostream>\n#include <fstream>\nusing namespace std;\nint main()\n{\n  ifstream fin("aplusb.in");\n  ofstream fout("aplusb.out");\n  float a, b;\n  fin >> a >> b;\n  fout << (a+b) << endl;\n  fin.close();\n  fout.close();\n  return 0;\n}\n\n'),
(60, 1, 0, 'Chinese', 0, 0, 5, 'OOOOOOOOOO', 0, 11, 296, '127.0.0.1', '2011-07-03 13:10:58', '2011-07-03 13:10:58', '#include <stdio.h>\nint main() {\n    int a, b;\n    scanf("%d%d", &a, &b);\n    printf("%d\\n", a+b);\n    return 0;\n}\n\n'),
(61, 1, 0, 'Chinese', 0, 0, 1, 'WWWWWWWWWW', 0, 0, -1, '127.0.0.1', '2011-07-03 13:11:14', '2011-07-03 13:11:14', '#include <stdio.h>\nint main() {\n    int a, b;\n    scanf("%d%d", &a, &b);\n    printf("%d\\n", a+b);\n    return 0;\n}\n\n'),
(62, 1, 0, 'Chinese', 0, 0, 1, 'WWWWWWWWWW', 0, 0, -1, '127.0.0.1', '2011-07-03 13:12:24', '2011-07-03 13:12:24', '#include <stdio.h>\nint main() {\n    int a, b;\n    scanf("%d%d", &a, &b);\n    printf("%d\\n", a+b);\n    return 0;\n}\n\n'),
(63, 1, 0, 'Chinese', 0, 0, 4, 'EEEEEEEEEE', 0, 0, -1, '127.0.0.1', '2011-07-03 13:14:19', '2011-07-03 13:14:19', '#include <stdio.h>\nint main() {\n    int a, b, c;\n    scanf("%d%d", &a, &b);\n    c = a + b;\n    printf("%d\\n", c);\n    return 0;\n}\n\n'),
(64, 1, 0, 'Chinese', 0, 1, 6, 'C', 0, -1, -1, '127.0.0.1', '2011-07-03 13:15:59', '2011-07-03 13:15:59', '#include <iostream>\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(65, 1, 0, 'Chinese', 0, 1, 6, 'C', 0, -1, -1, '127.0.0.1', '2011-07-03 13:16:39', '2011-07-03 13:16:39', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(66, 1, 0, 'Chinese', 0, 1, 6, 'C', 0, -1, -1, '127.0.0.1', '2011-07-03 13:43:31', '2011-07-03 13:43:31', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(67, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 97, -1, '127.0.0.1', '2011-07-04 20:06:42', '2011-07-04 20:06:42', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(68, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 60, -1, '127.0.0.1', '2011-07-04 20:15:09', '2011-07-04 20:15:09', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(69, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 136, -1, '127.0.0.1', '2011-07-04 20:15:48', '2011-07-04 20:15:48', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(70, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 130, -1, '127.0.0.1', '2011-07-04 20:16:12', '2011-07-04 20:16:12', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(71, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 122, -1, '127.0.0.1', '2011-07-04 20:16:27', '2011-07-04 20:16:27', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(72, 1, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 115, -1, '127.0.0.1', '2011-07-04 20:17:27', '2011-07-04 20:17:27', '#include <iostream>\nusing namespace std;\nint main() {\n    int a, b;\n    cin >> a >> b;\n    cout << a + b << endl;\n    return 0;\n}\n\n'),
(73, 1, 0, 'Kingfree', 0, 2, 0, 'AAAAAAAAAA', 100, 14, 167, '127.0.0.1', '2011-07-04 20:28:49', '2011-07-04 20:28:49', 'program aplusb;\nvar a,b:real;\nbegin\n  assign(input,''aplusb.in''); reset(input);\n  assign(output,''aplusb.out''); rewrite(output);\n  read(a, b);\n  writeln(a+b:0:0);\n  close(input); close(output);\nend.\n'),
(74, 2, 0, 'Kingfree', 0, 1, 2, 'AAAAAWWWWW', 50, 15, 299, '127.0.0.1', '2011-07-05 09:44:41', '2011-07-05 09:44:41', '#include <cstdio>\n#define abs(a) ((a)<0?-(a):(a))\nint gcd(int a, int b) {\n	int c = a%b;\n	for(; c; ) {\n		a = b;\n		b = c;\n		c = a%b;\n	}\n	return b;\n}\nbool work() {\n	int a, b, x1, y1;\n	int x, y;\n	scanf("%d%d%d%d", &a, &b, &x, &y);\n	x = abs(x);\n	y = abs(y);\n	if(a==0 || b==0)\n		return !(x%(a+b)||y%(a+b));\n	if(a==b)\n		return y%a==0 && x%a==0 && (((x/a)%2)^((y/a)%2))==0;\n	for(; !(a%2) && !(b%2); a/=2, b/=2, x/=2, y/=2)\n		if((x%2) || (y%2))\n			return false;\n	if((a%2) && (b%2) && ((x%2)^(y%2)))\n		return false;\n	if((a%2) && (b%2)) {\n		x1 = a;\n		y1 = b;\n		a = (x1+y1)/2;\n		b = abs(x1-y1)/2;\n		x1 = x;\n		y1 = y;\n		x = (x1+y1)/2;\n		y = abs(x1-y1)/2;\n	}\n	int c = gcd(a, b);\n	return x%c==0 && y%c==0;\n}\nint main() {\n	int n;\n	freopen("vector.in","r",stdin);\n	freopen("vector.out","w",stdout);\n	scanf("%d", &n);\n	for(; n; n--)\n		printf("%c\\n", work()?''Y'':''N'');\n	return 0;\n}\n'),
(75, 2, 0, 'Kingfree', 0, 1, 2, 'AAAAWWWWWW', 40, 10, 299, '127.0.0.1', '2011-07-05 09:45:52', '2011-07-05 09:45:52', '#include <cstdio>\n#define abs(a) ((a)<0?-(a):(a))\nint gcd(int a, int b) {\n	int c = a%b;\n	for(; c; ) {\n		a = b;\n		b = c;\n		c = a%b;\n	}\n	return b;\n}\nbool work() {\n	int a, b, x1, y1;\n	int x, y;\n	scanf("%d%d%d%d", &a, &b, &x, &y);\n	x = abs(x);\n	y = abs(y);\n	if(a==0 || b==0)\n		return !(x%(a+b)||y%(a+b));\n	if(a==b)\n		return y%a==0 && x%a==0 && (((x/a)%2)^((y/a)%2))==0;\n	for(; !(a%2) && !(b%2); a/=2, b/=2, x/=2, y/=2)\n		if((x%2) || (y%2))\n			return false;\n	if((a%2) && (b%2) && ((x%2)^(y%2)))\n		return false;\n	if((a%2) && (b%2)) {\n		x1 = a;\n		y1 = b;\n		a = (x1+y1)/2;\n		b = abs(x1-y1)/2;\n		x1 = x;\n		y1 = y;\n		x = (x1+y1)/2;\n		y = abs(x1-y1)/2;\n	}\n	int c = gcd(a, b);\n	return x%c==0 && y%c==0;\n}\nint main() {\n	int n;\n	freopen("vector.in","r",stdin);\n	freopen("vector.out","w",stdout);\n	scanf("%d", &n);\n	for(; n; n--)\n		printf("%c\\n", work()?''Y'':''N'');\n	return 0;\n}\n'),
(76, 2, 0, 'Kingfree', 0, 1, 2, 'AAAAAWWWWW', 50, 10, 299, '127.0.0.1', '2011-07-05 09:47:21', '2011-07-05 09:47:21', '#include <cstdio>\n#define abs(a) ((a)<0?-(a):(a))\nint gcd(int a, int b) {\n	int c = a%b;\n	for(; c; ) {\n		a = b;\n		b = c;\n		c = a%b;\n	}\n	return b;\n}\nbool work() {\n	int a, b, x1, y1;\n	int x, y;\n	scanf("%d%d%d%d", &a, &b, &x, &y);\n	x = abs(x);\n	y = abs(y);\n	if(a==0 || b==0)\n		return !(x%(a+b)||y%(a+b));\n	if(a==b)\n		return y%a==0 && x%a==0 && (((x/a)%2)^((y/a)%2))==0;\n	for(; !(a%2) && !(b%2); a/=2, b/=2, x/=2, y/=2)\n		if((x%2) || (y%2))\n			return false;\n	if((a%2) && (b%2) && ((x%2)^(y%2)))\n		return false;\n	if((a%2) && (b%2)) {\n		x1 = a;\n		y1 = b;\n		a = (x1+y1)/2;\n		b = abs(x1-y1)/2;\n		x1 = x;\n		y1 = y;\n		x = (x1+y1)/2;\n		y = abs(x1-y1)/2;\n	}\n	int c = gcd(a, b);\n	return x%c==0 && y%c==0;\n}\nint main() {\n	int n;\n	freopen("vector.in","r",stdin);\n	freopen("vector.out","w",stdout);\n	scanf("%d", &n);\n	for(; n; n--)\n		printf("%c\\n", work()?''Y'':''N'');\n	return 0;\n}\n'),
(77, 2, 0, 'Kingfree', 0, 0, 2, 'AAAAAWWWWW', 50, 10, 298, '127.0.0.1', '2011-07-05 09:47:52', '2011-07-05 09:47:52', '#include <stdio.h>\r\n\r\n#define abs(a) ((a)<0?-(a):(a))\r\n\r\nlong gcd(long a,long b)\r\n{\r\n long c=a%b;\r\n for(;c;)\r\n   {\r\n    a=b;\r\n    b=c;\r\n    c=a%b;\r\n   }\r\n return b;\r\n}\r\n\r\nvoid work()\r\n{\r\n long a,b,x1,y1;\r\n long x,y;\r\n long i,j;\r\n \r\n scanf("%ld%ld%ld%ld",&a,&b,&x,&y);\r\n x=abs(x);\r\n y=abs(y);\r\n \r\n if(a==0||b==0)\r\n  {\r\n   printf("%s\\n",x%(a+b)||y%(a+b)?"N":"Y");\r\n   return;\r\n  }\r\n if(a==b)\r\n  {\r\n   printf("%s\\n",y%a==0&&x%a==0&&(((x/a)&1)^((y/a)&1))==0?"Y":"N");\r\n   return;\r\n  }\r\n \r\n for(;!(a&1)&&!(b&1);a>>=1,b>>=1,x>>=1,y>>=1)\r\n   if((x&1)||(y&1))\r\n    {\r\n     printf("N\\n");\r\n     return;\r\n    }\r\n if((a&1)&&(b&1)&&((x&1)^(y&1)))\r\n  {\r\n   printf("N\\n");\r\n   return;\r\n  }\r\n \r\n if(((a&1)&&(b&1)))\r\n  {\r\n   x1=a;\r\n   y1=b;\r\n   a=(x1+y1)/2;\r\n   b=abs(x1-y1)/2;\r\n   x1=x;\r\n   y1=y;\r\n   x=(x1+y1)/2;\r\n   y=abs(x1-y1)/2;\r\n  }\r\n printf("%s\\n",x%gcd(a,b)==0&&y%gcd(a,b)==0?"Y":"N");\r\n}\r\n\r\nint main()\r\n{\r\n long tot;\r\n \r\n freopen("vector.in","r",stdin);\r\n freopen("vector.out","w",stdout);\r\n scanf("%ld",&tot);\r\n for(;tot;tot--)\r\n   work();\r\n \r\n return 0;\r\n}\r\n'),
(78, 2, 0, 'Kingfree', 0, 0, 2, 'TTTTTTTTTT', 0, 10, 298, '127.0.0.1', '2011-07-05 09:50:43', '2011-07-05 09:50:43', '#include <stdio.h>\r\n\r\n#define abs(a) ((a)<0?-(a):(a))\r\n\r\nlong gcd(long a,long b)\r\n{\r\n long c=a%b;\r\n for(;c;)\r\n   {\r\n    a=b;\r\n    b=c;\r\n    c=a%b;\r\n   }\r\n return b;\r\n}\r\n\r\nvoid work()\r\n{\r\n long a,b,x1,y1;\r\n long x,y;\r\n long i,j;\r\n \r\n scanf("%ld%ld%ld%ld",&a,&b,&x,&y);\r\n x=abs(x);\r\n y=abs(y);\r\n \r\n if(a==0||b==0)\r\n  {\r\n   printf("%s\\n",x%(a+b)||y%(a+b)?"N":"Y");\r\n   return;\r\n  }\r\n if(a==b)\r\n  {\r\n   printf("%s\\n",y%a==0&&x%a==0&&(((x/a)&1)^((y/a)&1))==0?"Y":"N");\r\n   return;\r\n  }\r\n \r\n for(;!(a&1)&&!(b&1);a>>=1,b>>=1,x>>=1,y>>=1)\r\n   if((x&1)||(y&1))\r\n    {\r\n     printf("N\\n");\r\n     return;\r\n    }\r\n if((a&1)&&(b&1)&&((x&1)^(y&1)))\r\n  {\r\n   printf("N\\n");\r\n   return;\r\n  }\r\n \r\n if(((a&1)&&(b&1)))\r\n  {\r\n   x1=a;\r\n   y1=b;\r\n   a=(x1+y1)/2;\r\n   b=abs(x1-y1)/2;\r\n   x1=x;\r\n   y1=y;\r\n   x=(x1+y1)/2;\r\n   y=abs(x1-y1)/2;\r\n  }\r\n printf("%s\\n",x%gcd(a,b)==0&&y%gcd(a,b)==0?"Y":"N");\r\n}\r\n\r\nint main()\r\n{\r\n long tot;\r\n \r\n freopen("vector.in","r",stdin);\r\n freopen("vector.out","w",stdout);\r\n scanf("%ld",&tot);\r\n for(;tot;tot--)\r\n   work();\r\n \r\n return 0;\r\n}\r\n'),
(79, 2, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 327, 298, '127.0.0.1', '2011-07-05 09:51:35', '2011-07-05 09:51:35', '#include <stdio.h>\r\n\r\n#define abs(a) ((a)<0?-(a):(a))\r\n\r\nlong gcd(long a,long b)\r\n{\r\n long c=a%b;\r\n for(;c;)\r\n   {\r\n    a=b;\r\n    b=c;\r\n    c=a%b;\r\n   }\r\n return b;\r\n}\r\n\r\nvoid work()\r\n{\r\n long a,b,x1,y1;\r\n long x,y;\r\n long i,j;\r\n \r\n scanf("%ld%ld%ld%ld",&a,&b,&x,&y);\r\n x=abs(x);\r\n y=abs(y);\r\n \r\n if(a==0||b==0)\r\n  {\r\n   printf("%s\\n",x%(a+b)||y%(a+b)?"N":"Y");\r\n   return;\r\n  }\r\n if(a==b)\r\n  {\r\n   printf("%s\\n",y%a==0&&x%a==0&&(((x/a)&1)^((y/a)&1))==0?"Y":"N");\r\n   return;\r\n  }\r\n \r\n for(;!(a&1)&&!(b&1);a>>=1,b>>=1,x>>=1,y>>=1)\r\n   if((x&1)||(y&1))\r\n    {\r\n     printf("N\\n");\r\n     return;\r\n    }\r\n if((a&1)&&(b&1)&&((x&1)^(y&1)))\r\n  {\r\n   printf("N\\n");\r\n   return;\r\n  }\r\n \r\n if(((a&1)&&(b&1)))\r\n  {\r\n   x1=a;\r\n   y1=b;\r\n   a=(x1+y1)/2;\r\n   b=abs(x1-y1)/2;\r\n   x1=x;\r\n   y1=y;\r\n   x=(x1+y1)/2;\r\n   y=abs(x1-y1)/2;\r\n  }\r\n printf("%s\\n",x%gcd(a,b)==0&&y%gcd(a,b)==0?"Y":"N");\r\n}\r\n\r\nint main()\r\n{\r\n long tot;\r\n \r\n freopen("vector.in","r",stdin);\r\n freopen("vector.out","w",stdout);\r\n scanf("%ld",&tot);\r\n for(;tot;tot--)\r\n   work();\r\n \r\n return 0;\r\n}\r\n'),
(80, 2, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 440, 300, '127.0.0.1', '2011-07-05 09:52:21', '2011-07-05 09:52:21', '#include <cstdio>\n#define abs(a) ((a)<0?-(a):(a))\nint gcd(int a, int b) {\n	int c = a%b;\n	for(; c; ) {\n		a = b;\n		b = c;\n		c = a%b;\n	}\n	return b;\n}\nbool work() {\n	int a, b, x1, y1;\n	int x, y;\n	scanf("%d%d%d%d", &a, &b, &x, &y);\n	x = abs(x);\n	y = abs(y);\n	if(a==0 || b==0)\n		return !(x%(a+b)||y%(a+b));\n	if(a==b)\n		return y%a==0 && x%a==0 && (((x/a)%2)^((y/a)%2))==0;\n	for(; !(a%2) && !(b%2); a/=2, b/=2, x/=2, y/=2)\n		if((x%2) || (y%2))\n			return false;\n	if((a%2) && (b%2) && ((x%2)^(y%2)))\n		return false;\n	if((a%2) && (b%2)) {\n		x1 = a;\n		y1 = b;\n		a = (x1+y1)/2;\n		b = abs(x1-y1)/2;\n		x1 = x;\n		y1 = y;\n		x = (x1+y1)/2;\n		y = abs(x1-y1)/2;\n	}\n	int c = gcd(a, b);\n	return x%c==0 && y%c==0;\n}\nint main() {\n	int n;\n	freopen("vector.in","r",stdin);\n	freopen("vector.out","w",stdout);\n	scanf("%d", &n);\n	for(; n; n--)\n		printf("%c\\n", work()?''Y'':''N'');\n	return 0;\n}\n'),
(81, 0, 0, 'Kingfree', 0, 1, 5, 'O', 0, 1, -1, '127.0.0.1', '2011-07-11 14:02:25', '2011-07-11 14:02:25', '#include <cstdio>\nint main() {\n    printf("hello, world");\n    return 0;\n}\n\n'),
(82, 0, 0, 'Kingfree', 0, 1, 5, 'O', 0, 1, -1, '127.0.0.1', '2011-07-11 14:03:41', '2011-07-11 14:03:41', '#include <cstdio>\nint main() {\n    printf("hello, world");\n    return 0;\n}\n\n'),
(83, 0, 0, 'Kingfree', 0, 1, 5, 'O', 0, 1, -1, '127.0.0.1', '2011-07-11 14:04:03', '2011-07-11 14:04:03', '#include <cstdio>\nint main() {\n    printf("hello, world");\n    return 0;\n}\n\n'),
(84, 0, 0, 'Kingfree', 0, 1, 2, 'T', 0, 5, -1, '127.0.0.1', '2011-07-11 14:05:09', '2011-07-11 14:05:09', '#include <cstdio>\nint main() {\n    printf("hello, world");\n    return 0;\n}\n\n'),
(85, 0, 0, 'Kingfree', 0, 1, 2, 'T', 0, 1, -1, '127.0.0.1', '2011-07-11 14:07:25', '2011-07-11 14:07:25', '#include <cstdio>\nint main() {\n    printf("hello, world");\n    return 0;\n}\n\n'),
(86, 0, 0, 'Kingfree', 0, 1, 0, 'A', 10, 5, -1, '127.0.0.1', '2011-07-11 14:13:01', '2011-07-11 14:13:01', '#include <cstdio>\nint main() {\n    printf("hello, world");\n    return 0;\n}\n\n'),
(87, 11, 0, 'Kingfree', 0, 1, 2, 'TTTTTTTTTT', 0, 15, 269, '127.0.0.1', '2011-07-11 16:49:38', '2011-07-11 16:49:38', '#include <cstdio>\nint sum, lim = 1;\nvoid Test(int row, int l, int r) {\n    if(row != lim) {\n        int pos = lim & ~(row | l | r);\n        while(pos) {\n            int p = pos & -pos;\n            pos -= p;\n            Test(row+p, (l+p)<<1, (r+p)>>1);\n        }\n    } else\n        sum++;\n}\nint main() {\n	freopen("queen.in","r",stdin);\n	freopen("queen.out","w",stdout);\n	int n;\n    scanf("%d", &n);\n    lim = (lim<<n) - 1;\n    Test(0, 0, 0);\n    printf("%d\\n", sum);\n	return 0;\n}\n\n'),
(88, 11, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 8, 299, '127.0.0.1', '2011-07-11 16:50:58', '2011-07-11 16:50:58', '#include <cstdio>\nint sum, lim = 1;\nvoid Test(int row, int l, int r) {\n    if(row != lim) {\n        int pos = lim & ~(row | l | r);\n        while(pos) {\n            int p = pos & -pos;\n            pos -= p;\n            Test(row+p, (l+p)<<1, (r+p)>>1);\n        }\n    } else\n        sum++;\n}\nint main() {\n	freopen("queen.in","r",stdin);\n	freopen("queen.out","w",stdout);\n	int n;\n    scanf("%d", &n);\n    lim = (lim<<n) - 1;\n    Test(0, 0, 0);\n    printf("%d\\n", sum);\n	return 0;\n}\n\n'),
(89, 11, 0, 'Kingfree', 0, 1, 0, 'AAAAAAAAAA', 100, 16, 269, '127.0.0.1', '2011-07-11 16:52:01', '2011-07-11 16:52:01', '#include <cstdio>\nint sum, lim = 1;\nvoid Test(int row, int l, int r) {\n    if(row != lim) {\n        int pos = lim & ~(row | l | r);\n        while(pos) {\n            int p = pos & -pos;\n            pos -= p;\n            Test(row+p, (l+p)<<1, (r+p)>>1);\n        }\n    } else\n        sum++;\n}\nint main() {\n	freopen("queen.in","r",stdin);\n	freopen("queen.out","w",stdout);\n	int n;\n    scanf("%d", &n);\n    lim = (lim<<n) - 1;\n    Test(0, 0, 0);\n    printf("%d\\n", sum);\n	return 0;\n}\n\n');

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varbinary(60) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `top_level` int(2) NOT NULL DEFAULT '0',
  `cid` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `author_id` varchar(20) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `cid` (`cid`,`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`tid`, `title`, `status`, `top_level`, `cid`, `pid`, `author_id`) VALUES
(1, '好', 0, 0, NULL, 1000, 'Kingfree'),
(2, '测试仪下', 0, 0, NULL, 1, 'Kingfree'),
(3, '测试仪下', 0, 0, NULL, 1, 'Kingfree'),
(4, '测试高级文本框', 0, 0, NULL, 2, 'Kingfree'),
(5, '关于NOI系列赛编程语言使用限制的规定', 0, 0, NULL, 1, 'Kingfree'),
(6, '关于NOI系列赛编程语言使用限制的规定', 0, 0, NULL, 1, 'Kingfree');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `submit` int(11) DEFAULT '0',
  `solved` int(11) DEFAULT '0',
  `defunct` char(1) NOT NULL DEFAULT 'N',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `accesstime` datetime DEFAULT NULL,
  `volume` int(11) NOT NULL DEFAULT '1',
  `language` int(11) NOT NULL DEFAULT '1',
  `password` varchar(32) DEFAULT NULL,
  `reg_time` datetime DEFAULT NULL,
  `nick` varchar(100) NOT NULL DEFAULT '',
  `real_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(100) NOT NULL DEFAULT '',
  `user_group` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `user_id`, `email`, `submit`, `solved`, `defunct`, `ip`, `accesstime`, `volume`, `language`, `password`, `reg_time`, `nick`, `real_name`, `school`, `user_group`) VALUES
(1, 'Kingfree', 'anytjf@gmail.com', 77, 4, 'N', '127.0.0.1', '2011-04-19 21:32:32', 1, 1, '6455571dcc821cf127737e81ebd38776', '2011-04-19 21:32:32', '王者自由', '田劲锋', '河南省实验中学', '0,1'),
(4, 'fanzeyi', 'fanzeyi1994@gmail.com', 0, 0, 'N', '192.168.201.242', '2011-04-27 17:04:12', 1, 1, 'e4c80f58873ed6543da4f3001f592e7f', '2011-04-27 17:04:12', 'fanzeyi', '', '', '0'),
(3, 'lidong', '', 2, 2, 'N', '127.0.0.1', '2011-05-05 11:12:37', 1, 1, '62bc1de1ed50474dbdeb7cb18df666b3', '2011-05-05 11:12:37', 'donny', '', '', '0'),
(2, 'UserName', '19941008qian@163.com', 0, 0, 'N', '127.0.0.1', '2011-05-24 17:25:20', 1, 1, 'd41d8cd98f00b204e9800998ecf8427e', '2011-05-24 17:25:20', '用户', '', '河南省实验中学benxiao', ''),
(5, 'English', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 13:34:38', 1, 1, 'd41d8cd98f00b204e9800998ecf8427e', '2011-05-25 13:34:38', '英语', '英语', '', ''),
(6, 'Chinese', '', 7, 0, 'N', '127.0.0.1', '2011-05-25 13:36:28', 1, 1, '3b261136e3c33f35e0a58611b1f344cb', '2011-05-25 13:36:28', '中文', '', '', ''),
(7, 'Chromium', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 14:00:17', 1, 1, '65d5644b4049b4215a6faa532e7e5ad5', '2011-05-25 14:00:17', '谷歌浏览器', '', '', ''),
(8, 'ABCDEF', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 14:03:05', 1, 1, '8827a41122a5028b9808c7bf84b9fcf6', '2011-05-25 14:03:05', '哈啊', '真是', '', '');
