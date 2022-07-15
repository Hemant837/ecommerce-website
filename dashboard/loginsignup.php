<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#f9f9f9;height:100%">

    <?php
    include_once("include/header.php");
    // if (isset($_POST['submit'])) {
    //     $email = $_POST['email'];
    //     $pass = $_POST['pass'];

    //     $select = "select * from user_master where email= '$email' AND pass='$pass'";
    //     $run = mysqli_query($con, $select);
    //     $row = mysqli_num_rows($run);
    //     if ($row > 0) {
    //         echo "<script>window.open('index.php','_self')</script>";
    //         $row_user = mysqli_fetch_array($run);
    //         $_SESSION['user_name'] = $row_user['name'];
    //         $_SESSION['user_id'] = $row_user['id'];
    //     } else {
    //         echo 'error';
    //     }
    // }


    ?>
    <div class="row mt-2">
        <div class="col-xs-0 col-lg-2"></div>
        <div class="col-xs-12 col-lg-8 pl-8 pr-8 ">
            <fieldset class="login-form">
                <div class="row mt-" style="padding:70px 0px">
                    <div class=" col-sm-12">
                        <h1 class="text-center heading w-100" style="color: #05053d;"> <b>
                                <h3> Already have an account </h3>
                            </b> </h1>
                    </div>
                    <div class=" col-sm-12">
                        <form method="post">
                            <div class="form-group">
                                <div class="row mt-4 mb-3">
                                    <div class=" col-sm-3"></div>

                                    <ul class="quick-lick text-center">
                                        <!-- <button type="button" class="btn btn-outline-dark  mr-5 "> <a href="#"><i class="fa fa-facebook mr-2 text-primary"></i>FACEBOOK</a></button>
                                        <button type="button" class="btn btn-outline-danger ml-2 mr-5"> <a href="#"><i class="fa fa-google mr-2 text-secondary"></i>GOOGLE</a></button>
 -->

                                        <!-- <div class=" col-sm-6"><input type="email" class="form-control" name="email" placeholder="Email" required></div> -->
                                </div>

                                <div class="row mb-5">
                                    <div class=" col-sm-3"></div>
                                    <button type="button" class="btn btn-outline-danger btn-lg ml-5 mr-5"> <a href="login.php"><i class="fa fa-envelope mr-2 text-dark"></i>LOGIN WITH EMAIL</a></button>
                                </div>
                                <div>
                               
                              <hr class="text-center mt-3" style="color:#000000;"> <p class="text-center heading  w-100" style="color: #000000;">OR</p> </hr >
                                <div class=" col-sm-12">
                                    <h1 class="text-center heading w-100" style="color: #05053d;"> <b>
                                            <h3>New to Shopping Cart? </h3>
                                        </b>
                                    </h1>
                                    <div class=row mb-4>
                                        <div class=" col-sm-3"></div>
                                        <button type="button" class="btn btn-outline-danger ml-5 mr-5"> <a href="register.php"><i class="fa  fa-user mr-2 text-secondary"></i> CREATE NEW ACCOUNT</a></button>

                                    </div>

                                </div>
                                <!-- <div class="row mb-5">
                                    <div class=" col-sm-5"></div>
                                    <div class=" col-sm-5"><button class="btn btn-light btn-lg btn-block mb-2" style="color:#fff;background-color:#ff69b4;" type="submit" name="submit">
                                            <h6> LOGIN </h6>
                                        </button></div>
                                    <div class=" col-sm-4"></div>
                                </div> -->
                            </div>
                        </form>
                    </div>



                </div>

        </div>
        </fieldset>
    </div>
    </div>