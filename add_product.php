<?php
	session_start();
	error_reporting(0);
	include('header.php');
	include("connection.php");

	// Insert Data into Table
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		// get data from form
		$product_name=$_POST['product_name'];
		$price=$_POST['price'];
		$description=$_POST['description'];
		$image=time() . '-' . $_FILES['image']['name'];

		// upload image to images folder
		$target_dir = "images/";
		$target_file = $target_dir . basename($image);
		
		// move image to images folder
		$upload_iamge =  move_uploaded_file($_FILES['image']['tmp_name'],$target_file);

		$query="INSERT INTO products (product_name, price, description, image) VALUES ('$product_name',$price,'$description','$image')";
		$data=mysqli_query($conn,$query);		
		if($upload_iamge && $data)
		{			
			print '<script>
						alert("Record inserted successfully...");
						
					</script>';
			
			header("Location: add_product.php"); 
		}
		else
		{
			print '<script>
						alert("Error in inserting record...");
					</script>';
			echo '<br>Error '.mysqli_error($conn);
			echo '<br>Query was : '.$query;
		}	
	}

	// Fetch data from table
	$query="SELECT * FROM products";
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
	
	if($total>0){
		
?>

<h2 class="text-center pb-2 pt-4"><b>All Products</b></h2>

<!-- Display Products -->
<div class="container-fluid mt-4 bg-light">
	
	<table class="table table-responsive">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Product Name</th>
	      <th scope="col">Price</th>
	      <th scope="col">Description</th>
	      <th scope="col">Image</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <?php while($result=mysqli_fetch_assoc($data)){?>
	  <tbody>
	    <tr>
	      <th scope="row"><?php echo $result['id']; ?></th>
	      <td><?php echo $result['product_name']; ?></td>
	      <td><?php echo $result['price']; ?></td>
	      <td><?php echo $result['description']; ?></td>
	      <td><img src="<?php echo 'images/'. $result['image']; ?>" width="90" height="90"></td>
	      <td><a href='edit.php?id=<?php echo $result['id']; ?>'>Edit</a></td>				
		  <td><a href='delete.php?id=<?php echo $result['id']; ?>' onclick='return checkdelete()'>Delete</a></td>
	    </tr>
		<?php
				}
			}
		?>
	  </tbody>
	</table>
</div>

<!-- Add Product Model -->

<div class="container-fluid">
	<button type="button" class="btn btn-primary float-end d-block mt-3 btn-lg" data-bs-toggle="modal" data-bs-target="#modalForm">
   		<b>Add Product</b>
	</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="add_product_model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add Product Form</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            	<!-- Add Product Form -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="container-fluid">

					  <!-- Product Name -->
					  <div class="mb-3 ">
					    <label for="product_name" class="form-label">Product Name</label>
					    <input type="text" name="product_name" class="form-control" id="product_name">
					  </div>

					  <!-- Product Price -->
					  <div class="mb-3">
					    <label for="price" class="form-label">Price</label>
					    <input type="text" name="price" class="form-control" id="price">
					  </div>

					  <!-- Product Description -->
					  <div class="mb-3">
					    <label for="description" class="form-label">Description</label>
					    <textarea name="description" class="form-control" id="description">
					    	
					    </textarea>
					  </div>

					  <!-- Product Image -->
					  <div class="mb-4">
					    <label for="image" class="form-label">Image</label>
					    <input type="file" name="image" class="form-control" id="image">
					  </div>

					  <!-- SUbmit Button -->
					  <input type="submit" value="Add Product" class=" form-control ,btn btn-primary">
					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>