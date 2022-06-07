<?php
session_start();

/* determine the sorting order of the books */

if (!isset($_SESSION['browse-book-sort'])) 
    $_SESSION['browse-book-sort'] = 'DateAdded';
if (!isset($_SESSION['browse-book-order'])) 
    $_SESSION['browse-book-order'] = 'ASC';
if (isset($_GET['sort-by'])) {
    if ($_SESSION['browse-book-sort'] == $_GET['sort-by']) {
        if ($_SESSION['browse-book-order'] == 'ASC') {
            $_SESSION['browse-book-order'] = 'DESC';
        } else {
            $_SESSION['browse-book-order'] = 'ASC';
        }
    } else {
        $_SESSION['browse-book-sort'] = $_GET['sort-by'];
    }
    unset($_GET['sort-by']);
}
// validation
if ($_SESSION['browse-book-sort'] != 'DateAdded' && $_SESSION['browse-book-sort'] != 'Rating' && $_SESSION['browse-book-sort'] != 'PubDate' && $_SESSION['browse-book-sort'] != 'Title') {
    unset($_SESSION['browse-book-sort']);
    header("Location: ${_SERVER['PHP_SELF']}");
}

/* end of sorting */

$search_value = '';
$current_page = 1;
$offset = 0;
$books_per_page = 6;

// connect to db
include('utils/connection.php');

// create a new borrow
if (isset($_POST['borrow-book'])) {
    unset($_SESSION['user-id-borrow']);

    $user_id = mysqli_real_escape_string($conn, $_POST['user-id']);
    $book_id = mysqli_real_escape_string($conn, $_POST['borrow-book']);
    $current_date = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime($current_date . ' + 10 days'));
    $staff_id = mysqli_real_escape_string($conn, $_SESSION['staffID']);

    $query = "INSERT INTO borrow (BorrowID, UserID, StaffID, BookID, DateOfBorrow, DueDate) VALUES (NULL, $user_id, $staff_id, $book_id, '$current_date', '$due_date')";
    mysqli_query($conn, $query);

    $_SESSION['just-returned-book'] = $_POST['user-id'];
    header('Location: dashboard.php');
}

/* create filters */

if (isset($_GET['clear-filter'])) {
    unset($_SESSION['filters']);
    unset($_GET['clear-filter']);
}

if (isset($_GET['filter-date'])) {
    if (isset($_SESSION['filters']['PubDate']) && $_GET['filter-date'] == $_SESSION['filters']['PubDate'])
        unset($_SESSION['filters']['PubDate']);
    else
        $_SESSION['filters']['PubDate'] = $_GET['filter-date'];
    
    unset($_GET['filter-date']);
}

if (isset($_GET['filter-genre'])) {
    if (isset($_SESSION['filters']['Genre']) && $_GET['filter-genre'] == $_SESSION['filters']['Genre'])
        unset($_SESSION['filters']['Genre']);
    else
        $_SESSION['filters']['Genre'] = $_GET['filter-genre'];

    unset($_GET['filter-genre']);
}

if (isset($_GET['filter-lang'])) {
    if (isset($_SESSION['filters']['Language']) && $_GET['filter-lang'] == $_SESSION['filters']['Language'])
        unset($_SESSION['filters']['Language']);
    else
        $_SESSION['filters']['Language'] = $_GET['filter-lang'];

    unset($_GET['filter-lang']);
}

if (isset($_SESSION['filters']) && empty($_SESSION['filters']))
    unset($_SESSION['filters']);

$filter = '';
if (isset($_SESSION['filters'])) {

    $glue = '';
    foreach ($_SESSION['filters'] as $key => $value) {
        if ($key == 'Genre')
            continue;
        
        $key = mysqli_real_escape_string($conn, $key);
        $value = mysqli_real_escape_string($conn, $value);

        $filter = $filter."$glue $key='$value'";
        $glue = ' AND';
    }
}

// filters to display
$query = 'SELECT DISTINCT PubDate FROM book';
$result = mysqli_query($conn, $query);
$pub_dates = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$query = 'SELECT DISTINCT Genre FROM rl_book_genre';
$result = mysqli_query($conn, $query);
$genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$query = 'SELECT DISTINCT Language FROM book';
$result = mysqli_query($conn, $query);
$languages = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

foreach ($pub_dates as $pub_date)
    $filter_array['Release date'][] = $pub_date['PubDate'];
