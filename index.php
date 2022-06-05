<?php
    include('utils/index-data.php');
    include('utils/login.php');
    include('templates/head.php');
?>
    <title>Homepage</title>
    <link rel="stylesheet" href="css/homepage.css">
<?php include('templates/nav.php') ?>

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
                        include("templates/logged-out.php");
                    }
                    else {
                        include("templates/logged-in.php");
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
    

<?php include('templates/footer.php') ?>