<?php 
	include('dbconnect.php');
	include ('session.php');
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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Candidates register here</div>
      <div class="card-body">
        <form action="candidate_register.php?ok" method="post">
          <div class="form-group">
            <label for="exampleInputName">Username</label>
                <input class="form-control" id="exampleUsername" name="username" type="text" aria-describedby="nameHelp" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password" name="cpassword" required>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Register</button>
        </form>
        <?php
			if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['cpassword'])){
				$candidate_username=$_POST['username'];
				$candidate_password=$_POST['password'];
				$candidate_cpassword=$_POST['cpassword'];
          if(!$candidate_username|| !$candidate_password|| !$candidate_cpassword){
    echo "<script>alert('Please fill all fields');</script>"; 
  }
  else if($candidate_cpassword != $candidate_password) { 
    echo "<script>alert('Password & Confirm Password fields does not match !');</script>";
  }
  else if(strlen($candidate_password) <= 4) { 
    echo "<script>alert('Password should be atleast 5 characters');</script>";
  }
			else{	
				$error_flag=0;
				//checking if username exist
				$query_username_check="select * from candidate_login";
				$query_username_check_run=mysql_query($query_username_check);
				while($result=mysql_fetch_assoc($query_username_check_run)){
					if($candidate_username==$result['candidate_username']){
						$error_flag=2;
						?>
						<script>
							document.location.href = 'candidate_register.php?error=username_exist';
						</script>
                        <?php
					}
				}
				if($candidate_password!=$candidate_cpassword){
					
					?>
					<script>
                        document.location.href = 'candidate_register.php?error=password';
                    </script>
                    <?php
				}
				if(($candidate_password==$candidate_cpassword)&&($error_flag!=2)){
					//new username and password accpeted
					$new_candidate_id='c'.date("his").rand(10,1000);//creating unique candidate id
					$query_candidate_login="INSERT INTO `candidate_login`(`candidate_id`, `candidate_username`, `candidate_password`) VALUES ('$new_candidate_id','$candidate_username','$candidate_password')";
					$query_candidate_login_run=mysql_query($query_candidate_login);
					
					if($query_candidate_login_run){
						//making the candidate log in automaticaly and starting the session
						$_SESSION['userid']='candidate';
						$_SESSION['id']=$new_candidate_id;
						?>
						<script>
                            document.location.href = 'candidate_home.php';
                        </script>
                        <?php
					}else{
						echo 'Error. Try Again.';
					}
				}
				
			}
			
			
			if(isset($_GET['error'])){
			   if($_GET['error']=='username_exist'){
				   ?>
                   	<div class="text-center" style="color:#F00">
                    	Username already exist. Try again.
                    </div>
                   <?php
				   
			   }
				if($_GET['error']=='password'){
					?>
                   	<div class="text-center" style="color:#F00">
                    	Passwords not matching. Try again.
                    </div>
                   <?php
			   }
			}
      }
		?>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <!--<a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
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
