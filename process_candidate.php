<?php 
	include('dbconnect.php');
	include ('session.php');
	if(isset($_SESSION['userid'])){
		if($_SESSION['userid']!='admin'){
			header('location:admin_home.php');
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
      <div class="card-header">Process Candidate Application</div>
      <div class="card-body">
        <form method="post" action="process_candidate.php">
          <?php
		  	$candidate_id=@$_GET['candidate_id'];
		  	$query_candidate_details="select * from candidate_register where candidate_id='$candidate_id'";
			$query_candidate_details_run=mysql_query($query_candidate_details);
			$result_register=mysql_fetch_assoc($query_candidate_details_run);
		  ?>
          <div class="form-group">
              <div class="form-row">
              	<div class="col-md-12" align="center">
               	 <label for="exampleInputPassword1"><strong><?php echo $result_register['candidate_name']; ?></strong></label>
              	</div>
              </div>
          </div>
          <div class="form-group">
              <div class="form-row">
              	<div class="col-md-12" align="center">
               	 <label for="exampleInputPassword1">Personality Identified</label>
                 <hr />
              	</div>
              </div>
          </div>
          <div class="form-group">
              <div class="form-row">
               	 <ul>
                 <?php
				 	$ans_sheet_id=@$_GET['ans_id'];
				 	$get_personality="SELECT * FROM `candidate_answers` WHERE `answer_sheet_id`='$ans_sheet_id'";
					$get_personality_run=mysql_query($get_personality);
					$result_personality=mysql_fetch_assoc($get_personality_run);
					$i=1;
					
					while($i<=10){
						?>
                        <li><label for="exampleInputPassword1"><?php echo $result_personality['user_answer_'.$i]; ?></label></li><?php
						$i=$i+1;
					}
				 ?>
                 </ul>
              </div>
          </div>
          
          <hr />
          <div class="form-group">
            <label for="exampleInputEmail1">Application status</label>
            <select class="form-control" name="application_status">
                <option value="approved">Approve</option>
                <option value="rejected">Reject</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Remarks</label>
             <textarea class="form-control" required name="remark"></textarea>
          </div>
          <input name="candidate_id" type="hidden" value="<?php echo $candidate_id; ?>" />
          <button class="btn btn-primary btn-block" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="text-center">
        	<?php
				if(isset($_POST['application_status'])&& isset($_POST['remark'])){
					$remark_id='re'.date("his").rand(10,100);//creating unique remark id
					$candidate_id=$_POST['candidate_id'];
					$app_status=$_POST['application_status'];
					$remark=$_POST['remark'];
					$query="INSERT INTO `admin_remark`(`remark_id`, `candidate_id`, `application_status`, `remark`) VALUES ('$remark_id','$candidate_id','$app_status','$remark')";
					$query_run=mysql_query($query);
					
					$query_update_register="UPDATE `candidate_register` SET `application_status`='$app_status' WHERE `candidate_id`='$candidate_id' ";
					$query_update_register_run=mysql_query($query_update_register);
					
					$update_testresult="UPDATE `test_result` SET `candidate_status`='$app_status' where `candidate_id`='$candidate_id'";
					$update_testresult_run=mysql_query($update_testresult);
					
					if($query_run && $query_update_register_run){
						header('location:admin_home.php?flag=processed');
					}else{
						header('location:admin_home.php?flag=not_processed');
					}
					
				}
			?>
          <a class="d-block small mt-3" href="admin_home.php">Home</a>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>