<style>
.buyNow {
    background-color: #162950;
    color: white;
    padding: 8px 8px;
    border-radius: 3px;
}

.buyNow:hover {
    color: white;
}
</style>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- link css -->
    <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    include_once('include/header.php');
    $get_id = base64_decode($_GET['pro_id']);
    $select_pro =  "select * from products where ID='$get_id'";
    $run_pro = mysqli_query($con, $select_pro);

    $select_price = "select price from products where ID='$get_id'";
    $run_price = mysqli_query($con, $select_price);
    $row_price = mysqli_fetch_array($run_price);
    $pro_price = $row_price['price'];


    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $insert = "insert into add_to_cart (product_id,user_id,quantity,sub_total_price) values ($get_id,$user_id,1,$pro_price)";
            $run = mysqli_query($con, $insert);

            if ($run > 0) {
                echo "<script>window.open('add_to_cart.php','_self') </script>";
            } else {
                echo "error";
            }
        } else {
            echo "<script>window.open('login.php','_self') </script>";
        }
    }
    ?>


    </br>
    <div class="continer">
        <form method="post">

            <?php while ($row_pro = mysqli_fetch_array($run_pro)) {
                $_SESSION['Cat_Id'] = $row_pro['Cat_Id'];
            ?>

                <div class="row">
                    <!-- *************************************************************** -->
                    <!-- product Image -->
                    <!-- *************************************************************** -->
                    <div class=" col-xs-12 col-sm-6 text-center">
                        <input type="hidden" name="pro_id" value="<?php echo $row_pro['ID'] ?>" />
                        <img src="assets/images/<?php echo $row_pro['Imag']; ?>" />
                    </div>
                    <!-- *************************************************************** -->
                    <!-- product Details -->
                    <!-- *************************************************************** -->
                    <div class="col-xs-12 col-sm-6">

                        <div class="row">
                            <div class="col-xs-12 pro_desc">
                                <h2><?php echo $row_pro['Product_Title']; ?></h2>
                            </div>
                        </div>
                        <!-- *************************************************************** -->
                        <!-- Prices Details -->
                        <!-- *************************************************************** -->
                        <div class="row">
                            <div class="col-xs-12 pro_desc">
                                <h4>Price : ₹ <?php echo $row_pro['Price']; ?></h4>
                            </div>
                        </div>
                        <!-- *************************************************************** -->
                        <!-- Product Description -->
                        <!-- *************************************************************** -->
                        <div class="row">
                            <div class="col-xs-12 pro_desc">
                                <p class="text-justify"> <?php echo $row_pro['Product_desc']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <!-- By this button customer will add the product to cart so that in future, if they want purchase that product they can -->
                            <!-- <a href="" type="button" class="btn btn-warning btn-lg btn-block mb-2">Add to Cart </a> -->
                            <button href="add_to_cart.php" type="sumbit" name="add_to_cart" class="btn btn-warning btn-lg mb-2">Add to Cart</button>
                        </div>
                        <div class="row">
                            <!-- By this button customer will purchase the product-->
                            <a href="add_to_cart.php?pro_id=<?php echo base64_encode($row_pro['ID']); ?>" type="button" class="btn btn-primary btn-lg ">Buy Now</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
<?php  } ?>
<!-- 
</div> -->
</br></br>
<!-- *************************************************************** -->
<!-- we can se all the produvts related to that category -->
<!-- *************************************************************** -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-xs-12 col-md-12 col-lg-12 col-xl-12">

            <h2 class="text-center"> Related products</h2>
        </div>
    </div>
</div>
<!--link js -->

<div class="container">
    <div class="row">
        <?php
        $get_Cat_Id = $_SESSION['Cat_Id'];
        $select_top_pro = "select * from products where Cat_Id='$get_Cat_Id'";
        $run_top = mysqli_query($con, $select_top_pro);
        while ($row = mysqli_fetch_array($run_top)) {
        ?>
            <div class="card  col-xs-12 col-sm-6 col-lg-3 p-0 shadow-sm image-hover m-4 ">
                <a href="product.php?pro_id=<?php echo base64_encode($row['ID']); ?>">
                    <!--fetch the product by Id-->
                   <div class="overlay-image-product">
                        <!--All details of Product -->
                        <a class="buyNow" href="product.php?pro_id=<?php echo base64_encode($row['ID']); ?>">Buy</span></a>
                    </div>

                    <img class="card-img-top " src="assets/images/<?php echo $row['Imag']; ?>" />
                    <!--fetch the product by image from products database-->
                </a>
                <div class="card-body">

                    <div class="caption">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <p class="text-nowrap  m-0"> <?php echo $row['Product_Title']; ?> </p>
                                <!--fetch the product by product title from products database-->
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <p class="prices text-nowrap m-0"> Price - ₹ <?php echo $row['Price']; ?></p>
                                <!--fetch the product by price from products database-->
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        <?php }

        ?>
    </div>

</div>

<?php
include_once('include/footer.php');
?>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/popper.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>