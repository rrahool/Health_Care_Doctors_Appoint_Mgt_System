<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Payment\Payment;
use App\Bill\Bill;


if(isset($_POST['submit'])) {
    $query = "SELECT gross_amount from Bill where bill_id='{$_POST['bill_id']}' ";
    $obj_bill = new bill();
    $obj_bill->setData($_POST);

    $bill = $obj_bill->view();
    print_r($bill);
    $_POST['net_amount'] = $bill->gross_amount - $_POST['discount'];
    $_POST['due_amount'] = $_POST['net_amount'] - $_POST['paid_amount'];
}

$obj  = new Payment();
//Utility::dd($_POST);
$obj->setData($_POST);
$obj->update();

Utility::redirect('allPayment.php');