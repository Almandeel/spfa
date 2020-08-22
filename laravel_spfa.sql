-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2020 at 05:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_spfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '{\"ar\":\"\\u0645\\u0648\\u0627\\u0642\\u0639\",\"en\":\"web\"}', NULL, '2019-12-27 19:44:39', '2019-12-27 17:44:39', NULL),
(4, '{\"ar\":\"\\u0628\\u0631\\u0627\\u0645\\u062c \\u0633\\u0637\\u062d \\u0627\\u0644\\u0645\\u0643\\u062a\\u0628\",\"en\":\"program\"}', NULL, '2019-12-27 19:46:30', '2019-12-27 17:46:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(10) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT 'phone',
  `value` text DEFAULT NULL,
  `viewable` tinyint(1) NOT NULL DEFAULT 1,
  `viewhome` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `value`, `viewable`, `viewhome`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'phone', '{\"ar\":\"0912300000\",\"en\":\"0912300000\"}', 1, 1, NULL, '2019-11-06 08:00:50', '2019-11-06 10:38:27'),
(2, 'email', '{\"ar\":\"info@const.com\",\"en\":\"info@const.com\"}', 1, 1, NULL, '2019-11-06 08:00:50', '2019-11-06 10:37:40'),
(3, 'email', '{\"ar\":\"hr@const.com\",\"en\":\"hr@const.com\"}', 1, 1, NULL, '2019-11-06 08:03:02', '2019-11-06 10:22:37'),
(4, 'address', '{\"ar\":\"عنوان تجريبي للموقع\",\"en\":\"34 Street Name, City Name Here, United States\"}', 1, 1, '2019-11-06 09:55:34', '2019-11-06 08:03:02', '2019-11-06 09:55:34'),
(5, 'address', '{\"ar\":\"\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0634\\u0647\\u064a\\u062f\\u0629 \\u0633\\u0644\\u0645\\u0649\",\"en\":\"Salma Street\"}', 1, 1, NULL, '2019-11-06 09:47:01', '2019-11-06 09:51:20'),
(6, 'address', '{\"ar\":\"\\u0634\\u0627\\u0631\\u0639 \\u0639\\u0628\\u064a\\u062f \\u062e\\u062a\\u0645\",\"en\":\"Khatem st\"}', 1, 1, NULL, '2019-11-06 09:47:59', '2019-11-06 09:47:59'),
(7, 'email', '{\"ar\":\"help@const.com\",\"en\":\"help@const.com\"}', 1, 1, NULL, '2019-11-06 09:49:06', '2019-11-06 10:37:59'),
(8, 'phone', '{\"ar\":\"0912300000\",\"en\":\"0912300000\"}', 1, 1, NULL, '2019-12-25 22:15:59', '2019-12-25 22:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher_id`, `description`, `intro`, `from_date`, `to_date`, `time`, `price`, `discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '{\"ar\":\"\\u0627\\u0644\\u0648\\u0631\\u0634\\u0629 \\u0627\\u0644\\u0646\\u062a\\u0648\\u064a\\u0631\\u064a\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629\",\"en\":\"The second enlightening workshop\"}', 1, '{\"ar\":\"\\u0627\\u0644\\u0648\\u0631\\u0634\\u0629 \\u0627\\u0644\\u062a\\u0646\\u0648\\u064a\\u0631\\u064a\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\r\\n\\u0627\\u0644\\u0648\\u0631\\u0634\\u0629 \\u0627\\u0644\\u062a\\u0646\\u0648\\u064a\\u0631\\u064a\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\r\\n\\u0627\\u0644\\u0648\\u0631\\u0634\\u0629 \\u0627\\u0644\\u062a\\u0646\\u0648\\u064a\\u0631\\u064a\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\r\\n\\u0627\\u0644\\u0648\\u0631\\u0634\\u0629 \\u0627\\u0644\\u062a\\u0646\\u0648\\u064a\\u0631\\u064a\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629\",\"en\":\"The second enlightening workshop\\r\\nThe second enlightening workshop\\r\\nThe second enlightening workshop\"}', '1579791017.jpg', '2020-12-12', '2020-02-12', '4:00 PM TO 6:00 PM', 500, 100, '2020-01-23 12:50:17', '2020-01-29 13:59:44', NULL),
(11, '{\"ar\":\"\\u0645\\u062d\\u0627\\u0636\\u0631\\u0629\",\"en\":\"Lecture\"}', 1, '{\"ar\":\"\\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629\",\"en\":\"Lecture Lecture Lecture LectureLecture  Lecture Lecture Lecture LectureLecture  Lecture Lecture Lecture LectureLecture  Lecture Lecture Lecture LectureLecture  Lecture Lecture Lecture LectureLecture  Lecture Lecture Lecture LectureLecture Lecture Lecture Lecture LectureLecture\"}', '1580166489.jpg', '2020-01-28', '2020-01-28', '4:00 PM TO 6:00 PM', 0, 0, '2020-01-27 21:02:23', '2020-01-27 21:08:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_bookings`
--

CREATE TABLE `course_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `degree` varchar(150) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `goal` text NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_bookings`
--

INSERT INTO `course_bookings` (`id`, `name`, `gender`, `degree`, `phone`, `goal`, `course_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'معز صبري', 'male', 'undergraduate', '0123456789', 'بالميبالمنبلميبنلتبيمنلتبيمنلتيبمنلتيمبنلتيبمنلي', 10, '2020-01-23 13:00:26', '2020-01-23 13:00:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `Viewable` tinyint(4) DEFAULT 0,
  `page_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewable` tinyint(4) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `title`, `description`, `image`, `viewable`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u064a\",\"en\":\"\\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u064a\"}', '{\"ar\":\"\\u062c\\u0645\\u0639\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u064a \\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0627\\u0646\\u064a \\u0627\\u0644\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0639\\u0644\\u0645\\u064a\\u0629 \\u062b\\u0642\\u0627\\u0641\\u064a\\u0629 \\u062a\\u0631\\u0641\\u064a\\u0647\\u064a\\u0629 \\u063a\\u064a\\u0631 \\u0631\\u0628\\u062d\\u064a\\u0629 \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u064a \\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0627\\u0646\\u064a \\u0627\\u0644\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0639\\u0644\\u0645\\u064a\\u0629 \\u062b\\u0642\\u0627\\u0641\\u064a\\u0629 \\u062a\\u0631\\u0641\\u064a\\u0647\\u064a\\u0629 \\u063a\\u064a\\u0631 \\u0631\\u0628\\u062d\\u064a\\u0629 \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u064a \\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0627\\u0646\\u064a \\u0627\\u0644\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0639\\u0644\\u0645\\u064a\\u0629 \\u062b\\u0642\\u0627\\u0641\\u064a\\u0629 \\u062a\\u0631\\u0641\\u064a\\u0647\\u064a\\u0629 \\u063a\\u064a\\u0631 \\u0631\\u0628\\u062d\\u064a\\u0629\",\"en\":\"The Sudanese Pharmaceutical Forum is a non-profit, scientific, cultural, and entertaining association The Sudanese Pharmaceutical Forum is a non-profit, scientific, cultural, and entertaining association The Sudanese Pharmaceutical Forum is a non-profit, scientific, cultural, and entertaining association\"}', '1574254596.jpg', 1, NULL, '2019-11-06 07:41:05', '2020-01-28 11:43:46'),
(5, '{\"ar\":\"\\u0627\\u0644\\u0631\\u0624\\u064a\\u0629\",\"en\":\"Vision\"}', '{\"ar\":\"\\u062e\\u0644\\u0642 \\u0645\\u062c\\u062a\\u0645\\u0639 \\u0635\\u064a\\u0644\\u0627\\u062f\\u0646\\u064a\",\"en\":\"Creating a Chilean community\"}', NULL, 0, NULL, '2020-01-28 11:58:17', '2020-01-28 11:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

CREATE TABLE `networks` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT 'facebook',
  `value` text DEFAULT NULL,
  `viewable` tinyint(1) DEFAULT 1,
  `viewhome` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networks`
--

INSERT INTO `networks` (`id`, `type`, `value`, `viewable`, `viewhome`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'facebook', '{\"ar\":\"https:\\/\\/web.facebook.com\\/jameiat.almontada.5\",\"en\":\"https:\\/\\/web.facebook.com\\/jameiat.almontada.5\"}', 0, 0, NULL, '2019-11-06 07:52:10', '2020-01-28 12:37:38'),
(2, 'twitter', '{\"ar\":\"#\",\"en\":\"#\"}', 0, 0, NULL, '2019-11-06 07:52:10', '2019-12-01 14:08:09'),
(3, 'instagram', '{\"ar\":\"#\",\"en\":\"#\"}', 0, 0, '2020-01-28 12:36:43', '2019-11-06 07:53:08', '2020-01-28 12:36:43'),
(4, 'linkedin', '{\"ar\":\"#\",\"en\":\"#\"}', 0, 0, NULL, '2019-11-06 07:53:08', '2019-12-01 14:08:11'),
(5, 'whatsapp', '{\"ar\":\"0912000989\",\"en\":null}', 1, 1, '2019-11-06 10:05:54', '2019-11-06 10:04:56', '2019-11-06 10:05:54'),
(6, 'email', '{\"ar\":\"test@test.com\",\"en\":\"test@test.com\"}', 1, 1, NULL, '2019-12-26 06:02:18', '2019-12-26 06:02:18'),
(7, 'phone', '{\"ar\":\"099999999999\",\"en\":\"099999999999\"}', 1, 1, NULL, '2019-12-26 06:02:36', '2019-12-26 06:02:36'),
(8, 'address', '{\"ar\":\"\\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"first\"}', 1, 1, NULL, '2020-01-28 12:32:52', '2020-01-28 12:32:52'),
(9, 'whatsapp', '{\"ar\":\"https:\\/\\/wa.me\\/+249997230767\",\"en\":\"https:\\/\\/wa.me\\/0997230767\"}', 1, 1, NULL, '2020-01-28 12:34:52', '2020-01-28 12:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_id` int(11) UNSIGNED DEFAULT NULL,
  `comments_status` tinyint(4) DEFAULT NULL,
  `news_status` tinyint(4) DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `image`, `author_id`, `comments_status`, `news_status`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, '{\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u0639\\u0627\\u0645\",\"en\":\"dfgdfgdfgfdg\"}', '{\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u0639\\u0627\\u0645\",\"en\":\"hgfghfghgfhfgh\"}', '1578566570.jpg', 1, 0, 1, NULL, '2020-01-23 13:02:28', '2020-01-09 08:42:49', '2020-01-23 13:02:28'),
(6, '{\"ar\":\"\\u0627\\u062d\\u062a\\u062c\\u0627\\u062c\\u0627\\u062a \\u0643\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0635\\u062f\\u064a\\u062f\\u0644\\u0629 \\u062c\\u0627\\u0645\\u0639\\u0629 \\u0633\\u0646\\u0627\\u0631\",\"en\":\"Al-Saddela college protests, Sennar University\"}', '{\"ar\":\"\\u062a\\u0630\\u0643\\u0631 \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u0649 \\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0627\\u0646\\u064a \\u0627\\u0644\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a \\u0628\\u0627\\u0644\\u0648\\u0642\\u0641\\u0629 \\u0627\\u0644\\u0625\\u062d\\u062a\\u062c\\u0627\\u062c\\u064a\\u0629 \\u0644\\u0637\\u0644\\u0627\\u0628 \\u0643\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0629 \\u062c\\u0627\\u0645\\u0639\\u0629 \\u0633\\u0646\\u0627\\u0631 \\u0623\\u0645\\u0627\\u0645 \\u0648\\u0632\\u0627\\u0631\\u0629 \\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0639\\u0627\\u0644\\u064a \\u063a\\u062f\\u0627\\u064b \\u0627\\u0644\\u062e\\u0645\\u064a\\u0633 \\u0627\\u0644\\u0633\\u0627\\u0639\\u0629 1:00 \\u0638\\u0647\\u0631\\u0627\\u064b\",\"en\":\"The Sudanese Pharmaceutical Forum Association recalls the protest of the students of the Faculty of Pharmacy at Sennar University in front of the Ministry of Higher Education tomorrow, Thursday, 1:00 pm\"}', '1580164828.jpg', 1, 0, 1, NULL, NULL, '2020-01-23 13:07:31', '2020-01-27 20:40:28'),
(7, '{\"ar\":\"\\u0625\\u0633\\u062a\\u0631\\u0627\\u062d\\u0629 \\u0623\\u0637\\u0641\\u0627\\u0644 \\u0645\\u0631\\u0636\\u0649 \\u0627\\u0644\\u0633\\u0631\\u0637\\u0627\\u0646\",\"en\":\"Break the children of cancer patients\"}', '{\"ar\":\"\\u0623\\u064f\\u0642\\u064a\\u0645\\u062a \\u0627\\u0644\\u064a\\u0648\\u0645 \\u0636\\u0645\\u0646 \\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u0645\\u0643\\u062a\\u0628 \\u0627\\u0644\\u0625\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a \\u0644\\u0644\\u062c\\u0645\\u0639\\u064a\\u0629 \\u0623\\u0645\\u0633\\u064a\\u0629 \\u062a\\u0631\\u0641\\u064a\\u0647\\u064a\\u0629 \\u0641\\u064a \\u0625\\u0633\\u062a\\u0631\\u0627\\u062d\\u0629 \\u0623\\u0637\\u0641\\u0627\\u0644 \\u0645\\u0631\\u0636\\u0649 \\u0627\\u0644\\u0633\\u0631\\u0637\\u0627\\u0646 \\u0628\\u0627\\u0644\\u0635\\u062d\\u0627\\u0641\\u0629 \\u0634\\u0631\\u0642 \\u0645\\u0631\\u0628\\u0639 38\\u060c\\u060c \\u0634\\u0645\\u0644\\u062a \\u0623\\u0644\\u0639\\u0627\\u0628 \\u0648\\u0647\\u062f\\u0627\\u064a\\u0627 \\u0648\\u0628\\u0639\\u0636 \\u0627\\u0644\\u0625\\u062d\\u062a\\u064a\\u0627\\u062c\\u0627\\u062a \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\\u0645\\u060c\\u060c \\u0646\\u0633\\u0623\\u0644 \\u0627\\u0644\\u0644\\u0647 \\u0644\\u0647\\u0645 \\u0627\\u0644\\u0639\\u0627\\u0641\\u064a\\u0629 \\u0648\\u0639\\u0627\\u062c\\u0644 \\u0627\\u0644\\u0634\\u0641\\u0627\\u0621\\u060c\\u060c \\u0648\\u062c\\u0632\\u064a\\u0644 \\u0627\\u0644\\u0634\\u0643\\u0631 \\u0644\\u0643\\u0644 \\u0645\\u0646 \\u062d\\u0636\\u0631 \\u0623\\u0648 \\u0634\\u0627\\u0631\\u0643 \\u0641\\u064a \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u062c\\u0639\\u0644\\u0647 \\u0627\\u0644\\u0644\\u0647 \\u0641\\u064a \\u0645\\u064a\\u0632\\u0627\\u0646 \\u062d\\u0633\\u0646\\u0627\\u062a\\u0647\\u0645 \\u0648\\u0633\\u062a\\u0633\\u062a\\u0645\\u0631 \\u0627\\u0644\\u0628\\u0631\\u0627\\u0645\\u062c \\u0627\\u0644\\u0625\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629 \\u0625\\u0646 \\u0634\\u0627\\u0621 \\u0627\\u0644\\u0644\\u0647..\\r\\n\\r\\n(\\u0648\\u0623\\u0639\\u0638\\u0645 \\u0627\\u0644\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0633\\u0631\\u0648\\u0631 \\u062a\\u062f\\u062e\\u0644\\u0647 \\u0639\\u0644\\u0649 \\u0646\\u0641\\u0633 \\u0645\\u0624\\u0645\\u0646)\",\"en\":\"Today was held within the activities of the social office of the association, an evening of entertainment in the children\\u2019s rest of cancer patients in the press east of the square 38 ,, games and gifts and some of their needs ,, we ask God for them wellness and speedy recovery, and many thanks to everyone who attended or participated in this program, God made him in The balance of their good deeds and social programs will continue, God willing.\\r\\n\\r\\n(And the greatest deeds are the pleasure of interfering with a believer)\"}', '1580165583.jpg', 1, NULL, 1, NULL, NULL, '2020-01-27 20:53:03', '2020-01-27 20:53:03'),
(8, '{\"ar\":\"\\u00a0\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"first post\"}', '{\"ar\":\"<p><strong>\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp; &nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp; &nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp; &nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;<\\/strong><\\/p>\\r\\n\\r\\n<hr \\/>\\r\\n<p><strong>\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp; &nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp; &nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp; &nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631<a id=\\\"\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631\\\" name=\\\"\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631\\\"><\\/a> \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;\\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644&nbsp;&nbsp;<\\/strong><\\/p>\\r\\n\\r\\n<hr \\/>\\r\\n<blockquote>\\r\\n<p><a id=\\\"sdsda\\\" name=\\\"sdsda\\\"><\\/a><\\/p>\\r\\n<\\/blockquote>\",\"en\":\"<p><em><strong>first post&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;first post&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;&nbsp;first post&nbsp;<\\/strong><\\/em><\\/p>\"}', '1580393768.png', 1, NULL, 1, NULL, NULL, '2020-01-30 12:16:07', '2020-01-30 12:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Viewable` tinyint(4) DEFAULT 0,
  `page_order` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `description`, `image`, `Viewable`, `page_order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'home', '{\"ar\":\"\\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\",\"en\":\"Home\"}', '{\"en\":null}', '1573565243.png', 1, 2, NULL, '2019-11-06 06:55:02', '2019-12-21 05:07:27'),
(2, 'services', '{\"ar\":\"\\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627\",\"en\":\"Our Services\"}', '{\"en\":null}', '1573030589.jpg', 0, NULL, NULL, '2019-11-06 06:56:29', '2019-11-20 11:22:22'),
(3, 'works', '{\"ar\":\"\\u0627\\u0639\\u0645\\u0627\\u0644\\u0646\\u0627\",\"en\":\"Our Works\"}', '{\"en\":null}', '1573030502.jpg', 1, NULL, NULL, '2019-11-06 07:16:55', '2019-11-20 11:23:25'),
(4, 'news', '{\"ar\":\"\\u0627\\u062e\\u0628\\u0627\\u0631\\u0646\\u0627\",\"en\":\"Our News\"}', '{\"en\":null}', '1574255778.jpg', 1, NULL, NULL, '2019-11-06 06:57:29', '2019-11-20 13:16:18'),
(5, 'about', '{\"ar\":\"\\u0639\\u0646\\u0640\\u0640\\u0640\\u0627\",\"en\":\"About Us\"}', '{\"en\":null}', '1573030738.jpg', 0, NULL, NULL, '2019-11-06 06:58:58', '2019-11-20 11:25:01'),
(6, 'contact', '{\"ar\":\"\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0646\\u0627\",\"en\":\"Contact Us\"}', '{\"en\":null}', '1573564433.jpg', 1, NULL, NULL, '2019-11-06 07:00:20', '2019-11-20 11:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'news-create', 'Create News', 'Create News', '2020-01-28 20:22:45', '2020-01-28 20:22:45'),
(2, 'news-read', 'Read News', 'Read News', '2020-01-28 20:22:45', '2020-01-28 20:22:45'),
(3, 'news-update', 'Update News', 'Update News', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(4, 'news-delete', 'Delete News', 'Delete News', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(5, 'courses-create', 'Create Courses', 'Create Courses', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(6, 'courses-read', 'Read Courses', 'Read Courses', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(7, 'courses-update', 'Update Courses', 'Update Courses', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(8, 'courses-delete', 'Delete Courses', 'Delete Courses', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(9, 'sliders-create', 'Create Sliders', 'Create Sliders', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(10, 'sliders-read', 'Read Sliders', 'Read Sliders', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(11, 'sliders-update', 'Update Sliders', 'Update Sliders', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(12, 'sliders-delete', 'Delete Sliders', 'Delete Sliders', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(13, 'informations-create', 'Create Informations', 'Create Informations', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(14, 'informations-read', 'Read Informations', 'Read Informations', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(15, 'informations-update', 'Update Informations', 'Update Informations', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(16, 'informations-delete', 'Delete Informations', 'Delete Informations', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(17, 'networks-create', 'Create Networks', 'Create Networks', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(18, 'networks-read', 'Read Networks', 'Read Networks', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(19, 'networks-update', 'Update Networks', 'Update Networks', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(20, 'networks-delete', 'Delete Networks', 'Delete Networks', '2020-01-28 20:22:46', '2020-01-28 20:22:46'),
(21, 'studio-create', 'Create Studio', 'Create Studio', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(22, 'studio-read', 'Read Studio', 'Read Studio', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(23, 'studio-update', 'Update Studio', 'Update Studio', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(24, 'studio-delete', 'Delete Studio', 'Delete Studio', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(25, 'permissions-create', 'Create Permissions', 'Create Permissions', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(26, 'permissions-read', 'Read Permissions', 'Read Permissions', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(27, 'permissions-update', 'Update Permissions', 'Update Permissions', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(28, 'permissions-delete', 'Delete Permissions', 'Delete Permissions', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(29, 'roles-create', 'Create Roles', 'Create Roles', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(30, 'roles-read', 'Read Roles', 'Read Roles', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(31, 'roles-update', 'Update Roles', 'Update Roles', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(32, 'roles-delete', 'Delete Roles', 'Delete Roles', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(33, 'settings-create', 'Create Settings', 'Create Settings', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(34, 'settings-read', 'Read Settings', 'Read Settings', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(35, 'settings-update', 'Update Settings', 'Update Settings', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(36, 'settings-delete', 'Delete Settings', 'Delete Settings', '2020-01-28 20:22:47', '2020-01-28 20:22:47'),
(37, 'users-create', 'Create Users', 'Create Users', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(38, 'users-read', 'Read Users', 'Read Users', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(39, 'users-update', 'Update Users', 'Update Users', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(40, 'users-delete', 'Delete Users', 'Delete Users', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(41, 'teachers-create', 'Create Teachers', 'Create Teachers', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(42, 'teachers-read', 'Read Teachers', 'Read Teachers', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(43, 'teachers-update', 'Update Teachers', 'Update Teachers', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(44, 'teachers-delete', 'Delete Teachers', 'Delete Teachers', '2020-01-28 20:22:48', '2020-01-28 20:22:48'),
(45, 'dashboard-read', 'Read Dashboard', 'Read Dashboard', '2020-01-28 20:22:48', '2020-01-28 20:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 1, 'App\\User'),
(3, 1, 'App\\User'),
(4, 1, 'App\\User'),
(5, 1, 'App\\User'),
(6, 1, 'App\\User'),
(7, 1, 'App\\User'),
(8, 1, 'App\\User'),
(9, 1, 'App\\User'),
(10, 1, 'App\\User'),
(11, 1, 'App\\User'),
(12, 1, 'App\\User'),
(13, 1, 'App\\User'),
(14, 1, 'App\\User'),
(15, 1, 'App\\User'),
(16, 1, 'App\\User'),
(17, 1, 'App\\User'),
(18, 1, 'App\\User'),
(19, 1, 'App\\User'),
(20, 1, 'App\\User'),
(21, 1, 'App\\User'),
(22, 1, 'App\\User'),
(23, 1, 'App\\User'),
(24, 1, 'App\\User'),
(25, 1, 'App\\User'),
(26, 1, 'App\\User'),
(27, 1, 'App\\User'),
(28, 1, 'App\\User'),
(29, 1, 'App\\User'),
(30, 1, 'App\\User'),
(31, 1, 'App\\User'),
(32, 1, 'App\\User'),
(33, 1, 'App\\User'),
(34, 1, 'App\\User'),
(35, 1, 'App\\User'),
(36, 1, 'App\\User'),
(37, 1, 'App\\User'),
(38, 1, 'App\\User'),
(39, 1, 'App\\User'),
(40, 1, 'App\\User'),
(41, 1, 'App\\User'),
(42, 1, 'App\\User'),
(43, 1, 'App\\User'),
(44, 1, 'App\\User'),
(45, 1, 'App\\User'),
(1, 2, 'App\\User'),
(2, 2, 'App\\User'),
(3, 2, 'App\\User'),
(4, 2, 'App\\User'),
(45, 2, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `viewable` tinyint(4) DEFAULT 0,
  `viewhome` tinyint(4) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon`, `viewable`, `viewhome`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0647\\u0646\\u062f\\u0633\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629\",\"en\":\"Integrated Engineering Works\"}', '{\"ar\":\"1-\\t \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u062a\\u0635\\u0645\\u064a\\u0645\\u0627\\u062a \\u0627\\u0644\\u0647\\u0646\\u062f\\u0633\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629 (\\u0645\\u0639\\u0645\\u0627\\u0631\\u064a - \\u0625\\u0646\\u0634\\u0627\\u0626\\u064a - \\u0643\\u0647\\u0631\\u0628\\u0627\\u0621 -\\u0645\\u064a\\u0643\\u0627\\u0646\\u064a\\u0643 - \\u0635\\u062d\\u064a) \\u0648\\u064a\\u0642\\u0648\\u0645 \\u0628\\u0647\\u0627 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0634\\u0627\\u0631\\u064a\\u064a\\u0646 \\u0648\\u0627\\u0644\\u0647\\u0646\\u062f\\u0633\\u064a\\u064a\\u0646\\r\\n\\r\\n2-\\t \\u0625\\u0639\\u062f\\u0627\\u062f \\u0627\\u0644\\u0642\\u064a\\u0627\\u0633\\u0627\\u062a \\u0627\\u0644\\u0644\\u0627\\u0632\\u0645\\u0629 \\u0644\\u0631\\u062d\\u0644\\u0629 \\u0645\\u0627 \\u0642\\u0628\\u0644 \\u0627\\u0644\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0648\\u062a\\u062d\\u062f\\u064a\\u062f \\u0627\\u0644\\u0642\\u064a\\u0645\\u0629 \\u0627\\u0644\\u062a\\u0642\\u062f\\u064a\\u0631\\u064a\\u0629 \\u0644\\u062a\\u0643\\u0644\\u0641\\u0629 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639 \\u0627\\u0644\\u0647\\u0646\\u062f\\u0633\\u064a\\u0629 \\u0648\\u0643\\u0630\\u0644\\u0643 \\u0627\\u0644\\u062c\\u062f\\u0627\\u0648\\u0644 \\u0627\\u0644\\u0632\\u0645\\u0646\\u064a\\u0629 \\u0644\\u0644\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0645\\u0631\\u0641\\u0642\\u0627 \\u0628\\u0647\\u0627 \\u0627\\u0644\\u062a\\u062f\\u0641\\u0642\\u0627\\u062a \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0644\\u0627\\u0632\\u0645\\u0629 \\u0644\\u0630\\u0644\\u0643\\r\\n\\r\\n3-\\t\\u0639\\u0645\\u0644 \\u062f\\u0631\\u0627\\u0633\\u0627\\u062a \\u0627\\u0644\\u062c\\u062f\\u0648\\u0649 \\u0644\\u0644\\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0627\\u0644\\u0647\\u0646\\u062f\\u0633\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062e\\u062a\\u0644\\u0641\\u0629\\r\\n\\r\\n4-\\t\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0643\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0634\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0647\\u0646\\u062f\\u0633\\u064a\\u0629 \\u0645\\u0639 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u062d\\u0644\\u0648\\u0644 \\u0645\\u0628\\u062a\\u0643\\u0631\\u0629 \\u0644\\u0644\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0641\\u064a \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0622\\u062a\",\"en\":\"1- Integrated Engineering Designs (Architectural, Structural, electrical, Mechanical and Sanitary) delivered by our engineering team\\r\\n2- Creating the required estimates before construction, estimating the costs of the engineering projects and preparing schedules that usually are attached to the paper work required\\r\\n3- creating feasibility study for various engineering projects\\r\\n4- Consulting all engineering projects, providing creative solutions regarding accomplishment of all types constructions\"}', 'fa-diamond', 0, 1, NULL, '2019-11-05 11:37:04', '2019-12-26 06:37:18'),
(2, '{\"ar\":\"\\u064a\\u0628\\u0644\\u064a\\u0627\",\"en\":null}', '{\"ar\":\"\\u0628\\u064a\\u0644\\u0627\\u064a\\u0627\\u0642\\u0641\",\"en\":null}', 'flaticon-eolic-energy', 0, 0, '2019-11-11 08:43:10', '2019-11-05 11:55:32', '2019-11-11 08:43:10'),
(3, '{\"ar\":\"dsfh\",\"en\":\"fdhgdh\"}', '{\"ar\":\"dfh\",\"en\":\"dfhdsfg\"}', 'flaticon-drawing', 0, 0, '2019-11-11 08:43:22', '2019-11-06 10:13:06', '2019-11-11 08:43:22'),
(4, '{\"ar\":\"dsgh\",\"en\":\"dfhg\"}', '{\"ar\":\"fd\",\"en\":\"dfn\"}', 'flaticon-jigsaw', 0, 0, '2019-11-11 08:43:29', '2019-11-06 10:13:27', '2019-11-11 08:43:29'),
(5, '{\"ar\":\"\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629\",\"en\":\"Integrated Constructions Works\"}', '{\"ar\":\"1- \\u0627\\u0644\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0625\\u0646\\u0634\\u0627\\u0626\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0634\\u0637\\u064a\\u0628\\u0627\\u062a \\u0648\\u0627\\u0644\\u062e\\u0631\\u0633\\u0627\\u0646\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0645\\u064a\\u0643\\u0627\\u0646\\u064a\\u0643\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0643\\u0647\\u0631\\u0628\\u0627\\u0626\\u064a\\u0629 \\u0644\\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0645\\u0628\\u0627\\u0646\\u064a \\u0627\\u0644\\u0633\\u0643\\u0646\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629 \\r\\n2- \\u0625\\u062f\\u0627\\u0631\\u0629 \\u0627\\u0644\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0628\\u0645\\u0627 \\u064a\\u0636\\u0645\\u0646 \\u062c\\u0648\\u062f\\u0629 \\u0627\\u0644\\u0625\\u0646\\u0634\\u0627\\u0621\\u0627\\u062a \\u0628\\u0623\\u0642\\u0644 \\u0627\\u0644\\u062a\\u0643\\u0627\\u0644\\u064a\\u0641\",\"en\":\"1- Civil, finishing, concrete, and electrical works for all residential and commercial buildings.\\r\\n2- Management of the construction works to ensure the best quality and lowest cost.\"}', 'flaticon-engineer', 0, 1, NULL, '2019-11-11 08:44:04', '2019-12-18 15:47:13'),
(6, '{\"ar\":\"\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u064a\\u0629\",\"en\":\"Specialized Contracting Works\"}', '{\"ar\":\"1- \\u0623\\u0639\\u0645\\u0627\\u0644 \\u062a\\u0631\\u0645\\u064a\\u0645 \\u0648\\u062a\\u062f\\u0639\\u064a\\u0645 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0622\\u062a \\u0628\\u062f\\u0621\\u0627\\u064b \\u0645\\u0646 \\u0625\\u0635\\u0644\\u0627\\u062d \\u062a\\u062f\\u0639\\u064a\\u0645 \\u0627\\u0644\\u0639\\u0646\\u0627\\u0635\\u0631 \\u0627\\u0644\\u0625\\u0646\\u0634\\u0627\\u0626\\u064a\\u0629 \\u0645\\u062b\\u0644 \\u0627\\u0644\\u0642\\u0648\\u0627\\u0639\\u062f \\u0648\\u0627\\u0644\\u0623\\u0639\\u0645\\u062f\\u0629 \\u0648\\u0627\\u0644\\u0623\\u0633\\u0642\\u0641 \\u0648\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0628\\u062a\\u062c\\u062f\\u064a\\u062f \\u0627\\u0644\\u0645\\u0628\\u0627\\u0646\\u064a \\u062a\\u062c\\u062f\\u064a\\u062f\\u0627\\u064b \\u0645\\u0639\\u0645\\u0627\\u0631\\u064a\\u0627\\u064b \\u0634\\u0627\\u0645\\u0644\\u0627\\u064b\\r\\n2- \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0622\\u062a \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062a\\u062e\\u0635\\u0635\\u0629 \\u0648\\u0643\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0639\\u062f\\u0646\\u064a\\u0629\\r\\n3- \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0639\\u0632\\u0644 \\u0627\\u0644\\u062d\\u062f\\u064a\\u062b \\u0644\\u0644\\u062d\\u0631\\u0627\\u0631\\u0629 \\u0648\\u0627\\u0644\\u0631\\u0637\\u0648\\u0628\\u0629 \\u0648\\u0627\\u0644\\u0635\\u0648\\u062a \\u0628\\u0623\\u062d\\u062f\\u062b \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0648\\u0643\\u0630\\u0644\\u0643 \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u062f\\u0647\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0625\\u064a\\u0628\\u0648\\u0643\\u0633\\u064a\\u0629\\r\\n4- \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u062a\\u0634\\u0637\\u064a\\u0628\\u0627\\u062a \\u0627\\u0644\\u0645\\u0645\\u064a\\u0632\\u0629 \\u0644\\u0644\\u0642\\u0635\\u0648\\u0631 \\u0648\\u0627\\u0644\\u0641\\u064a\\u0644\\u0627\\u062a \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0637\\u0644\\u0628 \\u0645\\u0633\\u062a\\u0648\\u0649 \\u0645\\u0645\\u064a\\u0632\\u0627\\u064b \\u0641\\u064a \\u0627\\u0644\\u062a\\u0634\\u0637\\u064a\\u0628\\u0627\\u062a\",\"en\":\"1- Repairing and reinforcing constructions; structural elements such as: bases, columns, and ceilings, and carry out a comprehensive, architectural renewal of the buildings\\r\\n2- Projects that include industrial estates and all metal constructions within\\r\\n3- Jobs that cover isolation of heat, moisture and sound using the newest materials\\r\\n4-  Creating the highest standard finishing for places and villas\"}', 'flaticon-allen', 1, 1, NULL, '2019-11-12 13:55:33', '2019-12-18 15:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` text DEFAULT NULL,
  `site_email` varchar(50) DEFAULT NULL,
  `site_email_password` text DEFAULT NULL,
  `site_logo` text DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `maintenance` text DEFAULT NULL,
  `maintenance_message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_email_password`, `site_logo`, `site_description`, `maintenance`, `maintenance_message`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0645\\u0646\\u062a\\u062f\\u064a \\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0627\\u0646\\u064a \\u0627\\u0644\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a\",\"en\":\"Sudanese Pharmaceutical Forum Association (SPFA)\"}', 'anayou2022@gmail.com', 'moez@sabri@almandeel', 'image_157978815014793.jpg', 'kagatti', '1', '{\"ar\":\"\\u0631\\u0633\\u0627\\u0644\\u0629\",\"en\":\"message\"}', '2019-12-28 13:05:21', '2020-01-29 00:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewable` tinyint(4) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `viewable`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\":\"\\u0645\\u0624\\u0633\\u0633\\u0629 \\u062f\\u0627\\u0631 \\u0627\\u0644\\u062c\\u0648\\u0634\\u0646 \\u0644\\u0644\\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a\",\"en\":\"Dar Al-Goshan\"}', '{\"en\":null}', '1577623570.jpg', 2, '2020-01-09 06:23:43', '2019-11-06 07:41:05', '2020-01-09 06:23:43'),
(3, '{\"ar\":\"\\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a \\u0639\\u0627\\u0645\\u0629 \\u0644\\u0644\\u0645\\u0628\\u0627\\u0646\\u064a\",\"en\":\"General Buildings Contractors\"}', '{\"en\":null}', '1577623589.jpg', 3, '2020-01-09 06:23:47', '2019-11-06 07:49:57', '2020-01-09 06:23:47'),
(4, '{\"ar\":\"uyrt\",\"en\":\"xcbncv\"}', '{\"ar\":\"bncx\",\"en\":\"cnv\"}', '1573033819.jpg', 0, '2019-11-12 13:34:09', '2019-11-06 07:50:19', '2019-11-12 13:34:09'),
(5, '{\"ar\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 \\u0628\\u0643 \\u0641\\u064a\",\"en\":\"Welcome\"}', '{\"en\":null}', '1577303720.jpg', 5, '2020-01-23 12:15:36', '2019-11-12 13:45:55', '2020-01-23 12:15:36'),
(6, '{\"ar\":\"first\",\"en\":\"first\"}', '{\"ar\":\"first\",\"en\":\"first\"}', '1576910525.jpg', 1, '2019-12-21 04:51:35', '2019-12-21 04:42:05', '2019-12-21 04:51:35'),
(7, '{\"en\":null}', '{\"en\":null}', '1579788966.jpg', 1, NULL, '2020-01-23 12:16:06', '2020-01-23 12:16:06'),
(8, '{\"en\":null}', '{\"en\":null}', '1579788980.jpg', 2, NULL, '2020-01-23 12:16:20', '2020-01-23 12:16:20'),
(9, '{\"en\":null}', '{\"en\":null}', '1580166724.jpg', 9, NULL, '2020-01-27 21:11:21', '2020-01-27 21:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '1578558663.jpg', '2019-12-20 17:50:55', '2020-01-09 06:31:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `description`, `created_at`, `updated_at`, `image`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u0631\\u0633 2\",\"en\":\"teacher 1\"}', '{\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u0631\\u0633 1\",\"en\":\"teacher1\"}', '2020-01-15 21:23:50', '2020-01-15 21:45:53', '1579131953.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `job`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"ar\":\"\\u0645\\u062d\\u0645\\u062f\",\"en\":\"mohammed\"}', '{\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631\",\"en\":\"CEO\"}', '1577480941.jpg', '2019-12-27 19:01:48', '2019-12-27 19:09:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_level` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `version`, `secret_level`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'جرام', NULL, NULL, NULL, 'جرامات', NULL, '2019-10-10 11:54:43', '2019-10-10 12:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduation_Date` date DEFAULT NULL,
  `university` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjective` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'Member',
  `status` tinyint(4) DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `country`, `name`, `password`, `email`, `graduation_Date`, `university`, `adjective`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'super', '0123456789', 'Sudan (‫السودان‬‎)', 'superAdmin', '$2y$10$vRrdlZjB061A6avfa47Y4eWSlVhGBYqNXqe1W0KXX2dnpJ1VtZL8y', 'test@test.com', '2020-01-29', 'fhldkfhlkdsfjlkjds', 'SuperAmin', 1, NULL, NULL, '2020-01-28 20:22:45', '2020-01-28 20:32:15'),
(2, 'moez', '0123456799', 'Sudan (‫السودان‬‎)', 'معز صبري', '$2y$10$N3VJUQnoo/tV9a2BGlmYp.KpfAaWU85RZcoUKvvH6uf9nbGmnwnO2', NULL, '2020-01-09', 'السودان', 'Member', 1, NULL, NULL, '2020-01-29 16:59:04', '2020-02-07 11:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewable` tinyint(1) DEFAULT 0,
  `viewhome` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `name`, `description`, `category_id`, `image`, `viewable`, `viewhome`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0644\\u064a\\u0628\\u0644\\u064a\\u0628\",\"en\":\"sdfsdfasdf\"}', '{\"ar\":\"\\u0627\\u0644\\u0644\\u0647\",\"en\":\"sfd\"}', NULL, 'C:\\wamp64\\tmp\\phpC6E9.tmp', 0, 0, '2019-11-05 10:40:24', '2019-11-03 08:18:10', '2019-11-05 10:40:24'),
(2, '{\"ar\":\"fg\",\"en\":null}', '{\"ar\":\"df\",\"en\":null}', NULL, '1572956419.jpg', 0, 0, '2019-11-05 10:31:52', '2019-11-05 10:20:19', '2019-11-05 10:31:52'),
(3, '{\"ar\":\"yhfg\",\"en\":null}', '{\"ar\":\"fgdryetru\",\"en\":null}', NULL, '1572957692.jpg', 0, 1, '2019-11-11 08:44:38', '2019-11-05 10:40:12', '2019-11-11 08:44:38'),
(4, '{\"ar\":\"kjhkjhkjhkjh\",\"en\":null}', '{\"ar\":\"lklkjljlkjlkj\",\"en\":null}', NULL, '1573305552.jpg', 0, 0, '2019-11-09 13:19:20', '2019-11-09 13:19:12', '2019-11-09 13:19:20'),
(5, '{\"ar\":\"\\u0645\\u0643\\u0627\\u062a\\u0628 \\u0627\\u0644\\u0628\\u0646\\u0643 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a \\u0644\\u0644\\u0625\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631\",\"en\":\"Head Office of Saudi Investment Bank\"}', '{\"ar\":\"\\u0627\\u0644\\u0645\\u0643\\u0627\\u0646: \\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0645\\u0639\\u0630\\u0631 - \\u062d\\u064a \\u0627\\u0644\\u0648\\u0632\\u0627\\u0631\\u0627\\u062a \\r\\n\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0639\\u0645\\u0644: \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0647\\u064a\\u0643\\u0644\\u064a\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0626\\u064a\\u0629 \\r\\n\\u0627\\u0644\\u0645\\u062f\\u0629: 5 \\u0623\\u0634\\u0647\\u0631 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629: 2000 \\u06452\",\"en\":\"Location: Prince ma\\u2019azr St. - wzarat District \\r\\nwork type: Civil Work With materials\\r\\nDuration: 5 Months \\r\\nArea: 2000 m2\"}', NULL, '1573817413.jpg', 0, 0, '2019-12-25 18:53:58', '2019-11-15 11:30:13', '2019-12-25 18:53:58'),
(6, '{\"ar\":\"\\u0639\\u0645\\u0627\\u0631\\u0629 \\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\",\"en\":\"Four Residential Palaces\"}', '{\"ar\":\"\\u0627\\u0644\\u0645\\u0643\\u0627\\u0646: \\u062d\\u064a \\u0627\\u0644\\u0646\\u0632\\u0647\\u0629 \\r\\n\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0639\\u0645\\u0644: \\u0645\\u0641\\u062a\\u0627\\u062d \\r\\n\\u0627\\u0644\\u0645\\u062f\\u0629: 13 \\u0623\\u0634\\u0647\\u0631 \\r\\n\\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629: 13000 \\u06452\",\"en\":\"Location: Prince Turki Road - Hittin Dist\\r\\nwork type: Civil Work With materials\\r\\nDuration: 10 Months \\r\\nArea: 13000 m2\"}', NULL, '1573817756.jpg', 0, 0, '2019-11-20 05:51:42', '2019-11-15 11:35:56', '2019-11-20 05:51:42'),
(7, '{\"ar\":\"\\u0645\\u0628\\u0627\\u0646\\u064a \\u0633\\u0643\\u0646\\u064a\\u0629 \\u0645\\u0648\\u0642\\u0639 \\u0628\\u0631\\u0634\\u0627\\u0639\\u0629 \\u0628\\u0627\\u0644\\u062a\\u0639\\u0627\\u0648\\u0646 \\u0645\\u0639 \\u0634\\u0631\\u0643\\u0629 \\u0627\\u0644\\u0631\\u0627\\u0634\\u062f\",\"en\":\"Residential buildings at Bershah with Al Rashid company\"}', '{\"ar\":\"\\u0627\\u0644\\u0645\\u0643\\u0627\\u0646: \\u0628\\u0631\\u0634\\u0627\\u0639\\u0629 \\r\\n\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0639\\u0645\\u0644: \\u0639\\u0636\\u0645 \\u0645\\u0635\\u0646\\u0639\\u064a\\u0627\\u062a \\r\\n\\u0627\\u0644\\u0645\\u062f\\u0629: 6 \\u0623\\u0634\\u0647\\u0631 \\r\\n\\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629: 20000 \\u06452\",\"en\":\"Location: Bershah \\r\\nwork type: based on the bone\\r\\nDuration: 6 Months \\r\\nArea: 20000 m2\"}', NULL, '1573817878.jpg', 0, 0, '2019-11-20 05:51:26', '2019-11-15 11:37:58', '2019-11-20 05:51:26'),
(8, '{\"ar\":\"\\u0627\\u0644\\u0639\\u0645\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":null}', '{\"en\":null}', NULL, '1577308049.jpg', 0, 0, '2019-12-27 18:10:56', '2019-12-25 19:07:29', '2019-12-27 18:10:56'),
(9, '{\"ar\":\"\\u0627\\u0644\\u0639\\u0645\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"\\u0627\\u0644\\u0639\\u0645\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\"}', '{\"en\":null}', NULL, '1577308080.jpg', 0, 0, '2019-12-27 18:10:59', '2019-12-25 19:08:00', '2019-12-27 18:10:59'),
(10, '{\"ar\":\"\\u0627\\u0644\\u0639\\u0645\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"\\u0627\\u0644\\u0639\\u0645\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\"}', '{\"en\":null}', NULL, '1577308094.jpg', 0, 0, '2019-12-27 18:22:13', '2019-12-25 19:08:14', '2019-12-27 18:22:13'),
(11, '{\"ar\":\"\\u0634\\u0627\\u0645\\u064a\\u0627\\u062a \\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629\",\"en\":\"shamiat\"}', '{\"ar\":\"\\u0634\\u0627\\u0645\\u064a\\u0627\\u062a \\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629\",\"en\":\"shamiat\"}', 4, '1577477376.jpg', 0, 0, NULL, '2019-12-27 18:09:36', '2019-12-27 18:17:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `course_bookings`
--
ALTER TABLE `course_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_pages_idx` (`page_id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networks`
--
ALTER TABLE `networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author_id`),
  ADD KEY `author_2` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_bookings`
--
ALTER TABLE `course_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `networks`
--
ALTER TABLE `networks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_bookings`
--
ALTER TABLE `course_bookings`
  ADD CONSTRAINT `course_bookings_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_details_pages` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
