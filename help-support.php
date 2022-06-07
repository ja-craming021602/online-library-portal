<?php
include('utils/connection.php');

$query = 'SELECT Question, Answer FROM freq_ask_questions';

if (isset($_POST['faq-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search-item']);
    $query = $query . " WHERE Question LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);
$faqs = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

mysqli_close($conn);
?>


<?php include('templates/head.php') ?>
<title>Help and Support</title>
<link rel="stylesheet" href="css/help-support.css">
<?php include('templates/nav.php') ?>

<div class="main-content">
    <!-- Main page content -->




    <!-- frequently ask section -->
    <div class="freq-ask">

        <form class="search" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <img src="img/icons/question.png" alt="question" width="50px" height="50px">
            <p>Frequently Asked Questions</p>


            <input type="text" placeholder="Search..." name="search-item">
            <button class="blue" name="faq-search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>


        <div class="search-topics">

            <?php foreach ($faqs as $faq) : ?>

                <div class="faq black">
                    <h1><?php echo htmlspecialchars($faq['Question']); ?></h1>
                    <p>
                        <?php echo htmlspecialchars($faq['Answer']); ?>
                    </p>
                </div>

            <?php endforeach; ?>
        </div>

    </div>



    <!-- feedback section -->
    <div class="feedback">





        <div class="logo">

            <img src="img/icons/feedback.png" alt="library" width="50px" height="50px">
            <h2>Library Feedback</h2>

        </div>

        <form action="utils/insert.php" method="POST">

            <input type="radio" name="feedback_type" id="complain" value="complain" checked>
            <label for="complain">Complaint</label><br>
            <input type="radio" name="feedback_type" id="problem" value="problem">
            <label for="problem">Problem</label><br>
            <input type="radio" name="feedback_type" id="suggestion" value="suggestion">
            <label for="suggestion">Suggestion</label><br>
            <input type="radio" name="feedback_type" id="praise" value="praise">
            <label for="praise">Praise</label><br>
            <input type="text" placeholder="Enter your comment" name="feedback" required>

            <h3>Please tell us how to get in touch with you.</h3>

            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <div><button class="btn black clickable" name="info">Submit</button></div>


        </form>
    </div>

    <div class="staff">
        <button class="btn gray">
            <img src="img/icons/read.png" alt="staff icon" width="50px" height="100px">
            <h2>LIBRARY STAFF AND UTTILITY </h2>

            <h4>CLENT JAPHET POLEDO</h4>
            <h4>ROD JHON CAGAY</h4>
            <h4>TRISHIA ALMADIN</h4>
            <h4>IRENE SABULAO</h4>

        </button>
    </div>

</div> <!-- end of main content -->



<?php include('templates/footer.php') ?>