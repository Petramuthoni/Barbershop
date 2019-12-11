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
    <li><a class="active" href="admin.setPrices.php"> Prices </a></li>
    <li><a href="admin.tips.php"> Tips </a></li>
    <li><a  href="admin.reservation.php"> Appointments </a></li>
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

<center><h1>Add Style</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Style:<input type="text" name="style" required>
  <br>
  Price: <input type="charset" name="price" required>
  <br>
  <button type="submit" name="Submit">Submit</button>
</form>
</font></b>
</center>
<?php
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header( "Refresh:1; url=admin.alogin.php"); 
  }
function newStyle()
{
  include 'admin.dbconfig.php';
    $styleid=$_POST['style'];
    $priceid=$_POST['price'];

    $sql = "INSERT INTO prices (style, price) VALUES ('$styleid','$priceid')";

  if (mysqli_query($conn, $sql)) 
  {
    echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
    header( "Refresh:3; url=admin.setPrices.php");

  } 
  else
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
function checkdid()
{
  include 'admin.dbconfig.php';
  $styleid=$_POST['style'];
  $sql= "SELECT * FROM prices WHERE style = '$styleid'";

  $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)!=0)
       {
      echo"<b><br>Style already exists!!";
       }
  else 
    if(isset($_POST['Submit']))
  { 
    newStyle();
  }  
}

if(isset($_POST['Submit']))
{
  if(!empty($_POST['style']) && !empty($_POST['price']))
    checkdid();
  else
    echo "EMPTY VALUES NOT ALLOWED";
}



?>

<center><h1>Show Syles and Prices</h1><hr>
<?php
$con = mysqli_connect('localhost','root','','barbers');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM prices order by style ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>Styles in Database</h2><br>";
echo "<table>
<tr>
<th>Style Name</th>
<th>Style Price</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
  echo "<td>" . $row['Style'] . "</td>";
    echo "<td>" . $row['Price'] . "</td>";

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

<center><h1>Delete Styles</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Select Name:<br><?php
        require_once('admin.dbconfig.php');
        $emp_result = $conn->query('select * from prices order by StyleID ASC');
        ?>
        <center>
        <select name="Style">
        <option value="">---Select Name---</option>
        <?php
        if ($emp_result->num_rows > 0) {
        while($row = $emp_result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row["StyleID"]; ?>"><?php echo "".$row["Style"]; ?></option>
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
  $sql = "DELETE FROM prices WHERE StyleID= $did ";
  if (mysqli_query($conn, $sql))
    {
    echo "Record deleted successfully from Barber table.Refreshing....";
    header( "Refresh:3; url=admin.setPrices.php");
    }
  else
    {
      echo "Error deleting record: " . mysqli_error($conn);
    }
}
if(isset($_POST['Submit2']))
{
  $did=$_POST['Style'];
  $sql = "DELETE FROM prices WHERE StyleID = $did ";
  if (mysqli_query($conn, $sql))
    {
    echo "Record deleted successfully.Refreshing....";
    header( "Refresh:3; url=admin.setPrices.php");
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
  <script src="js/jquery311.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/validations.js"></script>
  <script src="js/alerts.js" type="text/javascript"></script>
  <script src="js/menu.js"></script>
  <script src="js/bdlogin.js"></script>
</body>
</html>