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
        <li><a href="admin.remBarb.php"> Remove Barbers </a></li>
        <li><a href="admin.remMem.php"> Remove Customers </a></li>
    <li><a href="admin.setPrices.php"> Prices </a></li>
    <li><a class="active" href="admin.tips.php"> Tips </a></li>
    <li><a href="admin.reservation.php"> Appointments </a></li>
        <li style="float:right"><a href="index.php"> Logout </a></li>
       
<style>
table{
    width: 75%;
    border-collapse: collapse;
  border: 4px solid black;
    padding: 5px;
  font-size: 25px;
}
th{
border: 4px solid black;
  background-color: #4CAF50;
    color: white;
  text-align: left;
}
tr,td{
  border: 4px solid black;
  background-color: white;
    color: black;
}
</style>
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

  <center><h1>Add Tip to Stylist</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Select Name:<br><?php
        require_once('admin.dbconfig.php');
        $emp_result = $conn->query('select * from employee order by EmployeeID ASC');
        ?>
        <center>
        <select name="emp">
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

        Enter Tip Amount:<center><input type="varchar" name="did"></center>
            <button type="submit" name="Submit1">Add Tip</button>
        </form>
<?php
if(isset($_POST['Submit1']))
{
  $eid=$_POST['emp'];
  $did=$_POST['did'];
  $sql = "UPDATE employee SET tips = ($did + tips) WHERE EmployeeID = $eid";
  if (mysqli_query($conn, $sql))
    {
    echo "Tip added successfully to Barber table.Refreshing....";
    header( "Refresh:3; url=admin.tips.php");
    }
  else
    {
      echo "Error adding record: " . mysqli_error($conn);
    }
}
?>

 <?php require_once 'admin.footer.php'; ?>