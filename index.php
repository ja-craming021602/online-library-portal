<?php
    include('index-data.php');
    include('login.php');
?>
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
<body>
    <div class="nav">
        <!-- Navigation bar -->
        <ul>
            <li><a href="index.html"><button class="btn blue clickable"><i class="fa-solid fa-book-open"></i></button></a></li>
            <li><a href="help-support.html"><button class="btn blue clickable">Help & Support</button></a></li>
            <li class="drop-menu blue">
                <a href="browse-books.html">Browse</a><i class="fa-solid fa-angle-down"></i>
                <ul>
                    <li><a href="bookpage.html">[Temporary] Book page</a></li>
                    <li><a href="user-history.html">[Temporary] User History</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </li>
        </ul>
        <div class="search">
            <input type="text" placeholder="Search..."> 
            <select id="search-select">
                <option value="books">Books</option>
                <option value="user">User</option>
            </select>
            <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <div class="main-content">
        <!-- Main page content -->
        <div class="recently-added">
            <!-- Recently Added -->
            <p1>Recently Added</p1>
            <div class="recent-list">
            <?php foreach ($recentBook as $recentB){
                        $recentTitle = $recentB['Title'];
                        $recentPubDate = $recentB['PubDate'];
                        $recentOverview = $recentB['Overview'];
                        $recentID = $recentB['BookID']?>
                        <div class="book">
                        <img src="img/icons/cover-page.png" alt="book icon" class="book-img">
                        <div class="book-text">
                        <p2><?php echo $recentTitle; ?></p2>
                        <p> by
                            <?php
                            $glue = '';
                            foreach ($recentAuthor as $recentA){
                                if ($recentB['BookID'] == $recentA['BookID']){
                                    echo $glue . $recentA['Author'];
                                    $glue = ', ';
                                }
                            }?>
                            (<?php echo $recentPubDate; ?>) </p>
                        <p>
                            <?php echo $recentOverview; ?>
                        </p>
                    </div>
                </div>
                    <?php
                    }?>
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
                <?php
                    if (!isset($_SESSION["staffID"])) {
                        include("login/logged-out.php");
                    }
                    else {
                        include("login/logged-in.php");
                    }
                ?>      
            </div>
            <div class="top-rated">
                <!-- Top Rated Books -->
                <p1>Top Rated Books</p1><br>
                <div class="top-rated-list">
                    <?php foreach ($topRated as $top){
                        $topTitle = $top['Title']; ?>
                        <div class="top-book">
                        <img src="img/icons/cover-page.png" alt="book icon" width="140px" height="190px">
                        <p> <?php echo $topTitle; ?> </p>
                        </div>
                    <?php
                    }?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <!-- Footer -->
        <div>
            <button class="btn blue circle"><i class="fa-solid fa-phone"></i></button>
            <h3>1245-222</h3>
        </div>
        <div>
            <button class="btn blue circle"><i class="fa-solid fa-location-dot"></i></button>
            <h3>Philippines</h3>
        </div>
        <div>
            <button class="btn blue circle"><i class="fa-solid fa-envelope"></i></button>
            <h3>xyz@email.com</h3>
        </div>
        <a href="index.html"><button class="btn blue clickable"><i class="fa-solid fa-book-open"></i></button></a>
    </div>
</body>
</html>
