<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Payment\Payment;


$obj  = new Payment();

$obj->setData($_GET);

$obj->trash();

Utility::redirect('trashed.php');