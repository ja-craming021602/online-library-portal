-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 02:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinelibraryportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(10) NOT NULL,
  `Title` varchar(300) DEFAULT NULL,
  `PubDate` year(4) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Language` varchar(5) DEFAULT NULL,
  `PageCount` int(10) DEFAULT NULL,
  `ISBN` varchar(15) DEFAULT NULL,
  `Overview` text DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `Title`, `PubDate`, `Publisher`, `Language`, `PageCount`, `ISBN`, `Overview`, `Rating`, `DateAdded`) VALUES
(1, 'My Beloved World', 2013, 'Alfred A. Knopf', 'eng', 432, '9781080286058', 'Born in 1954, Sotomayor grew up in an impoverished, close-knit Puerto Rican community in the South Bronx. Her mother was often absent, working long hours as a nurse; her father was an alcoholic. When she was diagnosed with diabetes at the age of seven, Sotomayor learned to give herself daily insulin shots, taking on the responsibility that both her parents found difficult.  Sotomayor escaped the tensions at home at her grandmother’s among a loving extended family and discovered the pleasures and rewards of education at the strict Catholic schools she attended.  A top-notch student, she went to Princeton, and on to Yale Law School.  As a young lawyer, she worked at the New York City District Attorney’s office and moved on to private practice at a prestigious law firm; at the age of 38, she was appointed to the Federal District Court. \r\n\r\nFrom intimate snapshots of her childhood to nuanced reflections on affirmative action, the legal profession, and the strengths and shortcomings of American society today, My Beloved World shines with the intelligence, enthusiasm, good humor, and compassion Sotomayor has brought to every step of her extraordinary journey.', 4.03, '2022-04-01 21:55:02'),
(2, 'Straight Man', 1997, 'Knopf Doubleday Publishing Group', 'eng', 416, '9780375701900', 'William Henry Devereaux, Jr., known to his friends as Hank, is a fast-talking, self-deprecating man, the classic wise guy.  Now approaching fifty, Hank finds himself heading full-speed into a midlife crisis: he despises his job as English professor at an undistinguished middle-American university, and his status as a \"novelist\" who has not written any fiction for twenty years.  He fears he may have prostate cancer, he suspects his wife of having an affair, and he avoids even thinking about the fact that his father, the elder statesman of American literary criticism with whom he has much unresolved business, will soon be reentering his orbit.  Over the course of a single convoluted week, the hapless Hank goes through a painful series of adventures, some hilarious and some harrowing, which eventually take him to the brink of sanity.  As he did in Nobody’s Fool, Russo proves himself a master of depicting the fraught, unvoiced currents that run between parents and children, husbands and wives.  In his intelligence, humor, and ability to merge sorrow and farce into a seamless fabric, Richard Russo stands out as a writer of surpassing insight and humanity.', 4.02, '2022-04-02 21:55:02'),
(3, 'Christine', 1983, 'Gallery Books ', 'fre', 656, '9781501144189', 'Christine is a horror novel by American writer Stephen King, published in 1983. It tells the story of a car (a 1958 Plymouth Fury) apparently possessed by malevolent supernatural forces.', 3.72, '2022-04-03 21:55:02'),
(4, 'Innocent Traitor', 2006, 'Penguin Random House', 'eng', 320, '9780091796679', 'A fiction about a woman of Tudor England, Lady Jane Grey, a girl of royal blood who was used by greedy and unscrupulous men to satisfy their own ambitions. Having been the victim of abuse in childhood, she was sold into an unhappy marriage and forced to accept a crown she did not want, then tragically paid the price of her so-called treason.', 3.94, '2022-05-30 15:57:46'),
(5, 'The Marvels', 2015, 'Scholastic Press', 'eng', 672, '9780545448680', 'A breathtaking new voyage from Caldecott Medalist Brian Selznick.Two stand-alone stories--the first in nearly 400 pages of continuous pictures, the second in prose--create a beguiling narrative puzzle.The journey begins at sea in 1766, with a boy named Billy Marvel. After surviving a shipwreck, he finds work in a London theatre. There, his family flourishes for generations as brilliant actors until 1900, when young Leontes Marvel is banished from the stage.Nearly a century later, runaway Joseph Jervis seeks refuge with an uncle in London. Albert Nightingale\'s strange, beautiful house, with its mysterious portraits and ghostly presences, captivates Joseph and leads him on a search for clues about the house, his family, and the past.A gripping adventure and an intriguing invitation to decipher how the two stories connect, The Marvels is a loving tribute to the power of story from an artist at the vanguard of creative innovation.', 3.93, '2022-05-30 16:20:19'),
(6, 'The Lost Years of Merlin', 1996, 'Philomel', 'eng', 326, '9780399230189', 'When Merlin, suffering from a case of severe amnesia, discovers his strange powers, he becomes determined to discover his identity and flees to Fincayra where he fulfills his destiny, saving Fincayra from certain destruction and claiming his birthright and true name.', 3.97, '2022-05-30 16:25:32'),
(7, 'Black Swan Green', 2006, 'Random House', 'eng', 294, '9780340822791', 'Black Swan Green tracks a single year in what is, for thirteen-year-old Jason Taylor, the sleepiest village in muddiest Worcestershire in a dying Cold War England, 1982. But the thirteen chapters, each a short story in its own right, create an exquisitely observed world that is anything but sleepy. A world of Kissingeresque realpolitik enacted in boys’ games on a frozen lake; of “nightcreeping” through the summer backyards of strangers; of the tabloid-fueled thrills of the Falklands War and its human toll; of the cruel, luscious Dawn Madden and her power-hungry boyfriend, Ross Wilcox; of a certain Madame Eva van Outryve de Crommelynck, an elderly bohemian emigré who is both more and less than she appears; of Jason’s search to replace his dead grandfather’s irreplaceable smashed watch before the crime is discovered; of first cigarettes, first kisses, first Duran Duran LPs, and first deaths; of Margaret Thatcher’s recession; of Gypsies camping in the woods and the hysteria they inspire; and, even closer to home, of a slow-motion divorce in four seasons.', 3.97, '2022-05-30 16:30:45'),
(8, 'The Thief Lord', 2000, 'Scholastic', 'eng', 345, '9780439404372', 'An exciting, magical adventure set among the crumbling canals and ancient ruins of Venice, Italy.\r\n\r\nProsper and Bo are orphans on the run from their cruel aunt and uncle. The brothers decide to hide out in Venice, where they meet a mysterious character who calls himself the \"Thief Lord.\" Brilliant and charismatic, the Thief Lord leads a ring of street children who dabble in petty crimes. Prosper and Bo relish being part of this colorful new family. But the Thief Lord has secrets of his own. And soon the boys are thrust into circumstances that will lead them, and readers, to a fantastic, spellbinding conclusion.', 3.95, '2022-05-30 16:36:09'),
(9, 'Without Fail', 2013, 'Berkley', 'eng', 416, '9780425264423', 'Skilled, cautious, and anonymous, Jack Reacher is perfect for the job: to assassinate the vice president of the United States. Theoretically, of course. A female Secret Service agent wants Reacher to find the holes in her system, and fast—because a covert group already has the vice president in their sights. They’ve planned well. There’s just one thing they didn’t plan on: Reacher.', 4.16, '2022-05-30 16:41:35'),
(10, 'He\'s Just Not That Into You: The No-Excuses Truth to Understanding Guys', 2006, 'Gallery Books', 'eng', 304, '9781416947400', 'He\'s Just Not That Into You based on a popular episode of Sex and the City educates otherwise smart women on how to tell when a guy just doesn\'t like them enough, so they can stop wasting time making excuses for a dead-end relationship. This book knows you\'re a beautiful, smart, funny woman who deserves better.', 3.65, '2022-05-30 16:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `BorrowID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `StaffID` int(10) NOT NULL,
  `BookID` int(10) NOT NULL,
  `DateOfBorrow` date DEFAULT NULL,
  `DateReturned` date DEFAULT NULL,
  `DueDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`BorrowID`, `UserID`, `StaffID`, `BookID`, `DateOfBorrow`, `DateReturned`, `DueDate`) VALUES
(1, 1, 1, 1, '2022-05-10', '2022-05-20', '2022-05-20'),
(2, 2, 2, 2, '2022-05-11', '2022-05-13', '2022-05-21'),
(3, 3, 3, 3, '2022-05-12', '2022-05-20', '2022-05-22'),
(4, 4, 1, 3, '2022-05-13', NULL, '2022-05-23'),
(5, 5, 1, 1, '2022-05-23', NULL, '2022-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_db`
--

