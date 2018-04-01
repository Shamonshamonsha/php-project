<?php
	include('dbconnect.php');
	include ('session.php');
	if(isset($_SESSION['userid'])){
		if($_SESSION['userid']!='candidate'){
			header('location:index.php');
		}
	}
	
	if(isset($_POST['user_answer_1'])){
		$x=1;
		echo $candidate_id=$_SESSION['id'];
		$new_answersheet_id='ans'.date("his").rand(10,100);//creating unique answersheet id
		$query_begin_save="INSERT INTO `candidate_answers`(`answer_sheet_id`, `candidate_id`) VALUES ('$new_answersheet_id','$candidate_id')";
		$query_begin_save_run=mysql_query($query_begin_save);
		if(!$query_begin_save_run){
			header('location:attend_test.php?flag=not_saved');
		}
		echo mysql_error();
		$total_mark = 0;
		while($x<=10){
			
			$q_id_field='question_id_'.$x;
			$answer_field='user_answer_'.$x;
			$q_id=$_POST['question_id_'.$x];
			$answer=explode('@',$_POST['user_answer_'.$x]);
			$query_update_answer="UPDATE `candidate_answers` SET `$q_id_field`='$q_id',`$answer_field`='$answer[0]' where answer_sheet_id='$new_answersheet_id'";
			$query_update_answer_run=mysql_query($query_update_answer);
			$total_mark =$total_mark+$answer[1];
			$x=$x+1;
			echo mysql_error();
		}

		echo $total_mark;

		mysql_query("UPDATE `candidate_answers` SET `total_mark`='$total_mark' WHERE answer_sheet_id='$new_answersheet_id' ");


		if($query_begin_save_run && $query_update_answer_run){
			//alert the admin of new application
			$result_id='re'.date("his").rand(10,1000);//creating unique result id
			$query_testresult="INSERT INTO `test_result`(`result_id`, `candidate_id`, `candidate_status`, `answer_sheet_id`) VALUES ('$result_id','$candidate_id','null','$new_answersheet_id')";
			$query_testresult_run=mysql_query($query_testresult); 
			header('location:candidate_home.php?flag=saved');
		} 
		
	}
?>