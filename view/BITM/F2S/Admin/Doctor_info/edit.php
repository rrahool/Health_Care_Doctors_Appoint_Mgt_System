<?php
require_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\Utility\Utility;
$obj = new \App\Doctor\Doctor();

$obj->setData($_GET);
$singleUser = $obj->view();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update  as an User!!</title>
    <link rel="stylesheet" href="../../../../../resources/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../../../resources/style/style.css">

</head>
<body>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <img class="logo" style="width: 230px; height: 100px;" src="../../../../../resources/images/logo.png">
                </div>
            </div>
        </div>
    </div>
</div>
<?php


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
                <h4 align="center">Update the doctors information</h4><hr>
                <form action="update.php" enctype="multipart/form-data" method="post">
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="name" class="form-control" value="<?php echo $singleUser->doctor_name?>" >
                        <span class="glyphicon glyphicon-user form-control-feedback modal-scrollbar-measure;"></span>
                    </div>
                    <div class="form-group has-feedback has-error">
                        <input type="email" name="email" class="form-control" value="<?php echo $singleUser->email?>"
                        >
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="password" name="password" required autocomplete="off" class="form-control"
                               value="<?php echo $singleUser->password?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <select class="form-control" name="type" required>
                            <option name="type" value="Cardilogy" <?php if ($singleUser->type == "Cardiology") echo "selected"?>>Cardiology</option>
                            <option name="type" value="Gynecology" <?php if ($singleUser->type == "Gynecology") echo "selected"?>>Gynecology</option>
                            <option name="type" value="Pediatric" <?php if ($singleUser->type == "Pediotric") echo "selected"?>>Pediotric</option>
                            <option name="type" value="Medicine" <?php if ($singleUser->type == "Medicine") echo "selected"?>>Medicine</option>
                            <option name="type" value="Dental" <?php if ($singleUser->type == "Dental" ) echo "selected"?>>Dental</option>
                        </select>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="status" class="form-control"
                               value="<?php echo $singleUser->status?>">
                        <span class="glyphicon glyphicon-plus-sign form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="tel" name="mobile" id="text1" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" class="form-control"
                               value="<?php echo $singleUser->mobile?>">
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        <span id="error" style="color: Red; display: none">*please Input digits (0 - 9)</span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="address" class="form-control"
                               value="<?php echo $singleUser->address?>">
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback has-success">
                        <input type="text" name="availableTime" class="form-control"
                               value="<?php echo $singleUser->join_date ." at ". $singleUser->join_time ?>">
                        <span class="glyphicon glyphicon-time form-control-feedback"></span>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-warning">Update</button>

                    </div>


                    <div>
                        <input type="hidden" name="id" value="<?php echo $singleUser->id ?>">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<link rel="stylesheet" href="../../../../../resources/bootstrap/css/bootstrap.min.css">

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
