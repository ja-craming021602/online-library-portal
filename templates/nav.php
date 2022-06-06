<?php
    if (isset($_POST['nav-search-btn'])) {
        $search = $_POST['search'];
        if ($_POST['search-select'] == 'books') {
            header("Location: browse-books.php?book-search=$search&book-search-btn=");
        } else {
            header("Location: user-history.php?user-id=$search&search-user=");
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
            <li><a href="browse-books.php"><button class="btn blue clickable">Browse</button></a></li>
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
