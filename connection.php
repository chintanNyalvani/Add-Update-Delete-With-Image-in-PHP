<?php
	
	// Database Connection
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="product";
	
	//procedural approach
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	
	if($conn->connect_error)
	{
		die("Connection failed...:".$conn->connect_error);
	}
	// echo "Connection successful...";
	
	
	// close the connection
	//mysqli_close($conn);
?>