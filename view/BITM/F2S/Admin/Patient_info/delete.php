<?php

    $path =$_SERVER['HTTP_REFERER'];

require_once ("../../../../../vendor/autoload.php");


$obj = new \App\Patient\Patient();

$obj->setData($_GET);

$obj->delete();
\App\Utility\Utility::redirect($path);