<?php

include('utils/connection.php');
session_start();
unset($_SESSION['user-id-borrow']);

//checks for staff login session
include('utils/session.php');

// if clicked on [New Borrow]
if (isset($_POST['new-borrow'])) {
    $_SESSION['user-id-borrow'] = $_POST['new-borrow'];
    header('Location: browse-books.php');
} elseif (isset($_SESSION['just-returned-book'])) {
    $_POST['user-search'] = true;
    $_POST['search-item'] = $_SESSION['just-returned-book'];
    unset($_SESSION['just-returned-book']);
}

// elseif (isset($_SESSION['just-searched-book'])) {
//     $book_to_search = $_SESSION['just-searched-book'];
//     $filter = " WHERE Title LIKE '%".mysqli_real_escape_string($conn,  $book_to_search)."%'";
//     unset($_SESSION['just-searched-book']);
// }

/* Actions based on clicked button */

// if clicked on search book
if (isset($_POST['search-book'])) {
    $book_to_search = $_POST['search-item'];
    $filter = " WHERE Title LIKE '%" . mysqli_real_escape_string($conn, $book_to_search) . "%'";

    // $_SESSION['just-searched-book'] = $book_to_search;
}

// if clicked on a book to edit
elseif (isset($_POST['book-to-edit'])) {
    $book_id = mysqli_real_escape_string($conn, $_POST['book-to-edit']);
    $query = "SELECT * FROM book WHERE BookID=$book_id";
    $result = mysqli_query($conn, $query);
    $book_to_edit = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $query = "SELECT Author FROM rl_book_author WHERE BookID=$book_id";
    $result = mysqli_query($conn, $query);
    $authors_to_edit = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT Genre FROM rl_book_genre WHERE BookID=$book_id";
    $result = mysqli_query($conn, $query);
    $genres_to_edit = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    foreach ($authors_to_edit as &$author) {
        $author = $author['Author'];
    }
    unset($author);
    foreach ($genres_to_edit as &$genre) {
        $genre = $genre['Genre'];
    }
    unset($genre);
}

// if clicked [Add New Book]
elseif (isset($_POST['add-new-book'])) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO book (BookID, Title, DateAdded) VALUES (NULL, '<<Newly Added Book>>' , '$date')";
    mysqli_query($conn, $query);
}

// if clicked [Remove]
elseif (isset($_POST['remove-book'])) {
    $book_id = mysqli_real_escape_string($conn, $_POST['BookID']);
    $query = "DELETE FROM rl_book_author WHERE BookID = $book_id";
    mysqli_query($conn, $query);
    $query = "DELETE FROM rl_book_genre WHERE BookID = $book_id";
    mysqli_query($conn, $query);
    $query = "DELETE FROM book WHERE BookID = $book_id";
    mysqli_query($conn, $query);
}

// if clicked [Save Changes]
elseif (isset($_POST['edit-book'])) {
    foreach ($_POST as $key => $value) {
        $input_array[$key] = $value;
    }
    array_pop($input_array); // remove $_POST['edit-book']

    // validations (all fields may be empty)
    // title can be any
    // author and genre can be any (separated by comma)
    // pubYear must be a positive integer maxing at 2100 
    if ($input_array['PubDate'] != '' &&  (!ctype_digit($input_array['PubDate']) || (int)$input_array['PubDate'] < 1 || (int)$input_array['PubDate'] > 2100))
        $input_err['PubDate'] = 'Publish Year must be a positive integer with range [1, 2100].';
    // publisher and language can be any
    // pages must be a positive integer
    if ($input_array['PageCount'] != '' &&  !ctype_digit($input_array['PageCount']))
        $input_err['PageCount'] = 'Page count must be a positive integer.';
    // ISBN must be 10-13 digit integer
    if ($input_array['ISBN'] != '' &&  (!ctype_digit($input_array['ISBN']) || (int)$input_array['ISBN'] < 1000000000 || (int)$input_array['ISBN'] > 9999999999999))
        $input_err['ISBN'] = 'ISBN must be a 10-13 digit integer.';
    // Rating must be a floating point value from 0-5
    if ($input_array['Rating'] != '' &&  (!is_numeric($input_array['Rating']) || (float)$input_array['Rating'] < 0.0 || (float)$input_array['Rating'] > 5.0))
        $input_err['Rating'] = 'Rating must be a float with range [0.0, 5.0]';

    // check for errors
    if (isset($input_err)) {
        echo '<script>alert("Error:\n';
        foreach ($input_err as $err)
            echo $err . '\n';
        echo '")</script>';
    } else {

        // make inputs safe for entering to the database
        foreach ($input_array as &$input) {
            $input = mysqli_real_escape_string($conn, $input);
            if ($input == '')
                $input = 'NULL';
            else
                $input = "'$input'";
        }
        unset($input);

        $query = "UPDATE book SET Title=${input_array['Title']}, PubDate=${input_array['PubDate']}, Publisher=${input_array['Publisher']}, Language=${input_array['Language']}, PageCount=${input_array['PageCount']}, ISBN=${input_array['ISBN']}, Rating=${input_array['Rating']}, Overview=${input_array['Overview']} WHERE BookID=${input_array['BookID']}";
        mysqli_query($conn, $query);

        $query = "DELETE FROM rl_book_author WHERE BookID = ${input_array['BookID']}";
        mysqli_query($conn, $query);
        if ($input_array['Author'] != 'NULL') {
            $authors = explode(',', substr($input_array['Author'], 1, -1));
            foreach ($authors as $author) {
                $query = "INSERT INTO rl_book_author (BookID, Author) VALUES (${input_array['BookID']}, '$author')";
                mysqli_query($conn, $query);
            }
        }


        $query = "DELETE FROM rl_book_genre WHERE BookID = ${input_array['BookID']}";
        mysqli_query($conn, $query);
        if ($input_array['Genre'] != 'NULL') {
            $genres = explode(',', substr($input_array['Genre'], 1, -1));
            foreach ($genres as $genre) {
                $query = "INSERT INTO rl_book_genre (BookID, Genre) VALUES (${input_array['BookID']}, '$genre')";
                mysqli_query($conn, $query);
            }
        }
    }
}

