<!DOCTYPE html>
<html>
<body style="background-image:url(doctordesk.jpg)">
<link rel="stylesheet" href="admin.main.css">
	<form action="admin.alogin.php" method="post">
	<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong> Admin Login</strong></li>
					<li><a href="index.php">Home</a></li>
				</ul>
	</div>
	<div class="sucontainer">
		<label><b>Username:</b></label><br>
		<input type="text" placeholder="Enter Username" name="uname" required><br>
	
		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Enter Password" name="pass" required><br><br>
		
		<div class="container" style="background-color:grey">
			<button type="submit" name="submit" style="float:right">Log In</button>
		</div>

<?php 
function SignIn() 
{ 
session_start();
{  
	if($_POST['uname']=='admin' && $_POST['pass']=='admin') 
	{ 
		$_SESSION['userName'] = 'admin'; 
		echo "Logging in";
		header( "Refresh:3; url=admin.mainpage.php");
	} 
	else { 
		echo "Wrong Username/Password!"; 
		} 
	}
	} 
	if(isset($_POST['submit'])) 
	{ 
		SignIn(); 
	} 
?>


</body>
</html>