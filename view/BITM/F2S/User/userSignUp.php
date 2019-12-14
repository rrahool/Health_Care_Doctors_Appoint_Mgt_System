<?php
require_once('../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signing Up as a User!!</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../../resources/style/style.css">

</head>
<body>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
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


$msg = Message::message();

echo "<div>  
                 <div id='message' style='color: red;padding: 10px;margin: 20px;font-size: 25px'>  $msg </div>
            </div>";

?>

<div class="container">
    <div class="row userLogin" >
        <div class="col-lg-offset-4 col-lg-4">
            <div class="panel-heading">
            </div>
            <div class="modal-body modal-sm ">
                <h4 align="center">Sign Up for free</h4><hr>
                <form action="registration.php" method="post">
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="first_name" class="form-control" placeholder="First name" required autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback modal-scrollbar-measure;"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="last_name" class="form-control" placeholder="Last name" required autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback modal-scrollbar-measure;"></span>
                    </div>
                    <div class="form-group has-feedback has-error">
                        <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off"
                        >
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="password" name="password" required autocomplete="off" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="tel" name="phone" id="text1" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" class="form-control"
                               placeholder="Mobile No" value="88" required autocomplete="off">
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        <span id="error" style="color: Red; display: none">*please Input digits (0 - 9)</span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="address" class="form-control" placeholder="Address" required autocomplete="off">
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>




                    <div class="form-group has-feedback has-success">
                        <h5 class="left">Already have an account?<a href="userLogin.php"> Log in Now</a></h5>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button  class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

<script type="text/javascript">
    var specialKeys = new Array();
    specialKeys.push(8); //Backspace
    function IsNumeric(e) {
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 48 && keyCode <= 57 ) || specialKeys.indexOf(keyCode) != -1);
        document.getElementById("error").style.display = ret ? "none" : "inline";
        return ret;
    }
</script>
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
