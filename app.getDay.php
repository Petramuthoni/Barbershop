<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Barber Shop</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
	$string = $_POST["date"];
	$timestamp = strtotime($string);
	$compareday = date("l", $timestamp);
	$flag=0;
	if($_POST["bidval"]==""))
		echo "SELECT BID PROPERLY!!!";
	else
	{
	require_once("admin.dbconfig.php");
	$query ="SELECT * FROM employee_availability WHERE BID = '" . $_POST["didval"]"'";
	$results = $conn->query($query);
	while($rs=$results->fetch_assoc())
		{
		   if($rs["day"]==$compareday)
		   {
			   $flag++;
			   echo "Barber Available on ".$compareday;
			   break;
		   }
		}
		if($flag==0)
			echo "Barber Unavailable on ".$compareday;
	}
?>
	
</body>
</html>