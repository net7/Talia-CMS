-- MySQL dump 10.11
--
-- Host: localhost    Database: sf_ice
-- ------------------------------------------------------
-- Server version	5.0.45-Debian_1ubuntu3.3-log

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
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
INSERT INTO `sf_guard_group` (`id`, `name`, `description`) VALUES (1,'admin','Administrator group');
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`) VALUES (1,1);
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_permission` (`id`, `name`, `description`) VALUES (1,'admin','Administrator permission');
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `created_at`, `last_login`, `is_active`, `is_super_admin`) VALUES (1,'admin','sha1','0bde4e09dd95ac7106e7266ac6bbfb97','80f008664982e9e903acabab845b5c57772a3f61','2008-10-08 07:20:12',NULL,1,1);
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`) VALUES (1,1);
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_guard_user_profile`
--

LOCK TABLES `sf_guard_user_profile` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_simple_cms_page`
--

LOCK TABLES `sf_simple_cms_page` WRITE;
/*!40000 ALTER TABLE `sf_simple_cms_page` DISABLE KEYS */;
INSERT INTO `sf_simple_cms_page` (`id`, `slug`, `tree_left`, `tree_right`, `tree_parent`, `topic_id`, `template`, `is_published`, `created_at`, `updated_at`) VALUES (1,'home',1,6,NULL,NULL,'iceHome',1,'2008-10-08 07:20:12','2008-10-08 23:44:10'),(2,'chisiamo',4,5,1,NULL,'iceHome',1,'2008-10-08 23:40:47','2008-10-08 23:55:59'),(3,'dovesiamo',2,3,1,NULL,'iceHome',1,'2008-10-08 23:44:10','2008-10-08 23:55:53');
/*!40000 ALTER TABLE `sf_simple_cms_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sf_simple_cms_slot`
--

LOCK TABLES `sf_simple_cms_slot` WRITE;
/*!40000 ALTER TABLE `sf_simple_cms_slot` DISABLE KEYS */;
INSERT INTO `sf_simple_cms_slot` (`page_id`, `culture`, `name`, `type`, `value`, `created_at`, `updated_at`) VALUES (1,'en','slot1','Text','Welcome to ICE GROUP website','2008-10-08 07:20:12','2008-10-08 23:39:14'),(1,'en','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>\n<p>Page text</p>','2008-10-08 07:20:12','2008-10-08 23:38:36'),(1,'en','slot3','Modular','test1:\n  component: sfSimpleCMS/latestPages','2008-10-08 07:20:12','2008-10-08 07:20:12'),(1,'en','title','Text','Welcome to sfSimpleCMS','2008-10-08 07:20:12','2008-10-08 07:20:12'),(1,'it','slot1','Text','Benvenuti nel sito di ICE GROUP','2008-10-08 07:45:29','2008-10-08 23:39:39'),(1,'it','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 07:45:51','2008-10-08 23:37:36'),(1,'it','title','Text','Home','2008-10-08 23:37:58','2008-10-08 23:37:58'),(2,'en','slot1','Text','Who we are','2008-10-08 23:42:56','2008-10-08 23:42:56'),(2,'en','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:43:06','2008-10-08 23:43:15'),(2,'en','title','Text','Who we are','2008-10-08 23:43:33','2008-10-08 23:43:33'),(2,'it','slot1','Text','Chi siamo','2008-10-08 23:41:35','2008-10-08 23:41:35'),(2,'it','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:41:51','2008-10-08 23:42:36'),(2,'it','title','Text','Chi siamo','2008-10-08 23:41:18','2008-10-08 23:41:18'),(3,'en','slot1','Text','Where we are','2008-10-08 23:45:00','2008-10-08 23:45:00'),(3,'en','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:45:12','2008-10-08 23:45:21'),(3,'en','title','Text','Where we are','2008-10-08 23:44:50','2008-10-08 23:44:50'),(3,'it','slot1','Text','Dove siamo','2008-10-08 23:45:38','2008-10-08 23:45:38'),(3,'it','slot2','RichText','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum\nvulputate elementum risus. Quisque ut elit v<em>itae arc</em>u luctus tempor. In\nnon sapien. Praesent lectus tellus, porttitor eget, vulputate sed,\ninterdum eget, urna. Cras nisl. Nam con<strong>vallis, sem </strong>aliquam gravida\niaculis, ligula odio ultricies nunc, non dapibus eros ante eget elit.\nVivamus nibh. Aenean vitae pede. Vivamus suscipit, ante vita<strong>e venenatis\nauctor, eros ma</strong>uris laoreet lectus, ut rutrum nisl tellus facilisis\narcu. In at purus et leo tincidunt vehicula. Duis lectus magna,\nelementum vel, tempus non, aliquam sit amet, sem. Mauris in quam at\ndolor faucibus sollicitudin. Maecenas pellentesque molestie magna.\nDonec pharetra.</p>\n<ul>\n<li>Questa &egrave; una lista</li>\n<li>Prova 1 2 3</li>\n<li>Altro elemento</li>\n</ul>\n<ol>\n<li>Lista numerata</li>\n<li>Secondo elemento</li>\n</ol>\n<p>&nbsp;</p>','2008-10-08 23:45:49','2008-10-08 23:45:57'),(3,'it','title','Text','Dove siamo','2008-10-08 23:46:14','2008-10-08 23:46:14');
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

-- Dump completed on 2008-10-08 22:28:05
