-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2018 at 10:59 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 5.6.34-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personaility`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` varchar(30) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_username`, `admin_password`) VALUES
('pp_ad1', 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `admin_remark`
--

CREATE TABLE `admin_remark` (
  `remark_id` varchar(30) NOT NULL,
  `candidate_id` varchar(30) NOT NULL,
  `application_status` varchar(30) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_remark`
--

INSERT INTO `admin_remark` (`remark_id`, `candidate_id`, `application_status`, `remark`) VALUES
('re08562212', 'c082601390', 'rejected', 'Sorry your application is rejected.'),
('re09051045', 'c085927902', 'approved', 'You are selected. We will contact you via email for further information.'),
('re06560086', 'c065035433', 'approved', 'shortlisted'),
('re10580122', 'c083344445', 'approved', 'Congratulation!\r\nyour CV has been shortlisted.....'),
('re02151193', 'c021213933', 'approved', 'your cv has been short listed'),
('re08105687', 'c080430801', 'rejected', 'sorry you are not eligible for this job..pls try again next time'),
('re09564910', 'c092950727', 'approved', 'your cv has been shortlisted'),
('re06360788', 'c063321608', 'approved', 'congratulations! your cv has been short listed');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_answers`
--

CREATE TABLE `candidate_answers` (
  `answer_sheet_id` varchar(30) NOT NULL,
  `candidate_id` varchar(30) NOT NULL,
  `question_id_1` varchar(30) DEFAULT NULL,
  `user_answer_1` varchar(80) DEFAULT NULL,
  `question_id_2` varchar(30) DEFAULT NULL,
  `user_answer_2` varchar(80) DEFAULT NULL,
  `question_id_3` varchar(30) DEFAULT NULL,
  `user_answer_3` varchar(80) DEFAULT NULL,
  `question_id_4` varchar(30) DEFAULT NULL,
  `user_answer_4` varchar(80) DEFAULT NULL,
  `question_id_5` varchar(30) DEFAULT NULL,
  `user_answer_5` varchar(80) DEFAULT NULL,
  `question_id_6` varchar(30) DEFAULT NULL,
  `user_answer_6` varchar(80) DEFAULT NULL,
  `question_id_7` varchar(30) DEFAULT NULL,
  `user_answer_7` varchar(80) DEFAULT NULL,
  `question_id_8` varchar(30) DEFAULT NULL,
  `user_answer_8` varchar(80) DEFAULT NULL,
  `question_id_9` varchar(30) DEFAULT NULL,
  `user_answer_9` varchar(80) DEFAULT NULL,
  `question_id_10` varchar(30) DEFAULT NULL,
  `user_answer_10` varchar(80) DEFAULT NULL,
  `total_mark` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_answers`
--

