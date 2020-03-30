-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2020 at 12:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET time_zone = "+00:00";

--
-- Database: `ipd19`
--

-- --------------------------------------------------------

--
-- Table structure for table `timing_quotes`
--

CREATE TABLE `timing_quotes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `author` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timing_quotes`
--

INSERT INTO `timing_quotes` (`id`, `quote`, `author`) VALUES
(1, 'Any fool can write code that a computer can understand. Good programmers write code that humans can understand.', 'Martin Fowler'),
(2, 'Give a man a program, frustrate him for a day.\r\nTeach a man to program, frustrate him for a lifetime.', 'Muhammad Waseem'),
(3, 'The most important property of a program is whether it accomplishes the intention of its user.', 'C.A.R. Hoare'),
(4, 'Some of the best programming is done on paper, really. Putting it into the computer is just a minor detail.', 'Max Kanat-Alexander'),
(5, 'Programming isn\'t about what you know; it\'s about what you can figure out.', 'Chris Pine'),
(6, 'Think twice, code once.', 'Waseem Latif'),
(7, 'Learning the art of programming, like most other disciplines, consists of first learning the rules and then learning when to break them.', 'Joshua Bloch'),
(8, 'The best thing about a boolean is even if you are wrong, you are only off by a bit.', NULL),
(9, 'Without requirements or design, programming is the art of adding bugs to an empty text file.', 'Louis Srygley'),
(10, 'It’s not a bug – it’s an undocumented feature.', NULL),
(11, 'A good programmer is someone who always looks both ways before crossing a one-way street.', 'Doug Linder'),
(12, 'Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.', 'Martin Golding'),
(13, 'Programming is like sex. One mistake and you have to support it for the rest of your life.', 'Michael Sinz'),
(14, 'If debugging is the process of removing software bugs, then programming must be the process of putting them in.', 'Edsger Dijkstra'),
(15, 'In order to understand recursion, one must first understand recursion.', NULL),
(16, 'Don’t worry if it doesn’t work right. If everything did, you’d be out of a job.', 'Mosher’s Law of Software Engineering'),
(17, 'The only way to learn a new programming language is by writing programs in it.', 'Dennis Ritchie');

-- --------------------------------------------------------

--
-- Table structure for table `timing_users`
--

CREATE TABLE `timing_users` (
  `id` int(11) NOT NULL,
  `access_code` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_time` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timing_users`
--

INSERT INTO `timing_users` (`id`, `access_code`, `password`, `login_time`) VALUES
(1, '12345', '$2y$10$UurhqRpyuqd.V82X85b35O8JoPsXapG3.AZdMtm/UcfvABaO/4r5y', NULL),
(2, '12419', '$2y$10$znFA9TPKQspzZdVHKTU7T.gmaVe5hwOg72rHAmtKSqAQVSA2mHJnu', NULL),
(3, '77777', '$2y$10$TjTFsTx.KBhlKcQMrCd/mu9UY8aJMDKKuj3bjRSjXood12hMxnwAS', NULL),
(4, '51118', '$2y$10$6AEpMbU.prxZaky9nOe3heWBVBvH1NOKoQVG34Lc1r08BL7TFwAaO', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timing_quotes`
--
ALTER TABLE `timing_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timing_users`
--
ALTER TABLE `timing_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timing_quotes`
--
ALTER TABLE `timing_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `timing_users`
--
ALTER TABLE `timing_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
