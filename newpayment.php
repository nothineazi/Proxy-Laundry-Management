<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}	

require_once('database/Connection.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proxy Laundry</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="assets/css/font-awesome.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          
          <!-- logo for regular state and mobile devices -->
         <h3>Proxy Laundry</h3>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"> Toggle navigation</span>
            <span class="icon-bar">Toggle navigation</span>
            <span class="icon-bar">Toggle navigation</span>
            <span class="icon-bar">Toggle navigation</span>
          </a>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          <?php include_once('navigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small>Welcome Sir!</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Payment</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
              <!-- Start creating your amazing application! -->
				<form class="form-horizontal" role="form" id="" action="" method="post">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Card Number:</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="cnumber" id="ccNo" size="20" placeholder="00000000000000000000" autocomplete="off" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Expiration Date:</label>
				    <div class="col-sm-1" class="form-control">
				      <input type="text" name="expm" id="expMonth" size="2" placeholder="00" autocomplete="off" required>
				      <input type="text" name="expy" id="expYear" size="2" placeholder="00" autocomplete="off" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">CVV:</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="cvv" id="cvv" size="4" placeholder="0000" required>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-primary" name="submit">Proceed</button>
				    </div>
				  </div>
				</form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <!-- Footer -->
            </div>
          </div>
        </section>
      </div>
<?php 
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$cost=$_POST['cost'];

	$saveLaundry =mysqli_query($link, "insert into service (name, cost) values('$name', '$cost')");
	if($saveLaundry){
		?>
		<script>
		
		alert(" New Service Has been Added Successfully");
		</script>
		
		<?php
      //echo "<span style='color:green; text-align:center'> New Service Has been Added Successfully</span>";
	}
	else
	{
		echo "<span style='color:red; text-align:center'>unable to save new Service ".mysqli_error($link)." </span>";
	}
}//end isset
?>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- modal here -->
  </body>
</html>
