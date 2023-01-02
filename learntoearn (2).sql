-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 05:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learntoearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(50) NOT NULL,
  `cname` varchar(120) NOT NULL,
  `cdescription` varchar(300) NOT NULL,
  `imglink` varchar(300) NOT NULL,
  `cstudentcount` int(50) NOT NULL,
  `pid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `cdescription`, `imglink`, `cstudentcount`, `pid`) VALUES
(1, 'Java', 'Java is a popular programming language.Java is used to develop mobile apps, web apps, desktop apps, games, and much more.', 'https://www.jrebel.com/sites/default/files/image/2021-03/2021%20java%20technology%20report.jpeg', 0, 4),
(2, 'SQL', 'SQL is a standard language for storing, manipulating, and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'https://cdn.hackersandslackers.com/2019/03/welcometosql4.jpg', 0, 2),
(3, 'Python', 'Python is a popular programming language. Python can be used on a server to create web applications.', 'https://572df51543239bca729e-5910d0f29d27f5996ff9d97f39a29019.ssl.cf5.rackcdn.com/image_attachments/images/000/050/727/large/b.jpg?1597848488', 0, 3),
(4, 'CSS', 'CSS is the language we use to style an HTML document.\r\nCSS describes how HTML elements should be displayed.\r\nThis tutorial will teach you CSS from basic to advanced.', 'https://www.tabnine.com/academy/wp-content/uploads/2020/09/Mask-group.png', 0, 1),
(5, 'PHP', 'Php can integrate with both CSS and HTML. Great for dynamic processing, PHP is both flexible and easy to use with an arsenal and a plethora of functions and tricks to use. Even this very website is done by Php!', 'https://www.cmsminds.com/wp-content/uploads/2019/03/Art-of-not.jpg', 0, 2),
(9, 'HTML', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', 'https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2018/11/what-is-html-3.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `eid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`eid`, `uid`, `cid`) VALUES
(52, 35, 4),
(53, 35, 9),
(54, 35, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uusername` varchar(120) NOT NULL,
  `upassword` varchar(120) NOT NULL,
  `uemail` varchar(120) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `ucountry` varchar(120) NOT NULL,
  `urole` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uusername`, `upassword`, `uemail`, `uname`, `uaddress`, `ucountry`, `urole`) VALUES
