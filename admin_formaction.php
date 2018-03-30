<?php 
	include('dbconnect.php');
	
	if(isset($_GET['approve_id'])){
		$industry_id=$_GET['approve_id'];
		$query_approve_industry="UPDATE `admin_approval` SET `status`='approved' WHERE `industry_id`='$industry_id'";
		$query_approve_industry_run=mysql_query($query_approve_industry);
		if($query_approve_industry_run==1){
			header('location:admin_home.php');
		}else echo 'error';
	}
	if(isset($_GET['reject_id'])){
		$industry_id=$_GET['reject_id'];
		$query_approve_industry="UPDATE `admin_approval` SET `status`='rejected' WHERE `industry_id`='$industry_id'";
		$query_approve_industry_run=mysql_query($query_approve_industry);
		if($query_approve_industry_run==1){
			header('location:admin_home.php');
		}else echo 'error';
	}
	
	//previously approved industry is rejected now
	if(isset($_GET['update_reject_id'])){
		$industry_id=$_GET['update_reject_id'];
		$query_approve_industry="UPDATE `admin_approval` SET `status`='rejected' WHERE `industry_id`='$industry_id'";
		$query_approve_industry_run=mysql_query($query_approve_industry);
		if($query_approve_industry_run==1){
			header('location:approved_industry.php');
		}else echo 'error';
	}
	//previously rejected industry is approved now
	if(isset($_GET['update_approve_id'])){
		$industry_id=$_GET['update_approve_id'];
		$query_approve_industry="UPDATE `admin_approval` SET `status`='approved' WHERE `industry_id`='$industry_id'";
		$query_approve_industry_run=mysql_query($query_approve_industry);
		if($query_approve_industry_run==1){
			header('location:rejected_industry.php');
		}else echo 'error';
	}
		
	
?>