<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}	

require_once('database/Connection.php');
$id=$_GET['id'];
$find=mysqli_query($link, "select * from admin where id = '$id'");
$row=mysqli_fetch_array($find);
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
  <title>Proxy Laundry</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Update Administrator</h1><a href="admin.php"><p style="text-align:left"><input type="submit" name="submit" value="Back"></p></a>
      <form method="post" id="sinfup" action="">
        <p><input type="text" id="username" name="name" value="<?php echo $row['name'];  ?>" placeholder="Name" required></p>
        <p><input type="text" id="username" name="phone" value="<?php echo $row['phone'];  ?>" placeholder="Phone" required></p>
        <p><input type="text" id="username" name="email" value="<?php echo $row['email'];  ?>" placeholder="Email" required></p>
        <p><input type="password" id="password" name="pass" placeholder="Password" required></p>
        <p><input type="password" id="password" name="cpass" placeholder="Confirm Password" required></p>
        <p class="remember_me">
        </p>
        <input type="submit" name="submit" value="Update">
      </form>
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
		
		$user_submit=mysqli_query($link, "update  admin set name='$name', phone='$phone', email='$email', password='$password' ");
		if($user_submit)
		{
			echo "<span style='color:white'>Account For ".$name." has been Updated Successfully</span>";
		}
		else{
			echo "An Error Occur while Updating Account ",mysqli_error($link);
		}
	
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