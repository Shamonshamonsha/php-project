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
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
  	if(isset($_GET['flag'])){
		if($_GET['flag']=='del_ok'){
			?>
            <script>alert('Question deleted succesfully.'); </script>
            <?php
		}
		if($_GET['flag']=='del_error'){
			?>
            <script>alert('Error in deleting.Try again.'); </script>
            <?php
		}
		if($_GET['flag']=='add_ok'){
			?>
            <script>alert('Question added succesfully.'); </script>
            <?php
		}
        if($_GET['flag']=='edit_ok'){
			?>
            <script>alert('Question updated successfully.'); </script>
            <?php
		}
	}
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
     
     <?php
		$question_flag=0;//to check if any question present in database
		$query_get_questions="select * from questions ORDER BY `question_number` ASC;";
		$query_get_questions_run=mysql_query($query_get_questions);
		while($result=mysql_fetch_assoc($query_get_questions_run)){
			$question_flag=1;
		?>
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-book"></i> Question <?php echo $result['question_number'];?> 
            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-body">
                      <h2 class="card-title"><?php echo $result['question']; ?></h2>
                      <p class="card-text"><?php echo 'Option 1 : '.$result['option_1']; ?> </p>
                      <p class="card-text"><?php echo 'Personality Marker 1 : '.$result['personality_marker_1']; ?> </p>
                      <p class="card-text"><?php echo 'Rank : '.$result['mark1']; ?> </p>
                      <hr>
                      <p class="card-text"><?php echo 'Option 2 : '.$result['option_2']; ?> </p>
                      <p class="card-text"><?php echo 'Personality Marker 2 : '.$result['personality_marker_2']; ?> </p>
                      <p class="card-text"><?php echo 'Rank : '.$result['mark2']; ?> </p>
                      <hr>
                      <p class="card-text"><?php echo 'Option 3 : '.$result['option_3']; ?> </p>
                      <p class="card-text"><?php echo 'Personality Marker 3 : '.$result['personality_marker_3']; ?> </p>
                      <p class="card-text"><?php echo 'Rank : '.$result['mark3']; ?> </p>
                      <hr>
                      <p class="card-text"><?php echo 'Option 4 : '.$result['option_4']; ?> </p>
                      <p class="card-text"><?php echo 'Personality Marker 4 : '.$result['personality_marker_4']; ?> </p>
                      <p class="card-text"><?php echo 'Rank : '.$result['mark4']; ?> </p>
                      <hr>
                    </div>
                </div>
                <!--action links-->
                <div align="left" class="row">
                  <div class="col-md-8"></div>
				  <div class="col-md-2">
					<!--<a href="delete_question.php?q_id=<?php echo $result['question_id'];?>" class="btn btn-danger btn-sm">Delete Question</a>-->
                  </div> 
                  <div class="col-md-2">
                    <a href="edit_question.php?q_id=<?php echo $result['question_id'];?>" class="btn btn-dark btn-sm">Edit Question</a>
                  </div>
                               
               </div>
                <!--action links end-->
               
            </div>
           
            <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
          </div>
          <hr>
      <?php
		}
		if($question_flag==0){
			echo 'No questions in database.';
		}
		   
	   ?>
      
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

