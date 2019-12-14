<?php

require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;
use App\Payment\Payment;

$msg = Message::message();

$obj = new Payment();

$obj->setData($_GET);
$singleData = $obj->view();



echo "<div>  <div id='message'>  $msg </div>   </div>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Details</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../../../resources/style/create.css">
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="content">

<form action="update.php" method="post">


    <div id="form_head">
        <h1 align="center" style="color:#ffffcc;font-size:1.8em"><strong>Payment Information Form</strong></h1>


    </div>
        <hr>
        <br>

        <div class="wrapper">

            <input type="text" class="form-control" name="bill_id" value="<?php echo $singleData->bill_id ?>" required >
        </div>
            <div class="wrapper">

            <input type="text" class="form-control" name="discount" value="<?php echo $singleData->discount ?>" required >
      </div>
        <!--<div class="wrapper">

            <input type="text" class="form-control" name="net_amount" value="<?php echo $singleData->net_amount ?>"   required >
       </div>-->
                <div class="wrapper">

            <input type="text" class="form-control" name="paid_amount" value="<?php echo $singleData->paid_amount ?>"   required >
            </div>
        <!--<div class="wrapper">

            <input type="text" class="form-control" name="due_amount" value="<?php echo $singleData->due_amount ?>"   required >
      </div>
       <div class="wrapper">

        <input type="date" class="form-control" name="date" value=""   required size="55" tabindex="1" placeholder="">
       </div>-->
        <p>
            <input type="hidden" name="pay_id" value="<?php echo $singleData->pay_id?>">
        </p>



        <p>
            <input type="submit" name="submit" value="Update">
        </p>


</form>
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