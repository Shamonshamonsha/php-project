<?php 
	include('dbconnect.php');
	include ('session.php');
	if(isset($_SESSION['userid'])){
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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">


  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Confirm action</div>
      <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Are you sure you want to delete the question?</label>
          </div>		  
          <a href="view_questions.php" class="btn btn-secondary btn-block" type="submit" class="btn btn-primary">Cancel</a>
          <a href="delete_question.php?del_id=<?php echo $_GET['q_id']; ?>" class="btn btn-danger btn-block" type="submit" class="btn btn-primary">Delete</a>
        <div class="text-center">
        	<?php
				if(isset($_GET['del_id'])){
					$id=$_GET['del_id'];
					$query="DELETE FROM `questions` WHERE `question_id`='$id'";
					$query_run=mysql_query($query);
					if($query_run){
						header('location:view_questions.php?flag=del_ok');
					}else{
						header('location:view_questions.php?flag=del_error');
					}
				}
			?>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
