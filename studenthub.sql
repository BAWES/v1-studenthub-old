-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2015 at 06:01 AM
-- Server version: 5.6.22
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studenthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `city_name_en` int(11) NOT NULL,
  `city_name_ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) unsigned NOT NULL,
  `country_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country_nationality_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country_nationality_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
  `degree_id` int(11) unsigned NOT NULL,
  `degree_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `degree_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `employer_id` int(11) unsigned NOT NULL,
  `industry_id` int(11) unsigned NOT NULL,
  `city_id` int(11) unsigned NOT NULL,
  `employer_company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_logo` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_company_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_num_employees` int(11) NOT NULL,
  `employer_contact_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_credit` decimal(10,0) NOT NULL DEFAULT '0',
  `employer_email_preference` tinyint(4) NOT NULL COMMENT 'Off(0), Daily(1), Weekly(2)',
  `employer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `employer_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `employer_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `filter_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `university_id` int(11) unsigned NOT NULL,
  `degree_id` int(11) unsigned NOT NULL,
  `filter_gpa` decimal(10,2) NOT NULL,
  `filter_graduation_year_start` year(4) NOT NULL,
  `filter_graduation_year_end` year(4) NOT NULL,
  `filter_transportation` tinyint(4) NOT NULL COMMENT 'true (1), false (0)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_country`
--

