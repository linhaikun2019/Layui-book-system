-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-02-26 14:37:15
-- 服务器版本： 8.0.12
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `library`
--

-- --------------------------------------------------------

--
-- 表的结构 `librarycms_studentmanage`
--

CREATE TABLE `librarycms_studentmanage` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `studentname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentsex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentage` int(11) NOT NULL,
  `studentphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lendcount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `librarycms_studentmanage`
--

INSERT INTO `librarycms_studentmanage` (`id`, `studentid`, `studentname`, `studentsex`, `studentage`, `studentphone`, `studentmail`, `lendcount`) VALUES
(1, 1700001, '张三', '男', 20, '152551247', '4534246@qq.com', 0),
(2, 1700002, '李四', '男', 21, '15646785', '564646454@qq.com', 0),
(3, 1700003, '李红', '女', 20, '64564564', '4454446@163.com', 0),
(4, 1700004, '王五', '男', 22, '1775645644', 'fggfdg@163.com', 0),
(5, 1700005, '李想', '男', 21, '454411122', '1122221@qq.com', 0),
(6, 1700006, '张红', '女', 19, '1545753445', '4571212@qq.com', 0),
(7, 1700007, '刘万三', '男', 22, '45677111', '1247424@qq.com', 0),
(8, 1700008, '韩花花', '女', 25, '145754345', 'ddfsfssd@sohu.com', 0),
(9, 1700009, '张三丰', '男', 18, '454511444', '14545411@gmail.com', 0),
(10, 17000010, '王强', '男', 22, '14572144522547', 'dfsssd@gmail.com', 0),
(11, 17000011, '张青', '男', 22, '777441445', 'dfsss445d@126.com', 0),
(12, 17000012, '刘果', '女', 19, '754144665', 'dfdbhhhhh@126.com', 0),
(13, 17000013, '林峰海', '男', 25, '14545712255', '14456ffdgd@163.com', 0),
(14, 17000014, '陶翠梅', '女', 20, '12445714544', 'dgvfdgf1234332@163.com', 0),
(15, 17000015, '秦思秋', '女', 25, '93554456456', '755463464@qq.com', 0),
(16, 17000016, '赵信', '男', 19, '1457515452200', '4044550000@qq.com', 0),
(17, 17000017, '柳青', '女', 20, '45454211444', '124541324@qq.com', 0),
(18, 17000018, '齐思淼', '男', 23, '14545464645', 'fdgdsgdsf@163.com', 0),
(19, 17000019, '闫丰收', '男', 19, '4565464477', 'fdgdsgd54545sf@163.com', 0),
(20, 17000020, '华谷梅', '女', 25, '4511456222', 'sfsds46546@163.com', 0),
(21, 17000021, '方新高', '男', 18, '213132145', '12124246@126.com', 0),
(22, 17000022, '陈清花', '女', 23, '144513555564', 'vfgf1454@qq.com', 0),
(23, 17000023, '李芊秋', '女', 21, '45114445522', 'vf454454@126.com', 0),
(24, 17000024, '徐楠楠', '女', 19, '25411122544', '1454112122@qq.com', 0);

--
-- 转储表的索引
--

--
-- 表的索引 `librarycms_studentmanage`
--
ALTER TABLE `librarycms_studentmanage`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `librarycms_studentmanage`
--
ALTER TABLE `librarycms_studentmanage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
