<?php
if(isset($_POST['submit']))
{
	session_start();
	session_unset();
	session_decode();
	header("Location: ../Barbers/index.php");
	exit();
}
?>