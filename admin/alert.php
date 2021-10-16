<?php 
 function sendSMS($phone,$message) {
   $url = "http://smsclone.com/index.php?option=com_spc&comm=spc_api";
     $url .= "&username=Proxylaundry";
      $url .= "&password=proxy";
     $url .= "&sender=Laundry";
     $url .= "&recipient=$phone";
     $url .= "&message=".urlencode($message);
     $fp = @fopen($url, "r",255);
 } 
 function success($message) {
   echo "<div class='col-lg-12 alert alert-success' style='padding:10px'><i class='fa fa-information'></i> $message</div>";
 }
require_once("database/connection.php");
$customer=$_GET['id'];
   $query2 = mysqli_query($link, "SELECT * FROM customer WHERE id = '$customer'");
   $row = mysqli_fetch_array($query2);
   //print_r($row);
   $msg = 'Hello Sir Your Laundry Has been Finished, Please Log in and Confirm';
   $phone = $row['phone'];
   sendSMS($phone,$msg);
   success("Notification Forwarded Successfully", 'col-sm-12');
   header("location:order.php");
?>