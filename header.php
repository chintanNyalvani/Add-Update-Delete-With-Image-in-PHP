<?php
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

	<div>
		<!-- As a link -->
<nav class="navbar navbar-light bg-dark pb-3 pt-3">
  <div class="container-fluid">
    <h2 class="text-light"><b>Add Product</b></h2>

    <!-- check user loggedin or note -->
    <?php

    	if($_SESSION['loggedin'] != '')
    	{
    		echo "<h3 class='text-light'><b>Welcome ".$_SESSION['loggedin']."</b></h3>";
    		echo "<a class='text-light' href='logout.php'><h5><b>Logout</b></h5></a>";
    	}
    	else
    	{
    		
    	}
    ?>
  </div>
</nav>
	</div>