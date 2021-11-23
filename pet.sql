-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-11-23 03:36:29
-- 伺服器版本： 10.4.20-MariaDB
-- PHP 版本： 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `pet`
--

-- --------------------------------------------------------

--
-- 資料表結構 `adminlist`
--

CREATE TABLE `adminlist` (
  `pk` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adminlist`
--

INSERT INTO `adminlist` (`pk`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$nfd98I71TrKyF7AeWsyPUebCp/CyUHhpEjHcZupwhZTY/YeczjIBa');

-- --------------------------------------------------------

--
-- 資料表結構 `adoptlist`
--

CREATE TABLE `adoptlist` (
  `pk` int(11) NOT NULL COMMENT '領養清單pk',
  `fosterlist_fk` int(11) NOT NULL COMMENT '送養清單pk',
  `member_fk` int(11) NOT NULL COMMENT '會員pk',
  `application_date` date NOT NULL COMMENT '申請領養日期',
  `phone` varchar(20) NOT NULL COMMENT '領養人手機',
  `reason` varchar(500) NOT NULL COMMENT '領養原因',
  `remark` varchar(1000) DEFAULT NULL COMMENT '備註',
  `status` char(3) NOT NULL COMMENT '狀態：已通過 未通過 審核中'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adoptlist`
--

INSERT INTO `adoptlist` (`pk`, `fosterlist_fk`, `member_fk`, `application_date`, `phone`, `reason`, `remark`, `status`) VALUES
(1, 3, 2, '2021-03-02', '0923-333-333', '單純想養寵物', NULL, '已通過'),
(2, 4, 2, '2021-03-03', '0923-333-333', '單純想養寵物', NULL, '已通過'),
(3, 4, 3, '2021-03-08', '0933-333-333', '單純想養寵物', NULL, '已通過'),
(5, 3, 3, '2021-03-10', '0966-666-666', '單純想養寵物', NULL, '已通過'),
(8, 8, 1, '2021-03-31', '0923-333-333', '單純想養寵物', NULL, '已通過'),
(26, 5, 2, '2021-11-12', '0988-888-888', '單純想養寵物', NULL, '審核中'),
(27, 7, 1, '2021-11-13', '0911223366', '想要多一個人陪伴', NULL, '已通過');

-- --------------------------------------------------------

--
-- 資料表結構 `fosterlist`
--

CREATE TABLE `fosterlist` (
  `pk` int(11) NOT NULL COMMENT '送養清單pk',
  `member_fk` int(11) NOT NULL COMMENT '會員pk',
  `publish_date` date NOT NULL COMMENT '刊登日期',
  `pet_type` varchar(50) NOT NULL COMMENT '動物種類：貓 狗 其他',
  `pet_name` varchar(50) NOT NULL COMMENT '動物暱稱',
  `pet_variety` varchar(50) DEFAULT NULL COMMENT '動物品種',
  `pet_age` varchar(50) DEFAULT NULL COMMENT '動物年紀',
  `pet_gender` char(2) DEFAULT NULL COMMENT '動物性別：公、母、無',
  `pet_bodytype` char(3) DEFAULT NULL COMMENT '動物體型：小型 中型 大型',
  `pet_ligation` char(2) DEFAULT NULL COMMENT '是否結紮：是 否',
  `pet_city` varchar(50) NOT NULL COMMENT '動物所在地區',
  `pic` varchar(300) NOT NULL COMMENT '動物照片',
  `introduction` varchar(500) DEFAULT NULL COMMENT '其他說明',
  `status` char(8) NOT NULL COMMENT '刊登狀態： 送養中 已送養 審核中(刊登) 審核中(更新) 審核中(送出)',
  `adopt_date` date DEFAULT NULL COMMENT '送養日期',
  `adopt_name` varchar(50) DEFAULT NULL COMMENT '領養者暱稱',
  `adopt_phone` varchar(50) DEFAULT NULL COMMENT '領養者手機',
  `adopt_city` varchar(50) DEFAULT NULL COMMENT '領養者所在地',
  `remark` varchar(1000) DEFAULT NULL COMMENT '備註'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `fosterlist`
--

INSERT INTO `fosterlist` (`pk`, `member_fk`, `publish_date`, `pet_type`, `pet_name`, `pet_variety`, `pet_age`, `pet_gender`, `pet_bodytype`, `pet_ligation`, `pet_city`, `pic`, `introduction`, `status`, `adopt_date`, `adopt_name`, `adopt_phone`, `adopt_city`, `remark`) VALUES
(1, 1, '2021-01-25', '貓', '薯泥', '混種', '1～3歲', '母', NULL, '是', '台中市', '[\"1636269688.1-1.jpg\",\"1636269688.1-2.jpg\",\"1636269688.1-3.jpg\"]', '非常皮', '已送養', '2021-10-05', 'B先生', '0911-111-111', '台北市', NULL),
(2, 1, '2021-02-03', '貓', '豆花', '折耳貓', '1～3歲', '母', NULL, '是', '台中市', '[\"1636270245.2-1.jpg\",\"1636270245.2-2.jpg\",\"1636270245.2-3.jpg\"]', '無', '已送養', '2021-11-12', '小智', '0911223388', '彰化縣', NULL),
(3, 1, '2021-02-10', '貓', '地瓜泥', '混種', '1歲以下', '母', NULL, '是', '台中市', '[\"1636270629.3-1.jpg\",\"1636270629.3-2.jpg\",\"1636270629.3-3.jpg\"]', '會欺負其他貓，建議單貓家庭領養', '已送養', '2021-09-07', '林汶靚', '0974058610', '台中市', NULL),
(4, 1, '2021-03-01', '貓', 'Ella', '混種', '1歲以下', '母', NULL, '是', '台中市', '[\"1636709065.4-1.jpg\",\"1636709065.4-2.jpg\",\"1636687058.4-3.jpg\"]', '無', '送養中', NULL, NULL, NULL, NULL, NULL),
(5, 1, '2021-03-29', '狗', '賴打', '吉娃娃', '1～3歲', '公', NULL, '是', '台中市', '[\"1636798816.images (1).jfif\",\"1636270902.5-2.jpg\",\"1636270902.5-3.jpg\"]', '無', '審核中(更新)', NULL, NULL, NULL, NULL, NULL),
(6, 1, '2021-04-01', '其他', '奇奇', '陸龜', '1歲以下', '公', NULL, '否', '台中市', '[\"1636271127.6-1.jpg\",\"1636271127.6-2.jpg\",\"1636271127.6-3.jpg\"]', '無', '已送養', '2021-11-01', 'B先生', '0911-111-111', '新竹市', NULL),
(7, 5, '2021-05-07', '狗', '小拉', '拉不拉多', '1歲以下', '公', NULL, '否', '南投縣', '[\"1636704834.7-1.jpg\",\"1636704834.7-1.jpg\",\"1636704834.7-1.jpg\"]', '很聰明', '送養中', NULL, NULL, NULL, NULL, NULL),
(8, 5, '2021-05-11', '狗', '小黃', '混種', '3～6歲', '公', NULL, '是', '南投縣', '[\"1636272895.8-1.jpg\",\"1636272895.8-2.jpg\",\"1636272895.8-3.jpg\"]', '很乖，會自己大小便，一天需外出散步一次', '送養中', NULL, NULL, NULL, NULL, NULL),
(9, 5, '2021-11-12', '其他', '小綠', NULL, '1歲以下', '公', NULL, '否', '南投縣', '[\"1636705999.9.jpg\",\"1636705999.9.jpg\",\"1636705999.9.jpg\"]', '喜歡亂啄東西', '送養中', NULL, NULL, NULL, NULL, NULL),
(10, 5, '2021-11-12', '狗', '小黑', '混種', '1歲以下', '公', NULL, '否', '南投縣', '[\"1636706106.10.jpg\",\"1636706106.10.jpg\",\"1636706106.10.jpg\"]', '怕生', '送養中', NULL, NULL, NULL, NULL, NULL),
(11, 5, '2021-11-12', '狗', '翁來', '混種', '1歲以下', '公', NULL, '否', '南投縣', '[\"1636706245.ghROR0Th.jpg\",\"1636706245.ghROR0Th.jpg\",\"1636706245.ghROR0Th.jpg\"]', '超皮，還不會自己大小便，需耐心教導', '送養中', NULL, NULL, NULL, NULL, NULL),
(12, 5, '2021-11-12', '狗', '乖乖', '混種', '1～3歲', '公', NULL, '是', '南投縣', '[\"1636706316.20210714002630.jpg\",\"1636706316.20210714002630.jpg\",\"1636706316.20210714002630.jpg\"]', '很乖、黏人，不關籠', '送養中', NULL, NULL, NULL, NULL, NULL),
(13, 4, '2021-11-12', '貓', '斑斑', '混種', '1～3歲', '公', NULL, '是', '台南市', '[\"1636706493.0827-2.jpg\",\"1636706493.0827-2.jpg\",\"1636706493.0827-2.jpg\"]', '怕生', '送養中', NULL, NULL, NULL, NULL, NULL),
(14, 4, '2021-11-12', '貓', '胖橘', '混種', '3～6歲', '公', NULL, '是', '台南市', '[\"1636706604.1586276572-3378579139_n.jpg\",\"1636706604.1586276572-3378579139_n.jpg\",\"1636706604.1586276572-3378579139_n.jpg\"]', '不親人', '送養中', NULL, NULL, NULL, NULL, NULL),
(15, 4, '2021-11-12', '貓', '阿米', '混種', '1歲以下', '母', NULL, '否', '新北市', '[\"1636706936.ee9Ues4h.jpg\",\"1636706936.ee9Ues4h.jpg\",\"1636706936.ee9Ues4h.jpg\"]', '無', '送養中', NULL, NULL, NULL, NULL, NULL),
(16, 4, '2021-11-12', '貓', '阿胖', '混種', '6～10歲', '母', NULL, '是', '花蓮縣', '[\"1636706999.67acab9482445347277028dbf255bd72.jpg\",\"1636706999.67acab9482445347277028dbf255bd72.jpg\",\"1636706999.67acab9482445347277028dbf255bd72.jpg\"]', '很健康', '送養中', NULL, NULL, NULL, NULL, NULL),
(17, 4, '2021-11-12', '貓', '小波', '波斯', '1歲以下', '母', NULL, '否', '嘉義市', '[\"1636707119.201911281436571.jpg\",\"1636707119.201911281436571.jpg\",\"1636707119.201911281436571.jpg\"]', '無', '送養中', NULL, NULL, NULL, NULL, NULL),
(18, 4, '2021-11-12', '貓', 'blue', '英國藍貓', '1～3歲', '母', NULL, '否', '高雄市', '[\"1636707206.0f1539ddd28d4e54e792f7.jpg\",\"1636707206.0f1539ddd28d4e54e792f7.jpg\",\"1636707206.0f1539ddd28d4e54e792f7.jpg\"]', '無', '送養中', NULL, NULL, NULL, NULL, NULL),
(19, 5, '2021-11-12', '狗', '滷蛋', '米格魯', '6～10歲', '公', NULL, '是', '基隆市', '[\"1636707320.5RCx7aVh.jpg\",\"1636707320.5RCx7aVh.jpg\",\"1636707320.5RCx7aVh.jpg\"]', '年紀較大', '送養中', NULL, NULL, NULL, NULL, NULL),
(20, 5, '2021-11-12', '狗', '柴柴', '柴犬', '3～6歲', '母', NULL, '是', '新竹市', '[\"1636707415.200715-23761-01-2iBbV.jpg\",\"1636707415.200715-23761-01-2iBbV.jpg\",\"1636707415.200715-23761-01-2iBbV.jpg\"]', '無', '送養中', NULL, NULL, NULL, NULL, NULL),
(22, 1, '2021-11-12', '狗', '小美', '博美', '3～6歲', '公', '小型', '是', '雲林縣', '[\"1636708836.191226-21914-01-feK7W.jpg\",\"1636708836.191226-21914-01-feK7W.jpg\",\"1636708836.191226-21914-01-feK7W.jpg\"]', '黏人', '審核中(刊登)', NULL, NULL, NULL, NULL, NULL),
(23, 1, '2021-11-13', '狗', '黑糖', '柴犬', '1～3歲', '母', NULL, '否', '嘉義市', '[\"1636799564.images (1).jfif\",\"1636799564.images.jfif\",\"1636799564.xLQidugUNhehDeBBPueLjp8qKSIwTK4qRRKOf0USjn8.jfif\"]', '每天都要出去玩，不然會生氣氣不理人', '送養中', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `pk` int(11) NOT NULL COMMENT '會員pk',
  `email` varchar(200) NOT NULL COMMENT '登入email帳號',
  `pwd` varchar(100) NOT NULL COMMENT '登入密碼',
  `name` varchar(50) NOT NULL COMMENT '會員暱稱',
  `gender` char(2) NOT NULL COMMENT '性別：M.男 F.女',
  `birth` date NOT NULL COMMENT '會員生日',
  `job` varchar(200) NOT NULL COMMENT '會員職業',
  `city` varchar(50) NOT NULL COMMENT '會員所在地',
  `remark` varchar(1000) DEFAULT NULL COMMENT '備註',
  `status` char(2) NOT NULL DEFAULT '啟用' COMMENT '狀態：啟用 停用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`pk`, `email`, `pwd`, `name`, `gender`, `birth`, `job`, `city`, `remark`, `status`) VALUES
(1, 'rabbit2331@gmail.com', '$2y$10$ouxa2DRr.eTFk12JOU2.QuHwz6XHz1FYt3MZ2M.buyz1fENwMzc86', '皮卡丘', 'F', '1995-11-02', '上班族', '屏東縣', NULL, '啟用'),
(2, 'shopkai186@gmail.com', '$2a$08$WR0P.adlXrl/a3v3FSUskeE0hgvzDXAQn9rmMhTiDAaxo/Fm7Msru', 'kai', 'M', '1999-09-02', '學生', '台中市', NULL, '啟用'),
(3, 'yingkai186@gmail.com', '$2y$10$FrKHtjPwYDFRpUgo8g4UxOJazMDkYH6OY.Q6ijesmV3i4vCRlmN/q', 'Abby', 'F', '1999-02-11', '學生', '高雄市', NULL, '啟用'),
(4, 'shopkai18601@gmail.com', '$2y$10$lvAelbIfHHVLjoD4H6fl9ul3bbu8fWTNoqyyJPq70abKo3FhTXKe.', 'Alex', 'M', '1989-09-05', '上班族', '嘉義市', NULL, '停用'),
(5, 'shopkai18602@gmail.com', '$2y$10$Vp65mhHoiUa0qjQcFRi1luU8Y2Z62eVzz/4umKs6g8DqRoSfy2TCe', 'David', 'M', '1984-07-18', '上班族', '桃園市', NULL, '啟用'),
(9, 'shopkai18603@gmail.com', '$2y$10$3ynJQx1jpmi6Afv01gNwVuTQrN4Ap8rDGqyzdxZ9rlouRWBu.K4FS', '大木博士', 'M', '1999-02-01', '學生', '新竹市', NULL, '啟用');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `adminlist`
--
ALTER TABLE `adminlist`
  ADD PRIMARY KEY (`pk`);

--
-- 資料表索引 `adoptlist`
--
ALTER TABLE `adoptlist`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fosterlist_fk` (`fosterlist_fk`),
  ADD KEY `member_fk` (`member_fk`);

--
-- 資料表索引 `fosterlist`
--
ALTER TABLE `fosterlist`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `member_fk` (`member_fk`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`pk`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adminlist`
--
ALTER TABLE `adminlist`
  MODIFY `pk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adoptlist`
--
ALTER TABLE `adoptlist`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT COMMENT '領養清單pk', AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `fosterlist`
--
ALTER TABLE `fosterlist`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT COMMENT '送養清單pk', AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT COMMENT '會員pk', AUTO_INCREMENT=10;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `adoptlist`
--
ALTER TABLE `adoptlist`
  ADD CONSTRAINT `adoptlist_ibfk_1` FOREIGN KEY (`fosterlist_fk`) REFERENCES `fosterlist` (`pk`),
  ADD CONSTRAINT `adoptlist_ibfk_2` FOREIGN KEY (`member_fk`) REFERENCES `member` (`pk`);

--
-- 資料表的限制式 `fosterlist`
--
ALTER TABLE `fosterlist`
  ADD CONSTRAINT `fosterlist_ibfk_1` FOREIGN KEY (`member_fk`) REFERENCES `member` (`pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
