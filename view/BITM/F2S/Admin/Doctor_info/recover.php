<?php
require_once("../../../../../vendor/autoload.php");



$obj = new \App\Doctor\Doctor();

$obj->setData($_GET);

$obj->recover();

\App\Utility\Utility::redirect('../doctors.php');