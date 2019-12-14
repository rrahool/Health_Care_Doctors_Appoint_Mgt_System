<?php
require_once("../../../../vendor/autoload.php");

use App\Utility\Utility;



$obj  = new \App\Appointment\Appointment();

$obj->setData($_POST);

$obj->update();

Utility::redirect('allAppointment.php');