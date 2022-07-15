<style>
.newRow {
    display: flex;
    flex-wrap: wrap;
}

.containerHeading {
    color: #162950;
    margin-left: 60vh;
    font-size: 28px;
    margin-top: 20px
}

.buyNow {
    background-color: #162950;
    color: white;
    padding: 8px 8px;
    border-radius: 3px;
}

.buyNow:hover {
    color: white;
}

.card {
    width: 29%;
    height: 420px
}

</style>

<div class="container">
    
    <div class="row">
        <!-- *************************************************************** -->
        <!-- Top Products  -->
        <!-- *************************************************************** -->
        <h2 class="containerHeading">Trending Products</h2>  
    </div>



    <div class="newRow">
        <!--fetch data from topproducts database -->
        <?php
        $select_top_pro = "select * from topproducts left join products on products.ID = topproducts.product_id";
        $run_top = mysqli_query($con, $select_top_pro);
        while ($row = mysqli_fetch_array($run_top)) {
        ?>
            <div class="card shadow-sm image-hover m-4 ">
                <a href="product.php?pro_id=<?php echo base64_encode($row['ID']); ?>">
                    <div class="overlay-image-product">
                        <!--All details of Product -->
                        <a class="buyNow" href="product.php?pro_id=<?php echo base64_encode($row['ID']); ?>">Buy</span></a>
                    </div>
                    <!-- fetch Image from topproducts database from column Imag  -->
                    <img class="card-img-top " src="assets/images/<?php echo $row['Imag']; ?>" />
                </a>
                <div class="card-body">

                    <div class="caption">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <!-- fetch Title from topproducts database from Product_Title -->
                                <p class="text-nowrap  m-0"> <?php echo $row['Product_Title']; ?> </p>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <!-- fetch Price from topproducts database from column price -->
                                <p class="prices text-nowrap m-0"> ₹ <?php echo $row['Price']; ?></p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>