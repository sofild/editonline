-- phpMyAdmin SQL Dump
-- version 4.0.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2013 at 07:34 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `editonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `editlog`
--

CREATE TABLE IF NOT EXISTS `editlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `pcate` int(1) DEFAULT '1',
  `path` varchar(255) DEFAULT NULL,
  `fpath` varchar(255) DEFAULT NULL,
  `opentime` datetime DEFAULT NULL,
  `closetime` datetime DEFAULT NULL,
  `isopen` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `editlog`
--

INSERT INTO `editlog` (`id`, `uid`, `pcate`, `path`, `fpath`, `opentime`, `closetime`, `isopen`) VALUES
(6, 1, 1, '../test.php', '../files/20130912/165159_test.php', '2013-09-12 16:51:59', NULL, 0),
(65, 1, 1, '../files/20130913/160340_ttt.txt', '../files/20130918/152328_160340_ttt.txt', '2013-09-18 15:23:28', NULL, 1),
(64, 1, 1, '../files/20130910/ttt.txt', '../files/20130918/151356_ttt.txt', '2013-09-18 15:13:56', NULL, 1),
(63, 1, 1, '../test/index.html', '../files/20130918/151242_index.html', '2013-09-18 15:12:42', NULL, 1),
(11, 1, 1, '../note.txt', '../files/20130912/173526_note.txt', '2013-09-12 17:35:26', NULL, 0),
(12, 1, 1, '../note.txt', '../files/20130913/135441_note.txt', '2013-09-13 13:54:41', NULL, 0),
(13, 1, 1, 'http://www.baidu.com', '../files/20130913/135455_20130913.html', '2013-09-13 13:54:55', NULL, 0),
(14, 1, 3, '../files/20130913/143828_ttt.txt', '../files/20130913/143828_143828_ttt.txt', '2013-09-13 14:38:28', NULL, 0),
(62, 1, 1, '../test/test.php', '../files/20130918/122054_test.php', '2013-09-18 12:20:54', NULL, 1),
(61, 1, 1, '../files/20130910/new_ttt.txt', '../files/20130918/122019_new_ttt.txt', '2013-09-18 12:20:19', NULL, 1),
(17, 1, 3, '../files/20130913/154304_ttt.txt', '../files/20130913/154304_154304_ttt.txt', '2013-09-13 15:43:04', NULL, 0),
(18, 1, 1, '../note.txt', '../files/20130913/154954_note.txt', '2013-09-13 15:49:54', NULL, 0),
(19, 1, 2, 'http://www.baidu.com', '../files/20130913/155103_20130913.html', '2013-09-13 15:51:03', NULL, 0),
(20, 1, 1, '../test/test.php', '../files/20130913/155140_test.php', '2013-09-13 15:51:40', NULL, 0),
(21, 1, 1, '../files/20130910/ttt.txt', '../files/20130913/160340_ttt.txt', '2013-09-13 16:03:40', NULL, 0),
(22, 1, 1, '../files/20130910/new_ttt.txt', '../files/20130913/160346_new_ttt.txt', '2013-09-13 16:03:46', NULL, 0),
(60, 1, 1, '../test/index.html', '../files/20130918/121736_index.html', '2013-09-18 12:17:36', NULL, 0),
(59, 1, 1, '../note.txt', '../files/20130917/180440_note.txt', '2013-09-17 18:04:40', NULL, 0),
(58, 1, 1, '../note.txt', '../files/20130917/180157_note.txt', '2013-09-17 18:01:57', NULL, 0),
(26, 1, 1, '../note.txt', '../files/20130913/160730_note.txt', '2013-09-13 16:07:30', NULL, 0),
(27, 1, 1, '../test/test.php', '../files/20130913/160748_test.php', '2013-09-13 16:07:48', NULL, 0),
(28, 1, 1, '../test/test.php', '../files/20130913/161405_test.php', '2013-09-13 16:14:05', NULL, 0),
(29, 1, 1, '../test/index.html', '../files/20130913/161415_index.html', '2013-09-13 16:14:15', NULL, 0),
(57, 1, 1, '../test/test.php', '../files/20130917/180117_test.php', '2013-09-17 18:01:17', NULL, 0),
(56, 1, 1, '../test/test.php', '../files/20130917/175947_test.php', '2013-09-17 17:59:47', NULL, 0),
(34, 1, 1, '../files/20130910/ttt.txt', '../files/20130913/164223_ttt.txt', '2013-09-13 16:42:23', NULL, 0),
(55, 1, 1, '../test/test.php', '../files/20130917/175223_test.php', '2013-09-17 17:52:23', NULL, 0),
(54, 1, 1, '../note.txt', '../files/20130917/174102_note.txt', '2013-09-17 17:41:02', NULL, 0),
(49, 1, 1, '../test/test.php', '../files/20130916/175746_test.php', '2013-09-16 17:57:46', NULL, 0),
(50, 1, 1, '../note.txt', '../files/20130916/175809_note.txt', '2013-09-16 17:58:09', NULL, 0),
(51, 1, 1, '../test/test.php', '../files/20130917/164131_test.php', '2013-09-17 16:41:31', NULL, 0),
(52, 1, 1, '../note.txt', '../files/20130917/164141_note.txt', '2013-09-17 16:41:41', NULL, 0),
(53, 1, 1, '../test/test.php', '../files/20130917/174053_test.php', '2013-09-17 17:40:53', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `edituser`
--

CREATE TABLE IF NOT EXISTS `edituser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `grade` int(2) DEFAULT '1',
  `lasttime` datetime DEFAULT NULL,
  `lastip` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `edituser`
--

INSERT INTO `edituser` (`id`, `username`, `password`, `grade`, `lasttime`, `lastip`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, '2013-09-18 09:11:49', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
