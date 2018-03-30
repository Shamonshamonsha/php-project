<?php 
	include('dbconnect.php');
	include ('session.php');
	if(!isset($_SESSION['userid'])){
		header('location:index.php');
	}elseif(isset($_SESSION['userid'])){
		if($_SESSION['userid']!='candidate'){
			header('location:index.php');
	
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Personality Prediction</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="candidate_home.php">Personality Prediction : Candidate</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
          <a class="nav-link" href="candidate_home.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
        <div class="card card-register mx-auto mt-5">
          <div class="card-header">Upload CV</div>
          <div class="card-body">
            <form action="upload_resume.php?ok" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName">Use a pdf formatt while uploading</label>
                <input class="form-control" name="fileToUpload" id="fileToUpload" type="file" aria-describedby="nameHelp" placeholder="Resume" required>
                
              </div>              
              <button class="btn btn-primary btn-block" name="submit" type="submit">Upload</button>
            </form>
            <?php 
                if(isset($_POST['submit'])){
					$candidate_id=$_SESSION['id'];
                    //----------------
					//file uploading
					$file_name=$_SESSION['id'];
					$target_dir = "resume/";
					$original_file=basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$resumeFileType = pathinfo($original_file,PATHINFO_EXTENSION);
					$target_file = $target_dir .$file_name.'.'.$resumeFileType;
					
					// Check if file already exists
					if (file_exists($target_file)) {
						echo "File already exists. ";
						$uploadOk = 0;
					}
					// Allow certain pdf formats
					if($resumeFileType != "pdf") {
						echo "Only PDF files are allowed. ";
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "Sorry, your file was not uploaded. ";
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							
							$resume=$file_name.'.'.$resumeFileType;
							
							//adding resume to table of candidate details
							$query_upload="UPDATE `candidate_register` SET `candidate_cv`='$resume' WHERE `candidate_id`='$candidate_id'"; 		
							
							$query_upload_run=mysql_query($query_upload);
							
							if($query_upload_run==true){
								//making the service provider log in automaticaly and starting the session
									//echo 'success';
								?>
								<script>
									document.location.href = 'candidate_home.php?flag=resume_ok';
								</script>
								<?php
							}else{
								echo 'Error. Try Again.';
								//deleting the uploaded photo as the details was not succesfully inserted to database
								unlink($target_file);
							}
							
						} else {
							echo "Sorry, there was an error uploading your file. Try again";
						}
					}		
			
			
					//----------------
                }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>

