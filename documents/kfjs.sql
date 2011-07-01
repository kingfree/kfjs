-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 07 月 01 日 19:42
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
('Kingfree', '6455571dcc821cf127737e81ebd38776', '127.0.0.1', '2011-06-30 20:18:55');

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
(1004, 'Kingfree', '新闻', '<p>王者自由评测系统</p>\r\n<p>正在开发&hellip;&hellip;</p>\r\n<p>版本 0.1.0</p>\r\n<p></p>', '2011-05-22 14:18:00', 0, 'N');

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
  PRIMARY KEY (`hash`),
  UNIQUE KEY `hash` (`hash`)
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
  `accepted` int(11) DEFAULT '0',
  `submit` int(11) DEFAULT '0',
  `solved` int(11) DEFAULT '0',
  PRIMARY KEY (`problem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1073 ;

--
-- 转存表中的数据 `problem`
--

INSERT INTO `problem` (`problem_id`, `title`, `description`, `input`, `output`, `sample_input`, `sample_output`, `input_template`, `output_template`, `answer_template`, `hint`, `source`, `in_date`, `time_limit`, `memory_limit`, `program_filename`, `program_type`, `start_num`, `end_num`, `English`, `compare_type`, `defunct`, `accepted`, `submit`, `solved`) VALUES
(0, '你好，世界', '<p>输出&ldquo;hello, world&rdquo;</p>\r\n<p></p>', '<p>无</p>\r\n<p></p>', '<p>一行，只有&ldquo;hello, world&rdquo;，注意空格。</p>\r\n<p></p>', '', 'hello, world', '0', '', 'file#.ans', '', '', '2011-04-20 12:21:46', 1, 32, 'hello.pas/c/cpp', 0, 0, 0, 'stdout', 0, 'N', 3, 3, 0),
(1, 'A+B 问题', '<p>计算两个整数a,b的和。</p>', '<p>两个整数 a,b (0&lt;=a+b&lt;=32767)。</p>', '<p>输出 &nbsp;a+b 。</p>', '1 2', '3', 'aplusb#.in', 'aplusb.out', 'aplusb#.ans', '<p>很简单。</p>\r\n<h2>这里写评测系统使用方法（未完成）！</h2>', 'POJ', '2011-05-26 18:22:55', 1, 10, 'aplusb', 0, 0, 9, 'A Plus B', 0, 'N', 0, 0, 0),
(7, '采油区域', '<p>Siruseri政府决定将石油资源丰富的Navalur省的土地拍卖给私人承包商以建立油井。被拍卖的整块土地为一个矩形区域，被划分为M&times;N个小块。 Siruseri地质调查局有关于Navalur土地石油储量的估测数据。这些数据表示为M&times;N个正整数，即对每一小块土地石油储量的估计值。 为了避免出现垄断，政府规定每一个承包商只能承包一个由K&times;K块相连的土地构成的正方形区域。 AoE石油联合公司由三个承包商组成，他们想选择三块互不相交的K&times;K的区域使得总的收益最大。 例如，假设石油储量的估计值如下：</p>\n<p><img width="276" height="231" src="/hustoj/web/admin/../upload/pimg1070_1.png" alt="" /></p>\n<p><br />\n如果K = 2, AoE公司可以承包的区域的石油储量总和为100, 如果K = 3, AoE公司可以承包的区域的石油储量总和为208。 AoE公司雇佣你来写一个程序，帮助计算出他们可以承包的区域的石油储量之和的最大值。</p>\n<p></p>\n<p>数据保证K&le;M且K&le;N并且至少有三个K&times;K的互不相交的正方形区域。其中30%的输入数据，M, N&le; 12。所有的输入数据, M, N&le; 1500。每一小块土地的石油储量的估计值是非负整数且&le; 500。</p>', '<p>输入第一行包含三个整数M, N, K，其中M和N是矩形区域的行数和列数，K是每一个承包商承包的正方形的大小（边长的块数）。接下来M行，每行有N个正整数表示这一行每一小块土地的石油储量的估计值。</p>', '<p>输出只包含一个正整数，表示AoE公司可以承包的区域的石油储量之和的最大值。</p>', '9 9 3 \n1 1 1 1 1 1 1 1 1 \n1 1 1 1 1 1 1 1 1 \n1 8 8 8 8 8 1 1 1 \n1 8 8 8 8 8 1 1 1 \n1 8 8 8 8 8 1 1 1 \n1 1 1 1 8 8 8 1 1 \n1 1 1 1 1 1 8 8 8 \n1 1 1 1 1 1 9 9 9 \n1 1 1 1 1 1 9 9 9', '208', '0', '', 'file#.ans', '', 'APIO2009', '2011-05-27 17:02:17', 1, 128, 'filename', 0, 0, 9, 'English', 0, 'N', 0, 0, 0),
(8, '会议中心', '<p>Siruseri政府建造了一座新的会议中心。许多公司对租借会议中心的会堂很感兴趣，他们希望能够在里面举行会议。 对于一个客户而言，仅当在开会时能够独自占用整个会堂，他才会租借会堂。会议中心的销售主管认为：最好的策略应该是将会堂租借给尽可能多的客户。显然，有可能存在不止一种满足要求的策略。 例如下面的例子。总共有4个公司。他们对租借会堂发出了请求，并提出了他们所需占用会堂的起止日期（如下表所示）。</p>\n<p><img width="348" height="145" src="/hustoj/web/admin/../upload/pimg1071_1.png" alt="" /></p>\n<p>上例中，最多将会堂租借给两家公司。租借策略分别是租给公司1和公司3，或是公司2和公司3，也可以是公司1和公司4。注意会议中心一天最多租借给一个公司，所以公司1和公司2不能同时租借会议中心，因为他们在第九天重合了。<br />\n销售主管为了公平起见，决定按照如下的程序来确定选择何种租借策略：首先，将租借给客户数量最多的策略作为候选，将所有的公司按照他们发出请求的顺序编号。对于候选策略，将策略中的每家公司的编号按升序排列。最后，选出其中字典序最小1的候选策略作为最终的策略。 例中，会堂最终将被租借给公司1和公司3：3个候选策略是{(1,3),(2,3),(1,4)}。而在字典序中(1,3)&lt;(1,4)&lt;(2,3)。 你的任务是帮助销售主管确定应该将会堂租借给哪些公司。</p>\n<p>对于50%的输入，N&le;3000。在所有输入中，N&le;200000。</p>\n<p></p>\n<p>-------------------</p>\n<p>1 字典序指在字典中排列的顺序，如果序列l1是序列l2的前缀，或者对于l1和l2的第一个不同位置j，l1[j]&lt;l2[j]，则l1比l2小。</p>', '<p>输入的第一行有一个整数N，表示发出租借会堂申请的公司的个数。第2到第N+1行每行有2个整数。第i+1行的整数表示第i家公司申请租借的起始和终止日期。对于每个公司的申请，起始日期为不小于1的整数，终止日期为不大于109的整数。</p>', '<p>输出的第一行应有一个整数M，表示最多可以租借给多少家公司。第二行应列出M个数，表示最终将会堂租借给哪些公司。</p>', '4\n4 9\n9 11\n13 19\n10 17\n', '2\n1 3\n', '0', '', 'file#.ans', '', 'APIO2009', '2011-05-27 17:02:18', 1, 128, 'filename', 0, 0, 9, 'English', 0, 'N', 0, 0, 0),
(2, '向量', '<p>给你一对数a,b，你可以任意使用(a,b), (a,-b), (-a,b), (-a,-b), (b,a), (b,-a), (-b,a), (-b,-a)这些向量，问你能不能拼出另一个向量(x,y)。</p>\r\n<p>说明：这里的拼就是使得你选出的向量之和为(x,y)</p>', '<p>第一行数组组数t，(t&lt;=50000)</p>\r\n<p>接下来t行每行四个整数a,b,x,y (-2*109&lt;=a,b,x,y&lt;=2*109)</p>', 't行\r\n每行为Y或者为N，分别表示可以拼出来，不能拼出来', '3\r\n2 1 3 3\r\n1 1 0 1\r\n1 0 -2 3\r\n', 'Y\r\nN\r\nY\r\n', 'vector#.in', 'vector#.out', 'vector#.ans', '<p>样例解释：</p>\r\n<p>第一组：(2,1)+(1,2)=(3,3)</p>\r\n<p>第三组：(-1,0)+(-1,0)+(0,1)+(0,1)+(0,1)=(-2,3)</p>', 'HAOI', '2011-05-26 18:20:35', 1, 256, 'vector', 0, 0, 9, 'Vector', 0, 'N', 7, 10, 0),
(3, '描边', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="LibreOffice 3.3  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n<p style="text-indent: 0.85cm; margin-bottom: 0cm"><font size="3">小</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>Z</i></font></font><font size="3">自幼就酷爱数学。聪明的他特别喜欢研究一些数学小问题。</font></p>\r\n<p style="text-indent: 0.85cm; margin-bottom: 0cm"><font size="3">有一天，小</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>Z</i></font></font><font size="3">在一张纸上选择了</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>n</i></font></font><font size="3">个点，并用铅笔将它们两两连接起来，构成</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>n</i></font><font size="3">(</font><font size="3"><i>n</i></font><font size="3">-1)/2</font></font><font size="3">条线段。由于铅笔很细，可以认为这些线段的宽度为</font><font face="DejaVu Serif Condensed, serif"><font size="3">0</font></font><font size="3">。</font></p>\r\n<p style="text-indent: 0.85cm; margin-bottom: 0cm"><font size="3">望着这些线段，小</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>Z</i></font></font><font size="3">陷入了冥想中。他认为这些线段中的一部分比较重要，需要进行强调。因此小</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>Z</i></font></font><font size="3">拿出了毛笔，将它们重新进行了描边。毛笔画在纸上，会形成一个</font><u><font size="3"><b>半径为</b></font></u><font face="DejaVu Serif Condensed, serif"><font size="3"><i><u><b>r</b></u></i></font></font><u><font size="3"><b>的圆</b></font></u><font size="3">。</font><u><font size="3"><b>在对一条线段进行描边时，毛笔的中心</b></font><font face="DejaVu Serif Condensed, serif"><font size="3"><b>(</b></font></font></u><u><font size="3"><b>即圆心</b></font><font face="DejaVu Serif Condensed, serif"><font size="3"><b>)</b></font></font></u><u><font size="3"><b>将从线段的一个端点开始，沿着该线段描向另一个端点</b></font></u><font size="3">。下图即为在一张</font><font face="DejaVu Serif Condensed, serif"><font size="3">4</font></font><font size="3">个点的图中，对其中一条线段进行描边强调后的情况。</font></p>\r\n<p style="text-indent: 0.85cm; margin-bottom: 0cm"><img alt="OK" width="0" height="0" src="/JudgeOnline/upload/201104/image/1.png" /><font size="3">现在，小</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>Z</i></font></font><font size="3">非常想知道在描边之后纸面上共有多大</font><u><font size="3"><b>面积</b></font></u><font size="3">的区域被强调，你能帮助他解答这个问题么？</font></p>\r\n</meta>\r\n</meta>\r\n</p>\r\n<p></p>', '<p></p>', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="LibreOffice 3.3  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">输出文件</font><font face="DejaVu Serif Condensed, serif"><font size="3">path*.out</font></font><font size="3">仅包含一行，即为描边后被强调区域的总面积</font>。</p>\r\n</meta>\r\n</meta>\r\n</p>\r\n<p></p>', '2\r\n1 1\r\n1 2\r\n1\r\n1 2\r\n1\r\n0.00001 0.001 0.1 1', '5.1415927', '0', '', 'file#.ans', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="LibreOffice 3.3  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		H2 { margin-top: 0.46cm; margin-bottom: 0.46cm; line-height: 173%; page-break-inside: avoid }\r\n		H2.western { font-family: "Arial", sans-serif; font-size: 16pt }\r\n		H2.cjk { font-family: "黑体", "SimHei"; font-size: 16pt; font-style: normal }\r\n		H2.ctl { font-family: "Arial", sans-serif; font-size: 16pt }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n<h2 class="cjk" style="margin-bottom: 0cm; font-weight: normal"><font size="3">【样例说明】</font></h2>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">如下图所示。</font></p>\r\n<p align="CENTER" style="text-indent: 0.74cm; margin-bottom: 0cm"></p>\r\n<h2 class="cjk" style="margin-bottom: 0cm; font-weight: normal"><font size="3">【评分标准】</font></h2>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">每个测试点单独评分。</font></p>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">本题设有</font><font face="DejaVu Serif Condensed, serif"><font size="3">4</font></font><font size="3">个评分参数</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>p</i></font><font size="3">1,</font><font size="3"><i>p</i></font><font size="3">2,</font><font size="3"><i>p</i></font><font size="3">3,</font><font size="3"><i>p</i></font><font size="3">4 (</font><font size="3"><i>p</i></font><font size="3">1&lt; </font><font size="3"><i>p</i></font><font size="3">2 &lt; </font><font size="3"><i>p</i></font><font size="3">3 &lt; </font><font size="3"><i>p</i></font><font size="3">4)</font></font><font size="3">，已在输入文件中给出。你的得分将按照如下规则给出：</font></p>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm">&nbsp;<font size="3">若你的答案与标准答案相差不超过</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>p</i></font><font size="3">1</font></font><font size="3">，则该测试点你将得到满分；</font></p>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">否则，若你的答案与标准答案相差不超过</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>p</i></font><font size="3">2</font></font><font size="3">，则你将得到该测试点</font><font face="DejaVu Serif Condensed, serif"><font size="3">70%</font></font><font size="3">的分数；</font></p>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">否则，若你的答案与标准答案相差不超过</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>p</i></font><font size="3">3</font></font><font size="3">，则你将得到该测试点</font><font face="DejaVu Serif Condensed, serif"><font size="3">40%</font></font><font size="3">的分数；</font></p>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">否则，若你的答案与标准答案相差不超过</font><font face="DejaVu Serif Condensed, serif"><font size="3"><i>p</i></font><font size="3">4</font></font><font size="3">，则你将得到该测试点</font><font face="DejaVu Serif Condensed, serif"><font size="3">10%</font></font><font size="3">的分数；</font></p>\r\n<p style="text-indent: 0.77cm; margin-bottom: 0cm"><font size="3">否则该测试点你的得分为</font><font face="DejaVu Serif Condensed, serif"><font size="3">0</font></font><font size="3">。</font></p>\r\n</meta>\r\n</meta>\r\n</p>\r\n<p></p>', 'NOI', '2011-04-23 15:38:35', 0, 0, 'path', 1, 0, 0, 'Path', 1, 'N', 0, 0, 0),
(4, '测试添加', 'tt.out', '0', '1', '1', '128', '', '', 'file#.ans', '', '', '2011-04-23 19:49:48', 0, 0, 'a.pas/c/cpp', 0, 0, 0, 'stdout', 0, 'Y', 0, 0, 0),
(5, '测试添加', 'fengle', '1', 'fengle.in', 'fengle.out', '0', '', '', 'file#.ans', '', '', '2011-04-23 19:51:53', 1, 128, 'a.pas/c/cpp', 0, 0, 0, 'stdout', 0, 'Y', 0, 0, 0),
(6, '机器翻译', '<p>小晨的电脑上安装了一个机器翻译软件，他经常用这个软件来翻译英语文章。\r\n这个翻译软件的原理很简单，它只是从头到尾，依次将每个英文单词用对应的中文含义\r\n来替换。对于每个英文单词，软件会先在内存中查找这个单词的中文含义，如果内存中有，\r\n软件就会用它进行翻译；如果内存中没有，软件就会在外存中的词典内查找，查出单词的中\r\n文含义然后翻译，并将这个单词和译义放入内存，以备后续的查找和翻译。\r\n假设内存中有M 个单元，每单元能存放一个单词和译义。每当软件将一个新单词存入\r\n内存前，如果当前内存中已存入的单词数不超过M−1，软件会将新单词存入一个未使用的\r\n内存单元；若内存中已存入M 个单词，软件会清空最早进入内存的那个单词，腾出单元来，\r\n存放新单词。</p>\r\n<p>假设一篇英语文章的长度为N 个单词。给定这篇待译文章，翻译软件需要去外存查找多\r\n少次词典？假设在翻译开始前，内存中没有任何单词。</p>', '<p>输入文件名为translate.in，输入文件共2 行。每行中两个数之间用一个空格隔开。</p>\r\n<p>第一行为两个正整数M 和N，代表内存容量和文章的长度。</p>\r\n<p>第二行为N 个非负整数，按照文章的顺序，每个数（大小不超过1000）代表一个英文单词。文章中两个单词是同一个单词，当且仅当它们对应的非负整数相同。</p>', '<p>输出文件translate.out 共1 行，包含一个整数，为软件需要查词典的次数。</p>', '【输入样例1】\r\n3 7\r\n1 2 1 5 4 4 1\r\n【输入样例2】\r\n2 10\r\n8 824 11 78 11 78 11 78 8 264', '【输出样例1】\r\n5\r\n\r\n【输出样例2】\r\n6', 'translate#.in', 'translate#.out', 'translate#.ans', '<p>【输入输出样例 1 说明】</p>\r\n<p>整个查字典过程如下：</p>\r\n<p>每行表示一个单词的翻译，冒号前为本次翻译后的内存状况：</p>\r\n<ol start="0">\r\n<li>空：内存初始状态为空。</li>\r\n<li>1：查找单词1 并调入内存。</li>\r\n<li>1 2：查找单词2 并调入内存。</li>\r\n<li>1 2：在内存中找到单词1。</li>\r\n<li>1 2 5：查找单词5 并调入内存。</li>\r\n<li>2 5 4：查找单词4 并调入内存替代单词1。</li>\r\n<li>2 5 4：在内存中找到单词4。</li>\r\n<li>5 4 1：查找单词1 并调入内存替代单词2。</li>\r\n</ol>\r\n共计查了5 次词典。<p></p>\r\n<p>【数据范围】</p>\r\n<p>对于10%的数据有M=1，N≤ 5。</p>\r\n<p>对于100%的数据有0&lt;m≤ 100，0&lt;n≤1000 。</p>', 'NOIP', '2011-05-26 17:41:07', 1, 128, 'translate', 0, 1, 10, 'Translate', 0, 'N', 0, 0, 0),
(9, '抢掠计划', '<p>Siruseri城中的道路都是单向的。不同的道路由路口连接。按照法律的规定，在每个路口都设立了一个Siruseri银行的ATM取款机。令人奇怪的是，Siruseri的酒吧也都设在路口，虽然并不是每个路口都设有酒吧。 Banditji计划实施Siruseri有史以来最惊天动地的ATM抢劫。他将从市中心出发，沿着单向道路行驶，抢劫所有他途径的ATM机，最终他将在一个酒吧庆祝他的胜利。 使用高超的黑客技术，他获知了每个ATM机中可以掠取的现金数额。他希望你帮助他计算从市中心出发最后到达某个酒吧时最多能抢劫的现金总数。他可以经过同一路口或道路任意多次。但只要他抢劫过某个ATM机后，该ATM机里面就不会再有钱了。 例如，假设该城中有6个路口，道路的连接情况如下图所示：</p>\n<p></p>\n<p><img width="478" height="184" src="/hustoj/web/admin/../upload/pimg1072_1.png" alt="" /></p>\n<p>市中心在路口1，由一个入口符号&rarr;来标识，那些有酒吧的路口用双圈来表示。每个ATM机中可取的钱数标在了路口的上方。在这个例子中，Banditji能抢劫的现金总数为47，实施的抢劫路线是：1-2-4-1-2-3-5。</p>\n<p>50%的输入保证N, M&lt;=3000。所有的输入保证N, M&lt;=500000。每个ATM机中可取的钱数为一个非负整数且不超过4000。输入数据保证你可以从市中心沿着Siruseri的单向的道路到达其中的至少一个酒吧。</p>', '<p>第一行包含两个整数N、M。N表示路口的个数，M表示道路条数。接下来M行，每行两个整数，这两个整数都在1到N之间，第i+1行的两个整数表示第i条道路的起点和终点的路口编号。接下来N行，每行一个整数，按顺序表示每个路口处的ATM机中的钱数。接下来一行包含两个整数S、P，S表示市中心的编号，也就是出发的路口。P表示酒吧数目。接下来的一行中有P个整数，表示P个有酒吧的路口的编号。</p>', '<p>输出一个整数，表示Banditji从市中心开始到某个酒吧结束所能抢劫的最多的现金总数。</p>', '6 7\n1 2\n2 3\n3 5\n2 4\n4 1\n2 6\n6 5\n10\n12\n8\n16\n1\n5\n1 4\n4 3 5 6', '47\n', '0', '', 'file#.ans', '', 'APIO2009', '2011-05-27 17:02:18', 1, 128, 'filename', 0, 0, 9, 'English', 0, 'N', 0, 0, 0),
(10, '跳马问题', '有一只中国象棋中的马，在半张棋盘的左上角出发，向右下角跳去。规定只许向右跳（可上，可下，但不允许向左跳）。请编程求从起点 A(1,1) 到终点 B(m,n) 共有多少种不同跳法。', '输入文件只有一行，两个整数m和n，两个数之间有一个空格。', '输出文件只有一个数据，即从 A 到 B 全部的走法', '5 9\r\n', '37\r\n', 'horse#.in', 'horse.out', 'horse#.ans', '搜索', '', '2011-06-28 21:58:28', 1, 128, 'file', 0, 1, 10, 'Horse Problem', 0, 'N', 0, 0, 0),
(11, 'N皇后问题', '八皇后问题是一个以国际象棋为背景的问题：如何能够在 8×8 的国际象棋棋盘上放置八个皇后，使得任何一个皇后都无法直接吃掉其他的皇后？为了达到此目的，任两个皇后都不能处于同一条横行、纵行或斜线上。八皇后问题可以推广为更一般的n皇后摆放问题：这时棋盘的大小变为n×n，而皇后个数也变成n。当且仅当 n = 1 或 n ≥ 4 时问题有解。', '一个数n，表示棋盘大小为n*n，有n个皇后。', '只有一个数字，为解的个数。当没有解时输出0。', '8\r\n', '92\r\n', 'queen#.in', 'queen.out', 'queen#.ans', '现在还没有已知公式可以对 n 计算 n 皇后问题的解的个数。', '经典', '2011-06-29 15:12:03', 2, 128, 'queen', 0, 1, 10, 'N Queens Problem', 0, 'N', 0, 0, 0),
(12, '一元多项式相加', '<p>一元多项式相加的运算规则很简单：两个多项式中所有指数相同的项，对应系数相加，若和不为零，则构成"和多项式"中的一项；所有指数不同的项均复抄到"和多项式"中。</p>', '<p>输入由两行组成：</p>\r\n<p>第一行有一个字符串p（1≤length(p)≤200）表示多项式1</p>\r\n<p>第二行有一个字符串q（1≤length(q)≤200）表示多项式2</p>', '<p>输出有一行，为字符串s（1≤length(q)≤500)，表示和多项式</p>', '2x+3x^2+x^7-5x^90\r\n4x+x^3\r\n', '6x+3x^2+x^3+x^7-5x^90\r\n', 'oneploy#.in', 'oneploy.out', 'oneploy#.ans', '<p>注：表达式中系数与x间的乘号均省略，^表示幂。</p>', '经典', '2011-06-30 17:49:41', 1, 128, 'oneploy', 0, 1, 10, '一元多项式相加', 0, 'N', 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`rid`, `author_id`, `time`, `content`, `topic_id`, `status`, `ip`) VALUES
(1, 'Kingfree', '2011-04-22 19:25:02', '好题！', 1, 0, '127.0.0.1');

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
  PRIMARY KEY (`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `submit`
--

INSERT INTO `submit` (`jid`, `pid`, `cid`, `uid`, `judged`, `langtype`, `result`, `detail`, `score`, `runtime`, `memory`, `ip`, `submit_time`, `judge_time`) VALUES
(4, 11, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '0.0.0.0', '2011-06-30 09:11:14', '2011-06-30 21:11:15'),
(3, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '0.0.0.0', '2011-06-30 09:06:31', '2011-06-30 21:06:33'),
(2, 1, 0, 'Kingfree', 0, 0, 0, 'AAAAAAAAAA', 100, 0, 0, '0.0.0.0', '2011-06-30 09:03:56', '2011-06-30 21:03:58'),
(1, 1, 0, 'Kingfree', 0, 0, 6, 'C', 0, -1, -1, '0.0.0.0', '2011-06-30 08:55:10', '2011-06-30 20:55:10');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`tid`, `title`, `status`, `top_level`, `cid`, `pid`, `author_id`) VALUES
(1, '好', 0, 0, NULL, 1000, 'Kingfree');

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
(1, 'Kingfree', 'anytjf@gmail.com', 10, 3, 'N', '127.0.0.1', '2011-04-19 21:32:32', 1, 1, '6455571dcc821cf127737e81ebd38776', '2011-04-19 21:32:32', '王者自由', '田劲锋', '河南省实验中学', '0,1'),
(4, 'fanzeyi', 'fanzeyi1994@gmail.com', 0, 0, 'N', '192.168.201.242', '2011-04-27 17:04:12', 1, 1, 'e4c80f58873ed6543da4f3001f592e7f', '2011-04-27 17:04:12', 'fanzeyi', '', '', '0'),
(3, 'lidong', '', 2, 2, 'N', '127.0.0.1', '2011-05-05 11:12:37', 1, 1, '62bc1de1ed50474dbdeb7cb18df666b3', '2011-05-05 11:12:37', 'donny', '', '', '0'),
(2, 'UserName', '19941008qian@163.com', 0, 0, 'N', '127.0.0.1', '2011-05-24 17:25:20', 1, 1, 'd41d8cd98f00b204e9800998ecf8427e', '2011-05-24 17:25:20', '用户', '', '河南省实验中学benxiao', ''),
(5, 'English', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 13:34:38', 1, 1, 'd41d8cd98f00b204e9800998ecf8427e', '2011-05-25 13:34:38', '英语', '英语', '', ''),
(6, 'Chinese', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 13:36:28', 1, 1, '3b261136e3c33f35e0a58611b1f344cb', '2011-05-25 13:36:28', '中文', '', '', ''),
(7, 'Chromium', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 14:00:17', 1, 1, '65d5644b4049b4215a6faa532e7e5ad5', '2011-05-25 14:00:17', '谷歌浏览器', '', '', ''),
(8, 'ABCDEF', '', 0, 0, 'N', '127.0.0.1', '2011-05-25 14:03:05', 1, 1, '8827a41122a5028b9808c7bf84b9fcf6', '2011-05-25 14:03:05', '哈啊', '真是', '', '');
