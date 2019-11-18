<?php
//redirects to login required page if not logged in
require_once '../src/redir_to_login.php';
require_once '../src/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Team 13 Project Site - Feed</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/business-casual.min.css" rel="stylesheet">

    </head>

    <body>

        <h1 class="site-heading text-center text-white d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">Your Eyes on Campus</span>
            <span class="site-heading-lower">FLORIDA ATLANTIC UNIVERSITY</span>
        </h1>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">OWL EYES</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4">
                            <a class="nav-link text-uppercase text-expanded" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active px-lg-4">
                            <a class="nav-link text-uppercase text-expanded" href="feed.php">Feed</a>
                            <span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item px-lg-4">
                            <a class="nav-link text-uppercase text-expanded" href="report.php">Report</a>
                        </li>
                        <li class="nav-item px-lg-4">
                            <a class="nav-link text-uppercase text-expanded" href="about.php">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
      
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ml-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Logged in as:</span>
                                <span class="section-heading-lower"><?php echo $_SESSION['user']; ?></span>
                                <span>              
                                    <br>
                                    <a href="report.php">View Reports</a>
                                    <br>
                                    <a href="feed.php">View Feed Items</a>
                                </span>
                            </h2>
                            
                            <form action="../src/logout.php" method="post">
                                <input type="submit" name="logout" value="Log Out">
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!--        <section class="page-section cta">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-xl-9 mx-auto">-->
<!--                        <div class="cta-inner text-center rounded">-->
<!--                            <h2 class="section-heading mb-5">-->
<!--                                <span class="section-heading-upper">Weekly Schedule</span>-->
<!--                                <span class="section-heading-lower">Get Involved</span>-->
<!--                            </h2>-->
<!--                            <ul class="list-unstyled list-hours mb-5 text-left mx-auto">-->
<!--                                <li class="list-unstyled-item list-hours-item d-flex">-->
<!--                                    Monday-->
<!--                                    <span class="ml-auto">SWE Meeting 6-7PM in EE</span>-->
<!--                                </li>-->
<!--                                <li class="list-unstyled-item list-hours-item d-flex">-->
<!--                                    Tuesday-->
<!--                                    <span class="ml-auto">TED Talk @Auditorium 10-12PM</span>-->
<!--                                </li>                             -->
<!--                                <li class="list-unstyled-item list-hours-item d-flex">-->
<!--                                    Wednesday-->
<!--                                    <span class="ml-auto">Yoga Session @Rec 2PM</span>-->
<!--                                </li>-->
<!--                                <li class="list-unstyled-item list-hours-item d-flex">-->
<!--                                    Thursday-->
<!--                                    <span class="ml-auto">Free Ice cream @SG 6PM</span>-->
<!--                                </li>-->
<!--                                <li class="list-unstyled-item list-hours-item d-flex">-->
<!--                                    Friday-->
<!--                                    <span class="ml-auto">Free shirts on Breezeway @9AM</span>-->
<!--                                </li>-->
<!--                                <li class="list-unstyled-item list-hours-item d-flex">-->
<!--                                    Saturday-->
<!--                                    <span class="ml-auto">9:00 AM to 5:00 PM</span>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
        <?php

        $result = $connection->query("SELECT date,location,explanation,imagelocation FROM feeds");

        while($row = $result->fetch_assoc())

        { ?>

            <section class="page-section">
                <div class="container">
                    <div class="product-item">
                        <div class="product-item-title d-flex">
                            <div class="bg-faded p-5 d-flex mr-auto rounded">
                                <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Date:
                <?php
                echo $row['date'];
                ?>
                </span>
                                    <span class="section-heading-lower">
                  <?php
                  echo $row['explanation'];
                  ?>
                </span>
                                </h2>
                            </div>
                        </div>


                        <?php
                        echo '<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="'. $row['imagelocation'] . '"/>';
                        ?>

                        <!--<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/pipe.jpg" alt="">-->
                        <div class="product-item-description d-flex ml-auto">
                            <div class="bg-faded p-5 rounded">
                                <p class="mb-0">Location:
                                    <?php
                                    echo $row['location'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>

        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/involved.jpg" alt="">
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Have an important event? Add it to our page</span>
                                    <span class="section-heading-lower">Add your event:</span>
                                </h2>
                                
                                <form method="post" action="../src/feedupload.php" enctype="multipart/form-data" >  
                                    <p>
                                        Date of Event:<br>
                                        <input type="text" name="date">
                                    </p>
                                    <p>
                                        Location of Event:<br>
                                        <input type="text" name="location">
                                    </p>
                                    <p>
                                        <p>
                                            Description (provide details):
                                            <br>
                                            <textarea name="explanation" rows="5" cols="40"></textarea>
                                        </p>
                                        Say it with an image:<br>
                                        <input type="file" name="imageToUpload" size="40">
                                    </p>
                                    <div>
                                        <input type="submit" name="submit" value="Spread the Word">
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer text-faded text-center py-5">
            <div class="container">
                <p class="m-0 small">Principles of Software Engineering - Fall 2019 - Team 13&copy;</p>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
