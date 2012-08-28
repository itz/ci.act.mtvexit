# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.5.16
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-08-28 16:21:30
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table mtvexit.act_counter
CREATE TABLE IF NOT EXISTS `act_counter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `section` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `data_values` int(10) DEFAULT '0',
  `date_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

# Dumping data for table mtvexit.act_counter: 1 rows
/*!40000 ALTER TABLE `act_counter` DISABLE KEYS */;
INSERT INTO `act_counter` (`id`, `section`, `data_values`, `date_update`) VALUES
	(1, 'pageview', 29, '2012-08-28 16:01:26'),
	(2, 'video', 1, '2012-08-28 15:15:20'),
	(3, 'downloadToolKit', 1, '2012-08-28 15:24:47'),
	(4, 'goToFBEvents', 0, '2012-08-28 15:25:45'),
	(5, 'tweeting', 1, '2012-08-28 15:42:13'),
	(6, 'fbLikes', 0, '2012-08-28 16:18:11');
/*!40000 ALTER TABLE `act_counter` ENABLE KEYS */;


# Dumping structure for table mtvexit.act_toolkit
CREATE TABLE IF NOT EXISTS `act_toolkit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tool_name` varchar(50) DEFAULT NULL,
  `tool_email` varchar(255) DEFAULT NULL,
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mtvexit.act_toolkit: 0 rows
/*!40000 ALTER TABLE `act_toolkit` DISABLE KEYS */;
/*!40000 ALTER TABLE `act_toolkit` ENABLE KEYS */;


# Dumping structure for table mtvexit.act_tweet
CREATE TABLE IF NOT EXISTS `act_tweet` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `from_id` int(20) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `ent_media` varchar(255) DEFAULT NULL,
  `ent_urls` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mtvexit.act_tweet: 0 rows
/*!40000 ALTER TABLE `act_tweet` DISABLE KEYS */;
/*!40000 ALTER TABLE `act_tweet` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
