<?php 
	include('dbconnect.php');
	include ('session.php');
	if(!isset($_SESSION['userid'])){
		header('location:index.php');
	}elseif(isset($_SESSION['userid'])){
		if($_SESSION['userid']!='admin'){
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
    <a class="navbar-brand" href="admin_home.php">Personality Prediction : Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
          <a class="nav-link" href="admin_home.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Approved">
          <a class="nav-link" href="approved_candidates.php">
            <i class="fa fa-fw fa-check"></i>
            <span class="nav-link-text">Approved Candidates</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rejected">
          <a class="nav-link" href="rejected_candidates.php">
            <i class="fa fa-fw fa-close"></i>
            <span class="nav-link-text">Rejected Candidates</span>
          </a>
        </li>
        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rejected">
          <a class="nav-link" href="add_questions.php">
            <i class="fa fa-fw fa-plus"></i>
            <span class="nav-link-text">Add Questions</span>
          </a>
        </li>-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rejected">
          <a class="nav-link" href="view_questions.php">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">View Questions</span>
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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
     
     
     <?php
	 	if(isset($_GET['flag'])){
			if($_GET['flag']=='processed'){
				?><script>alert('Application processed succesfully');</script><?php
			}
			if($_GET['flag']=='not_processed'){
				?><script>alert('Could not process,try again');</script><?php
			}
		}
	 ?>
     
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Approved Applications  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Candidate</th>
                  <th>Resume</th>
                  <th>Answer Sheet</th>
                  <th>Status</th>
                  <th>Profile</th>
                </tr>
              </thead>
              
              <tbody>
             	 <?php
					$query="select * from test_result";
					$query_run=mysql_query($query);
					while($result=mysql_fetch_assoc($query_run)){
						$candidate_id=$result['candidate_id'];
						$result_id=$result['result_id'];
						$answer_sheet_id=$result['answer_sheet_id'];
						$status=$result['candidate_status'];
						
						$query_candidate_details="select * from candidate_register where candidate_id='$candidate_id' AND application_status='approved'";
						$query_candidate_details_run=mysql_query($query_candidate_details);
						while($result_candidate=mysql_fetch_assoc($query_candidate_details_run)){
				?>
                            <tr>
                              <td><?php echo $result_candidate['candidate_name'];?></td>
                              <td><a target="_blank" href="resume/<?php echo $result_candidate['candidate_cv'];?>">View CV</a></td>
                              <td><a target="_blank" href="view_candidate_answers.php?ans_id=<?php echo $answer_sheet_id;?>">View Answer sheet</a></td>
                              <td><?php echo $status; ?></td>
                              <!---->
                              <td><a target="_blank" href="admin_candidate_profile.php?candidate_id=<?php echo $candidate_id; ?>">View details</a></td>
                             
                            </tr>
               	<?php
						}
					}
				?>
                
                
              </tbody>
            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
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

