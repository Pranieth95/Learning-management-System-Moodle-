-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 11:24 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cirp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `backup1` (IN `value` INT(11))  BEGIN  
      Select dob, regno, name, totamount, 'Semester Fee' as Category from studentbackup WHERE MONTH(dob) = value
	  UNION
      Select dob, regno, name, totamount, 'Exam Fee' as Category from examfeesbackup WHERE MONTH(dob) = value 
	  UNION
      Select Date AS dob, CreditcardNumber AS regno, NIC AS name, Total AS totamount, 'Book payment' as Category from paymentbackup WHERE MONTH(Date) = value; 
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `backup2` (IN `value` INT(11))  BEGIN  
      SELECT * FROM expensesbackup WHERE MONTH(date) = value;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteclub` (IN `user_id` INT(11))  BEGIN   
           DELETE FROM clubs WHERE id = user_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteclubevent` (IN `user_id` INT(11))  BEGIN   
           DELETE FROM club_event WHERE id = user_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteevent` (IN `user_id` INT(11))  BEGIN   
           DELETE FROM eventcalendar WHERE id = user_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteeventincome` (IN `user_id` INT(11))  BEGIN   
           DELETE FROM eventincome WHERE id = user_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchclubevents` (IN `user_id` INT(11))  BEGIN   
      SELECT * FROM club_event WHERE id = user_id;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchevents` (IN `user_id` INT(11))  BEGIN   
      SELECT * FROM eventcalendar WHERE id = user_id;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `income1` (IN `value` INT(11))  BEGIN  
      SELECT t.Total, f.Exall
      From (SELECT SUM(totamount) AS Total 
	  FROM 
	  ( Select dob, regno, name, totamount from studentbackup WHERE MONTH(dob) = value 
	  UNION 
	  Select dob, regno, name, totamount from examfeesbackup WHERE MONTH(dob) = value
	  UNION 
	  Select Date AS dob, CreditcardNumber AS regno, NIC AS name, Total AS totamount from paymentbackup WHERE MONTH(Date) = value) AS e) AS t, 
	  (SELECT SUM(amount) as Exall FROM (SELECT * FROM expensesbackup WHERE MONTH(date) = value) AS b) AS f;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertclubs` (IN `clubName` VARCHAR(50), `clubType` VARCHAR(50))  BEGIN  
                INSERT INTO clubs(clubName, clubType) VALUES (clubName, clubType);   
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserteventincome` (IN `eventDate` DATE, `eventTitle` VARCHAR(50), `Earnings` DOUBLE, `Expenses` DOUBLE, `Income` DOUBLE)  BEGIN  
                INSERT INTO eventincome(eventDate, eventTitle, Earnings, Expenses, Income) VALUES (eventDate, eventTitle, Earnings, Expenses, Income);   
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertexamfees` (IN `dob` DATE, `regno` VARCHAR(50), `name` VARCHAR(50), `year` VARCHAR(50), `semester` VARCHAR(50), `batch` VARCHAR(50), `exam` VARCHAR(50), `subject` VARCHAR(50), `totamount` VARCHAR(50))  BEGIN  
                INSERT INTO examfees(dob, regno, name, year, semester, batch, exam, subject, totamount) VALUES (dob, regno, name, year, semester, batch, exam, subject, totamount);   
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertexpenses` (IN `date` DATE, `category` VARCHAR(200), `employeeid` VARCHAR(20), `description` VARCHAR(200), `amount` INT(11))  BEGIN  
                INSERT INTO expenses(date, category, employeeid, description, amount) VALUES (date, category, employeeid, description, amount);   
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertstatic` (IN `date` VARCHAR(20), `income` INT(11), `expense` INT(20), `profit` INT(11))  BEGIN  
                INSERT INTO statics(date, income, expense, profit) VALUES (date, income, expense, profit);   
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertstudent` (IN `regno` VARCHAR(100), `name` VARCHAR(100), `dob` DATE, `ccategoryid` INT(100), `totamount` INT(100))  BEGIN  
                INSERT INTO student(regno, name, dob, ccategoryid, totamount) VALUES (regno, name, dob, ccategoryid, totamount);   
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `resetmember` (IN `user_id` VARCHAR(50))  BEGIN   
		   UPDATE club_member SET Months = 0, JoinedDate = now() WHERE CIRP_ID = user_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectclubevents` ()  BEGIN  
      SELECT * FROM club_event ORDER BY ID DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectclubs` ()  BEGIN  
      SELECT * FROM clubs ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selecteventincome` ()  BEGIN  
      SELECT * FROM eventincome ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectevents` ()  BEGIN  
      SELECT * FROM eventcalendar ORDER BY ID DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectexamfees` ()  BEGIN  
      SELECT * FROM examfees ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectexpenses` ()  BEGIN  
      SELECT * FROM expenses ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectMembers` ()  BEGIN  
      SELECT * FROM club_member;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectMemberss` ()  BEGIN  
      SELECT * FROM club_member;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectpayment` ()  BEGIN  
      SELECT * FROM payment ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectstatic` ()  BEGIN  
      SELECT * FROM statics ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectstudent` ()  BEGIN  
      SELECT * FROM student ORDER BY id DESC;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateclub` (IN `user_id` INT(11), `clubName` VARCHAR(50), `clubType` VARCHAR(50))  BEGIN   
                UPDATE clubs SET clubName = clubName, clubType = clubType 
                WHERE id = user_id;  
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateclubevents` (IN `user_id` INT(11), `eventTitle` VARCHAR(65), `eventDetails` VARCHAR(225), `budget` DOUBLE)  BEGIN   
                UPDATE club_event SET Title = eventTitle, Details = eventDetails, Expenses = budget 
                WHERE ID = user_id;  
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateeventincome` (IN `user_id` INT(11), `eventTitle` VARCHAR(50), `Earnings` DOUBLE, `Expenses` DOUBLE, `Income` DOUBLE)  BEGIN   
                UPDATE eventincome SET eventTitle = eventTitle, Earnings = Earnings, Expenses = Expenses, Income = Income 
                WHERE id = user_id;  
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateevents` (IN `user_id` INT(11), `eventTitle` VARCHAR(65), `eventDetails` VARCHAR(225))  BEGIN   
                UPDATE eventcalendar SET Title = eventTitle, Details = eventDetails 
                WHERE ID = user_id;  
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateexamfees` (IN `user_id` INT(11), `dob` DATE, `regno` VARCHAR(50), `name` VARCHAR(50), `year` VARCHAR(50), `semester` VARCHAR(50), `batch` VARCHAR(50), `exam` VARCHAR(50), `subject` VARCHAR(50), `totamount` VARCHAR(50))  BEGIN   
                UPDATE examfees SET dob = dob, regno = regno, name = name, year = year, semester = semester, batch = batch, exam = exam, subject = subject, totamount = totamount  
                WHERE id = user_id;  
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefee` ()  BEGIN  
		      SELECT * FROM club_member;  
		      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatestudent` (IN `user_id` INT(100), `regno` VARCHAR(100), `name` VARCHAR(100), `dob` DATE, `ccategoryid` INT(100), `totamount` INT(100))  BEGIN   
                UPDATE student SET  regno = regno, name = name, dob = dob, ccategoryid = ccategoryid, totamount = totamount  
                WHERE id = user_id;  
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `whereclub` (IN `user_id` INT(11))  BEGIN   
      SELECT * FROM clubs WHERE id = user_id;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `whereeventincome` (IN `user_id` INT(11))  BEGIN   
      SELECT * FROM eventincome WHERE id = user_id;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `whereexamfees` (IN `user_id` INT(11))  BEGIN   
      SELECT * FROM examfees WHERE id = user_id;  
      END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `wherestudent` (IN `user_id` INT(100))  BEGIN   
      SELECT * FROM student WHERE id = user_id;  
      END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `abc`
