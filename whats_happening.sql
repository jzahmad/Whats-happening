-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 06:53 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whats_happening`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventTypeID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `EventDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SubmitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EventTitle` varchar(100) NOT NULL,
  `EventImage` varchar(50) NOT NULL,
  `EventDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventTypeID`, `GroupID`, `EventDate`, `SubmitDate`, `EventTitle`, `EventImage`, `EventDesc`) VALUES
(1, 5, 1, '2024-02-25 22:00:00', '2024-01-04 01:11:38', 'Support Spay and Neuter Day', 'files/images/events/animal1.jpg', 'Nullam id pelientesque ante. Vestibulum in convall..'),
(2, 3, 6, '2024-02-26 15:00:00', '2024-01-11 01:11:38', 'Come Skate on the Oval', 'files/images/events/skate3.jpg', 'Nunc vel commodo sapien. Phasallus ac enim sit ame...'),
(3, 3, 8, '2024-02-28 00:00:00', '2024-01-15 09:07:28', 'Learn to Ski', 'files/images/events/ski1.jpg', 'Aliquam consoquat, ast et posuoro maximus, magna a...'),
(4, 4, 2, '2024-02-28 21:00:00', '2024-02-01 18:08:44', 'Food/Wine Pairing', 'files/images/events/food1.jpg', 'Aenean odio ante, efficitur vel portitor id, impo...'),
(5, 2, 3, '2024-03-01 22:00:00', '2024-02-18 13:18:10', 'Exhibition of Local Dance', 'files/images/events/dance1.jpg', 'Sed sit amet uma sed nisi lobortis pharetra sit a...'),
(6, 5, 4, '2024-03-08 20:00:00', '2024-02-21 01:27:33', 'Local Bands compete to raise funds for national co...', 'files/images/events/music1.jpg', 'Ut ligula metus, protium non depibus'),
(7, 5, 1, '2024-06-02 16:00:00', '2024-02-18 10:16:11', 'Meet, Greatt and Adapt Day', 'files/images/events/animal3.jpg', 'Nullam id polientesque anto. Vestibulum in convall..'),
(8, 5, 5, '2024-06-25 20:00:00', '2024-02-14 13:08:11', 'Auction of local art to support local artists', 'files/images/events/art1.jpg', 'Quisque vel rutrum est. Done in turpis noc enim L.'),
(9, 1, 4, '2024-07-29 21:00:00', '2024-02-18 01:31:28', 'Spring concert', 'files/images/events/music2.jpg', 'Mperdiet ut urna. Ut tincidunt nibh'),
(10, 4, 2, '2024-06-30 18:00:00', '2024-02-20 01:31:26', 'Spring Hamper - Get Yours', 'files/images/events/food7.jpg', 'lipordiet ut uma.Ut tincidunt nibh'),
(11, 1, 3, '2024-04-04 20:30:00', '2024-03-12 06:42:30', 'let\'s learn some great dancing', 'files/images/events/dance2.jpg', 'hjewfb;uifw;ihW  ;JHWB;Gf; wjhb;IUgfpywgf'),
(12, 1, 3, '2024-03-13 23:00:00', '2024-03-13 03:06:38', 'Dance class', 'files/images/events/dance4.jpg', 'iewuewfh8phef wefbiuhfewh97fw4 hwiefbiuhew9fhewf jewiuhufeh3bfewiu uiwehihwfeiuhjwefhi'),
(14, 1, 16, '2024-03-22 20:30:00', '2024-03-21 21:22:25', 'testing', 'files/images/events/dance5.jpg', 'just for testing');

-- --------------------------------------------------------

--
-- Table structure for table `eventtypes`
--

CREATE TABLE `eventtypes` (
  `EventTypeID` int(11) NOT NULL,
  `EventType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventtypes`
--

INSERT INTO `eventtypes` (`EventTypeID`, `EventType`) VALUES
(1, 'Music'),
(2, 'Art+Culture'),
(3, 'Sports'),
(4, 'Food'),
(5, 'Fund Raiser');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` int(11) NOT NULL,
  `GroupName` varchar(100) NOT NULL,
  `GroupImage` varchar(50) NOT NULL,
  `GroupType` varchar(100) NOT NULL,
  `GroupDesc` text NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `ContactEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `GroupName`, `GroupImage`, `GroupType`, `GroupDesc`, `ContactName`, `ContactEmail`) VALUES
(1, 'Human Society', 'files/images/Groups/HumanSociety.jpg', 'Animal Shelter', 'Nullam id pellentesque ante. Vestibulum in convallis mauris.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem. Curabitur eleifend maximus finibus. Phasellus sagittis porttitor augue ut commodo.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem.', 'Petra Barn', 'pb@hs.com'),
(2, 'Eat Local', 'files/images/Groups/EatLocal.jpg', 'Promotes Local Farms', 'Aenean odio ante, efficitur vel porttitor id, imperdiet ut urna. Ut tincidunt nibh sapien, nec interdum eros fringilla in. Cras accumsan rutrum arcu ac congue. Integer finibus velit eu elementum rutrum.', 'Joe Farm', 'joe@farms.com'),
(3, 'Dance NS', 'files/images/Groups/DanceNS.jpg', 'Dance for Youth', 'Sed sit amet urna sed nisl lobortis pharetra sit amet at nulla. Nulla euismod elit in mauris dignissim auctor. Aenean a diam non turpis mollis auctor ac quis est.', 'Ami Glen', 'ami@NSD.com'),
(4, 'Youth Band', 'files/images/Groups/YouthBand.jpg', 'Promotes Local School Bands', 'Ut ligula metus, pretium non dapibus dictum, rutrum at magna. Pellentesque et lorem in diam pharetra cursus eget et ex. Integer finibus velit eu elementum rutrum.', 'Drum Trumpet', 'DT@band.com'),
(5, 'Nocturne Association', 'files/images/Groups/Nocturne.jpg', 'Showcasing and supporting local art', 'Quisque vel rutrum est. Donec in turpis nec enim tincidunt eleifend vel eu nunc.Varius eget gravida eu, ullamcorper vitae sem.', 'P Blue', 'pb@nocturne.com'),
(6, 'Outdoor Skating Group', 'files/images/Groups/Outdoor_Skate.jpg', 'Organizes outdoor skating', 'Nunc vel commodo sapien. Phasellus ac enim sit amet ligula congue scelerisque sit amet quis tellus.Ut tincidunt nibh sapien, nec interdum eros fringilla in.', 'Blade Fast', 'bf@rink.com'),
(7, 'NS Soccer Association', 'files/images/Groups/NS_Soccer.jpg', 'Organizes youth soccer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consequat, est et posuere maximus, magna arcu dapibus justo, ac congue dui dui sed tellus. Aliquam bibendum efficitur lacinia. Quisque ac pellentesque turpis', 'Soca Foot', 'soca@soccer.com'),
(8, 'NS Ski School', 'files/images/Groups/NS_Ski.jpg', 'Downhill skiing', 'Downhill skiing Aliquam consequat, est et posuere maximus, magna arcu dapibus justo.', 'SK Downing', 'sk@hill.com'),
(16, 'testing', 'files/images/Groups/DanceNS.jpg', 'Music', 'Just for testing', 'Jazib', 'jz346475@dal.ca');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `AccountID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`AccountID`, `GroupID`, `Username`, `Password`) VALUES
(1, 1, 'humanS', 'abc123'),
(2, 2, 'locals', 'abc123'),
(3, 3, 'dancer', 'abc123'),
(4, 4, 'bands', 'abc123'),
(5, 5, 'nocturne', 'abc123'),
(6, 6, 'skate', 'abc123'),
(7, 7, 'soccer', 'abc123'),
(8, 8, 'skiNS', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `EventTypeID` (`EventTypeID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- Indexes for table `eventtypes`
--
ALTER TABLE `eventtypes`
  ADD PRIMARY KEY (`EventTypeID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `eventtypes`
--
ALTER TABLE `eventtypes`
  MODIFY `EventTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`EventTypeID`) REFERENCES `eventtypes` (`EventTypeID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
