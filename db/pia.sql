-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 07:57 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pia`
--

-- --------------------------------------------------------

--
-- Table structure for table `pia_activities`
--

CREATE TABLE IF NOT EXISTS `pia_activities` (
`id` bigint(20) unsigned NOT NULL,
  `clientid` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `client_email` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `agent_name` varchar(500) DEFAULT NULL,
  `prospect_owner` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `Subject` varchar(600) DEFAULT NULL,
  `due_date` varchar(500) DEFAULT NULL,
  `time` varchar(500) DEFAULT NULL,
  `section_name` varchar(500) DEFAULT NULL,
  `activity_1` date DEFAULT NULL,
  `activity_2` date DEFAULT NULL,
  `activity_3` date DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `pia_activities`
--

INSERT INTO `pia_activities` (`id`, `clientid`, `client_email`, `agent_name`, `prospect_owner`, `status`, `type`, `Subject`, `due_date`, `time`, `section_name`, `activity_1`, `activity_2`, `activity_3`, `note`, `date_time`) VALUES
(10, '258823', 'sanjaybhatt300@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'call', 'new', '2016-03-11 22:36', '', 'auto', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '2016-03-11 00:26:15'),
(15, '258823', 'sanjaybhatt300@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'call', 'My activity12', '2016-04-01 00:50', '', 'auto', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '2016-03-11 01:12:07'),
(17, '207516', 'sanjay12.bhatt@virtuemantra.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'other', 'new test', '2016-03-11 00:50', '', 'enter', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '2016-03-11 00:51:01'),
(18, '207516', 'sanjay12.bhatt@virtuemantra.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'notes', NULL, NULL, NULL, 'enter', NULL, NULL, NULL, 'ddssd', '2016-03-11 00:51:20'),
(19, '207516', 'sanjay12.bhatt@virtuemantra.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'call', 'new', '2016-03-12 00:51', '', 'enter', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '2016-03-11 00:51:39'),
(25, '676127', 'sanjaybhatt299@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'call', 'new', '2016-03-11 01:06', '', 'auto', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '2016-03-11 01:07:05'),
(27, '676127', 'sanjaybhatt299@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'notes', NULL, NULL, NULL, 'auto', NULL, NULL, NULL, 'Add a note about this prospect.', '2016-03-11 01:08:38'),
(29, '258823', 'sanjaybhatt300@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'notes', NULL, NULL, NULL, 'auto', NULL, NULL, NULL, 'Add a note about this prospect.', '2016-03-11 03:05:16'),
(32, '258823', 'sanjaybhatt300@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'notes', NULL, NULL, NULL, 'auto', NULL, NULL, NULL, 'Hlo', '2016-03-11 03:09:26'),
(33, '258823', 'sanjaybhatt300@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'notes', NULL, NULL, NULL, 'auto', NULL, NULL, NULL, 'hiiiiiiii', '2016-03-11 03:09:48'),
(34, '258823', 'sanjaybhatt300@gmail.com', 'sanjay bhatt', 'sanjay.bhatt@virtuemantra.com', 'Recall', 'notes', NULL, NULL, NULL, 'auto', NULL, NULL, NULL, 'hi hlo', '2016-03-11 03:10:07'),
(36, '882819', 'admin1@gmail.com', 'admin1', 'sanjaybhatt300@gmail.com', 'Recall', NULL, NULL, NULL, NULL, 'enter', '2016-03-14', '2016-03-19', '0000-00-00', NULL, '2016-03-12 03:53:14'),
(37, '882819', 'admin1@gmail.com', 'admin1', 'sanjaybhatt300@gmail.com', 'Recall', 'call', 'tetsting', '2016-03-12 04:57', '', 'enter', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '2016-03-12 04:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `pia_client`
--

CREATE TABLE IF NOT EXISTS `pia_client` (
`id` bigint(20) NOT NULL,
  `clientid` varchar(50) DEFAULT NULL,
  `firstname` varchar(350) DEFAULT NULL,
  `lastname` varchar(350) DEFAULT NULL,
  `email` varchar(350) DEFAULT NULL,
  `insurer` varchar(350) DEFAULT NULL,
  `actualpremium` varchar(50) DEFAULT NULL,
  `offeredpremium` varchar(50) DEFAULT NULL,
  `effectivedate` date DEFAULT NULL,
  `status` varchar(350) DEFAULT NULL,
  `comment` longtext,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `pia_client`
--

INSERT INTO `pia_client` (`id`, `clientid`, `firstname`, `lastname`, `email`, `insurer`, `actualpremium`, `offeredpremium`, `effectivedate`, `status`, `comment`, `date_time`) VALUES
(19, 'Client 1', 'Test', 'Last', 'admin@gmail.com', 'Insurer2', 'test', 'cap2', '2016-02-22', 'status2', '1,2,3', '2016-02-22 03:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `pia_client_id`
--

CREATE TABLE IF NOT EXISTS `pia_client_id` (
`id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `pia_client_id`
--

