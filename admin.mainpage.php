
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
				<li><a class="active" href="index.php"> Home </a></li>
				<li><a href="http://localhost/phpmyadmin"> PhpMyAdmin </a></li>
				<li><a href="admin.showBarb.php"> Show Barbers </a></li>
				<li><a href="admin.showMem.php"> Show Customers </a></li>
				<li><a href="admin.addBarb.php"> Add Barbers </a></li>
				<li><a href="admin.addMem.php"> Add Customers </a></li>
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
<div id="mision" class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12" id="mision">
      <p id="misionP">Welcome to the admim page! Feel free to make any changes to better manage your barber shop. Add, remove and look at current members and emplyees. Enjoy!</p>
    </div>
    </div>
  
    <?php require_once 'admin.footer.php'; ?>
 
</body>
</html>