<?php 
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}	

require_once('database/connection.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laundry Administrator</title>
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
            <small>Welcome Administrator!</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Home</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <!-- Start creating your amazing application! -->
<div class="table-responsive">
        <table id="myTable-laundry" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th><center>Customer Name</center></th>
                    <th><center>Outstanding</center></th>
                    <th><center>Paid Amount</center></th>
                    <th><center>Date</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
<?php 
			$sn=1; 
$service=mysqli_query($link, "select * from payment order by id");
while($services=mysqli_fetch_assoc($service))
{			  
$customer=$services['customer'];
$cust=mysqli_query($link, "select * from customer where id = '$customer'");
$result=mysqli_fetch_array($cust);
?>
                <tr align="center">
                    <td><?= $sn; ?></td>
                    <td><?= $result['name']; ?></td>
                    <td><?= $services['outstanding']; ?></td>
                    <td><?= $services['amount']; ?></td>
                    <td><?= $services['date']; ?></td>
                    <td>
                        <a href="newpayment.php?id=<?= $services['id']; ?>">
						<button type="button" class="btn btn-warning btn-xs">
                           Update
                           <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button></a>
                    </td>
                </tr>
<?php $sn++; } ?>
            </tbody>
        </table>
</div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <!-- Footer -->
            </div>
          </div>
        </section>
      </div>
     
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
  </body>
</html>
