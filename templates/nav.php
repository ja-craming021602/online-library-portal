<?php
    if (isset($_POST['nav-search-btn'])) {
        if ($_POST['search-select'] == 'books') {
            $search = $_POST['search'];
            header("Location: browse-books.php?book-search=$search&book-search-btn=");
        }
    }
?>

</head>
<body>
    <div class="nav">
        <!-- Navigation bar -->
        <ul>
            <li><a href="index.php"><button class="btn blue clickable"><i class="fa-solid fa-book-open"></i></button></a></li>
            <li><a href="help-support.php"><button class="btn blue clickable">Help & Support</button></a></li>
            <li class="drop-menu blue">
                <a href="browse-books.php">Browse</a><i class="fa-solid fa-angle-down"></i>
                <ul>
                    <li><a href="bookpage.php">[Temporary] Book page</a></li>
                    <li><a href="user-history.php">[Temporary] User History</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </li>
        </ul>
        <form class="search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" placeholder="Search..." name="search"> 
            <select id="search-select" name="search-select">
                <option value="books">Books</option>
                <option value="user">User</option>
            </select>
            <button class="blue" name="nav-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
