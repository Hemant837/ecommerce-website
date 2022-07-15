<?php
session_start();
include_once('database.php');
$select = "select * from category";
$run = mysqli_query($con, $select);
?>

 <?php

$error = '';
if(isset($_POST['search'])){
		$search = $_POST['search'];
	
		$select = "select * from category where Name='$search'";
		$run = mysqli_query($con, $select);
		$row = mysqli_num_rows($run);
		if ($row > 0) {
			echo "<script>window.open('index.php','_self')</script>";
			$row_user = mysqli_fetch_array($run);
			echo$_SESSION['user_name'] = $row_user['name'];
      exit;
		
		} else {
			// echo 'error';
			$error = "<h5 class='text-center' style='color:red'pt-3>  No match found </h5>";
		}
	}

  
  
?>
<style>
.navbar {
    background-color: #f8f8f8;
    height: 60px;
    width: 100%; 
}

.navbarContent {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}

.navbarHeading a {
    font-size: 26px;
    font-weight: bold;
    text-decoration: none;
    color: #162950;
} 

.navbarTags {
    justify-content: space-around;
    font-size: 18px;
    width: 50%;
    display: flex;
    list-style: none;
}

.navbarTags li a{
    text-decoration: none;
    color: #162950;
}

.navbarLog {
  display: flex;
  width: 10%;
  justify-content: space-around;
}

.navbarLog li, .navbarLog li  a{
    list-style: none;
    color: #162950;
}

.navbarLogOptions {
  font-weight: bold;
  display: flex;
  flex-direction: column;
}

</style>
<section class="navbar">
      <div class="navbarContent">
        <div class="navbarHeading"><a href="http://localhost/dashboard/">Shopping Cart</a></div>
        <div class="navbarTags">
          <li><a href="http://localhost/dashboard/">Home</a></li>
          <li class="nav-item dropdown">            
              <a href="http://localhost/dashboard/Cat_product.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             All Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!--//showing all Categorys//-->
                <!-- fetching information from Cat_product.php -->
                <?php
                while ($row = mysqli_fetch_array($run)) { ?>
                  <a class="dropdown-item" href="Cat_product.php?Cat_Id=<?php echo ucfirst($row['ID']); ?>"><?php echo ucfirst($row['Name']); ?></a>
                <?php } ?>
              </div>
            </li>
          <li><a href="contact_us.php">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
        </div>
        <div class="navbarLog">
          <li class="nav-item dropdown pr-2">
              <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user fa-lg"></i>
                <?php if (isset($_SESSION['user_name'])) {
                  echo $_SESSION['user_name'];
                } else echo "login";  ?>
              </a>
              </a>
              <div class="dropdown-menu navbarLogOption">
                <div class="navbarLogOptions">
                  <a href="loginsignup.php">Log In or Sign Up</a>
                  <a href="logout.php">Logout</a>
                </div>
              </div>
            </li>
            <!-- <li>
              <a href="#"><i class="fa fa-heart fa-lg"></i> </a>
            </li> -->
            <li>
              <a href="/dashboard/add_to_cart.php"><span class="fa fa-shopping-bag fa-lg "></span></a>
            </li>
      </div>
</section>

