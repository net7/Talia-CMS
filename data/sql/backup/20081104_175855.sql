-- MySQL dump 10.11
--
-- Host: localhost    Database: sf_diorio
-- ------------------------------------------------------
-- Server version	5.0.32-Debian_7etch6-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(255) default NULL,
  `tree_left` int(11) default NULL,
  `tree_right` int(11) default NULL,
  `tree_parent` int(11) default NULL,
  `topic_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category_i18n`
--

DROP TABLE IF EXISTS `product_category_i18n`;
CREATE TABLE `product_category_i18n` (
  `name` varchar(255) default NULL,
  `description` text,
  `id` int(11) NOT NULL,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY  (`id`,`culture`),
  CONSTRAINT `product_category_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category_i18n`
--

LOCK TABLES `product_category_i18n` WRITE;
/*!40000 ALTER TABLE `product_category_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_category_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_i18n`
--

DROP TABLE IF EXISTS `product_i18n`;
CREATE TABLE `product_i18n` (
  `name` varchar(255) default NULL,
  `description` text,
  `id` int(11) NOT NULL,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY  (`id`,`culture`),
  CONSTRAINT `product_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_i18n`
--

LOCK TABLES `product_i18n` WRITE;
/*!40000 ALTER TABLE `product_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group`
--

DROP TABLE IF EXISTS `sf_guard_group`;
CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_guard_group_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
INSERT INTO `sf_guard_group` VALUES (1,'admin','Administrator group');
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

DROP TABLE IF EXISTS `sf_guard_group_permission`;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_FI_2` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_group_permission` VALUES (1,1);
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

DROP TABLE IF EXISTS `sf_guard_permission`;
CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_guard_permission_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_permission` VALUES (1,'admin','Administrator permission');
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

DROP TABLE IF EXISTS `sf_guard_remember_key`;
CREATE TABLE `sf_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) default NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`user_id`,`ip_address`),
  CONSTRAINT `sf_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

DROP TABLE IF EXISTS `sf_guard_user`;
CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL default 'sha1',
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime default NULL,
  `last_login` datetime default NULL,
  `is_active` int(11) NOT NULL default '1',
  `is_super_admin` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_guard_user_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (1,'admin','sha1','0bde4e09dd95ac7106e7266ac6bbfb97','80f008664982e9e903acabab845b5c57772a3f61','2008-10-08 07:20:12','2008-11-04 17:55:08',1,1);
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

DROP TABLE IF EXISTS `sf_guard_user_group`;
CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `sf_guard_user_group_FI_2` (`group_id`),
  CONSTRAINT `sf_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
INSERT INTO `sf_guard_user_group` VALUES (1,1);
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

DROP TABLE IF EXISTS `sf_guard_user_permission`;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_FI_2` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_profile`
--

DROP TABLE IF EXISTS `sf_guard_user_profile`;
CREATE TABLE `sf_guard_user_profile` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) default NULL,
  `last_name` varchar(20) default NULL,
  `birthday` date default NULL,
  `email` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `sf_guard_user_profile_FI_1` (`user_id`),
  CONSTRAINT `sf_guard_user_profile_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_profile`
--

LOCK TABLES `sf_guard_user_profile` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_cms_page`
--

DROP TABLE IF EXISTS `sf_simple_cms_page`;
CREATE TABLE `sf_simple_cms_page` (
  `id` int(11) NOT NULL auto_increment,
  `slug` varchar(255) default NULL,
  `tree_left` int(11) NOT NULL,
  `tree_right` int(11) NOT NULL,
  `tree_parent` int(11) default NULL,
  `topic_id` int(11) default NULL,
  `template` varchar(100) default NULL,
  `is_published` int(11) default NULL,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_simple_cms_page_slug_unique` (`slug`),
  KEY `sf_simple_cms_page_FI_1` (`tree_parent`),
  CONSTRAINT `sf_simple_cms_page_FK_1` FOREIGN KEY (`tree_parent`) REFERENCES `sf_simple_cms_page` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_simple_cms_page`
--

LOCK TABLES `sf_simple_cms_page` WRITE;
/*!40000 ALTER TABLE `sf_simple_cms_page` DISABLE KEYS */;
INSERT INTO `sf_simple_cms_page` VALUES (1,'home',1,20,NULL,NULL,'hyper',1,'2008-10-08 07:20:12','2008-11-04 16:10:35'),(2,'chisiamo',4,5,1,NULL,'iceHome',1,'2008-10-08 23:40:47','2008-10-08 23:55:59'),(3,'where',2,3,1,NULL,'iceHome',1,'2008-10-08 23:44:10','2008-11-04 16:18:44'),(4,'sezione1',8,19,1,NULL,'hyper',1,'2008-10-09 17:40:36','2008-10-09 17:48:54'),(5,'cap1',9,10,4,NULL,'hyper',1,'2008-10-09 17:42:14','2008-10-09 17:56:11'),(6,'cap2',11,18,4,NULL,'hyper',1,'2008-10-09 17:42:50','2008-10-09 17:56:20'),(7,'aph1',12,13,6,NULL,'hyper',1,'2008-10-09 17:44:09','2008-10-09 17:49:08'),(8,'aph2',14,15,6,NULL,'hyper',1,'2008-10-09 17:59:59','2008-10-09 18:01:01'),(9,'aph3',16,17,6,NULL,'hyper',1,'2008-10-09 18:01:17','2008-10-09 18:08:08'),(10,'new',6,7,1,NULL,'hyper',NULL,'2008-11-04 16:13:25','2008-11-04 16:14:03');
/*!40000 ALTER TABLE `sf_simple_cms_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_cms_slot`
--

DROP TABLE IF EXISTS `sf_simple_cms_slot`;
CREATE TABLE `sf_simple_cms_slot` (
  `page_id` int(11) NOT NULL,
  `culture` varchar(7) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL default 'Text',
  `value` text,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`page_id`,`culture`,`name`),
  CONSTRAINT `sf_simple_cms_slot_FK_1` FOREIGN KEY (`page_id`) REFERENCES `sf_simple_cms_page` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_simple_cms_slot`
--

LOCK TABLES `sf_simple_cms_slot` WRITE;
/*!40000 ALTER TABLE `sf_simple_cms_slot` DISABLE KEYS */;
INSERT INTO `sf_simple_cms_slot` VALUES (1,'de','slot1','Text','TITLE','2008-11-04 16:09:54','2008-11-04 16:09:54'),(1,'de','slot2','Text','Content','2008-11-04 16:10:00','2008-11-04 16:10:00'),(1,'de','title','Text','TITLE - DE','2008-11-04 16:10:35','2008-11-04 16:10:35'),(1,'en','slot1','Text','Titolo della paginetta','2008-10-08 07:20:12','2008-10-09 16:51:11'),(1,'en','slot2','Text','Sottotitolo','2008-10-08 07:20:12','2008-10-09 16:51:30'),(1,'en','slot3','Text','Titoletto ancora piÃ¹ piccolo','2008-10-08 07:20:12','2008-10-09 16:51:48'),(1,'en','slot4','RichText','<p><span style=\"font-weight: bold;\">Lorem</span> ipsum dolor sit amet, consectetuer adipiscing elit. Nulla\nullamcorper, erat eget imperdiet accumsan, orci pede placerat ante,\nvitae tempor ipsum tortor suscipit erat. Ut in risus. Maecenas eget\nlectus. Pellentesque velit pede, adipiscing et, dictum vitae, tempus\nvitae, lectus. Ut laoreet, eros ut scelerisque porttitor, dolor quam\nfaucibus orci, eget rhoncus mauris lacus non leo. Morbi mollis sapien\nsit amet leo. Etiam tortor dolor, pellentesque a, molestie ac,\n<span style=\"font-style: italic;\">consequat et, odio. Maecenas orci elit</span>, euismod in, ultrices ut,\naliquam sit amet, justo. Morbi magna sapien, laoreet a, consequat sit\namet, adipiscing ac, sem. Cras a leo sed orci mollis ornare. Donec\nturpis ligula, venenatis ut, mattis id, ornare ac, est. Etiam leo nisl,\nlaoreet nec, sodales non, tempor sit amet, libero. Aliquam adipiscing\nlorem eget massa. Fusce adipiscing, libero id ornare porta, sapien diam\naliquet turpis, eget cursus ante eros in mauris. Nulla dolor nunc,\nvehicula a, gravida eget, pulvinar vitae, arcu. Quisque luctus semper\nturpis. Aenean lacinia nunc ac ipsum. Nunc fringilla orci ac velit.</p>\n<p>Integer sed massa scelerisque tortor sagittis tempus. Integer vitae\nipsum. Proin rhoncus nisi id quam venenatis accumsan. Praesent\nmalesuada. Pellentesque habitant morbi tristique senectus et netus et\nmalesuada fames ac turpis egestas. Nam placerat, nibh at aliquet\nlaoreet, nisi nisl sollicitudin orci, a placerat urna pede sed tellus.\n<span style=\"text-decoration: line-through;\">Mauris tristique</span> mauris in nisi. Nam lacus. Maecenas orci. Vivamus quis\nenim. Curabitur in risus ut neque porta fringilla. Integer a quam et\nfelis vestibulum luctus. Etiam lorem.</p>\n<p>Ut neque tortor, lacinia ut, sagittis at, commodo nec, orci. Ut\n<span style=\"font-weight: bold;\">volutpat</span> <span style=\"font-style: italic;\">malesuada dolor. Cras commodo posuere metus. </span>Pellentesque\nsollicitudin urna sed erat venenatis ultrices. Donec vitae nibh quis\nlorem luctus fringi\n<script type=\"text/javascript\"></script>\nlla. Etiam sem. Maecenas vel felis. Curabitur\naliquam. Donec varius posuere odio. Nulla id velit eu massa gravida\nbibendum.</p>','2008-10-09 16:52:01','2008-10-14 01:34:15'),(1,'en','title','Text','Welcome to sfSimpleCMS','2008-10-08 07:20:12','2008-10-13 14:55:49'),(1,'it','slot1','Text','<p>Titolo della paginetta. Modificato</p>','2008-10-08 07:45:29','2008-10-13 14:52:03'),(1,'it','slot2','Text','Sottotitolo','2008-10-08 07:45:51','2008-10-09 16:52:43'),(1,'it','slot3','Text','Titoletto ancora piÃ¹ piccolo','2008-10-09 16:52:45','2008-10-09 16:52:53'),(1,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla\nullamcorper, erat eget imperdiet accumsan, orci pede placerat ante,\nvitae tempor ipsum tortor suscipit erat. Ut in risus. Maecenas eget\nlectus. Pellentesque velit pede, adipiscing et, dictum vitae, tempus\nvitae, lectus. Ut laoreet, eros ut scelerisque porttitor, dolor quam\nfaucibus orci, eget rhoncus mauris lacus non leo. Morbi mollis sapien\nsit amet leo. Etiam tortor dolor, pellentesque a, molestie ac,\nconsequat et, odio. Maecenas orci elit, euismod in, ultrices ut,\naliquam sit amet, justo. Morbi magna sapien, laoreet a, consequat sit\namet, adipiscing ac, sem. Cras a leo sed orci mollis ornare. Donec\nturpis ligula, venenatis ut, mattis id, ornare ac, est. Etiam leo nisl,\nlaoreet nec, sodales non, tempor sit amet, libero. Aliquam adipiscing\nlorem eget massa. Fusce adipiscing, libero id ornare porta, sapien diam\naliquet turpis, eget cursus ante eros in mauris. Nulla dolor nunc,\nvehicula a, gravida eget, pulvinar vitae, arcu. Quisque luctus semper\nturpis. Aenean lacinia nunc ac ipsum. Nunc fringilla orci ac velit.</p>\n<p>Integer sed massa scelerisque tortor sagittis tempus. Integer vitae\nipsum. Proin rhoncus nisi id quam venenatis accumsan. Praesent\nmalesuada. Pellentesque habitant morbi tristique senectus et netus et\nmalesuada fames ac turpis egestas. Nam placerat, nibh at aliquet\nlaoreet, nisi nisl sollicitudin orci, a placerat urna pede sed tellus.\nMauris tristique mauris in nisi. Nam lacus. Maecenas orci. Vivamus quis\nenim. Curabitur in risus ut neque porta fringilla. Integer a quam et\nfelis vestibulum luctus. Etiam lorem.</p>\n<p>Ut neque tortor, lacinia ut, sagittis at, commodo nec, orci. Ut\nvolutpat malesuada dolor. Cras commodo posuere metus. Pellentesque\nsollicitudin urna sed erat venenatis ultrices. Donec vitae nibh quis\nlorem luctus fringilla. Etiam sem. Maecenas vel felis. Curabitur\naliquam. Donec varius posuere odio. Nulla id velit eu massa gravida\nbibendum.</p>','2008-10-09 16:53:00','2008-10-09 16:53:40'),(1,'it','title','Text','Home','2008-10-08 23:37:58','2008-10-13 14:52:26'),(2,'en','slot1','Text','Who we are','2008-10-08 23:42:56','2008-10-08 23:42:56'),(2,'en','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:43:06','2008-10-08 23:43:15'),(2,'en','title','Text','Who we are','2008-10-08 23:43:33','2008-10-08 23:43:33'),(2,'it','slot1','Text','Chi siamo','2008-10-08 23:41:35','2008-10-08 23:41:35'),(2,'it','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:41:51','2008-10-08 23:42:36'),(2,'it','title','Text','Chi siamo','2008-10-08 23:41:18','2008-10-08 23:41:18'),(3,'de','title','Text','WHERE DE','2008-11-04 16:18:44','2008-11-04 16:18:44'),(3,'en','slot1','Text','Where we are','2008-10-08 23:45:00','2008-10-08 23:45:00'),(3,'en','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:45:12','2008-10-08 23:45:21'),(3,'en','title','Text','Where we are','2008-10-08 23:44:50','2008-11-04 16:17:36'),(3,'it','slot1','Text','Dove siamo','2008-10-08 23:45:38','2008-10-08 23:45:38'),(3,'it','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:45:49','2008-10-08 23:45:57'),(3,'it','title','Text','Dove siamo','2008-10-08 23:46:14','2008-10-08 23:46:14'),(4,'it','slot1','Text','Titolo','2008-10-09 17:48:07','2008-10-09 17:48:07'),(4,'it','slot2','Text','Sottotitolo','2008-10-09 17:48:17','2008-10-09 17:48:17'),(4,'it','slot3','Text','Sottotitolino','2008-10-09 17:48:24','2008-10-09 17:48:24'),(4,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean\neleifend, massa a sagittis sollicitudin, tortor sapien molestie sapien,\nid cursus ligula lectus a enim. Cras non eros sit amet purus blandit\nlaoreet. Mauris ultrices nibh. Curabitur in sem ac ante venenatis\nsodales. Quisque quis tellus. Duis mollis eros vel justo. Vestibulum a\ntellus quis elit tincidunt semper. Donec non ligula. Pellentesque metus\nlacus, vulputate nec, porttitor sed, pharetra id, leo. Aliquam metus\nmagna, dapibus sed, sodales quis, lacinia sed, tellus. Nullam a pede.\nNullam at urna.</p>\n<p>Aliquam luctus suscipit odio. Sed vel ligula. Morbi eleifend. Morbi\nnec tortor ut felis sagittis malesuada. Donec porta hendrerit enim.\nVivamus vestibulum augue aliquam dui iaculis venenatis. In facilisis\neuismod urna. Vivamus leo tellus, aliquet at, fermentum sed, pretium\nnec, lacus. Etiam fringilla, metus et pellentesque facilisis, massa est\nlaoreet nisl, eget sollicitudin elit libero sed ipsum. Nulla ante\ntellus, tincidunt ut, facilisis nec, scelerisque non, elit. In hac\nhabitasse platea dictumst. Phasellus vehicula felis. In semper pede\negestas quam. Cras egestas pharetra ligula.</p>\n<p>Pellentesque imperdiet nisl id nulla. Quisque eu tellus ut tellus\nultrices pharetra. Donec nec leo. Suspendisse ullamcorper. Phasellus\ntempus. Sed interdum, lacus vel mattis ornare, purus orci pulvinar\nmassa, ac ultricies mi dolor et nisl. Sed non risus vitae dui eleifend\nadipiscing. Etiam molestie accumsan eros. Aliquam mollis augue sed\nligula. Sed in risus. Fusce adipiscing augue et massa dictum sodales.</p>','2008-10-09 17:48:29','2008-10-09 17:48:33'),(4,'it','title','Text','Primo libro','2008-10-09 17:41:42','2008-10-09 17:48:00'),(5,'it','slot1','Text','Titolo','2008-10-09 17:47:49','2008-10-09 17:47:49'),(5,'it','slot2','Text','Sottotitolo','2008-10-09 17:47:34','2008-10-09 17:47:44'),(5,'it','slot3','Text','Sottotitolino','2008-10-09 17:47:37','2008-10-09 17:47:37'),(5,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean\neleifend, massa a sagittis sollicitudin, tortor sapien molestie sapien,\nid cursus ligula lectus a enim. Cras non eros sit amet purus blandit\nlaoreet. Mauris ultrices nibh. Curabitur in sem ac ante venenatis\nsodales. Quisque quis tellus. Duis mollis eros vel justo. Vestibulum a\ntellus quis elit tincidunt semper. Donec non ligula. Pellentesque metus\nlacus, vulputate nec, porttitor sed, pharetra id, leo. Aliquam metus\nmagna, dapibus sed, sodales quis, lacinia sed, tellus. Nullam a pede.\nNullam at urna.</p>\n<p>Aliquam luctus suscipit odio. Sed vel ligula. Morbi eleifend. Morbi\nnec tortor ut felis sagittis malesuada. Donec porta hendrerit enim.\nVivamus vestibulum augue aliquam dui iaculis venenatis. In facilisis\neuismod urna. Vivamus leo tellus, aliquet at, fermentum sed, pretium\nnec, lacus. Etiam fringilla, metus et pellentesque facilisis, massa est\nlaoreet nisl, eget sollicitudin elit libero sed ipsum. Nulla ante\ntellus, tincidunt ut, facilisis nec, scelerisque non, elit. In hac\nhabitasse platea dictumst. Phasellus vehicula felis. In semper pede\negestas quam. Cras egestas pharetra ligula.</p>\n<p>Pellentesque imperdiet nisl id nulla. Quisque eu tellus ut tellus\nultrices pharetra. Donec nec leo. Suspendisse ullamcorper. Phasellus\ntempus. Sed interdum, lacus vel mattis ornare, purus orci pulvinar\nmassa, ac ultricies mi dolor et nisl. Sed non risus vitae dui eleifend\nadipiscing. Etiam molestie accumsan eros. Aliquam mollis augue sed\nligula. Sed in risus. Fusce adipiscing augue et massa dictum sodales.</p>','2008-10-09 17:47:17','2008-10-09 17:47:22'),(5,'it','title','Text','Cap. I','2008-10-09 17:56:11','2008-10-09 17:56:11'),(6,'it','slot1','Text','Titolo','2008-10-09 17:46:38','2008-10-09 17:46:38'),(6,'it','slot2','Text','Sottotitolo','2008-10-09 17:46:45','2008-10-09 17:46:45'),(6,'it','slot3','Text','Sottotitolino','2008-10-09 17:46:58','2008-10-09 17:46:58'),(6,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean\neleifend, massa a sagittis sollicitudin, tortor sapien molestie sapien,\nid cursus ligula lectus a enim. Cras non eros sit amet purus blandit\nlaoreet. Mauris ultrices nibh. Curabitur in sem ac ante venenatis\nsodales. Quisque quis tellus. Duis mollis eros vel justo. Vestibulum a\ntellus quis elit tincidunt semper. Donec non ligula. Pellentesque metus\nlacus, vulputate nec, porttitor sed, pharetra id, leo. Aliquam metus\nmagna, dapibus sed, sodales quis, lacinia sed, tellus. Nullam a pede.\nNullam at urna.</p>\n<p>Aliquam luctus suscipit odio. Sed vel ligula. Morbi eleifend. Morbi\nnec tortor ut felis sagittis malesuada. Donec porta hendrerit enim.\nVivamus vestibulum augue aliquam dui iaculis venenatis. In facilisis\neuismod urna. Vivamus leo tellus, aliquet at, fermentum sed, pretium\nnec, lacus. Etiam fringilla, metus et pellentesque facilisis, massa est\nlaoreet nisl, eget sollicitudin elit libero sed ipsum. Nulla ante\ntellus, tincidunt ut, facilisis nec, scelerisque non, elit. In hac\nhabitasse platea dictumst. Phasellus vehicula felis. In semper pede\negestas quam. Cras egestas pharetra ligula.</p>\n<p>Pellentesque imperdiet nisl id nulla. Quisque eu tellus ut tellus\nultrices pharetra. Donec nec leo. Suspendisse ullamcorper. Phasellus\ntempus. Sed interdum, lacus vel mattis ornare, purus orci pulvinar\nmassa, ac ultricies mi dolor et nisl. Sed non risus vitae dui eleifend\nadipiscing. Etiam molestie accumsan eros. Aliquam mollis augue sed\nligula. Sed in risus. Fusce adipiscing augue et massa dictum sodales.</p>','2008-10-09 17:46:24','2008-10-09 17:46:28'),(6,'it','title','Text','Cap. II','2008-10-09 17:43:41','2008-10-09 17:56:20'),(7,'it','slot1','Text','Titolo','2008-10-09 17:44:44','2008-10-09 17:44:44'),(7,'it','slot2','Text','Sottotitolo','2008-10-09 17:44:56','2008-10-09 17:44:56'),(7,'it','slot3','Text','Sottotitolino','2008-10-09 17:45:04','2008-10-09 17:45:04'),(7,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean\neleifend, massa a sagittis sollicitudin, tortor sapien molestie sapien,\nid cursus ligula lectus a enim. Cras non eros sit amet purus blandit\nlaoreet. Mauris ultrices nibh. Curabitur in sem ac ante venenatis\nsodales. Quisque quis tellus. Duis mollis eros vel justo. Vestibulum a\ntellus quis elit tincidunt semper. Donec non ligula. Pellentesque metus\nlacus, vulputate nec, porttitor sed, pharetra id, leo. Aliquam metus\nmagna, dapibus sed, sodales quis, lacinia sed, tellus. Nullam a pede.\nNullam at urna.</p>\n<p>Aliquam luctus suscipit odio. Sed vel ligula. Morbi eleifend. Morbi\nnec tortor ut felis sagittis malesuada. Donec porta hendrerit enim.\nVivamus vestibulum augue aliquam dui iaculis venenatis. In facilisis\neuismod urna. Vivamus leo tellus, aliquet at, fermentum sed, pretium\nnec, lacus. Etiam fringilla, metus et pellentesque facilisis, massa est\nlaoreet nisl, eget sollicitudin elit libero sed ipsum. Nulla ante\ntellus, tincidunt ut, facilisis nec, scelerisque non, elit. In hac\nhabitasse platea dictumst. Phasellus vehicula felis. In semper pede\negestas quam. Cras egestas pharetra ligula.</p>\n<p>Pellentesque imperdiet nisl id nulla. Quisque eu tellus ut tellus\nultrices pharetra. Donec nec leo. Suspendisse ullamcorper. Phasellus\ntempus. Sed interdum, lacus vel mattis ornare, purus orci pulvinar\nmassa, ac ultricies mi dolor et nisl. Sed non risus vitae dui eleifend\nadipiscing. Etiam molestie accumsan eros. Aliquam mollis augue sed\nligula. Sed in risus. Fusce adipiscing augue et massa dictum sodales.</p>','2008-10-09 17:45:10','2008-10-09 17:46:02'),(7,'it','title','Text','Aph. 1','2008-10-09 17:44:21','2008-10-09 17:44:21'),(8,'it','slot1','Text','Titolo','2008-10-09 18:00:29','2008-10-09 18:00:29'),(8,'it','slot2','Text','Sottotitolo','2008-10-09 18:00:37','2008-10-09 18:00:37'),(8,'it','slot3','Text','Sottotitolino','2008-10-09 18:00:51','2008-10-09 18:00:51'),(8,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean\neleifend, massa a sagittis sollicitudin, tortor sapien molestie sapien,\nid cursus ligula lectus a enim. Cras non eros sit amet purus blandit\nlaoreet. Mauris ultrices nibh. Curabitur in sem ac ante venenatis\nsodales. Quisque quis tellus. Duis mollis eros vel justo. Vestibulum a\ntellus quis elit tincidunt semper. Donec non ligula. Pellentesque metus\nlacus, vulputate nec, porttitor sed, pharetra id, leo. Aliquam metus\nmagna, dapibus sed, sodales quis, lacinia sed, tellus. Nullam a pede.\nNullam at urna.</p>\n<p>Aliquam luctus suscipit odio. Sed vel ligula. Morbi eleifend. Morbi\nnec tortor ut felis sagittis malesuada. Donec porta hendrerit enim.\nVivamus vestibulum augue aliquam dui iaculis venenatis. In facilisis\neuismod urna. Vivamus leo tellus, aliquet at, fermentum sed, pretium\nnec, lacus. Etiam fringilla, metus et pellentesque facilisis, massa est\nlaoreet nisl, eget sollicitudin elit libero sed ipsum. Nulla ante\ntellus, tincidunt ut, facilisis nec, scelerisque non, elit. In hac\nhabitasse platea dictumst. Phasellus vehicula felis. In semper pede\negestas quam. Cras egestas pharetra ligula.</p>\n<p>Pellentesque imperdiet nisl id nulla. Quisque eu tellus ut tellus\nultrices pharetra. Donec nec leo. Suspendisse ullamcorper. Phasellus\ntempus. Sed interdum, lacus vel mattis ornare, purus orci pulvinar\nmassa, ac ultricies mi dolor et nisl. Sed non risus vitae dui eleifend\nadipiscing. Etiam molestie accumsan eros. Aliquam mollis augue sed\nligula. Sed in risus. Fusce adipiscing augue et massa dictum sodales.</p>','2008-10-09 18:00:17','2008-10-09 18:00:22'),(8,'it','title','Text','Aph. 2','2008-10-09 18:00:12','2008-10-09 18:00:12'),(9,'it','slot1','Text','Nuovo titolo','2008-10-09 18:01:43','2008-10-09 18:08:08'),(9,'it','slot2','Text','Sottotitolo','2008-10-09 18:01:50','2008-10-09 18:01:50'),(9,'it','slot3','Text','Sottotitolino','2008-10-09 18:01:58','2008-10-09 18:01:58'),(9,'it','slot4','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean\neleifend, massa a sagittis sollicitudin, tortor sapien molestie sapien,\nid cursus ligula lectus a enim. Cras non eros sit amet purus blandit\nlaoreet. Mauris ultrices nibh. Curabitur in sem ac ante venenatis\nsodales. Quisque quis tellus. Duis mollis eros vel justo. Vestibulum a\ntellus quis elit tincidunt semper. Donec non ligula. Pellentesque metus\nlacus, vulputate nec, porttitor sed, pharetra id, leo. Aliquam metus\nmagna, dapibus sed, sodales quis, lacinia sed, tellus. Nullam a pede.\nNullam at urna.</p>\n<p>Aliquam luctus suscipit odio. Sed vel ligula. Morbi eleifend. Morbi\nnec tortor ut felis sagittis malesuada. Donec porta hendrerit enim.\nVivamus vestibulum augue aliquam dui iaculis venenatis. In facilisis\neuismod urna. Vivamus leo tellus, aliquet at, fermentum sed, pretium\nnec, lacus. Etiam fringilla, metus et pellentesque facilisis, massa est\nlaoreet nisl, eget sollicitudin elit libero sed ipsum. Nulla ante\ntellus, tincidunt ut, facilisis nec, scelerisque non, elit. In hac\nhabitasse platea dictumst. Phasellus vehicula felis. In semper pede\negestas quam. Cras egestas pharetra ligula.</p>\n<p>Pellentesque imperdiet nisl id nulla. Quisque eu tellus ut tellus\nultrices pharetra. Donec nec leo. Suspendisse ullamcorper. Phasellus\ntempus. Sed interdum, lacus vel mattis ornare, purus orci pulvinar\nmassa, ac ultricies mi dolor et nisl. Sed non risus vitae dui eleifend\nadipiscing. Etiam molestie accumsan eros. Aliquam mollis augue sed\nligula. Sed in risus. Fusce adipiscing augue et massa dictum sodales.</p>','2008-10-09 18:02:03','2008-10-09 18:02:08'),(9,'it','title','Text','Aph. 3','2008-10-09 18:01:34','2008-10-09 18:01:34'),(10,'de','title','Text','NUOVO DE','2008-11-04 16:14:03','2008-11-04 16:14:03');
/*!40000 ALTER TABLE `sf_simple_cms_slot` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-11-04 16:58:55
