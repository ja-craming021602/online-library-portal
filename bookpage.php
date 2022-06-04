<?php include('templates/head.php') ?>
    <title>Book Page</title>
    <link rel="stylesheet" href="css/bookpage.css">
<?php include('templates/nav.php') ?>           

    <div class="container"> 
        <div class="sidebarL"> 
            <div class="pictureBar">
                <img src="img/icons/cover-page.png" alt="Sample volume 3">
                <button class="btn blue clickable">Available in Library</button>
                </div>
            <div class="shareBar">
                <p3>Share this Book:</p3><br>
                <button class="btn blue clickable circle"><i class="fa-brands fa-facebook"></i> </button>
                <button class="btn blue clickable circle"><i class="fa-brands fa-twitter"></i></button>
                <button class="btn blue clickable circle"><i class="fa-solid fa-envelope"></i></button>
                <button class="btn blue clickable circle"><i class="fa-brands fa-tiktok"></i></button>
            </div>
        </div>

        <div class="mainBar">
            <div class="titleBar">
                <div class="mainTitle">
                    <h1>Book Title</h1>
                    <h2>By Author</h2>
                </div>
                <div class="hyperlinks">
                    <a class="one" href="https://i.redd.it/29pgg3ifyvp21.png">Borrow history</a>
                    <a class="two" href="https://c.tenor.com/qQk6DhSV1qUAAAAd/anime-grand.gif">Edit</a>
                </div>
            </div>
            <div class="publishBar">
                <p3>Publish Date</p3>
                <p3>Publisher</p3>
                <p3>Language</p3>
                <p3>Pages </p3>
                <p2>YYYY-MM-DD </p2>
                <p2>Publishing Company </p2>
                <p2>English </p2>
                <p2>1234 </p2>
            </div>
            <div class="overBar">
                <p3>Overview</p3>
                <p2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Curabitur sit amet enim urna. Ut ac eros at tortor eleifend
                    cursus et in mauris. Sed nec venenatis purus, et lobortis 
                    nisi. Proin gravida imperdiet volutpat. Pellentesque quis 
                    tellus ullamcorper, posuere ante eu, vestibulum nibh. Class 
                    aptent taciti sociosqu ad litora torquent per conubia nostra, 
                    per inceptos himenaeos. In dictum sodales dui ut fermentum. Curabitur 
                    at turpis laoreet, tempus turpis sit amet, pharetra lectus.
                    Fusce imperdiet mauris et faucibus gravida. Aliquam quis enim 
                    tincidunt leo faucibus porta in vitae lorem. Sed cursus posuere 
                    maximus. Pellentesque sollicitudin nibh id orci rhoncus, a fringilla 
                    ex egestas. Vivamus faucibus sollicitudin tellus at suscipit. 
                    Praesent at orci lacus. Nullam ut metus enim. Vestibulum lobortis 
                    tincidunt ullamcorper. Pellentesque feugiat, libero vitae semper 
                    eleifend, lorem massa pretium elit, id aliquet metus ipsum sed urna. 
                    Aliquam erat volutpat. In gravida, quam eu consequat mollis, nisi 
                    lacus rhoncus urna, eget sagittis nibh nisl nec nunc. Fusce 
                    ullamcorper, erat eu mollis porttitor, justo neque aliquet magna, a 
                    lobortis erat justo non urna.Morbi et augue convallis, semper enim ac, 
                    ullamcorper nulla. Aliquam congue erat sed nibh molestie, ut 
                    ultricies justo mollis. Nullam quis velit sit amet justo aliquam 
                    tincidunt egestas et mi. Nullam eget maximus magna, eu faucibus massa. 
                    Aliquam erat volutpat. Integer a ornare lacus. Quisque volutpat lacus 
                    leo, eu venenatis justo elementum sit amet. Aliquam nec elit sit amet 
                    erat pharetra laoreet tempor non turpis. Donec lacinia neque ut nulla 
                    malesuada dapibus. Mauris non quam metus. Phasellus mattis efficitur 
                    vestibulum. Etiam id tempor arcu, sit amet mollis libero.</p2>
            </div>
        </div>

        <div class="sidebarR">
            <div class="detailBar">
                <p3>Book Details</p3>
            </div>
            <div class="isbnBar">
                <p3>ISBN</p3>
                <p2>12345678999</p2>
                <p2>12345678999</p2>
            </div>
            <div class="genreBar">
                <p3>Genre</p3>
                <p2>Action</p2>
                <p2>Comedy</p2>
                <p2>Romance</p2>
            </div>
            <div class="ratingBar">
                <p3>User Ratings</p3>
                <div class="row">
                    <div class="side"> <p2>5 stars</p2>
                    <div class="middle"> 
                        <div class="bar-container">
                            <div class="bar-5"></div>
                        </div>
                    </div>
                    </div>
                    <div class="side"> <p2>4 stars</p2>
                    <div class="middle">
                        <div class="bar-container">
                          <div class="bar-4"></div>
                        </div>
                      </div>
                    </div>
                    <div class="side"> <p2>3 stars</p2>
                    <div class="middle">
                        <div class="bar-container">
                          <div class="bar-3"></div>
                        </div>
                      </div>
                    </div>
                    <div class="side"> <p2>2 stars</p2>
                    <div class="middle">
                        <div class="bar-container">
                          <div class="bar-2"></div>
                        </div>
                      </div>
                    </div>
                    <div class="side"> <p2>1 star</p2>
                    <div class="middle">
                        <div class="bar-container">
                          <div class="bar-1"></div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        

<?php include('templates/footer.php') ?>