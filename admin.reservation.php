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
        <li><a  href="admin.showBarb.php"> Show Barbers </a></li>
        <li><a href="admin.showMem.php"> Show Customers </a></li>
        <li><a href="admin.addBarb.php"> Add Barbers </a></li>
        <li><a href="admin.addMem.php"> Add Customers </a></li>
        <li><a href="admin.remBarb.php"> Remove Barbers </a></li>
        <li><a href="admin.remMem.php"> Remove Customers </a></li>
    <li><a href="admin.setPrices.php"> Prices </a></li>
    <li><a href="admin.tips.php"> Tips </a></li>
    <li><a class="active" href="admin.reservation.php"> Appointments </a></li>
        <li style="float:right"><a href="index.php"> Logout </a></li>
      </ul>
    </div>
  </header>
</body>
  <link href="css/face.css" rel="stylesheet">
  <link rel="stylesheet" href="css/face2.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
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

</head>
<body>
  <div id="bannerOrdenar" class="container-fluid">
    
    
    <div class="container-fluid container-title2">
        <h1 class="page-title">The Barber Shop</h1>
      </div>
  </div>

<center><h1>Show Appointments</h1><hr>
<?php
$con = mysqli_connect('localhost','root','','barbers');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM reservation order by Date ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>Number of Appointments = <b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>CustomerID</th>
<th>Name</th>
<th>Phone</th>
<th>Date</th>
<th>Status</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
  echo "<td>" . $row['CustomersID'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Phone'] . "</td>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header( "Refresh:1; url=admin.alogin.php"); 
  }
?>

 <?php require_once 'admin.footer.php'; ?>
  <script src="js/jquery311.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/validations.js"></script>
  <script src="js/alerts.js" type="text/javascript"></script>
  <script src="js/menu.js"></script>
  <script src="js/bdlogin.js"></script>
</body>
</html>