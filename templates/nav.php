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
        <div class="search">
            <input type="text" placeholder="Search..."> 
            <select id="search-select">
                <option value="books">Books</option>
                <option value="user">User</option>
            </select>
            <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
