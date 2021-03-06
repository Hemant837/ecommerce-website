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
    <?php require('include/header.php') ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require('include/sidebar.php'); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Product Category</h1>
                </div>
            </main>
            <div class="row">

                <div class="col-sm-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-body">
                        <a href="add_new_cart.php" class="btn btn-primary btn-sm pull-right"> Add New Category</a>
                        </br> </br> </br>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                $select = "select * from category";
                                $run = mysqli_query($con, $select);
                                $i = 1;
                                while ($row = mysqli_fetch_array($run)) { ?>
                                    <tr>
                                    <td> <?php echo $i;?></td>
                                    <td> <?php echo $row['Name']?></td>
                                    <td> <?php echo $row['Status']?></td>
                               
                                <td>
                                    <a href="delete.php?del=<?php echo $row ['ID'];?>" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="edit.php?id=<?php echo $row ['ID'];?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>

                                    </tr>

                                <?php $i++;
                                }
                                ?>
                               


                            </tbody>
                        </table>
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