// if clicked on [Register User]
elseif (isset($_POST['add-user'])) {
    $last_name = mysqli_real_escape_string($conn, $_POST['LastName']);
    $first_name = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['MiddleName']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);

    if ($middle_name == '')
        $middle_name = 'NULL';
    else
        $middle_name = "'$middle_name'";

    $query = "INSERT INTO user (UserID, FirstName, MiddleName, LastName, Address) VALUES (NULL, '$first_name', $middle_name, '$last_name', '$address')";
    mysqli_query($conn, $query);

    $result = mysqli_query($conn, 'SELECT LAST_INSERT_ID()');
    $user_id = mysqli_fetch_assoc($result)['LAST_INSERT_ID()'];
    mysqli_free_result($result);

    echo "<script>alert('Added User: $user_id - $first_name $last_name')</script>";
}

// if clicked on search user
elseif (isset($_POST['user-search'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['search-item']);

    // validate
    if (!ctype_digit($user_id) || (int)$user_id < 1) {
        echo "<script>alert('Invalid user ID! Must be a positive integer.')</script>";
        unset($_POST['user-search']);
    } else {
        $query = "SELECT BorrowID, UserID, BookID, DateOfBorrow, DateReturned, DueDate FROM borrow WHERE UserID=$user_id";
        $result = mysqli_query($conn, $query);
        $borrow_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        // retrieving user's name
        $query = "SELECT FirstName, MiddleName, LastName FROM user WHERE UserID=$user_id";
        $result = mysqli_query($conn, $query);
        $user_name = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        if ($user_name != NULL) {

            // retrieving book titles
            foreach ($borrow_array as &$borrow) {
                $query = "SELECT Title FROM book WHERE BookID=${borrow['BookID']}";
                $result = mysqli_query($conn, $query);
                $book_title = mysqli_fetch_assoc($result);
                mysqli_free_result($result);
                $borrow['Title'] = $book_title['Title'];
            }
            unset($borrow);
        } else {
            echo "<script>alert('User not found.')</script>";
            unset($_POST['user-search']);
        }
    }
}

// if clicked return book
elseif (isset($_POST['return-book'])) {
    $date = mysqli_real_escape_string($conn, date('Y-m-d'));
    $borrow_id = mysqli_real_escape_string($conn, $_POST['return-book']);
    $query = "UPDATE borrow SET DateReturned='$date' WHERE BorrowID=$borrow_id";
    mysqli_query($conn, $query);

    $_SESSION['just-returned-book'] = $_POST['user-id'];
    header("Location: ${_SERVER['PHP_SELF']}");
}

/* Actions done everytime the page is loaded */

// query all books to display in Lib Database Management tab
$query = 'SELECT BookID, Title FROM book';
if (isset($filter)) {
    $query = $query . $filter;
}
$query = $query . ' ORDER BY DateAdded DESC';
$result = mysqli_query($conn, $query);
$book_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

// fetch book authors & genre
foreach ($book_list as &$book) {
    $book_id = $book['BookID'];
    $query = "SELECT Author FROM rl_book_author WHERE BookID=$book_id";
    $result = mysqli_query($conn, $query);
    $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT Genre FROM rl_book_genre WHERE BookID=$book_id";
    $result = mysqli_query($conn, $query);
    $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    foreach ($authors as $author) {
        $book['Authors'][] = $author['Author'];
    }

    foreach ($genres as $genre) {
        $book['Genres'][] = $genre['Genre'];
    }
}
unset($book);

mysqli_close($conn);
?>

<?php include('templates/head.php') ?>
<title>Dashboard</title>
<link rel="stylesheet" href="css/dashboard.css">
<?php include('templates/nav.php') ?>
<div class="main-content">
    <!-- Main page content -->

    <div class="lib-management card">
        <h1>Library Database Management</h1>
        <div class="inner-card">

            <form class="search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="text" placeholder="Search Database" name="search-item">
                <button class="blue" name="search-book"><i class="fa-solid fa-magnifying-glass"></i></button>
                <?php if (isset($filter)) : ?>
                    <p>Results for: <?php echo htmlspecialchars($book_to_search); ?></p>
                <?php endif; ?>
            </form>

            <div class="div1" style="<?php echo !isset($_POST['book-to-edit']) ? 'max-width: 100%; width: 100%;' : ''; ?>">
                <div class="db list">

                    <?php foreach ($book_list as $book) : ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <button class="book" name="book-to-edit" value="<?php echo htmlspecialchars($book['BookID']); ?>">
                                <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                                <p>
                                    <?php echo htmlspecialchars($book['Title'] ?? ''); ?><br>
                                    Author: <?php echo htmlspecialchars(implode(',', $book['Authors'] ?? [])); ?><br>
                                    Genre: <?php echo htmlspecialchars(implode(',', $book['Genres'] ?? [])); ?><br>
                                </p>
                            </button>
                        </form>

                    <?php endforeach; ?>

                </div>

                <form class="center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"><button class="btn blue clickable" name="add-new-book">Add New Book</button></form>
            </div>

            <?php if (isset($_POST['book-to-edit'])) : ?>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="div1 dark-form">
                    <?php
                    echo '<h4>' . htmlspecialchars("Editing BookID: ${book_to_edit['BookID']} - ${book_to_edit['Title']}") . '</h4>';
                    ?>
                    <input type="hidden" name="BookID" value="<?php echo htmlspecialchars($book_to_edit['BookID']); ?>">
                    <input type="text" placeholder="Book Title" name="Title" value="<?php echo htmlspecialchars($book_to_edit['Title']); ?>">
                    <input type="text" placeholder="Author" name="Author" value="<?php echo htmlspecialchars(implode(',', $authors_to_edit)); ?>">
                    <input type="text" placeholder="Genre" name="Genre" value="<?php echo htmlspecialchars(implode(',', $genres_to_edit)); ?>">
                    <input type="text" placeholder="Publish Year" name="PubDate" value="<?php echo htmlspecialchars($book_to_edit['PubDate']); ?>">
                    <input type="text" placeholder="Publisher" name="Publisher" value="<?php echo htmlspecialchars($book_to_edit['Publisher']); ?>">
                    <input type="text" placeholder="Language" name="Language" value="<?php echo htmlspecialchars($book_to_edit['Language']); ?>">
                    <input type="text" placeholder="Pages" name="PageCount" value="<?php echo htmlspecialchars($book_to_edit['PageCount']); ?>">
                    <input type="text" placeholder="ISBN" name="ISBN" value="<?php echo htmlspecialchars($book_to_edit['ISBN']); ?>">
                    <input type="text" placeholder="Rating" name="Rating" value="<?php echo htmlspecialchars($book_to_edit['Rating']); ?>">
                    <textarea placeholder="Overview:" rows="5" name="Overview"><?php echo htmlspecialchars($book_to_edit['Overview']); ?></textarea>
                    <div class="center">
                        <button class="btn red clickable" name="remove-book">Remove</button>
                        <button class="btn blue clickable" name="edit-book">Save changes</button>
                    </div>
                </form>

            <?php endif; ?>

        </div>
    </div>
    <div class="user-management card">
        <h1>User Records Management</h1>

        <div class="inner-card user-reg">
            <h3>For New Users</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" placeholder="Last Name" name="LastName" required>
                <input type="text" placeholder="First Name" name="FirstName" required>
                <input type="text" placeholder="M.I." name="MiddleName">
                <input type="text" placeholder="Address" name="Address" required>
                <div class="right">
                    <button class="btn blue clickable" name="add-user">Register User</button>
                </div>
            </form>
        </div>

        <div class="inner-card">
            <h3>For Existing Users</h3>
            <form class="search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="text" placeholder="Search Database" name="search-item">
                <button class="blue" name="user-search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <?php if (isset($_POST['user-search'])) : ?>

                <h4>User: <?php echo htmlspecialchars($_POST['search-item']) . " - ${user_name['FirstName']} ${user_name['LastName']}"; ?></h4>

                <div class="borrow list">

                    <?php foreach ($borrow_array as $borrow) : ?>

                        <form class="book" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <input type="hidden" name="user-id" value="<?php echo htmlspecialchars($borrow['UserID']); ?>">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                <?php echo htmlspecialchars($borrow['Title']); ?><br>
                                Borrowed:<br>
                                <?php echo htmlspecialchars($borrow['DateOfBorrow']); ?><br>
                                <?php if (isset($borrow['DateReturned'])) : ?>
                                    Returned:<br>
                                    <?php echo htmlspecialchars($borrow['DateReturned']); ?><br>
                                <?php else : ?>
                                    <button class="btn red clickable" name="return-book" value="<?php echo htmlspecialchars($borrow['BorrowID']); ?>">Due: <?php echo htmlspecialchars($borrow['DueDate']); ?></button>
                                <?php endif; ?>
                            </p>
                        </form>

                    <?php endforeach; ?>

                </div>

                <form class="right" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <button class="btn blue clickable" name="new-borrow" value="<?php echo htmlspecialchars($_POST['search-item']) ?>">New Borrow</button>
                </form>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>