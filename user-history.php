<?php include('templates/head.php') ?>
<title>User History</title>
<link rel="stylesheet" href="css/user-history.css">
<?php include('templates/nav.php') ?>


<div class="main-content">
    <!-- Main page content -->

    <div class="user-area">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="card user-search">
            <h3>Enter User ID</h3>
            <input type="text" placeholder="User ID" name="user-id">
            <div><button class="btn black clickable" name="search-user">Submit</i></button></div>
        </form>
        <div class="card">
            <p class="inner-bubble center-text">
                <i class="fa-solid fa-triangle-exclamation"></i>User Information Found!
            </p>
            <div class="user-info">
                <b>Last Name </b> <p class="inner-bubble">DELA CRUZ</p>
                <b>First Name</b> <p class="inner-bubble">JUAN</p>
                <b>User ID   </b> <p class="inner-bubble">3</p>
            </div>
        </div>
    </div>
    <div class="borrow-area card">
        <div class="center"><h2><i class="fa-solid fa-box-archive"></i> User Track Record</h2></div>
        <div class="center"><h3>10 Results</h3></div>

        <div class="inner-bubble hidden-column-label">
            <div class="label">Title</div>
            <div class="label">Author</div>
            <div class="label">Date Borrowed</div>
            <div class="label">Date Returned</div>
        </div>

        <div class="borrow-list">
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz asdjalskdjklsadjaskldjaklsjdsklaj</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="hidden-label">Returned: </div>
                <div class="label">12/12/2123</div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="hidden-label">Returned: </div>
                <div class="label">12/12/2123</div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="hidden-label">Returned: </div>
                <div class="label">12/12/2123</div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="hidden-label">Returned: </div>
                <div class="label">12/12/2123</div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="hidden-label">Returned: </div>
                <div class="label">12/12/2123</div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="hidden-label">Returned: </div>
                <div class="label">12/12/2123</div>
            </div>
            <div class="inner-bubble">
                <div class="hidden-label">Title: </div>
                <div class="label">This is a title</div>
                <div class="hidden-label">Author: </div>
                <div class="label">J Riz</div>
                <div class="hidden-label">Borrowed: </div>
                <div class="label">12/12/1221</div>
                <div class="label"><button class="btn red">Due: 10/22/1010</button></div>
            </div>
        </div>
    </div>

</div>





<?php include('templates/footer.php') ?>