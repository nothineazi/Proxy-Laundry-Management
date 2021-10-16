<?php
require_once('database/Connection.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Create Account to Laundry Shop</h1>
      <form method="post" id="sinfup" action="">
        <p><input type="text" id="username" name="name" placeholder="Name" required></p>
        <p><input type="text" id="username" name="phone" placeholder="Phone" required></p>
        <p><input type="text" id="username" name="email" placeholder="Email" required></p>
        <p><input type="password" id="password" name="pass" placeholder="Password" required></p>
        <p><input type="password" id="password" name="cpass" placeholder="Confirm Password" required></p>
        <p class="remember_me">
        </p>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>

    <div class="login-help">
      <p>Already Have an Account? <a href="index.php">Click here to Login</a>.</p>
    </div>
  </section>

<?php
if(isset($_POST['submit']))
{   if($_POST['pass'] == $_POST['cpass'])
	{
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$password=password_hash($_POST['pass'], PASSWORD_BCRYPT);
		
		$user_submit=mysqli_query($link, "insert into customer (name, phone, email, password, status) values ('$name', '$phone', '$email', '$password', 'Active')");
		if($user_submit)
		{
			echo "Your Account Has been Created Successfully";
		}
		else{
			echo "An Error Occur while Creating Your Account ",mysqli_error($link);
		}
		$find=mysqli_query($link, "select * from customer order by id desc");
		$finded=mysqli_fetch_array($find);
		$customer=$finded['id'];
		$paid=mysqli_query($link, "insert into payment (customer) values('$customer')");
	
	}
	else
	{
?>
		<script>
		
		alert("Password didn't Mach");
		</script>
<?php
	}
}
?>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/login.js"></script>


</body>
</html>
