<?php include('templates/head.php') ?>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
<?php include('templates/nav.php') ?>
    <div class="main-content">
        <!-- Main page content -->

        <div class="lib-management card">
            <h1>Library Database Management</h1>
            <div class="inner-card">
                
                <div class="search">
                    <input type="text" placeholder="Search Database"> 
                    <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <p>Results for: lorem ipsum</p>
                </div>
                
                <div class="div1">
                    <div class="db list">
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book ABook ABook ABook ABook ABook ABook ABook A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                        <div class="book">
                            <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                            <p>
                                Book A<br>
                                Author: Author<br>
                                Genre: A, B<br>
                            </p>
                        </div>
                    </div>

                    <form class="center"><button class="btn blue clickable">Add New Book</button></form>
                </div>

                <form action="" class="div1">
                    <input type="text" placeholder="Book Name" >
                    <input type="text" placeholder="Author">
                    <input type="text" placeholder="Genre">
                    <input type="text" placeholder="Publish Date">
                    <input type="text" placeholder="Publisher">
                    <input type="text" placeholder="Language">
                    <input type="text" placeholder="Pages">
                    <input type="text" placeholder="ISBN">
                    <input type="text" placeholder="Rating">
                    <textarea placeholder="Overview:" rows="5"></textarea>
                    <div class="center">
                        <button class="btn red clickable">Remove</button>
                        <button class="btn blue clickable">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="user-management card">
            <h1>User Records Management</h1>

            <div class="inner-card user-reg">
                <h3>For New Users</h3>
                <form action="">
                    <input type="text" placeholder="Last Name">
                    <input type="text" placeholder="First Name">
                    <input type="text" placeholder="M.I.">
                    <input type="text" placeholder="Address">
                    <div class="right"><button class="btn blue clickable">Register User</button></div>
                </form>
            </div>

            <div class="inner-card">
                <h3>For Existing Users</h3>
                <div class="search">
                    <input type="text" placeholder="Search Database"> 
                    <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <h4>User: 1 - Juan Dela Cruz</h4>

                <div class="borrow list">
                    <div class="book">
                        <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                        <p>
                            Book ABook ABook ABook ABook ABook ABook ABook A<br>
                            Borrowed:<br>
                            03/20/2022<br>
                            Returned:<br>
                            03/27/2022<br>
                        </p>
                    </div>
                    <div class="book">
                        <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                        <p>
                            Book ABook ABook ABook ABook ABook ABook ABook A<br>
                            Borrowed:<br>
                            03/20/2022<br>
                            <button class="btn red clickable">Return</button>
                        </p>
                    </div>
                    <div class="book">
                        <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                        <p>
                            Book ABook ABook ABook ABook ABook ABook ABook A<br>
                            Borrowed:<br>
                            03/20/2022<br>
                            Returned:<br>
                            03/27/2022<br>
                        </p>
                    </div>
                    <div class="book">
                        <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                        <p>
                            Book ABook ABook ABook ABook ABook ABook ABook A<br>
                            Borrowed:<br>
                            03/20/2022<br>
                            <button class="btn red clickable">Return</button>
                        </p>
                    </div>
                    <div class="book">
                        <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                        <p>
                            Book ABook ABook ABook ABook ABook ABook ABook A<br>
                            Borrowed:<br>
                            03/20/2022<br>
                            Returned:<br>
                            03/27/2022<br>
                        </p>
                    </div>
                    <div class="book">
                        <img src="img/icons/cover-page.png" alt="cover page" width="75px" height="100px">
                        <p>
                            Book ABook ABook ABook ABook ABook ABook ABook A<br>
                            Borrowed:<br>
                            03/20/2022<br>
                            <button class="btn red clickable">Return</button>
                        </p>
                    </div>
                </div>
                <form class="right"><button class="btn blue clickable">New Borrow</button></form>
            </div>
        </div>
    </div>

<?php include('templates/footer.php') ?>