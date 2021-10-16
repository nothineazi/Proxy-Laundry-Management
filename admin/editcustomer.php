<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}	

require_once('database/Connection.php');
$id=$_GET['id'];
$find=mysqli_query($link, "select * from customer where id = '$id'");
$finded=mysqli_fetch_array($find);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
         <h3>Proxy Laundry</h3>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>LaundryProxy </title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Update Customer</h1>         <a href="customer.php"><p style="text-align:left"><input type="submit" name="submit" value="Back"></p></a>
      <form method="post" id="sinfup" action="">
        <p><input type="text" id="username" name="name" value="<?php  echo $finded['name']; ?>" placeholder="Name" required></p>
        <p><input type="text" id="username" name="phone" value="<?php  echo $finded['phone']; ?>" placeholder="Phone" required disabled></p>
        <p><input type="text" id="username" name="email" value="<?php  echo $finded['email']; ?>" placeholder="Email" required disabled></p>
        <p><input type="text" id="password" name="status" value="<?php  echo $finded['status']; ?>" placeholder="Password" required></p>
        <p class="remember_me">
        </p>
        <input type="submit" name="submit" value="Update" style="text-align:left">
      </form>
    </div>
  </section>

<?php
if(isset($_POST['submit']))
{
    	$name=$_POST['name'];
    	$status=$_POST['status'];
		
		$user_submit=mysqli_query($link, " update customer set name='$name', status='$status' where id='$id'");
		if($user_submit)
		{
			echo "Customer Info, is Updated Successfully";
		}
		else{
			echo "An Error Occur while Updating Customer Info ".mysqli_error($link);
		}
	
}
?>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/login.js"></script>


</body>
</html>
