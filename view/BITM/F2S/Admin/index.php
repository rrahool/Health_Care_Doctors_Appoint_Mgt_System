<?php
session_start();

require_once ('../../../../vendor/autoload.php');
use App\Utility\Utility;
use App\User\User;
if (!isset($_SESSION['username']) && empty($_SESSION['username']) && is_null($_SESSION['username'])) {
    Utility::redirect('adminLogIn.php');
}

$objUser=new User();
$allUser=$objUser->allUsers();
$totalUser=count($allUser);

$allDoctors=$objUser->allDoctors();
$totalDoctors=count($allDoctors);

$allMedicines =$objUser->allMedicines();
$totalMedicines=count($allMedicines);

$allAppointment=$objUser->allAppointments();
$totalAppointment=count($allAppointment);


$allBill=$objUser->allBills();
$totalBill=count($allBill);


$allPayment=$objUser->allPayments();
$totalPayment=count($allPayment);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../../resources/style/style.css">

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
                        <a href="AdminLogOut.php" class="btn btn-danger ">Log Out</a>
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

<div class="row" style="margin-top: -20px;">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <h1 class="media-object " align="center">Admin Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row center-block" style="margin-bottom: 15px;">
    <div class="container">
        <div class="row col-lg-12" align="center">
            <div class="col-lg-offset-2 col-lg-10">
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture">
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3><span><?php echo $totalUser; ?></span></h3>
                        <p>Users</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="allUser.php" >User More info</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3><span><?php echo $totalDoctors; ?></span></h3>
                        <p>Doctors</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="doctors.php" class="" >Doctors More info</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3><span><?php echo $totalMedicines; ?></span></h3>
                        <p>Medicines</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="../Medicine/allMedicine.php" >Medicines More Info</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box2" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3><span><?php echo $totalAppointment; ?></span></h3>
                        <p>Appointments</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="../Appointment/allAppointment.php" >Appointment More Info</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box2" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3><span><?php echo $totalBill; ?></span></h3>
                        <p>Bills</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="../Bill/allBill.php" >More info About Bill</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box2" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3><span><?php echo $totalPayment; ?></span></h3>
                        <p>Payments</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="../Payment/allPayment.php" >More info About Payment</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box3" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3>222</h3>
                        <p>Users</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="#" >More info</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box3" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3>222</h3>
                        <p>Users</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="#" >More info</a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12 small-box3" >
                    <div class="col-lg-4 col-md-4 center-block doctorspicture" >
                        <img class="img-responsive" height="93" width="63" src="../../../../resources/images/logo.png"/>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h3>222</h3>
                        <p>Users</p>
                    </div>
                    <div class="col-lg-12 col-md-12 adminBox">
                        <a href="#" >More info</a>
                    </div>
                </div>
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
                            &nbsp; &nbsp;  by:F2S
                        </h5>
                        <p style="float:right; display:inline"><a href="#top"><u>Go to
                                    top</u></a></p>
                    </footer>
                </div>

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
