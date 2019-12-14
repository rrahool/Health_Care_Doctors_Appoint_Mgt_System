<?php
session_start();
require_once ('../../../../vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login as an Admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../../resources/style/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <img class="logo" style="width: 350px; height: 100px;" src="../../../../resources/images/logo.png">
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
                <form action="adminLoginCheck.php" method="post">
                    <h4>Log In Now as a admin!</h4><hr>
                    <div class="form-group has-feedback has-error">
                        <input type="text" name="username" class="form-control" placeholder="username" required
                               autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

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
