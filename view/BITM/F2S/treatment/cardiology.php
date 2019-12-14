
<?php
session_start();
include_once ('../../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\OnlineTreatment\OnlineTreatment;
use App\Utility\Utility;

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    header('location:../../index.php');
}

$doctors= new OnlineTreatment();
$allDoctors=$doctors->getAllTypeCardiology();
//Utility::dd($allDoctors);

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
                            <li><a href="../../Views/treatment/pediatric.php">Pediatric</a></li>
                            <li  class="active"><a href="../../Views/treatment/cardiology.php">Cardiology</a></li>
                            <li><a href="#">Gynecology</a></li>
                            <li><a href="#">Medicine</a></li>
                            <li><a href="#">Dental</a></li>
                            <li><a href="#">Others</a></li>
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
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">

        <div class="row">
            <div class="col-lg-offset-1 col-lg-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                        <li data-target="#myCarousel" data-slide-to="6"></li>
                        <li data-target="#myCarousel" data-slide-to="7"></li>
                        <li data-target="#myCarousel" data-slide-to="8"></li>
                        <li data-target="#myCarousel" data-slide-to="9"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide1.jpg"
                                 alt="Chania">
                            <div class="carousel-caption">
                                <h3>Chania</h3>
                                <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide2.png"
                                 alt="Chania">
                            <div class="carousel-caption">
                                <h3>Chania</h3>
                                <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide3.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img style="height: 360px; width: 700px;"  src="../../Resource/Image/slideImage/slide4.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide5.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide6.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide7.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide8.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide9.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 360px; width: 700px;" src="../../Resource/Image/slideImage/slide10.jpg"
                                 alt="Flower">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="media-heading" style="background-color: orange; text-decoration-color: black;
                    padding-bottom: 1px;
                    padding-top: 3px;">
                        <h4 align="center" >Consult with
                            following specialist</h4>
                    </div>
                    <?php foreach ($allDoctors as $singleDoctor){?>
                    <div class="col-lg-6 col-sm-6">
                        <div class="row">
                            <figure class="img-responsive">
                                <img class="img-rounded" height="150px;" width="170px;"
                                     src="../../resources/images/doctorsImage/<?php echo $singleDoctor['image']?>"
                                     alt="Doctor image missing" />
                            </figure>
                            <div class="doctorsProfile">
                                <h6 class="hidden"><?php echo $singleDoctor['id']?></h6>
                                <h4 style="color: midnightblue" align="left"><span><?php echo $singleDoctor['doctor_name']?></span></h4>
                                <h5>Cardiology specialist</h5>
                                <span><?php echo $singleDoctor['status']?></span>
                                <h6>Available at <?php echo $singleDoctor['available_time']?></h6>
                                <form action="consultation.php" method="post">
                                    <input type="hidden" name="doctorsName" value="<?php echo $singleDoctor['doctor_name'] ?>">
                                    <input type="hidden" name="doctorsId" value="<?php echo $singleDoctor['id']; ?>">
                                <button type="submit" class="btn btn-info btn-group-justified">Consult Now!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
        </div>

        </div>
    </div>

</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12">
            <div class="row alert-info article">
                <article class="text-danger" id="article">
                    <h3>Definition</h3><hr>
                    <p>Chickenpox is a viral infection that causes an itchy,blister-like rash.Chickenpox is highly contagious to people who haven’t had the disease nor been vaccinated against it.Before routine chickenpox vaccination,
                        virtually all people had been infected by the time they reached adulthood,sometimes with serious complications.Today,the number of cases and hospitalizations is down dramatically.
                        For most people,chickenpox is a mild disease.Still,it’s better to get vaccinated.The chickenpox vaccine is a safe,effective way to prevent chickenpox and its possible complication.</p>
                </article>
            </div>

            <div class="row alert-success article">
                <article class="text-danger" id="article">
                    <h3>Symptoms</h3><hr>
                   <p>Chickenpox infection usually lasts about five to 10 days.The rash is the telltale indication of chickenpox.Other signs and symptoms,which may appear one to two days before the rash,include:

                       •	Fever •	Loss of appetite •	Headache •	Tiredness and a general feeling of being unwell</p>
                </article>
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
<script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
