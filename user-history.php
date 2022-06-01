<?php include('templates/head.php') ?>
    <title>User History</title>
    <link rel="stylesheet" href="css/user-history.css">
<?php include('templates/nav.php') ?>


     <div class="main-content">
        <!-- Main page content -->
       
    <div class = "user-info">

        <div class="num-search">
         
            <div class="search">
                <h2>Enter User ID</h2>
                <input type="text" placeholder="000 000 0001" size = "20" > 
                <button class="blue"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

        </div>

        <div class="data">
            
        <button class="btn black circle">
            <img src="img/icons/alert.png" alt="file">
            User Information Found</button>

         <h3>Last Name</h3><input type="text" value ="DELA CRUZ"> 
         <h3>First Name</h3><input type="text" value ="JUAN"> 
         <h3>User ID</h3><input type="text" value ="000 000 0001">
         <h3>Date Registered</h3><input type="text" value =" 02 16 02 ">

        </div> 

    </div>

    <div class="history-container">
            
            <div class ="logo" >
            <img src="img/icons/file.png" alt="file"><h1>User Track History</h1>
             </div>

            <div class="header-table">
              <div class="headings">
                <span class="Book Title">Book Title</span>
                <span class="Author">Author Name</span>
                <span class="">Date Borrowed</span>
                <span class="">Date Returned</span>
              </div>
          
              <div class="policy">
                <span>  
                    <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
                </span>
              <div></div>
                <span>Name</span>
                <span>01 / 04 / 22</span>

                <span>
                    <p>05 / 04 / 22</p>
                </span>
              </div>

              <div class="policy">
                <span>  
                    <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
                </span>
                <span>Name</span>
                <span>01 / 04 / 22</span>

                <span>
                    <p>01 / 04 / 22</p>
                  
                </span>
              </div>

              <div class="policy">
                <span>  
                    <img src="img/icons/cover-page.png" alt="book icon" width="150px" height="200px">
                </span>
                <span>Name</span>
                <span>01 / 04 /22</span>

                <span>
                    <button class="btn red clickable circle"><a href={row.link}>Due 22 / 04 / 22</a></button>
                  
                </span>
              </div>
          
            </div>

            

    </div>



    <div class="sort">
            <h3>Sort by</h3> 
                    <select id="select1">
                    <option value="value1">Alphabetically</option>
                    <option value="value2"> Date Borrowed</option>
                    <option value="value3"> Date Returned</option>
            </select>

            <h3> 3 items found </h3>
                 
    </div>

     </div>

    



<?php include('templates/footer.php') ?>