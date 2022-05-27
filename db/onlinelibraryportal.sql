-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 03:56 PM
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
(3, 'Christine', 1983, 'Gallery Books ', 'fre', 656, '9781501144189', 'Christine is a horror novel by American writer Stephen King, published in 1983. It tells the story of a car (a 1958 Plymouth Fury) apparently possessed by malevolent supernatural forces.', 3.72, '2022-04-03 21:55:02');

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
(4, 4, 4, 3, '2022-05-13', NULL, '2022-05-23'),
(5, 5, 5, 1, '2022-05-23', NULL, '2022-06-02');

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
(3, 'Stephen King');

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
(3, 'Horror');

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
(3, 'Chico', 'Hilario', 'Mackay', 'password123'),
(4, 'Dea', 'Intong', 'Nobre', 'dea!2'),
(5, 'Enzo', 'Jaralba', 'Osnan', 'p@s5w0rD');

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
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `BorrowID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
