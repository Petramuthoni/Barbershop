<?= $sessionRequired = false; ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  <title>Admin Page</title>
  <link href="style_index.css" rel="stylesheet" type="text/css">
<body>
  <header>
    <div class="main-nav-bar" id="header-bar">
      <ul class="main-nav">
        <li><a href="admin.mainpage.php"> Home </a></li>
		<li><a href="http://localhost/phpmyadmin"> PhpMyAdmin </a></li>
        <li><a href="admin.showBarb.php"> Show Barbers </a></li>
        <li><a href="admin.showMem.php"> Show Customers </a></li>
        <li><a href="admin.addBarb.php"> Add Barbers </a></li>
        <li><a href="admin.addMem.php"> Add Customers </a></li>
        <li><a class="active" href="admin.remBarb.php"> Remove Barbers </a></li>
        <li><a href="admin.remMem.php"> Remove Customers </a></li>
		<li><a href="admin.setPrices.php"> Prices </a></li>
		<li><a href="admin.tips.php"> Tips </a></li>
		<li><a  href="admin.reservation.php"> Appointments </a></li>
        <li style="float:right"><a href="index.php"> Logout </a></li>
       
      </ul>
    </div>
  </header>
</body>
  <link href="css/face.css" rel="stylesheet">
  <link rel="stylesheet" href="css/face2.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
  <div id="bannerOrdenar" class="container-fluid">
    
    
    <div class="container-fluid container-title2">
        <h1 class="page-title">The Barber Shop</h1>
      </div>
  </div>
<center><h1>Remove Barber</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Enter BID:<center><input type="number" name="did"></center>
			<button type="submit" name="Submit1">Delete by Employee ID</button>
			<br>---------OR---------<br>
Select Name:<br><?php
				require_once('admin.dbconfig.php');
				$emp_result = $conn->query('select * from employee order by EmployeeID ASC');
				?>
				<center>
				<select name="EmployeeName">
				<option value="">---Select Name---</option>
				<?php
				if ($emp_result->num_rows > 0) {
				while($row = $emp_result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["EmployeeID"]; ?>"><?php echo " $row[EmployeeID] ".$row["EmployeeName"]; ?></option>
				<?php
					}
					}
				?>
				</select></center>
				
				<button type="submit" name="Submit2">Delete by Name</button>
</form>			
<?php
session_start();
include 'admin.dbconfig.php';
if(isset($_POST['Submit1']))
{
	$did=$_POST['did'];
	$sql = "DELETE FROM employee WHERE EmployeeID= $did ";
	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully from Barber table.Refreshing....";
		header( "Refresh:3; url=admin.remBarb.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
}
if(isset($_POST['Submit2']))
{
	$did=$_POST['EmployeeName'];
	$sql = "DELETE FROM employee WHERE EmployeeID = $did ";
	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.Refreshing....";
		header( "Refresh:3; url=admin.remBarb.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
}	
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=admin.alogin.php"); 
	}
?>			

<?php require_once 'admin.footer.php'; ?>

</body>
</html>