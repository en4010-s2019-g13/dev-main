<?php
require_once '../src/redir_to_login.php';
require_once '../src/db_connect.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      
    <style>
        table.paleBlueRows 
        {
            font-family: "Times New Roman", Times, serif;
            border: 1px solid #FFFFFF;
            width: 100%;
            height: 100%;
            text-align: center;
            border-collapse: collapse;
        }
        
        table.paleBlueRows td, table.paleBlueRows th 
        {
            border: 2px solid #000000;
            padding: 3px 2px;
        }
        
        table.paleBlueRows tbody td 
        {
            font-size: 16px;
        }
        
        table.paleBlueRows tr:nth-child(even) 
        {
            background: #D0E4F5;
        }
        
        table.paleBlueRows thead 
        {
            background: #0B6FA4;
        }
        
        table.paleBlueRows thead th 
        {
            font-size: 17px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            border-left: 0px solid #FFFFFF;
        }
        
        table.paleBlueRows thead th:first-child 
        {
            border-left: 2px solid #000000;
        }

        table.paleBlueRows tfoot td 
        {
            font-size: 14px;
        }
    </style>
      
    <title>Report Inbox</title>
      
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
      
<br><br>
      
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h3>Report Inbox</h3>
<?php 
//starting PHP for search function - pulls items from database with similar string after submit button is pressed        
if(isset($_POST['submit']))
    {
        if(isset($_GET['go']))
        {
            if(preg_match("/^[  a-zA-Z]+/", $_POST['location']))
            {
                $locsearch = $_POST['location'];
                $sql="SELECT  reportID, priority, location, explanation, imagelocation FROM reports WHERE location LIKE '%" . $locsearch .  "%'";
                $result = $connection->query($sql);
                
 ?>   
                        
                        <table class="paleBlueRows">
                            <thead>
                                <tr>
                                    <th><u>Priority</u></th>
                                    <th><u>Location</u></th>
                                    <th><u>Description</u></th>
                                    <th><u>Attached Image</u></th>
                                    <th><u>Remove?</u></th>
                                </tr>
                            </thead>               
                            <tbody>           
<?php 
                // fetches the data in each given column for any matching rows
                while($row = $result->fetch_assoc())
                {
                    $reportID = $row['reportID'];
                    $priority  = $row['priority'];
                    $location = $row['location'];
                    $explanation = $row['explanation'];
                    $imagelocation = $row['imagelocation'];
?>

                                <tr>
                                    <td><? echo $priority; ?></td>
                                    <td><? echo $location; ?></td>
                                    <td><? echo $explanation; ?></td>
                                    <td><? echo "<a href='$imagelocation'>View Image</a>" ?></td>
                                    <td><form  method="post" action="../src/removereport.php"  id="MarkComplete">
             <? echo "<input type='hidden' id='reportID' name='reportID' value='$reportID'>" ?>
             <input  type="submit" name="submit" value="Mark as Complete"></form></td>
                                </tr>


        
<?php              }
            }
            else
            {
                // echoed if user submits an empy string
                echo  "<p>Please enter a location to search</p>";
            }
        }
    }
    elseif(isset($_POST['submit2']))
    {
        if(isset($_GET['go']))
        {
            if(preg_match("/^[  a-zA-Z]+/", $_POST['keyword']))
            {
                $keysearch = $_POST['keyword'];
                $sql="SELECT  reportID, priority, location, explanation, imagelocation FROM reports WHERE explanation LIKE '%" . $keysearch .  "%'";
                
                $result = $connection->query($sql);
 ?>   
                                <table class="paleBlueRows">
                                    <thead>
                                        <tr>
                                            <th><u>Priority</u></th>
                                            <th><u>Location</u></th>
                                            <th><u>Description</u></th>
                                            <th><u>Attached Image</u></th>
                                            <th><u>Remove?</u></th>
                                        </tr>
                                    </thead>  
<?php 
                // fetches the data in each given column for any matching rows
                while($row = $result->fetch_assoc())
                {
                    $reportID = $row['reportID'];
                    $priority  = $row['priority'];
                    $location = $row['location'];
                    $explanation = $row['explanation'];
                    $imagelocation = $row['imagelocation'];
?>
        
                                    <tr>
                                        <td><? echo $priority; ?></td>
                                        <td><? echo $location; ?></td>
                                        <td><? echo $explanation; ?></td>
                                        <td><? echo "<a href='$imagelocation'>View Image</a>" ?></td>
                                        <td><form  method="post" action="../src/removereport.php"  id="MarkComplete">
             <? echo "<input type='hidden' id='reportID' name='reportID' value='$reportID'>" ?>
             <input  type="submit" name="submit" value="Mark as Complete"></form></td>
                                    </tr>
        
<?php            
                }
            }
            else
            {
                // echoed if user submits an empy string
                echo  "<p>Please enter a location to search</p>";
            }
        }
    }
      else
      {
          // when the page is normally loaded without searching for something, an unordered list is returned and displayed
          $sql="SELECT  reportID, priority, location, explanation, imagelocation FROM reports";
          $result = $connection->query($sql);
?>
                                    <table class="paleBlueRows">
                                        <thead>
                                            <tr>
                                                <th><u>Priority</u></th>
                                                <th><u>Location</u></th>
                                                <th><u>Description</u></th>
                                                <th><u>Attached Image</u></th>
                                                <th><u>Remove?</u></th>
                                            </tr>
                                        </thead> 
        
<?php 
                while($row = $result->fetch_assoc())
                {
                    $reportID = $row['reportID'];
                    $priority  = $row['priority'];
                    $location = $row['location'];
                    $explanation = $row['explanation'];
                    $imagelocation = $row['imagelocation'];
                    //setup variables to be displayed in table
?>
        
                                        <tr>
                                            <td><? echo $priority; ?></td>
                                            <td><? echo $location; ?></td>
                                            <td><? echo $explanation; ?></td>
                                            <td><? echo "<a href='$imagelocation'>View Image</a>" ?></td>
                                            <td><form  method="post" action="../src/removereport.php"  id="MarkComplete">
             <? echo "<input type='hidden' id='reportID' name='reportID' value='$reportID'>" ?>
             <input  type="submit" name="submit" value="Mark as Complete"></form></td>
                                        </tr>
<?php
      //ending previous code blocks   
      }
    }
?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        
<br>
    
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h3>Filter by Location</h3>
                        <p>Please enter a location to search for reports from a specific location.</p>
                        <form  method="post" action="reportinbox.php?go"  id="searchform">
                            <input  type="text" name="location">
                            <input  type="submit" name="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                
<br>
          
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h3>Filter by Keyword</h3>
                        <p>Please enter in a keyword to search for reports using those terms.</p>
                        <form  method="post" action="reportinbox.php?go"  id="searchform2">
                            <input  type="text" name="keyword">
                            <input  type="submit" name="submit2" value="Search">
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