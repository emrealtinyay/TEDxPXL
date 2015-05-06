-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 06 mei 2015 om 11:47
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `tedxpxl`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `date` date NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `calendar`
--

INSERT INTO `calendar` (`date`, `data`) VALUES
('2015-04-01', 'ol'),
('2015-04-07', 'ali'),
('2015-04-08', 'eren'),
('2015-04-10', 'sdfklj'),
('2015-04-15', 'emre gottt'),
('2015-04-17', ''),
('2015-06-12', 'dflsd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('dfebb7830482a2e34f8f2c2b27566d5f', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430905212, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";b:0;s:7:"user_id";b:0;s:5:"admin";b:0;s:5:"group";b:0;s:10:"privileges";b:0;s:22:"logged_in_via_password";b:0;s:19:"login_session_token";b:0;}}');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact_table`
--

CREATE TABLE IF NOT EXISTS `contact_table` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Gegevens worden geëxporteerd voor tabel `contact_table`
--

INSERT INTO `contact_table` (`name`, `email`, `phone`, `comments`, `id`) VALUES
('Koen Gerits', 'koen@koengerits.be', '0864532', 'Dit is een contact                                                                                    ', 52);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `naam` varchar(255) NOT NULL,
  `locatie` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `tijd` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `maand` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`naam`, `locatie`, `adres`, `tijd`, `datum`, `maand`, `info`, `foto`, `id`) VALUES
('zuipTD', 'Diepenbeek', 'wolfstraat 8', '21:00', '08/01/2014', 'March', 'Ik drink u toe!! kom bewijzen dat jij iedereen toe drinkt!', 'zuiptd.jpg', 6),
('valentineTD', 'Hasselt', 'roggestraat 5', '22:00', '14/02/2014', 'February', 'kom zeker een kijkje nemen bij onze nieuwe TD!!', 'valentineTD.jpg', 5),
('test', 'test', 'test', '20:00', '15/02/2014', 'February', 'lololol', 'test.png', 3),
('lenteTD', 'Hasselt', 'Kerkstraat 78', '21:30', '20/04/2014', 'April', 'Het is lente ! kom het zeker vieren met ons!', '', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `categorie` varchar(255) NOT NULL,
  `onderwerp` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bericht` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `username` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `geboortedatum` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Gegevens worden geëxporteerd voor tabel `userdata`
--

INSERT INTO `userdata` (`username`, `voornaam`, `naam`, `woonplaats`, `geboortedatum`, `foto`, `id`) VALUES
('hophop', 'hop', 'hophop', 'Hopland', '12/12/1992', 'test2.png', 12),
('loplop', 'jajaj', 'test', 'jaa', '', '', 15),
('admin', 'Jan', 'Smeets', '', '', '', 16),
('BestRaiderEU', 'Raider', 'Best', 'EU', '02/06/2006', 'Raider.png', 18),
('alieren', '', '', '', '', '', 21);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
`uacc_id` int(11) unsigned NOT NULL,
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
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Gegevens worden geëxporteerd voor tabel `user_accounts`
--

INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`) VALUES
(12, 1, 'hophop@hophop.com', 'hophop', '$2a$08$lYrpQI7SUFcDIo9iX2.5hOius1QDxatOIALVlf94XyIW7cwjUZwzG', '84.194.52.21', 'QqFzcw7FpH', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 1, '84.194.52.21', '0000-00-00 00:00:00', '2014-02-14 11:35:47', '2014-02-06 08:19:18'),
(15, 1, 'loplop@loplop.com', 'loplop', '$2a$08$5tqxk0./tOooAE8DJ0/ig.zCHeUTUzFVYHrCz93g96WJAePHx9TZu', '193.190.154.173', 'rdy3mqwMS8', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-02-12 03:12:07', '2014-02-11 10:02:06'),
(16, 2, 'admin@admin.com', 'admin', '$2a$08$KYPaj1BGvnT2E4ixVm75j.w3Lq0wdIetMrCqlqqRKO4ZjLCElDJ1S', '84.194.52.21', 'c8PnZ6sn3n', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-02-14 13:24:15', '2014-02-12 03:42:24'),
(18, 1, 'bestraidereu@hotmail.com', 'BestRaiderEU', '$2a$08$wAb6hob43MWq.3dQV7.v.u0tFsE9p1KqL64q4ZgZfwvWbaL4/yXcC', '84.195.143.190', 'DVgQwwGb4n', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-02-14 11:25:43', '2014-02-13 09:38:30'),
(21, 1, 'ali@eren.be', 'alieren', '$2a$08$ftL8QK8XteLTh2mx2zHFoeefCW6Ua5qbmrj7DuOr3LNwKdlgHCm5e', '::1', 'W3MvYBJTHJ', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2015-05-05 10:15:27', '2015-05-05 10:15:20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
`ugrp_id` smallint(5) NOT NULL,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `user_groups`
--

INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`) VALUES
(1, 'gebruiker', 'gebruiker', 0),
(2, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_login_sessions`
--

CREATE TABLE IF NOT EXISTS `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
`upriv_id` smallint(5) NOT NULL,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_privilege_groups`
--

CREATE TABLE IF NOT EXISTS `user_privilege_groups` (
`upriv_groups_id` smallint(5) unsigned NOT NULL,
  `upriv_groups_ugrp_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_privilege_users`
--

CREATE TABLE IF NOT EXISTS `user_privilege_users` (
`upriv_users_id` smallint(5) NOT NULL,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `calendar`
--
ALTER TABLE `calendar`
 ADD PRIMARY KEY (`date`);

--
-- Indexen voor tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity` (`last_activity`);

--
-- Indexen voor tabel `contact_table`
--
ALTER TABLE `contact_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `userdata`
--
ALTER TABLE `userdata`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user_accounts`
--
ALTER TABLE `user_accounts`
 ADD PRIMARY KEY (`uacc_id`), ADD UNIQUE KEY `uacc_id` (`uacc_id`), ADD KEY `uacc_group_fk` (`uacc_group_fk`), ADD KEY `uacc_email` (`uacc_email`), ADD KEY `uacc_username` (`uacc_username`), ADD KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`);

--
-- Indexen voor tabel `user_groups`
--
ALTER TABLE `user_groups`
 ADD PRIMARY KEY (`ugrp_id`), ADD UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE;

--
-- Indexen voor tabel `user_login_sessions`
--
ALTER TABLE `user_login_sessions`
 ADD PRIMARY KEY (`usess_token`), ADD UNIQUE KEY `usess_token` (`usess_token`);

--
-- Indexen voor tabel `user_privileges`
--
ALTER TABLE `user_privileges`
 ADD PRIMARY KEY (`upriv_id`), ADD UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE;

--
-- Indexen voor tabel `user_privilege_groups`
--
ALTER TABLE `user_privilege_groups`
 ADD PRIMARY KEY (`upriv_groups_id`), ADD UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE, ADD KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`), ADD KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`);

--
-- Indexen voor tabel `user_privilege_users`
--
ALTER TABLE `user_privilege_users`
 ADD PRIMARY KEY (`upriv_users_id`), ADD UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE, ADD KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`), ADD KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact_table`
--
ALTER TABLE `contact_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `userdata`
--
ALTER TABLE `userdata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT voor een tabel `user_accounts`
--
ALTER TABLE `user_accounts`
MODIFY `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT voor een tabel `user_groups`
--
ALTER TABLE `user_groups`
MODIFY `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `user_privileges`
--
ALTER TABLE `user_privileges`
MODIFY `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `user_privilege_groups`
--
ALTER TABLE `user_privilege_groups`
MODIFY `upriv_groups_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `user_privilege_users`
--
ALTER TABLE `user_privilege_users`
MODIFY `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
