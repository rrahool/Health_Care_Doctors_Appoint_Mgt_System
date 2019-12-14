<?php

require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

$obj = new \App\Appointment\Appointment();

$obj->setData($_GET);
$singleData = $obj->view();



echo "<div>  <div id='message'>  $msg </div>   </div>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Edit Form</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <style>
        body {
            background-color:inherit;
        }
    </style>
</head>
<body>

<div>

    <form class="well form-horizontal" action="update.php" method="post">
        <legend class="text-center">Appointment Information Update</legend>
        <fieldset class="text-center">

            <div class="form-group">
                <label for="patientName"> <h4>Please Enter Patient Name:</h4></label>
                <input type="text" name="patientName" value="<?php echo $singleData->patient_name?>">

            </div>

            <div class="form-group">
                <label for="doctorsName"><h4>Please Enter Doctors Name:</h4> </label>
                <input type="text" name="doctorsName" value="<?php echo $singleData->doctors_name?>">
            </div>

            <div class="form-group">
                <label for="patientPhone"><h4>Please Enter Patient Phone:</h4> </label>
                <input type="text" name="patientPhone" value="<?php echo $singleData->patient_phone?>">
            </div>

            <div class="form-group">
                <label for="time"><h4>Please Enter Time:</h4> </label>
                <input type="time" name="time" value="<?php echo $singleData->time?>">
            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>

            <div>
                <input type="hidden" name="id" value="<?php echo $singleData->id?>">

            </div>

        </fieldset>

    </form>

</div>




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