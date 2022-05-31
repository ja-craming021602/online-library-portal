<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- Custom fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <!-- Custom icons -->
    <script src="https://kit.fontawesome.com/32577d814c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/homepage.css">
</head>

<?php include('templates/nav.php') ?>

    <div class="main-content">
        <!-- Main page content -->
        <div class="recently-added">
            <!-- Recently Added -->
            <p1>Recently Added</p1>
            <div class="recent-list">
                <div class="book">
                    <img src="img/icons/cover-page.png" alt="book icon" class="book-img">
                    <div class="book-text">
                        <p2>Book title</p2>
                        <p>by Author name (year)</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur...
                        </p>
                    </div>
                </div>
                <div class="book">
                    <img src="img/icons/cover-page.png" alt="book icon" class="book-img">
                    <div class="book-text">
                        <p2>Book title</p2>
                        <p>by Author name (year)</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur...
                        </p>
                    </div>
                </div>
                <div class="book">
                    <img src="img/icons/cover-page.png" alt="book icon" class="book-img">
                    <div class="book-text">
                        <p2>Book title</p2>
                        <p>by Author name (year)</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur...
                        </p>
                    </div>
                </div>
                <div class="book">
                    <img src="img/icons/cover-page.png" alt="book icon" class="book-img">
                    <div class="book-text">
                        <p2>Book title</p2>
                        <p>by Author name (year)</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur...
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-side">
            <div class="top">
                <div class="intro">
                    <!-- Website Intro -->
                    <p1 class="intro-title">Website Introduction</p1>
                    <p2 align="justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a dui mi. Nullam turpis nibh, eleifend sed auctor sit amet, cursus ac risus. Sed ultricies ligula elit, eu lacinia tortor aliquet id. Mauris id ullamcorper urna. Duis mollis a ante ut pulvinar. Mauris mollis nulla risus. Phasellus tempus faucibus fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vivamus eleifend ligula vel viverra ullamcorper. Nullam id ex quam. Sed id risus eu lorem congue...
                    </p2>
                </div>
                <div class="login">
                    <!-- Staff Login -->
                    <p1>Staff Login</p1>
                    <div class="input">
                        <input type="text" placeholder="Staff ID"><br><br>
                        <input type="password" placeholder="Password"><br><br>
                        <a href="dashboard.php"><button type="submit" class="btn blue clickable">Login</button></a>
                    </div>
            </div>
            </div>
            <div class="top-rated">
                <!-- Top Rated Books -->
                <p1>Top Rated Books</p1><br>
                <div class="top-rated-list">
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                    <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p>Book title</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php include('templates/footer.php') ?>
</html>
