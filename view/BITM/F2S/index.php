<?php
session_start();
include_once ('../../../vendor/autoload.php');
use App\Message\Message;
use App\User\User;
use App\Utility\Utility;
use App\OnlineTreatment\OnlineTreatment;

//Utility::dd($_SESSION);

//$_POST['email']=$_SESSION['email'];
//Utility::dd($_POST['doctors_id']);
$user= new User();
$user->setData($_POST);



$userId=$user->getUserId();
//Utility::dd($userId);
$_POST['user_id']=$userId['user_id'];
//Utility::dd($_POST['user_id']);
$reply= new OnlineTreatment();
$reply->setData($_POST);
$unreadReply=$reply->getUnreadReplyOfAUser();
//Utility::dd($unreadReply);
$totalUnread=count($unreadReply);
//Utility::dd($totalUnread);




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
    <link href="../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../resources/style/style.css" rel="stylesheet" type="text/css">

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
                    <img class="logo" style="width: 360px; height: 110px;" src="../../../resources/images/logo.png">
                </div>

                <div class="row loginButton pull-right">
                    <?php if(!isset($_SESSION['email']) && empty($_SESSION['email'])){ ?>
                        <div class="col-xs-6">
                            <a href="User/userLogin.php" class="btn btn-success ">Log in</a>
                        </div>
                        <div class="col-xs-4">
                            <a href="User/userSignUp.php" class="btn btn-info ">Sign up</a>
                        </div>
                    <?php } else{?>
                        <div class="col-xs-6">
                            <a href="User/UserMailBox.php" class="btn btn-info  has-success">
                                <span class="glyphicon glyphicon-envelope"></span> Inbox
                                <?php if ($totalUnread>=1) { ?>
                                    <span class="mailBox"><?php echo $totalUnread ?></span>
                                <?php }?>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="User/userLogOut.php" class="btn btn-danger "></span>
                                Log Out</a>
                        </div>
                    <?php }?>
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
                            <li  class="active" ><a href="#">Home</a></li>
                            <li data-toggle="tooltip">
                                <a disabled="true" href="treatment/pediatric.php">Consultation</a>
                            </li>
                            <li data-toggle="tooltip"><a href="#">Appointment</a></li>
                            <li data-toggle="tooltip"><a href="#">Medicine</a></li>
                            <li data-toggle="tooltip"><a href="#">Services</a></li>
                            <li data-toggle="tooltip"><a href="#">Contact</a></li>
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
<div class="large center-block text-center text-capitalize" id="message"
     style="align-content: center; width:50%;">
    <?php
    if (!empty($_SESSION['message'])) {
        \App\Message\Msg::blue($_SESSION['message']);
        $_SESSION['message'] = "";
    }
    ?>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel"  ">
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
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide1.jpg" alt="Chania">
                        <div class="carousel-caption">
                        </div>
                    </div>

                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide2.png" alt="Chania">
                        <div class="carousel-caption">
                        </div>
                    </div>

                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide3.jpg" alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>

                    <div class="item">
                        <img style="height: 311px; width: 700px;"  src="../../../resources/images/slideImage/slide4.jpg"
                             alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide5.jpg" alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide6.jpg" alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide7.jpg" alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide8.jpg" alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide9.jpg"
                             alt="Flower">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="height: 311px; width: 700px;" src="../../../resources/images/slideImage/slide10.jpg"
                             alt="Flower">
                        <div class="carousel-caption">
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

    </div>

</div>


<br>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12">
            <div class="row alert-warning img-rounded">
                <article class="text-center" id="">
                    <h3>About Health Care</h3><hr>
                    <p>We are here to serve you from any part of world you want to contact with us.We will always be there to help you anytime.</p>
                    <p>Feel free to remind us for any kind of help.</p>
                </article>
            </div>
            <br>

            <div class="row alert-success img-rounded">
                <article class="text-center" id="">
                    <h3>How can you use this system?</h3><hr>
                    <p>To use this system simply you just need to be registered here. Click on register and be a member of us. You will get confirmation mail to active your account. Click "OK" and be a member of us.
                    </p>
                </article>
            </div>
            <br>

            <div class="row alert-danger img-rounded">
                <article class="text-center" id="">
                    <h3>What is the system about ?</h3><hr>
                    <p>The system is about various kinds of diseases information.Like diseases definition,symptoms,when to see a doctor,precautions,medicines,health tips etc.
                    </p>
                </article>
            </div>
            <br>
            <div class="row alert-info img-rounded">
                <article class="text-center" id="">
                    <h3>How a member can consult with the doctor by using this system?</h3><hr>
                    <p>There is a help box in this system.A member can get the doctors profile in help box.He/she can send message to the doctor.
                    </p>
                </article>
            </div>
            <br>
            <div class="row alert-warning img-rounded">
                <article class="text-center" id="">
                    <h3>What are the activities of a doctor for the system?</h3><hr>
                    <p>Our doctors are always ready to help their patient.When a member will send a message to a doctor,the doctor will also reply this message within an hour.
                    </p>
                </article>
            </div>
            <br>
            <div class="row alert-success img-rounded">
                <article class="text-center" id="">
                    <h3>Is the system is for all the people of the world?</h3><hr>
                    <p>Every people of the world can use this system.They can consult with the doctor and can get many health tips.
                    </p>
                </article>
            </div>
            <br>
            <br>
            <div class="row alert-danger img-rounded">
                <article class="text-center" id="">
                    <h3>Is the system is beneficial to a user?</h3><hr>
                    <p>The system is very useful to a user.They can consult with a doctor by using the system at their home.They can save their time.
                    </p>
                </article>
            </div>
            <br>
            <div class="row alert-info img-rounded">
                <article class="text-center" id="">
                    <h3>Is there any limitations?</h3><hr>
                    <p>We tried our best to make the system helpful to the user.But there are limitations also.We always tried to updated our system.
                    </p>
                </article>
            </div>
            <br>
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
<script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#message').show().delay(3000).fadeOut(1500);
</script>

<?php if(!isset($_SESSION['email']) && empty($_SESSION['email'])){ ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip({
                placement: 'bottom',
                title: '<div  class="alert-info media-body"><h4>Message!</h4><h5>You have to login first to go ' +
                'there</h5></div>',
                animation: true,
                html: true
            });
        });
    </script>
<?php }?>
</body>
</html>
