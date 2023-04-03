-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 08:02 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holychild`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'holychild', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `father`, `mobile`, `year`) VALUES
(1, 'Sanjit Ghoshal', 'Bishal dhara', '7854212588', '2018-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `post` text NOT NULL,
  `qualification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `post`, `qualification`) VALUES
(36, 'PRE-PRIMARY, PRIMARY & SECONDARY TEACHERS (Posted on - 10/07/2018)<br>\r\n Science, English, Bengali, Hindi, Computer, Mathematics, SST', 'Post Graduate or Graduate with Excellent Spoken English skills and computer skills.'),
(37, 'PRE-PRIMARY, PRIMARY & SECONDARY TEACHERS (Posted on - 10/07/2018)<br>\r\n Science, English, Bengali, Hindi, Computer, Mathematics, SST', ' Graduate or Graduate with Excellent Spoken English skills and computer skills.');

-- --------------------------------------------------------

--
-- Table structure for table `career2`
--

CREATE TABLE `career2` (
  `id` int(11) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career2`
--

INSERT INTO `career2` (`id`, `pname`, `name`, `mobile`, `email`, `address`, `file`) VALUES
(5, 'PRE-PRIMARY, PRIMARY & SECONDARY TEACHERS (Posted on - 10/07/2018) Science, English, Bengali, Hindi, Computer, Mathematics, SST', 'Sukanta Singha Roy', '7854212587', 'technoriju@gmail.com', 'howrah', 'upload/folder/42.pdf'),
(4, 'PRE-PRIMARY, PRIMARY & SECONDARY TEACHERS (Posted on - 10/07/2018) Science, English, Bengali, Hindi, Computer, Mathematics, SST', 'Sanjit Ghosh', '7854212587', 'technoriju@gmail.com', 'howrah', 'upload/folder/combinepdf.pdf'),
(11, 'PRE-PRIMARY, PRIMARY & SECONDARY TEACHERS (Posted on - 10/07/2018)<br> Science, English, Bengali, Hindi, Computer, Mathematics, SST', 'riju karar', '9876543210', 'technofav@gmail.com', 'hjhghghy', 'upload/folder/Doc2.docx'),
(12, 'PRE-PRIMARY, PRIMARY & SECONDARY TEACHERS (Posted on - 10/07/2018)<br> Science, English, Bengali, Hindi, Computer, Mathematics, SST', 'magnus', '9475773669', 'ms.debarpita@gmail.com', 'burdwan', 'upload/folder/ugppt-110802010636-phpapp02 (1).docx');

-- --------------------------------------------------------

--
-- Table structure for table `folder_image`
--

CREATE TABLE `folder_image` (
  `id` int(10) NOT NULL,
  `folder_title` varchar(100) NOT NULL,
  `file` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder_image`
--

INSERT INTO `folder_image` (`id`, `folder_title`, `file`) VALUES
(33, 'child', 'upload/folder/pro1533641025-POTD_chick_3597497k.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `id` int(10) NOT NULL,
  `folder_title` varchar(100) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `file` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`id`, `folder_title`, `image_title`, `file`) VALUES
(24, '33', 'fghjgj', 'upload/gallery/pro1532693080-1280px-Picture_Gallary_and_Clock_Tower.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `file`) VALUES
(13, 'flow', 'upload/notice/153267393042.pjpg.pdf'),
(14, 'fbhjgjkh', 'upload/notice/1532676583Scan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `snotice`
--

CREATE TABLE `snotice` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snotice`
--

INSERT INTO `snotice` (`id`, `title`, `file`) VALUES
(3, 'fru', 'upload/snotice/153267535042.pdf'),
(4, 'ghg ', 'upload/snotice/1533640947Scan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `father`, `mobile`, `year`) VALUES
(1, 'Sanjit Ghosh', 'bishal das', '7854212587', '2018-07-27'),
(2, 'Anurag ', 'Riju karar', '785421', '2018-08-07'),
(3, 'Sanjit Ghosh', 'anil karar', '7854212589', '2018-08-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career2`
--
ALTER TABLE `career2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder_image`
--
ALTER TABLE `folder_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snotice`
--
ALTER TABLE `snotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `career2`
--
ALTER TABLE `career2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `folder_image`
--
ALTER TABLE `folder_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `snotice`
--
ALTER TABLE `snotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
