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
        $name = $_POST['name'];
        $status = $_POST['status'];

        $insert = " insert into category(Name,Status)values('$name','$status')";

        $run = mysqli_query($con, $insert);
        if ($run > 0) {
            echo "<script>window.open('product_cat.php','_self')</script>";
        } else {
            echo "error";
        }
    } else {

        if (isset($_POST['sumbit']) && isset($_GET['edit'])) {
            $ID = $_POST['ID'];
            $name = $_POST['name'];
            $status = $_POST['status'];
            $update = " update  category set Name='$name',Status='$status' where ID='$ID'";
            $run = mysqli_query($con, $update);
        }
    }

    //---------- Edit----------//
    if (isset($_GET['id'])) {
        $get_id = $_GET['id'];

        $select = "select * FROM category WHERE ID=$get_id";
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
                    <h1 class="text-center mt-4">Product Category</h1>
                </div>

            </main>
            </br></br>
            <div class=" row">
                <div class=" col-sm-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <h4 class="text-center">Add New Product Category</h4>

                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="ID" value="<?php echo $row['ID']; ?>" />
                                <input type="text" name="name" placeholder="Category Name" class="form-control" require value="<?php echo $row['Name']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option <?php if ($row['Status'] == 'inactive') {
                                                echo "selected";
                                            } ?> value="active">Active</option>
                                    <option <?php if ($row['Status'] == 'inactive') {
                                                echo "selected";
                                            } ?> value="inactive">Inactive</option>
                                </select>
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