<?php
// establish connection
include('utils/connection.php');

if (isset($_GET['ID'])) {
    $ID = mysqli_real_escape_string($conn, $_GET['ID']);
    $query_book = "SELECT * FROM book WHERE BookID = '$ID'";
    $query_genre = "SELECT Genre FROM rl_book_genre WHERE BookID = '$ID'";
    $query_author = "SELECT Author FROM rl_book_author WHERE BookID = '$ID'";
    $query_borrow = "SELECT DateReturned FROM borrow WHERE BookID = '$ID'";

    $book_result = mysqli_query($conn, $query_book);
    $genre_result = mysqli_query($conn, $query_genre);
    $author_result = mysqli_query($conn, $query_author);
    $borrow_result = mysqli_query($conn, $query_borrow);

    $book_details = mysqli_fetch_assoc($book_result);
    $genres = mysqli_fetch_all($genre_result, MYSQLI_ASSOC);
    $authors = mysqli_fetch_all($author_result, MYSQLI_ASSOC);
    $borrow = mysqli_fetch_all($borrow_result, MYSQLI_ASSOC);

    foreach ($authors as $author) {
        $book_details['Authors'][] = $author['Author'];
    }
    foreach ($genres as $genre) {
        $book_details['Genres'][] = $genre['Genre'];
    }

    if (!$borrow) {
        $available = true;
    } else {
        $temp = array_pop($borrow);
        if ($temp['DateReturned'])
            $available = true;
        else
            $available = false;
    }

    mysqli_free_result($book_result);
    mysqli_free_result($genre_result);
    mysqli_free_result($author_result);
    mysqli_free_result($borrow_result);
}


?>
<?php include('templates/head.php') ?>
<title><?php echo htmlspecialchars($book_details['Title']); ?></title>
<link rel="stylesheet" href="css/bookpage.css">
<?php include('templates/nav.php') ?>

<?php if (isset($_GET['ID'])) : ?>
    <div class="container">
        <div class="sidebarL">
            <div class="pictureBar">
                <img src="img/icons/cover-page.png" alt="Sample volume 3">
                <?php if ($available) : ?>
                    <button class="btn blue">
                        Available in Library
                <?php else : ?>
                    <button class="btn red">
                        Not Available in Library
                <?php endif; ?>
                    </button>
            </div>
            <div class="shareBar">
                <p3>Share this Book:</p3><br>
                <button class="btn blue clickable circle fb"><i class="fa-brands fa-facebook"></i> </button>
                <button class="btn blue clickable circle twitter"><i class="fa-brands fa-twitter"></i></button>
                <button class="btn blue clickable circle telegram"><i class="fa fa-telegram"></i></button>
                <button class="btn blue clickable circle reddit"><i class="fa brands fa-reddit-alien"></i></button>
            </div>
        </div>
        <!------------------------------------MTRIAL---------------------------------------------->
        <div class="mainBar">
            <div class="titleBar">
                <div class="mainTitle">
                    <p10><?php echo $book_details['Title']; ?></p10>
                    <p9>
                        <p9>By</p9>
                        <?php echo htmlspecialchars(implode(', ', $book_details['Authors'])); ?>
                    </p9>
                </div>
                <div class="hyperlinks">
                    <a class="one" href="user-history.php">Borrow history</a>
                    <!---- link for USER HISTORY -->
                    <a class="two" href="dashboard.php?edit-book=<?php echo htmlspecialchars($book_details['BookID']); ?>">Edit</a>
                    <!---- link for DASHBOARD -->
                </div>
            </div>
            <div class="publishBar">
                <p3>Publish Date</p3>
                <p3>Publisher</p3>
                <p3>Language</p3>
                <p3>Pages </p3>
                <p2><?php echo $book_details['PubDate']; ?> </p2>
                <p2><?php echo $book_details['Publisher']; ?> </p2>
                <p2><?php echo $book_details['Language']; ?> </p2>
                <p2><?php echo $book_details['PageCount']; ?> </p2>
            </div>
            <div class="overBar">
                <p3>Overview</p3>
                <p2><?php echo $book_details['Overview']; ?></p2>
            </div>
        </div>
        <!------------------------------------MTRIAL---------------------------------------------->
        <div class="sidebarR">
            <div class="detailBar">
                <h2>Book Details</h2>
            </div>
            <div class="isbnBar">
                <p3>ISBN</p3>
                <p2><?php echo $book_details['ISBN']; ?></p2>
            </div>
            <div class="genreBar">
                <p3>Genre</p3>
                <?php if ($book_details['Genres']) : ?>
                    <?php echo htmlspecialchars(implode(', ', $book_details['Genres'])) ?>

                <?php else : ?>
                    <p3> None</p3>
                <?php endif; ?>

            </div>
            <div class="ratingBar">
                <p3>User Ratings</p3>
                <div class="row">
                    <p2><?php echo $book_details['Rating']; ?></p2>
                </div>
            </div>
        </div>

    </div>
<?php else : ?>
    <!------ DISPALY ERROR PAGE if requested id not found-->
    <p> Error </p>
    <p> Requested page not found </p>
<?php endif; ?>



<script>
    const pageURL = location.href
    const fb = document.querySelector('.fb')
    const twitter = document.querySelector('.twitter')
    const telegram = document.querySelector('.telegram')
    const reddit = document.querySelector('.reddit')

    const twitterApi = `https://twitter.com/intent/tweet?text=${pageURL}`;
    const fbApi = `https://www.facebook.com/sharer/sharer.php?u=${pageURL}`
    console.log(pageURL)
    const telegramApi = `https://t.me/share/url?url=${pageURL}`
    const redditApi = `https://www.reddit.com/submit?url=${pageURL}`

    fb.addEventListener('click', () => {
        window.open(url = fbApi, target = 'blank')
    })

    twitter.addEventListener('click', () => {
        window.open(url = twitterApi, target = 'blank')
    })

    telegram.addEventListener('click', () => {
        window.open(url = telegramApi, target = 'blank')
    })

    reddit.addEventListener('click', () => {
        window.open(url = redditApi, target = 'blank')
    })
</script>

<?php include('templates/footer.php') ?>