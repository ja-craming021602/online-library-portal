<?php include('templates/head.php') ?>
    <title>Help and Support</title>
    <link rel="stylesheet" href="css/help-support.css">
<?php include('templates/nav.php') ?>

    <div class="main-content">
        <!-- Main page content -->


        
       
         <!-- frequently ask section -->
        <div class="freq-ask">
         
            <div class="search">

                <img src="img/icons/question.png" alt="question" width="50px" height="50px">
                <p>Frequently Asked Questions</p>


                <input type="text" placeholder="Search..." size = "20px"> 
                <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            

            <div class="search-topics">
                 
                    <button class="btn black">
                        <h1>How do I borrow materials?</h1>
                        <p>
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! 
                        </p>
                   </button>

                   <button class="btn black">
                    <h1>How to log-in for online access?</h1>
                    <p>
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellat consequatur exercitationem! Expedita id in cupiditate delectus facilis illo voluptatibus quod laudantium, quasi amet iure quia vitae explicabo! Amet quos officiis voluptas exercitationem fugiat, quibusdam reiciendis mollitia deserunt recusandae saepe veniam, rem perspiciatis quis tempora alias commodi soluta sapiente ab?
                    </p>

                    </button>
            </div>

        </div>


    
        <!-- feedback section -->
        <div class="feedback">

            


               
            <div class = "logo">
                
            <img src="img/icons/feedback.png" alt="library" width="50px" height="50px">
            <h2>Library Feedback</h2>
            
            </div>

            <form action="/action_page.php">
                <div>
                    <input type="checkbox" id="complain" name="complain" size = "20px">
                    <label for="scales">Complaint</label>
                  </div>
              
                  <div>
                    <input type="checkbox" id="problem" name="problem" size = "20px">
                    <label for="scales">Problem</label>
                  </div>

                  <div>
                    <input type="checkbox" id="suggestion" name="suggestion" size = "20px">
                    <label for="scales">Suggestion</label>
                  </div>

                  <div>
                    <input type="checkbox" id="praise" name="praise" size = "20px">       
                    <label for="scales">Praise</label>
                  </div>

                <div class=" info">
                    <input type="text" placeholder="Enter yout comment on the space" size = "20 "> 
                  
                 <h3>Please tell us how to get touch you</h3>
  
                     <input type="text" placeholder="First Name "> 
                     <input type="text" placeholder="Last Name"> 
                     <input type="text" placeholder="Email Addess">
                     <button class="btn black clickable">Submit</button>
                </div>


              </form>
        </div>
    
        <div class="staff">
            <button class="btn gray">
                   <img src="img/icons/read.png" alt="staff icon" width="50px" height="100px">
                   <h2>LIBRARY STAFF AND UTTILITY </h2>

                       <h4>CLENT JAPHET POLEDO</h4>
                       <h4>ROD JHON  CAGAY</h4>
                       <h4>TRISHIA ALMADIN</h4>
                       <h4>IRENE SABULAO</h4>

            </button>
          </div>

    </div> <!-- end of main content -->



<?php include('templates/footer.php') ?>
</html>