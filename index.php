<?php 
	include('dbconnect.php');
	include ('session.php');
	if(isset($_SESSION['userid'])){
		if($_SESSION['userid']=='candidate'){
			header('location:candidate_home.php');
		}
		if($_SESSION['userid']=='admin'){
			header('location:admin_home.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personality Prediction</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/half-slider.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Personality Prediction</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i>&nbsp;Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="candidate_register.php"><i class="fa fa-user-circle"></i>&nbsp;Register</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image:url(images/6235678871_b7e7d1aec5_b.jpg)">
            <div class="carousel-caption d-none d-md-block" style="background-color:#04040440;">
              <h3>Personality Prediction</h3>
              <p>Easy way to sort out the best candidates</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url(images/test2.jpg)">
            <div class="carousel-caption d-none d-md-block" style="background-color:#04040440;">
              <h3>Personality Markers</h3>
              <p>Education is not the only criteria to filter employees candidates</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url(images/Teens-taking-personality-tests.jpg);">
            <div class="carousel-caption d-none d-md-block" style="background-color:#04040440;">
              <h3>What makes you tick?</h3>
              <p>Attend our test and let us know.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1>Personality Prediction Project</h1>
        <p>This will enable a more effective way to short list submitted candidate CVs from a large number of applicants providing a consistent and fair CV ranking policy, which can be legally justified. System will rank the experience and key skills required for particular job position. Than system will rank the CV’s based on the experience and other key skills which are required for particular job profile. This system will help the HR department to easily shortlist the candidate based on the CV ranking policy. This system will focus not only in qualification and experience but also focuses on other important aspects which are required for particular job position. This system will help the human resource department to select right candidate for particular job profile which in turn provide expert workforce for the organization.
        Candidate here will register him/herself with all its details and will upload their own CV into the system which will be further used by the system to shortlist their CV. Candidate can also give an online test which will be conducted on personality questions as well as aptitude questions. After completing the online test, candidate can view their own test results in graphical representation with marks.
</p>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