foreach ($genres as $genre)
    $filter_array['Genre'][] = $genre['Genre'];
foreach ($languages as $language)
    $filter_array['Language'][] = $language['Language'];

// sort the filters
rsort($filter_array['Release date']);
sort($filter_array['Genre']);
sort($filter_array['Language']);

/* end of creating filters */

$search_entry = "";
if (isset($_GET['book-search-btn'])) {
    $search_entry = mysqli_real_escape_string($conn, $_GET['book-search']);
    $search_value = htmlspecialchars($_GET['book-search']);
}
if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
    $search_entry = mysqli_real_escape_string($conn, $_GET['book-search']);
    $search_value = htmlspecialchars($_GET['book-search']);
}

$offset = $offset + ($current_page - 1) * $books_per_page;

// query from db
$query = "SELECT BookID, Title, Overview, PubDate FROM book";
if ($search_entry) {
    $query = $query . " WHERE Title LIKE '%$search_entry%'";
    if (isset($_SESSION['filters']['PubDate']) || isset($_SESSION['filters']['Language']))
        $query = $query . " AND";
} elseif (isset($_SESSION['filters']['PubDate']) || isset($_SESSION['filters']['Language'])) {
    $query = $query . " WHERE";
}
$query = $query . $filter;
$sort = mysqli_real_escape_string($conn, $_SESSION['browse-book-sort']);
$order = mysqli_real_escape_string($conn, $_SESSION['browse-book-order']);
$query = $query . " ORDER BY $sort $order";
$result = mysqli_query($conn, $query);

// storing to variable
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$num_of_results = count($books);

// further filter the returned results
$query = $query . " LIMIT $books_per_page OFFSET $offset";
$result = mysqli_query($conn, $query);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

// include authors to $books array
foreach ($books as $key => &$book) {
    $bookID = $book['BookID'];

    // filter out if not of the filtered genre
    if (isset($_SESSION['filters']['Genre'])) {
        $genre = mysqli_real_escape_string($conn, $_SESSION['filters']['Genre']);
        $query = "SELECT Genre FROM rl_book_genre WHERE BookID=$bookID AND Genre='$genre'";
        $result = mysqli_query($conn, $query);
        $exists = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        if (empty($exists)) {
            unset($books[$key]);
            $num_of_results -= 1;
            continue;
        }
    }

    $query = "SELECT Author FROM rl_book_author WHERE BookID=$bookID";
    $result = mysqli_query($conn, $query);
    $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    foreach ($authors as $author) {
        $book['Authors'][] = $author['Author'];
    }

    // include availability
    $query = "SELECT DateReturned FROM borrow WHERE BookID=$bookID";
    $result = mysqli_query($conn, $query);
    $returnDates = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    if (!$returnDates) {
        $book['Availability'] = 'Available';
    } else {
        $date = array_pop($returnDates);
        if ($date['DateReturned']) {
            $book['Availability'] = 'Available';
        } else {
            $book['Availability'] = 'Not Available';
        }
    }
}

unset($book);

$max_page = ceil($num_of_results / $books_per_page);
$max_page = $max_page ? $max_page : 1;

mysqli_close($conn);
// end of retrieving data from server, all needed data stored in $books array

// store the get variables
$get = htmlspecialchars(http_build_query($_GET));
?>

<?php include('templates/head.php') ?>
<title>Browse Books</title>
<link rel="stylesheet" href="css/browse-books-style.css">
<?php include('templates/nav.php') ?>

