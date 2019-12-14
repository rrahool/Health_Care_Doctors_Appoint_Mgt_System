<?php
use App\Utility\Utility;

require_once("../../../../vendor/autoload.php");

$objMedicine  = new \App\Medicine\Medicine();

$objMedicine->setData($_POST);

$objMedicine->store();

Utility::redirect('create.php');