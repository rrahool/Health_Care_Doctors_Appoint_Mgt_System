<?php

use App\Payment\Payment;
use App\Utility\Utility;
use App\Message\Message;
require_once ("../../../../vendor/autoload.php");

if(!isset($_GET['pay_id'])) {

    Message::message("You can't visit view.php without id (ex: view.php?id=23)");
    Utility::redirect("allBill.php");
}


$obj = new Payment();

$obj->setData($_GET);

$singleData  =  $obj->view();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Details</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <style>

        div{

             background-image: url("../../../../resources/bootstrap/image/bg1.jpg");
             background-size: cover;
             padding: 0;
             margin: 0 auto;
         }
    </style>

</head>
<body>

<div class="container">
<h1 align="center"> Single Payment Information </h1>


<table class="table table-bordered table-striped">


    <?php


    echo "

            <tr align='center'><td>Payment ID</td> <td>$singleData->pay_id</td></tr>
            <tr align='center'><td>Bill  ID</td> <td>$singleData->bill_id</td></tr>
            <tr align='center'><td>Discount</td> <td>$singleData->discount</td></tr>
            <tr align='center'><td>Net Amount</td> <td>$singleData->net_amount</td></tr>
            <tr align='center'> <td>Paid Amount</td> <td>$singleData->paid_amount</td></tr>
            <tr align='center'> <td>Due Amount</td> <td>$singleData->due_amount</td></tr>
            <tr align='center'> <td>Date</td> <td>$singleData->date</td></tr>

            ";


    ?>

</table>

</div>

</body>
</html>
