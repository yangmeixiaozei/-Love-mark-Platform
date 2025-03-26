-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-06-14 17:23:50
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `love_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`ID`, `phone_number`, `nickname`, `password`) VALUES
(1, 177, 'admin', 888);

-- --------------------------------------------------------

--
-- 表的结构 `complain`
--

CREATE TABLE `complain` (
  `ID` int(11) NOT NULL,
  `UserPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `complain`
--

INSERT INTO `complain` (`ID`, `UserPhone`, `date`, `title`, `content`) VALUES
(5, '18025346943', '2024-06-13 15:53:29', '真是讨厌', '为什么做事只顾着自己，这难道只关乎到你一个人吗？能不能也为别人考虑一下啊！真是火大'),
(6, '13138851098', '2024-06-13 18:27:04', '好多事情呀', '这么多事情，呜呜呜，怎么都做不完。期末周啊啊啊啊啊！埋头干吧！'),
(7, '13554785113', '2024-06-13 21:10:10', '讨厌死了', '天天喊我猪，你才最笨最笨。你完蛋了'),
(8, '18025346943', '2024-06-14 17:45:36', '事情好多好多啊啊啊啊', '事情怎么这么多，感觉都做不完，做不完，等我把六级考完，我就速速速吃一顿大餐，睡个好觉！！是的！就这样愉快的决定了！');

-- --------------------------------------------------------

--
-- 表的结构 `lovers`
--

