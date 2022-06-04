<?php 
   $search = $_GET['search'];   
?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help and Support</title>

    <!-- Custom fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <!-- Custom icons -->
    <script src="https://kit.fontawesome.com/32577d814c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/help-support.css">
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
            <input type="text" placeholder="Search..." size = "30px" > 
            <select id="search-select">
                <option value="books">Books</option>
                <option value="user">User</option>
            </select>
            <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <div class="main-content">
        <!-- Main page content -->


<?php 
   
   if (isset($_SESSION['status']))
   {
       echo "<h4>".$_SESSION['status']."</h4>";
       unset($_SESSION['status']);
   }
?>



<?php
$search='%'.$search.'%';
require_once('db_connect.php');

$sql= 'SELECT `Question`, `Answer` FROM `freq_ask_questions` WHERE `Question` LIKE "'.$search.'" ' ;

$stm=mysqli_prepare($conn,$sql);
$a=1;
?>
<?php if(mysqli_stmt_execute($stm)):?>
   <?php  $result=mysqli_stmt_get_result($stm); ?>
   <?php if(mysqli_num_rows($result)>0):?>
		<?php	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC)):?>

        
       
         <!-- frequently ask section -->
        <div class="freq-ask">
         
            <div class="faq">

                <img src="img/icons/question.png" alt="question" width="50px" height="50px">
                <h1>Frequently Asked Questions</h1>

            <form action=" ">
                <input type="text" name = "search" value ="Enter Your Question Here " size = "20" > 
                <button class="blue"><i class="fa-solid fa-magnifying-glass" type = "submit"></i></button>
            </form>
            </div>
            

            <div class="search-topics">
                 
                    <button class="btn black">
                        <h1><?php echo $row['Question'];?></h1>
                        <p>
                        <?php echo $row['Answer'];?>
                        </p>
                   </button>

                   
            </div>

            <?php   
            endif;
        endif;
    endif;

	
     ?>

        </div>

        <!-- feedback section -->
        <div class="feedback">      
            <div class = "logo">
                
            <img src="img/icons/feedback.png" alt="library" width="50px" height="50px">
            <h1>Library Feedback</h1>
            
            </div>

            <form action = "insert.php" method = "POST" >
               
                 <input type="radio" name="feedback_type"  value = "complain" size = "50px" >Complain
                </br>
                  <input type="radio" name="feedback_type"  value = "problem" size = "20px" >Problem
                </br>
                  <input type="radio" name="feedback_type"  value = "suggestion" size = "20px" >Suggestion
                </br>
                  <input type="radio" name="feedback_type"  value = "praise" size = "20px">Praise      
                </br>
                <div class=" info">
                    <input type="text" placeholder="Enter yout feedback on the space" name = feedback size = "20 "> 
                  
                 <h2>Please tell us how to get touch you: </h2>
  
                     <input type="text" name ="firstname" placeholder ="First Name " required> 
                     </br>
                     <input type="text" name ="lastname"  placeholder="Last Name" required> 
                     </br>
                     <input type="text" name ="email" placeholder="Email Addess" required>
                     </br>
                     <button class="btn black clickable" type ="submit" value ="Submit" name = "info">Submit</button>
                </div>
              </form> 
        </div>
    
        <div class="staff">
            <button class="btn gray">
                   <img src="img/icons/read.png" alt="staff icon" width="50px" height="100px">
                   <h2>LIBRARY STAFF AND UTTILITY </h2>

                       <h3>CLENT JAPHET POLEDO</h3>
                       <h3>ROD JHON  CAGAY</h3>
                       <h3>TRISHIA ALMADIN</h3>
                       <h3>IRENE SABULAO</h3>

            </button>
          </div>

    </div> <!-- end of main content -->


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




