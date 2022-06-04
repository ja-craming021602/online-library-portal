<?php 
   $search = $_GET['search'];   
?>

<?php include('templates/head.php') ?>
    <title>User History</title>
    <link rel="stylesheet" href="css/user-history.css">
<?php include('templates/nav.php') ?>

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

    <?php include('templates/footer.php') ?>


