<?php
session_start();
require_once ('../../../../../vendor/autoload.php');
use App\Message\Message;
use App\Doctor\Doctor;
use App\Utility\Utility;

if (!isset($_SESSION['username']) && empty($_SESSION['username']) && is_null($_SESSION['username'])) {
    Utility::redirect('adminLogIn.php');
}

$obj = new Doctor();
$obj->setData($_GET);
$singleUser = $obj->view();


//die();

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Info Of Single Users</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../../../../resources/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../../../resources/style/style.css">

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
                    <img class="logo" style="width: 220px; height: 90px;" src="../../../../../resources/images/logo.png">
                </div>
                <div class="row loginButton pull-right">
                    <div class="col-xs-6">
                        <a href="../index.php" class="btn btn-info ">Dashboard</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="../AdminLogOut.php" class="btn btn-danger ">Log Out</a>
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

require_once("../../../../../vendor/autoload.php");


$msg = Message::message();

echo "<div>  
                 <div id='message' style='color: red;padding: 10px;margin: 20px;font-size: 25px'>  $msg </div>
            </div>";

?>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!--            <h3 class="" align="center">All User Information</h3>-->
            <h3 class="center-block">Single User Information</h3>
            <table class="table table-responsive table-bordered">
                <thead class="label-info">
                <tr class="text-danger text-capitalize">
                    <th class="text-center">Doctors_id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center col-lg-offset-1">Email</th>
                    <th class="text-center">Mobile</th>
                    <th class="text-center">DR. type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Join Date & time</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    echo "
                   

                   <td style='text-align:center;font-size: large'>$singleUser->id</td>
                   <td style='text-align:center;font-size: large'>$singleUser->doctor_name</td>
                   <td style='text-align:center;font-size: large'>$singleUser->email</td>
                   <td style='text-align:center;font-size: large'>$singleUser->mobile</td>
                   <td style='text-align:center;font-size: large'>$singleUser->type</td>
                   <td style='text-align:center;font-size: large'>$singleUser->status</td>
                   <td style='text-align:center;font-size: large'>$singleUser->address</td>
                   <td style='text-align:center;font-size: large'>$singleUser->join_date<br>at

                       $singleUser->join_time

                   </td>
" ?>
                </tr>
                </tbody>
            </table>

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
<script src="../../../../../resources/bootstrap/js/jquery.js"></script>

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