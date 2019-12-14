<?php

use App\Bill\Bill;
use App\Utility\Utility;
use App\Message\Message;
require_once ("../../../../vendor/autoload.php");

if(!isset($_GET['bill_id'])) {

    Message::message("You can't visit view.php without id (ex: view.php?id=23)");
    Utility::redirect("allBill.php");
}


$obj = new bill;

$obj->setData($_GET);

$singleData  =  $obj->view();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

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
<h1  align='center'> Single Bill Information </h1>


<table class="table table-bordered table-striped">


    <?php


    echo "

            <tr align='center'><td> Bill ID</td> <td>$singleData->bill_id</td></tr>
            <tr align='center'><td> Prescription  ID</td> <td>$singleData->pres_id</td></tr>
            <tr align='center'><td> Registration Fee</td> <td>$singleData->reg_fee</td></tr>
            <tr align='center'><td>Cabin Fee</td> <td>$singleData->cabin</td></tr>
            <tr align='center'> <td>Medicine Fee</td> <td>$singleData->medicine</td></tr>
            <tr align='center'> <td>Doctor Fee</td> <td>$singleData->doctor</td></tr>
            <tr align='center'> <td>Meal Fee</td>  <td>$singleData->meal</td></tr>
            <tr align='center'> <td>Other Fee</td> <td>$singleData->other</td></tr>
            <tr align='center'> <td>ToTal Amount</td><td>$singleData->total</td></tr>
            <tr align='center'> <td>Service Charge</td> <td>$singleData->service_charge</td></tr>
            <tr align='center'> <td>Vat</td> <td>$singleData->vat</td></tr>
            <tr align='center'> <td>Gross Amount</td> <td>$singleData->gross_amount</td></tr>
            <tr align='center'> <td>Date</td> <td>$singleData->date</td></tr>

            ";


    ?>

</table>

</div>

</body>
</html>
