<?php
require_once('database/connection.php');
if(isset($_POST['login'])) 
{
  if(!empty($_POST['email']) || !empty($_POST['password']))
    {
				$email = $_POST['email'];
				$password = $_POST['password'];
				$sql = "SELECT * FROM admin WHERE `email` = '$email'";
				$query = mysqli_query($link, $sql);
				$results = mysqli_fetch_assoc($query);
				$status=$results['status'];
				if($status == 'Inactive')
				{
					?>
					<script>
					alert("Sorry, Your Account Is Blocked, Contact Admin");
					</script>
					
					<?php
				}
				else
				{
					if(count($results) > 0 && password_verify($password, $results['password'])) 
					{  session_start();
					  $_SESSION['admin'] = $results['id'];
					  $_SESSION['name'] = $results['name'];
					  header("location:home.php");
					} else 
					{
						  ?>
						  <script>
						  alert ("Incorrect Email or password. Please try again");
						  </script>
						  <?php
					}
	            }  
	}
				else
				    { 
							  ?>
							  <script>
							  alert ("Email or password is empty");
							  </script>
							  <?php
				    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
<img src="kashipara.png" alt="" height="60" width="180">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Proxy Laundry</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
<h1>Login to Laundry Shop</h1>   
	  <form method="post" id="login" action="">
        <p><input autofocus type="text" id="username" name="email" placeholder="Email as Username" required></p>
        <p><input type="password" id="password" name="password" placeholder="Password" required></p>
        <p class="remember_me">
        </p>
        <p class="submit"><input type="submit" name="login" value="Login"></p>
      </form>
    </div>
    <div class="login-help">
      <p>Not Admin?<a href="../index.php">Go Back</a></p>
    </div>
  </section>


    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/login.js"></script>


</body>
</html>
