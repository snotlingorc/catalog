--
-- Database: `catalog`
-- Warhammer Fantasy Role Play books for 1st, 2nd, 4th edition
-- --------------------------------------------------------
--
-- Author additions
INSERT INTO `authors` (`id`, `Name`, `URL`, `creationDate`, `UpdateDate`) VALUES
(4, 'Flame Publications', 'https://rpggeek.com/rpgpublisher/9643/flame-publications', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(5, 'Hogshead Publishing', 'https://en.wikipedia.org/wiki/Hogshead_Publishing', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(6, 'Black Industries', 'https://en.wikipedia.org/wiki/Black_Industries', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(7, 'Fantasy Flight Games','https://www.fantasyflightgames.com/en/index/', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(8, 'Cubicle 7', 'https://cubicle7games.com/', '2023-07-22 12:00:00', '2023-07-22 12:00:00');
--
-- TAG additions
INSERT INTO `tags` (`id`, `Name`, `CreationDate`, `UpdateDate`) VALUES
(11, 'Warhammer FRP 2nd edition', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(12, 'Warhammer FRP 3rd edition', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(13, 'Warhammer FRP 4th edition', '2023-07-22 12:00:00', '2023-07-22 12:00:00');
--
--  Stuff Addition from the Original GW Line
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'WHFRP RuleBook', 1, 2, 1, 1, 1, 'main rulebook, hardback, 1986', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(4, 'WHFRP RuleBook', 1, 2, 1, 1, 1, 'main rulebook republished as a softback with minor corrections, 1989', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(5, 'The Enemy Within', 1, 2, 1, 1, 1, 'campaign supplement, 1986', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(6, 'Dungon Rooms and Dungeon Lairs', 1, 2, 1, 1, 1, 'boxed floorplan sets, 1986', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(7, 'Character Pack', 1, 2, 1, 1, 1, '1st edition, expanded rules for character generation, 1987', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(8, 'Shadows Over Boegenhafen', 1, 2, 1, 1, 1, 'second part of The Enemy Within Campaign, 1987', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(9, 'Death on the Reik', 1, 2, 1, 1, 1, 'boxed edition, third part of The Enemy Within campaign, 1987', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(10, 'Warhammer City', 1, 2, 1, 1, 1, 'Middenheim sourcebook, 1987', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(11, 'Power Behind the Throne', 1, 2, 1, 1, 1, 'fourth part of The Enemy Within campaign, 1988', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(12, 'Death on the Reik', 1, 2, 1, 1, 1, 'republished as a hardback, 1988', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(13, 'Warhammer Campaign', 1, 2, 1, 1, 1, 'hardback collection of The Enemy Within and Shadows over Bögenhafen, 1988', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(14, 'Something Rotten in Kislev', 1, 2, 1, 1, 1, 'fifth part of The Enemy Within campaign, 1988', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(15, 'Relam of Chains: Slaves to Darkness', 1, 2, 1, 1, 1, 'first of the two Realm of Chaos volumes, joint WFRP/WFB/WH40K hardback supplement, 1988', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(16, 'The Restless Dead', 1, 2, 1, 1, 1, 'collection of scenarios previous published in White Dwarf magazine, 1989', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(17, 'Warhammer Adventure', 1, 2, 1, 1, 1, 'collection of the first three parts of The Enemy Within campaign, 1989', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(18, 'Warhammer City of Chaos', 1, 2, 1, 1, 1, 'collection of Warhammer City and Power Behind the Throne, 1989', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(19, 'The Emprie in Flames', 1, 2, 1, 1, 1, 'sixth part of the Enemy Within Campaign, 1989', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(20, 'Realm of Chaos: The Lost and the Damned', 1, 2, 1, 1, 1, '2nd volume of the joint WFRP/WFB/WH40K supplement, hardback, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

--  Stuff Addition from Flame Publications
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(21, 'Fire in the Mountians', 1, 4, 1, 1, 1, 'The Doomstones Campaign part 1, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(22, 'Lichemaster', 1, 4, 1, 1, 1, 'a redesigned scenario pack from the second edition of Warhammer Fantasy Battle, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(23, 'Blood in Darkness', 1, 4, 1, 1, 1, 'The Doomstones Campaign part 2, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(24, 'Character Pack', 1, 4, 1, 1, 1, '1st edition – 1st edition of the character pack, not the game as a whole, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(25, 'Warhammer Companion', 1, 4, 1, 1, 1, 'A Grimoire of arcane knowledge, collection of scenarios and additional rules, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(26, 'Death Rock', 1, 4, 1, 1, 1, 'The Doomstones Campaign part 3, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(27, 'Dwarf Wars', 1, 4, 1, 1, 1, 'The Doomstones Campaign part 4, 1990', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(28, 'Death\'s Dark Shadow', 1, 4, 1, 1, 1, 'scenario pack, 1991', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(29, 'Castle Drachenfels', 1, 4, 1, 1, 1, 'scenario pack based on Jack Yeovil\'s novel Drachenfels, 1992', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(30, 'Character Pack 2nd', 1, 4, 1, 1, 1, '2nd printing – 2nd edition of the character pack, not the game as a whole, 1992', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

--  Stuff Addition from Hogshead Publishing
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(31, 'Warhammer Fantasy Roleplay', 1, 5, 1, 1, 1, 'softcover reprint, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(32, 'The Enemy Within Campaign volume 1: Shadows over Bögenhafen', 1, 5, 1, 1, 1, 'reprint of Warhammer Campaign, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(33, 'Apocrypha Now', 1, 5, 1, 1, 1, 'additional rules, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(34, 'The Dying of the Light', 1, 5, 1, 1, 1, 'scenario pack, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(35, 'The Doomstones Campaign volume 1: Fire and Blood', 1, 5, 1, 1, 1, 'collection of Fire in the Mountains and Blood in Darkness, 1996', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(36, 'The Enemy Within Campaign volume 2: Death on the Reik', 1, 5, 1, 1, 1, 'reprint, 1996', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(37, 'GM\'s Screen & Reference Pack', 1, 5, 1, 1, 1, '1997', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(38, 'The Doomstones Campaign volume 2: Wars & Death', 1, 5, 1, 1, 1, 'collection of Death Rock and Dwarf Wars, with three new pages, 1997', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(39, 'Middenheim: City of Chaos', 1, 5, 1, 1, 1, 'reprint of Warhammer City, 1998', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(40, 'The Enemy Within Campaign volume 3: Power Behind the Throne', 1, 5, 1, 1, 1, 'reprint with a new 14-page prologue, 1998', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(41, 'The Enemy Within Campaign volume 4: Something Rotten in Kislev', 1, 5, 1, 1, 1, 'reprint, 1999', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(42, 'Marienburg: Sold Down the River', 1, 5, 1, 1, 1, 'Marienburg sourcebook, 1999', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(43, 'Apocrypha 2: Chart of Darkness', 1, 5, 1, 1, 1, 'additional rules, 2000', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(44, 'Death\'s Dark Shadow', 1, 5, 1, 1, 1, 'reprint, 2001', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(45, 'The Doomstones Campaign volume 3: Heart of Chaos', 1, 5, 1, 1, 1, 'a new fifth part for the Doomstones campaign, 2001', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(46, 'Realms of Sorcery', 1, 5, 1, 1, 1, 'magic sourcebook, 2001', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(47, 'Corrupting Influence: The Best of Warpstone', 1, 5, 1, 1, 1, 'compilation of articles from Warpstone magazine', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
(48, 'Dwarfs: Stone and Steel', 1, 5, 1, 1, 1, 'Dwarf sourcebook, 2002', '2023-07-22 12:00:00', '2023-07-22 12:00:00');

--  Stuff Addition from Black Industires, 2nd edition of whfrp
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'Apocrypha Now', 1, 6, 1, 1, 1, 'additional rules, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),

--  Stuff Addition from Fantasy Flight Games, 2nd edition of whfrp
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'Apocrypha Now', 1, 6, 1, 1, 1, 'additional rules, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),

--  Stuff Addition from Cubicle 7, 4th edition of whfrp
INSERT INTO `stuff` (`id`, `Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `Description`, `CreationDate`, `UpdateDate`) VALUES
(3, 'Apocrypha Now', 1, 6, 1, 1, 1, 'additional rules, 1995', '2023-07-22 12:00:00', '2023-07-22 12:00:00'),
