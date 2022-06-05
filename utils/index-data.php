<?php
    include('connection.php');
    
    $db = $conn;

    // top rated books
    $topRatedsql = 'SELECT Title, Rating FROM book ORDER BY Rating DESC LIMIT 5';
    $topRatedResult = mysqli_query($db, $topRatedsql);
    $topRated = mysqli_fetch_all($topRatedResult, MYSQLI_ASSOC);

    // recently added books
    $recentBooksql = 'SELECT Title, PubDate, Overview, BookID FROM book ORDER BY DateAdded DESC LIMIT 5';
    $recentBookResult = mysqli_query($db, $recentBooksql);
    $recentBook = mysqli_fetch_all($recentBookResult, MYSQLI_ASSOC);
    // author/s of recently added books
    $recentAuthorsql = 'SELECT Author, BookID FROM rl_book_author';
    $recentAuthorResult = mysqli_query($db, $recentAuthorsql);
    $recentAuthor = mysqli_fetch_all($recentAuthorResult, MYSQLI_ASSOC);
?>
