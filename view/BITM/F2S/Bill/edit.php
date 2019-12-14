<?php

require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;
use App\Bill\Bill;

$msg = Message::message();

$obj = new bill;

$obj->setData($_GET);
$singleData = $obj->view();



echo "<div>  <div id='message'>  $msg </div>   </div>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Billing's Information Add Form</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../../../resources/style/create.css">
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="content">


<form action="update.php" method="post">


    <div id="form_head">
        <h1 align="center" style="color:#ffffcc;font-size:1.8em"><strong>Billing Information Form Update</strong></h1>
        <hr>
        <br>

        <div class="wrapper">
            <input type="text" class="form-control" name="pres_id" value="<?php echo $singleData->pres_id?>" required >
        </div>
        <div class="wrapper">

            <input type="text" class="form-control" name="reg_fee" value="<?php echo $singleData->reg_fee?>" required  >
        </div>
            <div class="wrapper">

            <input type="text" class="form-control" name="cabin" value="<?php echo $singleData->cabin?>" required >
            </div>
                <div class="wrapper">

            <input type="text" class="form-control" name="medicine" value="<?php echo $singleData->medicine?>" >
                </div>
                    <div class="wrapper">

            <input type="text" class="form-control" name="doctor" value="<?php echo $singleData->doctor?>"   required >
                    </div>
                        <div class="wrapper">

            <input type="text" class="form-control" name="meal" value="<?php echo $singleData->meal?>"   required size="55" >
                        </div>
                            <div class="wrapper">

            <input type="text" class="form-control" name="other" value="<?php echo $singleData->other?>"   required >
                            </div>
       <!-- <div class="wrapper">

            <input type="text" class="form-control" name="total" value="<?php echo $singleData->total?>"   required >
        </div>-->
                                <div class="wrapper">

            <input type="text" class="form-control" name="service_charge" value="<?php echo $singleData->service_charge?>"   required >
                                </div>
                                    <div class="wrapper">

            <input type="text" class="form-control" name="vat" value="<?php echo $singleData->vat?>"   required >
                                    </div>
        <!--<div class="wrapper">

            <input type="text" class="form-control" name="gross_amount" value="<?php echo $singleData->gross_amount?>"   required >
       </div>
        <div class="wrapper">

            <input type="datetime" class="form-control" name="date" value="<?php echo $singleData->date?>"   required >
       </div>-->

        <input type="hidden" name="bill_id" value="<?php echo $singleData->bill_id?>">

        <input type="submit" name="submit" value="Update">

</form>

</div>>
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