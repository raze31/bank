<?php
	require('connection_db.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();	
		header('Location:index.php');
		echo '<script type="text/javascript">alert("Logout Success");</script>';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>
	<div class="main">
		<div class="head">
			<center>
				<b class="headfont">Enrollment Management System</b><br>
			</center>
		</div>

		<div class="content">
				<div class="admin_imgcontainer">
						<b class="headfont">Admin Account</b><br><br>
		    			<img src="img/login.png" alt="Avatar" class="avatar2"><br><br>
		    		<div style="display: inline-flex;">
			    		<button class="reglink">
				    		<a class="reglink" href="register.php" style="color: white;">Enroll Student</a>
				    	</button>
			    		<form  action="#" method="POST">
							<input  style="text-decoration: none;padding: 13px 60px; margin-left: 20px; margin-top: 10px; background-color: #4CAF50; border: none; color: white;" type="submit" name="logout" value="Logout">
						</form>
					</div>
		 		 </div><br>

 	
		<?php
				$sql = "SELECT * FROM students";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "Student's data not found";
				}
				else {
		?>
					<br>
<div style="background-color:gray; float:right;margin-right: 80px; margin-top:5px;">
					<br>
					<b style="margin-left: 20px;">Officially Enrolled Students</b>
					<table style="margin-left: 10px; margin-right: 10px;" border="1px" >
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Birth Date</th>
							<th>Address</th>
							<th>Year</th>
							<th>Enroll Date</th>
							<th>Date Updated</th>
							<th>Update</th>
							
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['student_id'];?></td>
							<td><?=$row['student_name'];?></td>
							<td><?=$row['bdate'];?></td>
							<td><?=$row['address'];?></td>
							<td><?=$row['year'];?></td>
							<td><?=$row['regdate'];?></td>
							<td><?=$row['date_updated'];?></td>
							<td><a href="update.php?student_id=<?=$row['student_id']?>">UPDATE</a></td>


						</tr>
						<?php
					}
					?>
					</table>

				<?php
				}
			?> 

			<br><br>
			<hr>
			
</div>
<div style="background-color: gray; float: right;margin-right:180px; margin-top: 30px;">


			<?php
				$sql = "SELECT * FROM course";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "Course's data not found";
				}
				else {
		?>
					<br>
					<b style="margin-left: 20px;">Course and Course Name</b>
					<table style="margin-left: 10px; margin-right: 10px;" border="1px">
						<tr>
							<th>Course ID</th>
							<th>Course Name</th>
							
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['course_id'];?></td>
							<td><?=$row['course_name'];?></td>
						</tr>
						<?php
					}
					?>
					</table>
				<?php
				}
			?> 
			<br><br>
			<hr>

</div>
<div style="background-color: gray; float: right; margin-right:180px; margin-top: 30px;">
			<?php
				$sql = "SELECT * FROM enrolled";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "No Officially Enrolled Found";
				}
				else {
		?>
					<br>
					<b style="margin-left: 20px;">Student and Course ID</b>
					<table style="margin-left: 10px; margin-right: 10px;" border="1px">
						<tr>
							<th>Student ID</th>
							<th>Course ID</th>
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['student_id'];?></td>
							<td><?=$row['course_id'];?></td>
						</tr>
						<?php
					}
					?>
					</table>
				<?php
				}
			?> 
			<br><br>
			<hr>

</div>







































		 		 	








	

























































		</div>	
	</div>
</body>
</html>