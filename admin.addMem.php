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
        <li><a class="active" href="admin.addMem.php"> Add Customers </a></li>
        <li><a href="admin.remBarb.php"> Remove Barbers </a></li>
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

<center><h1>Add Customer</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Name: <input type="text" name="name" required>
  <br>
  Username: <input type="text" name="user" required>
  <br>
  Password: <input type="password" name="pass" required>
  <br>
  Email: <input type="email" name="mail" required>
  <br>
  <button type="submit" name="Submit">REGISTER</button>
</form>
</font></b>
</center>
<?php
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header( "Refresh:1; url=admin.alogin.php"); 
  }
function newclinic()
{
  include 'admin.dbconfig.php';
    $name=$_POST['name'];
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $email=$_POST['mail'];
    $sql = "INSERT INTO customer (Name, CustomerUsername, Password, Email) VALUES ('$name','$username','$password','$email')";

  if (mysqli_query($conn, $sql)) 
  {
    echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
    header( "Refresh:3; url=admin.addMem.php");

  } 
  else
  {
    
  }
}
function checkcid()
{
  include 'admin.dbconfig.php';


  $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)!=0)
       {
      echo"<b><br>CID already exists!!";
       }
  else 
    if(isset($_POST['Submit']))
  { 
    newclinic();
  }

  
}
if(isset($_POST['Submit']))
{
  if(!empty($_POST['name'])&&!empty($_POST['user'])&&!empty($_POST['mail'])&&!empty($_POST['pass']))
      checkcid();
  else
    echo "EMPTY VALUES NOT ALLOWED";
}

?>

<?php require_once 'admin.footer.php'; ?>

</body>
</html>