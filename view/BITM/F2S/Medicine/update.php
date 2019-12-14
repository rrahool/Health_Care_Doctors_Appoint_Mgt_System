<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;



$obj  = new \App\Medicine\Medicine();

$obj->setData($_POST);

$obj->update();

Utility::redirect('allMedicine.php');