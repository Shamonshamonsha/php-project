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
    <a class="navbar-brand" href="candidate_home.php">Personality Prediction : Admin</a>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rejected">
          <a class="nav-link" href="add_questions.php">
            <i class="fa fa-fw fa-plus"></i>
            <span class="nav-link-text">Add Questions</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rejected">
          <a class="nav-link" href="view_questions.php">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">View Questions</span>
          </a>
        </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2" action="candidate_home.php" method="post">
            <div class="input-group">
              <input class="form-control" type="text" name="keyword" placeholder="Search industry" required>
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
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
		
			$edit_qid=@$_GET['q_id'];
			$query_get_question="select * from questions where question_id='$edit_qid'";
			$query_get_question_run=mysql_query($query_get_question);
			while($result=mysql_fetch_assoc($query_get_question_run)){
		?>
            <!---->
            <div class="card card-register mx-auto mt-5">
              <div class="card-header">Edit Question for Online Test</div>
              <div class="card-body">
                <form action="edit_question.php?edit_id=<?php echo $edit_qid; ?>" method="post">
                <div class="form-group">
                    <label>Question</label>
                    <textarea class="form-control" name="question_number" required placeholder="Enter question number"><?php echo $result['question_number']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Question</label>
                    <textarea class="form-control" name="question" required placeholder="Enter question"><?php echo $result['question']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-4">
                        <label >Option 1</label>
                        <textarea class="form-control" name="option1" required placeholder="Enter first option"><?php echo $result['option_1']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label >Personality Marker</label>
                        <textarea class="form-control" name="quality1" required placeholder="Enter quality"><?php echo $result['personality_marker_1']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label >Rank</label>
                        <input type="textfield" class="form-control" name="mark1"  value="<?php echo $result['mark1']; ?>"  required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-4">
                        <label >Option 2</label>
                       <textarea class="form-control" name="option2" required placeholder="Enter second option"><?php echo $result['option_2']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label>Personality Marker</label>
                        <textarea class="form-control" name="quality2" required placeholder="Enter quality"><?php echo $result['personality_marker_2']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label >Rank</label>
                        <input type="textfield" class="form-control" name="mark2"  value="<?php echo $result['mark2']; ?>"  required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-4">
                        <label >Option 3</label>
                        <textarea class="form-control" name="option3" required placeholder="Enter third option"><?php echo $result['option_3']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label>Personality Marker</label>
                        <textarea class="form-control" name="quality3" required placeholder="Enter quality"><?php echo $result['personality_marker_3']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label >Rank</label>
                        <input type="textfield" class="form-control" name="mark3"  value="<?php echo $result['mark3']; ?>"  required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-4">
                        <label >Option 4</label>
                        <textarea class="form-control" name="option4" required placeholder="Enter fourth option"><?php echo $result['option_4']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label >Personality Marker</label>
                        <textarea class="form-control" name="quality4" required placeholder="Enter quality"><?php echo $result['personality_marker_4']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label >Rank</label>
                        <input type="textfield" class="form-control" name="mark4"  value="<?php echo $result['mark4']; ?>"  required>
                      </div>
                    </div>
                  </div>
                  
                  <button class="btn btn-primary btn-block" type="submit">Save</button>
                </form>
                
			
		  
                <?php
				}//end while loop of initial query
				if(isset($_POST['question'])&&isset($_POST['option1'])&&isset($_POST['quality1'])){
					$question_id=$_GET['edit_id'];
					$question_number=$_POST['question_number'];
					$question=$_POST['question'];
					$option1=$_POST['option1'];
					$option2=$_POST['option2'];
					$option3=$_POST['option3'];
					$option4=$_POST['option4'];
					$quality1=$_POST['quality1'];
					$quality2=$_POST['quality2'];
					$quality3=$_POST['quality3'];
          $quality4=$_POST['quality4'];
          $mark4 = $_POST['mark4'];
          $mark3 = $_POST['mark3'];
          $mark2 = $_POST['mark2'];
          $mark1 = $_POST['mark1'];
					
					//updating question to database
					$query_update="UPDATE `questions` SET `question_number`='$question_number', `question`='$question',`option_1`='$option1',`personality_marker_1`='$quality1',`option_2`='$option2',`personality_marker_2`='$quality2',`option_3`='$option3',`personality_marker_3`='$quality3',`option_4`='$option4',`personality_marker_4`='$quality4',`mark4`='$mark4',`mark3`='$mark3',`mark2`='$mark2',`mark1`='$mark1' WHERE `question_id`='$question_id'"; 
					$query_update_run=mysql_query($query_update);
					
					if($query_update_run){
						?>
					    <script>
							document.location.href = 'view_questions.php?flag=edit_ok';
						</script>
						<?php
				   }else{
					    echo 'Error. Try Again.';
					}
				}
                ?>
                
              </div>
            </div>
          </div>
          
        <!---->
      <br>
     
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

