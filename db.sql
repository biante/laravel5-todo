-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel-todo`
--

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_09_135614_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Схема на данните от таблица `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Project 1', 'project-1', '2017-03-09 20:33:18', '2017-03-09 20:33:18', 0),
(2, 1, 'Project 2', 'project-2', '2017-03-09 20:33:18', '2017-03-09 20:33:18', 0),
(3, 0, 'Project 3', 'project-3', '2017-03-09 20:33:18', '2017-03-09 20:33:18', 0),
(5, 0, 'Project 4', 'project-4', '2017-03-09 20:33:18', '2017-03-09 20:33:18', 1),
(6, 2, 'User 2 Project1', 'user2-project-1', '2017-03-10 07:53:32', '2017-03-10 07:53:32', 0),
(7, 0, 'User2 Project 2', 'user2-project-2', '2017-03-10 08:03:36', '2017-03-10 08:03:36', 0),
(8, 2, 'Project Random', 'pr-rand', '2017-03-10 08:09:01', '2017-03-10 08:09:25', 0),
(9, 1, 'project 100', 'lklkl', '2017-03-10 08:13:48', '2017-03-10 08:13:48', 0),
(10, 2, 'Project 101', 'project-101', '2017-03-10 08:14:21', '2017-03-10 08:14:21', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `completed` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Схема на данните от таблица `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `slug`, `project_id`, `completed`, `description`, `created_at`, `updated_at`, `expiration_date`) VALUES
(1, 'Task 1', 'task-1', 1, '1', 'My first task', '2017-03-09 20:33:18', '2017-03-10 05:28:32', '0000-00-00 00:00:00'),
(2, 'Task 2', 'task-2', 1, '0', 'My first task', '2017-03-09 20:33:18', '2017-03-09 20:33:18', '0000-00-00 00:00:00'),
(3, 'Task 3', 'task-3', 1, '0', 'My first task', '2017-03-09 20:33:18', '2017-03-09 20:33:18', '0000-00-00 00:00:00'),
(4, 'Task 4', 'task-4', 1, '1', 'My second task', '2017-03-09 20:33:18', '2017-03-09 20:33:18', '0000-00-00 00:00:00'),
(5, 'Task 5', 'task-5', 1, '1', 'My third task', '2017-03-09 20:33:18', '2017-03-09 20:33:18', '0000-00-00 00:00:00'),
(6, 'Task 6', 'task-6', 2, '1', 'My fourth task', '2017-03-09 20:33:18', '2017-03-09 20:33:18', '0000-00-00 00:00:00'),
(7, 'Task 7', 'task-7', 2, '0', 'My fifth task', '2017-03-09 20:33:18', '2017-03-09 20:33:18', '0000-00-00 00:00:00'),
(8, 'Project Random Task', 'prt', 8, '0', 'This is a Task to Project Random Project', '2017-03-10 08:10:16', '2017-03-10 08:10:16', '0000-00-00 00:00:00'),
(9, 'To Do Today', 'to-do-today', 8, '', 'This task must be to do before Expiration Date!', '2017-03-10 12:14:45', '2017-03-10 12:14:45', '2017-03-10 22:00:00');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '     0 = Disabled     1 = Visitor     2 = Admin.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'user1', 'user1@user.user', '$2y$10$.HtMovR4hukhzxr.IcUPk.wpsHj.RvUELVIqLNgsCagbjjM2jkVMm', '8eo0rzO5NvtRHvyZtyMvav0hazQEsXC93VqqZcqzxNIUDDnISYkJhcp3Bwdl', '2017-03-10 06:21:47', '2017-03-10 13:26:57', 2),
(2, 'user2', 'user2@user.user', '$2y$10$IhRyTatBM/2hVyX8D4wN9e5J9boDm.9mnbicOE6BOLnXWYMfuQyxm', NULL, '2017-03-10 07:52:44', '2017-03-10 07:52:44', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
