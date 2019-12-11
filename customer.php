<?php 
if(isset($_POST['submit']))
{
	include_once 'database.php';

	$customerUsername = mysqli_real_escape_string($conn, $_POST['customerUsername']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
 	
 	
 	// Error handlers
 	// CHeck for empty fields
 	if(empty($customerUsername) || empty($pwd) || empty($name) || empty($email))
 	{
 		header("Location: ../Barbers/signup.php?signup=empty");
 		exit();
 	}
 	else
 	{
 		// check if input is valid
 		if(!preg_match("/^[a-zA-Z0-9]*$/", $customerUsername) || !preg_match("/^[a-zA-Z ]*$/", $name))
 		{
 			header("Location: ../Barbers/signup.php?signup=invalid");
 			exit();
 		}
 		else
 		{
 			// check if email is valid
 			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
 			{
 				header("Location: ../Barbers/signup.php?signup=email");
 				exit();
 			}
 			else
 			{
 				$sql = "SELECT * FROM customer WHERE CustomerUsername= '$customerUsername'";
 				$result = mysqli_query($conn, $sql);
 				$resultCheck = mysqli_num_rows($result);

 				if($resultCheck > 0)
 				{
 					header("Location: ../Barbers/signup.php?signup=usertaken");
 					exit();
 				}
 				else
 				{
 					// Hashing password
 					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 					// Insert the user into the database
 					$sql = "INSERT INTO customer(CustomerUsername, Password, Name, Email) VALUES ('$customerUsername', '$pwd', '$name', '$email');";
 					mysqli_query($conn, $sql);
					
 					header("Location: ../Barbers/login.php?signup=success");
 					exit();
 				}

 			}
 		}
 	}
 }
 else
 {
 	header("Location: ../Barbers/signup.php");
 	exit();
 }
 ?>