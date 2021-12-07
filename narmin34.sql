-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 10:37 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `narmin34`
--

-- --------------------------------------------------------

--
-- Table structure for table `suscribers`
--

DROP TABLE IF EXISTS `suscribers`;
CREATE TABLE IF NOT EXISTS `suscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suscribers`
--

INSERT INTO `suscribers` (`id`, `email`, `PostingDate`) VALUES
(1, 'jun@gmail.com', '2021-12-05 02:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblblog`
--

DROP TABLE IF EXISTS `tblblog`;
CREATE TABLE IF NOT EXISTS `tblblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) NOT NULL,
  `author` varchar(200) NOT NULL,
  `blog_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblblog`
--

INSERT INTO `tblblog` (`id`, `blog_title`, `author`, `blog_description`, `image`, `category`, `tags`, `PostingDate`) VALUES
(1, 'STANDING WITH THE POOR THROUGH THE COVID-19 CRISIS', 'James Andrew', '<p><span style=\"color: rgb(99, 104, 134); font-family: Barlow, sans-serif; font-size: 18px;\">It is estimated that one billion people will be without the necessary skills to find a job. Many young children across Sub-Saharan Africa and South Asia are living without any kind of formal education. Even with access to schools, students are discriminated due to their gender, class and caste. Additionally, classes are taught by absent.</span></p><p><font color=\"#636886\" face=\"Barlow, sans-serif\"><span style=\"font-size: 18px;\">Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.</span></font><br><br></p>', 'b3f3c4d65cf3ae0e6b5f902996dfcba8jpeg', 'Poverty', 'poverty', '2021-12-06 14:24:23'),
(2, 'HOW ONE BRITISH GHANAIAN ENTREPRENEUR IS REDEFININ', 'Savic Hernandez', '<p>Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.</p><p><br></p><p>Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.<br></p>', 'c1d9e8d75c8fd152c9e5d0d4770d2fa9jpeg', 'BUSINESS TRIP', 'BUSINESS TRIP', '2021-12-06 14:25:31'),
(3, 'PUREGIVEN CELEBRATES MENSTRUAL HYGIENE DAY', 'James Andrew', '<p><span style=\"color: rgb(99, 104, 134); font-family: Barlow, sans-serif; font-size: 18px;\">It is estimated that one billion people will be without the necessary skills to find a job. Many young children across Sub-Saharan Africa and South Asia are living without any kind of formal education. Even with access to schools, students are discriminated due to their gender, class and caste. Additionally, classes are taught by absent</span></p><p><span style=\"color: rgb(99, 104, 134); font-family: Barlow, sans-serif; font-size: 18px;\"><br></span></p><p><span style=\"color: rgb(99, 104, 134); font-family: Barlow, sans-serif; font-size: 18px;\">It is estimated that one billion people will be without the necessary skills to find a job. Many young children across Sub-Saharan Africa and South Asia are living without any kind of formal education. Even with access to schools, students are discriminated due to their gender, class and caste. Additionally, classes are taught by absent</span><span style=\"color: rgb(99, 104, 134); font-family: Barlow, sans-serif; font-size: 18px;\"><br></span><br></p>', '435246042765862e06a307ad989349d5jpeg', 'MANAGEMENT', 'MANAGEMENT', '2021-12-06 14:26:52'),
(4, 'PUREGIVEN NEW INVESTMENT IS TACKLING UNEMPLOYMENT', 'Paul Mian', '<p>Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.</p><p>Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.<br></p>', '6a4333d1837b0fa5146ddc65e7f71a97jpeg', 'BUSINESS', 'BUSINESS', '2021-12-06 14:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Is_Active` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `Is_Active`, `PostingDate`) VALUES
(1, 'New coin', 'just test', 1, '2021-12-04 02:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

DROP TABLE IF EXISTS `tblcomments`;
CREATE TABLE IF NOT EXISTS `tblcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `post_id`, `name`, `email`, `comments`, `PostingDate`) VALUES
(1, 1, 'David junior', 'jun@gmail.com', 'It\'s not easy for this kids', '2021-12-06 19:57:30'),
(2, 3, 'David junior', 'jun@gmail.com', 'just testing this out.', '2021-12-06 20:22:25'),
(3, 4, 'David junior', 'jun@gmail.com', 'test again', '2021-12-07 06:22:40'),
(4, 1, 'David Manny', 'juden@gmail.com', 'it\'s dis heartening', '2021-12-07 11:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblmail`
--

DROP TABLE IF EXISTS `tblmail`;
CREATE TABLE IF NOT EXISTS `tblmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprojects`
--

DROP TABLE IF EXISTS `tblprojects`;
CREATE TABLE IF NOT EXISTS `tblprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprojects`
--

INSERT INTO `tblprojects` (`id`, `project_title`, `author`, `project_description`, `image`, `category`, `tags`, `PostingDate`) VALUES
(1, 'My Experienced Project', 'Junior Amos ban', '<p><span style=\"color: rgb(99, 104, 134); font-family: Barlow, sans-serif; font-size: 18px;\">It is estimated that one billion people will be without the necessary skills to find a job. Many young children across Sub-Saharan Africa and South Asia are living without any kind of formal education. Even with access to schools, students are discriminated due to their gender, class and caste. Additionally, classes are taught by absent</span><br></p>', '3330dfde821c63d4c5f3e9c090b2e902.png', 'New coin', 'LAW', '2021-12-07 12:00:06'),
(2, 'LSA launches new research project aimed at young lawyers', 'David Junior', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', '3207319536fbee52e22869c9542bfb62.png', 'New coin', 'LAW', '2021-12-07 11:49:35'),
(3, 'Law Society digital transformation project', 'Paul Mian', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', 'd90bd93caed91b6941f47320fc20b985.png', 'weererW', 'BUSINESS', '2021-12-07 11:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `role`, `password`, `registered_on`) VALUES
(1, 'David junior', 'jun@gmail.com', 'user', '$2y$10$DZmhIbe6jWu5aeep.THqeuIq8ypazENJCObATzIj4jvp2Se1xiGu.', '2021-12-03 10:39:56'),
(2, 'David Manny', 'ok@gmail.com', 'admin', '$2y$10$DLxICIDy7yIUerr0Oq8yiu/.sp1tBQ.VwBH607Gk1FiPy8QST78.O', '2021-12-03 19:01:06'),
(3, 'David Manny', 'juden@gmail.com', 'user', '$2y$10$0IfMax5WNOK1xkL8w4uJ9ufL1qXpkJLcPnrdlatPZUM0VSy.Ith9a', '2021-12-03 11:34:20'),
(4, 'David Manny', 'juen@gmail.com', 'admin', '$2y$10$T7d7HtkDRhrLpUcg/k1ifu5CKUOg1pCrjR76K9601O7PPZp8wi8Em', '2021-12-03 19:34:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
