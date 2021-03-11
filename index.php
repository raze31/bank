<?php
  session_start();
    if(isset($_SESSION['login']))
    {
      header('Location:'.$_SESSION['login'].".php");
    }
    elseif(isset($_SESSION['message']))
    { 
      echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
      header('Refresh:0');
      session_destroy();
    }
    elseif(isset($_SESSION['error']))
    {
      echo '<script type="text/javascript">alert("'.$_SESSION['error'].'");</script>';
      header('Refresh:0');
      session_destroy();
    }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript">
    function validateform(){
      var username = document.myform.username.value;
      var password = document.myform.password.value;
      if(username == "admin" && password=="admin"){
        alert("login Success!");
      }
      else if (username==null || username==""){  
        alert('Username or password cannot be empty!');
      }else if (password.length<3){
        alert('Password must be at least 3 characters long.');
      }
      else{
        alert("Invalid Credentials !");
      }


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
<!--Login Panel-------------------------------------------->
      <div class="logform" >
        <form name="myform" method="post" action="login_check.php">
          <div class="imgcontainer">
          <br>
             <img src="img/login.png" alt="Avatar" class="avatar">
          </div>

            <div class="container">
              <center>
                <input type="text" placeholder="Enter Username" name="username" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button type="submit" name="login" id="login" onclick="validateform()">Login</button>
                </center>
            </div>
        </form> 
      </div>
    </div>
  </div>

</body>
</html>