CREATE TABLE `feedback_db` (
  `feedback_ID` int(15) NOT NULL,
  `feedback_type` varchar(15) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `firstname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `freq_ask_questions`
--

CREATE TABLE `freq_ask_questions` (
  `QuestionID` int(1) NOT NULL,
  `Question` text NOT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freq_ask_questions`
--

INSERT INTO `freq_ask_questions` (`QuestionID`, `Question`, `Answer`) VALUES
(1, 'What exactly can the librarian help me with?', 'Librarians will help you to find materials on our shelves. It also helps to find information online in the databases and can advise you about the relevance of the material that you may need from the library.\r\n\r\n'),
(2, 'How are the books organized in the library?', 'Books are organized by a number code of the book, which tells the location of the book on the shelf. The book is arranged alphabetically with corresponding subjects.\r\n\r\n'),
(3, '3Do all books can be available in electronic versions?', 'Not all books have a print copy of the purchase. Please see the librarian regarding the book information.'),
(4, 'What are the library hours?', 'The library was only open from 8:00 AM to 9:00 PM on weekdays while 10:00 PM to 5:00 during weekends '),
(5, 'Why I am getting no data regarding the user information?', 'The user that you want to look for was not registered in the library database. Please see the in-charge librarian for more detailed information.'),
(6, 'Where do I check books out?', 'Books may be checkout, however, not all books can be. Please see the in-charge librarian for more details even if the book was already checked out.'),
(7, 'How does the library notify me when I have an overdue book?', 'When an item is overdue, you will be notified with a paper notice in your email. Keep in mind that most items can be renewed. However,  all items often cannot be renewed and must be returned on time');

-- --------------------------------------------------------

--
-- Table structure for table `rl_book_author`
--

CREATE TABLE `rl_book_author` (
  `BookID` int(10) NOT NULL,
  `Author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rl_book_author`
--

INSERT INTO `rl_book_author` (`BookID`, `Author`) VALUES
(1, 'Sonia Sotomayor'),
(2, 'Richard Russo'),
(3, 'Marie Milpois'),
(3, 'Stephen King'),
(4, 'Alison Weir'),
(5, 'Brian Selznick'),
(6, 'T.A. Barron'),
(7, 'David Mitchell'),
(8, 'Cornelia Funke'),
(9, 'Dick Hill'),
(9, 'Lee Child'),
(10, 'Greg Behrendt'),
(10, 'Liz Tuccillo');

-- --------------------------------------------------------

--
-- Table structure for table `rl_book_genre`
--

CREATE TABLE `rl_book_genre` (
  `BookID` int(10) NOT NULL,
  `Genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rl_book_genre`
--

INSERT INTO `rl_book_genre` (`BookID`, `Genre`) VALUES
(1, 'Biography'),
(1, 'Memoir'),
(2, 'Fiction'),
(3, 'Fiction'),
(3, 'Horror'),
(4, 'Historical Novel'),
(5, 'Adventure Fiction'),
(5, 'Historical Fiction'),
(6, 'Fantasy'),
(7, 'Semi-autobiographical'),
(8, 'Children\'s Literature'),
(8, 'Fantasy'),
(8, 'Fiction'),
(8, 'Novel'),
(9, 'Detective'),
(9, 'Fiction'),
(9, 'Mystery'),
(9, 'Novel'),
(9, 'Suspense'),
(9, 'Thriller'),
(10, 'Self-improvement');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(10) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `FirstName`, `MiddleName`, `LastName`, `Password`) VALUES
(1, 'Anna', 'Familar', 'Campion', 'acampion'),
(2, 'Bianca', 'Guerra', 'Ledesma', '52390'),
(3, 'Chico', 'Hilario', 'Mackay', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `Address`) VALUES
(1, 'Japh', 'Suelo ', 'Atimosa ', 'Obrero, Davao City'),
(2, 'Trishia ', 'Santos', 'DelaCruz ', 'Panacan, Davao City'),
(3, 'Irene', 'Poncio', 'Gonzales ', 'Matina, Davao City '),
(4, 'Rod', 'Nuezca', 'Dimagiba', 'San Pedro, Davao City '),
(5, 'Miguel', 'Cordova ', 'Fuentes', 'Maa, Davao City ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`BorrowID`),
  ADD KEY `fk_borrow_BookID` (`BookID`),
  ADD KEY `fk_borrow_StaffID` (`StaffID`),
  ADD KEY `fk_borrow_UserID` (`UserID`);

--
-- Indexes for table `feedback_db`
--
ALTER TABLE `feedback_db`
  ADD PRIMARY KEY (`feedback_ID`);

--
-- Indexes for table `freq_ask_questions`
--
ALTER TABLE `freq_ask_questions`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `rl_book_author`
--
ALTER TABLE `rl_book_author`
  ADD PRIMARY KEY (`BookID`,`Author`);

--
-- Indexes for table `rl_book_genre`
--
ALTER TABLE `rl_book_genre`
  ADD PRIMARY KEY (`BookID`,`Genre`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `BorrowID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback_db`
--
ALTER TABLE `feedback_db`
  MODIFY `feedback_ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freq_ask_questions`
--
ALTER TABLE `freq_ask_questions`
  MODIFY `QuestionID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `fk_borrow_BookID` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`),
  ADD CONSTRAINT `fk_borrow_StaffID` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `fk_borrow_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `rl_book_author`
--
ALTER TABLE `rl_book_author`
  ADD CONSTRAINT `fk_rl_book_author_BookID` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`);

--
-- Constraints for table `rl_book_genre`
--
ALTER TABLE `rl_book_genre`
  ADD CONSTRAINT `fk_rl_book_genre_BookID` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
