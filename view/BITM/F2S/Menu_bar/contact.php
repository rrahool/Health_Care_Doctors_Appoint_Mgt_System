
<?php
require_once ('../../../../vendor/autoload.php');
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Us</title>

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
    <script src="../../../../resources/Jquery/jquery.min.js"></script>
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#contact_container").hide(0);
            $("#success_message").hide();
            $("#contact").click(function () {
                $("#contact_container").slideToggle("slow");
            });

            $("#fac").mouseenter(function () {
                $("#facu").fadeIn("slow", function () {
                    $("#fac").mouseleave(function () {
                        $("#facu").fadeOut(500);
                    });
                });
            });

            $("#add").mouseenter(function () {
                $("#addu").fadeIn("slow", function () {
                    $("#add").mouseleave(function () {
                        $("#addu").fadeOut(500);
                    });
                });
            });

            $("#submit").click(function () {
                $("#success_message").fadeIn("slow", function () {
                    $(this).delay(1300);
                    $(this).fadeOut("slow");
                });
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $("#input").keyup(function () {
                $("#text").html($("#input").val());
            });
        });
    </script>

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
                            <li><a href="../treatment/pediatric.php">Consultation</a></li>
                            <li><a href="../Appointment/create.php">Appointment</a></li>
                            <li><a href="../Menu_bar/medicine.php">Medicine</a></li>
                            <li><a href="service.php">Service</a></li>
                            <li class="active"><a href="contact.php">Contact</a></li>
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
<hr><div class="contact_us">
    <div class="text-center">
        <button id="contact" class="btn btn-info">Contact Us</button>
    </div>
    <br>

    <div id="contact_container" class="container">
        <div class="alert alert-success text-center" role="alert" id="success_message"><i
                class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us.
        </div>
        <form class="well form-horizontal" action="" method="post" id="contact_form">
            <fieldset>
                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>

                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="first_name" name="first_name" placeholder="First Name" class="form-control"
                                   type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Last Name</label>

                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name" placeholder="Last Name" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Email</label>

                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="Email" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Address</label>

                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="email" placeholder="Address" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Your message</label>

                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea id="input" class="form-control" name="comment" placeholder="Message"></textarea>
                        </div>
                    </div>
                </div>

                <div id="text"></div>


                <div class="form-group">
                    <label class="col-md-4 control-label"></label>

                    <div class="col-md-4">
                        <button type="button" id="submit" class="btn btn-success">Send <span
                                class="glyphicon glyphicon-send"></span>
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
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
</body>
</html>