CREATE TABLE `lovers` (
  `ID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `send` text COLLATE utf8_unicode_ci NOT NULL,
  `sendname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accept` text COLLATE utf8_unicode_ci NOT NULL,
  `coup_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lovers`
--

INSERT INTO `lovers` (`ID`, `date`, `send`, `sendname`, `accept`, `coup_status`) VALUES
(60, '2024-06-13 12:36:53', '18025346943', '我爱你', '13554785113', '情侣'),
(63, '2024-06-13 17:30:47', '13927487190', '小华', '13138851098', '情侣'),
(64, '2024-06-13 21:13:57', '12345678912', 'test1', '12345678989', '情侣'),
(65, '2024-06-14 17:08:47', '98765432112', '%%', '17779257710', '情侣'),
(66, '2024-06-14 20:54:56', '66666666666', '伤心男二', '12345612345', ''),
(67, '2024-06-14 22:08:53', '00000000002', '臭皮蛋', '00000000001', '拒绝');

-- --------------------------------------------------------

--
-- 表的结构 `share`
--

CREATE TABLE `share` (
  `ID` int(11) NOT NULL,
  `UserPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `share`
--

INSERT INTO `share` (`ID`, `UserPhone`, `date`, `title`, `content`) VALUES
(6, '18025346943', '2024-06-13 13:08:09', '通过积极分子考试啦', '嘿嘿，积极分子考试成功拿下啦！'),
(7, '18025346943', '2024-06-13 15:43:46', '美食、妆容', '今天吃了好多好吃的呀，虽然没有回家过端午，但是自己也吃了湘菜和海底捞，今天的妆容也很不错，找到自己的风格了呢'),
(10, '13138851098', '2024-06-13 18:26:13', '800米', '今天我800米只花了3分34！！我真的好棒呀！'),
(11, '13554785113', '2024-06-13 21:09:44', '好开心呀', '发现ddl还有一天，我的妈呀，大大的拯救！活过来了'),
(12, '18025346943', '2024-06-14 10:43:50', '世界文学结课啦', '一门课又结束啦，接下来考完六级就专心备战期末考！'),
(13, '98765432112', '2024-06-14 17:29:09', '我好多小点都攻克啦！', '天将降大任于斯人也，必先苦其心志，劳其筋骨，饿其体肤！！！'),
(14, '18025346943', '2024-06-14 19:38:49', '妈呀！！！', '终于把这个图片上传的弄出来了，再不弄出来我就要疯了！！！！有时候离成功可能就是一个细节');

-- --------------------------------------------------------

--
-- 表的结构 `sweet`
--

CREATE TABLE `sweet` (
  `ID` int(11) NOT NULL,
  `UserPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `sweet`
--

INSERT INTO `sweet` (`ID`, `UserPhone`, `date`, `title`, `content`, `photo`) VALUES
(1, '18025346943', '2024-06-14 19:33:01', '1', '1', 'sweetImage/1_20240614_133301.jpg'),
(2, '18025346943', '2024-06-14 19:40:18', '一起庆祝20岁生日！！', '一起庆祝20岁生日，吃了湘菜，十翅桶，还有海底捞。社恐变社牛啊', 'sweetImage/一起庆祝20岁生日！！_20240614_134018.jpg'),
(3, '18025346943', '2024-06-14 19:45:07', '一起度过了端午', '吃了粽子，包子，咸鸭蛋，小龙虾。', 'sweetImage/一起度过了端午_20240614_134507.jpg'),
(5, '18025346943', '2024-06-14 20:10:36', '在一起', '2022.6.11 5：20', 'sweetImage/在一起_20240614_141036.jpg'),
(9, '18025346943', '2024-06-14 21:17:33', '长隆欢乐世界', '十环过山车好刺激啊，睁眼玩大摆锤，我的天，不敢去玩跳楼机，碰碰车好晕啊，旋转木马不错，还有喜欢玩泡泡水！', 'sweetImage/长隆欢乐世界_20240614_151733.jpg'),
(11, '18025346943', '2024-06-14 21:21:01', '海底捞', '在海底捞店员给我们拍的照片好好看呀，本来今天也挺好看的，嘿嘿', 'sweetImage/海底捞_20240614_152101.jpeg');

-- --------------------------------------------------------

--
-- 表的结构 `todo`
--

CREATE TABLE `todo` (
  `ID` int(11) NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `thing` text COLLATE utf8_unicode_ci NOT NULL,
  `hours` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `countdown` time NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `todo`
--

INSERT INTO `todo` (`ID`, `phone`, `thing`, `hours`, `minutes`, `time`, `countdown`, `state`, `rank`) VALUES
(14, '18025346943', '六级复习', 2, 0, '2024-06-13 22:53:00', '02:00:00', '未开始', '重要且紧急'),
(15, '18025346943', '洗头洗澡', 0, 30, '2024-06-13 22:53:13', '00:30:00', '未开始', '不重要但紧急'),
(16, '18025346943', '复习习概', 2, 0, '2024-06-13 22:53:25', '02:00:00', '未开始', '重要不紧急'),
(17, '18025346943', '复习毛概', 2, 0, '2024-06-13 22:53:41', '02:00:00', '未开始', '重要不紧急'),
(18, '18025346943', '看一集庆余年2', 0, 45, '2024-06-13 22:54:04', '00:45:00', '已完成', '不重要不紧急'),
(19, '18025346943', '测试', 0, 1, '2024-06-13 23:09:47', '00:01:00', '已完成', '不重要不紧急'),
(20, '18025346943', '测试2', 0, 1, '2024-06-14 00:17:03', '00:01:00', '已完成', '不重要不紧急'),
(21, '18025346943', 'test111', 0, 1, '2024-06-14 00:33:23', '00:01:00', '已完成', '不重要不紧急'),
(22, '18025346943', '成功', 0, 1, '2024-06-14 01:04:11', '00:01:00', '已完成', '重要且紧急'),
(23, '18025346943', '最后测试一遍', 0, 1, '2024-06-14 01:13:23', '00:01:00', '已完成', '不重要不紧急'),
(24, '18025346943', '听选词填空', 0, 45, '2024-06-14 08:29:08', '00:45:00', '已完成', '重要且紧急'),
(25, '18025346943', '搞六级阅读', 1, 0, '2024-06-14 08:44:11', '01:00:00', '已完成', '重要且紧急'),
(26, '98765432112', '复习六级', 2, 0, '2024-06-14 17:18:01', '02:00:00', '已完成', '重要且紧急'),
(27, '98765432112', '复习概统', 3, 0, '2024-06-14 17:18:57', '03:00:00', '已完成', '重要不紧急'),
(28, '98765432112', '提交web作业', 0, 10, '2024-06-14 17:19:16', '00:10:00', '未开始', '重要且紧急'),
(29, '98765432112', '吃晚饭', 0, 40, '2024-06-14 17:20:03', '00:40:00', '未开始', '不重要但紧急'),
(30, '98765432112', '看一集动漫', 0, 20, '2024-06-14 17:20:18', '00:20:00', '未开始', '不重要不紧急'),
(31, '98765432112', '复习软件工程', 4, 0, '2024-06-14 17:20:45', '04:00:00', '已完成', '重要且紧急'),
(32, '98765432112', '测试', 0, 1, '2024-06-14 17:25:57', '00:01:00', '进行中', '不重要但紧急');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coup_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `coup_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `tot_cred` int(11) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `phone_number`, `nickname`, `password`, `photo`, `coup_phone`, `coup_name`, `status`, `tot_cred`, `level`) VALUES
(1, '18025346943', '我爱你', '611', 'userImage/_20240602_192147.jpg', '13554785113', '我也爱你', '在线', 51, 0),
(3, '13554785113', '我也爱你', '611', 'userImage/_20240603_063336.jpg', '18025346943', '我爱你', '离线', 11, 0),
(4, '13927487190', '小华', '520', 'userImage/_20240604_084740.jpg', '13138851098', '小桂', '离线', 0, 0),
(6, '13138851098', '小桂', '520', 'userImage/_20240604_084951.jpg', '13927487190', '小华', '离线', 16, 0),
(7, '12345678912', 'test1', '123', 'userImage/_20240613_151225.jpg', '12345678989', 'test2', '在线', 0, 0),
(8, '12345678989', 'test2', '123', 'userImage/_20240613_151313.jpg', '12345678912', 'test1', '在线', 0, 0),
(11, '98765432112', '%%', '123', 'userImage/_20240614_103453.jpg', '17779257710', '线条小狗', '在线', 11, 0),
(12, '17779257710', '线条小狗', '123', 'userImage/_20240614_104107.jpg', '98765432112', '%%', '在线', 0, 0),
(13, '12345612345', '李华', '123', 'userImage/_20240614_105904.jpg', '119', '未知', '在线', 0, 0),
(14, '66666666666', '伤心男二', '555', 'userImage/_20240614_145403.jpg', '119', '未知', '在线', 0, 0),
(15, '00000000001', '小杨肖恩', '000', 'userImage/_20240614_160740.jpg', '119', '未知', '在线', 0, 0),
(16, '00000000002', '臭皮蛋', '001', 'userImage/_20240614_160831.jpg', '119', '未知', '在线', 0, 0);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `lovers`
--
ALTER TABLE `lovers`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `sweet`
--
ALTER TABLE `sweet`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `complain`
--
ALTER TABLE `complain`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `lovers`
--
ALTER TABLE `lovers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- 使用表AUTO_INCREMENT `share`
--
ALTER TABLE `share`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `sweet`
--
ALTER TABLE `sweet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `todo`
--
ALTER TABLE `todo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
