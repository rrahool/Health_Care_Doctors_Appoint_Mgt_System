
<?php
session_start();
require_once ('../../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\OnlineTreatment\OnlineTreatment;
use App\Utility\Utility;


//Utility::dd($_POST);


if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    Utility::redirect('../../index.php');
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
    <link href="../../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../resources/style/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{
            background-color: #FBFBFB;
        }

    </style>
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
                    <div class="col-xs-6 center-block">
                        <a href="../User/userLogOut.php" class="btn btn-danger ">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="container ">
            <div class="row">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Home</a></li>
                            <li class="active"><a href="pediatric.php">Consultation</a></li>
                            <li><a href="../Appointment/create.php">Appointment</a></li>
                            <li><a href="#">Medicine</a></li>
                            <li><a href="../Menu_bar/service.php">Services</a></li>
                            <li><a href="../Menu_bar/contact.php">Contact</a></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="Search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="search ">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>

        </div>
    </div>
</div>
<br>
<div class="large center-block text-center text-capitalize" id="message"
     style="align-content: center; width:50%;">
    <?php
    if (!empty($_SESSION['message'])) {
        \App\Message\Msg::blue($_SESSION['message']);
        $_SESSION['message'] = "";
    }
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div class="form-group ">
                <form class="form-horizontal" action="messageStore.php" method="post">
                    <h3 align="center">Send a message to <span style="color: red;"><?php echo $_POST['doctorsName']; ?></span></h3>
                    <hr>
                    <input type="hidden" name="doctors_id" value="<?php echo $_POST['doctorsId']; ?>"/>
                    <input type="hidden" name="userEmail" value="<?php echo $_SESSION['email']; ?>"/>
                    <div class="form-group has-success">
                        <label class="">Disease Name</label>
                        <input class="form-control" type="text" name="diseaseName" placeholder="Enter your disease name"
                               required autocomplete="off">
                    </div>
                    <div class="form-group has-success">
                        <label for="exampleTextarea">Your Message</label>
                        <textarea class="form-control" id="exampleTextarea" rows="4" name="sms" required></textarea>
                    </div>
                    <br>
                    <div class="form-group" align="right">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button  type="submit" class="btn btn-primary">Submit</button>
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
<script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#message').show().delay(3000).fadeOut(1500);
</script>
</body>
</html>
