<?php 
// establish connection
include('utils/connection.php');

if(isset($_GET['ID'])){
    $ID = mysqli_real_escape_string($conn, $_GET['ID']);
    $sql = "SELECT * FROM book WHERE BookID = '$ID'";
    $sql2 = "SELECT * FROM rl_book_genre WHERE BookID = '$ID'";
    $sql1 = "SELECT * FROM rl_book_author WHERE BookID = '$ID'";
    $sql3 = "SELECT DateReturned FROM borrow WHERE BookID = '$ID'";
    
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $result = mysqli_query($conn, $sql);
    $result3 = mysqli_query($conn, $sql3);

    $topRated = mysqli_fetch_array($result);
    $trial = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $genre2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    $borrow = mysqli_fetch_array($result3,MYSQLI_ASSOC);

    $trees = array_pop($borrow);

    mysqli_free_result($result);
    mysqli_free_result($result1);
    mysqli_free_result($result2);
    mysqli_free_result($result3);

}


?>
<?php include('templates/head.php') ?>
    <title>Book Page</title>
    <link rel="stylesheet" href="css/bookpageTrial.css">
<?php include('templates/nav.php') ?>     

    <?php if(isset($_GET['ID'])): ?>
    <div class="container">     
        <div class="sidebarL"> 
            <div class="pictureBar">
                <img src="img/icons/cover-page.png" alt="Sample volume 3">
                <button class="btn blue clickable">
                    <?php 
                    if($trees == NULL){
                        echo "Unavailable"; 
                    }else{
                        echo "Available in Library";
                    }
                ?>
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
                    <p10><?php echo $topRated['Title'];?></p10>
                    <p9>
                       <p9>By</p9>
                    <?php foreach($trial as $try){ ?>
                    <?php echo htmlspecialchars($try['Author']); ?>
                    <?php }?>
                    </p9>
                </div>
                <div class="hyperlinks">
                    <a class="one" href="https://i.redd.it/29pgg3ifyvp21.png">Borrow history</a><!---- link for USER HISTORY -->
                    <a class="two" href="https://c.tenor.com/qQk6DhSV1qUAAAAd/anime-grand.gif">Edit</a><!---- link for DASHBOARD -->
                </div>
            </div>
            <div class="publishBar">
                <p3>Publish Date</p3>
                <p3>Publisher</p3>
                <p3>Language</p3>
                <p3>Pages </p3>
                <p2><?php echo $topRated['PubDate'];?> </p2>
                <p2><?php echo $topRated['Publisher'];?> </p2>
                <p2><?php echo $topRated['Language'];?> </p2>
                <p2><?php echo $topRated['PageCount'];?> </p2>
            </div>
            <div class="overBar">
                <p3>Overview</p3>
                <p2><?php echo $topRated['Overview'];?></p2>
            </div>
        </div>
<!------------------------------------MTRIAL---------------------------------------------->
        <div class="sidebarR">
            <div class="detailBar">
                <h2>Book Details</h2>
            </div>
            <div class="isbnBar">
                <p3>ISBN</p3>
                <p2><?php echo $topRated['ISBN'];?></p2>
            </div>
            <div class="genreBar">
                <p3>Genre</p3>
                <?php if($genre2): ?>
                <?php foreach($genre2 as $try2){ ?>
                    <p2><?php echo htmlspecialchars($try2['Genre']) ;?></p2>
                <?php }?>

                <?php else: ?>
                    <p3> None</p3>
                    <?php endif; ?>
                
            </div>
            <div class="ratingBar">
                <p3>User Ratings</p3>
                <div class="row">
                <p2><?php echo $topRated['Rating'];?></p2>
                </div>
            </div>
        </div>
        
    </div>  
    <?php else: ?> <!------ DISPALY ERROR PAGE if requested id not found-->
            <p> Error </p>
            <p> Requested page not found </p>
        <?php endif; ?>  

    

    <script>
        const pageURL = location.href
        const fb = document.querySelector('.fb')
        const twitter =  document.querySelector('.twitter')
        const telegram = document.querySelector('.telegram')
        const reddit = document.querySelector('.reddit')

        const twitterApi = `https://twitter.com/intent/tweet?text=${pageURL}`;
        const fbApi = `https://www.facebook.com/sharer/sharer.php?u=${pageURL}`
        console.log(pageURL)
        const telegramApi = `https://t.me/share/url?url=${pageURL}`
        const redditApi = `https://www.reddit.com/submit?url=${pageURL}`

        fb.addEventListener('click', ()=>{
            window.open(url = fbApi, target='blank')
        })

        twitter.addEventListener('click', ()=>{
            window.open(url = twitterApi, target='blank')
        })

        telegram.addEventListener('click', ()=>{
            window.open(url = telegramApi, target='blank')
        })

        reddit.addEventListener('click', ()=>{
            window.open(url = redditApi, target='blank')
        })

        

    
        </script>

<?php include('templates/footer.php') ?>