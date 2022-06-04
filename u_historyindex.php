<?php
$searchkey= $_GET['search'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User History</title>

    <!-- Custom fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <!-- Custom icons -->
    <script src="https://kit.fontawesome.com/32577d814c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/user-history.css">

</head>
<body>
    <div class="nav">
        <!-- Navigation bar -->
        <ul>
            <li><a href="index.html"><button class="btn blue clickable"><i class="fa-solid fa-book-open"></i></button></a></li>
            <li><a href="faqindex.php"><button class="btn blue clickable">Help & Support</button></a></li>
            <li class="drop-menu blue">
                <a href="browse-books.html">Browse</a><i class="fa-solid fa-angle-down"></i>
                <ul>
                    <li><a href="bookpage.html">[Temporary] Book page</a></li>
                    <li><a href="index.php">[Temporary] User History</a></li>
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
     
     
     <div class="main-content">
        <!-- Main page content -->

    <div class = "user-info">

<?php
$search='%'.$searchkey.'%';
require_once('db_connect.php');
$sql= 'SELECT `user`.`UserID`, `user`.`FirstName`, `user`.`MiddleName`, `user`.`LastName`,`user`.`Address`,`borrow`.`BorrowID`, `borrow`.`DateOfBorrow`, `borrow`.`DateReturned`, `borrow`.`DueDate`, `borrow`.`BookID`,`book`.`Title`,`rl_book_author`.`Author`
    FROM `user` 
	LEFT JOIN `borrow` ON `borrow`.`UserID` = `user`.`UserID`
	LEFT JOIN `book` ON `book`.`BookID` = `borrow`.`BookID`
	LEFT JOIN `rl_book_author` ON `rl_book_author`.`BookID` = `borrow`.`BookID` WHERE `user`.`UserID` LIKE "'.$search.'" ' ;

$stm=mysqli_prepare($conn,$sql);
$a=1;
?>
<?php if(mysqli_stmt_execute($stm)):?>
   <?php  $result=mysqli_stmt_get_result($stm); ?>
   <?php if(mysqli_num_rows($result)>0):?>
		<?php	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC)):?>
		


    <div class="num-search">
         
         <form action=" ">
                 <h2>Enter User ID</h2>
                 <input type="text"  name = "search" value ="Enter User ID" size = "20" > 
                 <button class= "blue"><i class="fa-solid fa-magnifying-glass" type = "submit"></i></button>
         </form> 
    </div>

     <div class="data">
         <button class="btn black circle">
         <img src="img/icons/alert.png" alt="file">
         <?php echo "User Information" ?> </button>
    
         <h2>Last Name</h2><input type="text" placeholder = <?php echo $row['LastName'];?> >
         <h2>Middle Name</h2><input type="text" placeholder=<?php echo $row['MiddleName'];?> >
         <h2>First Name</h2><input type="text" placeholder=<?php echo $row['FirstName'];?> >
         <h2>Address</h2><input type="text" placeholder=<?php echo $row['Address'];?> >
         <h2>User ID</h2><input type="text" placeholder=<?php echo $row['UserID'];?>>
         
     </div> 

 </div>

 <div class="history-container">

         <div class ="logo" >
             <h1>
            <img src="img/icons/file.png" alt="file">User Track History
            </h1>
         </div>
         <div class="header-table"  >
           <div class="headings">
             <span >Book</span>
             <span >Book Title</span>
             <span >Author Name</span>
             <span >Date Borrowed</span>
             <span >Date Returned</span>
           </div>
       
             <div class="policy">
               <span>
                  <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
                </span>
               <span> <?php echo $row['Title'];?></span>
               <span><?php echo $row['Author'];?></span>
               <span><?php echo $row['DateOfBorrow'];?></span>
               <span><?php echo $row['DateReturned'];?></span>
            </div>

         </div>
 </div>

    <?php   
            endif;
          
        endif;
    endif;	
     ?>

    <div class="sort">
            <h3>Sort by</h3> 
                    <select id="select1">
                    <option value="value1">Alphabetically</option>
                    <option value="value2"> Date Borrowed</option>
                    <option value="value3"> Date Returned</option>
            </select>
          

           <?php

           $total = 'SELECT `user`.`UserID`, `user`.`FirstName`, `user`.`MiddleName`, `user`.`LastName`,`user`.`Address`,`borrow`.`BorrowID`, `borrow`.`DateOfBorrow`, `borrow`.`DateReturned`, `borrow`.`DueDate`, `borrow`.`BookID`,`book`.`Title`,`rl_book_author`.`Author`
           FROM `user` 
           LEFT JOIN `borrow` ON `borrow`.`UserID` = `user`.`UserID`
           LEFT JOIN `book` ON `book`.`BookID` = `borrow`.`BookID`
           LEFT JOIN `rl_book_author` ON `rl_book_author`.`BookID` = `borrow`.`BookID` WHERE `user`.`UserID` LIKE "'.$search.'" ';

           $run =mysqli_query($conn,$total);
           
           if($sql_count = mysqli_num_rows($run))
           {
               echo '<h3>'.$sql_count. '</h3><h2>item found</h2>';
           }
             else{
                echo 'No data found' ;
             }   
           
    
           ?>

    </div>

     </div>


    <div class="footer">
        <!-- Footer -->
        <div>
            <button class="btn blue circle"><i class="fa-solid fa-phone"></i></button>
            <h3>1245-222</h3>
        </div>
        <div>
            <button class="btn blue circle"><i class="fa-solid fa-location-dot"></i></button>
            <h3>Philippines</h3>
        </div>
        <div>
            <button class="btn blue circle"><i class="fa-solid fa-envelope"></i></button>
            <h3>xyz@email.com</h3>
        </div>
        <a href="index.html"><button class="btn blue clickable"><i class="fa-solid fa-book-open"></i></button></a>
     </div>
</body>
</html>
