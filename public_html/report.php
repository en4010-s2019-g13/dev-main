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

  <title>Team 13 Project Site - Report</title>

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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Home
            </a>
          </li>
            <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="feed.php">Feed</a>
          </li>
             <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="report.php">Report 
                <span class="sr-only">(current)</span>
                 </a>
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
                <span class="section-heading-lower"><?php
                    echo $_SESSION['user'];
                    ?>
                  </span>
                <span>
                <span>
                    <br>
                    <a href="report.php">View Reports</a>
                    <br>
                    <a href="feed.php">View Feed Items</a>
                </span>
            </h2>
              <form action="../src/logout.php"
                    method="post">
                  <input type="submit" name="logout" value="Log Out">
              </form>
          </div>
        </div>
        </div>
    </div>
  </section>

  <?php

  $result =$connection->query("SELECT priority,location,explanation,imagelocation FROM reports");

  while($row = $result->fetch_assoc())
  { ?>

      <section class="page-section">
          <div class="container">
              <div class="product-item">
                  <div class="product-item-title d-flex">
                      <div class="bg-faded p-5 d-flex mr-auto rounded">
                          <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Priority:
                <?php
                echo $row['priority'];
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
                  echo '<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="../src/' . $row['imagelocation'] . '">';
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


  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Problems? let us know</span>
              <span class="section-heading-lower">Submit your report below:</span>
            </h2>
          </div>
        </div>
        <!--<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/products-01.jpg" alt="">-->
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">   
              <form method="post" action="../src/reportupload.php" enctype="multipart/form-data" >  
                <p>
                Location of report:<br>
                <input type="text" name="location">
                </p>
                <p>
                Explain the problem:<br>
                <textarea name="explanation" rows="5" cols="40"></textarea>
                </p>
                <p>
                <p>
                Priority:
                <br>
                <select name="priority">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="urgent">Urgent</option>
                </select>
                </p>
                Choose an image to upload:<br>
                <input type="file" name="imageToUpload" size="40">
                </p>
                <div>
                <input type="submit" name="submit" value="Submit">
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </section>
    
<!--  <section class="page-section">-->
<!--    <div class="container">-->
<!--      <div class="product-item">-->
<!--        <div class="product-item-title d-flex">-->
<!--          <div class="bg-faded p-5 d-flex mr-auto rounded">-->
<!--            <h2 class="section-heading mb-0">-->
<!--              <span class="section-heading-upper">Status: Urgent</span>-->
<!--              <span class="section-heading-lower">Pipe Problems at IVAN</span>-->
<!--            </h2>-->
<!--          </div>-->
<!--        </div>-->
<!--        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/pipe.jpg" alt="">-->
<!--        <div class="product-item-description d-flex ml-auto">-->
<!--          <div class="bg-faded p-5 rounded">-->
<!--            <p class="mb-0">The pipe system outside of the housing building, Innovation Village North, is borken and the water is coming onto the walkway. It is impossible to avoid and my book bag with my laptop and all my homework got drenched.</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->
<!---->
<!--  <section class="page-section">-->
<!--    <div class="container">-->
<!--      <div class="product-item">-->
<!--        <div class="product-item-title d-flex">-->
<!--          <div class="bg-faded p-5 d-flex ml-auto rounded">-->
<!--            <h2 class="section-heading mb-0">-->
<!--              <span class="section-heading-upper">Status: Medium</span>-->
<!--              <span class="section-heading-lower">EE Computer Freezing</span>-->
<!--            </h2>-->
<!--          </div>-->
<!--        </div>-->
<!--        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/error2.jpg" alt="">-->
<!--        <div class="product-item-description d-flex mr-auto">-->
<!--          <div class="bg-faded p-5 rounded">-->
<!--            <p class="mb-0">The computers in the Cube at Engineering East (building 96) keep displaying the message attached in my image. I have tried to restart the PC multiple times with no luck. Please assist.</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->
<!--    -->
<!--      <section class="page-section">-->
<!--    <div class="container">-->
<!--      <div class="product-item">-->
<!--        <div class="product-item-title d-flex">-->
<!--          <div class="bg-faded p-5 d-flex mr-auto rounded">-->
<!--            <h2 class="section-heading mb-0">-->
<!--              <span class="section-heading-upper">Status: Urgent</span>-->
<!--              <span class="section-heading-lower">Cieling Tiles in Dorm Buildings</span>-->
<!--            </h2>-->
<!--          </div>-->
<!--        </div>-->
<!--        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/broken.jpg" alt="">-->
<!--        <div class="product-item-description d-flex ml-auto">-->
<!--          <div class="bg-faded p-5 rounded">-->
<!--            <p class="mb-0">The cieling tile in Parliament Hall dorm building is broken/missing. I believe this is a saftey hazard for students on campus as well as visitors. Please send someone to fix it. Thanks!</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->


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
