<?php
	session_start();
	//$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
	session_destroy();
	header('location:index.php');
?>