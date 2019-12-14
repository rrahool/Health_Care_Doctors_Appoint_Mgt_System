<?php
require_once("../../../../../vendor/autoload.php");

use App\Utility\Utility;

$obj = new \App\Doctor\Doctor();

$obj->setData($_GET);

$obj->trash();
Utility::redirect('trashed.php');