--

CREATE TABLE `abc` (
  `id` int(100) NOT NULL,
  `gap` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc`
--

INSERT INTO `abc` (`id`, `gap`, `count`) VALUES
(1, '0-44', '0'),
(2, '45-59', '2'),
(3, '60-74', '0'),
(4, '75-84', '0'),
(5, '85-100', '2');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `email`) VALUES
('AA111111', 'aaa', 'admin@gmail.com'),
('AA222222', 'bbb', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `q_ID` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `q_ID`, `user_email`) VALUES
(15, 'answer 1', 17, 'sachini@gmail.com'),
(16, 'answer 11111111', 6, 'sachini@gmail.com'),
(17, 'answer 22', 19, 'me@gmail.com'),
(18, 'ans', 19, 'me2@gmail.com'),
(19, 'answer video ', 18, 'sachini@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_person_name` varchar(100) NOT NULL,
  `chat_value` varchar(100) NOT NULL,
  `chat_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_person_name`, `chat_value`, `chat_time`) VALUES
(1, 'sachini', 'hi my name is sachini\n', '21:09:32'),
(2, 'worandi', 'hi i m worandi', '21:11:00'),
(3, 'vayoma', 'mvsm', '21:12:43'),
(4, 'dhammika', 'hi i am dhammika\n', '21:38:07'),
(5, 'sachini', 'jjdjjd', '21:52:33'),
(6, 'sachini', 'fjssal;', '14:31:56'),
(7, 'sachini', 'jfzlf', '17:56:54'),
(8, 'sachini', 'jfzlf', '17:56:55'),
(9, 'sachini', 'jfzlf', '17:56:56'),
(10, 'me2', 'meeeeeeee', '13:18:40'),
(11, 'sa', 'fdf', '13:20:13'),
(12, 'sa', 'fdf', '13:20:15'),
(13, 'me', 'dsdsafaffs', '15:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `clubName` varchar(50) NOT NULL,
  `clubType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `clubName`, `clubType`) VALUES
(2, 'Gaming Community', 'E-Sports'),
(4, 'Cognition', 'Psychology'),
(6, 'AstroClubasa', 'Astronomy'),
(7, 'PsychoSquad', 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `clubtype`
--

CREATE TABLE `clubtype` (
  `id` int(11) NOT NULL,
  `clubType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubtype`
--

INSERT INTO `clubtype` (`id`, `clubType`) VALUES
(1, 'Astronomy'),
(2, 'Logistics'),
(3, 'Psychology'),
(4, 'E-Sports');

-- --------------------------------------------------------

--
-- Table structure for table `club_event`
--

CREATE TABLE `club_event` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Details` varchar(500) NOT NULL,
  `Expenses` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_event`
--

INSERT INTO `club_event` (`ID`, `Title`, `Details`, `Expenses`, `Date`) VALUES
(3, 'CosmoAndes 2017 - Conference', 'CosmoAndes 2017 is a Conference & School of Cosmology that will be held in Colombo on this date at 11.30am at CIRP premises. ', 50000, '2017-11-26'),
(4, 'Well-being at Work Events 2017', 'Wellbeing at Work Events are one-day conferences catering especially for business leaders and professionals. The conferences cover the latest well-being developments and successes, which tend to improve the individual and organisational performance in companies all over the world.', 25000, '2017-11-06'),
(5, 'ResilienceCon 2K17', 'Cognition Club represents ResilienceCon 2K17 which aims to offer opportunities for interaction among researchers, students, psychologists, social workers and others, to learn more about strengths-based approaches for understanding, responding and preventing violence and other adversities. ', 75000, '2017-11-09'),
(6, 'Positive Organizational Psychology ''17', 'Claremont Graduate University offers a one-day workshop on Positive Organizational Psychology here in CIRP. The workshop will be available both onsite and online. Topics such as positive psychology, positive leadership, and p', 70000, '2017-11-11'),
(7, 'GameFest 2k17', 'There will be a conference held by the gaming community', 65000, '2017-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `club_member`
--

CREATE TABLE `club_member` (
  `CIRP_ID` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `club` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `Address` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(10) NOT NULL,
  `JoinedDate` date NOT NULL,
  `Months` int(15) NOT NULL,
  `Fee` int(15) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_member`
--

INSERT INTO `club_member` (`CIRP_ID`, `firstname`, `lastname`, `club`, `bday`, `Address`, `email`, `tel`, `JoinedDate`, `Months`, `Fee`, `type`) VALUES
('DF111111', 'Madushan', 'Abeysinghe', 'Cognition', '1995-03-16', 'asdjh123', 'madushan@gmail.com', 1236547890, '2015-12-01', 23, 3500, ''),
('DF222222', 'Madura', 'Rajapakse', 'Gaming Community', '1996-04-18', 'nmjh123', 'madura@gmail.com', 1478523690, '2017-11-23', 0, 0, ''),
('DF333333', 'Menuka', 'Shavinda', 'AstroClub', '1996-04-18', 'nmjh123', 'madura@gmail.com', 1478523690, '2017-11-23', 0, 1500, ''),
('DF444444', 'Michael', 'James', 'BrainWork', '1995-10-04', 'asde123', 'abcd@gmail.com', 710724585, '2017-05-01', 6, 1000, 'Rep');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(4, 'year 1'),
(5, 'year 2'),
(6, 'year 3'),
(7, 'year 4');

-- --------------------------------------------------------

--
-- Table structure for table `course_feedback`
--

CREATE TABLE `course_feedback` (
  `id` int(100) NOT NULL,
  `course_ID` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `feedback_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_feedback`
--

INSERT INTO `course_feedback` (`id`, `course_ID`, `value`, `feedback_ID`) VALUES
(79, 'SS111111', 10, 1),
(80, 'SS111111', 10, 2),
(81, 'SS111111', 10, 3),
(82, 'SS111111', 10, 4),
(83, 'SS111111', 10, 5),
(84, 'SS333333', 10, 1),
(85, 'SS333333', 10, 2),
(86, 'SS333333', 10, 3),
(87, 'SS333333', 10, 4),
(88, 'SS333333', 10, 5),
(89, 'SS333333', 20, 1),
(90, 'SS333333', 20, 2),
(91, 'SS333333', 20, 3),
(92, 'SS333333', 20, 4),
(93, 'SS333333', 20, 5),
(94, 'SS111111', 10, 1),
(95, 'SS111111', 10, 2),
(96, 'SS111111', 10, 3),
(97, 'SS111111', 10, 4),
(98, 'SS111111', 10, 5),
(99, 'SS111111', 10, 6),
(100, 'SS111111', 10, 1),
(101, 'SS111111', 10, 2),
(102, 'SS111111', 10, 3),
(103, 'SS111111', 20, 4),
(104, 'SS111111', 30, 5),
(105, 'SS222222', 20, 1),
(106, 'SS222222', 30, 2),
(107, 'SS111111', 20, 1),
(108, 'SS111111', 20, 2),
(109, 'SS111111', 30, 3),
(110, 'SS333333', 30, 1),
(111, 'SS333333', 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eventcalendar`
--

CREATE TABLE `eventcalendar` (
  `ID` int(11) NOT NULL,
  `Title` varchar(65) NOT NULL,
  `Details` varchar(500) NOT NULL,
  `eventDate` varchar(10) NOT NULL,
  `dateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcalendar`
--

INSERT INTO `eventcalendar` (`ID`, `Title`, `Details`, `eventDate`, `dateAdded`) VALUES
(13, 'Additional Lectures-1nd year B4 on "Developmental Psychology"', 'There will be two additional lectures for 2nd year students for "Developmental Psychology" on this date. The 1st lecture will be at 08:30 am, the 2nd lecture will be at 16:30 pm.\nThe venue will be the same hall.  ', '11/28/2017', '2017-11-22'),
(14, 'Staff Meeting - Attendance Compulsory', 'An important staff meeting will be held on this day at 17:30 pm at the Conference hall.  Please be kind enough to be on time. ', '11/30/2017', '2017-11-22'),
(15, 'Additiona lectures in Psychology brainwork.', 'There will be additional lectures on this day at 11.30am on the same hall. ', '11/08/2017', '2017-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `eventincome`
--

CREATE TABLE `eventincome` (
  `id` int(11) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTitle` varchar(50) NOT NULL,
  `Earnings` double NOT NULL,
  `Expenses` double NOT NULL,
  `Income` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `eventincome`
--

INSERT INTO `eventincome` (`id`, `eventDate`, `eventTitle`, `Earnings`, `Expenses`, `Income`) VALUES
(25, '2017-11-09', 'ResilienceCon 2K17', 56000, 45000, 11000),
(26, '2017-11-11', 'Positive Organizational Psychology ''17', 170000, 105000, 65000),
(29, '2017-11-08', 'GameFest 2k17', 150000, 60000, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `examfees`
--

CREATE TABLE `examfees` (
  `id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `regno` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `exam` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `totamount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examfeesbackup`
--

CREATE TABLE `examfeesbackup` (
  `id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `regno` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `exam` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `totamount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(200) NOT NULL,
  `employeeid` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expensesbackup`
--

CREATE TABLE `expensesbackup` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(200) NOT NULL,
  `employeeid` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensesbackup`
--

INSERT INTO `expensesbackup` (`id`, `date`, `category`, `employeeid`, `description`, `amount`) VALUES
(2, '2017-11-08', 'maintenance', 'itd', 'ss', 100);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_question_cos`
--

CREATE TABLE `feedback_question_cos` (
  `id` int(11) NOT NULL,
  `question` varchar(10000) NOT NULL,
  `radio1` int(11) NOT NULL,
  `radio2` int(11) NOT NULL,
  `radio3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_question_cos`
--

INSERT INTO `feedback_question_cos` (`id`, `question`, `radio1`, `radio2`, `radio3`) VALUES
(1, 'question 1', 0, 0, 0),
(2, 'q 2', 0, 0, 0),
(3, 'q --------------1', 0, 0, 0),
(4, 'q --------------------2', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(100) NOT NULL,
  `lecturer_ID` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_rate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `lecturer_ID`, `name`, `password`, `subject`, `email`, `address`, `total_rate`) VALUES
(1, 'SS111111', 'a', 'aaa', 'FOFF16', 'a@gmail.com', 'a', 260),
(2, 'SS222222', 'b', 'bbb', 'forensics and criminal psychology', 'b@gmail.com', 'malabe', 50),
(3, 'SS333333', 'c', 'ccc', 'display in child psychology', 'c@gmail.com', 'kandy', 210);

-- --------------------------------------------------------

--
-- Table structure for table `like_percentage`
--

CREATE TABLE `like_percentage` (
  `id` int(11) NOT NULL,
  `q_ID` int(11) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_percentage`
--

INSERT INTO `like_percentage` (`id`, `q_ID`, `percentage`) VALUES
(1, 6, 16.6667),
(2, 11, 16.6667),
(3, 13, 25),
(4, 14, 16.6667),
(5, 15, 16.6667),
(6, 16, 8.33333),
(7, 6, 16.6667),
(8, 11, 16.6667),
(9, 13, 25),
(10, 14, 16.6667),
(11, 15, 16.6667),
(12, 16, 8.33333),
(13, 6, 16.6667),
(14, 11, 16.6667),
(15, 13, 25),
(16, 14, 16.6667),
(17, 15, 16.6667),
(18, 16, 8.33333),
(19, 6, 16.6667),
(20, 11, 16.6667),
(21, 13, 25),
(22, 14, 16.6667),
(23, 15, 16.6667),
(24, 16, 8.33333),
(25, 6, 16.6667),
(26, 11, 16.6667),
(27, 13, 25),
(28, 14, 16.6667),
(29, 15, 16.6667),
(30, 16, 8.33333),
(31, 6, 16.6667),
(32, 11, 16.6667),
(33, 13, 25),
(34, 14, 16.6667),
(35, 15, 16.6667),
(36, 16, 8.33333),
(37, 6, 16.6667),
(38, 11, 16.6667),
(39, 13, 25),
(40, 14, 16.6667),
(41, 15, 16.6667),
(42, 16, 8.33333),
(43, 6, 16.6667),
(44, 11, 16.6667),
(45, 13, 25),
(46, 14, 16.6667),
(47, 15, 16.6667),
(48, 16, 8.33333),
(49, 6, 16.6667),
(50, 11, 16.6667),
(51, 13, 25),
(52, 14, 16.6667),
(53, 15, 16.6667),
(54, 16, 8.33333),
(55, 6, 16.6667),
(56, 11, 16.6667),
(57, 13, 25),
(58, 14, 16.6667),
(59, 15, 16.6667),
(60, 16, 8.33333),
(61, 6, 16.6667),
(62, 11, 16.6667),
(63, 13, 25),
(64, 14, 16.6667),
(65, 15, 16.6667),
(66, 16, 8.33333),
(67, 6, 16.6667),
(68, 11, 16.6667),
(69, 13, 25),
(70, 14, 16.6667),
(71, 15, 16.6667),
(72, 16, 8.33333),
(73, 6, 16.6667),
(74, 11, 16.6667),
(75, 13, 25),
(76, 14, 16.6667),
(77, 15, 16.6667),
(78, 16, 8.33333),
(79, 6, 16.6667),
(80, 11, 16.6667),
(81, 13, 25),
(82, 14, 16.6667),
(83, 15, 16.6667),
(84, 16, 8.33333),
(85, 6, 16.6667),
(86, 11, 16.6667),
(87, 13, 25),
(88, 14, 16.6667),
(89, 15, 16.6667),
(90, 16, 8.33333),
(91, 6, 16.6667),
(92, 11, 16.6667),
(93, 13, 25),
(94, 14, 16.6667),
(95, 15, 16.6667),
(96, 16, 8.33333),
(97, 6, 16.6667),
(98, 11, 16.6667),
(99, 13, 25),
(100, 14, 16.6667),
(101, 15, 16.6667),
(102, 16, 8.33333),
(103, 6, 16.6667),
(104, 11, 16.6667),
(105, 13, 25),
(106, 14, 16.6667),
(107, 15, 16.6667),
(108, 16, 8.33333),
(109, 6, 16.6667),
(110, 11, 16.6667),
(111, 13, 25),
(112, 14, 16.6667),
(113, 15, 16.6667),
(114, 16, 8.33333),
(115, 6, 16.6667),
(116, 11, 16.6667),
(117, 13, 25),
(118, 14, 16.6667),
(119, 15, 16.6667),
(120, 16, 8.33333),
(121, 6, 16.6667),
(122, 11, 16.6667),
(123, 13, 25),
(124, 14, 16.6667),
(125, 15, 16.6667),
(126, 16, 8.33333),
(127, 6, 16.6667),
(128, 11, 16.6667),
(129, 13, 25),
(130, 14, 16.6667),
(131, 15, 16.6667),
(132, 16, 8.33333),
(133, 6, 16.6667),
(134, 11, 16.6667),
(135, 13, 25),
(136, 14, 16.6667),
(137, 15, 16.6667),
(138, 16, 8.33333),
(139, 6, 16.6667),
(140, 11, 16.6667),
(141, 13, 25),
(142, 14, 16.6667),
(143, 15, 16.6667),
(144, 16, 8.33333),
(145, 6, 16.6667),
(146, 11, 16.6667),
(147, 13, 25),
(148, 14, 16.6667),
(149, 15, 16.6667),
(150, 16, 8.33333),
(151, 6, 16.6667),
(152, 11, 16.6667),
(153, 13, 25),
(154, 14, 16.6667),
(155, 15, 16.6667),
(156, 16, 8.33333),
(157, 6, 16.6667),
(158, 11, 16.6667),
(159, 13, 25),
(160, 14, 16.6667),
(161, 15, 16.6667),
(162, 16, 8.33333),
(163, 6, 21.4286),
(164, 11, 21.4286),
(165, 13, 21.4286),
(166, 14, 14.2857),
(167, 15, 14.2857),
(168, 16, 7.14286),
(169, 17, 0),
(170, 6, 21.4286),
(171, 11, 21.4286),
(172, 13, 21.4286),
(173, 14, 14.2857),
(174, 15, 14.2857),
(175, 16, 7.14286),
(176, 17, 0),
(177, 6, 21.4286),
(178, 11, 21.4286),
(179, 13, 21.4286),
(180, 14, 14.2857),
(181, 15, 14.2857),
(182, 16, 7.14286),
(183, 17, 0),
(184, 6, 29.4118),
(185, 11, 17.6471),
(186, 13, 17.6471),
(187, 14, 11.7647),
(188, 15, 11.7647),
(189, 16, 11.7647),
(190, 17, 0),
(191, 6, 29.4118),
(192, 11, 17.6471),
(193, 13, 17.6471),
(194, 14, 11.7647),
(195, 15, 11.7647),
(196, 16, 11.7647),
(197, 17, 0),
(198, 6, 29.4118),
(199, 11, 17.6471),
(200, 13, 17.6471),
(201, 14, 11.7647),
(202, 15, 11.7647),
(203, 16, 11.7647),
(204, 17, 0),
(205, 6, 29.4118),
(206, 11, 17.6471),
(207, 13, 17.6471),
(208, 14, 11.7647),
(209, 15, 11.7647),
(210, 16, 11.7647),
(211, 17, 0),
(212, 6, 29.4118),
(213, 11, 17.6471),
(214, 13, 17.6471),
(215, 14, 11.7647),
(216, 15, 11.7647),
(217, 16, 11.7647),
(218, 17, 0),
(219, 6, 29.4118),
(220, 11, 17.6471),
(221, 13, 17.6471),
(222, 14, 11.7647),
(223, 15, 11.7647),
(224, 16, 11.7647),
(225, 17, 0),
(226, 6, 29.4118),
(227, 11, 17.6471),
(228, 13, 17.6471),
(229, 14, 11.7647),
(230, 15, 11.7647),
(231, 16, 11.7647),
(232, 17, 0),
(233, 6, 29.4118),
(234, 11, 17.6471),
(235, 13, 17.6471),
(236, 14, 11.7647),
(237, 15, 11.7647),
(238, 16, 11.7647),
(239, 17, 0),
(240, 6, 29.4118),
(241, 11, 17.6471),
(242, 13, 17.6471),
(243, 14, 11.7647),
(244, 15, 11.7647),
(245, 16, 11.7647),
(246, 17, 0),
(247, 6, 29.4118),
(248, 11, 17.6471),
(249, 13, 17.6471),
(250, 14, 11.7647),
(251, 15, 11.7647),
(252, 16, 11.7647),
(253, 17, 0),
(254, 6, 29.4118),
(255, 11, 17.6471),
(256, 13, 17.6471),
(257, 14, 11.7647),
(258, 15, 11.7647),
(259, 16, 11.7647),
(260, 17, 0),
(261, 6, 29.4118),
(262, 11, 17.6471),
(263, 13, 17.6471),
(264, 14, 11.7647),
(265, 15, 11.7647),
(266, 16, 11.7647),
(267, 17, 0),
(268, 6, 29.4118),
(269, 11, 17.6471),
(270, 13, 17.6471),
(271, 14, 11.7647),
(272, 15, 11.7647),
(273, 16, 11.7647),
(274, 17, 0),
(275, 6, 29.4118),
(276, 11, 17.6471),
(277, 13, 17.6471),
(278, 14, 11.7647),
(279, 15, 11.7647),
(280, 16, 11.7647),
(281, 17, 0),
(282, 6, 29.4118),
(283, 11, 17.6471),
(284, 13, 17.6471),
(285, 14, 11.7647),
(286, 15, 11.7647),
(287, 16, 11.7647),
(288, 17, 0),
(289, 6, 29.4118),
(290, 11, 17.6471),
(291, 13, 17.6471),
(292, 14, 11.7647),
(293, 15, 11.7647),
(294, 16, 11.7647),
(295, 17, 0),
(296, 6, 29.4118),
(297, 11, 17.6471),
(298, 13, 17.6471),
(299, 14, 11.7647),
(300, 15, 11.7647),
(301, 16, 11.7647),
(302, 17, 0),
(303, 6, 29.4118),
(304, 11, 17.6471),
(305, 13, 17.6471),
(306, 14, 11.7647),
(307, 15, 11.7647),
(308, 16, 11.7647),
(309, 17, 0),
(310, 6, 29.4118),
(311, 11, 17.6471),
(312, 13, 17.6471),
(313, 14, 11.7647),
(314, 15, 11.7647),
(315, 16, 11.7647),
(316, 17, 0),
(317, 6, 29.4118),
(318, 11, 17.6471),
(319, 13, 17.6471),
(320, 14, 11.7647),
(321, 15, 11.7647),
(322, 16, 11.7647),
(323, 17, 0),
(324, 6, 29.4118),
(325, 11, 17.6471),
(326, 13, 17.6471),
(327, 14, 11.7647),
(328, 15, 11.7647),
(329, 16, 11.7647),
(330, 17, 0),
(331, 6, 29.4118),
(332, 11, 17.6471),
(333, 13, 17.6471),
(334, 14, 11.7647),
(335, 15, 11.7647),
(336, 16, 11.7647),
(337, 17, 0),
(338, 6, 29.4118),
(339, 11, 17.6471),
(340, 13, 17.6471),
(341, 14, 11.7647),
(342, 15, 11.7647),
(343, 16, 11.7647),
(344, 17, 0),
(345, 6, 29.4118),
(346, 11, 17.6471),
(347, 13, 17.6471),
(348, 14, 11.7647),
(349, 15, 11.7647),
(350, 16, 11.7647),
(351, 17, 0),
(352, 6, 29.4118),
(353, 11, 17.6471),
(354, 13, 17.6471),
(355, 14, 11.7647),
(356, 15, 11.7647),
(357, 16, 11.7647),
(358, 17, 0),
(359, 6, 33.3333),
(360, 11, 16.6667),
(361, 13, 16.6667),
(362, 14, 11.1111),
(363, 15, 11.1111),
(364, 16, 11.1111),
(365, 17, 0),
(366, 6, 33.3333),
(367, 11, 16.6667),
(368, 13, 16.6667),
(369, 14, 11.1111),
(370, 15, 11.1111),
(371, 16, 11.1111),
(372, 17, 0),
(373, 6, 31.5789),
(374, 11, 21.0526),
(375, 13, 15.7895),
(376, 14, 10.5263),
(377, 15, 10.5263),
(378, 16, 10.5263),
(379, 17, 0),
(380, 6, 31.5789),
(381, 11, 21.0526),
(382, 13, 15.7895),
(383, 14, 10.5263),
(384, 15, 10.5263),
(385, 16, 10.5263),
(386, 17, 0),
(387, 6, 46.1538),
(388, 14, 15.3846),
(389, 15, 15.3846),
(390, 16, 15.3846),
(391, 17, 0),
(392, 18, 7.69231);

-- --------------------------------------------------------

--
-- Table structure for table `lnotice`
--

CREATE TABLE `lnotice` (
  `id` int(11) NOT NULL,
  `notice` text NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnotice`
--

INSERT INTO `lnotice` (`id`, `notice`, `subject`) VALUES
(2, 'dfdsfs', 'F0FF16');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `ass1` int(100) NOT NULL,
  `ass2` int(100) NOT NULL,
  `mid` int(100) NOT NULL,
  `final` int(100) NOT NULL,
  `credit` int(100) NOT NULL,
  `tot` int(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `point` double(2,1) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `regno`, `ass1`, `ass2`, `mid`, `final`, `credit`, `tot`, `grade`, `point`, `subject`) VALUES
(3, 'DF333333', 5, 5, 15, 25, 0, 50, 'C', 2.0, 'F0FF16'),
(4, 'DF444444', 5, 5, 10, 25, 0, 45, 'C', 2.0, 'F0FF16'),
(5, 'DF555555', 10, 9, 26, 40, 0, 85, 'A', 3.7, 'F0FF16'),
(7, 'DF222222', 3, 3, 11, 21, 0, 38, 'D', 1.0, 'F0FF17'),
(8, 'DF333333', 6, 6, 17, 38, 0, 67, 'B', 3.0, 'F0FF17'),
(9, 'DF444444', 9, 9, 22, 25, 0, 65, 'B', 3.0, 'F0FF17'),
(10, 'DF555555', 8, 6, 18, 32, 0, 64, 'B-', 2.7, 'F0FF17'),
(11, 'DF666666', 10, 10, 30, 50, 0, 100, 'A+', 4.0, 'F0FF17'),
(13, 'DF777777', 0, 0, 0, 0, 0, 0, '', 0.0, 'Diploma in Bussiness and organization psychology'),
(14, 'DF777777', 0, 0, 0, 0, 0, 0, '', 0.0, 'Diploma in Child psychology'),
(15, 'DF777777', 0, 0, 0, 0, 0, 0, '', 0.0, 'Diploma in Forensics and criminal psychology'),
(18, 'DF999999', 0, 0, 0, 0, 0, 0, '', 0.0, 'F0FF17'),
(19, 'DF111111', 10, 7, 30, 50, 0, 90, 'A+', 4.0, 'F0FF16'),
(20, 'DF111111', 0, 0, 0, 0, 0, 0, '', 0.0, 'F0FF17');

-- --------------------------------------------------------

--
-- Table structure for table `marksenroll`
--

CREATE TABLE `marksenroll` (
  `subject` varchar(100) NOT NULL,
  `enkey` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `ccategoryid` int(100) NOT NULL,
  `cfee` int(100) NOT NULL,
  `total_rate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marksenroll`
--

INSERT INTO `marksenroll` (`subject`, `enkey`, `pw`, `ccategoryid`, `cfee`, `total_rate`) VALUES
('Bussiness and organization psychology', '19', '19', 2, 100, 0),
('Child and Adolance psychology', '18', '18', 2, 0, 0),
('Diploma in Bussiness and organization psychology', '21', '21', 3, 0, 0),
('Diploma in Child psychology', '22', '22', 3, 0, 0),
('Diploma in Forensics and criminal psychology', '23', '23', 3, 0, 0),
('F0FF16', '16', '16', 1, 0, 0),
('F0FF17', '17', '17', 1, 0, 0),
('Forensics and criminal psychology', '20', '20', 2, 0, 0),
('maths', '24', '24', 5, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(100) NOT NULL,
  `notice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice`) VALUES
(1, 'ITP Presentation Is on 23rd November 2017 At 501. Be there at least 20 minutes before.'),
(2, 'lllllllll');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `CreditcardNumber` int(16) NOT NULL,
  `CVV` int(3) NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentbackup`
--

CREATE TABLE `paymentbackup` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `CreditcardNumber` int(16) NOT NULL,
  `CVV` int(3) NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentbackup`
--

INSERT INTO `paymentbackup` (`id`, `Date`, `NIC`, `CreditcardNumber`, `CVV`, `Total`) VALUES
(1, '2017-11-23', '123456', 2147483647, 111, 2000),
(2, '2017-07-12', '12365478v', 2222222, 222, 1500),
(3, '2017-11-23', '11111111v', 2147483647, 123, 2000),
(4, '2017-11-23', '11111111v', 2147483647, 123, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `Author` varchar(30) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` float NOT NULL,
  `ImageLocation` varchar(100) NOT NULL,
  `FileLocation` varchar(100) NOT NULL,
  `CatID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Author`, `Description`, `Price`, `ImageLocation`, `FileLocation`, `CatID`) VALUES
(100, 'Introduction to applied psychology', 'Coleman R. Griffith', 'Publication date 1934 Publisher New York: The Macmillan company Collection universityoffloridaduplicates; univ_florida_smathers; americana Digitizing sponsor University of Florida, George A. Smathers Libraries with support from LYRASIS and the Sloan Foundation Contributor University of Florida, George A. Smathers Libraries Language English ', 2000, 'images/book1.jpg', 'pdf/M.Sc Applied Psychology.pdf', 1),
(101, 'The New Trading for a Living: Psychology, Trading Tactics, Risk Management, and Record-Keeping ', 'Alexander Elder', 'This classic guide teaches a calm and disciplined approach to the markets. It emphasizes risk management along with self-management and provides clear rules for both. "The New Trading for a Living" incudes templates for rating stock picks, creating trade plans, and rating your own readiness to trade. It provides the knowledge, perspective, and tools for developing your own effective trading system.\r\n', 1000, 'images/book2.jpg', 'pdf/Lab6.pdf', 2),
(103, 'The Memory Illusion: Remembering, Forgetting, and the Science of False Memory', 'Julia Shaw', 'We rely on our memories every day of our lives. They make us who we are. And yet the truth is, they are far from being the accurate record of the past we like to think they are. In The Memory Illusion, forensic psychologist and memory expert Dr Julia Shaw draws on the latest research to show why our memories so often play tricks on us and how, if we understand their fallibility, we can actually improve their accuracy. ', 2000, 'images/book3.jpg', 'pdf/book3.pdf', 1),
(104, 'The Happiness Hypothesis', 'Jonathan Haidt', 'In his widely praised book, award winning psychologist Jonathan Haidt examines the world''s philosophical wisdom through the lens of psychological science, showing how a deeper understanding of enduring maxims like "do unto others as you would have others do unto you," or "what doesn''t kill you makes you stronger" can enrich and even transform our lives.', 500, 'images/book4.jpg', 'pdf/book4.pdf', 2),
(105, 'The Psychology of Happiness', 'Samuel S.Franklin', 'This new edition of The Psychology of Happiness provides a comprehensive and up to date account of research into the nature of happiness. Major research developments have occurred since publication of the first edition in 1987  here they are brought together for the first time, often with surprising conclusions.\r\n\r\n', 1000, 'images/book5.jpg', 'pdf/applied.pdf', 1),
(106, 'Teaching Gender and Multicultural Awareness', 'Kathryn Quina', 'This volume provides information about how to integrate topics of diversity into a variety of psychology courses and programs of study. Because psychology now contains a rich body of knowledge that reaches across gender, social and cultural lines, a single class about gender or crosscultural studies is no longer sufficient to teach students about multiculturalism. Instead, such issues need to be incorporated into each part of the psychology curriculum', 2300, 'images/book6.jpg', 'pdf/bussiness.pdf', 2),
(250, 'a', 'a', 'aa', 500, 'images/5115++p0qQL._SX382_BO1,204,203,200_.jpg', 'pdf/2058.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `CatID` int(5) NOT NULL,
  `CatName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`CatID`, `CatName`) VALUES
(1, 'Applied Psychology'),
(2, 'Business Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_ID` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `q_detail` varchar(100) NOT NULL,
  `replies` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_ID`, `topic`, `q_detail`, `replies`, `likes`, `user_email`, `category`) VALUES
(6, 'fdsf', 'fvdsv', 1, 6, 'sachini@gmail.com', 'category 2'),
(14, 'jlkc', 'cnlj3p', 0, 2, 'ehd@gmail.com', 'category 3'),
(15, 'my topic 1', 'my question 1', 0, 2, 'vayo@gmail.com', 'category 1'),
(16, 'topic test', 'dsdasddsad', 2, 2, 'dhammika@gmail.com', 'category 3'),
(17, 'topic 1', 'question in details', 1, 0, 'kavin@gmail.com', 'category 2');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `no` int(11) NOT NULL,
  `Question_no` int(11) NOT NULL,
  `Quize_id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `type` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `choice5` text NOT NULL,
  `correct_answer` text NOT NULL,
  `description` text NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`no`, `Question_no`, `Quize_id`, `Question`, `type`, `choice1`, `choice2`, `choice3`, `choice4`, `choice5`, `correct_answer`, `description`, `subject`) VALUES
(11, 1, 66, 'Feeling touchy or hypersensitive following an upsetting experience is a form of', 'Medium', '(a) Imprinting', 'b) Bottom up processing', 'c) Statistical analysis', 'd) Reflexive Behaviour', '', 'b) Bottom up processing', 'medium2', ''),
(12, 2, 66, 'What procedure is used by experimenters to determine whether a difference between conditions of an experiment is large enough for us to have confidence in its validity', 'Easy', '(a) Imprinting', 'b) Scientific intuition', 'c) Subliminal Perception', 'd) Supraliminal', '', '(a) Imprinting', 'fsff', ''),
(13, 3, 66, 'Red is a color psychologically associated with harm. It stimulates the area of the brain that triggers sadness.', 'Hard', 'a)Communication skills', 'b) Scientific intuition', 'c) Sensitization', 'd) Use of student feeback', '', 'd) Use of student feeback', 'ewr', ''),
(14, 4, 66, 'Red is a color psychologically associated with harm. It stimulates the area of the brain that triggers sadness.', 'Medium', 'true', 'false', '', '', '', 'true', 'medium2', ''),
(16, 5, 70, 'What does PHP stand for?', 'easy', 'PHP: Hypertext Preprocessor', 'Private Home Page', 'Personal Hypertext Processor', '', '', 'Private Home Page', 'easy1', ''),
(17, 6, 73, 'is snsd best kpop group?', 'Easy', '(a) Imprinting', 'b) Bottom up processing', 'c) Subliminal Perception', 'd) Use of student feeback', 'false', '(a) Imprinting', 'eretrter', 'F0F516'),
(18, 7, 73, 'Feeling touchy or hypersensitive following an upsetting experience is a form of', 'Easy', '(a) Imprinting', 'b)Use of ICT', 'Dependent variables', 'd) None of thes', 'false', 'd) None of thes', 'erwr', 'F0F516'),
(19, 8, 73, 'What procedure is used by experimenters to determine whether a difference between conditions of an experiment is large enough for us to have confidence in its validity', 'Medium', 'a) Correlation coefficient', 'Individuals prone to heart attacks are predisposed to drink a lot of coffee', 'c)Dependent variables', 'd) Use of student feeback', 'false', 'd) Use of student feeback', 'medium2', 'F0F516'),
(20, 9, 73, 'Red is a color psychologically associated with harm. It stimulates the area of the brain that triggers sadness.', 'Medium', 'a)Communication skills', 'b) Habituation', 'An active life style of certain people causes heart attack', 'd) Use of student feeback', 'false', 'b) Habituation', 'etvcretv', 'F0F516'),
(21, 10, 73, 'Research shows that the following does not contribute to teacher effectiveness', 'Hard', 'If one finds a positive correlation between degree of coffee drinking and the likelihood of heart attacksa) Coffee drinking causes heart attack', 'b) Bottom up processing', 'c) Subliminal Perception', 'd) Use of student feeback', 'false', 'c) Subliminal Perception', 'gtrhr', 'F0F516'),
(22, 11, 73, 'If one finds a positive correlation between degree of coffee drinking and the likelihood of heart attacks. One can conclude that:X. One can conclude that:', 'Hard', 'a) Correlation coefficient', 'b) Habituation', 'c) Subliminal Perception', 'None of these', 'false', 'None of these', 'dssda', 'F0F516'),
(23, 1, 75, 'Q1', 'Easy', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'a)Answer1', 'Easy Q 1', 'F0FF16'),
(24, 2, 75, 'Q2', 'Easy', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'd)Answer4', 'Easy Q 2', 'F0FF16'),
(25, 3, 75, 'Q3', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'c)Answer3', 'Medium Q1', 'F0FF16'),
(26, 4, 75, 'Q4', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'a)Answer1', 'Medium Q2', 'F0FF16'),
(27, 5, 75, 'Q5', 'Hard ', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'd)Answer4', 'Hard Q1', 'F0FF16'),
(28, 3, 75, 'Q6', 'Hard', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'c)Answer3', 'Hard Q2', 'F0FF16'),
(29, 0, 75, 'Q7', 'Easy', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'e)Answer5', 'Q7 ', 'F0FF16'),
(30, 0, 76, 'Q1', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'b)Answer2', 'Easy Q 1', 'F0FF16'),
(31, 0, 76, 'Q1', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'b)Answer2', 'Easy Q 1', 'F0FF16'),
(32, 0, 76, 'Q1', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'd)Answer4', 'Easy Q 1', 'F0FF16'),
(33, 0, 76, 'Q1', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'b)Answer2', 'Easy Q 1', 'F0FF16'),
(34, 0, 76, 'Q1', 'Medium', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'b)Answer2', 'Easy Q 1', 'F0FF16'),
(35, 0, 75, 'Q7', 'Hard', 'a)Answer1', 'b)Answer2', 'c)Answer3', 'd)Answer4', 'e)Answer5', 'b)Answer2', 'Hard', 'F0FF16');

-- --------------------------------------------------------

--
-- Table structure for table `quize_info`
--

CREATE TABLE `quize_info` (
  `quizeid` int(11) NOT NULL,
  `quizename` text NOT NULL,
  `no_easy` int(11) NOT NULL,
  `points_easy` int(11) NOT NULL,
  `no_medium` int(11) NOT NULL,
  `points_medium` int(11) NOT NULL,
  `no_hard` int(11) NOT NULL,
  `points_hard` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `totalmarks` int(11) NOT NULL,
  `enrolment_key` text NOT NULL,
  `subject` text NOT NULL,
  `time` int(11) NOT NULL,
  `percentagefm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quize_info`
--

INSERT INTO `quize_info` (`quizeid`, `quizename`, `no_easy`, `points_easy`, `no_medium`, `points_medium`, `no_hard`, `points_hard`, `total_questions`, `totalmarks`, `enrolment_key`, `subject`, `time`, `percentagefm`) VALUES
(66, 'test1', 1, 1, 1, 2, 1, 3, 3, 6, '123Ww', 'F0FF16', 5, 60),
(67, 'test1', 1, 1, 1, 2, 1, 3, 3, 6, '123Kk', 'F0FF16', 5, 0),
(70, 'test3', 2, 5, 3, 6, 5, 7, 10, 63, 'kK123', 'F0FF16', 10, 0),
(71, 'test2', 1, 1, 2, 2, 3, 3, 6, 14, 'fT443', 'F0FF16', 10, 0),
(73, 'test21', 1, 10, 1, 20, 1, 30, 3, 60, 'kK123', 'F0F516', 15, 60),
(75, 'Testing', 1, 10, 1, 20, 1, 30, 3, 60, 'Test1', 'F0FF16', 20, 20),
(76, 'test1', 1, 10, 1, 20, 1, 30, 3, 60, 'Ek123', 'F0FF16', 5, 20),
(77, 'test1', 1, 10, 1, 20, 1, 30, 3, 60, 'Kk123', 'F0FF16', 5, 10),
(78, 'test1', 2, 1, 2, 1, 2, 1, 6, 6, 'Kk222', 'F0FF16', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `no` int(11) NOT NULL,
  `Quize_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `student_id` text NOT NULL,
  `marks` double NOT NULL,
  `persentage` double NOT NULL,
  `grade` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`no`, `Quize_id`, `subject`, `student_id`, `marks`, `persentage`, `grade`) VALUES
(1, 73, 'F0FF16', 'user', 0, 0, 'F'),
(2, 73, 'F0F516', 'user', 0, 0, 'D'),
(3, 73, 'F0F516', 'user', 0, 0, 'D'),
(9, 73, 'F0F516', 'user', 0, 0, 'D'),
(10, 73, 'F0F516', 'user', 30, 50, 'C'),
(11, 73, 'F0F516', 'user', 40, 66.67, 'B'),
(12, 73, 'F0F516', 'user', 0, 0, 'D'),
(38, 73, 'F0F516', 'user', 0, 0, 'D'),
(39, 66, 'F0FF16', '333', 0, 0, 'D'),
(40, 66, 'F0FF16', '333', 0, 0, 'D'),
(41, 66, 'F0FF16', '333', 0, 0, 'D'),
(42, 66, 'F0FF16', '333', 0, 0, 'D'),
(43, 66, 'F0FF16', '333', 2, 33.33, 'D'),
(44, 66, 'F0FF16', '333', 0, 0, 'D'),
(45, 73, 'F0F516', 'user', 30, 50, 'C'),
(46, 73, 'F0F516', 'user', 30, 50, 'C'),
(47, 73, 'F0F516', 'user', 30, 50, 'C'),
(48, 73, 'F0F516', 'user', 30, 50, 'C'),
(49, 73, 'F0F516', 'user', 30, 50, 'C'),
(50, 73, 'F0F516', 'user', 30, 50, 'C'),
(51, 73, 'F0F516', 'user', 30, 50, 'C'),
(52, 66, 'F0FF16', '333', 2, 33.33, 'D'),
(53, 73, 'F0F516', 'user', 30, 50, 'C'),
(54, 73, 'F0F516', 'user', 30, 50, 'C'),
(55, 75, 'F0FF16', 'teststd', 10, 8.33, 'D'),
(56, 75, 'F0FF16', 'teststd', 0, 0, 'D'),
(57, 75, 'F0FF16', 'teststd', 0, 0, 'D'),
(58, 75, 'F0FF16', 'teststd', 0, 0, 'D'),
(59, 75, 'F0FF16', 'teststd', 30, 25, 'D'),
(60, 75, 'F0FF16', 'teststd', 20, 33.33, 'D'),
(61, 75, 'F0FF16', 'DC123456', 30, 50, 'C'),
(62, 75, 'F0FF16', 'user', 0, 0, 'D'),
(63, 75, 'F0FF16', 'DF111111', 0, 0, 'D'),
(64, 75, 'F0FF16', 'DF111111', 0, 0, 'D'),
(65, 75, 'F0FF16', 'DF111111', 0, 0, 'D'),
(66, 75, 'F0FF16', 'DF111111', 20, 33.33, 'D'),
(67, 75, 'F0FF16', 'DF111111', 20, 33.33, 'D'),
(68, 75, 'F0FF16', 'DF111111', 20, 33.33, 'D'),
(69, 75, 'F0FF16', 'DF111111', 20, 33.33, 'D'),
(70, 75, 'F0FF16', 'DF111111', 30, 50, 'C'),
(71, 75, 'F0FF16', 'DF111111', 0, 0, 'D'),
(72, 75, 'F0FF16', 'DF111111', 20, 33.33, 'D'),
(73, 75, 'F0FF16', 'DF111111', 0, 0, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `login` varchar(100) NOT NULL,
  `quiz_id` int(100) NOT NULL,
  `score` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`login`, `quiz_id`, `score`) VALUES
('user', 66, 4),
('user2', 66, 5);

-- --------------------------------------------------------

--
-- Table structure for table `statics`
--

CREATE TABLE `statics` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `income` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statics`
--

INSERT INTO `statics` (`id`, `date`, `income`, `expense`, `profit`) VALUES
(37, '2017-08-30', 354500, 0, 354500),
(38, '2017-11-16', 4001, 0, 4001),
(39, '2017-11-16', 100, 100, 0),
(40, '2017-11-08', 4200, 0, 4200);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `ccategoryid` int(100) NOT NULL,
  `totamount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentbackup`
--

CREATE TABLE `studentbackup` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `ccategoryid` int(100) NOT NULL,
  `totamount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentbackup`
--

INSERT INTO `studentbackup` (`id`, `regno`, `pw`, `name`, `email`, `address`, `dob`, `ccategoryid`, `totamount`) VALUES
(1, 'DF111111', 'aaa', 'Mike Tyson', '', '', '2017-11-21', 1, 0),
(2, 'DF222222', 'bbb', 'Rickey Ponting', '', '', '2017-11-08', 1, 0),
(3, 'DF333333', 'ccc', 'Drake Parker', '', '', '2017-11-09', 1, 0),
(4, 'DF444444', 'ddd', 'Shaun Tait', '', '', '2017-11-17', 1, 0),
(5, 'DF777777', 'd', 'd', 'd@gmail.com', 'd', '2017-11-24', 3, 1),
(6, 'aa', '', 'aa', '', '', '2017-11-07', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file`, `type`, `size`) VALUES
(3, '56597-s-profile.pdf', 'applicatio', 63);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_country`, `user_status`) VALUES
(1, 'sachini', 'sachini@gmail.com', '1234', '2', '0'),
(4, 'wora', 'worandi10@gmail.com', '1234', '4', '0'),
(5, 'vayoma', 'v@gmail.com', '1234', '4', '0'),
(7, 'me', 'me@gmail.com', '1234', '5', '0'),
(8, 'worandi', 'worandi@gmail.com', '1234', '5', '0'),
(9, 'me2', 'me2@gmail.com', '1234', '5', '1'),
(11, 'user', 'user@gmail.com', '1234', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_like`
--

CREATE TABLE `user_like` (
  `q_ID` int(11) NOT NULL,
  `user_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_like`
--

INSERT INTO `user_like` (`q_ID`, `user_ID`) VALUES
(6, ''),
(6, '10'),
(6, '11'),
(6, '7'),
(6, '8'),
(6, 'DF111111'),
(11, '10'),
(11, '11'),
(11, '7'),
(11, '8'),
(11, 'DF111111'),
(13, '10'),
(13, '11'),
(13, '7'),
(14, '10'),
(14, '11'),
(15, '10'),
(16, '10'),
(16, '11'),
(18, 'DF111111'),
(19, 'DF111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abc`
--
ALTER TABLE `abc`
  ADD PRIMARY KEY (`gap`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubtype`
--
ALTER TABLE `clubtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_event`
--
ALTER TABLE `club_event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `club_member`
--
ALTER TABLE `club_member`
  ADD PRIMARY KEY (`CIRP_ID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `course_feedback`
--
ALTER TABLE `course_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `eventincome`
--
ALTER TABLE `eventincome`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`eventTitle`);

--
-- Indexes for table `examfees`
--
ALTER TABLE `examfees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`regno`);

--
-- Indexes for table `examfeesbackup`
--
ALTER TABLE `examfeesbackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensesbackup`
--
ALTER TABLE `expensesbackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_question_cos`
--
ALTER TABLE `feedback_question_cos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_percentage`
--
ALTER TABLE `like_percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lnotice`
--
ALTER TABLE `lnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksenroll`
--
ALTER TABLE `marksenroll`
  ADD PRIMARY KEY (`subject`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentbackup`
--
ALTER TABLE `paymentbackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `quize_info`
--
ALTER TABLE `quize_info`
  ADD PRIMARY KEY (`quizeid`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `statics`
--
ALTER TABLE `statics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regno` (`regno`);

--
-- Indexes for table `studentbackup`
--
ALTER TABLE `studentbackup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regno` (`regno`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- Indexes for table `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`q_ID`,`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `clubtype`
--
ALTER TABLE `clubtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `club_event`
--
ALTER TABLE `club_event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_feedback`
--
ALTER TABLE `course_feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `eventincome`
--
ALTER TABLE `eventincome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `examfees`
--
ALTER TABLE `examfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examfeesbackup`
--
ALTER TABLE `examfeesbackup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expensesbackup`
--
ALTER TABLE `expensesbackup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback_question_cos`
--
ALTER TABLE `feedback_question_cos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `like_percentage`
--
ALTER TABLE `like_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paymentbackup`
--
ALTER TABLE `paymentbackup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `quize_info`
--
ALTER TABLE `quize_info`
  MODIFY `quizeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `statics`
--
ALTER TABLE `statics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `studentbackup`
--
ALTER TABLE `studentbackup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
