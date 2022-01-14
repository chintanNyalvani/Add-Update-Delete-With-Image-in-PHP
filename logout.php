<?php
	session_start();
	include("connection.php");
	session_destroy();
	mysqli_close($conn);
	header('Location: login.php');
?>