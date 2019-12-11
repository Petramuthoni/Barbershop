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
        <li><a class="active" href="admin.addBarb.php"> Add Barbers </a></li>
        <li><a href="admin.addMem.php"> Add Customers </a></li>
        <li><a href="admin.remBarb.php"> Remove Barbers </a></li>
        <li><a href="admin.remMem.php"> Remove Customers </a></li>
		<li><a href="admin.setPrices.php"> Prices </a></li>
		<li><a href="admin.tips.php"> Tips </a></li>
    	<li><a href="admin.reservation.php"> Appointments </a></li>
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

<center><h1>Add Barber</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  Name: <input type="text" name="name" required>
  <br>
  Password: <input type="password" name="pwd" required>
  <br>
  Hours: <input type="text" name="hours" required>
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
function newUser()
{
  include 'admin.dbconfig.php';
    $name=$_POST['name'];
    $password=$_POST['pwd'];
    $hours=$_POST['hours'];
    $sql = "INSERT INTO employee (EmployeeID, EmployeeName, Password, Hours) VALUES ('$empid','$name','$password','$hours') ";

  if (mysqli_query($conn, $sql)) 
  {
    echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
    header( "Refresh:3; url=admin.addBarb.php");

  } 
  else
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
function checkdid()
{
  include 'admin.dbconfig.php';
  $empid=$_POST['empid'];
  $sql= "SELECT * FROM employee WHERE DID = '$empid'";

  $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)!=0)
       {
      echo"<b><br>DID already exists!!";
       }
  else 
    if(isset($_POST['Submit']))
  { 
    newUser();
  }  
}

if(isset($_POST['Submit']))
{
  if(!empty($_POST['name']) && !empty($_POST['pwd'])&& !empty($_POST['hours']))
    checkdid();
  else
    echo "EMPTY VALUES NOT ALLOWED";
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