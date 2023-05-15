-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-05-15 22:57:21
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `mov-hu`
--

-- --------------------------------------------------------

--
-- 表的结构 `angulardisplacement`
--

CREATE TABLE `angulardisplacement` (
  `displacement` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `angulardisplacement`
--

INSERT INTO `angulardisplacement` (`displacement`, `factor`) VALUES
(0, 1),
(30, 0.9),
(60, 0.81),
(90, 0.71),
(120, 0.52),
(135, 0.57),
(136, 0);

-- --------------------------------------------------------

--
-- 表的结构 `evaluations`
--

CREATE TABLE `evaluations` (
  `evaluation_id` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1,
  `businessName` varchar(255) NOT NULL,
  `author` int(11) NOT NULL DEFAULT 1,
  `cost` float NOT NULL,
  `date` varchar(255) NOT NULL,
  `realWeight` float NOT NULL,
  `heightFromGround` float NOT NULL,
  `verticalDistance` float NOT NULL,
  `horizontalDistance` float NOT NULL,
  `angularDisplacement` float NOT NULL,
  `gripValue` varchar(10) NOT NULL,
  `frequency` float NOT NULL,
  `duration` varchar(255) NOT NULL,
  `oneHand` tinyint(1) NOT NULL DEFAULT 0,
  `twoPeople` tinyint(1) NOT NULL DEFAULT 0,
  `maximumWeight` float NOT NULL,
  `IR` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `evaluations`
--

INSERT INTO `evaluations` (`evaluation_id`, `valid`, `businessName`, `author`, `cost`, `date`, `realWeight`, `heightFromGround`, `verticalDistance`, `horizontalDistance`, `angularDisplacement`, `gripValue`, `frequency`, `duration`, `oneHand`, `twoPeople`, `maximumWeight`, `IR`) VALUES
(101, 1, 'Hu', 1, 100, '2023-05-03', 20, 0, 25, 25, 0, 'Buono', 0.2, '< 1 ora', 0, 0, 15.4, 1.2987);

-- --------------------------------------------------------

--
-- 表的结构 `frequency`
--

CREATE TABLE `frequency` (
  `frequency` float NOT NULL,
  `duration` varchar(255) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `frequency`
--

INSERT INTO `frequency` (`frequency`, `duration`, `factor`) VALUES
(0.2, '< 1 ora', 1),
(1, '< 1 ora', 0.94),
(4, '< 1 ora', 0.84),
(6, '< 1 ora', 0.75),
(9, '< 1 ora', 0.52),
(12, '< 1 ora', 0.37),
(15, '< 1 ora', 0),
(0.2, 'da 1 a 2 ore', 0.95),
(1, 'da 1 a 2 ore', 0.88),
(4, 'da 1 a 2 ore', 0.72),
(6, 'da 1 a 2 ore', 0.5),
(9, 'da 1 a 2 ore', 0.3),
(12, 'da 1 a 2 ore', 0.21),
(15, 'da 1 a 2 ore', 0),
(0.2, 'da 2 a 8 ore', 0.85),
(1, 'da 2 a 8 ore', 0.75),
(4, 'da 2 a 8 ore', 0.45),
(6, 'da 2 a 8 ore', 0.27),
(9, 'da 2 a 8 ore', 0.52),
(12, 'da 2 a 8 ore', 0),
(15, 'da 2 a 8 ore', 0);

-- --------------------------------------------------------

--
-- 表的结构 `gripvalue`
--

CREATE TABLE `gripvalue` (
  `value` varchar(255) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `gripvalue`
--

INSERT INTO `gripvalue` (`value`, `factor`) VALUES
('Buono', 1),
('Scarso', 0.9);

-- --------------------------------------------------------

--
-- 表的结构 `heightfromground`
--

CREATE TABLE `heightfromground` (
  `height` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `heightfromground`
--

INSERT INTO `heightfromground` (`height`, `factor`) VALUES
(0, 0.77),
(25, 0.85),
(50, 0.93),
(75, 1),
(100, 0.93),
(125, 0.85),
(150, 0.78),
(175, 0);

-- --------------------------------------------------------

--
-- 表的结构 `horizontaldistance`
--

CREATE TABLE `horizontaldistance` (
  `distance` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `horizontaldistance`
--

INSERT INTO `horizontaldistance` (`distance`, `factor`) VALUES
(25, 1),
(30, 0.83),
(40, 0.63),
(50, 0.5),
(55, 0.45),
(60, 0.42),
(63, 0);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name_surname`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(7, 'hu', 'hu', 'hu', 1),
(15, '12', '12', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `verticaldistance`
--

CREATE TABLE `verticaldistance` (
  `dislocation` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `verticaldistance`
--

INSERT INTO `verticaldistance` (`dislocation`, `factor`) VALUES
(25, 1),
(30, 0.97),
(40, 0.93),
(50, 0.91),
(70, 0.88),
(100, 0.87),
(150, 0.86),
(175, 0);

--
-- 转储表的索引
--

--
-- 表的索引 `angulardisplacement`
--
ALTER TABLE `angulardisplacement`
  ADD PRIMARY KEY (`displacement`);

--
-- 表的索引 `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evaluation_id`);

--
-- 表的索引 `gripvalue`
--
ALTER TABLE `gripvalue`
  ADD PRIMARY KEY (`value`);

--
-- 表的索引 `heightfromground`
--
ALTER TABLE `heightfromground`
  ADD PRIMARY KEY (`height`);

--
-- 表的索引 `horizontaldistance`
--
ALTER TABLE `horizontaldistance`
  ADD PRIMARY KEY (`distance`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `verticaldistance`
--
ALTER TABLE `verticaldistance`
  ADD PRIMARY KEY (`dislocation`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