(35, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', '1 Elsarayat Street', 'Egypt', 0),
(36, 'nasef', '7e20ad7576f5ad2012e061cb6c0acb48', 'nasef@gmail.com', 'nasef', '1 El-Zaytoon', 'Egypt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `vid` int(50) NOT NULL,
  `vname` varchar(120) NOT NULL,
  `vlink` varchar(255) NOT NULL,
  `cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid`, `vname`, `vlink`, `cid`) VALUES
(4, 'Learn HTML In Arabic 2021 - #01 - Introduction and What I Need To Learn', 'https://www.youtube.com/embed/6QAELgirvjs', 9),
(5, 'Learn HTML In Arabic 2021 - #02 - Elements And Browser', 'https://www.youtube.com/embed/7LxA9qXUY5k', 9),
(6, 'Learn HTML In Arabic 2021 - #03 - First Project And First Page', 'https://www.youtube.com/embed/QG5aEmS9Fu0', 9),
(7, 'Learn HTML In Arabic 2021 - #04 - Head And Nested Elements', 'https://www.youtube.com/embed/dVgTBEYCseU', 9),
(8, 'Learn HTML In Arabic 2021 - #05 - Comments And Use Cases', 'https://www.youtube.com/embed/3lXuWHtm7PM', 9),
(9, 'Learn HTML In Arabic 2021 - #06 - Doctype And Standard And Quirks Mode', 'https://www.youtube.com/embed/sBFemL2Mfj4', 9),
(10, 'Learn HTML In Arabic 2021 - #07 - Headings And Use Cases', 'https://www.youtube.com/embed/XxkX8wnRq3s', 9),
(11, 'Learn HTML In Arabic 2021 - #08 - Syntax And Tests', 'https://www.youtube.com/embed/S58smWj5Yn0', 9),
(12, 'Learn HTML In Arabic 2021 - #09 - Paragraph Element', 'https://www.youtube.com/embed/Fpibp-291xQ', 9),
(13, 'Learn HTML In Arabic 2021 - #10 - Elements Attributes', 'https://www.youtube.com/embed/nCpNsMgyzh4', 9),
(14, 'Learn HTML In Arabic 2021 - #11 - Formatting Elements', 'https://www.youtube.com/embed/zhwqvfoi50Q', 9),
(15, 'Learn HTML In Arabic 2021 - #12 - Links - Anchor Tag', 'https://www.youtube.com/embed/7TQhxAOjd1w', 9),
(16, 'Learn HTML In Arabic 2021 - #13 - Image And Deal With Paths', 'https://www.youtube.com/embed/FmIUk3bWGmU', 9),
(17, 'Learn HTML In Arabic 2021 - #14 - Lists - UL, OL, DL', 'https://www.youtube.com/embed/8Z7zR-UGjcQ', 9),
(18, 'Learn HTML In Arabic 2021 - #15 - Table', 'https://www.youtube.com/embed/SUW49Jjxvac', 9),
(19, 'Learn HTML In Arabic 2021 - #16 - Span And Break And Horizontal Rule', 'https://www.youtube.com/embed/T2myRpY2iN4', 9),
(20, 'Learn HTML In Arabic 2021 - #17 - Div And How To Use', 'https://www.youtube.com/embed/IGeh2mlM9Rg', 9),
(21, 'Learn HTML In Arabic 2021 - #18 - HTML Entities', 'https://www.youtube.com/embed/B8raKziIYyY', 9),
(22, 'Learn HTML In Arabic 2021 - #19 - Semantic Elements', 'https://www.youtube.com/embed/xlQwlfvrDuI', 9),
(23, 'Learn HTML In Arabic 2021 - #19 - Semantic Elements', 'https://www.youtube.com/embed/r6LhFImQxeE', 9),
(24, 'Learn HTML In Arabic 2021 - #21 - Layout With Semantic Elements', 'https://www.youtube.com/embed/uj5lC-GQPEw', 9),
(25, 'Learn HTML In Arabic 2021 - #22 - Audio', 'https://www.youtube.com/embed/KltQb6cJSd8', 9),
(26, 'Learn HTML In Arabic 2021 - #23 - Video', 'https://www.youtube.com/embed/oJbo28ewnL4', 9),
(27, 'Learn HTML In Arabic 2021 - #24 - Form Part 1 - Input Types And Label', 'https://www.youtube.com/embed/inC9gWjNMJI', 9),
(28, 'Learn HTML In Arabic 2021 - #25 - Form Part 2 - Required, Placeholder, Value', 'https://www.youtube.com/embed/3xd1IQ3llBk', 9),
(29, 'Learn HTML In Arabic 2021 - #26 - Form Part 3 - Action, Name, Method', 'https://www.youtube.com/embed/Anfn7RzoDHw', 9),
(30, 'Learn HTML In Arabic 2021 - #27 - Form Part 4 - Hidden, Reset, Color, Range, Number', 'https://www.youtube.com/embed/ZUax-YsT57I', 9),
(31, 'Learn HTML In Arabic 2021 - #28 - Form Part 5 - ReadOnly, Disabled, Autofocus', 'https://www.youtube.com/embed/rpPIRitcAn8', 9),
(32, 'Learn HTML In Arabic 2021 - #29 - Form Part 6 - Radio And Checkbox', 'https://www.youtube.com/embed/YAcn1MyAcDM', 9),
(33, 'Learn HTML In Arabic 2021 - #30 - Form Part 7 - Select And Textarea', 'https://www.youtube.com/embed/HGB42mnD0o4', 9),
(34, 'Learn HTML In Arabic 2021 - #31 - Form Part 8 - File, Search, URL, Time', 'https://www.youtube.com/embed/cSmE9cVeaYg', 9),
(35, 'Learn HTML In Arabic 2021 - #32 - Form Part 9 - Data List, Novalidate, Target', 'https://www.youtube.com/embed/X_TGbRuZ80Q', 9),
(36, 'Learn HTML In Arabic 2021 - #33 - Q, BlockQuote, Wbr, Bdi, Button', 'https://www.youtube.com/embed/AzjtVtxoBLc', 9),
(37, 'Learn HTML In Arabic 2021 - #34 - iFrame, Pre, Code', 'https://www.youtube.com/embed/aycYLVSOtZo', 9),
(38, 'Learn HTML In Arabic 2021 - #35 - Accessibility Intro', 'https://www.youtube.com/embed/lSqXHePabFo', 9),
(39, 'Learn HTML In Arabic 2021 - #36 - ARIA And Screen Readers', 'https://www.youtube.com/embed/UnTxFfbpqco', 9),
(40, 'Learn HTML In Arabic 2021 - #37 - The End And What To Do', 'https://www.youtube.com/embed/ysJQH5uPfTg', 9),
(41, 'How to start using CSS in 11 minutes 🎨', 'https://www.youtube.com/embed/xv-bBxaa7WU', 4),
(42, 'Learn CSS fonts in 3 minutes 🆒', 'https://www.youtube.com/embed/UzURcO1MnEU', 4),
(43, 'Learn CSS borders in 2 minutes 🔲', 'https://www.youtube.com/embed/6RuzhtsbSIg', 4),
(44, 'Learn CSS background in 3 minutes 🌆', 'https://www.youtube.com/embed/YA8ZciJa64k', 4),
(45, 'Learn CSS margins in 4 minutes 📏', 'https://www.youtube.com/embed/2ZlVV0MM1a0', 4),
(46, 'Learn CSS float in 3 minutes 🎈', 'https://www.youtube.com/embed/xIJvkm-CgFQ', 4),
(47, 'Learn CSS position in 5 minutes 🎯', 'https://www.youtube.com/embed/Pp7UXS3P6jY', 4),
(48, 'Learn CSS pseudo classes in 5 minutes 👨‍👧‍👦', 'https://www.youtube.com/embed/fWnXVwULqrE', 4),
(49, 'Learn CSS pseudo elements in 4 minutes 🔎', 'https://www.youtube.com/embed/tb1ou6W5M5s', 4),
(50, 'Learn CSS shadows in 2 minutes 👥', 'https://www.youtube.com/embed/qTEDcXJ-dzw', 4),
(51, 'Learn CSS icons in 3 minutes 🏠', 'https://www.youtube.com/embed/dHpMIy517E4', 4),
(52, 'Learn CSS transform in 4 minutes 🔄', 'https://www.youtube.com/embed/aii2itPgRVs', 4),
(53, 'Learn CSS animation in 8 minutes 🎞️', 'https://www.youtube.com/embed/O7mTUtHDP5E', 4),
(54, 'How to Choose A First Programming Language', 'https://www.youtube.com/embed/U2lQWR6uIuo', 5),
(55, 'PHP For Beginners, Ep 2 - Tools of the Trade', 'https://www.youtube.com/embed/GeEGZYnzffo', 5),
(56, 'PHP For Beginners, Ep 3 - Your First PHP Tag', 'https://www.youtube.com/embed/Nu-KcUO3q_U', 5),
(57, 'PHP For Beginners, Ep 4 - Variables', 'https://www.youtube.com/embed/twfIaZEF21k', 5),
(58, 'PHP For Beginners, Ep 5 - Conditionals and Booleans', 'https://www.youtube.com/embed/c2eThSDDwH0', 5),
(59, 'PHP For Beginners, Ep 6 - Arrays', 'https://www.youtube.com/embed/8cVk6qVO99w', 5),
(60, 'PHP For Beginners, Ep 7 - Associative Arrays', 'https://www.youtube.com/embed/aSG5MXzn01Q', 5),
(61, 'PHP For Beginners, Ep 8 - Functions and Filtering', 'https://www.youtube.com/embed/FcTdVwQgvkI', 5),
(62, 'PHP For Beginners, Ep 9 - Lambda Functions', 'https://www.youtube.com/embed/cFpBK2EBrMY', 5),
(63, 'PHP For Beginners, Ep 10 - Separate PHP Logic From the Template', 'https://www.youtube.com/embed/AmaZDxp7Ejg', 5),
(64, 'PHP For Beginners, Ep 11 - Technical Check-In (With Quiz)', 'https://www.youtube.com/embed/byQWb11w0ss', 5),
(65, 'PHP For Beginners, Ep 12 - Page Links', 'https://www.youtube.com/embed/kxHpon75SQo', 5),
(66, 'PHP For Beginners, Ep 13 - Partials', 'https://www.youtube.com/embed/dda0u9I2mog', 5),
(67, 'PHP For Beginners, Ep 14 - Superglobals and Current Page Styling', 'https://www.youtube.com/embed/Qy9d-kMDTnw', 5),
(68, 'PHP For Beginners, Ep 15 - Make a PHP Router', 'https://www.youtube.com/embed/siQUekpmImw', 5),
(69, 'PHP For Beginners, Ep 16 - Create a MySQL Database', 'https://www.youtube.com/embed/hgecYFLOiuE', 5),
(70, 'PHP For Beginners, Ep 17 - PDO First Steps', 'https://www.youtube.com/embed/9XMerRvEMSI', 5),
(71, 'PHP For Beginners, Ep 18 - Extract a PHP Database Class', 'https://www.youtube.com/embed/nnH7sKv_sbA', 5),
(72, 'PHP For Beginners, Ep 19 - Environments and Configuration Flexibility', 'https://www.youtube.com/embed/PDtBKgOJhGY', 5),
(73, 'PHP For Beginners, Ep 20 - SQL Injection Vulnerabilities Explained', 'https://www.youtube.com/embed/ZCdbjkjxuEE', 5),
(74, 'PHP For Beginners, Ep 21 - Mini-Project: Notes App', 'https://www.youtube.com/embed/ikFao3g6RmE', 5),
(75, 'PHP For Beginners, Ep 22 - Render the Notes and Note Page', 'https://www.youtube.com/embed/fdG98hyssNU', 5),
(76, 'PHP For Beginners, Ep 23 - Introduction to Authorization', 'https://www.youtube.com/embed/N4PIFGviVJw', 5),
(77, 'PHP For Beginners, Ep 24 - Programming is Rewriting', 'https://www.youtube.com/embed/Ah58xQF_Szw', 5),
(78, 'PHP For Beginners, Ep 25 - Intro to Forms and Request Methods', 'https://www.youtube.com/embed/LOfyel_cpzo', 5),
(79, 'PHP For Beginners, Ep 26 - Always Escape Untrusted Input', 'https://www.youtube.com/embed/dJBa2VGCF-M', 5),
(80, 'PHP For Beginners, Ep 27 - Introduction to Form Validation', 'https://www.youtube.com/embed/Dai-cw3k_qk', 5),
(81, 'PHP For Beginners, Ep 28 - Extract a Simple Validation Class', 'https://www.youtube.com/embed/cDvwKbmWSLw', 5),
(82, 'PHP For Beginners, Ep 29 - Resourceful Naming Conventions', 'https://www.youtube.com/embed/QIJSrCe0p_g', 5),
(83, 'PHP For Beginners, Ep 30 - Autoloading and Extraction', 'https://www.youtube.com/embed/cayyhoFnqSY', 5),
(84, 'Tutorial 1 : Course Outline ( Python Zero to Hero)', 'https://www.youtube.com/embed/PAJUybDJCnA', 3),
(85, 'Tutorial 2 : Introduction to Python (Python Zero to Hero)', 'https://www.youtube.com/embed/F7Km5-lkmJ0', 3),
(86, 'Tutorial 3 : Python Basics ; Python Zero to Hero', 'https://www.youtube.com/embed/ixUODrJ0V28', 3),
(87, 'Tutorial 4 : Python Basics II ; Python Zero to Hero', 'https://www.youtube.com/embed/gaGL7_d3_b8', 3),
(88, 'Tutorial 5 : Developer Environment ; Python Zero to Hero', 'https://www.youtube.com/embed/ahhnoEcVEF8', 3),
(89, 'Tutorial 6 - Advanced Python - Object Oriented Programming (Python Zero to Hero)', 'https://www.youtube.com/embed/zdaIc6stB24', 3),
(90, 'Tutorial 7 - Advanced Python - Functional Programming - Python zero to Hero', 'https://www.youtube.com/embed/wOwQ4QUdFDw', 3),
(91, 'Tutorial 8 : Advanced Python - Decorators (Python Zero to Hero)', 'https://www.youtube.com/embed/JxI79kZGh6I', 3),
(92, 'Tutorial 09 Advanced Python - Error Handling (Python Zero to Hero)', 'https://www.youtube.com/embed/-sR0kN2i3PQ', 3),
(93, 'Tutorial 10 Advanced Python - Generators (Python Zero to Hero)', 'https://www.youtube.com/embed/KJyj9eLlzcs', 3),
(94, '#11 Modules In Python Python Zero to Hero', 'https://www.youtube.com/embed/6pCVDdBnpG0', 3),
(95, '#12 Debugging In Python (Python Zero to Hero)', 'https://www.youtube.com/embed/Ks-nJpOWb68', 3),
(96, '#13 File I-O (Python Zero to Hero)', 'https://www.youtube.com/embed/akIc6_E1o7s', 3),
(97, '#14 Regular Expressions (Python Zero to Hero)', 'https://www.youtube.com/embed/GnJZopCYHAY', 3),
(98, 'Tutorial 15 Testing In Python python Zero to Hero', 'https://www.youtube.com/embed/Px-iUI1JsKM', 3),
(99, 'Tutorial 16 - Career Of A Python Developer (Python Zero to Hero)', 'https://www.youtube.com/embed/gZim-LAyNcs', 3),
(100, 'Tutorial 17 : Scripting with Python (Python zero to hero)', 'https://www.youtube.com/embed/5GpEl-VsGXM', 3),
(101, 'Tutorial 18 : Scraping Data with Python (Python zero to hero)', 'https://www.youtube.com/embed/1pSw1N1LZkQ', 3),
(102, 'Tutorial 19 - Python for Web Development (Python zero to hero)', 'https://www.youtube.com/embed/1fEB0UJR6DA', 3),
(103, 'Tutorial 20 : Automation Testing ; Python zero to hero', 'https://www.youtube.com/embed/8TuNrSWiJo4', 3),
(104, 'Tutorial 21 - Data Science and Machine Learning - Python zero to hero', 'https://www.youtube.com/embed/9eCLa734xH8', 3),
(105, 'Tutorial 22 - Extra Bits - Python zero to hero', 'https://www.youtube.com/embed/G-kIlH-H3Jo', 3),
(106, 'Learn SQL Complete | Course Introduction | SQL Full Course | SQL Tutorial For Beginners (0/11)', 'https://www.youtube.com/embed/5FrBJ4PXj2s', 2),
(107, 'What is DBMS Database SQL Server Introduction | SQL Full Course | SQL Tutorial For Beginners (1/11)', 'https://www.youtube.com/embed/STLJl30oDzM', 2),
(108, 'What is SQL | DDL DML DQL | Data types in SQL | SQL Full Course | SQL Tutorial For Beginners (2/11)', 'https://www.youtube.com/embed/c9MV2VsbDdc', 2),
(109, 'What is Constraints How to Query Database | SQL Full Course | SQL Tutorial For Beginners (3/11)', 'https://www.youtube.com/embed/GtCJTdpMnhM', 2),
(110, 'What is Primary/Foreign Key, String Functions | SQL Full Course | SQL Tutorial For Beginners (4/11)', 'https://www.youtube.com/embed/LTvvBZuHYzo', 2),
(111, 'SQL Operators (in , between) , Group By Clause | SQL Full Course | SQL Tutorial For Beginners (5/11)', 'https://www.youtube.com/embed/vdXQWWseUfI', 2),
(112, 'SQL Joins(Inner, Left, Right Full Outer Joins) | SQL Full Course | SQL Tutorial For Beginners (6/11)', 'https://www.youtube.com/embed/fkb6YdZAaag', 2),
(113, 'Query Multiple Tables |Set Operations UNION,UNION ALL,EXCEPT | SQL Full Course | SQL Tutorial (7/11)', 'https://www.youtube.com/embed/JEd3YC7BoxE', 2),
(114, 'SQL DBA Activities | Import / Export| Profiler | SQL Full Course | SQL Tutorial For Beginners (8/11)', 'https://www.youtube.com/embed/gzG5mZU9-50', 2),
(115, 'Views | CTE | Stored Procedures | Functions SQL Full Course | SQL Tutorial For Beginners (9/11)', 'https://www.youtube.com/embed/guILhfb5peE', 2),
(116, 'Triggers | Cursors | Transactions | SQL Full Course | SQL Tutorial For Beginners (10/11)', 'https://www.youtube.com/embed/7XBOPm5WbtQ', 2),
(117, 'Clustered | Non Clustered Index in SQL Server | SQL Full Course | SQL Tutorial For Beginners (11/11)', 'https://www.youtube.com/embed/pBckUHNzF_8', 2),
(118, 'How to Install SQL Server , SSDT , SSMS | SQL Full Course | SQL Tutorial For Beginners (12/11)', 'https://www.youtube.com/embed/mK8a07Evkcs', 2),
(120, 'How to Restore AdventureWorks Database in SQL Server using SSMS | SQL Tutorial For Beginners (13/20)', 'https://www.youtube.com/embed/vfh_Kdp8M7o', 2),
(121, 'SSMS Generate Scripts Table or Database Copy Trick | SQL Tutorial For Beginners (14/20)', 'https://www.youtube.com/embed/bHlYZSxklns', 2),
(122, 'How to Identify SQL Server Database Server Name / Instance Name | SQL Tutorial for Beginners (15/20)', 'https://www.youtube.com/embed/b40UmDCuR3E', 2),
(123, 'How to Install Java JDK on Windows 10 - [MASTERING JAVA COURSE #1]', 'https://www.youtube.com/embed/pEA-vj1uSGg', 1),
(124, 'How to Run Java Program in Command Prompt - [MASTERING JAVA COURSE #2]', 'https://www.youtube.com/embed/hehbes_Hr8U', 1),
(125, 'Best Java IDE 2020 | Most Popular Java IDE for Coding - [Mastering Java Course #3]', 'https://www.youtube.com/embed/SLuyqQKpXM4', 1),
(126, 'How to Install Intellij IDEA on Windows 10 - [Master Java Course #4]', 'https://www.youtube.com/embed/0nrH8Bt8DQI', 1),
(127, 'Creating First Hello World Java Application - [ Mastering Java Course #5]', 'https://www.youtube.com/embed/R7uONyUVzIQ', 1),
(128, 'Variables & Data Types in Java + [Coding Challenge Inside] - Java Tutorial #6', 'https://www.youtube.com/embed/-RDMIoFMdDA', 1),
(129, 'Final Keyword & Operations in Java - [Coding Challenge inside] - [Java Tutorial #7]', 'https://www.youtube.com/embed/6h1me_g1mzw', 1),
(130, 'Type Casting in Java - Java Tutorial #8', 'https://www.youtube.com/embed/wW1vHv77pp4', 1),
(131, 'Operators in Java - [University Course with Exam in Java] - Java Tutorial #9', 'https://www.youtube.com/embed/xClVtjV5UHQ', 1),
(132, 'Booleans in Java - Learn Java from scratch - [Mastering Java #10]', 'https://www.youtube.com/embed/u1cqcYmlwfk', 1),
(133, 'Conditions in Java - Learn Java from scratch [Java Tutorial #11]', 'https://www.youtube.com/embed/Qjp1Fi3ZQ28', 1),
(134, 'Switch in Java - Learn Java from scratch [Mastering Java Course #12]', 'https://www.youtube.com/embed/doTafCVBgBQ', 1),
(135, 'Java Tutorial: Loops in Java', 'https://www.youtube.com/embed/Oe2AfkEv1e0', 1),
(136, 'Java Tutorial: Break & Continue keywords in Java - [Java Course #14]', 'https://www.youtube.com/embed/0DGwIQlIUcg', 1),
(137, 'Java Tutorial: Strings in Java - [Java Course #15]', 'https://www.youtube.com/embed/UgIkYz3RdSQ', 1),
(138, 'Java Tutorial: Arrays in Java - [Java Course #16]', 'https://www.youtube.com/embed/IGaar6rU3tw', 1),
(139, 'Java Tutorial: Multi-dimensional Arrays in Java - [Java Course #17]', 'https://www.youtube.com/embed/Dx7Wyrtnf9Q', 1),
(140, 'Java Exercise 1 - Basic operations in Java [Java 101]', 'https://www.youtube.com/embed/jWkSkqa-bWg', 1),
(141, 'Java Exercise 2 - Basic operations in Java [Java 101]', 'https://www.youtube.com/embed/9DYo6xHSc2s', 1),
(142, 'Java Exercise 3 - Basic operations in Java [Java 101]', 'https://www.youtube.com/embed/Odg_ToYnuig', 1),
(143, 'Java Exercise 4 - Printing Multiplication Table of a Number [Java 101]', 'https://www.youtube.com/embed/4qpQibCtD2I', 1),
(144, 'REST API with MVVM and Retrofit2 #9 - Understanding MVVM', 'https://www.youtube.com/embed/1UalfddkXcM', 1),
(145, 'Java Exercise 5 - Using Math in Java [Java 101]', 'https://www.youtube.com/embed/k6L3baWYTKE', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `course` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `eid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `vid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `course` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
