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

<body style="background-color:#f9f9f9;height:100%">
    <?php
    include_once('include/header.php');
    if (isset($_POST[' Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $subject = $_POST['subject'];
        $sms = $_POST['sms'];
        // <!-- *************************************************************** -->
        // <!-- sending mail to -->
        // <!-- *************************************************************** -->

        $to = "info@shoppingcart.com";
        $subject = "Enquery";
        $message = "Name: " . $name;                          //parent
        $message .= "contact Number: " . $contact;         //child
        $message .= "<p> Message: " . $sms . " <p>";          //child

        $header = "From: " . $email . " \r\n";
        // $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);
        //tell us whether mail is send or not
        if ($retval > 0) {
            echo "mail sent";
        } else {
            echo "not sent";
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <h1 class="text-center w-100" style="color: #05053d;"> <b> NEED HELP? </b> </h1>
        </div>
        <div class="row">
            <div class="col-lg-12 pl-8 pr-8">
                <fieldset class="Contact-form">
                    <h2 class="text-center "> We are here to help you</h2>
                    <form method="post">
                        <div class="form-group">
                            <label> NAME </label>
                            <input type="text" name="name" class="form-control" required placeholder="Enter Your Name" />
                        </div>
                        <div class="form-group">
                            <label> EMAIL </label>
                            <input type="email" name="email" class="form-control" required placeholder="Enter Your Email" />
                        </div>
                        <div class="form-group">
                            <label> CONTACT NUMBER </label>
                            <input type="number" name="contact" class="form-control" required placeholder="Enter Your Contact Number" />
                        </div>
                        <div class="form-group">
                            <label> SELECT QUERY TYPE</label>

                            <div class="input-group mb-3">
                                <select type="text" class="custom-select" name="subject">
                                    <option value="Order Related Queries">Order Related Queries</option>
                                    <option value="Non-oder Related Issues">Non-oder Related Issues</option>
                                    <option value="Recent Issues">Recent Issues</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> MESSAGE </label>
                            <textarea name="sms" placeholder="Enter your Query" class="form-control"> Enter your Query </textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="sumbit" name="sumbit" class="btn btn-primary btn-lg"> Submit </button>
                        </div>
                    </form>
                </fieldset>
                <br> </br>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="contact-form">

                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('include/footer.php');
    ?>
    <!--link js -->
    <script src="assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/popper.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>