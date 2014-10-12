-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2014 at 03:16 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_detail` text NOT NULL,
  `event_createdate` date NOT NULL,
  `event_startday` varchar(25) NOT NULL,
  `event_startdate` date NOT NULL,
  `event_enddate` date NOT NULL,
  `event_finishdate` date NOT NULL,
  `event_status` int(11) NOT NULL DEFAULT '0' COMMENT '0= รอ , 1= ดำเนิน,2 = เสร็จ',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `mem_id`, `event_name`, `event_detail`, `event_createdate`, `event_startday`, `event_startdate`, `event_enddate`, `event_finishdate`, `event_status`) VALUES
(1, 0, 'test', 'test', '0000-00-00', '', '0000-00-00', '0000-00-00', '2014-10-12', 2),
(2, 0, 'testdate', 'testdate', '2014-09-03', '', '2014-09-10', '2014-09-03', '2014-10-12', 2),
(3, 0, 'new event', 'new event new event new event new event new event new event new event new event', '2014-09-02', '', '2014-09-10', '2014-09-25', '2014-10-12', 2),
(4, 0, 'enddate', 'enddate', '2014-09-10', '', '2014-09-10', '2014-09-09', '2014-10-12', 2),
(5, 1, 'poolsawat', 'poolsawat', '2014-09-02', '', '2014-09-17', '2014-09-16', '2014-10-12', 2),
(6, 1, 'เเที่ยว สวน ยาง ระยอง', 'เเที่ยว สวน ยาง ระยอง', '2014-09-10', 'Mon', '2014-09-10', '2014-09-19', '2014-10-12', 2),
(7, 1, 'ไปไหนกันดีในวันหยุด', 'ไปไหนกันดีในวันหยุด', '2014-09-12', 'Mon', '2014-09-15', '2014-09-19', '2014-10-12', 2),
(8, 1, 'ฮาๆๆๆๆๆ', 'ฮาๆๆๆๆๆ', '2014-09-12', 'Mon', '2014-09-15', '2014-09-24', '2014-09-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_username` varchar(50) NOT NULL,
  `mem_password` varchar(50) NOT NULL,
  `mem_fname` varchar(50) NOT NULL,
  `mem_lname` varchar(50) NOT NULL,
  `mem_tel` varchar(15) NOT NULL,
  `mem_email` varchar(50) NOT NULL,
  `mem_address` text NOT NULL,
  `mem_status` int(11) NOT NULL COMMENT '0 = ทั่วไป , 1 = admin , 2 = member , 3 = Discredit, 4 = other',
  `mem_point` int(11) NOT NULL,
  `mem_active` int(1) NOT NULL DEFAULT '0' COMMENT '0 => unactive , 1 = active',
  `mem_createdate` date NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_username`, `mem_password`, `mem_fname`, `mem_lname`, `mem_tel`, `mem_email`, `mem_address`, `mem_status`, `mem_point`, `mem_active`, `mem_createdate`) VALUES
(1, 'admin', '1234', 'admin', 'admin', '111', '1111@hotm.xom', '111', 1, 0, 0, '2014-10-12'),
(2, '111111', '111111', 'q', 'q', '111', '1111@hotm.xom', '111', 2, 0, 0, '2014-10-12'),
(3, '111111', '11111111', '111111111111111111', '111111111111', '111', 'poon_mp@hotmail.com', '111111111111111', 2, 0, 0, '2014-10-12'),
(4, '555555', '555555', '555555', '555555', '555555', 'poon_mp@hotmail.com', '555555', 2, 0, 0, '2014-10-12'),
(5, '2015oo', '2015oo', '2015oo', '2015oo', '2015oo', 'poon_mp@hotmail.com', '2015oo', 0, 0, 0, '2014-10-12'),
(6, 'zeenan', 'pwL6cj', 'zeenan', 'zeenan', '0000000000', '000000@hotmail.com', '-', 2, 0, 0, '2014-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `prob_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `prob_name` varchar(255) NOT NULL,
  `prob_detail` text NOT NULL,
  `prob_priority` int(11) NOT NULL DEFAULT '0' COMMENT 'ความสำคัญ 0 = ธรรมดา , 1 = สำคัญ',
  `prob_createdate` date NOT NULL,
  PRIMARY KEY (`prob_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`prob_id`, `mem_id`, `prob_name`, `prob_detail`, `prob_priority`, `prob_createdate`) VALUES
(1, 2, 'testtesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttes', 0, '0000-00-00'),
(3, 2, 'echo JavascriptUtil::returnJsonArray(''1'', ''ลบสำเร็จ'', '''');', 'echo JavascriptUtil::returnJsonArray(''1'', ''ลบสำเร็จ'', '''');', 0, '0000-00-00'),
(4, 2, ' style=', ' style=', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `problem_answer`
--

CREATE TABLE IF NOT EXISTS `problem_answer` (
  `proa_id` int(11) NOT NULL AUTO_INCREMENT,
  `prob_id` int(11) NOT NULL COMMENT 'รหัสปัญหา',
  `mem_id` int(11) NOT NULL,
  `proa_detail` varchar(255) NOT NULL,
  `proa_createdate` date NOT NULL,
  `proa_good` int(11) NOT NULL,
  `proa_bad` int(11) NOT NULL,
  PRIMARY KEY (`proa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `problem_answer`
--

INSERT INTO `problem_answer` (`proa_id`, `prob_id`, `mem_id`, `proa_detail`, `proa_createdate`, `proa_good`, `proa_bad`) VALUES
(1, 4, 2, '1111', '2014-10-12', 0, 0),
(2, 4, 2, 'dfdf', '2014-10-12', 0, 0),
(3, 3, 2, 'fdfdf', '2014-10-12', 0, 0),
(4, 3, 2, 'dfdfdfdf', '2014-10-12', 0, 0),
(5, 3, 2, 'mew', '2014-10-12', 0, 0),
(6, 3, 2, 'เอกสาร', '2014-10-12', 0, 0),
(7, 1, 2, 'ตอบแล้วนะ', '2014-10-12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `programming_language`
--

CREATE TABLE IF NOT EXISTS `programming_language` (
  `prolan_id` int(11) NOT NULL AUTO_INCREMENT,
  `prolan_name` varchar(100) NOT NULL,
  `prolan_desc` text NOT NULL,
  `prolan_createdate` date NOT NULL,
  PRIMARY KEY (`prolan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `programming_language`
--

INSERT INTO `programming_language` (`prolan_id`, `prolan_name`, `prolan_desc`, `prolan_createdate`) VALUES
(1, 'html/html5', 'html/html5', '2014-09-27'),
(2, 'javascript', 'javascript/Jqurty', '2014-09-27'),
(3, 'php', 'php', '2014-09-27'),
(4, 'jsp', 'jsp', '2014-09-27'),
(5, 'sql', 'sql', '2014-09-27'),
(6, 'C#', 'C#', '2014-09-28'),
(7, '.net', '.net', '2014-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nameth` varchar(150) NOT NULL,
  `pro_nameeng` varchar(150) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `pro_descrition` text NOT NULL,
  `pro_prices` int(11) NOT NULL,
  `pro_startdate` date NOT NULL,
  `pro_enddate` date NOT NULL,
  `pro_createdate` date NOT NULL,
  `pro_paytype` int(11) NOT NULL COMMENT 'ลักษณะการจ่ายเงิน (2 งวด, 3 งวด,...)',
  `pro_pay1` int(11) NOT NULL COMMENT 'จ่ายงวด 1',
  `pro_pay2` int(11) NOT NULL COMMENT 'จ่ายงวด 2',
  `pro_pay3` int(11) NOT NULL COMMENT 'จ่ายงวด 3',
  `pro_tooldevelop` int(2) NOT NULL COMMENT 'เครื่องมือ',
  `pro_tooldatabase` int(2) NOT NULL COMMENT 'ฐานข้อมูล',
  `pro_applicationtype` int(11) NOT NULL COMMENT 'ลักษณะการพัฒนา (Web app, Windown App,Mobile App)',
  `pro_remark` text NOT NULL,
  `pro_status` int(11) NOT NULL COMMENT 'สถานะของโปรเจค 0 = รอ, 1 = ดำเนินการ , 2 = เสร็จ ,3 = ผิดพลาด',
  `pro_pay_step` int(11) NOT NULL COMMENT '(0= รอจ่ายงวดแรก ,1 = จ่ายงวดแรกแล้ว , 2 = จ่ายงวดสองแล้ว 3 = จ่ายงวด สามแล้ว)',
  `prouml_use` int(1) NOT NULL DEFAULT '0' COMMENT 'ต้องการเอกสารพัฒนาระบบด้วยหรือ ไม่ (0 = ไม่เอา , 1 = ต้องการ)',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `pro_nameth`, `pro_nameeng`, `mem_id`, `pro_descrition`, `pro_prices`, `pro_startdate`, `pro_enddate`, `pro_createdate`, `pro_paytype`, `pro_pay1`, `pro_pay2`, `pro_pay3`, `pro_tooldevelop`, `pro_tooldatabase`, `pro_applicationtype`, `pro_remark`, `pro_status`, `pro_pay_step`, `prouml_use`) VALUES
(1, 'test', 'test', 1, 'test', 111, '2014-09-01', '2014-09-28', '2014-10-12', 3, 0, 0, 0, 2, 2, 2, 'remark', 0, 0, 1),
(2, 'testyesy', 'testyesy', 1, 'testyesy', 111, '2014-09-01', '2014-09-30', '2014-09-28', 0, 0, 0, 0, 2, 1, 1, 'remark', 0, 0, 1),
(3, 'ทดสอบ', 'ทดสอบ', 1, 'ทดสอบ', 1999, '2014-09-28', '2014-09-28', '2014-09-28', 2, 0, 0, 0, 2, 1, 2, 'remark', 0, 0, 1),
(4, 'จ้างพัฒนาโปรแกรท', 'จ้างพัฒนาโปรแกรท', 1, 'จ้างพัฒนาโปรแกรท', 11111, '2014-09-03', '2014-09-27', '2014-09-28', 3, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(5, 'โปรแกรมจัดการเอกสาร', 'โปรแกรมจัดการเอกสาร', 1, 'โปรแกรมจัดการเอกสาร', 100000, '2014-10-07', '2014-10-07', '2014-10-07', 2, 0, 0, 0, 2, 1, 1, 'remark', 0, 0, 1),
(6, '11', '11', 1, '11', 111, '2014-09-08', '2014-09-01', '2014-10-11', 1, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(7, '1', '1', 1, '11', 1, '2014-09-02', '2014-09-08', '2014-10-11', 1, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(8, '11', '11', 1, '11', 11, '2014-09-09', '2014-09-09', '2014-10-11', 1, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(9, '1', '1', 1, '1', 1, '2014-09-02', '2014-09-02', '2014-10-11', 1, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(10, '11', '1', 2, '1', 1, '2014-09-09', '2014-09-09', '2014-10-11', 3, 0, 0, 0, 1, 1, 1, 'remark', 2, 0, 1),
(11, '1ttttt', '1', 2, '1', 1, '2014-09-09', '2014-09-08', '2014-10-12', 1, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(12, '1', '1', 2, '1', 1, '2014-09-02', '2014-09-09', '2014-10-11', 1, 0, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(13, 'test', 'test', 2, 'test', 1000, '2014-09-11', '2014-09-01', '2014-10-11', 1, 300, 0, 0, 1, 1, 1, 'remark', 0, 0, 1),
(14, 'ทำระบบจ่ายเงิน', 'Payment System', 2, 'Payment System ระบบจ่ายเงิน', 9000, '2014-09-01', '2014-09-26', '2014-10-11', 3, 0, 0, 0, 2, 1, 1, 'remark', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_lang`
--

CREATE TABLE IF NOT EXISTS `project_lang` (
  `prolang_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL COMMENT 'รหัสโปรเจค',
  `prolan_id` int(11) NOT NULL COMMENT 'รหัสภาษา',
  `prolang_createdate` date NOT NULL,
  PRIMARY KEY (`prolang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `project_lang`
--

INSERT INTO `project_lang` (`prolang_id`, `pro_id`, `prolan_id`, `prolang_createdate`) VALUES
(5, 3, 2, '2014-09-28'),
(6, 3, 4, '2014-09-28'),
(7, 3, 3, '2014-09-28'),
(8, 3, 1, '2014-09-28'),
(18, 2, 1, '2014-09-28'),
(19, 2, 2, '2014-09-28'),
(20, 2, 3, '2014-09-28'),
(21, 2, 4, '2014-09-28'),
(22, 2, 5, '2014-09-28'),
(26, 4, 1, '2014-09-28'),
(27, 4, 2, '2014-09-28'),
(28, 4, 4, '2014-09-28'),
(29, 4, 5, '2014-09-28'),
(30, 4, 7, '2014-09-28'),
(34, 5, 1, '2014-10-07'),
(35, 5, 2, '2014-10-07'),
(36, 5, 4, '2014-10-07'),
(37, 5, 7, '2014-10-07'),
(41, 13, 1, '2014-10-11'),
(42, 13, 2, '2014-10-11'),
(43, 14, 1, '2014-10-11'),
(44, 14, 2, '2014-10-11'),
(45, 14, 3, '2014-10-11'),
(46, 14, 4, '2014-10-11'),
(62, 11, 1, '2014-10-12'),
(63, 11, 2, '2014-10-12'),
(64, 11, 3, '2014-10-12'),
(65, 11, 4, '2014-10-12'),
(66, 11, 5, '2014-10-12'),
(67, 11, 6, '2014-10-12'),
(68, 11, 7, '2014-10-12'),
(69, 1, 1, '2014-10-12'),
(70, 1, 2, '2014-10-12'),
(71, 1, 4, '2014-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `project_log`
--

CREATE TABLE IF NOT EXISTS `project_log` (
  `prolog_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `prolog_name` varchar(255) NOT NULL,
  `prolog_createdate` date NOT NULL,
  `prolog_fixdate` date NOT NULL,
  `prolog_status` int(1) NOT NULL COMMENT '0 = ยังไมไ่ด้แก้,1 = แก้ไขแล้ว',
  PRIMARY KEY (`prolog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `project_log`
--

INSERT INTO `project_log` (`prolog_id`, `pro_id`, `prolog_name`, `prolog_createdate`, `prolog_fixdate`, `prolog_status`) VALUES
(1, 1, 'qqqqqqqqqqqqqqqqqq', '2014-09-29', '2014-09-29', 0),
(3, 0, 'หหหหหทดสอบระบบ', '2014-09-29', '2014-09-29', 0),
(4, 0, 'sdsdsdsddsdsdsdsdxcxcxc11111111111111', '2014-09-29', '2014-09-29', 0),
(7, 2, 'new bug', '2014-09-29', '2014-09-29', 0),
(8, 2, 'new bug new bug new bug new bu', '2014-09-29', '2014-09-29', 0),
(13, 3, 'newewewewe', '2014-09-30', '2014-09-30', 0),
(14, 3, 'dfdfdfdf', '2014-09-30', '2014-09-30', 0),
(15, 1, 'new bug', '2014-09-30', '2014-09-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_uml`
--

CREATE TABLE IF NOT EXISTS `project_uml` (
  `prouml_id` int(11) NOT NULL AUTO_INCREMENT,
  `uml_id` int(11) NOT NULL COMMENT 'รหัส uml',
  `pro_id` int(11) NOT NULL COMMENT 'รหัสเลขที่ โปรเจค',
  `prouml_status` int(11) NOT NULL COMMENT '0 = ยังไม่ทำ 1 = กำลังทำ,2 = เสร็จแล้ว',
  PRIMARY KEY (`prouml_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `project_uml`
--

INSERT INTO `project_uml` (`prouml_id`, `uml_id`, `pro_id`, `prouml_status`) VALUES
(8, 1, 3, 2),
(9, 2, 3, 0),
(10, 3, 3, 0),
(11, 4, 3, 0),
(12, 5, 3, 0),
(13, 6, 3, 0),
(14, 7, 3, 0),
(15, 8, 3, 0),
(16, 9, 3, 0),
(17, 10, 3, 0),
(18, 11, 3, 0),
(19, 12, 3, 0),
(20, 13, 3, 0),
(42, 1, 2, 0),
(43, 2, 2, 0),
(44, 3, 2, 0),
(45, 4, 2, 0),
(46, 5, 2, 0),
(47, 6, 2, 0),
(48, 7, 2, 0),
(49, 8, 2, 0),
(50, 9, 2, 0),
(51, 10, 2, 0),
(52, 11, 2, 0),
(53, 12, 2, 0),
(54, 13, 2, 0),
(63, 1, 4, 2),
(64, 4, 4, 1),
(65, 7, 4, 1),
(66, 10, 4, 1),
(67, 13, 4, 0),
(76, 1, 5, 2),
(77, 5, 5, 0),
(78, 1, 1, 0),
(79, 2, 1, 0),
(80, 3, 1, 0),
(81, 4, 1, 0),
(82, 7, 1, 0),
(83, 10, 1, 0),
(84, 11, 1, 0),
(85, 13, 1, 0),
(86, 1, 13, 0),
(87, 2, 13, 0),
(88, 5, 13, 0),
(89, 1, 14, 2),
(90, 7, 14, 1),
(91, 9, 14, 1),
(92, 12, 14, 1),
(93, 13, 14, 0),
(94, 1, 11, 0),
(95, 2, 11, 0),
(96, 3, 11, 0),
(97, 6, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tools_database`
--

CREATE TABLE IF NOT EXISTS `tools_database` (
  `tooldata_id` int(11) NOT NULL AUTO_INCREMENT,
  `tooldata_name` varchar(100) NOT NULL,
  `tooldata_desc` varchar(255) NOT NULL,
  `tooldata_createdate` date NOT NULL,
  PRIMARY KEY (`tooldata_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tools_database`
--

INSERT INTO `tools_database` (`tooldata_id`, `tooldata_name`, `tooldata_desc`, `tooldata_createdate`) VALUES
(1, 'MySQL', 'MySQL', '2014-09-27'),
(2, 'MS SQL Server', 'MS SQL Server', '2014-09-27'),
(3, 'DB2', 'DB2', '2014-09-27'),
(4, 'Oracle', 'Oracle', '2014-09-27'),
(5, 'PostgreSQL', 'PostgreSQL', '2014-09-27'),
(6, 'ANSI SQL', 'ANSI SQL', '2014-09-27'),
(7, 'MySQLite', 'MySQLite', '2014-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `tools_developer`
--

CREATE TABLE IF NOT EXISTS `tools_developer` (
  `tooldev_id` int(11) NOT NULL AUTO_INCREMENT,
  `tooldev_name` varchar(100) NOT NULL,
  `tooldev_desc` varchar(255) NOT NULL,
  `tooldev_createdate` date NOT NULL,
  PRIMARY KEY (`tooldev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tools_developer`
--

INSERT INTO `tools_developer` (`tooldev_id`, `tooldev_name`, `tooldev_desc`, `tooldev_createdate`) VALUES
(1, 'eclipse', 'eclipse', '2014-09-27'),
(2, 'netbean', 'netbean', '2014-09-27'),
(3, 'notepad', 'notepad', '2014-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `uml`
--

CREATE TABLE IF NOT EXISTS `uml` (
  `uml_id` int(2) NOT NULL AUTO_INCREMENT,
  `uml_name` varchar(100) NOT NULL,
  `uml_desc` varchar(255) NOT NULL,
  `uml_group` int(1) NOT NULL COMMENT '1 = แผนภาพประเภทโครงสร้าง,2 = แผนภาพประเภทพฤติกรรม ,3 = แผนภาพประเภทการโต้ตอบ',
  `uml_createdate` date NOT NULL,
  PRIMARY KEY (`uml_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `uml`
--

INSERT INTO `uml` (`uml_id`, `uml_name`, `uml_desc`, `uml_group`, `uml_createdate`) VALUES
(1, 'Class diagram', 'Class diagram', 1, '2014-09-03'),
(2, 'Component diagram', 'Component diagram', 1, '2014-09-27'),
(3, 'Composite structure diagram', 'Composite structure diagram', 1, '2014-09-27'),
(4, 'Deployment diagram', 'Deployment diagram', 1, '2014-09-27'),
(5, 'Object diagram', 'Object diagram', 1, '2014-09-27'),
(6, 'Package diagram', 'Package diagram', 1, '2014-09-27'),
(7, 'Activity diagram', 'Activity diagram', 2, '2014-09-26'),
(8, 'State Machine diagram', 'State Machine diagram', 2, '2014-09-27'),
(9, 'Use case diagram', 'Use case diagram', 2, '2014-09-27'),
(10, 'Communication diagram', 'Communication diagram', 3, '2014-09-27'),
(11, 'nteraction overview diagram (UML 2.0)', 'nteraction overview diagram (UML 2.0)', 3, '2014-09-27'),
(12, 'Sequence diagram', 'Sequence diagram', 3, '2014-09-27'),
(13, 'UML Timing diagram (UML 2.0)', 'UML Timing diagram (UML 2.0)', 3, '2014-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule`
--

CREATE TABLE IF NOT EXISTS `work_schedule` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `work_topic` varchar(100) NOT NULL,
  `work_detail` text NOT NULL,
  `work_price` int(11) NOT NULL,
  `work_startdate` date NOT NULL,
  `work_enddate` date NOT NULL,
  `work_createdate` date NOT NULL,
  `work_status` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
