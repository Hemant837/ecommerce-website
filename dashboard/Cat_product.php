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
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <p class="text-center heading">
                    <!--fetch data according Category -->
                    <?php
                    $get_Cat_Id = $_GET['Cat_Id'];
                    $select_Cat = "select* from category where ID='$get_Cat_Id'";
                    $run_Cat = mysqli_query($con, $select_Cat);
                    $row_Cat = mysqli_fetch_array($run_Cat);
                    echo ucfirst($row_Cat['Name']);


                    ?>
                </p>
            </div>
        </div>

        <div class="row">
            <?php
            $select_top_pro = "select * from products where Cat_Id='$get_Cat_Id'";
            $run_top = mysqli_query($con, $select_top_pro);
            while ($row = mysqli_fetch_array($run_top)) {
            ?>
                <div class="card  col-xs-12 col-sm-6 col-lg-3 p-0 shadow-sm image-hover m-4 ">
                    <a href="product.php?pro_id=<?php echo base64_encode($row['ID']); ?>">
                        <div class="overlay-image-product">
                        <!--All details of Product -->
                        <a class="buyNow" href="product.php?pro_id=<?php echo base64_encode($row['ID']); ?>">Buy</span></a>
                    </div>
                        <!-- fetch Image from topproducts database from column Imag -->
                        <img class="card-img-top " src="assets/images/<?php echo $row['Imag']; ?>" />
                    </a>
                    <div class="card-body">

                        <div class="caption">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <!-- fetch Title from products database from Product_Title -->
                                    <p class="text-nowrap  m-0"> <?php echo $row['Product_Title']; ?> </p>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <!-- fetch Price from products database from column price -->
                                    <p class="prices text-nowrap m-0"> Price -₹ <?php echo $row['Price']; ?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <?php include_once('include/footer.php'); ?>
    <!--link js -->
    <script src="assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/popper.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>