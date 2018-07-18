-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 12:17 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cap2`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `zipID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `address`, `zipID`, `userID`, `phone`) VALUES
(1, 'Grass Residences, Misamis street, Barangay Sto. Cristo', 1, 7, '6258546'),
(2, 'Paezville Subd., Brgy. Dampalit', 2, 7, '9228099076'),
(3, ' Tuitt, GEMPC, Kamuning', 3, 7, '8462564'),
(4, 'Caswynn building, GMA, Kamuning', 4, 8, '123456'),
(5, 'Banawe', 5, 12, '1234567'),
(7, 'Biak na Bato', 7, 12, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `description`) VALUES
(1, 'Sci-fi'),
(2, 'Fantasy'),
(3, 'Horror'),
(4, 'Dexterity'),
(5, 'Card'),
(6, 'Dice'),
(7, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `city`) VALUES
(1, 'Quezon City'),
(2, 'Malabon'),
(3, 'Quezon');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` text,
  `price` decimal(7,2) DEFAULT NULL,
  `stocks` smallint(6) DEFAULT '20',
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `name`, `image`, `description`, `price`, `stocks`, `categoryID`) VALUES
(1, 'Shadowrun Crossfire', 'assets/lib/images/crossfire.jpg', 'This Prime Runner Edition is an updated edition that makes Shadowrun Crossfire better than ever. The core gameplay, which demands good tactical thinking and strong cooperation, remains unchanged, but other changes and updates make the game smoother and more accessible. Rules tweaks and redesigned character cards, are based on improvements that came with the breakout game Dragonfire, while others focus on giving more options to players, including putting more missions in the base box.', '59.99', 16, 1),
(2, 'Dragonfire', 'assets/lib/images/dragonfire.jpg', 'Seize the Adventure!  The jingle of muffled chainmail. The twisted mutterings of a dark incantation. The stench of corruption wafting down long-forgotten passageways.  Then the terrifying, abrupt maelstrom of light and sound as skeletons, kobolds, elementals, and worse boil up from hidden caverns to attack...and you respond with steel, magic, and blood!  Dragonfire is a 2 to 6 player deckbuilding game set within the world\'s greatest roleplaying game, Dungeons & Dragons.. Players choose from a number of races, from dwarf to elf, half-orc to human, while assuming the quintessential roles of cleric, rogue, fighter, and wizard.  Equipped with weapons, spells, and magic items, players begin their adventure along the famed Sword Coast, then expand to other locales across the Forgotten Realms, such as Baldur\'s Gate, Neverwinter, and Waterdeep, in future expansions. Along the way, players level up their characters, opening access to additional equipment, feats, and more. Join the quest, and build your own legend!', '59.99', 19, 2),
(3, 'Maximum Apocalypse', 'assets/lib/images/maxapocalypse.jpg', 'Maximum Apocalypse is a cooperative, rogue-like adventure game set amidst the backdrop of four apocalyptic scenarios. As you explore the post-apocalyptic world, one to six survivors work together to complete mission objectives. On each turn, a player can use up to four actions to explore the map, play cards, equip weapons, scavenge for resources, draw cards, or battle roaming monsters. Picking a unique survivor class within the group, players must plan their strategy while leaning on their characters strengths in order to defeat monsters and avoid starvation.', '49.00', 9, 3),
(5, 'Helionox', 'assets/lib/images/helionox.jpg', 'Helionox is a movement-based deck-building board game for 1-4 players that can be played in competitive, cooperative, or solo modes. Set in the distant future, players compete for Influence by obtaining powerful technology and operatives, overcoming devastating events, and establishing embassies on different worlds. But time is limited! Once the last card of the Event Deck is played, the game is over. The player with the most Influence at the end wins. This box includes the original base game Helionox: The Last Sunset and the full-sized expansion Helionox: Mercury Protocol.', '59.99', 19, 5),
(6, 'Dice Throne', 'assets/lib/images/dicethrone.jpg', 'Dice Throne is a game of intriguing dice, tactical card play, powerful heroes, and unique abilities.\r\n\r\nIt\'s a fast-paced 2-6 player combat game (1v1, 2v2, 3v3, or free-for-all). Select from a variety of heroes that play and feel completely distinct from one another. Attack opponents and activate abilities by rolling your hero\'s unique set of five dice. Accumulate combat points and spend them on cards that have a large range of effects, such as granting permanent hero upgrades, applying status effects, and manipulating dice directly (yours, your teammate\'s, or even your opponent\'s).', '49.99', 11, 6),
(7, '5-Minute Dungeon', 'assets/lib/images/5mindungeon.jpg', 'Battle Together...or Perish!\r\n\r\nYou and your party of intrepid heroes are trapped in a series of five deadly dungeons. To survive, you must battle together against dangerous monsters, obstacles, and Dungeon Bosses. Defeat each dungeon in five minutes or less and you win!\r\n\r\nPick Your Hero\r\nBattle It Out\r\nBeat the Boss', '19.99', 16, 7),
(8, 'Rooster Rush', 'assets/lib/images/rooster.jpg', 'Why did the chicken cross the road?\r\n\r\nTruth be told, we don\'t really know. But, there must be something really good on the other side for the industrious rooster to brave the busy streets to get to the other side. Spin the tokens, slap the cards, but don\'t get hit while trying to weave your way through traffic. And always be on the lookout for Granny on her green moped!', '14.95', 19, 4),
(12, 'Flip Ships', 'assets/lib/images/flipships.jpg', 'It Was an Ambush That\'s the only way to describe it. The mother ship appeared out of nowhere, creating a massive shadow over the city. Within seconds, wave after wave of fighters poured out of it, filling the sky.  We\'re launching the ships we have ready, but it isn\'t much. Our pilots fight bravely, defending the planet, while we ready the rest of the fleet. Explosions fill the sky, and we\'ve taken some hits, but we won\'t give up. Will you?  Flip Ships is a cooperative dexterity game where players take on the roles of brave pilots defending their planet from an onslaught of firepower. Flip your ships to take out the encroaching enemies, and to take down the powerful mother ship before it\'s too late.', '40.00', 19, 4),
(13, 'Catacombs', 'assets/lib/images/catacombs.jpg', 'Catacombs is an award-winning, cooperative board game set in the fantasy world of Cimathue, and you need skill and dexterity to master this fast-paced game.  One player (the Overseer) marshals an army of monsters while the others choose from six brave heroes who embark on a quest to save the town of Stormtryne from the threat lurking in the catacombs below. As the heroes explore, they must use their abilities, buy items, and recruit allies to help them defeat the monsters before facing the powerful Catacomb Lord, thereby saving the town.  In more detail, in Catacombs players flick wooden discs that represent the monsters and heroes. Contact with an opposing piece inflicts damage, while missiles, spells, and other special abilities can cause other effects. When all of the monsters of a room have been cleared, the heroes can move further into the catacomb.  This third edition of Catacombs has all-new artwork compared to the earlier editions, but more importantly the keywords from the first two editions has been replace with iconography, the terminology has changed, and the third edition has new shot types, new card effects, and a different set of components (many of which have changed statistics) as well as wall pieces not present in earlier editions.', '79.99', 19, 2),
(15, 'Zombie Tsunami', 'assets/lib/images/zombieTsunami.jpg', 'Zombie Tsunami is a party game for 3 to 6 players that plays in under 30 minutes.  In the game, each player competes to grow the largest horde of zombies. They will have to collaborate and sometimes betray one another in order to win the game.', '29.99', 0, 5),
(16, 'Dead Man\'s Doubloons', 'assets/lib/images/deadMansDoubloons.jpg', 'Prepare for an Adventure of High Piracy!  Assume control of a unique pirate captain, their ship, and a rapacious crew. Your first task is to gather treasure map fragments scattered in the waters surrounding a mysterious island, while navigating the reefs and fending off rivals.  With an assembled map, you will lead a landing party along the obstacle-strewn paths to the summit of Mount ZotÃ¨tmon, where the legendary treasure trove is buried.  The final phase brings you back to your ship for an epic battle royale. Sunken vessels become ghost ships, with their treasure cursed. When the smoke clears, the game ends and the richest pirate is crowned the winner!', '50.00', 19, 6),
(17, 'Legendary Creatures', 'assets/lib/images/legendaryCreatures.jpg', 'The Trial of Nature\'s Grace  There is great excitement throughout the halls of Kajan, School of Life, as the High Council has announced a Trial of Nature\'s Grace!  Ally with the legendary creatures of Xyleria - Harness their abilities, cast powerful spells, visit magical places, and master the elemental realms to become the next Druid of Nature\'s Grace!', '49.99', 19, 2),
(18, 'GKR: Heavy Hitters', 'assets/lib/images/gkr.jpg', 'Strap in for the most epic spectator sport this side of the Megapocalypse. Gather your squad of Giant Killer Robots (GKRs), build your deck, and face your rivals in the ultimate fight for fame, fortune, and sweet salvage rights. Scheme, strategize, and strong-arm your way to victory as you dominate the media landscape, one billboard at a time.  GKR: Heavy Hitters is a standalone, customizable tabletop game for 1-4 players, combining high-quality collectibles with dice-rolling, deck-building, and tactical play! Pilot your Heavy Hitter (the biggest, baddest robot on the board) and a squad of three support units through the ruins of an old city, competing to either wipe your opponent off the map or reduce four skyscrapers to rubble.', '149.00', 19, 1),
(19, 'Unlocked: The Mansion of Mana', 'assets/lib/images/unlocked.jpg', 'You have been invited to a mysterious Victorian mansion. As you arrive, you discover others, strangers to you, also received invitations. Together, you enter the mansion. As you step through the doorway, a ghostly figure appears before you surrounded in a spectral chromatic aura and begins to speak in echoing dulcet tones. The ghostly figure implores you to save him. In return, he offers you his fame, fortune, and all of his arcane knowledge. As a young wizard, you canâ€™t help but wonder all you could do with that knowledge.  Unlocked is a sequential set collection, acquired powers, and engine building game that requires hand management and strategy to win.', '30.00', 19, 5),
(20, 'Cat Tower', 'assets/lib/images/catTower.jpg', 'Cat Tower is a papercraft, tower-building, dexterity game starring cats! You and up to five players are tasked with staking unwieldy, lethally cute mousers in various, precarious positions based on the roll of a giant die. The goal is to get rid of your kitty hoard by placing them on the ever-growing Tower of Cats.  But HEADS-UP! One small twitch and cat chaos ensues, forcing the guilty party to add fallen felines to his or her cat pile. Then there are the \"Fatty Catty\" cards, which equal unforeseen plays. Got it?! Smiles, grimaces, and belly laughs await. Get to stacking!', '19.99', 19, 4),
(21, 'Monster Match', 'assets/lib/images/monsterMatch.jpg', 'As the newest member of the Happy Planet line of games, Monster Match is another game that raises the happiness level of everyone playing. Monster Match is the screaming-fast game of catching cute, donut-eating monsters.  Roll the special ', '17.99', 19, 7),
(22, 'Snorta!', 'assets/lib/images/snorta.jpg', 'The Wild Game of Moos, Meows, and More!  Get ready for laughter as your friends and family suddenly start sounding like they were raised in a barn! After each player reveals their hidden animal noise, the race is on to get rid of your cards.  Once the frantic card flipping begins, whenever two cards match, tongue-tied players stumble and stutter to blurt out the sound of each other\'s hidden animal, not the sound of the animal on the card.  Snorta! is a fast-paced, boisterous and hilarious party game that will bring out the animal in you!', '20.00', 19, 7),
(23, 'Beneath Nexus', 'assets/lib/images/nexus.jpg', 'Thousands of Years Ago...  The city of Nexus was built around a well of magical power hidden deep below the earth. The discovery of the Ether Well made Nexus soar to incredible wealth and power. Wandering tribes flocked to the city to worship and learn from the mysterious magic beneath it.  As Nexus grew, more and more power was drawn from the well, and as more power was gained, the more unstable the energies of the well became. After millennia of providing Nexus with knowledge and might, the well gave the city something new...Blight.  The Blight destroyed the city and corrupted its citizens into monsters, friends, and demons. The once great city fell into darkness and was forgotten, its wealth and power remembered only as myths. Now the city is rediscovered, drawing heroes and adventurers from across the world. It is up to you to discover what secrets lie Beneath Nexus.  Beneath Nexus is an asymmetrical dungeon crawling card game for 3 to 6 players. Discover powerful treasure and unlock forgotten secrets in your quest to reclaim the city of Nexus. The Heroes combine their unique skills and powers to overcome the trials of The Blight Lord who uses fiendish monsters and dark magic to destroy all who delve Beneath Nexus.', '50.00', 19, 2),
(24, 'MemoArrr!', 'assets/lib/images/memoar.jpg', 'Make your escape off the island of Captain Goldfish before the lava swallows you up!  Reveal locations that are connected to collect valuable treasures. Watch for animals that will give you special actions to help you. Only through your recollection, plus a little bit of Pirate Luck, will you be able to survive in...MemoArrr!', '14.95', 19, 5),
(25, 'Rising 5: Runes of Asteros', 'assets/lib/images/rising5.jpg', 'A long, long time ago on the far-flung planet of Asteros, an ancient King confined unspeakable monsters behind a Rune Gate and sealed it shut with four divine Runes.  The wizened sage ORAKL petitioned the Council of United Planets for help and four of their top agents - EKHO, HAL, ELI, and NOVA - have been dispatched. Codenamed \"Rising 5\", these heroes are Asteros\' only hope. If they are to save this world they must find the lost runes and seal the Gate once more. But many dangers now lie in wait on this once peaceful planet...  Rising 5 is a cooperative game of deduction and adventure driven by a digital application. Players must find the lost Runes together, before an evil power devours the planet.  Rising 5 plays with an immersive and simple-to-use digital app that can be downloaded for your tablet and smartphones. The App is free and only one device is required to play.', '44.99', 19, 1),
(26, 'Lucidity: Six-Sided Nightmares', 'assets/lib/images/lucidity.jpg', 'Escape from the creatures of the dream realm by claiming their power for yourself. Or become a nightmare and hunt down any who dare stand in your way.  Roll dice and collect dreams to gai n the power you need to escape. Balance the shadowy monsters\' influence or become a twisted Nightmare - attacking your former friends and preventing them from gaining more power than you.  Be the first to escape...or the most powerful Nightmare remaining.', '30.00', 19, 3),
(27, 'Sub Terra', 'assets/lib/images/subterra.jpg', 'Sub Terra is a cooperative survival horror board game. You and up to five friends are cave explorers who have become trapped deep underground. You must quickly explore a tile-based cave system to find the way out before your flashlights die and you\'re lost in the darkness forever.  You\'ll need to work together to overcome deadly subterranean hazards â€“ stick together for safety, or split up to cover more ground. One wrong step could knock you unconscious and your friends will need to stage a rescue. Light and hope are scarce. And worst of all, you don\'t think you\'re alone down here.  Can you survive Sub Terra?', '50.00', 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `itemID` int(11) DEFAULT NULL,
  `quantity` smallint(6) DEFAULT NULL,
  `subtotal` decimal(7,2) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`itemID`, `quantity`, `subtotal`, `orderID`) VALUES
(12, 1, '40.00', 2),
(13, 1, '79.99', 2),
(3, 1, '49.00', 2),
(1, 1, '59.99', 3),
(2, 1, '59.99', 3),
(15, 1, '29.99', 4),
(16, 1, '50.00', 4),
(17, 1, '49.99', 4),
(7, 3, '59.97', 5),
(8, 3, '44.85', 5),
(15, 3, '89.97', 5),
(21, 3, '53.97', 5),
(20, 3, '59.97', 5),
(12, 1, '40.00', 6),
(1, 1, '59.99', 7),
(1, 2, '119.98', 8),
(3, 10, '490.00', 9),
(6, 8, '399.92', 9),
(7, 3, '59.97', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `statusID` int(11) DEFAULT '1',
  `refNo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `addressID`, `orderDate`, `total`, `statusID`, `refNo`) VALUES
