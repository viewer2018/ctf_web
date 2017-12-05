-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: demo
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL COMMENT '用户ID',
  `postsID` int(10) unsigned NOT NULL COMMENT '帖子ID',
  `content` text NOT NULL COMMENT '评论内容',
  `createTime` datetime NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='帖子评论';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (9,3,6,'ä»Šå¤©å’‹åœ°äº†ï¼Ÿï¼Ÿ','2016-12-09 17:34:09'),(10,3,6,'ä»Šå¤©å’‹åœ°äº†ï¼Ÿï¼Ÿ','2016-12-09 17:34:26'),(11,3,6,'æ²¡äº‹å•Š','2016-12-09 17:35:47'),(12,4,6,'å’‹åœ° äº†å…„å¼Ÿ','2016-12-09 17:37:35'),(13,4,6,'æ²¡äº‹å§','2016-12-09 17:37:51'),(14,4,6,'æ²¡äº‹å§','2016-12-09 17:37:55'),(15,4,7,'åƒä¸œè¥¿åƒçš„','2016-12-09 17:38:13'),(16,3,7,'æžå•¥ï¼Ÿï¼Ÿï¼Ÿ','2016-12-09 17:38:31'),(17,3,7,'æžå•¥ï¼Ÿï¼Ÿï¼Ÿ','2016-12-09 17:39:13'),(18,3,7,'99999999999','2016-12-09 17:43:20'),(19,3,7,'111111111111111','2016-12-09 17:43:25');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID\n',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `pictures` text NOT NULL COMMENT '多个图片地址逗号隔开',
  `userID` int(11) NOT NULL,
  `viewCount` int(11) NOT NULL,
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='帖子';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (6,'ä»Šå¤©å¤©æ°”ä¸é”™å“¦','æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³æ™´å¤©éœ¹é›³','',3,12,'2016-12-09 17:33:50'),(7,'æ™šä¸Šåƒç‚¹ä»€ä¹ˆä¸ï¼Ÿ','å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­\r\n\r\n\r\nå¤§é—¸èŸ¹ï¼Œå—‘ç“œå­å¤§é—¸èŸ¹ï¼Œå—‘ç“œå­','http://localhost/demo/web/images/qe.jpg',4,21,'2016-12-09 17:37:05');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT '姓名',
  `age` int(11) NOT NULL COMMENT '年龄',
  `username` varchar(50) NOT NULL COMMENT '登录账户',
  `password` char(32) NOT NULL COMMENT '密码',
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'213',123,'2312','3123','12321'),(2,'123213',0,'123','202cb962ac59075b964b07152d234b70','http://localhost/demo/web/images/2014012823475732376.jpg'),(3,'å°æ¨±',0,'xiaoying','202cb962ac59075b964b07152d234b70','http://localhost/demo/web/images/qqwe.jpg'),(4,'ä¸¹ä¸¹',0,'dandan','202cb962ac59075b964b07152d234b70','http://localhost/demo/web/images/qew.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-10  0:46:09
