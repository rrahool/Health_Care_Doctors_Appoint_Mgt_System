<?php
require_once("../../../../vendor/autoload.php");

use App\Bill\Bill;
use App\Utility\Utility;

if(isset($_POST['submit'])){
    $_POST['total']=$_POST['reg_fee']+$_POST['cabin']+$_POST['medicine']+$_POST['doctor']+$_POST['meal']+$_POST['other'];
    $_POST['gross_amount']=$_POST['total']+$_POST['service_charge']+$_POST['vat'];
}

$obj = new Bill();

$obj->setData($_POST);

$obj->store();


Utility::redirect("allBill.php");