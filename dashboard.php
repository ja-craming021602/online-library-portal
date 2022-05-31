<?php include('templates/head.php') ?>
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
<?php include('templates/nav.php') ?>

    <div class="container">
        <div class="c1">
            <p1>Library Database Management</p1>
            <div class="containerData">
                <div class="searchRow">
                    <div class="search select">
                        <input type="text" placeholder="Search..." style="width:150%"> 
                        <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                </div>
                <div class="resultRow">
                    <div class="bookResult">
                        <p>Results for: Loren ipsum</p>
                        <div class="trial">
                        <div class="bookSec">
                            <div class="pic">
                                <img src="img/icons/cover-page.png" alt="book" >
                                <div class="desc">
                                    <p>Book A</p>
                                    <p>Author: Author guy</p>
                                    <p>Genre: A, b, c</p>
                                </div>
                            </div>
                            <div class="pic">
                                <img src="img/icons/cover-page.png" alt="book" >
                                <div class="desc">
                                    <p>Book A</p>
                                    <p>Author: Author guy</p>
                                    <p>Genre: A, b, c</p>
                                </div>
                            </div>
                            <div class="pic">
                                <img src="img/icons/cover-page.png" alt="book" >
                                <div class="desc">
                                    <p>Book A</p>
                                    <p>Author: Author guy</p>
                                    <p>Genre: A, b, c</p>
                                </div>
                            </div>   
                            <div class="pic">
                                <img src="img/icons/cover-page.png" alt="book" >
                                <div class="desc">
                                    <p>Book A</p>
                                    <p>Author: Author guy</p>
                                    <p>Genre: A, b, c</p>
                                </div>
                            </div>    
                            <div class="pic">
                                <img src="img/icons/cover-page.png" alt="book" >
                                <div class="desc">
                                    <p>Book A</p>
                                    <p>Author: Author guy</p>
                                    <p>Genre: A, b, c</p>
                                </div>
                            </div>  
                            <div class="pic">
                                <img src="img/icons/cover-page.png" alt="book" >
                                <div class="desc">
                                    <p>Book A</p>
                                    <p>Author: Author guy</p>
                                    <p>Genre: A, b, c</p>
                                </div>
                            </div>                   
                        </div> 
                        <div class="buttom">
                            <button class="btn blue clickable">Add New Book</button>
                        </div>
                    </div> 
                    </div>                   
                    <div class="formSection">
                        <div class="form1">
                            <form>
                                <div class="alignF"><input type="text" placeholder="Book Name" ></div>
                                <div class="alignF"><input type="text" placeholder="Author"></div>
                                <div class="alignF"><input type="text" placeholder="Genre"></div>
                                <div class="alignF"><input type="text" placeholder="Publish Date"></div>
                                <div class="alignF"><input type="text" placeholder="Publisher"></div>
                                <div class="alignF"><input type="text" placeholder="Language"></div>
                                <div class="alignF"><input type="text" placeholder="Pages"></div>
                                <div class="alignF"><input type="text" placeholder="ISBN"></div>
                                <div class="alignF"><input type="text" placeholder="Overview:"></div>
    
                            </form>
                        </div>
                        <div class="arrange">
                            <button class="btn red">Remove</button>
                            <button class="btn blue clickable">Save changes</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
        <div class="c2">
            <p1>User Records Management</p1>
            <div class="newUser"> 
                <span class="details">For New Users </span>
                    <form>
                        <div class="alignG"><input type="text" placeholder="Last Name" required></div>
                        <div class="alignG"><input type="text" placeholder="First Name"required></div>
                        <div class="alignG"><input type="text" placeholder="M I" required></div>
                        <input type="text" placeholder="Address" style="width:100%" required>
                       <div class="try"><input type="submit" value="Register User"></div>
                    </form>
            </div>
            <div class="existingUser">
                <span class="details">For Existing Users </span>
                <div class="search1">
                    <input class="librarySearch" type="text" placeholder="Library ID" style="width:92%"> 
                    <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <span class="details"> User: 000000000001 - Juan Dela Cruz</span>
                <div class="bookContainer"> 
                    <div class="leftTitle">
                        <img src="img/icons/cover-page.png" alt="Sample volume 3">
                        <div class="borrowDetails">
                           <p6>Book title</p6>
                           <p6>Borrow: </p6>
                           <p6>03/20/2021</p6>
                           <p6>Returned:</p6>
                           <p6>03/20/2021</p6>
                        </div>
                    </div>
                    <div class="rightTitle">
                        <img src="img/icons/cover-page.png" alt="Sample volume 3">
                        <div class="borrowDetails">
                        <p6>Book title</p6>
                           <p6>Borrow: </p6>
                           <p6>03/20/2021</p6>
                            <button class="btn red">Return</button>
                         </div>
                    </div>
                </div>
                <span class="newBorrow"><button class="btn red">New Borrow</button></span>
                </div>
                
            </div>
        </div>
    </div>

<?php include('templates/footer.php') ?>
</html>