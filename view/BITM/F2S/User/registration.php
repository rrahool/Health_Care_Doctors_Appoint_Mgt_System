<?php
require_once ('../../../../vendor/autoload.php');
use App\Message\Message;
use App\Utility\Utility;


$obj =new \App\User\User();

$obj->setData($_POST);
$obj->store();

Utility::redirect('userLogin.php');