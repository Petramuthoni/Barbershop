<?php
session_start();
if(isset($_POST['submit']))
{
	include_once 'database.php';
	$customerUsername= mysqli_real_escape_string($conn, $_POST['customerUsername']);
	$email= mysqli_real_escape_string($conn, $_POST['email']);
	$pwd= mysqli_real_escape_string($conn, $_POST['pwd']);
	// Error handlers
	// check if input are empty
	if(empty($customerUsername) || empty($pwd))
	{
		header("Location: ../Barbers/login.php?login=empty");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM customer WHERE CustomerUsername= '$customerUsername' #OR Email = '$E-mail'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1)
		{
			header("Location: ../Barbers/login.php?login=error");
			//echo("Wrong username/password");
			exit();
		}
		else
		{
			if($row = mysqli_fetch_assoc($result))
			{
				$sqls = "SELECT * FROM customer WHERE Password= '$pwd' #OR Email = '$E-mail'";
				$results2 = mysqli_query($conn, $sqls);
				$resultCheck2 = mysqli_num_rows($results2);
				if($resultCheck2 < 1)
				{
					header("Location: ../Barbers/login.php?login=errors");
					exit();
				}
				else
				{
					$_SESSION['u_id'] = $row['CustomersID'];
					$_SESSION['u_uid'] =  $row['CustomerUsername'];
					$_SESSIOM['u_password'] = $row['Password'];
					$_SESSION['u_name'] =  $row['Name'];
					$_SESSION['u_email'] =  $row['Email'];
					header("Location: ../Barbers/index.php?login=success");
					exit();
				}
			}
		}
	}
}
else
{
	header("Location: ../Barbers/login.php?login=error");
	exit();
}
?>