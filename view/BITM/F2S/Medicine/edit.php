<?php

require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

$obj = new \App\Medicine\Medicine();

$obj->setData($_GET);
$singleData = $obj->view();



echo "<div>  <div id='message'>  $msg </div>   </div>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicine Edit Form</title>
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
        <legend class="text-center">Medicine Information Update</legend>
        <fieldset class="text-center">

            <div class="form-group">
                <label for="medicineName"> <h4>Please Enter Medicine Name:</h4></label>
                <input type="text" name="medicineName" value="<?php echo $singleData->medicine_name?>">

            </div>

            <div class="form-group">
                <label for="price"><h4>Please Enter Price:</h4> </label>
                <input type="text" name="price" value="<?php echo $singleData->price?>">
            </div>

            <div class="form-group">
                <label for="category"><h4>Please Enter Category:</h4> </label>
                <input type="text" name="category" value="<?php echo $singleData->category?>">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>
            <div>            <input type="hidden" name="id" value="<?php echo $singleData->id?>">

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