<div class="main-content">
    <!-- Main page content -->
    <form class="search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <input type="text" size=30 placeholder="Search..." name="book-search" value="<?php echo $search_value; ?>">
        <button class="blue" name="book-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>


    <form class="browse-nav" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <p><b><?php echo $num_of_results ?> results | </b>page <?php echo $current_page ?> of <?php echo $max_page ?></p>
        <input type="hidden" name="book-search" value="<?php echo $search_value; ?>">
        <button class="btn clickable" name="page" value="<?php echo $current_page - 1; ?>" <?php echo $current_page <= 1 ? 'disabled' : ''; ?>>Prev</button>
        <button class="btn clickable" name="page" value="<?php echo $current_page + 1; ?>" <?php echo $current_page >= $max_page ? 'disabled' : ''; ?>>Next</button>
    </form>

    <div class="sort-filter">
        <div class="sort drop-menu-click">
            <input type="checkbox" id="sort">
            <label for="sort" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Sort</label>
            <ul>
                <li><a href="browse-books.php?sort-by=DateAdded&<?php echo $get; ?>" <?php if ($_SESSION['browse-book-sort'] == 'DateAdded') echo "class='active'"; ?>>Date Added</a></li>
                <li><a href="browse-books.php?sort-by=Rating&<?php echo $get; ?>" <?php if ($_SESSION['browse-book-sort'] == 'Rating') echo "class='active'"; ?>>Popularity</a></li>
                <li><a href="browse-books.php?sort-by=PubDate&<?php echo $get; ?>" <?php if ($_SESSION['browse-book-sort'] == 'PubDate') echo "class='active'"; ?>>Release Date</a></li>
                <li><a href="browse-books.php?sort-by=Title&<?php echo $get; ?>" <?php if ($_SESSION['browse-book-sort'] == 'Title') echo "class='active'"; ?>>Title</a></li>
            </ul>
        </div>
        <div class="filter drop-menu-click">
            <input type="checkbox" id="filter">
            <label for="filter" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Filter</label>
            <ul>
                <?php if (isset($_SESSION['filters'])): ?>
                    <li><a href="browse-books.php?clear-filter=&<?php echo $get; ?>">Remove Filters</a></li>
                <?php endif; ?>
                <li>
                    <div class="drop-menu-click">
                        <input type="checkbox" id="release-date">
                        <label for="release-date" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Release date</label>
                        <ul>
                            <?php foreach ($filter_array['Release date'] as $release_date){
                                $active = '';
                                if (isset($_SESSION['filters']['PubDate']) && $_SESSION['filters']['PubDate'] == $release_date) {
                                    $active = " class = 'active'";
                                }
                                $release_date = htmlspecialchars($release_date);
                                echo "<li><a href='browse-books.php?filter-date=$release_date&$get'$active>$release_date</a></li>";
                            } ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="drop-menu-click">
                        <input type="checkbox" id="genre">
                        <label for="genre" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Genre</label>
                        <ul>
                            <?php foreach ($filter_array['Genre'] as $genre){
                                $active = '';
                                if (isset($_SESSION['filters']['Genre']) && $_SESSION['filters']['Genre'] == $genre) {
                                    $active = " class = 'active'";
                                }
                                $genre = htmlspecialchars($genre);
                                echo "<li><a href='browse-books.php?filter-genre=$genre&$get'$active>$genre</a></li>";
                            } ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="drop-menu-click">
                        <input type="checkbox" id="language">
                        <label for="language" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Language</label>
                        <ul>
                            <?php foreach ($filter_array['Language'] as $language){
                                $active = '';
                                if (isset($_SESSION['filters']['Language']) && $_SESSION['filters']['Language'] == $language) {
                                    $active = " class = 'active'";
                                }
                                $language = htmlspecialchars($language);
                                echo "<li><a href='browse-books.php?filter-lang=$language&$get'$active>$language</a></li>";
                            } ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="catalog">
        <?php foreach ($books as $book) : ?>
            <div class="catalog-item">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <a href="bookpage.php?ID=<?php echo htmlspecialchars($book['BookID']); ?>">
                        <h3><?php echo htmlspecialchars($book['Title']); ?></h3>
                    </a>
                    <h5>by <?php echo implode(', ', $book['Authors']) ?> (<?php echo htmlspecialchars($book['PubDate']); ?>)</h5>
                    <p>
                        <?php echo htmlspecialchars($book['Overview']); ?>
                    </p>
                    <?php if ($book['Availability'] == 'Not Available') : ?>
                        <button class="btn red" disabled>
                    <?php elseif (isset($_SESSION['user-id-borrow'])) : ?>
                        <input type="hidden" name="user-id" value="<?php echo htmlspecialchars($_SESSION['user-id-borrow']) ?>">
                        <button class="btn blue clickable" name="borrow-book" value="<?php echo htmlspecialchars($book['BookID']) ?>">
                    <?php else : ?>
                        <button class="btn blue" disabled>
                    <?php endif; ?>
                        <?php echo htmlspecialchars($book['Availability']); ?>
                        </button>
                </form>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
        <?php endforeach ?>
        <?php if (!$books) : ?>
            <div class="catalog-item">
                <h1>No results.</h1>
            </div>
        <?php endif ?>
    </div>

</div>


<?php include('templates/footer.php') ?>