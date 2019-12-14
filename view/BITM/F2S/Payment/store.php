<?php
namespace App\Payment;

require_once("../../../../vendor/autoload.php");


use App\bill\bill;
use App\Utility\Utility;


if(isset($_POST['submit'])){
    $query="SELECT gross_amount from Bill where bill_id='{$_POST['bill_id']}' ";
    $obj_bill= new bill();
    $obj_bill->setData($_POST);

    $bill=$obj_bill->view();
    print_r($bill);
    $_POST['net_amount']=$bill->gross_amount-$_POST['discount'];
    $_POST['due_amount']=$_POST['net_amount']-$_POST['paid_amount'];

}
$obj = new Payment();

$obj->setData($_POST);

$obj->store();

Utility::redirect("allPayment.php");