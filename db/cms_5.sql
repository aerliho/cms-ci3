-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table cms.access_log
CREATE TABLE IF NOT EXISTS `access_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activity` longtext NOT NULL,
  `ip` varchar(64) NOT NULL DEFAULT '',
  `detail` longtext,
  PRIMARY KEY (`id`),
  KEY `FK_access_log_user` (`id_user`),
  CONSTRAINT `FK_access_log_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.access_log: ~2 rows (approximately)
DELETE FROM `access_log`;
/*!40000 ALTER TABLE `access_log` DISABLE KEYS */;
INSERT INTO `access_log` (`id`, `id_user`, `log_date`, `activity`, `ip`, `detail`) VALUES
	(1, NULL, '2017-08-30 11:14:37', 'Login', '192.168.100.59', NULL),
	(2, 1, '2017-08-30 11:16:02', 'Logout', '192.168.100.59', NULL);
/*!40000 ALTER TABLE `access_log` ENABLE KEYS */;

-- Dumping structure for table cms.auth_pages
CREATE TABLE IF NOT EXISTS `auth_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_user_group` int(11) DEFAULT NULL,
  `id_menu_admin` int(11) DEFAULT NULL,
  `c` smallint(6) DEFAULT NULL,
  `r` smallint(6) DEFAULT NULL,
  `u` smallint(6) DEFAULT NULL,
  `d` smallint(6) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_auth_pages_ref_user_grup` (`id_ref_user_group`),
  KEY `FK_auth_pages_menu_admin` (`id_menu_admin`),
  CONSTRAINT `FK_auth_pages_menu_admin` FOREIGN KEY (`id_menu_admin`) REFERENCES `menu_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_auth_pages_ref_user_grup` FOREIGN KEY (`id_ref_user_group`) REFERENCES `ref_user_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='mengatur hak akses untuk setiap user pada table menu_admin';

-- Dumping data for table cms.auth_pages: ~8 rows (approximately)
DELETE FROM `auth_pages`;
/*!40000 ALTER TABLE `auth_pages` DISABLE KEYS */;
INSERT INTO `auth_pages` (`id`, `id_ref_user_group`, `id_menu_admin`, `c`, `r`, `u`, `d`, `create_date`) VALUES
	(1, 1, 1, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(2, 1, 269, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(3, 1, 327, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(4, 1, 339, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(6, 1, 293, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(7, 1, 267, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(8, 1, 270, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(9, 1, 15, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(10, 1, 14, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(12, 1, 335, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(13, 1, 16, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(15, 1, 391, 1, 1, 1, 1, '2019-08-14 01:42:15'),
	(17, 1, 393, 1, 1, 1, 1, '2019-08-14 01:42:15');
/*!40000 ALTER TABLE `auth_pages` ENABLE KEYS */;

-- Dumping structure for table cms.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `ip_address` varchar(200) NOT NULL DEFAULT 'NULL',
  `user_agent` varchar(200) DEFAULT 'NULL',
  `last_activity` int(11) NOT NULL DEFAULT '0',
  `user_data` longtext,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ci_sessions: ~0 rows (approximately)
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`, `create_date`) VALUES
	('ae3d9361bf7a04321804d181d0a77fa7', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', 1442485233, 'a:1:{s:4:"lang";s:2:"en";}', '2019-08-14 02:09:20');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Dumping structure for table cms.email_config
CREATE TABLE IF NOT EXISTS `email_config` (
  `smtp_host` varchar(255) NOT NULL DEFAULT '',
  `port` varchar(10) NOT NULL DEFAULT '',
  `is_ssl` varchar(1) NOT NULL DEFAULT '',
  `smtp_user_alias` varchar(64) DEFAULT 'NULL',
  `smtp_user` varchar(128) NOT NULL DEFAULT '',
  `smtp_pass` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `sendmail_path` varchar(255) DEFAULT 'NULL',
  `smtp_user_from` varchar(64) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cms.email_config: ~0 rows (approximately)
DELETE FROM `email_config`;
/*!40000 ALTER TABLE `email_config` DISABLE KEYS */;
INSERT INTO `email_config` (`smtp_host`, `port`, `is_ssl`, `smtp_user_alias`, `smtp_user`, `smtp_pass`, `type`, `sendmail_path`, `smtp_user_from`) VALUES
	('mail.smtp2go.com', '587', '', 'Amar Ronaldo', 'ammar@deptechdigital.com', 'CBHmXXPM5BtT', 'smtp', '', 'APOTS');
/*!40000 ALTER TABLE `email_config` ENABLE KEYS */;

-- Dumping structure for table cms.email_tmp
CREATE TABLE IF NOT EXISTS `email_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_email_category` int(11) NOT NULL DEFAULT '1',
  `id_status_publish` int(11) NOT NULL DEFAULT '1',
  `name` varchar(200) NOT NULL DEFAULT 'NULL',
  `subject` varchar(200) NOT NULL DEFAULT 'NULL',
  `page_content` longtext,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_email_tmp_ref_email_category` (`id_ref_email_category`),
  KEY `FK_email_tmp_ref_status_publish` (`id_status_publish`),
  KEY `FK_email_tmp_user_2` (`id_user_modify`),
  KEY `FK_email_tmp_user_3` (`id_user_delete`),
  KEY `FK_email_tmp_user` (`id_user_create`),
  CONSTRAINT `FK_email_tmp_ref_email_category` FOREIGN KEY (`id_ref_email_category`) REFERENCES `ref_email_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_email_tmp_ref_status_publish` FOREIGN KEY (`id_status_publish`) REFERENCES `ref_status_publish` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_email_tmp_user` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_email_tmp_user_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_email_tmp_user_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.email_tmp: ~0 rows (approximately)
DELETE FROM `email_tmp`;
/*!40000 ALTER TABLE `email_tmp` DISABLE KEYS */;
INSERT INTO `email_tmp` (`id`, `id_ref_email_category`, `id_status_publish`, `name`, `subject`, `page_content`, `create_date`, `modify_date`, `delete_date`, `id_user_create`, `id_user_modify`, `id_user_delete`, `is_delete`) VALUES
	(1, 1, 2, 'register', 'Terima kasih telah register di web kami', '<p>Dear {name}</p>\n<p>lorem ipsum dolor </p>\n<a href="{link}" >{link_name}</a>\n\n', '2019-08-14 01:24:35', NULL, NULL, NULL, 1, 1, 0);
/*!40000 ALTER TABLE `email_tmp` ENABLE KEYS */;

-- Dumping structure for table cms.file_manager
CREATE TABLE IF NOT EXISTS `file_manager` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `path` longtext,
  `is_public` smallint(6) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_file_manager_user` (`id_user_create`),
  KEY `FK_file_manager_user_2` (`id_user_modify`),
  KEY `FK_file_manager_user_3` (`id_user_delete`),
  CONSTRAINT `FK_file_manager_user` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_file_manager_user_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_file_manager_user_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='\r\n';

-- Dumping data for table cms.file_manager: ~0 rows (approximately)
DELETE FROM `file_manager`;
/*!40000 ALTER TABLE `file_manager` DISABLE KEYS */;
INSERT INTO `file_manager` (`id`, `name`, `path`, `is_public`, `create_date`, `modify_date`, `delete_date`, `id_user_create`, `id_user_modify`, `id_user_delete`, `is_delete`) VALUES
	(1, 'siswa-sekolah-dasar-indonesia-mengajar.jpg', NULL, 0, '2015-09-16 13:41:04', NULL, NULL, 1, NULL, NULL, 0);
/*!40000 ALTER TABLE `file_manager` ENABLE KEYS */;

-- Dumping structure for table cms.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.groups: ~2 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table cms.language
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.language: ~2 rows (approximately)
DELETE FROM `language`;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id`, `name`) VALUES
	(1, 'Indonesia'),
	(2, 'English');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;

-- Dumping structure for table cms.menu_admin
CREATE TABLE IF NOT EXISTS `menu_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL COMMENT 'parent menu',
  `name` varchar(255) NOT NULL DEFAULT '',
  `controller` varchar(255) NOT NULL DEFAULT '',
  `urut` decimal(3,0) DEFAULT NULL,
  `icon` varchar(32) DEFAULT '',
  `group` varchar(32) DEFAULT '',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breadcrumb` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=395 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.menu_admin: ~17 rows (approximately)
DELETE FROM `menu_admin`;
/*!40000 ALTER TABLE `menu_admin` DISABLE KEYS */;
INSERT INTO `menu_admin` (`id`, `id_parent`, `name`, `controller`, `urut`, `icon`, `group`, `create_date`, `breadcrumb`) VALUES
	(1, 0, 'Dashboard', 'home', 1, 'fa fa-laptop', '', '0000-00-00 00:00:00', ''),
	(14, 339, 'Menu Management', 'auth_menu', 3, 'fa fa-align-left', '', '0000-00-00 00:00:00', 'Menu Management'),
	(15, 339, 'Group Authentication', 'auth_pages', 1, 'fa fa-users', '', '0000-00-00 00:00:00', 'Group Authentication'),
	(16, 339, 'User Management', 'user', 2, 'fa fa-user', '', '0000-00-00 00:00:00', 'User Management'),
	(267, 269, 'Email Config', 'email_config', 1, NULL, '', '2014-12-11 11:46:08', 'Email Config'),
	(269, 0, 'Setting', '#', 4, 'fa fa-cogs', '', '2014-12-18 16:23:00', 'Setting'),
	(270, 269, 'Email Template', 'email_tpt', 2, '', '', '2014-12-18 16:25:05', 'Email Template'),
	(293, 269, 'Default Email', 'email_default', 3, '', '', '2015-04-02 14:53:02', 'Default Email'),
	(327, 0, 'My account', 'user_profile', 2, 'fa fa-child', '', '0000-00-00 00:00:00', 'Account'),
	(335, 362, 'Registration Invoice', 'invoice', 2, 'fa fa-calendar-o', '', '0000-00-00 00:00:00', 'Registration Invoice'),
	(339, 0, 'Admin', '#', 3, 'fa fa-lock', '', '0000-00-00 00:00:00', ''),
	(391, 0, 'crud test', 'test', 6, 'fa fa-calendar', '', '0000-00-00 00:00:00', 'test menu'),
	(393, 0, '', '', 5, '', 'Testing', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `menu_admin` ENABLE KEYS */;

-- Dumping structure for table cms.menu_frontend
CREATE TABLE IF NOT EXISTS `menu_frontend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `name` varchar(64) NOT NULL DEFAULT '',
  `name_id` varchar(45) DEFAULT NULL,
  `id_ref_menu_position` int(11) DEFAULT NULL,
  `id_ref_menu_frontend_type` int(11) DEFAULT NULL,
  `id_ref_module` int(11) DEFAULT NULL,
  `extra_param` varchar(50) DEFAULT '',
  `description` varchar(450) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `id_ref_status_publish` int(11) DEFAULT '1',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_menu_frontend_ref_menu_frontend_type` (`id_ref_menu_frontend_type`),
  KEY `FK_menu_frontend_ref_menu_position` (`id_ref_menu_position`),
  KEY `FK_menu_frontend_ref_module` (`id_ref_module`),
  KEY `FK_menu_frontend_ref_status_publish` (`id_ref_status_publish`),
  KEY `FK_menu_frontend_user` (`id_user_create`),
  KEY `FK_menu_frontend_user_2` (`id_user_modify`),
  KEY `FK_menu_frontend_user_3` (`id_user_delete`),
  CONSTRAINT `FK_menu_frontend_ref_menu_frontend_type` FOREIGN KEY (`id_ref_menu_frontend_type`) REFERENCES `ref_menu_frontend_type` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_frontend_ref_menu_position` FOREIGN KEY (`id_ref_menu_position`) REFERENCES `ref_menu_position` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_frontend_ref_module` FOREIGN KEY (`id_ref_module`) REFERENCES `ref_module` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_frontend_ref_status_publish` FOREIGN KEY (`id_ref_status_publish`) REFERENCES `ref_status_publish` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_frontend_user` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_frontend_user_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_frontend_user_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.menu_frontend: ~23 rows (approximately)
DELETE FROM `menu_frontend`;
/*!40000 ALTER TABLE `menu_frontend` DISABLE KEYS */;
INSERT INTO `menu_frontend` (`id`, `id_parent`, `name`, `name_id`, `id_ref_menu_position`, `id_ref_menu_frontend_type`, `id_ref_module`, `extra_param`, `description`, `position`, `id_ref_status_publish`, `publish_date`, `create_date`, `modify_date`, `delete_date`, `id_user_create`, `id_user_modify`, `id_user_delete`, `is_delete`) VALUES
	(1, 0, 'Home', 'Home', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:26', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(2, 0, 'Profil Fakultas', 'Profil Fakultas', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:27', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(3, 2, 'Visi Misi', 'Visi Misi', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:27', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(4, 2, 'Tujuan', 'Tujuan', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:28', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(5, 2, 'Struktur Organisasi', 'Struktur Organisasi', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:30', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(6, 2, 'Lembaga', 'Lembaga', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:29', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(7, 2, 'Kerjasama/MOU', 'Kerjasama/MOU', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:30', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(8, 0, 'Program Studi', 'Program Studi', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:31', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(9, 8, 'Pendidikan Agama Islam (PAI)', 'Pendidikan Agama Islam (PAI)', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:33', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(10, 8, 'Pendidikan Islam Anak Usia Dini (PIAUD)', 'Pendidikan Islam Anak Usia Dini (PIAUD)', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:33', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(11, 0, 'Pendidikan Islam Anak Usia Dini (PIAUD)', 'Pendidikan Islam Anak Usia Dini (PIAUD)', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:34', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(12, 0, 'Staf Dosen', 'Staf Dosen', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:34', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(13, 12, 'Dosen PAI', 'Dosen PAI', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:35', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(14, 12, 'Dosen PIAUD', 'Dosen PIAUD', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:36', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(15, 0, 'Fasilitas', 'Fasilitas', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:36', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(16, 15, 'Ruang Kuliah', 'Ruang Kuliah', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:37', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(17, 15, 'Perpustakaan', 'Perpustakaan', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:37', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(18, 15, 'Masjid/Mushola', 'Masjid/Mushola', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:38', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(19, 15, 'Tempat Parkir', 'Tempat Parkir', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:39', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(20, 15, 'Kantin (Fasilitas Umum)', 'Kantin (Fasilitas Umum)', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:38', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(21, 0, 'Kegiatan', 'Kegiatan', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:40', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(22, 21, 'Kegiatan Akademik', 'Kegiatan Akademik', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:41', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0),
	(23, 21, 'Kegiatan Kemahasiwaaan', 'Kegiatan Kemahasiwaaan', 1, 1, 2, '', NULL, NULL, 2, '2019-11-11 10:31:40', '2019-08-14 02:51:54', NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `menu_frontend` ENABLE KEYS */;

-- Dumping structure for table cms.ptiq_banner
CREATE TABLE IF NOT EXISTS `ptiq_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `img` text NOT NULL,
  `link` text NOT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__default_auth_user` (`id_user_create`),
  KEY `FK__default_user` (`id_user_modify`),
  KEY `FK__default_user_2` (`id_user_delete`),
  CONSTRAINT `ptiq_banner_ibfk_1` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `ptiq_banner_ibfk_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `ptiq_banner_ibfk_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table cms.ptiq_banner: ~0 rows (approximately)
DELETE FROM `ptiq_banner`;
/*!40000 ALTER TABLE `ptiq_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `ptiq_banner` ENABLE KEYS */;

-- Dumping structure for table cms.ref_email_category
CREATE TABLE IF NOT EXISTS `ref_email_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_email_tmp` int(11) DEFAULT '1',
  `name` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ref_email_category: ~13 rows (approximately)
DELETE FROM `ref_email_category`;
/*!40000 ALTER TABLE `ref_email_category` DISABLE KEYS */;
INSERT INTO `ref_email_category` (`id`, `id_email_tmp`, `name`) VALUES
	(1, NULL, 'Newsletter'),
	(2, NULL, 'Hubungi Kami'),
	(3, NULL, 'Aktivasi Akun'),
	(4, NULL, 'Social Register'),
	(5, NULL, 'Kirim Kembali Kode Aktivasi Akun'),
	(6, NULL, 'Lupa Kata Sandi'),
	(7, NULL, 'Balasan Hubungi Kami'),
	(12, NULL, 'Aktivasi Akun Berhasil'),
	(13, NULL, 'Berhasil Melakukan Delete Akun'),
	(14, NULL, 'Konfirmasi Ganti Email'),
	(15, NULL, 'Mengaktifkan Akun Kembali Berhasil'),
	(17, NULL, 'Aktivasi Akun Email Baru'),
	(18, NULL, 'Aktivasi Akun Email Baru Berhasil');
/*!40000 ALTER TABLE `ref_email_category` ENABLE KEYS */;

-- Dumping structure for table cms.ref_menu_frontend_type
CREATE TABLE IF NOT EXISTS `ref_menu_frontend_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ref_menu_frontend_type: ~2 rows (approximately)
DELETE FROM `ref_menu_frontend_type`;
/*!40000 ALTER TABLE `ref_menu_frontend_type` DISABLE KEYS */;
INSERT INTO `ref_menu_frontend_type` (`id`, `name`) VALUES
	(1, 'Module'),
	(2, 'External Link');
/*!40000 ALTER TABLE `ref_menu_frontend_type` ENABLE KEYS */;

-- Dumping structure for table cms.ref_menu_position
CREATE TABLE IF NOT EXISTS `ref_menu_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ref_menu_position: ~5 rows (approximately)
DELETE FROM `ref_menu_position`;
/*!40000 ALTER TABLE `ref_menu_position` DISABLE KEYS */;
INSERT INTO `ref_menu_position` (`id`, `name`) VALUES
	(1, 'Top Menu'),
	(2, 'Left Menu'),
	(3, 'Right Menu'),
	(4, 'Header Menu'),
	(5, 'Footer Menu');
/*!40000 ALTER TABLE `ref_menu_position` ENABLE KEYS */;

-- Dumping structure for table cms.ref_module
CREATE TABLE IF NOT EXISTS `ref_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `controller` varchar(50) DEFAULT '',
  `callback` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ref_module: ~3 rows (approximately)
DELETE FROM `ref_module`;
/*!40000 ALTER TABLE `ref_module` DISABLE KEYS */;
INSERT INTO `ref_module` (`id`, `name`, `controller`, `callback`) VALUES
	(1, '-', '-', '-'),
	(2, 'Pages', 'pages', 'pages/select_page'),
	(3, 'News', 'article', 'news/select_category'),
	(4, 'Home', 'home', '');
/*!40000 ALTER TABLE `ref_module` ENABLE KEYS */;

-- Dumping structure for table cms.ref_status_publish
CREATE TABLE IF NOT EXISTS `ref_status_publish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ref_status_publish: ~2 rows (approximately)
DELETE FROM `ref_status_publish`;
/*!40000 ALTER TABLE `ref_status_publish` DISABLE KEYS */;
INSERT INTO `ref_status_publish` (`id`, `name`) VALUES
	(1, 'Unpublish'),
	(2, 'Publish');
/*!40000 ALTER TABLE `ref_status_publish` ENABLE KEYS */;

-- Dumping structure for table cms.ref_user_group
CREATE TABLE IF NOT EXISTS `ref_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_ref_user_grup_user` (`id_user_create`),
  KEY `FK_ref_user_grup_user_2` (`id_user_modify`),
  KEY `FK_ref_user_grup_user_3` (`id_user_delete`),
  CONSTRAINT `FK_ref_user_grup_user` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ref_user_grup_user_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ref_user_grup_user_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.ref_user_group: ~5 rows (approximately)
DELETE FROM `ref_user_group`;
/*!40000 ALTER TABLE `ref_user_group` DISABLE KEYS */;
INSERT INTO `ref_user_group` (`id`, `name`, `description`, `create_date`, `modify_date`, `delete_date`, `id_user_create`, `id_user_modify`, `id_user_delete`, `is_delete`) VALUES
	(1, 'Super Administrator', NULL, '2019-08-14 02:22:04', NULL, NULL, NULL, NULL, NULL, 0),
	(2, 'Viewer', NULL, '2019-08-14 02:22:04', NULL, NULL, NULL, NULL, NULL, 0),
	(3, 'Data Editor', NULL, '2019-08-14 02:22:04', NULL, NULL, NULL, NULL, NULL, 0),
	(4, 'Publisher', NULL, '2019-08-14 02:22:04', NULL, NULL, NULL, NULL, NULL, 0),
	(5, 'User', NULL, '2019-08-14 02:22:04', NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `ref_user_group` ENABLE KEYS */;

-- Dumping structure for table cms.test
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text,
  `detail` text,
  `id_ref_status_publish` int(1) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `ckeditor` text,
  `fileupload` text,
  `imagemanager` text,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__default_auth_user` (`id_user_create`),
  KEY `FK__default_user` (`id_user_modify`),
  KEY `FK__default_user_2` (`id_user_delete`),
  CONSTRAINT `test_ibfk_1` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `test_ibfk_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `test_ibfk_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table cms.test: ~30 rows (approximately)
DELETE FROM `test`;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`id`, `nama`, `detail`, `id_ref_status_publish`, `datetime`, `date`, `time`, `ckeditor`, `fileupload`, `imagemanager`, `create_date`, `modify_date`, `delete_date`, `id_user_create`, `id_user_modify`, `id_user_delete`, `is_delete`) VALUES
	(1, 'amar', 'gateng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 11:45:22', 1, 1, 1, 1),
	(2, 'joko', 'sembung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(3, 'anisa', 'fitri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(4, 'indah', 'ros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(5, ' nigan', 'wwa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(6, 'agung', 'hecules', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(7, 'torfin', 'dewa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(8, 'ahmad', 'dani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(9, 'joko', 'anwar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(10, 'prabowo', 'gerindra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(11, 'judi', 'haram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 13:26:56', '2019-11-03 13:26:57', '2019-11-03 13:26:57', 1, 1, 1, 0),
	(12, 'waf', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 03:59:48', NULL, NULL, 1, 1),
	(13, 'haha ', 'im good', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, 1, NULL, NULL, 0),
	(14, 'haha ', 'im good', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 04:01:52', 1, NULL, 1, 1),
	(15, 'Ammar Ronaldo Megantoro', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, 1, NULL, NULL, 0),
	(16, 'Ammar Ronaldo Megantoro', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 03:59:40', 1, NULL, 1, 1),
	(17, 'Ammar Ronaldo Megantoro', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 03:53:59', 1, NULL, 1, 1),
	(18, 'sial ', 'beban', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 03:53:06', 1, NULL, 1, 1),
	(19, 'aku ', 'contek yaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 03:48:37', 1, NULL, 1, 1),
	(20, 'siapa hayoo', 'coba tebak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2019-11-04 03:46:52', 1, NULL, 1, 1),
	(21, 'sud6ah jam 6', 'kok belum tidur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 11:57:39', NULL, '2019-11-04 03:40:57', 1, NULL, 1, 1),
	(22, 'sud6ah jam 6', 'kok belum tidur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 11:57:40', NULL, '2019-11-04 03:40:44', 1, NULL, 1, 1),
	(23, 'sudah jam 6', 'kok belum tidur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 11:58:03', NULL, '2019-11-04 03:39:34', 1, NULL, 1, 1),
	(24, 'sudah jam 6', 'kok belum tidur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 11:58:03', NULL, '2019-11-04 03:29:47', 1, NULL, 1, 1),
	(25, 'sudah jam 61', 'kok belum tidur1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-04 03:28:38', NULL, '2019-11-04 03:28:53', 1, NULL, 1, 1),
	(26, 'dewa olop', 'haha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-04 04:02:13', NULL, NULL, 1, NULL, NULL, 0),
	(27, '1', '2', 1, '2019-11-05 23:44:29', '2019-11-05', '23:44:31', NULL, NULL, NULL, '2019-11-04 02:14:51', '2019-11-05 03:04:57', NULL, 1, 1, NULL, 0),
	(28, '1', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-05 02:58:55', NULL, NULL, 1, NULL, NULL, 0),
	(29, 'Amar Ronaldo', '1', 2, '2019-11-06 15:25:00', '2019-11-06', '15:25:00', '<p><a href="http://localhost/cms3/assets/media/ckfinder/files/Hotel Booking (2).xls">download file</a><br><br>ini konten</p><p> </p><figure class="image"><img src="http://localhost/cms3/assets/media/ckfinder/images/Brian Arnold 2.jpg"></figure>', NULL, NULL, '2019-11-06 09:33:13', '2019-11-06 08:15:15', NULL, 1, 1, NULL, 0),
	(30, 'file', NULL, 2, NULL, NULL, NULL, '        \r\n        ', '[{"url":"http://localhost/cms3/assets/media/ckfinder/files/sultan (1).png","name":"sultan (1).png","extension":"png"}]', NULL, '2019-11-11 05:20:11', NULL, NULL, 1, NULL, NULL, 0),
	(31, NULL, NULL, NULL, NULL, NULL, NULL, '        \r\n        ', NULL, '[{"url":"http://localhost/cms3/assets/media/ckfinder/images/Brian Arnold 2.jpg","name":"Brian Arnold 2.jpg","imgName":"amar ronaldo","imgDesc":"ganteng","extension":"jpg"}]', '2019-11-11 10:49:41', NULL, NULL, 1, NULL, NULL, 0);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

-- Dumping structure for table cms.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_user_group` int(11) NOT NULL DEFAULT '4',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'sudah di delete?',
  `is_active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'sudah active ?',
  `username` varchar(100) NOT NULL DEFAULT '0',
  `userpass` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(64) NOT NULL DEFAULT '',
  `phone` varchar(20) DEFAULT '',
  `forgot_password` varchar(50) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_user` (`id_user_create`),
  KEY `FK_user_user_2` (`id_user_modify`),
  KEY `FK_user_user_3` (`id_user_delete`),
  KEY `FK_user_ref_user_grup` (`id_ref_user_group`),
  CONSTRAINT `FK_user_ref_user_grup` FOREIGN KEY (`id_ref_user_group`) REFERENCES `ref_user_group` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_user_user` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_user_user_2` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_user_user_3` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table cms.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `id_ref_user_group`, `is_delete`, `is_active`, `username`, `userpass`, `first_name`, `last_name`, `email`, `phone`, `forgot_password`, `ip_address`, `last_login`, `create_date`, `modify_date`, `delete_date`, `id_user_create`, `id_user_modify`, `id_user_delete`) VALUES
	(1, 1, 0, 1, 'superadmin', '$2y$09$wMtZ7PulJi2DauiehO4iRe0vi0G61a24alxBA1TZXvgszGuLbQI.K', 'Amar', 'Ronaldo', 'amar.ronaldo.m@gmail.com', '08988219653', NULL, NULL, NULL, '2019-10-26 23:27:27', '2019-11-12 04:57:29', NULL, NULL, 1, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table cms._default
CREATE TABLE IF NOT EXISTS `_default` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `id_user_create` int(11) DEFAULT NULL,
  `id_user_modify` int(11) DEFAULT NULL,
  `id_user_delete` int(11) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__default_auth_user` (`id_user_create`),
  KEY `FK__default_user` (`id_user_modify`),
  KEY `FK__default_user_2` (`id_user_delete`),
  CONSTRAINT `FK__default_auth_user` FOREIGN KEY (`id_user_create`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__default_user` FOREIGN KEY (`id_user_modify`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__default_user_2` FOREIGN KEY (`id_user_delete`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table cms._default: ~0 rows (approximately)
DELETE FROM `_default`;
/*!40000 ALTER TABLE `_default` DISABLE KEYS */;
/*!40000 ALTER TABLE `_default` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
