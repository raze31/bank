
<?php
	require('connection_db.php');

	if (isset($_POST['student_id'])) {

		$student_id=$_POST['student_id'];
		$student_name=$_POST['student_name'];
		$bdate=mysqli_real_escape_string($connectivity,$_POST['bdate']);
		$address=$_POST['address'];
		$year=$_POST['year'];
		$course_id=$_POST['course_id'];
		$course_name=$_POST['course_name'];

			$sql="UPDATE students SET student_id='$student_id',student_name='$student_name',bdate='$bdate',address='$address',year='$year' WHERE student_id=$student_id";
				if(mysqli_query($connectivity,$sql)){
					 $sql="UPDATE course SET course_id='$course_id',course_name='$course_name' WHERE course_id=$course_id";
						if(mysqli_query($connectivity,$sql)){
							$sql="UPDATE enrolled SET student_id='$student_id',course_id='$course_id' WHERE student_id=$student_id";
								if(mysqli_query($connectivity,$sql)){
									echo '<script type="text/javascript">alert("Student Succesfully Updated !");</script>';
									header('refresh:1; url=admin.php');
								}
						}
				}
				else{
					mysqli_error($connectivity);
				}

			
	}

	if (isset($_GET['student_id'])) {
		$student_id=$_GET['student_id'];
		$sql="SELECT * FROM students,course WHERE student_id=$student_id";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>
		<body style="background-color: lightblue">
		<b style="margin-left: 400px; font-size: 30px;">Student Data Update Form</b>
		<form style="margin-left: 400px; width: 250px;" action="update.php" method="POST">
			<input hidden type="Numbers" name="student_id" value=<?=$student_id?>><br/>
			Name:<input required type="text" name="student_name" value=<?=$row['student_name'];?>><br/>
			Birth Date:<input required type="date" name="bdate" value=<?=$row['bdate'];?>><br/>
			Address:<input required type="text" name="address" value=<?=$row['address'];?>><br/>
			Year:<input required type="text" name="year" value=<?=$row['year'];?>><br/>
			<input  hidden required type="Numbers" name="course_id" value=<?=$row['course_id'];?>><br/>
			Course Name:<input required type="text" name="course_name" value=<?=$row['course_name'];?>><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Update">
		</form>
		</body>
	<?php
	}
?>
