CREATE TABLE `game` (
  `game_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `game_teamA` varchar(255) NOT NULL,
  `game_teamB` varchar(255) NOT NULL,
  `game_teamC` varchar(255) NOT NULL,
  `game_teamD` varchar(255) NOT NULL,
  `game_teamE` varchar(255) NOT NULL,
  `game_teamG` varchar(255) NOT NULL,
  `game_teamH` varchar(255) NOT NULL,
  `game_teamI` varchar(255) NOT NULL,
  `game_teamJ` varchar(255) NOT NULL,
  `game_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game`
  ADD KEY `game_start` (`game_start`) USING BTREE;

CREATE TABLE `gamescore` (
  `game_id` int(11) NOT NULL,
  `score_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score_A` int(8) NOT NULL DEFAULT '0',
  `score_B` int(8) NOT NULL DEFAULT '0',
  `score_C` int(8) NOT NULL DEFAULT '0',
  `score_D` int(8) NOT NULL DEFAULT '0',
  `score_E` int(8) NOT NULL DEFAULT '0',
  `score_G` int(8) NOT NULL DEFAULT '0',
  `score_H` int(8) NOT NULL DEFAULT '0',
  `score_I` int(8) NOT NULL DEFAULT '0',
  `score_J` int(8) NOT NULL DEFAULT '0',
  `score_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `gamescore`
  ADD PRIMARY KEY (`game_id`,`score_time`);