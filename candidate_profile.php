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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Approved">
          <a class="nav-link" href="candidate_profile.php">
            <i class="fa fa-fw fa-bookmark"></i>
            <span class="nav-link-text">Profile</span>
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
    	<!---->
        <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register as Visitor</div>
      <div class="card-body">
        <form action="candidate_register.php?ok" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" name="lname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Address</label>
                <input class="form-control" id="exampleInputAddress" type="text" name="address" placeholder="Address" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Contact</label>
                <input class="form-control" id="exampleInputContact" type="text" name="contact" placeholder="Phone" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" required placeholder="Enter email">
          </div>
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
			if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])){
				$vistor_fname=$_POST['fname'];
				$vistor_lname=$_POST['lname'];
				$vistor_address=$_POST['address'];
				$vistor_contact=$_POST['contact'];
				$vistor_email=$_POST['email'];
				$vistor_username=$_POST['username'];
				$vistor_password=$_POST['password'];
				$vistor_cpassword=$_POST['cpassword'];
        $regex="/^[0-9]+$/";
  if(!$vistor_fname || !  $vistor_lname || !$vistor_address || !$vistor_email || !$vistor_username || !$vistor_password || !$vistor_cpassword ){
    echo "<script>alert('Please fill all fields');</script>"; 
  }
  
 
  else if (!filter_var($vistor_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email');</script>";
  }
  else if($vistor_password != $vistor_cpassword) { 
    echo "<script>alert('Password & Confirm Password fields does not match !');</script>";
  }
  else if(strlen($vistor_password) <= 4) { 
    echo "<script>alert('Password should be atleast 5 characters');</script>";
  }
  else if(!preg_match($regex, $vistor_contact) || (strlen($vistor_contact)!=10)){
    echo "<script>alert('Invalid phone number');</script>";
  }
  else {
				
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
				if($candidate_password!=$vistor_cpassword){
					
					?>
					<script>
                        document.location.href = 'visitor_register.php?error=password';
                    </script>
                    <?php
					//header('location:location:visitor_register.php?error=password');
				}
				if(($vistor_password==$vistor_cpassword)&&($error_flag!=2)){
					//new username and password accpeted
					$new_visitor_id='v'.date("his").rand(10,1000);//creating unique visitor id
					$query_visitor_login="INSERT INTO `visitor_login`(`visitor_id`, `visitor_username`, `visitor_password`) VALUES ('$new_visitor_id','$vistor_username','$vistor_password')";
					$query_visitor_login_run=mysql_query($query_visitor_login);
					
					//adding user details to database
					$query_reg="INSERT INTO `visitor_register`(`visitor_id`, `visitor_fname`, `visitor_lname`, `visitor_address`, `visitor_email`, `visitor_contact`) VALUES ('$new_visitor_id','$vistor_fname','$vistor_lname','$vistor_address','$vistor_email','$vistor_contact')"; 
					$query_reg_run=mysql_query($query_reg);
					
					if($query_visitor_login_run && $query_reg_run){
						//making the service provider log in automaticaly and starting the session
						$_SESSION['userid']='visitor';
						$_SESSION['id']=$new_visitor_id;
						//echo 'success';
						?>
						<script>
                            document.location.href = 'visitor_home.php';
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
          <a class="d-block small mt-3" href="index.php">Login Page</a>
          <!--<a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
        </div>
      </div>
    </div>
  </div>
        <!---->
      
     <?php
	 	if(isset($_POST['keyword'])){
	 ?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Results  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Industry</th>
                  <th>Address</th>
                  <th>Category</th>
                  <th>Visiting Days</th>
                  <th>Visiting Hours</th>
                  <th>Booking</th>
                </tr>
              </thead>
              <!--<tfoot>
                <tr>
                  <th>Service Provider</th>
                  <th>Status</th>
                  <th>Approve</th>
                  <th>Approve</th>
                  <th>Reject</th>
                  <th>Profile</th>
                </tr>
              </tfoot>-->
              <tbody>
             	 <?php
				 	$keyword=$_POST['keyword'];
					$query="select * from industry_register WHERE industry_name='$keyword' OR industry_category='$keyword' OR industry_location='$keyword'";
					$query_run=mysql_query($query);
					while($result=mysql_fetch_assoc($query_run)){
				?>
                        <tr>
                          <td><?php echo $result['industry_name'];?></td>
                          <td><?php echo $result['industry_address'];?></td>
                          <td><?php echo $result['industry_category'];?></a></td>
                          <td><?php echo $result['visiting_days'];?></a></td>
                          <td><?php echo $result['visiting_hours'];?></td>
                          <td><a href="industry_profile.php?industry_id=<?php echo $result['industry_id'];?>">View details</a></td>
                        </tr>
               	<?php
					}
				?>
              </tbody>
            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
      <?php
		}else{
			echo "Welcome to Industrial Visit Planning and Booking site.<br>";
			
			echo "You can search for industries using;<br>Industry Name<br>Location<br>Category";
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