(2, 7, 1, '2018-05-15', '168.99', 3, 'Yk6kzoxctS6li'),
(3, 7, 2, '2018-05-15', '119.98', 2, 'QJvhmnLbbheLf'),
(4, 7, 3, '2018-05-15', '129.98', 1, 'mfa4Eq3nkec8q'),
(5, 8, 1, '2018-05-16', '308.73', 1, 'eB5xL51nhVYL6'),
(6, 7, 2, '2018-05-19', '40.00', 1, 'hJHpWzCmqQm2x'),
(7, 7, 3, '2018-05-19', '59.99', 1, '3XmOaQNi2O1Eb'),
(8, 7, 2, '2018-05-19', '119.98', 1, '2qcsIsIqUYm5J'),
(9, 7, 3, '2018-05-19', '889.92', 1, 'iAXQpaKepv8bZ'),
(10, 7, 3, '2018-05-20', '59.97', 1, 'QH1rx4mOk2SMc');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `userID` int(11) DEFAULT NULL,
  `CCnum` int(11) DEFAULT NULL,
  `CCexp` int(11) DEFAULT NULL,
  `CVV` int(11) DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `description`) VALUES
(1, 'processing'),
(2, 'shipped'),
(3, 'complete'),
(4, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `firstName`, `lastName`, `status`) VALUES
(3, 'admin', '19ffd4bb2e32a5ed48df4ea09f09cba2fb1ebd55', 'admin@tcc.com', 'Site', 'Admin', 'active'),
(7, 'bcavas', 'bbb087dfceb633c1c0bf697fc35dd19557108818', 'bcavas@mail.com', 'Benjamin', 'Cavas', 'active'),
(8, 'tuitt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tuitt@mail.com', 'Tuitt', 'Philippines', 'active'),
(9, 'dummy', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dummy@mail.com', 'dummy', 'ako', 'active'),
(12, 'tgaf', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tgaf@mail.com', 'terence', 'gaffud', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `userstate`
--

CREATE TABLE `userstate` (
  `userStateId` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstate`
--

INSERT INTO `userstate` (`userStateId`, `description`) VALUES
(1, 'active'),
(2, 'deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `zip`
--

CREATE TABLE `zip` (
  `zipID` int(11) NOT NULL,
  `zipCode` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zip`
--

INSERT INTO `zip` (`zipID`, `zipCode`, `cityID`) VALUES
(1, 1105, 1),
(2, 1408, 2),
(3, 1100, 1),
(4, 1200, 1),
(5, 1113, 3),
(7, 1114, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `FOREIGN` (`zipID`,`userID`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `FOREIGN` (`categoryID`) USING BTREE;

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD KEY `FOREIGN` (`itemID`,`orderID`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FOREIGN` (`userID`,`addressID`,`statusID`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `FOREIGN` (`userID`,`addressID`) USING BTREE;

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userstate`
--
ALTER TABLE `userstate`
  ADD PRIMARY KEY (`userStateId`);

--
-- Indexes for table `zip`
--
ALTER TABLE `zip`
  ADD PRIMARY KEY (`zipID`),
  ADD KEY `FOREIGN` (`cityID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `zip`
--
ALTER TABLE `zip`
  MODIFY `zipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
