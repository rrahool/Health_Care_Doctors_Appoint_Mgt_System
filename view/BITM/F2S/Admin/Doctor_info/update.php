<?php
require_once("../../../../../vendor/autoload.php");

$obj = new \App\Doctor\Doctor();

//\App\Utility\Utility::dd($_POST);

$obj->setData($_POST);


$obj->update();

\App\Utility\Utility::redirect('../doctors.php');