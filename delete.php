<?php
include("connection.php");
	$pid=$_GET['id'];
	$query="delete from products where id=$pid";
	$data=mysqli_query($conn,$query);
	if($data)
	{
			header("Location: add_product.php"); 
	?>
	
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://localhost/inter test/php/view.php">
	
	<?php
	}	
	else
	{
		echo "<font color='red'>Failed to Delete...";
	}
?>