-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-05-12 12:40:55
-- 服务器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Weight Lose'),
(1, 'Yoga');

-- --------------------------------------------------------

--
-- 表的结构 `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `certification_code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` enum('created','completed') CHARACTER SET latin1 NOT NULL DEFAULT 'created'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `certifications`
--

INSERT INTO `certifications` (`id`, `user_id`, `certification_code`, `status`) VALUES
(1, 4, 'XMALJ12', 'completed');

-- --------------------------------------------------------

--
-- 表的结构 `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `coach_id` int(11) NOT NULL,
  `image` mediumblob DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `time`, `coach_id`, `image`, `category`) VALUES
(47, 'The best yoga (level 1)', 1000, '1:00-2:00', 4, 0x696d672f32333336313635323236383431322e6a7067, 'Yoga'),
(48, 'The best yoga (level 2)', 1000, '1:00-2:00', 4, 0x696d672f32333834313635323236383436342e6a7067, 'Yoga'),
(49, 'The best yoga (level 3)', 1000, '1:00-2:00', 4, 0x696d672f32323830313635323236383438352e6a7067, 'Yoga');

-- --------------------------------------------------------

--
-- 表的结构 `item_history`
--

CREATE TABLE `item_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `item_history`
--

INSERT INTO `item_history` (`id`, `user_id`, `item_id`) VALUES
(37, 4, 47),
(38, 4, 49),
(39, 4, 48),
(41, 2, 47),
(43, 2, 49),
(44, 2, 48);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` mediumblob DEFAULT NULL,
  `is_coach` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `photo`, `is_coach`) VALUES
(2, 'user_mike', 'mike@gmail.com', '123', '8120822235', 'durh', 'bhil', 0x696d672f34393637313635323237303938372e77656270, '0'),
(4, 'Amy', '123456@qq.com', '123', '123456', 'Suzou', 'XJTLU', 0x696d672f34373539313635323131363332342e706e67, '1');

-- --------------------------------------------------------

--
-- 表的结构 `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL,
  `course_status` enum('Unfinished','Finished') NOT NULL,
  `teach` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status`, `course_status`, `teach`) VALUES
(80, 2, 48, 'Confirmed', 'Unfinished', '0'),
(81, 2, 47, 'Added to cart', 'Unfinished', '0');

--
-- 转储表的索引
--

--
-- 表的索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `name` (`name`) USING BTREE;

--
-- 表的索引 `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_ce` (`user_id`) USING BTREE;

--
-- 表的索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `item_coach_id` (`coach_id`) USING BTREE,
  ADD KEY `cat` (`category`) USING BTREE;

--
-- 表的索引 `item_history`
--
ALTER TABLE `item_history`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_item_id` (`user_id`) USING BTREE,
  ADD KEY `item_id` (`item_id`) USING BTREE;

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `item_id` (`item_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用表AUTO_INCREMENT `item_history`
--
ALTER TABLE `item_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 限制导出的表
--

--
-- 限制表 `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `user_ce` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 限制表 `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_coach_id` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `item_history`
--
ALTER TABLE `item_history`
  ADD CONSTRAINT `item_history_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_item_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `users_items`
--
ALTER TABLE `users_items`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