INSERT INTO `pia_client_id` (`id`, `email`, `date_time`) VALUES
(31, 'bec_dir@yahoo.com', '2016-04-21 00:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `pia_files`
--

CREATE TABLE IF NOT EXISTS `pia_files` (
`id` bigint(20) unsigned NOT NULL,
  `file_name` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `file_path` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `Modifier` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pia_files`
--

INSERT INTO `pia_files` (`id`, `file_name`, `file_path`, `Modifier`, `email`, `tags`, `description`, `date_time`) VALUES
(1, 'CompleteSortedClientList_ForRyan_2-12-16.xlsx', 'uploads/CompleteSortedClientList_ForRyan_2-12-16.xlsx', NULL, NULL, NULL, NULL, '2016-02-22 04:35:44'),
(2, 'Complete41.xlsx', 'uploads/22275.xlsx', NULL, NULL, '', '', '2016-04-19 15:59:41'),
(7, 'exported-data-12.csv', 'uploads/62959.csv', 'admin', NULL, NULL, NULL, '2016-02-22 05:56:31'),
(8, 'exported-data-12.csv', 'uploads/27130.csv', 'admin', NULL, NULL, NULL, '2016-02-22 05:58:48'),
(9, 'Numbers_Format.xlsx', 'uploads/70225.xlsx', 'admin', NULL, NULL, NULL, '2016-02-22 05:58:55'),
(11, 'exported-data-12.csv', 'uploads/44357.csv', 'admin', NULL, '', '', '2016-02-23 00:08:43'),
(13, 'exported-data-123.csv', 'uploads/6806.csv', 'admin', NULL, '', '', '2016-02-22 07:08:33'),
(14, 'www.xlsx', 'uploads/48141.csv', 'admin', NULL, '', '', '2016-02-22 07:08:24'),
(20, 'Sample data format1.xlsx', 'uploads/45035.xlsx', 'test', NULL, NULL, NULL, '2016-04-20 02:08:08'),
(23, 'Project Overview & Freelancer Selection.pdf', 'uploads/34973.pdf', 'test', NULL, NULL, NULL, '2016-04-20 02:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `pia_leads`
--

CREATE TABLE IF NOT EXISTS `pia_leads` (
`id` bigint(20) unsigned NOT NULL,
  `clientid` varchar(50) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(350) DEFAULT NULL,
  `products` varchar(350) DEFAULT NULL,
  `insurer` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `Others` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Capitale` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `effectivedate` date DEFAULT NULL,
  `activity1` varchar(444) DEFAULT NULL,
  `activity2` varchar(444) DEFAULT NULL,
  `activity3` varchar(444) DEFAULT NULL,
  `email_note` date DEFAULT NULL,
  `renewal_date` date DEFAULT NULL,
  `renewal_date1` date DEFAULT NULL,
  `renewal_date3` date DEFAULT NULL,
  `status` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `referral_id` varchar(599) DEFAULT NULL,
  `agent_name` varchar(500) DEFAULT NULL,
  `notes` longtext CHARACTER SET latin1,
  `section_name` varchar(400) DEFAULT NULL,
  `Questions` longtext,
  `auto_doc` varchar(500) DEFAULT NULL,
  `home_doc` varchar(500) DEFAULT NULL,
  `enter_doc` varchar(500) DEFAULT NULL,
  `prospect_owner` varchar(500) DEFAULT NULL,
  `update_status` varchar(500) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `pia_leads`
--

INSERT INTO `pia_leads` (`id`, `clientid`, `firstname`, `lastname`, `email`, `phone`, `products`, `insurer`, `Others`, `Capitale`, `effectivedate`, `activity1`, `activity2`, `activity3`, `email_note`, `renewal_date`, `renewal_date1`, `renewal_date3`, `status`, `referral_id`, `agent_name`, `notes`, `section_name`, `Questions`, `auto_doc`, `home_doc`, `enter_doc`, `prospect_owner`, `update_status`, `type`, `date_time`) VALUES
(84, '207516', 'testing', 'last', 'sanjay12.bhatt@virtuemantra.com', '34334433443,Work,', 'Moto', 'SSQ', '12121221', '212121212', '2015-05-13', '2016-03-20 11:55:44', 'none', 'none', NULL, '2016-05-13', NULL, NULL, 'Premium Gap', NULL, 'sanjay bhatt', 'Write a Note.....', 'auto', 'chkbox1_auto,chkbox2_auto,chkbox5_auto', 'upload_prospects/5727.docx', NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-20 15:55:44'),
(85, '207516', 'testing', 'last', 'sanjay12.bhatt@virtuemantra.com', '34334433443,Work,', 'CC', 'Unique', '222', '2', '2016-03-19', '2016-03-20 11:55:44', 'none', 'none', NULL, '2017-03-19', NULL, NULL, 'Recall', NULL, 'sanjay bhatt', 'Write a Note.....', 'enter', 'chkbox4_enter', NULL, NULL, '', 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-20 15:55:44'),
(92, '676127', 'dfdf', 'dfdf', 'sanjaybhatt299@gmail.com', '34334433443,Work,', 'VT', 'SSQ', '12121221', '212121212', '2016-03-12', '2016-03-09', 'none', 'none', NULL, '2016-05-02', NULL, NULL, 'Recall', NULL, 'sanjay bhatt', 'Write a Note.....', 'auto', '', '', NULL, NULL, 'sanjaybhatt299@gmail.com', '0', NULL, '2016-03-07 22:31:20'),
(96, '258823', 'new', 'bhatt1111', 'sanjaybhatt300@gmail.com', '34334433443,Work,', 'VT', 'Unique', '1212', '212121212', '2016-03-24', '2016-03-13', '2016-03-18', 'none', NULL, '2017-03-24', NULL, NULL, 'Recall', NULL, 'sanjay bhatt', 'Write a Note.....', 'auto', '', '', NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-11 02:57:47'),
(97, '258823', 'new', 'bhatt1111', 'sanjaybhatt300@gmail.com', '34334433443,Work,', 'LO', '', '123', '4567', '2016-04-07', '2016-03-13', '2016-03-18', '2016-03-31', NULL, '2017-03-24', NULL, NULL, 'Refused', NULL, 'sanjay bhatt', 'Write a Note.....', 'home', 'chkbox5_home', NULL, NULL, 'upload_prospects/47442.docx', 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-11 02:57:47'),
(98, '10575', 'firstname', 'lastname', 'sanjay@gmail.com', '123456789,Work,', 'VT', '', '', '', '2015-05-09', '2016-03-12 03:46:52', 'none', 'none', NULL, '2016-05-09', NULL, NULL, 'Client', 'referral_id', 'admin1', 'notes', 'auto', '', NULL, NULL, NULL, 'sanjaybhatt300@gmail.com', '1', NULL, '2016-03-12 03:46:52'),
(99, '1111', 'Test', 'user', 'test@gmail.com', '98764267,Work,', 'PO', 'ABC', 'Copm1', 'Capitale1', '2016-04-14', '2016-03-13', '2016-03-18', '2016-04-07', NULL, '2017-04-14', NULL, NULL, 'Recall', '', 'sanjay bhatt', '', 'auto', '', NULL, NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-11 04:29:57'),
(100, '1111', 'Test', 'user', 'test@gmail.com', '98764267,Work,', 'JY', 'DHG', 'Comp2', 'Capitale1', '1969-12-31', '2016-03-11 04:29:57', 'none', 'none', NULL, '2017-04-14', NULL, NULL, 'Client', '', 'sanjay bhatt', '', 'home', '', NULL, NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-11 04:29:57'),
(101, '882819', 'admin1', 'agent', 'admin1@gmail.com', '11212,Cell,Day', 'VTT', 'Alpha', '23232', '23232323', '2016-03-10', '2016-03-12 03:53:14', 'none', 'none', NULL, '2017-03-10', NULL, NULL, 'Premium Gap', NULL, 'admin1', 'Write a Note.....', 'auto', 'chkbox4_auto,chkbox5_auto', '', NULL, NULL, 'sanjaybhatt300@gmail.com', '2', NULL, '2016-03-12 03:53:14'),
(102, '882819', 'admin1', 'agent', 'admin1@gmail.com', '11212,Cell,Day', 'MGA', 'Alpha', '222', '3333', '2016-04-02', '2016-03-14', '2016-03-19', 'none', NULL, '2017-04-02', NULL, NULL, 'Recall', NULL, 'admin1', 'Write a Note.....', 'enter', 'chkbox3_enter', NULL, NULL, 'upload_prospects/66793.docx', 'sanjaybhatt300@gmail.com', '1', NULL, '2016-03-12 03:53:14'),
(103, '759371', 'nayab', 'bukhari', 'bec_dir@yahoo.com', '64897315789+897,Home,Day', 'Moto', 'Alpha', '456', '78', '2016-02-10', '2016-03-20 10:50:36', 'none', 'none', NULL, '2017-02-10', NULL, NULL, 'Premium Gap', NULL, 'sanjay bhatt', 'Write a Note.....', 'auto', 'chkbox1_auto,chkbox2_auto,chkbox3_auto,chkbox4_auto', 'upload_prospects/24133.pdf', NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', NULL, '2016-03-20 14:50:36'),
(104, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', 'test', 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, 'sanjaybhatt299@gmail.com', '1', 'import', '2016-04-18 12:30:27'),
(105, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', 'test', '', 'auto', NULL, NULL, NULL, NULL, 'sanjaybhatt299@gmail.com', '1', 'import', '2016-04-18 12:30:27'),
(106, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', 'test', '', 'home', NULL, NULL, NULL, NULL, 'sanjaybhatt299@gmail.com', '1', 'import', '2016-04-18 12:30:27'),
(107, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', 'sanjay bhatt', 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', 'import', '2016-04-18 12:37:58'),
(108, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', '', '', 'auto', NULL, NULL, NULL, NULL, 'sanjaybhatt299@gmail.com', '1', 'import', '2016-04-18 12:37:58'),
(109, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', '', '', 'home', NULL, NULL, NULL, NULL, 'sanjaybhatt300@gmail.com', '1', 'import', '2016-04-18 12:37:59'),
(110, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', 'sanjay bhatt', 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', 'import', '2016-04-18 12:38:59'),
(111, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', '', '', 'auto', NULL, NULL, NULL, NULL, 'sanjaybhatt300@gmail.com', '1', 'import', '2016-04-18 12:38:59'),
(112, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', 'test', '', 'home', NULL, NULL, NULL, NULL, 'sanjaybhatt299@gmail.com', '1', 'import', '2016-04-18 12:38:59'),
(113, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', NULL, 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-19 22:53:12'),
(114, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', NULL, '', 'auto', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-19 22:53:12'),
(115, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', NULL, '', 'home', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-19 22:53:12'),
(116, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', NULL, 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-20 12:00:10'),
(117, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', 'sanjay bhatt', '', 'auto', NULL, NULL, NULL, NULL, 'sanjay.bhatt@virtuemantra.com', '1', 'import', '2016-04-20 12:00:10'),
(118, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', NULL, '', 'home', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-20 12:00:10'),
(119, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', NULL, 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-21 09:42:34'),
(120, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', NULL, '', 'auto', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-21 09:42:34'),
(121, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', NULL, '', 'home', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-21 09:42:34'),
(122, 'clientid', 'firstname', 'lastname', 'email', 'phone', 'Products', 'Insurer', 'Comp', 'Capitale', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', 'referral_id', NULL, 'notes', 'section_name(important)', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-21 09:42:47'),
(123, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'PO', 'ABC', 'Copm1', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recall', '', NULL, '', 'auto', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-21 09:42:47'),
(124, '1111', 'Test', 'user', 'test@gmail.com', '98764267', 'JY', 'DHG', 'Comp2', 'Capitale1', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Client', '', NULL, '', 'home', NULL, NULL, NULL, NULL, NULL, '2', 'import', '2016-04-21 09:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `pia_login`
--

CREATE TABLE IF NOT EXISTS `pia_login` (
`id` bigint(20) NOT NULL,
  `username` varchar(350) DEFAULT NULL,
  `password` varchar(350) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `agent_id` varchar(500) DEFAULT NULL,
  `role` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `d_o_b` varchar(500) DEFAULT NULL,
  `user_photo` varchar(500) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `status` varchar(400) DEFAULT NULL,
  `permissions` varchar(500) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pia_login`
--

INSERT INTO `pia_login` (`id`, `username`, `password`, `email`, `agent_id`, `role`, `phone`, `d_o_b`, `user_photo`, `path`, `status`, `permissions`, `date_time`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', '', 'SUPER ADMINISTRATORS', '111111', '2016-02-04', '', 'upload/41599.jpg', 'active', 'Dashboard,Prospects,Work Plan,History,Commissions,Email Notifications,People,Scholaris,Document Management,Deals', '2016-02-23 05:10:38'),
(4, 'sanjay bhatt', '827ccb0eea8a706c4c34a16891f84e7b', 'sanjay.bhatt@virtuemantra.com', 'age00026', 'AGENTS', '90', '1969-12-31', '13520.jpg', 'upload/13520.jpg', 'active', 'Dashboard,Prospects,Work Plan,History,Commissions,Email Notifications,People,Users Management,Scholaris,Document Management,Deals', '2016-03-11 03:47:05'),
(5, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'sanjaybhatt299@gmail.com', '', 'SUPERVISORS', '123', '1970-01-07', '', 'upload/27448.jpg', 'active', 'Dashboard,Prospects,Work Plan,History,Commissions,Email Notifications,People,Scholaris,Document Management,Deals', '2016-03-01 03:32:16'),
(9, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'sanjaybhatt300@gmail.com', 'age0001', 'AGENTS', NULL, NULL, '', 'upload/50720.jpg', 'active', 'Dashboard,Prospects,Work Plan,History,Commissions,Email Notifications,People,Scholaris,Document Management,Deals', '2016-05-02 10:00:48'),
(10, 'test-supervisor', '8277e0910d750195b448797616e091ad', 'sanjaybha301@gmail.com', 'age0002', 'AGENTS', NULL, NULL, '', 'upload/22936.jpg', 'active', 'Dashboard,Prospects,Work Plan,History,Commissions,Email Notifications,People,Scholaris,Document Management,Deals', '2016-05-02 10:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `pia_login_history`
--

CREATE TABLE IF NOT EXISTS `pia_login_history` (
`id` bigint(20) unsigned NOT NULL,
  `username` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `role` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `ip_address` varchar(500) DEFAULT NULL,
  `user_agent` varchar(400) CHARACTER SET latin1 DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- Dumping data for table `pia_login_history`
--

INSERT INTO `pia_login_history` (`id`, `username`, `email`, `role`, `ip_address`, `user_agent`, `date_time`) VALUES
(248, 'test', 'sanjaybhatt299@gmail.com', 'SUPERVISORS', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0', '2016-04-29 14:14:03'),
(249, 'test', 'sanjaybhatt299@gmail.com', 'SUPERVISORS', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0', '2016-05-02 10:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `pia_m_client_product`
--

CREATE TABLE IF NOT EXISTS `pia_m_client_product` (
`id` bigint(20) NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pia_m_client_question`
--

CREATE TABLE IF NOT EXISTS `pia_m_client_question` (
`id` bigint(20) NOT NULL,
  `clientid` bigint(20) DEFAULT NULL,
  `questionid` bigint(20) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pia_people`
--

CREATE TABLE IF NOT EXISTS `pia_people` (
`id` bigint(20) unsigned NOT NULL,
  `people_id` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(350) DEFAULT NULL,
  `address` varchar(350) DEFAULT NULL,
  `city` varchar(350) CHARACTER SET latin1 DEFAULT NULL,
  `zip` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Prospect_Status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Customer_Status` varchar(500) DEFAULT NULL,
  `tags` longtext,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `pia_people`
--

INSERT INTO `pia_people` (`id`, `people_id`, `firstname`, `lastname`, `email`, `phone`, `address`, `city`, `zip`, `Prospect_Status`, `Customer_Status`, `tags`, `date_time`) VALUES
(22, '9876', 'Nayab', 'Bukhari', 'bec_dir@yahoo.com', '45678978954,Home,Morning', 'Bukhari House, Bukhari Town, College Road, Ghafoorabad, Chiniot', 'Chiniot', '35400', 'Non Prospect', 'Non Customer', 'New Customer,nayab', '2016-04-19 22:47:09'),
(23, '097890798asdf098', 'Nayab', 'Bukhari', 'bec_dir@yahoo.com', '089089080,Home,Morning', 'Bukhari House, Bukhari Town, College Road, Ghafoorabad, Chiniot', 'Chiniot', '35400', 'Lost Prospect', 'Customer', 'nayab', '2016-04-20 11:59:53'),
(25, '1111', '98764267', 'Test', 'test@gmail.com', 'Test', 'Test', 'PO', '654', 'Capitale1', 'fine', 'Recall', '2016-04-20 13:30:42'),
(30, 'people_id', 'firstname', 'lastname', 'email', 'phone', 'Address', 'City', 'zip', 'c_status', 'Prospect_Status', 'tags', '2016-04-20 13:33:22'),
(31, '1111', '98764267', 'Test', 'test@gmail.com', 'Test', 'Test', 'PO', '654', 'Capitale1', 'fine', 'Recall', '2016-04-20 13:33:22'),
(32, '1112', '98764268', 'Test1', 'test@gmail.com', 'Test1', 'Test1', 'JY', '1234', 'Capitale1', 'dull', 'Client', '2016-04-20 13:33:22'),
(33, 'people_id', 'firstname', 'lastname', 'email', 'phone', 'Address', 'City', 'zip', 'c_status', 'Prospect_Status', 'tags', '2016-04-20 14:20:15'),
(34, '1111', '98764267', 'Test', 'test@gmail.com', 'Test', 'Test', 'PO', '654', 'Capitale1', 'fine', 'Recall', '2016-04-20 14:20:15'),
(35, '1112', '98764268', 'Test1', 'test@gmail.com', 'Test1', 'Test1', 'JY', '1234', 'Capitale1', 'dull', 'Client', '2016-04-20 14:20:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pia_activities`
--
ALTER TABLE `pia_activities`
 ADD PRIMARY KEY (`id`), ADD KEY `clientid` (`clientid`), ADD KEY `agent_name` (`agent_name`(255)), ADD KEY `prospect_owner` (`prospect_owner`(255));

--
-- Indexes for table `pia_client`
--
ALTER TABLE `pia_client`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pia_client_id`
--
ALTER TABLE `pia_client_id`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pia_files`
--
ALTER TABLE `pia_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pia_leads`
--
ALTER TABLE `pia_leads`
 ADD PRIMARY KEY (`id`), ADD KEY `client_email` (`email`), ADD KEY `effective_date` (`effectivedate`), ADD KEY `renewal_date` (`renewal_date`), ADD KEY `product_status` (`status`), ADD KEY `agent_name` (`agent_name`(255)), ADD KEY `prospect_owner` (`prospect_owner`(255)), ADD KEY `update_status` (`update_status`(255));

--
-- Indexes for table `pia_login`
--
ALTER TABLE `pia_login`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `user_email` (`email`), ADD KEY `agent_id` (`agent_id`), ADD KEY `user_role` (`role`), ADD KEY `active_status` (`status`), ADD KEY `user_permissions` (`permissions`);

--
-- Indexes for table `pia_login_history`
--
ALTER TABLE `pia_login_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pia_m_client_product`
--
ALTER TABLE `pia_m_client_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pia_m_client_question`
--
ALTER TABLE `pia_m_client_question`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pia_people`
--
ALTER TABLE `pia_people`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pia_activities`
--
ALTER TABLE `pia_activities`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pia_client`
--
ALTER TABLE `pia_client`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pia_client_id`
--
ALTER TABLE `pia_client_id`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pia_files`
--
ALTER TABLE `pia_files`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pia_leads`
--
ALTER TABLE `pia_leads`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `pia_login`
--
ALTER TABLE `pia_login`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pia_login_history`
--
ALTER TABLE `pia_login_history`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `pia_m_client_product`
--
ALTER TABLE `pia_m_client_product`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pia_m_client_question`
--
ALTER TABLE `pia_m_client_question`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pia_people`
--
ALTER TABLE `pia_people`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
