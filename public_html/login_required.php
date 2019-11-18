<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Team 13 Project Site - Login Required</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>
    
<style>

/* Full-width input fields */

input[type=text],
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */

button {
    z-index: 1;
    position: relative;
    background-color: #e6a756;
    font-family: 'Lora';
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    font-weight: 700;
    font-size: 0.8rem;
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
    padding-left: 2rem;
    padding-right: 2rem;
}


.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #4682b4;
}

/* Center the image and position
the close button */

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */

.modal {
   display: none;
   position: fixed;
   z-index: 1;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   overflow: auto;
   background-color: rgb(0,0,0);
   background-color: rgba(0,0,0,0.4);
   padding-top: 60px;
}


.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button (x) */

.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */ 

.animate {
 -webkit-animation: animatezoom 0.6s;
 animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
 from {-webkit-transform: scale(0)}
 to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel
button on extra small screens */ 

@media screen and(max-width: 300px){
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

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
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
            <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="feed.php">Feed</a>
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
    
    <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Sorry, you must have an account to access these features!  Please log in or create an account.</span></h2>
               <br>
                <button onclick="document.
	               getElementById('id01')
                  .style.display='block'"
                  style="width:auto;">Create Account
	           </button>
                <br>
                <br>
                <button onclick="document.
	               getElementById('id02')
                  .style.display='block'"
                  style="width:auto;">Login
	           </button>
            
            <p class="mb-0">Join our website today to view news, engage in clubs, report campus incidents and more!</p>
              </div>
        </div>
      </div>
    </div>
      
      <div id="id01" class="modal">

	  <form class="modal-content animate"
		action="../src/signup.php"
        method="post">
		<div class="imgcontainer">
		  <span title="Close Modal" onclick="document
			.getElementById('id01')
			.style.display='none'"
			class="close" >
			&times;</span>

		  <img src="img/owlsley_eye.png"
			alt="Avatar"
			class="avatar">
		</div>


		<div class="container">
		  <label><b>Username</b></label>
		  <input type="text" placeholder=
			"Enter Username"
			name="new-user" id="new-user" required>


		  <label><b>Password</b></label>
		  <input type="password" placeholder=
			"Enter Password" name="new-pass" id="new-pass"required>


		  <button type="submit" name="create_account_submit"
                  id="create_account_submit">Create Account</button>
		  <input type="checkbox"
			checked="checked">
		  Remember me
		</div>


		<div class="container"
		  style="background-color:#f1f1f1">
		  <button type="button"
			onclick="document.getElementById
			('id01').style.

			display='none'" class="cancelbtn">
			Cancel</button>
		  <span class="psw">Forgot
			<a href="#">password?

			</a></span>
		</div>
	  </form>
	</div>
      
      <div id="id02" class="modal">

	  <form class="modal-content animate"
		action="../src/login.php"
        method="post">
		<div class="imgcontainer">
		  <span onclick="document
			.getElementById('id02')

			.style.display='none'"
			class="close" title="Close Modal">
			&times;</span>

		  <img src="img/cartoon_owlsey.jpg"
			alt="Avatar"
			class="avatar">
		</div>


		<div class="container">
		  <label><b>Username</b></label>
		  <input type="text" placeholder=
			"Enter Username"
			name="username" required>


		  <label><b>Password</b></label>
		  <input type="password" placeholder=
			"Enter Password" name="password" required>


		  <button type="submit" name="login_submit" id="login_submit">Login</button>
		  <input type="checkbox"
			checked="checked">
		  Remember me
		</div>


		<div class="container"
		  style="background-color:#f1f1f1">
		  <button type="button"
			onclick="document.getElementById
			('id02').style.

			display='none'" class="cancelbtn">
			Cancel</button>
		  <span class="psw">Forgot
			<a href="#">password?

			</a></span>
		</div>
	  </form>
	</div>

<script>

// Get the modal (Create Account)

var modal = document.getElementById
('id01');

// When the user clicks anywhere
outside of the modal, close it 

window.onclick = function(event) {
    if (event.target == modal) {
     modal.style.display = "none";
    }
}

//(Login)
var modal = document.getElementById
('id02');

// When the user clicks anywhere
// outside of the modal, close it 

window.onclick = function(event) {
    if (event.target == modal) {
     modal.style.display = "none";
    }
}
</script>

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
