<?php
include('utils/connection.php');

if (isset($_GET['search-user'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user-id']);

    // validate
    if (!ctype_digit($user_id) || (int)$user_id < 1) {
        echo "<script>alert('Invalid user ID! Must be a positive integer.')</script>";
        unset($_GET['search-user']);
    } else {
        $query = "SELECT BookID, DateOfBorrow, DateReturned, DueDate FROM borrow WHERE UserID=$user_id";
        $result = mysqli_query($conn, $query);
        $borrow_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        // retrieving user's name
        $query = "SELECT FirstName, LastName FROM user WHERE UserID=$user_id";
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

            // retrieving book authors
            foreach ($borrow_array as &$borrow) {
                $query = "SELECT Author FROM rl_book_author WHERE BookID=${borrow['BookID']}";
                $result = mysqli_query($conn, $query);
                $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);

                foreach ($authors as $author) {
                    $borrow['Authors'][] = $author['Author'];
                }
            }
            unset($borrow);
        } else {
            echo "<script>alert('User not found.')</script>";
            unset($_GET['search-user']);
        }
    }
}

mysqli_close($conn);
?>

<?php include('templates/head.php') ?>
<title>User History</title>
<link rel="stylesheet" href="css/user-history.css">
<?php include('templates/nav.php') ?>


  <div class="main-content">
        <!-- Main page content -->
       
    <div class = "user-info">

<div class="main-content">
    <!-- Main page content -->


    <div class="user-area">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="card user-search">
            <h3>Enter User ID</h3>
            <input type="text" placeholder="User ID" name="user-id">
            <div><button class="btn black clickable" name="search-user">Submit</i></button></div>
        </form>

        <?php if (isset($_GET['search-user'])) : ?>

            <div class="card">
                <p class="inner-bubble center-text">
                    <i class="fa-solid fa-triangle-exclamation"></i>User Information Found!
                </p>
                <div class="user-info">
                    <b>Last Name </b>
                    <p class="inner-bubble"><?php echo htmlspecialchars($user_name['LastName']); ?></p>
                    <b>First Name</b>
                    <p class="inner-bubble"><?php echo htmlspecialchars($user_name['FirstName']); ?></p>
                    <b>User ID </b>
                    <p class="inner-bubble"><?php echo htmlspecialchars($user_id); ?></p>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <?php if (isset($_GET['search-user'])) : ?>

        <div class="borrow-area card">
            <div class="center">
                <h2><i class="fa-solid fa-box-archive"></i> User Track Record</h2>
            </div>
            <div class="center">
                <h3><?php echo htmlspecialchars(count($borrow_array)) . ' Result';
                    if (count($borrow_array) > 1) echo 's'; ?></h3>
            </div>

            <div class="inner-bubble hidden-column-label">
                <div class="label">Title</div>
                <div class="label">Author</div>
                <div class="label">Date Borrowed</div>
                <div class="label">Date Returned</div>
            </div>

            <div class="borrow-list">

                <?php foreach ($borrow_array as $borrow) : ?>

                    <div class="inner-bubble">
                        <div class="hidden-label">Title: </div>
                        <div class="label"><?php echo htmlspecialchars($borrow['Title']); ?></div>
                        <div class="hidden-label">Author: </div>
                        <div class="label"><?php echo htmlspecialchars(implode(', ', $borrow['Authors'])); ?></div>
                        <div class="hidden-label">Borrowed: </div>
                        <div class="label"><?php echo htmlspecialchars($borrow['DateOfBorrow']); ?></div>
                        <div class="hidden-label">Returned: </div>

                        <?php if (isset($borrow['DateReturned'])) : ?>

                            <div class="label"><?php echo htmlspecialchars($borrow['DateReturned']); ?></div>

                        <?php else : ?>

                            <div class="label"><button class="btn red">Due: <?php echo htmlspecialchars($borrow['DueDate']); ?></button></div>

                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    <?php endif; ?>

</div>




</div><!-- end of main content -->



<?php include('templates/footer.php') ?>