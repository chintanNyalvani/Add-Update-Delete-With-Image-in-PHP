<?php
include('header.php');
?>
	<div class="col-md-6 col-lg-4 offset-lg-4 offset-md-3 mt-5">
    <div class="bg-light p-5 border shadow">
        <!-- Static Login Code -->
	<?php
	session_start();
		if(isset($_POST['submit']))
        {
		    $username = $_POST['username']; $password = $_POST['password'];
		        
		    if($username === 'user' && $password === 'password')
		    {
		        $_SESSION['loggedin'] = $username;
		        $_SESSION['login'] = true; header('LOCATION:add_product.php'); die();
		    }
		    else
		    {
		        echo "<div class='alert alert-danger'>Username and Password dnmatch.</div>";
		    }
		        
		}
    ?>
username = user<br>
password = password<p>
    <!-- Login Form -->
    <form action="" method="post">
      <div class="form-group mb-4">

        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group mb-4">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
      </div>
      <input type="submit" name="submit" value="Login" class="btn bg-dark text-light form-control" />
    </form>



<!-- Javascript Validation script -->
<script>
    function validateForm() {
        var un = document.loginform.usr.value;
        var pw = document.loginform.pword.value;
        var username = "username"; 
        var password = "password";
        if ((un == username) && (pw == password)) {
            return true;
        }
        else {
            alert ("Login was unsuccessful, please check your username and password");
            return false;
        }
  }
</script>

</body>
</html>
