<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>

    <!-- Custom fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <!-- Custom icons -->
    <script src="https://kit.fontawesome.com/32577d814c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/browse-books-style.css">
</head>
<?php include('templates/nav.php') ?>

    <div class="main-content">
        <!-- Main page content -->
        <div class="search">
            <input type="text" size=30 placeholder="Search..."> 
            <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>


        <div class="browse-nav">
            <p><b>1234 results | </b>page 3 of 10</p>
            <button class="btn clickable">Prev</button>
            <button class="btn clickable">Next</button>
        </div>

        <div class="sort-filter">
            <div class="sort drop-menu-click">
                <input type="checkbox" id="sort">
                <label for="sort" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Sort</label>
                <ul>
                    <li><a href="#">Name</a></li>
                    <li><a href="#">Author</a></li>
                    <li><a href="#">Publisher</a></li>
                    <li><a href="#">Release Date</a></li>
                    <li><a href="#">Popularity</a></li>
                </ul>
            </div>
            <div class="filter drop-menu-click">
                <input type="checkbox" id="filter">
                <label for="filter" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Filter</label>
                <ul>
                    <li>
                        <div class="drop-menu-click">
                            <input type="checkbox" id="release-date">
                            <label for="release-date" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Release date</label>
                            <ul>
                                <li><a href="#">Recent</a></li>
                                <li><a href="#">Past Year</a></li>
                                <li><a href="#">Previous Releases</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="drop-menu-click">
                            <input type="checkbox" id="genre">
                            <label for="genre" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Genre</label>
                            <ul>
                                <li><a href="#">Nonfiction</a></li>
                                <li><a href="#">Fiction</a></li>
                                <li><a href="#">Science</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Romance</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="drop-menu-click">
                            <input type="checkbox" id="language">
                            <label for="language" class="unselectable"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-down"></i>Language</label>
                            <ul>
                                <li><a href="#">English</a></li>
                                <li><a href="#">Filipino</a></li>
                                <li><a href="#">Cebuano</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="catalog">
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn blue">Available</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn gray">Not in library</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn blue">Available</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn gray">Not in library</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn gray">Not in library</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn blue">Available</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn blue">Available</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn blue">Available</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
            <div class="catalog-item">
                <div>
                    <h3>Book title</h3>
                    <h5>by Author name (year)</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>
                    <button class="btn gray">Not in library</button>
                </div>
                <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
            </div>
        </div>

    </div>
    

<?php include('templates/footer.php') ?>
</html>