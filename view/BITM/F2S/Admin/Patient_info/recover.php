<?php
require_once("../../../../../vendor/autoload.php");



$obj = new \App\Patient\Patient();

$obj->setData($_GET);

$obj->recover();

\App\Utility\Utility::redirect('../allUser.php');