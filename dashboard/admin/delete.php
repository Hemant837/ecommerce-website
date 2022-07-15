<?php
include_once('include/connection.php');
 $get_id =$_GET['del'];

$delete ="delete from category where ID='$get_id'";
$run = mysqli_query($con,$delete);
if($run>0)
{
    echo "<script>window.open('product_cat.php','_self')</script>";
}

?>