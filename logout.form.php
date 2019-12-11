<?php
session_start();
?>

<html>
<head>
	<title>The Barber Shop</title>
	<link href="style_logout.form.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div class="main-nav-bar" id="header-bar">
			<ul class="main-nav">
				<li><a href="index.php"> Home </a></li>
				<li><a href="about.php"> About Us </a></li>
				<li><a href="haircut.php"> Haircuts & Styles </a></li>
				<li><a href="appointment.php"> Appointments </a></li>
				<li><a href="barbers.php"> Barbers </a></li>
				<li><a href="admin.alogin.php"> Admin </a></li>
				<?php
						if(isset($_SESSION['u_id']))
						{	
							echo('<li style="float:right"><a href="logout.form.php"> Logout </a></li>');
							echo('<li style="float:right"><a href="myprofile.php"> '. $_SESSION['u_uid'] .' </a></li>');
						}
						else
						{
							echo('<li style="float:right"><a href="login.php"> Login </a></li>');
							echo('<li style="float:right"><a href="signup.php"> Register </a></li>');
						}
			?>		
			</ul>
			
		</div>
	</header>
	
	<section>
		<div class="main-section-container">
			<div class="background-hero">
				<div class="background-hero-form">
					<div class="main-logout-form">
					<h2>Logout - Are You Sure?</h2>
						<form action="http://localhost/Barbers/index.php">
							<button style="float:left;" type="submit" name="submit">Go Back</button>
						</form>
						<form action="logout.php" method = "POST">
							<button style="float:right;" type="submit" name="submit">Yes Logout</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</section>
	
	<footer>
		<div class="main-footer-container">
			<div class="footer-row">
				<div class="column1">
					<h2>About Us</h2>
					<p>Welcome to our website -- an information resource designed to help you learn more about personal finance. Click around and you'll find a variety of financial tools. There are financial calculators that can help you get a clearer picture of where you stand and where you're headed. There is a research library and newsletter articles on a wide range of financial topics. You can even request a quote for an insurance or investment product. And check back often, because we're constantly adding new material. If you have a specific question or want more information, click on Contact Us, drop us an e-mail message at [e-mail address], or call us at [phone number]. We're ready to help.</p>
				</div>
				<div class="column2">
					<h2>Hours of Operation</h2>
					<p style="text-align:center">Monday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Tuesday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Wednesday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Thursday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Friday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Saturday: 10:00am - 6:00pm</p>
					<p style="text-align:center">Sunday: CLOSED</p>
				</div>
				<div class="column3">
					<h2>Have a Question?</h2>
					<p>Address: 1318 N Monroe St suite d, Tallahassee, FL 32303</p>
					<p>Phone: +1 (800) 746-8541</p>
					<p>Email: contactmail@barbershop.com</p>
					<p>Facebook: @Barbershop</p>
					<p>Twitter: @BarberShop</p>
					<p>Instagram: @BarberShop</p>
				</div>
			</div>
		</div>
	</footer>
	
</body>

</html>