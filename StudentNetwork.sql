-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:16 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `StudentNetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `mPic` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `mPic`, `message`) VALUES
(26, 'Anonymous', '2017-07-11', 'Wireless Networking', 'sdcdsfdfdf'),
(27, 'Anonymous', '2017-07-11', 'Wireless Networking', 'sdcdsfdfdf'),
(28, 'Anonymous', '2017-07-11', 'Advanced Internet Technologies', 'erte'),
(29, 'Anonymous', '2017-07-11', 'Team Project', 'iirthrh'),
(30, 'Anonymous', '2017-07-12', 'Advanced Internet Technologies', 'yyy'),
(31, 'Anonymous', '2017-07-17', 'Advanced Programming', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `IndividualJobPost`
--

CREATE TABLE IF NOT EXISTS `IndividualJobPost` (
  `JobPostId` int(8) NOT NULL AUTO_INCREMENT,
  `JobPostContent` text NOT NULL,
  `JobPostDate` datetime NOT NULL,
  `JobPostTopic` int(8) NOT NULL,
  `JobPostBy` int(8) NOT NULL,
  PRIMARY KEY (`JobPostId`),
  KEY `JobPostTopic` (`JobPostTopic`),
  KEY `JobPostBy` (`JobPostBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `IndividualJobPost`
--

INSERT INTO `IndividualJobPost` (`JobPostId`, `JobPostContent`, `JobPostDate`, `JobPostTopic`, `JobPostBy`) VALUES
(8, 'Role description\r\n\r\nStrata3 are looking to hire a front-end Web Developer to join our expanding team. Reporting to the both the UX & Technical Directors, we are looking for an energetic problem solver to assist us in delivering technology-led projects to the highest standards. The ideal candidate will have a third level IT qualification with domain knowledge of in HMTL / CSS with a minimum of 2-3 yearsâ€™ experience of working in a development team. The role involves ensuring project requirements are coded, tested and delivered to the highest standards within allocated budgets & schedules.\r\n\r\nSend us your CV\r\n\r\nCandidate requirements\r\n\r\nA minimum of 2-3 yearsâ€™ experience. 3rd-level qualification in a relevant IT discipline a bonus.\r\nExperience of HTML / HTML5 / CSS / Advanced CSS\r\nExperience of responsive & adaptive design practices for small screen, tablet & desk-top.\r\nKnowledge of AJAX, JavaScript and jQuery with REST Services / JSON.\r\nKnowledge of Angular JS as a bonus.\r\nAn understanding of web, SEO & accessibility standards.\r\nFamiliarity with Photoshop or similar.\r\nUnderstanding of analytics.\r\nComfortable with UX principals & specifications.\r\nExcellent analytical, interpersonal and communication skills, both written and verbal.\r\nA strong eye for detail, initiative and a good team working mentality are also required.\r\nProficient in Java (jsp) & ASP.NET (VB) and/or PHP as a bonus.\r\nKnowledge of commercial and/or open-source WCMSâ€™s a bonus.\r\nStrong analysis, problem resolution, judgment and decision making skills\r\nStrong communication, interpersonal and organizational skills.\r\nMust be able to work independently with a sense of urgency and follow-through.\r\nCan adapt to new skills and challenges in a fast-paced environment.\r\nTravel to client sites as necessary\r\n \r\nPackage\r\n\r\nCompetitive salary.\r\nPension.\r\nLots of holidays.', '2017-06-28 15:38:09', 12, 29),
(14, 'DESCRIPTION\r\n\r\nSenior Python Developer - Dublin City Centre - Up to â‚¬90k\r\n\r\n \r\n\r\nSenior Python Developer\r\n\r\nA pioneering company in the artificial intelligence/ machine learning space require an experienced Python Developer to join their innovative team.\r\n\r\nYou would be developing next-generation voice recognition UI systems, working alongside some of the best developers in Ireland.\r\n\r\nTheir tech stack comprises of a number of modern technologies including Python, C++, Java, Docker, AWS, RESTful and WebSocket APIs, amongst others.\r\n\r\nThis is a unique opportunity to join a multidisciplinary team of creative and talented individuals who are revolutionising how people interact with devices, by building state of the art conversational systems using deep learning.\r\n\r\nSkills and Qualifications required:\r\n\r\n3+ years Python development experience\r\nExperience in C/C++ and building Python bindings and extensions is an advantage\r\nExperience designing and building scalable and highly performant services.\r\nExperience working in a Unix/Linux development environment\r\nMinimum of B.Sc. in computer science or equivalent required\r\nKnowledge of deep learning, AI, natural language understanding, voice recognition and stream based processing - experience in this space a significant advantage\r\nFor more information on this Senior Python Developer opportunity please contact James Gormley on 014321567 or email\r\n\r\nMorgan McKinley is acting as an Employment Agency in relation to this vacancy.\r\n\r\nPlease note that any references to salary or pay rates in this advertisement and in the salary refinement section are indicative only and should only be used as a guide.', '2017-07-10 13:09:12', 18, 31),
(15, 'DESCRIPTION\r\n\r\nJava Developer, Dublin Excellent Salary\r\n\r\n \r\n\r\nMy client, a SaaS company are currently looking to recruit a full stack Java Developer to their team. This is a new role, which has opened due to continued success.\r\n\r\nThis is a busy environment, where you will be working in a Java 8 environment. You will have full ownership for your work. You will be able to deal with real life development issues and handle client needs efficiently. You will be a developer who is innovative and is comfortable to contribute ideas to the team.\r\n\r\nPackage wise, competitive salaries are on offer. This is a small team, but they are all experienced and solid coders. You will be working in comfortable surroundings, close to Rail, Luas and Bus links.\r\n\r\nWhy this is a good place to be?\r\nFull responsibility for your daily activities.\r\nAbility to chose technologies\r\nFun environment with regular social events planned\r\nRequirements:\r\n+ 2 years commercial Java experience (the more the better!)\r\nJ2EE\r\nDatabase knowledge essential (SQL)\r\nExperience with Javascript frameworks (Angularjs a big plus!)\r\nTeam Player\r\n\r\nIf you would like to find out more, click the link below or contact Elaine Kilkelly at Reperio Human Capital for further information\r\n\r\nReperio Human Capital Limited acts as an Employment Agency and an Employment Business.', '2017-07-10 13:11:34', 19, 31),
(16, '', '2017-07-18 10:48:04', 20, 31);

