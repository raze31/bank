
<?php
	session_start();
	require('connection_db.php');

	if (isset($_POST['addenrolledbtn'])) {
		$student_id=mysqli_real_escape_string($connectivity,$_POST['student_id']);
		$sub_id=mysqli_real_escape_string($connectivity,$_POST['sub_id']);

				

				$Database="INSERT INTO enrolled(student_id,sub_id)VALUES('$student_id','$sub_id')";
				if(mysqli_query($connectivity,$Database))
				{
					echo '<script type="text/javascript">alert("Student Officially Enrolled !");</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("!! May be SQL query wrong");</script>';
					echo mysqli_error($connectivity);
				}
			}
	
?>

<!DOCTYPE html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div  class="main">
		<div class="head">
			<center>
				<b class="headfont">Enrollment Management System</b>
			</center>
		</div>
		<div class="content">
			<div class="regform" >
				<form class="enrollform" action="enrolled.php" method="POST" style="border:1px solid #ccc">
			  		<div class="container">
			    		<h1>ADD STUDENTS TO OFFICIALLY ENROLLED</h1>
			    		<hr>
			    		<label for="student_id">Student id #</label>
					    <input type="Numbers" placeholder="Last Five Numbers of Student ID" name="student_id" required>

					    <label for="sub_id">Subject Code</label>
					    <input type="Numbers" placeholder="Enter Subject Code" name="sub_id" required>

					   

					    <div class="clearfix">
					      
					      	<br><a href="admin.php" class="cancelbtn"> Cancel</a>
					      
					      <button type="submit" class="signupbtn" name="addenrolledbtn">Enroll</button>
					    </div>
		  			</div>
				</form>
			</div>




































		</div>	
	</div>
</body>
</html>