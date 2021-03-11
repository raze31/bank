<?php
	require('connection_db.php');
	session_start();
	if (isset($_GET['student_id'])) {
				$student_id=$_GET['student_id'];

			$sql="DELETE  FROM enrolled WHERE student_id=$student_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:admin.php');
			}
			else{
				mysqli_error($connectivity);
			}
		}

	if (isset($_GET['course_id'])) {
				$course_id=$_GET['course_id'];

			$sql="DELETE  FROM course WHERE course_id=$course_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:admin.php');
			}
			else{
				mysqli_error($connectivity);
			}
		}
	
	
?>