-- MariaDB dump 10.19  Distrib 10.6.0-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: forum
-- ------------------------------------------------------
-- Server version	10.6.0-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `comment_creator` varchar(25) NOT NULL,
  `comment_date` varchar(25) NOT NULL,
  `comment_contents` varchar(10000) NOT NULL,
  `reference_topic` int(10) NOT NULL,
  `upload_id` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (10,'Jack Coetzer','2021-07-01 11:32:46','Good day Prof\r\n\r\nIs there any way we can get access to the labs over the weekend? It would really help us since most of us study for the exams during the week. \r\n\r\nThank you. ',19,0),(11,'Kenny Uren','2021-07-01 11:37:01','Hello Jack. I am certain the labs will be open, simply ensure you comply with the necessary regulations and lab rules and I do not believe there will be an issue.',19,0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polls`
--

DROP TABLE IF EXISTS `polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polls` (
  `poll_id` int(10) NOT NULL AUTO_INCREMENT,
  `poll_creator` varchar(25) NOT NULL,
  `poll_date` varchar(25) NOT NULL,
  `poll_name` varchar(255) NOT NULL,
  `poll_options` varchar(255) NOT NULL,
  `poll_contents` varchar(10000) NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polls`
--

LOCK TABLES `polls` WRITE;
/*!40000 ALTER TABLE `polls` DISABLE KEYS */;
INSERT INTO `polls` VALUES (2,'Kenny Uren','2021-07-01 11:08:37','Mode of classes',',Pre-recorded videos explaining procedure and content. ,Pre-recorded videos working through exercises.,Live Q&A zoom meetings.','Good day everyone, \r\n\r\nDue to the pandemic, it has proven to be difficult to present classes. I am asking for your feedback in deciding how we will proceed with the remainder of the semester. Please consider the following options: 	');
/*!40000 ALTER TABLE `polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_creator` varchar(255) NOT NULL,
  `topic_name` varchar(1000) NOT NULL,
  `topic_content` varchar(10000) NOT NULL,
  `topic_date` varchar(25) NOT NULL,
  `upload_id` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (19,'Kenny Uren','Milestones D and E','Evening everyone\r\n\r\nThe deadlines for Milestone D and E have been extended to the following dates:\r\nMilestone D - Thursday 24 June 18:00 \r\nMilestone E - Wednesday 30 June 06:00\r\n\r\nMilestone D Lab sessions:\r\n\r\nMonday 21 June - 08:00 - 10:45\r\nWednesday 23 June - 08:00 - 10:45\r\nThursday 24 June - 08:00 - 10:45 & 14:30 - 18:00\r\nI am currently trying to book out the labs for the entire day on Monday 21 June & Wednesday 23 June. I will post another announcement when I get more details tomorrow.\r\n\r\nFor Milestone D you will have to demonstrate that your Phase Lead compensator functions correctly. You will be asked to show the Open-Loop and Closed-Loop step response as well as the 40-degree phase margin.\r\n\r\nPlease note that if you fail to demo your Milestone D before Thursday 24 June at 18:00, you will, unfortunately, fail the GA. \r\n\r\nMilestone E - GA report\r\n\r\nI extended the GA report submission date to the morning of the 30th of June at 06:00 AM. Please note that NO Late Submissions will be accepted. Ensure that you submit your reports well before 06:00.\r\n\r\nSecond Opportunity\r\n\r\nThere will be a second opportunity practical in July and more information will be given at a later date.','2021-07-01 11:01:41',0),(20,'Kenny Uren','Semester assessment 3 (1st opp) Marks','Good evening,\r\n\r\nThe marks for the first opportunity of Semester assessment 3 is released. If you obtained less than 6/12 for Questions 2 and 3 then\r\n\r\nyou did not achieve the sub-minimum and need to write the 2nd opp., even if the final mark is a pass.  If you achieved a mark of less\r\n\r\nthan 40 % for the final mark you also need to write the second opp.\r\n\r\n \r\n\r\nThe second opp will be online. I will give some detail soon on what to expect.\r\n\r\nI will be available in my office on Friday if you want to have a look at your paper. \r\n\r\n \r\n\r\nRegards\r\n\r\nKennys','2021-07-01 11:11:30',33),(21,'Albert Helberg ','EERI415 prelimnary module mark available','Dear EERI415 class,\r\n\r\nThe EERI415 preliminary module mark is available on Gradebook.\r\n\r\nPlease confirm that this mark reflects all your marks correctly.  The calculation was made as follows:\r\n\r\nBest 5 out of 6 quizzes: 10%\r\nAssignment (Prac1  - analogue modulation): 20%\r\nPrac 2 and 3 Average:  20% (10% each)\r\nTest 1: 25%\r\nTest 2: 25%\r\n\r\nNote that the sub-minimum for test 1 was waivered, but the sub-minimum of 40% for test 2 was applied (test 2 covered a larger portion and the more complex part of the module).  Furthermore, a 50% sub-minimum applies to each of prac 2 and prac 3.  If a sub-minimum requirement was not satisfied, applicable remedial actions are given in the comments.\r\n\r\nPlease have a look at the comment, if any, placed next to your mark. \r\n\r\nPlease direct any queries to me by email before Wednesday 30 June, whereafter the marks will be submitted to be captured on the NWU system.\r\n\r\nThe class did very well, thank you for your efforts!\r\n\r\nBest regards\r\nASJ Helberg','2021-07-01 11:13:42',0);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_name` varchar(1000) NOT NULL,
  `upload_date` varchar(25) NOT NULL,
  `upload_creator` varchar(255) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (33,',EERI418_Marks_Semester_assessment_3_1st_opp.pdf','2021-07-01 11:11:13','Kenny Uren'),(34,',','2021-07-01 11:27:47','Andreas Alberts');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `user_picture` varchar(255) NOT NULL DEFAULT 'images/default.png',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Armandt Viljoen','df73381e26959c437cbc42f94d9882ad70c0de07','armandtviljoen8@gmail.com','2021-07-01 10:52:43','images/default.png'),(8,'Ian Venter ','fb4b101b427252c1c19d2cc0a0b6e7e25e1a660e','ianventer@student.g.nwu.ac.za','2021-07-01 10:53:54','images/default.png'),(9,'Ludwick Olivier','2f0008384abb10012f7801fc2d2cde07550047c1','LudwickOlivier@gmail.com','2021-07-01 10:54:37','images/default.png'),(10,'Rikus Coetzee','a13c01e2d27f432d7442f39c9777d87018da91f1','RikusCoetzee@student.g.nwu.ac.za','2021-07-01 10:55:31','images/default.png'),(11,'Marnus Smith','056d5f87e5074bee7344b5bb31e51163fba09638','MarnusSmithy@email.com','2021-07-01 10:56:03','images/default.png'),(12,'Piet van Huyssteen','176ca8a258d237318716d05d7aeaf378400dd52c','PvH@lecturer.g.nwu.ac.za','2021-07-01 10:57:35','images/default.png'),(13,'Andreas Alberts','60d795ac720deb5b29ab44f3a690a90ddf147d75','AA@lecturer.g.nwu.ac.za','2021-07-01 10:58:19','images/default.png'),(14,'Kenny Uren','84dd2e3f224a476f5473cb0a83cbadbfaa63daf8','KU@lecturer.g.nwu.ac.za','2021-07-01 10:59:08','images/default.png'),(15,'Albert Helberg ','9e822661f2d48dca4e86d7d3a01d55485c594426','AH@lecturer.g.nwu.ac.za','2021-07-01 11:12:49','images/default.png'),(16,'Jack Coetzer','bc5351ffae3efe8067951f5deba4b294bf863f86','JackC@gmail.com','2021-07-01 11:32:14','images/default.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `vote_id` int(10) NOT NULL AUTO_INCREMENT,
  `vote_value` int(10) NOT NULL,
  `vote_creator` varchar(25) NOT NULL,
  `reference_poll` int(10) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-01 11:38:46
