-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-02-25 17:55:02
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
-- 表的结构 `librarycms_bookmanage`
--

CREATE TABLE `librarycms_bookmanage` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `bookname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publishing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publishdate` date NOT NULL,
  `price` float NOT NULL,
  `totalcount` int(11) NOT NULL,
  `surpluscount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `librarycms_bookmanage`
--

INSERT INTO `librarycms_bookmanage` (`id`, `bookid`, `bookname`, `writer`, `publishing`, `publishdate`, `price`, `totalcount`, `surpluscount`) VALUES
(1, 202001, '《JAVA语言程序设计（基础篇）》', '【美】梁勇', '机械工业出版社', '2015-11-10', 50, 18, 15),
(2, 202002, '《C++程序设计（第三版）》', '谭浩强', '清华大学出版社', '2012-06-05', 36, 25, 20),
(3, 202003, '《JavaScript高级程序设计（第三版）》', '【美】Nicholas C.Zakas', '人民邮电出版社', '2012-05-04', 93.5, 16, 8),
(4, 202004, '《Vue.js实战》', '梁灏', '清华大学出版社', '2018-04-11', 25.2, 14, 14),
(5, 202005, '《Node.js开发实战》', '忽如寄', '清华大学出版社', '2018-06-05', 26, 17, 16),
(6, 202006, '《React.js实战》', '赵荣娇', '清华大学出版社', '2018-07-04', 21.5, 18, 18),
(7, 202007, '《Linux就该这么学》', '刘遄', '人民邮电出版社', '2016-02-03', 53.5, 35, 28),
(8, 202008, '《JavaScript核心技术开发解密》', '阳波', '电子工业出版社', '2017-07-01', 43.5, 23, 21),
(9, 202009, '《ECMAScript从零开始学》', '王金柱', '清华大学出版社', '2016-09-07', 47, 15, 14),
(10, 202010, '《PHP7.0+MySQL网站开发全程实例》', '于荷云', '清华大学出版社', '2018-08-15', 48.5, 26, 25),
(11, 202011, '《Bootstrap响应式网站开发实战》', '车云月', '清华大学出版社', '2019-12-24', 39.8, 17, 15),
(12, 202012, '《XML基础及实践开发教程（第2版）》', '唐琳', '清华大学出版社', '2017-06-13', 40, 12, 7),
(13, 202013, '《微信小程序开发图解案例教程（第2版）》', '刘刚', '人民邮电出版社', '2018-05-08', 38.3, 26, 15),
(14, 202014, '《HTML5跨平台游戏设计》', '白乃远', '清华大学出版社', '2017-05-01', 54.5, 12, 5),
(15, 202015, '《你不知道的JavaScript（上中下卷）》', '【美】KYLE SIMPSON', '人民邮电出版社', '2014-10-08', 134.5, 14, 12),
(16, 202016, '《疯狂前端开发讲义》', '李刚', '电子工业出版社', '2018-12-10', 54.8, 14, 14),
(17, 202017, '《Webpack实战 入门、进阶与调优》', '居玉晧', '机械工业出版社', '2019-03-14', 48.3, 8, 8),
(18, 202018, '《AngularJS入门与进阶》', '江荣波', '清华大学出版社', '2017-05-04', 48.3, 19, 18),
(19, 202019, '《深入浅出Node.js》', '朴灵', '人民邮电出版社', '2016-08-03', 37.9, 20, 18),
(20, 202020, '《JavaScript+Vue+React全程实例》', '郑钧辉', '清华大学出版社', '2018-06-06', 48.5, 16, 12),
(21, 202021, '《锋利的JQuery（第2版）》', '单东林', '人民邮电出版社', '2018-04-18', 24.5, 17, 12),
(22, 202022, '《Python3.6从入门到精通》', '王英英', '清华大学出版社', '2017-10-20', 42.7, 22, 22),
(23, 202023, '《Python网络爬虫实战》', '胡松涛', '清华大学出版社', '2017-05-01', 32.4, 14, 12),
(24, 202024, '《鸟哥的Linux私房菜（第三版）》', '鸟哥', '人民邮电出版社', '2016-07-01', 96.7, 14, 10);

--
-- 转储表的索引
--

--
-- 表的索引 `librarycms_bookmanage`
--
ALTER TABLE `librarycms_bookmanage`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `librarycms_bookmanage`
--
ALTER TABLE `librarycms_bookmanage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
