-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2019 at 11:18 AM
-- Server version: 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_list`
--

DROP TABLE IF EXISTS `action_list`;
CREATE TABLE IF NOT EXISTS `action_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `z_forenkey_ibfk_1` (`user_id`),
  KEY `z_forenkey_ibfk_2` (`designation`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_list`
--

INSERT INTO `action_list` (`id`, `designation`, `created_at`, `user_id`) VALUES
(1, 'General Manager', '2018-08-08 02:53:26', 1),
(2, 'Manager', '2018-07-25 20:38:25', 1),
(3, 'Asst. Manager', '2018-07-25 20:38:25', 1),
(4, 'Principal Scientist', '2018-07-25 20:38:25', 1),
(5, 'Senior Scientist', '2018-07-25 20:38:25', 1),
(6, 'Scientist', '2018-07-25 20:38:25', 1),
(7, 'Engineer', '2018-07-25 20:38:25', 1),
(8, 'Asst. Engineer', '2018-07-25 20:38:25', 1),
(9, 'Technical Assistant', '2018-07-25 20:38:25', 1),
(10, 'Personal Assistant', '2018-07-25 20:38:25', 1),
(11, 'Office Assistant', '2018-07-25 20:38:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dms_category`
--

DROP TABLE IF EXISTS `dms_category`;
CREATE TABLE IF NOT EXISTS `dms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` mediumtext NOT NULL,
  `cat_by` varchar(5) NOT NULL,
  `cat_date` datetime NOT NULL,
  `cat_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dms_category`
--

INSERT INTO `dms_category` (`id`, `cat_title`, `cat_by`, `cat_date`, `cat_status`) VALUES
(8, 'CAT1', '7', '2018-08-29 12:57:11', 'true'),
(9, 'ITRA', '7', '2018-08-29 12:59:48', 'true'),
(10, 'OMS_2', '7', '2018-08-29 13:00:09', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `dms_data`
--

DROP TABLE IF EXISTS `dms_data`;
CREATE TABLE IF NOT EXISTS `dms_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_title` mediumtext NOT NULL,
  `doc_category` varchar(255) DEFAULT NULL,
  `doc_task` varchar(255) DEFAULT NULL,
  `doc_by` varchar(15) NOT NULL,
  `doc_date` datetime NOT NULL,
  `doc_version` varchar(5) DEFAULT '1',
  `doc_path` mediumtext NOT NULL,
  `doc_status` varchar(15) NOT NULL DEFAULT 'New',
  `doc_remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dms_data`
--

INSERT INTO `dms_data` (`id`, `doc_title`, `doc_category`, `doc_task`, `doc_by`, `doc_date`, `doc_version`, `doc_path`, `doc_status`, `doc_remarks`) VALUES
(1, 'one', 'Office forms', 'TASK 1', '7', '2018-08-27 18:28:24', '3', 'Documents/CAT1/20180827182755-1805.08615.pdf', 'New', 'Majority of urban commuters prefer cabs due to easy accessibility. A big fraction of these cabs are managed by web-based cab operators, who provide the service to commuters through a mobile application. Sometimes, the drivers of these cabs swindle the customers by over-charging them for the journey.'),
(2, 'document\r\n\r\ntwo', 'Office forms', 'TASK 1', '10', '2018-08-27 18:28:24', '1', 'Documents/CAT1/20180827182755-1807.03515.pdf', 'New', ''),
(3, 'document \r\n\r\n three', 'CAT1', 'TASK 1', '10', '2018-08-27 18:28:24', '1', 'Documents/CAT1/20180827182755-20180808153745710.doc', 'New', ''),
(5, 'DDDDD', 'CAT1', 'My task 5', '7', '2018-08-28 12:37:37', '1', 'Documents/CAT1/20180828123730-20180808153745710.doc', 'New', 'Remarks'),
(6, 'dfg', 'CAT1', 'TASK 1', '7', '2018-08-28 14:23:28', '1', 'Documents/CAT1/20180828142318-1807.03515.pdf', 'New', ''),
(7, 'jhkh', 'CAT1', 'TASK 1', '10', '2018-08-28 14:31:23', '1', 'Documents/CAT1/20180828143117-1807.03515.pdf', 'New', ''),
(8, 'dfhfd', 'CAT1', 'TASK 1', '7', '2018-08-29 12:35:15', '1', 'Documents/CAT1/20180829123509-print_institutional.php', 'New', ''),
(9, 'ds', 'CAT1', 'TASK 1', '7', '2018-08-29 12:41:27', '2', 'Documents/CAT1/20180829124003-index.php', 'New', ''),
(10, 'ds', 'CAT1', 'TASK 1', '7', '2018-08-29 12:41:47', '1', 'Documents/CAT1/20180829124003-index.php', 'New', ''),
(11, 'one', 'CAT1', 'My task 5', '7', '2018-08-29 15:12:17', '1', 'Documents/CAT1/20180829151157-_publication_of_closed_projects.docx', 'New', 'Majority of urban commuters prefer cabs due to easy accessibility. A big fraction of these cabs are managed by web-based cab operators, who provide the service to commuters through a mobile application. Sometimes, the drivers of these cabs swindle the customers by over-charging them for the journey.'),
(12, 'one', 'CAT1', 'MIS data', '7', '2018-08-29 15:50:18', '2', 'Documents/CAT1/20180829155010-_publication_of_closed_projects.docx', 'New', 'Majority of urban commuters prefer cabs due to easy accessibility. A big fraction of these cabs are managed by web-based cab operators, who provide the service to commuters through a mobile application. Sometimes, the drivers of these cabs swindle the customers by over-charging them for the journey.'),
(13, 'Sample document', 'OMS_2', 'My task 5', '7', '2018-08-30 12:53:07', '1', 'Documents/OMS_2/20180830125247-print.php', 'New', 'ITRA 5 Majority of urban commuters prefer cabs due to easy accessibility. A big fraction of these cabs are managed by web-based cab operators, who provide the service to commuters through a mobile application. Sometimes, the drivers of these cabs swindle the customers by over-charging them for the journey.'),
(14, 'Documents  IT Funds ', 'OMS_2', 'My task 5', '7', '2018-09-10 15:27:38', '1', 'Documents/OMS_2/20180910152451-1805.08615.pdf', 'New', 'Documents  IT Funds'),
(15, ' Documents  IT status ', 'OMS_2', 'My task 5', '7', '2018-09-30 15:27:38', '1', 'Documents/OMS_2/20180910152451-1807.03515.pdf', 'New', 'Documents  IT Funds'),
(16, 'my file', 'OMS_2', 'My task 5', '7', '2019-06-05 15:49:15', '1', 'Documents/OMS_2/20190605154837-Avinash ITRA Payslip March 2019.pdf', 'New', 'sfd');

-- --------------------------------------------------------

--
-- Table structure for table `dms_permission`
--

DROP TABLE IF EXISTS `dms_permission`;
CREATE TABLE IF NOT EXISTS `dms_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `doc_view` varchar(5) DEFAULT NULL,
  `doc_download` varchar(5) DEFAULT NULL,
  `doc_remove` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dms_permission`
--

INSERT INTO `dms_permission` (`id`, `doc_id`, `doc_view`, `doc_download`, `doc_remove`) VALUES
(1, 1, 'true', 'true', 'true'),
(2, 2, 'true', '', ''),
(3, 3, '', 'true', 'true'),
(4, 4, 'true', 'true', 'true'),
(5, 5, '', 'true', 'true'),
(6, 6, 'true', 'true', 'true'),
(7, 7, 'true', 'true', ''),
(8, 8, 'true', 'true', ''),
(9, 9, 'true', 'true', 'true'),
(10, 10, 'true', 'true', 'true'),
(11, 11, 'true', 'true', 'true'),
(12, 12, 'true', 'true', ''),
(13, 13, 'true', 'true', 'true'),
(14, 14, 'true', 'true', ''),
(15, 15, 'true', 'true', ''),
(16, 16, 'true', 'true', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `events_data`
--

DROP TABLE IF EXISTS `events_data`;
CREATE TABLE IF NOT EXISTS `events_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_date` datetime NOT NULL,
  `events_by` varchar(7) NOT NULL,
  `events_title` text NOT NULL,
  `events_body` mediumtext,
  `events_category` varchar(7) DEFAULT NULL,
  `events_status` varchar(7) DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_data`
--

INSERT INTO `events_data` (`id`, `events_date`, `events_by`, `events_title`, `events_body`, `events_category`, `events_status`) VALUES
(1, '2018-09-11 07:15:28', '7', 'dfgdfg', '', 'past', 'false'),
(2, '2018-10-11 05:16:00', '7', 'Ocober 11 event ', '', 'past', 'true'),
(3, '2018-09-11 00:00:00', '7', 'events_category', '', 'past', 'false'),
(4, '2018-09-11 00:00:00', '7', 'dd', '', 'past', 'false'),
(5, '2018-09-28 06:11:15', '7', 'THis is Database Events ', '', 'past', 'true'),
(6, '2018-09-11 00:00:00', '7', 'cvnhvc', 'events_category events_category  events_category    ', 'past', 'true'),
(7, '2018-09-11 00:00:00', '7', 'bnbnvbmnbmbn', '', 'past', 'true'),
(8, '2018-09-09 00:00:00', '7', 'rter', 'drtr', 'past', 'true'),
(9, '2018-09-09 06:25:00', '7', 'nmbn', 'vbnbv', 'past', 'true'),
(10, '2018-09-20 00:00:00', '7', 'fg', 'fgh', 'past', 'true'),
(28, '2018-10-16 05:15:00', '7', 'Add Event Title', '<p>Add Event Title</p>\r\n', 'past', 'true'),
(12, '2018-09-30 01:55:00', '7', 'Title _ Title', 'Title', 'past', 'true'),
(13, '2018-11-21 05:55:00', '7', 'THis is November Events ', 'hh', 'past', 'true'),
(17, '2018-09-28 09:55:00', '7', 'ITRA EVENTS', '<p>ITRA EVENTS</p>\r\n', 'past', 'true'),
(16, '2018-09-28 11:55:00', '7', 'sdfg', '<p>dsfg</p>\r\n', 'past', 'true'),
(18, '2018-10-18 09:55:00', '7', 'fghfg', '<p>fgh</p>\r\n', 'past', 'true'),
(37, '2018-11-23 09:55:00', '7', 'zfs aassd', '', 'past', 'true'),
(38, '2018-11-05 09:55:00', '7', 'Weakly meeting ', '<p>Hi all plese join for the Weakly meeting in conference hall&nbsp;</p>\r\n', 'past', 'true'),
(20, '2018-09-29 05:55:00', '7', 'fdfh', '<p>fdh</p>\r\n', 'past', 'true'),
(21, '2018-09-30 05:55:00', '7', 'asdf', '<p>asf</p>\r\n', 'past', 'true'),
(26, '2018-10-23 05:55:00', '7', 'dfgjk', '<p>jhaklsjhflkh</p>\r\n', 'past', 'true'),
(25, '2018-09-30 05:55:00', '7', 'gfh', '<p>fgh</p>\r\n', 'past', 'true'),
(27, '2018-10-07 15:15:00', '7', 'This is My October 7 Event 2018 ', '<p>This is My October 7 Event 2018&nbsp;</p>\r\n', 'past', 'true'),
(39, '2019-04-09 05:46:00', '7', ' ,m', '<p>bvm</p>\r\n', 'past', 'true'),
(36, '2018-11-28 05:55:00', '7', 'hfm f', '', 'past', 'true'),
(35, '2018-10-31 09:55:00', '7', 'dfhfgd fdg', '', 'past', 'true'),
(31, '2018-10-19 04:25:00', '7', 'Title 5', '<p>Title&nbsp;</p>\r\n', 'past', 'true'),
(32, '2018-10-26 04:25:00', '7', 'dfh dfh ', '<p>df</p>\r\n', 'past', 'true'),
(33, '2018-11-15 04:25:00', '7', 'saf', '<p>saf</p>\r\n', 'future', 'false'),
(34, '2018-11-08 09:55:00', '7', 'Content 8 nov', '<p>fsd</p>\r\n', 'past', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `leaves_available`
--

DROP TABLE IF EXISTS `leaves_available`;
CREATE TABLE IF NOT EXISTS `leaves_available` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(25) NOT NULL,
  `laeve_amount` varchar(25) NOT NULL,
  `laeve_comment` varchar(255) DEFAULT NULL,
  `laeve_status` varchar(25) NOT NULL DEFAULT 'Active',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves_available`
--

INSERT INTO `leaves_available` (`id`, `leave_type`, `laeve_amount`, `laeve_comment`, `laeve_status`, `user_id`) VALUES
(1, 'EL', '1', NULL, 'Active', 7),
(2, 'CL', '8', NULL, 'Active', 7),
(3, 'RH', '2', NULL, 'Active', 7),
(4, 'CL', '20', '', 'Active', 19),
(6, 'EL', '2', '', 'Active', 2),
(7, 'RH', '5', 'ugf PL ', 'Active', 9),
(8, 'CL', '1', '', 'Active', 10),
(9, 'EL', '2', '', 'Active', 10);

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

DROP TABLE IF EXISTS `leave_applications`;
CREATE TABLE IF NOT EXISTS `leave_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `leave_type` varchar(15) DEFAULT NULL,
  `leave_days` varchar(5) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `leave_prefix` tinytext,
  `leave_returnday` date DEFAULT NULL,
  `leave_remarks` mediumtext,
  `leave_forward` varchar(15) DEFAULT NULL,
  `leave_status` varchar(25) NOT NULL DEFAULT 'New',
  `on_date` date DEFAULT NULL,
  `Comments` tinytext,
  `extra` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `user_id`, `leave_type`, `leave_days`, `leave_from`, `leave_to`, `leave_prefix`, `leave_returnday`, `leave_remarks`, `leave_forward`, `leave_status`, `on_date`, `Comments`, `extra`) VALUES
(1, 7, 'CL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', NULL, NULL, NULL),
(2, 7, 'CL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', NULL, NULL, NULL),
(3, 7, 'CL', '4', '2018-10-02', '2018-10-11', 'qwe', NULL, 'awe', '7', 'New', NULL, NULL, NULL),
(4, 7, 'CL', '4', '2018-10-02', '2018-10-11', 'qwe', '2018-10-11', 'awe', '10', 'Approve', NULL, NULL, NULL),
(5, 7, 'CL', '4', '2018-10-02', '2018-10-11', 'qwe', '2018-10-11', 'awe', '10', 'New', NULL, NULL, NULL),
(6, 9, 'EL', '5', '2018-10-02', '2018-10-11', 'qwe', '2018-10-11', 'awe', '7', 'Approve', '2018-10-02', 'Comments', NULL),
(7, 10, 'EL', '5', '2018-10-22', '2018-10-26', 'try', '2018-10-29', 'rty', '7', 'New', '2018-10-02', NULL, NULL),
(8, 7, 'EL', '5', '2018-10-22', '2018-10-26', 'try', '2018-10-29', 'rty', '10', 'Revoke', '2018-10-02', NULL, NULL),
(9, 7, 'EL', '5', '2018-10-22', '2018-10-26', 'try', '2018-10-29', 'rty', '10', 'Revoke', '2018-10-02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'avimehta.mehta@gmail.com', '57euHi1hhkNMsHXsyuqsdRToRSQI0VmjleLiKqqFtp5Yuim8Hrhgb9P', '2018-11-12 09:59:19'),
(2, 'avimehta.mehta@gmail.com', 'ZnrGZx7vKecbS2rHmODe0KPDlumTP88uYd4ApBFBs2sELai7Hm8QqnM', '2018-11-12 10:33:00'),
(3, 'avimehta.mehta@gmail.com', 'jTFBwUcEOcsNxh4V688oUovTBtJojCXU1I7fMpKX0inrDs2dPa5UrKk', '2018-11-12 11:35:30'),
(4, 'ipsm@ipsm.ipsm', 'WvHxwazJslheYZAmBlrDkzRekLHOoVzE4otLOdzisMohT5aYIWuouMz', '2018-11-12 11:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `task_assign`
--

DROP TABLE IF EXISTS `task_assign`;
CREATE TABLE IF NOT EXISTS `task_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_ID` int(11) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `on_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assign`
--

INSERT INTO `task_assign` (`id`, `task_ID`, `assign_to`, `on_date`) VALUES
(7, 5, '7', '2018-08-16 16:31:46'),
(6, 1, '7', '2018-08-16 16:31:33'),
(4, 6, '7', '2018-08-16 16:09:09'),
(5, 5, '7', '2018-08-16 16:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

DROP TABLE IF EXISTS `task_list`;
CREATE TABLE IF NOT EXISTS `task_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` mediumtext NOT NULL,
  `created_by` varchar(155) NOT NULL,
  `on_date` datetime NOT NULL,
  `status` mediumtext,
  `task_type` varchar(55) NOT NULL DEFAULT 'parent',
  `associated` varchar(955) NOT NULL DEFAULT 'self',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `task_name`, `created_by`, `on_date`, `status`, `task_type`, `associated`) VALUES
(1, 'TASK 1', 'ipsm@ipsm.ipsm', '2018-08-11 15:01:12', 'true', 'parent', 'self'),
(2, 'My Task 2', 'ipsm@ipsm.ipsm', '2018-08-11 15:01:42', 'true', 'parent', 'self'),
(3, 'My Task 3', 'ipsm@ipsm.ipsm', '2018-08-11 15:09:10', 'true', 'parent', 'self'),
(4, 'My Task 4', 'ipsm@ipsm.ipsm', '2018-08-11 15:13:42', 'true', 'parent', 'self'),
(5, 'MIS data', 'ipsm@ipsm.ipsm', '2018-08-11 15:58:50', 'true', 'sub', 'My Task 1'),
(6, 'My task 5', 'ipsm@ipsm.ipsm', '2018-08-11 16:00:07', 'true', 'parent', 'self');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

DROP TABLE IF EXISTS `task_status`;
CREATE TABLE IF NOT EXISTS `task_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_ID` int(11) NOT NULL,
  `task_name` mediumtext NOT NULL,
  `subtask_name` mediumtext NOT NULL,
  `task_remarks` mediumtext,
  `task_status` mediumtext,
  `timespent` time DEFAULT NULL,
  `on_date` datetime DEFAULT NULL,
  `assign_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `task_ID`, `task_name`, `subtask_name`, `task_remarks`, `task_status`, `timespent`, `on_date`, `assign_to`) VALUES
(1, 6, 'My task 5', '', '', '', '00:00:00', '2018-08-16 16:09:09', '7'),
(2, 5, 'My Task 1', 'MIS data', 'hh', 'hh', NULL, '2018-08-16 16:09:18', '7'),
(3, 1, 'My Task 2', '', '<p>vhfggh</p>\r\n', NULL, NULL, '2018-08-16 16:31:33', '7'),
(4, 5, 'My Task 3', 'MIS data', '<p>hgfghfgh gfjhg&nbsp;</p>\r\n', 'Pending with self (ipsm)', '05:02:00', '2018-08-16 16:31:46', '1'),
(5, 5, '5', '5', '<p>hgfghfgh gfjhg&nbsp;</p>\r\n', 'Pending with self (ipsm)', '05:02:00', '2018-08-16 16:58:09', '1'),
(6, 5, 'MIS data', 'My Task 1', '<p>hgfghfgh gfjhg&nbsp;</p>\r\n', 'Pending with self (ipsm)', '05:02:00', '2018-08-16 17:05:34', '1'),
(7, 5, 'MIS data', 'My Task 1', '<p>hgfghfgh gfjhg&nbsp;</p>\r\n', 'Pending with self (ipsm)', '05:02:00', '2018-08-16 17:08:00', '1'),
(8, 5, 'My Task 4', 'MIS data', '<p>hgfghfgh gfjhg&nbsp;</p>\r\n', 'Pending with self (ipsm)', '05:02:00', '2018-08-16 17:11:34', '1'),
(9, 1, 'self', 'My Task 1', '<p>tttttttt</p>\r\n', 'Complete', '06:25:00', '2018-08-16 17:12:16', '7'),
(10, 1, 'self', 'My Task 1', '<p>tttttttt</p>\r\n', 'Complete', '06:25:00', '2018-08-16 17:12:56', '7'),
(18, 1, '', '', NULL, NULL, NULL, NULL, ''),
(19, 6, 'My task 3', '', '<p>ime Spent on the Task ( in Hrs for eg: 01:05)&nbsp;</p>\r\n', 'Complete', '01:15:00', '2018-08-28 14:24:23', '7'),
(13, 1, 'My Task 6', '', '<p>tttttttt</p>\r\n', 'Complete', '06:25:00', '2018-08-15 17:13:54', '7'),
(14, 0, 'Data Analysis ', 'Other', '<p> Data Analysis  Data Analysis  Data Analysis   Data Analysis  Data Analysis  </p>\r\n', 'Pending with self (ipsm)', '05:02:00', '2018-08-16 17:41:13', '7'),
(15, 6, 'My task 3', '', '<p>THis is my My Task 5 latest&nbsp;</p>\r\n', 'Complete', '05:00:00', '2018-08-16 17:46:19', '7'),
(16, 1, 'My Task 4', '', '<p>ghfg</p>\r\n', 'Complete', '05:00:00', '2018-08-16 17:51:41', '7'),
(17, 5, 'My Task 4', 'MIS data', '', 'Complete', '06:25:00', '2018-08-16 17:52:13', '7'),
(20, 5, 'My Task 2', 'MIS data', '<p>zsfsdhgb nghj&nbsp; futy u</p>\r\n', 'Complete', '01:05:00', '2018-08-28 14:28:46', '7'),
(21, 5, 'My Task 1', 'MIS data', '<p>zsfsdhgb nghj&nbsp; futy u</p>\r\n', 'Complete', '01:05:00', '2018-08-28 14:29:15', '7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastlogin_at` timestamp NULL DEFAULT NULL,
  `role` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT 'disable',
  `log_count` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `active` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `lastlogin_at`, `role`, `designation`, `status`, `log_count`, `active`) VALUES
(2, 'test', 'teat@teat.com', '$2y$10$lNXzYBohZ3SnB8IvTKz9qudjHMjU4hbno9mhf7jh/043NzEmh6XHC', '2HK7yrC3RLCSjh14ciVYF56pHzZdAxSJAtM9wKrlbthr7ZbhKdfLE2QDrzU3', '2018-07-25 20:38:25', '2018-07-25 20:38:25', '2018-11-05 08:52:46', 'guest', '', 'enable', '2', 'Yes'),
(7, 'ipsm', 'ipsm@admin.com', '$2y$10$NUSxEsuv90VkQ6L1BCXxgekKDxP.7lEW3666KKJt7q15ytwujuKfW', 'YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq', '2018-08-08 06:20:40', '2019-06-05 11:16:48', '2019-06-05 11:17:52', 'admin', 'General Manager', 'enable', '87', 'Yes'),
(1, 'ipsm2', 'ipsm@ipsm.ipsm2', '$2y$10$nzqx/bqK1OcwVWlc1mKQGeG8YO009wDVHGmt2UC4ok1/ojK/KkAcy', 'YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq', '2018-08-13 07:11:48', '2018-08-13 07:11:48', '2018-08-13 07:11:48', 'guest', 'General Manager', 'enable', '0', 'Yes'),
(9, 'Index123', 'Index123@gm.com', '$2y$10$JIbauqVllOYiPrUtZRM5w.tW.FXVIjG3EuxGXAGNHUQ4Gw6TOoiAW', 'YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq', '2018-08-13 07:12:07', '2018-08-13 07:12:07', '2018-08-13 07:12:07', 'guest', 'Manager', 'enable', '0', 'Yes'),
(10, 'Avinash', 'avimehta.mehta@gmail.com', '$2y$10$yeni1dI07aFHvcXHogeG.ePJGHDNO1im43vZ6rSW3sg6ixEwFP..i', 'YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq', '2018-08-13 08:04:40', '2018-11-12 11:47:50', '2018-11-12 11:47:24', 'guest', 'HR', 'enable', '10', 'Yes'),
(20, 'FFF', 'FFF@FFF.FFF', '$2y$10$8QxZblilE4EDJIUqCr2vNOrA0jofPTTzLeOw2utXUg9ZHBLvcDT.G', 'YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq', '2018-12-21 07:25:42', '2018-12-21 07:25:42', '2018-12-31 07:14:05', 'guest', 'General Manager', 'enable', '3', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users_description`
--

DROP TABLE IF EXISTS `users_description`;
CREATE TABLE IF NOT EXISTS `users_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `about` mediumtext,
  `contact` varchar(15) DEFAULT NULL,
  `location` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_description`
--

INSERT INTO `users_description` (`id`, `users_id`, `about`, `contact`, `location`) VALUES
(1, 7, '<p>Opportunistic or Delay-tolerant networks (DTNs) may be used as a viable option for exchanging situational information during post-disaster communication in the absence of existing communication infrastructure. As opposed to traditional communication networks, situational information dissemination in DTNs depends on the degree of intermittent connectivity among the mobile nodes. Higher degree of connectivity implies smaller delay to disseminate situational information which results in better knowledge sharing. The degree of intermittent connectivity is influenced by mobility pattern of the nodes which is heterogeneous in nature.</p>\r\n', '8988058729', 'VPO Sullah '),
(8, 20, NULL, NULL, NULL),
(7, 19, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_reporting`
--

DROP TABLE IF EXISTS `users_reporting`;
CREATE TABLE IF NOT EXISTS `users_reporting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_report_to_id` int(11) NOT NULL,
  `user_report_by_id` int(11) NOT NULL,
  `user_status` varchar(15) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_reporting`
--

INSERT INTO `users_reporting` (`id`, `user_report_to_id`, `user_report_by_id`, `user_status`) VALUES
(16, 7, 20, 'Active'),
(11, 2, 9, 'Active'),
(10, 2, 19, 'Active'),
(9, 2, 7, 'Active'),
(8, 9, 7, 'Active'),
(15, 9, 10, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
CREATE TABLE IF NOT EXISTS `user_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `permission` varchar(5) NOT NULL DEFAULT 'off',
  `status` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fng` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_id`, `name`, `permission`, `status`) VALUES
(1, 7, 'view_profile', 'on', 'View Profile'),
(2, 7, 'update_profile', 'on', 'Update Pofile'),
(3, 7, 'change_password', 'on', 'Change Password'),
(4, 7, 'view_task', 'on', 'View Task'),
(5, 7, 'update_task', 'on', 'Update Task'),
(6, 7, 'task_summary', 'on', 'Task Summary'),
(7, 7, 'Create_task', 'on', 'Create Task'),
(8, 7, 'view_document', 'on', 'View Documents '),
(9, 7, 'add_document', 'on', 'Add Documents'),
(10, 7, 'update_document', 'on', 'Update Document'),
(11, 7, 'apply_leaves', 'on', 'Apply for Leaves '),
(12, 7, 'view_leaves', 'on', 'View Leaves '),
(13, 7, 'history_leaves', 'on', 'Leaves History'),
(14, 7, 'add_leaves', 'on', 'Add Leaves to user account '),
(15, 7, 'view_calender', 'on', 'View Calender'),
(16, 7, 'add_events', 'on', 'Add Events'),
(17, 7, 'upcoming_events', 'on', 'Upcoming Events'),
(18, 7, 'past_events', 'on', 'Past Events'),
(19, 7, 'search_people', 'on', 'Update User reporting & password'),
(20, 7, 'task_assign', 'on', 'Assign Task'),
(21, 7, 'add_Category', 'on', 'Add Category'),
(22, 7, 'View_Download', 'on', 'View Download'),
(23, 7, 'Events_disp', 'on', 'Events Display at app. Sections '),
(24, 7, 'Aby_user', 'on', 'Accessibility Control By User'),
(25, 7, 'Aby_apps', 'on', 'Accessibility Control By Applications'),
(26, 20, 'view_profile', 'on', 'View Profile'),
(27, 20, 'update_profile', 'on', 'Update Pofile'),
(28, 20, 'change_password', 'on', 'Change Password'),
(29, 20, 'view_task', 'on', 'View Task'),
(30, 20, 'update_task', 'on', 'Update Task'),
(31, 20, 'task_summary', 'on', 'Task Summary'),
(32, 20, 'Create_task', 'on', 'Create Task'),
(33, 20, 'view_document', 'on', 'View Documents '),
(34, 20, 'add_document', 'on', 'Add Documents'),
(35, 20, 'update_document', 'on', 'Update Document'),
(36, 20, 'apply_leaves', 'on', 'Apply for Leaves '),
(37, 20, 'view_leaves', 'on', 'View Leaves '),
(38, 20, 'history_leaves', 'on', 'Leaves History'),
(39, 20, 'add_leaves', 'on', 'Add Leaves to user account '),
(40, 20, 'view_calender', 'on', 'View Calender'),
(41, 20, 'add_events', 'on', 'Add Events'),
(42, 20, 'upcoming_events', 'on', 'Upcoming Events'),
(43, 20, 'past_events', 'on', 'Past Events'),
(44, 20, 'search_people', 'on', 'Update User reporting & password'),
(45, 20, 'task_assign', 'on', 'Assign Task'),
(46, 20, 'add_Category', 'on', 'Add Category'),
(47, 20, 'View_Download', 'on', 'View Download'),
(48, 20, 'Events_disp', 'on', 'Events Display at app. Sections '),
(49, 20, 'Aby_user', 'off', 'Accessibility Control By User'),
(50, 20, 'Aby_apps', 'off', 'Accessibility Control By Applications');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
