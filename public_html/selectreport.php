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

  <title>Team 13 Project Site - About</title>

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
             <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="report.php">Report</a>
          </li>
            <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="about.php">About <span class="sr-only">(current)</span>
                </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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
              <span class="section-heading-lower">Location: 
                  <?php  
                    echo $row['location'];
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
            <p class="mb-0">  
                <?php  
                    echo $row['explanation'];
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




