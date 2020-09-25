-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 01:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lists`
--

CREATE TABLE `tbl_lists` (
  `list_id` int(10) UNSIGNED NOT NULL,
  `list_name` varchar(50) NOT NULL,
  `list_description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lists`
--

INSERT INTO `tbl_lists` (`list_id`, `list_name`, `list_description`) VALUES
(1, 'To-Do', 'Enter tasks to be done here'),
(2, 'Doing', ''),
(3, 'Done', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(150) NOT NULL,
  `task_description` text NOT NULL,
  `list_id` int(11) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`task_id`, `task_name`, `task_description`, `list_id`, `priority`, `deadline`) VALUES
(1, 'Design Thinking', 'Think of a perfect design for website                                                ', 1, 'High', '2020-09-25'),
(2, 'Documentation', 'Documents of the project', 3, 'Medium', '2020-09-27'),
(3, 'Gathering data', '', 2, 'High', '2020-09-26'),
(4, 'Building Front-End', '', 1, 'Medium', '2020-10-09'),
(5, 'Building Back-End', '', 2, 'Low', '2020-10-10'),
(6, 'Integrating whole project', '', 1, 'Medium', '2020-10-15'),
(7, 'Submission', '', 1, 'Medium', '2020-10-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lists`
--
ALTER TABLE `tbl_lists`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lists`
--
ALTER TABLE `tbl_lists`
  MODIFY `list_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