CREATE TABLE IF NOT EXISTS `filter_country` (
  `filter_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_language`
--

CREATE TABLE IF NOT EXISTS `filter_language` (
  `filter_id` int(11) unsigned NOT NULL,
  `language_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_major`
--

CREATE TABLE IF NOT EXISTS `filter_major` (
  `filter_id` int(11) unsigned NOT NULL,
  `major_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `industry_id` int(11) unsigned NOT NULL,
  `industry_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `industry_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) unsigned NOT NULL,
  `jobtype_id` int(11) unsigned NOT NULL,
  `employer_id` int(11) unsigned NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_pay` tinyint(4) NOT NULL COMMENT 'Pay (1), No Pay (0)',
  `job_startdate` date NOT NULL,
  `job_responsibilites` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_other_quilifications` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_desired_skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_compensation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `job_question_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_question_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_max_applicants` int(11) NOT NULL,
  `job_current_num_applicants` int(11) NOT NULL,
  `job_status` tinyint(4) NOT NULL COMMENT 'close (0), open (1), draft (2)',
  `job_created_datetime` date NOT NULL,
  `job_price_per_applicant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE IF NOT EXISTS `jobtype` (
  `jobtype_id` int(11) unsigned NOT NULL,
  `jobtype_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobtype_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) unsigned NOT NULL,
  `language_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `major_id` int(11) unsigned NOT NULL,
  `major_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1427888406),
('m130524_201442_init', 1427888423);

-- --------------------------------------------------------

--
-- Table structure for table `notification_employer`
--

CREATE TABLE IF NOT EXISTS `notification_employer` (
  `notification_id` int(11) unsigned NOT NULL,
  `employer_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `notication_sent` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'False (0), True (1)',
  `notification_viewed` tinyint(4) NOT NULL,
  `notification_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_student`
--

CREATE TABLE IF NOT EXISTS `notification_student` (
  `notification_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `notification_sent` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'False (0), True (1)',
  `notification_viewed` tinyint(4) NOT NULL,
  `notification_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) unsigned NOT NULL,
  `employer_id` int(11) unsigned NOT NULL,
  `payment_type_id` int(11) unsigned NOT NULL,
  `payment_datetime` date NOT NULL,
  `payment_amount` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `payment_type_id` int(11) unsigned NOT NULL,
  `payment_type_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) unsigned NOT NULL,
  `degree_id` int(11) unsigned NOT NULL,
  `major_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `university_id` int(11) unsigned NOT NULL,
  `student_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  `student_status` tinyint(4) NOT NULL COMMENT 'Full Time (1) Part Time (0)',
  `student_enrolment_year` year(4) NOT NULL,
  `student_graduating_year` year(4) NOT NULL,
  `student_gpa` decimal(10,2) NOT NULL,
  `student_gender` tinyint(4) NOT NULL COMMENT 'Male (1) Female (0)',
  `student_transportation` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'true (1), false (0)',
  `student_contact_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `student_interestingfacts` text COLLATE utf8_unicode_ci NOT NULL,
  `student_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_cv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_skill` text COLLATE utf8_unicode_ci NOT NULL,
  `student_hobby` text COLLATE utf8_unicode_ci NOT NULL,
  `student_club` text COLLATE utf8_unicode_ci NOT NULL,
  `student_sport` text COLLATE utf8_unicode_ci NOT NULL,
  `student_verfication_attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_email_verfication` tinyint(4) NOT NULL DEFAULT '0',
  `student_id_verfication` tinyint(255) NOT NULL DEFAULT '0',
  `student_email_preference` tinyint(4) NOT NULL COMMENT 'Off(0), Daily(1), Weekly(2)',
  `student_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `student_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_job_application`
--

CREATE TABLE IF NOT EXISTS `student_job_application` (
  `application_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `application_answer_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `application_answer_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `application_hidden` tinyint(11) NOT NULL,
  `application_date_apply` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_language`
--

CREATE TABLE IF NOT EXISTS `student_language` (
  `language_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `transaction_number_of_applicants` int(11) NOT NULL,
  `transaction_price_per_applicant` decimal(10,0) NOT NULL,
  `transaction_price_total` decimal(11,0) NOT NULL,
  `transaction_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `university_id` int(11) unsigned NOT NULL,
  `university_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `university_domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Example: @gust.edu.kw',
  `university_require_verify` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require Verification (0); Does not require verification (1)',
  `university_id_template` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'A photo to define what verification we require'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employer_id`), ADD KEY `industry_id` (`industry_id`), ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`filter_id`), ADD KEY `job_id` (`job_id`), ADD KEY `university_id` (`university_id`), ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `filter_country`
--
ALTER TABLE `filter_country`
  ADD PRIMARY KEY (`filter_id`,`country_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `filter_language`
--
ALTER TABLE `filter_language`
  ADD PRIMARY KEY (`filter_id`,`language_id`), ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `filter_major`
--
ALTER TABLE `filter_major`
  ADD PRIMARY KEY (`filter_id`,`major_id`), ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`), ADD KEY `jobtype_id` (`jobtype_id`), ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`jobtype_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notification_employer`
--
ALTER TABLE `notification_employer`
  ADD PRIMARY KEY (`notification_id`), ADD KEY `employer_id` (`employer_id`), ADD KEY `student_id` (`student_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `notification_student`
--
ALTER TABLE `notification_student`
  ADD PRIMARY KEY (`notification_id`), ADD KEY `student_id` (`student_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`), ADD KEY `employer_id` (`employer_id`), ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`), ADD KEY `degree_id` (`degree_id`), ADD KEY `major_id` (`major_id`), ADD KEY `university_id` (`university_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `student_job_application`
--
ALTER TABLE `student_job_application`
  ADD PRIMARY KEY (`application_id`), ADD KEY `student_id` (`student_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `student_language`
--
ALTER TABLE `student_language`
  ADD PRIMARY KEY (`language_id`,`student_id`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `filter_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `industry_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `jobtype_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification_employer`
--
ALTER TABLE `notification_employer`
  MODIFY `notification_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification_student`
--
ALTER TABLE `notification_student`
  MODIFY `notification_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_job_application`
--
ALTER TABLE `student_job_application`
  MODIFY `application_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`),
ADD CONSTRAINT `employer_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `filter`
--
ALTER TABLE `filter`
ADD CONSTRAINT `filter_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
ADD CONSTRAINT `filter_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`),
ADD CONSTRAINT `filter_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`);

--
-- Constraints for table `filter_country`
--
ALTER TABLE `filter_country`
ADD CONSTRAINT `filter_country_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`filter_id`),
ADD CONSTRAINT `filter_country_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `filter_language`
--
ALTER TABLE `filter_language`
ADD CONSTRAINT `filter_language_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`filter_id`),
ADD CONSTRAINT `filter_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

--
-- Constraints for table `filter_major`
--
ALTER TABLE `filter_major`
ADD CONSTRAINT `filter_major_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`filter_id`),
ADD CONSTRAINT `filter_major_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`jobtype_id`) REFERENCES `jobtype` (`jobtype_id`),
ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`);

--
-- Constraints for table `notification_employer`
--
ALTER TABLE `notification_employer`
ADD CONSTRAINT `notification_employer_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`),
ADD CONSTRAINT `notification_employer_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `notification_employer_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `notification_student`
--
ALTER TABLE `notification_student`
ADD CONSTRAINT `notification_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `notification_student_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`),
ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`),
ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`),
ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `student_job_application`
--
ALTER TABLE `student_job_application`
ADD CONSTRAINT `student_job_application_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `student_job_application_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `student_language`
--
ALTER TABLE `student_language`
ADD CONSTRAINT `student_language_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
ADD CONSTRAINT `student_language_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
