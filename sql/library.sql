SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `catalog`
--
-- --------------------------------------------------------
--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ConditionId` int(11) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `OwnerId` int(11) DEFAULT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(1, 'Core RuleBook', 1, 1, 1, 1, 1, 'Pathfinder 2E Core Rulebook', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(2, 'Bestiary', 1, 1, 1, 1, 1, 'Pathfinder 2E Bestiary', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `stuff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `Name`, `Status`, `CreationDate`, `UpdateDate`) VALUES
(1, 'TTRPG', 1, '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(2, 'Books', 1, '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(3, 'Games', 1, '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(4, 'Miniatures', 1, '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------
--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `Name` varchar(159) DEFAULT NULL,
  `URL` varchar(159) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `authors` (`id`, `Name`, `URL`, `creationDate`, `UpdateDate`) VALUES
(1, 'Games Workshop', 'https://www.games-workshop.com/en-US/Home', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(2, 'Paizo', 'https://paizo.com/', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(3, 'Wizards of the Cost', 'https://dnd.wizards.com/', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------
--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `id` int(11) NOT NULL,
  `Name` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `condition` (`id`, `Name`, `CreationDate`, `UpdateDate`) VALUES
(1, 'New', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(2, 'Used', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(3, 'On Loan', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(4, 'Assembled', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(5, 'Painted', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------
--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `Name` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id`, `Name`, `CreationDate`, `UpdateDate`) VALUES
(1, 'Have', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(2, 'Want', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(3, 'Ordered', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------
--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `Name` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `owner` (`id`, `Name`, `CreationDate`, `UpdateDate`) VALUES
(1, 'Snotling', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------
--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `Name` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tags` (`id`, `Name`, `CreationDate`, `UpdateDate`) VALUES
(1, 'Warhammer 40k', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(2, 'Dungeons and Dragons', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(3, 'Pathfinder', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(4, 'BloodBowl', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(5, 'Pathfinder 2E', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(6, 'Warhammer Fantasy Role Play', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(7, 'Plastic', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(8, 'Team', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(9, 'Warband', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `tagAssociation` (
  `stuffid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tagAssociation` (`stuffid`, `tagid`) VALUES
(1, 5),
(2, 4);

-- --------------------------------------------------------
--
-- Table structure for table `image`
--
CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `stuffid` int(11) NOT NULL,
  `imageType` varchar(255) NOT NULL,
  `imageData` longblob NOT NULL
);

ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- --------------------------------------------------------
--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `administrator` (`id`, `Name`, `Email`, `UserName`, `Password`, `UpdateDate`) VALUES
(1, 'Your Name', 'email@address.com', 'admin', 'e16b2ab8d12314bf4efbd6203906ea6c', '2023-07-22 12:00:00');

ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;