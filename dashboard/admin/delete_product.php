<?php
include_once('include/connection.php');
 $get_Id =$_GET['del'];



$delete ="delete from products where ID='$get_Id'";
$run = mysqli_query($con,$delete);
if($run>0)
{
    echo "<script>window.open('products.php','_self')</script>";
}

?>