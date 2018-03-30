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
	if(isset($_GET['flag'])){
		if($_GET['flag']=='saved'){
		?><script>alert('Test completed succesfully');</script><?php
		}
		if($_GET['flag']=='resume_ok'){
		?><script>alert('Resume uploaded succesfully');</script><?php
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
      <?php
	  	$candidate_id=$_SESSION['id'];
	  	$query_check_statsus="SELECT * FROM `admin_remark` where candidate_id='$candidate_id'";
		$query_check_statsus_run=mysql_query($query_check_statsus);
		$rowcount_status=mysql_num_rows($query_check_statsus_run);
		if($rowcount_status!=0){
			$result_status=mysql_fetch_assoc($query_check_statsus_run);
			?>	<table class="table table-bordered">
            		<tr>
						<td>
							<h2>Your application is processed</h2><br>
                			<h3>Application status - <?php echo $result_status['application_status'];?></h3><br>
                			<p>Remark - <?php echo $result_status['remark'];?></p>
						</td>
					</tr>
				</table>
			<?php 
		}else{
	  ?>	
    	
      <h1>Welcome</h1>
      <h3>You need to complete the following steps to submit your candidate profile</h3>
      <hr>
     <!---->
    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
      <h4>Step 1</h4>
        <?php
			$candidate_id=$_SESSION['id'];
			$query_check_profile="SELECT * FROM candidate_register where `candidate_id`='$candidate_id'";
			$query_check_profile_run=mysql_query($query_check_profile);
			$rowcount_profile=mysql_num_rows($query_check_profile_run);
			if($rowcount_profile!=0){
				//if row exist then profile is already updated, hide the link
				?>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Step 1 Completed</div>
                </div>
                <p style="margin-top:10px;">Profile updated succesfully</p>
				<?php
			}else{
				?>
				<p style="margin-top:10px;">Fill in your details as directed in <a href="update_profile.php">Update Profile Page</a></p>
                <?php
			}
		?>
      
      <h4>Step 2</h4>
      	
        <?php
			$candidate_id;
        	//checking if resume uploaded or not
			$query_check_resume="SELECT * FROM candidate_register where `candidate_id`='$candidate_id'";
			$query_check_resume_run=mysql_query($query_check_resume);
			$result_resume=mysql_fetch_assoc($query_check_resume_run);
			$rowcount_resume=mysql_num_rows($query_check_resume_run);
			if($rowcount_resume==0){ 
		?>    	
        		<p style="margin-top:10px;">Upload resume after completing step 1</a></p>
        <?php
			}
			
			if($rowcount_resume!=0){
				
				if($result_resume['candidate_cv']=='null'){
					?>
                    	<p style="margin-top:10px;">Upload your resume in pdf format <a href="upload_resume.php">here</a></p>
            		<?php 
                }if($result_resume['candidate_cv']!='null'){
            		?>
                    <div class="progress">
                       <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Step 2 Completed</div>
                    </div>
                    <p style="margin-top:10px;">Resume uploaded succesfully</p>
            		<?php
                }
			}
		?>
      
      <h4>Step 3</h4>
      	<?php
			//checking if pdf uploaded
			$pdf=$candidate_id.'.pdf';
			$query_resume_upload="SELECT * FROM candidate_register where `candidate_id`='$candidate_id' AND `candidate_cv`='$pdf'";
			$query_resume_upload_run=mysql_query($query_resume_upload);
			$rowcount_upload=mysql_num_rows($query_resume_upload_run);
			if($rowcount_upload==0){
				?>    	
        		<p style="margin-top:10px;">Attend the test after completing Steps 1 and 2.</a></p>
        		<?php
			}
			
			if($rowcount_upload==1){
				//checking if test is completed
				$query_test_check="select * from candidate_answers where candidate_id='$candidate_id'";
				$query_test_check_run=mysql_query($query_test_check);
				$rowcount_test=mysql_num_rows($query_test_check_run);
				$result_test_check=mysql_fetch_assoc($query_test_check_run);
				
				if($result_test_check['candidate_id']==$candidate_id){
					?>
                    	<div class="progress">
                           <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Step 3 Completed</div>
                        </div>
                    	<p style="margin-top:10px;">Succesfully completed online test.</p>
                        <p>Your application is being evaluated, you will be notified when valuation is completed</p>
                    <?php
				}else{
					?>
                    	<p style="margin-top:10px;">Attend the personality prediction online test. <a href="attend_test.php">here</a></p>
                    <?php
				}
			}
		}//else of first if
		?>
      
      
    </div>
     <!---->
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

