<?php require_once('database/Connection.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laundry</title>
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
         <img src="kashipara.png" alt="" height="60" width="180">
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
              <h3 class="box-title">Home</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <!-- Start creating your amazing application! -->
              <a href="home.php"><button type="button" class="btn btn-success btn-sm"> 
                Back
                <!--span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span-->
              </button></a>
              <div id="table-laundry"></div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <!-- Footer -->
            </div>
				<form class="form-horizontal" role="form" id="" action="" method="post">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Cloth Type:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" name="ctype" id="customer" placeholder="Enter Cloth type eg. Men or Ladies wear" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Service:</label>
				    <div class="col-sm-9">
				      <select type="text" class="form-control" name="service" id="priority" required>
					  <option value="" selected>Select Service </option>
					  <?php
					  
					  $find=mysqli_query($link, "select * from service order by id");
					  while($finded=mysqli_fetch_assoc($find))
					  {
					  ?>
					  <option value="<?php echo $finded['id']; ?>"><?php echo $finded['name']; ?></option>
					  <?php }?>
					  </select>
				    </div>
				  </div>
 				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mode of Delivery:</label>
				    <div class="col-sm-9">
				      <select type="text" class="form-control" name="mode" id="priority" required>
					  <option value="" selected>Select Mode of Delivery </option>
					  <option value="Home Delivery" >Home Delivary</option>
					  <option value="Deliver by Self">Deliver by Self </option>
					  </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Descriptions:</label>
				    <div class="col-sm-9">
					    <textarea class="form-control" name="dscrpt" id="newlaun-type" >
					    </textarea>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-primary" name="submit">Save</button>
				    </div>
				  </div>
				</form>
          </div>
        </section>
      </div>
<?php 
if(isset($_POST['submit'])){
	$customer = 1;
	$type = $_POST['ctype'];
	$service = $_POST['service'];
	$mode = $_POST['mode'];
	$dscrp = $_POST['dscrpt'];
	
	$search=mysqli_query($link, "select * from service where id = '$service'");
	$row_search=mysqli_fetch_array($search);
	$cost=$row_search['cost'];

	$saveLaundry =mysqli_query($link, "insert into clothe (type, customer, status) values('$type', '$customer', 'pending')");
	if($saveLaundry){
		$slct=mysqli_query($link, "select * from clothe order by id desc limit 1");
		while($row=mysqli_fetch_array($slct))
		{
		$c_id=$row['id'];
		$sdate=date("y-m-d");
		$save_order=mysqli_query($link, "insert into customer_order (clothe, service, mode, description, cost, admin, date, status) 
		                                 values ('$c_id', '$service', '$mode', '$dscrp', '$cost', '1', '$sdate', 'Requested')");
		if($save_order)
		{
			?>
			<script>
			alert("Request for new laundry has been Sent");
			
			</script>
			
			<?php
			//echo "<span style='color:green'>Request for new laundry has been Sent</span>";
		}
		else{
			echo "Error Saving Order ".mysqli_error($link);
		}
		}
		

	}
	else
	{
		echo "unable to save new cloth ".mysqli_error($link);
	}
}//end isset
?>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- modal here -->
    <?php include_once('modal/change_password.php'); ?>
    <?php include_once('modal/msg.php'); ?>
    <?php include_once('modal/confirm.php'); ?>
    <?php include_once('modal/laundry.php'); ?>
    <?php include_once('script.php'); ?>
  </body>
</html>
