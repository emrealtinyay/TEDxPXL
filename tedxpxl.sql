-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg43.eigbox.net
-- Generatie Tijd: 14 Feb 2014 om 13:42
-- Server versie: 5.5.32
-- PHP Versie: 4.4.9
-- 
-- Database: `hexion`
-- 

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `ci_sessions`
-- 

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Gegevens worden uitgevoerd voor tabel `ci_sessions`
-- 

INSERT INTO `ci_sessions` VALUES ('4e2c0c9e9ab68facbf33a89d23672c29', '84.195.143.190', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 1392395430, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";b:0;s:7:"user_id";b:0;s:5:"admin";b:0;s:5:"group";b:0;s:10:"privileges";b:0;s:22:"logged_in_via_password";b:0;s:19:"login_session_token";b:0;}}');
INSERT INTO `ci_sessions` VALUES ('6e190a6ef3b46e470b21825fa634afab', '84.194.52.21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0', 1392402946, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:15:"admin@admin.com";s:7:"user_id";s:2:"16";s:5:"admin";b:0;s:5:"group";a:1:{i:2;s:5:"admin";}s:10:"privileges";a:0:{}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"cb29eb90abb454a5900fad05c0a50ae925cb7106";}}');

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `contact_table`
-- 

CREATE TABLE `contact_table` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `contact_table`
-- 

INSERT INTO `contact_table` VALUES ('Koen Gerits', 'koen@koengerits.be', '0864532', 'Dit is een contact                                                                                    ', 52);

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `events`
-- 

