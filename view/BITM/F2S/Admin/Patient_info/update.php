<?php
require_once("../../../../../vendor/autoload.php");

$obj = new \App\Patient\Patient();

$obj->setData($_POST);

$obj->updates();

\App\Utility\Utility::redirect('../allUser.php');