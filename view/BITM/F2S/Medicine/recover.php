<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;

$obj = new App\Medicine\Medicine();

$obj->setData($_GET);

$obj->recover();

Utility::redirect('allMedicine.php');