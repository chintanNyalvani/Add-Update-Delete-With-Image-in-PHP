<?php
	session_start();
	error_reporting(0);
	include('header.php');
	include("connection.php");

	// edit data

	$product_name='';$price='';$description='';$image='';
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		$id=$_GET['id'];
		if(isset($id))
		{
			$query="select * from products where id=$id";
			$data=mysqli_query($conn,$query);
			$total=mysqli_num_rows($data);
			if($total!=0)
			{
				$record=mysqli_fetch_array($data);
				$product_name=$record['product_name'];
				$price=$record['price'];
				$description=$record['description'];
				$image=$record['image'];
			}
		}
		else 
		{ // if No ID set.
			print '<p style="color: red;">This page has been accessed in error.</p>';
		}
	}
	else if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$id=$_GET['id'];
		$product_name=$_POST['product_name'];
		$price=$_POST['price'];
		$description=$_POST['description'];
		$image=time() . '-' . $_FILES['image']['name'];

		// upload image to images folder
		$target_dir = "images/";
		$target_file = $target_dir . basename($image);
		
		// move image to images folder
		$upload_iamge =  move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
		
			$query="update products set product_name='$product_name',price='$price',description='$description',image='$image' where id=$id";
			$data=mysqli_query($conn,$query);		
			if($data)
			{			
				header("Location: add_product.php"); 
			}
			else
			{
				print '<script>
							alert("Error in updating record...$ID="'.$id.');
						</script>';
				echo '<br>Error '.mysqli_error($conn);
				echo '<br>Query was : '.$query;
			}
	}		
	
?>

<!-- Edit data in form -->
	<div class="container-fluid" style="width: 500px; margin-top: 30px; border: 1px solid lightgray; padding-bottom: 20px;">
		<br><h2 class="text-center"><b><u>Edit Product Details</u></b></h2><br>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="container-fluid">

				<!-- Product Name -->
				<div class="mb-3 ">
				  <label for="product_name" class="form-label">Product Name</label>
				  <input type="text" name="product_name" value="<?php echo $product_name ?>" class="form-control" id="product_name">
				</div>

				<!-- Product Price -->
				<div class="mb-3">
				  <label for="price" class="form-label">Price</label>
				  <input type="text" value="<?php echo $price ?>" name="price" class="form-control" id="price">
				</div>

				<!-- Product Description -->
				<div class="mb-3">
				  <label for="description" class="form-label">Description</label>
				  <textarea name="description" value="<?php echo $description; ?>" class="form-control" id="description">
				  	
				  </textarea>
				</div>

				<!-- Product Image -->
				<div class="mb-4">
				  <label for="image" class="form-label">Image</label>
				  <input type="file" name="image" value="<?php echo $image ?>" class="form-control" id="image">
				</div>

				<!-- Submit Button -->
				<input type="submit" value="Add Product" class=" form-control ,btn btn-primary">
		
			</div>
		</form>
	</div>