--
-- Database: `catalog`
-- Warhammer Fantasy Role Play books for 2nd, 4th edition
-- --------------------------------------------------------
--
-- Author additions
INSERT INTO `publishers` (`id`, `Name`, `URL`, `creationDate`, `UpdateDate`) VALUES
(6, 'Black Industries', 'https://en.wikipedia.org/wiki/Black_Industries', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(7, 'Fantasy Flight Games','https://www.fantasyflightgames.com/en/index/', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(8, 'Cubicle 7', 'https://cubicle7games.com/', '2023-07-22 12:00:00', '2023-07-22 12:00:00');
--
-- TAG additions
INSERT INTO `tags` (`id`, `Name`, `CreationDate`, `UpdateDate`) VALUES
(11, 'Warhammer FRP 2nd edition', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(12, 'Warhammer FRP 3rd edition', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(13, 'Warhammer FRP 4th edition', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

--  Stuff Addition from Black Industires, 2nd edition of whfrp
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `PublisherId`, `StatusId`, `OwnerId`, `ISBN`, `Date`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'Book 1', 1, 6, 6, 'Description goes here', '', '1995-01-01', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),

--  Stuff Addition from Fantasy Flight Games, 2nd edition of whfrp
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `PublisherId`, `StatusId`, `OwnerId`, `ISBN`, `Date`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'Book 2', 1, 6, 6, 'Description goes here', '', '1995-01-01', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),

--  Stuff Addition from Cubicle 7, 4th edition of whfrp
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `PublisherId`, `StatusId`, `OwnerId`, `ISBN`, `Date`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'Book 3', 1, 6, 6, 'Description goes here', '', '1995-01-01', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),


-- Images
--  INSERT INTO `image` (`id`, `stuffid`, `imageType`, `imageData`) VALUES
