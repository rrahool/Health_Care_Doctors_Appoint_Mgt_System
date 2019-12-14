<?php
session_start();
require_once ('../../../../vendor/autoload.php');

use App\Utility\Utility;

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    Utility::redirect('doctorLogIn.php');
}










?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Life Care</title>

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
                            <a href="doctorMailBox.php" class="btn btn-info  has-success">
                                <span class="glyphicon glyphicon-envelope"></span> Inbox
                                <?php if ($totalUnread>=1) { ?>
                                <span class="mailBox"><?php echo $totalUnread ?></span>
                                <?php }?>

                            </a>
                        </div>

                    <div class="col-xs-6">
                            <a href="DoctorLogOut.php" class="btn btn-danger "></span>
                                Log Out</a>
                        </div>
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

<br>

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
                                    <li class=""><a href="#" title="Terms &amp; Conditions">Terms &amp;
                                            Conditions</a></li>
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
                            &nbsp; &nbsp;  by: F2S.
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
