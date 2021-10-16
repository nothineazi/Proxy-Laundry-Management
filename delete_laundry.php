<?php
require_once("database/connection.php");
$id=$_GET['id'];
$find=mysqli_query($link, "select * from clothe where id='$id'");
$finded=mysqli_fetch_array($find);
$status=$finded['status'];
$customer=$finded['customer'];
$find2=mysqli_query($link, "select * from customer_order where clothe='$id'");
$finded2=mysqli_fetch_array($find2);
$cost=$finded2['cost'];
if($status == 'Requested')
{
$sql3=mysqli_query($link, "Update payment set outstanding = outstanding - '$cost' where customer = '$customer'");
if($sql3)
{
$sql2=mysqli_query($link, "delete from customer_order where clothe = '$id'");
if($sql2)
{
$sql=mysqli_query($link, "delete from clothe where id = '$id'");

if($sql)
{
	header("location:home.php");
}
}
}
}
else
{
	header("location:home.php");
}
?>