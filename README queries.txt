Queries

6.1 Staff Login

SELECT `staff`.`StaffID`, `staff`.`Password`
FROM `staff`;

6.2 Book search

SELECT `book`.*, `borrow`.`DateReturned`, `rl_book_author`.`Author`, `rl_book_genre`.`Genre`
FROM `book` 
	LEFT JOIN `borrow` ON `borrow`.`BookID` = `book`.`BookID` 
	LEFT JOIN `rl_book_author` ON `rl_book_author`.`BookID` = `book`.`BookID` 
	LEFT JOIN `rl_book_genre` ON `rl_book_genre`.`BookID` = `book`.`BookID`;

6.3 Recently added

SELECT `book`.`BookID`, `book`.`DateAdded`
FROM `book`;

6.4 Top rated books

SELECT `book`.`BookID`, `book`.`Rating`
FROM `book`;

6.5 Browse Books

SELECT `rl_book_genre`.*
FROM `rl_book_genre`;

6.6 Library database management

SELECT `book`.*, `rl_book_author`.`Author`, `rl_book_genre`.`Genre`
FROM `book` 
	LEFT JOIN `rl_book_author` ON `rl_book_author`.`BookID` = `book`.`BookID` 
	LEFT JOIN `rl_book_genre` ON `rl_book_genre`.`BookID` = `book`.`BookID`;

	6.6.1 Add new Book
	
	INSERT INTO `book` (`BookID`, `Title`, `PubDate`, `Publisher`, `Language`, `PageCount`, `ISBN`, `Overview`, `Rating`, `DateAdded`) VALUES (NULL, 'Title', '0000', 'Publisher', 'eng', '0', '0000000000000', 'Overview', '0.00', '0000-00-00 00:00:00');
	
	SET @last_id_in_book = LAST_INSERT_ID();
	
	INSERT INTO `rl_book_author` (`BookID`, `Author`) VALUES (@last_id_in_book, 'AuthorName'), (@last_id_in_book, 'AuthorName2');
	
	INSERT INTO `rl_book_genre` (`BookID`, `Genre`) VALUES (@last_id_in_book, 'Genre1'), (@last_id_in_book, 'Genre2');
	
	6.6.2 Remove Book
	
	DELETE FROM `rl_book_genre` WHERE `rl_book_genre`.`BookID` = 1;
	DELETE FROM `rl_book_author` WHERE `rl_book_author`.`BookID` = 1;
	DELETE FROM `` WHERE `book`.`BookID` = 1;
	
	6.6.3 Edit Books details
	
	UPDATE `book` SET `Column1` = 'Update1', `Column2` = 'Update2' WHERE `book`.`BookID` = 1;
	
	/* below is for updating authors and genres */
	
	/* for editing an existing entry */
	UPDATE `rl_book_author` SET `Author` = 'NewName' WHERE `rl_book_author`.`BookID` = 1 AND `rl_book_author`.`Author` = 'OldName';
	
	UPDATE `rl_book_genre` SET `Genre` = 'NewGenre' WHERE `rl_book_genre`.`BookID` = 1 AND `rl_book_genre`.`Genre` = 'OldGenre'
	
	/* for adding new entry, refer to 6.6.1 */
	/* for removing entry, refer to 6.6.2, just add an "AND `tablename`.`columnname` = 'entryToRemove' */

6.7 User records management

	6.7.1 Add new user
	
	INSERT INTO `user` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `Address`) VALUES (NULL, 'fName', 'mName', 'lName', 'address');
	
	6.7.2 Existing user
	
	SELECT `user`.`UserID`, `user`.`FirstName`, `user`.`MiddleName`, `user`.`LastName`, `borrow`.`BorrowID`, `borrow`.`DateOfBorrow`, `borrow`.`DateReturned`, `borrow`.`DueDate`, `borrow`.`BookID`
FROM `user` 
	LEFT JOIN `borrow` ON `borrow`.`UserID` = `user`.`UserID`;
	
	6.7.3 New Borrow
	
	INSERT INTO `borrow` (`BorrowID`, `UserID`, `StaffID`, `BookID`, `DateOfBorrow`, `DateReturned`, `DueDate`) VALUES (NULL, '1', '1', '1', '0000-00-00', NULL, '0000-00-00');

6.8 Get and Save FAQs

6.9 User track record

SELECT `user`.*, `borrow`.*
FROM `user` 
	LEFT JOIN `borrow` ON `borrow`.`UserID` = `user`.`UserID`;

6.10 Book Details

SELECT `book`.*, `rl_book_author`.`Author`, `rl_book_genre`.`Genre`
FROM `book` 
	LEFT JOIN `rl_book_author` ON `rl_book_author`.`BookID` = `book`.`BookID` 
	LEFT JOIN `rl_book_genre` ON `rl_book_genre`.`BookID` = `book`.`BookID`;