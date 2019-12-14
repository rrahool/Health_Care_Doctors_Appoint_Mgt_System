<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Payment\Payment;


$obj  = new Payment;

$obj->setData($_GET);

$obj->recover();

Utility::redirect('allPayment.php');