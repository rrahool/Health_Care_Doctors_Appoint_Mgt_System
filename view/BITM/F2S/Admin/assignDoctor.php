<?php
session_start();
require_once('../../../../vendor/autoload.php');

use App\Utility\Utility;
if (!isset($_SESSION['username']) && empty($_SESSION['username']) && is_null($_SESSION['username'])) {
    Utility::redirect('adminLogIn.php');
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Assign a Doctor</title>

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
                    <img class="logo" style="width: 220px; height: 90px;" src="../../../../resources/images/logo.png">
                </div>
                <div class="row loginButton pull-right">
                    <div class="col-xs-6">
                        <a href="index.php" class="btn btn-info ">Dashboard</a>
                    </div><div class="col-xs-6">
                        <a href="AdminLogOut.php" class="btn btn-danger ">Log Out</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: -20px;">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <h1 class="media-object " align="center">Admin Dashboard</h1>
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

<br>

<div class="container">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-6">
            <div class="panel-heading">
            </div>
            <div class="modal-body modal-sm ">
                <h4 align="center">Fill up the doctors information</h4><hr>
                <form action="storeDoctoreInfo.php" enctype="multipart/form-data" method="post">
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="name" class="form-control" placeholder="Full name" required autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback modal-scrollbar-measure;"></span>
                    </div>
                    <div class="form-group has-feedback has-error">
                        <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off"
                        >
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="password" name="password" required autocomplete="off" class="form-control"
                               placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <select class="form-control" name="type" required>
                            <option>Pediatric</option>
                            <option>Cardiology</option>
                            <option>Gynecology</option>
                            <option>Medicine</option>
                            <option>Dental</option>
                        </select>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="status" class="form-control"
                               placeholder="status as a PRof. in CMC" required autocomplete="off">
                        <span class="glyphicon glyphicon-plus-sign form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="tel" name="mobile" id="text1" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" class="form-control"
                               placeholder="Mobile No" value="88" required autocomplete="off">
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        <span id="error" style="color: Red; display: none">*please Input digits (0 - 9)</span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="address" class="form-control"
                               placeholder="Address" required autocomplete="off">
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="availableTime" class="form-control"
                               placeholder="Available at " required autocomplete="off">
                        <span class="glyphicon glyphicon-time form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="file" name="image" class="form-control" required autocomplete="off">
                        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
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


<div class="row">
    <div class="col-lg-12">
        <div class="panel-footer " >
            <div class="panel-heading col-lg-offset-1">
                <div>
                    <div class="col-lg-6">
                        <article>
                            <h4>Member Support</h4>
                            <div class="">
                                <ul class="list-inline">
                                    <li class=""><a href="#" title="About us">About us</a></li>
                                    <li class=""><a href="#" title="Contact">Contact</a></li>
                                    <li class=""><a href="#" title="FAQ">FAQ</a></li>
                                    <li class=""><a href="#" title="Careers">Careers</a></li>
                                    <li class=""><a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li>
                                    <li class=""><a href="#" title="Privacy statement">Privacy statement</a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-6">
                        <article class="">
                            <h4>Follow us</h4>
                            <ul class="social list-inline">
                                <li class="facebook"><a href="#" title="facebook">facebook</a></li>
                                <li class="youtube"><a href="#" title="youtube">youtube</a></li>
                                <li class="linkedin"><a href="#" title="linkedin">linkedin</a></li>
                                <li class="googleplus"><a href="#" title="googleplus">googleplus</a></li>
                                <li class="twitter"><a href="#" title="twitter">twitter</a></li>
                                <li class="pinterest last"><a href="#" title="pinterest">pinterest</a></li>
                            </ul>
                        </article>
                    </div>
                </div>
                <br>
                <div align="center">
                    <footer style="height: 70px;">
                        <h5 align="center" style="display:inline">  &nbsp; &nbsp;Copyright © 2017 Medical info & treatment
                            service |
                            Designed
                            &nbsp; &nbsp;  by: Tahsina, Humayra.
                        </h5>
                        <p style="float:right; display:inline"><a href="#top"><u>Go to
                                    top</u></a></p>
                    </footer>
                </div>

            </div>

        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../../resources/bootstrap/js/jquery.js"></script>
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
