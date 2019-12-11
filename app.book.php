<?php
session_start();
if(isset($_POST['submit']))
{
		
		include 'admin.dbconfig.php';
		$name=$_POST['Name'];
		$date=$_POST['Date'];
		$phone=$_POST['Phone'];
		$cid=$_SESSION['u_id'];
		$status="Booking Registered.";
		$sql = "INSERT INTO Reservation (CustomersID,Name,Phone,Date,Status) VALUES ('$cid','$name','$phone','$date','$status')";
		
		if(isset($_SESSION['u_id']))
		{
			if(!empty($_POST['Name']) &&!empty($_POST['Date']) && !empty($_POST['Phone']))
			{
				$checkday = strtotime($date);
				$compareday = date("l", $checkday);
				$flag=0;
				require_once("admin.dbconfig.php");
			
				if (mysqli_query($conn, $sql)) 
				{
					echo "<h2>Booking successful!! Redirecting to home page....</h2>";
					header( "Refresh:2; url=index.php");
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			else
			{
				echo "Enter data properly!!!!";
			}
		}
		else
		{
			echo "Please Login!";
			header( "Refresh:2; url=login.php");
		}
}
?>