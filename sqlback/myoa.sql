-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 年 06 月 01 日 20:29
-- 服务器版本: 5.6.17
-- PHP 版本: 5.5.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `myoa`
--

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu_catelogue`
--

CREATE TABLE IF NOT EXISTS `menu_catelogue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `root` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_catelogue_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `menu_catelogue`
--

INSERT INTO `menu_catelogue` (`id`, `name`, `icon`, `root`, `sort`, `path`) VALUES
(1, '仪表盘', NULL, 0, 1, '/admin/dashboard'),
(2, '用户', NULL, 0, 1, '/admin/user'),
(3, '资源', NULL, 0, 1, '/admin/rc'),
(4, '配置', NULL, 0, 1, '/admin/conf'),
(5, 'CNZZ统计', '', 1, 1, '/admin/dashboard/census'),
(6, '系统信息', '', 1, 1, '/admin/dashboard/sys'),
(7, '数据备份', '', 1, 1, '/admin/dashboard/index'),
(8, '清除缓存', '', 1, 1, '/admin/dashbord/cleancache'),
(9, '用户管理', '', 2, 1, '/admin/user/userconf'),
(10, '用户组管理', '', 2, 1, '/admin/user/groups'),
(11, '权限管理', '', 2, 1, '/admin/user/permissions'),
(12, '个人信息', '', 2, 1, '/admin/user/self'),
(13, 'Windows', '', 3, 1, '/admin/rc/windows'),
(14, 'Mac', '', 3, 1, '/admin/rc/mac'),
(15, '菜单管理', '', 4, 1, '/admin/conf/menu');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_04_29_091938_menu_catelogue', 1),
('2015_04_29_134545_create_permission_table', 1),
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 2),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 2),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 2),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 2);

-- --------------------------------------------------------

--
-- 表的结构 `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_id_unique` (`id`),
  KEY `permissions_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '192.168.1.14', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` text,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) DEFAULT NULL,
  `reset_password_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$7FpUqMwMT8LQ0.esBhH2vOE/6R3TMf5Z5rOcqfwOInCKf2GyJLhCG', NULL, 1, 'dK2JHCU1VqVM43u3qPG63jFhDUwQMPyqXSw2PXTqlK', '2015-06-10 07:00:00', '2015-06-01 19:05:02', '$2y$10$ILXkqOPuTVlfF4htfA1WluAY3fb0Y3oLwIKRCr2WW/eScyceKupHe', NULL, NULL, NULL, '0000-00-00 00:00:00', '2015-06-01 19:05:02');

-- --------------------------------------------------------

--
-- 表的结构 `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
