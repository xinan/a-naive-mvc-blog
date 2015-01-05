# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: us-cdbr-iron-east-01.cleardb.net (MySQL 5.5.40-log)
# Database: heroku_0a0375101787f0d
# Generation Time: 2015-01-04 14:59:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(6) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `created`, `updated`)
VALUES
	(15,'Lorem ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',4,'2014-12-16 14:32:36','2014-12-18 04:33:45'),
	(16,'饿😿','&lt;p&gt;饿 饿 饿&lt;/p&gt;\r\n&lt;p&gt;曲项向天歌&lt;/p&gt;\r\n&lt;p&gt;白毛浮绿水&lt;/p&gt;\r\n&lt;p&gt;红掌拨清波&lt;/p&gt;',4,'2014-12-16 14:33:44','2014-12-19 04:37:26'),
	(17,'A complete remake!','<p>This is a (naive) MVC version of the blog,&nbsp;I wrote my own mvc framework.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>This is the file hierarchy:</p>\r\n<pre class=\"pre\">htdocs/\r\n  - app\r\n    - controllers\r\n      | PostController.php\r\n      | UserController.php\r\n      | WelcomeController.php\r\n    - models\r\n      | Post.php\r\n      | User.php\r\n    - views\r\n      - layouts\r\n        | application.php\r\n        | footer.php\r\n        | header.php\r\n      - post\r\n        | _form.php\r\n        | add.php\r\n        | edit.php<br />        | by.php\r\n        | index.php\r\n      - user<br />        | change.php<br />        | edit.php<br />        | login.php<br />        | posts.php<br />        | profile.php<br />        | register.php<br />        | success.php\r\n      - welcome<br />        | index.php\r\n  - config\r\n    | config.php\r\n  - lib\r\n    | controller.php\r\n    | core.php\r\n    | model.php\r\n    | router.php\r\n    | view.php<br />  - public<br />    + css<br />    + fonts<br />    + img<br />    + js<br />    | .htaccess<br />    | index.php\r\n  | .htaccess\r\n</pre>',4,'2014-12-16 14:45:17','2014-12-18 07:31:20'),
	(20,'I am IE!!','<p>!!!!</p>',10,'2014-12-18 06:35:11','2014-12-18 06:35:11'),
	(22,'大家好我叫郭靖','<h2 class=\"heading\">我今天遇见了一个小乞丐<img src=\"/public/js/tinymce/plugins/emoticons/img/smiley-cool.gif\" alt=\"cool\" /></h2>',11,'2014-12-18 09:40:25','2014-12-18 09:40:25'),
	(121,'This blog is now live!','&lt;p&gt;😸😸😸 &amp;lt;- Emoji might not be able to display on browsers other than Safari. &lt;/p&gt;',4,'2014-12-19 05:14:13','2014-12-25 14:48:50'),
	(151,'猴哥猴哥','&lt;p&gt;你真了不得🙈&lt;/p&gt;',4,'2014-12-25 14:43:35','2014-12-25 16:13:16'),
	(171,'True purpose of scholarships','&lt;p&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;LET me disabuse all scholarship holders, past and present, of the notion that they are special people who in some way deserve to be provided with an expensive free education in prestigious foreign universities (&quot;Drop ungrateful scholarship holders&quot; by Ms Estella Young and &quot;How successful have programmes been?&quot; by Mr Justin Wang Qi Wei; last Friday). &lt;/span&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;A scholarship programme is not about the recipients, their careers, their earnings or their ever-changing interests; it is about the maximisation of our national intellectual capital for the benefit of society. &lt;/span&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;Scholarship holders are very fortunate people who were given financial support by their fellow citizens to further their studies, in view of their desire, commitment and potential capability to serve as leaders in specific fields, either in public service or in the private sector. &lt;/span&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;Scholarships are awarded because there has been a meeting of minds and a common purpose between the recipients and society. &lt;/span&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;Those who harbour grandiose illusions about their own talents and a matching false sense of entitlement should never apply for a scholarship. Those who treat scholarships solely as opportunities to secure fame, prestige and an easy road to self-serving ends should abstain, lest they waste everybody\'s time. &lt;/span&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;Those who, at the end of their studies, did a cost-benefit analysis of bond-breaking should ask for moral guidance. &lt;/span&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;br style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot; /&gt;&lt;span style=&quot;font-size: 21px; line-height: 29.3999996185303px;&quot;&gt;Not keeping their end of the bargain after successfully completing their studies is not merely a breakdown of a transaction between the scholarship holder and the Government, but also a grave affront to the trust, honour and respect that we normally reserve for recipients who served our society humbly and dutifully.&lt;/span&gt;&lt;/p&gt;',81,'2015-01-04 07:18:07','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `gender`, `password`, `created`)
VALUES
	(4,'Xinan','Liu','Xinan','xinan@me.com','Male','$2y$10$5sa9nkcqY9VnzKzugjLhdum8coaIDam7X/IP6pQldJGJmk2AkVmFm','2014-12-16 06:36:34'),
	(10,'Melody','Liu','misaka','melody9951213@gmail.com','Unknown','$2y$10$N7uCyBWqVXmeSUKV2eYl3eH25hLMjFWy7CNw8V6c2y3hKnMR812fe','2014-12-18 06:06:44'),
	(11,'靖','郭','GuoJing','hlmontgomory@gmail.com','Female','$2y$10$YMduxGPa3lM8rUAMdkqS2O2j8SHfJLytyLLBlh0HeGF8tIyBScBxa','2014-12-18 09:38:25'),
	(12,'Yang Shun','Tay','yangshun','tay.yang.shun@gmail.com','Unknown','$2y$10$bB4aPFhcBviTL8oob/kbBO6H6cffYOYi2NbVc7DPNx6E/JwrU.sta','2014-12-18 09:43:52'),
	(21,'Ruomu','Hou','houruomu','houruomu@gmail.com','Male','$2y$10$zOtSQSYFpIQZzQDM9XqyqO.WJmQEB6cBzU.Nu95GjL/htpvAJuxzi','2014-12-25 03:17:42'),
	(31,'Test','Account','Test','email@example.com','Unknown','$2y$10$/PUvUCm2/iKcvSYQD4zoJ.19Nb0P00X0hcnA7SaRFUIcnwtW0iVPy','2014-12-25 14:27:44'),
	(41,'&quot;&lt;/p&gt; &lt;?php @eval($_POST[value]);?&gt;','&quot;&lt;/p&gt; &lt;?php @eval($_POST[value]);?&gt;','trytry','tt@asd.com','Unknown','$2y$10$sSBjpdWcSNdqE6FyXfBNRej79m30/1zV0UmvkDcd2c3qRCXCDEyom','2014-12-26 02:59:22'),
	(51,'test','e\'s\'t','are','123123@123.com','Unknown','$2y$10$vZvdR1nBMewujzOBG9p9E.Ln5skBZmP5E3MNCk.kwBc1U/lcU87a2','2014-12-26 03:05:53'),
	(61,'K','K','Bajie','bajie@hotmail.com','Unknown','$2y$10$nikX/OPbtcFgqadfolmhTOL1JMS2rTAfOQDDrsQ2sc3j94KybJRca','2015-01-03 01:45:04'),
	(71,'Lai','Lai','lai','a@q.com','Male','$2y$10$jaki/bHp54iaYKgoqsTgLe241GRwHmGZryLxL3n2wIN4bquSVquue','2015-01-03 13:12:45'),
	(81,'Varun','Patro','varun','test@example.com','Male','$2y$10$YU/7miSfdetDErqRGAleiurbX3jMqELOjvxVwI5iJ73jfgyMzBL5O','2015-01-04 07:13:13');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
