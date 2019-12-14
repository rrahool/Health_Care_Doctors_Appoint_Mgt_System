<?php
session_start();
require_once ('../../../../vendor/autoload.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logging In As a Doctor</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../resources/style/style.css">


</head>
<body>
<div class="row">
    <div class="col-md-12 col-xs-12 col-lg-12 mainHeading">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <img class="logo" style="width: 230px; height: 100px;" src="../../../../resources/images/logo.png">
                </div>
            </div>
        </div>
    </div>
</div>


<?php

require_once("../../../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();

echo "<div>  
                 <div id='message' style='color: red;padding: 10px;margin: 20px;font-size: 25px'>  $msg </div>
            </div>";

?>
<div class="container userLogin">
    <div class="row " >
        <div class="col-lg-offset-4 col-lg-4">
            <div class="modal-body modal-sm">
                <form action="doctorLoginCheck.php" method="post">
                    <h4>Log In Now as a Doctor!</h4><hr>
                    <div class="form-group has-feedback has-error">
                        <input type="text" name="email" class="form-control" placeholder="email" required
                               autocomplete="off">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="password" name="password" required autocomplete="off" class="form-control"
                               placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button  class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<script src="../../../../resources/bootstrap/js/jquery.js"></script>

<script>


    jQuery(

        function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>

</body>
</html>