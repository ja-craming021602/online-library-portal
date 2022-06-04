<?php
$searchkey= $_GET['search'];
?> 

<?php include('templates/head.php') ?>
    <title>User History</title>
    <link rel="stylesheet" href="css/user-history.css">
<?php include('templates/nav.php') ?>

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


     <?php include('templates/footer.php') ?>