CREATE TABLE `events` (
  `naam` varchar(255) NOT NULL,
  `locatie` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `tijd` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `maand` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `events`
-- 

INSERT INTO `events` VALUES ('zuipTD', 'Diepenbeek', 'wolfstraat 8', '21:00', '08/01/2014', 'March', 'Ik drink u toe!! kom bewijzen dat jij iedereen toe drinkt!', 'zuiptd.jpg', 6);
INSERT INTO `events` VALUES ('valentineTD', 'Hasselt', 'roggestraat 5', '22:00', '14/02/2014', 'February', 'kom zeker een kijkje nemen bij onze nieuwe TD!!', 'valentineTD.jpg', 5);
INSERT INTO `events` VALUES ('test', 'test', 'test', '20:00', '15/02/2014', 'February', 'lololol', 'test.png', 3);
INSERT INTO `events` VALUES ('lenteTD', 'Hasselt', 'Kerkstraat 78', '21:30', '20/04/2014', 'April', 'Het is lente ! kom het zeker vieren met ons!', '', 7);

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `forum`
-- 

CREATE TABLE `forum` (
  `categorie` varchar(255) NOT NULL,
  `onderwerp` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bericht` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Gegevens worden uitgevoerd voor tabel `forum`
-- 


-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user_accounts`
-- 

CREATE TABLE `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_group_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `user_accounts`
-- 

INSERT INTO `user_accounts` VALUES (12, 1, 'hophop@hophop.com', 'hophop', '$2a$08$lYrpQI7SUFcDIo9iX2.5hOius1QDxatOIALVlf94XyIW7cwjUZwzG', '84.194.52.21', 'QqFzcw7FpH', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 1, '84.194.52.21', '0000-00-00 00:00:00', '2014-02-14 11:35:47', '2014-02-06 08:19:18');
INSERT INTO `user_accounts` VALUES (15, 1, 'loplop@loplop.com', 'loplop', '$2a$08$5tqxk0./tOooAE8DJ0/ig.zCHeUTUzFVYHrCz93g96WJAePHx9TZu', '193.190.154.173', 'rdy3mqwMS8', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-02-12 03:12:07', '2014-02-11 10:02:06');
INSERT INTO `user_accounts` VALUES (16, 2, 'admin@admin.com', 'admin', '$2a$08$KYPaj1BGvnT2E4ixVm75j.w3Lq0wdIetMrCqlqqRKO4ZjLCElDJ1S', '84.194.52.21', 'c8PnZ6sn3n', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-02-14 13:24:15', '2014-02-12 03:42:24');
INSERT INTO `user_accounts` VALUES (18, 1, 'bestraidereu@hotmail.com', 'BestRaiderEU', '$2a$08$wAb6hob43MWq.3dQV7.v.u0tFsE9p1KqL64q4ZgZfwvWbaL4/yXcC', '84.195.143.190', 'DVgQwwGb4n', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-02-14 11:25:43', '2014-02-13 09:38:30');

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user_groups`
-- 

CREATE TABLE `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `user_groups`
-- 

INSERT INTO `user_groups` VALUES (1, 'gebruiker', 'gebruiker', 0);
INSERT INTO `user_groups` VALUES (2, 'admin', 'admin', 0);

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user_login_sessions`
-- 

CREATE TABLE `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Gegevens worden uitgevoerd voor tabel `user_login_sessions`
-- 

INSERT INTO `user_login_sessions` VALUES (12, '', '03b62b3fee2813046c24d08b85dd1cd4780dcbf4', '2014-02-06 13:39:29');
INSERT INTO `user_login_sessions` VALUES (16, '', '04d5b432fb0e97d52be646586533781498e6d14c', '2014-02-12 12:33:10');
INSERT INTO `user_login_sessions` VALUES (12, '', '10c147eab432b9bb924765ac100a8855cfb8d6db', '2014-02-08 10:33:57');
INSERT INTO `user_login_sessions` VALUES (12, '', '144ba5175529c11be69f1ad0b71a2ee53429f0cc', '2014-02-06 09:24:15');
INSERT INTO `user_login_sessions` VALUES (12, '', '17d61ea32906a1e7216add4a4be93c12d10e6e08', '2014-02-08 10:26:49');
INSERT INTO `user_login_sessions` VALUES (12, '', '1867ca1a251d4d58a8c6b0973f8bea2d306534cd', '2014-02-09 11:39:30');
INSERT INTO `user_login_sessions` VALUES (12, '', '1898b5f5dc151063c3e02208e850e2b74184cb1e', '2014-02-06 08:37:37');
INSERT INTO `user_login_sessions` VALUES (12, '', '1969d907bab23b400101857b7a98ab14603d5b48', '2014-02-06 09:11:19');
INSERT INTO `user_login_sessions` VALUES (12, '', '1d71d35c098b7bfa1721e0141035e52c77d672d2', '2014-02-12 18:39:25');
INSERT INTO `user_login_sessions` VALUES (12, '', '1e88a31aec632a2cea8acf422eefd88510b49a73', '2014-02-08 10:19:30');
INSERT INTO `user_login_sessions` VALUES (12, '', '1f5675998a351317540c9ea5219d9225e058d605', '2014-02-06 10:30:00');
INSERT INTO `user_login_sessions` VALUES (12, '', '1f965ea7c0c24bc8541f2ba4352c41fa0dfdcddf', '2014-02-06 10:16:36');
INSERT INTO `user_login_sessions` VALUES (12, '', '210bccb78445cd5b1c8c13db1cb74fa7a62d4e1b', '2014-02-09 12:00:19');
INSERT INTO `user_login_sessions` VALUES (12, '', '2111f0c65575ddedf06e2a8aad9e6214494be7ff', '2014-02-06 08:50:08');
INSERT INTO `user_login_sessions` VALUES (12, '', '21f39637764a8ed0d23efb4a2562fdc7ce821fcf', '2014-02-14 10:37:19');
INSERT INTO `user_login_sessions` VALUES (12, '', '27ff06f55495f608c2cf0cade6058cbfb9dc25cb', '2014-02-06 13:39:57');
INSERT INTO `user_login_sessions` VALUES (12, '', '288e5466625c7042df8750fa3e56529d203ef44a', '2014-02-06 08:49:41');
INSERT INTO `user_login_sessions` VALUES (12, '', '327f8821e3bed603b84fc7db41ecbc9da78a80f5', '2014-02-06 14:01:50');
INSERT INTO `user_login_sessions` VALUES (12, '', '3c14e2a9be2f37e1d789249ddbe97ecb8cd1a9a4', '2014-02-06 08:55:20');
INSERT INTO `user_login_sessions` VALUES (12, '', '446621c64e45ccd9a6573e542e6e5940b90249f8', '2014-02-11 12:35:55');
INSERT INTO `user_login_sessions` VALUES (16, '', '482c64ff508888d991d187bbe0baf3c98fbf4f4a', '2014-02-12 12:27:26');
INSERT INTO `user_login_sessions` VALUES (12, '', '4fa5326344e68613540f1539e55371df668683a7', '2014-02-14 06:44:25');
INSERT INTO `user_login_sessions` VALUES (12, '', '520c983c8ef7d5e3189fa5078cb633e0ac291aaf', '2014-02-06 13:46:21');
INSERT INTO `user_login_sessions` VALUES (12, '', '53799f83a2a81262ecc6272f8f4c68d0d812f521', '2014-02-06 14:01:58');
INSERT INTO `user_login_sessions` VALUES (12, '', '53cbf6f77b5ad6036e8328c20c720e5f70f89529', '2014-02-06 13:38:24');
INSERT INTO `user_login_sessions` VALUES (12, '', '58720230bba80906221b5364547e3e619989ef39', '2014-02-06 13:45:05');
INSERT INTO `user_login_sessions` VALUES (12, '', '58f4bfdf8981f305ab0c09a4a90dd98a94bfe2ee', '2014-02-06 08:53:58');
INSERT INTO `user_login_sessions` VALUES (12, '', '599af9b548991f842e4a58cd8b17d3907786edc3', '2014-02-06 08:57:25');
INSERT INTO `user_login_sessions` VALUES (16, '', '5a6b061759f8839f0a22d434852fbdebe38d0acd', '2014-02-13 13:24:47');
INSERT INTO `user_login_sessions` VALUES (12, '', '5d92aec497edf89c18f208dfc12169f81e7d2991', '2014-02-06 13:37:14');
INSERT INTO `user_login_sessions` VALUES (12, '', '625cd28a0d04439689843b7fac14c48ece8eda01', '2014-02-06 12:15:49');
INSERT INTO `user_login_sessions` VALUES (12, '', '65db35051fd74b4f2ab650abf89cfd517c65b8c9', '2014-02-06 13:51:31');
INSERT INTO `user_login_sessions` VALUES (12, '', '683b6bfbee7c4f7be02b28a7a6eb6398a2380f19', '2014-02-06 12:30:56');
INSERT INTO `user_login_sessions` VALUES (12, '', '685759e930c76df41f9eda5c66b44df4b2785686', '2014-02-13 11:23:04');
INSERT INTO `user_login_sessions` VALUES (12, '', '68eccf3a35a1c8518487fe77274995ee60bec46d', '2014-02-06 13:43:40');
INSERT INTO `user_login_sessions` VALUES (12, '', '6bacc66c12f1d60d8e20f23afd0d60c380bbad02', '2014-02-06 10:16:59');
INSERT INTO `user_login_sessions` VALUES (12, '', '7102eafbff35b16182d197f67cb290c689e59cc6', '2014-02-06 13:51:25');
INSERT INTO `user_login_sessions` VALUES (12, '', '7653f9fd8ab60736c2177b947ac7b077dd8af37f', '2014-02-06 14:01:59');
INSERT INTO `user_login_sessions` VALUES (12, '', '79a7923851846f8602ffa82fe342e8778ea721f4', '2014-02-08 10:20:39');
INSERT INTO `user_login_sessions` VALUES (12, '', '7ae5105924d918c9c839a06ef5378665f8266878', '2014-02-06 13:43:08');
INSERT INTO `user_login_sessions` VALUES (12, '', '7e7cc93641e9c6b3cb7cc7add91e5225a39547ce', '2014-02-08 10:38:38');
INSERT INTO `user_login_sessions` VALUES (12, '', '814e45966d69334a2b4d131d7c5876185e10020e', '2014-02-10 07:13:16');
INSERT INTO `user_login_sessions` VALUES (12, '', '82833d9f99caf05d125c5b10ea6f0dfcffeb1b6e', '2014-02-08 15:21:21');
INSERT INTO `user_login_sessions` VALUES (12, '', '86c42656c2f6395f65ee8a04cce17dc08b79ce70', '2014-02-06 13:35:53');
INSERT INTO `user_login_sessions` VALUES (12, '', '8d2c034a5e0d65ce9e53df425987eb3e4c7381bf', '2014-02-06 13:50:21');
INSERT INTO `user_login_sessions` VALUES (12, '', '96627de1f6f17b6a32a9f10b3c8c98a4f4d75a7e', '2014-02-06 13:51:45');
INSERT INTO `user_login_sessions` VALUES (16, '', '9c0ecd28fe03bbcbd2a00eed88e2f7fbf703c921', '2014-02-12 05:08:50');
INSERT INTO `user_login_sessions` VALUES (12, '', '9c2ad991b112a5f246c97554cd8e2fb5c2384923', '2014-02-06 13:39:36');
INSERT INTO `user_login_sessions` VALUES (12, '', '9e22fd9f80f85dcc3021cacb52a2de40605492ef', '2014-02-06 13:51:01');
INSERT INTO `user_login_sessions` VALUES (16, '', 'cb29eb90abb454a5900fad05c0a50ae925cb7106', '2014-02-14 13:38:39');

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user_privilege_groups`
-- 

CREATE TABLE `user_privilege_groups` (
  `upriv_groups_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `upriv_groups_ugrp_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_groups_id`),
  UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `user_privilege_groups`
-- 


-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user_privilege_users`
-- 

CREATE TABLE `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `user_privilege_users`
-- 


-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user_privileges`
-- 

CREATE TABLE `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `user_privileges`
-- 


-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `userdata`
-- 

CREATE TABLE `userdata` (
  `username` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `geboortedatum` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `userdata`
-- 

INSERT INTO `userdata` VALUES ('hophop', 'hop', 'hophop', 'Hopland', '12/12/1992', 'test2.png', 12);
INSERT INTO `userdata` VALUES ('loplop', 'jajaj', 'test', 'jaa', '', '', 15);
INSERT INTO `userdata` VALUES ('admin', 'Jan', 'Smeets', '', '', '', 16);
INSERT INTO `userdata` VALUES ('BestRaiderEU', 'Raider', 'Best', 'EU', '02/06/2006', 'Raider.png', 18);
