<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Bill\Bill;


$obj  = new Bill;

$obj->setData($_GET);

$obj->trash();

Utility::redirect('trashed.php');