-- --------------------------------------------------------

--
-- Table structure for table `JobCategories`
--

CREATE TABLE IF NOT EXISTS `JobCategories` (
  `JobCatId` int(8) NOT NULL AUTO_INCREMENT,
  `JobCatName` varchar(255) NOT NULL,
  `JobCatDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`JobCatId`),
  UNIQUE KEY `JobCatNameUnique` (`JobCatName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `JobCategories`
--

INSERT INTO `JobCategories` (`JobCatId`, `JobCatName`, `JobCatDescription`) VALUES
(1, 'Software Development', 'This is for students with an interest is Software'),
(2, 'Mobile Development', 'This is for students who are interesting in creating apps for Apple, and Android.'),
(3, 'Accountancy / Finance Jobs', 'For students with a background in Finance/Maths'),
(4, 'Fitness & Leisure', 'For students with the ability to carry out daily tasks with vigor and alertness, without undue fatigue.'),
(5, 'Graduate', 'A Variety of Graduate Programmes'),
(6, 'Legal/Law', 'Lawyers/Barristers/Solicitors/Legal Secretary with interest in areas such as Criminal Law, Property, or Civil Law'),
(7, 'Education', 'Primary/Secondary Teachers. College Assistants'),
(8, 'Public Sector', 'Public Sector Jobs (Teacher, Emergency Service, Doctor, Nurse)');

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE IF NOT EXISTS `Jobs` (
  `JobId` int(8) NOT NULL AUTO_INCREMENT,
  `JobSubject` varchar(255) NOT NULL,
  `JobCompany` varchar(30) NOT NULL,
  `JobSalary` int(7) NOT NULL,
  `JobLocation` varchar(40) NOT NULL,
  `JobDate` datetime NOT NULL,
  `JobCat` int(8) NOT NULL,
  `JobPostBy` int(8) NOT NULL,
  PRIMARY KEY (`JobId`),
  KEY `JobCat` (`JobCat`),
  KEY `JobPostBy` (`JobPostBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`JobId`, `JobSubject`, `JobCompany`, `JobSalary`, `JobLocation`, `JobDate`, `JobCat`, `JobPostBy`) VALUES
(12, 'Front End Web Developer', 'Strata3', 54000, 'Tara Street, Dublin', '2017-06-28 15:38:09', 1, 29),
(18, 'Python Developer', 'MORGAN MCKINLEY', 90000, 'Dublin', '2017-07-10 13:09:12', 1, 31),
(19, 'Java Developer', 'Dublin', 50000, 'Reperio Human Capital', '2017-07-10 13:11:34', 1, 31),
(20, '', '', 0, '', '2017-07-18 10:48:04', 2, 31);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sentFrom` varchar(100) NOT NULL,
  `sentTo` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `dateMessage` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sentFrom`, `sentTo`, `message`, `dateMessage`) VALUES
(42, 'Killian Davis', 'Andre MacNamara', 'Hello Andre, How are you?', '0000-00-00'),
(49, 'Killian Davis', 'bdoor', 'Great how are you?', '0000-00-00'),
(50, 'Killian Davis', 'cathy', 'Oi oi cathy hows things?', '0000-00-00'),
(51, 'Killian Davis', 'bdoor', 'hi', '0000-00-00'),
(52, 'Killian Davis', 'dddddddd', 'ddd', '0000-00-00'),
(53, 'Killian Davis', 'bbb', 'nn', '2017-06-21'),
(54, 'Killian Davis', '222', '2', '2017-06-22'),
(55, 'Killian Davis', '222', '2', '2017-06-22'),
(56, 'Killian Davis', 'dd', 'w', '2017-06-22'),
(58, 'Killian Davis', 'Killian Davis', 'frfrfrfrf', '2017-06-29'),
(61, 'bdoor', 'Killian Davis', 'hiiiiii', '2017-06-29'),
(62, 'bdoor', 'killian davis', 'yoooo', '2017-06-29'),
(63, 'Killian Davis', 'hh', 'eeeeeeeeeee', '2017-06-29'),
(64, 'test', 'Killian Davis', 'adasd', '2017-06-29'),
(65, 'Andre MacNamara', 'Killian Davis', 'Conor Larkin', '2017-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile1`
--

CREATE TABLE IF NOT EXISTS `profile1` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `bio` varchar(300) NOT NULL,
  `location` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `dateAdd` date NOT NULL,
  `Status` varchar(300) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `profile1`
--

INSERT INTO `profile1` (`userId`, `bio`, `location`, `birthday`, `gender`, `userEmail`, `dateAdd`, `Status`, `userPic`) VALUES
(31, 'That', 'Ireland', '0000-00-00', 'Male', '', '0000-00-00', '', 'IMG_20170710_095728.jpg'),
(32, 'This is Killians page!!', 'dublin', '2017-07-04', 'not su', '', '2017-07-09', 'plz', 'download (1).jpg'),
(33, '<3', 'Dublin', '1996-07-18', 'Female', '', '0000-00-00', '', '15032692_1226860767385232_7666773508673690774_n.jpg'),
(76, 'Write Bio here!', '', '0000-00-00', 'Unknow', 'work1@student.ncirl.ie', '2017-07-10', 'Write status here!', ''),
(77, 'Write Bio here!', '', '0000-00-00', 'Unknow', 'fff@student.ncirl.ie', '2017-07-10', 'Write status here!', ''),
(78, 'Write Bio here!', '', '0000-00-00', 'Unknow', 'niall@student.ncirl.ie', '2017-07-10', 'Write status here!', ''),
(80, 'This is my bio!', 'Heaven', '0000-00-00', 'Dunno', 'worker@student.ncirl.ie', '2017-07-10', 'Write status here!', 'a_variety_of_furniture_clip_art_155213.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE IF NOT EXISTS `Status` (
  `allStatus` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateAdd` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`allStatus`, `userId`, `id`, `dateAdd`) VALUES
('Are you working', 32, 1, '2017-07-10'),
('Date?', 32, 2, '2017-07-10'),
('My first status!', 33, 5, '2017-07-10'),
('Test', 31, 6, '2017-07-11'),
('ht', 31, 7, '2017-07-11'),
('rthsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 31, 8, '2017-07-11'),
('Hi', 33, 9, '2017-07-11'),
('Hey', 33, 10, '2017-07-11'),
('Hi, How are you.', 31, 11, '2017-07-11'),
('yyy', 32, 12, '2017-07-12'),
('conor larkin is gay', 31, 13, '2017-07-13'),
('Hello today is Friday', 32, 14, '2017-07-14'),
('test', 31, 15, '2017-07-16'),
('test', 31, 16, '2017-07-16'),
('test', 31, 17, '2017-07-16'),
('test', 31, 18, '2017-07-16'),
('this is a status', 32, 19, '2017-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(8) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userDate` datetime NOT NULL,
  `userLevel` int(8) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userNameUnique` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPass`, `userEmail`, `userDate`, `userLevel`) VALUES
(25, 'andre', '123456', 'andre@gmail.com', '2017-06-12 10:33:25', 0),
(26, 'andremacn', '123456', 'andremac@gmail.com', '2017-06-12 11:04:26', 0),
(27, 'john', '123456*a', 'john@gmail.com', '2017-06-12 11:14:15', 1),
(28, 'jack', '123456', 'jack@gmail.com', '2017-06-12 11:18:00', 1),
(29, 'test', '123456', 'test@gmail.com', '2017-06-12 11:23:59', 1),
(30, 'testt', '123456', 'test1@gmail.com', '2017-06-12 11:47:51', 0),
(31, 'Andre MacNamara', '123456', 'andre.macnamara@student.ncirl.ie', '2017-06-20 10:44:10', 1),
(32, 'Killian Davis', '123456', 'killo@student.ncirl.ie', '2017-06-20 10:44:51', 0),
(33, 'bdoor', '123456', 'bdoor.alshakaki@student.ncirl.ie', '2017-06-20 10:46:05', 0),
(34, 'Cathy', 'Cathy1234', 'x14428818@student.ncirl.ie', '2017-06-21 00:47:27', 0),
(47, 'Simon Jackson', '123456', 'SJ@student.ncirl.ie', '2017-07-05 14:31:21', 0),
(48, 'Simon Harris', '123456', 'SH@student.ncirl.ie', '2017-07-05 14:36:26', 0),
(69, 'Jack S', '123456', 'JackS@student.ncirl.ie', '2017-07-05 15:22:04', 0),
(71, 'Jack Mac', '123456', 'JackT1e@student.ncirl.ie', '2017-07-05 15:22:45', 0),
(72, 'tjr', '123456', 'tj@student.ncirl.ie', '2017-07-10 12:10:02', 0),
(73, 'www', '123456', 'www@student.ncirl.ie', '2017-07-10 12:17:09', 0),
(74, 'rrr', '123456', 'rrr@student.ncirl.ie', '2017-07-10 12:18:55', 0),
(75, 'kdog', '123456', 'kdog@student.ncirl.ie', '2017-07-10 12:20:01', 0),
(76, 'work', '123456', 'work@student.ncirl.ie', '2017-07-10 12:37:24', 0),
(78, 'fff', '123456', 'fff@student.ncirl.ie', '2017-07-10 12:41:17', 0),
(79, 'niall', '123456', 'niall@student.ncirl.ie', '2017-07-10 12:42:40', 0),
(80, 'worker', '123456', 'worker@student.ncirl.ie', '2017-07-10 12:44:18', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `IndividualJobPost`
--
ALTER TABLE `IndividualJobPost`
  ADD CONSTRAINT `IndividualJobPost_ibfk_1` FOREIGN KEY (`JobPostTopic`) REFERENCES `Jobs` (`JobId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IndividualJobPost_ibfk_2` FOREIGN KEY (`JobPostBy`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD CONSTRAINT `Jobs_ibfk_1` FOREIGN KEY (`JobCat`) REFERENCES `JobCategories` (`JobCatId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Jobs_ibfk_2` FOREIGN KEY (`JobPostBy`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
