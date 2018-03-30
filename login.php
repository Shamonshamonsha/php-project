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
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="login.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" name="username" id="exampleInputEmail1" type="text" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password" required>
          </div>
          <button class="btn btn-primary btn-block" type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="text-center">
        	<?php
				if(isset($_POST['username'])&& isset($_POST['password'])){
					$query="select * from admin_login";
					$query_run=mysql_query($query);
					while($result=mysql_fetch_assoc($query_run)){
						//$enc_password=md5($_POST['admin_password']);
						if($_POST['username']==$result['admin_username'] && $result['admin_password']==$_POST['password']){
							$_SESSION['userid']='admin';
							header('location:admin_home.php');
						}
					}
					$query_candidate="select * from candidate_login";
					$query_candidate_run=mysql_query($query_candidate);
					while($result=mysql_fetch_assoc($query_candidate_run)){
						if($_POST['username']==$result['candidate_username'] && $_POST['password']==$result['candidate_password']){
							$_SESSION['userid']='candidate';
							$_SESSION['id']=$result['candidate_id'];
							header('location:candidate_home.php');
						}
					}
					 //Error message will only be seen if login not succesfull
					?><span style="color:#F00;">Error in login</span><?php
				}
			?>
          <a class="d-block small mt-3" href="candidate_register.php">Register Here</a>
          <a class="d-block small mt-3" href="index.php">Home</a>
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
