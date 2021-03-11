
<?php
	session_start();
	require('connection_db.php');

	if (isset($_POST['regbtn'])) {
		$student_id=mysqli_real_escape_string($connectivity,$_POST['student_id']);
		$student_name=mysqli_real_escape_string($connectivity,$_POST['student_name']);
		$bdate=mysqli_real_escape_string($connectivity,$_POST['bdate']);
		$address=mysqli_real_escape_string($connectivity,$_POST['address']);
		$year=mysqli_real_escape_string($connectivity,$_POST['year']);
		$course_id=mysqli_real_escape_string($connectivity,$_POST['course_id']);
		$course_name=mysqli_real_escape_string($connectivity,$_POST['course_name']);

				$Database="INSERT INTO students(student_id,student_name,bdate,address,year)VALUES('$student_id','$student_name','$bdate','$address','$year')";
				if(mysqli_query($connectivity,$Database)){
					$Database="INSERT INTO course(course_id,course_name)VALUES('$course_id','$course_name')";
						if(mysqli_query($connectivity,$Database)){
							$Database="INSERT INTO enrolled(student_id,course_id)VALUES('$student_id','$course_id')";	
								if(mysqli_query($connectivity,$Database)){
									echo '<script type="text/javascript">alert("Student Succesfully Registered !");</script>';	
								}
						}
				}
				else{
					echo '<script type="text/javascript">alert("Student or Course ID already registered");</script>';
				}
			}	
?>

<!DOCTYPE html>
	<head>
		<title>Enrollment Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript">
	    function validateregisterform(){
	      var student_id = document.getElementById("student_id");

	      if(student_id.length>6){
	        alert('Student ID must not exceed 5 characters long.');
	      }
	  </script>
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
				<form class="enrollform" action="register.php" method="POST" style="border:1px solid #ccc">
			  		<div class="container">
			    		<h1>ENROLL STUDENTS</h1>
			    		<hr>
			    		&nbsp
			    		<label for="student_id">Student id #</label>
					    <input type="Numbers" placeholder="Last Five Numbers of Student ID" name="student_id" maxlength="5" required>

					    <label for="student_name">Fullname</label>
					    <input type="text" placeholder="Enter fullname" name="student_name" required>

					     &nbsp&nbsp&nbsp&nbsp&nbsp
					    <label for="bdate">Birthdate</label>
					    <input type="date"  name="bdate" required>

					    &nbsp&nbsp
					    <label for="address">Address</label>
					    <input type="text" placeholder="Residential Address" name="address" required><br>

					    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					    <label for="year">Year</label>
					    <select required class="input"" name="year">
													<option type="button" value=1>1st Year</option>
													<option type="button" value=2>2nd Year</option>
													<option type="button" value=3>3rd Year</option>
													<option type="button" value=4>4th Year</option>
												</select>
						<hr>
						<p>Add Course Informations :</p>

						<label for="course_id">Course id #</label>
					    <input type="Numbers" placeholder="" name="course_id" maxlength="5" required>

					    <label for="course_name">Course Name</label>
						<select required class="input"" name="course_name">
													<option value="BSIT">BSIT</option>
													<option value="BSED">BSED</option>
													<option value="BSMATH">BSMATH</option>
													<option value="FI">FI</option>
												</select>

					    <div class="clearfix">
					      
					      	<br><a href="admin.php" class="cancelbtn"> Cancel</a>
					      <button type="submit" class="signupbtn" name="regbtn" onclick="validateregisterform()">Enroll Now</button>
					    </div>
		  			</div>
				</form>
			</div>




































		</div>	
	</div>
</body>
</html>