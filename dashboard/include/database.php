<?php 
 $host_name ='localhost';
 $user_name ='root';
 $password = '';
 $database_name ='shopcart';
 $con = mysqli_connect($host_name,$user_name,$password) or die('Connection error...!');
        mysqli_select_db($con,$database_name) or die( 'Check Database');
?>
