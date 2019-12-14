<?php

    $path =$_SERVER['HTTP_REFERER'];

require_once ("../../../../../vendor/autoload.php");


$obj = new \App\Doctor\Doctor();

$obj->setData($_GET);

$obj->delete();
\App\Utility\Utility::redirect($path);