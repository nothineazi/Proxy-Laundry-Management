<?php 
//require_once('session.php');
require_once('Connection.php');
//$db = new Database();
 ?>
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
<div class="modal fade" id="modal-laun">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-new-laun">
					<input type="hidden" id="laun-type">
					<input type="hidden" id="laun-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Cloth Type:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="customer" placeholder="Enter Cloth type" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Service:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="priority" placeholder="Enter Service" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mode of Delivery:</label>
				    <div class="col-sm-9">
				      <input type="text" step="any" class="form-control" id="weight" placeholder="Enter Mode of delivery" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Descriptions:</label>
				    <div class="col-sm-9">
					    <textarea class="form-control" id="newlaun-type" >
					    </textarea>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-primary">Save</button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
</body>
</html>