<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>


<body class="sb-nav-fixed">
    <?php require('include/header.php');


    //---------- INSERT----------//
    if (isset($_POST['submit']) && !isset($_GET['edit'])) {
        $product_title = $_POST['name'];
        $prices = $_POST['Prices'];
        // $image = $_post['Imag'];
        $Cat_Id = $_POST['Cat_Id'];
        $Product_desc = $_POST['Product_desc'];
        $insert = " insert into products(Product_Title,Price,Cat_Id,Product_desc)values('$product_title','$prices','$Cat_Id','$Product_desc')";

        $run = mysqli_query($con, $insert);
        if ($run > 0) {
            echo "<script>window.open('products.php','_self')</script>";
        } else {
            echo "error";
        }
    } else {

        if (isset($_POST['sumbit']) && isset($_GET['edit'])) {
            $ID = $_POST['ID'];
           
            $product_title = $_POST['name'];
            $prices = $_POST['Prices'];
            // $image = $_post['Imag'];
            $Cat_Id = $_POST['Cat_Id'];
            $Product_desc = $_POST['Product_desc'];
            $update = " update  category set Product_Title='$product_title',Price='$price',Cat_Id='$Cat_Id',Product_desc='$Product_desc' where ID='$ID'";
            $run = mysqli_query($con, $update);
        }
    }

    //---------- Edit----------//
    if (isset($_GET['ID'])) {
      echo  $get_Id = $_GET['ID'];
      
        $select = "select * FROM products WHERE Cat_Id=$get_Id";
        $run = mysqli_query($con, $select);

        $row = mysqli_fetch_array($run);
    }
    ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require('include/sidebar.php'); ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="text-center mt-4">Product Details </h1>
                </div>

            </main>
            </br></br>
            <div class=" row">
                <div class=" col-sm-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <h4 class="text-center">Add New Product details</h4> 

                    <div class="card-body">
                        <form method="post">
                            <div class="form-group"> 
                                <label>Product Title</label>
                                <input type="text" name="ID" value="<?php echo $row['ID']; ?>" />
                                <input type="text" name="name" placeholder=" Product Title" class="form-control" require value="<?php echo $row['Product_Title']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Prices</label>
                                <input type="text" name="price" placeholder="Prices" class="form-control" require value="<?php echo $row['Prices']; ?>"/>
                            </div>
                            <!-- <div class="form-group">
                                <label>Image</label>
                                <input type="text" name="name" placeholder="Image" class="form-control" require />
                            </div> -->
                            <div class="form-group">
                                <label>Category_Id</label>
                                <input type="text" name="Cat_Id" placeholder="Category_ID" class="form-control" require value="<?php echo $row['Cat_Id']; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Product Description</label>
                                <input type="text" name="Product_desc" placeholder="Product Description" class="form-control" require value="<?php echo $row['Product_desc']; ?>" />
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>