INSERT INTO `candidate_answers` (`answer_sheet_id`, `candidate_id`, `question_id_1`, `user_answer_1`, `question_id_2`, `user_answer_2`, `question_id_3`, `user_answer_3`, `question_id_4`, `user_answer_4`, `question_id_5`, `user_answer_5`, `question_id_6`, `user_answer_6`, `question_id_7`, `user_answer_7`, `question_id_8`, `user_answer_8`, `question_id_9`, `user_answer_9`, `question_id_10`, `user_answer_10`, `total_mark`) VALUES
('ans02142291', 'c021213933', 'q030524383', 'Rule following', 'q123954214', 'Non-innovative', 'q07471062', 'Responsible and committed', 'q124005469', 'Consistant', 'q124015381', 'Responsible', 'q124023356', 'Consistant', 'q124037901', 'Rule following', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans06352050', 'c063321608', 'q030524383', 'Non rule following', 'q123954214', 'Time Consuming', 'q07471062', 'Responsible and committed', 'q124005469', 'Fame seeking', 'q124015381', 'Responsible', 'q124023356', 'Rule following', 'q124037901', 'Reward oriented', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans06534582', 'c065035433', 'q030524383', 'Rule following', 'q123954214', 'Non-innovative', 'q07471062', 'Responsible and committed', 'q124005469', 'Consistant', 'q124015381', 'asd', 'q124023356', 'asd', 'q124037901', 'asd', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans08082171', 'c080430801', 'q030524383', 'Rule following', 'q123954214', 'Innovative', 'q07471062', 'Non-risk taking', 'q124005469', 'Non fame seeking, hardworking', 'q124015381', 'Irresponsible', 'q124023356', 'Consistant', 'q124037901', 'Reward oriented', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans08525281', 'c082601390', 'q030524383', 'Non rule following', 'q123954214', 'Innovative', 'q07471062', 'Time consuming ', 'q124005469', 'Fame seeking', 'q124015381', 'asd', 'q124023356', 'asd', 'q124037901', 'asd', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans09020316', 'c085927902', 'q030524383', 'Rule following', 'q123954214', 'Non-innovative', 'q07471062', 'Time consuming ', 'q124005469', 'Consistant', 'q124015381', 'asd', 'q124023356', 'asd', 'q124037901', 'asd', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans09073225', 'c09060020', 'q030524383', 'Rule following', 'q123954214', 'Time Consuming', 'q07471062', 'Non-risk taking', 'q124005469', 'Consistant', 'q124015381', 'asd', 'q124023356', 'asd', 'q124037901', 'asd', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans09553535', 'c092950727', 'q030524383', 'Rule following', 'q123954214', 'Innovative', 'q07471062', 'Responsible and committed', 'q124005469', 'Reward oriented output', 'q124015381', 'Time consuming', 'q124023356', 'Consistant', 'q124037901', 'Irresponsible', 'q124046398', 'asd', 'q124434773', 'asd', 'q102203915', 'tesststststststststststst', NULL),
('ans10402582', 'c053815716', 'q030524383', 'Rule following', 'q123954214', 'Non-innovative', 'q07471062', 'Irresponsible', 'q124005469', 'Fame seeking', 'q124015381', 'Rule following', 'q124023356', 'Rule following', 'q124037901', 'Rule following', 'q124046398', 'Marker 2', 'q124434773', 'Marker 2', 'q102203915', 'Marker 1', 95);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_login`
--

CREATE TABLE `candidate_login` (
  `candidate_id` varchar(30) NOT NULL,
  `candidate_username` varchar(30) NOT NULL,
  `candidate_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_login`
--

INSERT INTO `candidate_login` (`candidate_id`, `candidate_username`, `candidate_password`) VALUES
('c021213933', 'surya', 'surya'),
('c053815716', 'test', 'test123'),
('c063321608', 'jiny', 'jiny'),
('c065035433', 'reshma@gmail.com', 'resh'),
('c080239860', 'rahul', 'rahul'),
('c080430801', 'rahul123', 'rahul123'),
('c082601390', 'viratkholi', 'pass'),
('c083344445', 'abc@gmail.com', 'abcabcabc'),
('c085927902', 'sania', 'pass'),
('c09060020', 'vineeth', 'pass'),
('c09182057', 'remya', 'remya'),
('c092950727', 'sajitha', 'sajitha'),
('c103437452', 'reshma', 'reshma');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_register`
--

CREATE TABLE `candidate_register` (
  `candidate_id` varchar(30) NOT NULL,
  `candidate_name` varchar(60) NOT NULL,
  `candidate_address` varchar(60) NOT NULL,
  `candidate_contact` varchar(60) NOT NULL,
  `candidate_email` varchar(60) NOT NULL,
  `candidate_cv` varchar(70) NOT NULL,
  `application_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_register`
--

INSERT INTO `candidate_register` (`candidate_id`, `candidate_name`, `candidate_address`, `candidate_contact`, `candidate_email`, `candidate_cv`, `application_status`) VALUES
('c021213933', 'suryaMy CV', 'surya nilayam', 'suryasudesan@gmail.com', '8909898989', 'c021213933.pdf', 'approved'),
('c053815716', 'test', 'test', 'test@mailnator.com', '7878787', 'c053815716.pdf', 'pending'),
('c063321608', 'jiny jecob', 'jiny villa', 'jiny@gmail.com', '1234567890', 'c063321608.pdf', 'approved'),
('c065035433', 'RESHMA SUDESAN', 'VAZHAYIL(H),THITTAMEL', 'reshu00076@gmail.com', '8136810966', 'c065035433.pdf', 'approved'),
('c080430801', 'Rahul p', 'rahul villa', 'rahul@gmail.com', '1234567890', 'c080430801.pdf', 'rejected'),
('c082601390', 'Virat Kholi', 'Ratnam Street, Bangalore 96', 'mymail@email.com', '778899445566', 'c082601390.pdf', 'rejected'),
('c085927902', 'Sania Mirza', 'ABC street, navi mumbai', 'emai@gmail.com', '995588774466', 'c085927902.pdf', 'approved'),
('c09060020', 'C K Vineeth', 'Kerala House, Kochi 76', 'mail@mail.com', '112233445566', 'c09060020.pdf', 'pending'),
('c092950727', 'sajitha', 'sajitha villa', 'sajitha@gmail.com', '1234567890', 'c092950727.pdf', 'approved'),
('c103437452', 'RESHMA SUDESAN', 'VAZHAYIL(H),THITTAMEL', 'reshu00076@gmail.com', '1234567890', 'c103437452.pdf', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question_id` varchar(30) NOT NULL,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `personality_marker_1` text NOT NULL,
  `option_2` text NOT NULL,
  `personality_marker_2` text NOT NULL,
  `option_3` text NOT NULL,
  `personality_marker_3` text NOT NULL,
  `option_4` text NOT NULL,
  `personality_marker_4` text NOT NULL,
  `mark1` int(10) DEFAULT NULL,
  `mark2` int(10) DEFAULT NULL,
  `mark3` int(10) DEFAULT NULL,
  `mark4` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question_id`, `question`, `option_1`, `personality_marker_1`, `option_2`, `personality_marker_2`, `option_3`, `personality_marker_3`, `option_4`, `personality_marker_4`, `mark1`, `mark2`, `mark3`, `mark4`) VALUES
(2, 'q123954214', 'How will you approach a partially completed new project assigned to you for completion?', 'Start the project from beginning.', 'Time Consuming', '5Follow the same pattern as previous developer.', 'Non-innovative', 'Complete the work adding your own ideas.', 'Time Consuming', 'Do not accept the work', 'Non- risktaking', 5, 5, 5, 5),
(4, 'q124005469', 'You are not getting proper recognition for your major contribution of a previous work. How will this affect your performance?', 'Continue the same level of contribution.', 'Consistant', 'Contribute more to get recognition', 'Reward oriented output', 'Contribute more regardless of previous case', 'Consistant', 'Contribute less as your are not getting proper recognition.', 'Fame seeking', 10, 10, 10, 10),
(5, 'q124015381', 'You are aware that,the project will not be completed before your deadline,how will you solve the situation?', 'Request more time', 'Time consuming', 'Complete the project with less features', 'Rule following', 'Take help from co-worker and finish on time', 'Time consuming', 'Back off from the project ', 'Irresponsible', 10, 10, 10, 10),
(6, 'q124023356', 'How do you deal with conflict a work between you and co-workers?', 'Talk with otherperson', 'Humanitarian', 'Report the situation to team leader', 'Rule following', 'Build on your success', 'Humanitarian', 'Try to avoid situation', 'Responsible', 10, 10, 10, 10),
(7, 'q124037901', 'If the company fails to give the salary,How will you handle it?', 'Resign from the job', 'Irresponsible', 'Write request to the manager', 'Rule following', 'Will work accordingly', 'Irresponsible', 'Complete the work regardless of the status of salary', 'Responsible and Committed', 10, 10, 10, 5),
(8, 'q124046398', 'Sample Question', 'Option 1', 'Marker 1', 'Option 2', 'Marker 2', 'Option 3', 'Marker 1', 'Option 4', 'Marker 4', 10, 10, 10, 10),
(9, 'q124434773', 'Sample Question 9', 'Option 1', 'Marker 1', 'Option 2', 'Marker 2', 'Option 3', 'Marker 1', 'Option 4', 'Marker4', 5, 10, 10, 10),
(10, 'q102203915', 'Sample 10', 'Option 1', 'Marker 1', 'Option 2', 'Marker 2', 'Option 3', 'Marker 1', 'Option 4', 'Marker 4', 10, 10, 10, 10),
(3, 'q07471062', 'You face a family emergency and also have to submit a project at the same time. How will you handle the situation?', 'Take help from a co-worker to finish project on time.', 'Time consuming ', 'Report the situation and ask for leniency.', 'Non-risk taking', 'Complete the work regardless of the family emergency.', 'Time consuming ', 'Put family first.', 'Irresponsible', 10, 10, 10, 10),
(1, 'q030524383', 'If you find a co-worker lagging or lazy in his work, how will you react?', 'Report to team leader', 'Rule following', 'Ignore him', 'Non rule following', 'Utlize your time and help', 'Rule following', 'Give him a warning about his lagging', 'Strict', 10, 10, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `result_id` varchar(30) NOT NULL,
  `candidate_id` varchar(30) NOT NULL,
  `candidate_status` varchar(60) NOT NULL,
  `answer_sheet_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`result_id`, `candidate_id`, `candidate_status`, `answer_sheet_id`) VALUES
('re021422684', 'c021213933', 'approved', 'ans02142291'),
('re11415934', 'c053815716', 'null', 'ans10402582'),
('re063520990', 'c063321608', 'approved', 'ans06352050'),
('re06534542', 'c065035433', 'approved', 'ans06534582'),
('re080821471', 'c080430801', 'rejected', 'ans08082171'),
('re085252985', 'c082601390', 'rejected', 'ans08525281'),
('re090203893', 'c085927902', 'approved', 'ans09020316'),
('re090732869', 'c09060020', 'null', 'ans09073225'),
('re09553546', 'c092950727', 'approved', 'ans09553535');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_answers`
--
ALTER TABLE `candidate_answers`
  ADD PRIMARY KEY (`answer_sheet_id`);

--
-- Indexes for table `candidate_login`
--
ALTER TABLE `candidate_login`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `candidate_register`
--
ALTER TABLE `candidate_register`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`candidate_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
